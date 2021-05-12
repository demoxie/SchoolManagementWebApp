<?php
//namespace School;
require_once("../../Backend/server/Database.php");

//$connect = new Db();

class SchoolClass extends Db
{
    public $className;
    public $connect;
    public $result;
    public function __construct($connect)
    {

        $this->connect = $connect;

    }
    public function getconstant(){
        return $this->date;
    }

    public function fetchClassData()
    {
        try {
            $query = $this->connect->prepare("SELECT class.classID, CONCAT(class.class, class.classArm) AS studs_class FROM class");
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
     public function checkIfClassExist($className,$classArm)
    {
        try {
            $query = $this->connect->prepare("SELECT * FROM class WHERE `class`=$className AND `classArm`=$classArm");
            if($query->execute()){
                return $query->rowCount();
            }else{
                return 'error fetching';
            }
            

        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function getClassID($classID)
    {
        try {
            $query = $this->connect->prepare("SELECT formMasterID FROM class WHERE classID=$classID");
            $query->execute();
            $result = $query->fetch(PDO::FETCH_ASSOC);
            return $result['formMasterID'];

        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function getFormMaster($classID)
    {
        try {

            $fquery = $this->connect->prepare("SELECT `formMasterName` FROM `formmasters` WHERE `classID`=$classID");
            $fquery->execute();
            $result = $fquery->fetch(PDO::FETCH_ASSOC);
            return $result['formMasterName'];

        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function addClass($className,$classArm,$classTitle,$population,$departmentID, $classRepID)
    {
        try {

            if($this->checkIfClassExist($className,$classArm)>=1){
                return 'Class exist already';
            }else{
                $fquery = $this->connect->prepare("INSERT INTO `class`(`classID`, `classArm`, `class`, `classTitle`, `population`, `departmentID`, `classRepID`, `dateCreated`) VALUES (null,'$classArm','$className','$classTitle',$population,$departmentID,$classRepID,CURRENT_TIMESTAMP())");
            if($fquery->execute()){
                 return 'Class Added successfully';
            }else{
                return 'error inserting';
            }
            }
        
           

        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

}

?>