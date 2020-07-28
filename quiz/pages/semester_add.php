<html>
    <head>
        <?php include_once "../partials/title.php"; ?>
        <?php include_once "../partials/common_lib.php"; ?>
        <script src="../js/semester_add.js"></script>
        <?php 
            include_once "../db/connection.php";
            include_once "../db/semester_db.php";
            include_once "../grid/semester_grid.php"; 
        ?>
    </head>
    <body>
        <?php include_once "../partials/menu.php"; ?>
        <div class='container-fluid'>
            <div class='bg-light border border-info row p-2 ml-2 mr-2 mt-3 pb-3'>
                <div class='col-md-12'>
                    <h1 class='text-center' style='font-weight:300;'>Add Semester</h1>
                    <hr class='mt-1 mb-3 bg-info'>    
                </div>
                <div class='col-md-2 text-center'>
                   
                </div>
                <div class='col-md-3 text-center'>
                    <?php
                        semester_grid();
                    ?>
                </div>
                <div class='col-md-2'>
                <select id='semname' class="form-control">
                    <option value="1st">1st</option>
                    <option value="2nd">2nd</option>
                    <option value="3rd">3rd</option>
                    <option value="4th">4th</option>
                    <option value="5th">5th</option>
                    <option value="6th">6th</option>
                </select>
                </div>
                <div class='col-md-4 text-left'>
                    <button onclick='saveSemester();' class='btn btn-primary' style='width:100pt;'>SAVE</button>
                </div>
            </div>  
        </div>
    </body>
</html>
        
        