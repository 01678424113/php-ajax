$(document).ready(function () {
    readRecordCategory();
    $('#add-category').click(function () {
        addRecordCategory();
    });
    function readRecordCategory() {
        $.get("style/js/ajax/category/readRecords.php", {}, function (data, status) {
            $('.records-content').html(data);
        })
    }
    function addRecordCategory() {
        var name = $('#name').val();
        $.post("style/js/ajax/category/addRecord.php",
            {
              name:name  
            },
            function (data,status) {
                $('.modal.add').modal('hide');
                readRecordCategory();
                $('#name').val("");
            }
        );
    }

});