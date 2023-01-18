<?php

namespace app\models;

use core\Db;

class Search extends AppModel
{
    public function search($str, $lang, $start, $perpage)
    {
        $params = [
            'str' => "%$str%",
            'lang' => $lang,
        ];
        return Db::row("SELECT p.*, pd.* FROM product p JOIN product_description pd ON p.id = pd.product_id WHERE title LIKE :str AND language_id = :lang LIMIT $start, $perpage", $params);
    }

    public function getCountProducts($str, $lang)
    {
        $params = [
            'str' => "%$str%",
            'lang' => $lang,
        ];
        return Db::column("SELECT COUNT(*) FROM product p JOIN product_description pd ON p.id = pd.product_id WHERE title LIKE :str AND language_id = :lang", $params);
    }
}
