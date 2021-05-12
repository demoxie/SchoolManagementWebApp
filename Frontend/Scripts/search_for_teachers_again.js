$(document).ready(() => {
    return $("#form_master").keyup(function () {
        $('.search_result_item');
        let keyword = $(this).val(), search_result_container = $('.search_result_container');

        //search_result_container.empty();
        $.post("../../../Backend/ClassLibrary/search_fetch_staff.php", {keyword: keyword}, function (res) {
            //console.log(res);
            if (res !== '') {
                let resData = JSON.parse(res);
                //$('div.search_result_container').insertAfter('#form_master_div');
                search_result_container.empty().show();
                search_result_container.css({
                    'display': 'flex',
                    'flex-flow': 'column wrap',
                    'position': 'absolute',
                    'z-index': '9999',
                    'margin-bottom': '0',
                    'overflow-x': 'hidden',
                    'overflow-y': 'auto',
                    'height': 'auto',
                    'width': 'auto',
                    'min-width':'40%'
                });
                for (let i in resData) {
                    $(`<div class="col-12 search_result_item" data-staff-id="${resData[i]['staffID']}">${resData[i]['staffName']}</div>`).appendTo('.search_result_container');
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
                    $('.search_result_item').mouseout(function () {
                        return $(this).css({'background-color': 'lightgrey', 'color': 'black'});

                    });
                    search_result_container.mouseleave(function () {
                        $(this).empty().hide();
                    });

                    $('.search_result_item').click(function () {
                        $('#staff-id').val($(this).data('staff-id'));
                        $('#form_master').val($(this).text());
                        search_result_container.empty().hide();
                    });
                }
            } else {
                search_result_container.empty().hide();
            }
        });
    });
});