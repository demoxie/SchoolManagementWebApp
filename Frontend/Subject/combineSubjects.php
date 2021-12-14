<!DOCTYPE html>
<html lang="en">
<head>
    <title>Combined Subject</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../Pluggins/Bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../Stylesheets/top-nav-bar.css">
    <link rel="stylesheet" href="../Pluggins/awesome/css/all.min.css">
    <link rel="icon" href="../../Backend/Src/Icons/rfc-logo.jpg">
    <script src="../Pluggins/Jquery/jquery-3.5.1.min.js"></script>
    <script src="../Scripts/fetch_subjects.js"></script>
    <script src="../Scripts/cs_subject.js"></script>
    <script src="../Scripts/cs_submit.js"></script>
    <script src="../Pluggins/awesome/js/all.min.js"></script>
    <script src="../Pluggins/Bootstrap/js/bootstrap.min.js"></script>
    <style>
        * {
            box-sizing: border-box;
        }
        body{
            font-family: "Century Gothic", CenturyGothic, AppleGothic, sans-serif;
            font-size: 0.9rem;
        }

        form {
            margin: 2% auto;

        }

        table, th, td {
            text-align: center;
            vertical-align: middle;
        }

        tr td {
            text-align: center;
            vertical-align: middle;
        }


        .btn:hover,
        .btn:focus,
        .btn:active,
        input.form-control:hover,
        input.form-control:focus,
        input.form-control:active,
        .selected_subject:hover,
        .selected_subject:focus,
        .selected_subject:active,
        .form-select:hover,
        .form-select:focus,
        .form-select:active {
            outline: 0 !important;
            appearance: none !important;
            box-shadow: none !important;

        }

        button.btn {
            background: #ccc;
            color: firebrick;
            border: 2px solid orangered;
            border-radius: 1.5rem;
        }

        .form-control, .form-select {
            border: 2px solid orangered;
        }

        button.btn:hover {
            background: orangered;
            color: white;
            border-color: gray;
        }

        .delete {
            background: firebrick;
            color: white;
        }

        .edit {
            background: darkorange;
            color: white;
        }

        .edit:hover {
            background: orange;
            color: white;
        }

        .delete:hover {
            background: red;
            color: white;
        }

        .box {
            height: auto;
            display: flex;
            flex-flow: row wrap;
            justify-content: space-evenly;
            align-items: center;

        }

        .left {
            border: 1px solid orangered;
            height: 15rem;
        }

        .right {
            display: flex;
            flex-flow: column nowrap;
            justify-content: center;
            align-items: center;

        }

        div.col-12 {
            width: 100%;
            margin-block: 5px;
            padding: 0;
        }

        div.col-12 input.form-control, div.col-12 select.form-select {
            width: 100%;
            height: 2rem;
            border-radius: 1.5rem;

        }

        select.form-select {
            padding-block: 0.3rem;
        }

        .selected_subject {
            margin-right: 5px;
            border: none;
            background: white;
        }

        .close_icon {
            text-align: right;
            cursor: pointer;
            color: firebrick;
        }
        .close_icon:hover{
            color: red;
        }
        .cont{
            display: flex;
            flex-flow: row nowrap;
            justify-content: space-evenly;
            align-items: center;
            border: 1px solid #ccc;
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
<form class="form-inline col-10" id="cs_entry_form" method="post" role="form">

    <div class="col-12 box" id="box">

        <div class="left col-xl-5 col-lg-5 col-sm-5 col-xs-5">
        </div>

        <div class="right col-xl-4 col-lg-4 col-sm-5 col-xs-5">

            <div class="col-12">
                <input type="text" class="form-control col-12 cs_code" id="cs_code" placeholder="CS  Code"
                       name="cs_code" value="">
            </div>
            <div class="col-12">
                <input type="text" class="form-control col-12 cs_name" id="cs_name" placeholder="CS Name" name="cs_name"
                       value="">
            </div>
            <select class="form-select subject col-12" id="subject" name="subject">
                <option selected disabled>SUBJECTS</option>

            </select>
            <div class="col-12">
                <button type="button" class="btn col-12`" id="add_subject">Add Subject</button>
            </div>

            <div class="col-12">

                <button type="button" class="btn col-12" id="add_cs_subject">Add CS Subject</button>
            </div>
        </div>

    </div>

    <hr>
    <div class="table-responsive-sm col-12">
        <table class="table table-hover table-bordered" id="cs_subjects_list" style="overflow: auto">
            <thead class="thead-light">
            <tr style="background: orangered;color: white;">
                <th>#</th>
                <th>CS CODE</th>
                <th>CS NAME</th>
                <th>SUBJECTS</th>
                <th>DATE ADDED</th>
                <th></th>
                <th></th>
            </tr>
            </thead>

            <tbody>

            </tbody>
            <tfoot class="">

            </tfoot>
        </table>

    </div>
    <hr>
</form>

</body>

</html>
