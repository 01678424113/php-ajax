<?php
if(isset($_POST['id']) && isset($_POST['full_name']) && isset($_POST['email']) && isset($_POST['phone']) && isset($_POST['birthday']) && isset($_POST['address']) )
{
    require "../../../../db_connection.php";
    $id = $_POST['id'];
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $birthday = $_POST['birthday'];
    $address = $_POST['address'];
    $sql = "UPDATE `week2_foobla`.`authors` SET `full_name` = '$full_name', `email` = '$email', `phone` = '$phone', `birthday` = '$birthday', `address` = '$address' WHERE `authors`.`id` = $id";
    $result = mysqli_query($connect,$sql);

}
?>