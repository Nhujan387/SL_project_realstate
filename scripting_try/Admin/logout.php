<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <link rel="stylesheet" href="adminstyle.css" />
    </head>
    <body>
    <div class="navigation">
            <img src="../img/LOGO_residence.svg" alt="logo" class="logo" >     
            <form method="POST">
                <input type="submit" value="Log Out" name="logout" class="abutton"  name="logout">
            </form>
    </div>
    </body>
</html>
<?php

    if(isset($_POST['logout'])){
        session_start();
        session_destroy();
        header("location: index.php");
        exit;
    }

?>