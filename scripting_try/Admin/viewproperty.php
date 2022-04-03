<?php
    session_start();  
    if(!isset($_SESSION["Adname"]))
    {
    header("location:login.php");
    }

    include '../database_configure.php' ;
    include 'logout.php' ;
    
        $currentPage = 0;
        $searchlimit = 6;
    
        if(isset($_GET['page'])){
            if($_GET['page']<=0 || !is_numeric($_GET['page'])){
                $currentPage = 0;
            }else{
            $currentPage = ($_GET['page']-1)*$searchlimit;
            }
        }
        $fetch = "SELECT * FROM `sale` where property_type='house' ";
        $query = mysqli_query($conn,$fetch);
       

        $totalResult = mysqli_num_rows($query);
        if($totalResult>0){
            
            $pagination = ceil($totalResult / $searchlimit);

        $fetch2 = "SELECT * FROM `sale` where property_type='house' ORDER by Postdate desc LIMIT  $currentPage,$searchlimit ";
        $finalresult = mysqli_query($conn,$fetch2);
    
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style src="adminstyle.css"></style>
        <title>Residence:Home_List</title>
    </head>
    <body>
        <div>
            <div class="navforadmin" style="border-top:none;border:1px solid black; margin-top: 2px;">
                    <a class="navstyle " href="dash.php">Dashboard</a>
                    <a class="navstyle navactive" href="viewproperty.php">View Home List</a>
                    <a class="navstyle" href="viewland.php">View Land List</a>
            </div>
            <div class="fortable">
                <div style="height:73vh;">
                    <table border="1px solid black" width="100%" style="border-collapse:collapse;font-size:18px;background-color:white;text-align:center;">
                        <tr style="font-size:20px;">
                            <th width="8%;">Posted date</th>
                            <th  width="28%">Location</th>
                            <th width="22%">Area</th>
                            <th>Picture</th>
                            <th>Amount</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        <?php
                            $k = 1;
                            while($result = mysqli_fetch_assoc($finalresult)){
                        ?>
                        <tr>
                            <td><?php echo $result['Postdate'] ?></td>
                            <td><?= $result['province'] ?>, <?= $result['district']?>, <?= $result['address']; ?></td>
                            <td>Ropani:<?= $result['ropani'] ?>, Aana:<?= $result['aana']?>, Paisa:<?= $result['paisa']; ?>, Dam:<?= $result['dam']; ?></td> 
                            <td><img src="../<?php echo $result['image'] ?>" height="70vh" width="50%"/></td>
                            <td><?= $result['amount'] ?></td>
                            <td><?php if ($result['status']==0 ){
                                ?><p style="color:green">FOR SALE</p> <?php

                            }else if($result['status']==1){
                                ?><p style="color:red">SOLD</p> <?php
                            }
                             ?></td>
                            <td>
                                <a href="sendmail.php?user_id=<?php echo $result['user_id']?>" ><button style="background-color:blue;font-size:18px;width:80%;color:white;border-radius:5px;margin:2px;">Mail</button></a>
                                <a href="remove.php?s_id=<?php echo $result['s_id']?>" ><button style="background-color:red;font-size:18px;width:80%;color:white;border-radius:5px;">Remove</button></a>
                            </td>
                            </tr>
                        <?php } ?>
                    </table>
                </div>
                <div class="changepage">
                <?php 
                    for($i=1;$i<=$pagination;$i++){
                        echo '<a class="pointer" href="viewproperty.php?page='.$i.'">'.$i.'</a>';
                    } 
                ?>
                </div>
            </div>

        </div>
    </body>
</html>