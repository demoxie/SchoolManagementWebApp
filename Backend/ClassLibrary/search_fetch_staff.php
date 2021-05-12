<?php
//require_once("../../Backend/server/Database.php");
require_once("../../Backend/ClassLibrary/Staffs.php");
$connect = new Db();
$conn = $connect->getConnection();
$staffObject = new Staffs($conn);
if(isset($_POST)){
    $keyword = $_POST['keyword'];
    if($keyword !== ''){
        echo json_encode($staffObject->fetchAStaff($keyword),JSON_PRETTY_PRINT);
    }
    
    
}

?>