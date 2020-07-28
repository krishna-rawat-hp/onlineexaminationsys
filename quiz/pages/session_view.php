<html>
<head>
    <?php include_once "../partials/title.php"; ?>
    <?php include_once "../partials/common_lib.php"; ?>
    <?php
      include_once "../db/connection.php";
      include_once "../db/session_db.php";
      include_once "../grid/session_grid.php"; 
    ?>
    <script src="../js/session_add.js"></script>
</head>
<body>
<?php include_once "../partials/menu.php"; ?>
    <div class='bg-light border border-info row p-2 ml-2 mr-2 mt-3 pb-3'>
                <div class='col-md-12'>
                    <h1 class='text-center' style='font-weight:300;'>View Session</h1>
                    <hr class='mt-1 mb-3 bg-info'>    
                </div>
        <div class="col-md-4"></div>
        <div class='col-md-4 m-3 p-1'>
            <?php
                sessions_view();
            ?>
        </div>
        <div class="col-md-4"></div>
</div>
</body>
</html>