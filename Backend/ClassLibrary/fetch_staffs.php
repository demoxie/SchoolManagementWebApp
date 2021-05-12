<?php
require_once("../../Backend/ClassLibrary/Staffs.php");
//require("../../Backend/server/Database.php");
$connect = new Db();
$conn = $connect->getConnection();
$staffsObject = new Staffs($conn);

echo json_encode($staffsObject->fetchStaffs(),JSON_PRETTY_PRINT);


?>
