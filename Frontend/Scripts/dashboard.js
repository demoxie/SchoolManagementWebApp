$(document).ready(function(){
   $('#side_drawer').click(function(){
       $('#side_bar').toggle('slow',function(){
          $(this).css({'width':'50%'});
           $('#right_side').css({'width':'50%'});
       });
   }); 
    $('#profile_pic').click(function(){
        
          $('#profile').toggle('slow'); 
       
        
    });
});