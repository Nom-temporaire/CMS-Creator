<?php

namespace App\Controller;

class AccountchangeController extends BaseController
{
    public function executeAccountchange()
    {
        $id =
            $this->render(
                'accountchange.php',
                [],
                'Accountchange'
            );
    }
}
