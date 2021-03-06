<?php
// Si le role dans session est visiteur alors on redirige vers la page d'accueil
if ($_SESSION['role'] == 'visiteur') {
    header('Location: /');
}

use App\Manager\UserManager;
use App\Fram\Factories\PDOFactory;
// On appelle UserManager ave comme paramètre la pdo de PDOFactory et on appelle la fonction CreateUser
// On recupère les données du formulaire

$user = new UserManager(PDOFactory::getMysqlConnection());

if (isset($_POST['isAdmin'])) {
    $user->UpdateUser($_POST['username'], $_POST['password'], $_POST['mail'], 1, $_SESSION['idUser']);
} else {
    $user->UpdateUser($_POST['username'], $_POST['password'], $_POST['mail'], 0, $_SESSION['idUser']);
}
if (isset($_SESSION['alert'])) {
    header('Location: /account');
} else {
    $_SESSION['alert'] = "Modification effectuée";
    header('Location: /account');
}
