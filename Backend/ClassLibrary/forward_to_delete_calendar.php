<?php
require_once("../../Backend/ClassLibrary/School.php");
$connect = new Db();
$conn = $connect->getConnection();
$schoolObject = new School($conn);
if(isset($_POST)){
    $result = $schoolObject->deleteCalendar($_POST['calendarID']);
    echo $result;
}

?>