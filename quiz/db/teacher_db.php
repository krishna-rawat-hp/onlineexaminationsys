<?php
    function saveTeacher($teachername, $branch, $password, $contactno){
        $st = 0;
        $con = getConnection();
        $statement = $con->prepare("insert into teachers (teachername,branchid,password,contactno) values (?,?,?,?);");
        $statement->bind_param("ssss", $teachername_f, $branch_f, $password_f, $contactno_f);

        $teachername_f = $teachername;
        $branch_f = $branch;
        $password_f = $password;
        $contactno_f = $contactno;
        if($statement->execute() == true){
            $st = 1;
        }
        $statement->close();
        $con->close();
        return $st;
    }

    function updateprofile($id, $teachername, $password, $contactno){
        $st = 0;
        $con = getConnection();
        $statement = $con->prepare("update teachers set teachername=?, password=?, contactno=? where teachername=?;");
        $statement->bind_param("ssss", $teachername_f, $password_f, $contactno_f, $id_f);
        $teachername_f = $teachername;
        $password_f = $password;
        $contactno_f = $contactno;
        $id_f = $id;
        if($statement->execute() == true){
            $st = 1;
        }
        $statement->close();
        $con->close();
        return $st; 
    }

    function getTeacherById($id){
        $recs = Array();
        $con = getConnection();
        $subject = $con->query("select * from teachers where teachername='$id';");
        while($rec = $subject->fetch_assoc()){
            $recs[] = $rec;
        }
        $con->close();
        return $recs;
    }

    function updateprofilehod($id, $hodname, $password, $contactno){
        $st = 0;
        $con = getConnection();
        $statement = $con->prepare("update hod set HODname=?, password=?, contactno=? where Hodname=?;");
        $statement->bind_param("ssss", $hodname_f, $password_f, $contactno_f, $id_f);
        $hodname_f = $hodname;
        $password_f = $password;
        $contactno_f = $contactno;
        $id_f = $id;
        if($statement->execute() == true){
            $st = 1;
        }
        $statement->close();
        $con->close();
        return $st; 
    }

    function getHodById($id){
        $recs = Array();
        $con = getConnection();
        $subject = $con->query("select * from hod where HODname='$id';");
        while($rec = $subject->fetch_assoc()){
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
?>