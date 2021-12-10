<?php

namespace App\Controller;

class ApiController extends BaseController
{

    public function executeApi()
    {


        $this->renderAPI(
            'api.php',
            [
                "type" => $this->params['type'],
                "id" => $this->params['id'],
                "mode" => $this->params['mode'],
            ],
            'API'
        );
    }
}
