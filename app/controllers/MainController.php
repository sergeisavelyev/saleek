<?php

namespace app\controllers;


class MainController extends AppController
{
    public function indexAction()
    {
        $this->setMeta('Главная страница', 'Описание', 'Keywords');
        $products = $this->model->getProducts();
        $this->set(compact('products'));
    }
}
