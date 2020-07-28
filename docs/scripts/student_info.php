<?php
    include_once "../db/connection.php";
    include_once "../db/student_db.php";
    
    $data = file_get_contents("php://input");
    $std = json_decode($data);
    $rollno = $std->{'rollno'};
    $sname =  $std->{'sname'};
    $fname =  $std->{'fname'};
    $branch =  $std->{'branchid'};
    $semester =  $std->{'semesterid'};
    $session =  $std->{'sessionid'};
    $adm_branch =  $std->{'adm_bid'};
    $adm_semester =  $std->{'adm_semid'};
    $adm_session =  $std->{'adm_sessionid'};
    $password =  $std->{'password'};
    $contactno =  $std->{'contactno'};
  
    echo saveStudentData($rollno, $sname, $fname, $branch, $semester, $session, $adm_branch, $adm_semester, $adm_session, $password, $contactno);
?>