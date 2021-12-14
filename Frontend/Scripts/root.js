$(document).ready(function () {
    $('#login-option').hide();
    $('#login').click(function () {
        $('#login-option').show();
    });
    $('#login-option').mouseleave(function () {
        $('#login-option').hide();
    });
});