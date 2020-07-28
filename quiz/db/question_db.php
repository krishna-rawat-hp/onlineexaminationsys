<?php
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

    function addquestion($subjectid, $question, $a, $b, $c, $d, $answer){
        $st = 0;
        $date =  date("Y-m-d");
        $con = getConnection();
        $statement = $con->prepare("insert into questions (subjectid,question,a,b,c,d,answer,date) values (?,?,?,?,?,?,?,?);");
        $statement->bind_param("ssssssss", $subjectid_f, $question_f, $a_f, $b_f, $c_f, $d_f, $answer_f, $date_f);
        $subjectid_f = $subjectid;
        $question_f = $question;
        $a_f = $a;
        $b_f = $b;
        $c_f = $c;
        $d_f = $d;
        $answer_f = $answer;
        $date_f = $date;
        if($statement->execute() == true){
            $st = 1;
        }
        echo $con->error;
        $statement->close();
        $con->close();
        return $st;
    }

    function getquestions($subjectid){
        $recs = Array();
        $con = getConnection();
        $result = $con->query("select * from questions where subjectid='$subjectid';");
        while($rec = $result->fetch_assoc()){
            $recs[] = $rec;
        }
        $con->close();
        return $recs;
    }
    
    function updatequestion($questionid, $question, $a, $b, $c, $d, $answer){
        $st = 0;
        $date =  date("Y-m-d");
        $con = getConnection();
        $statement = $con->prepare("update questions set questionname=?, a=?,  b=?, c=?, d=?, answer=? date=? where questionid=?;");
        $statement->bind_param("ssssssss", $question_f, $a_f, $b_f, $c_f, $d_f, $answer_f, $questionid_f, $date_f);
        $questionid_f = $questionid;
        $question_f = $question;
        $a_f = $a;
        $b_f = $b;
        $c_f = $c;
        $d_f = $d;
        $answer_f = $answer;
        $date_f = $date;
        if($statement->execute() == true){
            $st = 1;
        }
        $statement->close();
        $con->close();
        return $st;
    }

    function getQuestionById($qid){
        $rec = Array();
        $con = getConnection();
        
        $result = $con->query("select * from questions where questionid='$qid';");
        $rec = $result->fetch_assoc();        
        $con->close();
        return $rec;
    }
?>