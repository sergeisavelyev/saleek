<?php

namespace app\controllers;

use core\App;

class SearchController extends AppController
{
    public function livesearchAction()
    {
        $search = $_POST['search'];
        $lang = App::$app->getProperty('language');
        if (!empty($search)) {
            $results = $this->model->search($search, $lang['language_id']);
            if ($results) {
                $str = '<ul class="list-group">';
                $i = 1;
                foreach ($results as $product) {
                    $str .= "<li class='list-group-item'><a href='" . base_url() . "product/{$product['id']}'>{$product['title']}</a></li>";
                    $i++;
                    if ($i > 10) {
                        $str .= "<button id='search' class='mt-4 btn btn-outline-secondary'>" . ___('tpl_max_search') . "</button>";
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
