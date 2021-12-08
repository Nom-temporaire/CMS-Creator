<?php

namespace App\Controller;

class DelogController extends BaseController
{
    public function executeDelog()
    {
        $this->render(
            'delog.php',
            [],
            'WAITING'
        );
    }
}