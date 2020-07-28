<!--The main page for branch adding-->
<html>
    <head>
        <?php include_once "../partials/title.php"; ?>       <!--For including the title of page-->
        <?php include_once "../partials/common_lib.php"; ?>     <!--For including the bootstrap common links-->
        <script src="../js/session_add.js"></script>     <!--For including javascript file-->
        <?php 
            include_once "../db/connection.php";        //including for database connection
            include_once "../db/session_db.php";        //include for perform the operations and defining function of database related 
            include_once "../grid/session_grid.php";     //used for function defining to view and edit the page data 
        ?>
    </head>
    <body>
        <?php include_once "../partials/menu1.php"; ?>       <!--For attech the navigation bar-->
        <div class='container-fluid'>
            <div class='bg-light border border-info row p-2 ml-2 mr-2 mt-3 pb-3'>
                <div class='col-md-12'>
                    <h1 class='text-center' style='font-weight:300;'>Add Session</h1>
                    <hr class='mt-1 mb-3 bg-info'>    
                </div>
                <div class='col-md-8'>
                    <input 
                        type="text"                 
                        id="sessionname"         
                        placeholder="Enter Session Name" 
                        class='form-control'
                        >                       <!--A text box for adding branch-->
                </div>
                <div class='col-md-4 text-left'>
                    <button onclick='saveSession();' class='btn btn-primary' style='width:100pt;'>SAVE</button> 
                    <!--button with saveBranch() javascript function declaired-->
                </div>
            </div>  
        </div>
    </body>
</html>
        
        