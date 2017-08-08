<?php
require "../../db_connection.php";
$data = '
         <table style="width: 1000px">
            <tr style="background: #eae6e6">
                <td><strong>ID</strong></td>
                <td><strong>Name</strong></td>
                <td><strong>Category</strong></td>
                <td><strong>Author</strong></td>
                <td><strong>Published Year</strong></td>              
                <td><strong>Edit</strong></td>
                <td><strong>Delete</strong></td>
            </tr>
    ';
$query = "SELECT * FROM `books`";
$result = mysqli_query($connect, $query);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $data .= '
            <tr style="height: 50px;">
                <td>' . $row['id'] . '</td>
                <td class="column-name">' . $row['name'] . '</td>
                <td class="column-id-category">' . $row['id_category'] . '</td>
                <td class="column-id-author">' . $row['id_author'] . '</td>
                <td class="column-published-year">' . $row['published_year'] . '</td>               
                <td>
                    <button type="button" value="' . $row['id'] . '" class="btn btn-primary edit" data-toggle="modal" 
                            data-target="#exampleModal" data-whatever="@mdo">Edit
                    </button>
                </td>
                <td>
                    <button value="' . $row['id'] . '" class="btn btn-danger delete">Delete</button>
                </td>
            </tr>
            ';
    }
} else {
    $data .= '
            <tr>
                <td>Can not find database</td>
            </tr>
        ';
}
$data .= "</table>
        <script>
            $(document).ready(function() {
                 $('.edit').click(function () {   
                     var id = $(this).val();
                     var name = $('#edit-name').val( $(this).closest('tr').find('.column-name').text());
                     var id_category = $('#edit-id-category').val( $(this).closest('tr').find('.column-id-category').text());
                     var id_author = $('#edit-id-author').val( $(this).closest('tr').find('.column-id-author').text());
                     var published_year = $('#edit-published-year').val( $(this).closest('tr').find('.column-published-year').text());                   
                    $('.modal-edit-book').modal('show');                     
                    $('#edit-btn').off().click(function() {     
                        editRecordBook(id);                      
                        // Gán id rỗng để tránh id bị lưu sau nhiều lần click                                          
                    });
                });
                 function readRecordBook() {
                    $.get('ajax/book/readRecords.php', {},function (data,status) {
                        $('.records-content').html(data);
                    });
                 };
                 $('.delete').click(function () {    
                    var id = $(this).val();
                    deleteRecordBook(id);
                 });
                 function deleteRecordBook(id) {
                    var conf = confirm('Do you want delete?');
                    if (conf === true) {
                        $.post('ajax/book/deleteRecord.php',
                            {
                                id: id
                            }, function (data, status) {
                                readRecordBook();
                            }
                        );
                    }
                }
                 function editRecordBook(id) {
                    var name = $('#edit-name').val();
                    var id_category = $('#edit-id-category').val();
                    var id_author = $('#edit-id-author').val();
                    var published_year = $('#edit-published-year').val();                 
                    $.post('ajax/book/editRecord.php',
                        {
                            id: id,                         
                            name:name,
                            id_category:id_category,
                            id_author:id_author,
                            published_year:published_year
                        },function (data, status) {
                            alert(data);
                            readRecordBook();
                        }
                    );
                    $('.modal-edit-book').modal('hide');
                 }
            });
        </script>
        ";
echo $data;
?>