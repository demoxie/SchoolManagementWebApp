<?php
//require("../../Backend/server/Database.php");
$connect = new Db();

class Subject extends Db
{
    public $subjectID;
    public $subjectName;
    public $subjectTeacher;
    public $departmentID;
    public $adminID;
    public $dateCreated;
    public $connect;

    public function __construct($connect)
    {
        $this->connect = $connect;

    }

    public function fetchSubjects()
    {
        try {
            $query = $this->connect->prepare("SELECT `subjectID`, `subjectName` FROM `subject`");
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function getSubjectName($subjectID)
    {
        try {
            $cs_query = $this->connect->prepare("SELECT `subjectName` FROM `subject` WHERE `subjectID`=$subjectID");
            $cs_query->execute();
            if ($cs_query->rowCount() >= 1) {
                $res = $cs_query->fetch(PDO::FETCH_ASSOC);
                return $res['subjectName'];
            }

        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function fetchCS_Subjects()
    {
        try {
            $cs_query = $this->connect->prepare("SELECT * FROM `combinedsubjects`");
            $cs_query->execute();
            $result = $cs_query->fetchAll(PDO::FETCH_ASSOC);
            for ($i=0;$i<count($result);$i++){
                $result[$i]['subject1_ID']=$this->getSubjectName($result[$i]['subject1_ID']);
                $result[$i]['subject2_ID']=$this->getSubjectName($result[$i]['subject2_ID']);
                $result[$i]['subject3_ID']=$this->getSubjectName($result[$i]['subject3_ID']);
                $result[$i]['subject4_ID']=$this->getSubjectName($result[$i]['subject4_ID']);
                $result[$i]['subject5_ID']=$this->getSubjectName($result[$i]['subject5_ID']);
                $result[$i]['subject6_ID']=$this->getSubjectName($result[$i]['subject6_ID']);
                $result[$i]['subject7_ID']=$this->getSubjectName($result[$i]['subject7_ID']);
                $result[$i]['subject8_ID']=$this->getSubjectName($result[$i]['subject8_ID']);
               // print_r($result[$i]);

            }
            return $result;


        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function getNumberOfForAClass($classID)
    {
        try {
            $query = $this->connect->prepare("SELECT * FROM `subject` WHERE `classID`=$classID");
            $query->execute();
            return $query->rowCount();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function checkIfCombinedSubjectExits($cs_code, $cs_name)
    {
        try {
            $cs_query = $this->connect->prepare("SELECT * FROM `combinedsubjects` WHERE `cs_Code`=$cs_code AND `cs_Name`=$cs_name");
            $cs_query->execute();
            return $cs_query->rowCount();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function checkIfSubjectExits($subjectCode,$subjectName)
    {
        try {
            $query = $this->connect->prepare("SELECT `subjectCode`, `subjectName` FROM `subject` WHERE `subjectCode`='$subjectCode' AND `subjectName`='$subjectName'");
            if($query->execute()){
                 return $query->rowCount();
            }else{
                return 'false';
            }
           
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function addSubject($subjectCode, $subjectName, $subjectUnit)
    {
            try {
                 $row_count = $this->checkIfSubjectExits($subjectCode,$subjectName);
                echo $row_count;
                if ($row_count <= 0) {
                $sql = $this->connect->prepare("INSERT INTO `subject`(`subjectID`,`subjectCode`, `subjectName`,`subjectUnit`, `dateCreated`) VALUES (null,'$subjectCode','$subjectName',$subjectUnit,CURRENT_TIMESTAMP())");
                if($sql->execute()){
                    return "Subject Added Successfully";
                }else{
                    return 'Unable to insert';
                }
                    } else {
            return "Subject exist already";
        }
                
            } catch (PDOException $e) {
                return $e->getMessage();
            }

        
    }

    public function addCombinedSubject($cs_code, $cs_name, array $subjectIDs): string
    {

        $row_count = $this->checkIfCombinedSubjectExits($cs_code, $cs_name);
        if ($row_count === 0) {

            try {
                $subject1 = $subjectIDs[0]['value'];
                $subject2 = $subjectIDs[1]['value'];

                switch (count($subjectIDs)) {
                    case 8:
                        $subject3 = $subjectIDs[2]['value'];
                        $subject4 = $subjectIDs[3]['value'];
                        $subject5 = $subjectIDs[4]['value'];
                        $subject6 = $subjectIDs[5]['value'];
                        $subject7 = $subjectIDs[6]['value'];
                        $subject8 = $subjectIDs[7]['value'];
                        $sql = $this->connect->prepare("INSERT INTO `combinedsubjects`(`cs_ID`, `cs_Code`, `cs_Name`, `subject1_ID`, `subject2_ID`, `subject3_ID`, `subject4_ID`, `subject5_ID`, `subject6_ID`, `subject7_ID`, `subject8_ID`, `dateCreated`)
 VALUES (null,'$cs_code','$cs_name',$subject1,$subject2,$subject3,$subject4,$subject5,$subject6,$subject7,$subject8,CURRENT_TIMESTAMP)");
                        break;
                    case 7:
                        $subject3 = $subjectIDs[2]['value'];
                        $subject4 = $subjectIDs[3]['value'];
                        $subject5 = $subjectIDs[4]['value'];
                        $subject6 = $subjectIDs[5]['value'];
                        $subject7 = $subjectIDs[6]['value'];
                        $sql = $this->connect->prepare("INSERT INTO `combinedsubjects`(`cs_ID`, `cs_Code`, `cs_Name`, `subject1_ID`, `subject2_ID`, `subject3_ID`, `subject4_ID`, `subject5_ID`, `subject6_ID`, `subject7_ID`, `dateCreated`)
 VALUES (null,'$cs_code','$cs_name',$subject1,$subject2,$subject3,$subject4,$subject5,$subject6,$subject7,CURRENT_TIMESTAMP)");
                        break;
                    case 6:
                        $subject3 = $subjectIDs[2]['value'];
                        $subject4 = $subjectIDs[3]['value'];
                        $subject5 = $subjectIDs[4]['value'];
                        $subject6 = $subjectIDs[5]['value'];
                        $sql = $this->connect->prepare("INSERT INTO `combinedsubjects`(`cs_ID`, `cs_Code`, `cs_Name`, `subject1_ID`, `subject2_ID`, `subject3_ID`, `subject4_ID`, `subject5_ID`, `subject6_ID`, `dateCreated`)
 VALUES (null,'$cs_code','$cs_name',$subject1,$subject2,$subject3,$subject4,$subject5,$subject6,CURRENT_TIMESTAMP)");
                        break;
                    case 5:
                        $subject3 = $subjectIDs[2]['value'];
                        $subject4 = $subjectIDs[3]['value'];
                        $subject5 = $subjectIDs[4]['value'];
                        $sql = $this->connect->prepare("INSERT INTO `combinedsubjects`(`cs_ID`, `cs_Code`, `cs_Name`, `subject1_ID`, `subject2_ID`, `subject3_ID`, `subject4_ID`, `subject5_ID`, `dateCreated`)
 VALUES (null,'$cs_code','$cs_name',$subject1,$subject2,$subject3,$subject4,$subject5,CURRENT_TIMESTAMP)");
                        break;
                    case 4:
                        $subject3 = $subjectIDs[2]['value'];
                        $subject4 = $subjectIDs[3]['value'];
                        $sql = $this->connect->prepare("INSERT INTO `combinedsubjects`(`cs_ID`, `cs_Code`, `cs_Name`, `subject1_ID`, `subject2_ID`, `subject3_ID`, `subject4_ID`, `dateCreated`)
 VALUES (null,'$cs_code','$cs_name',$subject1,$subject2,$subject3,$subject4,CURRENT_TIMESTAMP)");
                        break;
                    case 3:
                        $subject3 = $subjectIDs[2]['value'];
                        $sql = $this->connect->prepare("INSERT INTO `combinedsubjects`(`cs_ID`, `cs_Code`, `cs_Name`, `subject1_ID`, `subject2_ID`, `subject3_ID`, `dateCreated`)
 VALUES (null,'$cs_code','$cs_name',$subject1,$subject2,$subject3,CURRENT_TIMESTAMP)");
                        break;
                    default:
                        $sql = $this->connect->prepare("INSERT INTO `combinedsubjects`(`cs_ID`, `cs_Code`, `cs_Name`, `subject1_ID`, `subject2_ID`, `dateCreated`)
 VALUES (null,'$cs_code','$cs_name',$subject1,$subject2,CURRENT_TIMESTAMP)");
                        break;
                }
                if ($sql->execute()) {
                    return "true";
                } else {
                    return "error occured";
                }

            } catch (PDOException $e) {
                return $e->getMessage();
            }

        } else {
            //updateSubject();
        }
    }


    public function updateSubject($subjectID, $subjectName, $subjectUnit, $subjectTeacher, $departmentID, $adminID, $dateCreated): string
    {
        $schoolID = 1;
        try {
            $query = $this->connect->prepare("UPDATE `subject` SET `subjectID`=$subjectID,`subjectName`='$subjectName',`subjectUnit`=$subjectUnit,`subjectTeacher`='$subjectTeacher',`departmentID`=$departmentID,`adminID`=$adminID,`dateCreated`=$dateCreated WHERE subjectID=$subjectID");
            $query->execute();
            return "Subject Updated Successfully";
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function deleteCSSubject($cs_id): string
    {
        try {
            $query = $this->connect->prepare("DELETE FROM `combinedsubjects` WHERE `cs_ID`=$cs_id");
            if($query->execute()){
                return 'true';
            }
            return 'false';
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
}