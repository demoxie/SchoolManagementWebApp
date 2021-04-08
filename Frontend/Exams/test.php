<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../Pluggins/Bootstrap/css/bootstrap.min.css">

    <script src="../Pluggins/Jquery/jquery-3.5.1.min.jsjquery.min.js"></script>
    <script src="../Pluggins/Jquery/popper.min.js"></script>
    <script src="../Pluggins/Bootstrap/js/bootstrap.min.js"></script>
    <style>
        * {
            box-sizing: border-box;
        }

        form {
            margin: 3% auto;
            border: 1px solid #ccc;
            padding: 0;
            font-size: 14px;
            overflow: hidden;
            border-radius: 5px;
            padding: 10px 10px;

        }

        .container {
            display: inline-block;
            height: 60vh;
            overflow: hidden;
        }

        img {
            object-fit: fill;
        }

        .option-label, .form-control {
            display: inline-block;
        }


    </style>
</head>
<body>
<form class="form-inline col-5">
    <div class="container-fluid">
        <label>Subject</label> <select class="form-control">
            <option selected disabled>Subject</option>
        </select>
        <label>Department</label> <select class="form-control">
            <option selected disabled>Department</option>
        </select>
        <label>Class</label> <select class="form-control">
            <option selected disabled>Class</option>
        </select>
        <label>Question</label><textarea class="form-control">
            
            </textarea>

    </div>

    <div class="container-fluid">
        <div class="options">
            <label class="option-label">A</label><input type="text" class="option-input form-control">
        </div>
        <div class="options">
            <label class="option-label">B</label><input type="text" class="option-input form-control">
        </div>
        <div class="options">
            <label class="option-label">C</label><input type="text" class="option-input form-control">
        </div>
        <div class="options">
            <label class="option-label">D</label><input type="text" class="option-input form-control">
        </div>
        <div class="options">
            <label class="option-label">E</label><input type="text" class="option-input form-control">
        </div>
    </div>
    <br>
    <div class="container-fluid col-12"><img class="col-12 mx-auto d-block img-fluid"
                                             src="../../Backend/Src/images/admin.jpg"></div>


</form>

</body>

<!-- Mirrored from www.w3schools.com/bootstrap4/tryit.asp?filename=trybs_form_inline&stacked=h by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 24 Sep 2020 08:11:15 GMT -->
</html>
