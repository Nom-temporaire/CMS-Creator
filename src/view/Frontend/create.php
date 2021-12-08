<?php

use App\Manager\UserManager;
use App\Fram\Factories\PDOFactory;
// On appelle UserManager ave comme paramètre la pdo de PDOFactory et on appelle la fonction CreateUser
// On recupère les données du formulaire

$user = new UserManager(PDOFactory::getMysqlConnection());
$user->CreateUser($_POST['username'], $_POST['password'], $_POST['email'], 1);
// On insère dans la db les valuers avec la fonction UpdateUser
header('Location: ./signin');
