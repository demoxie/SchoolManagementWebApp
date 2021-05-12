<?php
//namespace School;
require("../../Backend/server/Database.php");
require("../../Backend/ClassLibrary/School.php");

$connect = new Db();


class Term extends Db
{
    // Db connection
    public $connect;
    public $dateCreated;

    public function __construct($connect)
    {

        $this->connect = $connect;

    }

    public function getSessionID($session)
    {
        try {
            $sql = $this->connect->prepare("SELECT `sessionID` FROM `session` WHERE `session`='$session'");
            $sql->execute();
            return $sql->fetch();

        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function checkIfTermExists($term, $session, $commencementdate)
    {

        try {

            $sessID = $this->getSessionID($session);
            $sessionID=$sessID['sessionID'];
            $sql = $this->connect->prepare("SELECT `termID` FROM `terms` WHERE `term`='$term' AND `sessionID`=$sessionID");
            $sql->execute();
            return $sql->rowCount();

        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }


    public function addTerm($term, $session, $commencementdate, $endingdate)
    {
        $dateCreated = date("Y-m-d H:m:s");
        $sessID = $this->getSessionID($session);
        $sessionID=$sessID['sessionID'];
        $row_count = $this->checkIfTermExists($term, $session, $commencementdate);
        //print_r($row_count);
        //die();
        if ($row_count <= 0) {

            try {
                $sessID = $this->getSessionID($session);
                $sql = $this->connect->prepare("INSERT INTO `terms`(`termID`, `term`, `sessionID`, `commencementDate`, `endingDate`, `dateCreated`) VALUES (null,'$term',$sessionID,'$commencementdate','$endingdate','$dateCreated')");
                $sql->execute();
                echo "Term Added Successfully";
            } catch (PDOException $e) {
                return $e->getMessage();
            }

        } else {
            echo "Term exist already! please update term";
            die();
            //$this->updateSession($session, $commencementdate, $endingdate);
        }


    }

    public function updateTerm($session, $commencementdate, $endingdate)
    {
        $dateCreated = date("Y-m-d H:m:s");
        try {
            $query = $this->connect->prepare("UPDATE `terms` SET `termID`=[value-1],`term`=[value-2],`sessionID`=[value-3],`commencementDate`=[value-4],`endingDate`=[value-5],`dateCreated`=[value-6] WHERE 1");
            $query->execute();
            echo "Term Updated";
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function deleteTerm($sessionID, $session, $currentYear, $dateCreated): string
    {
        try {
            $query = $this->connect->prepare("DELETE FROM `session` WHERE sessionID=$sessionID");
            $query->execute();
            return "Term Deleted Successfully";
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
}