$(document).ready(function () {
    /*------------------------------------------Category----------------------------------------------------*/
    readRecordCategory();

    $('#add-category').click(function () {
        addRecordCategory();
    });

    // Functions category
    function readRecordCategory() {
        $.get("ajax/category/readRecords.php", {}, function (data, status) {
            $('.records-content').html(data);
        })
    }

    function addRecordCategory() {
        var name = $('#name').val();
        $.post("ajax/category/addRecord.php",
            {
                name: name
            },
            function (data, status) {
                $('.modal.add').modal('hide');
                readRecordCategory();
                alert(data);
                $('#name').val("");
            }
        );
        $('.modal-add-category').modal('hide');
    }

    /*---------------------------------------End category----------------------------------------------------*/

});