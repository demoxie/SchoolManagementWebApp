<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admission Confirmation form</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../../Pluggins/Bootstrap/css/bootstrap.min.css">
    <link rel="icon" href="../../../Backend/Src/Icons/logo.png">
    <script src="../../Pluggins/Jquery/jquery-3.5.1.min.js"></script>
    <script src="../../Scripts/verify_reg_code.js"></script>
    <script src="../../Pluggins/Bootstrap/js/bootstrap.min.js"></script>
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: "Century Gothic", CenturyGothic, AppleGothic, sans-serif;
        }

        #main {
            height: 100vh;
            overflow: hidden;
            background-color: #ccc;
            background-image: url("../../../Backend/Src/images/neonbrand-zFSo6bnZJTw-unsplash.jpg");
            background-repeat: no-repeat;
            background-position: center;
            background-attachment: fixed;
            background-size: cover;
            display: flex;
            flex-flow: column nowrap;
            justify-content: center;
            align-items: center;
        }

        #admission_processing_form {
            display: flex;
            flex-flow: column nowrap;
            justify-content: center;
            align-items: center;
        }

        #code_input {
            width: 25vw;
            border: none;
            border-bottom: 2px solid whitesmoke;
            background: transparent;
            border-radius: 0;
            color: white;
        }

        #code_input::placeholder {
            color: white;
            font-size: 14px;
            font-style: italic;
        }

        #process {
            border: 1px solid red;
            margin-top: 20px;
            color: white;
            font-weight: bold;
            background: #ccc;
            border-radius: 18px;
            padding-inline: 30px;
        }

        textarea:hover,
        input:hover,
        textarea:active,
        select:focus,
        input:active,
        textarea:focus,
        input:focus,
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

        .close {
            border: none;
            color: black;
            background: transparent;
            font-weight: bold;
            cursor: pointer;
        }


    </style>
</head>
<body>

<div class="container-fluid" id="main">
    <form class="form-inline col-10" method="post" id="admission_processing_form" autocomplete="off">
        <div class="">
            <input name="reg_code" class="form-control" id="code_input" type="text" placeholder="Enter Admission No...">
        </div>
        <div class="">
            <button class="btn" type="button" id="process">Check Result</button>
        </div>
    </form>

</div>

<!-- The Modal -->
<div class="modal" id="successModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
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
