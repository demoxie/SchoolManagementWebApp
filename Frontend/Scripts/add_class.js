 $(document).ready(function () {
    'use strict';

        $("#add_class").click(function () {
            
            if($.trim($('#class_name').val())===''){
                alert('Please fill the required fields');
               
               }else{
                    
                    $(this).trigger('submit');
                   $('#add_class_form').submit(function(e){
                       e.preventDefault();
                      $.ajax({
                        url: "../../Backend/ClassLibrary/forward_to_add_class.php",
                        type: "POST",
                        data: new FormData(this),
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: function (data) {
                            //var server_response = JSON.parse(data);
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