$(document).ready(function () {
    $('#add_school_data').click(function () {

        if ($(".form-control").val() !== '' && $(".form-select").val() !== '') {
            $('#school_data_entry_form').trigger('submit');
        } else {
            alert('enter the required fileds');
        }

    });

    $("#school_data_entry_form").on("submit", function (e) {
        e.preventDefault();
        $.ajax({
            url: "../../Backend/ClassLibrary/forward_to_school_data.php",
            type: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function (data) {
                alert(data);
                //let depart_data = JSON.parse(data);

            },
            error: function (data) {
                //alert(data);
            }
        });
    });
});