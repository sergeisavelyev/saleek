<?php

namespace core;

class App
{
    public static $app;

    public function __construct()
    {
        $query = trim(urldecode($_SERVER['QUERY_STRING']), '/');
        new ErrorHandler;
        self::$app = Registry::getInstance();
        $this->getParams();
        Router::dispatch($query);
        debug(self::$app->getProperties());
    }

    protected function getParams()
    {
        $params = require_once CONFIG . '/params.php';
        if (!empty($params)) {
            foreach ($params as $k => $v) {
                self::$app->setProperty($k, $v);
            }
        }
    }
}
