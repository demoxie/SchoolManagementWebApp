$(document).ready(function () {
    $(window).on('load', function () {
        alert('hello');
        $('#ca_entry_form,#daily_attendance_form').trigger('submit');
    });
    $("#ca_entry_form,#daily_attendance_form").on("submit", function (e) {
        e.preventDefault();
        $.ajax({
            url: "../../Backend/ClassLibrary/fetch_session_and_term.php",
            type: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function (data) {
                const result = JSON.parse(data);
                //alert(result);
                let i;
                for (i in result) {
                    $(".session").append("<option value='" + result[i].sessionID + "'>" + result[i].session + "</option>");
                }


            },
            error: function (e) {
                alert(e);
            }
        });
    });

});