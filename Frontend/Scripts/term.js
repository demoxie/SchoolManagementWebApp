$(document).ready(function () {
    $("#term_form").on("submit", function (e) {
        e.preventDefault();
        $.ajax({
            url: "../../Backend/ClassLibrary/forwardToTerm.php",
            type: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function (data) {
                alert(data);
            },
            error: function (data) {
                //alert(data);
            }
        });
    });
});