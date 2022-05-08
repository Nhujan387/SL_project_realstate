<!DOCTYPE html>
<html>
<head>
    <title>Mail</title>
</head>
<body>
    <form action="" method="POST">
        TO:
        <input type="email" name="email" ><br>
        Subject:
        <input type="text" name="subject" ><br>
        Body:
        <input type="text" name="body" ><br>
        <input type="submit">
    </form>
</body>
</html>

<?php
if($_POST){
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .="Content-type:text/html; charset=iso-8859-1"."\r\n";
    $headers .="From: maharjannhuj@gmail.com"."\r\n";

    $subject = $_REQUEST["subject"];
    $email = $_REQUEST["email"];
    $message = $_REQUEST["body"];
    $body = "From: abcd <br>".$message ;
    
    $success =mail($email,$subject,$body,$headers);
    echo $success;
    if(!$success){
        $errorMessage = error_get_last()['message'];
    }
}
?>