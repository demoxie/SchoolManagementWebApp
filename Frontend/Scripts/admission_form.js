$(document).ready(function () {
    $('.form-control').keydown(function () {
        $(this).siblings('.error_response').hide();
    });
    $('.form-select,#date_of_birth').change(function () {
        $(this).siblings('.error_response').hide();
    });
    $("#passport").change(function () {
        $(this).siblings('.error_response').hide();
    });

    const inspectPersonalDetails = () => {
        if ($.trim($('#first_name').val()) === '' && $.trim($('#last_name').val()) === '' && $('#gender').children(':selected').val() === 'Gender'
            && $('#date_of_birth').val() === '' && $('#health_status').children(':selected').val() === 'Health Status' &&
            $.trim($('#denomination').val()) === '' && $.trim($('#emotional_behavior').val()) === '' &&
            $.trim($('#social_behavior').val()) === '' && $.trim($('#spiritual_behavior').val()) === '' && $('#passport').val() === '') {
            $('fieldset').eq(0).find('.error_response').html('please fill this').show();
            return 0;

        } else if ($.trim($('#first_name').val()) === '') {
            $('#first_name').siblings('.error_response').html('please fill this').show();
            return 0;
        } else if ($.trim($('#last_name').val()) === '') {
            $('#last_name').siblings('.error_response').html('please fill this').show();
            return 0;
        } else if ($('#gender').children(':selected').val() === 'Gender') {
            $('#gender').siblings('.error_response').html('please fill this').show();
            return 0;
        } else if ($('#date_of_birth').val() === '') {
            $('#date_of_birth').siblings('.error_response').html('please fill this').show();
            return 0;
        } else if ($('#health_status').children(':selected').val() === 'Health Status') {
            $('#health_status').siblings('.error_response').html('please fill this').show();
            return 0;
        } else if ($('#religion').children(':selected').val() === 'Religion') {
            $('#religion').siblings('.error_response').html('please fill this').show();
            return 0;
        } else if ($('#health_status').children(':selected').val() === 'Health Status') {
            $('#health_status').siblings('.error_response').html('please fill this').show();
            return 0;
        } else if ($('#denomination').val() === '') {
            $('#denomination').siblings('.error_response').html('please fill this').show();
            return 0;
        } else if ($('#emotional_behavior').val() === '') {
            $('#emotional_behavior').siblings('.error_response').html('please fill this').show();
            return 0;
        } else if ($('#social_behavior').val() === '') {
            $('#social_behavior').siblings('.error_response').html('please fill this').show();
            return 0;
        } else if ($('#spiritual_behavior').val() === '') {
            $('#spiritual_behavior').siblings('.error_response').html('please fill this').show();
            return 0;
        } else if ($('#passport').val() === '') {
            $('#passport').siblings('.error_response').html('select image').show();
            return 0;
        } else {
            return 1;
        }


    };
    const inspectParentGuardianDetails = () => {
        if ($.trim($('#p_first_name').val()) === '' && $.trim($('#p_last_name').val()) === '' && $.trim($('#p_phone_no').val()) === '') {
            $('fieldset').eq(1).find('.error_response').html('please fill this').show();
            return 0;

        } else if ($.trim($('#p_first_name').val()) === '') {
            $('#p_first_name').siblings('.error_response').html('please fill this').show();
            return 0;
        } else if ($.trim($('#p_last_name').val()) === '') {
            $('#p_last_name').siblings('.error_response').html('please fill this').show();
            return 0;
        } else if ($.trim($('#p_phone_no').val()) === '') {
            $('#p_phone_no').siblings('.error_response').html('please fill this').show();
            return 0;
        } else {
            return 1;
        }
    };

    const inspectAcademicDetails = () => {
        if ($.trim($('#school_name').val()) === '' && $.trim($('#pres_class').val()) === '') {
            $('fieldset').eq(2).find('.error_response').html('please fill this').show();
            return 0;
        } else if ($.trim($('#school_name').val()) === '') {
            $('#school_name').siblings('.error_response').html('please fill this').show();
            return 0;
        } else if ($.trim($('#pres_class').val()) === '') {
            $('#pres_class').siblings('.error_response').html('please fill this').show();
            return 0;
        } else {
            return 1;
        }
    }


    const inspectContactDetails = () => {
        if ($.trim($('#resident_address').val()) === ''
            && $('#state_of_origin').children(':selected').val() === 'Select State' && $('#lga').children(':selected').val() === '') {
            $('fieldset').eq(3).find('.error_response').html('please fill this').show();
            return 0;

        } else if ($.trim($('#resident_address').val()) === '') {
            $('#resident_address').siblings('.error_response').html('please fill this').show();
            return 0;
        } else if ($('#state_of_origin').children(':selected').val() === 'Select State') {
            $('#state_of_origin').siblings('.error_response').html('please fill this').show();
            return 0;
        } else if ($('#lga').children(':selected').val() === '') {
            $('#lga').siblings('.error_response').html('please fill this').show();
            return 0;
        } else {
            return 1;
        }
    };


    let form_count_form, next_form;
    let form_step_label = $(".numbering");
    let step_label = $(".label h6");
    //$('.two, .three, .four').css('opacity','0.5');
    let step_counter = 0;
    let succeeded1 = 0;
    let succeeded2 = 0;
    let succeeded3 = 0;
    let succeeded4 = 0;
    $(".next").click(function () {

        form_count_form = $(this).parent();
        next_form = $(this).parent().next();

        if (inspectPersonalDetails() === 0) {
            return true;
        } else {
            if (succeeded1 <= 0) {
                form_step_label.eq(step_counter).children('h6').empty().append(`<i class="fas fa-check"> </i>`);
                form_step_label.eq(step_counter).css({'border-color': 'green', 'color': 'green'});
                step_label.eq(step_counter).css({'color': 'green'});
                form_step_label.eq(step_counter + 1).removeClass('inactive').addClass('active').css({
                    'border-color': 'black',
                    'color': 'black',
                    'font-weight': 'bold'
                });
                step_label.eq(step_counter + 1).css({'opacity': '1'});
                next_form.show(function () {
                    $(this).css('transition', 'width 2s ease-in-out 1s')
                });
                form_count_form.hide();
                step_counter++;
                succeeded1++;
            }
        }
        if (inspectParentGuardianDetails() === 0) {
            return true;
        } else {
            if (succeeded2 <= 0) {
                form_step_label.eq(step_counter).children('h6').empty().append(`<i class="fas fa-check"> </i>`);
                form_step_label.eq(step_counter).css({'border-color': 'green', 'color': 'green', 'opacity': '1'});
                step_label.eq(step_counter).css({'color': 'green'});
                next_form.show(function () {
                    $(this).css('transition', 'width 2s ease-in-out 1s')
                });
                form_count_form.hide();
                step_counter++;
                succeeded2++;
            }
        }
        if (inspectAcademicDetails() === 0) {
            return true;
        } else {
            if (succeeded3 <= 0) {
                form_step_label.eq(step_counter).children('h6').empty().append(`<i class="fas fa-check"> </i>`);
                form_step_label.eq(step_counter).css({'border-color': 'green', 'color': 'green', 'opacity': '1'});
                step_label.eq(step_counter).css({'color': 'green'});
                next_form.show(function () {
                    $(this).css('transition', 'width 2s ease-in-out 1s')
                });
                form_count_form.hide();
                step_counter++;
                succeeded3++;
            }
        }
        if (inspectContactDetails() === 0) {
            return true;
        } else {
            if (succeeded4 <= 0) {
                form_step_label.eq(step_counter).children('h6').empty().append(`<i class="fas fa-check"> </i>`);
                form_step_label.eq(step_counter).css({'border-color': 'green', 'color': 'green', 'opacity': '1'});
                step_label.eq(step_counter).css({'color': 'green'});
                next_form.show(function () {
                    $(this).css('transition', 'width 2s ease-in-out 1s')
                });
                form_count_form.hide();
                step_counter++;
                succeeded4++;
            }
        }
    });

    $(".previous").click(function () {
        form_count_form = $(this).parent();
        next_form = $(this).parent().prev();
        form_step_label.eq(step_counter - 1).children('h6').empty().append(`${step_counter}`);
        form_step_label.eq(step_counter - 1).css({
            'border-color': 'black',
            'color': 'black',
            'opacity': '1',
            'font-weight': 'bold'
        });
        step_label.eq(step_counter - 1).css({'color': 'black'});
        next_form.show(function () {
            $(this).css('transition', 'width 2s linear 2s')
        });
        form_count_form.hide();
        step_counter--;

    });
    $('.submit').click(function () {
        if (inspectContactDetails() === 1) {
            form_step_label.eq(3).children('h6').empty().append(`<i class="fas fa-check"> </i>`);
            form_step_label.eq(3).css({'border-color': 'green', 'color': 'green', 'opacity': '1'});
            step_label.eq(3).css({'color': 'green'});
        }
    });
    $('.form_step_label').click(function () {
        let pos = $(this).index();
        step_counter = pos;
        $('fieldset').hide();
        form_step_label.eq(pos).children('h6').empty().append(`${Number(pos + 1)}`);
        form_step_label.eq(pos).css({'border-color': 'black', 'color': 'black', 'opacity': '1'});
        step_label.eq(pos).css({'color': 'black'});
        $('fieldset').eq(pos).show();
    });
    $(".custom-file-input").on("change", function () {
        let fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });

    $(".close, #back,.try_again").click(function () {
        $(".modal").modal('hide');
    });

});