<?php
//require("../../Backend/server/Database.php");
//require_once("../../Backend/ClassLibrary/Student.php");
require_once("../../Backend/ClassLibrary/Student.php");
//require_once("../../Backend/ClassLibrary/CodeGenerator.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $connect = new Db();
    $conn = $connect->getConnection();
    $studentObject = new Student($conn);
    echo $studentObject->adddStatus($_POST['studentID'], $_POST['previousClassID'], $_POST['currentClassID'], $_POST['termID'], $_POST['sessionID'], 'Admitted');


    //print_r($_POST);

} else {
    print_r("not sent");
}
?>