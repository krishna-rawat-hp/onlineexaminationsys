<?php


    function view_exam(){
        $recs = Array();
        $recs = getPaperDetails();
        
        $html = "<table class='table table-bordered table-hover table-striped table-md'>";
        $html.= "<tr class='text-center bg-info text-white'>
                    <th>Date</th>
                    <th>Teacher</th>
                    <th>Subject</th>
                    <th>Question</th>
                    <th>Duration</th>
                    <th>EXAM</th>
                </tr>";
        foreach ($recs as $rec) {
            $subject = getsubjectBySubjectId($rec['subjectid']);
            $result = Array();
            $result = matchresult($rec['paperid']);
        $html.="<tr>
                   <td style='font-size:20; font-weight: 600;'>".$rec['examdate']."</td>
                   <td style='font-size:20; font-weight: 600;'>".$rec['teacherid']."</td>
                   <td  style='font-size:20; font-weight: 600;'>".$subject[0]['subjectname']."</td>
                   <td  class ='text-center' style='font-size:20; font-weight: 600;'>".$rec['questioncount']."</td> 
                   <td class ='text-center' style='font-size:20; font-weight: 600;'>".$rec['duration']."</td>
                   <td class='text-center'>";
                    $c=0;
                   if(empty($result[$c]) == true){
                    $html.=     "<button class='btn btn-success' style='width:100pt;' onclick=\"viewPasscode('".$rec['paperid']."');\">START</button>";
                }else{
                    $html.=     "DONE";
                }
                $c=$c+1;
                    
        $html.="    </td> 
                </tr>";
        }
        $html.="</table>";   
        echo $html;
    }

    function getResult($rollno, $paperid){
        $recs = Array();
        $recs =getresultDetail($rollno, $paperid);

        foreach ($recs as $rec) {

            $total = $rec['correctanswer']+$rec['wronganswer']+$rec['notattempted'];
            $percent = ($rec['correctanswer'] * 100)/$total;

            $html=" <table style='width:70%; margin:auto; margin-top: 70pt; background-color: green; color:yellow; font-size:18pt;  border: 2pt solid black;' class='table table-bordered text-center' >";
           
            $html.="<tr style='background-color:#34495e; color:white; font-weight:600;'>
                        <td style='width:70%; text-align:center;'>Total Question</td>
                        <td style='width:30'>".$total."</td>
                    </tr>";
            $html.="<tr>
                        <td style='width:70%; text-align:center;'>Correct Answer</td>
                        <td style='width:30'>".$rec['correctanswer']."</td>
                    </tr>";
            $html.="<tr>
                        <td style='width:70%; text-align:center;'>Wrong Answer</td>
                        <td>".$rec['wronganswer']."</td>
                    </tr>";
            $html.="<tr>
                        <td style='width:70%; text-align:center;'>Not Attempted</td>
                        <td>".$rec['notattempted']."</td>
                    </tr>";
            $html.="<tr>
                        <td style='width:70%; text-align:center;'>Percentage</td>
                        <td>".$percent.'%'."</td>
                    </tr>";
        $html.="</table>";
        }
        echo $html;
    }

    function studentresult($sid){
        $recs = Array();
        $recs = getresultinfo($sid);

        $html = "<table class='table table-bordered table-hover table-striped table-md'>";
        $html.= "<tr class='text-center bg-info text-white'>
                    <th>Date</th>
                    <th>Subject</th>
                    <th>Semester</th>
                    <th>Total Questions</th>
                    <th>Correct Answer</th>
                    <th>Wrong Answer</th>
                    <th>Not Attemted</th>
                </tr>";
            foreach($recs as $rec){
        $html.="<tr class='text-center'>
                    <td>".$rec['examdate']."</td>
                    <td>".$rec['subjectname']."</td>
                    <td>".$rec['semestername']."</td>
                    <td>".$rec['questioncount']."</td>
                    <td>".$rec['correctanswer']."</td>
                    <td>".$rec['wronganswer']."</td>
                    <td>".$rec['notattempted']."</td>
                </tr>";
        } 
        echo $html;
    }

    function total_question($paperid){
        $rec = getPaperDetailById($paperid);
        if(isset($rec) && empty($rec) == false){
            $html = $rec[0]['questioncount'];
            echo $html;
        }
    }

    function teacher_name($paperid){
        $rec = getPaperDetailById($paperid);
        if(isset($rec) && empty($rec) == false){
            $html = $rec[0]['teacherid'];
            echo $html;
        }
    }

    function subject_name($paperid){
        $rec = getPaperDetailById($paperid);
        if(isset($rec) && empty($rec) == false){
            $subject = getsubjectBySubjectId($rec[0]['subjectid']);
            $html = $subject[0]['subjectname'];
            echo $html;
        }
    }

    function total_time($paperid){
        $rec = getPaperDetailById($paperid);
        if(isset($rec) && empty($rec) == false){
            $html = ($rec[0]['duration'] * 60) + 1;
            echo $html;
        }
    }

    function student_name($id){
        $rec = getStudentById($id);
        if(isset($rec) && empty($rec) == false){
            $html = $rec[0]['studentname'];
            echo $html;
        }
    }

?>