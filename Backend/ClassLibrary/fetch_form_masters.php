<?php
require_once("../../Backend/ClassLibrary/SchoolClass.php");
//require("../../Backend/server/Database.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $connect = new Db();
    $conn = $connect->getConnection();
    $schoolClassObject = new SchoolClass($conn);

    if (isset($_POST['classID'])) echo $schoolClassObject->getFormMaster($_POST['classID']);


} else {
    print_r("not sent");
    die();
}

?>
