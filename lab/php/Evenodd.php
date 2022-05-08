<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>

    <form method='POST' >
        <h2>Enter a number : <h2> <input type="number" name="number" />
        <input type="submit" value="submit" name="submit" />
    <form>       
    </body>
</html>
<?php
    if($_POST){
        $number= $_REQUEST['number'];
sahkgdaskhdgas
        if($number%2 == 0 ){
            echo "Entered number is even";
        }else{
            echo "Enterd number is odd";
        }
    }
?>