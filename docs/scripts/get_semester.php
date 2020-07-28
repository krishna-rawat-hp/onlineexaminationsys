<?php
    include_once "../db/connection.php";
    include_once "../db/semester_db.php";
    
    $data = file_get_contents("php://input");
    $sem = json_decode($data);
    $branchid =  $sem->{'branchid'};
    $semesters =  getSemesterByBranchId($branchid);
    echo json_encode($semesters);
?>