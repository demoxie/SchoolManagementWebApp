<?php
//require_once("../../Backend/server/Database.php");
require_once("../../Backend/ClassLibrary/SchoolClass.php");
$connect = new Db();
$conn = $connect->getConnection();
$classObject = new SchoolClass($conn);
if(isset($_POST)){

    print_r($classObject->addClass($_POST['class_name'],$_POST['class_arm'],$_POST['class_title'],$_POST['population'],$_POST['department'], $_POST['student-id']));
    
}

?>