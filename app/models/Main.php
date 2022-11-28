<?php

namespace app\models;

use core\Db;

class Main extends AppModel
{
    public function getProducts($lang)
    {
        $params = [
            'lang' => $lang,
        ];
        $all = Db::row('SELECT p.*, pd.* FROM product p JOIN product_description pd ON p.id = pd.product_id WHERE pd.language_id = :lang ORDER BY id  LIMIT 6', $params);
        return $all;
    }
}
