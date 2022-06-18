<?php

namespace AdminDashboard;
require_once realpath(dirname(__FILE__) . '/Database.php');

use DataBase\DataBase;

class Home
{
    public function __construct()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }
    public function index()
    {
        $db = new DataBase();
        $articles = $db->select("SELECT articles.*, (SELECT COUNT(*) FROM comments WHERE comments.article_id = articles.id) AS comments_count, (SELECT username FROM users WHERE users.id = articles.user_id) AS username FROM articles  ORDER BY `created_at` DESC LIMIT 0,6 ;")->fetchAll();

        $popularArticles = $db->select("SELECT articles.*, (SELECT COUNT(*) FROM comments WHERE comments.article_id = articles.id) AS comments_count, (SELECT username FROM users WHERE users.id = articles.user_id) AS username FROM articles  ORDER BY `view` DESC LIMIT 0,4 ;")->fetchAll();

        $sidebarPopularArticles = $popularArticles;

        $categories = $db->select('SELECT * FROM `categories` ORDER BY `id` DESC ;');

        $menus = $db->select('SELECT *, (SELECT COUNT(*) FROM `menus` AS `submenus` WHERE `submenus`.`parent_id` = `menus`.`id`  ) as `submenu_count`  FROM `menus` WHERE `parent_id` IS NULL ;')->fetchAll();

        $submenus = $db->select('SELECT * FROM `menus` WHERE `parent_id` IS NOT NULL ;')->fetchAll();

        $setting = $db->select("SELECT * FROM `websetting`")->fetch();

        require_once(realpath(dirname(__FILE__) . "/../template/app/index.php"));
    }

    public function show($id)
    {
        $db = new DataBase();
        $article = $db->select('SELECT * FROM `articles` WHERE `id` =? ', [$id])->fetch();
        $username = $db->select('SELECT * FROM `users` WHERE `id` =? ', [$article['user_id']])->fetch();
        $commentsCount = $db->select("SELECT COUNT(*) FROM `comments` WHERE `article_id` = ?;", [$id])->fetch();
        $comments = $db->select("SELECT *,(SELECT `username` FROM `users` WHERE `users`.`id`=`comments`.`user_id`)as `username` FROM `comments`
        WHERE `article_id` =?  AND `status`='approved' ORDER  BY `created_at` DESC ;", [$id])->fetchAll();
        $db->update('articles', $id, ['view'], [$article['view'] + 1]);

        $popularArticles = $db->select("SELECT articles.*, (SELECT COUNT(*) FROM comments WHERE comments.article_id = articles.id) AS comments_count, (SELECT username FROM users WHERE users.id = articles.user_id) AS username FROM articles  ORDER BY `view` DESC LIMIT 0,4 ;")->fetchAll();
        $sidebarPopularArticles = $popularArticles;
        $categories = $db->select('SELECT * FROM `categories` ORDER BY `id` DESC ;');
        $menus = $db->select('SELECT *, (SELECT COUNT(*) FROM `menus` AS `submenus` WHERE `submenus`.`parent_id` = `menus`.`id`  ) as `submenu_count`  FROM `menus` WHERE `parent_id` IS NULL ;')->fetchAll();
        $submenus = $db->select('SELECT * FROM `menus` WHERE `parent_id` IS NOT NULL ;')->fetchAll();
        $setting = $db->select("SELECT * FROM `websetting`")->fetch();
        require_once realpath(dirname(__FILE__) . "/../template/app/show-article.php");
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