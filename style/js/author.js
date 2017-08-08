$(document).ready(function () {
    /*---------------------------------------Author-----------------------------------------------------------*/
    readRecordAuthor();
    $('#add-author').click(function () {
        addRecordAuthor();
    });
    function readRecordAuthor() {
        $.get("ajax/author/readRecords.php", {},function (data,status) {
            $('.records-content').html(data);
        });
    }
    function addRecordAuthor() {
        var full_name = $('#full-name').val();
        var email = $('#email').val();
        var phone = $('#phone').val();
        var birthday = $('#birthday').val();
        var address = $('#address').val();
        $.post("ajax/author/addRecord.php",
            {
                full_name:full_name,
                email:email,
                phone:phone,
                birthday:birthday,
                address:address
            },function (data,status) {
                readRecordAuthor();
                alert(data);
                $('#full-name').val("");
                $('#email').val("");
                $('#phone').val("");
                $('#birthday').val("");
                $('#address').val("");
            }
        );
        $('.modal-add-author').modal('hide');
    }

    /*---------------------------------------End author-------------------------------------------------------*/
});