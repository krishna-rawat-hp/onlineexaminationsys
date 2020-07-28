<?php

function getPasscode($passcode, $paperid){
        $con = getConnection();
        $result = $con->query("select * from paperdetails where passcode='$passcode' && paperid='$paperid';");
        $row = mysqli_num_rows($result);
        if($row == 1){
            return 1;
        }else{
            return 0;
        }
    }

?>