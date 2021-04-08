$(document).ready(function () {
    $(".save, .upper-save").click(function (event) {
        event.preventDefault();
        let studentNames = $(".names").serializeArray();
        let firstCA = $(".first_ca").serializeArray();
        let secondCA = $(".second_ca").serializeArray();
        let thirdCA = $(".third_ca").serializeArray();
        let studentTotal = $(".total").serializeArray();
        let myclass = $("#class").val();
        let session = $(".session").val();
        //alert(session);
        let term = $(".term").val();
        let subject = $(".subject").val();
        $.post("../../Backend/ClassLibrary/ca_Sheet_forwardToAssessment.php",

            {
                StudentNames: studentNames,
                FirstCA: firstCA,
                SecondCA: secondCA,
                ThirdCA: thirdCA,
                StudentTotal: studentTotal,
                MyClass: myclass,
                Session: session,
                Term: term,
                Subject: subject
            },

            function (server_res) {
                alert(server_res);

            });

        // $("#ca_entry_form").trigger("submit");
    });


});