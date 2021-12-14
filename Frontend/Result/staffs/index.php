<!DOCTYPE html>
<html lang="en">

<head>
    <title>Student Result Look Up</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="../../../Backend/Src/Icons/logo.jpg">
    <link rel="stylesheet" href="../../Stylesheets/top-nav-bar.css">
    <link rel="stylesheet" href="../../Pluggins/Bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../Pluggins/awesome/css/all.min.css">
    <script src="../../Pluggins/Jquery/jquery-3.5.1.min.js"></script>
    <script src="../../Scripts/fetch_class.js"></script>
    <script src="../../Scripts/fetch_session_again.js"></script>
    <script src="../../Scripts/result-viewer.js"></script>
    <script src="../../Pluggins/Bootstrap/js/bootstrap.min.js"></script>
    <script src="../../Pluggins/awesome/js/all.min.js"></script>

    <style>
        * {
            box-sizing: border-box;
        }

        html,
        body {
            font-family: "Century Gothic", CenturyGothic, AppleGothic, sans-serif;
            font-size: 13px;
            background-color: whitesmoke;
        }

        body {
            padding: 0;
        }

        #view-result-form {
            display: grid;
            grid-template-columns: auto;
            grid-row-gap: 20px;
            justify-items: center;
            margin: 10% auto;
        }

        .view-result {
            color: green;
            font-weight: bold;
            font-size: 16px;

        }

        .view-result:hover {
            color: limegreen;
        }

        .send-result {
            color: firebrick;
            font-weight: bold;
            font-size: 16px;
        }

        .send-result:hover {
            color: red;
        }

        .first_row {
            display: grid;
            grid-template-columns: 30% 30% 30%;
            grid-column-gap: 10px;
            justify-content: center;

        }

        .above_table_row {
            display: flex;
            flex-flow: row nowrap;
            justify-content: space-between;
        }

        .bottom_row {
            display: grid;
            grid-template-columns: auto auto;
            justify-content: flex-start;
            padding: 0;
        }

        .student-list-table-container {
            border: 2px solid #0d152a;
        }

        .custom-select-lg:active,
        .custom-select-lg:focus,
        .btn:active,
        .btn:focus,
        .btn:hover,
        .close:active,
        .close:focus,
        .close:hover,
        #search:active,
        #search:focus {
            outline: none !important;
            appearance: none !important;
            -webkit-appearance: none !important;
            box-shadow: none !important;
        }

        #search:active,
        #search:focus {
            border-color: orangered;
        }

        #print-selected {
            background-color: #0d152a;
            color: whitesmoke;
            border: 3px solid orangered;
            font-weight: bold;
            padding: 7px 50px;
            border-radius: 1.5rem;
        }

        #print-selected:hover {
            background-color: orangered;
            color: white;
            border-color: #0d152a;
        }

        .above_table_row #search {
            padding: 17px;
        }

        .custom-select-lg, .form-control {
            background-color: #0d152a;
            color: whitesmoke;
            border: 3px solid orangered;
            font-weight: bold;
            border-radius: 1.5rem;
        }

        .page-item .page-link {
            border-radius: 1.5rem;
            color: orangered;
            border: 2px solid #0d152a;
        }

        #select-all {
            object-fit: contain;
            margin: auto;
        }

        .bottom_row {
            margin-top: 10px;
        }

        @media screen and (max-width: 600px) {
            #view-result-form {
                display: grid;
                grid-template-columns: auto;
                grid-row-gap: 0;
            }

            .first_row {
                display: grid;
                grid-template-columns: 100%;
                grid-row-gap: 15px;
            }

            .above_table_row {
                display: grid;
                grid-template-columns: 100%;
                grid-row-gap: 15px;
            }

        }

        @media screen and (min-width: 602px) and (max-width: 992px) {
            #view-result-form {
                display: grid;
                grid-template-columns: auto;
                grid-row-gap: 0;
            }

            .first_row {
                display: grid;
                grid-template-columns: 50% 50%;
                grid-row-gap: 15px;
            }

            .custom-select-lg:last-of-type {
                grid-column: 1 / span 2;
            }

            .above_table_row {
                display: grid;
                grid-template-columns: 100%;
                grid-row-gap: 15px;
            }

            .search {
                grid-column: 1 / span 1;
            }

        }

        hr {
            color: red;
        }

        /* -------------------------------------------------------------*/
        .container {
            display: flex;
            flex-flow: column wrap;
            align-items: center;
            width: 99vw;
            height: auto;
            border: 1px solid black;
            margin-top: 5px;
            padding: 0;
        }


        .result_body {
            width: 100%;
            margin-top: 0;
        }

        .result_footer {
            width: 100%;
            margin-top: 0;
        }

        h2, h4, h5 {
            text-align: center;
            font-size-adjust: initial;
        }

        #school_logo, #passport {
            position: absolute;
            margin: 10px;
        }

        .title, .content {
            display: inline-block;
            margin-right: 10px;
            margin-left: 10px;


        }

        #passport {
            right: 0.2%;
            border: 1px solid black;
            padding: 2px;
            top: 1%;
        }

        #school_logo, #passport {
            position: absolute;
            margin: 10px;
        }

        #school_name {
            margin-top: 1%;
        }

        u {
            text-decoration-line: underline;
            text-decoration-style: dotted;
            padding-bottom: 5px;
            width: 100%;
        }

        b {
            margin-bottom: 5px;
        }

        .table1 tr td:nth-child(1) {

            padding-left: 10px;
        }

        .result_header {
            width: 100%;
            margin-top: 1%;
            padding: 0;
        }

        .stud_details {
            display: flex;
            flex-flow: column nowrap;
            justify-content: center;
            align-items: center;
            padding: 0;
            margin: 3% auto;
            width: 98%;
        }

        .row {
            display: flex;
            flex-flow: row;
            justify-content: space-between;
            width: 100%;
            margin: 0 auto;
        }

        .side_bar_buttons {
            display: flex;
            flex-flow: row wrap;
            width: 25%;
            margin-left: 0;
            margin-right: 0;
        }

        p {
            font-size: 0.8em;
            margin-left: 0.6em;

        }

        .table1 {
            width: 110vw;
            height: auto;
            margin: auto;
            font-size: 75%;
            overflow: hidden;
            border-collapse: collapse;
            table-layout: fixed;
            border-left: none;
            border-right: none;
            border-bottom: none;
        }

        .table1:after {
            clear: both;
            content: '';
        }

        .table1 th, td {
            border: 1px solid black;

        }

        .table1 thead th {
            text-align: center;
        }

        #summerized_table tr td {
            vertical-align: middle;
            text-align: center;
            width: 5rem;
            height: auto;
        }

        #summerized_table {
            display: block;
            margin: auto;
        }

        #summerized_table tr {
            border-right: none;
            border-left: none;
        }

        .table1 tr:last-of-type:not(:first-of-type) {
            border-bottom: none;
        }

        @media print {
            * {
                box-sizing: border-box;
                -moz-box-sizing: border-box;
                background: transparent !important;
                color: black !important;
                text-shadow: none !important;
                filter: none !important;
                -ms-filter: none !important;
            }

            body {
                font-family: "Century Gothic", CenturyGothic, AppleGothic, sans-serif;
                font-size: 1em;
                display: flex;
                justify-content: center;
                align-items: center;
            }

            a, p a:visited {
                color: #444 !important;
                text-decoration: underline;
            }

            a[href]:after {
                content: " (" attr(href) ")";
            }

            abbr[title]:after {
                content: " (" attr(title) ")";
            }

            @page {
                size: A4;
                margin: 1cm;
            }

            .container {
                display: grid;
                grid-template-columns: 100%;
                grid-row-gap: 5px;
                justify-content: center;
                align-items: center;
                width: 1cm;
                min-height: 35cm;
                height: auto;
                border-left: 2px solid black;
                margin-block: 5%;
                margin-left: 15px;
                padding: 0;
                page-break-after: always;

            }

            .table1 {
                width: 100%;
                height: auto;
                min-height: 27cm;
                font-size: 0.87em;
                border-collapse: collapse;
                table-layout: fixed;
                border-left: none;
                margin-left: 0;
                margin-right: 0;
                margin-bottom: 0;
                page-break-after: auto
            }

            .table1:after {
                clear: both;
                content: '';
            }

            .table1 th {
                border: 2px solid black;
                background-color: whitesmoke;
            }

            .table1 td {
                border: 1px solid black;
            }

            .table1 thead th {
                text-align: center;
            }

            .table1 tr td {
                vertical-align: middle;
                page-break-inside: avoid;
                page-break-after: auto

            }

            .table1 thead {
                display: table-header-group
            }

            .table1 tfoot {
                display: table-footer-group
            }

            .table1 tr {
                height: 30px;
                page-break-inside: avoid;
                page-break-after: auto
            }

            .result_body {
                margin: 0 auto;
            }

            .result_footer {

            }

            h2, h4, h5 {
                text-align: center;
                font-size-adjust: initial;

            }

            h2 {
                font-size: 1.3em;
            }

            h4 {
                font-size: 1em;
            }

            h5 {
                font-size: 0.7em;
            }

            #school_logo, #passport {
                position: absolute;
                margin: 10px;
            }

            .title, .content {
                display: inline-block;
                margin-right: 10px;
                margin-left: 10px;
            }

            #passport {
                right: 0.3%;
                border: 1px solid black;
                padding: 3px;
                top: 3.5%;
            }

            #school_logo, #passport {
                position: absolute;
                margin: 7px;
                border-radius: 2px;
            }

            u {
                text-decoration-line: underline;
                text-decoration-style: dotted;
                padding-bottom: 5px;
                width: 100%;
            }

            b {
                margin-bottom: 5px;
            }

            .table1 tr td:nth-child(1) {
                padding-left: 5px;
                width: 23%;
            }

            .result_header {
                margin-top: 0.8%;
                padding: 0;
                margin-right: auto;
                margin-left: auto;
            }

            .stud_details {
                display: flex;
                flex-flow: column nowrap;
                justify-content: center;
                align-items: center;
                padding: 0;
                margin: 6% auto 0;
                width: 98%;
                font-size: 1.2em;
                text-transform: uppercase;

            }

            .row {
                display: flex;
                flex-flow: row nowrap;
                justify-content: space-between;
                width: 100%;
                margin: 0 auto;
            }

            .side_bar_buttons {
                display: flex;
                flex-flow: row nowrap;
                line-height: 0.55em;
                width: 25%;
                margin-left: 0;
                margin-right: 0;
                padding: 0;
                vertical-align: middle;
            }

            p {
                font-size: 0.7em;
                margin-left: 0.5em;

            }

            tr {
                border-right: none;
                border-left: none;
            }
        }

        .page_head {
            width: 100%;
            height: 10vh;
            margin: 0 auto;
            padding: 0;
            display: flex;
            flex-flow: row;
            justify-content: space-evenly;
            align-items: center;
            background: orangered;
            border: 2px solid black;
            color: white;
        }

    </style>

</head>

<body>
<!--Top Nav-bar-->
<div id="top-nav-bar">
    <div id="nav-item-container">
        <a class="btn nav-btn"><i class="fas fa-home"></i>&nbsp;&nbsp;&nbsp;&nbsp;Home</a>
        <a class="btn nav-btn"><i class="fas fa-tachometer-alt"></i>&nbsp;&nbsp;&nbsp;&nbsp;Dashboard</a>
    </div>
    <div id="user">
        <a class="btn nav-btn"><i class="fas fa-user-circle"></i>&nbsp;&nbsp;&nbsp;logout</a>
    </div>

</div>
<!--Ends here-->
<form class="form-inline col-11" id="view-result-form" method="post" enctype="multipart/form-data"
      role="form">

    <div class="first_row col-12">
        <select name="class" class="custom-select-lg myclass col" id="class" aria-label="Default select example">
            <option selected disabled>CLASS</option>

        </select>
        <select name="session" class="custom-select-lg session col" id="session" aria-label="Default select example">
            <option selected disabled>SESSION</option>

        </select>
        <select name="term" class="custom-select-lg term col" id="term" aria-label="Default select example">
            <option selected disabled>TERM</option>
            <option value="1">First Term</option>
            <option value="2">Second Term</option>
            <option value="3">Third Term</option>
        </select>

    </div>
    <hr>
    <div class="above_table_row col-12">

        <div class="search">
            <input type="text" class="form-control" id="search" name="search" placeholder="Search Names">
        </div>
        <div>
            <button type="button" class="btn col" id="print-selected">Print Selected</button>
        </div>

        <ul class="pagination pagination-md justify-content-end">
            <li class="page-item"><a class="page-link" href="#">Previous</a></li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">Next</a></li>
        </ul>

    </div>
    <div class="table-responsive student-list-table-container" style="overflow:auto;padding:0;">
        <table class="table table-hover table-bordered" id="student-list-table">
            <thead>
            <tr style="background-color: orangered;color: whitesmoke;text-align: center;vertical-align: middle;">
                <th style="padding: 2px;text-align: center;vertical-align: middle;border-bottom: 2px solid #0d152a;width: 60px">
                    <input type="checkbox" class="form-check-input col" id="select-all"></th>
                <th style="padding: 2px;text-align: center;vertical-align: middle;border-bottom: 2px solid #0d152a;width: 60px">
                    #
                </th>
                <th style="border-bottom: 2px solid #0d152a">NAMES</th>
                <th style="border-bottom: 2px solid #0d152a">CLASS</th>
                <th style="border-bottom: 2px solid #0d152a">STATUS</th>
                <th colspan="2" style="border-bottom: 2px solid #0d152a">ACTION</th>
            </thead>

            <tbody>


            </tbody>
            <tfoot>

            </tfoot>
        </table>

    </div>
    <div class="bottom_row">
        <ul class="pagination pagination-md justify-content-end">
            <li class="page-item"><a class="page-link" href="#">Previous</a></li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">Next</a></li>
        </ul>

    </div>
</form>


<!-- The Modal -->
<div class="modal" id="result">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header" style="height: 0;display: flex;justify-content: flex-end;border-bottom: none">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body" style="padding: 0;border-bottom: none;overflow: auto">

            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" id="print" class="btn btn-danger" data-dismiss="modal">print</button>
                <button type="button" id="btn_close_down" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        let d = new Date();
        // alert(d);
        $("b#time").append(d.toDateString());


        $("#search").on("keyup", () => {

            const value = $(this).val().toLowerCase();
            $("tbody tr").filter(function () {
                $(this).toggle($(this).children('td').find('input').val().toLowerCase().indexOf(value) > -1)
            });
        });

    });
</script>
</body>

</html>