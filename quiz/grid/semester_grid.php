<?php
    include_once "../partials/title.php";
    include_once "../partials/common_lib.php"; 
    function semester_grid(){
        $recs = getBranch();
        echo "<html>";
        echo "<body>";
        echo "<select  id='bid' class=\"form-control\">";
    
        foreach ($recs as $rec) {
           
            unset($id, $name);
            $id = $rec['branchid'];
            $name = $rec['branchname']; 
            echo '<option value="'.$id.'">'.$name.'</option>';
        }
        echo "</select>";
        echo "</body>";
        echo "</html>";
    }

    function semester_View($id){
        $recs = getSemesterByBranchId($id);
        $html = "<table class='table table-bordered table-striped'>
        <tr class='text-center bg-primary text-white'>
            <th>SEMESTER NAME</th>
        </tr>";
        foreach ($recs as $rec) {
        $html.="<tr>
                    <td>
                    <input type='text' class='form-control' id='s_".$rec['branchid']."' value='".$rec['semestername']."'>
                    </td>
                </tr>";
        }
        $html.="</table>";
        echo $html;

    }

    function semester_delete($id){
        $recs = getSemesterByBranchId($id);
        $html = "<table class='table table-bordered table-striped'>
        <tr class='text-center bg-primary text-white'>
            <th>SEMESTER NAME</th>
            <th>DELETE</th>
        </tr>";
        foreach ($recs as $rec) {
        $html.="<tr>
                    <td>
                        <input type='text' class='form-control' id='s_".$rec['semesterid']."' value='".$rec['semestername']."'>
                    </td>
                    <td class='text-center' style='width:100pt;'>
                        <button class='btn btn-primary' style='width:100pt;' onclick=\"semesterDelete('".$rec['semesterid']."');\">DELETE</button>
                    </td>
                </tr>";
        }
        $html.="</table>";
        echo $html;
    }


?>