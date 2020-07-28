<html>
    <head>
        <?php include_once "../partials/title.php"; ?>
        <?php include_once "../partials/common_lib.php"; ?>
        <script src="../js/teacher_info.js"></script>
        <?php 
            include_once "../db/connection.php";
            include_once "../db/teacher_db.php";
            include_once "../grid/common_grid.php"; 
        ?>
    </head>
    <body>
      <?php include_once "../partials/menu1.php"; ?>
        <div class='container-fluid'>
          <div class='bg-light border border-info row p-2 ml-2 mr-2 mt-3 pb-3'>
            <div class='col-md-12'>
              <h1 class='text-center' style='font-weight:300;'>Teachers Registration</h1>
              <hr class='mt-1 mb-3 bg-info'>
           

              <div class="form-group row">
                <label for="inputRollNo" class="col-md-2 col-form-label">Faculty Name:</label>
                <div class="col-md-4">
                  <input type="text" class="form-control" id="teachername" placeholder="Enter Faculty Name">
                </div>
              </div>

               <div class="form-group row">
                <label for="inputBranchId" class="col-md-2 col-form-label">Branch Name:</label>
                <div class="col-md-4">
                <?php 
                     branchDropdown('branchlist');
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