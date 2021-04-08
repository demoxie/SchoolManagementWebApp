<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Teachers Application form</title>
    <link rel="stylesheet" href="">
    <title>Staff application form</title>
    <link rel="stylesheet" href="../../Stylesheets/roboto.css">
    <link rel="stylesheet" href="../../Stylesheets/icon.css">
    <link rel="stylesheet" href="../../Pluggins/Bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../Pluggins/awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../Pluggins/awesome/css/all.min.css">
    <link rel="icon" href="../../../Backend/Src/Icons/logo.jpg">
    <link rel="stylesheet" href="../../Stylesheets/systemErrorModal.css">

    <style>
        body {
            color: #fff;
            background: darkseagreen;
            font-family: 'Varela Round', sans-serif;
        }

        .form-control {
            height: 40px;
            box-shadow: none;
            color: #969fa4;
        }

        .form-control:focus {
            border-color: #5cb85c;
        }

        .form-control,
        .btn {
            border-radius: 3px;
        }

        .signup-form {
            margin: 0 auto;
            padding: 30px 0;
            font-size: 15px;
        }

        .signup-form h2 {
            color: #636363;
            margin: 0 0 15px;
            position: relative;
            text-align: center;
        }

        .signup-form h2:before,
        .signup-form h2:after {
            content: "";
            height: 2px;
            width: 30%;
            background: #d4d4d4;
            position: absolute;
            top: 50%;
            z-index: 2;
        }

        .signup-form h2:before {
            left: 0;
        }

        .signup-form h2:after {
            right: 0;
        }

        .signup-form .hint-text {
            color: #999;
            margin-bottom: 30px;
            text-align: center;
        }

        .signup-form form {
            color: #999;
            border-radius: 3px;
            margin-bottom: 15px;
            background: #f2f3f7;
            box-shadow: 0 2px 2px rgba(0, 0, 0, 0.3);
            padding: 30px;
        }

        .signup-form .form-group {
            margin-bottom: 20px;
        }

        .signup-form input[type="checkbox"] {
            margin-top: 3px;
        }

        .signup-form .btn {
            font-size: 16px;
            font-weight: bold;
            min-width: 140px;
            outline: none !important;
            background-color: purple;
            color: whitesmoke;
        }

        .signup-form .row div:first-child {
            padding-right: 10px;
        }

        .signup-form .row div:last-child {
            padding-left: 10px;
        }

        .signup-form a {
            color: #fff;
            text-decoration: underline;
        }

        .signup-form a:hover {
            text-decoration: none;
        }

        .signup-form form a {
            color: #5cb85c;
            text-decoration: none;
        }

        .signup-form form a:hover {
            text-decoration: underline;
        }

        .modal-confirm {
            color: #434e65;
            width: 525px;
            margin: 30px auto;
        }

        .modal-confirm .modal-content {
            padding: 20px;
            font-size: 16px;
            border-radius: 5px;
            border: none;
        }

        .modal-confirm .modal-header {
            background: #47c9a2;
            border-bottom: none;
            position: relative;
            text-align: center;
            margin: -20px -20px 0;
            border-radius: 5px 5px 0 0;
            padding: 35px;
        }

        #errorModal .modal-confirm .modal-header {
            background: #e85e6c;
        }

        .modal-confirm h4 {
            text-align: center;
            font-size: 36px;
            margin: 10px 0;
        }

        .modal-confirm .form-control, .modal-confirm .btn {
            min-height: 40px;
            border-radius: 3px;
        }

        .modal-confirm .close {
            position: absolute;
            top: 15px;
            right: 15px;
            color: #fff;
            text-shadow: none;
            opacity: 0.5;
            border-style: none;
            background-color: #47c9a2;
        }

        .modal-confirm .close {
            background-color: #e85e6c;
        }

        .modal-confirm .close:focus {
            outline-style: none;
        }

        .modal-confirm .close:hover {
            opacity: 0.8;
        }

        .modal-confirm .icon-box {
            color: #fff;
            width: 95px;
            height: 95px;
            display: inline-block;
            border-radius: 50%;
            z-index: 9;
            border: 5px solid #fff;
            padding: 15px;
            text-align: center;
        }

        .modal-confirm .icon-box i {
            font-size: 64px;
            margin: -4px 0 0 -4px;
        }

        .modal-confirm .btn {
            color: #fff;
            background: #eeb711;
            text-decoration: none;
            transition: all 0.4s;
            line-height: normal;
            border-radius: 30px;
            margin-top: 10px;
            padding: 6px 20px;
            border: none;
        }

        .modal-confirm .btn:hover, .modal-confirm .btn:focus {
            background: #eda645;
            outline: none;
        }

        .modal-confirm .btn span {
            margin: 1px 3px 0;
            float: left;
        }

        .modal-confirm .btn i {
            margin-left: 1px;
            font-size: 20px;
            float: right;
        }

        .icon-box {
            margin: auto;
        }

        .modal_icon {
            font-size: 50px;
            color: white;

        }

        .modal_icon {
            font-size: 50px;
            color: white;
            font-weight: bold;
        }

    </style>
</head>

<body>
<div class="signup-form col-xs-11 col-sm-11 col-md-10 col-xl-6 col-lg-7">
    <form method="post" enctype="multipart/form-data" class="col-12 application_form" id="application_form">
        <h2>Application form</h2>
        <p class="hint-text">Apply here. It's free and only takes a minute.</p>
        <div class="form-group">
            <div class="row">
                <div class="col"><input type="text" class="form-control" name="first_name" placeholder="First Name"
                    ></div>
                <div class="col"><input type="text" class="form-control" name="middle_name" placeholder="Middle Name">
                </div>
                <div class="col"><input type="text" class="form-control" name="last_name" placeholder="Last Name"
                    ></div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col"><select class="form-control" name="gender">
                        <option disabled selected>Gender</option>
                        <option>Male</option>
                        <option>Female</option>
                    </select></div>
                <div class="col"><input type="date" class="form-control" name="dob" placeholder="Date of Birth"
                    ></div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col">
                    <select class="form-control" name="marital_status">
                        <option disabled selected>Marital Status</option>
                        <option value="Single">Single</option>
                        <option value="Married">Married</option>
                        <option value="Divorced">Divorced</option>
                    </select>
                </div>
                <div class="col">
                    <select class="form-control" name="health_status" id="health_status">

                    </select>
                </div>
                <div class="col">
                    <select class="form-control" name="religion">
                        <option disabled selected>Religion</option>
                        <option value="Chirstian">Christian</option>
                        <option value="Islam">Islam</option>
                        <option value="Pagan">Pagan</option>
                        <option value="Budha">Budha</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="course" placeholder="Course studied">
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col">
                    <select class="form-control" name="bank_name" id="bank_names">

                    </select></div>
                <div class="col"><input type="text" class="form-control" name="account_no" placeholder="Account number">
                </div>
                <div class="col">
                    <select class="form-control" name="account_type" id="account_type">
                        <option disabled selected>Account Type</option>
                        <option value="Current">Currrent</option>
                        <option value="Domiciliary">Domiciliary</option>
                        <option value="Fixed Deposit">Fixed Deposit</option>
                        <option value="Joint Account">Joint Account</option>
                        <option value="Savings">Savings</option>
                    </select></div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col">
                    <select class="form-control" name="state_of_origin" id="state_of_origin">
                    </select></div>
                <div class="col">
                    <select class="form-control" name="lga" id="lga">

                    </select></div>
            </div>
        </div>
        <div class="form-group">
            <textarea class="form-control" name="home_address" placeholder="Home Address"></textarea>
        </div>
        <div class="form-group">
            <input type="tel" class="form-control" name="phone" placeholder="Phone" autocomplete="on">
        </div>
        <div class="form-group">
            <input type="email" class="form-control" name="email" placeholder="Email">
        </div>
        <div class="form-group">
            <input type="file" class="form-control" name="passport" placeholder="Passport">
        </div>
        <div class="form-group">
            <label class="form-check-label"><input id="agreement" type="checkbox"> I accept the <a
                        href="#">Terms of Use</a> &amp; <a href="#">Privacy Policy</a></label>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-lg btn-block apply" style="background-color: darkgreen">Apply Now
            </button>
        </div>
    </form>
</div>

<!-- Modal HTML -->
<div id="successModal" class="modal fade">
    <div class="modal-dialog modal-confirm">
        <div class="modal-content">
            <div class="modal-header">
                <div class="icon-box">
                    <i class="material-icons modal_icon fas fa-check"></i>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body text-center">
                <h4>Great!</h4>
                <p></p>
                <button class="btn btn-success" data-dismiss="modal"><span>Start Exploring</span> <i
                            class="material-icons fas fa-arrow-right"></i></button>
            </div>
        </div>
    </div>
</div>


<!-- Modal HTML -->
<div id="errorModal" class="modal fade col-xs-6 col-sm-6">
    <div class="modal-dialog modal-confirm">
        <div class="modal-content">
            <div class="modal-header">
                <div class="icon-box">
                    <i class="material-icons modal_icon fas fa-times"></i>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body text-center">
                <h4>Ooops!</h4>
                <p>Something went wrong. File was not uploaded.</p>
                <button class="btn btn-success" data-dismiss="modal" id="back">Try Again</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal HTML -->
<div id="systemErrorModal" class="modal fade">
    <div class="modal-dialog modal-confirm">
        <div class="modal-content">
            <div class="modal-header">
                <div class="icon-box">
                    <i class="material-icons">&#xE86B;</i>
                    <i class="material-icons">&#xE86B;</i>
                    <i class="material-icons">&#xE645;</i>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <h4>Something went wrong</h4>
                <p>An unexpected error has occurred. Please try again later. Contact support if the error persists.</p>
                <button class="btn btn-primary" data-dismiss="modal">Go Back</button>
            </div>
        </div>
    </div>
</div>
<script src="../../Pluggins/Jquery/jquery-3.5.1.min.js"></script>
<script src="../../Scripts/teachers_application_form.js"></script>
<script src="../../Scripts/load_states_and_lga.js"></script>
<script src="../../Scripts/load_banks.js"></script>
<script src="../../Scripts/load_health_status.js"></script>
<script src="../../Pluggins/Jquery/popper.min.js"></script>
<script src="../../Pluggins/Bootstrap/js/bootstrap.min.js"></script>
<script src="../../Pluggins/awesome/js/fontawesome.min.js"></script>
<script src="../../Pluggins/awesome/js/all.min.js"></script>
<script>
    $(document).ready(function () {
        $(".close, #back").click(function () {
            $(".modal").modal('hide');
        });
    });
</script>

</body>

</html>