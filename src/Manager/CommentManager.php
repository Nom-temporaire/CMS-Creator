<?php

namespace App\Manager;

use App\Entity\Comment;

class CommentManager extends BaseManager{
    public function createComment($idUser, $idPost, $content){
        $comment = new Comment();
        $comment->setIdPost($idPost);
        $comment->setIdUser($idUser);
        $comment->setContent($content);
        //$comment->setDate(new \DateTime());
        
        $insert = "INSERT INTO commentaires (idUser, idPost, content) VALUES (:idUser, :idPost, :content)";

        $request = $this->pdo->prepare($insert);

        $data = [
            'idUser' => $idUser,
            'idPost' => $idPost,
            'content' => $content
        ];

        $request->execute($data);
    }

    public function getComments($idPost){
        $results = [];

        $select = "SELECT * FROM commentaires WHERE idPost = :idPost";

        $this->pdoStatement = $this->pdo->prepare($select);
        $this->pdoStatement->bindValue(':idPost', $idPost);
        $this->pdoStatement->execute();

        while($comment = $this->pdoStatement->fetchObject('App\Entity\Post')){
            $results[] = $comment;
        }

        return $results;
    }
}