<?php

    session_start();
    include '../database_configure.php';

    $delete = "DELETE FROM `sale` WHERE s_id=$_REQUEST[s_id]";
    $query = mysqli_query($conn,$delete);

    if($delete){
        ?><script>alert('Property deleted succesfully.');location.replace('dash.php');</script><?php
    }

?>