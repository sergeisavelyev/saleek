<?php

namespace app\widgets\carousel;

use core\Db;

class Carousel
{
    protected $id;
    protected $tpl;
    protected $images = [];

    public function __construct($id)
    {
        $this->tpl = __DIR__ . '/carousel_tpl.php';
        $this->id = $id;
        $this->getImages($this->id);
        // debug($this->images);
        echo $this->getHtml();
    }

    protected function getImages($id)
    {
        $this->images = Db::row('SELECT * FROM product_images WHERE product_img_id = ?', $id);
    }

    protected function getHtml()
    {
        ob_start();
        require_once $this->tpl;
        return ob_get_clean();
    }
}
