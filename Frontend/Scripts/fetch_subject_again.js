$(document).ready(function () {
    $.get('../../../Backend/ClassLibrary/fetch_subjects.php', function (data) {
        const result = JSON.parse(data);
        //alert(data);
        let i;
        for (i in result) {
            //alert(JSON.stringify(result[0].subjectID));
            $(".subject").append("<option value='" + result[i].subjectID + "'>" + result[i].subjectName + "</option>");
        }

    });

});