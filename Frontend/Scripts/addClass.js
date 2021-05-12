    $(document).ready(function () {
    'use strict';

        $("#add_class").click(function () {
            if (!$.trim($("input").val())) {
                $("h5.modal-title").empty().append("Warning!");
                $("div.modal-header").removeClass("Info!").addClass("alert-warning");
                $("p.alert-body").empty().append("Please fill the empty fields!").show();
                $("#myModal").modal('show');
                $("input").focus();
                return false;
            } else {


                $("form").on('submit', (function (e) {
                    e.preventDefault();

                    $.ajax({
                        url: "C:\wamp64\www\SchoolManagementWebApp\Backend\controllers\Class\addClass.php",
                        type: "POST",
                        data: new FormData(this),
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: function (data) {
                            var server_response = JSON.parse(data);
                            $("#add_class").empty();
                            $("#add_class").prepend('<span class="spinner-border spinner-border-sm"></span>Adding Class').delay(3000).queue(function () {
                                // Code to be executed
                                $("#add_class").prop("disabled", "true");
                                $("#add_class").empty();
                                $("#add_class").append('Add Question').fadeIn("fast");
                                $(this).dequeue();

                            });

                            $("h5.modal-title").empty().append(server_response["alert"]);
                            $("div.modal-header").removeClass("alert-warning alert-danger alert-info alert-success").addClass(server_response["status"]);
                            $("p.alert-body").html(server_response["message"]).show();
                            $("#myModal").modal('show');

                        },
                        error: function (data) {
                            var server_response = JSON.parse(data);
                            $("h5.modal-title").empty().append(server_response["alert"]);
                            $("div.modal-header").removeClass("alert-warning alert-danger alert-info alert-success").addClass(server_response["status"]);
                            $("p.alert-body").html(server_response["message"]).show();
                            $("#myModal").modal('show');

                        }
                    });
                }));
            }

        });



    });