<?php
//require("../../Backend/server/Database.php");
require_once("../../Backend/ClassLibrary/Access.php");
$connect = new Db();
$connect = $connect->getConnection();
$accessObject = new Access($connect);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    echo $accessObject->createloginAccount($username, $password);

} else {
    echo "error ok";
}


?>