<?php
    session_start();  
    if(!isset($_SESSION["Adname"]))
    {
    header("location:login.php");
    }

    include '../database_configure.php' ;
    include 'logout.php' ;

    $fetch = "SELECT * FROM `user` where   `user_id` = '$_REQUEST[user_id]'";
    $query = mysqli_query($conn,$fetch);
    $output = mysqli_fetch_assoc($query);

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style src="adminstyle.css"></style>
        <title>Residence:Mail</title>
    </head>
    <body>
        <div>
            <div class="navforadmin" style="border-top:none;border:1px solid black; margin-top: 2px;">
                    <a class="navstyle navactive" href="dash.php">Dashboard</a>
                    <a class="navstyle " href="viewproperty.php">View Home List</a>
                    <a class="navstyle" href="viewland.php">View Land List</a>
            </div>
            <div class="fortable">
                <div class="white" style="margin-top:10px;margin-bottom:10px;">
                    <div style="padding:10px;font-size:22px;">
                        <form method="POST">
                           <table style="width:100%;">
                               <tr>
                                   <td style="width:10%;">TO:</td>
                                   <td ><input style="width:100%;font-size:22px" type="email" name="email" value="<?= $output['email'] ?>" readonly><br></td>
                               </tr>
                               <tr>
                                   <td style="width:10%;">Subject:</td>
                                   <td ><input style="width:100%;font-size:22px" type="text" name="subject" ><br></td>
                               </tr>
                               <tr>
                                   <td style="width:10%;vertical-align:top">Body:</td>
                                   <td ><textarea style="width:100%;font-size:22px;height:52vh"  name="message" > </textarea><br></td>
                               </tr>
                               <tr><td><input style="font-size:22px;background-color:blue; border-radius:5px;cursor:pointer;color:white" type="submit"></td></tr>
                           </table>
                        </form> 
                    </div>
                <div>
            </div>
    </body>
</html>

<?php
if($_POST){
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .="Content-type:text/html; charset=iso-8859-1"."\r\n";
    $headers .="From: maharjannhuj@gmail.com"."\r\n";

    $subject = $_REQUEST["subject"];
    $email = $_REQUEST["email"];
    $body = $_REQUEST["message"];
    
    $success =mail($email,$subject,$body,$headers);
    if($success){
        ?><script>alert("Mail sent");location.replace("viewproperty.php");</script><?php
    }
    
}
?>