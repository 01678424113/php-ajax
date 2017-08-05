$(document).ready(function () {
    /*------------------------------------------Category----------------------------------------------------*/
    readRecordCategory();

    $('#add-category').click(function () {
        addRecordCategory();
    });

    // Functions category
    function readRecordCategory() {
        $.get("style/js/ajax/category/readRecords.php", {}, function (data, status) {
            $('.records-content').html(data);
        })
    }

    function addRecordCategory() {
        var name = $('#name').val();
        $.post("style/js/ajax/category/addRecord.php",
            {
                name: name
            },
            function (data, status) {
                $('.modal.add').modal('hide');
                readRecordCategory();
                $('#name').val("");
            }
        );
    }

    function deleteRecordCategory(id) {
        var conf = confirm("Do you want delete?");
        if (conf === true) {
            $.post("style/js/ajax/category/deleteRecord.php",
                {
                    id: id
                }, function (data, status) {
                    readRecordCategory();
                }
            );
        }
    }

    function editRecordCategory(id) {
        var name = $('#edit-name').val();
        $.post("style/js/ajax/category/editRecord.php",
            {
                id: id,
                name:name
            }, function (data, status) {
                readRecordCategory();
            }
        );
        $('.modal-edit-category').modal('hide');

    }

    /*---------------------------------------End category----------------------------------------------------*/

});