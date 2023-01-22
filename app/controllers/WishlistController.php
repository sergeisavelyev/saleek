<?php

namespace app\controllers;

use core\App;

class WishlistController extends AppController
{
    public function indexAction()
    {
        $lang = App::$app->getProperty('language');
        $products = $this->model->get_wishlist_products($lang);
        $this->setMeta(___('wishlist_index_title'));
        $this->set(compact('products'));
    }

    public function addAction()
    {
        $id = get('id');
        if (!$id) {
            $result = ['status' => 'error', 'message' => 'Произошла ошибка'];
            exit(json_encode($result));
        }

        $productId = $this->model->get_product_id($id);

        if ($productId) {
            $result = [
                'status' => 'success',
                'message' => ___('tpl_added_to_wishlist'),
                'newText' => '<i class="fa-solid fa-heart-crack"></i> ' . ___('tpl_delete_from_wishlist'),
            ];
            $this->model->add_to_wishlist($productId);
        } else {
            $result = ['status' => 'error', 'message' => 'Произошла ошибка'];
        }
        exit(json_encode($result));
    }

    public function deleteAction()
    {
        $id = get('id');
        die;
    }
}
