<?php
//require("../../Backend/server/Database.php");
require_once("../../Backend/ClassLibrary/Access.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $connect = new Db();
    $connect = $connect->getConnection();
    $accessObject = new Access($connect);
    $username = htmlspecialchars(strip_tags($_POST['username']));
    $password = htmlspecialchars(strip_tags($_POST['password']));
    $msg = $accessObject->login($username, $password);
    if ($msg === 'welcome back') {
        echo $msg;

    } else {
        echo json_encode($msg, JSON_PRETTY_PRINT);
    }


} else {
    echo "error ok";
}


?>