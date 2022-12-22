<?php

namespace app\controllers;

use core\App;
use core\Pagination;

class CategoryController extends AppController
{
    public function viewAction()
    {
        $lang = App::$app->getProperty('language')['language_id'];
        $categoryId = $this->model->getCategory($this->route['slug'], $lang);

        if (!$categoryId) {
            $this->error_404();
        }

        $categories = App::$app->getProperty('categories');
        $ids = $this->model->getIds($categoryId[0]['id'], $categories);
        $ids = !$ids ? $categoryId[0]['id'] : $ids .= $categoryId[0]['id'];

        $countProducts = $this->model->getCountProducts($ids);
        $page = get('page');
        $perpage = 6;
        $pagination = new Pagination($page, $countProducts, $perpage);
        $startProduct = $pagination->getStart();
        $paginationHtml = $pagination->getHtml();

        $products = $this->model->getProducts($lang, $ids, $startProduct, $perpage);
        $this->setMeta($categories[$categoryId[0]['id']]['title'], 'desc', 'keywords');
        $this->set(compact('products', 'paginationHtml'));
    }
}
