<?php

namespace app\models;

use core\Db;

class Search extends AppModel
{
    public function search($str, $lang)
    {
        $params = [
            'str' => "%$str%",
            'lang' => $lang,
        ];
        return Db::row("SELECT p.*, pd.* FROM product p JOIN product_description pd ON p.id = pd.product_id WHERE title LIKE :str AND language_id = :lang", $params);
    }
}
