$(document).ready(function () {
    $("div.quest").hide();
    $("div.image_preview").hide();
    var answers = 0;
    var imageUploadButtonAdded = 0;

    $("select.hasPicture").change(function () {
        //var selectedSubject = $(this).children("option:selected").val();
        var selectedHasPicture = $(this)
            .children("option:selected")
            .val();
        if (selectedHasPicture === "Yes") {
            $("div.quest").show();
            imageUploadButtonAdded += 1;

            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        $("#imgPlaceholder").attr("src", e.target.result);
                    };

                    reader.readAsDataURL(input.files[0]); // convert to base64 string
                    if ($("#upload-image").get(0).files.length != 0) {
                        $(".image_preview").show();
                    } else {
                        $(".image_preview").hide();
                    }
                } else {
                    $(".image_preview").hide();
                }
            }

            $("#upload-image").change(function () {
                readURL(this);
            });
        } else {
            imageUploadButtonAdded -= 1;
            $("div.quest").hide();
            $("div.image_preview").hide();
            $("img").val("");
            $("#upload-image").get(0).files.length = 0;
        }
    });

    $('input[type="checkbox"]').click(function () {
        if ($(this).prop("checked") === true) {
            answers++;

            // alert("Checkbox is checked. "+answers);
        } else if ($(this).prop("checked") === false) {
            answers--;
            //alert("Checkbox is unchecked."+answers);
        }
    });

    $("#add_question_btn").click(function () {
        var optionA, optionB, optionC, optionD, optionE, optionselected;
        optionA = $("#A").val();
        optionB = $("#B").val();
        optionC = $("#C").val();
        optionD = $("#D").val();
        optionE = $("#E").val();
        optionselected = 0;
        //var lessThanFourOptions;
        if (
            $.trim(optionA) &&
            $.trim(optionB) &&
            $.trim(optionC) &&
            $.trim(optionD)
        ) {
            optionselected += 4;

            //alert("you added " + optionselected + " options");
        } else if (
            $.trim(optionA) &&
            $.trim(optionB) &&
            $.trim(optionC) &&
            $.trim(optionD) &&
            $.trim(optionE)
        ) {
            optionselected += 5;
            //alert("you added " + optionselected + " options");
        } else {
        }

        if ($(".subject").val() === null) {
            $("h5.modal-title")
                .empty()
                .append("Info!");
            $("div.modal-header").addClass("alert-info");
            $("p.alert-body").empty();
            $("p.alert-body")
                .append("Please Select Subject")
                .show();
            $("#myModal").modal("show");
            $(".subject").focus();

            return false;
        } else if (!$.trim($(".class_name").val())) {
            $("h5.modal-title")
                .empty()
                .append("Info!");
            $("div.modal-header").addClass("alert-info");
            $("p.alert-body").empty();
            $("p.alert-body")
                .append("Please Select a Class")
                .show();
            $("#myModal").modal("show");

            $("#question").focus();

            return false;
        } else if (
            imageUploadButtonAdded > 0 &&
            $("#upload-image").get(0).files.length === 0
        ) {
            $("h5.modal-title")
                .empty()
                .append("Info!");
            $("div.modal-header").addClass("alert-info");
            $("p.alert-body").empty();
            $("p.alert-body")
                .append("Please Select and Image")
                .show();
            $("#myModal").modal("show");
            $("#upload-image").focus();
            return false;
        } else if (!$.trim($("#question").val())) {
            $("h5.modal-title")
                .empty()
                .append("Info!");
            $("div.modal-header").addClass("alert-info");
            $("p.alert-body").empty();
            $("p.alert-body")
                .append("Please Add Question")
                .show();
            $("#myModal").modal("show");

            $("#question").focus();

            return false;
        } else if (optionselected < 4) {
            $("h5.modal-title")
                .empty()
                .append("Info!");
            $("div.modal-header").addClass("alert-info");
            $("p.alert-body").empty();
            $("p.alert-body")
                .append("Please Add Upto 4 Options")
                .show();
            $("#myModal").modal("show");

            $(".answer").focus();

            return false;
        } else if (answers <= 0) {
            $("h5.modal-title")
                .empty()
                .append("Info!");
            $("div.modal-header").addClass("alert-info");
            $("p.alert-body").empty();
            $("p.alert-body")
                .append("Please Select One Answer")
                .show();
            $("#myModal").modal("show");

            $(".answer").focus();

            return false;
        } else if (answers > 1) {
            $("h5.modal-title")
                .empty()
                .append("Warning!");
            $("div.modal-header")
                .removeClass("Info!")
                .addClass("alert-warning");
            $("p.alert-body").empty();
            $("p.alert-body")
                .append(
                    "You can't have more than one answer for a question, please select only one answer!"
                )
                .show();
            $("#myModal").modal("show");

            $(".answer").focus();

            return false;
        } else if (
            $(".subject").val() != null &&
            $.trim($("#question").val()) != "" &&
            imageUploadButtonAdded <= 0 &&
            optionselected >= 4 &&
            answers > 0
        ) {
            $("form").on("submit", function (e) {
                e.preventDefault();

                $.ajax({
                    url: "../_php/Add_Question.php",
                    type: "POST",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function (data) {
                        var make =
                            '{"alert": "Warning!", "status": "alert alert-warning", "message": "i am ok"}';
                        var server_response = JSON.parse(make);

                        if (server_response["alert"] === "Success!") {
                            $("#add_question_btn").empty();
                            $("#add_question_btn")
                                .prepend(
                                    '<span class="spinner-border spinner-border-sm"></span> Adding Question'
                                )
                                .delay(3000)
                                .queue(function () {
                                    // Code to be executed
                                    $("h5.modal-title").empty();
                                    $("h5.modal-title").append(
                                        server_response["alert"]
                                    );
                                    $("div.modal-header")
                                        .removeClass(
                                            "alert-warning alert-danger alert-info alert-success"
                                        )
                                        .addClass(server_response["status"]);
                                    $("p.alert-body").empty();
                                    $("p.alert-body").append(
                                        server_response["message"]
                                    );
                                    $("#myModal").modal("show");
                                    $("#add_question_btn").empty();
                                    $("#add_question_btn")
                                        .append("Question Added")
                                        .fadeIn("fast");
                                    $("#add_question_btn").prop(
                                        "disabled",
                                        "true"
                                    );
                                    $("#add_question_btn")
                                        .append("Question Added")
                                        .fadeIn("fast");
                                    $(this).dequeue();
                                });
                        } else {
                            $("h5.modal-title").empty();
                            $("h5.modal-title").append(
                                server_response["alert"]
                            );
                            $("div.modal-header")
                                .removeClass(
                                    "alert-warning alert-danger alert-info alert-success"
                                )
                                .addClass(server_response["status"]);
                            $("p.alert-body").append(
                                server_response["message"]
                            );
                            $("#myModal").modal("show");
                        }
                    },
                    error: function (data) {
                        $("h5.modal-title").empty();
                        $("h5.modal-title").append("Error!");
                        $("div.modal-header")
                            .removeClass(
                                "alert-warning alert-danger alert-info alert-success"
                            )
                            .addClass("alert alert-danger");
                        $("p.alert-body").append(data);
                        $("#myModal").modal("show");
                    }
                });
            });
        } else {
            $("form").on("submit", function (e) {
                e.preventDefault();

                $.ajax({
                    url: "../_php/Add_Question.php",
                    type: "POST",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function (data) {
                        var server_response = JSON.parse(data);

                        if (server_response["alert"] === "Success!") {
                            $("#add_question_btn").empty();
                            $("#add_question_btn")
                                .prepend(
                                    '<span class="spinner-border spinner-border-sm"></span> Adding Question'
                                )
                                .delay(3000)
                                .queue(function () {
                                    // Code to be executed

                                    $("h5.modal-title").empty();
                                    $("h5.modal-title").append(
                                        server_response["alert"]
                                    );
                                    $("div.modal-header")
                                        .removeClass(
                                            "alert-warning alert-danger alert-info alert-success"
                                        )
                                        .addClass(server_response["status"]);
                                    $("p.alert-body").empty();
                                    $("p.alert-body").append(
                                        server_response["message"]
                                    );
                                    $("#myModal").modal("show");
                                    $("#add_question_btn").empty();
                                    $("#add_question_btn")
                                        .append("Question Added")
                                        .fadeIn("fast");
                                    $("#add_question_btn").prop(
                                        "disabled",
                                        "true"
                                    );
                                    $(this).dequeue();
                                });
                        } else {
                            $("h5.modal-title").empty();
                            $("h5.modal-title").append(
                                server_response["alert"]
                            );
                            $("div.modal-header")
                                .removeClass(
                                    "alert-warning alert-danger alert-info alert-success"
                                )
                                .addClass(server_response["status"]);
                            $("p.alert-body").append(
                                server_response["message"]
                            );
                            $("#myModal").modal("show");
                        }
                    },
                    error: function (data) {
                        $("h5.modal-title").empty();
                        $("h5.modal-title").append("Error!");
                        $("div.modal-header")
                            .removeClass(
                                "alert-warning alert-danger alert-info alert-success"
                            )
                            .addClass("alert alert-danger");
                        $("p.alert-body").append(data);
                        $("#myModal").modal("show");
                    }
                });
            });
        }
    });
});
