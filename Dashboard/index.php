<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AG MODERN ADMIN DASHBOARD</title>
    <meta name="description" content="AG Modern Admin Dashboard">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../Pluggins/Bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../Pluggins/awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" href="../Pluggins/awesome/css/all.min.css" />
    <link rel="stylesheet" href="../Stylesheets/dashboard_media_query.css" />
   <!-- <link rel="stylesheet" href="../Stylesheets/small_devices.css"/>
    <link rel="stylesheet" href="../Stylesheets/medium_devices.css"/>
    <link rel="stylesheet" href="../Stylesheets/large_devices.css"/>-->
    <script src="../Pluggins/Jquery/jquery-3.5.1.min.js"></script>
    <script src="../Scripts/dashboard.js"></script>
    <script src="../Pluggins/Bootstrap/js/bootstrap.min.js"></script>
    <script src="../Pluggins/awesome/js/all.min.js"></script>
    <script src="../Pluggins/awesome/js/fontawesome.min.js"></script>
    <style>
      
            
 
    </style>

</head>

<body>
    <div class="container-fluid" id="main">
        <div id="side_bar">
            <di id="logo_container"><img id="school_logo" src="../../Backend/Src/Icons/logo.png" />
            <a href="#" id="school_name">AG MODERN</a>
            </di>
            
            <div  class="side_btn_container"><i class="fas fa-tachometer-alt side_icons" id="title_icon"></i><a href="#" class="side_bar_buttons" id="title"> Dashboard</a></div>
            
            <div class="side_btn_container"><i class="fas fa-diagnoses side_icons"></i><a href="#" class="side_bar_buttons">Assessment</a></div>
            
            <div class="side_btn_container"><i class="fas fa-clipboard side_icons"></i><a href="#" class="side_bar_buttons">Attendance</a></div>
            
            <div class="side_btn_container"><i class="fas fa-file-invoice side_icons"></i><a href="#" class="side_bar_buttons">Student record</a></div>
            
            <div class="side_btn_container"><i class="fas fa-chalkboard-teacher side_icons"></i><a href="#" class="side_bar_buttons">Staff record</a></div>
            
            <div class="side_btn_container"><i class="fas fa-money-check-alt side_icons"></i><a href="#" class="side_bar_buttons">Finance</a></div>
            
            <div class="side_btn_container"><i class="fas fa-user side_icons"></i><a href="#" class="side_bar_buttons">Account management</a></div>
            
            <div class="side_btn_container">
                <i class="fas fa-school side_icons"></i>
            <a href="#" class="side_bar_buttons">School data</a>
            </div>
        </div>

        <div id="right_side">
            <div id="top_bar">
                <div class="top_bar_items" id="open_close_button"><i class="fa fa-bars fa-2x" id="side_drawer"></i></div>
                <div class="top_bar_items" id="search_input_container"><input class="search" id="search_input" placeholder='Search' /></div>
                <div class="top_bar_items" id="profile_check"><img src="../../Backend/Src/images/Passport%20Old.jpg" id="profile_pic" />
                <div id="profile">
                    <a id="user_name" style="color:white">Sam Smith</a>
                    <a id="user_type" style="color:white;">Admin </a>
                    <a id="login" style="color:white;">logout</a>
                    </div>
                </div>
                
            </div>

            <div id="main_body">
                <div id="tiles_container">
                    <div class="tiles">
                        <h6>Manage school record</h6>
                        <i class="fas fa-school fa-2x tiles-icon"></i>
                    </div>
                    <div class="tiles">
                        <h6>Manage Student Record</h6>
                        <i class="fas fa-users fa-2x tiles-icon"></i>
                    </div>
                    <div class="tiles">
                        <h6>Assessments</h6>
                        <i class="fas fa-check fa-2x tiles-icon"></i>
                    </div>
                    <div class="tiles">
                        <h6>Create Test and Exams</h6>
                        <i class="fas fa-user-edit fa-2x tiles-icon"></i>
                    </div>
                    <div class="tiles">
                        <h6>Manage Staff record</h6>
                        <i class="fas fa-user-tie fa-2x tiles-icon"></i>
                    </div>
                    <div class="tiles">
                        <h6>Process Admission</h6>
                        <i class="fas fa-users-cog fa-2x tiles-icon"></i>
                    </div>
                    <div class="tiles">
                        <h6>Performance Analysis</h6>
                        <i class="fas fa-chart-line fa-2x tiles-icon"></i>
                    </div>
                    <div class="tiles">
                        <h6>Check result</h6>
                        <i class="fas fa-microscope fa-2x tiles-icon"></i>
                    </div>
                </div>
                <div class="" id="page_window">

                </div>

            </div>
        </div>

    </div>


</body>

</html>