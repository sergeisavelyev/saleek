<?php

namespace app\models;

use core\Db;

class Main extends AppModel
{
    public function getProducts()
    {
        $all = Db::row('SELECT p.*, pd.* FROM product p JOIN product_description pd ON p.id = pd.product_id WHERE pd.language_id = 1 ORDER BY id  LIMIT 6');
        return $all;
    }
}
