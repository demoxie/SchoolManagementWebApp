<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../Pluggins/Bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../Pluggins/awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../Pluggins/awesome/css/all.min.css">
    <script src="../Pluggins/awesome/js/fontawesome.min.js"></script>
    <script src="../Pluggins/awesome/js/all.min.js"></script>
    <script src="../Pluggins/Jquery/jquery-3.5.1.min.jsjquery.min.js"></script>
    <script src="../Pluggins/Jquery/popper.min.js"></script>
    <script src="../Pluggins/Bootstrap/js/bootstrap.min.js"></script>
    <style>
        * {
            box-sizing: border-box;
        }

        .schoolname {
            margin-left: auto;
            margin-right: auto;
            margin-bottom: 50px;
        }

        h2 {
            text-align: center;
            color: red;
            text-shadow: -1px 0 green, 0 1px green, 1px 0 green, 0 -1px green;
        }

        .schoolname {
            margin-left: auto;
            margin-right: auto;
        }

        a {
            margin: 20px 20px;
            text-align: center;
            font-size-adjust: auto;
            font-stretch: normal;
        }

        .btn-primary:hover {
            background-color: green;
        }

        .btn-primary {
            background-color: darkgreen;
        }

        .tag {
            margin-left: 0;
            margin-top: auto;
            margin-bottom: auto;
        }

        h6 {
            display: inline-block;
            text-align: left;
            border: 2px solid black;
            border-radius: 15px;
            padding: 5px 25px;
            color: whitesmoke;
        }

        .promte {
            background-color: green;
        }

        .demote {
            background-color: orange;
        }

        .withdraw {
            background-color: orangered;
        }

        .expel {
            background-color: red;
        }


    </style>
</head>
<body>

<div class="schoolname col-6">
    <h2>AG MODERN NUR/PRI/SEC SCHOOL</h2>
</div>
<div class="container col-10">

    <hr>
    <div class="container fluid tag col-6">
        <h6 class=" promte col">Assessment</h6>
    </div>
    <hr>
    <div class="row col-12">
        <a href="../Assessment/ca_entry_sheet.php" class="btn btn-primary btn-lg col">CREATE CA TEST<br><i
                    class="fas fa-edit"></i></a>
        <a href="#" class="btn btn-primary btn-lg col">CHECK CA TEST RESULTS<br><i class="fas fa-search"></i></a>
        <a href="../Assessment/exam_entry_sheet.php" class="btn btn-primary btn-lg col">CREATE EXAMS<br><i
                    class="fas fa-chalkboard-teacher"></i></a>
        <a href="#" class="btn btn-primary btn-lg col">CHECK EXAMS RESULTS<br><i class="fas fa-binoculars"></i></a>
        <a href="#" class="btn btn-primary btn-lg col">PERFORMANCE ANALYSIS<br><i class="fas fa-chart-line"></i></a>
    </div>
    <hr>
    <div class="container fluid tag col-6">
        <h6 class=" promte col">Promote</h6>
        <h6 class="demote col">Demote</h6>

    </div>
    <hr>
    <div class="row col-12">
        <a href="#" class="btn btn-primary btn-lg col">CARRY OUT OPERATION INDIVIDUALLY<br><i
                    class="fas fa-certificate"></i> <i class="fas fa-user"></i></a>
        <a href="#" class="btn btn-primary btn-lg col">CARRY OUT OPERATION BY CLASS<br><i
                    class="fas fa-certificate"></i> <i class="fas fa-user-friends"></i></a>

    </div>
</div>

</body>

<!-- Mirrored from www.w3schools.com/bootstrap4/tryit.asp?filename=trybs_form_inline&stacked=h by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 24 Sep 2020 08:11:15 GMT -->
</html>
