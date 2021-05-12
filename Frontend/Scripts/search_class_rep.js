$(document).ready(function () {
    $("#class_rep").keyup(function (event) {
        let keyword = $(this).val();
        $.post("../../Backend/ClassLibrary/search_fetch_student.php", {keyword: keyword}, (res)=> {
            //console.log(res);
            if(res !== ''){
                let resData = JSON.parse(res);
            //$('div.search_result_container').insertAfter('#form_master_div');
            $('.class_rep_search_result').empty();
            for(let i in resData){
                $(`<div class="col-12 search_result_item" data-student-id="${resData[i]['studentID']}">${resData[i]['name']}</div>`).appendTo('.class_rep_search_result');
                $('.search_result_item').css({'border':'1px solid black','padding':'5px 15px','background-color':'#ccc','color':'black'});
                $('.search_result_item').hover(function(){
                    $(this).css({'background-color':'limegreen','cursor':'pointer','color':'white'})
                });
                $('.search_result_item').click(function(){
                    //alert($(this).data('student-id'));
                    $('#student-id').val($(this).data('student-id'));
                    $('#class_rep').val($(this).text());
                    $('.class_rep_search_result').empty();
                });
            }
            }else{
                 $('.class_rep_search_result').empty();
            }
            
            
        });
    });
});