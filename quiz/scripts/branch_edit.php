<?php
    include_once "../db/connection.php";
    include_once "../db/branch_db.php";
    
    $data = file_get_contents("php://input");
    $brch = json_decode($data);
    $branchname =  $brch->{'branchname'};
    $id = $brch->{'id'};

    echo editBranch($id, $branchname);
?>