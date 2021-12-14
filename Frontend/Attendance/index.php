<!DOCTYPE html>
<html lang="en">
<head>
    <title>Weekly Attendance</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../Pluggins/Bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../Stylesheets/top-nav-bar.css">
    <link rel="icon" href="../../Backend/Src/Icons/rfc-logo.jpg">
    <script src="../Pluggins/Jquery/jquery-3.5.1.min.js"></script>
    <script src="../Scripts/access.js"></script>
    <script src="../Scripts/login.js"></script>
    <script src="../Scripts/fetch_class_again.js"></script>
    <script src="../Scripts/fetch_session.js"></script>
    <script src="../Scripts/weekly_attedndance.js"></script>
    <script src="../Scripts/submit_weekly_attendance.js"></script>
    <script src="../Pluggins/Bootstrap/js/bootstrap.min.js"></script>
    <style>

        * {
            box-sizing: border-box;

        }

        html, body {
            font-size: 13px;
            font-family: "Century Gothic", CenturyGothic, AppleGothic, sans-serif;
            font-weight: bolder;

        }

        form#weekly_attendance_form {
            display: flex;
            flex-flow: column;
            justify-content: center;
            align-items: center;
            margin: 5% auto;
            padding: 0;

        }

        .above_table_row {
            display: flex;
            flex-flow: row nowrap;
            justify-content: space-between;
            justify-items: center;
            align-items: center;
        }

        .middle_row {
            display: grid;
            grid-template-columns: auto auto auto;
            justify-content: space-evenly;
        }

        .page-item {
            border: 1px solid black;
        }

        .page-item .page-link {
            color: orangered;
        }

        .btn-container {
            display: flex;
            flex-flow: row;
            justify-content: flex-start;
            align-items: center;
            margin-left: 0;
            margin-block: 10px;
        }

        .btn-container .btn {
            margin-inline: 10px;
        }

        .save {
            width: 13em;
        }

        thead th {

            background-color: orangered;
            color: white;
        }

        th, td {
            text-align: center;
            vertical-align: middle;
        }

        table tr td:nth-child(3) {
            padding: 2px;
        }

        table tr td:nth-child(3) input {
            width: 100em;
            vertical-align: middle;
        }

        select.form-select:active,
        select.form-select:focus,
        select.form-select:hover,
        input.form-control:active,
        input.form-control:hover,
        input.form-control:focus,
        .btn:focus,
        .btn:hover,
        .btn:active {
            outline: 0 !important;
            -webkit-appearance: none !important;
            box-shadow: none !important;
        }

        #search {
            font-weight: bolder;
            width: 50em;
        }

        input.for-week {
            background-color: white;
            color: orangered;
            border-color: orangered;
        }

        .for-week::placeholder {
            color: black;
        }

        .btn, select.form-select {
            border-radius: 1.5rem;
            border: 2px solid black;
            padding: 10px 25px;
            font-weight: bolder;
        }

        .btn {
            background-color: orangered;
            color: white;
            font-size: 14px;
        }

        .btn:hover, a:hover {
            background: black;
            color: whitesmoke;
            border-color: orangered;
        }

        select.form-select {
            background-color: orangered;
            color: white;
        }

        select.form-select:hover {
            color: white;
        }

        #no_of_times_school_opened {
            background-color: orangered;
            color: white;
            font-weight: bolder;
            text-align: center;
            border: 2px solid black;
            border-radius: 1.5rem;
            padding: 20px 25px;
        }

        #no_of_times_school_opened::placeholder {
            color: white;
            font-size: 14px;
            font-weight: bolder;
        }

        th, td {
            text-align: center;
            vertical-align: middle;
        }

        .first_row {
            display: flex;
            flex-flow: row nowrap;
            justify-content: space-evenly;
            align-items: center;
        }

        .first_row select.form-select, .first_row input.form-control {
            width: 18em;
            margin-inline: 10px;
        }

        @media screen and (max-width: 480px) {
            .first_row {
                display: flex;
                flex-flow: column;
                align-items: center;
            }

            .first_row select.form-select, .first_row .btn {
                margin-block: 10px;
            }

            .middle_row {
                display: grid;
                grid-template-columns: auto;
                grid-row-gap: 10px;
                justify-content: center;
            }

            .above_table_row {
                display: grid;
                grid-template-columns: auto;
                grid-row-gap: 10px;
                justify-content: center;
            }

            .above_table_row #search {
                width: 250vw;
            }

            .btn-container {
                display: grid;
                grid-template-columns: auto;
                justify-content: center;
            }

            .btn-container:last-of-type .btn {
                margin-block: 10px;
            }

            .btn {
                width: 100%;
            }
        }

        @media screen and (max-width: 920px) and (min-width: 480px) {
            .first_row {
                display: grid;
                grid-template-columns: auto auto;
                grid-row-gap: 10px;
                justify-content: space-around;
                justify-items: center;
            }

            .middle_row {
                display: grid;
                grid-template-columns: auto auto auto;
                grid-row-gap: 10px;
                justify-content: center;
            }

            .above_table_row {
                display: flex;
                flex-flow: row nowrap;
                justify-content: space-between;
                justify-items: baseline;
                align-items: baseline;

            }

            .btn-container {
                display: flex;
                flex-flow: row nowrap;
                justify-content: center;
            }

            .btn {
                width: 100%;
            }
        }

    </style>
</head>
<body>
<!--Top Nav-bar-->
<div id="top-nav-bar">
    <div id="nav-item-container">
        <a class="btn nav-btn" href="../../index.php"><i class="fas fa-home"></i>&nbsp;&nbsp;&nbsp;&nbsp;Home</a>
        <a class="btn nav-btn" href="../Dashboard/index.php"><i class="fas fa-tachometer-alt"></i>&nbsp;&nbsp;&nbsp;&nbsp;Dashboard</a>
    </div>
    <div id="user">
        <a class="btn nav-btn" id="logout"><i class="fas fa-user-circle"></i>&nbsp;&nbsp;&nbsp;logout</a>
    </div>

</div>
<!--Ends here-->
<form class="form-inline col-10" method="post" role="form" id="weekly_attendance_form" autocomplete="off">
    <div class="first_row">
        <select name="class" class="form-select class" id="class" aria-label="Default select example">
            <option selected disabled>CLASS</option>

        </select>

        <select name="session" class="form-select session" id="session" aria-label="Default select example"
                style="margin-inline: 15px">
            <option selected disabled>SESSION</option>

        </select>
        <select name="term" class="form-select term" id="term" aria-label="Default select example">
            <option selected disabled>TERM</option>
            <option value="1">First Term</option>
            <option value="2">Second Term</option>
            <option value="3">Third Term</option>
        </select>
        <input name="no_of_times_school_opened" class="form-control no_of_times_school_opened"
               id="no_of_times_school_opened" placeholder="no of times school opened"
               aria-label="Default select example">

    </div>

    <hr>
    <div class="middle_row col-12">
        <div class="className col"><h6><strong>CLASS:</strong> Primary Four A</h6></div>
        <div class="formaster col"><h6><strong>FORM MASTER:</strong> Mr. Samson Madaki</h6></div>
        <div class="date col"><h6><strong>DATE:</strong> 16th April, 2021</h6></div>
    </div>
    <hr>
    <div class="btn-container col-12">
        <button type="button" class="btn  save">Save</button>&nbsp;
        <input class="form-control btn for-week" style="padding: 20px;" placeholder="for what week?">
    </div>

    <div class="above_table_row col-12">
        <input type="text" class="form-control col-3" id="search" name="search"
               placeholder="Search by names e.g Michael">


        <ul class="pagination pagination-md justify-content-end">
            <li class="page-item"><a class="page-link" href="#">Previous</a></li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">Next</a></li>
        </ul>
    </div>
    <div class="table-responsive col-12" style="overflow:auto">
        <table class="table table-hover table-bordered">
            <thead class="thead-danger" style="background: orangered">
            <tr>
                <th>#</th>
                <th>ADMISSION NO</th>
                <th>NAMES</th>
                <th>MON</th>
                <th>TUE</th>
                <th>WED</th>
                <th>THUR</th>
                <th>FRI</th>
                <th style="width: 2rem;">TOTAL</th>
            </tr>
            </thead>

            <tbody>


            </tbody>

        </table>

        <ul class="pagination pagination-md justify-content-end">
            <li class="page-item"><a class="page-link" href="#">Previous</a></li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">Next</a></li>
        </ul>
    </div>
    <hr>
    <div class="btn-container col-12">
        <button type="button" class="btn save">Save</button>

    </div>


</form>

</body>

</html>
