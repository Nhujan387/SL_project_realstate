<?php

    include "dbconnect.php" ;

    $delete = "DELETE FROM `form` WHERE id = 2";

    $query = mysqli_query($conn,$delete);
    if($query){
        echo "deleted succesfully";
    }

?>