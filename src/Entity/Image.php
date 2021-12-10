<?php

namespace App\Entity;

class Image{
    private $idImage;
    private $idPost;
    private $idUser;
    private $idCommentaire;
    private $chemin;

    public function getIdImage()
    {
        return $this->idImage;
    }

    public function getIdPost()
    {
        return $this->idPost;
    }

    public function setIdPost($idPost)
    {
        $this->idPost = $idPost;
    }

    public function getIdUser()
    {
        return $this->idUser;
    }

    public function setIdUser($idUser)
    {
        $this->idUser = $idUser;
    }

    public function getIdCommentaire()
    {
        return $this->idCommentaire;
    }

    public function setIdCommentaire($idCommentaire)
    {
        $this->idCommentaire = $idCommentaire;
    }

    public function getChemin()
    {
        return $this->chemin;
    }

    public function setChemin($chemin)
    {
        $this->chemin = $chemin;
    }
}