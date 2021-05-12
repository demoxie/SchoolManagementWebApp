$(document).ready(function () {
    'use strict';
    $('button').onclick(function(){
        
    
    var repassword=$('#repassword').val();
         var password=$('#password').val();
        if(password != repassword){
           alert('password must match');
           }else{
    $("form").on("submit", function (e) {
        e.preventDefault();

        $.ajax({
            url: "../../Backend/ClassLibrary/forwardToAccess.php",
            type: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function (data) {
                alert(data);
            },
            error: function (data) {
                alert(data);
            }
        });
    });
    }
    });
});