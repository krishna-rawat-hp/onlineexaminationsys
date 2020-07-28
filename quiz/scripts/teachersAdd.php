<?php
    include_once "../db/connection1.php";
    include_once "../db/teachers_add.php";
    
    $data = file_get_contents("php://input");
    $obj = json_decode($data);
   
    $name =  $obj->{'tn'};
    $branch =  $obj->{'bb'};
    $mobno =  $obj->{'pn'};
    $password =  $obj->{'pp'};
    $conf_pass =  $obj->{'cp'};

    echo saveSession($name, $branch, $mobno, $password, $conf_pass);
?>