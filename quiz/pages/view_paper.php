<?php 
    session_start();
    if(!isset($_SESSION['username'])){
        header('location:loginpage.php');
    }
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
        <?php include_once "../partials/menu.php"; ?>
        <div class='container-fluid'>
            <div class='bg-light border border-info row p-2 ml-2 mr-2 mt-3 pb-3'>
                <div class='col-md-12'>
                    <h1 class='text-center' style='font-weight:500;'>View Paper</h1>
                    <hr class='mt-1 mb-3 bg-info'>    
                </div>
                <div class="col-md-12">
                    <?php $username = $_SESSION['username']; view_paper($username); ?>
                </div>
        </div>
    </body>
</html>
        
        