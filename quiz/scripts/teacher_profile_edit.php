<?php
    include_once "../db/connection.php";
    include_once "../db/teacher_db.php";
    
    $data = file_get_contents("php://input");
    $obj = json_decode($data);
    $teachername =  $obj->{'teachername'};
    $password =  $obj->{'password'};
    $contactno =  $obj->{'contactno'};
    $id = $obj->{'name'};

    echo updateprofile($id, $teachername, $password, $contactno);
?>