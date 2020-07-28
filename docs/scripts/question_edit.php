<?php
    include_once "../db/connection.php";
    include_once "../db/question_db.php";
    
    $data = file_get_contents("php://input");
    $obj = json_decode($data);
    $questionid = $obj->{'questionid'};
    $question = $obj->{'question'};
    $a = $obj->{'option1'};
    $b = $obj->{'option2'};
    $c = $obj->{'option3'};
    $d = $obj->{'option4'};
    $answer = $obj->{'answer'};
    echo updatequestion($questionid, $question, $a, $b, $c, $d, $answer);
?>