<?php

namespace app\models;

use core\App;

class Breadcrumbs extends AppModel
{
    public static function getBreadcrumbs($categoryId, $name = '')
    {
        $cats = App::$app->getProperty('categories');
        $breadcrumbs_array = self::getParts($categoryId, $cats);
        $breadcrumbs = "<li class='breadcrumb-item'><a href='" . base_url() . "'>" . ___('tpl_breadcrumbs_home') . "</a></li>";
        if (isset($breadcrumbs_array)) {
            foreach ($breadcrumbs_array as $slug => $title) {
                $breadcrumbs .= "<li class='breadcrumb-item'><a href='category/{$slug}'>{$title}</a></li>";
            }
        }
        if ($name) {
            $breadcrumbs .= "<li class='breadcrumb-item active' aria-current='page'>" . $name . "</li>";
        }
        return $breadcrumbs;
    }

    public static function getParts($id, $cats)
    {
        $breadcrumbs = [];
        if (!$id) {
            return false;
        }
        foreach ($cats as $k => $v) {
            if (isset($cats[$id])) {
                $breadcrumbs[$cats[$id]['slug']] = $cats[$id]['title'];
                $id = $cats[$id]['parent_id'];
            } else {
                break;
            }
        }
        return array_reverse($breadcrumbs, true);
    }
}
