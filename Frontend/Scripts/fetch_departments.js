$(document).ready(function () {
    $.get("../../Backend/ClassLibrary/fetch_departments.php", function (data) {
        let departments = JSON.parse(data);
        for (let item in departments) {

            $("#department").append(`<option value="${departments[item].departmentID}">${departments[item].departmentName}</option>`);

        }
    });
});