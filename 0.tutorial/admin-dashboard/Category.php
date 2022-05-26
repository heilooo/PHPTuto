<?php

namespace AdminDashboard;
require_once realpath(dirname(__FILE__).'/Database.php');
use DataBase\DataBase;

require_once realpath(dirname(__FILE__).'/Admin.php');
use AdminDashboard\Admin;

class Category extends Admin
{
//    نمایش همه رکورد ها
    public function index()
    {
        $db = new DataBase();
        $categories = $db->select("SELECT * FROM `categories`  ORDER BY `id` DESC;");
        require_once realpath(dirname(__FILE__).'/../template/admin/categories/index.php');
    }

//نمایش رکورد
    public function show($id)
    {
        $db = new DataBase();
        $category = $db->select("SELECT * FROM `categories` WHERE `id`=?", [$id])->fetch();
        require_once realpath(dirname(__FILE__).'/../template/admin/categories/show.php');
    }

//رفتن به صصفحه ساختن رکورد جدید
    public function create()
    {
        require_once realpath(dirname(__FILE__).'/../template/admin/categories/create.php');
    }

//ساختن رکورد جدید
    public function store($request)
    {
        $db = new DataBase();
        $db->insert('categories', array_keys($request), $request);
        $this->redirect('category');
    }

//رفتن به صفحه ادیت رکورد
    public function edit($id)
    {
        $db = new DataBase();
        $category = $db->select("SELECT * FROM `categories` WHERE `id`=?", [$id])->fetch();
        require_once realpath(dirname(__FILE__).'/../template/admin/categories/edit.php');
    }

//ادیت رکورد
    public function update($query, $id)
    {
        $db = new DataBase();
        $db->update('categories', $id, array_keys($query), $query);
        $this->redirect('category');
    }

//پاک کردن رکورد
    public function delete($id)
    {
        $db = new DataBase();
        $db->delete('categories',$id);
        $this->redirect('category');
    }
}