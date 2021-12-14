$(document).ready(function () {
    'use strict';
    let arr;
    let first_name;
    $('#login').click(function (e) {
        e.preventDefault();
        $.post("../../Backend/ClassLibrary/loginToAccess.php", {
            username: $('#username').val(),
            password: $('#password').val()
        }, function (data) {
            let result = JSON.parse(data);

            if (result.error === 'welcome back') {
                alert('welcome back');
                window.location.assign('../Dashboard/index.php');
            } else if (result.error === "Wrong login details, try again") {
                alert('Wrong login details,try again');
            } else if (result.error === "Invalid login details") {
                alert('Invalid login details');

            } else {
                let result = JSON.parse(data);
                loginRedirect(result['name'], result['role']);
            }


        });
    });
    $('#logout').click(function () {
        //alert('hey');
        $.post("../../Backend/ClassLibrary/forward_to_Access_logout.php", function (data) {
            window.location.assign('../Access/index.php');
        });
    });

    function loginRedirect(first_name, role) {

        arr = first_name.split(' ');
        first_name = arr[0];
        console.log(first_name);
        switch (role) {
            case 'student':
                alert("Hi " + first_name);
                setTimeout(function () {
                    window.location.assign('../Dashboard/index.php');
                }, 3000);

                break;
            case 'staff':
                alert("Hi " + first_name);
                setTimeout(function () {
                    window.location.assign('../Dashboard/index.php');
                }, 3000);

                break;
            default:
                alert("Hi " + first_name);
                setTimeout(function () {
                    window.location.assign('../Dashboard/index.php');
                }, 3000);

        }

    }
});