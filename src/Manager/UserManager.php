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
    public function UpdateManager($username, $email, $password, $role)
    {
        $this->user=new User();
        $this->user->setUsername($userrname);
        $this->user->setMail($email);
        $this->user->setPassword($password);
        $this->user->setIsAdmin($role);

        //Modify data from database
        $data = [
            'username' => $this->user->getUsername(),
            'mail' => $this->user->getMail(),
            // 'password' => password_hash($this->user->getPassword(), PASSWORD_DEFAULT),
            'isAdmin' => $this->user-getIsAdmin(),
        ];
        if ($this->user->getPassword!="")
        {
            array_push($data,this->user->getPassword())
            $update = "UPDATE users (username, mail, password, isAdmin) VALUES (:username, :mail, :password, :isAdmin) WHERE id=:id";
        }
        else{
            $update = "UPDATE users (username, mail, isAdmin) VALUES (:username, :mail, :isAdmin) WHERE id=:id";
        }

        
        $req = $this->pdo->prepare($update)
        $req->execute();
        $log = $req->fetch();

        
    }
}
