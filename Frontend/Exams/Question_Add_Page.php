<?php
require_once "C:\wamp64\www\smwa\Backend\server\connection.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Add Questions</title>
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="../../Frontend/Pluggins/Bootstrap/css/bootstrap.min.css">
    <!-- Place your stylesheet here-->

    <script src="../../Frontend/Pluggins/Jquery/jquery-3.5.1.min.js"></script>
    <script src="../../Frontend/Pluggins/Bootstrap/js/bootstrap.min.js"></script>
    <script src="../../Frontend/Scripts/add_question.js"></script>
    <style>
        *{
            box-sizing: border-box;
        }
        .add_question_btn:hover {
            color: white;
            opacity: 0.8;
            transition: opacity 0.2s;
        }

        .question_entry_form {
            margin: 5% auto;
            border: 1px solid #2D0B33;
            border-radius: 10px;
            background-color: rgb(255, 246, 255);
            box-shadow: 0 1px px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            font-family: sans;
            padding: 0;
            display: block;
            clear: both;
        }


        .add_question_btn {
            margin: 30px auto;
            background-color: #2D0B33;
            color: white;
            display: block;

        }

        .form-label,
        .opt_input {
            display: inline-block;
           
        }

        .opt_group {
            display: block;
        }


        .form-header {
            text-align: center;
            font-weight: bold;
            color: whitesmoke;
        }

        .tophead {
            width: 100%;
            background-color: #2D0B33;
            padding: 10px;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
            margin: 0;
        }


        #question-label,
        .question {
            display: inline-block;
        }

        #upload-image {
            font-stretch: ultra-condensed;
            font-size-adjust: auto;
        }
    </style>
</head>

<body>
    <form class="question_entry_form col-6" method="post" enctype="multipart/form-data" id="add_question_form" autocomplete="on">
        <div class="tophead">
            <h4 class="form-header">ADD QUESTION</h4>
        </div>
        <div> </div>
        <div class="row opt-group col-lg-12" id="subject-div">
            <label class="form-label col-lg-2 col-sm-12" for="select-subject" id="subject-label">Subject</label>
            <select class="subject opt_input form-control col-lg-4 col-sm-12" id="select-subject" name="subject" tabindex="1">
                <option disabled selected>Select Subject</option>

            </select>
            <label class="form-label col-lg-2 col-sm-12" for="class" id="class-label">Class</label>
            <select class="class_name opt_input form-control col-lg-4 col-sm-12" id="class" name="class_name" tabindex="2">
                <option disabled selected>Select Class</option>

            </select>
            <div id="result"></div>
        </div>
        <div class="row opt-group col-lg-12" id="question-div">
            <label class="form-label col-lg-3 col-sm-12" for="picAvaialable" id="picAvaialable-label">Has picture?</label>
            <select class="hasPicture opt_input form-control col-lg-6 col-sm-12" id="picAvaialable" tabindex="3">
                <option selected disabled>Does the question has picture?</option>
                <option>Yes</option>
                <option>No</option>
            </select>
        </div>
        <div class="opt-group quest col-12" id="upload-div">
            <label class="form-label col-lg-2 col-sm-12" for="upload-image" id="upload-image-label">Upload Image</label>
            <input type="file" class="opt_input form-control col-lg-8 col-sm-12" id="upload-image" name="photo" tabindex="4">
        </div>
        <div class="opt-group col-12 image_preview" style="margin: 5px auto;"><img src="" class="figure-img img-fluid rounded" id="imgPlaceholder" style="width: 40%;height:250px;margin:auto;background-color:#ccc;display:block"></div>
        <div class="opt-group col-12" id="question-div">
            <label class="form-label col-lg-2 col-md-12 col-sm-12" for="question" id="question-label">Question</label>
            <input class="question opt_input form-control col-lg-8 col-md-12 col-sm-12" id="question" name="question" placeholder="Enter question here..." autocomplete="on" tabindex="5">
            <div class="feedbackQns"></div>
        </div>
        <!-- Modal HTML -->
        <div id="myModal" class="modal fade" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" style="font-weight: bold">Error!</h5>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <center>
                            <p class="alert-body" style="font-weight: 600"></p>
                        </center>
                        <!-- <p class="text-secondary"><small>If you don't save, your changes will be lost.</small></p>-->
                    </div>
                    <div class="modal-footer"> </div>
                </div>
            </div>
        </div>
        <div class="opt-group col-12" id="optA">
            <label class="form-label col-1" for="A">A</label>
            <input type="text" class="option opt_input form-control col-9" id="A" name="optionA" tabindex="6">
            <input type="checkbox" class="answer opt_input col-1" id="answerA" name="answerA" value="A" tabindex="11">
            <div class="feedbackOptA"></div>
        </div>
        <div class="opt-group col-12">
            <label class="form-label col-1" for="B">B</label>
            <input type="text" class="option opt_input form-control col-9" id="B" name="optionB" tabindex="7">
            <input type="checkbox" class="answer opt_input col-1" id="answerB" name="answerB" value="B" tabindex="12">
            <div class="feedbackOptB"></div>
        </div>
        <div class="opt-group col-12">
            <label class="form-label col-1" for="C">C</label>
            <input type="text" class="option opt_input form-control col-9" id="C" name="optionC" tabindex="8">
            <input type="checkbox" class="answer opt_input col-1" id="answerC" name="answerC" value="C" tabindex="13">
            <div class="feedbackOptC"></div>
        </div>
        <div class="opt-group col-12">
            <label class="form-label col-1" for="D">D</label>
            <input type="text" class="option opt_input form-control col-9" id="D" name="optionD" tabindex="9">
            <input type="checkbox" class="answer opt_input col-1" id="answerD" name="answerD" value="D" tabindex="14">
            <div class="feedbackOptD"></div>
        </div>
        <div class="opt-group col-12">
            <label class="form-label col-1" for="E">E</label>
            <input type="text" class="option opt_input form-control col-9" id="E" name="optionE" tabindex="10">
            <input type="checkbox" class="answer opt_input col-1" id="answerE" name="answerE" value="E" tabindex="15">
            <div class="feedbackOptE"></div>
        </div>
        <button type="submit" class="add_question_btn btn btn-default col-lg-4 col" id="add_question_btn" name="add_question" tabindex="16">Add Question</button>
    </form>
</body>

</html>