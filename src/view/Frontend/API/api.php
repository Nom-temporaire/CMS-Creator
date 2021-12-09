<?php

use App\Manager\ApiManager;
use App\Fram\Factories\PDOFactory;

$api = new ApiManager(PDOFactory::getMysqlConnection());

// si $type est user alors appellé la fonction getUser avec l'id
if ($mode == 'get') {
    if ($type == 'user') {
        $_SESSION['json'] = $api->getUser($id);
    } elseif ($type == 'users') {
        $_SESSION['json'] = $api->getUsers();
    } elseif ($type == 'commentaire') {
        $_SESSION['json'] = $api->getCommentaire($id);
    } elseif ($type == 'commentaires') {
        $_SESSION['json'] = $api->getCommentaires();
    } elseif ($type == 'post') {
        $_SESSION['json'] = $api->getPost($id);
    } elseif ($type == 'posts') {
        $_SESSION['json'] = $api->getPosts();
    }
}
// On delete
elseif ($mode == 'delete') {
    if ($type == 'user') {
        $_SESSION['json'] = $api->deleteUser($id);
    } elseif ($type == 'commentaire') {
        $_SESSION['json'] = $api->deleteCommentaire($id);
    } elseif ($type == 'post') {
        $_SESSION['json'] = $api->deletePost($id);
    }
}


// $_SESSION['json'] = $type;
