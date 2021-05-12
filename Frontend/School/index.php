<!DOCTYPE html>
<html lang="en">
<head>
    <title>School Data Entry</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../Pluggins/Bootstrap/css/bootstrap.min.css">
    <link rel="icon" href="../../Backend/Src/Icons/rfc-logo.jpg">
    <script src="../Pluggins/Jquery/jquery-3.5.1.min.js"></script>
    <script src="../Scripts/add_school_data.js"></script>
    <script src="../Scripts/fetch_teachers.js"></script>
    <script src="../Pluggins/Bootstrap/js/bootstrap.min.js"></script>
    <style>
        * {
            box-sizing: border-box;
        }

        @media screen and (max-width: 400px){

            .container{
                width: 100%;
                margin: auto;
                display: block;
                flex-flow: column nowrap;
                justify-content: space-around;
                align-items: stretch;
            }
            .input-container{
                display: block;
                width: 20%;
                margin-block: 0.9rem;
            }
        }

        form {
            margin: 10% auto;

        }
        .form-control:hover,
        .form-control:active,
        .form-control:focus,
        .form-select:hover,
        .form-select:active,
        .form-select:focus{
            outline: none;
            appearance: none;
            box-shadow: none;
            border: 1px solid darkgreen;
        }
        .container{
            width: 100vw;
            margin: auto;
            display: flex;
            flex-flow: row wrap;
            justify-content: space-evenly;
            align-items: baseline;
        }
        .input-container{
            width: 25vw;
            margin-block: 0.9rem;

        }
        #add_school_data{
            background: darkgreen;
            color: white;
        }
        #add_school_data:hover{
            background: limegreen;
        }


    </style>
</head>
<body>
<form class="form-inline col-10" id="school_data_entry_form" method="post" role="form">
    <div class="container">
        <div class="col-12" id="result"></div>
        <div class="input-container"><input class="form-control" name="school_name" id="school_name" placeholder="school name" type="text"></div>
        <div class="input-container"><input class="form-control" name="school_address" id="school_address" placeholder="school address" type="text"></div>
        <div class="input-container"><input class="form-control" name="school_phone" id="school_phone" placeholder="school phone" type="tel"></div>
        <div class="input-container"><input class="form-control" name="school_email" id="school_email" placeholder="school email" type="email"></div>
        <div class="input-container"><input class="form-control" name="school_postal_box" id="school_postal_box" placeholder="school postal box" type="text"></div>
        <div class="input-container"><input class="form-control" name="school_motto" id="school_motto" placeholder="school motto" type="text"></div>
        <div class="input-container"><input class="form-control" name="school_logo" id="school_logo" placeholder="school logo" type="file"></div>
        <div class="input-container"><select class="form-select" name="head_teacher" id="head_teacher" >
                <option selected disabled>Head Teacher</option>
            </select></div>
        <div class="input-container"><input class="form-control" name="head_teach_sign" id="head_teach_sign" placeholder="head teacher signature" type="file"></div>
        <div class="input-container"><input class="form-control" name="add_school_data" id="add_school_data" type="button" value="Add Data"></div>


    </div>

</form>

</body>


</html>
