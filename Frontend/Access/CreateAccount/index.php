<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Create Account</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../Pluggins/Bootstrap/css/bootstrap.min.css">
    <link rel="icon" href="../../../Backend/Src/Icons/rfc-logo.jpg">
    <link rel="stylesheet" href="../../Pluggins/awesome/css/all.min.css">
    <script src="../../Pluggins/Jquery/jquery-3.5.1.min.js"></script>
    <script src="../../Scripts/signup.js"></script>
    <script src="../../Pluggins/Bootstrap/js/bootstrap.min.js"></script>
    <script src="../../Pluggins/awesome/js/all.min.js"></script>

    <style>
        * {
            box-sizing: border-box;
        }

        html,
        body {
            font-family: "Century Gothic", CenturyGothic, AppleGothic, sans-serif;
            font-size: calc(1 rem-0 .5rem);
            font-weight: bolder;

        }

        input.form-control:active,
        input.form-control:focus,
        input.form-control:hover,
        button:active,
        button:focus,
        button:hover {
            outline: none !important;
            appearance: none !important;
            box-shadow: none !important;

        }

        .input.form-control:active,
        input.form-control:focus {
            background-color: transparent;
            border-color: firebrick;
            color: white;
        }

        button,
        input.form-control {
            border-radius: 1.5rem;
            border: none;
        }

        input.form-control {
            background-color: transparent;
            border: 2px solid firebrick;
            width: 100%;
            color: white;
            font-weight: bolder;
            text-align: center;
        }

        .form-wrapper {
            width: 20rem;
            margin-block: 0.5rem;
        }

        label {
            color: white;
            font-weight: 300;
        }

        button {
            border: 2px solid white;
            background-color: firebrick;
            color: white;
            padding: 0.5rem 1.5rem;
        }

        button:hover {
            color: firebrick;
            background-color: #ccc;
            border-color: firebrick;
        }

        #regForm {
            width: 30rem;
            display: grid;
            grid-template-columns: auto;
            justify-content: center;
            justify-items: center;
            align-items: center;
            align-content: space-between;
            margin-top: 20vh;
            padding: 1rem;

        }

        .container-fluid {
            display: grid;
            grid-template-columns: auto;
            justify-content: center;
            justify-items: center;
            align-items: center;
            align-content: center;
            overflow: hidden;
            padding: 0;
            margin: 0;


        }

        #image {
            width: 100vw;
            height: 100vh;
            z-index: -9999;
            position: absolute;
            margin: auto auto;
            display: block;
            object-fit: cover;
            overflow: hidden;
        }

        h3 {
            color: white;
            border: 4px solid gray;
            border-radius: 2.5rem;
            padding: 0.7rem 2.5rem;
            background-color: firebrick;
            text-align: center;
        }

        #checkbox {
            background-color: firebrick;
            color: white;
        }

        @media screen and (max-width: 25rem) {
            #regForm {
                width: 3rem;
            }

            input.form-control {
                width: 100%;
            }

            html,
            body {

                font-size: 0.8rem;


            }
        }
    </style>

</head>

<body>
<div class="container-fluid">
    <img id="image" src="../../../Backend/Src/images/background%207.jpg"/>
    <form method="post" role="form" id="regForm" autocomplete="off">
        <h3>CREATE ACCOUNT</h3>
        <div class="form-wrapper">
            <label for="">Username</label>
            <input type="text" class="form-control" name="username" id="username" required>
        </div>
        <div class="form-wrapper">
            <label for="">Password</label>
            <input type="text" class="form-control" name="password" id="password" required>
        </div>
        <div class="form-wrapper">
            <label for="">Confirm Password</label>
            <input type="text" class="form-control" name="repassword" id="repassword" required>
        </div>
        <div class="checkbox">
            <label>
                <input type="checkbox" id="checkbox" name="agree" required> I accept the Terms of Use & Privacy Policy.
                <span class="checkmark"></span>
            </label>
        </div>
        <button type="button" id="createAccount">Create Account</button>
        <p style="color:firebrick;margin-top:10px">Registered already? <a href="../index.php">log in here...</a></p>

    </form>

</div>

</body>

</html>