<?php
require_once("../../Backend/ClassLibrary/Student.php");
require_once("../../Backend/ClassLibrary/Assessment.php");
$connect = new Db();

$conn = $connect->getConnection();
$studentObject = new Student($conn);
$assessmentObject = new Assessment($conn);

if(isset($_POST)){
    //print_r($_POST['termID']);
    if(isset($_POST['termID'])) {
        $sessionID = $_POST['sessionID'];
        $termID = $_POST['termID'];
        $admission_no = $_POST['admission_no'];
        //$studentID,$sessionID,$termID,$classID
        $sessionID = $_POST['sessionID'];
        $termID = $_POST['termID'];
        $response = $studentObject->checkStudentStatus($_POST['admission_no']);
        if (is_array($response)) {
            $status = $response['status'];
            $currentClassID = $response['currentClassID'];
            $name = $response['name'];
            $admissionNO = $response['admissionNO'];
            if ($status === 'Account deleted' || $status === 'Expelled') {
                echo $status;
            } else {
                $result = $assessmentObject->fetchResultByTerm($admissionNO, $sessionID, $termID);
                if ($result === 'empty 2') {
                    echo $result;
                } else {
                    //array_push($result,$name,$admissionNO);
                    echo json_encode($result, JSON_PRETTY_PRINT);
                }

            }
        }

    }else{
        if (isset($_POST['sessionID'])) {
            $sessionID = $_POST['sessionID'];

            $response = $studentObject->checkStudentStatus($_POST['admission_no']);
            if (is_array($response)) {
                $status = $response['status'];
                if ($status === 'Account deleted' || $status === 'Expelled') {
                    echo $status;
                } else {
                    $result = $assessmentObject->fetchResultBySession($_POST['admission_no'], $sessionID);
                    if ($result === 'empty 2') {
                        echo $result;
                    } else {
                        //array_push($result,$response['name'],$response['admissionNO'],$response['status']);
                        echo json_encode($result, JSON_PRETTY_PRINT);
                        //print_r($response);
                    }

                }
            } else {

                echo $response;

            }


        }


    }
}
