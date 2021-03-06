<?php

use App\Manager\PostManager;
use App\Fram\Factories\PDOFactory;
use App\Manager\ImageManager;

if ($_SESSION['role'] == 'visiteur') {
    header('Location: /');
}




$post = new PostManager(PDOFactory::getMysqlConnection());
$post->createPost($_POST['titre'], $_POST['contenu'], $_SESSION['idUser']);
$imageManager = new ImageManager(PDOFactory::getMysqlConnection());
$imageManager->uploadImage();

header('Location: /');
