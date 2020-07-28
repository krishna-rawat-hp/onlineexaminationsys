<?php
    include_once "../db/connection.php";
    session_start();
    $sid = $_SESSION['username'];
?>

<html>
    <head>
        <?php include_once "../partials/title.php"; ?>
        <?php include_once "../partials/common_lib.php"; ?>
        <script src="../js/question_add.js"></script>
        <?php 
            include_once "../db/connection.php";
            include_once "../db/exam_db.php";
            include_once "../grid/exam_grid.php";
        ?>
    </head>
    <body>
        <?php include_once "../partials/menu2.php"; ?>
        <div class='container-fluid'>
            <div class='bg-light border border-info row p-2 ml-2 mr-2 mt-3 pb-3'>
                <div class='col-md-12'>
                    <h1 class='text-center' style='font-weight:500;'>RESULT</h1>
                    <hr class='mt-1 mb-4 bg-info'>    
                </div>
                <div class="col-md-6 text-center">
                    <span style=" font-weight:400; font-size:15pt;">Student Name : </span> <b style='font-weight:500; font-size:15pt;'><?php $id = $_SESSION['username']; student_name($id); ?></b>                                                                  
                </div>
                <div class="col-md-6 text-center">
                    <span style=" font-weight:400; font-size:15pt;">Roll no. : </span> <b style='font-weight:500; font-size:15pt;'><?php echo $_SESSION['username']; ?></b>                                                                  
                </div>
            </div>
            <div class="row">
            <div class="col-md-12"><?php studentresult($sid); ?></div>
        </div>
  </body>
</html>