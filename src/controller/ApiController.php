<?php

namespace App\Controller;

class ApiController extends BaseController
{

    public function executeApi()
    {


        $this->render(
            'API/api.php',
            [],
            'Api'
        );
    }
}
