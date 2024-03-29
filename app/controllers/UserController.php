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
                $this->getResponce('error', $this->model->getErrors());
            } else {
                $this->model->attributes['password'] = password_hash($this->model->attributes['password'], PASSWORD_DEFAULT);
                if ($this->model->checkUnique()) {
                    $this->getResponce('error', ___('tpl_user_signup_error_email_unique'));
                } else {
                    if ($this->model->save('users')) {
                        $this->getResponce('success', ___('user_signup_success_register'));
                    } else {
                        $this->getResponce('error', ___('user_signup_error_register'));
                    }
                }
            }
            $this->pushResponce();
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
                $this->getResponce('success', ___('user_login_success_login'));
            } else {
                $this->getResponce('error', ___('user_login_error_login'));
            }
            $this->pushResponce();
        }
        $this->setMeta(___('user_login'));
    }

    public function logoutAction()
    {
        if ($this->model->checkAuth()) {
            unset($_SESSION['user']);
            redirect(base_url());
        }
    }

    public function profileAction()
    {
        if (!$this->model->checkAuth()) {
            redirect(base_url());
        }
        $this->setMeta(___('tpl_profile_btn'));
    }

    public function ordersAction()
    {
        if (!$this->model->checkAuth()) {
            redirect(base_url());
        }
        $orders = $this->model->getUserOrders($_SESSION['user']['id']);

        $this->setMeta(___('tpl_profile_orders'));
        $this->set(compact('orders'));
    }

    public function orderAction()
    {
        if (!$this->model->checkAuth()) {
            redirect(base_url());
        }

        $id = get('id');
        $order = $this->model->getUserOrder($id);
        if (!$order) {
            throw new \Exception('Not found order', 404);
        }

        $this->setMeta(___('tpl_user_order_title'));
        $this->set(compact('order'));
    }
}
