<?php
require("../../Backend/server/Database.php");
require_once("../../Backend/ClassLibrary/Session.php");
$connect = new Db();
$conn = $connect->getConnection();
$sessionObject = new Session($conn);
echo json_encode($sessionObject->fetchSessions(), JSON_PRETTY_PRINT);


?>
