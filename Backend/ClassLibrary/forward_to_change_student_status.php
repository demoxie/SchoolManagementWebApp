<?php
require_once("../../Backend/ClassLibrary/Student.php");
//require("../../Backend/server/Database.php");
$connect = new Db();
$conn = $connect->getConnection();
$studentObject = new Student($conn);
if(isset($_POST)){
//     [studentID] => 15
//    [currentClass] => JSS 3A
//    [previousClass] => JSS 3A
//    [status] => Expelled
//    [sessionID] => 1
//    [termID] => 1
//    [classID] => 20
    //$studentID,$currentClass,$previousClass,$status,$sessionID,$termID,$classID
    print_r($studentObject->updateStudentStatus($_POST['studentID'], $_POST['currentClass'], $_POST['previousClass'], $_POST['status'], $_POST['next_sessionID'], $_POST['termID']));
    //print_r($_POST);
}
?>
