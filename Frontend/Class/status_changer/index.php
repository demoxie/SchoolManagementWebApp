<!DOCTYPE html>
<html lang="en">
<head>
    <title>Status Change Form</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="../../../Backend/Src/Icons/logo.jpg">
    <link rel="stylesheet" href="../../Stylesheets/ca_entry_form.css">
    <link rel="stylesheet" href="../../Pluggins/Bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../Pluggins/awesome/css/all.min.css">
    <script src="../../Pluggins/Jquery/jquery-3.5.1.min.js"></script>
    <script src="../../Pluggins/awesome/js/all.min.js"></script>
    <script src="../../Scripts/fetch_students_from_status.js"></script>
    <script src="../../Scripts/fetch_class_status.js"></script>
    <script src="../../Scripts/fetch_session_status.js"></script>
    <script src="../../Pluggins/Bootstrap/js/bootstrap.min.js"></script>
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: "Century Gothic", CenturyGothic, AppleGothic, sans-serif;
        }

        html {

            font-weight: bold;
            font-size: calc(14px - 1%);

        }

        .row {
            display: flex;
            justify-content: flex-start;
            align-items: baseline;
            margin-top: 2em;

        }

        li a.page-link {
            color: forestgreen;
        }

        input {
            font-size: 10px;
            font-family: "Times New Roman", serif;
        }

        select {
            border: none;
            color: white;
        }

        select:focus,
        select:active,
        input:active,
        input:hover,
        input:focus,
        .btn:active,
        .btn:focus,
        .btn:hover,
        button:active,
        button:focus,
        button:hover{
            -webkit-appearance: none !important;
            outline: 0 !important;
            box-shadow: none !important;
        }

        .btn {
            color: whitesmoke;
        }
        button:active,
        button:focus,
        button:hover{
            border-color: darkgreen;
            color: white;
        }
        table thead th{
            text-align: center;
            vertical-align: middle;
        }

        table thead th:nth-child(1) {
            width: 3vw;
        }

        table thead th:nth-child(2) {
            width: 3vw;
        }

        table thead th:nth-child(3) {
            width: 19vw;
            font-size: 13px;
        }

        table tr td input {
            padding: 0;
        }

        table tr td {
            padding: 0;
        }

        .choice {
            display: grid;
            grid-template-columns: auto auto auto;
            justify-content: stretch;
            margin: auto;
            grid-gap: 1em;
        }

        #change_status_btn_container {
            display: grid;
            grid-template-columns: auto auto auto auto auto;
            grid-gap: 1em;
            justify-content: stretch;
            margin: 2em auto;
        }

        @media screen and (max-width: 560px) {
            .choice {
                grid-template-columns: auto;
            }

            #change_status_btn_container {
                grid-template-columns: auto;
            }
        }

        @media screen and (min-width: 561px) and  (max-width: 720px) {
            .choice {
                grid-template-columns: auto auto;
            }

            #change_status_btn_container {
                grid-template-columns: auto auto;
            }

            .term {
                grid-column: 1 / span 2;
            }
        }

        tbody tr td:nth-child(6) {
            color: black;
            font-family: cursive;
        }
        .promote,button#promote_selected {
            background-color: darkgreen;
        }

        #promote_selected:hover,.promote:hover {
            background-color: limegreen;
            color: white;
        }
        button#demote_selected,.demote {
            background-color: orangered;
        }

        #demote_selected:hover,.demote:hover {
            background-color: orange;
            color:white;
        }

        button#withdraw_selected,.withdraw {
            background-color: yellow;
            color: black;
        }

        #withdraw_selected:hover,.withdraw:hover {
            background-color: orange;
            color: white;
        }

        button#expell_selected,.expell {
            background-color: red;
        }

        #expell_selected:hover,.expell:hover {
            background-color: firebrick;
            color: white;
        }

        button#delete_selected,.delete {
            background-color: darkred;
        }

        #delete_selected:hover,.delete:hover {
            background-color: red;
            color: white;
        }

       
        button.status_changers {
            color: white;
            font-weight: bold;
            cursor: pointer;
        }
        #select_all{
            border: 1px solid white;
            background-color: white;
            color: darkgreen;
        }
        #select_all,.select{
            padding: 0.35rem;
        }

    </style>

</head>
<body>
<form class="form-inline col-10" id="status_change_form" method="post" enctype="multipart/form-data"
      role="form">
    <div class="container result" id="result"></div>
    <div class="choice g-3">
        <select name="class" class="form-select myclass col" id="class" aria-label="Default select example">
            <option selected disabled>CLASS</option>

        </select>
        <select name="session" class="form-select session col" id="session" aria-label="Default select example">
            <option selected disabled>SESSION</option>

        </select>
        <select name="term" class="form-select term col" id="term" aria-label="Default select example">
            <option selected disabled>TERM</option>
            <option value="1">First Term</option>
            <option value="2">Second Term</option>
            <option value="3">Third Term</option>
        </select>
    </div>
    <div id="change_status_btn_container">
        <div>
            <button type="button" class="form-control status_changers" id="promote_selected"><i
                        class="fas fa-arrow-up"></i>&nbsp;&nbsp;Promote Selected
            </button>
        </div>
        <div>
            <button type="button" class="form-control status_changers" id="demote_selected"><i
                        class="fas fa-arrow-down"></i>&nbsp;&nbsp;Demote Selected
            </button>
        </div>
        <div>
            <button type="button" class="form-control status_changers" id="withdraw_selected"><i
                        class="fas fa-arrow-circle-right"></i>&nbsp;&nbsp;Withdraw Selected
            </button>
        </div>
        <div>
            <button type="button" class="form-control status_changers" id="expell_selected"><i
                        class="fas fa-walking"></i>&nbsp;&nbsp;Expell Selected
            </button>
        </div>
        <div>
            <button type="button" class="form-control status_changers" id="delete_selected"><i
                        class="fas fa-trash-alt"></i>&nbsp;&nbsp;Delete Selected
            </button>
        </div>
    </div>


    <div class="row col-12">
        <div class="col-4">
            <input type="text" class="form-control" id="search" name="search" placeholder="Search Names">
        </div>
        <div class="col">
            <ul class="pagination pagination-md justify-content-end">
                <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">Next</a></li>
            </ul>
        </div>
    </div>
    <div class="table-responsive-lg">
        <table class="table table-hover table-bordered" id="ca_table" style="overflow-x: auto">
            <thead>
            <tr style="background-color: forestgreen;color: whitesmoke;">
                <th><input type="checkbox" class="form-check-input" id="select_all"></th>
                <th class="thed">#</th>
                <th class="th_names">NAMES</th>
                <th>CURRENT CLASS</th>
                <th>PREVIOUS CLASS</th>
                <th>STATUS</th>
                <th>PROMOTE</th>
                <th>DEMOTE</th>
                <th>WITHDRAW</th>
                <th>EXPELL</th>
                <th>DELETE</th>
            </tr>
            </thead>

            <tbody>
            <!--<tr>
                <td><input type="checkbox" class="form-check-input"></td>
                <td>1</td>
                <td>Favour Wilson</td>
                <td>JSS 2A</td>
                <td>JSS 1A</td>
                <td style="background-color: green">Promoted</td>
                <td><a class="btn promote"><i class="fas fa-arrow-up"></i></a></td>
                <td><a class="btn demote"><i class="fas fa-arrow-down"></i></a></td>
                <td><a class="btn withdraw"><i class="fas fa-remove-format"></i></a></td>
                <td><a class="btn expell"><i class="fas fa-running"></i></a></td>
                <td><a class="btn delete"><i class="fas fa-trash-alt"></i></a></td>
            </tr>-->

            </tbody>
            <tfoot>

            </tfoot>
        </table>
        <ul class="pagination pagination-md justify-content-end">
            <li class="page-item"><a class="page-link" href="#">Previous</a></li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">Next</a></li>
        </ul>
    </div>
</form>
</body>
</html>
