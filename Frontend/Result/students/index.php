<!DOCTYPE html>
<html lang="en">
<head>
    <title>Result Checker</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../../Pluggins/Bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../Stylesheets/top-nav-bar.css">
    <link rel="stylesheet" href="../../Stylesheets/summerized_result.css">
    <link rel="stylesheet" href="../../Stylesheets/result_print.css">
    <link rel="stylesheet" href="../../Pluggins/awesome/css/all.min.css">
    <link rel="icon" href="../../../Backend/Src/Icons/logo.png">
    <script src="../../Pluggins/Jquery/jquery-3.5.1.min.js"></script>
    <script src="../../Scripts/fetch_session_for_result_checker.js"></script>
    <script src="../../Scripts/student_result_checker.js"></script>
    <script src="../../Pluggins/awesome/js/all.min.js"></script>
    <script src="../../Pluggins/Bootstrap/js/bootstrap.min.js"></script>
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: "Century Gothic", CenturyGothic, AppleGothic, sans-serif;
            font-size: 1em;
        }

        #main {
            width: 100vw;
            height: 100vh;
            overflow: hidden;
            padding: 0;
            background-color: #fff;

        }

        #result_check_form {
            display: flex;
            flex-flow: column nowrap;
            justify-content: center;
            align-items: center;
            border: 2px solid orangered;
            border-radius: 1rem;
            padding: 0;
            margin: 12% auto;
        }

        #code_input {
            border: 2px solid black;
            border-radius: 1.5rem;
            color: red;
            font-weight: bold;
            font-size: 0.85rem;
            text-align: center;
        }

        #code_input::placeholder {
            color: red;
            font-size: 14px;
        }

        #process, .process {
            border: 2px double black;
            margin-bottom: 20px;
            color: whitesmoke;
            font-weight: bold;
            font-size: 0.85rem;
            background: orangered;
            border-radius: 1.5rem;
            padding-left: 30px;
            padding-right: 30px;
        }

        .btn_summary, .btn_full_detail {
            font-size: 14px;
            border: 2px double black;
            color: whitesmoke;
            background: orangered;
            border-radius: 1.5rem;
        }


        select.form-select:hover,
        select.form-select:active,
        select.form-select:focus,
        input:focus,
        input:hover,
        input:active,
        .btn:active,
        .btn:hover,
        .btn:focus,
        button:active,
        button:hover,
        button:focus,
        .close,
        #btn_close_down {
            outline: 0 !important;
            -webkit-appearance: none !important;
            box-shadow: none !important;
        }

        select.form-control {
            border-radius: 1.5rem;
            padding-inline: 1rem;
            border: 2px solid black;
            color: orangered;
            font-size: 0.85rem;
            font-weight: bolder;
        }

        .close {
            border: none;
            color: black;
            background: transparent;
            font-weight: bold;
            cursor: pointer;
        }

        #btn_close_down {
            border: none;
        }

        .form-group {
            margin-top: 30px;
            margin-left: auto;
            margin-right: auto;
            display: flex;
            flex-flow: column;
            justify-content: center;
            align-items: center;
        }

        body {
            font-family: "Century Gothic", CenturyGothic, AppleGothic, sans-serif;
            font-weight: 500;
            font-size: 1em;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .container{
            display: flex;
            flex-flow: column wrap;
            align-items: center;
            width: 99vw;
            height: auto;
            border: 1px solid black;
            margin-top: 5px;
            padding: 0;
        }

        
        .result_body{
            width: 100%;
             margin-top: 0;
        }
        .result_footer{
            width: 100%;
             margin-top: 0;
        }
        h2,h4,h5{
            text-align: center;
            font-size-adjust: initial;
        }
        #school_logo,#passport{
            position: absolute;
            margin: 10px;
        }
        .title,.content{
            display: inline-block;
            margin-right: 10px;
            margin-left: 10px;
            
            
        }
        #passport{
            right: 0.3%;
            margin: 10px;
            border: 1px solid black;
            padding: 2px;
            top: 1%;
        }
        #school_logo,#passport{
            position: absolute;
            margin: 10px;
        }
        
        #school_name{
            margin-top: 1%;
        }
        u{
            text-decoration-line: underline;
            text-decoration-style: dotted;
            padding-bottom: 5px;
            width: 100%;
        }
        b{
            margin-bottom: 5px;
        }
        tr td:nth-child(1){
            
            padding-left: 10px;
        }
        .result_header{
            width: 100%;
            margin-top: 1%;
            padding: 0;
        }
        .stud_details{
            display: flex;
            flex-flow: column nowrap;
            justify-content: center;
            align-items: center;
            padding: 0;
            margin: 3% auto;
            width: 98%;
        }
        .row{
            display: flex;
            flex-flow: row;
            justify-content: space-between;
            width: 100%;
            margin: 0 auto;
        }
        .side_bar_buttons{
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

        table {
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

        table:after {
            clear: both;
            content: '';
        }

        th, td {
            border: 1px solid black;

        }

        thead th {
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

        table tr:last-of-type:not(:first-of-type) {
            border-bottom: none;
        }

        @media print {
            * {
                box-sizing: border-box;
            }

            body {
                font-family: "Century Gothic", CenturyGothic, AppleGothic, sans-serif;
                font-size: 1em;
                display: flex;
                justify-content: center;
                align-items: center;
            }

            .container {
                display: flex;
                flex-flow: column nowrap;
                justify-content: center;
                align-items: center;
                width: 100%;
                height: 100%;
                border: 1px solid black;
                margin: 12% auto;
                padding: 0;
            }

            table {
                width: 100%;
                height: 100%;
                font-size: 0.85em;
                font-weight: bolder;
                border-collapse: collapse;
                table-layout: fixed;
                border-left: none;
                margin: auto;
            }

            table tr:last-of-type:not(:first-of-type) {
                border-bottom: none;
            }

            table:after {
                clear: both;
                content: '';
            }

            table, th, td {
                border: 1px solid black;

            }

            thead th {
                text-align: center;
            }

            td {
                vertical-align: middle;

            }

            tr {
                height: 30px;
            }

            .result_body {
                width: 100%;
                margin: 0 auto;
            }

            .result_footer {
                width: 100%;
                margin: 0 auto;
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
            h5{
                font-size: 0.7em;
            }

            #school_logo,#passport{
                position: absolute;
                margin: 10px;
            }

            .title, .content {
                display: inline-block;
                margin-right: 10px;
                margin-left: 10px;
            }

            #passport {
                right: 2.8%;
                margin: 5px;
                border: 1px solid black;
                padding: 3px;
                top: 8.4%;
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
            b{
                margin-bottom: 5px;
            }
            tr td:nth-child(1){
                padding-left: 5px;
                width: 23%;
            }
            .result_header{
                width: 100%;
                margin-top: 0.8%;
                padding: 0;
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

            p{
                font-size: 0.7em;
                margin-left: 0.5em;

            }

            tr {
                border-right: none;
                border-left: none;
            }
        }

        /*.page_head{
            width: 100%;
            height: 10vh;
            margin: 0 auto;
            padding: 0;
            display: flex;
            flex-flow: row;
            justify-content: space-evenly;
            align-items: center;
            background:orangered;
            border: 2px solid black;
            color: white;
        }*/


    </style>
</head>
<body>
<div class="container-fluid" id="main">
    <!--Top Nav-bar-->
    <div id="top-nav-bar">
        <div id="nav-item-container">
            <a class="btn nav-btn" href="../../../index.php"><i class="fas fa-home"></i>&nbsp;&nbsp;&nbsp;&nbsp;Home</a>
        </div>
        <div id="user">
            <a class="btn nav-btn"><i class="fas fa-user-circle" id="logout"></i>&nbsp;&nbsp;&nbsp;logout</a>
        </div>

    </div>
    <!--Ends here-->
    <form class="form-inline col-xs-11 col-sm-11 col-md-6 col-lg-5 col-xl-3" method="post" id="result_check_form"
          autocomplete="off">
        <div class="form-group col-10" id="result_type_container">
            <select class="form-control col-12" id="result_type">
                <option selected disabled>RESULT TYPE</option>
                <option value="1">Session Result Only</option>
                <option value="2">Term Result</option>
            </select>
        </div>
        <div class="form-group col-10 session_container" id="session_container" style="display: none">
        </div>
        <div class="form-group col-10 term_container" id="term_container" style="display: none">
        </div>
        <div class="form-group col-10" id="code_input_container">
            <input name="admission_no" class="form-control col-12" id="code_input" type="text"
                   placeholder="Enter Admission No...">
        </div>
        <div class="form-group col-10" id="check_btn_container"
             style="display: flex;justify-content: center;align-items: center">
            <button class="btn col-10 btn_check_result" type="button" id="process">Check Result</button>
        </div>

    </form>

</div>


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
</body>
</html>
