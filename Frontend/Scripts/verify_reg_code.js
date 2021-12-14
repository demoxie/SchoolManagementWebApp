$(document).ready(function () {
    let studentID;
    let admissionNO;
    $('#class_selection_form').hide();
    $('.close, #btn_close_down').click(function () {
        $('#successModal').modal('hide');
    });
    $("#validate_btn").click(function () {
        if ($.trim($('#code_input').val()) === '') {
            alert('please enter Registration code');
        } else {
            admissionNO = $.trim($('#code_input').val());
            $.post('../../../Backend/ClassLibrary/forward_to_Student_to_verify_reg_code.php', {
                reg_code: $.trim($('#code_input').val())
            }, function (data) {
                let res = JSON.parse(data);

                $('#validate_btn').empty().append('Validating Reg No').prepend(`<span class="spinner-border spinner-border-sm"></span>&nbsp;&nbsp;`).append(`...`);
                setTimeout(function () {
                    if (res[0] === 'not registered') {

                        $('#code_input').val('');

                        $('<i class="fas fa-times valid-icon"></i>').insertAfter('#code_input').css('color', 'red');
                        $('#validate_btn').empty().append('Validate Reg No');

                        //alert('Invalid registration code or you never applied');
                    } else {
                        studentID = res[1];
                        $('#validate_btn').empty().append('Valid Reg No');
                        $('<i class="fas fa-check valid-icon"></i>').insertAfter('#code_input').css('color', 'green');
                        setTimeout(function () {
                            $('#admission_processing_form').hide();
                            $('#class_selection_form').show();
                        }, 3000);
                    }
                }, 3000);


            });
        }
    });
    $('#process').click(function () {
        $('#process').empty().append('Processing Admission').prepend(`<span class="spinner-border spinner-border-sm"></span>&nbsp;&nbsp;`).append(`...`).css('padding', '5px 0');
        setTimeout(function () {
            submitData();
        }, 3000);

    });

    function submitData() {
        $.post('../../../Backend/ClassLibrary/forward_to_add_status.php', {
                previousClassID: $('#previous_class').val(),
                currentClassID: $('#current_class').val(),
                sessionID: $('#current_session').val(),
                termID: $('#term').val(),
                studentID: studentID
            },
            function (data) {

                $('#process').empty().append('Process Admission');
                if (data === 'Admitted') {
                    alert("You're admitted already");
                } else if (data === 'failed') {
                    alert(data);
                } else {

                    $('#successModal').modal({
                        delay: 10000
                    });
                    $('.modal-title').empty().html('Success! Admission Approved');
                    $('.modal-body').empty().html('Your admission Number is: ' + `<em><b>${data}</b></em>`);
                    $('#successModal').modal('show');
                }


            });
    }

    $('#back').click(function () {
        $('.valid-icon').remove();
        $('#class_selection_form').hide();
        $('#admission_processing_form').show();

    });
    $('#code_input').keydown(function () {

        $('.valid-icon').remove();
    });


});