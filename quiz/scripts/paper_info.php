<?php
    session_start();

    $data = file_get_contents("php://input");
    $paper = json_decode($data);
    
    $sessionlist =  $paper->{'sessionlist'};
    $branchlist = $paper->{'branchlist'};
    $semesters = $paper->{'semesters'};
    $subjects =  $paper->{'subjects'};
    $date = $paper->{'date'};
    $questioncount = $paper->{'questioncount'};
    $duration = $paper->{'duration'};
    $passcode = $paper->{'passcode'};

    $_SESSION['sessionlist'] = $sessionlist;
    $_SESSION['branchlist'] = $branchlist;
    $_SESSION['semesters'] = $semesters;
    $_SESSION['subjects'] = $subjects;
    $_SESSION['date'] = $date;
    $_SESSION['questioncount'] = $questioncount;
    $_SESSION['duration'] = $duration;
    $_SESSION['passcode'] = $passcode;

    if ( $_SESSION['sessionlist']) {
        $val = 1;
    }else{
        $val = 2;
    }
    echo $val;
?>