<?php
  
  function getSession(){
    $recs = Array();
    $con = getConnection();
    $result = $con->query("select * from sessions;");
    while($rec = $result->fetch_assoc()){
        $recs[] = $rec;
    }
    $con->close();
    return $recs;
}

function getBranch(){
    $recs = Array();
    $con = getConnection();
    $result = $con->query("select * from branches;");
    while($rec = $result->fetch_assoc()){
        $recs[] = $rec;
    }
    $con->close();
    return $recs;
}

function getSemesterByBranchId($branchid){
    $recs = Array();
    $con = getConnection();
    $result = $con->query("select * from Semesters where branchid='$branchid';");
    while($rec = $result->fetch_assoc()){
        $recs[] = $rec;
    }
    $con->close();
    return $recs;
}

function getSubjectsBySemester($semesterid){
    $recs = Array();
    $con = getConnection();
    $result = $con->query("select * from subjects where semesterid='$semesterid';");
    while($rec = $result->fetch_assoc()){
        $recs[] = $rec;
    }
    $con->close();
    return $recs;
}

function getsubjectBySubjectId($semesterid){
    $recs = Array();
    $con = getConnection();
    $result = $con->query("select * from subjects where subjectid='$semesterid';");
    while($rec = $result->fetch_assoc()){
        $recs[] = $rec;
    }
    $con->close();
    return $recs;
} 

function getSessionBySessionId($semesterid){
    $recs = Array();
    $con = getConnection();
    $result = $con->query("select * from sessions where sessionid='$semesterid';");
    while($rec = $result->fetch_assoc()){
        $recs[] = $rec;
    }
    $con->close();
    return $recs;
}

function getSemesterBySemesterId($semesterid){
    $recs = Array();
    $con = getConnection();
    $result = $con->query("select * from semesters where semesterid='$semesterid';");
    while($rec = $result->fetch_assoc()){
        $recs[] = $rec;
    }
    $con->close();
    return $recs;
}

function getexamresult($username, $sessionid, $subjectid){
    $recs = Array();
    $con = getConnection();
    $records = $con->query("select * from paperdetails where subjectid = '$subjectid' and sessionid ='$sessionid' and teacherid ='$username' order by examdate desc;");
    while($rec = $records->fetch_assoc()){
        $recs[] = $rec;
    }
    $con->close();
    return $recs;
}

function getStudentnameByStudentId($sname){
    $recs = Array();
    $con = getConnection();
    $result = $con->query("select * from students where rollno='$sname';");
    while($rec = $result->fetch_assoc()){
        $recs[] = $rec;
    }
    $con->close();
    return $recs;
}
function getresultinfo($pid){
    $recs = Array();
    $con = getConnection();
    $records = $con->query("select e.studentid, e.correctanswer, e.wronganswer, e.notattempted, p.subjectid, p.questioncount from examresult e, paperdetails p  where e.paperid ='$pid' and p.paperid = e.paperid order by e.studentid asc;");
    while($rec = $records->fetch_assoc()){
        $recs[] = $rec;
    }
    $con->close();
    return $recs;
}
  
?>