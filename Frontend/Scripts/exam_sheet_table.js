$(document).ready(function () {
    $(".myclass").on('change', function (event) {
        let myclass = $(this).val();
        $.post("../../Backend/ClassLibrary/fetch_form_masters.php", {CLASS: myclass}, function (res) {
            $("#form").html(res)
            $("#display_class").html($('.myclass').find(':selected').text());
        });
    });
    $(".term").on('change', function (event) {
        $("#exams_entry_form").trigger('submit');
    });
    $("#exams_entry_form").on("submit", function (e) {
        e.preventDefault();
        $.ajax({
            url: "../../Backend/ClassLibrary/forward_to_fetch_ca.php",
            type: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function (data) {
                const ret = JSON.parse(data);
                let i;
                let index;
                $("tbody").empty();
                for (i in ret) {
                    // alert(i);
                    index = (1 + Number(i));
                    makeRows(i, index);
                }

                function makeRows(i, index) {

                    $(`<tr>
                     <td style="padding: 0"><input class="form-control serial_number" style ="border-style: none;padding:0;background-color:white;" value="${index}" disabled type="text"></td>
                     <td><input class="form-control names" name="${ret[i].studentID}" readonly="readonly" style="border-style: none;background-color:white;" value="${ret[i].name}" type="text"></td>
                     <td><input class="form-control total_ca" type="text" value="${ret[i].totalCA === null ? 0 : ret[i].totalCA}" readonly="readonly" name="total_ca" style="border-style: none;background-color: white"></td>
                     <td><input class="form-control exams" type="number" value="" name="exams"></td>
                     <td><input class="form-control final_total" type="text" value="" readonly="readonly" name="final_total" style ="border-style: none;background-color:white"></td>
                     <td><input class="form-control position" type="text" value="" name="position" readonly="readonly" style ="border-style: none;background-color:white"></td>
                     </tr>`).appendTo("tbody");

                }

                $('.save, .upper-save,.calculate,.upper-calculate').removeClass('disabled');
                $('.save, .upper-save').empty().text('Save');

                let total_CA;
                let exam_Score;
                let result;
                let final_total = [];

                $("button.calculate,button.upper-calculate").click(function (m) {
                    //alert("he");
                    m.preventDefault();
                    $("tbody tr").each(function () {
                        $(this).children("td").first().siblings().first().next().each(function () {
                            total_CA = Number($.trim($(this).children("input").val()));
                        });

                        $(this).children("td").first().siblings().first().next().next().each(function () {
                            exam_Score = Number($.trim($(this).children("input").val()));
                        });
                        //Sum Total CA and Exam Score
                        result = Sum(total_CA, exam_Score);
                        $(this).children("td").first().siblings().first().next().next().next().each(function () {

                            $(this).children("input").val(result);
                        });

                    });
                    const empty = arr => arr.length = 0;
                    empty(final_total);
                    $("tr").each(function () {
                        $(this).children("td").first().siblings().first().next().next().next().each(function () {
                            final_total.push($.trim($(this).children("input").val()));
                        });
                    });


                    let ordinal_Array = {};
                    final_total.sort((a, b) => b - a);
                    final_total.forEach(myFunction);
                    $("tr").each(function () {

                        $(this).children("td").first().siblings().first().next().next().next().each(function () {
                            let totalValue = $.trim($(this).children("input").val());
                            if (ordinal_Array.hasOwnProperty(totalValue)) {
                                $(this).next().children("input").val(ordinal_Array[totalValue]);
                            }


                        });
                    });

                    //alert(JSON.stringify(ordinal_Array));
                    function myFunction(value, index) {
                        let n = Number(index + 1);
                        ordinal_Array[value] = ordinal(n);
                    }

                    function ordinal(n) {
                        let s = ["th", "st", "nd", "rd"];
                        let v = n % 100;
                        return n + (s[(v - 20) % 10] || s[v] || s[0]);
                    }

                    //Computing the sum of 1st, 2nd and third CA and push to sum_array
                    function Sum(totalCA, examScore) {
                        return !isNaN(totalCA) ? (totalCA + examScore).toFixed(2) : (0 + examScore).toFixed(2);


                    }
                });


            },
            error: function (e) {
                alert(e);
            }
        });


    });

});