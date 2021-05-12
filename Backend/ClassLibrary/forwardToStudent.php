<?php
require("../../Backend/ClassLibrary/Student.php");
require("../../Backend/server/Database.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $connect = new Db();
    $connect = $connect->getConnection();
    $studentObject = new Student($connect);
    $firstname = htmlspecialchars(strip_tags($_POST['firstname']));
    $midname = htmlspecialchars(strip_tags($_POST['midname']));
    $lastname = htmlspecialchars(strip_tags($_POST['lastname']));
    $address = htmlspecialchars(strip_tags($_POST['address']));
    $email = htmlspecialchars(strip_tags($_POST['email']));
    $phone = htmlspecialchars(strip_tags($_POST['phone']));
    $passport = htmlspecialchars(strip_tags($_POST['passport']));
    $dob = htmlspecialchars(strip_tags($_POST['dob']));
    $gender = htmlspecialchars(strip_tags($_POST['gender']));
    $healthstatus = htmlspecialchars(strip_tags($_POST['health_status']));
    $class = htmlspecialchars(strip_tags($_POST['class']));
    $receiptno = htmlspecialchars(strip_tags($_POST['receiptno']));
    $studentName="$firstname "."$midname "."$lastname";
    print_r($firstname);
    die();
    $studentObject->registerStudent($studentName, $address, $email, $phone, $dob, $gender, $healthstatus, $class, $receiptno);

} else {
    echo "error ok";
}


?>