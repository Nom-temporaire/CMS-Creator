<?php

namespace App\Controller;

class ListController extends BaseController
{
    public function executeList()
    {
        $this->render(
            'list.php',
            [],
            'Bonne Route'
        );
    }
}