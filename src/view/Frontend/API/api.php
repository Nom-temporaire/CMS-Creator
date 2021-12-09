<?php

use App\Manager\ApiManager;
use App\Fram\Factories\PDOFactory;

$api = new ApiManager(PDOFactory::getMysqlConnection());

$_SESSION['json'] = $api->getUser(12);
