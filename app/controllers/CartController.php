<?php

namespace app\controllers;

use app\controllers\AppController;
use app\models\Order;
use app\models\User;
use core\App;

class CartController extends AppController
{
    public function addAction()
    {
        $id = get('id');
        $lang = App::$app->getProperty('language');

        if (!$id) {
            return false;
        }
        $product = $this->model->getProduct($id, $lang['language_id'])[0];
        if (!$product) {
            return false;
        }
        $this->model->addToCart($product);
        if ($this->isAjax()) {
            $this->loadView('cart_modal');
        }
        redirect();
        return true;
    }

    public function deleteAction()
    {
        $id = get('id');
        if (!$id) {
            return false;
        }
        $this->model->deleteFromCart($id);
        if ($this->isAjax()) {
            $this->loadView('cart_modal');
        }
        redirect();
        return true;
    }

    public function showAction()
    {
        $this->loadView('cart_modal');
    }

    public function clearAction()
    {
        if (empty($_SESSION['cart'])) {
            return false;
        }
        unset($_SESSION['cart'], $_SESSION['cart.sum']);
        $this->loadView('cart_modal');
        return true;
    }

    public function viewAction()
    {
        $this->setMeta(___('tpl_cart'));
    }

    public function checkoutAction()
    {
        if (!empty($_POST)) {
            if (!User::checkAuth()) {
                $data = $_POST;
                $user = new User;
                $user->load($data);
                if (!$user->validate($data)) {
                    $this->getResponce('error', $user->getErrors());
                } else {
                    if ($user->checkUnique()) {
                        $this->getResponce('error', 'tpl_user_signup_error_email_unique');
                    } else {
                        $user->attributes['password'] = password_hash($user->attributes['password'], PASSWORD_DEFAULT);
                        if (!$user_id = $user->save('users')) {
                            $this->getResponce('error', 'cart_checkout_error_register');
                        } else {
                            $this->getResponce('success', 'cart_checkout_order_success');
                        }
                    }
                }
            }

            // $data['user_id'] = $user_id ?? $_SESSION['user']['id'];
            // $data['note'] = $_POST['note'];
            // $user_email = $_SESSION['user']['email'] ?? $_POST['email'];

            // if (!$order_id = Order::saveOrder($data)) {
            //     $message = ___('cart_checkout_error_save_order');
            //     $status = 'error';
            // } else {
            //     $message = ___('cart_checkout_order_success');
            //     $status = 'success';
            // }


            $this->pushResponce();
        }
    }
}
