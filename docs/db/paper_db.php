<?php

function saveQuestions($sessionlist, $branchlist, $semesters, $subjects, $date, $questioncount, $duration, $passcode, $username, $qids){
    $st = 0;
        $con = getConnection();    

        $con->autocommit(false);
        $statement = $con->prepare("insert into paperdetails (sessionid, branchid, semesterid, subjectid, examdate, questioncount, duration, teacherid, passcode) values (?,?,?,?,?,?,?,?,?);");
        $statement->bind_param("sssssssss",$session_f, $branch_f, $semester_f, $subject_f, $date_f, $questioncount_f, $duration_f, $passcode_f, $teacher_f );
        $session_f = $sessionlist;
        $branch_f = $branchlist;
        $semester_f = $semesters;
        $subject_f = $subjects;
        $date_f = $date;
        $questioncount_f = $questioncount;
        $duration_f = $duration;
        $passcode_f = $passcode;
        $teacher_f = $username;
        if($statement->execute() == true){
            $pid =  $con->insert_id;
            foreach ($qids as $qid) {
                $statement = $con->prepare("insert into questionpaper (paperid, questionid) values (?,?);");
                $statement->bind_param("ss",$pid_f, $qid_f);
                $pid_f = $pid;
                $qid_f = $qid;
                if($statement->execute() == true){
                }else{
                    $con->rollback();
                    $statement->close();
                    $con->close();
                    return 0;        
                }
            }
            $con->commit();
            $statement->close();
            $con->close();
            return 1;
        }else{
            $con->rollback();
            $statement->close();
            $con->close();
            return 0;
        }
    }

    function getPaperInfo($name){
        $recs = Array();
        $con = getConnection();
        $result = $con->query("select * from paperdetails where teacherid = '$name' order by examdate desc;");
        while($rec = $result->fetch_assoc()){
            $recs[] = $rec;
        }
        $con->close();
        return $recs;
     }

function getSessions(){  
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

    function getTeachers(){  
        $recs = Array();
        $con = getConnection();
        $result = $con->query("select * from teachers;");
        while($rec = $result->fetch_assoc()){
            $recs[] = $rec;
        }
        $con->close();
        return $recs;
    }

    function getquestions($subjectid){
        $recs = Array();
        $con = getConnection();
        $result = $con->query("select * from questions where subjectid='$subjectid' order by questionid desc;");
        while($rec = $result->fetch_assoc()){
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

    function getquestionById($id){
        $recs = Array();
        $con = getConnection();
        $subject = $con->query("select * from questions where questionid='$id';");
        while($rec = $subject->fetch_assoc()){
            $recs[] = $rec;
        }
        $con->close();
        return $recs;
    }

    function getPaperById($id){
        $recs = Array();
        $con = getConnection();
        $subject = $con->query("select * from questionpaper where paperid='$id';");
        while($rec = $subject->fetch_assoc()){
            $recs[] = $rec;
        }
        $con->close();
        return $recs;
    }
?>