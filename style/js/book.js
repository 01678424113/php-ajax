$(document).ready(function () {
    /*---------------------------------------Author-----------------------------------------------------------*/
    readRecordBook();
    $('#add-book').click(function () {
        addRecordBook();
    });
    function readRecordBook() {
        $.get("ajax/book/readRecords.php", {},function (data,status) {
            $('.records-content').html(data);
        });
    }
    function addRecordBook() {
        var name = $('#name').val();
        var id_category = $('#id-category').val();
        var id_author = $('#id-author').val();
        var published_year = $('#published-year').val();
        $.post("ajax/book/addRecord.php",
            {
                name:name,
                id_category:id_category,
                id_author:id_author,
                published_year:published_year
            },function (data,status) {
                readRecordBook();
                alert(data);
                $('#name').val("");
                $('#id-category').val("");
                $('#id-author').val("");
                $('#published-year').val("");
                //
            }
        );
        $('.modal-add-book').modal('hide');
    }


    /*---------------------------------------End author-------------------------------------------------------*/
});