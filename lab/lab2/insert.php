<?php

    include "dbconnect.php" ;

    global $errname, $erraddress, $erremail,$errgender,$errcontact,$errcitizen,$errfname,$errfile,$errvemail;
    if($_POST){
        $name = $_REQUEST['name'];
        $address = $_REQUEST['address'];
        $email = $_REQUEST['email'];
        $gender = $_REQUEST['gender'];
        $contact = $_REQUEST['contact'];
        $citizen = $_REQUEST['cnum'];
        $fname = $_REQUEST['fname'];
        $files = $_FILES['img'];
        $validation = true;
        if($name == ""){
            $errname= "name cannot be empty";
            $validation = false;
        }
        if($address == ""){
            $erraddress= "address cannot be empty";
            $validation = false;
        }
        if($email == ""){
            $erremail= "email cannot be empty";
            $validation = false;
        }else{
            if((!filter_var($email, FILTER_VALIDATE_EMAIL))){
                $errvemail= "email invalid";
                $validation = false;
            }
        }
        if($gender == ""){
            $errgender= "gender cannot be empty";
            $validation = false;
        }
        if($contact == ""){
            $errcontact= "contact cannot be empty";
            $validation = false;
        }
        if($citizen == ""){
            $errcitizen= "citizen number cannot be empty";
            $validation = false;
        }
        if($fname == ""){
            $errfname= "fathername cannot be empty";
            $validation = false;
        }
        if($files == ""){
            $errfile= "image cannot be empty";
            $validation = false;
        }
        $filename = $files['name'];
        $fileerror = $files['error'];
        $filetmp = $files['tmp_name'];
        $fileext = explode('.',$filename);
        $filecheck = strtolower(end($fileext));
        $fileextstored = array('png','jpg','jpeg');

        if($validation == true){

            if(in_array($filecheck,$fileextstored)){
                $destinationfile = 'image/'.$filename;
                move_uploaded_file($filetmp,$destinationfile);
                
                $insert = "INSERT INTO `form`( `full_name`, `address`, `email`, `gender`,
                 `image`, `contact_no`, `citizenship_no`, `father_name`) VALUES
                  ('$name','$address','$email','$gender','$destinationfile','$contact','$citizen','$fname')";

                $query = mysqli_query($conn,$insert);
                }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>insert</title>
    </head>
    <body>
        <form method="POST" enctype="multipart/form-data">
            <label>Full name</label>
            <input type="text" name="name"><?= $errname ?><br>
            <label>Address</label>
            <input type="text" name="address"><?= $erraddress ?><br>
            <label>Email</label>
            <input type="email" name="email"><?= $erremail ?><?= $errvemail ?><br>
            <label>Gender</label>
            <select name="gender">
                <option value="Male" name="gender">Male</option>
                <option value="Female" name="gender">Female</option>
                <option value="Other" name="gender">Other</option>
            </select><?= $errgender ?>
            <br>
            <label>image</label>
            <input type="file" name="img" accept="image/*"><?= $errfile ?><br>
            <label>Contact number</label>
            <input type="text" name="contact"><?= $errcontact ?><br>
            <label>Citizenship number</label>
            <input type="text" name="cnum"><?= $errcitizen ?><br>
            <label>Father's name</label>
            <input type="text" name="fname"><?= $errfname ?><br>
            <input type="submit" value="Submit">
        </form>
    </body>
</html>
