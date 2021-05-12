<?php
//require("../../Backend/server/Database.php");
require_once("../../Backend/ClassLibrary/Access.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $connect = new Db();
    $connect = $connect->getConnection();
    $accessObject = new Access($connect);
    $username = htmlspecialchars(strip_tags($_POST['username']));
    $password = htmlspecialchars(strip_tags($_POST['password']));
    $accessObject->login($username, $password);

} else {
    echo "error ok";
}


?>