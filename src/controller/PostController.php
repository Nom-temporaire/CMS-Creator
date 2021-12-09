<?php

namespace App\Controller;

class PostController extends BaseController
{
    public function executePost()
    {
        $this->render(
            'post.php',
            [
                'id'=>$this->params['id'],
            ],
            'Bonne Route'
        );
    }
}