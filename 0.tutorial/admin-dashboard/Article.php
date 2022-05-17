<?php

namespace AdminDashboard;
require_once("Admin.php");
require_once realpath(dirname(__FILE__) . "/DataBase.php");

use DataBase\DataBase;

class Article extends Admin
{
    public function index()
    {
        $db = new DataBase();
        $articles=$db->select("SELECT * FROM `categories` ORDER BY `id` DESC")->fetchAll();
        require_once realpath(dirname(__FILE__)."/../template/admin/articles/index.php");
    }

    public function show($id)
    {

    }

    public function create()
    {

    }

    public function store($request)
    {

    }

    public function edit($id)
    {

    }

    public function update($request, $id)
    {

    }

    public function delete($id)
    {

    }
}