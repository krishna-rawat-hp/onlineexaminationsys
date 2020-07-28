<?php

function getPaperDetail($paper){
    $recs = Array();
    $con = getConnection();
    $result = $con->query("select * from paperdetail where paperid ='$paper'");
    while($rec = $result->fetch_assoc()){
        $recs[] = $rec;
    }
    $con->close();
    return $recs;
}
function getPaper($paperid){ 
    $recs = Array();
    $con = getConnection();
    $result = $con->query("select q.questionid, q.question, q.a, q.b, q.c, q.d, q.answer from questionpaper qp, questions q where qp.paperid='$paperid' and qp.questionid = q.questionid;");
    while($rec = $result->fetch_assoc()){
        $recs[] = $rec;
    }
    $con->close();
    return $recs;
}
?>