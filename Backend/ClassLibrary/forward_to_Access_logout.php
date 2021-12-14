<?php
//require("../../Backend/server/Database.php");
require_once("../../Backend/ClassLibrary/Access.php");

$connect = new Db();
$connect = $connect->getConnection();
$accessObject = new Access($connect);

echo $accessObject->logout();


?>