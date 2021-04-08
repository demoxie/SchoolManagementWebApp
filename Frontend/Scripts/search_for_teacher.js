$(document).ready(function () {
    $(".items").click(function () {
        let choice = $(this).text();
        $("#subject_teacher").val(choice);
    });
    $("#add_subject").click(function () {
        //  alert($("#subject_teacher").val());
    });

    $("#subject_teacher").keyup(function () {
        let keyword = $(this).val();
        let vsa = '[{name:"Musa Jibrin",class:"Jss1"},{name:"Auwal Garba",class:"Jss1"},{name:"Stanley Agbo",class:"Jss1"}';
        //alert("hel");
        $.get("../../Backend/ClassLibrary/fetch_teachers.php", {search_keyword: keyword}).done(function (data) {
            let teachers = JSON.parse(data);
            alert("no");
            for (let item in teachers) {
                // alert(teachers[item]);
                // $("#result").append(`<a href="${teachers[item].staffID}">${teachers[item].staffName}</a>`);
            }
        });

    });

});