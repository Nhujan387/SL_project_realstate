<?php
    include "dbconnect.php" ;

    $pull = "SELECT * FROM `form` where id = 1  ";
    $query = mysqli_query($conn,$pull);
    $result = mysqli_fetch_assoc($query);

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Document</title>
    </head>
    <body>
        <form method="POST" enctype="multipart/form-data">
            <label>Full name</label>
            <input type="text" name="name" value="<?= $result['full_name']?>"><br>
            <label>Address</label>
            <input type="text" name="address" value="<?= $result['address']?>"><br>
            <label>Email</label>
            <input type="email" name="email" value="<?= $result['email']?>"><br>
            <label>Gender</label>
            <select name="gender">
                <option value="Male" name="gender">Male</option>
                <option value="Female" name="gender">Female</option>
                <option value="Other" name="gender">Other</option>
            </select><br>
            <label>image</label>
            <input type="file" name="img" accept="image/*"><br>
            <label>Contact number</label>
            <input type="text" name="contact" value="<?= $result['contact_no']?>"><br>
            <label>Citizenship number</label>
            <input type="text" name="cnum" value="<?= $result['citizenship_no']?>"><br>
            <label>Father's name</label>
            <input type="text" name="fname" value="<?= $result['father_name']?>"><br>
            <input type="submit" value="Submit">
        </form>
    </body>
</html>
<?php

    if($_POST){
        $name = $_REQUEST['name'];
        $address = $_REQUEST['address'];
        $email = $_REQUEST['email'];
        $gender = $_POST['gender'];
        $contact = $_REQUEST['contact'];
        $citizen = $_REQUEST['cnum'];
        $fname = $_REQUEST['fname'];

        $update = "UPDATE `form` SET `full_name`='$name',
        `address`='$address',`email`='$email',`gender`='$gender',
        `contact_no`='$contact',`citizenship_no`='$citizen',`father_name`='$fname' WHERE id = '1'";

        $query = mysqli_query($conn,$update);
    }

?>
