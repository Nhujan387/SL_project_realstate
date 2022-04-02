<?php 
    session_start();
    include 'sign_modal.php';
    include 'database_configure.php';

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
        <div class="forsale">
            <div class="congras">
               <div class="decore">
                   
               </div>
               <div class="congratulation">
                   <?php
                        $fetch = "SELECT s.s_id, s.property_type, s.Postdate, s.province, s.district, s.address, s.ropani, s.aana, s.paisa, s.dam,
                        s.bedroom_number, s.toilet_number, s.floor, s.amount, s.current_address, s.phone, s.image, s.user_id, s.status , u.name 
                       FROM `sale` as s inner join user as u on s.user_id=u.user_id WHERE s.s_id = '$_REQUEST[s_id]' ";
                        $queryfetch = mysqli_query($conn,$fetch);
                        $result = mysqli_fetch_assoc($queryfetch); ?> 
                        <div class="confirm">
                                
                            <div style="width:70%;height:38vh;margin: 0 auto;">
                            <img src="<?php echo $result['image']?>" style="margin-top:5px;"  width="100%" height="260px"/>
                        </div>  
                        <div style="width:80%;margin:0 auto;height:37vh;padding:10px;">
                            <u>LOCATION</u>
                                <table  width="100%" style="font-size:20px; ">
                                    <tr>
                                        <td>Province: <?php echo $result['province']; ?></td>
                                        <td>District: <?php echo $result['district']; ?></td>
                                        <td>Address: <?php echo $result['address']; ?></td>
                                    </tr>
                                </table>
                            <u> HOUSE DETAIL</u>
                                <table width="100%" style="font-size:20px; ">
                                    <tr>
                                        <td>Bed rooms: <?php echo $result['bedroom_number']; ?></td>
                                        <td>Bathroom: <?php echo $result['toilet_number']; ?></td>
                                        <td>Floor: <?php echo $result['floor']; ?></td>
                                    </tr>
                                </table>
                            <u> AREA</u>
                                <table  width="100%" style="font-size:20px; ">
                                    <tr>
                                        <td>Ropani: <?php echo $result['ropani']; ?></td>
                                        <td>Aana: <?php echo $result['aana']; ?></td>
                                        <td>Paisa: <?php echo $result['paisa']; ?></td>
                                        <td>Dam: <?php echo $result['dam']; ?></td>
                                    </tr>
                                </table>
                            <u>PRICE</u>
                                <table  width="100%" style="font-size:20px; ">
                                    <tr>
                                        <td>Amount: RS <?php echo $result['amount']; ?></td>
                                    </tr>
                                </table>
                                <a href="sellstat.php"><button class="consold">Go back</button></a>
                        </div> 
                    </div>
               </div>

               <div class="decore">
                   
               </div>


            </div>
        </div>
    </body>
</html>