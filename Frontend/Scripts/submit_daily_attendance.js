$(document).ready(function () {
    $(".save").click(function () {
        let stud_class = $('.class').val(),
            sessionID = $('.session').val(),
            termID = $('.term').val(),
            week_round = $('#no_of_times_school_opened').val(),
            day = $('#day').val(),
            studentID = $('.stud_id').serializeArray(),
            reasons = $('.reasons').serializeArray(),
            attendanceScore = $('.atten_score').serializeArray();
        $.post('../../Backend/ClassLibrary/daily_attedance_forward_to_attendance.php',{
            classID:stud_class,
            sessionID:sessionID,
            termID:termID,
            week_round: week_round,
            studentID:studentID,
            reasons:reasons,
            attendanceScore:attendanceScore,
            dayID:day
        },function (data){
            console.log(data);
        });
    });

});