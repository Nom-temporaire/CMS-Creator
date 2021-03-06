<?php

namespace App\Controller;

use App\Manager\ImageManager;
use App\Fram\Factories\PDOFactory;

class PostController extends BaseController
{
    public function executePost()
    {
        $this->image = new ImageManager(PDOFactory::getMysqlConnection());

        $this->chemin = $this->image->getChemin($this->params['id'])[0];

        if ($this->chemin == null) {
            $this->urlimage = null;
        }
        else{
            $this->urlimage = '/public/images/' . $this->chemin;
        }
        
        $this->render(
            'post.php',
            [
                'id' => $this->params['id'],
                'urlimage' => $this->urlimage,
            ],
            'CMS-Creator - Post'
        );
    }
}