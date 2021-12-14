$(document).ready(function(){
    //alert('ok');
    let dropdowns = $('.profile,.dropdown-control');
    $('.menu-title').hide();
    $('.menu').hide();
    $('#accordion').hide();
    $('.open').click(function () {
        $('.side-bar').show();
        $('#close').show();
    });
    $('#close').click(function () {
        $('.side-bar').hide();
    });
    $('#dashboard-home').click(function () {
        $('.menu-title').hide();
        $('.menu').hide();
        $('#accordion').hide();
        $('.tiles-container').show();

    });
    $('#manage-school-record-trigger').click(function () {
        $('.menu-title').hide();
        $('.menu').hide();
        $('.tiles-container').hide();
        $('#accordion').hide();
        $('#for-school-management').show();
        $('#manage-school').show();

    });
    $('#manage-role-trigger').click(function () {
        $('.menu-title').hide();
        $('.menu').hide();
        $('.tiles-container').hide();
        $('#accordion').hide();
        $('#for-user-management').show();
        $('#manage-users').show();

    });
    //manage-school-record-trigger
    $('#manage-result-trigger').click(function () {
        $('.menu-title').hide();
        $('.menu').hide();
        $('.tiles-container').hide();
        $('#accordion').hide();
        $('#for-result-management').show();
        $('#manage-result').show();

    });
    $('#manage-class-trigger').click(function () {
        $('.menu-title').hide();
        $('.menu').hide();
        $('.tiles-container').hide();
        $('#accordion').hide();
        $('#for-class-management').show();
        $('#manage-classes').show();

    });

    $('#manage-subject-trigger').click(function () {
        $('.menu-title').hide();
        $('.menu').hide();
        $('.tiles-container').hide();
        $('#accordion').hide();
        $('#for-subject-management').show();
        $('#manage-subject').show();

    });

    $('#manage-student-record').click(function () {
        $('.menu-title').hide();
        $('.menu').hide();
        $('.tiles-container').hide();
        $('#accordion').hide();
        $('#for-student-management').show();
        $('#manage-student').show();

    });

    $('#manage-assessment-result-trigger').click(function () {
        $('.menu-title').hide();
        $('.menu').hide();
        $('.tiles-container').hide();
        $('#accordion').hide();
        $('#for-assessment').show();
        $('#assessment').show();

    });
    $('#manage-attendance').click(function () {
        $('.menu-title').hide();
        $('.menu').hide();
        $('.tiles-container').hide();
        $('#accordion').hide();
        $('#for-attendance').show();
        $('#attendance').show();

    });
    dropdowns.mouseover(function () {
        /*alert('touched');*/
        $('.dropdown-control').show();

    });
    dropdowns.mouseout(function () {
        /*alert('touched');*/
        $('.dropdown-control').hide();

    });
    $('div#assessment').click(function () {
        /*alert('touched');*/
        $('.tiles-container').hide();
        $('#accordion').hide();

    });


});