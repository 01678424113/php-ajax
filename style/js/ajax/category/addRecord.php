<?php
if (isset($_POST['name'])) {
    require "../../../../db_connection.php";
    $name = $_POST['name'];
    $sql = "INSERT INTO `week2_foobla`.`categories` (`id`, `name`) VALUES (NULL, '$name')";
    $result = mysqli_query($connect,$sql);
    echo "Add success category";
}
?>