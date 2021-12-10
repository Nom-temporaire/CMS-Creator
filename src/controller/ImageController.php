<?php

namespace App\Controller;

use App\Manager\ImageManager;
use App\Fram\Factories\PDOFactory;

class ImageController extends BaseController
{
    public function executeImage()
    {
        $this->image = new ImageManager(PDOFactory::getMysqlConnection());

        $this->chemin = $this->image->getChemin($this->params['id'])[0];
        $this->renderImage(
            $this->chemin,
            [],
            'Image'
        );
    }
}
