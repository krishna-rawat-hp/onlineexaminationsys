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
    <?php 
            include_once "../db/connection.php";
            include_once "../db/student_db.php";
            include_once "../grid/student_profile_grid.php";
            include_once "../grid/common_grid.php"; 
        ?>
    <link rel="stylesheet" type="text/css" href="../css/student_profile.css">
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700%7CPT+Serif:400,700,400italic' rel='stylesheet'>
	<link href="https://fonts.googleapis.com/css?family=Montserrat|Open+Sans" rel="stylesheet">   
</head>
<body>
    <div id="header">
      <?php include_once "../partials/menu2.php"; ?>
    <div id="bgimage">  
        <div id="text">   
        <div class=' row  ml-2 mr-2 pb-3'>
                <div class='col-md-12 mt-2'>
                    <h1 class='text-center' style='font-weight:500; color:white;'>Student Profile</h1>
                    <hr class='mt-1 mb-3 bg-info'>    
                </div>
                <div class='col-md-12 mt-2' style="margin-left: 30pt">
                    <span style="color:seashell; font-size:20pt">Student Name : </span> <b style='font-weight:700; color:yellow; font-size:15pt '><?php $id = $_SESSION['username'];  student_name($id);?></b>    
                </div>
                <div class='col-md-12 mt-2' style="margin-left: 30pt">
                    <span style="color:seashell; font-size:20pt">Father Name : </span> <b style='font-weight:700; color:yellow; font-size:15pt '><?php $id = $_SESSION['username'];  father_name($id);?></b>    
                </div>
                <div class='col-md-12 mt-2' style="margin-left: 30pt">
                    <span style="color:seashell; font-size:20pt">Roll No : </span> <b style='font-weight:700; color:yellow; font-size:15pt '><?php echo $_SESSION['username'] ?></b>    
                </div>
                <div class='col-md-12 mt-2' style="margin-left: 30pt">
                    <span style="color:seashell; font-size:20pt">Contact No : </span> <b style='font-weight:700; color:yellow; font-size:15pt '><?php $id = $_SESSION['username'];  contact_no($id);?></b>    
                </div>

        </div>
    </div>
</body>
</html>