<?php

use App\Fram\Factories\PDOFactory;
// Si le role dans Session est visiteur alors on tente une connexion
if ($_SESSION['role'] == 'visiteur') {
    $pdo = PDOFactory::getMysqlConnection();
    $req = $pdo->prepare('SELECT * FROM users WHERE username = :username');

    // $req->bindValue(':username', $_POST['username']);
    // $req->execute();
    // $logs = $req->fetch();
}
