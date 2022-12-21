<?php

namespace core;

class Pagination
{
    public $total;
    public $perpage;
    public $countPages;
    public $currentPage;
    public $uri;

    public function __construct($page, $total, $perpage)
    {
        $this->total = $total;
        $this->perpage = $perpage;
        $this->countPages = $this->getCountPages();
        $this->currentPage = $this->getCurrentPage($page);
        $this->uri = $this->getParams();
    }

    public function getHtml()
    {
        $back = null;
        $forward = null;
        $start = null;
        $end = null;
        $left1 = null;
        $right1 = null;
        $left2 = null;
        $right2 = null;
    }

    public function getLink($page)
    {
        if ($page == 1) {
            return rtrim($this->uri, '?&');
        }
        if (str_contains($this->uri, '&')) {
            return $this->uri . "page={$page}";
        } else {
            if (str_contains($this->uri, '?')) {
                return $this->uri . "page={$page}";
            } else {
                return $this->uri . "?page={$page}";
            }
        }
    }

    public function getStart()
    {
        return ($this->currentPage - 1) * $this->perpage;
    }

    public function getCountPages()
    {
        return ceil($this->total / $this->perpage) ?: 1;
    }

    public function getCurrentPage($page)
    {
        if (!$page || $page < 1) $page = 1;
        if ($page > $this->countPages) $page = $this->countPages;
        return $page;
    }

    public function getParams()
    {
        $url = $_SERVER['REQUEST_URI'];
        $url = explode('?', $url);
        $uri = $url[0];
        if (isset($url[1]) && $url[1] != '') {
            $uri .= '?';
            $params = explode('&', $url[1]);
            foreach ($params as $param) {
                if (!preg_match('#page=#', $param)) $uri .= "{$param}&";
            }
        }
        return $uri;
    }
}
