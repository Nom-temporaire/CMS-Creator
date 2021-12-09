<?php

namespace App\Controller;

class UserlistController extends BaseController
{
    public function executeUserlist()
    {
        $this->render(
            'userlist.php',
            [],
            'Liste des utilisateurs'
        );
    }
}