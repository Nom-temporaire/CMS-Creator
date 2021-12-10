<?php

use App\Manager\PostManager;
use App\Fram\Factories\PDOFactory;

if($_SESSION['role'] == 'visiteur')
{
    header('Location: /');
}

$post = new PostManager(PDOFactory::getMysqlConnection());
$post->deletePost($id);

header('Location: /');