<?php
if (isset($_POST['full_name']) && isset($_POST['email']) && isset($_POST['phone']) && isset($_POST['birthday']) && isset($_POST['address']))
{
    require "../../../../db_connection.php";
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $birthday = $_POST['birthday'];
    $address = $_POST['address'];
    $sql = "INSERT INTO `week2_foobla`.`authors` (`id`, `full_name`, `email`, `phone`, `birthday`, `address`) VALUES (NULL, '$full_name', '$email', '$phone', '$birthday', '$address')";
    $result = mysqli_query($connect,$sql);
    echo "Add success author";
}
?>