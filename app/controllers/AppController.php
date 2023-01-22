<?php

namespace app\controllers;

use app\models\Wishlist;
use app\widgets\language\Language;
use core\App;
use core\Controller;
use core\Db;

class AppController extends Controller
{
    public function __construct($route)
    {
        parent::__construct($route);
        App::$app->setProperty('languages', Language::getLanguages());
        App::$app->setProperty('language', Language::getLanguage(App::$app->getProperty('languages')));

        $lang = App::$app->getProperty('language');

        $categories = Db::unique('SELECT c.*, cd.* FROM category c 
            JOIN category_description cd ON c.id = cd.category_id 
            WHERE language_id = ?', $lang['language_id']);
        App::$app->setProperty('categories', $categories);

        App::$app->setProperty('wishlist', Wishlist::get_wishlist_ids());

        \core\Language::load($lang['code'], $this->route);
    }
}
