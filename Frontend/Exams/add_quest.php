

   


<form class="question-entry col-7" method="post" enctype="multipart/form-data" id="add_question_form" autocomplete="on">
        <div class="tophead">
        <h4 class="form-header">ADD QUESTION</h4>
            </div>
        <div class="opt-group col-12" id="subject-div">
            <label class="form-label col-lg-2 col-sm-12" for="select-subject" id="subject-label">Subject</label>
            <select class="subject opt_input form-control col-lg-3 col-sm-2" id="select-subject" name="subject">
                <option disabled selected>Select Subject</option>
                <?php
                require_once("_php/connection.php");

                 // Select Subject from the table
                      $stmt = $conn->prepare("SELECT * FROM subjects");
                     $stmt->execute();

                    // set the resulting array to associative
                     $result= $stmt->setFetchMode(PDO::FETCH_ASSOC);
    
                   //echo $result["OptionA"];
        
                 foreach($stmt->fetchAll() as $k => $result) {
        
                  $SubjectName=$result["SubjectName"];
                  $SubjectID=$result["SubjectID"];
                  //$departid = $row['id'];
      
      
               // Option
               echo "<option value='". $SubjectID."' >". $SubjectName."</option>";
                }
                
                 ?>

            </select>

            <label class="form-label col-lg-2 col-sm-12" for="class" id="class-label">Class</label>
            <select class="class_name opt_input form-control col-lg-3 col-sm-2" id="class" name="class_name">
                <option disabled selected>Select Class</option>
                <?php
                
                
    // Select Class from the table
    $stmt = $conn->prepare("SELECT * FROM class");
    $stmt->execute();

    // set the resulting array to associative
   $class= $stmt->setFetchMode(PDO::FETCH_ASSOC);
    
    
        
     foreach($stmt->fetchAll() as $k => $class) {
        
         $ClassName=$class["ClassName"];
         $ClassID=$class["ClassID"];
           //$departid = $row['id'];
      
      //$class_arr[] = array("ClassID" => $ClassID, "ClassName" => $ClassName);
      // Option
      echo "<option value='".$ClassID."' >". $ClassName."</option>";
         // encoding array to json format
echo json_encode($class_arr);
    }
      
                        
                ?>
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
