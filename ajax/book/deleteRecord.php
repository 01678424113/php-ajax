<?php
if(isset($_POST['id']))
{
    require "../../db_connection.php";
    $id = $_POST['id'];
    $sql = "DELETE FROM `week2_foobla`.`books` WHERE `books`.`id` = $id";
    $result = mysqli_query($connect,$sql);
}
?>