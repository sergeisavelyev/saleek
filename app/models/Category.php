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

    public function getProducts($lang, $ids, $start, $limit)
    {
        $order_values = [
            'title_asc' => 'ORDER BY title ASC',
            'title_desc' => 'ORDER BY title DESC',
            'price_asc' => 'ORDER BY price ASC',
            'price_desc' => 'ORDER BY price DESC',
        ];
        $order = '';
        if (isset($_GET['sort']) && array_key_exists($_GET['sort'], $order_values)) {
            $order = $order_values[$_GET['sort']];
        }
        return Db::row("SELECT p.*, pd.* FROM product p JOIN product_description pd ON p.id = pd.product_id WHERE p.category_id IN ($ids) AND pd.language_id = ? $order LIMIT $start, $limit", $lang);
    }

    public function getCountProducts($ids)
    {
        return Db::column("SELECT COUNT(*) FROM product WHERE category_id IN ($ids)");
    }
}
