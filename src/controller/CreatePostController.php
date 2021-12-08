<?php

namespace App\Controller;

class CreatePostController extends BaseController
{
    public function executeCreatePost()
    {
        $this->render(
            'createpost.php',
            [],
            'Create the post !'
        );
    }
}