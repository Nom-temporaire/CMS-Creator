<?php

namespace App\Entity;

class Comment{
    private $id;
    private $idPost;
    private $idUser;
    private $content;
    private $date;

    public function getId(){
        return $this->id;
    }

    public function getIdPost(){
        return $this->idPost;
    }

    public function getIdUser(){
        return $this->idUser;
    }

    public function getContent(){
        return $this->content;
    }

    public function getDate(){
        return $this->date;
    }

    public function setIdPost($idPost){
        $this->idPost = $idPost;
    }

    public function setIdUser($idUser){
        $this->idUser = $idUser;
    }

    public function setContent($content){
        $this->content = $content;
    }

    public function setDate($date){
        $this->date = $date;
    }
}