<!DOCTYPE html>
<html lang="en">

<head>
    <title>Student's Result</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../../Pluggins/Bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../Pluggins/awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../Pluggins/awesome/css/all.min.css">
    <link rel="icon" href="../../../Backend/Src/Icons/logo.png">
    <link rel="../../stylesheet/result_print.css">
    <script src="../../Pluggins/Jquery/jquery-3.5.1.min.js"></script>
    <script src="../../Scripts/fetch_session_for_result_checker.js"></script>
    <script src="../../Scripts/student_result_checker.js"></script>
    <script src="../../Pluggins/awesome/js/fontawesome.min.js"></script>
    <script src="../../Pluggins/awesome/js/all.min.js"></script>
    <script src="../../Pluggins/Bootstrap/js/bootstrap.min.js"></script>
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: "Century Gothic", CenturyGothic, AppleGothic, sans-serif;
            font-weight: 500;
            font-size: 1em;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        table {
            width: 40%;
            height: auto;
            margin: auto;
            font-size: 75%;
            overflow: hidden;
            border-collapse: collapse;
            table-layout: fixed;

        }

        table:after {
            clear: both;
            content: '';
        }

        td {
            border: 1px solid black;
            vertical-align: middle;
            padding-left: 5px;
        }

        tr {
            height: 20px;
        }

        tr td:nth-child(1) {
            font-weight: bolder;
        }
        tr td:nth-child(3) {
            font-weight: bolder;
        }
        tr td:nth-child(5) {
            font-weight: bolder;
        }

    </style>
</head>

<body>
    <table id="summerized_table">
    <tr>
        <td>Name</td><td></td>
        <td>Class</td><td></td>
        <td>Final Grade</td><td></td>
        </tr>
        <tr>
        <td>Final Position</td><td></td>
        <td>Grand Total</td><td></td>
        <td>Average</td><td></td>
        </tr>
                

    </table>


</body>

<!-- Mirrored from www.w3schools.com/bootstrap4/tryit.asp?filename=trybs_form_inline&stacked=h by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 24 Sep 2020 08:11:15 GMT -->

</html>