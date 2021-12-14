$(document).ready(function () {
    'use strict';
    $('#checkbox').change(function () {
        if ($(this).is(':checked')) {
            $(this).css({
                'background-color': 'firebrick',
                'color': 'white'
            });
        }

    });
    $('button#createAccount').click(function () {

        let repassword = $('#repassword').val();
        let password = $('#password').val();
        if (password !== repassword) {
            alert('password did not match');
        } else if (!$('#checkbox').is(':checked')) {
            alert('please check the agreement');
        } else {
            $.post('../../../Backend/ClassLibrary/forwardToAccess.php', {
                username: $.trim($('#username').val()),
                password: $.trim($("#password").val())
            }, function (data) {
                if (data === 'true') {
                    window.location.assign('../index.php');
                } else if (data === 'exists') {
                    alert('Proceed to login');
                } else {
                    alert("You're not registered student/staff, please proceed to register");
                }
                console.log(data);
            });

        }
    });
});