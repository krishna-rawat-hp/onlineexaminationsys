
<html>
<head>
    <?php include_once "../partials/title.php"; ?>
    <?php include_once "../partials/common_lib.php"; ?>
    <?php
      include_once "../db/connection.php";
      include_once "../db/branch_db.php";
      include_once "../grid/branch_grid.php"; 
    ?>
    <script src="../js/branch_add.js"></script>
</head>
<body>
<?php include_once "../partials/menu.php"; ?>
<div class='m-3 p-1'>
            <?php
                branches_grid();
            ?>
        </div>
</body>
</html>
