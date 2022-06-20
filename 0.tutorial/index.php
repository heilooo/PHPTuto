<?php
require_once realpath(dirname(__FILE__).'/admin-dashboard/Category.php');
use AdminDashboard\Category;

require_once realpath(dirname(__FILE__).'/admin-dashboard/Article.php');
use AdminDashboard\Article;

require_once realpath(dirname(__FILE__).'/admin-dashboard/Menu.php');
use AdminDashboard\Menu;

require_once realpath(dirname(__FILE__).'/admin-dashboard/WebSetting.php');
use AdminDashboard\WebSetting;

require_once realpath(dirname(__FILE__).'/admin-dashboard/User.php');
use AdminDashboard\User;

require_once realpath(dirname(__FILE__).'/admin-dashboard/Auth.php');
use AdminDashboard\Auth;

require_once realpath(dirname(__FILE__).'/admin-dashboard/Home.php');
use AdminDashboard\Home;

require_once realpath(dirname(__FILE__).'/admin-dashboard/Comment.php');
use AdminDashboard\Comment  ;

require_once realpath(dirname(__FILE__).'/admin-dashboard/Dashboard.php');
use AdminDashboard\Dashboard  ;

//require_once 'admin-dashboard/CreateDB.php';
//use DataBase\CreateDB;
//$db=new CreateDB();
//$db->run();

function uri($uri,$class,$method,$requestMethod='GET'){
    $values=array();
    $subURIs=explode('/',$uri);
    $request_uri=array_slice(explode('/',$_SERVER['REQUEST_URI']),3);
    if ($request_uri[0] == "" or $request_uri[0] == "/")
        $request_uri[0] = "home";

    $braek=false;
    if (sizeof($request_uri)== sizeof($subURIs) and $_SERVER['REQUEST_METHOD'] == $requestMethod){
        foreach (array_combine($subURIs,$request_uri) as $subURI => $request){
            if ($subURI[0]=="{" and $subURI[strlen($subURI) -1] == "}"){
                array_push($values,$request);
            }
            else{
                if ($subURI != $request){
                    $braek=true;
                    break;
                }

            }
        }

    }
    else $braek= true;

    if (!$braek){
        $class = "AdminDashboard\\".$class;
        $object= new $class;
        if (sizeof($values) > 0)
            if ($requestMethod == 'POST')
                if (isset($_FILES)){
                    $request = array_merge($_POST,$_FILES);
                    $object->$method($request,implode(',' , $values));
                }
                else
                    $object->$method($_POST,implode(',' , $values));
            else
                $object->$method(implode(',' , $values));
        else
            if ($requestMethod=='POST')
                if (isset($_FILES)){
                    $request = array_merge($_POST,$_FILES);
                    $object->$method($request);
                }
                else
                    $object->$method($_POST);
            else
                $object->$method();
    }
    else{

    }

}
//Dashboard
uri('admin','Dashboard','index');
//Category
uri('category','Category','index');
uri('category/show/{id}','Category','show');
uri('category/create','Category','create');
uri('category/store','Category','store','POST');
uri('category/edit/{id}','Category','edit');
uri('category/update/{id}','Category','update','POST');
uri('category/delete/{id}','Category','delete');
//Article
uri('article','Article','index');
uri('article/show/{id}','Article','show');
uri('article/create','Article','create');
uri('article/store','Article','store','POST');
uri('article/edit/{id}','Article','edit');
uri('article/update/{id}','Article','update','POST');
uri('article/delete/{id}','Article','delete');
//Menu
uri('menu','Menu','index');
uri('menu/show/{id}','Menu','show');
uri('menu/create','Menu','create');
uri('menu/store','Menu','store','POST');
uri('menu/edit/{id}','Menu','edit');
uri('menu/update/{id}','Menu','update','POST');
uri('menu/delete/{id}','Menu','delete');
//users
uri('user','User','index');
uri('user/permission/{id}','User','permission');
uri('user/store','User','store','POST');
uri('user/edit/{id}','User','edit');
uri('user/update/{id}','User','update','POST');
uri('user/delete/{id}','User','delete');
//WebSetting
uri('webSetting','WebSetting','index');
uri('webSetting/set','WebSetting','set');
uri('webSetting/store','WebSetting','store','POST');
//auth
uri('login','Auth','login');
uri('check-login','Auth','checkLogin','POST');
uri('register','Auth','register');
uri('register/store','Auth','registerStore','POST');
uri('logout','Auth','logout');
//Home
uri('home','Home','index');
uri('show-article/{id}','Home','show');
uri('show-category/{id}','Home','category');
uri('comment-store','Home','commentStore','POST');
//comments
uri('comment','Comment','index');
uri('comment/show/{id}','Comment','show');
uri('comment/approved/{id}','Comment','approved');