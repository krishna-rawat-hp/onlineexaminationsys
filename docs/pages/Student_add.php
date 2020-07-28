<html>
        <head>
        <?php include_once "../partials/title.php"; ?>
    <?php include_once "../partials/common_lib.php"; ?>

            <script src="../js/student_add.js"></script>
        </head>
        <body class='container pt-4'>
        <?php include_once "../partials/menu.php"; ?>
            <h1 class='display-4 text-center bg-primary text-white'>Add Student</h1>
            <hr>
            <div class='bg-light p-2 text-center'>
                <input type="text" id="sn"placeholder="Enter Student Name" class='form-control mt-2 mb-2'>
                <input type="text" id="fn"placeholder="Enter Father Name" class='form-control mt-2 mb-2'>
                <input type="text" id="sb" placeholder="Enter Branch" class='form-control mt-2 mb-2'>
                <input type="text" id="sm"placeholder="Enter Student medium" class='form-control mt-2 mb-2'>
                <input type="text" id="ss"placeholder="Enter Semester" class='form-control mt-2 mb-2'>
                <input type="text" id="pn" placeholder="Enter Phone_No" class='form-control mt-2 mb-2'>
                <input type="Password" id="pp" placeholder="Enter Password" class='form-control mt-2 mb-2'>
                
                <button onclick='saveStudentData();' class='btn btn-primary' style='width:100pt;'>SAVE</button>   
            </div>
            </body>
        </html>
        
        