<?php
    include_once "../db/connection.php";
    include_once "../db/session_db.php";
    
    $data = file_get_contents("php://input");
    $session = json_decode($data);
    $sessionname =  $session->{'sessionname'};
    $id = $session->{'id'};

    echo editSessions($id, $sessionname);
?>