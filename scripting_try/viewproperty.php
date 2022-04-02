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
        <div class="forsale">
            <?php

                $displayquery =  "SELECT * FROM `sale` WHERE `s_id` = '$_REQUEST[s_id]'";
                $querydisplay = mysqli_query($conn,$displayquery);
                while($result = mysqli_fetch_array($querydisplay)){
            ?>
            <div  class="typeofpropertyforsale" style="margin-top:5px">
                <div class="houseonsale" style="margin-top:5px" >
                    <div class="housesale">
                        <div style="width:70%;height:38vh;margin: 0 auto;">
                            <img src="<?php echo $result['image']?>"  width="100%" height="260px"/>
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
                        </div>  
                    </div>
                </div>
                <div >
                    <div class="typeofpropertybuyerinfo" style="margin-top:5px;">
                            <div class="sellerinformation">
                            <h2 style="text-align:center;" >Seller Information</h2> <br>
                                Name: <?php echo $_REQUEST['name']; ?></br>
                                Contact no: <?php echo $result['phone']; ?></br>
                                Address: <?php echo $result['current_address']; ?></br>
                            </div>
                            <?php } ?>
                    </div>
                    <div class="typeofpropertybuyerinfo" style="margin-top:5px;">
                            <div class="sellerinformation">
                            <h2 style="text-align:center;" >Want the property!!</h2><br>
                            <p style="text-align:center">Call the seller in above given contact number.</p>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>