$(document).ready(function () {
    $("#form_master").keyup(function (event) {
        let keyword = $(this).val();
        $.post("../../Backend/ClassLibrary/search_fetch_staff.php", {keyword: keyword}, (res)=> {
            //console.log(res);
            if(res !== ''){
                let resData = JSON.parse(res);
            //$('div.search_result_container').insertAfter('#form_master_div');
            $('.search_result_container').empty();
            for(let i in resData){
                $(`<div class="col-12 search_result_item" data-staff-id="${resData[i]['staffID']}">${resData[i]['staffName']}</div>`).appendTo('.search_result_container');
                $('.search_result_item').css({'border':'1px solid black','padding':'5px 15px','background-color':'#ccc','color':'black'});

                $('.search_result_item').click(function(){
                    $('#staff-id').val($(this).data('staff-id'));
                    $('#form_master').val($(this).text());
                    $('.search_result_container').empty();
                });
            }
                $('.search_result_item').css({
                    'cursor': 'pointer',
                    'padding': '10px 15px',
                    'color': 'black',
                    'font-weight': 'bold',
                    'background-color': '#ccc',
                    'border-bottom': '1px solid gray'
                });
                // alert(resData[i]['staffName']);
                $('.search_result_item').mouseover(function () {
                    $(this).css({
                        'background-color': 'limegreen',
                        'cursor': 'pointer',
                        'color': 'white',
                        'font-weight': 'bold'
                    })
                });
            }else{
                 $('.search_result_container').empty();
            }
            
            
        });
    });
});