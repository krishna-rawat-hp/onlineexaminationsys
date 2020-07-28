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
            include_once "../grid/common_grid.php"; 
        ?>
    <script type="text/javascript">
        var qids = [];
        var max = <?php echo $_SESSION['questioncount'];?>;
    </script>
    </head>
    <body>
        <?php include_once "../partials/menu.php"; ?>
        <div class='container-fluid'>
            <div class='bg-light border border-info row p-2 ml-2 mr-2 mt-3 pb-3'>
                    <div class="col-md-4">
                        Faculty Name :  <b style='font-weight:700; color:green'><?php echo $_SESSION['username'] ?></b><br>
                        Subject Name :  <b style='font-weight:700; color:green'><?php $id = $_SESSION['subjects'];  subject_name($id); ?></b>

                                                                       
                    </div>
                    <div class="col-md-4">
                        <h1 class='text-center' style='font-weight:300;'>Select Question</h1>
                    </div>
                    <div class="col-md-4 text-right">
                        Total Duration :  <b style='font-weight:700; color:green'><?php echo $_SESSION['duration'] ?></b> min <br>
                        Total Question :  <b style='font-weight:700; color:green; padding-right:22pt'><?php echo $_SESSION['questioncount'] ?></b>
                    </div>
                    <div class="col-md-12">
                        <hr class='mt-1 mb-3 bg-info'>
                    </div>
            </div>
            <div class='bg-light border border-info row p-2 ml-2 mr-2 mt-3 pb-3'>
                <?php 
                    $id = $_SESSION['subjects'];
                    question_select($id);
                ?>
            </div>
        </div>
    </body>
</html>
        
        