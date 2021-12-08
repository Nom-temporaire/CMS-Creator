<?php

namespace App\Controller;

class CreateController extends BaseController
{
    public function executeCreate()
    {
        $this->render(
            'create.php',
            [],
            'Create an User'
        );
    }
}
