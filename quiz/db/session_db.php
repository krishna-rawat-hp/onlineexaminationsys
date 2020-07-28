<?php
    function saveSession($sessionname){       
        $st = 0;
        $con = getConnection();        
        $statement = $con->prepare("insert into sessions (sessionname) values (?);");
        $statement->bind_param("s", $sessionname_f);
        $sessionname_f = $sessionname;
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

    function editSessions($id, $sessionname){     
        $st = 0;
        $con = getConnection();
        $statement = $con->prepare("update sessions set sessionname=? where sessionid=?;");
        $statement->bind_param("ss", $sessionname_f, $sessionid_f);
        $sessionname_f = $sessionname;
        $sessionid_f = $id;
        if($statement->execute() == true){
            $st = 1;
        }
        $statement->close();
        $con->close();
        return $st;
    }
?>