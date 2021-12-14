<?php

require("../../Backend/server/Database.php");
require_once("../../Backend/ClassLibrary/Attendance.php");
$connect = new Db();
$conn = $connect->getConnection();
$attendObject = new Attendance($conn);

if (isset($_POST['studentID'])) {
    for ($n = 0; $n < count($_POST['studentID']); $n++) {
        $studentID = $_POST['studentID'][$n]['name'];
        $classID = $_POST['classID'];
        $sessionID = $_POST['sessionID'];
        $termID = $_POST['termID'];
        $no_of_times_school_opened = $_POST['no_of_times_school_opened'];
        $week = $_POST['week'];
        $mon = $_POST['mon'][$n]['value'];
        $tues = $_POST['tues'][$n]['value'];
        $wed = $_POST['wed'][$n]['value'];
        $thurs = $_POST['thurs'][$n]['value'];
        $fri = $_POST['fri'][$n]['value'];
        $total = $_POST['total'][$n]['value'];
        $result = $attendObject->markWeeklyAttendance($studentID, $classID, $sessionID, $termID, $no_of_times_school_opened, $week, $mon, $tues, $wed, $thurs, $fri, $total);
        print_r($result);
    }

} else {
    echo 'please select fill all required space';
}
?>