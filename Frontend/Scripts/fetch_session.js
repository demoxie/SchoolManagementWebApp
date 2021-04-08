$(document).ready(function () {
    $.get("../../Backend/ClassLibrary/fetch_sessions.php", function (data) {
        const result = JSON.parse(data);
        let i;
        for (i in result) {
            $(".session").append("<option value='" + result[i].sessionID + "'>" + result[i].session + "</option>");
        }

    });

});