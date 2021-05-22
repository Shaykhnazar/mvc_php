<?php

namespace app\controllers;

use app\core\Controller;
use app\lib\Db;

class AccountController extends Controller
{
    /**
     * Dashboard
     */
    public function DashboardAction()
    {
        $this->view->render('Dashboard page site');
    }

    /**
     * @return void
     */
    public function LoginAction()
    {
        
        $this->view->render('Login page site');
    }

    /**
     * @return void
     */
    public function RegisterAction()
    {
        $this->view->render('Register page site');
    }

    /**
     * @return void
     */
    public function LogoutAction()
    {
        session_start();
        // Destroying All Sessions
        if(session_destroy())
        {
            // Redirecting To Home Page
            $this->view->redirect('/account/login');
        }
    }

    /**
     * SignIn logic here
     */
    private function signinAction()
    {
        session_start();
        if(isset($_POST['submit']))
        {
            if(isset($_POST['email'],$_POST['password']) && !empty($_POST['email']) && !empty($_POST['password']))
            {
                $email = trim($_POST['email']);
                $password = trim($_POST['password']);

                if(filter_var($email, FILTER_VALIDATE_EMAIL))
                {
                    $sql = "select `password` from users where email = :email ";
                    $handle = $this->model->query($sql, ['email' => $email]);

                    if($handle->rowCount() > 0)
                    {
                        $getRow = $handle->fetch(PDO::FETCH_ASSOC);
                        if(password_verify($password, $getRow['password']))
                        {
                            unset($getRow['password']);
                            $_SESSION = $getRow;
                            $this->view->redirect('/');
                        }
                        else
                        {
                            $errors[] = "Wrong Email or Password";
                        }
                    }
                    else
                    {
                        $errors[] = "Wrong Email or Password";
                    }

                }
                else
                {
                    $errors[] = "Email address is not valid";
                }

            }
            else
            {
                $errors[] = "Email and Password are required";
            }

        }
    }

    /**
     * Signup logic here
     */
    public function signupAction()
    {
        session_start();
        if(isset($_POST['submit']))
        {
            if(isset($_POST['username'],$_POST['email'],$_POST['password']) && !empty($_POST['username']) && !empty($_POST['email']) && !empty($_POST['password']))
            {
                $username = trim($_POST['username']);
                $email = trim($_POST['email']);
                $password = trim($_POST['password']);

                $hashPassword = md5($password);
                $date = date('Y-m-d H:i:s');

                if(filter_var($email, FILTER_VALIDATE_EMAIL))
                {
                    $sql = 'select `email` from users where email = :email';
                    $stmt = $this->model->query($sql, ['email' => $email]);

                    if($stmt->rowCount() == 0)
                    {
                        $sql = "insert into users (username, email, password, trn_date) values(:username,:email,:password,:trn_date)";

                        try{
                            $params = [
                                ':username'=>$username,
                                ':email'=>$email,
                                ':pass'=>$hashPassword,
                                ':trn_date'=>$date,
                            ];
                            $handle = $this->model->query($sql, $params);

                            $success = 'User has been created successfully';

                        }
                        catch(PDOException $e){
                            $errors[] = $e->getMessage();
                        }
                    }
                    else
                    {
                        $valUsername = $username;
                        $valEmail = '';
                        $valPassword = $password;

                        $errors[] = 'Email address already registered';
                    }
                }
                else
                {
                    $errors[] = "Email address is not valid";
                }
            }
            else
            {
                if(!isset($_POST['username']) || empty($_POST['username']))
                {
                    $errors[] = 'Username is required';
                }
                else
                {
                    $valUsername = $_POST['username'];
                }

                if(!isset($_POST['email']) || empty($_POST['email']))
                {
                    $errors[] = 'Email is required';
                }
                else
                {
                    $valEmail = $_POST['email'];
                }

                if(!isset($_POST['password']) || empty($_POST['password']))
                {
                    $errors[] = 'Password is required';
                }
                else
                {
                    $valPassword = $_POST['password'];
                }

            }

        }
    }
}