<?php
    include_once "../db/connection.php";
    include_once "../db/subject_db.php";
    
    $data = file_get_contents("php://input");
    $sub = json_decode($data);
    $semesterid = $sub->{'semesterid'};
    echo getSubjects($semesterid);
?>