<?php
//require_once("../../Backend/server/Database.php");
require_once("../../Backend/ClassLibrary/Staffs.php");
$connect = new Db();
$conn = $connect->getConnection();
$staffObject = new Staffs($conn);
    echo json_encode($staffObject->fetchFormMasters(),JSON_PRETTY_PRINT);
?>