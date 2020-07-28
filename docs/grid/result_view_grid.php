<?php
     function result_view($username, $sessionid, $branchid, $semesterid, $subjectid){
        $recs = Array();
        $recs = getexamresult($username, $sessionid, $subjectid);

        $html = "<table class='table table-bordered table-striped'>
                    <tr class='text-center bg-primary text-white'>
                    <th>DATE</th>    
                    <th>TEACHER NAME</th>
                    <th>SUBJECT</th>
                    <th>SEMESTER</th>
                    <th>SESSION</th>
                    <th>VIEW</th>
                    </tr>";
        foreach ($recs as $rec) {
            $subject = getsubjectBySubjectId($rec['subjectid']);
            $semester = getSemesterBySemesterId($rec['semesterid']);
            $session = getSessionBySessionId($rec['sessionid']);
           $html.="<tr>
                        <td>".$rec['examdate']."</td>
                        <td>".$rec['teacherid']."</td>
                        <td>".$subject[0]['subjectname']."</td>
                        <td>".$semester[0]['semestername']."</td>
                        <td>".$session[0]['sessionname']."</td>
                        <td class='text-center' style='width:100pt;'>
                        <button class='btn btn-primary' style='width:100pt;' onclick=\"viewFullResult('".$rec['paperid']."');\">VIEW</button>  
                        </td>
                    </tr>";
        }
        $html.="</table>";
        echo $html;
    }

    function studentresult($pid){
        $recs = Array();
        $recs = getresultinfo($pid);

        $html = "<table class='table table-bordered table-hover table-striped table-md'>";
        $html.= "<tr class='text-center bg-info text-white'>
                    <th>Roll No</th>
                    <th>Student Name</th>
                    <th>Subject Name</th>
                    <th>Total Questions</th>
                    <th>Obtained Marks</th>
                    <th>Wrong Answer</th>
                    <th>Not Attemted</th>
                </tr>";
            foreach($recs as $rec){
                $name = getStudentnameByStudentId($rec['studentid']);
                $sname = getsubjectBySubjectId($rec['subjectid']);
        $html.="<tr class='text-center'>
                    <td>".$rec['studentid']."</td>
                    <td>".$name[0]['studentname']."</td>
                    <td>".$sname[0]['subjectname']."</td>
                    <td>".$rec['questioncount']."</td>
                    <td>".$rec['correctanswer']."</td>
                    <td>".$rec['wronganswer']."</td>
                    <td>".$rec['notattempted']."</td>
                </tr>";
        } 
        echo $html;
    }
?>