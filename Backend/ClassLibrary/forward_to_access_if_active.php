<?php
//require("../../Backend/server/Database.php");
require_once("../../Backend/ClassLibrary/Access.php");
$connect = new Db();
$connect = $connect->getConnection();
$accessObject = new Access($connect);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo $accessObject->welcome();

} else {
    echo "error ok";
}


?>