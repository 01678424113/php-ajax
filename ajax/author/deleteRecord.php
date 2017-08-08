<?php
if(isset($_POST['id']))
{
    require "../../db_connection.php";
    $id = $_POST['id'];
    $sql = "DELETE FROM `week2_foobla`.`authors` WHERE `authors`.`id` = $id";
    $result = mysqli_query($connect,$sql);
}
?>