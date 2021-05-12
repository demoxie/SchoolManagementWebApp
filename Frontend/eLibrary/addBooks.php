<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="./_css/icon.css">
    <title>Staff Registration Form</title>
    <link rel="stylesheet" href="../Pluggins/Bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../Pluggins/awesome/css/fontawesome.min.css">
    <script src="../Pluggins/Jquery/jquery-3.5.1.min.js"></script>
    <script src="../Scripts/book.js"></script>
    <script src="../Pluggins/Jquery/popper.min.js"></script>
    <script src="../Pluggins/Bootstrap/js/bootstrap.min.js"></script>
    <style>
        body {
            color: #fff;
            background: #63738a;
            font-family: 'Roboto', sans-serif;
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
            box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
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
    </style>
</head>

<body>
<div class="signup-form col-xs-11 col-sm-11 col-md-10 col-xl-6 col-lg-7">
    <form method="post" enctype="multipart/form-data" class="col-12" id="addBook">
        <h2>Add Books</h2>
        <p class="hint-text">Upload your book here. It's free and only takes a minute.</p>
        <div class="form-group">
            <div class="row">
                <div class="col"><input type="text" class="form-control" name="title" placeholder="Book Title"
                                        required="required"></div>
                <div class="col"><input type="text" class="form-control" name="author" placeholder="Book Author"
                                        required="required"></div>
                <div class="col"><input type="text" class="form-control" name="publisher" placeholder="Book Publisher"
                                        required="required"></div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col"><input type="year" class="form-control" name="yearpublished"
                                        placeholder="Year Published" required></div>
                <div class="col"><select class="form-control" name="edition">
                        <option disabled selected>Edition</option>
                        <option value="1st Edition">1st Edition</option>
                        <option value="2nd Edition">2nd Edition</option>
                        <option value="3rd Edition">3rd Edition</option>
                        <option value="4th Edition">4th Edition</option>
                        <option value="5th Edition">5th Edition</option>
                        <option value="6th Edition">6th Edition</option>
                        <option value="7th Edition">7th Edition</option>
                        <option value="8th Edition">8th Edition</option>
                        <option value="9th Edition">9th Edition</option>
                        <option value="10th Edition">10th Edition</option>
                        <option value="Revised Edition">Revised Edition</option>
                    </select></div>
            </div>
        </div>
        <div class="form-group">
            <input class="form-control" name="category" placeholder="Book Category" required="required">
        </div>
        <div class="form-group">
            <input class="form-control" type="file" name="file" id="file" required="required">
        </div>

        <div class="form-group">
            <label class="form-check-label"><input type="checkbox" required="required"> I accept the <a href="#">Terms
                    of Use</a> &amp; <a href="#">Privacy Policy</a></label>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-lg btn-block">Register Now</button>
        </div>
    </form>
    <div class="text-center">Already have an account? <a href="#">Sign in</a></div>
</div>
</body>

</html>