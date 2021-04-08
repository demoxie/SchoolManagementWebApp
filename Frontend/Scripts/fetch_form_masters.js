$(document).ready(function () {
    $(".myclass").on('change', function (event) {
        let myclass = $(this).val();
        $.post("../../Backend/ClassLibrary/fetch_form_masters.php", {CLASS: myclass}, function (res) {
            $("#form").html(res)
            $("#display_class").html($('.myclass').find(':selected').text());
        });
    });
});