$(document).ready(function () {
    $(".term").change(function () {
        $("#daily_attendance_form").trigger('submit');
    });

    $("#daily_attendance_form").on("submit", function (e) {
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
                     <td><input class="form-control serial_number" value="${index}" disabled style="border-style: none;background-color:white;width:40px;text-align: center" type="text"></td>
                     <td><input class="form-control admissionNO" name="${res[i].studentID}" readonly="readonly" style="border-style: none;background-color:white;" value="${res[i].admissionNO}" type="text"></td>
                     <td><input class="form-control names" type="text" value="${res[i].name}" readonly="readonly" name="Names" style="border-style: none;background-color: white"></td>
                     <td><input class="form-check-input morning" type="checkbox" value="" name="morning"></td>
                     <td><input class="form-check-input afternoon" type="checkbox" value="" name="afternoon" ></td>
                     <td><input class="form-control col-3 reasons" type="text" value="" name="reasons"></td>
                     <td><input class="form-control total" type="text" value="" readonly="readonly" name="${i}['total']" style="border-style: none;background-color: white"></td>
                     </tr>`).appendTo("tbody");

                }

                $("tr").each(function () {
                    $(this).find("td:nth-child(4)").children().change(function () {

                        if ($('input').is(':checked')) {
                            $(this).parent().find("td:nth-child(7)").find('input').val(add(1));
                        } else {

                            $(this).parent().find("td:nth-child(7)").find('input').val(subtract(1));
                        }

                    });


                    $(this).find("td:nth-child(5)").children().change(function () {

                        if ($('input').is(':checked')) {
                            $(this).parent().find("td:nth-child(7)").find('input').val(add(1));
                        } else {
                            $(this).parent().find("td:nth-child(7)").find('input').val(subtract(1));

                        }

                    });

                    //$(this).find("td:nth-child(7)").find('input').val("fre");
                    function add(currentVal) {
                        let prevVal = $.trim($(this).find("td:nth-child(7)").find('input').val());
                        let ans = Number(prevVal + currentVal);
                        return ans;
                    }

                    function subtract(currentVal) {
                        let prevVal = $.trim($(this).find("td:nth-child(7)").find('input').val());
                        let ans = Number(prevVal - currentVal);
                        return ans;
                    }


                });


            },
            error: function (e) {
                alert(e);
            }
        });


    });


});