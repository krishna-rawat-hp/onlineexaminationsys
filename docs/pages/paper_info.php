<?php 
    session_start();
    if(!isset($_SESSION['username'])){
        header('location:loginpage.php');
    }
?><html>
    <head>
        <?php include_once "../partials/title.php"; ?>
        <?php include_once "../partials/common_lib.php"; ?>
        <script src="../js/paper_info.js"></script>
        <?php 
            include_once "../db/connection.php";
            include_once "../db/paper_db.php";
            include_once "../grid/paper_grid.php";
            include_once "../grid/common_grid.php"; 
        ?>
    </head>
    <body>
      <?php include_once "../partials/menu.php"; ?>
        <div class='container-fluid'>
          <div class='bg-light border border-info row p-2 ml-2 mr-2 mt-3 pb-3'>
            <div class='col-md-12'>
              <h1 class='text-center' style='font-weight:300;'>Paper</h1>
              <hr class='mt-1 mb-3 bg-info'>

            <div class="form-group row">
                <label for="inputCurrentSession" class="col-md-2 col-form-label">Session:</label>
                <div class="col-md-4">
                    <?php
                      sessiondropdown('sessionlist');
                    ?>
                </div>
              </div>
              
                <div class="form-group row">
                <label for="inputBranchId" class="col-md-2 col-form-label">Branch Name:</label>
                <div class="col-md-4">
                <?php 
                     branchDropdown_2('branchlist');
                  ?>
                </div>
              </div>

              <div class="form-group row">
                <label for="inputSemesterId" class="col-md-2 col-form-label">Semester Name:</label>
                <div class="col-md-4">
                    <select class='form-control' id='semesters' onchange='populateSubjects();'>
                    </select>
                </div>
              </div>

              <div class="form-group row">
                <label for="inputSemesterId" class="col-md-2 col-form-label">Subject Name:</label>
                <div class="col-md-4">
                    <select class='form-control' id='subjects'>
                    </select>
                </div>
              </div>

              <div class="form-group row">
                <label for="inputPassword" class="col-md-2 col-form-label">Exam Date:</label>
                <div class="col-md-4">
                  <input type="text" class="form-control" id="date" placeholder="YYYY-MM-DD">
                </div>
              </div>
              
              <div class="form-group row">
                <label for="inputPassword" class="col-md-2 col-form-label">Total Question:</label>
                <div class="col-md-4">
                  <input type="text" class="form-control" id="questioncount" placeholder="Total Question">
                </div>
              </div>

              <div class="form-group row">
                <label for="inputCurrentBranch" class="col-md-2 col-form-label">Duration:</label>
                <div class="col-md-4">
                  <input type="text" class="form-control" id="duration" placeholder="Enter Duration in minute">
                </div>
              </div>

              <div class="form-group row">
                <label for="inputCurrentBranch" class="col-md-2 col-form-label">Passcode:</label>
                <div class="col-md-4">
                  <input type="text" class="form-control" id="passcode" placeholder="Enter passcode">
                </div>
              </div>

              <div class="form-group row">
                <label for="inputCurrentBranch" class="col-md-2 col-form-label">Faculty Name:</label>
                <div class="col-md-4">
                <input type="text" class="form-control" id="teacher" value="<?php echo $_SESSION['username'] ?>" >
                </div>
              </div>

              <div class='col-md-6 text-center'>
                    <button onclick='paperData();' class='btn btn-success' style='width:100pt;'>NEXT</button>
              </div> 

            </div>
           </div>
        </div> 
    </body> 
</html>              