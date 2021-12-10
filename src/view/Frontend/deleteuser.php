<?php

use App\Manager\UserManager;
use App\Manager\CommentManager;
use App\Manager\PostManager;
use App\Fram\Factories\PDOFactory;

$user = new UserManager(PDOFactory::getMysqlConnection());
$user->DeleteUser($_SESSION['idUser'], $_POST['idUserDel']);

if($_SESSION['idUser'] != $_POST['idUserDel']){
    $deleteComments = new CommentManager(PDOFactory::getMysqlConnection());
    $deleteComments->deleteCommentsFromUser($_POST['idUserDel']);

    $deletePosts = new PostManager(PDOFactory::getMysqlConnection());
    $deletePosts->deletePostsFromUser($_POST['idUserDel']);
}

header('Location: /userlist');