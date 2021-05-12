<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Create Account</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../Pluggins/assets/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="../../Pluggins/assets/css/style2.css">
    <script src="../../Pluggins/Jquery/jquery-3.5.1.min.js"></script>
    <script src="../../Scripts/registration.js"></script>
    <style>
        html {
            min-height: 100%;

        }

        form {
            margin: auto;
        }

        label,
        h3,
        a,
        p {
            color: whitesmoke;
        }

        p {
            margin-top: 50px;
        }

        * {
            box-sizing: border-box;
        }
    </style>

</head>

<body>
    <div class="wrapper" style="background-image: url('../../../Backend/Src/images/background%207.jpg');">
        <div class="inner">
            <form method="post" enctype="multipart/form-data" role="form" id="regForm">
                <h3 style="color: whitesmoke;border: 2px solid whitesmoke;border-radius: 30px;padding: 5px;background-color: #880417">CREATE ACCOUNT</h3>
                <div class="form-wrapper">
                    <label for="">Username</label>
                    <input type="text" class="form-control">
                </div>
                <div class="form-wrapper">
                    <label for="">Password</label>
                    <input type="password" class="form-control">
                </div>
                <div class="form-wrapper">
                    <label for="">Confirm Password</label>
                    <input type="password" class="form-control">
                </div>
                <div class="checkbox">
                    <label>
                        <input type="checkbox"> I caccept the Terms of Use & Privacy Policy.
                        <span class="checkmark"></span>
                    </label>
                </div>
                <button>Register Now</button>
                <p>Registered already? <a href="../index.php">log in here...</a></p>

            </form>
        </div>
    </div>

    <script async src="../Pluggins/assets/js/js.js"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-23581568-13');
    </script>
</body>

</html>