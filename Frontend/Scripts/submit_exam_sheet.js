$(document).ready(function () {
    $(".save, .upper-save").click(function (event) {
        event.preventDefault();
        let studentID = $(".names").serializeArray();
        let totalCA = $(".total_ca").serializeArray();
        let exams = $(".exams").serializeArray();
        let finalTotal = $(".final_total").serializeArray();
        let position = $(".position").serializeArray();
        let myclass = $(".myclass").val();
        let session = $(".session").val();
        let term = $(".term").val();
        let subject = $(".subject").val();
        if ($.trim($(".exams").val()) === '') {
            alert('Please enter a valid score');
        } else {
            $.post("../../Backend/ClassLibrary/exams_forward_to_assessment.php",

                {
                    StudentID: studentID,
                    TotalCA: totalCA,
                    Exams: exams,
                    FinalTotal: finalTotal,
                    Position: position,
                    MyClass: myclass,
                    Session: session,
                    Term: term,
                    Subject: subject
                },

                function (result) {

                    console.log(result);
                    $('.save, .upper-save,.calculate,.upper-calculate').addClass('disabled');
                    $('.save, .upper-save').empty().text('Saved');

                });
        }


    });


});