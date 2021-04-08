const login = require("../../Backend/Src/nalika-master/nalika-master/nalika/js/c3-charts/d3.min");
$(document).ready(function () {
    $(".harmburgar").click(function () {
        $(".nav").slideToggle(2000);

    });

    $(".login").click(function () {
        $("body").load(login.html);

        //$(".sectioncontainer").toggle(2000);
    });


    $('.option-btn').prop('indeterminate', true);
    const element = document.getElementsByClassName(".option-btn");

    if (element.state === true) {
        document.getElementsByClassName(".option-btn");
    } else if () {

    } else if () {

    } else if () {

    } else {

    }
});