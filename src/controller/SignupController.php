<?php

namespace App\Controller;

class SignupController extends BaseController
{
    public function executeSignup()
    {
        $this->render(
            'signup.php',
            [],
            'Bonne Route'
        );
    }
}