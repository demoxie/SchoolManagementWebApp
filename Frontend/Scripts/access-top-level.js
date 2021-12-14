$(document).ready(function () {
    $.post('../../../Backend/ClassLibrary/forward_to_access_if_active.php', function (data) {
        if (data === 'login') {
            //alert('login first');
            window.location.assign('../../Access/index.php');
        }

    });
});