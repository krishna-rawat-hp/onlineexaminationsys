<?php
    function saveBranch($branchname){       //function for insert branch
        $st = 0;
        $con = getConnection();       // used for database connection 
        $statement = $con->prepare("insert into branches (branchname) values (?);");
        $statement->bind_param("s", $branchname_f);
        $branchname_f = $branchname;
        if($statement->execute() == true){
            $st = 1;
        }
        $statement->close();
        $con->close();
        return $st;
    }

    function getBranches(){  //for fetching branch into database
        $recs = Array();
        $con = getConnection();
        $result = $con->query("select * from branches;");
        while($rec = $result->fetch_assoc()){
            $recs[] = $rec;
        }
        $con->close();
        return $recs;
    }

    function editBranch($id, $branchname){    //for updating or edit branch 
        $st = 0;
        $con = getConnection();
        $statement = $con->prepare("update branches set branchname=? where branchid=?;");
        $statement->bind_param("ss", $branchname_f, $branchid_f);
        $branchname_f = $branchname;
        $branchid_f = $id;
        if($statement->execute() == true){
            $st = 1;
        }
        $statement->close();
        $con->close();
        return $st;
    }
?>