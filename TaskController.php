<?php

use core\BaseController;
use Models\Task;

class TaskController extends BaseController
{
    public function actionCreate()
    {
        $model = new \Models\Task();
        if (isset($_POST['user_name']) && isset($_POST['email']) && isset($_POST['text'])) {
            if ($_POST['user_name'] && $_POST['email'] && $_POST['text']) {
                $model->user_name = $_POST['user_name'];
                $model->email = $_POST['email'];
                $model->text = $_POST['text'];
                $model->status_id = 0;
                $model->is_updated = 0;
                $model->save();
                $_SESSION['message'] = 'Задача сохранена!';
                header('Location: ' . '/task/index');
                exit();
            } else {
                $_SESSION['message'] = 'Обязательные поля не заполнены!';
            }

        }
        return $this->render('create', ['model' => $model]);
    }

    public function actionIndex()
    {
        $tasks = Task::findAll();
        return $this->render('index', ['tasks' => $tasks]);
    }
    public function actionUpdate()
    {
        if(!(\core\Application::get_app())->user->isGuest) {
            if (isset($_GET['id']) && $id = $_GET['id']) {
                $model = Task::findOne(['id' => $id]);
                if (isset($_POST['text'])) {
                    if (($model->text != $_POST['text']) || (!isset($_POST['status_id']) && $model->status_id) || (isset($_POST['status_id']) && ($model->status_id != $_POST['status_id']))) {
                        $model->text = $_POST['text'];
                        $model->status_id = $_POST['status_id'] ?? 0;
                        if (($model->text != $_POST['text'])) {
                            $model->is_updated = 1;
                        }
                        $model->save();
                        $_SESSION['message'] = 'Задача сохранена!';
                    }

                    header('Location: ' . '/task/index');
                    exit();
                }
                return $this->render('update', ['model' => $model]);
            }
        }
        else {
            header('Location: ' . '/admin/login');
            exit();
        }
    }
}