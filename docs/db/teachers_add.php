<?php
    function saveSession($name, $branch, $mobno, $password, $conf_pass){
        $st = 0;
        $con = getConnection();
        $statement = $con->prepare("insert into teachers (name, branch, phone_no, password ) values (?,?,?,?);");
        $statement->bind_param("ssss", $name_f, $branch_f, $mobno_f, $password_f);

        $name_f = $name;
        $branch_f = $branch;
        $mobno_f = $mobno;
        $password_f = $password;
        if($statement->execute() == true){
            $st = 1;
        }
        $statement->close();
        $con->close();
        return $st;
    }
?>