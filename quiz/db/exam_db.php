<?php

 function getPaperDetails(){
    $recs = Array();
    $con = getConnection();
    $result = $con->query("select * from paperdetails order by examdate desc;");
    while($rec = $result->fetch_assoc()){
        $recs[] = $rec;
    }
    $con->close();
    return $recs;
 }

 function getPaperDetailById($paperid){
    $recs = Array();

    $con = getConnection();
    $result = $con->query("select * from paperdetails where paperid='$paperid';");
    while($rec = $result->fetch_assoc()){
        $recs[] = $rec;
    }
    $con->close();
    return $recs;
 }

 function getStudentpaperDetail($studentid){
     $recs = Array();

     $con = getConnection();
     $result = $con->query("select * from paperdetails where paperid='$studentid';");
     while($rec = $result->fetch_assoc()){
         $recs[] = $rec;
     }
     $con->close();
     return $recs;

 }

 function getresultDetail($rno, $pid){
    $recs = Array();
    $con = getConnection();
    $subject = $con->query("select * from examresult where studentid='$rno' and paperid='$pid';");
    while($rec = $subject->fetch_assoc()){
        $recs[] = $rec;
    }
    $con->close();
    return $recs;
 }

 function getsubjectBySubjectId($id){
    $recs = Array();
    $con = getConnection();
    $subject = $con->query("select * from subjects where subjectid='$id';");
    while($rec = $subject->fetch_assoc()){
        $recs[] = $rec;
    }
    $con->close();
    return $recs;
}

function savePaper($studentid, $paperid, $cAns, $wAns, $nAns){
    $con = getConnection();
    $statement = $con->prepare("insert into examresult (studentid, 	paperid, correctanswer, wronganswer, notattempted) values (?,?,?,?,?);");
    $statement -> bind_param("sssss", $studentid_f, $paperid_f, $correctanswer_f, $wronganswer_f, $notattempted_f);

    $studentid_f = $studentid;
    $paperid_f = $paperid;
    $correctanswer_f = $cAns;
    $wronganswer_f = $wAns;
    $notattempted_f = $nAns;
    
    if($statement->execute() == true){
        $st = 1;
    }
    echo $con->error;
    $statement->close();
    $con->close();
    return $st;
}

function getStudentById($id){
    $recs = Array();
    $con = getConnection();
    $subject = $con->query("select * from students where rollno='$id';");
    while($rec = $subject->fetch_assoc()){
        $recs[] = $rec;
    }
    $con->close();
    return $recs;
}

function getresultinfo($sid){
    $recs = Array();
    $con = getConnection();
    $records = $con->query("select s.subjectname, p.examdate, sm.semestername, p.questioncount, r.correctanswer, r.wronganswer, r.notattempted  from examresult r, paperdetails p, subjects s, semesters sm  where r.studentid ='$sid' and r.paperid = p.paperid and p.subjectid = s.subjectid and p.semesterid =sm.semesterid  order by p.examdate desc;");
    while($rec = $records->fetch_assoc()){
        $recs[] = $rec;
    }
    $con->close();
    return $recs;
}

function matchresult($pid){
    $recs = Array();
    $con = getConnection();

    $records = $con->query("select resultid from examresult where paperid = '$pid';");
    while($rec = $records->fetch_assoc()){
        $recs[] = $rec;
    }
    $con->close();
    return $recs;  
}


?>