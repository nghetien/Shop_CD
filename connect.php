<?php
    $db_host="localhost";
    $db_user="root";
    $db_pass="";
    $db_name="shop_CD";
    $connectDB=mysqli_connect($db_host, $db_user, $db_pass, $db_name);
    if(!$connectDB){
        die("Connect fail! ".mysqli_connect_error());
    }
    mysqli_set_charset($connectDB,"UTF8");
?>