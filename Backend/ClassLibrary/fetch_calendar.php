<?php
//require("../../Backend/server/Database.php");
require_once("../../Backend/ClassLibrary/School.php");
$connect = new Db();
$conn = $connect->getConnection();
$schoolObject = new School($conn);
    $result = $schoolObject->fetchCalendar();
    echo json_encode($result, JSON_PRETTY_PRINT);

?>