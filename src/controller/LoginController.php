<?php

namespace App\Controller;

class LoginController extends BaseController
{
    public function executeLogin()
    {
        $this->render(
            'login.php',
            [],
            'CMS-Creator - Login'
        );
    }
}