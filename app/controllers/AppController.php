<?php

namespace app\controllers;

use app\widgets\language\Language;
use core\App;
use core\Controller;

class AppController extends Controller
{
    public function __construct($route)
    {
        parent::__construct($route);
        App::$app->setProperty('languages', Language::getLanguages());
        App::$app->setProperty('language', Language::getLanguage(App::$app->getProperty('languages')));

        $lang = App::$app->getProperty('language');
        \core\Language::load($lang['code'], $this->route);
    }
}
