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
        <link rel="stylesheet" href="homepage_style.css"/>
        <title>Residence</title>
        <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    </head>
    <style>
    </style>
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
                <li> <a href="home.php" ><button class="active">Home</button></a></li>      
                <li> <a href="buy.php"><button>Buy</button></a></li>
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
        <div class="background">
            
        </div>
        
        <div class="qoute">
            <p class="qoutedesign">
                "I have learned that even the smallest house can be a home"
            </p>
            <p class="qoutedesign">
                Henry David Thoreau
            </p>
        </div>
        <div class="catagory">
            <div class="buy">
                <img class="buyimg" src="img/for buy.jpg" />
                <div style="height:21vh;">
                    <p class="catagoryfont">
                        <b>BUY HOME</b>
                    </p>
                    <p class="subfont">
                        “Buying a home is a big step up into another echelon of society, of respect, and of, well, responsibility…that is 100 percent worth it.”
                    </p>
                </div>
                <a href="buy.php"><button class="catagorybutton">Buy</button></a>
            </div>
            
            <div class="buy">
                <img class="buyimg" src="img/for sale.jpg" />
                <div style="height:21vh;">
                    <p class="catagoryfont">
                        <b>SALE HOME</b>
                    </p>
                    <p class="subfont">
                        “Get a home where love abide and bless all those who steps in.”
                    </p>
                </div>
                <a href="Sell.php"><button class="catagorybutton">Sell</button></a>
            </div>  
        </div>
        <hr style="color: 3px aliceblue; width: 93%; margin: 0 auto; margin-top: 15px; margin-bottom: 10px;"> 
        <div class=" abtus">
                Our website provide a service of selling and buying the home without concent of any third party agent. <br/>
                Using our website a buyer an directly meet with the seller and buy home or land settling the mutal agreement between themselves. <br/>
                Similarly seller can directly inlist thier details to sell home through our website. <br/>
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