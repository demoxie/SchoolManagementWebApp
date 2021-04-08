<!DOCTYPE html>
<html lang="en">
<head>
    <title>Exams Score Entry Sheet</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../Pluggins/Bootstrap/css/bootstrap.min.css">
    <link rel="icon" href="../../Backend/Src/Icons/logo.jpg">
    <link rel="stylesheet" href="../Stylesheets/exams_entry_form.css">
    <script src="../Pluggins/Jquery/jquery-3.5.1.min.js"></script>
    <script src="../Scripts/fetch_subjects.js"></script>
    <script src="../Scripts/fetch_class_again.js"></script>
    <script src="../Scripts/fetch_session.js"></script>
    <script src="../Scripts/exam_sheet_table.js"></script>
    <script src="../Scripts/submit_exam_sheet.js"></script>
    <script src="../Pluggins/Bootstrap/js/bootstrap.min.js"></script>
    <style>

        textarea:hover,
        input:hover,
        input:active,
        input:focus,
        select:focus,
        select:active,
        select:hover,
        .btn:focus,
        .btn:hover,
        .btn:active {
            -webkit-appearance: none;
            outline: 0;
            box-shadow: none;
        }

        .btn:disabled {
            background: darkgreen;
            opacity: 0.5;
        }

        .btn {
            color: whitesmoke;
        }

        .btn:hover {
            color: white;
            background: green;
        }

        select, .btn {
            border: none;
        }

        table thead th:nth-child(2) {
            width: 22vw;
        }

        table thead th:nth-child(1) {
            width: 70px;
        }

        table, input, .btn, select {
            font-family: "Century Gothic", CenturyGothic, AppleGothic, sans-serif;
            font-weight: 600;
        }

        option:hover {
            background: green;
        }
    </style>

</head>
<body>
<form class="form-inline col-10" id="exams_entry_form" method="post" enctype="multipart/form-data" role="form">
    <div class="container result" id="result" style="overflow: auto"></div>

    <div class="theading row col-12">
        <div class="title col-6">
            <h3 id="school_name">AG MODERN NUR/PRI/SEC SCHOOL</h3>
        </div>

    </div>

    <div class="row choice g-3">
        <select name="class" class="form-select selectpicker myclass col" id="class"
                aria-label="Default select example">
            <option selected disabled>CLASS</option>
        </select>
        <select name="subject" class="form-select subject col" id="subject" aria-label="Default select example">
            <option selected disabled>SUBJECT</option>

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

    <hr>


    <div class="theading row col-12">
        <div class="className col"><h6><strong id="one">CLASS:</strong> <u><b id="display_class"></b></u></h6></div>
        <div class="formaster col"><h6><strong id="two">FORM MASTER:</strong> <u><b id="form"
                                                                                    class="form_master"></b></u></h6>
        </div>
        <div class="date col"><h6><strong>DATE: </strong></h6></div>
    </div>
    <hr>

    <div class="row">
        <button type="button" class="btn  upper-calculate col-2">Calculate</button>
        <button type="button" class="btn upper-save col-2">Save</button>
    </div>
    <hr>
    <div class="theading row col-12">
        <div class="search col-3"><label for="search"></label>
            <input type="text" class="form-control" id="search" name="search" placeholder="Search Names">
            <br>
        </div>

        <div class="pagination-container col">
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
        <table class="table table-hover table-bordered" id="ca_table">
            <thead>
            <tr style="background-color: forestgreen;color: whitesmoke;">
                <th class="thed">#</th>
                <th class="th_names">NAMES</th>
                <th class="th_ca1">CA TOTAL</th>
                <th class="th_ca2">EXAMS</th>
                <th class="th_ca3">FINAL TOTAL</th>
                <th class="th_total">POSITION</th>
            </tr>
            </thead>

            <tbody>

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
    <hr>
    <button type="button" class="btn calculate col-2">Calculate</button>
    <button type="button" class="btn save col-2">Save</button>


</form>
<script>
    $(document).ready(function () {
        let d = new Date();
        // alert(d);
        $("div.date h6 strong").append(d.toDateString());
    });

    $(".class").change(function () {
        const selectedOption = $(this).find(":selected").text();
        $("#class").html(selectedOption);

    });
    $("#search").on("keyup", function () {
        const value = $(this).val().toLowerCase();
        $("tbody tr td input").filter(function () {
            $(this).toggle($(this).val().toLowerCase().indexOf(value) > -1)
        });
    });


</script>
</body>

<!-- Mirrored from www.w3schools.com/bootstrap4/tryit.asp?filename=trybs_form_inline&stacked=h by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 24 Sep 2020 08:11:15 GMT -->
</html>
