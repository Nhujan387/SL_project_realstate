<?php
    include "dbconnect.php" ;

    $pull = "SELECT * FROM `form` where id = 1  ";
    $query = mysqli_query($conn,$pull);
    $result = mysqli_fetch_assoc($query);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Document</title>
    </head>
    <body>
        name = <?= $result['full_name'] ;?><br/>
        address = <?= $result['address'] ;?><br/>
        email = <?= $result['email'] ;?><br/>
        gender = <?= $result['gender'] ;?><br/>
        image = <img src="<?= $result['image'] ;?>" height="120px" width="10%"/><br/>
        contact = <?= $result['contact_no'] ;?><br/>
        citizenship_no = <?= $result['citizenship_no'] ;?><br/>
        Father name = <?= $result['father_name'] ;?><br/>
    </body>
</html>