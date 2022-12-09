<?php

namespace app\controllers;

class CategoryController extends AppController
{
    public function viewAction()
    {
        $products = $this->model->getProducts(1);
        $this->set(compact('products'));
        $this->setMeta('Категория', 'desc', 'keywords');
    }
}
