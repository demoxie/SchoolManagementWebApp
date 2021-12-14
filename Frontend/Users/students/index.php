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


    </style>

</head>

<body>

<div class="main">

    <div class="container">
        <h3>ADMISSION FORM </h3>
        <div class="header">
            <div class="form_step_label">
                <div class="numbering"><h6>1</h6></div>
                <div class="label"><h6 class="step">Personal Details</h6></div>
            </div>
            <div class="form_step_label">
                <div class="numbering "><h6>2</h6></div>
                <div class="label"><h6 class="step">Parent's/Guardian Details</h6></div>
            </div>
            <div class="form_step_label">
                <div class="numbering "><h6>3</h6></div>
                <div class="label"><h6 class="step">Recent Academic Details</h6></div>
            </div>
            <div class="form_step_label">
                <div class="numbering"><h6>4</h6></div>
                <div class="label"><h6 class="step">Contact Details</h6></div>
            </div>

        </div>
        <form method="post" role="form" enctype="multipart/form-data" autocomplete="off" id="admission-form"
              class="step_form">
            <fieldset>
                <h6>PERSONAL DETAILS</h6>
                <div class="input_container">
                    <div class="sub_container">
                        <input class="form-control" type="text" name="first_name" id="first_name"
                               placeholder="First Name">
                        <span class="error_response invalid-feedback"></span>
                    </div>


                    <div class="sub_container">
                        <input class="form-control" type="text" name="middle_name" id="middle_name"
                               placeholder="Middle Name">
                        <span class="error_response invalid-feedback"></span>
                    </div>
                    <div class="sub_container">
                        <input class="form-control" type="text" name="last_name" id="last_name" placeholder="Last Name">
                        <span class="error_response invalid-feedback"></span>
                    </div>
                </div>

                <div class="input_container">
                    <div class="sub_container">
                        <select class="custom-select" aria-label="Default select example" name="gender"
                                id="gender">
                            <option selected disabled>Gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Transgender">Transgender</option>
                        </select>
                        <span class="error_response invalid-feedback"></span>
                    </div>
                    <div class="sub_container">
                        <input class="form-control" type="date" name="date_of_birth"
                               id="date_of_birth"><span class="error_response invalid-feedback"></span>
                    </div>
                    <div class="sub_container">
                        <select class="custom-select" name="health_status" id="health_status">
                            <option selected disabled>Health Status</option>
                        </select>
                        <span class="error_response invalid-feedback"></span>
                    </div>
                </div>
                <div class="input_container">
                    <div class="sub_container">
                        <select class="custom-select" name="religion" id="religion">
                            <option selected disabled>Religion</option>
                            <option value="Christian">Christian</option>
                            <option value="Islam">Islam</option>
                            <option value="Budha">Budha</option>
                        </select>
                        <span class="error_response invalid-feedback"></span>
                    </div>
                    <div class="sub_container">
                        <input class="form-control" type="text" id="denomination" name="denomination"
                               placeholder="Denomination">
                        <span class="error_response invalid-feedback"></span>
                    </div>
                </div>
                <div class="input_container">
                    <div class="sub_container">
                        <textarea class="form-control" rows="2" name="emotional_behavior"
                                  id="emotional_behavior" placeholder="Emotional behavior"></textarea>
                        <span class="error_response invalid-feedback"></span>
                    </div>
                    <div class="sub_container">
                        <textarea class="form-control" rows="2" name="social_behavior"
                                  id="social_behavior" placeholder="Social behavior"></textarea>
                        <span class="error_response invalid-feedback"></span>
                    </div>
                    <div class="sub_container">
                        <textarea class="form-control" rows="2" name="spiritual_behavior"
                                  id="spiritual_behavior" placeholder="Spiritual behavior"></textarea>
                        <span class="error_response invalid-feedback"></span>
                    </div>
                </div>
                <div class="input_container" id="image-input-container">
                    <div class="sub_container">
                        <input class="form-control-file" type="file" name="passport" id="passport">
                        <span class="error_response invalid-feedback"></span>
                    </div>
                </div>

                <div class="button-container"><input type="button" class="next btn col-3" value="Next"></div>
            </fieldset>
            <fieldset>
                <h6>PARENT'S/GUARDIAN DETAILS</h6>
                <div class="input_container">
                    <div class="sub_container"><input class="form-control" type="text" name="p_first_name"
                                                      id="p_first_name" placeholder="Name"><span
                                class="error_response invalid-feedback"></span></div>
                    <div class="sub_container"><input class="form-control" type="text" name="p_middle_name"
                                                      id="p_middle_name" placeholder="Middle Name"><span
                                class="error_response invalid-feedback"></span></div>
                    <div class="sub_container"><input class="form-control" type="text" name="p_last_name"
                                                      id="p_last_name" placeholder="Last Name"><span
                                class="error_response invalid-feedback"></span></div>
                </div>
                <div class="input_container">
                    <div class="sub_container">
                        <input class="form-control" type="email" name="p_email" id="p_email" placeholder="Email">
                        <span class="error_response invalid-feedback"></span>
                    </div>
                    <div class="sub_container"><input class="form-control" type="tel" name="p_phone_no"
                                                      placeholder="Phone no" id="p_phone_no">
                        <span class="error_response invalid-feedback"></span></div>
                </div>
                <div class="button-container">
                    <input type="button" class="previous btn btn-default col-3" value="Previous">
                    <input type="button" class="next btn col-3" value="Next">
                </div>

            </fieldset>
            <fieldset>
                <h6>RECENT ACADEMIC DETAILS</h6>
                <div class="input_container">
                    <div class="sub_container"><input class="form-control" type="text" name="school_name"
                                                      id="school_name" placeholder="School name">
                        <span class="error_response invalid-feedback"></span>
                    </div>
                    <div class="sub_container"><input class="form-control" type="text" name="prev_class"
                                                      id="prev_class" placeholder="Previous class">
                        <span class="error_response invalid-feedback"></span>
                    </div>
                    <div class="sub_container"><input class="form-control" type="text" name="pres_class"
                                                      id="pres_class" placeholder="Present class">
                        <span class="error_response invalid-feedback"></span>
                    </div>
                </div>
                <div class="input_container">
                    <div class="sub_container">
                        <input class="form-control" type="text" name="pos_or_grade" id="pos_or_grade"
                               placeholder="Position/Grade obtained">
                        <span class="error_response invalid-feedback"></span>
                    </div>
                </div>

                <div class="button-container">
                    <input type="button" class="previous btn btn-default col-3" value="Previous">
                    <input type="button" class="next btn col-3" value="Next">

                </div>

            </fieldset>
            <fieldset>
                <h6>CONTACT DETAILS</h6>
                <div class="input_container">
                    <div class="sub_container addresses">
                        <textarea class="form-control" rows="2" name="office_address" id="office_address"
                                  placeholder="Office address"></textarea>
                        <span class="error_response invalid-feedback"></span>
                    </div>
                    <div class="sub_container addresses">
                        <textarea class="form-control" rows="2" name="postal_address" id="postal_address"
                                  placeholder="Postal address"></textarea>
                        <span class="error_response invalid-feedback"></span></div>
                    <div class="sub_container addresses">
                        <textarea class="form-control" rows="2" name="residential_address" id="resident_address"
                                  placeholder="Residential address"></textarea>
                        <span class="error_response invalid-feedback"></span>
                    </div>
                </div>

                <div class="input_container">
                    <div class="sub_container">
                        <select class="custom-select states" aria-label="Default select example"
                                id="state_of_origin"
                                name="state_of_origin">
                        </select>
                        <span class="error_response invalid-feedback"></span>
                    </div>
                    <div class="sub_container">
                        <select class="custom-select lga" aria-label="Default select example" id="lga" name="lga">
                        </select>
                        <span class="error_response invalid-feedback"></span>
                    </div>

                </div>
                <div class="button-container">
                    <input type="button" class="previous btn btn-default col-3" value="Previous">
                    <input type="button" class="submit btn col-3" id="btn-submit" value="Submit">

                </div>

            </fieldset>

        </form>
    </div>

</div>
<!-- Modal HTML -->
<div id="myModal" class="modal fade">
    <div class="modal-dialog modal-confirm">
        <div class="modal-content">
            <div class="modal-header">
                <div class="icon-box">
                    <i class="fas fa-check fa-3x"></i>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body text-center">
                <h4>Great!</h4>
                <p>Your account has been created successfully.</p>
                <button class="btn btn-success" data-dismiss="modal" id="for-reg"></button>
            </div>
        </div>
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
<script src="../../Scripts/load_health_status.js"></script>
<script src="../../Scripts/load_states_and_lga.js"></script>
<script src="../../Scripts/admission_form.js"></script>
<script src="../../Scripts/submit_admission_form.js"></script>
<script src="../../Pluggins/Bootstrap/js/bootstrap.min.js"></script>
<script src="../../Pluggins/awesome/js/fontawesome.min.js"></script>
<script src="../../Pluggins/awesome/js/all.min.js"></script>
</body>
</html>