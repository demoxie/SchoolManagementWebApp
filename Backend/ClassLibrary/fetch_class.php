<?php
require_once("../../Backend/ClassLibrary/SchoolClass.php");
//require("../../Backend/server/Database.php");
$connect = new Db();
$conn = $connect->getConnection();
$schoolClassObject = new SchoolClass($conn);
$class = $schoolClassObject->fetchClassData();
$class_in_json = json_encode($class, JSON_PRETTY_PRINT);
echo $class_in_json;

?>
