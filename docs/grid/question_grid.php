<?php
    function question_edit($id, $branchid, $semesterid){
        $recs = Array();
        $recs = getquestions($id);

        $html = "<table class='table table-bordered table-striped'>
                    <tr class='text-center bg-primary text-white'>
                    <th>DATE</th>    
                    <th>QUESTION NAME</th>
                    <th>EDIT</th>
                    </tr>";
        foreach ($recs as $rec) {
            $date_temp =date_create($rec['date']);
            $date =  date_format($date_temp,"d-M-Y");
           $html.="<tr>
                        <td>".$date."</td>
                        <td>".$rec['question']."</td>
                        <td class='text-center' style='width:100pt;'>
                        <button class='btn btn-primary' style='width:100pt;' onclick=\"questionEdit('".$rec['questionid']."','$branchid','$semesterid','$id');\">EDIT</button>  
                        </td>
                    </tr>";
        }
        $html.="</table>";
        echo $html;
    }
    function question($qid, $bid, $sid, $subid){
        $rec = getQuestionById($qid);
        if(isset($rec) && empty($rec) == false){
            $html = "<table class='table table-light table-striped table-md'>";
            $html.="<tr>
                                <td style='width:10pt;' class='align-middle font-weight-bold'>
                                    Question:
                                </td>
                                <td colspan=2>
                                    <textarea id='quest".$rec['questionid']."' class='form-control' cols=500 rows='3' style='font-size:15pt; color:black;'>".$rec['question']."</textarea>
                                </td> 
                        </tr>";
                if($rec['answer'] == "a"){
                    $html.="<tr>
                                <td style='' class='align-middle font-weight-bold'>
                                    Option 1:
                                </td>
                                <td  style='width:15pt;' class='text-center'>
                                    <input type='radio' value='a' name='option' class='form-check-input' style='margin-top:19pt; margin-left:10pt;' checked>
                                </td>";
                }else{
                    $html.="<tr>
                                <td class='align-middle font-weight-bold'>
                                    Option 1:
                                </td>
                                <td  style='width:15pt;' class='text-center'>
                                    <input type='radio' value='a' name='option' class='form-check-input' style='margin-top:19pt;margin-left:10pt;'>
                                </td>";
                        }
                $html.="<td>
                            <textarea id='opt1".$rec['questionid']."' class='form-control col-md-12' cols='150' rows='1' style='font-size:15pt; color:black;'>".$rec['a']."</textarea>
                        </td> 
                        </tr>";
                if($rec['answer'] == "b"){
                    $html.="<tr>
                                <td style='' class='align-middle font-weight-bold'>
                                    Option 2:
                                </td>
                                <td  style='width:15pt;' class='text-center'>
                                    <input type='radio' value='b' name='option' class='form-check-input' style='margin-top:19pt; margin-left:10pt;' checked>
                                </td>";
                }else{
                    $html.="<tr>
                                <td class='align-middle font-weight-bold'>
                                    Option 2:
                                </td>
                                <td  style='width:15pt;' class='text-center'>
                                    <input type='radio' value='b' name='option' class='form-check-input' style='margin-top:19pt;margin-left:10pt;'>
                                </td>";
                        }
                $html.="<td>
                            <textarea id='opt2".$rec['questionid']."'class='form-control col-md-12' cols='150' rows='1' style='font-size:15pt; color:black;'>".$rec['b']."</textarea>
                        </td> 
                        </tr>";
                        if($rec['answer'] == "c"){
                            $html.="<tr>
                                    <td style='' class='align-middle font-weight-bold'>
                                        Option 3:
                                    </td>
                                    <td  style='width:15pt;' class='text-center'>
                                        <input type='radio' value='c' name='option' class='form-check-input' style='margin-top:19pt; margin-left:10pt;' checked>
                                    </td>";
                    }else{
                            $html.="<tr>
                                    <td class='align-middle font-weight-bold'>
                                        Option 3:
                                    </td>
                                    <td  style='width:15pt;' class='text-center'>
                                        <input type='radio' value='c' name='option' class='form-check-input' style='margin-top:19pt;margin-left:10pt;'>
                                    </td>";
                            }
                        $html.="<td>
                                <textarea id='opt3".$rec['questionid']."' class='form-control col-md-12' cols='150' rows='1' style='font-size:15pt; color:black;'>".$rec['c']."</textarea>
                            </td> 
                            </tr>";
                            if($rec['answer'] == "d"){
                                $html.="<tr>
                                        <td style='' class='align-middle font-weight-bold'>
                                            Option 4:
                                        </td>
                                        <td  style='width:15pt;' class='text-center'>
                                            <input type='radio' value='d' name='option' class='form-check-input' style='margin-top:19pt; margin-left:10pt;' checked>
                                        </td>";
                        }else{
                                $html.="<tr>
                                        <td class='align-middle font-weight-bold'>
                                            Option 4:
                                        </td>
                                        <td  style='width:15pt;' class='text-center'>
                                            <input type='radio' value='d' name='option' class='form-check-input' style='margin-top:19pt; margin-left:10pt;'>
                                        </td>";
                                }
                            $html.="<td>
                                    <textarea id='opt4".$rec['questionid']."'class='form-control col-md-12' cols='150' rows='1' style='font-size:15pt; color:black;'>".$rec['d']."</textarea>
                                </td> 
                                </tr>";
                $html.="<tr>
                            <td colspan='3' class='text-center' style='width:100pt;'>
                            <button class='btn btn-success' style='width:100pt;' onclick=\"Editquestion('".$rec['questionid']."', '$bid','$sid','$subid');\">SAVE</button>
                            </td>
                        </tr>";
            
            $html.="</table>";   
            echo $html;
        }else{
            echo "No Question detail found!";
        }
    }

    function question_view($id, $branchid, $semesterid){
        $recs = Array();
        $recs = getquestions($id);

        $html = "<table class='table table-bordered table-striped'>
                    <tr class='text-center bg-primary text-white'>
                    <th>DATE</th>    
                    <th>QUESTION NAME</th>
                    <th>VIEW</th>
                    </tr>";
        foreach ($recs as $rec) {
            $date_temp =date_create($rec['date']);
            $date =  date_format($date_temp,"d-M-Y");
           $html.="<tr>
                        <td>".$date."</td>
                        <td>".$rec['question']."</td>
                        <td class='text-center' style='width:100pt;'>
                        <button class='btn btn-primary' style='width:100pt;' onclick=\"questionView('".$rec['questionid']."','$branchid','$semesterid','$id');\">VIEW</button>  
                        </td>
                    </tr>";
        }
        $html.="</table>";
        echo $html;
    }
    function view_question($qid, $bid, $sid, $subid){
        $rec = getQuestionById($qid);
        if(isset($rec) && empty($rec) == false){
            $html = "<table class='table table-light table-striped table-md'>";
            $html.="<tr>
                                <td style='width:10pt;' class='align-middle font-weight-bold'>
                                    Question:
                                </td>
                                <td colspan=2>
                                    <textarea id='quest".$rec['questionid']."' class='form-control' cols=500 rows='3' style='font-size:15pt; color:black;' readonly>".$rec['question']."</textarea>
                                </td> 
                        </tr>";
                if($rec['answer'] == "a"){
                    $html.="<tr>
                                <td style='' class='align-middle font-weight-bold'>
                                    Option 1:
                                </td>
                                <td  style='width:15pt;' class='text-center'>
                                    <input type='radio' value='a' name='option' class='form-check-input' style='margin-top:19pt; margin-left:10pt;' checked>
                                </td>";
                }else{
                    $html.="<tr>
                                <td class='align-middle font-weight-bold'>
                                    Option 1:
                                </td>
                                <td  style='width:15pt;' class='text-center'>
                                    <input type='radio' value='a' name='option' class='form-check-input' style='margin-top:19pt;margin-left:10pt;'>
                                </td>";
                        }
                $html.="<td>
                            <textarea id='opt1".$rec['questionid']."' class='form-control col-md-12' cols='150' rows='1' style='font-size:15pt; color:black;' readonly>".$rec['a']."</textarea>
                        </td> 
                        </tr>";
                if($rec['answer'] == "b"){
                    $html.="<tr>
                                <td style='' class='align-middle font-weight-bold'>
                                    Option 2:
                                </td>
                                <td  style='width:15pt;' class='text-center'>
                                    <input type='radio' value='b' name='option' class='form-check-input' style='margin-top:19pt; margin-left:10pt;' checked>
                                </td>";
                }else{
                    $html.="<tr>
                                <td class='align-middle font-weight-bold'>
                                    Option 2:
                                </td>
                                <td  style='width:15pt;' class='text-center'>
                                    <input type='radio' value='b' name='option' class='form-check-input' style='margin-top:19pt;margin-left:10pt;'>
                                </td>";
                        }
                $html.="<td>
                            <textarea id='opt2".$rec['questionid']."'class='form-control col-md-12' cols='150' rows='1' style='font-size:15pt; color:black;' readonly>".$rec['b']."</textarea>
                        </td> 
                        </tr>";
                        if($rec['answer'] == "c"){
                            $html.="<tr>
                                    <td style='' class='align-middle font-weight-bold'>
                                        Option 3:
                                    </td>
                                    <td  style='width:15pt;' class='text-center'>
                                        <input type='radio' value='c' name='option' class='form-check-input' style='margin-top:19pt; margin-left:10pt;' checked>
                                    </td>";
                    }else{
                            $html.="<tr>
                                    <td class='align-middle font-weight-bold'>
                                        Option 3:
                                    </td>
                                    <td  style='width:15pt;' class='text-center'>
                                        <input type='radio' value='c' name='option' class='form-check-input' style='margin-top:19pt;margin-left:10pt;'>
                                    </td>";
                            }
                        $html.="<td>
                                <textarea id='opt3".$rec['questionid']."' class='form-control col-md-12' cols='150' rows='1' style='font-size:15pt; color:black;' readonly>".$rec['c']."</textarea>
                            </td> 
                            </tr>";
                            if($rec['answer'] == "d"){
                                $html.="<tr>
                                        <td style='' class='align-middle font-weight-bold'>
                                            Option 4:
                                        </td>
                                        <td  style='width:15pt;' class='text-center'>
                                            <input type='radio' value='d' name='option' class='form-check-input' style='margin-top:19pt; margin-left:10pt;' checked>
                                        </td>";
                        }else{
                                $html.="<tr>
                                        <td class='align-middle font-weight-bold'>
                                            Option 4:
                                        </td>
                                        <td  style='width:15pt;' class='text-center'>
                                            <input type='radio' value='d' name='option' class='form-check-input' style='margin-top:19pt; margin-left:10pt;'>
                                        </td>";
                                }
                            $html.="<td>
                                    <textarea id='opt4".$rec['questionid']."'class='form-control col-md-12' cols='150' rows='1' style='font-size:15pt; color:black;' readonly>".$rec['d']."</textarea>
                                </td> 
                                </tr>";
                $html.="<tr>
                            <td colspan='3' class='text-center' style='width:100pt;'>
                            <a href='questions_edit.php' class='btn btn-success' >Edit Questions</a>
                            </td>
                        </tr>";
            
            $html.="</table>";   
            echo $html;
        }else{
            echo "No Question detail found!";
        }
    }


  
?>