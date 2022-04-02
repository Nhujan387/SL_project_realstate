<?php
    session_start();  
    if(!isset($_SESSION["Adname"]))
    {
    header("location:login.php");
    }

    include '../database_configure.php' ;
    include 'logout.php' ;

    $fetch = "SELECT * FROM `sale` where   `s_id` = '$_REQUEST[s_id]'";
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
        <title>Residence:remove</title>
    </head>
    <body>
        <div>
            <div class="navforadmin" style="border-top:none;border:1px solid black; margin-top: 2px;">
                    <a class="navstyle navactive" href="dash.php">Dashboard</a>
                    <a class="navstyle " href="viewproperty.php">View Home List</a>
                    <a class="navstyle" href="viewland.php">View Land List</a>
            </div>
            <div class="removeproperty">
                <div class="sureremove">
                    <img src="../<?php echo $output['image'];?>" height="290px" width="100%" >
                    <table  style="width:100%;height:120px;font-weight:bold">
                        <tr>
                            <td>Post date:<?php echo $output['Postdate'];?></td>
                        </tr>
                        <tr><td>Location:<?php echo $output['province'];?>,<?php echo $output['district'];?>,<?php echo $output['address'];?></td></tr>
                        <tr><td>Area:<?php echo $output['ropani'];?>-<?php echo $output['aana'];?>-<?php echo $output['paisa'];?>-<?php echo $output['dam'];?></td></tr>
                        <tr><td>Amount:<?php echo $output['amount'];?></td></tr>
                    </table>
                    <a href="delete.php?s_id=<?php echo $output['s_id']?>"><button style="background-color:red;color:white;font-size:22px;border-radius:5px;">Remove</button></a>
                </div>
            </div>
        </div>
    </body>
</html>