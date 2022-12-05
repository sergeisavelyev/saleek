<?php

namespace app\models;

use core\Db;

class Product extends AppModel
{
    public function getProduct($id, $language)
    {
        $params = [
            'id' => $id,
            'language' => $language,
        ];
        return Db::row('SELECT p.*, pd.* FROM product p JOIN product_description pd ON p.id = pd.product_id WHERE id = :id AND language_id = :language ', $params);
    }

    public function getImages($id)
    {
        return Db::row('SELECT image FROM product_images WHERE product_img_id = ?', $id);
    }
}
