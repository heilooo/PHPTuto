<?php
require_once realpath(dirname(__FILE__).'/admin-dashboard/Category.php');
use AdminDashboard\Category;

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

uri('category','Category','index');
uri('category/show/{id}','Category','show');
uri('category/create','Category','create');
uri('category/store','Category','store','POST');
uri('category/edit/{id}','Category','edit');
uri('category/update/{id}','Category','update','POST');
uri('category/delete/{id}','Category','delete');