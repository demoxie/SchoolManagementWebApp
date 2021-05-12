$(document).ready(function () {
   // $('.session').getData($('.session').data())
    $(".save").click(function () {
        let studentID = $('.name').serializeArray(),
            stud_class = $('.class').val(),
            sessionID = $('.session').val(),
            termID = $('.term').val(),
            week = $('.week_round').val(),
            mon = $('.mon').serializeArray(),
            tues = $('.tues').serializeArray(),
            wed = $('.wed').serializeArray(),
            thurs = $('.thurs').serializeArray(),
            fri = $('.fri').serializeArray(),
            total = $('.total').serializeArray();
            $.post('../../Backend/ClassLibrary/weekly_attendance_forward_to_attendance.php', {
                studentID: studentID,
                classID: stud_class,
                sessionID: sessionID,
                termID: termID,
                week:week,
                mon: mon,
                tues: tues,
                wed: wed,
                thurs: thurs,
                fri: fri,
                total: total
            }, function (data) {
                console.log(data);
            });
    });

});