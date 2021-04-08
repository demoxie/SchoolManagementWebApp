<!DOCTYPE html>
<html lang="en">
<head>
    <title>Continous Assessment Score Sheet</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../Pluggins/Bootstrap/css/bootstrap.min.css">
    <link rel="icon" href="../../Backend/Src/Icons/logo.jpg">
    <link rel="stylesheet" href="../Stylesheets/ca_entry_form.css">
    <script src="../Pluggins/Jquery/jquery-3.5.1.min.js"></script>
    <script src="../Scripts/fetch_class_again.js"></script>
    <script src="../Scripts/fetch_session.js"></script>
    <script src="../Scripts/fetch_subjects.js"></script>
    <script src="../Scripts/fetch_form_masters.js"></script>
    <script src="../Scripts/ca_entry.js"></script>
    <script src="../Scripts/caSheet_table.js"></script>
    <script src="../Pluggins/Bootstrap/js/bootstrap.min.js"></script>
    <style>
        * {
            box-sizing: border-box;
        }

        input {
            padding: 0;
            text-indent: 0;
        }

        html {
            font-size: 14px;
        }

        .upper-save, .upper-calculate {
            margin-left: 10px;
        }

        textarea:hover,
        input:hover,
        textarea:active,
        select:focus,
        input:active,
        textarea:focus,
        input:focus,
        .close,
        .try_again,
        .back,
        .btn:active,
        .btn:focus,
        {
            outline: 0 !important;
            -webkit-appearance: none;
            box-shadow: none !important;
        }

        .calculate {
            margin-right: 5px;
        }

        .pagination-container {
            margin-right: 0;
            float: right;
        }

        .theading {
            display: flex;
            justify-content: space-between;
            align-content: center;
        }

        .btn {
            background-color: darkgreen;
        }

        li a.page-link {
            color: forestgreen;
        }
    </style>

</head>
<body>
<form class="form-inline col-10" id="ca_entry_form" method="post" enctype="multipart/form-data" role="form">
    <div class="container result" id="result" style="overflow: auto"></div>

    <div class="theading row col-12">
        <div class="title col-6">
            <h2>AG MODERN NUR/PRI/SEC SCHOOL</h2>
        </div>

    </div>

    <div class="row choice g-3">
        <select name="class" class="form-select myclass col" id="class" aria-label="Default select example">
            <option selected disabled>CLASS</option>

        </select>
        <select name="subject" class="form-select subject col" id="subject" aria-label="Default select example">
            <option selected disabled>SUBJECT</option>

        </select>
        <select name="session" id="session" class="form-select session col" aria-label="Default select example">
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


    <div class="theading row col-12">
        <div class="className col"><h6><strong id="one">CLASS:</strong> <u><b id="display_class"></b></u></h6></div>
        <div class="formaster col"><h6><strong id="two">FORM MASTER:</strong> <u><b id="form"
                                                                                    class="form_master"></b></u></h6>
        </div>
        <div class="date col"><h6><strong id="three">DATE: </strong></h6></div>
    </div>
    <hr>

    <div class="row">
        <button type="button" class="btn btn-primary  upper-calculate col-2">Calculate</button>
        <button type="button" class="btn btn-primary upper-save col-2">Save</button>
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
                <th class="thed" style="width:15px">S/N</th>
                <th class="th_names">NAMES</th>
                <th class="th_ca1">1st CA</th>
                <th class="th_ca2">2nd CA</th>
                <th class="th_ca3">3rd CA</th>
                <th class="th_total">Total</th>
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
    <button type="button" class="btn btn-primary calculate col-2">Calculate</button>
    <button type="button" class="btn btn-primary save col-2">Save</button>


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
            $(this).toggle($(this).val().toLowerCase().indexOf(value) > -1);
        });
    });


</script>
</body>

</html>
