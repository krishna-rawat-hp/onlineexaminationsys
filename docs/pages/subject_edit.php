<html>
    <head>
        <?php include_once "../partials/title.php"; ?>
        <?php include_once "../partials/common_lib.php"; ?>
        <script src="../js/subject_add.js"></script>
        <?php 
            include_once "../db/connection.php";
            include_once "../db/subject_db.php";
            include_once "../grid/subject_grid.php";
            include_once "../grid/common_grid.php";
        ?>
    </head>
    <body>
        <?php include_once "../partials/menu.php"; ?>
        <div class='container-fluid'>
            <form action="subject_edit.php" method="post">
            <div class='bg-light border border-info row p-2 ml-2 mr-2 mt-3 pb-3'>
                <div class='col-md-12'>
                    <h1 class='text-center' style='font-weight:300;'>Edit Subject</h1>
                    <hr class='mt-1 mb-3 bg-info'>    
                </div>
                <div class='col-md-2 text-center'>
                </div>
                <div class='col-md-3 text-center'>
                   <?php
                        branchDropdown_2('branchlist');
                    ?>
                </div>
                <div class='col-md-3 text-center'>
                    <select class='form-control' id='semesters' name='semesters'>
                    </select>
                </div>
                <div class='col-md-4 text-left'>
                <input type="submit" value="VIEW" class='btn btn-primary'>
                </div>
            </div>
            </form>
            <div class='bg-light border border-info row p-2 ml-2 mr-2 mt-3 pb-3'>
                    <div class='col-md-3'>
                    </div>
                    <div class='col-md-6'>
                        <?php
                            if((isset($_POST['branchlist']) == true) && (isset($_POST['semesters']) == true)){
                                subject_edit($_POST['semesters']);
                            }else{
                                echo "No details";
                            } 
                             
                        ?>
                    </div>
                    <div class='col-md-3'>
                    </div>
            </div> 
        </div>
    </body>
</html>
        
        