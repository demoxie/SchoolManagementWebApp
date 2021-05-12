<!DOCTYPE html>
<html lang="en">
<head>
    <title>Result Checker</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../../Pluggins/Bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../Stylesheets/summerized_result.css">
    <link rel="stylesheet" href="../../Stylesheets/result_print.css">
    <link rel="stylesheet" href="../../Pluggins/awesome/css/all.min.css">
    <link rel="icon" href="../../../Backend/Src/Icons/logo.png">
    <script src="../../Pluggins/Jquery/jquery-3.5.1.min.js"></script>
    <script src="../../Scripts/fetch_session_for_result_checker.js"></script>
    <script src="../../Scripts/student_result_checker.js"></script>
    <script src="../../Pluggins/awesome/js/all.min.js"></script>
    <script src="../../Pluggins/Bootstrap/js/bootstrap.min.js"></script>
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: "Century Gothic", CenturyGothic, AppleGothic, sans-serif;
        }

        #main {
            height: 100vh;
            overflow: hidden;
            background-color: #fff;
            display: flex;
            flex-flow: column nowrap;
            justify-content: center;
            align-items: center;
        }

        #result_check_form {
            display: flex;
            flex-flow: column nowrap;
            justify-content: center;
            align-items: center;
            border: 1px solid darkgreen;
            border-radius: 0;
        }

        #code_input {
            border: 1px solid darkgreen;
            background: transparent;
            border-radius: 0;
            color: red;
            font-weight:bold;
            text-align: center;
        }

        #code_input::placeholder {
            color: red;
            font-size: 14px;

        }

        #process,.process {
            border: 2px double darkgreen;
            margin-bottom: 20px;
            color: darkgreen;
            font-weight: bold;
            background: #fff;
            border-radius: 0;
            padding-left: 30px;
            padding-right: 30px;
        }
        .btn_summary,.btn_full_detail{
            font-size: 14px;
        }

        select:hover,
        input:hover,
        select:active,
        select:focus,
        input:active,
        textarea:focus,
        input:focus,
        .btn:active,
        .btn:hover,
        .btn:focus,
        button:active,
        button:hover,
        button:focus,
        .close,
        #btn_close_down
        {
            outline: 0 !important;
            -webkit-appearance: none;
            box-shadow: none !important;
        }
        select.form-control{
            border-radius: 0;
            border-color: darkgreen;
        }

        .close {
            border: none;
            color: black;
            background: transparent;
            font-weight: bold;
            cursor: pointer;
        }
        #btn_close_down{
            border: none;
        }
        .form-group{
            margin-top: 30px;
        }
        
        
        
              * {
            box-sizing: border-box;
        }

        body {
            font-family: "Century Gothic", CenturyGothic, AppleGothic, sans-serif;
            font-weight: 500;
            font-size: 1em;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .container{
            display: flex;
            flex-flow: column wrap;
            align-items: center;
            width: 99vw;
            height: auto;
            border: 1px solid black;
            margin-top: 5px;
            padding: 0;
        }
        table{
            width: 100%;
            height: auto;
            margin: auto;
            font-size: 75%;
            overflow: hidden;
            border-collapse: collapse;
            table-layout: fixed;
            border-left: none;
            border-right: none;
            border-bottom: none;
            
        }
        table:after{
            clear: both;
            content: '';
        }
        th, td{
            border: 1px solid black;
            
        }
        thead th{
            text-align: center;
           
            
        }
        td{
            vertical-align: middle;
            
        }
        tr{
            height: 20px;
        }
        
        .result_body{
            width: 100%;
             margin-top: 0;
        }
        .result_footer{
            width: 100%;
             margin-top: 0;
        }
        h2,h4,h5{
            text-align: center;
            font-size-adjust: initial;
        }
        #school_logo,#passport{
            position: absolute;
            margin: 10px;
        }
        .title,.content{
            display: inline-block;
            margin-right: 10px;
            margin-left: 10px;
            
            
        }
        #passport{
            right: 0.3%;
            margin: 10px;
            border: 1px solid black;
            padding: 2px;
            top: 1%;
        }
        #school_logo,#passport{
            position: absolute;
            margin: 10px;
        }
        
        #school_name{
            margin-top: 1%;
        }
        u{
            text-decoration-line: underline;
            text-decoration-style: dotted;
            padding-bottom: 5px;
            width: 100%;
        }
        b{
            margin-bottom: 5px;
        }
        tr td:nth-child(1){
            
            padding-left: 10px;
        }
        .result_header{
            width: 100%;
            margin-top: 1%;
            padding: 0;
        }
        .stud_details{
            display: flex;
            flex-flow: column nowrap;
            justify-content: center;
            align-items: center;
            padding: 0;
            margin: 3% auto;
            width: 98%;
        }
        .row{
            display: flex;
            flex-flow: row;
            justify-content: space-between;
            width: 100%;
            margin: 0 auto;
        }
        .side_bar_buttons{
            display: flex;
            flex-flow: row wrap;
            width: 25%;
            margin-left: 0;
            margin-right: 0;
        }
        
        p{
            font-size: 0.8em;
            margin-left: 0.6em;
            
        }
        table tr{
                border-right:none;
                border-left:none;
            }
        table tr:last-of-type:not(:first-of-type){
            border-bottom: none;
        }
        @media print {
            * {
                box-sizing: border-box;
            }

            body {
                font-family: "Century Gothic", CenturyGothic, AppleGothic, sans-serif;
                font-size: 1em;
                display: flex;
                justify-content: center;
                align-items: center;
            }
            .container{
                display: flex;
                flex-flow: column nowrap;
                align-items: center;
                width: 99vw;
                height: auto;
                border: 1px solid black;
                margin-top: 0.5em;
                padding: 0;
            }
            table{
                width: 100%;
                height: auto;
                margin: auto;
                font-size: 0.65em;
                font-weight: bold;
                overflow: hidden;
                border-collapse: collapse;
                table-layout: fixed;
                border-left: none;
            }
            table tr:last-of-type:not(:first-of-type){
                border-bottom: none;
            }
            table:after{
                clear: both;
                content: '';
            }
            table,th, td{
                border: 1px solid black;

            }
            thead th{
                text-align: center;


            }
            td{
                vertical-align: middle;

            }
            tr{
                height: 20px;
            }

            .result_body{
                width: 100%;
                margin-top: 0;
            }
            .result_footer{
                width: 100%;
                margin-top: 0;
            }
            h2,h4,h5{
                text-align: center;
                font-size-adjust: initial;

            }
            h2{
                font-size: 1.3em;
            }
            h4{
                font-size: 1em;
            }
            h5{
                font-size: 0.7em;
            }

            #school_logo,#passport{
                position: absolute;
                margin: 10px;
            }
            .title,.content{
                display: inline-block;
                margin-right: 10px;
                margin-left: 10px;


            }
            #passport{
                right: 0.8%;
                margin: 5px;
                border: 1px solid black;
                padding: 3px;
                top: 0.8%;
            }
            #school_logo,#passport{
                position: absolute;
                margin: 7px;
                border-radius: 2px;
            }
            u{
                text-decoration-line: underline;
                text-decoration-style: dotted;
                padding-bottom: 5px;
                width: 100%;
            }
            b{
                margin-bottom: 5px;
            }
            tr td:nth-child(1){
                padding-left: 5px;
                width: 23%;
            }
            .result_header{
                width: 100%;
                margin-top: 0.8%;
                padding: 0;
            }
            .stud_details{
                display: flex;
                flex-flow: column nowrap;
                justify-content: center;
                align-items: center;
                padding: 0;
                margin: 6% auto 0;
                width: 98%;

            }
            .row{
                display: flex;
                flex-flow: row nowrap;
                justify-content: space-between;
                width: 100%;
                margin: 0 auto;
            }
            .side_bar_buttons{
                display: flex;
                flex-flow: row nowrap;
                line-height: 0.55em;
                width: 25%;
                margin-left: 0;
                margin-right: 0;
                padding: 0;
                vertical-align: middle;
            }

            p{
                font-size: 0.7em;
                margin-left: 0.5em;

            }
            tr{
                border-right:none;
                border-left:none;
            }
        }

        .page_head{
            width: 100%;
            height: 10vh;
            margin: 0;
            position: absolute;
            top:0;
            display: flex;
            flex-flow: row;
            justify-content: space-between;
            align-items: center;
            background: darkgreen;
            color: white;
            padding-right: 2em;
            padding-left: 2em;
        }
        .nav_back{
            border: none;
            padding: 2px 20px;
            text-decoration: none;
            color: darkgreen;
            background: white;
        }
        .nav_back:active,.nav_back:focus,.nav_back:visited,.nav_back:hover{
            color: darkgreen;
            text-decoration: none;
        }
        .nav_back:hover{
            cursor: pointer;
         }


    </style>
</head>
<body>
<div class="page_head" >
    <div class="left"><a class="nav_back">Back</a></div>
    <div class="center"><h4>AG MODERN NUR/PRI/SEC ASHAKACEM</h4></div>
    <div class="right"><a class="nav_back">Logout</a></div>
</div>

<div class="container-fluid" id="main">
    <form class="form-inline col-xs-11 col-sm-8 col-md-6 col-lg-4 col-xl-3" method="post" id="result_check_form" autocomplete="off">
        <div class="form-group col-10" id="result_type_container">
        <select class="form-control col-12" id="result_type">
            <option selected disabled>RESULT TYPE</option>
            <option value="1">Session Result Only</option>
            <option value="2">Term Result</option>
            </select>
        </div>
        <div class="form-group col-10 session_container" id="session_container" style="display: none">
        </div>
        <div class="form-group col-10 term_container" id="term_container" style="display: none">
        </div>
        <div class="form-group col-10" id="code_input_container">
            <input name="admission_no" class="form-control col-xs-2 col-sm-10 col-md-8 col-lg-7 col-xl-12" id="code_input" type="text" placeholder="Enter Admission No...">
        </div>
        <div class="form-group col-10" id="check_btn_container" style="display: flex;justify-content: center;align-items: center">
            <button class="btn col-xs-2 btn_check_result" type="button" id="process">Check Result</button>
        </div>

    </form>

</div>
    
    


<!-- The Modal -->
<div class="modal" id="result">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header" style="height: 0;display: flex;justify-content: flex-end;border-bottom: none">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body" style="padding: 0;border-bottom: none;">
                
                
                
                <div class="container" id="result_sheet">
    <div class="result_header">
        <img src="../../../Backend/Src/Icons/logo.jpg" width="100" height="100" id="school_logo">
        <h2 id="school_name">AG MODERN SECONDARY SCHOOL ASHACEM</h2><img src="../../../Backend/Src/images/Passport%20Old.jpg" width="100" height="100" id="passport">
        <h4 id="postal_address">P.O.BOX 130 Bajoga, Funakaye L.G.A, Gombe State</h4>
        <h5 id="school_motto">MOTTO: KNOWLEDGE IS LIGHT</h5>
        <div class="stud_details">
            <div class="row">
            <div class="side_bar_buttons">
                <b><p class="titles">Name: </p></b><p class="details">PEACE GARBA</p></div>
                
                <div class="side_bar_buttons"><b><p class="titles">Gender:</p></b><p class="details">Female</p></div>
                
                <div class="side_bar_buttons"><b><p class="titles">Age: </p></b><p class="details">14 years</p></div>
                <div class="side_bar_buttons"><b><p class="titles">Class: </p></b><p class="details">Jss 3A</p></div>
            </div>
           
            
             <div class="row">
            <div class="side_bar_buttons">
                <b><p class="titles">ADMN:</p></b><p class="details">AG/2017/SEC/2/203837</p></div>
                
                <div class="side_bar_buttons"><b><p class="titles">Session:</p></b><p class="details">2020/2021</p></div>
                
                <div class="side_bar_buttons"><b><p class="titles">Term: </p></b><p class="details">2nd Term</p></div>
                <div class="side_bar_buttons"><b><p class="titles">Term Commenced: </p></b><p class="details">02/02/2019</p></div>
            </div>
           
            
            
            
             <div class="row">
            <div class="side_bar_buttons">
                <b><p class="titles">Term Ened: </p></b><p class="details">03/02/2020</p></div>
                
                <div class="side_bar_buttons"><b><p class="titles">No of time school openned:</p></b><p class="details">67</p></div>
                
                <div class="side_bar_buttons"><b><p class="titles">No of times present: </p></b><p class="details">40</p></div>
                <div class="side_bar_buttons"><b><p class="titles">No of times absent: </p></b><p class="details">12</p></div>
            </div>
           
            
            
             <div class="row">
            <div class="side_bar_buttons">
                <b><p class="titles">school resumes: </p></b><p class="details">02/02/2021</p></div>
                  <div class="side_bar_buttons">
                <b><p class="titles">Sum Total: </p></b><p class="details">512.95</p></div>
                
                <div class="side_bar_buttons"><b><p class="titles">Average:</p></b><p class="details">56.99</p></div>
                
                <div class="side_bar_buttons"><b><p class="titles">Grade: </p></b><p class="details">C5</p></div>
                
            </div>
            
            <div class="row">
            <div class="side_bar_buttons">
                <b><p class="titles">Highest class ave: </p></b><p class="details">74.07</p></div>
                
                <div class="side_bar_buttons"><b><p class="titles">Lowest class ave:</p></b><p class="details">49.59</p></div>
                
                <div class="side_bar_buttons"><b><p class="titles">No of subjects: </p></b><p class="details">C9</p></div>
                 <div class="side_bar_buttons"><b><p class="titles">No in class: </p></b><p class="details">14</p></div>
                
                
                
            </div>
           
           
        
        </div>
    </div>
    <div class="result_body table-responsive">
        <table class="table1">
            <thead>
                <tr>
                <th style="width:23%" colspan="3" >Subject</th>
                <th colspan="3">Cont. Assessment</th>
                    
                <th>Exams</th>
                <th>Total</th>
                <th>Grade</th>
                <th>Position</th>
                <th>Comment</th>
                    </tr>
                </thead>
            <tbody>
                <tr style="text-align: center">
                <td colspan="3" ></td>
                    
                    <td>1st CA</td>
                    <td>2nd CA</td>
                    <td>3rd CA</td>
                    <td>70</td>
                    <td colspan="1">100</td>
                    <td colspan="3"></td>
                    
                
                </tr>
                <tr>
                    <td colspan="3">MATHEMATICS</td>
                    
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td colspan="3">ENGLISH</td>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td colspan="3">AGRICULTURAL SCIENCE</td>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td colspan="3">HAUSA</td>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td colspan="3">TECHNICAL DRAWING</td>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                    <td></td>
                    <td></td>
                     <td></td>
                </tr>
                <tr>
                    <td colspan="3">CULTURAL/CREATIVE ART (CCA)</td>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                    <td></td>
                    <td></td>
                </tr>
                
                <tr>
                    <td colspan="3">BUSINESS STUDIES</td>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                    <td></td>
                    <td></td>
                </tr>
                
                <tr>
                    <td colspan="3">BASIC SCIENCE AND TECHNOLOGY</td>
                    <td colspan="3"></td>
                     
                     <td></td>
                     <td></td>
                     <td></td>
                    <td></td>
                    <td></td>
                     
                </tr>
                <tr>
                    <td colspan="3">RELIGION AND NATIONAL VALUES</td>
                    <td colspan="3"></td>
                     <td></td>
                     <td></td>
                     <td></td>
                    <td></td>
                    <td></td>
                </tr>


<tr><td colspan="11" style="text-align:center;font-weight:bolder">KEY INTERPRETATIONOF VARIOUS GRADES</td></tr>
<tr style="text-align:center">
    <td></td>
                <td>(0-39) F9(Fail)</td>
                <td>(40-44) E8(Pass)</td>
                <td>(45-49) D7(Pass)</td>
                <td>(50-54) C6(Credit)</td>
                <td>(55-59) C5(Credit)</td>
                <td>(60-64) C4(Credit)</td>
                <td>(65-69) B3(Good)</td>
                <td>(70-74) B2(V.Good)</td>
                <td>(75-100) A(Excellent)</td><td></td>
                    </tr>
                <tr><td colspan="11"></td></tr>
                
                <tr style="text-align:center;font-weight:bolder">
            <td colspan="3">AFFECTIVE AREAS</td>
                <td>GRADE</td>
                    <td colspan="2"></td>
                <td colspan="3">PSYCHOMOTOR SKILLS RATING</td>
                <td>GRADE</td>
                    <td></td>
            </tr>
                <tr><td colspan="3">PUNCTUALITY</td>
                    <td></td>
                    <td colspan="2"></td>
                    <td colspan="3" style="padding-left:4px">HANDWRITING</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr><td colspan="3">NEATNESS</td>
                    <td></td>
                    <td colspan="2"></td>
                    <td colspan="3" style="padding-left:4px">GAMES/SPORT</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr><td colspan="3">CLASS ATTENTION</td>
                    <td></td>
                    <td colspan="2"></td>
                    <td colspan="3" style="padding-left:4px">ORATORY</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr><td colspan="3">CLASS PARTICIPATION</td>
                    <td></td>
                    <td colspan="2"></td>
                    <td colspan="3" style="padding-left:4px">CREATIVITY</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr><td colspan="3">FRIENDLINESS</td>
                    <td></td>
                    <td colspan="2"></td>
                    <td colspan="3" style="padding-left:4px">PERFOMING ARTS</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr><td colspan="3">HONESTY</td>
                    <td></td>
                    <td colspan="2"></td>
                    <td colspan="3"></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr><td colspan="3">SELF CONTROL</td>
                    <td></td>
                    <td colspan="2"></td>
                    <td colspan="3"></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr><td colspan="3">INDUSTRY</td>
                    <td></td>
                    <td colspan="2"></td>
                    <td colspan="3"></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr><td colspan="3">POLITENESS</td>
                    <td></td>
                    <td colspan="2"></td>
                    <td colspan="3"></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr style="text-align: center;font-weight:bolder;"><td colspan="11">KEY TO RATING: (OT = OBSERVABALE TRAITS)</td></tr>
                
                <tr style="text-align: left;">
                <td colspan="3"> 5 - Maintains an excellent degree of OT</td>
                    <td colspan="2" style="padding-left:4px"> 4 - Maintain high level of OT</td>
                    <td colspan="2" style="padding-left:4px"> 3 - Acceptable level of OT</td>
                    <td colspan="2" style="padding-left:4px"> 2 - Shows minimal regard for OT</td>
                    <td colspan="2" style="padding-left:3px"> 1 - Has no regard for OT</td>
                </tr>
                <tr>
                <td colspan="8">
                    <b>
                        Form Teacher's Remark:................................................................................................................................</b>
                    <td colspan="3" style="padding-left:4px;"><b>Sign/Date:......................................................</b></td>
                </tr>
                
                
                <tr>
                <td colspan="8">
                    <b>
                        Head Teacher's Remark:...............................................................................................................................
                        
                        </b>
                    <td colspan="3" style="padding-left:4px;"><b>Sign/Date:......................................................</b></td>
                </tr>
            
                
            </tbody>
        </table>
        
        
    </div>
    <div class="result_footer">
        
    </div>
    </div>
                
                

            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" id="print" class="btn btn-danger" data-dismiss="modal">print</button>
                <button type="button" id="btn_close_down" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>
</body>
</html>
