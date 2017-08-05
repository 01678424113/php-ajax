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
                <td class="column-name">'.$row['name'].'</td>
                <td>
                    <button type="button" value="'.$row['id'].'" class="btn btn-primary edit" data-toggle="modal" 
                            data-target="#exampleModal" data-whatever="@mdo">Edit
                    </button>
                </td>
                <td>
                    <button value="'.$row['id'].'" class="btn btn-danger delete">Delete</button>
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
    $data .="</table>
            <script>
                $(document).ready(function () {
                    $('.edit').click(function () {   
                        var id = $(this).val();  
                        var name = $('#edit-name').val( $(this).closest('tr').find('.column-name').text());                      
                        $('.modal-edit-category').modal('show');                      
                        $('#edit-btn').off().click(function() {
                            editRecordCategory(id);
                            // Gán id rỗng để tránh id bị lưu sau nhiều lần click                                                 
                        });
                    });                 
                    $('.delete').click(function () {    
                        var id = $(this).val();
                        deleteRecordCategory(id);
                    });
                    function readRecordCategory() {
                        $.get('style/js/ajax/category/readRecords.php', {}, function (data, status) {
                            $('.records-content').html(data);
                        })
                    };
                    function deleteRecordCategory(id) {                   
                        var conf = confirm('Do you want delete?');
                        if(conf === true){
                           $.post('style/js/ajax/category/deleteRecord.php',
                               {
                                   id:id
                               },function (data,status) {
                                   readRecordCategory();
                               }
                           );
                       }               
                    };
                    function editRecordCategory(id) {
                        var name = $('#edit-name').val();
                        $.post('style/js/ajax/category/editRecord.php',
                            {
                                id: id,
                                name:name
                            }, function (data, status) {   
                                alert(data);
                                readRecordCategory();
                            }
                        );
                        $('.modal-edit-category').modal('hide'); 
                    };
               
                });
            </script>";
    echo $data;
?>