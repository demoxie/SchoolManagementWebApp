$(document).ready(function () {
    $(".class").on('change', function (event) {
        event.preventDefault();
        let myclass = $(this).val();
        $.post("../../Backend/ClassLibrary/fetch_class_data.php", {CLASS: myclass}, function (result) {
            // alert(result);
            $("#form").html(result);
        });
        $("#ca_entry_form").trigger('submit');
    });

    $("#ca_entry_form").on("submit", function (e) {
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

                    $(`<tr>
                     <td><input class="form-control serial_number" value="${index}" disabled style="border-style: none;background-color:white;" type="text"></td>
                     <td><input class="form-control names" name="${ret[i].studentID}" readonly="readonly" style="border-style: none;background-color:white;" value="${ret[i].name}" type="text"></td>
                     <td><input class="form-control first_ca" type="text" value="" name="1st_ca"></td>
                     <td><input class="form-control second_ca" type="text" value="" name="2nd_ca"></td>
                     <td><input class="form-control third_ca" type="text" value="" name="3rd_ca"></td>
                     <td><input class="form-control exams" type="text" value="" name="exams"></td>
                     <td><input class="form-control total" type="text" value="" readonly="readonly" name="total"></td>
                     <td><input class="form-control position" type="text" value="" readonly="readonly" name="position"></td>
                     <td><input class="form-control grade" type="text" value="" readonly="readonly" name="grade"></td>
                     </tr>`).appendTo("tbody");

                }


                const firstCA_Array = [];
                const secondCA_Array = [];
                const thirdCA_Array = [];
                const total_Array = [];
                const sum_Array = [];
                $("button.calculate,button.upper-calculate").click(function (x) {
                    //alert("he");
                    x.preventDefault();
                    $("tr").each(function () {
                        $(this).children("td").first().siblings().first().next().each(function () {
                            firstCA_Array.push(Number($.trim($(this).children("input").val())));
                        });

                        $(this).children("td").first().siblings().first().next().next().each(function () {
                            secondCA_Array.push(Number($.trim($(this).children("input").val())));
                        });

                        $(this).children("td").first().siblings().first().next().next().next().each(function () {
                            thirdCA_Array.push(Number($.trim($(this).children("input").val())));
                        });

                        $(this).children("td").first().siblings().first().next().next().next().next().each(function () {
                            total_Array.push(Number($.trim($(this).children("input").val())));
                        });

                        const result = Sum(firstCA_Array, secondCA_Array, thirdCA_Array);
                        let x;
                        for (x in result) {
                            $(this).children("td").first().siblings().first().next().next().next().next().next().each(function () {

                                $(this).children("input").val(result[x]);

                            });
                        }
                    });

                    //To Compute sum of 1st, 2nd and third CA and append to column Total
                    function Sum(firstCA = [], secondCA = [], thirdCA = []) {

                        for (const x in firstCA) {

                            const sum = (firstCA[x] + secondCA[x] + thirdCA[x]).toFixed(2);
                            sum_Array.push(sum);

                        }
                        return sum_Array;
                    }
                });


            },
            error: function (e) {
                alert(e);
            }
        });


    });

});