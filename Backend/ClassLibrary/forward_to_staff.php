<?php
require_once("../../Backend/ClassLibrary/Staffs.php");
require_once("../../Backend/ClassLibrary/CodeGenerator.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $connect = new Db();
    $conn = $connect->getConnection();
    /*print_r(CodeGenerator::getAge('1998-01-01'));
    die();*/
    $staffObject = new Staffs($conn);
    $fullName = $_POST["first_name"] . " " . $_POST["middle_name"] . " " . $_POST["last_name"];
    $dob = $_POST['dob'];
    if (isset($dob)) {
        $age = CodeGenerator::getAge("$dob");
        $result = $staffObject->addStaff($fullName, $_POST["gender"], $age, $dob, $_POST["religion"], $_POST["marital_status"], $_POST["health_status"], $_POST["course"], $_POST["account_no"], $_POST["bank_name"], $_POST["account_type"], $_POST["state_of_origin"], $_POST["lga"], $_POST["home_address"], $_POST["phone"], $_POST["email"], $_FILES["passport"]["name"]);
        echo json_encode($result, JSON_PRETTY_PRINT);
    }


    //print_r($_POST['dob']);

} else {
    print_r("not sent");
    die();
}
?>
