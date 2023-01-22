<?php

namespace app\controllers;

class WishlistController extends AppController
{
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
                'message' => 'Успешно',
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
    }
}
