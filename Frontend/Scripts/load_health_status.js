$(document).ready(function () {

    let health_status_dropdown = $('#health_status');

    health_status_dropdown.empty();
    health_status_dropdown.append('<option  selected disabled>Health Status</option>');
    health_status_dropdown.prop('selectedIndex', 0);

    const url1 = "../../Json/health_status.json";
// Populate dropdown with list of provinces
    $.getJSON(url1, function (data) {
        (data).forEach(function (element, index) {
            health_status_dropdown.append($('<option></option>').attr('value', element[index]).text(element[index]));
        })

    });

});