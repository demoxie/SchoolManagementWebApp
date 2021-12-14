$(document).ready(function () {
    $('.form-control').keydown(function () {
        $(this).siblings('.error_response').hide();
    });
    $('.custom-select,#date_of_birth').change(function () {
        $(this).siblings('.error_response').hide();
    });
    $("#passport").change(function () {
        $(this).siblings('.error_response').hide();
    });
    let firstName = $('#first_name'), lastName = $('#last_name'), gender = $('#gender'),
        dateOfBirth = $('#date_of_birth'), healthStatus = $('#health_status'), denomination = $('#denomination'),
        emotionalBehavior = $('#emotional_behavior'), socialBehavior = $('#social_behavior'),
        spiritualBehavior = $('#spiritual_behavior'), passport = $('#passport'), religion = $('#religion');
    const inspectPersonalDetails = () => {
        if ($.trim(firstName.val()) === '' && $.trim(lastName.val()) === '' && gender.children(':selected').val() === 'Gender'
            && dateOfBirth.val() === '' && healthStatus.children(':selected').val() === 'Health Status' &&
            $.trim(denomination.val()) === '' && $.trim(emotionalBehavior.val()) === '' &&
            $.trim(socialBehavior.val()) === '' && $.trim(spiritualBehavior.val()) === '' && passport.val() === '') {
            $('fieldset').eq(0).find('.error_response').html('please fill this').show();
            return 0;

        } else if ($.trim(firstName.val()) === '') {
            firstName.siblings('.error_response').html('please fill this').show();
            return 0;
        } else if ($.trim(lastName.val()) === '') {
            lastName.siblings('.error_response').html('please fill this').show();
            return 0;
        } else if (gender.children(':selected').val() === 'Gender') {
            gender.siblings('.error_response').html('please fill this').show();
            return 0;
        } else if (dateOfBirth.val() === '') {
            dateOfBirth.siblings('.error_response').html('please fill this').show();
            return 0;
        } else if (healthStatus.children(':selected').val() === 'Health Status') {
            healthStatus.siblings('.error_response').html('please fill this').show();
            return 0;
        } else if (religion.children(':selected').val() === 'Religion') {
            religion.siblings('.error_response').html('please fill this').show();
            return 0;
        } else if (denomination.val() === '') {
            denomination.siblings('.error_response').html('please fill this').show();
            return 0;
        } else if (emotionalBehavior.val() === '') {
            emotionalBehavior.siblings('.error_response').html('please fill this').show();
            return 0;
        } else if (socialBehavior.val() === '') {
            socialBehavior.siblings('.error_response').html('please fill this').show();
            return 0;
        } else if (spiritualBehavior.val() === '') {
            spiritualBehavior.siblings('.error_response').html('please fill this').show();
            return 0;
        } else if (passport.val() === '') {
            passport.siblings('.error_response').html('select image').show();
            return 0;
        } else {
            return 1;
        }


    };
    let pFirstName = $('#p_first_name'), pLastName = $('#p_last_name'), pPhone = $('#p_phone_no');
    const inspectParentGuardianDetails = () => {
        if ($.trim(pFirstName.val()) === '' && $.trim(pLastName.val()) === '' && $.trim(pPhone.val()) === '') {
            $('fieldset').eq(1).find('.error_response').html('please fill this').show();
            return 0;

        } else if ($.trim(pFirstName.val()) === '') {
            pFirstName.siblings('.error_response').html('please fill this').show();
            return 0;
        } else if ($.trim(pLastName.val()) === '') {
            pLastName.siblings('.error_response').html('please fill this').show();
            return 0;
        } else if ($.trim(pPhone.val()) === '') {
            pPhone.siblings('.error_response').html('please fill this').show();
            return 0;
        } else {
            return 1;
        }
    };
    let schoolName = $('#school_name');
    let presentClass = $('#pres_class');
    const inspectAcademicDetails = () => {
        if ($.trim(schoolName.val()) === '' && $.trim(presentClass.val()) === '') {
            $('fieldset').eq(2).find('.error_response').html('please fill this').show();
            return 0;
        } else if ($.trim(schoolName.val()) === '') {
            schoolName.siblings('.error_response').html('please fill this').show();
            return 0;
        } else if ($.trim(presentClass.val()) === '') {
            presentClass.siblings('.error_response').html('please fill this').show();
            return 0;
        } else {
            return 1;
        }
    }

    let residentAddress = $('#resident_address'), stateOfOrigin = $('#state_of_origin'), lga = $('#lga');
    const inspectContactDetails = () => {
        if ($.trim(residentAddress.val()) === ''
            && stateOfOrigin.children(':selected').val() === 'Select State' && lga.children(':selected').val() === '') {
            $('fieldset').eq(3).find('.error_response').html('please fill this').show();
            return 0;

        } else if ($.trim(residentAddress.val()) === '') {
            residentAddress.siblings('.error_response').html('please fill this').show();
            return 0;
        } else if (stateOfOrigin.children(':selected').val() === 'Select State') {
            stateOfOrigin.siblings('.error_response').html('please fill this').show();
            return 0;
        } else if (lga.children(':selected').val() === '') {
            lga.siblings('.error_response').html('please fill this').show();
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

        form_count_form = $(this).parent().parent();
        next_form = $(this).parent().parent().next();

        if (inspectPersonalDetails() === 0) {
            return true;
        } else {
            if (succeeded1 <= 0) {
                form_step_label.eq(step_counter).children('h6').empty().append(`<i class="fas fa-check"> </i>`);
                form_step_label.eq(step_counter).css({'border-color': 'orangered', 'color': '#0d152a'});
                step_label.eq(step_counter).css({'color': '#0d152a'});
                form_step_label.eq(step_counter + 1).removeClass('inactive').addClass('active').css({
                    'border-color': '#0d152a',
                    'color': '#0d152a',
                    'font-weight': 'bold'
                });
                step_label.eq(step_counter + 1).css({'opacity': '1'});
                next_form.show(function () {
                    $(this).css('transition', 'width 2s ease-in-out 1s')
                });
                form_count_form.hide();
                step_counter++;
                succeeded1++;
            } else {
                if (inspectParentGuardianDetails() === 0) {
                    return true;
                } else {
                    if (succeeded2 <= 0) {
                        form_step_label.removeClass('inactive').addClass('active');
                        form_step_label.eq(step_counter).children('h6').empty().append(`<i class="fas fa-check"> </i>`);
                        form_step_label.eq(step_counter).css({
                            'border-color': 'orangered',
                            'color': '#0d152a',
                            'opacity': '1'
                        });
                        step_label.eq(step_counter).css({'color': '#0d152a'});
                        next_form.show(function () {
                            $(this).css('transition', 'width 2s ease-in-out 1s')
                        });
                        form_count_form.hide();
                        step_counter++;
                        succeeded2++;
                    } else {
                        if (inspectAcademicDetails() === 0) {
                            return true;
                        } else {
                            if (succeeded3 <= 0) {

                                form_step_label.eq(step_counter).children('h6').empty().append(`<i class="fas fa-check"> </i>`);
                                form_step_label.eq(step_counter).css({
                                    'border-color': 'orangered',
                                    'color': '#0d152a',
                                    'opacity': '1'
                                });
                                step_label.eq(step_counter).css({'color': '#0d152a'});
                                next_form.show(function () {
                                    $(this).css('transition', 'width 2s ease-in-out 1s')
                                });
                                form_count_form.hide();
                                step_counter++;
                                succeeded3++;
                            } else {
                                if (inspectContactDetails() === 0) {
                                    return true;
                                } else {
                                    if (succeeded4 <= 0) {
                                        form_step_label.eq(step_counter).children('h6').empty().append(`<i class="fas fa-check"> </i>`);
                                        form_step_label.eq(step_counter).css({
                                            'border-color': 'orangered',
                                            'color': '#0d152a',
                                            'opacity': '1'
                                        });
                                        step_label.eq(step_counter).css({'color': '#0d152a'});
                                        next_form.show(function () {
                                            $(this).css('transition', 'width 2s ease-in-out 1s')
                                        });
                                        form_count_form.hide();
                                        step_counter++;
                                        succeeded4++;
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }


    });

    $(".previous").click(function () {
        if (succeeded1 > 0 || succeeded2 > 0 || succeeded3 > 0 || succeeded4 > 0) {
            form_count_form = $(this).parent().parent();
            next_form = $(this).parent().parent().prev();
            form_step_label.eq(step_counter - 1).children('h6').empty().append(`${step_counter}`);
            form_step_label.eq(step_counter - 1).css({
                'border-color': '#0d152a',
                'color': '#0d152a',
                'opacity': '1',
                'font-weight': 'bold'
            });
            step_label.eq(step_counter - 1).css({'color': '#0d152a'});
            next_form.show(function () {
                $(this).css('transition', 'width 2s linear 2s')
            });
            form_count_form.hide();
            step_counter--;
        }

    });
    $('.submit').click(function () {
        if (inspectContactDetails() === 1) {
            form_step_label.eq(3).children('h6').empty().append(`<i class="fas fa-check"> </i>`);
            form_step_label.eq(3).css({'border-color': 'orangered', 'color': '#0d152a', 'opacity': '1'});
            step_label.eq(3).css({'color': '#0d152a'});
        }
    });
    form_step_label.hover(function () {
        //alert('op');
        let pos = $(this).index();
        if (pos + 1 === 1 && succeeded1 <= 0) {
            $(this).css({'cursor': 'not-allowed'});

        } else if (pos + 1 === 2 && succeeded2 <= 0) {
            $(this).css({'cursor': 'not-allowed'});

        } else if (pos + 1 === 3 && succeeded3 <= 0) {
            $(this).css({'cursor': 'not-allowed'});

        } else if (pos + 1 === 4 && succeeded4 <= 0) {
            $(this).css({'cursor': 'not-allowed'});
        }
    });
    let fieldset = $('fieldset');
    form_step_label.click(function () {

        let pos = $(this).index();
        let actualPos = pos + 1;

        if (succeeded1 <= 0 || succeeded2 <= 0 || succeeded3 <= 0 || succeeded4 <= 0) {
            form_step_label.eq(pos + 1).css({'cursor': 'not allowed'});
        } else {
            step_counter = pos + 1;
            fieldset.hide();
            form_step_label.eq(pos + 1).children('h6').empty().append(`${Number(pos + 1)}`);
            form_step_label.eq(pos + 1).css({'border-color': '#0d152a', 'color': '#0d152a', 'opacity': '1'});
            step_label.eq(pos + 1).css({'color': '#0d152a'});
            fieldset.eq(pos + 1).show();
        }


    });
    $(".custom-file-input").on("change", function () {
        let fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });

    $(".close, #back,.try_again").click(function () {
        $(".modal").modal('hide');
    });

});