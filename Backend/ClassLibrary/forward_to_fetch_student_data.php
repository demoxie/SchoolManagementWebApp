<?php
require_once("../../Backend/ClassLibrary/Student.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $connect = new Db();
    $conn = $connect->getConnection();
    $studentObject = new Student($conn);
    if (isset($_POST['ID'])) echo $studentObject->fetchAStudent($_POST['ID']); else echo "select";
} else {
    print_r("not sent");
    die();
}
?>