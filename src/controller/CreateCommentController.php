<?php

namespace App\Controller;

class CreateCommentController extends BaseController
{
    public function executeCreateComment()
    {
        $this->render(
            'createcomment.php',
            [],
            'Create the comment !'
        );
    }
}