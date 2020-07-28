<html>
    <head>
        <?php include_once "../partials/title.php"; ?>
        <?php include_once "../partials/common_lib.php"; ?>
        <script src="../js/exam_detail.js"></script>
        <?php 
            include_once "../db/connection.php";
            include_once "../db/exam_db.php";
            include_once "../grid/exam_grid.php"; 
        ?>
    </head>
    <body>
        <?php include_once "../partials/menu2.php"; ?>
        <div class='container-fluid'>
            <div class='bg-light border border-info row p-2 ml-2 mr-2 mt-3 pb-3'>
                <div class='col-md-12'>
                    <h1 class='text-center' style='font-weight:500;'>EXAM</h1>
                    <hr class='mt-1 mb-3 bg-info'>    
                </div>
                <div class="col-md-12">
                    <?php view_exam(); ?>
                </div> 
        </div>
    </body>
</html>
        
        