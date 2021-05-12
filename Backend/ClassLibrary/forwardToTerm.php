<?php
include_once("../../Backend/ClassLibrary/Term.php");
include_once("../../Backend/server/Database.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $connect = new Db();
    $connect = $connect->getConnection();
    $termObject = new Term($connect);
    $session = htmlspecialchars(strip_tags($_POST['session']));
    $term = $_POST['term'];
    $commencementdate = $_POST['commencementdate'];
    $endingdate = $_POST['endingdate'];
   $termObject->addTerm($term, $session, $commencementdate, $endingdate);
    //print_r($endingdate);
    //die();
} else {
    echo "error ok";
}

?>