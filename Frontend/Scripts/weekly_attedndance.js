$(document).ready(function () {
    $(".term").change(function () {
        $("#weekly_attendance_form").trigger('submit');
    });

    $("#weekly_attendance_form").on("submit", function (e) {
        e.preventDefault();
        $.ajax({
            url: "../../Backend/ClassLibrary/forward_to_fetch_students_list.php",
            type: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function (data) {
                const res = JSON.parse(data);
                let i;
                let index;
                $("tbody").empty();
                for (i in res) {
                    // alert(i);
                    index = (1 + Number(i));
                    makeRows(i, index);
                }

                function makeRows(i, index) {

                    $(`<tr>
                <td>${index}</td>
                <td>${res[i].admissionNO}</td>
                <td><input readonly="readonly" style="padding-left: 0;padding-right: 0;background: white" type="text" class="form-control name stud_id" id="name" name="${res[i].studentID}" value="${res[i].name}"></td>
                
                <td>
                    <div class="form-check-inline">
                        <input type="checkbox" class="form-check-input mon_check">
                        <input type="hidden" class="form-control mon" name="mon" value="">

                    </div>
                </td>
                <td>
                    <div class="form-check-inline">
                        <input type="checkbox" class="form-check-input tues_check">
                        <input type="hidden" class="form-control tues" name="tues" value="">
                    </div>
                </td>
                
                <td>
                    <div class="form-check-inline">
                        <input type="checkbox" class="form-check-input wed_check">
                        <input type="hidden" class="form-control wed" name="wed" value="">
                    </div>
                </td>
                <td>
                    <div class="form-check-inline">

                        <input type="checkbox" class="form-check-input thurs_check">
                        <input type="hidden" class="form-control thurs" name="thurs" value="">

                    </div>
                </td>
                <td>
                    <div class="form-check-inline">

                        <input type="checkbox" class="form-check-input fri_check" >
                        <input type="hidden" class="form-control fri" name="fri" value="">

                    </div>

                
                
                <td><input type="text" readonly="readonly" style="background: white" class="form-control col-2 total" name="${i}['total']" value=""></td>
            </tr>`).appendTo("tbody");

                }

                $("tr").each(function () {

                    $(this).children().eq(3).find('input.mon_check').change(function () {
                        let prevVal = $(this).parent().parent().nextUntil(":nth-of-type(4)").find('input.total').val();


                        if ($(this).is(':checked')) {
                            $(this).parent().parent().nextUntil(":nth-of-type(4)").find('input.total').val(calculate(2,prevVal));
                            $(this).siblings().first().val(2);
                            //alert($(this).siblings().first().val());

                        } else {

                            $(this).parent().parent().nextUntil(":nth-of-type(4)").find('input.total').val(calculate(-2, prevVal));
                            $(this).siblings().first().val(0);
                            //alert($(this).siblings().first().val());

                        }

                    });


                    $(this).children().eq(4).find('input.tues_check').change(function () {
                        let prevVal = $(this).parent().parent().nextUntil(":nth-of-type(3)").find('input.total').val();

                        if ($(this).is(':checked')) {

                            $(this).parent().parent().nextUntil(":nth-of-type(3)").find('input.total').val(calculate(2, prevVal));
                            $(this).siblings().first().val(2);
                        } else {
                            //alert($(this).is(':checked'));
                            $(this).parent().parent().nextUntil(":nth-of-type(3)").find('input.total').val(calculate(-2, prevVal));
                            $(this).siblings().first().val(0);
                        }

                    });

                    $(this).children().eq(5).find('input.wed_check').change(function () {
                        let prevVal = $(this).parent().parent().nextUntil(":nth-of-type(2)").find('input.total').val();

                        if ($(this).is(':checked')) {
                            $(this).parent().parent().nextUntil(":nth-of-type(2)").find('input.total').val(calculate(2, prevVal));
                            $(this).siblings().first().val(2);
                        } else {
                            //alert($(this).is(':checked'));
                            $(this).parent().parent().nextUntil(":nth-of-type(2)").find('input.total').val(calculate(-2, prevVal));
                            $(this).siblings().first().val(0);
                        }

                    });

                    $(this).children().eq(6).find('input.thurs_check').change(function () {
                        let prevVal = $(this).parent().parent().nextUntil(":nth-of-type(1)").find('input.total').val();

                        if ($(this).is(':checked')) {
                            $(this).parent().parent().nextUntil(":nth-of-type(1)").find('input.total').val(calculate(2, prevVal));
                            $(this).siblings().first().val(2);
                        } else {
                            //alert($(this).is(':checked'));
                            $(this).parent().parent().nextUntil(":nth-of-type(1)").find('input.total').val(calculate(-2, prevVal));
                            $(this).siblings().first().val(0);
                        }

                    });



                    $(this).children().eq(7).find('input.fri_check').change(function () {
                        let prevVal = $(this).parent().parent().nextUntil(":nth-of-type(1)").find('input.total').val();
                        if ($(this).is(':checked')) {
                            $(this).parent().parent().nextUntil(":nth-of-type(1)").find('input.total').val(calculate(2, prevVal));
                            $(this).siblings().first().val(2);
                        } else {

                            $(this).parent().parent().nextUntil(":nth-of-type(1)").find('input.total').val(calculate(-2, prevVal));
                            $(this).siblings().first().val(0);
                        }

                    });


                    function calculate(currentVal, prevVal) {
                        let pval = isNaN(prevVal) ? 0 : prevVal;
                        return Number(currentVal) + Number(pval);
                    }


                });


            },
            error: function (e) {
                alert(e);
            }
        });


    });


});
