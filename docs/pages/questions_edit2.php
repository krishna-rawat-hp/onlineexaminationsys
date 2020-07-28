<?php 
include_once "../db/connection.php";
    if(
        (isset($_GET['qid'])==false ) &&
        (isset($_GET['bid'])==false ) &&
        (isset($_GET['sid'])==false ) &&
        (isset($_GET['subid'])==false )
    ){
        header("Location:questions_edit.php");
    }
    $qid = $_GET['qid'];
    $bid = $_GET['bid'];
    $sid = $_GET['sid'];
    $subid = $_GET['subid'];
    
?>

<html>
    <head>
        <?php include_once "../partials/title.php"; ?>
        <?php include_once "../partials/common_lib.php"; ?>
        <script src="../js/question_add.js"></script>
        <?php 
            include_once "../db/connection.php";
            include_once "../db/question_db.php";
            include_once "../grid/question_grid.php";
            include_once "../grid/common_grid.php";
        ?>
    </head>
    <body>
        <?php include_once "../partials/menu.php"; ?>
        <div class='container-fluid'>
            <div class='bg-light border border-info row p-2 ml-2 mr-2 mt-3 pb-3'>
                <div class='col-md-12'>
                    <h1 class='text-center' style='font-weight:400;'>Edit Question</h1>
                    <hr class='mt-1 mb-4 bg-info'>    
                </div>
                <div>
                    <?php question($qid, $bid, $sid, $subid); ?>
                </div>
            </div> 
        </div>
    </body>
</html>