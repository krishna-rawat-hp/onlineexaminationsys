<?php

session_start();

include_once "../db/connection.php";
include_once "../db/get_paper.php";

$paperObj = Array();

$data = file_get_contents("php://input");
$id = json_decode($data);
$paper = $id->{'paperid'};
$paperObj['questions'] = getPaper($paper);
echo json_encode($paperObj);

?>