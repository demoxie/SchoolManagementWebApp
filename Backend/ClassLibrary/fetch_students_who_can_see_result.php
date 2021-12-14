<?php
require_once("../../Backend/ClassLibrary/Student.php");
//require_once("../../Backend/ClassLibrary/Assessment.php");
$connect = new Db();
$conn = $connect->getConnection();
$studentObject = new Student($conn);
if (isset($_POST)) {
    $classID = $_POST['classID'];
    $sessionID = $_POST['sessionID'];
    echo $studentObject->fetchStudentWhoCanSesResultByClassAndSession($classID, $sessionID);
    //print_r($_POST);
}

?>
