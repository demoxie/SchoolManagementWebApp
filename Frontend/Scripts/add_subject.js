$(document).ready(function () {
    'use strict';
    $("#add_subject").click(function () {

        if ($.trim($("#subject_code").val()) === '' || $.trim($("#subject_name").val()) === '' || $.trim($("#subject_unit").val()) === '' || $.trim($("#class").val()) !== '' || $.trim($("#department").val()) !== '') {
            alert("Select");
            return false;
        } else {
            $("#subject_entry_form").trigger("submit");
        }
    });

    $("#subject_entry_form").submit((function (e) {
        e.preventDefault();
        $.ajax('../../Backend/ClassLibrary/forward_to_subject.php', {
            type: 'POST',  // http method
            data: {myData: new FormData(this)},  // data to submit
            success: function (data, status, xhr) {
                alert('status: ' + status + ', data: ' + data);
            },
            error: function (jqXhr, textStatus, errorMessage) {
                alert('Error ' + errorMessage);
            }
        });
    }));


});
