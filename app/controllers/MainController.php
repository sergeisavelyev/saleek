<?php

namespace app\controllers;

use core\App;

class MainController extends AppController
{
    public function indexAction()
    {
        $this->setMeta(___('main_index_meta_title'), ___('main_index_meta_description'), ___('main_index_meta_keywords'));
        $products = $this->model->getProducts(App::$app->getProperty('language')['language_id']);
        $this->set(compact('products'));
    }
}
