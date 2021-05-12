$(document).ready(function () {
    $(".save, .upper-save").click(function (event) {
        event.preventDefault();
        let studentID = $(".names").serializeArray();
        let firstCA = $(".first_ca").serializeArray();
        let secondCA = $(".second_ca").serializeArray();
        let thirdCA = $(".third_ca").serializeArray();
        let exams = $(".exams").serializeArray();
        let total = $(".total").serializeArray();
        let position = $(".position").serializeArray();
        let grade = $(".grade").serializeArray();
        let remark = $(".remark").serializeArray();
        let myclass = $(".myclass").val();
        let session = $(".session").val();
        let term = $(".term").val();
        let subject = $(".subject").val();
        $.post("../../Backend/ClassLibrary/single_page_assessment_to_assessment.php",

            {
                StudentID: studentID,
                FirstCA: firstCA,
                SecondCA: secondCA,
                ThirdCA: thirdCA,
                Exams: exams,
                Total: total,
                Position:position,
                Grade:grade,
                Remark:remark,
                MyClass: myclass,
                Session: session,
                Term: term,
                Subject: subject
            },

            function (result) {
                $('.save, .upper-save,.calculate,.upper-calculate').addClass('disabled');
                $('.save, .upper-save').empty().text('Saved');
                console.log(result);
               // alert(result);

            });

        // $("#ca_entry_form").trigger("submit");
    });


});