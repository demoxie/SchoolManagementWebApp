<?php
//require("../../Backend/server/Database.php");
//$connect = new Db();

class Session extends Db
{
    // Db connection
    public $connect;

    public function __construct($connect)
    {


        $this->connect = $connect;
        
    }


    public function checkIfSessionExists($session)
    {
        //echo "<script type='text/javascript'> alert('yes');</script>";
        //$connect = new Db();
        try {

            $sql = $this->connect->prepare("SELECT * FROM `session` WHERE `session`='$session'");
            $sql->execute();
            return $sql->rowCount();

        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function addSession($session, $commencementdate, $endingdate)
    {
        $dateCreated=date("Y-m-d H:m:s");
        $row_count = $this->checkIfSessionExists($session);
        
        if ($row_count <= 0) {
            
            
            try {
                $sql = $this->connect->prepare("INSERT INTO `session`(`sessionID`, `session`, `commencementDate`, `endingDate`, `dateCreated`) VALUES (null,'$session','$commencementdate', '$endingdate', '$dateCreated')");
                $sql->execute();
                echo "Session Added Successfully";
            } catch (PDOException $e) {
                return $e->getMessage();
            }

        } else {
            echo "Session exist already! please update session";
            die();
            //$this->updateSession($session, $commencementdate, $endingdate);
        }


    }

    public function updateSession($session, $commencementdate, $endingdate)
    {
        $dateCreated=date("Y-m-d H:m:s");
        try {
            $query = $this->connect->prepare("UPDATE `session` SET `session`='$session',`commencementDate`='$commencementdate',`endingDate`='$endingdate',`dateCreated`='$dateCreated' WHERE `session`=$session");
            $query->execute();
            echo "Session Updated";
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function deleteSession($sessionID, $session, $currentYear, $dateCreated): string
    {
        try {
            $query = $this->connect->prepare("DELETE FROM `session` WHERE sessionID=$sessionID");
            $query->execute();
            return "Session Deleted Successfully";
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
    public function fetchSessions()
    {
        try {
            $query = $this->connect->prepare("SELECT `session`,`sessionID`, `session` FROM `session`");
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
}