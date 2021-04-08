$(document).ready(function () {

    let bank_dropdown = $('#bank_names');

    bank_dropdown.empty();
    bank_dropdown.append('<option  selected disabled>Select Bank</option>');
    bank_dropdown.prop('selectedIndex', 0);

    const url1 = "../../Json/bank_names.json";
// Populate dropdown with list of provinces
    $.getJSON(url1, function (data) {
        (data).forEach(function (element, index) {
            bank_dropdown.append($('<option></option>').attr('value', element[index]).text(element[index]));
        })

    });

});