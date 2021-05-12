<?php
//require_once("../../Backend/server/Database.php");
require_once("../../Backend/ClassLibrary/Staffs.php");
$connect = new Db();
$conn = $connect->getConnection();
$staffObject = new Staffs($conn);
//print_r($_POST['form_masterID']);
if(isset($_POST['form_masterID'])){
    //echo $_POST['form_masterID'];
    echo $staffObject->deleteAFormMaster($_POST['form_masterID']);
}else{
    echo 'Not sent';
}
?>