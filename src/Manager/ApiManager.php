<?php

namespace App\Manager;

use App\Entity\User;

class ApiManager extends BaseManager
{
    // Ici on aura les différentes méthodes pour utiliser l'API REST
    // Voici la liste des méthodes disponibles : GET/POST/PUT/DELETE
    // Voici la liste des api à faire avec toutes les méthodes :
    // User : /api/user/{id} (pour un spécique) ou /api/user/ (pour tous les avoir)
    // Post : /api/post/{id} (pour un spécique)ou /api/post/ (pour tous les avoir) (avec les commentaires dans les deux cas)
    // Comment : /api/comment/{id} (pour un spécique)ou /api/comment/ (pour tous les avoir)

    public function getUser(int $id)
    {
        $request = $this->pdo->prepare('SELECT * FROM users WHERE idUser = :id');

        $request->execute([
            'id' => $id
        ]);
        // on fetch assoc
        $log = $request->fetch(\PDO::FETCH_ASSOC);
        //transforme les données en JSON

        if ($log === false) {
            $log = ["error" => "User not found"];
        }
        $json = json_encode($log);
        //retourne le JSON

        echo $json;
    }
    public function getUsers()
    {
        $request = $this->pdo->prepare('SELECT * FROM users');

        $request->execute();
        // on fetch assoc
        $log = $request->fetchAll(\PDO::FETCH_ASSOC);
        //transforme les données en JSON
        $json = json_encode($log);
        //retourne le JSON

        echo $json;
    }

    public function getCommentaire(int $id)
    {
        $request = $this->pdo->prepare('SELECT * FROM commentaires WHERE idComment = :id');

        $request->execute([
            'id' => $id
        ]);
        // on fetch assoc
        $log = $request->fetch(\PDO::FETCH_ASSOC);
        //transforme les données en JSON

        if ($log === false) {
            $log = ["error" => "Comment not found"];
        }
        $json = json_encode($log);
        //retourne le JSON

        echo $json;
    }

    public function getCommentaires()
    {
        $request = $this->pdo->prepare('SELECT * FROM commentaires');
        $request->execute();
        // on fetch assoc
        $log = $request->fetchAll(\PDO::FETCH_ASSOC);
        //transforme les données en JSON
        $json = json_encode($log);
        //retourne le JSON

        echo $json;
    }
    public function getPost(int $id)
    {
        $request = $this->pdo->prepare('SELECT * FROM post WHERE idPost = :id');

        $request->execute([
            'id' => $id
        ]);
        // on fetch assoc
        $log = $request->fetch(\PDO::FETCH_ASSOC);
        //transforme les données en JSON

        if ($log === false) {
            $log = ["error" => "Post not found"];
        }
        $json = json_encode($log);
        //retourne le JSON

        echo $json;
    }
    public function getPosts()
    {
        $request = $this->pdo->prepare('SELECT * FROM post');
        $request->execute();
        // on fetch assoc
        $log = $request->fetchAll(\PDO::FETCH_ASSOC);
        //transforme les données en JSON
        $json = json_encode($log);
        //retourne le JSON

        echo $json;
    }

    // On fait les méthodes pour les DELETE
    public function deleteUser(int $id)
    {
        $request = $this->pdo->prepare('DELETE FROM users WHERE idUser = :id');

        $request->execute([
            'id' => $id
        ]);
        // on fetch assoc
        $log = $request->fetch(\PDO::FETCH_ASSOC);
        //transforme les données en JSON

        if ($log === false) {
            $log = ["error" => "User Delete"];
        }
        $json = json_encode($log);
        //retourne le JSON

        echo $json;
    }
    public function deleteCommentaire(int $id)
    {
        $request = $this->pdo->prepare('DELETE FROM commentaires WHERE idComment = :id');

        $request->execute([
            'id' => $id
        ]);
        // on fetch assoc
        $log = $request->fetch(\PDO::FETCH_ASSOC);
        //transforme les données en JSON

        if ($log === false) {
            $log = ["error" => "Comment Delete"];
        }
        $json = json_encode($log);
        //retourne le JSON

        echo $json;
    }
    public function deletePost(int $id)
    {
        $request = $this->pdo->prepare('DELETE FROM post WHERE idPost = :id');

        $request->execute([
            'id' => $id
        ]);
        // on fetch assoc
        $log = $request->fetch(\PDO::FETCH_ASSOC);
        //transforme les données en JSON

        if ($log === false) {
            $log = ["error" => "Post Delete"];
        }
        $json = json_encode($log);
        //retourne le JSON

        echo $json;
    }
}
