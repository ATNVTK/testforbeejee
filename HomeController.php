<?php

use core\BaseController;

class HomeController extends BaseController
{
    public function actionIndex()
    {
        return $this->render('index');
    }
}