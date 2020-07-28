<?php
     session_start();

     include_once "../db/connection.php";
     include_once "../db/paper_db.php";


     $data = file_get_contents("php://input");
     $paper = json_decode($data);
     
     $question =  $paper->{'questions'};
    
    echo saveQuestions($_SESSION['sessionlist'], $_SESSION['branchlist'], $_SESSION['semesters'], $_SESSION['subjects'], $_SESSION['date'], $_SESSION['questioncount'], $_SESSION['duration'], $_SESSION['username'], $_SESSION['passcode'],  $question);
?>