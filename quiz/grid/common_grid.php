<?php

function subject_name($id){
    $rec = getsubjectBySubjectId($id);
    if(isset($rec) && empty($rec) == false){
        $html = $rec[0]['subjectname'];
        echo $html;
    }
}

function sessiondropdown($id){
    $recs = getSessions();
    $html=  "<select class='form-control' id='$id'>
                <option value='-1'>Session Name</option>";
    foreach ($recs as $rec) {
        $html.="<option value='".$rec['sessionid']."'>".$rec['sessionname']."</option>";
    }
    $html.="</select>";
    echo $html;
}


function branchDropdown($id){
    $recs = getBranch();
    $html=  "<select class='form-control' id='$id' name='$id'>
                <option value='-1'>Branch Name</option>";
    foreach ($recs as $rec) {
        $html.="<option value='".$rec['branchid']."'>".$rec['branchname']."</option>";
    }
    $html.="</select>";
    echo $html;
}


    function branchDropdown_1($id){
        $recs = getBranch();
        $html=  "<select class='form-control' id='$id' name='$id' onchange=\"fetchSemester()\">
                    <option value='-1'>Branch Name</option>";
        foreach ($recs as $rec) {
            $html.="<option value='".$rec['branchid']."'>".$rec['branchname']."</option>";
        }
        $html.="</select>";
        echo $html;
    }

    function branchDropdown_2($id){
        $recs = getBranch();
        $html=  "<select class='form-control' id='$id' name='$id' onchange=\"populateSemester()\">
                    <option value='-1'>Branch Name</option>";
        foreach ($recs as $rec) {
            $html.="<option value='".$rec['branchid']."'>".$rec['branchname']."</option>";
        }
        $html.="</select>";
        echo $html;
    }

    function sessionDropdown_1($id){
        $recs = getSession();
        $html=  "<select class='form-control' id='$id' name='$id'>
                    <option value='-1'>Session Name</option>";
        foreach ($recs as $rec) {
            $html.="<option value='".$rec['sessionid']."'>".$rec['sessionname']."</option>";
        }
        $html.="</select>";
        echo $html;
    }