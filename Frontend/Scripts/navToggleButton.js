  $(document).ready(function() {
    'use strict';
            $("#subject_btn").click(function() {
                $("main").empty();
                $("main").load("_php/Add_Question_Page.php");
            });
            $(".closebtn").click(function() {
                $(".sidebar").css("width", "0");
                $("main").css("margin-left", "0");
                $("#topbar").css("margin-left", "0");
                $("#topbar").css("width", "100vw");
                $("main").css("width", "100vw");
            });


            $(".openbtn").click(function() {
                $(".sidebar").css("width", "16%");
                $(".topbar").css("width", "84%");
                $("main").css("width", "84%");
                $("main").css("margin-left", "16%");
                $("#topbar").css("margin-left", "16%");
            });

            $(".login-button").click(function() {
                $(".dropdown-content").toggle();
            });

            $("main,section").click(function() {
                $(".dropdown-content").hide();
            });



        });