<?php

namespace app\models;

use core\Db;

class Category extends AppModel
{
    public function getCategory($cat, $lang)
    {
        $params = [
            'cat' => $cat,
            'lang' => $lang,
        ];
        return Db::row('SELECT c.*, cd.* FROM category c JOIN category_description cd ON c.id = cd.category_id WHERE slug = :cat AND language_id = :lang', $params);
    }

    public function getIds($categoryId, $categories)
    {
        $ids = '';
        foreach ($categories as $k => $v) {
            if ($v['parent_id'] == $categoryId) {
                $ids .= $k . ',';
                $ids .= $this->getIds($k, $categories);
            }
        }
        return $ids;
    }

    public function getProducts($lang, $ids)
    {
        return $all = Db::row("SELECT p.*, pd.* FROM product p JOIN product_description pd ON p.id = pd.product_id WHERE p.category_id IN ($ids) AND pd.language_id = ? ORDER BY id", $lang);
    }
}
