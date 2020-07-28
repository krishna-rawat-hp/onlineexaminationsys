<?php
    session_start();
    $username = $_SESSION['username'];
?>

<html>
    <head>
        <?php include_once "../partials/title.php"; ?>
        <?php include_once "../partials/common_lib.php"; ?>
        <script src="../js/result_teacher.js"></script>
        <?php 
            include_once "../db/connection.php";
            include_once "../db/result_db.php";
            include_once "../grid/result_view_grid.php";
            include_once "../grid/common_grid.php";
        ?>
    </head>
    <body>
        <?php include_once "../partials/menu.php"; ?>
        <div class='container-fluid'>
        <form action="result_view_teacher.php" method="post">
            <div class='bg-light border border-info row p-2 ml-2 mr-2 mt-3 pb-3'>
                <div class='col-md-12'>
                    <h1 class='text-center' style='font-weight:300;'>Result</h1>
                    <hr class='mt-1 mb-4 bg-info'>    
                </div>
                <div class='col-md-3 text-center'>
                   <?php
                        sessionDropdown_1('sessions');
                    ?>
                </div>
                <div class='col-md-3 text-center'>
                   <?php
                        branchDropdown_2('branchlist');
                    ?>
                </div>
                <div class='col-md-2 text-center'>
                    <select class='form-control' id='semesters' name="semesters" onchange='populateSubjects();'>
                    </select>
                </div>
                <div class='col-md-3 text-center'>
                    <select class='form-control' id='subjects' name="subjects">
                    </select>
                </div>
                <div class="col-md-1 text-left">
                   <input type="submit" value="VIEW" class='btn btn-primary'>
                </div>
            </div>
        </form> 
            <div class='bg-light border border-info row p-2 ml-2 mr-2 mt-1 pb-3'>
                    <div class='col-md-12'>
                        <?php
                            if((isset($_POST['sessions']) == true) && (isset($_POST['branchlist']) == true) && (isset($_POST['semesters']) == true) && (isset($_POST['subjects']) == true)){
                                result_view($username, $_POST['sessions'], $_POST['branchlist'], $_POST['semesters'], $_POST['subjects']) ;
                            }else{
                                echo "No details";
                            } 
                             
                        ?>
                    </div>     
            </div>
            </div>
        </div>
    </body>
</html>