<?php

namespace app\models;

use core\Db;

class Cart extends AppModel
{
    public function getProduct($id, $lang)
    {
        $params = [
            'id' => $id,
            'lang' => $lang,
        ];
        return $product = Db::row('SELECT p.*, pd.* FROM product p JOIN product_description pd ON p.id = pd.product_id WHERE id = :id AND language_id = :lang', $params);
    }

    public function addToCart($product)
    {
        if (isset($_SESSION['cart'][$product['id']])) {
            return false;
        } else {
            $_SESSION['cart'][$product['id']] = [
                'id' => $product['id'],
                'title' => $product['title'],
                'price' => $product['price'],
                'img' => $product['img'],
            ];
            $_SESSION['cart.sum'] = !empty($_SESSION['cart.sum']) ? $_SESSION['cart.sum'] + $product['price'] : $product['price'];
        }
    }

    public function deleteFromCart($deleteId)
    {
        if ($deleteId == 228) {
            unset($_SESSION['cart'], $_SESSION['cart.sum']);
        }
        foreach ($_SESSION['cart'] as $id => $product) {
            if ($deleteId == $id) {
                $_SESSION['cart.sum'] = $_SESSION['cart.sum'] - intval($_SESSION['cart'][$id]['price']);
                unset($_SESSION['cart'][$id]);
            }
        }
    }
}
