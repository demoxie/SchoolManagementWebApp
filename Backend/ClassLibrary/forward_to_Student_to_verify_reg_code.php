<?php
//require("../../Backend/server/Database.php");
//require_once("../../Backend/ClassLibrary/Student.php");
require_once("../../Backend/ClassLibrary/Student.php");
//require_once("../../Backend/ClassLibrary/CodeGenerator.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $connect = new Db();
    $conn = $connect->getConnection();
    $studentObject = new Student($conn);
    if (isset($_POST['reg_code'])) echo $studentObject->verifyRegistrationCode(htmlspecialchars(stripslashes(trim($_POST['reg_code'])))); else echo 'false';
    //print_r($_POST);

} else {
    print_r("not sent");
}
?>