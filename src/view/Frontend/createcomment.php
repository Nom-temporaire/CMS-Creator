<?php

use App\Manager\CommentManager;
use App\Fram\Factories\PDOFactory;

if($_SESSION['role'] == 'visiteur')
{
    header('Location: /');
}

$comment = new CommentManager(PDOFactory::getMysqlConnection());
$comment->createComment($_SESSION['idUser'], $_POST['postid'], $_POST['commentcontent']);

header('Location: /post/'.$_POST['postid']);