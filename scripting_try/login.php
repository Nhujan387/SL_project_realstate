<?php
session_start();
include 'database_configure.php';

    if($_POST){

    $email = $_REQUEST['logemail'];
    $password = $_REQUEST['logpsw'];
    $query = ("SELECT * FROM `user` WHERE `email` = '$email'") or die(mysqli_error());
    $querycheck = mysqli_query($conn,$query);

    $fetch = mysqli_num_rows($querycheck);
    

    if($fetch!=0){
        $email_check = mysqli_fetch_assoc($querycheck);

        $db_pass = $email_check['password'];
        $pass_decode = password_verify($password, $db_pass);

        if($pass_decode){
            $_SESSION['username'] = $email_check['user_id'];
            header("location:home.php");
        }else{
            echo "password incorrect";
        }
    }else{
        echo "invalid email";
    }

    mysqli_close($conn);
}
?>