<?php

namespace App\Controller;

class AccountController extends BaseController
{
    public function executeAccount()
    {

        $this->render(
            'account.php',
            [],
            'Account'
        );
    }
}
