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
            <form action="subject_add.php" method="post">
            <div class='bg-light border border-info row p-2 ml-2 mr-2 mt-3 pb-3'>
                <div class='col-md-12'>
                    <h1 class='text-center' style='font-weight:300;'>Add Subject</h1>
                    <hr class='mt-1 mb-3 bg-info'>    
                </div>
                <div class='col-md-12 text-center pb-3'>
                <div class='col-ma-4'>
                </div>
                <div class='col-md-4'>
                   <?php
                    if(isset($_POST['branchlist'])){
                        branchDropdown_1('branchlist', $_POST['branchlist']);
                    }else{
                        branchDropdown_1('branchlist', "");
                    } 
                    ?>
                </div><br>
                <div class='col-ma-4'>
                </div>
                </div>
                <div class='col-md-12 text-center pb-3'>
                <div class='col-ma-4'>
                </div>
                <div class='col-md-4 '>
                    <?php
                    if(isset($_POST['semlist'])){
                        semesterDropdown('semlist', $_POST['semlist']);
                    }else{
                        semesterDropdown('semlist', "");
                    } 
                    ?>
                </div>
                <div class='col-ma-4'>
                </div>
                </div>
                <div class='col-md-12 text-center'>
                    <button onclick='saveSubject();' class='btn btn-primary' style='width:100pt;'>SAVE</button>
                </div>
            </div>
            </form>  
        </div>
    </body>
</html>
        
        