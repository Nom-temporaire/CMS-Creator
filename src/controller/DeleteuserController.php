<?php

namespace App\Controller;

class DeleteuserController extends BaseController
{
    public function executeDeleteUser()
    {
        $this->render(
            'deleteuser.php',
            [],
            'Delete User !'
        );
    }
}