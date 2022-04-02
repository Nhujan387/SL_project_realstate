<?php 
    session_start();
    include 'sign_modal.php';
    include 'database_configure.php';

?>
<?php 

    $month = date('m');
    $day = date('d');
    $year = date('Y');

    $today = $year . '-' . $month . '-' . $day;
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Residence: Sell</title>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://kit.fontawesome.com/a076d05399.js"></script>
        <link rel="stylesheet" href="homepage_style.css"/>
        <link rel="stylesheet" href="sellstyle.css"/>
        <script>
            function validateform(){
                address = document.getElementById('currentaddress').value;
                phone = document.getElementById('phoneno').value;
                price = document.getElementById('price').value;
                image = document.getElementById('file').value;
                validate = true;

                if(address ==''){
                    document.getElementById('emt-address').style.display = 'block';
                    validate = false;
                }else{
                    document.getElementById('emt-address').style.display = 'none';
                }
                if(price ==''){
                    document.getElementById('emt-price').style.display = 'block';
                    validate = false;
                }else{
                    document.getElementById('emt-price').style.display = 'none';
                }
                if(phone ==''){
                    document.getElementById('emt-phone').style.display = 'block';
                    validate = false;
                }else{
                    document.getElementById('emt-phone').style.display = 'none';
                }

                if(image ==''){
                    document.getElementById('emt-img').style.display = 'block';
                    validate = false;
                }else{
                    document.getElementById('emt-img').style.display = 'none';
                }

                if(validate){
                    document.getElementById('propinfo-form').submit();
                }
            }
        </script>
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
        <div class="Sellorder" style="margin-top: 5px; margin-bottom:10px;">
            <div class=" subsell">
                <a href="sellstat.php"><button class="salestat">View your sale status</button></a>
                <hr style="color: 3px aliceblue; width: 93%; margin: 0 auto; margin-top: 15px; margin-bottom: 10px;">
                <div class="tips">Tips while you are selling your Home</div> <br/>
                <div class="tips2" >
                    <ol>
                        <li>Do not underestimate the cost of selling.</li>
                        <li>Do not sell in unrealistic price.</li>
                        <li>Only considering the highest offer.</li>
                        <li>Do not ignoring major repairs and make costly renovations.</li>
                        <li>Make sure to prepare your home for sale.</li>
                        <li>Give proper description of your house.</li>
                        <li>Assure your term and conditions with buyer before selling.</li>
                    </br></br>
                    <div class="tips">Provide your genuine Contact number and Address while giving description.</div>
                    </ol>
                </div>
            </div>
            <div class="subsell2">
                <form id="propinfo-form" method="POST" enctype="multipart/form-data" action="saleform.php" onsubmit="event.preventDefault(); validateform();">
                    <fieldset style="border: 1px solid black; width: 98%;  margin: 0 auto;">
                        <legend style="font-size: 20px; font-weight: bold; ">Property Information</legend>
                        
                        <label class="info">Property type </label>
                        <select style="font-size:18px;" name="typeprop" id="typeprop">
                            <option value="house">House</option>
                            <option value="land">Land</option>
                        </select>
                        <input type="date" value="<?php echo $today; ?>" class="form-control" id="date" name="date" style="display:none">
                        <div class="subheads">Address</div>
                        <label class="info" >Province:</label>
                        <input type="text" name="province" id="province" >
                        <label class="info">District:</label>
                        <input  type="text" name="district" id="district" > 
                        <label class="info">Address:</label>
                        <input  type="text" name="address" id="address">
                        
                        <div class="subheads">Measurement of land</div>
                        <label class="info">Ropani:</label>
                        <input type="number" name="ropani" id="ropani" >
                        <label class="info">Aana:</label>
                        <input  type="number" name="aana" id="aana"> 
                        <label class="info">Paisa:</label>
                        <input  type="number" name="paisa" id="paisa"> 
                        <br/>
                        <label class="info">Dam:</label>
                        <input  type="number" name="dam" id="dam"> <br/>
                        <div class="subheads">Home Details</div>
                        <label class="info">No of Bedroom:</label>
                        <input type="number" name="bedno" id="bedno" >
                        <label class="info">No of Bathroom:</label>
                        <input  type="number" name="toiletno" id="toiletno">
                        <label class="info">Floor:</label>
                        <input  type="number" name="floor" id="floor">

                        <div class="subheads">Pricing details</div>
                        <label class="info">Amount:</label>
                        <input type="number" name="price" id="price" >
                        <span class="error-message" id="emt-price">Price cannot be empty.</span>
                        <div class="subheads">Images</div>
                        <label class="info">Image:</label>
                        <input class="input"  type="file" id="file" name="file" accept="image/*"
                        onchange="document.getElementById('showimg').src=window.URL.createObjectURL(this.files[0]);" /> 
                        <span class="error-message" id="emt-img">Image cannot be empty.</span></br>

                        <img style="width:20%;height:20vh; border: 1px solid black; margin:2px;"  id="showimg"></p>
                    </fieldset>
                    <fieldset style="border: 1px solid black; width: 98%;  margin: 0 auto;">
                        <legend style="font-size: 20px; font-weight: bold; ">Seller Information</legend>
                        <label class="info">Seller address:</label>
                        <input  type="text" name="currentaddress" id="currentaddress"> 
                        <span class="error-message" id="emt-address">Address cannot be empty.</span>
                        <label class="info">Contact-no:</label>
                        <input  type="number" name="phoneno" id="phoneno">
                        <span class="error-message" id="emt-phone">Contact number cannot be empty.</span> </br></br>
                    </fieldset>
                            <input type="submit" value="Submit" class="submit"/>
                </form>
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