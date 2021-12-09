<?php

namespace App\Manager;

use App\Entity\Post;

class PostManager extends BaseManager{
    public function createPost($title, $content, $authorID){
        $this->post = new Post();
        $this->post->setTitle($title);
        $this->post->setContent($content);
        $this->post->setAuthor($authorID);
        //$post->setCreatedAt(new \DateTime());
        //$post->setUpdatedAt(new \DateTime());

        $insert = "INSERT INTO post (nom, contenu, idUser) VALUES (:nom, :contenu, :idUser)";
        $request = $this->pdo->prepare($insert);
        $data = [
            'nom' => $title,
            'contenu' => $content,
            'idUser' => $authorID
        ];

        $request->execute($data);
    }

    public function getPost($id){
        $select = "SELECT * FROM post WHERE id = :id";
        $request = $this->pdo->prepare($select);
        $request->execute(['id' => $id]);
        $post = $request->fetch();

        return $post;
    }

    public function getAllPosts(){

        $results = [];

        $select = "SELECT * FROM post";

        $request = $this->pdo->query($select);
        
        while($post = $request->fetch()){
            $results[] = $post;
        }

        return $results;
    }
}