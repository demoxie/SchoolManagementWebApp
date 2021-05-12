$(document).ready(function () {
    $.get('../../Backend/ClassLibrary/fetch_staffs.php',(data)=>{
        let staffData = JSON.parse(data);
        for(let i in staffData){
            $('#head_teacher').append(`<option value="${staffData[i]['staffID']}">${staffData[i]['staffName']}</option>`);
        }

    });
});