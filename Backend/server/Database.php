<?php

session_start();

class Db
{

    public $connect;
    private $dbPass;
    private $dbUser;
    private $dbHost;
    private $dbName;
    public $date=56.7;


    /**          *
     */
    public function getConnection()
    {
        $this->connect = null;
        $dbName = 'smwa';
        /** Database Name */
        $dbHost = 'localhost';
        /** Database Host */
        $dbUser = 'root';
        /** Database Root */
        $dbPass = '';
        /** Databse Password */
        $connect = '';
        $this->dbName = $dbName;
        $this->dbHost = $dbHost;
        $this->dbUser = $dbUser;
        $this->dbPass = $dbPass;
        $this->connect = $connect;
        try {
            $this->connect = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPass);
            $this->connect->exec("set names utf8");
            //session_start();
            //echo "Success";

        } catch (PDOException $e) {
            var_dump("Couldn't Establish A Database Connection. Due to the following reason: " . $e->getMessage());
        }
        return $this->connect;
    }
    public static function giveDangerAlert($message): array
    {
        return array(-2=>array("alertType"=>"alert alert-danger", "message"=>$message));
    }
    public static function giveWarningAlert($message): array
    {
        return array(-1=>array("alertType"=>"alert alert-warning", "message"=>$message));
    }
    public static function giveInfoAlert($message): array
    {

        return array(1=>array("alertType"=>"alert alert-info", "message"=>$message));
    }
    public static function giveSuccessAlert($message): array
    {
        return array(0=>array("alertType"=>"alert alert-success", "message"=>$message));
    }



}

