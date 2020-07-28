<?php
    include_once "../db/connection.php";
    include_once "../db/student_db.php";
    
    $data = file_get_contents("php://input");
    $obj = json_decode($data);
    $rollno =  $obj->{'rollno'};
    $studentname =  $obj->{'studentname'};
    $fathername =  $obj->{'fathername'};
    $password =  $obj->{'password'};
    $contactno =  $obj->{'contactno'};
    $id = $obj->{'id'};

    echo updateprofile($id, $rollno, $studentname, $password, $contactno, $fathername)
?>