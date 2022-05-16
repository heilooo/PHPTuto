<?php

namespace AdminDashboard;

class Admin
{
    public function redirect($url)
    {
        $protocol =strpos($_SERVER['SERVER_PROTOCOL'],'https')=== true ? 'https://' :'http://';
        header('location: '.$protocol.$_SERVER['HTTP_HOST'].'/PHPTuto/0.tutorial/'.$url);
    }

    public function redirectBack()
    {
        header("location :" . $_SERVER['HTTP_REFERER']);
    }
}