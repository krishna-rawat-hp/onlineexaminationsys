<?php
    if(
        (isset($_GET['pid'])==false )
    ){
        header("Location:view_paper.php");
    }
    $pid = $_GET['pid'];
?>
<html>
    <head>
        <?php include_once "../partials/title.php"; ?>
        <?php include_once "../partials/common_lib.php"; ?>
        <script src="../js/paper_info.js"></script>
        <?php 
            include_once "../db/connection.php";
            include_once "../db/paper_db.php";
            include_once "../grid/paper_grid.php"; 
        ?>
    </head>
    <body>
        <div>
            <?php  questioPaper($pid); ?> 
        </div>
    </body>
</html>
        
        