<?php
    require 'config.php';
    //Global Variables


    //FUNCTION TO REGISTER NEW USER
    function userRegister(){
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $name = $first_name.$last_name;
        $email = $_POST['email'];
        $mob_no = $_POST['phone'];
        $password = $_POST['password'];
        $conf_pass = $_POST['confirm_password'];
        $sql = "INSERT INTO users VALUES ($name, $email, $mob_no, $password, current_timestamp(), DEFAULT)";
    }
?>