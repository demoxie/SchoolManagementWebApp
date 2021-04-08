<?php
require_once("../../Backend/ClassLibrary/Assessment.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $connect = new Db();
    $conn = $connect->getConnection();
    $assessmentObject = new Assessment($conn);
    $assessmentResult = '';
    for ($i = 0; $i < count($_POST['StudentNames']); $i++) {
        $studentID = $_POST['StudentNames'][$i]['name'];
        $first_CA = $_POST['FirstCA'][$i]['value'];
        $second_CA = $_POST['SecondCA'][$i]['value'];
        $third_CA = $_POST['ThirdCA'][$i]['value'];
        $total_CA = $_POST['StudentTotal'][$i]['value'];
        $assessmentResult = $assessmentObject->insert_CA_Scores($studentID, $first_CA, $second_CA, $third_CA, $total_CA, $_POST['Session'], $_POST['MyClass'], $_POST['Term'], $_POST['Subject']);
    }
    echo $assessmentResult;

    if ($assessmentResult) {
        Db::giveSuccessAlert("CA Entered successfully");
    } else {
        Db::giveDangerAlert("Unable to Enter CA Due to errors");
    }
    //print_r();
    //die();

} else {
    print_r("not sent");
    die();
}
?>