<?php

namespace App\Controller;


abstract class BaseController
{
    private $templateFile = __DIR__ . './../view/template.php';
    private $templateFileImage = __DIR__ . './../view/imageTemplate.php';
    private $viewsDir = __DIR__ . './../view/Frontend/';
    private $imagesDir = __DIR__ . './../public/images/';
    protected $params;

    public function __construct(string $action, array $params = [])
    {
        $this->params = $params;

        $method = 'execute' . ucfirst($action);
        if (is_callable([$this, $method])) {
            $this->$method();
        }
    }

    public function render(string $template, array $arguments, string $title)
    {
        $view = $this->viewsDir . $template;

        foreach ($arguments as $key => $value) {
            ${$key} = $value;
        }


        ob_start();
        require $view;
        $content = ob_get_clean();
        require $this->templateFile;
        exit;
    }

    public function renderImage(string $template, array $arguments, string $title)
    {
        $view = $this->imagesDir . $template;

        foreach ($arguments as $key => $value) {
            ${$key} = $value;
        }


        ob_start();
        require $view;
        $content = ob_get_clean();
        require $this->templateFileImage;
        exit;
    }
}
