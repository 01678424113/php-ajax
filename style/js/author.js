$(document).ready(function () {
    /*---------------------------------------Author-----------------------------------------------------------*/
    readRecordAuthor();
    $('#add-author').click(function () {
        addRecordAuthor();
    });
    function readRecordAuthor() {
        $.get("style/js/ajax/author/readRecords.php", {},function (data,status) {
            $('.records-content').html(data);
        });
    }
    function addRecordAuthor() {
        var full_name = $('#full-name').val();
        var email = $('#email').val();
        var phone = $('#phone').val();
        var birthday = $('#birthday').val();
        var address = $('#address').val();
        $.post("style/js/ajax/author/addRecord.php",
            {
                full_name:full_name,
                email:email,
                phone:phone,
                birthday:birthday,
                address:address
            },function () {
                readRecordAuthor();
                $('#full-name').val("");
                $('#email').val("");
                $('#phone').val("");
                $('#birthday').val("");
                $('#address').val("");
            }
        );
    }
    function deleteRecordAuthor(id) {
        var conf = confirm("Do you want delete?");
        if (conf === true) {
            $.post("style/js/ajax/author/deleteRecord.php",
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
        $.post('style/js/ajax/author/editRecord.php',
            {
                id: id,
                full_name:full_name,
                email:email,
                phone:phone,
                birthday:birthday,
                address:address
            }, function (data, status) {
                readRecordAuthor();
            }
        );
    };
    /*---------------------------------------End author-------------------------------------------------------*/
});