$(document).ready(function () {
    $('.submit').click(function () {
        $('#admission-form').trigger('submit');
        //alert("ok");
    });
    $('#admission-form').submit(function (e) {
        e.preventDefault();
        $.ajax({
            url: "../../../Backend/ClassLibrary/forward_to_student.php",
            type: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function (message) {
                console.log(message);
                for (let v in message) {

                    if (true === message.hasOwnProperty(-2)) {
                        //$(".signup-form").hide();
                        $("#dangerModal").modal("show");
                        $(".modal-body p").html(message["-2"].message);
                    } else if (true === message.hasOwnProperty(-1)) {
                        // $(".signup-form").hide();
                        $("#systemErrorModal").modal("show");
                        $(".modal-body p").html(message["-1"].message);
                    } else if (true === message.hasOwnProperty(0)) {
                        // $(".signup-form").hide();
                        $("#successModal").modal("show");
                        $(".modal-body p").html(message["0"].message);
                    } else {
                        //$(".signup-form").hide();
                        $(`#errorModal`).modal("show");
                        $(".modal-body p").html(message["1"].message);
                    }
                }
            },
            error: function (res) {
                alert(res);
            }
        });
    });


});