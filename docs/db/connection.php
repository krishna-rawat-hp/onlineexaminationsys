<?php
    function getConnection(){
        $con = mysqli_connect("localhost", "root", "", "quiz");
        if(mysqli_connect_errno()){
            die("Error: ".mysqli_connect_error());
        }
        return $con;
    }
    

?>