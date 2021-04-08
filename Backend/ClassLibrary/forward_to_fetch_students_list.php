<?php
require_once("../../Backend/ClassLibrary/Student.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $connect = new Db();
    $conn = $connect->getConnection();
    $studentObject = new Student($conn);
    if (isset($_POST['class'])) {
        $classlist = $studentObject->fetchStudentByClass($_POST['class']);
        echo $classlist;
    } else {
        echo $studentObject->fetchAllStudent();
    }


} else {
    print_r("not sent");
    die();
}
?>
