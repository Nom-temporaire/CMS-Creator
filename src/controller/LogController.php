<?php

namespace App\Controller;

class LogController extends BaseController
{
    public function executeLog()
    {
        $this->render(
            'log.php',
            [],
            'Log?'
        );
    }
}
