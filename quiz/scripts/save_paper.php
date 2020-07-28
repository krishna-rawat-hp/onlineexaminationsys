<?php
     session_start();

     include_once "../db/connection.php";
     include_once "../db/exam_db.php";
     include_once "../db/get_Paper.php";


     $data = file_get_contents("php://input");
     $paper = json_decode($data);
     

     $paperid = $paper->{'paperid'};
     $answers = $paper->{'answer'};
     
     $recs =   getPaper($paperid);
     //var_dump($recs);
     $c = 0;
     $w = 0;
     $l = 0;
     $st = -1;
     if(empty($recs) == false){
          for($i = 0 ; $i < count($recs); $i++){
               if($answers[$i] == "-1"){
                    $l++;
               }else if($recs[$i]['answer'] == $answers[$i]){
                    $c++;
               }else{
                    $w++;
               }
          }
          $st = savePaper($_SESSION['username'], $paperid, $c, $w, $l); 
     }
     echo $st;
     
?>   