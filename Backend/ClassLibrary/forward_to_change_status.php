<?php
require_once("../../Backend/ClassLibrary/Student.php");
//require("../../Backend/server/Database.php");
$connect = new Db();
$conn = $connect->getConnection();
$studentObject = new Student($conn);
if(isset($_POST)){
    if(isset($_POST['classID']) && isset($_POST['sessionID'])){
        print_r($studentObject->fetchStudentStatusByClassAndSession($_POST['classID'],$_POST['sessionID']));
    }else if(isset($_POST['classID'])){
        print_r($studentObject->fetchStudentStatusByClass($_POST['classID']));
    }else if(isset($_POST['sessionID'])){
        print_r($studentObject->fetchStudentStatusBySession($_POST['sessionID']));
    }

}

?>
