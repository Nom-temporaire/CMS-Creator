<?php

namespace App\Controller;

class PostinputController extends BaseController
{
    public function executePostinput()
    {
        $this->render(
            'postinput.php',
            [],
            'Create a new post'
        );
    }
}