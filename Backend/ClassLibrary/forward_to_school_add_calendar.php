<?php
//require("../../Backend/server/Database.php");
require_once("../../Backend/ClassLibrary/School.php");
$connect = new Db();
$conn = $connect->getConnection();
$schoolObject = new School($conn);
if(isset($_POST)){
    //$session,$term,$commencement_date,$closing_date,$next_term_begins)
    $result = $schoolObject->addCalendar($_POST['session'], $_POST['term'],
        $_POST['commencement_date'], $_POST['closing_date'], $_POST['next_term_begins']);
    echo $result;
}else{
    echo 'not received';
}
?>