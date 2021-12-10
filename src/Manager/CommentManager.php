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

        $select = "SELECT idComment, commentaires.idUser, idPost, commentaires.date, content, username FROM users JOIN commentaires ON users.idUser = commentaires.idUser WHERE commentaires.idPost = :idPost";

        //$select = "SELECT * FROM commentaires WHERE idPost = :idPost";

        $this->pdoStatement = $this->pdo->prepare($select);
        $this->pdoStatement->bindValue(':idPost', $idPost);
        $this->pdoStatement->execute();

        while($comment = $this->pdoStatement->fetchObject('App\Entity\Comment')){
            $results[] = $comment;
        }

        return $results;
    }

    public function getComment($id)
    {
        $select = "SELECT * FROM commentaires WHERE idComment = :idComment";
        $this->pdoStatement = $this->pdo->prepare($select);
        $this->pdoStatement->bindValue('idComment', $id, \PDO::PARAM_INT);
        $this->pdoStatement->execute();

        $result = $this->pdoStatement->fetchObject('App\Entity\Comment');
        return $result;
    }

    public function deleteComment($comment){
        $delete = "DELETE FROM commentaires WHERE idComment = :id LIMIT 1";
        $this->pdoStatement = $this->pdo->prepare($delete);
        $this->pdoStatement->bindValue('id', $comment, \PDO::PARAM_INT);

        return $this->pdoStatement->execute();
    }
}