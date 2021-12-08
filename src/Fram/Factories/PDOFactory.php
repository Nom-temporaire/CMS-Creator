<?php

namespace App\Fram\Factories;

class PDOFactory
{
    public static function getMysqlConnection()
    {
        $db = new \PDO('mysql:host=db;dbname=cms', 'root', 'example');
        $db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

        return $db;
    }
}
