<?php
    function saveSubject($semesterid,$subjectname){
        $st = 0;
        $con = getConnection();
        $statement = $con->prepare("insert into subjects (semesterid,subjectname) values (?,?);");
        $statement->bind_param("ss", $semesterid_f, $subjectname_f);
        $semesterid_f = $semesterid;
        $subjectname_f = $subjectname;
        if($statement->execute() == true){
            $st = 1;
        }
        $statement->close();
        $con->close();
        return $st;
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

    function getSubjects($semesterid){
        $recs = Array();
        $con = getConnection();
        $result = $con->query("select * from subjects where semesterid='$semesterid';");
        while($rec = $result->fetch_assoc()){
            $recs[] = $rec;
        }
        $con->close();
        return $recs;
    }

    function editsemester($subjectid, $subjectname){
        $st = 0;
        $con = getConnection();
        $statement = $con->prepare("update subjects set subjectname=? where subjectid=?;");
        $statement->bind_param("ss", $subjectname_f, $subjectid_f);
        $subjectname_f = $subjectname;
        $subjectid_f = $subjectid;
        if($statement->execute() == true){
            $st = 1;
        }
        $statement->close();
        $con->close();
        return $st;
    }
?>