<?php
//require_once("../../Backend/server/Database.php");
require_once("../../Backend/ClassLibrary/Student.php");
$connect = new Db();
$conn = $connect->getConnection();
$studentObject = new Student($conn);
if(isset($_POST)){
    $keyword = $_POST['keyword'];
    if($keyword !== ''){
        echo $studentObject->searchForStudentByKeyword($keyword);
    }
    
    
}

?>