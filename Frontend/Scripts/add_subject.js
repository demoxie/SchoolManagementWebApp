$(document).ready(function () {
    'use strict';
    $("#add_subject").click(function () {

        if ($.trim($("#subject_name").val()) === '' || $("#class").val() === '' || $("#department").val() === '') {
            alert("Select");
            return false;
        } else {
            //alert('ok');
            $("#subject_entry_form").trigger("submit");
        }
    });

    $("#subject_entry_form").submit((function (e) {
        e.preventDefault();
        $.ajax('../../Backend/ClassLibrary/forward_to_subject.php', {
            type: 'POST', // http method
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function (data, status, xhr) {
                console.log('status: ' + status + ', data: ' + data);
            },
            error: function (jqXhr, textStatus, errorMessage) {
                console.log('Error ' + errorMessage);
            }
        });
    }));


});