<html>
    <head>
        <?php include_once "../partials/title.php"; ?>
        <?php include_once "../partials/common_lib.php"; ?>
        <link rel="stylesheet" type="text/css" href="../css/teacher_style.css"> 
        <script src="../js/loginpage.js"></script>
    </head>
<body>
    <div><img src="../images/mono3.jpg" width="100%" height="90pt"></div>
    <div id="img">
        <img src="../images/bg.png" width="100%" height="88%">
        <div class="login-box">
            <img src="../images/avatar.png" class="avatar">
                <h1>Login</h1>
                    <p>Username</p>
                    <input type="text" id="username" placeholder="Enter Username" >
                    <p>Password</p>
                    <input type="password" id="password" placeholder="Enter Password" >
                    <div id="dropdown" style="width: 200pt">
                    <select id="logintype">
                        <option value="-1">Login type</option>
                        <option value="HOD">HOD</option>
                        <option value="Faculty">Faculty</option>
                        <option value="Student">Student</option>
                    </select>
                    </div>
                    <button onclick='loginData();' class='button'>LOGIN</button>
        </div>     
    </div>        
</body>
</html>