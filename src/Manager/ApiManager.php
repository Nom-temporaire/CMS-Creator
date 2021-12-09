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
        $_SESSION['json'] = "true";
        $request = $this->pdo->prepare('SELECT * FROM users WHERE id = :id');

        $request->execute([
            'id' => $id
        ]);
        // on fetch assoc
        $log     = $request->fetch(\PDO::FETCH_ASSOC);
        //transforme les données en JSON
        $json = json_encode($log);
        //retourne le JSON

        return $json;
    }
    public function getUsers()
    {
    }
}
