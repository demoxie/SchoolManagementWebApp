<!DOCTYPE html>
<html lang="en">
<head>
    <title>Daily Attendance</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../Pluggins/Bootstrap/css/bootstrap.min.css">
    <script src="../Pluggins/Jquery/jquery-3.5.1.min.js"></script>
    <script src="../Scripts/fetch_class_again.js"></script>
    <script src="../Scripts/fetch_session.js"></script>
    <script src="../Scripts/daily_attendance.js"></script>
    <script src="../Scripts/submit_daily_attendance.js"></script>
    <script src="../Pluggins/Bootstrap/js/bootstrap.min.js"></script>
    <style>
        html{
            font-size: 0.8rem;

        }
        * {
            box-sizing: border-box;
            font-family: "Playfair Display", Georgia, "Times New Roman", serif;
        }

        form {
            margin: 5% auto;

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

        .formaster {
            float: none;
            text-align: center;
            margin: auto;
        }

        h4 {
            text-align: center;
        }

        .week {
            float: right;
            text-align: right;
            border-radius: 5px;
            border: 1px solid darkred;
            padding: 2px 15px;
            background-color: red;
            color: whitesmoke;
            margin-top: auto;
            margin-bottom: auto;
        }

        img {
            width: 150px;
            height: 150px;
            object-fit: contain;
            margin-left: 0;
            margin-top: 0;
        }

        input {
            text-align: center;
            background-color: white;
            color: black;
            font-weight: 300;
            padding: 0;
            object-fit: contain;
        }
        tr, td, {
            font-size: 12px;
            text-align: center;
            padding: 0;
        }
        table thead tr th{
            text-align: center;
            padding: 0;
        }



        select:active,
        select:focus,
        select:hover,
        input:active,
        input:hover,
        input:focus,
        .btn:focus,
        .btn:hover,
        .btn:active
        {
            outline:0 !important;
            -webkit-appearance:none;
            box-shadow: none !important;
        }
        .btn,a{
            background: darkgreen;
            color: white;
        }
        .btn:hover,a:hover{
            background: limegreen;
            color: white;
        }


    </style>
</head>
<body>
<form class="form-inline col-10" method="post" id="daily_attendance_form" enctype="multipart/form-data">


    <div class="theading row col-12">
        <div class="col-3"><img src="../../Backend/Src/Icons/logo.png" alt="school logo"></div>

        <div class="col-6">
            <h2>AG MODERN NUR/PRI/SEC SCHOOL</h2>
            <h4>First Term 2020/2021 Session</h4>
        </div>
        <div class="col-3"><h5 class="week" style="text-align: center">Week 5</h5></div>
    </div>
    <hr>
    <div class="row choice g-3">
        <select name="class" class="form-select class col" id="class" aria-label="Default select example">
            <option selected disabled>CLASS</option>

        </select>

        <select name="session" class="form-select session col" id="session" aria-label="Default select example" style="margin-inline: 15px">
            <option selected disabled>SESSION</option>

        </select>
        <select name="term" class="form-select term col" id="term" aria-label="Default select example">
            <option selected disabled>TERM</option>
            <option value="1">First Term</option>
            <option value="2">Second Term</option>
            <option value="3">Third Term</option>
        </select>
        <input type="text" class="form-control week_round col" placeholder="for what week?" id="week_round" name="week_round">

        <select name="day" class="form-select day col" id="day" aria-label="Default select example">
            <option selected disabled>DAY</option>
            <option value="1">Monday</option>
            <option value="2">Tuesday</option>
            <option value="3">Wednesday</option>
            <option value="4">Thursday</option>
            <option value="5">Friday</option>
            <option value="6">Saturday</option>
            <option value="7">Sunday</option>
        </select>

    </div>

    <hr>
    <button type="button" class="btn save col">Save</button>&nbsp;
    <a href="index.php" class="btn col">View Weekly Attendance</a>

    <br><br>

    <div class="theading row col-12">
        <div class="className col"><h6><strong>CLASS:</strong> Primary Four A</h6></div>
        <div class="formaster col"><h6><strong>FORM MASTER:</strong> Mr. Samson Madaki</h6></div>
        <div class="date col"><h6><strong>DATE:</strong> 16th April, 2021</h6></div>
    </div>
    <hr>
    <div class="theading row col-12">
        <div class="className col"><input type="text" class="form-control" id="search" name="search"
                                          placeholder="Search by admissionNO, Names, or session">
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
                <th>ADMISSION NO</th>
                <th>NAMES</th>
                <th>MORNING</th>
                <th>AFTERNOON</th>
                <th>REASON BEING ABSENT</th>
                <th>TOTAL</th>
            </tr>
            </thead>

            <tbody>


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
    <button type="button" class="btn  save col">Save</button>
    <a href="index.php" class="btn col">View Weekly Attendance</a>

</form>

</body>
</html>
