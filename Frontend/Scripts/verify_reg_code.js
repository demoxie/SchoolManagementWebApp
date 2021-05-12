$(document).ready(function () {
    $('.close, #btn_close_down').click(function () {
        $('#successModal').modal('hide');
    });
    $("#process").click(function () {
        if ($.trim($('#code_input').val()) === '') {
            alert('please enter Registration code');
        } else {
            $("#result_check_form").trigger('submit');
        }
    });
    $("#result_check_form").on("submit", function (e) {
        e.preventDefault();
        $.ajax({
            url: "../../../Backend/ClassLibrary/forward_to_Student_to_verify_reg_code.php",
            type: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function (data) {
                $('#process').empty().append('Processing admission').addClass('disabled').prepend(`<span class="spinner-border spinner-border-sm text-danger"></span>&nbsp;&nbsp;`).append(`...`).animate().delay(10000);
                $('#process').empty().append('Process admission');
                if (data === false) {
                    alert('Invalid registration code or you never applied');
                } else {
                    alert(data);
                    $('#successModal').modal({delay: 2000});
                    $('.modal-title').empty().html('Success! Admission Approved');
                    $('.modal-body').empty().html('Your admission Number is: ' + `<em><b>${data}</b></em>`);
                    $('#successModal').modal('show');
                }

            },
            error: function (e) {
                alert(e);
            }
        });


    });

});