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
                $message = 'Success';
                $status = 'success';
            }
            $result = ['status' => $status, 'message' => $message];
            exit(json_encode($result));
        }

        $this->setMeta(___('user_signup_signup_btn'));
    }

    public function loginAction()
    {
    }
}
