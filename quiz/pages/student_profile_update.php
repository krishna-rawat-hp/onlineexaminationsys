<?php
    session_start();

    if(!isset($_SESSION['username'])){
        header('location:loginpage.php');
    }else{
        $rollno = $_SESSION['username'];
    }

?>
<html>
    <head>
        <?php include_once "../partials/title.php"; ?>
        <?php include_once "../partials/common_lib.php"; ?>
        <script src="../js/student_info.js"></script>
        <?php
            include_once "../db/connection.php";
            include_once "../db/student_db.php";
            include_once "../grid/student_profile_grid.php"; 
        ?>
    </head>
    <body>
        <?php include_once "../partials/menu2.php"; ?>
        <div class='container-fluid'>
                <div class='bg-light border border-info row p-2 ml-2 mr-2 mt-3'>
                    <div class='col-md-12'>
                        <h1 class='text-center' style='font-weight:300;'>Update Profile</h1>
                        <hr class='mt-1 mb-3 bg-info'>
                    </div>
                    <div class='col-md-12'>
                        <?php
                           update_profile($rollno);
                        ?>
                    </div>
                </div>
        </div>

    </body>
</html>