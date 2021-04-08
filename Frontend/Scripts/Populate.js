$(document).ready(function () {

    $("#select-subject").change(function () {
        var subjectID = $(this).val();

        $.ajax({
            url: '_php/Populate.php',
            type: 'post',
            data: {SubjectID: subjectID},
            dataType: 'json',
            success: function (response) {

                var len = response.length;

                $("#class").empty();
                for (var i = 0; i < len; i++) {
                    var ClassID = response[i]['ClassID'];
                    var ClassName = response[i]['ClassName'];

                    $("#class").append("<option value='" + ClassID + "'>" + ClassName + "</option>");

                }
            }
        });
    });

});