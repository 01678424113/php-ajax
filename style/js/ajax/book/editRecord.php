<?php
if (
    !empty($_POST['id']) &&
    !empty($_POST['name']) &&
    !empty($_POST['id_category']) &&
    !empty($_POST['id_author']) &&
    !empty($_POST['published_year'])

) {
    if (isset($_POST['id']) &&
        isset($_POST['name']) &&
        isset($_POST['id_category']) &&
        isset($_POST['id_author']) &&
        isset($_POST['published_year']))
    {
        require "../../../../db_connection.php";
        $id = $_POST['id'];
        $name = $_POST['name'];
        $id_category = $_POST['id_category'];
        $id_author = $_POST['id_author'];
        $published_year = $_POST['published_year'];
        $sql = "UPDATE `week2_foobla`.`books` SET `name` = '$name', `id_category` = '$id_category', `id_author` = '$id_author', `published_year` = '$published_year' WHERE `books`.`id` = $id";
        $result = mysqli_query($connect, $sql);
        echo "Save book success";
    }
}else{
    echo "You can't leave this empty";
}
?>