<?php
//require_once("../../Backend/server/Database.php");
require_once("../../Backend/ClassLibrary/Staffs.php");
$connect = new Db();
$conn = $connect->getConnection();
$staffObject = new Staffs($conn);
if(isset($_POST)){

echo json_encode($staffObject->addFormMaster($_POST['form_master'], $_POST['staff-id'],$_POST['class']),JSON_PRETTY_PRINT);

}

?>