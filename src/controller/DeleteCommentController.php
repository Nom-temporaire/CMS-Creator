<?php

namespace App\Controller;

class DeleteCommentController extends BaseController
{
    public function executeDeleteComment()
    {
        $this->render(
            'deletecomment.php',
            ['id'=>$this->params['id'],],
            'Delete the comment !'
        );
    }
}