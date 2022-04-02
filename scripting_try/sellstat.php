<?php 
    session_start();
    include 'sign_modal.php';
    include 'database_configure.php';
    if(!isset($_SESSION['username'])){
        ?><script type='text/javascript'>alert('Signin to view your sale post'); location.replace("sell.php");</script><?php
        }

        $currentPage = 0;
        $searchlimit = 6;
    
        if(isset($_GET['page'])){
            if($_GET['page']<=0 || !is_numeric($_GET['page'])){
                $currentPage = 0;
            }else{
            $currentPage = ($_GET['page']-1)*$searchlimit;
            }
        }


    $fetch = "SELECT s.s_id, s.property_type, s.Postdate, s.province, s.district, s.address, s.ropani, s.aana, s.paisa, s.dam,
    s.bedroom_number, s.toilet_number, s.floor, s.amount, s.current_address, s.phone, s.image, s.user_id, s.status , u.name 
   FROM `sale` as s inner join user as u on s.user_id=u.user_id WHERE u.user_id = '$_SESSION[username]' AND status='0'";
    $queryfetch = mysqli_query($conn,$fetch);

    $totalResult = mysqli_num_rows($queryfetch);
    if($totalResult>0){
        
        $pagination = ceil($totalResult / $searchlimit);

        $sql="SELECT s.s_id, s.property_type, s.Postdate, s.province, s.district, s.address, s.ropani, s.aana, s.paisa, s.dam,
        s.bedroom_number, s.toilet_number, s.floor, s.amount, s.current_address, s.phone, s.image, s.user_id, s.status , u.name 
       FROM `sale` as s inner join user as u on s.user_id=u.user_id WHERE u.user_id = '$_SESSION[username]' AND status='0' LIMIT  $currentPage,$searchlimit";
        $result0 = mysqli_query($conn,$sql);

    }else{
        ?><script type='text/javascript'>alert('No any sale post from user yet'); location.replace("sell.php");</script><?php
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Residence: Sell</title>
        <link rel="stylesheet" href="homepage_style.css"/>
        <link rel="stylesheet" href="sellstyle.css"/>
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
                <li> <a href="buy.php"><button >Buy</button></a></li>
                <li> <a href="sell.php"><button class="active">Sell</button></a></li>
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
        <div class="Sellorderseller" style="margin-top: 5px; margin-bottom: 10px;">
        <h2>SALE POST</h2>
            <div class="subseller">
                <?php 
                
                while($result = mysqli_fetch_assoc($result0)){
                ?>
                    <div class="salecard" style="margin-top:5px;">
                        <div class="imgsale"><img  src="<?php echo $result['image'];?>" height="180px" width="90%"  /></div>
                        <p style="font-weight:bold;text-align:center;font-size: 20px;">Location at <?php echo $result['district'];?>,&nbsp;<?php echo $result['address'];?> </p>
                        <p style="margin-left:20px;font-weight:bold;text-align:center;">Floor:<?php echo $result['floor'];?>&nbsp;&nbsp;&nbsp;&nbsp;Bedrooms:<?php echo $result['bedroom_number'];?>&nbsp;&nbsp;&nbsp;&nbsp;Bathroom:<?php echo $result['toilet_number'];?></p>
                        <p style="margin-left:20px;font-weight:bold;text-align:center;">Land:<?php echo $result['ropani'];?>-<?php echo $result['aana'];?>-<?php echo $result['paisa'];?>-<?php echo $result['dam'];?>&nbsp;&nbsp;&nbsp;&nbsp;RS-<span style="color:red;font-size:18px;"><?php echo $result['amount'];?></span></p>
                        <p style="margin-left:20px;font-weight:bold;text-align:center;margin-top:8px;">
                        <a href="sellerview.php?s_id=<?php echo $result['s_id']; ?>&user_id=<?php echo $result['user_id'];?>&name=<?php echo $result['name'];?>"><button class="view">view</button></a>&nbsp;&nbsp;
                        <a href="update.php?s_id=<?php echo $result['s_id']; ?>&user_id=<?php echo $result['user_id'];?>&name=<?php echo $result['name'];?>"><button class="update">Edit</button></a>&nbsp;&nbsp;
                        <a href="sold.php?s_id=<?php echo $result['s_id']; ?>&user_id=<?php echo $result['user_id'];?>&name=<?php echo $result['name'];?>"><input type="submit" class="sold" value="Sold"></a>&nbsp;&nbsp;
                        <a href="delete.php?s_id=<?php echo $result['s_id']; ?>&user_id=<?php echo $result['user_id'];?>&name=<?php echo $result['name'];?>"><button class="delete">Delete</button></a>
                        </p>
                    </div>
                </a>
                <?php } ?>
            </div>
            <div class="pagination">
                
                <?php 
                    for($i=1;$i<=$pagination;$i++){
                        echo '<a class="page" href="sellstat.php?page='.$i.'">'.$i.'</a>';
                    } 
                ?>
                
            </div>
        </div>
        <hr style="color: 3px aliceblue; width: 93%; margin: 0 auto; margin-top: 15px; margin-bottom: 10px;"> 
        <div class="footer">
            <div class="subfooter">
                <div class="thirdfooter" >
                    <p style="font-size: larger;">
                       <b><u>Contact</u></b>
                    </p> <br/>
                    <p style="margin-bottom: 3px;">
                       +9771234567890
                    </p>
                    <p style="margin-bottom: 3px;">
                        42233445
                    </p>
                    <p style="margin-bottom: 3px;">
                        residencehome@gmail.com
                    </p>
                </div>
                <div class="thirdfooter" >
                        <img src="img/LOGO_residence.svg">
                </div>
                <div class="thirdfooter" >
                    <p style="font-size: larger;">
                        <b><u>Why Residence?</u></b>
                    </p> <br/>
                    <p style="margin-bottom: 3px;">
                        No broker, No broker charge
                    </p>
                    <p style="margin-bottom: 3px;">
                        Good customer satisfaction
                    </p>
                    <p style="margin-bottom: 3px;">
                        Simple and easy to use
                    </p>
                </div>
            </div>
            <div >
                <img src="img/bootom1.jpg" height="200vh" width="100%">
            </div>
        </div>
    </body>
</html>