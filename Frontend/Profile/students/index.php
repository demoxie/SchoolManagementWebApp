<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Student's Profile List</title>
    <meta name="description" content="">

    <!-- CSS FILES -->
    <link rel="stylesheet" href="../../Pluggins/Bootstrap/css/bootstrap.min.css">
    <link href="../../Pluggins/awesome/css/fontawesome.css" rel="stylesheet">
    <link href="../../Pluggins/awesome/css/all.min.css" rel="stylesheet">
    <link href="../../Pluggins/awesome/css/brands.min.css" rel="stylesheet">
    <link href="../../Pluggins/awesome/css/css.css" rel="stylesheet">
    <link rel="shortcut icon" href="../../Stylesheets/favicon.jpg">
    <script src="../../Pluggins/awesome/js/all.min.js"></script>
    <script src="../../Pluggins/awesome/js/brands.min.js"></script>
    <script src="../../Pluggins/awesome/js/fontawesome.min.js"></script>
    <script src="../../Pluggins/Bootstrap/js/bootstrap.min.js"></script>
    <script src="../../Pluggins/Jquery/jquery-3.5.1.min.js"></script>
    <style>
        .container {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            margin: 3% auto;
            font-family: arial;
            padding: 0;
        }

        img {
            margin: 20px auto;
        }

        .container-fluid {
            border-top: 1px solid #ccc;
            display: flex;
            justify-content: center;
            justify-content: space-around;
            align-content: center;
            vertical-align: middle;
        }

        .btn-danger {
            margin-bottom: 10px;
            margin-top: 10px;
        }

        .information {
            margin-left: 0;
            margin-bottom: 30px;
            margin-top: 30px;
        }

        .row {
            border: 1px solid #ccc;
            margin: 0 auto;

        }

        h5 {
            font-family: helvetica;
            font-size: 16px;
            text-align: left;
            margin-bottom: auto;
            margin-top: auto;
        }

        span {
            margin-right: 0;
        }

        .block {
            background-color: black;
            color: whitesmoke;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .block-content {
            text-align: center;
        }

        .data {
            padding: 5px;
        }

        .data-details {
            border: none;
            background: white;
            font-family: "Century Gothic", CenturyGothic, AppleGothic, sans-serif;
        }
    </style>

</head>

<body>
<div class="container card col-5">
    <img src="../../../Backend/Src/images/Passport%20Old.jpg" class="rounded-circle col-5" alt="Cinque Terre">
    <hr>
    <div class="information">
        <div class="row col-11">
            <div class="block col-sm-12 col-md-4 col-lg-4">
                <h5 class="block-content">Name</h5>
            </div>
            <div class="data col-sm-12 col-md-8 col-lg-8">
                <input type="text" class="data-details col-12" value="James Wakirwa" disabled="disabled">
            </div>
        </div>
        <div class="row col-11">
            <div class="block col-sm-12 col-md-4 col-lg-4">
                <h5 class="block-content">Gender</h5>
            </div>
            <div class="data col-sm-12 col-md-8 col-lg-8">
                <input type="text" class="data-details col-12" value="Male" disabled="disabled">
            </div>
        </div>
        <div class="row col-11">
            <div class="block col-sm-12 col-md-4 col-lg-4">
                <h5 class="block-content">Date of Birth</h5>
            </div>
            <div class="data col-sm-12 col-md-8 col-lg-8">
                <input type="text" class="data-details col-12" value="15th April, 2000" disabled="disabled">
            </div>
        </div>
        <div class="row col-11">
            <div class="block col-sm-12 col-md-4 col-lg-4">
                <h5 class="block-content">Address</h5>
            </div>
            <div class="data col-sm-12 col-md-8 col-lg-8">
                <input type="text" class="data-details col-12"
                       value="Ungwan Alheri AshakaCem, Funakaye LGA, Gombe State" disabled="disabled">
            </div>
        </div>
        <div class="row col-11">
            <div class="block col-sm-12 col-md-4 col-lg-4">
                <h5 class="block-content">Year Admitted</h5>
            </div>
            <div class="data col-sm-12 col-md-8 col-lg-8">
                <input type="text" class="data-details col-12" value="15th April, 2000" disabled="disabled">
            </div>
        </div>
        <div class="row col-11">
            <div class="block col-sm-12 col-md-4 col-lg-4">
                <h5 class="block-content">Admission NO</h5>
            </div>
            <div class="data col-sm-12 col-md-8 col-lg-8">
                <input type="text" class="data-details col-12" value="AG-STA-3849583" disabled="disabled">
            </div>
        </div>
        <div class="row col-11">
            <div class="block col-sm-12 col-md-4 col-lg-4">
                <h5 class="block-content">Department</h5>
            </div>
            <div class="data col-sm-12 col-md-8 col-lg-8">
                <input type="text" class="data-details col-12" value="Science" disabled="disabled">
            </div>
        </div>
        <div class="row col-11">
            <div class="block col-sm-12 col-md-4 col-lg-4">
                <h5 class="block-content">Class</h5>
            </div>
            <div class="data col-sm-12 col-md-8 col-lg-8">
                <input type="text" class="data-details col-12" value="Primary 4" disabled="disabled">
            </div>
        </div>


    </div>

    <div class="container-fluid">
        <a class="btn btn-danger btn-lg col"><i class="fas fa-edit"></i>Update Profile</a>&nbsp;&nbsp;
        <a class="btn btn-danger btn-lg col"><i class="fas fa-print"></i>Print Profile</a>
    </div>
</div>

</body>

</html>