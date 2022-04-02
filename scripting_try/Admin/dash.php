<?php
    session_start();  
    if(!isset($_SESSION["Adname"]))
    {
    header("location:login.php");
    }

    include '../database_configure.php' ;
    include 'logout.php' ;
    

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style src="adminstyle.css"></style>
    <title>Residence:Dash</title>
</head>
<body>
    <div>
        <div class="navforadmin" style="border-top:none;border:1px solid black; margin-top: 2px;">
                <a class="navstyle navactive" href="dash.php">Dashboard</a>
                <a class="navstyle" href="viewproperty.php">View Home List</a>
                <a class="navstyle" href="viewland.php">View Land List</a>
            
        </div>
        <div class="dashed">
            <div class="dashcard" style="margin-top:20px;">
            <?php
    
                $fetch= "SELECT COUNT(*) as totalproperty from sale";
                $query= mysqli_query($conn,$fetch);
                $result= mysqli_fetch_assoc($query);
            
            ?>
            <h2 style="margin:2px;text-decoration:underline;">Total Properties listed</h2>
                <div class="dashinfo">
                    <?php echo $result['totalproperty']?>
                </div>
            </div>

            <div class="dashcard" style="margin-top:20px;">
            <?php
    
                $fetchsale= "SELECT COUNT(status) as sales from sale where status=1;";
                $querysale= mysqli_query($conn,$fetchsale);
                $resultsale= mysqli_fetch_assoc($querysale);

            ?>
                <h2 style="margin:2px;text-decoration:underline;">Total Properties Sold</h2>
                <div class="dashinfo">
                    <?php echo $resultsale['sales']?>
                </div>
            </div>
            <div class="dashcard" style="margin-top:20px;">
            <?php
    
                $fetchhouse= "SELECT COUNT(property_type) as housenumber FROM sale where property_type='house'";
                $queryhouse= mysqli_query($conn,$fetchhouse);
                $resulthouse= mysqli_fetch_assoc($queryhouse);

            ?>
                <h2 style="margin:2px;text-decoration:underline;">Total House Listed</h2>
                <div class="dashinfo">
                    <?php echo $resulthouse['housenumber']?>
                </div>
            </div>
            <div class="dashcard" style="margin-top:20px;">
            <?php
    
                $fetchland= "SELECT COUNT(property_type) as landnumber FROM sale where property_type='land'";
                $queryland= mysqli_query($conn,$fetchland);
                $resultland= mysqli_fetch_assoc($queryland);

            ?>
                <h2 style="margin:2px;text-decoration:underline;">Total Land Listed</h2>
                <div class="dashinfo">
                    <?php echo $resultland['landnumber']?>
                </div>
            </div>
            <div class="dashcard" style="margin-top:20px;">
            <?php
    
                $fetchsoldhouse= "SELECT COUNT(status) as housesold FROM sale where property_type='house' and status='1'";
                $querysoldhouse= mysqli_query($conn,$fetchsoldhouse);
                $resultsoldhouse= mysqli_fetch_assoc($querysoldhouse);

            ?>
                <h2 style="margin:2px;text-decoration:underline;">Total House Sold</h2>
                <div class="dashinfo">
                    <?php echo $resultsoldhouse['housesold']?>
                </div>
            </div>
            <div class="dashcard" style="margin-top:20px;">
            <?php
    
                $fetchlandsold= "SELECT COUNT(status) as landsold FROM sale where property_type='land' and status='1'";
                $querylandsold= mysqli_query($conn,$fetchlandsold);
                $resultlandsold= mysqli_fetch_assoc($querylandsold);

            ?>
                <h2 style="margin:2px;text-decoration:underline;">Total Land Sold</h2>
                <div class="dashinfo">
                    <?php echo $resultlandsold['landsold']?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>