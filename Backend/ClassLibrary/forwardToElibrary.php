<?php
require_once("../../Backend/server/Database.php");
require_once("../../Backend/ClassLibrary/ELibrary.php");
require_once("../../Backend/ClassLibrary/Upload.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $connect = new Db();
    $conn = $connect->getConnection();
    $libraryObject = new ELibrary($conn);
    $uploadObject = new Upload($conn);
    $bookName = htmlspecialchars(strip_tags($_POST['title']));
    $author = htmlspecialchars(strip_tags($_POST['author']));
    $publisher = htmlspecialchars(strip_tags($_POST['publisher']));
    $yearpublished = htmlspecialchars(strip_tags($_POST['yearpublished']));
    $edition = htmlspecialchars(strip_tags($_POST['edition']));
    $category= htmlspecialchars(strip_tags($_POST['category']));
    $file = $_FILES["file"]["name"];
    $FILE = $uploadObject->upLoadBook($file);
    $libraryObject->addBook($bookName, $author, $publisher, $yearpublished, $edition, $category, $FILE);
    //print_r($FILE);
    //die();

} else {
    echo "error ok";
}

?>