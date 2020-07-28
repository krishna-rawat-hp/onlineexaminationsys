<?php
 session_start();

include_once "../db/connection.php";
include_once "../db/passcode_db.php";

$data = file_get_contents("php://input");
$pass = json_decode($data);
$passcode =  $pass->{'passcode'};
$paper = $pass->{'paperid'};
$st = 0;
$st = getPasscode($passcode, $paper);
if($st == 1){
    $_SESSION['paperid'] = $paper;
}
echo $st;
?>