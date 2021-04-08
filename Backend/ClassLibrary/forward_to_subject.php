<?php
require_once("../../Backend/ClassLibrary/Subject.php");
//require("../../Backend/server/Database.php");
$connect = new Db();
$conn = $connect->getConnection();
$subjectClassObject = new Subject($conn);
print_r($_POST);

?>
