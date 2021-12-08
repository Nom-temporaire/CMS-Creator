<?php

namespace App\Controller;

class AccountController extends BaseController
{
    public function executeCreate($id)
    {
        $this->render(
            'Account.php',
            [
                'idUser' => $id
            ],
            'Account'
        );
    }
}
