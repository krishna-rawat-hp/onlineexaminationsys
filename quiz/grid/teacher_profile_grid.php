<?php

function update_profile($username){       
    $recs = getTeacherById($username);     
    $html = "<table class='table table-bordered table-striped'>";
    foreach ($recs as $rec) {
        $html.="<tr>
                    <td  width='10%' class='align-middle font-weight-bold'>
                        Faculty Name:
                    </td>
                    <td>
                        <input type='text' class='form-control' id='tn".$rec['teachername']."' value='".$rec['teachername']."'>
                    </td> 
        </tr>";
        $html.="<tr>
                    <td  class='align-middle font-weight-bold'>
                        Password:
                    </td>
                    <td>
                        <input type='text' class='form-control' id='pw".$rec['teachername']."' value='".$rec['password']."'>
                    </td> 
        </tr>";
        $html.="<tr>
                    <td  class='align-middle font-weight-bold'>
                        Contact No:
                    </td>
                    <td>
                        <input type='text' class='form-control' id='cn".$rec['teachername']."' value='".$rec['contactno']."'>
                    </td> 
        </tr>";
        $html.="<tr>
                    <td class='text-center' style='width:100pt;' colspan=2>
                        <button class='btn btn-success' style='width:100pt;' onclick=\"profileUpdate('".$rec['teachername']."');\">UPDATE</button>
                    </td>
                </tr>";
    }
    $html.="</table>";
    echo $html;
}

function update_profile_hod($username){       
    $recs = getHodById($username);     
    $html = "<table class='table table-bordered table-striped'>";
    foreach ($recs as $rec) {
        $html.="<tr>
                    <td  width='10%' class='align-middle font-weight-bold'>
                        Faculty Name:
                    </td>
                    <td>
                        <input type='text' class='form-control' id='hn".$rec['HODname']."' value='".$rec['HODname']."'>
                    </td> 
        </tr>";
        $html.="<tr>
                    <td  class='align-middle font-weight-bold'>
                        Password:
                    </td>
                    <td>
                        <input type='text' class='form-control' id='pw".$rec['HODname']."' value='".$rec['password']."'>
                    </td> 
        </tr>";
        $html.="<tr>
                    <td  class='align-middle font-weight-bold'>
                        Contact No:
                    </td>
                    <td>
                        <input type='text' class='form-control' id='cn".$rec['HODname']."' value='".$rec['contactno']."'>
                    </td> 
        </tr>";
        $html.="<tr>
                    <td class='text-center' style='width:100pt;' colspan=2>
                        <button class='btn btn-success' style='width:100pt;' onclick=\"profileUpdateHod('".$rec['HODname']."');\">UPDATE</button>
                    </td>
                </tr>";
    }
    $html.="</table>";
    echo $html;
}

?>