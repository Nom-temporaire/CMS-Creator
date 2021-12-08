<?php

use App\Manager\PostManager;
use App\Fram\Factories\PDOFactory;

if($_SESSION['role'] == 'visiteur')
{
    header('Location: /');
}

$post = new PostManager(PDOFactory::getMysqlConnection());
echo $_POST['titre'] . '<br>' . $_POST['contenu'] . $_SESSION['idUser'];; 
$post->createPost($_POST['titre'], $_POST['contenu'], $_SESSION['idUser']);

header('Location: /');