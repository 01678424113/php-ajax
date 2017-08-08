<?php
if ((!empty($_POST['id'])) && !empty($_POST['name'])) {
    if(isset($_POST['id']) && isset($_POST['name']) )
    {
        require "../../db_connection.php";
        $id = $_POST['id'];
        $name = $_POST['name'];
        $sql = "UPDATE `week2_foobla`.`categories` SET `name` = '$name' WHERE `categories`.`id` = $id";
        $result = mysqli_query($connect,$sql);
        echo "Save new category success";
    }
}else{
    echo "You can't leave this empty";
}
?>