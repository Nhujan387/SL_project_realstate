<?php
    session_start();
    include 'database_configure.php';

    if(!isset($_SESSION['username'])){
    ?><script type='text/javascript'>alert('Signin before you post a sale'); location.replace("home.php");</script><?php
    }else{
            if($_POST){
                $proptype = $_REQUEST['typeprop'];
                $date = $_REQUEST['date'];
                $province = $_REQUEST['province'];
                $district = $_REQUEST['district'];
                $address  = $_REQUEST['address'];
                $ropani = $_REQUEST['ropani'];
                $aana = $_REQUEST['aana'];
                $paisa = $_REQUEST['paisa'];
                $dam = $_REQUEST['dam'];
                $bedno = $_REQUEST['bedno'];
                $toiletno = $_REQUEST['toiletno'];
                $floor = $_REQUEST['floor'];
                $amount= $_REQUEST['price'];
                $currentaddress = $_REQUEST['currentaddress'];
                $phone = $_REQUEST['phoneno'];
                $user = $_SESSION['username'];
                $files = $_FILES['file'];

                $filename = $files['name'];
                $fileerror = $files['error'];
                $filetmp = $files['tmp_name'];

                $fileext = explode('.',$filename);
                $filecheck = strtolower(end($fileext));
                $fileextstored = array('png','jpg','jpeg');

                if(in_array($filecheck,$fileextstored)){
                    $destinationfile = 'image/'.$filename;
                    move_uploaded_file($filetmp,$destinationfile);

                    $insert = "INSERT INTO `sale`
                    ( `property_type`, `Postdate`, `province`, `district`, `address`, `ropani`, `aana`, `paisa`, `dam`, `bedroom_number`, 
                    `toilet_number`, `floor`, `amount`, `current_address`, `phone`, `image`,`user_id`) 
                    VALUES ('$proptype','$date','$province','$district','$address','$ropani','$aana',
                    '$paisa','$dam','$bedno','$toiletno','$floor','$amount','$currentaddress','$phone','$destinationfile','$user')";
                    if($insert){
                        ?> <script>alert('Property listed to sales successful');location.replace("sell.php");</script><?php
                    }
                    $query = mysqli_query($conn,$insert);
                }
            }
    }
?>