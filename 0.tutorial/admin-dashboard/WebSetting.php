<?php

namespace AdminDashboard;
require_once realpath(dirname(__FILE__).'/Database.php');
use DataBase\DataBase;

require_once realpath(dirname(__FILE__).'/Admin.php');
use AdminDashboard\Admin;

class WebSetting extends Admin
{
    public function index()
    {
        $db=new DataBase();
        $setting=$db->select("SELECT * FROM `websetting`")->fetch();
        require_once realpath(dirname(__FILE__).'/../template/admin/webSetting/index.php');
    }

    public function set()
    {
        $db=new DataBase();
        $setting=$db->select("SELECT * FROM `websetting`")->fetch();
        require_once realpath(dirname(__FILE__).'/../template/admin/webSetting/set.php');
    }

    public function store($request)
    {
        $db=new DataBase();
        $setting=$db->select("SELECT * FROM `websetting`")->fetch();
        if ($request['logo']['tmp_name']!=""){
            $request['logo']=$this->saveImages($request['logo'],'setting','logo');
        }else{
            unset($request['logo']);
        }

        if ($request['icon']['tmp_name']!=""){
            $request['icon']=$this->saveImages($request['icon'],'setting','icon');
        }else{
            unset($request['icon']);
        }

        if ($setting!=''){
            $db->update('Websetting',$request['id'],array_keys($request),$request);
        }else{
            $db->insert('Websetting',array_keys($request),$request);
        }
        $this->redirect('webSetting');

    }
}