<?php
//require("../../Backend/server/Database.php");


class ELibrary extends Db
{
    public $title;
    public $author;
    public $publisher;
    public $yearpublished;
    public $edition;
    public $category;
    public $file;
    public $bookID;
    public $connect;
    // $error=array("alert alert-danger":"Account exist proceed to login here", "alert alert-warning":"You're not registered, please register first");

    public function __construct($connect)
    {
        $this->connect = $connect;

    }
    public function getBookID($title, $author, $publisher, $yearpublished, $edition){
         try {
            $query = $this->connect->prepare("SELECT `bookID` FROM `books` WHERE `bookTitle`='$title', `bookAuthor`='$author', `bookPublisher`='$publisher', `yearPublished`='$yearpublished', `bookEdition`='$edition'");
            $query->execute();
            return $query->rowCount();
            
        } catch (PDOException $e) {
            return $e->getMessage();
        }

    }
    public function getBookCategoryID($category){
         try {
            $query = $this->connect->prepare("SELECT `categoryID` FROM `bookscategory` WHERE `categoryName` = '$category'");
            $query->execute();
            $result = $query->fetch();
             return $result['categoryID'];
            
        }catch (PDOException $e){  
            return $e->getMessage();
        }

    }
    public function fetchBooks($bookID): int
    {
         try {
            $query = $this->connect->prepare("SELECT * FROM `books` WHERE `bookID`=$bookID");
            $query->execute();
            return $query->rowCount();
            
        } catch (PDOException $e) {
            return $e->getMessage();
        }

}
    public function checkIfBookExist($title, $author, $edition, $categoryID){
         try {
            $query = $this->connect->prepare("SELECT * FROM `books` WHERE `bookTitle`='$title' AND `bookAuthor`='$author' AND `bookEdition`='$edition' AND `bookCategoryID`=$categoryID");
            $query->execute();
            return $query->rowCount();
            
        } catch (PDOException $e) {
            return $e->getMessage();
        }

    }
    public function addBook($title, $author, $publisher, $yearpublished, $edition, $category, $file){
         try {
             
             $categoryID=$this->getBookCategoryID($category);
             $bookExist = $this->checkIfBookExist($title, $author, $edition, $categoryID);
             //$year=date('Y-m-d', $yearpublished);
            //print_r($bookExist);
            //die();
             if($bookExist <= 0){
             //$year=date('Y', $yearpublished);
                // print_r($yearpublished);
            //die();
             $sql = $this->connect->prepare("INSERT INTO `books`(`bookID`, `bookTitle`, `bookAuthor`, `bookPublisher`, `yearPublished`, `bookEdition`, `bookCategoryID`, `fileName`) VALUES (null,'$title','$author','$publisher','$yearpublished','$edition',$categoryID,'$file')");
             $sql->execute();
                 //print_r($sql->rowCount());
                 //die();
            echo "Book Uploaded Successfully";
             }else{
                  echo "Book Exist, please upload another one";
             }
             
             } catch (PDOException $e) {
            return $e->getMessage();
        }

    }
    public function deleteBook($bookID){
         try {
            $query = $this->connect->prepare("DELETE FROM `books` WHERE `bookID`=$bookID");
            $query->execute();
            return $query->rowCount();
            
        } catch (PDOException $e) {
            return $e->getMessage();
        }

    }
    public function updateBookData($bookID){
         try {
            $query = $this->connect->prepare("UPDATE `books` SET `bookID`=[value-1],`bookTitle`=[value-2],`bookAuthor`=[value-3],`bookPublisher`=[value-4],`yearPublished`=[value-5],`bookEdition`=[value-6],`bookCategoryID`=[value-7] WHERE 1");
            $query->execute();
            return $query->rowCount();
            
        } catch (PDOException $e) {
            return $e->getMessage();
        }

    }
}