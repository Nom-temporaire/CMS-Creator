<?php

namespace App\Controller;

class DeletePostController extends BaseController
{
    public function executeDeletePost()
    {
        $this->render(
            'deletepost.php',
            [
                'id'=>$this->params['id'],
            ],
            'Delete the post !'
        );
    }
}