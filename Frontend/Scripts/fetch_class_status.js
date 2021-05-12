$(function () {
    $.get('../../../Backend/ClassLibrary/fetch_class.php', function (data) {
        let response = JSON.parse(data);
        for (let vals in response) {
            $("#class").append(`<option value="${response[vals].classID}">${response[vals].studs_class}</option>`);
        }


    });
});