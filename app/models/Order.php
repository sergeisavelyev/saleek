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

            Db::commit();
            return $order_id;
        } catch (\Exception $e) {
            Db::rollback();
            return false;
        }
    }
}
