<?php

namespace App\Entity;

class User
{
    private int $idUser;
    private string $username;
    private string $password;
    private string $mail;
    private int $isAdmin;
    private string $date;

    // All setters and getters
    public function getId(): int
    {
        return $this->idUser;
    }


    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getUsername(): string
    {
        return $this->username;
    }
    public function setUsername(string $username): void
    {
        $this->username = $username;
    }

    public function getPassword(): string
    {
        return $this->password;
    }
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    public function getMail(): string
    {
        return $this->mail;
    }
    public function setMail(string $mail): void
    {
        $this->mail = $mail;
    }

    public function getIsAdmin(): int
    {
        return $this->isAdmin;
    }
    public function setIsAdmin(int $isAdmin): void
    {
        $this->isAdmin = $isAdmin;
    }

    public function getDate(): string
    {
        return $this->date;
    }
    public function setDate(string $date): void
    {
        $this->date = $date;
    }
}
