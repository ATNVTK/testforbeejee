<?php

use core\BaseController;

class AdminController extends BaseController
{
    public function actionLogin()
    {
        if (isset($_POST['admin']) && isset($_POST['password']))
        {
            if (\Models\AdminModel::checkUser($_POST['admin'], $_POST['password']))
            {
                $_SESSION['user'] = $_POST['admin'];
                header('Location: ' . '/task/index');
                exit();
            }
            else
            {
                echo '<H3>Неправильные реквизиты доступа</H3>';
            }
        }
        return $this->render('login', []);
    }

    public function actionLogout()
    {
        unset($_SESSION['user']);
        header('Location: ' . '/admin/login');
        exit();
    }
}