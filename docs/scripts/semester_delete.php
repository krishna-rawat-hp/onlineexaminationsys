<?php
    include_once "../db/connection.php";
    include_once "../db/semester_db.php";
    
    $data = file_get_contents("php://input");
    $sem = json_decode($data);
    $semestername =  $sem->{'semestername'};
    $semesterid = $sem->{'semesterid'};

    print_r(semesterDelete($semesterid, $semestername));
?>