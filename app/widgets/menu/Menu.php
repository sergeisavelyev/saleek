<?php

namespace app\widgets\menu;

use core\App;
use core\Cache;
use core\Db;

class Menu
{
    protected $data;
    protected $tree;
    protected $menuHtml;
    protected $tpl = __DIR__ . '/menu_tpl.php';
    protected $container = 'ul';
    protected $class = 'menu-list';
    protected $cache = 1000;
    protected $cacheKey = 'saleek_menu';
    protected $attrs = [];
    protected $prepend = '';
    protected $language;
    protected $maxLevel;
    protected $route;

    public function __construct($options = [])
    {
        $this->language = App::$app->getProperty('language');
        $this->getOptions($options);
        $this->run();
    }

    protected function getOptions($options)
    {
        foreach ($options as $k => $v) {
            if (property_exists($this, $k)) {
                $this->$k = $v;
            }
        }
    }

    protected function run()
    {
        $cache = Cache::getInstance();
        $this->menuHtml = $cache->get("{$this->cacheKey}_{$this->language['code']}");

        if (!$this->menuHtml) {
            $this->data = Db::unique('SELECT c.*, cd.* FROM category c 
            JOIN category_description cd ON c.id = cd.category_id 
            WHERE language_id = ?', $this->language['language_id']);
            $this->tree = $this->getTree();
            $this->menuHtml = $this->getMenuHtml($this->tree);
            if ($this->cache) {
                $cache->set("{$this->cacheKey}_{$this->language['code']}", $this->menuHtml, $this->cache);
            }
        }
        $this->output();
    }

    protected function output()
    {
        $attrs = '';
        if (!empty($this->attrs)) {
            foreach ($this->attrs as $k => $v) {
                $attrs .= " $k='$v' ";
            }
        }
        echo "<{$this->container} class='{$this->class}' $attrs >";
        echo $this->prepend;
        echo $this->menuHtml;
        echo "</{$this->container}>";
    }

    protected function getTree()
    {
        $tree = [];
        $data = $this->data;

        foreach ($data as $id => &$node) {
            if (!$node['parent_id']) {
                $tree[$id] = &$node;
            } else {
                $data[$node['parent_id']]['children'][$id] = &$node;
            }
        }
        return $tree;
    }

    protected function getMenuHtml($tree, $tab = '')
    {
        $str = '';
        foreach ($tree as $id => $category) {
            $str .= $this->catToTemplate($category, $tab, $id);
        }
        return $str;
    }

    protected function catToTemplate($category, $tab, $id)
    {
        ob_start();
        require $this->tpl;
        return ob_get_clean();
    }
}
