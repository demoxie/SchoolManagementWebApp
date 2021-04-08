<?php
require_once("../../Backend/ClassLibrary/Staffs.php");
//require("../../Backend/server/Database.php");
$connect = new Db();
$conn = $connect->getConnection();
$staffsObject = new Staffs($conn);
//$_POST['search_keyword']=f;
$keyword = $_POST['search_keyword'];
//echo $staffsObject->fetchStaffs("$keyword");
print_r($_POST['search_keyword']);

?>
