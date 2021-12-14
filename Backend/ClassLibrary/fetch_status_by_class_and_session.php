<?php
require_once("../../Backend/ClassLibrary/Student.php");
//require("../../Backend/server/Database.php");
$connect = new Db();
$conn = $connect->getConnection();
$studentObject = new Student($conn);
if(isset($_POST)) {
    if (isset($_POST['classID']) && isset($_POST['current_sessionID'])) {
        echo $studentObject->fetchStudentStatusByClassAndSession($_POST['classID'], $_POST['current_sessionID']);
    } else if (isset($_POST['classID'])) {
        echo $studentObject->fetchStudentStatusByClass($_POST['classID']);
    } else if (isset($_POST['current_sessionID'])) {
        echo $studentObject->fetchStudentStatusBySession($_POST['current_sessionID']);
    }
}

?>
