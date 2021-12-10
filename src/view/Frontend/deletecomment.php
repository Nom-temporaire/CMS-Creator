<?php

use App\Manager\CommentManager;
use App\Fram\Factories\PDOFactory;

if($_SESSION['role'] == 'visiteur')
{
    header('Location: /');
}

$postId = new CommentManager(PDOFactory::getMysqlConnection());
$postId = $postId->getComment($id);
$postId = $postId->getIdPost();

$comment = new CommentManager(PDOFactory::getMysqlConnection());
$comment->deleteComment($id);

header('Location: /post/'. $postId);