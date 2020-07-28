<?php
    include_once "../db/connection.php";   //for get connection
    include_once "../db/session_db.php";    // definig the database related function
    
    $data = file_get_contents("php://input");
    $session = json_decode($data);
    $sessionname =  $session->{'sessionname'};

    echo saveSession($sessionname);   //for inserting branch into database
?>