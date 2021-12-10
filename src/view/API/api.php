<?php

use App\Manager\ApiManager;
use App\Fram\Factories\PDOFactory;

$api = new ApiManager(PDOFactory::getMysqlConnection());
// if ($type == 'user') {
//     $api->getUser($id);
// } elseif ($type == 'users') {
//     $api->getUsers();
// } elseif ($type == 'commentaire') {
//     $api->getCommentaire($id);
// } elseif ($type == 'commentaires') {
//     $api->getCommentaires();
// } elseif ($type == 'post') {
//     $api->getPost($id);
// } elseif ($type == 'posts') {
//     $api->getPosts();
// }
// si $type est user alors appellé la fonction getUser avec l'id

$nom = $mode . ucfirst($type);
$nomSansGet = $mode . ucfirst($type) . 's';
try {
    $api->$nom($id);
} catch (Exception $e) {
    $api->$nomS();
}
