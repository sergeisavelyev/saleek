<?php

namespace app\controllers;

use core\App;
use core\Pagination;

class SearchController extends AppController
{
    public function indexAction()
    {
        $search = get('search', 's');
        $lang = App::$app->getProperty('language');

        $countProducts = $this->model->getCountProducts($search, $lang['language_id']);
        $perpage = 6;
        $page = get('page');
        $pagination = new Pagination($page, $countProducts, $perpage);
        $startProduct = $pagination->getStart();
        $products = $this->model->search($search, $lang['language_id'], $startProduct, $perpage);

        $this->set(compact('products', 'search', 'pagination'));
    }

    public function livesearchAction()
    {
        $search = $_POST['search'];
        $lang = App::$app->getProperty('language');
        if (!empty($search)) {
            $results = $this->model->search($search, $lang['language_id'], 0, 10);
            if ($results) {
                $str = '<ul class="list-group">';
                $i = 1;
                foreach ($results as $product) {
                    $str .= "<li class='list-group-item'><a href='" . base_url() . "product/{$product['id']}'>{$product['title']}</a></li>";
                    $i++;
                    if ($i > 9) {
                        $str .= "<button id='search' action='search' class='mt-4 btn btn-outline-secondary'>" . ___('tpl_max_search') . "</button>";
                        break;
                    }
                }
                $str .= '</ul>';
                echo $str;
            } else {
                echo "<h1>" . ___('tpl_search_not_found') .  "</h1>";
            }
        }
        die;
    }
}
