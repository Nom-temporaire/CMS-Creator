<?php

namespace App\Controller;

class ApiController extends BaseController
{
    public function executeApi()
    {

        $this->render(
            'account.php',
            [],
            'Account'
        );
    }
}
