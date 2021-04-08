$(document).ready(function () {

    $("#application_form").on("submit", function (e) {
        e.preventDefault();
        let entries = $("input").val();
        if (entries === '') {
            $(`#errorModal`).modal("show");
            $(".modal-body p").html('Fill up all required fields');
        } else {
            e.preventDefault();
            //alert("hy");
            $.ajax({
                url: "../../../Backend/ClassLibrary/forward_to_staff.php",
                type: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function (data) {
                    let message = JSON.parse(data);

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
                error: function (e) {
                    alert(JSON.stringify(e));
                }
            });
        }


    });

});