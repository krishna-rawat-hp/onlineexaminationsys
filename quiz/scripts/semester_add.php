<?php
    include_once "../db/connection.php";
    include_once "../db/semester_db.php";
    
    $data = file_get_contents("php://input");
    $sem = json_decode($data);
    $semname =  $sem->{'semname'};
    $id = $sem->{'bid'};
    echo saveSemester($id, $semname);
?>