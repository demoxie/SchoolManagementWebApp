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
    <script src="../Scripts/fetch_subjects.js"></script>
    <script src="../Scripts/fetch_session.js"></script>
    <script src="../Scripts/termly_assessment_form.js"></script>
    <script src="../Scripts/assessment_form_entry.js"></script>
    <script src="../Pluggins/Bootstrap/js/bootstrap.min.js"></script>
    <!--<script src="/Backend/ClassLibrary/fetch_class.php"></script>-->
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: "Century Gothic", CenturyGothic, AppleGothic, sans-serif;

            font-weight: bold;
        }
        html{
            font-size: calc(13px - 1%);
        }
        
        .upper-save, .upper-calculate {
            margin-left: 10px;
        }

        .calculate {
            margin-right: 5px;
        }

        .pagination-container {
            margin-right: -30px;
            float: right;
            padding-right: 0;
        }

        .theading {
            display: flex;
            justify-content: space-between;
            justify-items: baseline;
            align-content: stretch;
        }

        .btn {
            background-color: darkgreen;
        }

        li a.page-link {
            color: forestgreen;
        }

        input {
            font-size: 10px;
            font-family: "Times New Roman", serif;
        }

        select, .btn {
            border: none;
            color: white;
        }

        select, .btn:hover {
            color: white;
            background: limegreen;

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
        table thead th:nth-child(1){
            width: 4vw;
        }
        
        table thead th:nth-child(2){
            width: 19vw;
            font-size: 13px;
        }
        table tr td input{
            padding: 0;
        }
        table tr td{
            padding: 0;
        }
        .choice{
            display: grid;
            grid-template-columns: auto auto auto auto;
            justify-content: stretch;
            justify-items: baseline;
            margin: auto;
            grid-gap: 1em;
        }
        @media screen and (max-width: 560px){
            .choice{
                grid-template-columns: auto;
            }
        }
        @media screen and (min-width: 561px) and  (max-width: 720px){
            .choice{
                grid-template-columns: auto auto;
            }
        }

    </style>

</head>
<body>
<form class="form-inline col-10" id="term_assessment_entry_form" method="post" enctype="multipart/form-data" role="form">
    <div class="container result" id="result"></div>

    <div class="theading col-12">
        <div class="title col-6">
            <h2>AG MODERN NUR/PRI/SEC SCHOOL</h2>
        </div>

    </div>

    <div class="choice g-3">
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


    <div class="theading row col-12">
        <div class="className col"><h6><strong id="one">CLASS:</strong> <u><b id="display_class"></b></u></h6></div>
        <div class="formaster col"><h6><strong id="two">FORM MASTER:</strong> <u><b id="form"></b></u></h6></div>
        <div class="date col"><h6><strong id="three">DATE: </strong></h6></div>
    </div>
    <hr>

    <div class="row">
        <button type="button" class="btn   upper-calculate col-2">Calculate</button>
        <button type="button" class="btn upper-save col-2">Save</button>
    </div>
    <hr>
    <div class="theading row col-12">
        <div class="search col-3">
            <input type="text" class="form-control" id="search" name="search" placeholder="Search Names">
            <br>
        </div>
    </div>
        <ul class="pagination pagination-md justify-content-end">
            <li class="page-item"><a class="page-link" href="#">Previous</a></li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">Next</a></li>
        </ul>
    <div class="table-responsive-lg">
        <table class="table table-hover table-bordered" id="ca_table">
            <thead>
            <tr style="background-color: forestgreen;color: whitesmoke;">
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
        <ul class="pagination pagination-md justify-content-end">
            <li class="page-item"><a class="page-link" href="#">Previous</a></li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">Next</a></li>
        </ul>
    </div>
    <hr>
    <button type="button" class="btn  calculate col-2">Calculate</button>
    <button type="button" class="btn save col-2">Save</button>


</form>
<script>
    $(document).ready(function () {
        let d = new Date();
        // alert(d);
        $("div.date h6 strong").append(d.toDateString());


        $("#search").on("keyup",()=>{

            const value = $(this).val().toLowerCase();
            $("tbody tr").filter(function () {
                $(this).toggle($(this).children('td').find('input').val().toLowerCase().indexOf(value) > -1)
            });
        });

    });


</script>
</body>

<!-- Mirrored from www.w3schools.com/bootstrap4/tryit.asp?filename=trybs_form_inline&stacked=h by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 24 Sep 2020 08:11:15 GMT -->
</html>
