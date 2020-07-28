<?php
    //include_once "../partials/title.php";
    //include_once "../partials/common_lib.php"; 
    
    function subject_edit($id){
        $recs = Array();
        $recs = getsubjects($id);
        $html = "<table class='table table-bordered table-striped'>
                    <tr class='text-center bg-primary text-white'>
                        <th>SUBJECT NAME</th>
                        <th>EDIT</th>
                    </tr>";
        foreach ($recs as $rec) {
           $html.="<tr>
                        <td>
                            <input type='text' class='form-control' id='t_".$rec['subjectid']."' value='".$rec['subjectname']."'>
                        </td>
                        <td class='text-center' style='width:100pt;'>
                            <button class='btn btn-primary' style='width:100pt;' onclick=\"subjectEdit('".$rec['subjectid']."');\">EDIT</button>
                        </td>
                    </tr>";
        }
        $html.="</table>";
        echo $html;
    }

    function subject_view($id){
        $recs = Array();
        $recs = getsubjects($id);
        $html = "<table class='table table-bordered table-striped'>
                    <tr class='text-center bg-primary text-white'>
                        <th>SUBJECT NAME</th>
                    </tr>";
        foreach ($recs as $rec) {
            $html.="<tr>
                        <td>
                            <input type='text' class='form-control' id='t_".$rec['semesterid']."' value='".$rec['subjectname']."'>
                        </td>
                    </tr>";
        }
        $html.="</table>";
        echo $html;
    }
?>