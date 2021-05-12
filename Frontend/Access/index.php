<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--Import Google Icon Font-->
    <link href="../Pluggins/materialize/css/icon.css" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="../Pluggins/materialize/css/materialize.min.css"
          media="screen,projection"/>
    <script src="../Pluggins/Jquery/jquery-3.5.1.min.js"></script>
    <script src="../Scripts/login.js"></script>
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-size: 17px;
            padding: 0;
            font-family: muli-regular;
            background-image: url(../../Backend/Src/images/background%201.jpg);
            background-size: 100% 100%;
            background-position: center;
            background-attachment: fixed;
            background-repeat: no-repeat;

        }

        html {
            height: 100%;


        }


        .overlay {
            background: rgb(0, 0, 0);
            /* Fallback color */
            background: rgba(0, 0, 0, 0.5);
            /* Black background with 0.5 opacity */
            height: 100vh;
            overflow: hidden;
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 99;

        }


        input:-webkit-autofill,
        input:-webkit-autofill:hover,
        input:-webkit-autofill:focus,
        input:-webkit-autofill:active {
            transition: background-color 5000s;
            -webkit-text-fill-color: #fff !important;
        }


        .container {
            margin-left: auto;
            margin-right: auto;
            margin-top: 100px;
            display: flex;
            justify-content: center;
            align-items: center;

        }

        form {
            min-width: 40%;
            vertical-align: middle;

        }

        .btn-flat {
            border: 2px solid white;
            align-self: center;
            width: 150px;
            height: auto;
            border-radius: 30px;
            text-align: center;
            color: whitesmoke;
            margin-left: 120px;
            margin-right: 100px;
        }

        .btn-flat:hover {
            opacity: 0.5;
            transition: opacity 0.2s;
        }

        .row {
            margin-top: 0;
        }
        h2 {
            color: black;
            text-shadow: -1px 0 white, 0 1px white, 1px 0 white, 0 -1px white;
            vertical-align: middle;
            font-size: xxx-large;



        }
        .box {
            width: 145px;
            height: 145px;
            border-radius: 50%;
            background-color: white;
            background: rgb(0, 0, 0);
            /* Fallback color */
            background: rgba(0, 0, 0, 0.5);
            border: 5px double white;
            display: flex;
            justify-content: center;
            outline:none;
            position: absolute;
            top: 40px;
            bottom: auto;
            left: auto;
            right: auto;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);

        }

        @media screen and (max-width: 480px) {
            .box {
                display: none;
            }
        }
    </style>
</head>

<body>
<div class="overlay">
    <div class="box">
        <h2>Login</h2>
    </div>
    <div class="container col s12">
        <form class="col s12" autocomplete="on" method="post" enctype="multipart/form-data" id="loginForm" role="form">
            <div class="row">
                <div class="input-field col s12">

                    <input id="icon_prefix" type="text" class="validate" name="username">
                    <label for="icon_prefix">Username</label>
                    <span class="helper-text" data-error="wrong" data-success="right">Helper text</span>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">

                    <input id="icon_telephone" type="text" class="validate" name="password">
                    <label for="icon_telephone">Password</label>
                    <span class="helper-text" data-error="wrong" data-success="right">Helper text</span>
                </div>
            </div>
            <button class="waves-effect waves-teal btn-flat" name="login" id="login" type="submit">Login</button>
            <p>Don't have account? <a href="../Access/CreateAccount/index.php" style="color: whitesmoke;">Create account here...</a></p>
        </form>

    </div>
</div>
<!--JavaScript at end of body for optimized loading-->
<script type="text/javascript" src="../Pluggins/materialize/js/materialize.min.js"></script>
<script src="../Pluggins/materialize/js/materialize.min.js"></script>
</body>

<!-- Mirrored from www.w3schools.com/howto/tryit.asp?filename=tryhow_css_image_transparent_bottom by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 24 Sep 2020 06:00:13 GMT -->

</html>