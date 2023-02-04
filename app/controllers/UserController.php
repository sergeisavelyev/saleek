<?php

namespace app\controllers;

use app\models\User;

class UserController extends AppController
{
    public function signupAction()
    {
        if (User::checkAuth()) {
            redirect(base_url());
        }

        if (!empty($_POST)) {
            $data = $_POST;
            $this->model->load($data);
            if (!$this->model->validate($data)) {
                $message = $this->model->getErrors();
                $status = 'error';
            } else {
                $this->model->attributes['password'] = password_hash($this->model->attributes['password'], PASSWORD_DEFAULT);
                if ($this->model->checkUnique()) {
                    $message = ___('user_signup_error_email_unique');
                    $status = 'error';
                } else {
                    if ($this->model->save('users')) {
                        $message = ___('user_signup_success_register');
                        $status = 'success';
                    } else {
                        $message = ___('user_signup_error_register');
                        $status = 'error';
                    }
                }
            }
            $result = ['status' => $status, 'message' => $message];
            exit(json_encode($result));
        }

        $this->setMeta(___('user_signup_btn'));
    }

    public function loginAction()
    {
        if (User::checkAuth()) {
            redirect(base_url());
        }

        if (!empty($_POST)) {
            if ($this->model->login()) {
                $message = ___('user_login_success_login');
                $status = 'success';
            } else {
                $message = ___('user_login_error_login');
                $status = 'error';
            }
            $result = ['status' => $status, 'message' => $message];
            exit(json_encode($result));
        }

        $this->setMeta(___('user_login'));
    }
}
