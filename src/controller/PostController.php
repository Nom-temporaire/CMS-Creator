<?php

namespace App\Controller;

class PostController extends BaseController
{
    public function executePost()
    {
        $this->render(
            'post.php',
            [],
            'Bonne Route'
        );
    }
}