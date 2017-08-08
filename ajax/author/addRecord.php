<?php
if (
    !empty($_POST['full_name']) &&
    !empty($_POST['email']) &&
    !empty($_POST['phone']) &&
    !empty($_POST['birthday']) &&
    !empty($_POST['address']))
{
    if (isset($_POST['full_name']) &&
        isset($_POST['email']) &&
        isset($_POST['phone']) &&
        isset($_POST['birthday']) &&
        isset($_POST['address']))
    {
        require "../../db_connection.php";
        $full_name = $_POST['full_name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $birthday = $_POST['birthday'];
        $address = $_POST['address'];
        $sql = "INSERT INTO `week2_foobla`.`authors` (`id`, `full_name`, `email`, `phone`, `birthday`, `address`) VALUES (NULL, '$full_name', '$email', '$phone', '$birthday', '$address')";
        $result = mysqli_query($connect,$sql);
        echo "Add author success";
    }
}else
{
    echo "You can't leave this empty";
}
?>