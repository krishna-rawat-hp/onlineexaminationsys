<?php
    function saveSemester($id,$semname){
        $st = 0;
        $con = getConnection();
        $statement = $con->prepare("insert into semesters (branchid,semestername) values (?,?);");
        $statement->bind_param("ss", $branchid_f, $semestername_f);
        $semestername_f = $semname;
        $branchid_f = $id;
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

        function semesterDelete($semesterid, $semestername){
            $conn = getConnection();
            $result ="DELETE FROM semesters WHERE semesterid='$semesterid'";
            if ($conn->query($result) == TRUE) {
                echo "Record deleted successfully";
            } else {
                echo "Error deleting record: " . $conn->error;
            }
            
            $conn->close();
        }
?>