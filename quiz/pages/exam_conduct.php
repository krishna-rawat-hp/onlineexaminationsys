<?php 
    session_start();
    if(!isset($_SESSION['username'])){
        header('location:loginpage.php');
    }
    $pid ="";
    if(isset($_SESSION['paperid'])){
        $pid = $_SESSION['paperid'];
    }

?>
<!DOCTYPE html>
<html>
<head>
        <?php include_once "../partials/title.php"; ?>
        <?php include_once "../partials/common_lib.php"; ?>
        <script src="../js/paper_info.js"></script>
        <?php 
            include_once "../db/connection.php";
            include_once "../db/exam_db.php";
            include_once "../grid/exam_grid.php";
        ?>
    <script src='../js/get_paper.js'></script>
    <?php
        include_once "../db/get_paper.php";
    ?>
    <script type="text/javascript">
        var papers = [];
        var answers = [];
        var max = -1;
        var c = -1;
        var timer = <?php echo (total_time($pid)); ?>;
        var timer_handler = null;
    </script>
</head>
<body onload="getPaper(<?php echo $pid;?> )">
   <div class='container-fluid'>
    <div class="bg-dark row">
        <div class="col-md-4 text-white">
            <span style="margin-left: 10pt; font-weight:600; font-size:15pt;">Student Name : </span> <b style='font-weight:700; font-size:15pt; color:yellow;'><?php $id = $_SESSION['username']; student_name($id); ?></b>                                                                  
        </div>
 
        <div class="col-md-6 text-white">
            <span style="margin-left: 10pt; font-weight:600; font-size:15pt;">Roll No : </span> <b style='font-weight:700; font-size:15pt; color:yellow;'><?php echo $_SESSION['username'];?></b>
        </div>

        <div class="col-md-2 text-white">
            <span style="margin-left: 10pt; font-weight:600; font-size:15pt;">Total Question : </span> <b style='font-weight:700; font-size:15pt; color:yellow;'><?php total_question($pid); ?></b>
        </div>

        <div class="col-md-4 text-white">
            <span style="margin-left: 10pt; font-weight:600; font-size:15pt;">Teacher Name : </span> <b style='font-weight:700; font-size:15pt; color:yellow;'><?php teacher_name($pid) ?></b>                                                                       
        </div>

        <div class="col-md-6 text-white">
            <span style="margin-left: 10pt; font-weight:600; font-size:15pt;">Subject Name : </span> <b style='font-weight:700;font-size:15pt; color:yellow;'><?php subject_name($pid) ?></b>
        </div>

        <div class="col-md-2 text-white">
            <b style="margin-left: 10pt; font-weight:600; font-size:15pt;">Time Left:  <b style='font-weight:700; font-size:15pt; color:yellow;' id='tmr'></b>
        </div>
    </div>
    <div class="row pb-2"> <div class="col-md-12 text-center" style="margin-top: -15pt; margin-bottom: 20pt;"><h3>QUESTION NO : <span id="questno"></span></h3></div></div>
    <input type="hidden" id="paperid" value="<?php echo $pid; ?>">
   
   <table class='table table-light table-striped ' style=" margin-right: 10pt; margin-top: -23pt;">
        <tr>
            <td style='width:10pt;' class='align-middle font-weight-bold'>   Question:</td>
            <td colspan=2>
                <textarea id='question' class='form-control' cols=500 rows='3' style='font-size:15pt; color:black;' readonly></textarea>
            </td> 
        </tr>
        <tr></tr>
            <td style='' class='align-middle font-weight-bold'> Option 1: </td>
            <td  style='width:15pt;margin-right:5pt;' class='text-center'>
                <input type='radio' id="a" value='a' name='option'class='form-check-input' style='margin-top:19pt; margin-left:5pt;'>
            </td>
            <td>
                <textarea id='opt1' class='form-control col-md-12' cols='150' rows='1' style='font-size:15pt; margin-left:5pt; color:black;' readonly></textarea>
            </td> 
        </tr>
        <tr>
            <td style='' class='align-middle font-weight-bold'> Option 2: </td>
            <td  style='width:15pt;' class='text-center'>
                <input type='radio' id="b" value='b' name='option'class='form-check-input' style='margin-top:19pt; margin-left:5pt;' >
            </td>
            <td>
                <textarea id='opt2'class='form-control col-md-12' cols='150' rows='1' style='font-size:15pt; margin-left:5pt; color:black;' readonly></textarea>
            </td> 
        </tr>
        <tr>
            <td style='' class='align-middle font-weight-bold'> Option 3: </td>
            <td  style='width:15pt;' class='text-center'>
                <input type='radio' id="c" value='c' name='option'class='form-check-input' style='margin-top:19pt; margin-left:5pt;'>
            </td>
            <td>
                <textarea id='opt3' class='form-control col-md-12' cols='150' rows='1' style='font-size:15pt; margin-left:5pt; color:black;' readonly></textarea>
            </td> 
        </tr>
        <tr>
            <td style='' class='align-middle font-weight-bold'> Option 4: </td>
            <td  style='width:15pt;' class='text-center'>
                <input type='radio' id="d" value='d' name='option'class='form-check-input' style='margin-top:19pt; margin-left:5pt;'>
            </td>
            <td>
                <textarea id='opt4'class='form-control col-md-12' cols='150' rows='1' style='font-size:15pt; margin-left:5pt; color:black;' readonly></textarea>
            </td> 
        </tr>
        <tr>
            <td colspan="2" class="text-center"><button class="btn btn-success" style="width:100pt; font-size: 15pt;" onclick="saveAnswer();"> SAVE </button></td>
            <td class="text-center">
                <button class="btn btn-primary " style="width:100pt; font-size: 15pt;" onclick="prevQuestion();">PREV </button>   
                <button class="btn btn-primary " style="width:100pt; font-size: 15pt;" onclick="nextQuestion();"> NEXT </button>
                <button class="btn btn-danger float-right"  style="width:100pt; font-size: 15pt;" onclick="submitPaper();">SUBMIT</button>
            </td>         
        </tr>
    </table>
    
</div>
</body>
</html>