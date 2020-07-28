<?php
    include_once "../db/connection.php";
    include_once "../db/teacher_db.php";
    
    $data = file_get_contents("php://input");
    $obj = json_decode($data);
   
    $teachername =  $obj->{'teachername'};
    $branch =  $obj->{'branchid'};
    $password =  $obj->{'password'};
    $contactno =  $obj->{'contactno'};

    echo saveTeacher($teachername, $branch, $password, $contactno);
?>