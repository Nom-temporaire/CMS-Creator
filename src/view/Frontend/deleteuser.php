<?php

use App\Manager\UserManager;
use App\Manager\CommentManager;
use App\Manager\PostManager;
use App\Manager\ImageManager;
use App\Fram\Factories\PDOFactory;

if($_SESSION['idUser'] != $_POST['idUserDel']){
    $deleteComments = new CommentManager(PDOFactory::getMysqlConnection());
    $deleteComments->deleteCommentsFromUser($_POST['idUserDel']);

    $deletePosts = new PostManager(PDOFactory::getMysqlConnection());
    $deletePosts->deletePostsFromUser($_POST['idUserDel']);

    $deleteFile = new ImageManager(PDOFactory::getMysqlConnection());
    $result = $deleteFile->getCheminsFromUser($_POST['idUserDel']);

    foreach ($result as $image) {
        $src = 'public/images/'.$image->getChemin();
        unlink($src);
    }
    
    $deleteImages = new ImageManager(PDOFactory::getMysqlConnection());
    $deleteImages->deleteImagesFromUser($_POST['idUserDel']);
}

$user = new UserManager(PDOFactory::getMysqlConnection());
$user->DeleteUser($_SESSION['idUser'], $_POST['idUserDel']);

header('Location: /userlist');