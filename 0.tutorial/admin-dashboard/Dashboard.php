<?php
namespace AdminDashboard;

require_once realpath(dirname(__FILE__).'/Database.php');
use DataBase\DataBase;

require_once realpath(dirname(__FILE__).'/Admin.php');
use AdminDashboard\Admin;

class Dashboard
{
    public function index()
    {
        $db=new DataBase();
        $articlesCount=$db->select("SELECT COUNT(*) FROM `articles`;")->fetch();
        $articlesView=$db->select("SELECT SUM(view) FROM `articles`;")->fetch();

        $commentsCount=$db->select("SELECT COUNT(*) FROM `comments`;")->fetch();
        $commentsUnseenCount=$db->select("SELECT COUNT(*) FROM `comments` WHERE `status`=`unseen`;")->fetch();
        $commentsApprovedCount=$db->select("SELECT COUNT(*) FROM `comments` WHERE `status`=`approved`;")->fetch();

        $userCount=$db->select("SELECT COUNT(*) FROM `users` WHERE `permission`=`user`;")->fetch();
        $adminCount=$db->select("SELECT COUNT(*) FROM `users` WHERE `permission`=`admin`;")->fetch();

        $categoryCount=$db->select("SELECT COUNT(*) FROM `categories`;")->fetch();
}
}