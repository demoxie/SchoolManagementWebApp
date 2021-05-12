<?php

//declare(strict_types=1);
//$uploadStatus=0;
//$uploadStatus=0;
 function uploadImage(){

    if ( isset( $_FILES['photo'] ) ) {
        
        
      $target_dir = "upload/";
      $_GLOBALS["target_dir"]  = $target_dir;
        // Get file path
        //$_GLOBALS["target_file"] = $target_dir . basename($_FILES["photo"]["name"]);
        $_GLOBALS["target_file"] = $_GLOBALS["target_dir"] . basename($_FILES["photo"]["name"]);
        // Get file extension
        $imageExt = strtolower(pathinfo($_GLOBALS["target_file"], PATHINFO_EXTENSION));
        // Allowed file types
        $allowd_file_ext = array("jpg", "jpeg", "png");
        
        if (!file_exists($_FILES["photo"]["tmp_name"])) {
           //$alert = array("alert" => "Warning!", "status" => "alert alert-danger", "message" => "Select image to upload.");
            //print_r( json_encode( $alert ) );
            //die();
        } else if (!in_array($imageExt, $allowd_file_ext)) {    
             $alert = array("alert" => "Warning!", "status" => "alert alert-warning", "message" => "Only file formats .jpg, .jpeg and .png. are Allowed");
            print_r( json_encode( $alert ) );
            die();
        } else if ($_FILES["photo"]["size"] > 2097152) {
           
             $alert = array("alert" => "Danger!", "status" => "alert alert-danger", "message" => "File is too large. File size should be less than 2 megabytes."
           );
            print_r( json_encode( $alert ) );
            die();
        } else if (file_exists($_GLOBALS["target_file"])) {
            
             $alert = array("alert" => "Error!", "status" => "alert alert-danger", "message" => "File already exists.");
            print_r( json_encode( $alert ) );
            die();
        } else {
            if (move_uploaded_file($_FILES["photo"]["tmp_name"], $_GLOBALS["target_file"])) {
                //$sql = "INSERT INTO questions (`QuestionImage`) VALUES ('$target_file')";
                 
                //$stmt = $conn->prepare($sql);
                 //if($stmt->execute()){    
                      //$alert = array("alert" => "Success!", "status" => "alert alert-success", "message" => "Image uploaded successfully.");
                     //print_r( json_encode( $alert ) );
                //$_GLOBALS["uploadStatus"] +=1;
                addQuesion();
                 
                 }else {
                
                 $alert = array("alert" => "Danger!", "status" => "alert alert-danger", "message" => "Image coudn't be uploaded.");
                print_r( json_encode( $alert ) );
                die();
            }
        }
}else{
        addQuestion();
    }
}

function addQuestion() {
    include "/Backend/server/connection.php";
$optionid = '';
$questiontext = '';
$questionid = '';
$subjectid = $_POST['subject'];
$classid = $_POST['class_name'];
$dateaddedsubject = date( 'Y-m-d h:i:sa' );


$prev_optionA = '';
$prev_optionB = '';
$prev_optionC = '';
$prev_optionD = '';
$prev_optionE = '';

$optionA = $_POST['optionA'];
$optionB = $_POST['optionB'];
$optionC = $_POST['optionC'];
$optionD = $_POST['optionD'];
$optionE = $_POST['optionE'];
$answer = '';
    
$questiontext = $_POST['question'];
// Check if file was uploaded without errors
        if ( !empty( $_POST['answerA'] ) ) {
            $answer = $_POST['answerA'];

        } else if ( !empty( $_POST['answerB'] ) ) {
            $answer = $_POST['answerB'];

        } else if ( !empty( $_POST['answerC'] ) ) {
            $answer = $_POST['answerC'];

        } else if ( !empty( $_POST['answerD'] ) ) {
            $answer = $_POST['answerD'];

        } else if ( !empty( $_POST['answerE'] ) ) {
            $answer = $_POST['answerE'];

        }else{
            exit();
        } 

        $stmt0 = $conn->prepare( 'SELECT * FROM option' );
        $stmt0->execute();

        // set the resulting array to associative
        $prev_options = $stmt0->setFetchMode( PDO::FETCH_ASSOC );

        foreach ( $stmt0->fetchAll() as $k => $prev_options ) {

            $prev_optionA = $prev_options['OptionA'];
            $prev_optionB = $prev_options['OptionB'];
            $prev_optionC = $prev_options['OptionC'];
            $prev_optionD = $prev_options['OptionD'];
            $prev_optionE = $prev_options['OptionE'];
        }
        if ( $prev_optionA === $optionA & $prev_optionB === $optionB & $prev_optionC === $optionC & $prev_optionD === $optionD ) {

            $alert = array( "alert" => "Info!", "status" => "alert alert-info", "message" => "Refresh or Clear form content and enter new question" );
            print_r ( json_encode( $alert ) );
            die();
        } else {

            // Inserting Options
            $stmt1 = $conn->prepare( "INSERT INTO option (OptionID, OptionA, OptionB, OptionC, OptionD, OptionE, Answer)
    VALUES (:optionid, :optionA, :optionB, :optionC, :optionD, :optionE, :answer)" );
            $stmt1->bindParam( ':optionid', $optionid, PDO::PARAM_STR );
            $stmt1->bindParam( ':optionA', $optionA, PDO::PARAM_STR );
            $stmt1->bindParam( ':optionB', $optionB, PDO::PARAM_STR );
            $stmt1->bindParam( ':optionC', $optionC, PDO::PARAM_STR );
            $stmt1->bindParam( ':optionD', $optionD, PDO::PARAM_STR );
            $stmt1->bindParam( ':optionE', $optionE, PDO::PARAM_STR );
            $stmt1->bindParam( ':answer', $answer, PDO::PARAM_STR );

            $stmt1->execute();

            //$alert = array( 'status' => 'alert alert-success', 'message' => 'Options Added successfully.' );
            //print_r( $alert );

            $stmt2 = $conn->prepare( 'SELECT * FROM option' );
            $stmt2->execute();

            // set the resulting array to associative
            $result = $stmt2->setFetchMode( PDO::FETCH_ASSOC );

            foreach ( $stmt2->fetchAll() as $k => $result ) {

                $optionid = $result['OptionID'];

            }
           
            
            $stmt3 = $conn->prepare( 'INSERT INTO `questions`(`QuestionID`, `SubjectID`, `ClassID`, `QuestionText`, `QuestionImage`, `OptionID`, `DateAdded`) VALUES (:questionid,:subjectid,:classid, :questiontext, :questionimage, :optionid, :dateadded)' );
            $stmt3->bindParam( ':questionid', $questionid );
            $stmt3->bindParam( ':subjectid', $subjectid );
            $stmt3->bindParam( ':classid', $classid );
            $stmt3->bindParam( ':questiontext', $questiontext );
            $stmt3->bindParam( ':questionimage', $notUploaded );
            $stmt3->bindParam( ':optionid', $optionid );
            $stmt3->bindParam( ':dateadded', $dateaddedsubject );

            $stmt3->execute();

            $alert = array( "alert" => "Success!", "status" => "alert alert-success", "message" => "Question added successfully." );
            print_r( json_encode( $alert ) );

        }

    } 
   


    try {

         uploadImage();
    
}catch( PDOException $e ) {

        $alert = array( "alert" => "Danger!", "status" => "alert alert-danger", "message" => "Could not execute query: ".$e->getMessage() );
        print_r ( json_encode( $alert ) );
        die();

    }
// Close statement
    unset( $stmt0 );
    unset( $stmt1 );
    unset( $stmt2 );
    unset( $stmt3 );
    // Close connection
    unset( $conn );