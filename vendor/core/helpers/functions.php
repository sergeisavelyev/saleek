<?php

use core\App;

function debug($data, $die = 0)
{
    echo '<pre>' . print_r($data, 1) . '</pre>';
    if ($die) {
        die;
    }
}

function h($str)
{
    return htmlspecialchars($str);
}

function redirect($http = false)
{
    if ($http) {
        $redirect = $http;
    } else {
        $redirect = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : PATH;
    }
    header("Location: $redirect");
    die;
}

function base_url()
{
    return PATH . '/' . (\core\App::$app->getProperty('lang') ? \core\App::$app->getProperty('lang') . '/' : '');
}

/**
 * @param string $key Key of GET Array
 * @param string $type Values 'i', 'f', 's'
 * @return int|float|string
 */

function get($key, $type = 'i')
{
    $param = $key;
    $$param = $_GET[$param] ?? '';
    if ($type == 'i') {
        return (int)$$param;
    } elseif ($type == 'f') {
        return (float)$$param;
    } else {
        return trim($$param);
    }
}

/**
 * @param string $key Key of POST Array
 * @param string $type Values 'i', 'f', 's'
 * @return int|float|string
 */

function post($key, $type = 's')
{
    $param = $key;
    $$param = $POST[$param] ?? '';
    if ($type == 'i') {
        return (int)$$param;
    } elseif ($type == 'f') {
        return (float)$$param;
    } else {
        return trim($$param);
    }
}

function __($key)
{
    echo core\Language::get($key);
}

function ___($key)
{
    return core\Language::get($key);
}
