<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admission Confirmation form</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../../Pluggins/Bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../Pluggins/awesome/css/all.min.css">
    <link rel="icon" href="../../../Backend/Src/Icons/rfc-logo.jpg">
    <script src="../../Pluggins/Jquery/jquery-3.5.1.min.js"></script>
    <script src="../../Scripts/verify_reg_code.js"></script>
    <script src="../../Scripts/fetch_class.js"></script>
    <script src="../../Scripts/fetch_session_again.js"></script>
    <script src="../../Pluggins/awesome/js/all.min.js"></script>
    <script src="../../Pluggins/Bootstrap/js/bootstrap.min.js"></script>
    <style>
        * {
            box-sizing: border-box;
        }

        html {
            font-family: "Century Gothic", CenturyGothic, AppleGothic, sans-serif;
            font-size: 14px;
        }

        #main {
            height: 100vh;
            background-color: #ccc;
            background-image: url("../../../Backend/Src/images/neonbrand-zFSo6bnZJTw-unsplash.jpg");
            background-repeat: no-repeat;
            background-position: center;
            background-attachment: fixed;
            background-size: cover;
            display: grid;
            grid-template-columns: auto;
            justify-content: center;
            align-items: center;
            padding: 0;
        }

        #admission_processing_form {
            display: flex;
            flex-flow: column;
            justify-content: center;
            justify-items: stretch;
            align-items: stretch;
            align-content: space-between;
            padding: 0;
            margin: auto;
        }


        input:hover,
        input:active,
        input:focus,
        .form-select:focus,
        .form-select:active,
        .form-select:hover,
        .btn:active,
        .btn:hover,
        .btn:focus,
        button:active,
        button:hover,
        button:focus {
            outline: 0 !important;
            -webkit-appearance: none;
            box-shadow: none !important;

        }

        .form-select:focus,
        .form-select:active {
            border: 2px solid red;
        }

        #code_input {
            width: 15rem;
            border: none;
            border-bottom: 2px solid whitesmoke;
            background: transparent;
            border-radius: 0;
            color: white;
            text-align: center;
            margin-inline: 5px;
        }

        #code_input::placeholder {
            color: white;
            font-size: 14px;
            font-style: italic;
        }

        #validate_btn, #process, #back {
            border: 2px solid white;
            color: white;
            font-weight: bold;
            background: firebrick;
            border-radius: 18px;
            padding-inline: 30px;
        }

        #validate_btn:hover, #validate_btn:focus, #process:hover, #process:focus, #back:hover, #back:focus {
            background-color: #ccc;
            color: firebrick;
            border-color: firebrick;
        }

        #validate_btn {
            width: 19rem;
        }

        #process, #back {
            width: 17rem;
        }

        .close {
            border: none;
            color: white;
            background: transparent;
            font-weight: bold;
            cursor: pointer;
        }

        #btn_close_down {
            background-color: firebrick;
            color: white;
        }

        .input-container {
            width: auto;
            display: flex;
            flex-flow: row nowrap;
            justify-content: center;
            align-items: center;
        }

        .btn_container {
            display: flex;
            flex-flow: row nowrap;
            justify-content: center;
            align-items: center;
            width: auto;
            margin-top: 2em;
        }

        .form-select {
            background-color: #ccc;
            color: firebrick;
            border-radius: 18px;
            font-weight: bold;
            width: 17rem;
            text-align: center;
            border: 2px solid firebrick;
            padding: 0.3rem 2rem;
            margin: auto;
        }

        select option:hover {
            text-align: center;
        }

        .form-containers {
            width: 80%;
            display: flex;
            flex-flow: column;
            justify-content: center;
            align-items: center;
            margin-block: 10px;
        }

        .class_selection_form {
            display: flex;
            justify-content: center;
            align-items: center;
            align-content: space-around;
        }

        .valid-icon {
            color: green;
        }

    </style>
</head>

<body>

<div class="container-fluid" id="main">
    <form class="form-inline col-10" method="post" id="admission_processing_form" autocomplete="off">

        <div class="input-container">
            <input name="reg_code" class="form-control" id="code_input" type="text"
                   placeholder="Enter Registration code...">
        </div>

        <div class="btn_container">
            <button class="btn" type="button" id="validate_btn">Validate Reg No</button>
        </div>
    </form>
    <form class="col-12" method="post" id="class_selection_form" autocomplete="off">
        <div class="form-containers">
            <select class="form-select form-select-md myclass" name="previous_class" id="previous_class">
                <option selected disabled>PREVIOUS CLASS</option>
            </select>
        </div>
        <div class="form-containers">
            <select class="form-select form-select-md myclass" name="current_classs" id="current_class">
                <option selected disabled>ADMITTING INTO CLASS</option>
            </select>
        </div>
        <div class="form-containers">
            <select class="form-select form-select-md session" name="current_sesion" id="current_session">
                <option selected disabled>ADMITTING INTO SESSION</option>
            </select>
        </div>
        <div class="form-containers">
            <select class="form-select form-select-md" id="term" name="term">
                <option selected disabled>CURRENT TERM</option>
                <option value="1">First Term</option>
                <option value="2">Second Term</option>
                <option value="3">Third Term</option>
            </select>
        </div>
        <div class="form-container">
            <button class="btn" type="button" id="process">Process Admission</button>
        </div>
        <div class="form-container" style="margin-top: 10px;">
            <button class="btn" type="button" id="back">Back</button>
        </div>
    </form>

</div>

<!-- The Modal -->
<div class="modal" id="successModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header" style="background-color:firebrick;color:white">
                <h4 class="modal-title">Modal Heading</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">

            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" id="btn_close_down" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>
</body>

<!-- Mirrored from www.w3schools.com/bootstrap4/tryit.asp?filename=trybs_form_inline&stacked=h by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 24 Sep 2020 08:11:15 GMT -->

</html>