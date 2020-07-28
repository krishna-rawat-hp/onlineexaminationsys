<?php
    include_once "../db/connection.php";   //for get connection
    include_once "../db/branch_db.php";    // definig the database related function
    
    $data = file_get_contents("php://input");
    $brch = json_decode($data);
    $branchname =  $brch->{'branchname'};

    echo saveBranch($branchname);   //for inserting branch into database
?>