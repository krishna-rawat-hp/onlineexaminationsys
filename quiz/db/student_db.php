<?php
    function saveStudentData($rollno, $sname, $fname, $branch, $semester, $session, $adm_branch, $adm_semester, $adm_session, $password, $contactno){
        $st = 0;
        $conn = getConnection();
        $statement = $conn->prepare("insert into students (rollno, studentname, fathername, branchid, semesterid, sessionid, addmissionbranch, addmissionsemester, addmissionsession, password, contactno) values (?,?,?,?,?,?,?,?,?,?,?);");
        $statement->bind_param("sssssssssss", $rollno_f, $studentname_f, $fathername_f, $branchid_f, $semesterid_f, $sessionid_f, $admissionbranch_f, $admissionsemester_f, $admissionsession_f, $password_f, $contactno_f);

        $rollno_f = $rollno;
        $studentname_f = $sname;
        $fathername_f = $fname;
        $branchid_f = $branch;
        $semesterid_f = $semester;
        $sessionid_f = $session;
        $admissionbranch_f = $adm_branch;
        $admissionsemester_f = $adm_semester;
        $admissionsession_f = $adm_session;
        $password_f = $password;
        $contactno_f = $contactno;
        if($statement->execute() == true){
            $st = 1;
        }
        else echo("Statement failed: ". $statement->error . "<br>");
        $statement->close();
        $conn->close();
        return $st;
    }

    function updateprofile($id, $rollno, $studentname, $password, $contact_no, $fathername){   
        $st = 0;
        $con = getConnection();
        $statement = $con->prepare("update students set rollno=?, studentname=?, fathername=?, password=?, contactno=? where rollno=?;");
        $statement->bind_param("ssssss", $rollno_f, $studentname_f, $fathername_f, $password_f, $contactno_f, $studentid_f);
        $rollno_f = $rollno;
        $studentname_f = $studentname;
        $fathername_f = $fathername;
        $password_f = $password;
        $contactno_f = $contact_no;
        $studentid_f = $id;
        if($statement->execute() == true){
            $st = 1;
        }
        $statement->close();
        $con->close();
        return $st;
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
   
    function getBranchById($bid){
        $recs = Array();
        $con = getConnection();
        $result = $con->query("select * from branches where branchid='$bid';");
        while($rec = $result->fetch_assoc()){
            $recs[] = $rec;
        }
        $con->close();
        return $recs;
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
?>