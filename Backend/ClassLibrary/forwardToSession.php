<?php
include_once("../../Backend/server/Database.php");
include_once("../../Backend/ClassLibrary/Session.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $connect = new Db();
    $connect = $connect->getConnection();
    $sessionObject = new Session($connect);
    $session = htmlspecialchars(strip_tags($_POST['session']));
    $commencementdate = $_POST['commencementdate'];
    $endingdate = $_POST['endingdate'];
    $sessionObject->addSession($session, $commencementdate, $endingdate);
} else {
    echo "error ok";
}

?>