<?php

namespace app\controllers;

use app\core\Controller;
use app\lib\Db;
use app\models\Task;

class TaskController extends Controller
{
    /**
     * Main page
     */
    public function IndexAction()
    {
        $this->view->render('Main page site', [
            'tasks' => $this->model->getTasks(),
        ]);
    }

    /**
     * To show create form
     */
    public function CreateAction()
    {
        $this->view->render('Create new task');
    }

    /**
     * Action to store new task
     * get data from create view form
     */
    public function StoreAction()
    {
        if(isset($_POST['submit']))
        {
            if(isset($_POST['name'],$_POST['email'],$_POST['body']) && !empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['body']))
            {
                $name = trim($_POST['name']);
                $email = trim($_POST['email']);
                $body = trim($_POST['body']);

                if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $sql = "INSERT INTO `tasks` (`name`, `email`, `body`, `status`) VALUES (':name', ':email', ':body', ':status')";
                    try {
                        $params = [
                            'name' => $name,
                            'email' => $email,
                            'body' => $body,
                            'status' => Task::$STATUS['new'],
                        ];
                        $handle = $this->model->query($sql, $params);

                        $success = 'Task has been created successfully';

                    } catch (PDOException $e) {
                        $errors[] = $e->getMessage();
                    }
                }
                else
                {
                    $errors[] = "Email address is not valid";
                }

                $this->view->redirect('/');
    }


}