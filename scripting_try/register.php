<?php
    include 'database_configure.php';
    
    if($_POST){
        $full_name = $_REQUEST['fullname'];
        $email = $_REQUEST['email'];
        $password = $_REQUEST['psw'];
        $enc_password = password_hash($password,PASSWORD_DEFAULT);

        $checkuser = "SELECT * FROM `user` WHERE Email = '$email'";
        $check = mysqli_query($conn,$checkuser);

        if(mysqli_num_rows($check)>0) { 
            ?><script type='text/javascript'>alert('Email Id already exists \nTry using other email ');location.replace("home.php");</script>"<?php
             
        }else{
            $conn->query("INSERT INTO `user` (`user_id`, `name`, `email`, `password`)
            VALUES ('','$full_name', '$email','$enc_password')")  or die(mysqli_error());
            if($conn){
                ?><script>alert("Register successful, \nPlease login before you use the website");location.replace("home.php");</script><?php
            }
        }      
    }
    mysqli_close($conn);
?>