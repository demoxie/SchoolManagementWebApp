
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> DashBoard </title>

    <link href="../Pluggins/Bootstrap/css/bootstrap.min.css" type="text/css" rel="stylesheet">


    <link rel="stylesheet" href="../Stylesheets/icon.css">
    <link href="../Pluggins/awesome/css/fontawesome.min.css" rel="stylesheet">
    <link href="../Pluggins/awesome/css/brands.min.css" rel="stylesheet">
    <link href="../Pluggins/awesome/css/solid.min.css" rel="stylesheet">
    <link href="../Stylesheets/dashboard.css" rel="stylesheet">
    <link href="../Stylesheets/question_add_page_style.css" rel="stylesheet" type="text/css">
    <script src="../Pluggins/Jquery/jquery-3.5.1.min.js"></script>
    <script src="../Pluggins/Bootstrap/js/bootstrap.min.js"></script>
    <script src="../Scripts/add_question.js"></script>
    <script src="../Scripts/navToggleButton.js"></script>

</head>

<body>

    <section class="sidebar nav nav-pills" role="tablist">
        <button class="closebtn" onclick="closeNav()">×</button>
        <div class="avatar-container">
            <img src="../../Backend/upload/IMG_20200528_123733_091.jpg">
        </div>
        <div class="sidebar_buttons_container">
            <button class="sidebar_button col-12"><i class="fas fa-school"></i>School Info</button>
            <button class="sidebar_button col-12"><i class="fas fa-chalkboard-teacher"></i>View Teachers</button>
            <button class="sidebar_button col-12"><i class="fas fa-user-graduate"></i> View Students</button>
            <button class="sidebar_button col-12" id="subject_btn"><i class="fas fa-book"></i> View Classes</button>
            <button class="sidebar_button col-12"><i class="fas fa-address-card"></i>View Subject</button>
            <button class="sidebar_button col-12"><i class="fas fa-user-graduate"></i>Assessments</button>
            <button class="sidebar_button col-12"><i class="fas fa-user-graduate"></i>Account Management</button>
            <button class="sidebar_button col-12"><i class="fas fa-user-graduate"></i>Notifications</button>
            <button class="sidebar_button col-12"><i class="fas fa-user-graduate"></i>User Management</button>
        </div>



    </section>

    <header class="topbar col-12" id="topbar">
        <button class="openbtn" onclick="openNav()">☰</button>
        <div style="clear:right">
            <button class="login-button fas fa-user-circle"></button>
            <div id="myDropdown" class="dropdown-content">
                <a href="#profile" class="access">profile</a>
                <a href="#login" onclick="document.getElementById('id01').style.display='block'" style="width:auto;" class="access">login</a>
                <a href="#logout" class="access">logout</a>

            </div>
        </div>


    </header>

    <main class="tab-content">

        <form class="question-entry col-7 container tab-pane fade active" method="post" enctype="multipart/form-data" id="add_question_form" autocomplete="on">
            <div class="tophead">
                <h4 class="form-header">ADD QUESTION</h4>
            </div>
            <div class="opt-group col-12" id="subject-div">
                <label class="form-label col-lg-2 col-sm-12" for="select-subject" id="subject-label">Subject</label>
                <select class="subject opt_input form-control col-lg-3 col-sm-2" id="select-subject" name="subject">
                    <option disabled selected>Select Subject</option>
                    
                </select>

                <label class="form-label col-lg-2 col-sm-12" for="class" id="class-label">Class</label>
                <select class="class_name opt_input form-control col-lg-3 col-sm-2" id="class" name="class_name">
                    <option disabled selected>Select Class</option>
                    
                        
                </select>


                <div class="feedbackSubject"></div>
            </div>
            <div class="opt-group col-12" id="question-div">
                <label class="form-label col-lg-2 col-sm-12" for="picAvaialable" id="picAvaialable-label">Has picture?</label>
                <select class="hasPicture opt_input form-control col-lg-8 col-sm-10" style="margin: 10px auto" id="picAvaialable">
                    <option selected disabled>Does the question has picture?</option>
                    <option>Yes</option>
                    <option>No</option>
                </select>
                <label class="form-label col-lg-2 col-sm-10" for="question" id="question-label">Question</label>
                <textarea class="question opt_input form-control col-lg-8 col-sm-10" id="question" name="question" placeholder="Enter question here..." autocomplete="on"></textarea>
                <div class="feedbackQns"></div>
            </div>


            <div id="results" class="col-8"></div>

            <!-- Modal HTML -->
            <div id="myModal" class="modal fade" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header" style="background-color: red;">
                            <h5 class="modal-title" style="font-weight: bold">Error!</h5>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <center>
                                <p class="myerror" style="font-weight: 600"></p>
                            </center>
                            <!-- <p class="text-secondary"><small>If you don't save, your changes will be lost.</small></p>-->
                        </div>
                        <div class="modal-footer">

                        </div>
                    </div>
                </div>
            </div>

            <a class="select-label col-4" style="position: absolute;right:-7%;bottom: 55%;">Select Answer (s) </a>
            <div class="opt-group col-12" id="optA">

                <label class="form-label col-1" for="A">A</label>
                <input type="text" class="option opt_input form-control col-9" id="A" name="optionA">

                <input type="checkbox" class="answer opt_input col-1" id="answerA" name="answerA" value="A">
                <div class="feedbackOptA"></div>
            </div>
            <div class="opt-group col-12">
                <label class="form-label col-1" for="B">B</label>
                <input type="text" class="option opt_input form-control col-9" id="B" name="optionB">
                <input type="checkbox" class="answer opt_input col-1" id="answerB" name="answerB" value="B">
                <div class="feedbackOptB"></div>
            </div>
            <div class="opt-group col-12">
                <label class="form-label col-1" for="C">C</label>
                <input type="text" class="option opt_input form-control col-9" id="C" name="optionC">
                <input type="checkbox" class="answer opt_input col-1" id="answerC" name="answerC" value="C">
                <div class="feedbackOptC"></div>
            </div>
            <div class="opt-group col-12">
                <label class="form-label col-1" for="D">D</label>
                <input type="text" class="option opt_input form-control col-9" id="D" name="optionD">
                <input type="checkbox" class="answer opt_input col-1" id="answerD" name="answerD" value="D">
                <div class="feedbackOptD"></div>
            </div>
            <div class="opt-group col-12">
                <label class="form-label col-1" for="E">E</label>
                <input type="text" class="option opt_input form-control col-9" id="E" name="optionE">
                <input type="checkbox" class="answer opt_input col-1" id="answerE" name="answerE" value="E">
                <div class="feedbackOptE"></div>
            </div>

            <button type="submit" class="add-question btn btn-default col-lg-4 col-md-5 col-sm-5" id="add_question" name="add_question">Add Question</button>
        </form>





        <div id="id01" class="modal">

            <form class="modal-content animate" method="post">
                <div class="imgcontainer">
                    <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
                    <img src="../../Backend/upload/IMG_20200528_123733_091.jpg" alt="Avatar" class="avatar">
                </div>

                <div class="container">
                    <label for="uname"><b>Username</b></label>
                    <input type="text" placeholder="Enter Username" name="uname" required class="details">

                    <label for="psw"><b>Password</b></label>
                    <input type="password" placeholder="Enter Password" name="psw" class="details" required>

                    <button type="submit" class="btnsubmit">Login</button>
                    <label>
                        <input type="checkbox" checked="checked" name="remember"> Remember me
                    </label>
                </div>

                <div class="container" style="background-color:#f1f1f1">
                    <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
                    <span class="psw">Forgot <a href="#">password?</a></span>
                </div>
            </form>
        </div>
    </main>




</body>

</html>
