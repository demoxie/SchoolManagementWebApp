<?php
require_once("../../Backend/ClassLibrary/Student.php");
//require("../../Backend/server/Database.php");
$connect = new Db();
$conn = $connect->getConnection();
$studentObject = new Student($conn);
if (isset($_POST['ID'])) {
    echo $studentObject->deleteStudentRecord($_POST['ID']);

} else {
    echo 'no';
}


?>
