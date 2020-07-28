<?php
    include_once "../db/connection.php";
    include_once "../db/question_db.php";
    
    $data = file_get_contents("php://input");
    $sem = json_decode($data);
    $semesterid =  $sem->{'semesterid'};
    $subjects =  getSubjectsBySemester($semesterid);
    echo json_encode($subjects);
?>