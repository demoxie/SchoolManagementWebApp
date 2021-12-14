<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="../../Backend/Src/Icons/rfc-logo.jpg"/>
    <link rel="stylesheet" href="../Pluggins/Bootstrap/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="../Pluggins/awesome/css/all.min.css"/>
    <link rel="stylesheet" href="../Pluggins/awesome/css/font-awesome.min.css"/>
    <script src="../Pluggins/Jquery/jquery-3.5.1.min.js"></script>
    <script src="../Pluggins/Bootstrap/js/bootstrap.min.js"></script>
    <script src="../Pluggins/awesome/js/all.min.js"></script>
    <script src="../Scripts/login.js"></script>
    <style>
        * {
            box-sizing: border-box;
        }

        body {

            padding: 0;
            background-image: url("../../Backend/Src/images/background 4.jpg");
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            background-repeat: no-repeat;
        }

        html,
        body {
            height: 100%;
            font-family: "Century Gothic", CenturyGothic, AppleGothic, sans-serif;
            font-size: 1rem;
        }

        .overlay {
            background: rgb(0, 0, 0);
            /* Fallback color */
            background: rgba(0, 0, 0, 0.4);
            /* Black background with 0.5 opacity */
            height: 100vh;
            overflow: hidden;
            display: grid;
            grid-template-columns: auto;
            grid-row-gap: 3rem;
            justify-content: center;
            justify-items: center;
            align-items: center;
            align-content: center;
            z-index: -9999;
        }


        input:active,
        input:hover,
        input:focus,
        .btn-flat:active,
        .btn-flat:hover,
        .btn-flat:focus {
            outline: none !important;
            appearance: none !important;
            box-shadow: none !important;
        }

        input {
            border: 2px solid white;
            border-radius: 1.5rem;
            background-color: transparent;
            color: white;
            padding: 0.2rem 1rem;
            text-align: center;
        }

        input::placeholder {
            color: white;
            text-align: justify;
        }


        form {
            display: grid;
            grid-template-columns: auto;
            grid-row-gap: 0.8rem;
            justify-items: center;
            justify-content: center;
            align-items: flex-start;
            align-content: flex-start;
            margin-top: 0;


        }

        .btn-flat {
            border: 2px solid white;
            background-color: firebrick;
            align-self: center;
            width: 8rem;
            border-radius: 1.5rem;
            text-align: center;
            color: whitesmoke;
            padding: 0.2rem 1.2rem;
        }

        .btn-flat:hover {
            background-color: #ccc;
            border-color: firebrick;
            color: firebrick;
            transition: background-color ease-in 0.2s;
        }


        h4 {
            color: black;
            text-shadow: -1px 0 white, 0 1px white, 1px 0 white, 0 -1px white;
            vertical-align: middle;
            font-size: large;
        }

        .box {
            width: 7rem;
            height: 7rem;
            border-radius: 50%;
            background: rgb(0, 0, 0);
            /* Fallback color */
            background: rgba(0, 0, 0, 0.5);
            border: 5px double white;
            display: flex;
            justify-content: center;
            align-items: center;
            outline: none;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);

        }

        @media screen and (max-width: 480px) {

        }

        #question {
            color: goldenrod;
        }
    </style>
</head>

<body>
<div class="container-fluid overlay">
    <div class="box">
        <h4>Welcome</h4>
    </div>

    <form class="col-11" autocomplete="on" method="post" enctype="multipart/form-data" id="loginForm" role="form">

        <div class="input-field col-12">
            <input id="username" type="text" class="input col-12" placeholder="Username" name="username">
        </div>


        <div class="input-field col-12">
            <input id="password" type="text" class="input col-12" placeholder="password" name="password">
        </div>
        <div class="input-field">
            <button class="btn-flat" name="login" id="login" type="button">Login</button>
        </div>


        <p id="question">Don't have account? <a href="../Access/CreateAccount/index.php" style="color: whitesmoke;">Create
                account here...</a></p>
    </form>
</div>
</body>

</html>