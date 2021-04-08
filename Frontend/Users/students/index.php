<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="colorlib.com">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admission Form</title>
    <link rel="stylesheet" href="../../Pluggins/Bootstrap/css/bootstrap.min.css">
    <link rel="icon" href="../../../Backend/Src/Icons/logo.png">
    <link rel="stylesheet" href="../../Stylesheets/icon.css">
    <link rel="stylesheet" href="../../Stylesheets/success_modal.css">
    <link rel="stylesheet" href="../../Stylesheets/systemErrorModal.css">
    <link rel="stylesheet" href="../../Stylesheets/admission_form_style.css">
    <link rel="stylesheet" href="../../Pluggins/awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../Pluggins/awesome/css/all.min.css">
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            background-color: darkseagreen;
            font-family: Roboto, Helvetica, Arial, sans-serif;
            padding: 0;
        }


        #admission-form fieldset:not(:first-of-type) {
            display: none;
            margin: 0 auto;
        }

        .active {
            opacity: 1;
        }

        .inactive {
            opacity: 0.5;
        }

        h3, form, .header {
            display: block;
        }

        h3 {
            margin-top: 20px;
            text-align: center;
            color: darkgreen;
            text-shadow: -1px 0 greenyellow, 0 1px black, 1px 0 black, 0 -1px black;
        }

        @media screen and (max-width: 600px) {
            .main .container {
                width: 75vw;
                height: auto;
            }

            .header {
                display: flex;
                flex-flow: column nowrap;
                justify-content: center;
                align-items: center;
            }

            .form_step_label {
                width: 100%;
                display: block;
                margin-top: 10px;
                margin-left: 0;
                margin-right: 0;
            }

            .form_step_label:hover {
                background: darkgreen;
                color: white;
                opacity: 0.5;
                transition: opacity 0.4s;
                cursor: pointer;
            }

            .btn {
                display: inline-block;
                float: right;
                margin-bottom: 20px;
            }

            .input_container .sub_container {
                margin-left: 10px;
                margin-right: 10px;
                margin-top: 20px;
                width: 95%;
                height: 30px;
            }

            #passport {
                margin: 25px auto;
                width: 100%;
            }

        }

        @media screen and (min-width: 620px) and (max-width: 992px) {
            .header {
                align-items: baseline;
                display: flex;
                flex-flow: row wrap;
            }

            .form-control, .form-select {
                font-size: 12px;
                width: 100%;
            }


        }

        .numbering {
            border-radius: 50%;
            display: flex;
            border: 2px groove black;
            align-items: center;
            justify-content: center;
            width: 30px;
            height: 30px;
        }

        .numbering h6 {
            text-align: center;
            line-height: 26px; /* The same as your div height */
        }

        .numbering, h5 {
            display: inline-block;
        }

        .label {
            height: 30px;
            flex-basis: max-content;
            flex-grow: inherit;
            margin-left: 9px;
            display: flex;
            flex-flow: column;
            justify-content: center;
            align-items: center;
            vertical-align: middle;
            margin-top: 10px;
        }

        .previous {
            border: 1px solid #C4C4C4;
        }

        .previous:hover {
            background: #C4C4C4;
        }

        .next, .submit {
            background: darkgreen;
            color: white;
        }

        .next:hover {
            background: #0b2e13;
            color: white;
        }

        .submit:hover {
            background: #0b2e13;
            color: white;
        }

        .form_step_label {
            display: flex;
            flex-flow: row nowrap;
            align-items: center;
        }

        .form_step_label:hover {
            cursor: pointer;
            opacity: 0.7;
        }

        .header {
            border-top: 1px solid black;
            border-bottom: 1px solid black;
            padding-block: 5px;
            margin: 5px auto 20px;
            display: flex;
            justify-content: space-evenly;
            align-items: center;
        }

        .sub_container {
            margin-inline: 10px;
            width: 30%;
            height: 30px;
        }

        .btn {
            display: inline-block;
            float: right;
            border-radius: 40px;
            padding: 7px 0;
            margin: 50px 10px 30px 0;
        }

        form fieldset {
            margin: auto auto;
            width: 100%;
        }

        fieldset h6 {
            text-align: center;
            margin-left: 10px;
            margin-right: 10px;
        }

        .input_container {
            margin-top: 45px;
            padding: 0;
            display: flex;
            justify-content: space-between;
            align-items: center;
            align-content: space-evenly;
            flex-flow: row wrap;
        }


        #admission-form {
            margin: 0 auto;
        }

        .container {
            background-color: white;
            border: 1px dashed red;
            margin: 2% auto;
            padding-top: 2px;
            border-radius: 10px;
            width: 75vw;
            height: auto;
        }

        .form-control, .form-select {
            border: none;
            border-bottom: 1px solid #0b2e13;
            background: none;
            border-radius: 0;
            width: 100%;
            font-size: 16px;
            text-indent: 0;
            padding: 0;
        }

        .error_response {
            font-size: 11px;
            width: auto;
            height: auto;
            margin-left: 0;
            margin-outside: 0;
            object-fit: scale-down;

        }

        .error_response::after {
            clear-after: both;
        }

        #passport {
            border-radius: 4px;
            float: left;
            margin-top: 25px;
            border: none;
        }

        textarea {
            resize: none;
            text-indent: 0;
            overflow: hidden;
        }

        textarea::placeholder {
            line-height: 11.5vh;
        }

        ::placeholder {
            text-align: left;
            color: black;
            font-size: 0.8em;
            margin: 0;
            padding: 0;
        }


        textarea:hover,
        input:hover,
        textarea:active,
        select:focus,
        input:active,
        textarea:focus,
        input:focus,
        .close,
        .try_again,
        .btn:active {
            outline: 0 !important;
            -webkit-appearance: none;
            box-shadow: none !important;
        }

        .close {
            border-style: none;
            padding: 5px 15px;
            font-size: 15px;
            background: none;
        }

        .try_again {
            border-style: none;
            background: orange;
            color: white;
            padding: 5px 25px;
            border-radius: 20px;
        }

        .modal_icon {
            font-size: 50px;
            color: white;
            font-weight: bold;
        }


    </style>

</head>

<body>

<div class="main" style="margin: auto">

    <div class="container">
        <h3>Admission form </h3>
        <div class="header col-11">
            <div class="form_step_label one active">
                <div class="numbering"><h6>1</h6></div>
                <div class="label"><h6 class="step">Personal Details</h6></div>
            </div>
            <div class="form_step_label two inactive">
                <div class="numbering "><h6>2</h6></div>
                <div class="label"><h6 class="step">Parent's/Guardian Details</h6></div>
            </div>
            <div class="form_step_label three inactive">
                <div class="numbering "><h6>3</h6></div>
                <div class="label"><h6 class="step">Recent Academic Details</h6></div>
            </div>
            <div class="form_step_label four inactive">
                <div class="numbering"><h6>4</h6></div>
                <div class="label"><h6 class="step">Contact Details</h6></div>
            </div>

        </div>
        <form method="post" role="form" enctype="multipart/form-data" autocomplete="off" id="admission-form"
              class="step_form form-inline col-sm-12 col-lg-10 col-xl-9 col-xxl-10">
            <fieldset>
                <h6>PERSONAL DETAILS</h6>
                <div class="input_container row">
                    <div class="sub_container col-4">
                        <input class="form-control col-12" type="text" name="first_name"
                               id="first_name" placeholder="First Name">
                        <span class="error_response invalid-feedback"></span>
                    </div>


                    <div class="sub_container col-4">
                        <input class="form-control col-12" type="text" name="middle_name"
                               id="middle_name" placeholder="Middle Name">
                        <span class="error_response invalid-feedback"></span>
                    </div>
                    <div class="sub_container col-4">
                        <input class="form-control col-12" type="text" name="last_name"
                               id="last_name" placeholder="Last Name">
                        <span class="error_response invalid-feedback"></span>
                    </div>
                </div>

                <div class="input_container row">
                    <div class="sub_container col-4">
                        <select class="form-select col-12" aria-label="Default select example" name="gender"
                                id="gender">
                            <option selected disabled>Gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Transgender">Transgender</option>
                        </select>
                        <span class="error_response invalid-feedback"></span>
                    </div>
                    <div class="sub_container col-4">
                        <input class="form-control col-12" type="date" name="date_of_birth"
                               id="date_of_birth">
                        <span class="error_response invalid-feedback"></span></div>
                    <div class="col sub_container col-4">
                        <select class="form-select col-12" aria-label="Default select example" name="health_status"
                                id="health_status">
                            <option selected disabled>Health Status</option>
                        </select>
                        <span class="error_response invalid-feedback"></span>
                    </div>
                </div>
                <div class="input_container row">
                    <div class="sub_container col-6">
                        <select class="form-select col-12" aria-label="Default select example" name="religion"
                                id="religion">
                            <option selected disabled>Religion</option>
                            <option value="Christian">Christian</option>
                            <option value="Islam">Islam</option>
                            <option value="Budha">Budha</option>
                        </select>
                        <span class="error_response invalid-feedback"></span>
                    </div>
                    <div class="sub_container col-6">
                        <input class="form-control col-12" type="text" id="denomination" name="denomination"
                               placeholder="Denomination">
                        <span class="error_response invalid-feedback"></span>
                    </div>

                </div>
                <div class="input_container row">
                    <div class="sub_container">
                        <textarea class="form-control col-12" rows="2" name="emotional_behavior"
                                  id="emotional_behavior" placeholder="Emotional behavior"></textarea>
                        <span class="error_response invalid-feedback"></span>
                    </div>
                    <div class="sub_container">
                        <textarea class="form-control col-12" rows="2" name="social_behavior"
                                  id="social_behavior" placeholder="Social behavior"></textarea>
                        <span class="error_response invalid-feedback"></span>
                    </div>
                    <div class="sub_container">
                        <textarea class="form-control col-12" rows="2" name="spiritual_behavior"
                                  id="spiritual_behavior" placeholder="Spiritual behavior"></textarea>
                        <span class="error_response invalid-feedback"></span>
                    </div>
                </div>
                <div class="input_container row">
                    <div class="col-4 sub_container">
                        <input class="custom-file-input" type="file" name="passport"
                               id="passport">
                        <span class="error_response invalid-feedback"></span>
                    </div>
                </div>
                <input type="button" class="next btn col-3" value="Next">
            </fieldset>
            <fieldset>
                <h6>PARENT'S/GUARDIAN DETAILS</h6>
                <div class="input_container row">
                    <div class="sub_container"><input class="form-control col-12" type="text" name="p_first_name"
                                                      id="p_first_name" placeholder="Name"><span
                                class="error_response invalid-feedback"></span></div>
                    <div class="sub_container"><input class="form-control col-12" type="text" name="p_middle_name"
                                                      id="p_middle_name" placeholder="Middle Name"><span
                                class="error_response invalid-feedback"></span></div>
                    <div class="sub_container"><input class="form-control col-12" type="text" name="p_last_name"
                                                      id="p_last_name" placeholder="Last Name"><span
                                class="error_response invalid-feedback"></span></div>
                </div>
                <div class="input_container row">
                    <div class="sub_container">
                        <input class="form-control col-12" type="email" name="p_email" id="p_email" placeholder="Email">
                        <span class="error_response invalid-feedback"></span>
                    </div>
                    <div class="sub_container"><input class="form-control col-12" type="tel" name="p_phone_no"
                                                      placeholder="Phone no" id="p_phone_no">
                        <span class="error_response invalid-feedback"></span></div>
                </div>
                <input type="button" class="next btn col-3" value="Next">
                <input type="button" class="previous btn btn-default col-3" value="Previous">

            </fieldset>
            <fieldset>
                <h6>RECENT ACADEMIC DETAILS</h6>
                <div class="input_container row">
                    <div class="sub_container"><input class="form-control col-12" type="text" name="school_name"
                                                      id="school_name" placeholder="School name">
                        <span class="error_response invalid-feedback"></span>
                    </div>
                    <div class="sub_container"><input class="form-control col-12" type="text" name="prev_class"
                                                      id="prev_class" placeholder="Previous class">
                        <span class="error_response invalid-feedback"></span>
                    </div>
                    <div class="sub_container"><input class="form-control col-12" type="text" name="pres_class"
                                                      id="pres_class" placeholder="Present class">
                        <span class="error_response invalid-feedback"></span>
                    </div>
                </div>
                <div class="input_container row">
                    <div class="sub_container">
                        <input class="form-control col-12" type="text" name="pos_or_grade" id="pos_or_grade"
                               placeholder="Position/Grade obtained">
                        <span class="error_response invalid-feedback"></span>
                    </div>
                </div>

                <input type="button" class="next btn col-3" value="Next">
                <input type="button" class="previous btn btn-default col-3" value="Previous">

            </fieldset>
            <fieldset>
                <h6>CONTACT DETAILS</h6>
                <div class="input_container row">
                    <div class="sub_container addresses">
                        <textarea class="form-control col-12" rows="2" name="office_address" id="office_address"
                                  placeholder="Office address"></textarea>
                        <span class="error_response invalid-feedback"></span>
                    </div>
                    <div class="sub_container addresses">
                        <textarea class="form-control col-12" rows="2" name="postal_address" id="postal_address"
                                  placeholder="Postal address"></textarea>
                        <span class="error_response invalid-feedback"></span></div>
                </div>
                <div class="input_container row">
                    <div class="sub_container addresses">
                        <textarea class="form-control col-12" rows="2" name="residential_address" id="resident_address"
                                  placeholder="Residential address"></textarea>
                        <span class="error_response invalid-feedback"></span>
                    </div>
                </div>
                <div class="input_container">
                    <div class="sub_container">
                        <select class="form-select col-12 states" aria-label="Default select example"
                                id="state_of_origin"
                                name="state_of_origin">
                        </select>
                        <span class="error_response invalid-feedback"></span>
                    </div>
                    <div class="sub_container">
                        <select class="form-select col-12 lga" aria-label="Default select example" id="lga" name="lga">
                        </select>
                        <span class="error_response invalid-feedback"></span>
                    </div>

                </div>
                <input type="button" class="submit btn col-3" id="btn-submit" value="Submit">
                <input type="button" class="previous btn btn-default col-3" value="Previous">

            </fieldset>

        </form>
    </div>

</div>
<!-- Modal HTML -->
<div id="successModal" class="modal fade">
    <div class="modal-dialog modal-confirm">
        <div class="modal-content">
            <div class="modal-header">
                <div class="">
                    <i class="fas fa-check"></i>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body text-center">
                <h4>Great!</h4>
                <p></p>
                <button class="btn btn-success" data-dismiss="modal"><span>Start Exploring</span> <i
                            class="material-icons">&#xE5C8;</i></button>
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
                    <i class="material-icons fas fa-info"></i>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body text-center">
                <h4>Ooops!</h4>
                <p></p>
                <button class="try_again" data-dismiss="modal" id="back">Try Again</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal HTML -->
<div id="systemErrorModal" class="modal fade">
    <div class="modal-dialog modal-confirm">
        <div class="modal-content">
            <div class="modal-header">
                <div class="" style="margin: 6% auto">
                    <i class="fas fa-exclamation-triangle modal_icon"></i>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body text-center">
                <h4>Ooops!</h4>
                <p>Something went wrong. File was not uploaded.</p>
                <button class="try_again" data-dismiss="modal">Try Again</button>
            </div>
        </div>
    </div>
</div>
<!-- JS -->
<script src="../../Pluggins/Jquery/jquery-3.5.1.min.js"></script>
<script src="../../Scripts/admission_form.js"></script>
<script src="../../Scripts/submit_admission_form.js"></script>
<script src="../../Scripts/load_health_status.js"></script>
<script src="../../Scripts/load_states_and_lga.js"></script>
<script src="../../Pluggins/Bootstrap/js/bootstrap.min.js"></script>
<script src="../../Pluggins/awesome/js/fontawesome.min.js"></script>
<script src="../../Pluggins/awesome/js/all.min.js"></script>
</body>
</html>