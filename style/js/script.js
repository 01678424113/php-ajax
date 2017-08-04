$(document).ready(function () {
    readRecordCategory();
    function readRecordCategory() {
        $.get("ajax/category/readRecords.php", {}, function (data, status) {
            /*$('.records-content').html(data);*/
            alert("ok");
        })
    }

});