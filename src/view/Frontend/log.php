<?php

use App\Fram\Factories\PDOFactory;
// Si le role dans Session est visiteur alors on tente une connexion

$pdo = PDOFactory::getMysqlConnection();
$req = $pdo->prepare('SELECT * FROM users WHERE username = :username');

$req->bindValue(':username', $_POST['username']);
$req->execute();
$log = $req->fetch();

//si log n'est pas vide alors on verifie si le mot de passe dans $_POST est bon
//si la condition est vraie alors on set le role dans session a admin
if (!empty($log)) {
    if (password_verify($_POST['password'], $log['password'])) {

        $request = $pdo->prepare("SELECT isAdmin FROM users WHERE username=:username");

        $request->bindValue(':username', $log['username']);
        $request->execute();
        $role = $request->fetch();
        if ($role["isAdmin"] == "1") {
            $_SESSION['role'] = 'admin';
        } else {
            $_SESSION['role'] = 'user';
        }
        $_SESSION['idUser'] = $log['idUser'];
        $_SESSION['username'] = $log['username'];

        header('Location: /');
    } else {
        $_SESSION['role'] = 'visiteur';
        $_SESSION['alert'] = "Le mot de passe est incorrect";
        header('Location: ./signin');
    }
} else {
    $_SESSION['role'] = 'visiteur';
    $_SESSION['alert'] = "Les identifiants sont incorrects";
    header('Location: ./signin');
}