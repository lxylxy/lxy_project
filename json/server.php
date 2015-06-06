<?php

    //连接数据库，进行数据读取

   //把数据库查询放回的对象，转换成json格式，然后返回给我们客户端

    error_reporting(E_ALL ^ E_DEPRECATED);
    header('content-type:text/html;charset=utf-8');
    require_once('db.class.php');

    $inAjax = $_GET['inAjax'];
    $do = isset($_GET['do']) ? $_GET['do'] : "default";

    if(!isset($inAjax)){
       return false;
    }

    $dbObj = new ms_new_mysql("localhost", "root", "11024617", "test", "", "utf-8", "0");
    //print_r($dbObj);

    switch($do){
        case "checkMember":
            $username = $_GET['username'];
            $sql = "select * from check_member where username='$username'";
            $data = $dbObj->getOne($sql);
            echo (!empty($data)) ? json_encode($data) : "null";
            break;

        case "default":
            die("nothing");
            break;

    }

