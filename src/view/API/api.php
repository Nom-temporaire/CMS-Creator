<?php

use App\Manager\ApiManager;
use App\Fram\Factories\PDOFactory;

$api = new ApiManager(PDOFactory::getMysqlConnection());


$nom = $mode . ucfirst($type);
$nomS = $mode . ucfirst($type) . 's';
try {
    $api->$nom($id);
} catch (Exception $e) {
    $api->$nomS();
}
