
$(document).ready(function () {
    $.get('../../Backend/ClassLibrary/fetch_class.php', function (data) {
        let response = JSON.parse(data);
        for (let vals in response) {
            $("#myclass").append(`<option value="${response[vals].classID}">${response[vals].studs_class}</option>`);
        }

    });
    $(".myclass").on('change', function () {
        let myclass = $(this).val();
        $.post("../../Backend/ClassLibrary/fetch_form_masters.php", {
            classID: myclass
        }, function (result) {
            $("#form").html(result);
            $("#display_class").html($('#myclass').find(':selected').text());
        });


    });
    $(".term").on('change', function () {

        $("#term_assessment_entry_form").trigger('submit');

    });

    $("#term_assessment_entry_form").on("submit", function (e) {
        e.preventDefault();
        $.ajax({
            url: "../../Backend/ClassLibrary/forward_to_fetch_students_list.php",
            type: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function (data) {
                const ret = JSON.parse(data);
                // alert(data);
                let i;
                let index;
                $("tbody").empty();
                for (i in ret) {
                    // alert(i);
                    index = (1 + Number(i));
                    makeRows(i, index);
                }

                function makeRows(i, index) {

                    $(`<tr >
                     <td style="text-align:center;vertical-align:middle;width: 10px;padding: 2px"><input class="form-control serial_number" value="${index}" disabled style="border-style: none;background-color:white;" type="text"></td>
                     <td style="min-width: 50px;padding: 3px" ><input class="form-control names" name="${ret[i].studentID}" readonly="readonly" style="border-style: none;background-color:oldlace;" value="${ret[i].name}" type="text"></td>
                     <td><input class="form-control first_ca" type="number" min="0" value="" name="1st_ca"></td>
                     <td><input class="form-control second_ca" type="number" min="0" value="" name="2nd_ca"></td>
                     <td><input class="form-control third_ca" type="number" min="0" value="" name="3rd_ca"></td>
                     <td><input class="form-control exams" type="number" min="o" value="" name="exams"></td>
                     <td><input class="form-control total" type="text" value="" readonly="readonly" name="total"></td>
                     <td><input class="form-control position" type="text" value="" readonly="readonly" name="position"></td>
                     <td><input class="form-control grade" type="text" value="" readonly="readonly" name="grade">
                     <input class="form-control remark" type="hidden" value="" name="remark">
                     <input class="form-control studentID" type="hidden" value="${ret[i].studentID}" name="studentID">
                     </td>
                     </tr>`).appendTo("tbody");

                }

                $('tr td input.form-control').css({'width': '6rem', "text-align": "center"});

                $('tbody tr td').css({"width": "0.1rem", "text-align": "center"});
                $('.save, .upper-save,.calculate,.upper-calculate').removeClass('disabled');
                $('.save, .upper-save').empty().text('Save');

                let firstCA;
                let secondCA;
                let thirdCA;
                let exams;
                const total_Array = [];
                $("button.calculate,button.upper-calculate").click(function (x) {
                    //alert("he");
                    x.preventDefault();
                    $("tbody tr").each(function () {
                        firstCA = Number($.trim($(this).children("td").eq(2).children("input").val()));
                        secondCA = Number($.trim($(this).children("td").eq(3).children("input").val()));
                        thirdCA = Number($.trim($(this).children("td").eq(4).children("input").val()));
                        exams = Number($.trim($(this).children("td").eq(5).children("input").val()));
                        let result = Sum(firstCA, secondCA, thirdCA, exams);
                        $(this).children("td").eq(6).children("input").val(result);

                    });
                    const empty = arr => arr.length = 0;
                    empty(total_Array);
                    $("tbody tr").each(function () {
                        $(this).children("td").eq(6).each(function () {
                            total_Array.push(Number($.trim($(this).children("input").val())));
                        });
                    });
                    let ordinal_Array = {};
                    total_Array.sort((a, b) => b - a);
                    total_Array.forEach(addOrdinalSuffix);
                    $("tr").each(function () {
                        $(this).children("td").eq(6).each(function () {
                            let totalValue = Number($.trim($(this).children("input").val()));
                            if (ordinal_Array.hasOwnProperty(totalValue)) {
                                $(this).next().children("input").val(ordinal_Array[totalValue]);
                            }
                            $(this).next().next().children("input").val(grade(totalValue));
                            $(this).next().next().children("input.remark").val(remark(grade(totalValue)));

                        });
                    });

                    /*Adds ordinal suffix to scores*/
                    function addOrdinalSuffix(value, index) {
                        let n = Number(index + 1);
                        ordinal_Array[value] = ordinal(n);
                    }


                    function ordinal(n) {
                        let s = ["th", "st", "nd", "rd"];
                        let v = n % 100;
                        return n + (s[(v - 20) % 10] || s[v] || s[0]);
                    }

                    //To Compute sum of 1st, 2nd and third CA and append to column Total
                    function Sum(firstCA, secondCA, thirdCA, exams) {
                        return (firstCA + secondCA + thirdCA + exams).toFixed(2);
                    }

                    function grade(score) {
                        if (score > 100.00) {
                            return [{
                                "No grade": "is above 100"
                            }];
                        } else if (score >= 75.00 && score <= 100.00) {
                            return "A";
                        } else if (score >= 70.00 && score < 75.00) {
                            return "B2";
                        } else if (score >= 65.00 && score < 70.00) {
                            return "B3";
                        } else if (score >= 60.00 && score < 65.00) {
                            return "C4";
                        } else if (score >= 55.00 && score < 60.00) {
                            return "C5";
                        } else if (score >= 50.00 && score < 55.00) {
                            return "C6";
                        } else if (score >= 45.00 && score < 50.00) {
                            return "D7";
                        } else if (score >= 40.00 && score < 45.00) {
                            return "E8";
                        } else {
                            return "F9";
                        }
                    }

                    function remark(grade) {
                        if (grade === 'A') {
                            return 'Excellent';
                        } else if (grade === 'B2') {
                            return 'V.Good';
                        } else if (grade === 'B3') {
                            return 'Good';
                        } else if (grade === 'C4') {
                            return 'Credit';
                        } else if (grade === 'C5') {
                            return 'Credit';
                        } else if (grade === 'C6') {
                            return 'Credit';
                        } else if (grade === 'D7') {
                            return 'Pass';
                        } else if (grade === 'E8') {
                            return 'Pass';
                        } else {
                            return 'Fail';
                        }
                    }



                });


            },
            error: function (e) {
                alert(e);
            }
        });


    });

});