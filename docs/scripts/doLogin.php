<?php
session_start();

include_once "../db/connection.php";
include_once "../db/login_db.php";

$data = file_get_contents("php://input");
$login = json_decode($data);
$username =  $login->{'username'};
$password = $login->{'password'};
$logintype = $login->{'logintype'};
$st=0;
    if($logintype == "Faculty"){
        $st = teacherLogin($username, $password);
    }else if($logintype == "Student"){
        $st = studentLogin($username, $password);
    }else if($logintype == "HOD"){
        $st = hodLogin($username, $password);
    }else{
        //relogin
    }
    echo $st;
    ?>