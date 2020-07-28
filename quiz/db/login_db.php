<?php
    function teacherLogin($username, $password){
        $con = getConnection();
        $result = $con->query("select * from teachers where teachername='$username' && password='$password';");
        $row = mysqli_num_rows($result);
        if($row == 1){
            $_SESSION['username'] = $username;
            return 1;
        }else{
            return 0;
        }
    }

    function hodLogin($username, $password){
        $con = getConnection();
        $result = $con->query("select * from  HOD where HODname='$username' && password='$password';");
        $row = mysqli_num_rows($result);
        if($row == 1){
            $_SESSION['username'] = $username;
            return 2;
        }else{
            return 0;
        }
    }

    function studentLogin($username, $password){
        $con = getConnection();
        $result = $con->query("select * from  students where rollno='$username' && password='$password';");
        $row = mysqli_num_rows($result);
        if($row == 1){
            $_SESSION['username'] = $username;
            return 3;
        }else{
            return 0;
        }
    }

?>