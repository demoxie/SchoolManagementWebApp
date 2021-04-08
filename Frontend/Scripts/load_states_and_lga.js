$(document).ready(function () {

    let state_dropdown = $('#state_of_origin');
    let lga_dropdown = $('#lga');

    state_dropdown.empty();
    state_dropdown.append('<option  selected disabled>Select State</option>');
    state_dropdown.prop('selectedIndex', 0);


    const url1 = "../../Json/ngstates.json";
    const url2 = "../../Json/ng_lga.json";

// Populate dropdown with list of provinces
    $.getJSON(url1, function (data) {
        $.each(data, function (key, entry) {
            state_dropdown.append($('<option></option>').attr('value', entry.ID).text(entry.Name));
        });
    });
    $("#state_of_origin").change(function () {
        let selectedState = $(this).val();
        let count = 0;
        $.getJSON(url2, function (data) {
            data.filter(item => item.hasOwnProperty(selectedState))
                .map((item) => item.forEach(doPrint(item)));

            function doPrint(item) {
                for (let d = 0; d < item[selectedState].length; d++) {
                    count++;
                    if (count === 1) {
                        lga_dropdown.empty();
                        lga_dropdown.append('<option selected disabled>Select Local Government</option>');
                        lga_dropdown.prop('selectedIndex', 0);

                    } else {
                        lga_dropdown.append($('<option></option>').attr('value', item[selectedState][d]).text(item[selectedState][d]));
                    }


                }
            }

        });


    });
});