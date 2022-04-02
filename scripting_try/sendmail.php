<?php 
    session_start();
    if(!isset($_SESSION["username"]))
    {
    ?><script>alert('Login before you send mail');location.replace('buy.php');</script><?php
    }

    include 'sign_modal.php';
    include 'database_configure.php';

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
        <title>Residence: Buy</title>
        <link rel="stylesheet" href="homepage_style.css"/>
        <link rel="stylesheet" href="buystyle.css"/>
        <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    </head>
    <body>
        <nav>
            <div > 
                <img src="img/LOGO_residence.svg" alt="LOGO" class='logo'>
            </div>
            <input type="checkbox" id="menu">
            <label for="menu" class="menu-button">
                <i class="fas fa-bars"></i>
            </label>
            <ul>
                <li> <a href="home.php" ><button >Home</button></a></li>      
                <li> <a href="buy.php"><button class="active">Buy</button></a></li>
                <li> <a href="sell.php"><button>Sell</button></a></li>
                <?php 
                    if(!isset($_SESSION['username'])){?>
                <li> <a><button onclick="document.getElementById('signup').style.display='block'">Sign up</button></a></li>
                <li> <a><button onclick="document.getElementById('signin').style.display='block'">Sign in</button></a></li>
                <?php } ?>
                <?php 
                    if(isset($_SESSION['username'])){?>
                    <li> <a href="logout.php"><button>Log out</button></a></li>
                <?php } ?>
            </ul>
        </nav>
        <div class="forsale" style="margin-top:10px">
            <div style="width:40%;height:78vh;border: 1px solid black;font-size:22px; margin: 0 auto;box-shadow: 0 4px 12px rgb(0 0 0 / 0.5);border-radius:5px;padding:15px;">
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
                                   <td ><textarea style="width:100%;font-size:22px;height:55vh"  name="message" > </textarea><br></td>
                               </tr>
                               <tr><td><input style="font-size:22px;background-color:blue;border:none; border-radius:5px;cursor:pointer;color:white;width:100%" type="submit"></td></tr>
                           </table>
                        </form> 
            </div>

        </div>
    </body>
</html>
<?php


if($_POST){
    $fetchuser = "SELECT * FROM `user` where   `user_id` = '$_SESSION[username]'";
    $queryuser = mysqli_query($conn,$fetchuser);
    $outputuser = mysqli_fetch_assoc($queryuser);

    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .="Content-type:text/html; charset=iso-8859-1"."\r\n";
    $headers .="From:"." $outputuser[email] "."\r\n";

    $subject = $_REQUEST["subject"];
    $email = $_REQUEST["email"];
    $body = $_REQUEST["message"];
    
    $success =mail($email,$subject,$body,$headers);
    if($success){
        ?><script>alert("Mail sent");location.replace("buy.php");</script><?php
    }
    
}
?>