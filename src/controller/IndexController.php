<?php

namespace App\Controller;

class IndexController extends BaseController
{
    public function executeIndex()
    {
        $this->render(
            'index.php',
            [],
            'Home'
        );
    }
}
