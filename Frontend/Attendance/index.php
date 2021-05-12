<!DOCTYPE html>
<html lang="en">
<head>
    <title>Weekly Attendance</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../Pluggins/Bootstrap/css/bootstrap.min.css">
    <link rel="icon" href="../../Backend/Src/Icons/rfc-logo.jpg">
    <script src="../Pluggins/Jquery/jquery-3.5.1.min.js"></script>
    <script src="../Scripts/fetch_class_again.js"></script>
    <script src="../Scripts/fetch_session.js"></script>
    <script src="../Scripts/weekly_attedndance.js"></script>
    <script src="../Scripts/submit_weekly_attendance.js"></script>
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

h4{
    text-align: center;
}
.week{
    float: right;
    text-align: right;
    border-radius: 5px;
    border: 1px solid darkred;
    padding: 2px 15px;
    background-color: red;
    color: whitesmoke;
}
img{
    width: 150px;
    height: 150px;
    object-fit: contain;
    margin-left: 0;
    margin-top: 0;
}
th,td{
    text-align: center;
    vertical-align: middle;
}
td input{
    border: none;
}
        input {
            text-align: center;
            background-color: white;
            color: black;
            font-weight: 300;
            border: none;
            object-fit: contain;
        }

    </style>
</head>
<body>
<form class="form-inline col-10" method="post" role="form" id="weekly_attendance_form" autocomplete="off">


    <div class="table-responsive-sm">

                <div class="theading row col-12">
                    <div class="col-3"><img src="../../Backend/Src/Icons/logo.png"></div>

                    <div class="col-6">
                        <h2>AG MODERN NUR/PRI/SEC SCHOOL</h2>
                        <h4>First Term 2020/2021 Session</h4>
                </div>
                    <div class="col-3"> <h5 class="week" style="text-align: center">Week 5</h5></div>
                </div>
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
            <input name="week" class="form-control week_round col" id="week_round" placeholder="for week what?" aria-label="Default select example">

        </div>

                <hr>
                <button type="button" class="btn  save col">Save</button>&nbsp;
                <a href="daily_attendance.php" class="btn  save col">View Daily Attendance</a>

                <br><br>

                <div class="theading row col-12">
                    <div class="className col"><h6><strong>CLASS:</strong> Primary Four A</h6></div>
                    <div class="formaster col"><h6><strong>FORM MASTER:</strong> Mr. Samson Madaki</h6></div>
                    <div class="date col"><h6><strong>DATE:</strong> 16th April, 2021</h6></div>
                </div>
                <hr>

            <div class="theading row col-12">
                <div class="className col-4"><input type="text" class="form-control" id="search" name="search" placeholder="Search by admissionNO, Names, or session">
                </div>

                <div class="date col"><ul class="pagination pagination-md justify-content-end">
                        <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">Next</a></li>
                    </ul></div>
            </div>
        <table class="table table-hover table-bordered">
            <thead class="thead-light">
            <tr>
                <th>#</th>
                <th style="width: 15rem">ADMISSION NO</th>
                <th>NAMES</th>
                <th>MON</th>
                <th>TUE</th>
                <th>WED</th>
                <th>THUR</th>
                <th>FRI</th>
                <th style="width: 2rem;">TOTAL</th>
            </tr>
            </thead>

            <tbody>


            </tbody>

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
    <button type="button" class="btn save col">Save</button>
    <a href="daily_attendance.php" class="btn save col">View Daily Attendance</a>

</form>

</body>

<!-- Mirrored from www.w3schools.com/bootstrap4/tryit.asp?filename=trybs_form_inline&stacked=h by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 24 Sep 2020 08:11:15 GMT -->
</html>
