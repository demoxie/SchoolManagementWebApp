<!DOCTYPE html>
<html lang="en">
<head>
    <title>Combined Subject</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../Pluggins/Bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../Pluggins/awesome/css/all.min.css">
    <link rel="icon" href="../../Backend/Src/Icons/rfc-logo.jpg">
    <script src="../Pluggins/Jquery/jquery-3.5.1.min.js"></script>
    <script src="../Scripts/fetch_subjects.js"></script>
    <script src="../Scripts/cs_subject.js"></script>
    <script src="../Scripts/cs_submit.js"></script>
    <script src="../Pluggins/awesome/js/all.min.js"></script>
    <script src="../Pluggins/Bootstrap/js/bootstrap.min.js"></script>
    <style>
        *{
            box-sizing: border-box;
        }
        body{
            font-family: "Century Gothic", CenturyGothic, AppleGothic, sans-serif;
            font-size: 0.9rem;
        }
        .school_name{
            margin-bottom: 2em;
            text-align: center;
            margin-top: 0;
        }
        form {
            margin: 2% auto;

        }

        table,th, td {
            text-align: center;
            vertical-align: middle;
        }
        thead tr th{
            height: 0.5em;
            width: 0.4em;
        }

        .btn:hover,
        .btn:focus,
        .btn:active,
        input:hover,
        input:focus,
        input:active,
        .selected_subject:hover,
        .selected_subject:focus,
        .selected_subject:active{
            outline: 0 !important;
            appearance: none !important;
            box-shadow: none !important;

        }
        input, .btn{
            background: darkgreen;
            color: white;
            border: none;
        }
        .form-control,.form-select{
            border: 1px solid darkgreen;
        }
        .btn:hover{
            background: limegreen;
            color: white;
        }
        .delete{
            background: firebrick;
        }
        .edit{
            background: darkorange;
        }
        .edit:hover{
            background: orange;
        }
        .delete:hover{
            background: red;
            color: white;
        }
        .box{
            height: auto;
            display: flex;
            flex-flow: row wrap;
            justify-content: space-evenly;
            align-items: center;

        }
        .left{
            border: 1px solid darkgreen;
            height: 15rem;
        }
        .right{

            display: flex;
            flex-flow: column nowrap;
            justify-content: space-evenly;

        }
        div .col-12{
            margin-block: 5px;
        }
        .selected_subject{
            margin-right: 5px;
            border: none;
            background: white;
        }
        .close_icon{
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
<form class="form-inline col-10" id="cs_entry_form" method="post" role="form">
    <h3 class="school_name">COMBINED SUBJECT ENTRY FORM</h3>

        <div class="col-12 box" id="box">

            <div class="left col-xl-5 col-lg-5 col-sm-5 col-xs-5">
            </div>

            <div class="right col-xl-5 col-lg-5 col-sm-5 col-xs-5">

                <div class="col-12">
                    <input type="text" class="form-control cs_code" id="cs_code" placeholder="CS  Code" name="cs_code" value="">
                </div>
                <div class="col-12">
                    <input type="text" class="form-control cs_name" id="cs_name" placeholder="CS Name" name="cs_name" value="">
                </div>
                <select class="form-select subject col-12" id="subject" name="subject">
                    <option selected disabled>SUBJECTS</option>

                </select>
                <div class="col-12">
                    <button type="button" class="btn col-12" id="add_subject">Add Subject</button>
                </div>

                <div class="col-12">

                    <button type="button" class="btn col-12" id="add_cs_subject">Add CS Subject</button>
                </div>
            </div>

        </div>

                <hr>
    <div class="table-responsive-sm">
        <table class="table table-hover table-bordered" id="cs_subjects_list">
            <thead class="thead-light">
            <tr style="background: darkgreen;color: white;">
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
