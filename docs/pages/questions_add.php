<html>
    <head>
        <?php include_once "../partials/title.php"; ?>
        <?php include_once "../partials/common_lib.php"; ?>
        <script src="../js/question_add.js"></script>
        <?php 
            include_once "../db/connection.php";
            include_once "../db/question_db.php";
            include_once "../grid/question_grid.php";
            include_once "../grid/common_grid.php";
        ?>
    </head>
    <body>
        <?php include_once "../partials/menu.php"; ?>
        <div class='container-fluid'>
            <div class='bg-light border border-info row p-2 ml-2 mr-2 mt-3 pb-3'>
                <div class='col-md-12'>
                    <h1 class='text-center' style='font-weight:300;'>Add Question</h1>
                    <hr class='mt-1 mb-4 bg-info'>    
                </div>
                <div class='col-md-4 text-center'>
                   <?php
                        branchDropdown_2('branchlist');
                    ?>
                </div>
                <div class='col-md-4 text-center'>
                    <select class='form-control' id='semesters' onchange='populateSubjects();'>
                    </select>
                </div>
                <div class='col-md-3 text-center'>
                    <select class='form-control' id='subjects'>
                    </select>
                </div> 
            </div> 
            <div class='bg-light border border-info row p-2 ml-2 mr-2 mt-1 pb-3'>
            <table class="table table-striped">
                <tbody>
                <tr>
                    <td style="width:10pt;" class="align-middle font-weight-bold">Question:</td>
                    <td>
                        <textarea 
                            id="question"
                            class="form-control"
                            placeholder="Enter Question"
                            rows="4"
                            ></textarea>
                    </td>
                </tr>
                <tr>
                    <td style="width:10pt;" class="align-middle font-weight-bold">Option 1:</td>
                    <td><input type="radio" value="a" name="option" class="form-check-input" style='margin-top:17pt;'>
                        <textarea rows="1" class='form-control' id="txt1" placeholder="Enter Option 1"></textarea>
                    </td>
                </tr>  
                <tr>
                    <td style="width:10pt;" class="align-middle font-weight-bold">Option 2:</td>
                    <td><input type="radio" value="b" name="option" class="form-check-input" style='margin-top:17pt;'>
                        <textarea rows="1" class='form-control' id="txt2" placeholder="Enter Option 2"></textarea>
                    </td>
                </tr>
                <tr>
                    <td style="width:10pt;" class="align-middle font-weight-bold">Option 3:</td>
                    <td><input type="radio" value="c" name="option" class="form-check-input" style='margin-top:17pt;'>
                        <textarea rows="1" class='form-control' id="txt3" placeholder="Enter Option 3"></textarea>
                    </td>
                </tr>
                <tr>
                    <td style="width:10pt;" class="align-middle font-weight-bold">Option 4:</td>
                    <td><input type="radio" value="d" name="option" class="form-check-input" style='margin-top:17pt;'>
                        <textarea rows="1" class='form-control' id="txt4" placeholder="Enter Option 4"></textarea>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <button onclick='saveQuestion();' class="btn btn-success m-auto d-block " style='width:100pt; '>SAVE</button>
                    </td>
                </tr>
                </tbody>
            </table>
            </div>
        </div>
    </div>
  </body>
</html>