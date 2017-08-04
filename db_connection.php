<?php
    $host = "localhost";
    $user = "root";
    $password = "";
    $database = "week2_foobla";
    $connect = mysqli_connect($host,$user,$password,$database);
    mysqli_query($connect,"SET NAMES 'utf8'");

?>