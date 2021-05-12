$(document).ready(function () {
    let tBody = $('tbody');
    function fetchCalendar(){
        $.get("../../Backend/ClassLibrary/fetch_calendar.php", function (data) {

            const result = JSON.parse(data);
            let i;
            tBody.children('tr').remove('tr');
            for (i in result) {
                $('tbody').append(function () {
                    return `<tr>
            <td>${Number(i) + 1}</td>
            <td>${result[i]['session']}</td>
            <td>${result[i]['term']}</td>
            <td>${result[i]['termBegins']}</td>
            <td>${result[i]['termEnd']}</td>
            <td>${result[i]['nextTermBegins']}</td>
            <td>
                <a class="btn edit" data-calendar-id="${result[i]['calendarID']}"><i class="fas fa-edit"></i></a>
            </td>
            <td>
                <a class="btn delete" data-calendar-id="${result[i]['calendarID']}"><i class="fas fa-trash-alt"></i></a>
            </td>
        </tr>`;

                });
                $('.delete').click(function (){
                    let buttonDelete = $(this)
                    if(confirm("Are you sure you want to delete this? you won't recover it")){
                        let calendarID = $(this).data('calendar-id');
                        $.post('../../Backend/ClassLibrary/forward_to_delete_calendar.php',{calendarID:calendarID},function (resp){
                            //alert(resp);
                            buttonDelete.closest('tr').remove();
                            $('tbody').children('tr').remove('tr');
                            fetchCalendar();
                        });
                    }

                });
            }
            });
    }
    $.get("../../Backend/ClassLibrary/fetch_calendar.php", function (data) {

        //alert(data);
        const result = JSON.parse(data);
        let i;
        for (i in result) {
            tBody.append(function (){
                return `<tr>
            <td>${Number(i)+1}</td>
            <td>${result[i]['session']}</td>
            <td>${result[i]['term']}</td>
            <td>${result[i]['termBegins']}</td>
            <td>${result[i]['termEnd']}</td>
            <td>${result[i]['nextTermBegins']}</td>
            <td>
                <a class="btn edit" data-calendar-id="${result[i]['calendarID']}"><i class="fas fa-edit"></i></a>
            </td>
            <td>
                <a class="btn delete" data-calendar-id="${result[i]['calendarID']}"><i class="fas fa-trash-alt"></i></a>
            </td>
        </tr>`
            });
            $('.delete').click(function (){
                let buttonDelete = $(this)
                if(confirm("Are you sure you want to delete this? you won't recover it")){
                    let calendarID = $(this).data('calendar-id');
                    $.post('../../Backend/ClassLibrary/forward_to_delete_calendar.php',{calendarID:calendarID},function (resp){
                        //alert(resp);
                        buttonDelete.closest('tr').remove();
                        $('tbody').children('tr').remove('tr');
                        fetchCalendar();
                    });
                }

            });
        }

    });


    $('#add_calendar').click(function () {

        if ($("#session").val() !== '' && $("#term").val() !== '' &&
            $("#commencement_date").val() !== ''&& $("#endingdate").val() !== ''
            && $("#next_term_begins").val() !== '') {
            $('#calendar_entry_form').trigger('submit');
        } else {
            alert('enter the required fileds');
        }

    });

    $("#calendar_entry_form").on("submit", function (e) {
        e.preventDefault();
        //alert("hey");
        $.ajax({
            url: "../../Backend/ClassLibrary/forward_to_school_add_calendar.php",
            type: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function (data) {
                alert(data);
                fetchCalendar();
            },
            error: function (data) {
                //alert(data);
            }
        });
    });

});