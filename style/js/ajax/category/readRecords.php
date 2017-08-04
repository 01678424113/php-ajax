<?php
    require "../../../../db_connection.php";
    $data ='
        <table style="width: 1000px">
            <tr style="background: #eae6e6">
                <td><strong>ID</strong></td>
                <td><strong>Category</strong></td>
                <td><strong>Edit</strong></td>
                <td><strong>Delete</strong></td>
            </tr>
    ';
    $query = "SELECT * FROM `categories`";
    $result = mysqli_query($connect,$query);
    if(mysqli_num_rows($result) > 0)
    {
        while ($row = mysqli_fetch_assoc($result))
        {
            $data .= '
            <tr style="height: 50px;">
                <td>'.$row['id'].'</td>
                <td>'.$row['name'].'</td>
                <td>
                    <button type="button" onclick="GetCategoryDetails('.$row['id'].')" class="btn btn-primary" data-toggle="modal" id="edit"
                            data-target="#exampleModal" data-whatever="@mdo">Edit
                    </button>
                </td>
                <td>
                    <button onclick="DeleteCategory('.$row['id'].')" class="btn btn-danger" id="delete">Delete</button>
                </td>
            </tr>
            ';
        }
    }else
    {
        $data .='
            <tr>
                <td>Can not find database</td>
            </tr>
        ';
    }
    $data .='</table>';
    echo $data;
?>