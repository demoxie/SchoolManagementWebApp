<?php
//require("../../Backend/server/Database.php");
require_once("../../Backend/ClassLibrary/Session.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $connect = new Db();
    $conn = $connect->getConnection();
    $sessionObject = new Session($conn);
    echo $sessionObject->fetchSessions();


} else {
    print_r("not sent");
    die();
}


?>
