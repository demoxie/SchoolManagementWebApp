<!DOCTYPE html>
<html lang="en">
<head>
    <title>Subject Entry Form</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="../../Backend/Src/Icons/logo.jpg">
    <link rel="stylesheet" href="../Pluggins/Bootstrap/css/bootstrap.min.css">
    <script src="../Pluggins/Jquery/jquery-3.5.1.min.js"></script>
    <script src="../Scripts/add_subject.js"></script>
    <script src="../Scripts/fetch_class_again.js"></script>
    <script src="../Scripts/fetch_departments.js"></script>
    <script src="../Pluggins/Bootstrap/js/bootstrap.min.js"></script>
    <style>
        * {
            box-sizing: border-box;
        }

        form {
            margin: 5% auto;

        }

        table, thead, tfoot, th, tr, td {
            text-align: center;
        }

        h2 {
            text-align: center;
        }

        .date {
            float: right;
            text-align: right;
            margin-right: 0;
        }

        .className {
            float: left;
            text-align: left;
            margin-left: 0;
        }

        h4 {
            text-align: center;
        }

        img {
            width: 150px;
            height: 150px;
            object-fit: contain;
            margin-left: 0;
            margin-top: 0;
        }

        #result {
            border-radius: 3px;
        }

        .side_bar_buttons {
            border: 1px solid #ccc;
            width: 100%;
            display: block;
            text-align: center;
            font-weight: 400;
            font-size: 14px
        }

        .side_bar_buttons:hover {
            outline: #000000 solid medium;
            opacity: 0.5;
            transition: 0.4s ease;
            cursor: pointer;
        }

        h1 {
            text-align: center;
        }

        .title-box {
            display: block;
            margin: 0 auto;
        }
        .form-control:hover,
        .form-control:active,
        .form-control:focus,
        .btn:hover,
        .btn:active,
        .btn:focus{
            outline: none !important;
            appearance: none !important;
            box-shadow: none !important;
            
        }
        .btn{
            background: darkgreen;
            color: white;
        }
        .btn:hover{
            color:white;
            background: limegreen;
        }
    </style>
</head>
<body>
<form class="form-inline col-10" method="POST" id="subject_entry_form" role="form" enctype="multipart/form-data">


    <div class="theading col-12">
        <div class="col-8 title-box">
            <h1>AG MODERN NUR/PRI/SEC SCHOOL</h1>
        </div>

    </div>

    <br><br>
    <div class="row">
        <div class="col">
            <input type="text" class="form-control" id="subject_code" placeholder="Subject code"
                   name="subject_code">
        </div>
        <div class="col">
            <input type="text" class="form-control" id="subject_name" placeholder="Subject name"
                   name="subject_name">
        </div>
        <div class="col">
            <input type="number" class="form-control" id="subject_unit" placeholder="Subject Unit"
                   name="subject_unit" min="0" max="10">
        </div>
        <div class="col">
            <button type="button" class="btn" name="add_subject" id="add_subject">Add Subject
            </button>
        </div>
    </div>
    <hr>
    <div class="theading row col-12">
        <div class="className col-3">
            <input type="text" class="form-control" id="search" name="search_keyword"
                   placeholder="Search by Names">
        </div>

        <div class="date col">
            <ul class="pagination pagination-md justify-content-end">
                <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">Next</a></li>
            </ul>
        </div>
    </div>
    <div class="table-responsive-sm">
        <table class="table table-hover table-bordered">
            <thead class="thead-light">
            <tr>
                <th>S/N</th>
                <th>Subject Code</th>
                <th>Subject</th>
                <th>Unit</th>
                <th>Class</th>
                <th>Department</th>
                <th>Subject Teacher</th>
                <th>Date Added</th>
                <th></th>
                <th></th>
            </tr>
            </thead>

            <tbody>
            <tr>
                <td>1</td>
                <td>MTH111</td>
                <td>Mathematics</td>
                <td>
                    1
                </td>
                <td>
                    Primary 1
                </td>
                <td>
                    Science
                </td>
                <td>
                    Mathias Buba
                </td>
                <td>
                    11/01/2020 12:06:01
                </td>
                <td>
                    <a  class="btn save col">Edit</a>


                </td>
                <td>
                    <a class="btn save col">Delete</a>
                </td>
            </tr>
            <tr>
                <td>2</td>
                <td>MTH111</td>
                <td>Mathematics</td>
                <td>
                    1
                </td>
                <td>
                    Primary 1
                </td>
                <td>
                    Science
                </td>
                <td>
                    Emmanuel Joshua
                </td>
                <td>
                    11/01/2020 12:06:01
                </td>
                <td>
                    <a  class="btn save col">Edit</a>


                </td>
                <td>
                    <a  class="btn save col">Delete</a>
                </td>
            </tr>

            </tbody>
            <tfoot class="">

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
    <hr>

</form>

</body>

</html>
