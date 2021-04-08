<?php
require_once("../../Backend/ClassLibrary/School.php");
//require("../../Backend/server/Database.php");
$connect = new Db();
$conn = $connect->getConnection();
$schoolObject = new School($conn);
$departments = $schoolObject->fetchDepartments();
echo $departments;

?>
