<?php
//require("../../Backend/server/Database.php");
require_once("../../Backend/ClassLibrary/School.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $connect = new Db();
    $conn = $connect->getConnection();
    $schoolObject = new School($conn);
    $result = $schoolObject->checkIfDepartmentExist($_POST['department_name'], $_POST['department_hod']);
    $departments = $schoolObject->fetchDepartments();
    //echo $studentRecord;

    echo $result;


} else {
    print_r("not sent");
    die();
}
?>