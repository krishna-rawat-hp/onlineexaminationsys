<?php

function teacherdropdown($id){
    $recs = getTeachers();
    $html=  "<select class='form-control' id='$id'>
                <option value='-1'>Teacher Name</option>";
    foreach ($recs as $rec) {
        $html.="<option value='".$rec['teacherid']."'>".$rec['teachername']."</option>";
    }
    $html.="</select>";
    echo $html;
}

function question_select($id){
    $recs = Array();
    $recs = getquestions($id);

    $html = "<table class='table table-striped'>
                <tr class='text-center bg-primary text-white'>
                <th style='width: 2%'></th>    
                <th>QUESTION</th>
                </tr>";
    foreach ($recs as $rec) {
       $html.="<tr>
                    <td><input type='checkbox' class='form-check-input ml-2 mr-0' value='".$rec['questionid']."' name='question' onchange=\"qidsListUpdate(this)\"></td>
                    <td>".$rec['question']."</td>
                </tr>";
        }
        $html.="<tr>
                    <td colspan='2' class='text-center' style='width:100pt;'>
                    <button class='btn btn-success' style='width:100pt;' onclick=\"savePaper();\">SAVE</button>
                    <a href='questions_add.php' class='btn btn-primary'>Add Question</a>
                    </td>
        </tr>"; 
    $html.="</table>";
    echo $html;
}

function view_paper($name){
    $recs = Array();
    $recs = getPaperInfo($name);
    
    $html = "<table class='table table-bordered table-hover table-striped table-md'>";
    $html.= "<tr class='text-center bg-info text-white'>
                <th>Date</th>
                <th>Teacher</th>
                <th>Subject</th>
                <th>Question</th>
                <th>Duration</th>
                <th>PAPER</th>
            </tr>";
    foreach ($recs as $rec) {
        $subject = getsubjectBySubjectId($rec['subjectid']);
    $html.="<tr>
               <td style='font-size:20; font-weight: 600;'>".$rec['examdate']."</td>
               <td style='font-size:20; font-weight: 600;'>".$rec['teacherid']."</td>
               <td  style='font-size:20; font-weight: 600;'>".$subject[0]['subjectname']."</td>
               <td  class ='text-center' style='font-size:20; font-weight: 600;'>".$rec['questioncount']."</td> 
               <td class ='text-center' style='font-size:20; font-weight: 600;'>".$rec['duration']."</td> 
               <td class='text-center'><button class='btn btn-success' style='width:100pt;' onclick=\"viewQuestion('".$rec['paperid']."');\">VIEW</button></td> 
            </tr>";
    }
    $html.="</table>";   
    echo $html;
}

function questioPaper($id){
    $recs = Array();
    $recs = getPaperById($id);
    
    $html = "<table class='table table-bordered table-hover table-striped table-md'>";
    $html = "<table class='table table-striped'>
            <tr class='text-center bg-primary text-white'> 
            <th>QUESTION</th>
            </tr>";
    foreach ($recs as $rec) {
        $question = getquestionById($rec['questionid']);
    $html.="<tr>
               <td style='font-size:20; font-weight: 500;'>".$question[0]['question']."</td>
            </tr>";
    }
    $html.="</table>";   
    echo $html;
}


?>