<?php
    include_once "../db/connection5.php";
    include_once "../db/student_add.php";
    
    $data = file_get_contents("php://input");
    $std = json_decode($data);
   
    $name =  $std->{'sn'};
    $fname =  $std->{'fn'};
    $branch =  $std->{'sb'};
    $medium =  $std->{'sm'};
    $semester =  $std->{'ss'};
    $phone_no =  $std->{'pn'};
    $password =  $std->{'pp'};
  
    echo saveStudentData($name, $fname, $branch, $medium, $semester, $phone_no, $password);
?>