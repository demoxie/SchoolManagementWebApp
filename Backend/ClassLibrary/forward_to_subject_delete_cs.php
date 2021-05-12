<?php
require("../../Backend/server/Database.php");
require_once("../../Backend/ClassLibrary/Subject.php");
$connect = new Db();
$conn = $connect->getConnection();
$subjectObject = new Subject($conn);
if(isset($_POST)){

    print_r($subjectObject->deleteCSSubject($_POST['cs_id']));

}else{
    echo 'never';
}