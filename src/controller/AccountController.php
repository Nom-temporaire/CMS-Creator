<?php

namespace App\Controller;

class AccountController extends BaseController
{
    public function executeAccount()
    {
        $id =
            $this->render(
                'account.php',
                [],
                'Account'
            );
    }
}
