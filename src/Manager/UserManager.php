<?php

namespace App\Manager;

use App\Entity\User;

class UserManager extends BaseManager
{
    // Create an User object
    public function CreateUser($username, $password, $email, $role)
    {
        $this->user = new User();
        $this->user->setUsername($username);
        $this->user->setPassword($password);
        $this->user->setMail($email);
        $this->user->setIsAdmin($role);

        // We send all the data to the database
        $insert = "INSERT INTO users (username, password, mail, isAdmin) VALUES (:username, :password, :mail, :isAdmin)";
        $requete = $this->pdo->prepare($insert);
        $data = [
            'username' => $this->user->getUsername(),
            'password' => password_hash($this->user->getPassword(), PASSWORD_DEFAULT),
            'mail' => $this->user->getMail(),
            'isAdmin' => $this->user->getIsAdmin(),
        ];
        // on verifier que username et mail n'existent pas dans la base de données
        $req = $this->pdo->prepare('SELECT * FROM users WHERE username = :username');

        $req->bindValue(':username', $_POST['username']);
        $req->execute();
        $log = $req->fetch();
        //si log est vide alors on peut ajouter l'utilisateur
        if (empty($log)) {
            // $requete->bindValue();
            $requete->execute($data);
            $l = $req->fetch();
        }
    }
    public function UpdateUser($username, $password, $email, $role, $id)
    {
        $this->user = new User();
        $this->user->setUsername($username);
        $this->user->setMail($email);
        $this->user->setPassword($password);
        $this->user->setIsAdmin($role);

        //Modify data from database
        if (!empty($this->user->getUsername())) {
            $request = $this->pdo->prepare('SELECT * FROM users WHERE username = :username');
            $request->bindValue(':username', $_POST['username']);
            $request->execute();
            $log = $request->fetch();
            if (empty($log)) {
                $update = "UPDATE users SET username=:username WHERE id=:id";
                $req = $this->pdo->prepare($update);
                $data = ['username' => $this->user->getUsername(), 'id' => intval($id)];
                $_SESSION['username'] = $this->user->getUsername();
                $req->execute($data);
                $req->fetch();
            } else {
                //On transmet à la page account une var alerte qui indique que le username existe déjà
                $_SESSION['alert'] = "Ce nom d'utilisateur existe déjà";
            }
        }
        if (!empty($this->user->getMail())) {
            $update = "UPDATE users SET mail=:mail WHERE id=:id";
            $req = $this->pdo->prepare($update);
            $data = ['mail' => $this->user->getMail(), 'id' => intval($id)];
            $req->execute($data);
            $log = $req->fetch();
        }
        if (!empty($this->user->getPassword())) {
            $update = "UPDATE users SET password=:password WHERE id=:id";
            $req = $this->pdo->prepare($update);
            $data = ['password' => password_hash($this->user->getPassword(), PASSWORD_DEFAULT), 'id' => intval($id)];
            $req->execute($data);
            $log = $req->fetch();
        }

        $update = "UPDATE users SET isAdmin=:isAdmin WHERE id=:id";

        $req = $this->pdo->prepare($update);
        $data = ['isAdmin' => intval($this->user->getIsAdmin()), 'id' => intval($id)];
        // si $id =1 alors on modifie le role admin dans sessions
        // Sinon on modifie le role user dans session

        if ($data['isAdmin'] == 1) {
            $_SESSION['role'] = "admin";
        } else {
            $_SESSION['role'] = "user";
        }

        $req->execute($data);
        $log = $req->fetch();
    }

    public function getAllUsers()
    {

        $results = [];

        $select = "SELECT * FROM users ORDER BY username";

        $this->pdoStatement = $this->pdo->query($select);

        while ($users = $this->pdoStatement->fetchObject('App\Entity\User')) {
            $results[] = $users;
        }

        return $results;
    }
}
