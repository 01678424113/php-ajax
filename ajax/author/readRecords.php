<?php
require "../../db_connection.php";
$data = '
         <table style="width: 1000px">
            <tr style="background: #eae6e6">
                <td><strong>ID</strong></td>
                <td><strong>Full name</strong></td>
                <td><strong>Email</strong></td>
                <td><strong>Phone</strong></td>
                <td><strong>Birthday</strong></td>
                <td><strong>Address</strong></td>
                <td><strong>Edit</strong></td>
                <td><strong>Delete</strong></td>
            </tr>
    ';
$query = "SELECT * FROM `authors`";
$result = mysqli_query($connect, $query);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $data .= '
            <tr style="height: 50px;">
                <td>' . $row['id'] . '</td>
                <td class="column-full-name">' . $row['full_name'] . '</td>
                <td class="column-email">' . $row['email'] . '</td>
                <td class="column-phone">' . $row['phone'] . '</td>
                <td class="column-birthday">' . $row['birthday'] . '</td>
                <td class="column-address">' . $row['address'] . '</td>
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
                     var full_name = $('#edit-full-name').val( $(this).closest('tr').find('.column-full-name').text());
                     var email = $('#edit-email').val( $(this).closest('tr').find('.column-email').text());
                     var phone = $('#edit-phone').val( $(this).closest('tr').find('.column-phone').text());
                     var birthday = $('#edit-birthday').val( $(this).closest('tr').find('.column-birthday').text());
                     var address = $('#edit-address').val( $(this).closest('tr').find('.column-address').text());
                    $('.modal-edit-author').modal('show');                     
                    $('#edit-btn').off().click(function() {     
                        editRecordAuthor(id);                      
                        // Gán id rỗng để tránh id bị lưu sau nhiều lần click                                          
                    });
                });
                 function readRecordAuthor() {
                    $.get('ajax/author/readRecords.php', {},function (data,status) {
                        $('.records-content').html(data);
                    });
                 };
                 $('.delete').click(function () {    
                    var id = $(this).val();
                    deleteRecordAuthor(id);
                 });
                 function deleteRecordAuthor(id) {
                    var conf = confirm('Do you want delete?');
                    if (conf === true) {
                        $.post('ajax/author/deleteRecord.php',
                            {
                                id: id
                            }, function (data, status) {
                                readRecordAuthor();
                            }
                        );
                    }
                 }
                 function editRecordAuthor(id) {
                    var full_name = $('#edit-full-name').val();
                    var email = $('#edit-email').val();
                    var phone = $('#edit-phone').val();
                    var birthday = $('#edit-birthday').val();
                    var address = $('#edit-address').val();
                    $.post('ajax/author/editRecord.php',
                        {
                            id: id,
                            full_name:full_name,
                            email:email,
                            phone:phone,
                            birthday:birthday,
                            address:address
                        },function (data, status) {
                            alert(data);
                            readRecordAuthor();
                        }
                    );
                    $('.modal-edit-author').modal('hide');
                 }
            });
        </script>
        ";
echo $data;
?>