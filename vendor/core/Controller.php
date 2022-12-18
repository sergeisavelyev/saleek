<?php

namespace core;

abstract class Controller
{
    public array $data = [];
    public array $meta = [];
    public string $view = '';
    public false|string $layout = '';
    public object $model;

    public function __construct(public $route = [])
    {
    }

    public function getModel()
    {
        $model = 'app\models\\' . $this->route['admin_prefix'] . $this->route['controller'];
        if (class_exists($model)) {
            $this->model = new $model();
        }
    }

    public function getView()
    {
        $this->view = $this->view ?: $this->route['action'];
        (new View($this->route, $this->layout, $this->view, $this->meta))->render($this->data);
    }

    public function set($data)
    {
        $this->data = $data;
    }

    public function setMeta($title = '', $description = '', $keywords = '')
    {
        $this->meta = [
            'title' => $title,
            'description' => $description,
            'keywords' => $keywords,
        ];
    }

    public function isAjax(): bool
    {
        return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest';
    }

    public function loadView($file, $vars = [])
    {
        extract($vars);
        $prefix = str_replace('\\', '/', $this->route['admin_prefix']);
        require APP . "/views/{$prefix}{$this->route['controller']}/{$file}.php";
        die;
    }

    public function error_404($folder = 'Error', $responce = 404, $view = 404)
    {
        http_response_code($responce);
        $this->route['controller'] = $folder;
        $this->view = $view;
    }
}
