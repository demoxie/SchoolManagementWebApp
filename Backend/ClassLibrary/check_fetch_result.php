<?php
require_once("../../Backend/ClassLibrary/Student.php");
require_once("../../Backend/ClassLibrary/Assessment.php");
$connect = new Db();

$conn = $connect->getConnection();
$studentObject = new Student($conn);
$assessmentObject = new Assessment($conn);

if(isset($_POST)){
    if(isset($_POST['termID'])){
        $sessionID = $_POST['sessionID'];
        $termID = $_POST['termID'];
        $admission_no = $_POST['admission_no'];
        //$studentID,$sessionID,$termID,$classID
        $sessionID = $_POST['sessionID'];
        $termID = $_POST['termID'];
        $response = $studentObject->checkStudentStatus($_POST['admission_no']);
        if($response==='false'){
            echo $response;
        }elseif ($response['status']==='Withdrawn' || $response['status']==='Expelled'){
            echo $response['status'];
        }else{
            $result = $assessmentObject->fetchResultByTerm($response['studentID'],$sessionID,$termID,$response['currentClassID']);
            if($result==='empty'){
                echo 'empty';
            }else{
                array_push($result,$response['name'],$response['admissionNO']);
                echo json_encode($result,JSON_PRETTY_PRINT);
            }

        }

    }else{
        if (isset($_POST['sessionID'])){
            $sessionID = $_POST['sessionID'];


        $response = $studentObject->checkStudentStatus($_POST['admission_no']);
        if($response==='false'){
            echo $response;
        }elseif ($response['status']==='Withdrawn' || $response['status']==='Expelled'){
            echo $response['status'];
        }else{
            $result = $assessmentObject->fetchResultBySession($_POST['admission_no'],$sessionID,$response['currentClassID']);
            if($result==='empty'){
                echo 'empty';
            }else{
                //array_push($result,$response['name'],$response['admissionNO'],$response['status']);
                echo json_encode($result,JSON_PRETTY_PRINT);
            }

        }
        }


    }
}
