<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registration</title>
<link rel="stylesheet" href="../Pluggins/materialize/css/materialize.min.css">
    <link rel="stylesheet" href="../Pluggins/materialize/css/icon.css">
    <script src="../Pluggins/materialize/js/materialize.min.js"></script>
    <link rel="stylesheet" href="../Pluggins/materialize/mstepper.min.css">
    <script src="../Pluggins/materialize/mstepper.min.js"></script>
    <link rel="stylesheet" href="../Pluggins/Bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../Pluggins/awesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="../Pluggins/awesome/css/solid.min.css">
    <link rel="stylesheet" href="../Pluggins/awesome/css/brands.min.css">
    <script src="../../Frontend/Pluggins/Jquery/jquery-3.5.1.min.js"></script>
    <script src="../../Frontend/Scripts/registration.js"></script>
    <script src="../Pluggins/Jquery/popper.min.js"></script>
    <script src="../Pluggins/Bootstrap/js/bootstrap.min.js"></script>
    <script src="../Pluggins/awesome/js/fontawesome.min.js"></script>
    <script src="../Pluggins/awesome/js/solid.min.js"></script>
    <script src="../Pluggins/awesome/js/brands.min.js"></script>
    <style>
        .btn,
        .btn-large,
        .btn-small,
        .btn-flat {
            border-radius: 4px;
            font-weight: 500;
            background-color: #6d0606;
            color: whitesmoke;
        }


        .card:hover {
            box-shadow: 0px 10px 20px 0px rgba(0, 0, 0, 0.18);
        }

        .card {
            border-radius: 15px;
            box-shadow: 0px 5px 10px 0px rgba(0, 0, 0, 0.15);
            min-width: 400px;
        }
        .section{
           
            background-image: url(../../Backend/Src/images/background%206.jpg);
            background-size: 100% 100%;
            background-repeat: no-repeat;
            
        }
        .container{
             background: rgb(0, 0, 0);
            /* Fallback color */
            background: rgba(0, 0, 0, 0.5);
            /* Black background with 0.5 opacity */
            width: 100%;
            height: 100%;
            display: block;
        }
    </style>
</head>

<body>
    <div class="section grey lighten-5">
        <div class="container">
            <div class="row">
                <div class="col xl4 l6 m10 s12 offset-xl4 offset-l3 offset-m1">
                    <h3 class="light center-align blue-text">Sign up form</h3>
                    <div class="card">
                        <div class="card-content">

                            <ul data-method="POST" class="stepper linear">
                                <li class="step active">
                                    <div class="step-title waves-effect waves-dark">Personal Details</div>
                                    <div class="step-content">
                                        <div class="row">
                                            <div class="input-field col s12">
                                                <input id="email" name="email" type="email" class="validate" required>
                                                <label for="email">Your e-mail</label>
                                            </div>
                                        </div>
                                        <div class="step-actions">
                                            <button class="waves-effect waves-dark btn blue next-step" data-feedback="anyThing">Continue</button>
                                        </div>
                                    </div>
                                </li>
                                <li class="step">
                                    <div class="step-title waves-effect waves-dark">Contact Information</div>
                                    <div class="step-content">
                                        <div class="row">
                                            <div class="input-field col s12">
                                                <input id="password" name="password" type="password" class="validate" required>
                                                <label for="password">Your password</label>
                                            </div>
                                        </div>
                                        <div class="step-actions">
                                            <button class="waves-effect waves-dark btn blue next-step">CONTINUE</button>
                                            <button class="waves-effect waves-dark btn-flat previous-step">BACK</button>
                                        </div>
                                    </div>
                                </li>
                                <li class="step">
                                    <div class="step-title waves-effect waves-dark">Health Information</div>
                                    <div class="step-content">
                                        End!!!!!
                                        <div class="step-actions">
                                            <button class="waves-effect waves-dark btn blue next-step" data-feedback="noThing">Submit</button>
                                        </div>
                                    </div>
                                </li>
                            </ul>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function anyThing(destroyFeedback) {
            setTimeout(function() {
                destroyFeedback(true);
            }, 1500);
        }

        function noThing(destroyFeedback) {
            setTimeout(function() {
                destroyFeedback(true);
            }, 10000);
        }

        var stepperDiv = document.querySelector('.stepper');
        console.log(stepperDiv);
        var stepper = new MStepper(stepperDiv);
    </script>
</body>

</html>