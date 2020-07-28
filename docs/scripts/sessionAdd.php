<?php
    include_once "../db/connection.php";
    include_once "../db/session_db.php";
    
    $data = file_get_contents("php://input");
    $obj = json_decode($data);
    $sessionname =  $obj->{'sessionname'};

    echo saveSession($sessionname);
?>