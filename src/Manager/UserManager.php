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
        $requete->execute($data);
    }
}
