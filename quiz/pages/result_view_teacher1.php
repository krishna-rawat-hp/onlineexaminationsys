<?php 
include_once "../db/connection.php";
    if(
        (isset($_GET['pid'])==false )
    ){
        header("Location:view_exam.php");
    }
    $pid = $_GET['pid'];
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
            <div class='bg-light border border-info row p-2 ml-2 mr-2 mt-3 pb-3'>
                <div class='col-md-12'>
                    <h1 class='text-center' style='font-weight:300;'>Result</h1>
                    <hr class='mt-1 mb-4 bg-info'>    
                </div>
                <div class="col-md-12">
                    <?php studentresult($pid); ?>
                </div>
            </div>
        </div>
    </body>
</html>