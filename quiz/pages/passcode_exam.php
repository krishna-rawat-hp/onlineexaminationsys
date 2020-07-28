<?php 
include_once "../db/connection.php";
    if(
        (isset($_GET['pid'])==false )
    ){
        header("Location:view_exam.php");
    }
    $pid = $_GET['pid'];
?>

<html>
    <head>
        <?php include_once "../partials/title.php"; ?>
        <?php include_once "../partials/common_lib.php"; ?>
        <link rel="stylesheet" type="text/css" href="../css/passcode_style.css"> 
        <script src="../js/passcode_valid.js"></script>
    </head>
<body>
        <div class="login-box">
                    <p>Passcode</p>
                    <input type="text" id="passcode" placeholder="Enter Passcode" >
                    <button onclick="passcodeValid(<?php echo $pid; ?>);" class='button'>START</button>
        </div>     
                
</body>
</html>