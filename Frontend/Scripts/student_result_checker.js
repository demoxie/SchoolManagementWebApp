$(document).ready(function () {
    let btnCheck = $('.btn_check_result');
    let resultType = $('#result_type');
    let result_typeSelectedValue;
    let sessionSelect;
    let codeInput = $('#code_input');
    let termSelect;
    let body = $('body');
    let resultCheckForm;
    let termSelectedValue;
    let sessionSelectedValue;

    $('.close,#btn_close_down').click(function () {
        $('#result').modal('hide');
    });


    resultType.change(function () {
        result_typeSelectedValue = $(this);
        $(this).css('border-color', 'darkgreen');
        let result_type = $(this).val();
        $('#session_container,#term_container').hide();
        if (result_type === '1') {

            $.get("../../../Backend/ClassLibrary/fetch_sessions.php", function (data) {
                const result = JSON.parse(data);
                let i;
                $('#session_container').html(`<select class="form-control col-12 session" id="session" name="sessionID"><option selected disabled>SESSION</option></select>`).show();
                sessionSelect= $('.session');
                for (i in result) {
                    $("#session").append("<option value='" + result[i].sessionID + "'>" + result[i].session + "</option>");
                }

                sessionSelect.change(function () {
                    $(this).css('border-color', 'darkgreen');
                    sessionSelectedValue = $(this).val();

                });


            });


        } else {
            $.get("../../../Backend/ClassLibrary/fetch_sessions.php", function (data) {
                const result = JSON.parse(data);
                let i;
                $('#session_container').html(`<select class="form-control col-12 session" id="session" name="sessionID"><option selected disabled>SESSION</option></select>`).show();
                sessionSelect= $('.session');
                for (i in result) {
                    $("#session").append("<option value='" + result[i].sessionID + "'>" + result[i].session + "</option>");
                }
                sessionSelect.change(function () {
                    $(this).css('border-color', 'darkgreen');
                    sessionSelectedValue = $(this).val();
                    $('#term_container').html(`<select class="form-control col-12 term" id="term" name="ternID"><option selected disabled>TERM</option><option value="1">First Term</option><option value="2">Second Term</option><option value="3">Third Term</option></select>`).show();
                    termSelect= $('#term');
                    termSelect.change(function () {
                        $(this).css('border-color', 'darkgreen');
                        termSelectedValue = $(this).val();
                    });

                });


            });


        }
    });
    resultCheckForm= $('#result_check_form');
    codeInput.keydown(function () {
        $(this).css('border-color', 'darkgreen');
    });
    btnCheck.click(function () {

        if (result_typeSelectedValue === undefined) {
            resultType.css('border-color', 'red');
        } else {

            if (sessionSelectedValue === undefined) {
                //alert(sessionSelectedValue);
                sessionSelect.css('border-color', 'red');
            } else{
//alert(result_typeSelectedValue.val());
                if(termSelectedValue === undefined  && result_typeSelectedValue.val()==='2'){
                    termSelect.css('border-color', 'red');
                }else{
                    if ($.trim(codeInput.val()) === '') {
                        let sat = codeInput[0];
                        sat.placeholder = 'Please enter admission number';
                        codeInput.css('border-color', 'red');
                    } else {
//alert('now');
                        $(this).empty().html(`<i class="fa fa-spinner fa-spin fa-fw" style="margin-right: 10px;color:red;"></i>Checking Result...`);
                        setTimeout(function () {
                            resultCheckForm.trigger('submit');
                        }, 3000);


                    }
                }
            }

        }



    });

    resultCheckForm.submit(function (e) {
        e.preventDefault();
        let ajax = $.ajax({
            url: "../../../Backend/ClassLibrary/check_fetch_result.php",
            method: "POST",
            cache: false,
            data: {
                admission_no: codeInput.val(),
                termID: termSelectedValue,
                sessionID: sessionSelectedValue
            }
        });
        ajax.done((msg)=> {
           console.log(msg);
            btnCheck.removeData('<i></i>');
            btnCheck.empty().html(()=> {
                $(this).text('Check Result');
                if (msg === 'false') {
                    $(`#session_container, #term_container, #code_input_container, #result_type_container, #check_btn_container`).show();
                    resultCheckForm.animate({marginLeft: '50px'}, 80);
                    resultCheckForm.animate({marginRight: '100px'}, 80);
                    resultCheckForm.animate({marginRight: '0'}, 80);
                    resultCheckForm.animate({marginLeft: '0'}, 80);
                    codeInput.val('');
                    let sat = codeInput[0];
                    sat.placeholder = 'Invalid Admission number';

                } else if (msg === 'Withdrawn' || msg === 'Expelled') {
                    alert('Your account is terminated because you\'re ' + msg);
                }else if(msg === 'empty'){
                    $(`#session_container, #term_container, #code_input_container, #result_type_container, #check_btn_container`).show();
                    alert('No result for this session');
                } else {
                    //alert(msg);

                    $(`#session_container, #term_container, #code_input_container, #result_type_container, #check_btn_container`).hide();
                    $(`<div class="form-group col-10" id="check_option_container" style="display: flex;justify-content: space-between;align-items: center;">
            <button class="btn col-xs-3 col-sm-4 col-md-5 col-xl-5 btn_summary process" type="button" id="summary">Summary</button>
            <button class="btn col-xs-5 col-sm-5 col-md-6 btn_full_detail process" type="button" id="full_detail">Full Detail</button>
        </div><div class="form-group col-10" id="back_btn_container" style="margin-top:0;display: flex;justify-content: center;align-items: center">
            <button class="btn col-xs-2 back process" type="button" id="back">Back</button></div>`).insertAfter('#check_btn_container');

                    $('#summary').click(function () {
                        presentSummerizedResult(msg);

                    });
                    $('#full_detail').click(function () {
                        presentFullDetailedResult(msg);


                    });
                    $('#back').click(function () {
                        $(this).hide();
                        $('#check_option_container').hide();
                        $('#result_type_container,#code_input_container,#check_btn_container').show();

                    });


                }
                //alert(msg);
            });

        });
        ajax.fail(function (res) {
            alert(res.statusText);
        });


    });


    function printDiv(el) {
        const restorepage = body.html();
        const printcontent = $('#' + el).clone();
        const enteredtext = codeInput.val();
        body.empty().html(printcontent);
        window.print();
        body.html(restorepage);
        codeInput.html(enteredtext);

    }
    function presentSummerizedResult(resultdata){
        let res= JSON.parse(resultdata);
        resultCheckForm.css({'width':'38em','border':'none','marginTop':'20px'});
$('#back').css('marginTop','30px');
        $(`<table id="summerized_table">
    <tr>
        <td>Name</td><td>${res['0']}</td>
        <td>Status</td><td>${res['2']}</td>
        <td>Final Grade</td><td>${res['grade']}</td>
        </tr>
        <tr>
        <td>Final Position</td><td>${res['position']}</td>
        <td>Grand Total</td><td>${res['grandTotal']}</td>
        <td>Average</td><td>${res['average']}</td>
        </tr>
    </table>`).insertAfter('#check_option_container');

    }
    function presentFullDetailedResult(resultdata){
        $('#result').modal('show');
    }

    $('#print').click(function () {
        printDiv('result_sheet');
        $('#result').modal('hide');
    });


});