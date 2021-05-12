<!DOCTYPE html>
<html lang="en">
<head>
    <title>Form Master Registration Form</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../../Pluggins/Bootstrap/css/bootstrap.min.css">
    <link rel="icon" href="../../../Backend/Src/Icons/rfc-logo.jpg">
    <link rel="stylesheet" href="../../Pluggins/awesome/css/all.min.css">
    <script src="../../Pluggins/Jquery/jquery-3.5.1.min.js"></script>
    <script src="../../Pluggins/awesome/js/all.min.js"></script>
    <script src="../../Scripts/add_form_master.js"></script>
    <script src="../../Scripts/fetch_class.js"></script>
    <script src="../../Scripts/search_for_teachers_again.js"></script>
    <script src="../../Pluggins/Bootstrap/js/bootstrap.min.js"></script>
    <style>
        * {
            box-sizing: border-box;

        }

        form {
            margin: 5% auto;

        }

        body {
            font-size: calc(0.5% - 30%);
            font-family: "Century Gothic", CenturyGothic, AppleGothic, sans-serif;
            font-weight: bold;
        }

        table,
        th,
        tr,
        td {
            text-align: center;
            vertical-align: middle;
            font-size: 0.8rem;
        }

        .className {
            float: left;
            text-align: left;
            margin-left: 0;
        }

        .formaster {
            float: none;
            text-align: center;
            margin: auto;
        }

        /* #form_master_div{
             overflow-x: hidden;
             padding: 1px;
         }*/

        .form-control:hover,
        .form-control:active,
        .form-control:focus,
        .form-select:hover,
        .form-select:active,
        .form-select:focus,
        .btn:hover,
        .btn:active,
        .btn:focus {
            outline: none !important;
            appearance: none !important;
            box-shadow: none !important;

        }

        .btn {
            background: darkgreen;
            color: white;
        }

        .btn:hover {
            color: white;
            background: limegreen;
        }

        .delete {
            background-color: firebrick;
        }

        .delete:hover {
            background-color: red;
            cursor: pointer;
        }

        .edit {
            background-color: darkorange;
        }

        .edit:hover {
            background-color: orange;
            cursor: pointer;
        }

        .edit-icon {
            color: white;
        }

        .delete-icon {
            color: white;
        }

        #input_container {
            display: grid;
            grid-template-columns: auto auto;
            grid-gap: 1rem 0.1rem;
            justify-content: stretch;
            padding: 10px;
        }

        #input_container::after {
            clear-after: both;
            clear: both;
            content: '';
        }

        /*.btn_add_container {
            grid-column: 1 / span 2;
        }*/

        .search_result_item {
            padding: 10px 15px;
            color: black;
            font-weight: bold;
            background-color: #ccc;
            border-bottom: 1px solid gray;
            border-top: 1px solid gray;
        }

        .search_result_container {
            display: none;
        }

        @media screen and (max-width: 720px) {
            #input_container {
                display: grid;
                grid-template-columns: auto auto;
                grid-gap: 1rem 0.1rem;
            }

            .btn_add_container,#signature_input_container {
                grid-column: 1/ span 2;
            }
        }

        @media screen and (max-width: 576px) {
            #input_container {
                display: grid;
                grid-template-columns: auto;
                grid-row-gap: 1rem;
            }

            .btn_add_container,#signature_input_container {
                grid-column: 1/ span 1;
            }
        }
    </style>
</head>

<body>
<form id="add_formmaster_form" class="form-inline col-8" method="post" role="form" enctype="multipart/form-data">

    <div class="row" id="input_container">

        <div class="col">
            <select class="form-select col-12 myclass" id="class" name="class" required>
                <option selected disabled>CLASS</option>

            </select>

        </div>
        <div class="col" id="form_master_div">
            <input type="hidden" id="staff-id" name="staff-id">
            <input type="text" class="form-control col-12" data-form-master-id="" id="form_master"
                   placeholder="form master name" value="" name="form_master" required>
            <div class="search_result_container col-12"></div>
        </div>
        <div class="col" id="signature_input_container">
            <input class="form-control" type="file" id="signature" name="signature">
        </div>

        <div class="btn_add_container">
            <button type="button" class="btn col-12" id="add_formaster">Add Form Master</button>
        </div>
    </div>
    <hr>

    <div class="theading row col-12">
        <div class="className col-3">
            <input type="text" class="form-control" id="search" name="search"
                   placeholder="Search by department or hod">
        </div>
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

    <div class="table-responsive-sm">
        <table class="table table-hover table-bordered">
            <thead class="thead-light">
            <tr>
                <th style="width: 5%">#</th>
                <th style="width: 50%">FORM MASTER NAME</th>
                <th style="width: 25%">CLASS</th>
                <th style="width: 10%"></th>
                <th style="width: 10%"></th>
            </tr>
            </thead>
            <tbody>
            </tbody>
            <tfoot></tfoot>
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
</form>
</body>
</html>