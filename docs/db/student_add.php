<?php
    function saveStudentData($name, $fname, $branch, $medium, $semester, $phone_no, $password){
        $st = 0;
        $con = getConnection();
        $statement = $con->prepare("insert into student_add (name, fatherName, branch, medium, semester, phone_no, password) values (?,?,?,?,?,?,?);");
        $statement->bind_param("sssssss",  $name_f, $fname_f, $branch_f, $medium_f, $semester_f, $phone_no_f, $password_f);

        $name_f = $name;
        $fname_f = $fname;
        $branch_f = $branch;
        $medium_f = $medium;
        $semester_f = $semester;
        $phone_no_f = $phone_no;
        $password_f = $password;
        if($statement->execute() == true){
            $st = 1;
        }
        else echo("Statement failed: ". $statement->error . "<br>");
        $statement->close();
        $con->close();
        return $st;
    }
?>