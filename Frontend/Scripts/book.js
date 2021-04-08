$(document).ready(function () {
    $("#addBook").on("submit", function (e) {
        e.preventDefault();

        $.ajax({
            url: "../../Backend/ClassLibrary/forwardToELibrary.php",
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