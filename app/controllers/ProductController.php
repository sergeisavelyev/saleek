<?php

namespace app\controllers;

use core\App;

class ProductController extends AppController
{
    public function viewAction()
    {
        $this->setMeta(___('product_view_meta_title'), ___('product_view_meta_description'), ___('product_view_meta_keywords'));
        $productInfo = $this->model->getProduct($this->route['id'], App::$app->getProperty('language')['language_id']);
        $productImg = $this->model->getImages($this->route['id']);
        $this->set(compact('productInfo', 'productImg'));
    }
}
