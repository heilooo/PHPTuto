<?php

namespace AdminDashboard;
require_once realpath(dirname(__FILE__) . '/Database.php');

use DataBase\DataBase;

class Home
{
    public function index()
    {
        $db = new DataBase();
        $articles = $db->select("SELECT articles.*, (SELECT COUNT(*) FROM comments WHERE comments.article_id = articles.id) AS comments_count, (SELECT username FROM users WHERE users.id = articles.user_id) AS username FROM articles  ORDER BY `created_at` DESC LIMIT 0,6 ;")->fetchAll();

        $popularArticles = $db->select("SELECT articles.*, (SELECT COUNT(*) FROM comments WHERE comments.article_id = articles.id) AS comments_count, (SELECT username FROM users WHERE users.id = articles.user_id) AS username FROM articles  ORDER BY `view` DESC LIMIT 0,4 ;")->fetchAll();

        $sidebarPopularArticles = $popularArticles;

        $categories = $db->select('SELECT * FROM `categories` ORDER BY `id` DESC ;');

        $menus = $db->select('SELECT *, (SELECT COUNT(*) FROM `menus` AS `submenus` WHERE `submenus`.`parent_id` = `menus`.`id`  ) as `submenu_count`  FROM `menus` WHERE `parent_id` IS NULL ;')->fetchAll();

        $submenus = $db->select('SELECT * FROM `menus` WHERE `parent_id` IS NOT NULL ;')->fetchAll();

        require_once (realpath(dirname(__FILE__) . "/../template/app/index.php"));
    }

    public function show($id)
    {

    }

    public function category($id)
    {

    }

    public function commentStore($request)
    {

    }

    public function redirectBack()
    {
        header("location: " . $_SERVER['HTTP_REFERER']);
    }
}