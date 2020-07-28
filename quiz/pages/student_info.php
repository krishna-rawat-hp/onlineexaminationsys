<html>
    <head>
        <?php include_once "../partials/title.php"; ?>
        <?php include_once "../partials/common_lib.php"; ?>
        <script src="../js/student_info.js"></script>
        <?php 
            include_once "../db/connection.php";
            include_once "../db/student_db.php";
            include_once "../grid/student_grid.php";
            include_once "../grid/common_grid.php"; 
        ?>
    </head>
    <body>
      <?php include_once "../partials/menu.php"; ?>
        <div class='container-fluid'>
          <div class='bg-light border border-info row p-2 ml-2 mr-2 mt-3 pb-3'>
            <div class='col-md-12'>
              <h1 class='text-center' style='font-weight:300;'>Student Registration</h1>
              <hr class='mt-1 mb-3 bg-info'>
           

              <div class="form-group row">
                <label for="inputRollNo" class="col-md-2 col-form-label">Roll No:</label>
                <div class="col-md-4">
                  <input type="text" class="form-control" id="rollno" placeholder="Enter Roll No">
                </div>
              </div>

              <div class="form-group row">
                <label for="inputStudentName" class="col-md-2 col-form-label">Student Name:</label>
                <div class="col-md-4">
                  <input type="text" class="form-control" id="sname" placeholder="Enter Student Name">
                </div>
              </div>

              <div class="form-group row">
                <label for="inputFatherName" class="col-sm-2 col-form-label">Father Name</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control" id="fname" placeholder="Enter Father Name">
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
                    <select class='form-control' id='semesters'>
                    </select>
                </div>
              </div>

              <div class="form-group row">
                <label for="inputCurrentSession" class="col-md-2 col-form-label">Current Session:</label>
                <div class="col-md-4">
                    <?php
                      sessiondropdown('sessionlist');
                    ?>
                </div>
              </div>
              
              <div class="form-group row">
                <label for="inputAddmissionSession" class="col-md-2 col-form-label">Addmission Branch:</label>
                <div class="col-md-4">
                  <?php 
                     branchDropdown_1('branchdrop');
                  ?>
                </div>
              </div>

              <div class="form-group row">
                <label for="inputAddmissionSemester" class="col-md-2 col-form-label">Add. Semester:</label>
                <div class="col-md-4">
                    <select class='form-control' id='semester'>
                    </select>
                </div>
              </div>
                 
              <div class="form-group row">
                <label for="inputAddmissionBranch" class="col-md-2 col-form-label">Addmission Session:</label>
                <div class="col-md-4">
                    <?php
                      sessiondropdown('sessionlist');
                    ?>
                </div>
              </div>
              
             <div class="form-group row">
                <label for="inputPassword" class="col-md-2 col-form-label">Password:</label>
                <div class="col-md-4">
                  <input type="Password" class="form-control" id="password" placeholder="Enter Password">
                  <span id="message" style="color:red;"></span>
                </div>
              </div>
              
              <div class="form-group row">
                <label for="inputPassword" class="col-md-2 col-form-label">Confirm Password:</label>
                <div class="col-md-4">
                  <input type="Password" class="form-control" id="c_pass" placeholder="Re-Enter Password">
                  <span id="messages" style="color:red;"></span>
                </div>
              </div>

              <div class="form-group row">
                <label for="inputCurrentBranch" class="col-md-2 col-form-label">Contact No:</label>
                <div class="col-md-4">
                  <input type="text" class="form-control" id="contactno" placeholder="Enter Contact No">
                </div>
              </div>
              <div class='col-md-6 text-center'>
                    <button onclick='saveStudentinfo();' class='btn btn-primary' style='width:100pt;'>SAVE</button>
              </div> 
              </div>   
            </div>  
          </div>
        </div> 
    </body> 
</html>              