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
        <?php include_once "../partials/menu1.php"; ?>
        <div class='container-fluid'>
            <div class='bg-light border border-info row p-2 ml-2 mr-2 mt-3 pb-3'>
                <div class='col-md-12'>
                    <h1 class='text-center' style='font-weight:300;'>Add Subject</h1>
                    <hr class='mt-1 mb-3 bg-info'>    
                </div>
                <div class='col-md-3 text-center'>
                   <?php
                        branchDropdown_2('branchlist');
                    ?>
                </div>
                <div class='col-md-3 text-center'>
                    <select class='form-control' id='semesters'>
                    </select>
                </div>
                <div class='col-md-3'>
                    <input 
                        type="text" 
                        id="subjectname" 
                        placeholder="Enter Subject Name" 
                        class='form-control'
                    >
                </div>
                <div class='col-md-3 text-left'>
                    <button onclick='saveSubject();' class='btn btn-primary' style='width:100pt;'>SAVE</button>
                </div>
            </div>
        </div>
    </body>
</html>
        
        