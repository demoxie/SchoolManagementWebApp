<?php
require("../../Backend/server/Database.php");
require_once("../../Backend/ClassLibrary/Subject.php");
$connect = new Db();
$conn = $connect->getConnection();
$subjectObject = new Subject($conn);
echo json_encode($subjectObject->fetchCS_Subjects(),JSON_PRETTY_PRINT);

?>