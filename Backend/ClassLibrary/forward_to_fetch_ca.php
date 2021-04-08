<?php
require_once("../../Backend/ClassLibrary/Assessment.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $connect = new Db();
    $conn = $connect->getConnection();
    $assessmentObject = new Assessment($conn);
    if (isset($_POST['class']) && isset($_POST['subject']) && isset($_POST['session']) && isset($_POST['term'])) {
        $caScore_list = $assessmentObject->getCAScores($_POST['class'], $_POST['subject'], $_POST['session'], $_POST['term']);
        echo $caScore_list;
    } else {
        echo "select all";
    }
} else {
    print_r("not sent");
    die();
}
?>
