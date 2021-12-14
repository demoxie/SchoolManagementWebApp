<!DOCTYPE html>
<html lang="en">

<head>
    <title>Continous Assessment Score Sheet</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../Stylesheets/top-nav-bar.css">
    <link rel="stylesheet" href="../Pluggins/Bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../Pluggins/awesome/css/all.min.css">
    <link rel="icon" href="../../Backend/Src/Icons/logo.jpg">
    <script src="../Pluggins/Jquery/jquery-3.5.1.min.js"></script>
    <script src="../Scripts/access.js"></script>
    <script src="../Scripts/fetch_subjects.js"></script>
    <script src="../Scripts/fetch_session.js"></script>
    <script src="../Scripts/termly_assessment_form.js"></script>
    <script src="../Scripts/assessment_form_entry.js"></script>
    <script src="../Scripts/login.js"></script>
    <script src="../Pluggins/Bootstrap/js/bootstrap.min.js"></script>
    <script src="../Pluggins/awesome/js/all.min.js"></script>
    <!--<script src="/Backend/ClassLibrary/fetch_class.php"></script>-->
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            padding: 0;
            display: flex;
            flex-flow: column;
            justify-content: center;
            align-items: stretch;
        }

        html,
        body {
            font-family: "Century Gothic", CenturyGothic, AppleGothic, sans-serif;
            font-size: calc(13px - 1%);
        }

        .table thead th, .table {
            border: 2px solid #0d152a;
        }

        .form-inline {
            display: flex;
            flex-flow: column;
            justify-content: center;
            align-items: stretch;
            margin: 4rem auto;
        }

        input.form-control {
            background-color: oldlace;
        }


        .above_table_row {
            display: grid;
            grid-template-columns: auto auto auto;
            justify-content: space-between;
            justify-items: center;
            align-content: center;
            grid-row-gap: 1rem;

        }

        select.form-select,
        button.btn {
            background-color: orangered;
            border: 3px solid #0d152a;
            border-radius: 1.5rem;
            color: white;

        }


        select.form-select {
            width: 20rem;
            padding-block: 0.4rem;
            padding-inline: 1rem;
        }

        .upper-save, .upper-calculate, .save, .calculate {
            width: 10rem;
        }

        li a.page-link {
            color: orangered;
        }

        select.form-select {
            color: white;
            border-radius: 1.5rem;
        }

        select.form-select:hover,
        button.btn:hover {
            color: orangered;
            background: #ccc;
            border-color: orangered;

        }


        select:focus,
        select:active,
        input:active,
        input:hover,
        input:focus,
        .btn:active,
        .btn:focus,
        .btn:hover {
            -webkit-appearance: none !important;
            outline: 0 !important;
            box-shadow: none !important;
        }

        table thead th:nth-child(2) {
            font-size: 0.9rem;
            font-weight: bolder;
        }


        table, th, td {
            text-align: center;
            vertical-align: middle;
        }


        .first_row {
            display: grid;
            grid-template-columns: 23% 23% 23% 23%;
            justify-content: center;
            justify-items: center;
            grid-column-gap: 1em;
            margin: 2rem auto;
        }

        .middle-row {
            display: grid;
            grid-template-columns: 33% 33% 33%;
            justify-content: center;
            justify-items: center;
            align-items: center;
            grid-column-gap: 1rem;
            padding: 2rem;
        }

        .container {
            display: flex;
            flex-flow: row nowrap;
            justify-content: space-between;
            align-items: center;
        }


        @media only screen and (max-width: 600px) {
            .first_row {
                min-width: 100%;
                display: grid;
                grid-template-columns: 100vw;
                grid-row-gap: 10px;
                justify-content: center;
                align-items: center;
                margin: 0;
                padding: 0;

            }

            .middle-row {
                display: grid;
                grid-template-columns: auto;
                justify-content: center;
                align-items: baseline;
            }

            .above_table_row {
                display: flex;
                flex-flow: column;
                justify-content: center;
                align-items: center;
            }

            .bottom_row {
                display: flex;
                flex-flow: column;
                justify-content: center;
                align-items: center;
            }

            .btn-container {
                display: flex;
                flex-flow: row nowrap;
                justify-content: center;
                align-items: baseline;
            }


        }


    </style>

</head>

<body>
<!--Top Nav-bar-->
<div id="top-nav-bar">
    <div id="nav-item-container">
        <a class="btn nav-btn"><i class="fas fa-home"></i>&nbsp;&nbsp;&nbsp;&nbsp;Home</a>
        <a class="btn nav-btn" href="../Dashboard/index.php"><i class="fas fa-tachometer-alt"></i>&nbsp;&nbsp;&nbsp;&nbsp;Dashboard</a>
    </div>
    <div id="user">
        <a class="btn nav-btn"><i class="fas fa-user-circle" id="logout"></i>&nbsp;&nbsp;&nbsp;logout</a>
    </div>

</div>
<!--Ends here-->
<form class="form-inline col-11" id="term_assessment_entry_form" method="post" enctype="multipart/form-data"
      role="form">
    <div class="container result" id="result"></div>

    <div class="first_row col-12">
        <select name="class" class="form-select myclass col" id="myclass" aria-label="Default select example">
            <option selected disabled>CLASS</option>

        </select>
        <select name="subject" class="form-select subject col" aria-label="Default select example">
            <option selected disabled>SUBJECT</option>

        </select>
        <select name="session" class="form-select session col" aria-label="Default select example">
            <option selected disabled>SESSION</option>

        </select>
        <select name="term" class="form-select term col" aria-label="Default select example">
            <option selected disabled>TERM</option>
            <option value="1">First Term</option>
            <option value="2">Second Term</option>
            <option value="3">Third Term</option>
        </select>

    </div>

    <hr>


    <div class="middle-row col-12">
        <div class="className">
            <h6><strong id="one">CLASS:</strong> <u><b id="display_class"></b></u></h6>
        </div>
        <div class="formaster">
            <h6><strong id="two">FORM MASTER:</strong> <u><b id="form"></b></u></h6>
        </div>
        <div class="date">
            <h6><strong id="three">DATE: </strong><u><b id="time"></b></u></h6>
        </div>
    </div>
    <hr>
    <hr>
    <div class="above_table_row col-12">
        <div class="btn-container">
            <button type="button" class="btn upper-calculate">Calculate</button>
            <button type="button" class="btn upper-save">Save</button>
        </div>


        <div class="search">
            <input type="text" class="form-control" id="search" name="search" placeholder="Search Names">
            <br>
        </div>

        <ul class="pagination pagination-md justify-content-end">
            <li class="page-item"><a class="page-link" href="#">Previous</a></li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">Next</a></li>
        </ul>

    </div>
    <div class="table-responsive" style="overflow:auto">
        <table class="table table-hover table-bordered" id="ca_table">
            <thead>
            <tr style="background-color: orangered;color: whitesmoke;">
                <th class="thed">#</th>
                <th class="th_names">NAMES</th>
                <th class="th_ca1">1st CA</th>
                <th class="th_ca2">2nd CA</th>
                <th class="th_ca3">3rd CA</th>
                <th class="th_exams">EXAMS</th>
                <th class="th_total">TOTAL</th>
                <th class="th_position">POSITION</th>
                <th class="th_grade">GRADE</th>
            </tr>
            </thead>

            <tbody>

            </tbody>
            <tfoot>

            </tfoot>
        </table>

    </div>
    <div class="container bottom_row">
        <ul class="pagination pagination-md justify-content-end">
            <li class="page-item"><a class="page-link" href="#">Previous</a></li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">Next</a></li>
        </ul>
        <div class="btn-container">

            <button type="button" class="btn  calculate">Calculate</button>
            <button type="button" class="btn save">Save</button>
        </div>


    </div>
</form>
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