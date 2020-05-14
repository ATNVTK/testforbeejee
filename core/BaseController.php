<?php

namespace core;
use core\View;

class BaseController
{
    public $layout = 'layout';
    public $view;

    public function getView()
    {
        if (!isset($this->view)){
            $this->view = new View();
        }
        return $this->view;
    }

    public function render($name, $params=[])
    {
        $view = $this->getView();
        $content = $view->render($name, $params);
        return $view->renderPhpFile($this->layout, ['content'=>$content]);

    }
}