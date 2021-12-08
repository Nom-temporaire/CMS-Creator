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
echo var_dump($log);
if (!empty($log)) {
    echo var_dump($log);
    if (password_verify($_POST['password'], $log['password'])) {
        $_SESSION['role'] = 'admin';

        header('Location: /');
    } else {
        $_SESSION['role'] = 'visiteur';
        header('Location: /');
    }
} else {
    $_SESSION['role'] = 'visiteur';
    header('Location: /');
}
