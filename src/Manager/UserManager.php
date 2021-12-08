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
}
