<?php

namespace app\models;

use core\Db;

class Order extends AppModel
{
    public static function saveOrder($data): int|false
    {
        Db::begin();
        try {
            $params = [
                'user_id' => $data['user_id'],
                'note' => $data['note'],
                'total' => $_SESSION['cart.sum'],
            ];
            Db::query("INSERT INTO orders (user_id, note, total) VALUE (:user_id, :note, :total)", $params);
            $order_id = Db::lastId();
            self::saveOrderProduct($order_id);

            Db::commit();
            return $order_id;
        } catch (\Exception $e) {
            Db::rollback();
            return false;
        }
    }

    public static function saveOrderProduct($order_id)
    {
        foreach ($_SESSION['cart'] as $product_id => $product) {
            $params = [
                'order_id' => $order_id,
                'product_id' => $product_id,
                'title' => $product['title'],
                'price' => $product['price'],
                'sum' => $product['price'],
            ];
            Db::query("INSERT INTO order_product (order_id, product_id, title, price, sum) VALUE (:order_id, :product_id, :title, :price, :sum)", $params);
        }
    }
}
