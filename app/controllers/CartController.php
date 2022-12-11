<?php

namespace app\controllers;

use app\controllers\AppController;
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
        redirect();
    }

    public function showAction()
    {
        $this->loadView('cart_modal');
    }
}
