<?php

namespace AdminDashboard;
require_once realpath(dirname(__FILE__) . '/Database.php');

use DataBase\DataBase;

require_once realpath(dirname(__FILE__) . '/Admin.php');

use AdminDashboard\Admin;

class User extends Admin
{
    public function index()
    {
        $db = new DataBase();
        $users = $db->select("SELECT * FROM `users` ORDER BY `id` DESC ");
        require_once realpath(dirname(__FILE__) . "/../template/admin/users/index.php");
    }

    public function permission($id)
    {
        $db = new DataBase();
        $user = $db->select('SELECT * FROM `users` WHERE `id` =? ', [$id])->fetch();
        if ($user['permission'] == 'admin') {
            $db->update('users', $id, ['permission'], ['user']);
        } else {
            $db->update('users', $id, ['permission'], ['admin']);
        }
        $this->redirectBack();
    }

    public function edit($id)
    {
        $db = new DataBase();
        $user = $db->select("SELECT * FROM `users` WHERE `id`=?", [$id])->fetch();
        require_once realpath(dirname(__FILE__) . '/../template/admin/users/edit.php');
    }

    public function update($request,$id)
    {
        $db = new DataBase();
        $db->update('users', $id, array_keys($request), $request);
        $this->redirect('user');
    }

    public function delete($id)
    {
        $db = new DataBase();
        $db->delete('users', $id);
        $this->redirectBack();
    }
}