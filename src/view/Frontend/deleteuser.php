<?php

use App\Manager\UserManager;
use App\Fram\Factories\PDOFactory;

$user = new UserManager(PDOFactory::getMysqlConnection());
$user->DeleteUser($_SESSION['idUser'], $_POST['idUserDel']);
var_dump($_SESSION['idUser']);

header('Location: /userlist');