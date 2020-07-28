<?php
    function branches_grid(){       //function used in branch edit pages
        $recs = getBranches();     //function defined in database
        $html = "<table class='table table-bordered table-striped'>
                    <tr class='text-center bg-primary text-white'>
                        <th>BRANCH NAME</th>
                        <th>EDIT</th>
                    </tr>";
        foreach ($recs as $rec) {
            $html.="<tr>
                        <td>
                            <input type='text' class='form-control' id='t_".$rec['branchid']."' value='".$rec['branchname']."'>
                        </td>
                        <td class='text-center' style='width:100pt;'>
                            <button class='btn btn-primary' style='width:100pt;' onclick=\"branchEdit('".$rec['branchid']."');\">EDIT</button>
                        </td>
                    </tr>";
        }
        $html.="</table>";
        echo $html;
    }
?>