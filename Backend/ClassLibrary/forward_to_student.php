<?php
require_once("../../Backend/ClassLibrary/Student.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $connect = new Db();
    $conn = $connect->getConnection();
    $studentObject = new Student($conn);
    //$response =$_POST;
    $dateApplied = date('Y-m-d h:m:s');
    $response = $studentObject->registerStudent($_POST['first_name'], $_POST['middle_name'], $_POST['last_name'], $_POST['date_of_birth'], $_POST['gender'], $_POST['health_status'], $_FILES["passport"]["name"], $_POST['school_name'], $_POST['prev_class'], $_POST['pres_class'], $_POST['pos_or_grade'], $_POST['office_address'], $_POST['p_email'], $_POST['p_phone_no'], $_POST['postal_address'], $_POST['residential_address'], $_POST['state_of_origin'], $_POST['lga'], $_POST['religion'], $_POST['denomination'], $_POST['emotional_behavior'], $_POST['social_behavior'], $_POST['spiritual_behavior'], $dateApplied, $_POST['p_first_name'], $_POST['p_middle_name'], $_POST['p_last_name']);
    echo json_encode($response, JSON_PRETTY_PRINT);

} else {
    print_r("not sent");
    die();
}
?>
