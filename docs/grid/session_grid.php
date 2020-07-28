<?php
    function sessions_grid(){       
        $recs = getSessions();     
        $html = "<table class='table table-bordered table-striped'>
                    <tr class='text-center bg-primary text-white'>
                        <th>SESSION NAME</th>
                        <th>EDIT</th>
                    </tr>";
        foreach ($recs as $rec) {
            $html.="<tr>
                        <td>
                            <input type='text' class='form-control' id='t_".$rec['sessionid']."' value='".$rec['sessionname']."'>
                        </td>
                        <td class='text-center' style='width:100pt;'>
                            <button class='btn btn-primary' style='width:100pt;' onclick=\"sessionEdit('".$rec['sessionid']."');\">EDIT</button>
                        </td>
                    </tr>";
        }
        $html.="</table>";
        echo $html;
    }

    function sessions_view(){       
        $recs = getSessions();     
        $html = "<table class='table table-bordered table-striped'>
                    <tr class='text-center bg-primary text-white'>
                        <th>SESSION NAME</th>
                    </tr>";
        foreach ($recs as $rec) {
            $html.="<tr>
                        <td class='text-center' style='font-size:16pt;'>
                            ".$rec['sessionname']."
                        </td>
                    </tr>";
        }
        $html.="</table>";
        echo $html;
    }
?>