<?php 
    session_start();
    if(!isset($_SESSION['username'])){
        header('location:loginpage.php');
    }
?>
<!DOCTYPE html>
<html>
<head>
    <?php include_once "../partials/title.php"; ?>
    <?php include_once "../partials/common_lib.php"; ?>
    <link rel="stylesheet" type="text/css" href="../css/homepage.css">
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700%7CPT+Serif:400,700,400italic' rel='stylesheet'>
	<link href="https://fonts.googleapis.com/css?family=Montserrat|Open+Sans" rel="stylesheet">   
</head>
<body>
    <div id="header">
        <div class="row">
            <div class="col-md-4 pt-1 pl-4" style='color:#aaa;'>
                WELCOME :  <b style='font-weight:700; color:#fff'><?php echo $_SESSION['username'] ?></b>
            </div>
            <div class="col-md-4 text-center pt-1 blinking" style="color:#fff;font-weight: 600; font-size:1.2em; letter-spacing:2pt;">
                Online Examination System
            </div>
            <div class="col-md-4 text-right">
                <a href="../pages/logoutpage.php" class='btn btn-link p-1 m-0 text-white' id="link">LOGOUT</a>
            </div> 
        </div>
      </div>
      <?php include_once "../partials/menu.php"; ?>
    <div id="bgimage">  
        <div id="text">   
           <span> <br><h2> WELCOME </h2></tr> <h2>TO</h2> </tr> <h2>ONLINE EXAMINATION SYSTEM</h2></span>
        </div>
    </div>
</body>
</html>