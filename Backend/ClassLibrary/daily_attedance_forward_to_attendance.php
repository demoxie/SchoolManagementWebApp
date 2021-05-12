<?php
require_once("../../Backend/ClassLibrary/Attendance.php");
//require("../../Backend/server/Database.php");
$connect = new Db();
$conn = $connect->getConnection();
$attendObject = new Attendance($conn);

if(isset($_POST)){
    for($n=0;$n<count($_POST['studentID']);$n++){
        $studentID = $_POST['studentID'][$n]['name'];
        $classID =$_POST['classID'];
        $sessionID = $_POST['sessionID'];
        $termID = $_POST['termID'];
        $week = $_POST['week_round'];
        $attendancePoint = $_POST['attendanceScore'][$n]['value'];
        $dayID = $_POST['dayID'];

    $result = $attendObject->markDailyAttendance($studentID,$classID,$sessionID,$termID,$week,$attendancePoint,$dayID);
    print_r($result);
    }

}
?>