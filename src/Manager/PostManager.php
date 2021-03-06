<?php

namespace App\Manager;

use App\Entity\Post;

class PostManager extends BaseManager
{
    public function createPost($title, $content, $authorID)
    {
        $this->post = new Post();
        $this->post->setTitle($title);
        $this->post->setContent($content);
        $this->post->setIdUser($authorID);
        //$post->setCreatedAt(new \DateTime());
        //$post->setUpdatedAt(new \DateTime());

        $insert = "INSERT INTO post (title, content, idUser) VALUES (:title, :content, :idUser)";
        $request = $this->pdo->prepare($insert);
        $data = [
            'title' => $title,
            'content' => $content,
            'idUser' => $authorID
        ];

        $request->execute($data);
    }

    public function getPost($id)
    {
        $select = "SELECT idPost, post.idUser, title, post.date, content, username FROM users JOIN post ON users.idUser = post.idUser WHERE post.idPost = :idPost";
        $this->pdoStatement = $this->pdo->prepare($select);
        $this->pdoStatement->bindValue('idPost', $id, \PDO::PARAM_INT);
        $this->pdoStatement->execute();

        $result = $this->pdoStatement->fetchObject('App\Entity\Post');
        return $result;
    }

    public function deletePost($idPost)
    {
        $delete = "DELETE FROM post WHERE idPost = :idPost LIMIT 1";
        $this->pdoStatement = $this->pdo->prepare($delete);
        $this->pdoStatement->bindValue('idPost', $idPost, \PDO::PARAM_INT);

        return $this->pdoStatement->execute();
    }

    public function deletePostsFromUser($idUser)
    {
        $delete = "DELETE FROM post WHERE idUser = :idUser";
        $this->pdoStatement = $this->pdo->prepare($delete);
        $this->pdoStatement->bindValue('idUser', $idUser, \PDO::PARAM_INT);

        return $this->pdoStatement->execute();
    }

    public function getAllPosts()
    {

        $results = [];

        $select = "SELECT * FROM post";

        $this->pdoStatement = $this->pdo->query($select);

        while ($post = $this->pdoStatement->fetchObject('App\Entity\Post')) {
            $results[] = $post;
        }

        return array_reverse($results);
    }
}