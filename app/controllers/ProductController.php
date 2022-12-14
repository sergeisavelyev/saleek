<?php

namespace app\controllers;

use app\models\Breadcrumbs;
use core\App;

class ProductController extends AppController
{
    public function viewAction()
    {
        $this->setMeta(___('product_view_meta_title'), ___('product_view_meta_description'), ___('product_view_meta_keywords'));

        $productInfo = $this->model->getProduct($this->route['id'], App::$app->getProperty('language')['language_id']);

        if (!$productInfo) {
            $this->error_404();
            return;
        }

        $productImg = $this->model->getImages($this->route['id']);
        $breadcrumbs = Breadcrumbs::getBreadcrumbs($productInfo[0]['category_id'], $productInfo[0]['title']);

        $this->set(compact('productInfo', 'productImg', 'breadcrumbs'));
    }
}
