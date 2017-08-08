<?php
if (
    !empty($_POST['name']) &&
    !empty($_POST['id_category']) &&
    !empty($_POST['id_author']) &&
    !empty($_POST['published_year']))
{
    if (isset($_POST['name']) &&
        isset($_POST['id_category']) &&
        isset($_POST['id_author']) &&
        isset($_POST['published_year']))
    {
        require "../../db_connection.php";
        $name = $_POST['name'];
        $id_category = $_POST['id_category'];
        $id_author = $_POST['id_author'];
        $published_year = $_POST['published_year'];
        $sql = "INSERT INTO `week2_foobla`.`books` (`id`, `name`, `id_category`, `id_author`, `published_year`) VALUES (NULL, '$name', '$id_category', '$id_author', '$published_year')";
        $result = mysqli_query($connect,$sql);
        echo "Add book success";
    }
}else
{
    echo "You can't leave this empty";
}
?>