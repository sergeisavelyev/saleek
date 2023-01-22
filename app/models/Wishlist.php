<?php

namespace app\models;

use core\Db;

class Wishlist extends AppModel
{
    public function get_product_id($id)
    {
        return Db::column('SELECT id FROM product WHERE id = ?', $id);
    }

    public function add_to_wishlist($id)
    {
        $wishlist = self::get_wishlist_ids();
        if (!$wishlist) {
            setcookie('wishlist', $id, time() + 3600 * 24 * 7, '/');
        } else {
            if (!in_array($id, $wishlist)) {
                if (count($wishlist) > 9) {
                    array_shift($wishlist);
                }
                $wishlist[] = $id;
                $wishlist = implode(',', $wishlist);
                setcookie('wishlist', $wishlist, time() + 3600 * 24 * 7, '/');
            }
        }
    }

    public static function get_wishlist_ids()
    {
        $wishlist = $_COOKIE['wishlist'] ?? '';
        if ($wishlist) {
            $wishlist = explode(',', $_COOKIE['wishlist']);
        }
        if (is_array($wishlist)) {
            $wishlist = array_slice($wishlist, 0, 6);
            $wishlist = array_map('intval', $wishlist);
            return $wishlist;
        }
        return [];
    }
}
