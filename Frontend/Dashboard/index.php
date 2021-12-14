<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>ADMIN DASHBOARD</title>
    <meta name="description" content="AG Modern Admin Dashboard">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="../../Backend/Src/Icons/rfc-logo.jpg"/>
    <link rel="stylesheet" href="../Stylesheets/dashboard_media_query.css"/>
    <link rel="stylesheet" href="../Pluggins/Bootstrap/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="../Pluggins/awesome/css/all.min.css"/>
    <script src="../Pluggins/Jquery/jquery-3.5.1.min.js"></script>
    <script src="../Scripts/access.js"></script>
    <script src="../Scripts/dashboard.js"></script>
    <script src="../Scripts/login.js"></script>
    <script src="../Pluggins/Bootstrap/js/bootstrap.min.js"></script>
    <script src="../Pluggins/awesome/js/all.min.js"></script>
    <style>
        /*ASSESSMENT MANAGEMENT PADE STYLE*/
        .menu {
            width: 90%;
            display: grid;
            grid-template-columns: auto auto auto;
            justify-content: space-evenly;
            background-color: whitesmoke;
        }

        .menu h2 {
            text-align: center;
            color: red;
            text-shadow: -1px 0 green, 0 1px green, 1px 0 green, 0 -1px green;
        }

        .menu .btn {
            height: 10rem;
            margin: 20px 20px;
            text-align: center;
            line-height: 3rem;
            font-stretch: normal;
            background-color: white;
            border: 2px solid orangered;
        }

        .menu .btn:hover {
            background-color: #0d152a;
            border-color: orangered;
            color: white;
        }


        /*ENDS HERE --------------------*/
        /*MENU TITLES*/
        h3 {
            color: whitesmoke;
            border: 2px solid orangered;
            padding: 5px 15px;
            margin-bottom: 0;
            margin-top: 0;
            background-color: darkgreen;
            border-radius: 0.3rem;
        }

        .container-fluid {
            height: auto;
            overflow: hidden;
            display: grid;
            grid-template-columns: 20vw 80vw;
            grid-template-rows: 10vh auto 17vh;
            grid-gap: 0;
            justify-content: center;
            justify-items: stretch;
            align-content: stretch;
        }

        .side-bar {
            background-color: #0d152a;
            padding: 1rem;
            grid-row: 1 / span 2;
            display: grid;
            grid-template-columns: auto;
            grid-row-gap: 3rem;
            justify-items: center;
            align-content: baseline;
            border: none;
        }

        .controls-container {
            width: 100%;
            display: grid;
            grid-template-columns: auto;
            grid-row-gap: 0.2rem;
            justify-content: space-evenly;
            justify-items: baseline;
            align-content: center;
            align-items: center;
        }

        .control-row {
            width: 15rem;
            display: grid;
            grid-template-columns: auto auto;
            justify-items: stretch;
            align-items: center;
            border: 2px solid white;
            background-color: transparent;
            color: white;
            border-radius: 1.5rem;
            padding: 5px 15px;
            cursor: pointer;
            margin: 0.4rem auto;
        }

        .control-row:hover {
            border-color: orangered;
            color: orangered;
        }

        a.icons, a.texts {
            text-decoration: none !important;
            color: white;
        }

        a.icons:hover, a.texts:hover {
            text-decoration: none !important;
        }


        .main {
            min-height: 100vh;
            overflow-y: auto;
            grid-column: 2 / span 2;
            display: grid;
            grid-template-columns: 95%;
            grid-row-gap: 20px;
            justify-items: center;
            justify-content: center;
            align-content: space-evenly;
            padding: 10px;
            margin: 0;
        }

        .tiles-container {
            display: grid;
            grid-template-columns: auto auto auto;
            grid-gap: 4rem 2rem;
            justify-content: space-around;
            justify-items: center;
            align-content: flex-start;
            align-items: center;
        }

        .tiles {
            width: 15rem;
            height: 8rem;
            background-color: white;
            border: 2px solid #0d152a;
            border-radius: 2rem;
            cursor: pointer;
            color: orangered;
            display: grid;
            grid-template-columns: auto;
            justify-items: center;
            align-content: center;
        }

        .tiles:hover {
            background-color: #0d152a;
            border-color: orangered;
            transition: background-color linear 0.2s;
            color: white;
        }

        .tiles .text {
            font-size: 1rem;
        }

        .tiles .text,
        .tiles i {
            margin-block: 1rem;
        }

        #accordion {

            width: 90%;
        }

        #accordion .card-header .card-link {
            color: #0d152a;
        }

        #accordion h6 {
            text-align: center;
            background-color: darkred;
            color: white;
            padding-block: 10px;
        }

        .footer {
            background-color: #0d152a;
            color: white;
            grid-column: 1 / span 2;
            height: 20vh;
            width: 100vw;
            display: grid;
            grid-template-columns: auto auto auto auto;
            grid-gap: 1rem;
            justify-items: center;
            align-content: center;
        }

        .footer .footer-item {
            text-decoration: none !important;
            color: white;
            text-align: left !important;
        }

        .header {
            background-color: #ccc;
            grid-column: 2 / span 2;
            display: grid;
            grid-template-columns: auto auto auto;
            justify-content: space-between;
            align-items: center;
            padding-right: 3rem;
            padding-left: 1.5rem;
            border: none;

        }

        .open {
            color: red;
            cursor: pointer;
        }

        .dropdown-control {
            display: none;
            width: 10em;
            position: absolute;
            right: 10px;
            top: 8%;
            z-index: 9999;
            border-radius: 1.5rem;
        }

        .dropdown-control .page-link {
            color: orangered;
            text-decoration: none !important;
            text-align: center;
        }

        .dropdown-control .page-link:hover {
            cursor: pointer;
        }

        .profile {
            cursor: pointer;
            color: whitesmoke;
        }

        #avatar {
            border-radius: 50%;
            border: 2px solid orangered;
            padding: 3px;
        }

        .avatar-container {
            display: grid;
            grid-template-columns: auto auto;
            justify-content: center;
            align-content: space-around;
            grid-column-gap: 30px;
        }

        #close {
            color: white;
        }

        #close:hover {
            cursor: pointer;
        }

        /* Smartphones (portrait and landscape) ----------- */
        @media only screen and (max-width: 576px) {
            .menu {
                display: grid;
                grid-template-columns: 90%;
                justify-content: center;
                justify-items: center;
            }

            .menu-title {
                margin-top: 10px;
            }

            .container-fluid {
                display: grid;
                grid-template-columns: 100vw;
                grid-row-gap: 0;
                justify-content: center;
                justify-items: center;
                align-content: space-between;
                align-items: stretch;
                grid-template-rows: 18vh auto auto;
                padding: 0;
                margin: 0;
            }

            .side-bar {
                display: none;
                height: 100vh;
                position: fixed;
                left: 0;
                z-index: 9999;
            }

            .controls-container {
                margin-top: 3.5rem;
            }

            .main {
                grid-column: 1;
                overflow-x: hidden;
                width: 100%;
                min-width: 100vw;
                grid-template-columns: 100vw;
                align-content: space-between;
                grid-row-gap: 1rem;
                padding: 0;
            }

            .tiles-container {
                height: auto;
                display: grid;
                padding-block: 3rem;
                grid-template-columns: 100vw;
                grid-gap: 15px 0;
                justify-content: center;
                justify-items: center;
                align-content: space-evenly;
            }

            .tiles {
                width: 85%;
            }

            .header {
                background-color: #0d152a;
                width: 100vw;
                margin: 0;
                display: grid;
                grid-template-columns: auto auto;
                justify-content: stretch;
                align-items: baseline;
                align-content: center;
                grid-column: 1;
            }

            .school-name {
                color: orangered;
                text-shadow: -1px 0 white, 0 1px white, 1px 0 white, 0 -1px white;
            }

            .profile {
                display: none;
            }


            .footer {
                display: grid;
                grid-template-columns: 100%;
                justify-content: space-evenly;
                align-items: baseline;
                align-content: space-between;
                height: auto;
                padding: 20px;
            }

            .footer .footer-item {
                text-align: center;
            }

        }

        /* Smartphones (portrait and landscape) ----------- */
        @media only screen and (min-width: 577px)  and (max-width: 992px) {

            .container-fluid {
                display: grid;
                grid-template-columns: 100vw;
                grid-row-gap: 0;
                justify-content: center;
                justify-items: center;
                align-content: space-between;
                align-items: stretch;
                grid-template-rows: 18vh auto auto;
                padding: 0;
                margin: 0;
            }

            .side-bar {
                display: none;
                height: 100vh;
                position: fixed;
                left: 0;
                z-index: 9999;
            }

            .controls-container {
                margin-top: 3.5rem;
            }

            .menu {
                display: grid;
                grid-template-columns: 45% 45%;
                grid-gap: 20px;
                justify-content: center;
                justify-items: center;
            }

            .menu-title {
                margin-top: 10px;
            }

            .main {
                grid-column: 1;
                overflow-x: hidden;
                width: 100%;
                min-width: 100vw;
                grid-template-columns: 100vw;
                align-content: space-between;
                grid-row-gap: 1rem;
                padding: 0;
            }

            .tiles-container {
                height: auto;
                display: grid;
                padding-block: 3rem;
                grid-template-columns: 50vw 50vw;
                grid-gap: 15px 0;
                justify-content: center;
                justify-items: center;
                align-content: space-evenly;
            }

            .tiles {
                width: 85%;
            }

            .header {
                background-color: #0d152a;
                width: 100vw;
                margin: 0;
                display: grid;
                grid-template-columns: auto auto;
                justify-content: stretch;
                align-items: baseline;
                align-content: center;
                grid-column: 1;
            }

            .school-name {
                color: orangered;
                text-shadow: -1px 0 white, 0 1px white, 1px 0 white, 0 -1px white;
            }

            .profile {
                display: none;
            }


            .footer {
                display: grid;
                grid-template-columns: 100%;
                justify-content: space-evenly;
                align-items: baseline;
                align-content: space-between;
                height: auto;
                padding: 20px;
            }

            .footer .footer-item {
                text-align: center;
            }

        }

        /* Smartphones (portrait and landscape) ----------- */
        @media only screen and (min-width: 993px)  and (max-width: 1200px) {
            .controls-container .control-row {
                font-size: 12px;
                width: 17vw;
            }

        }

        @media only screen and (min-width: 1201px)  and (max-width: 1300px) {
            .controls-container .control-row {
                font-size: 13px;
                width: 17vw;
            }
        }
    </style>

</head>

<body onresize="myFunction()">

<div class="container-fluid">
    <div class="side-bar">

        <div class="avatar-container">
            <div><img id="avatar" src="../../Backend/Src/images/Passport%20Old.jpg" width="110" height="110"
                      alt="avatar">
            </div>
            <a id="close"><i class="fas fa-times fa-1x"></i></a>
        </div>

        <div class="controls-container">
            <div class="control-row" id="dashboard-home">
                <a class="icons"><i class="fas fa-tachometer-alt fa-1x"></i></a><a class="texts">Dashboard Home</a>
            </div>
            <div class="control-row" id="manage-school-record-trigger">
                <a class="icons"><i class="fas fa-school fa-1x"></i></a><a class="texts">School Info</a>
            </div>
            <div class="control-row">
                <a class="icons"><i class="fas fa-users fa-1x"></i></a><a class="texts">Staff Account</a>
            </div>
            <div class="control-row">
                <a class="icons"><i class="fas fa-user-edit fa-1x"></i></a><a class="texts">Student Account</a>
            </div>
            <div class="control-row" id="manage-subject-trigger">
                <a class="icons"><i class="fas fa-book fa-1x"></i></a><a class="texts">Manage Subjects</a>
            </div>
            <div class="control-row" id="manage-class-trigger">
                <a class="icons"><i class="fas fa-chalkboard fa-1x"></i></a><a class="texts">Manage Classes</a>
            </div>
            <div class="control-row" id="manage-role-trigger">
                <a class="icons"><i class="fas fa-user-circle fa-1x"></i></a><a class="texts">Manage Roles</a>
            </div>
            <div class="control-row">
                <a class="icons" href="#accordion"><i class="fas fa-bell fa-1x"></i></a><a
                        class="texts">Notifications</a>
            </div>

        </div>
    </div>
    <div class="header">
        <a class="open"><i class="fas fa-bars fa-2x"></i>
        </a>
        <h5 class="school-name">AG MODERN SCHOOL</h5>
        <a class="profile"><i class="fas fa-user fa-2x"></i></a>
        <div class="dropdown-control">
            <a class="page-link" id="show-profile">profile</a>
            <a class="page-link" id="logout">logout</a>
        </div>
    </div>
    <div class="main">
        <div class="tiles-container">
            <div class="tiles card" id="manage-student-record"><b class="text">Manage student's record</b><i
                        class="fas fa-chalkboard-teacher fa-2x"></i></div>
            <div class="tiles card"><b class="text">Manage staff's record</b><i class="fas fa-users fa-2x"></i></div>
            <div class="tiles card" id="manage-assessments"><b class="text">Make Assessments</b><i
                        class="fas fa-user-lock fa-2x"></i></div>
            <div class="tiles card" id="manage-assessment-result-trigger"><b class="text">Management Assessment</b><i
                        class="fas fa-balance-scale fa-2x"></i></div>
            <div class="tiles card" id="manage-result-trigger"><b class="text">View Results</b><i
                        class="fas fa-user-lock fa-2x"></i></div>
            <div class="tiles card" id="manage-e-library"><b class="text">Manage E-Library</b><i
                        class="fas fa-calendar-check fa-2x"></i></div>
            <div class="tiles card" id="manage-lectures"><b class="text">Lecture Schedules</b><i
                        class="fas fa-calendar-check fa-2x"></i></div>
            <div class="tiles card" id="manage-attendance"><b class="text">Attendance</b><i
                        class="fas fa-calendar-check fa-2x"></i></div>
            <div class="tiles card"><b class="text">Finance Management</b><i class="fas fa-donate fa-2x"></i></div>
        </div>

        <!--ASSESSMENT MANAGEMENT-->
        <h3 class="menu-title" id="for-assessment">Assessment Management</h3>
        <div class="menu" id="assessment">
            <a href="../Assessment/ca_entry_sheet.php" class="btn btn-lg col">Enter CA Test<br><i
                        class="fas fa-book-open"></i></a>
            <a href="../Assessment/exam_entry_sheet.php" class="btn btn-lg col">Enter Exams<br><i
                        class="fas fa-brain"></i></a>
            <a href="../Assessment/termly_assessment_entry_form.php" class="btn btn-lg col">Enter CA and Exams<br><i
                        class="fas fa-chalkboard-teacher"></i></a>
            <a href="#" class="btn  btn-lg col">Edit Assessment<br><i class="fas fa-diagnoses"></i></a>
            <a href="#" class="btn btn-lg col">Performance Analysis<br><i class="fas fa-chart-line"></i></a>
        </div>
        <!--ATTENDANCE MANAGEMENT-->
        <h3 class="menu-title" id="for-attendance">Attendance Management</h3>
        <div class="menu" id="attendance">

            <a href="../Attendance/index.php" class="btn btn-lg col">Mark Attendance<br><i
                        class="fas fa-book-open"></i></a>
            <a href="../Assessment/termly_assessment_entry_form.php" class="btn btn-lg col">Edit Attendance<br><i
                        class="fas fa-chalkboard-teacher"></i></a>
            <a href="../Attendance/populationAnalysis.php" class="btn btn-lg col">Attendance Statistics<br><i
                        class="fas fa-brain"></i></a>

        </div>


        <!--STUDENT MANAGEMENT-->
        <h3 class="menu-title" id="for-student-management">MANAGE STUDENT RECORD</h3>
        <div class="menu" id="manage-student">
            <a href="../Users/students/list.php" class="btn btn-lg col">View Student Profile<br><i
                        class="fas fa-book-open"></i></a>
            <a href="../Class/status_changer/index.php" class="btn btn-lg col">Change Student Status<br><i
                        class="fas fa-book-open"></i></a>
            <a href="../Users/students/index.php" class="btn btn-lg col">Register Student<br><i
                        class="fas fa-chalkboard-teacher"></i></a>
            <a href="../Access/apply/index.php" class="btn btn-lg col">Process Admission<br><i class="fas fa-brain"></i></a>

        </div>


        <!--SUBJECT MANAGEMENT-->
        <h3 class="menu-title" id="for-subject-management">MANAGE SUBJECT</h3>
        <div class="menu" id="manage-subject">
            <a href="../Subject/index.php" class="btn btn-lg col">Add Non Combined Subjects<br><i
                        class="fas fa-book-open"></i></a>
            <a href="../Subject/combineSubjects.php" class="btn btn-lg col">Add Combined Subjects<br><i
                        class="fas fa-book-open"></i></a>


        </div>

        <!--CLASS MANAGEMENT-->
        <h3 class="menu-title" id="for-class-management">MANAGE CLASSES</h3>
        <div class="menu" id="manage-classes">
            <a href="../Class/index.php" class="btn btn-lg col">Add Class<br><i
                        class="fas fa-book-open"></i></a>
            <a href="../Users/students/list.php" class="btn btn-lg col">Add Class Reps<br><i
                        class="fas fa-book-open"></i></a>
            <a href="../Users/students/index.php" class="btn btn-lg col">Update Classes<br><i
                        class="fas fa-chalkboard-teacher"></i></a>
            <a href="../Class/formaster/index.php" class="btn btn-lg col">Update Form Masters<br><i
                        class="fas fa-brain"></i></a>

        </div>
        <!--RESULT MANAGEMENT-->
        <h3 class="menu-title" id="for-result-management">RESULTS</h3>
        <div class="menu" id="manage-result">
            <a href="../Result/staffs/index.php" class="btn btn-lg col">View Result<br><i
                        class="fas fa-book-open"></i></a>
            <a href="#" class="btn btn-lg col">Send Result<br><i
                        class="fas fa-book-open"></i></a>
            <a href="#" class="btn btn-lg col">Make Result Available<br><i
                        class="fas fa-chalkboard-teacher"></i></a>
            <a href="#" class="btn btn-lg col">Block Result Availability<br><i class="fas fa-brain"></i></a>

        </div>

        <!--ACCOUNT MANAGEMENT-->
        <h3 class="menu-title" id="for-user-management">USER ACCOUNT MANAGEMENT</h3>
        <div class="menu" id="manage-users">
            <a href="#" class="btn btn-lg col">Update Roles<br><i
                        class="fas fa-book-open"></i></a>
            <a href="#" class="btn btn-lg col">Add Admins<br><i
                        class="fas fa-chalkboard-teacher"></i></a>

            <a href="#" class="btn btn-lg col">Delete Accounts<br><i
                        class="fas fa-book-open"></i></a>


        </div>


        <!--SCHOOL RECORD MANAGEMENT-->
        <h3 class="menu-title" id="for-school-management">SCHOOL RECORD MANAGEMENT</h3>
        <div class="menu" id="manage-school">
            <a href="../School/index.php" class="btn btn-lg col">Update School Record<br><i
                        class="fas fa-school"></i></a>
            <a href="../Calender/index.php" class="btn btn-lg col">Add Calendar<br><i
                        class="fas fa-book-open"></i></a>
            <a href="../Calender/session.php" class="btn btn-lg col">Add Sessions<br><i
                        class="fas fa-book-open"></i></a>


        </div>


        <!--NOTIFICAION MANAGEMENT-->
        <div id="accordion">
            <h6>Notifications</h6>
            <div class="card">
                <div class="card-header">
                    <a class="card-link" data-toggle="collapse" href="#collapseOne">
                        Collapsible Group Item #1
                    </a>
                </div>
                <div id="collapseOne" class="collapse show" data-parent="#accordion">
                    <div class="card-body">
                        Lorem ipsum..
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <a class="collapsed card-link" data-toggle="collapse" href="#collapseTwo">
                        Collapsible Group Item #2
                    </a>
                </div>
                <div id="collapseTwo" class="collapse" data-parent="#accordion">
                    <div class="card-body">
                        Lorem ipsum..
                    </div>
                </div>
            </div>


            <div class="card">
                <div class="card-header">
                    <a class="collapsed card-link" data-toggle="collapse" href="#collapseThree">
                        Collapsible Group Item #3
                    </a>
                </div>
                <div id="collapseThree" class="collapse" data-parent="#accordion">
                    <div class="card-body">
                        Lorem ipsum..
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <a class="collapsed card-link" data-toggle="collapse" href="#collapseThree">
                        Collapsible Group Item #3
                    </a>
                </div>
                <div id="collapseThree" class="collapse" data-parent="#accordion">
                    <div class="card-body">
                        Lorem ipsum..
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <a class="collapsed card-link" data-toggle="collapse" href="#collapseThree">
                        Collapsible Group Item #3
                    </a>
                </div>
                <div id="collapseThree" class="collapse" data-parent="#accordion">
                    <div class="card-body">
                        Lorem ipsum..
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <a class="collapsed card-link" data-toggle="collapse" href="#collapseThree">
                        Collapsible Group Item #3
                    </a>
                </div>
                <div id="collapseThree" class="collapse" data-parent="#accordion">
                    <div class="card-body">
                        Lorem ipsum..
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <a class="collapsed card-link" data-toggle="collapse" href="#collapseThree">
                        Collapsible Group Item #3
                    </a>
                </div>
                <div id="collapseThree" class="collapse" data-parent="#accordion">
                    <div class="card-body">
                        Lorem ipsum..
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <a class="collapsed card-link" data-toggle="collapse" href="#collapseThree">
                        Collapsible Group Item #3
                    </a>
                </div>
                <div id="collapseThree" class="collapse" data-parent="#accordion">
                    <div class="card-body">
                        Lorem ipsum..
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <a class="collapsed card-link" data-toggle="collapse" href="#collapseThree">
                        Collapsible Group Item #3
                    </a>
                </div>
                <div id="collapseThree" class="collapse" data-parent="#accordion">
                    <div class="card-body">
                        Lorem ipsum..
                    </div>
                </div>
            </div>

        </div>

    </div>

    <div class="footer">
        <a class="footer-item" href="https://www.facebook.com/demoxie"><i class="fas fa-compass"></i>Shadrach Adamu</a>
        <a class="footer-item" href="https://www.facebook.com/demoxie"><i class="fas fa-copyright"></i> SAULTECH</a>
        <a class="footer-item" href="https://www.facebook.com/demoxie"><i class="fas fa-calendar"></i> 2020/2021</a>
        <a class="footer-item" href="https://www.facebook.com/demoxie"><i class="fas fa-search-location"></i>
            facebook.com/demoxie</a>
    </div>


</div>

<script>

    function myFunction() {
        let w = window.outerWidth;
        //let h = window.outerHeight;
        if (w >= 577 || w < 992) {
            $('.side-bar').show();

        } else {
            $('.side-bar').hide();

        }
        //alert(w);
    }
</script>
</body>

</html>