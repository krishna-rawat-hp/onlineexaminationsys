<?php

function student_name($id){
    $rec = getStudentById($id);
    if(isset($rec) && empty($rec) == false){
        $html = $rec[0]['studentname'];
        echo $html;
    }
}

function father_name($id){
    $rec = getStudentById($id);
    if(isset($rec) && empty($rec) == false){
        $html = $rec[0]['fathername'];
        echo $html;
    }
}

function branch($id){
    $rec = getStudentById($id);
    if(isset($rec) && empty($rec) == false){
        $html = $rec[0]['branch'];
        echo $html;
    }
}

function branchGet($bid){
    $rec = getBranchById($bid);
    if(isset($rec) && empty($rec) == false){
        $html = $rec[0]['branch'];
        echo $html;
    }
}
function semester($id){
    $rec = getStudentById($id);
    if(isset($rec) && empty($rec) == false){
        $html = $rec[0]['semesterid'];
        echo $html;
    }
}

function contact_no($id){
    $rec = getStudentById($id);
    if(isset($rec) && empty($rec) == false){
        $html = $rec[0]['contactno'];
        echo $html;
    }
}

function update_profile($rollno){       
    $recs = getStudentById($rollno);     
    $html = "<table class='table table-bordered table-striped'>";
    foreach ($recs as $rec) {
        $html.="<tr>
                    <td  width='10%' class='align-middle font-weight-bold'>
                        Rollno:
                    </td>
                    <td>
                        <input type='text' class='form-control' id='rn".$rec['rollno']."' value='".$rec['rollno']."'>
                    </td> 
        </tr>";
        $html.="<tr>
                    <td  class='align-middle font-weight-bold'>
                        Student Name:
                    </td>
                    <td>
                        <input type='text' class='form-control' id='sn".$rec['rollno']."' value='".$rec['studentname']."'>
                    </td> 
        </tr>";
        $html.="<tr>
                    <td  class='align-middle font-weight-bold'>
                        Father Name:
                    </td>
                    <td>
                        <input type='text' class='form-control' id='fn".$rec['rollno']."' value='".$rec['fathername']."'>
                    </td> 
        </tr>";
        $html.="<tr>
                    <td  class='align-middle font-weight-bold'>
                        Password:
                    </td>
                    <td>
                        <input type='text' class='form-control' id='pw".$rec['rollno']."' value='".$rec['password']."'>
                    </td> 
        </tr>";
        $html.="<tr>
                    <td  class='align-middle font-weight-bold'>
                        Contact No:
                    </td>
                    <td>
                        <input type='text' class='form-control' id='cn".$rec['rollno']."' value='".$rec['contactno']."'>
                    </td> 
        </tr>";
        $html.="<tr>
                    <td class='text-center' style='width:100pt;' colspan=2>
                        <button class='btn btn-success' style='width:100pt;' onclick=\"profileUpdate('".$rec['rollno']."');\">UPDATE</button>
                    </td>
                </tr>";
    }
    $html.="</table>";
    echo $html;
}

?>