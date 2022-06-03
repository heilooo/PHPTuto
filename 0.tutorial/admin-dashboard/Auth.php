<?php

namespace AdminDashboard;

require_once realpath(dirname(__FILE__) . '/Database.php');

use DataBase\DataBase;

class Auth
{
    public function login()
    {
        require_once realpath(dirname(__FILE__) . '/../template/auth/login.php');
    }

    public function checkLogin($request)
    {
        if (empty($request['email']) || empty($request['password'])) {
            $this->redirectBack();
        } elseif (strlen($request['password']) < 8) {
            $this->redirectBack();
        } elseif (!filter_var($request['email'], FILTER_VALIDATE_EMAIL)) {
            $this->redirectBack();
        } else {
            $db = new DataBase();
            $user = $db->select("SELECT * FROM `users` WHERE `email`=?", [$request['email']])->fetch();
            if (password_verify($request['password'], $user['password'])) {
                $_SESSION['users'] = $user['id'];
            }
        }
    }


    protected function redirect($url)
    {
        $protocol = strpos($_SERVER['SERVER_PROTOCOL'], 'https') === true ? 'https://' : 'http://';
        header('location: ' . $protocol . $_SERVER['HTTP_HOST'] . '/PHPTuto/0.tutorial/' . $url);
    }

    protected function redirectBack()
    {
        header("location: " . $_SERVER['HTTP_REFERER']);
    }

}