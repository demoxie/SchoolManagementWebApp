<?php
require_once("../../Backend/ClassLibrary/Student.php");
//require("../../Backend/server/Database.php");
$connect = new Db();
$conn = $connect->getConnection();
$studentObject = new Student($conn);
if (isset($_POST)) {
    echo $studentObject->updateStudentRecord($_POST['STUDENTID'], $_POST['NAME'], $_POST['GENDER'],
        $_POST['DATE_OF_BIRTH'], $_POST['ADDRESS'], $_POST['YEAR_ADMITTED'], $_POST['ADMISSION_NO'],
        $_POST['MYCLASS'], $_POST['RELIGION'], $_POST['STATE_OF_ORIGIN'], $_POST['LGA'], $_POST['P_NAME'],
        $_POST['P_PHONE'], $_POST['P_EMAIL']);

} else {
    echo 'no';
}


?>
