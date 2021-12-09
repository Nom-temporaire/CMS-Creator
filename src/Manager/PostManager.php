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

        $insert = "INSERT INTO post (title, content, IDauthor) VALUES (:title, :content, :IDauthor)";
        $request = $this->pdo->prepare($insert);
        $data = [
            'title' => $title,
            'content' => $content,
            'IDauthor' => $authorID
        ];

        $request->execute($data);
    }

    public function getPost($id){
        $select = "SELECT * FROM post WHERE id = :id";
        $this->pdoStatement = $this->pdo->prepare($select);
        $this->pdoStatement->bindValue('id', $id, \PDO::PARAM_INT);
        $this->pdoStatement->execute();

        $result = $this->pdoStatement->fetchObject('App\Entity\Post');
        return $result;
    }

    public function getAllPosts(){

        $results = [];

        $select = "SELECT * FROM post";

       $this->pdoStatement = $this->pdo->query($select);
        
        while($post = $this->pdoStatement->fetchObject('App\Entity\Post')){
            $results[] = $post;
        }

        return $results;
    }
}