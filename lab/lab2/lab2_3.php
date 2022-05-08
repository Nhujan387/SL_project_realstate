<?php
    $conn = mysqli_connect("localhost","root","","student");
    if($conn->connect_error){
        die("Connection failed:".$conn->connect_error);
    }

    $aggregate = "SELECT avg(marks) avg, count(marks) count, sum(marks) sum, min(marks) min, max(marks) max FROM student";

    $query = mysqli_query($conn,$aggregate);
    $check = mysqli_fetch_assoc($query);

    echo "Average =". $check['avg'];
    echo "  Count =". $check['count'];
    echo "  Sum =". $check['sum'];
    echo "  Min =". $check['min'];
    echo "  Max =". $check['max'];

?>