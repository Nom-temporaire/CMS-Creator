<?php

use App\Manager\PostManager;
use App\Manager\CommentManager;
use App\Manager\ImageManager;
use App\Fram\Factories\PDOFactory;

if($_SESSION['role'] == 'visiteur')
{
    header('Location: /');
}

$deleteComments = new CommentManager(PDOFactory::getMysqlConnection());
$deleteComments->deleteCommentsFromPost($id);

$deleteFile = new ImageManager(PDOFactory::getMysqlConnection());
$result = $deleteFile->getCheminsFromPost($id);

foreach ($result as $image) {
    $src = 'public/images/'.$image->getChemin();
    unlink($src);
}
    
$deleteImages = new ImageManager(PDOFactory::getMysqlConnection());
$deleteImages->deleteImagesFromPost($id);

$post = new PostManager(PDOFactory::getMysqlConnection());
$post->deletePost($id);

header('Location: /');