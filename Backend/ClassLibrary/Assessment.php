<?php
//require("../../Backend/server/Database.php");
//require_once("../../Backend/ClassLibrary/Student.php");
$connect = new Db();

class Assessment extends Db
{

    public $Name;
    public $alert;
    public $connect;

    public function __construct($connect)
    {
        $this->connect = $connect;

    }

    public function checkIfSessionAssessmentExist($studentID, $subjectID, $classID, $sessionID)
    {
        try {
            $chk_query = $this->connect->prepare("SELECT * FROM `sessionalassessment` WHERE `studentID`=$studentID  AND `subjectID`=$subjectID AND `classID`=$classID AND `sessionID`=$sessionID");
            $chk_query->execute();
            return $chk_query->rowCount();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
        // die();

    }
    public function fetchTermCount($studentID, $subjectID, $classID, $sessionID)
    {
        try {
            $chk_query = $this->connect->prepare("SELECT * FROM `sessionalassessment` WHERE `studentID`=$studentID  AND `subjectID`=$subjectID AND `classID`=$classID AND `sessionID`=$sessionID");
            if($chk_query->execute()){
                $tc = $chk_query->fetch(PDO::FETCH_ASSOC);
                return $tc['termCount'];
            }
            return $chk_query->rowCount();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
        // die();

    }

    public function checkIfTermAssessmentExist($studentID, $subjectID, $classID, $sessionID, $termID)
    {
        try {
            $chk_query = $this->connect->prepare("SELECT * FROM `termly_assessment` WHERE `studentID`=$studentID  AND `subjectID`=$subjectID AND `classID`=$classID AND `sessionID`=$sessionID AND `termID`=$termID");
            $chk_query->execute();
            return $chk_query->rowCount();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function fetchAssessmenForCS()
    {
        try {
            $query = $this->connect->prepare("SELECT `cs_assessmentID`, `studentID`, `subjectID`, `classID`, `sessionID`,
       `subjectCount`,`termCount`, `firstTermScore`, `secondTermScore`, `thirdTermScore` FROM `cs_assessment`");

            if ($query->execute()) {
                return $query->fetchAll(PDO::FETCH_ASSOC);
            }


        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function checkIfCSAssementExistForAnIndividual($studentID, $classID, $subjectID, $sessionID)
    {
        try {
            $query = $this->connect->prepare("SELECT `cs_assessmentID`, `studentID`, `subjectID`, `classID`, `sessionID`,
       `subjectCount`, `firstTermScore`, `secondTermScore`, `thirdTermScore` FROM `cs_assessment` WHERE `studentID`=$studentID AND `classID`=$classID AND `sessionID`=$sessionID AND `subjectID`=$subjectID");

            if ($query->execute()) {
                return $query->rowCount();
            }

        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
    public function fetchSessionScoreForAClass($classID,$subjectID,$sessionID){
        try {
            $result_query = $this->connect->prepare("SELECT `studentID`,`subjectID`,`classID`,`sessionID`,`termCount`,`firstTermScore`, `secondTermScore`, `thirdTermScore`, `grandTotal`,`average`, `position`, `grade`, `remark` FROM `sessionalassessment` WHERE `classID`=$classID AND `subjectID`=$subjectID AND `sessionID`=$sessionID");
            $result_query->execute();
            return $result_query->fetchAll(PDO::FETCH_ASSOC);
        }catch (PDOException $e){
            return $e->getMessage();
        }
    }
    public function fetchCS(){
        try {
            $query_cs = $this->connect->prepare("SELECT `cs_ID`,`cs_Code`, `cs_Name`, `subject1_ID`, `subject2_ID`, `subject3_ID`, `subject4_ID`, `subject5_ID`, `subject6_ID`, `subject7_ID`, `subject8_ID` FROM `combinedsubjects`");
            if($query_cs->execute()){
                return $query_cs->fetchAll(PDO::FETCH_ASSOC);
            }else{
                return "not executed";
            }


        }catch (PDOException $e){
            return $e->getMessage();
        }
    }


    public function insert_CA_Scores($studentID, $firstCA, $secondCA, $thirdCA, $totalCA, int $sessionid, int $classid, int $termid, int $subjectid)
    {
        try {


            $check_query = $this->connect->prepare("SELECT * FROM `termly_assessment` WHERE `termID`=$termid  AND `sessionID`=$sessionid AND `classID`=$classid AND `subjectID`=$subjectid AND `studentID`=$studentID");
            $check_query->execute();

            // die();
            if ($check_query->rowCount() >= 1) {
                $update_query = $this->connect->prepare("UPDATE `termly_assessment` SET `firstCA`=$firstCA, `secondCA`=$secondCA, `thirdCA`=$thirdCA, `totalCA`=$totalCA WHERE `termID`=$termid AND `sessionID`=$sessionid AND `classID`=$classid AND `subjectID`=$subjectid AND `studentID`=$studentID");
                $update_query->execute();
            } else {
                $insert_query = $this->connect->prepare("INSERT INTO `termly_assessment`(`termID`, `sessionID`, `classID`, `subjectID`, `studentID`, `firstCA`, `secondCA`, `thirdCA`, `totalCA`) VALUES($termid, $sessionid,$classid,$subjectid,$studentID,$firstCA,$secondCA,$thirdCA,$totalCA)");
                $insert_query->execute();
            }

            return "Success";

        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function insertExamsScore($studentID, $exams, $final_total, $position, $grade, $remark, $sessionid, $classid, $termid, $subjectid)
    {
        try {
            $sql_stmt = $this->connect->prepare("UPDATE `termly_assessment` SET `exams`=$exams,`total`=$final_total,`subjectPosition`='$position',`grade`='$grade',`remark`='$remark' WHERE `studentID`=$studentID AND `classID`=$classid AND `subjectID`=$subjectid AND`sessionID`=$sessionid AND`termID`=$termid");
            if ($sql_stmt->execute()) {
                return 1;
            } else {
                return 0;
            }


        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function addTermlyAssessment($studentID, $sessionid, $classid, $termid, $subjectid, $firstCA, $secondCA, $thirdCA, $totalCA, $exams, $total, $grade, $position, $remark)
    {
        try {
            $sql_stmt = $this->connect->prepare("INSERT INTO `termly_assessment`(`assessmentID`, `termID`, `sessionID`, `classID`, `subjectID`, `studentID`, `firstCA`, `secondCA`, `thirdCA`, `totalCA`, `exams`, `total`, `subjectPosition`, `grade`, `remark`,`dateAdded`) 
VALUES (null,$termid,$sessionid,$classid,$subjectid,$studentID, $firstCA, $secondCA, $thirdCA, $totalCA,$exams,$total,'$position','$grade','$remark',CURRENT_TIMESTAMP)");
            if ($sql_stmt->execute()) {
                return 1;
            } else {
                return 0;
            }


        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function updateTermlyAssessment($studentID, $sessionid, $classid, $termid, $subjectid, $firstCA, $secondCA, $thirdCA, $totalCA, $exams, $total, $grade, $position, $remark)
    {
        try {
            $sql_stmt = $this->connect->prepare("UPDATE `termly_assessment` SET `firstCA`=$firstCA,`secondCA`=$secondCA,`thirdCA`=$thirdCA,`totalCA`=$totalCA,`exams`=$exams,`total`=$total,`subjectPosition`='$position',`grade`='$grade',`remark`='$remark',`dateAdded`=CURRENT_TIMESTAMP WHERE `termID`=$termid AND `sessionID`=$sessionid AND `classID`=$classid AND `subjectID`=$subjectid AND `studentID`=$studentID");
            if ($sql_stmt->execute()) {
                return 1;
            } else {
                return 0;
            }


        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function insertScoresForSession($studentID, $subjectID, $classID, $sessionID, $termID, $termScore, $grandTotal, $average, $position, $grade, $remark)
    {
        try {


            switch ($termID) {
                case 1:

                    $insert_query = $this->connect->prepare("INSERT INTO `sessionalassessment`(`sessionAssessmentID`,`studentID`, `subjectID`, `classID`,`termCount`, `sessionID`, `firstTermScore`,`grandTotal`,`average`,`position`,`grade`,`remark`,`dateCreated`) VALUES (null,$studentID,$subjectID,$classID,1,$sessionID,$termScore,$grandTotal,$average,'$position','$grade','$remark',CURRENT_TIMESTAMP)");

                    break;
                case 2:
                    $insert_query = $this->connect->prepare("INSERT INTO `sessionalassessment`(`sessionAssessmentID`,`studentID`, `subjectID`, `classID`,`termCount`, `sessionID`,`secondTermScore`,`grandTotal`,`average`,`position`,`grade`,`remark`, `dateCreated`) VALUES (null,$studentID,$subjectID,$classID,1,$sessionID,$termScore,$grandTotal,$average,'$position','$grade','$remark',CURRENT_TIMESTAMP)");

                    break;
                default:
                    $insert_query = $this->connect->prepare("INSERT INTO `sessionalassessment`(`sessionAssessmentID`,`studentID`, `subjectID`, `classID`,`termCount`, `sessionID`,`thirdTermScore`,`grandTotal`,`average`,`position`,`grade`,`remark`, `dateCreated`) VALUES (null,$studentID,$subjectID,$classID,1,$sessionID,$termScore,$grandTotal,$average,'$position','$grade','$remark',CURRENT_TIMESTAMP)");

                    break;
            }
            if ($insert_query->execute()) {
                return 'inserted';
            }


        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function insertAssessmenForCS($cs_ID,$studentID, $subjectID, $classID, $sessionID, $firstTermScore, $secondTermScore, $thirdTermScore)
    {
        try {

            $insert_query = $this->connect->prepare("INSERT INTO `cs_assessment`(`cs_assessmentID`, `cs_ID`, `studentID`, `subjectID`, `classID`, `sessionID`, `subjectCount`, `firstTermScore`, `secondTermScore`, `thirdTermScore`) VALUES (null,$cs_ID,$studentID,$subjectID,$classID,$sessionID,1,$firstTermScore,$secondTermScore,$thirdTermScore");
            if ($insert_query->execute()) {
                return 'inserted';
            }else{
                return 'i_false';
            }


        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
    public function updateUncomputedCS($studentID, $subjectID, $classID, $sessionID, $firstTermScore, $secondTermScore, $thirdTermScore)
    {
        try {

            $insert_query = $this->connect->prepare("UPDATE `cs_assessment` SET `subjectCount`=`subjectCount`+1,`firstTermScore`=`firstTermScore`+$firstTermScore,
                         `secondTermScore`=`secondTermScore`+$secondTermScore,`thirdTermScore`=`thirdTermScore`+$thirdTermScore,
                           `dateCreated`=CURRENT_TIMESTAMP WHERE `studentID`=$studentID AND `classID`=$classID AND `subjectID`=$subjectID AND `sessionID`=$sessionID");
            $insert_query->execute();

            if ($insert_query->execute()) {
                return 'inserted';
            }else{
                return 'u_false';
            }


        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function updateAssessmenForCS($cs_assessmentID, $studentID, $subjectID, $classID, $sessionID, $grandTotal, $average, $position, $grade, $remark)
    {
        try {
            $final_insert = $this->connect->prepare("UPDATE `cs_assessment` SET `subjectCount`=`subjectCount`+1, `grandTotal`=$grandTotal,`average`=$average,`position`=$position,
                           `grade`=$grade,`remark`=$remark,`dateCreated`=CURRENT_TIMESTAMP WHERE `cs_assessmentID`=$cs_assessmentID AND `studentID`=$studentID AND `subjectID`=$subjectID AND `classID`=$classID AND `sessionID`=$sessionID");

            if ($final_insert->execute()) {
                return 'inserted';
            }else{
                return 'uu_false';
            }
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function updateScoreForSession($studentID, $subjectID, $classID, $sessionID, $termID, $termScore, $grandTotal, $position)
    {

        try {

            $fetch_chk_query = $this->connect->prepare("SELECT `termCount`,`sessionUpdatedLast`,`termUpdatedLast`,`average` FROM `sessionalassessment` WHERE `studentID`=$studentID AND `classID`=$classID AND `subjectID`=$subjectID AND `sessionID`=$sessionID");
            $fetch_chk_query->execute();
            $res = $fetch_chk_query->fetch(PDO::FETCH_ASSOC);

            if ($res['termUpdatedLast'] != 0 && $res['sessionUpdatedLast'] != 0) {
                if ($res['termUpdatedLast'] === $termID && $res['sessionUpdatedLast'] === $sessionID) {
                    switch ($termID) {
                        case 1:
                            $update_query = $this->connect->prepare("UPDATE `sessionalassessment` SET `termUpdatedLast`=$termID, `sessionUpdatedLast`=$sessionID,`firstTermScore`=$termScore,`grandTotal`=$grandTotal,`average`=`grandTotal`/`termCount`,`position`='$position',`dateCreated`=CURRENT_TIMESTAMP WHERE `studentID`=$studentID AND `subjectID`=$subjectID AND `classID`=$classID AND `sessionID`=$sessionID;");
                            $update_query->execute();
                            $query = $this->connect->prepare("SELECT `average` FROM `sessionalassessment` WHERE `studentID`=$studentID AND `subjectID`=$subjectID AND `classID`=$classID AND `sessionID`=$sessionID");
                            $query->execute();
                            $avg = $query->fetch(PDO::FETCH_ASSOC);
                            $Grade = $this->getGrade($this->return_Grade_And_Remark($avg['average']));
                            $Remark = $this->getRemark($this->return_Grade_And_Remark($avg['average']));
                            $grade_remark_update_query = $this->connect->prepare("UPDATE `sessionalassessment` SET `grade`='$Grade',`remark`='$Remark' WHERE `studentID`=$studentID AND `subjectID`=$subjectID AND `classID`=$classID AND `sessionID`=$sessionID");
                            $grade_remark_update_query->execute();
                            break;
                        case 2:
                            $update_query = $this->connect->prepare("UPDATE `sessionalassessment` SET `termUpdatedLast`=$termID, `sessionUpdatedLast`=$sessionID, `secondTermScore`=$termScore,`grandTotal`=$grandTotal,`average`=`grandTotal`/`termCount`,`position`='$position',`dateCreated`=CURRENT_TIMESTAMP WHERE `studentID`=$studentID AND `subjectID`=$subjectID AND `classID`=$classID AND `sessionID`=$sessionID;");
                            $update_query->execute();
                            $query = $this->connect->prepare("SELECT `average` FROM `sessionalassessment` WHERE `studentID`=$studentID AND `subjectID`=$subjectID AND `classID`=$classID AND `sessionID`=$sessionID");
                            $query->execute();
                            $avg = $query->fetch(PDO::FETCH_ASSOC);
                            $Grade = $this->getGrade($this->return_Grade_And_Remark($avg['average']));
                            $Remark = $this->getRemark($this->return_Grade_And_Remark($avg['average']));
                            $grade_remark_update_query = $this->connect->prepare("UPDATE `sessionalassessment` SET `grade`='$Grade',`remark`='$Remark' WHERE `studentID`=$studentID AND `subjectID`=$subjectID AND `classID`=$classID AND `sessionID`=$sessionID");
                            $grade_remark_update_query->execute();
                            break;
                        default:

                            $update_query = $this->connect->prepare("UPDATE `sessionalassessment` SET  `termUpdatedLast`=$termID, `sessionUpdatedLast`=$sessionID, `thirdTermScore`=$termScore,`grandTotal`=$grandTotal,`average`=`grandTotal`/`termCount`,`position`='$position',`dateCreated`=CURRENT_TIMESTAMP WHERE `studentID`=$studentID AND `subjectID`=$subjectID AND `classID`=$classID AND `sessionID`=$sessionID;");
                            $update_query->execute();
                            $query = $this->connect->prepare("SELECT `average` FROM `sessionalassessment` WHERE `studentID`=$studentID AND `subjectID`=$subjectID AND `classID`=$classID AND `sessionID`=$sessionID");
                            $query->execute();
                            $avg = $query->fetch(PDO::FETCH_ASSOC);
                            $Grade = $this->getGrade($this->return_Grade_And_Remark($avg['average']));
                            $Remark = $this->getRemark($this->return_Grade_And_Remark($avg['average']));
                            $grade_remark_update_query = $this->connect->prepare("UPDATE `sessionalassessment` SET `grade`='$Grade',`remark`='$Remark' WHERE `studentID`=$studentID AND `subjectID`=$subjectID AND `classID`=$classID AND `sessionID`=$sessionID");
                            $grade_remark_update_query->execute();
                            break;
                    }

                } elseif ($res['termUpdatedLast'] !== $termID && $res['sessionUpdatedLast'] === $sessionID && $res['termCount'] != 3) {
                    switch ($termID) {
                        case 1:
                            $update_query = $this->connect->prepare("UPDATE `sessionalassessment` SET `termUpdatedLast`=$termID, `sessionUpdatedLast`=$sessionID, `termCount`=`termCount`+1, `firstTermScore`=$termScore,`grandTotal`=$grandTotal,`average`=`grandTotal`/`termCount`,`position`='$position',`dateCreated`=CURRENT_TIMESTAMP WHERE `studentID`=$studentID AND `subjectID`=$subjectID AND `classID`=$classID AND `sessionID`=$sessionID;");
                            $update_query->execute();
                            $query = $this->connect->prepare("SELECT `average` FROM `sessionalassessment` WHERE `studentID`=$studentID AND `subjectID`=$subjectID AND `classID`=$classID AND `sessionID`=$sessionID");
                            $query->execute();
                            $avg = $query->fetch(PDO::FETCH_ASSOC);
                            $Grade = $this->getGrade($this->return_Grade_And_Remark($avg['average']));
                            $Remark = $this->getRemark($this->return_Grade_And_Remark($avg['average']));
                            $grade_remark_update_query = $this->connect->prepare("UPDATE `sessionalassessment` SET `grade`='$Grade',`remark`='$Remark' WHERE `studentID`=$studentID AND `subjectID`=$subjectID AND `classID`=$classID AND `sessionID`=$sessionID");
                            $grade_remark_update_query->execute();
                            break;
                        case 2:
                            $update_query = $this->connect->prepare("UPDATE `sessionalassessment` SET `termUpdatedLast`=$termID, `sessionUpdatedLast`=$sessionID,`termCount`=`termCount`+1,`secondTermScore`=$termScore,`grandTotal`=$grandTotal,`average`=`grandTotal`/`termCount`,`position`='$position',`dateCreated`=CURRENT_TIMESTAMP WHERE `studentID`=$studentID AND `subjectID`=$subjectID AND `classID`=$classID AND `sessionID`=$sessionID;");
                            $update_query->execute();
                            $query = $this->connect->prepare("SELECT `average` FROM `sessionalassessment` WHERE `studentID`=$studentID AND `subjectID`=$subjectID AND `classID`=$classID AND `sessionID`=$sessionID");
                            $query->execute();
                            $avg = $query->fetch(PDO::FETCH_ASSOC);
                            $Grade = $this->getGrade($this->return_Grade_And_Remark($avg['average']));
                            $Remark = $this->getRemark($this->return_Grade_And_Remark($avg['average']));
                            $grade_remark_update_query = $this->connect->prepare("UPDATE `sessionalassessment` SET `grade`='$Grade',`remark`='$Remark' WHERE `studentID`=$studentID AND `subjectID`=$subjectID AND `classID`=$classID AND `sessionID`=$sessionID");
                            $grade_remark_update_query->execute();
                            break;
                        default:
                            $update_query = $this->connect->prepare("UPDATE `sessionalassessment` SET `termUpdatedLast`=$termID, `sessionUpdatedLast`=$sessionID,`termCount`=`termCount`+1, `thirdTermScore`=$termScore,`grandTotal`=$grandTotal,`average`=`grandTotal`/`termCount`,`position`='$position',`dateCreated`=CURRENT_TIMESTAMP WHERE `studentID`=$studentID AND `subjectID`=$subjectID AND `classID`=$classID AND `sessionID`=$sessionID;");
                            $update_query->execute();
                            $query = $this->connect->prepare("SELECT `average` FROM `sessionalassessment` WHERE `studentID`=$studentID AND `subjectID`=$subjectID AND `classID`=$classID AND `sessionID`=$sessionID");
                            $query->execute();
                            $avg = $query->fetch(PDO::FETCH_ASSOC);
                            $Grade = $this->getGrade($this->return_Grade_And_Remark($avg['average']));
                            $Remark = $this->getRemark($this->return_Grade_And_Remark($avg['average']));
                            $grade_remark_update_query = $this->connect->prepare("UPDATE `sessionalassessment` SET `grade`='$Grade',`remark`='$Remark' WHERE `studentID`=$studentID AND `subjectID`=$subjectID AND `classID`=$classID AND `sessionID`=$sessionID");
                            $grade_remark_update_query->execute();
                            break;
                    }

                } else {
                    switch ($termID) {
                        case 1:
                            $update_query = $this->connect->prepare("UPDATE `sessionalassessment` SET `termUpdatedLast`=$termID, `sessionUpdatedLast`=$sessionID, `firstTermScore`=$termScore,`grandTotal`=$grandTotal,`average`=`grandTotal`/`termCount`,`position`='$position',`dateCreated`=CURRENT_TIMESTAMP WHERE `studentID`=$studentID AND `subjectID`=$subjectID AND `classID`=$classID AND `sessionID`=$sessionID;");
                            $update_query->execute();
                            $query = $this->connect->prepare("SELECT `average` FROM `sessionalassessment` WHERE `studentID`=$studentID AND `subjectID`=$subjectID AND `classID`=$classID AND `sessionID`=$sessionID");
                            $query->execute();
                            $avg = $query->fetch(PDO::FETCH_ASSOC);
                            $Grade = $this->getGrade($this->return_Grade_And_Remark($avg['average']));
                            $Remark = $this->getRemark($this->return_Grade_And_Remark($avg['average']));
                            $grade_remark_update_query = $this->connect->prepare("UPDATE `sessionalassessment` SET `grade`='$Grade',`remark`='$Remark' WHERE `studentID`=$studentID AND `subjectID`=$subjectID AND `classID`=$classID AND `sessionID`=$sessionID");
                            $grade_remark_update_query->execute();
                            break;
                        case 2:
                            $update_query = $this->connect->prepare("UPDATE `sessionalassessment` SET `termUpdatedLast`=$termID, `sessionUpdatedLast`=$sessionID,`secondTermScore`=$termScore,`grandTotal`=$grandTotal,`average`=`grandTotal`/`termCount`,`position`='$position',`dateCreated`=CURRENT_TIMESTAMP WHERE `studentID`=$studentID AND `subjectID`=$subjectID AND `classID`=$classID AND `sessionID`=$sessionID;");
                            $update_query->execute();
                            $query = $this->connect->prepare("SELECT `average` FROM `sessionalassessment` WHERE `studentID`=$studentID AND `subjectID`=$subjectID AND `classID`=$classID AND `sessionID`=$sessionID");
                            $query->execute();
                            $avg = $query->fetch(PDO::FETCH_ASSOC);
                            $Grade = $this->getGrade($this->return_Grade_And_Remark($avg['average']));
                            $Remark = $this->getRemark($this->return_Grade_And_Remark($avg['average']));
                            $grade_remark_update_query = $this->connect->prepare("UPDATE `sessionalassessment` SET `grade`='$Grade',`remark`='$Remark' WHERE `studentID`=$studentID AND `subjectID`=$subjectID AND `classID`=$classID AND `sessionID`=$sessionID");
                            $grade_remark_update_query->execute();
                            //echo $avg['average'];
                            break;
                        default:
                            $update_query = $this->connect->prepare("UPDATE `sessionalassessment` SET `termUpdatedLast`=$termID, `sessionUpdatedLast`=$sessionID, `thirdTermScore`=$termScore,`grandTotal`=$grandTotal,`average`=`grandTotal`/`termCount`,`position`='$position',`dateCreated`=CURRENT_TIMESTAMP WHERE `studentID`=$studentID AND `subjectID`=$subjectID AND `classID`=$classID AND `sessionID`=$sessionID;");
                            $update_query->execute();
                            $query = $this->connect->prepare("SELECT `average` FROM `sessionalassessment` WHERE `studentID`=$studentID AND `subjectID`=$subjectID AND `classID`=$classID AND `sessionID`=$sessionID");
                            $query->execute();
                            $avg = $query->fetch(PDO::FETCH_ASSOC);
                            $Grade = $this->getGrade($this->return_Grade_And_Remark($avg['average']));
                            $Remark = $this->getRemark($this->return_Grade_And_Remark($avg['average']));
                            $grade_remark_update_query = $this->connect->prepare("UPDATE `sessionalassessment` SET `grade`='$Grade',`remark`='$Remark' WHERE `studentID`=$studentID AND `subjectID`=$subjectID AND `classID`=$classID AND `sessionID`=$sessionID");
                            $grade_remark_update_query->execute();
                            break;
                    }

                }
            } else {

                switch ($termID) {
                    case 1:
                        $update_query = $this->connect->prepare("UPDATE `sessionalassessment` SET `termUpdatedLast`=$termID, `sessionUpdatedLast`=$sessionID,`termCount`=`termCount`+1,  `firstTermScore`=$termScore,`grandTotal`=$grandTotal,`average`=`grandTotal`/`termCount`,`position`='$position',`dateCreated`=CURRENT_TIMESTAMP WHERE `studentID`=$studentID AND `subjectID`=$subjectID AND `classID`=$classID AND `sessionID`=$sessionID;");
                        $update_query->execute();
                        $query = $this->connect->prepare("SELECT `average` FROM `sessionalassessment` WHERE `studentID`=$studentID AND `subjectID`=$subjectID AND `classID`=$classID AND `sessionID`=$sessionID");
                        $query->execute();
                        $avg = $query->fetch(PDO::FETCH_ASSOC);
                        $Grade = $this->getGrade($this->return_Grade_And_Remark($avg['average']));
                        $Remark = $this->getRemark($this->return_Grade_And_Remark($avg['average']));
                        $grade_remark_update_query = $this->connect->prepare("UPDATE `sessionalassessment` SET `grade`='$Grade',`remark`='$Remark' WHERE `studentID`=$studentID AND `subjectID`=$subjectID AND `classID`=$classID AND `sessionID`=$sessionID");
                        $grade_remark_update_query->execute();
                        break;
                    case 2:
                        $update_query = $this->connect->prepare("UPDATE `sessionalassessment` SET `termUpdatedLast`=$termID, `sessionUpdatedLast`=$sessionID,`termCount`=`termCount`+1,`secondTermScore`=$termScore,`grandTotal`=$grandTotal,`average`=`grandTotal`/`termCount`,`position`='$position',`dateCreated`=CURRENT_TIMESTAMP WHERE `studentID`=$studentID AND `subjectID`=$subjectID AND `classID`=$classID AND `sessionID`=$sessionID;");
                        $update_query->execute();
                        $query = $this->connect->prepare("SELECT `average` FROM `sessionalassessment` WHERE `studentID`=$studentID AND `subjectID`=$subjectID AND `classID`=$classID AND `sessionID`=$sessionID");
                        $query->execute();
                        $avg = $query->fetch(PDO::FETCH_ASSOC);
                        $Grade = $this->getGrade($this->return_Grade_And_Remark($avg['average']));
                        $Remark = $this->getRemark($this->return_Grade_And_Remark($avg['average']));
                        $grade_remark_update_query = $this->connect->prepare("UPDATE `sessionalassessment` SET `grade`='$Grade',`remark`='$Remark' WHERE `studentID`=$studentID AND `subjectID`=$subjectID AND `classID`=$classID AND `sessionID`=$sessionID");
                        $grade_remark_update_query->execute();
                        break;
                    default:
                        $update_query = $this->connect->prepare("UPDATE `sessionalassessment` SET `termUpdatedLast`=$termID, `sessionUpdatedLast`=$sessionID,`termCount`=`termCount`+1, `thirdTermScore`=$termScore,`grandTotal`=$grandTotal,`average`=`grandTotal`/`termCount`,`position`='$position',`dateCreated`=CURRENT_TIMESTAMP WHERE `studentID`=$studentID AND `subjectID`=$subjectID AND `classID`=$classID AND `sessionID`=$sessionID;");
                        $update_query->execute();
                        $query = $this->connect->prepare("SELECT `average` FROM `sessionalassessment` WHERE `studentID`=$studentID AND `subjectID`=$subjectID AND `classID`=$classID AND `sessionID`=$sessionID");
                        $query->execute();
                        $avg = $query->fetch(PDO::FETCH_ASSOC);
                        $Grade = $this->getGrade($this->return_Grade_And_Remark($avg['average']));
                        $Remark = $this->getRemark($this->return_Grade_And_Remark($avg['average']));
                        $grade_remark_update_query = $this->connect->prepare("UPDATE `sessionalassessment` SET `grade`='$Grade',`remark`='$Remark' WHERE `studentID`=$studentID AND `subjectID`=$subjectID AND `classID`=$classID AND `sessionID`=$sessionID");
                        $grade_remark_update_query->execute();
                        break;
                }

            }


        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }


    public function return_Grade_And_Remark($totalScore)
    {
        try {

            if ($totalScore > 100.00) {
                return array("No grade", "is above 100");
            } elseif ($totalScore >= 75.00 && $totalScore <= 100.00) {
                return array("A", "Excellent");
            } elseif ($totalScore >= 70.00 && $totalScore < 75.00) {
                return array("B2", "V.Good");
            } elseif ($totalScore >= 65.00 && $totalScore < 70.00) {
                return array("B3", "Good");
            } elseif ($totalScore >= 60.00 && $totalScore < 65.00) {
                return array("C4", "Credit");
            } elseif ($totalScore >= 55.00 && $totalScore < 60.00) {
                return array("C5", "Credit");
            } elseif ($totalScore >= 50.00 && $totalScore < 55.00) {
                return array("C6", "Credit");
            } elseif ($totalScore >= 45.00 && $totalScore < 50.00) {
                return array("D7", "Pass");
            } elseif ($totalScore >= 40.00 && $totalScore < 45.00) {
                return array("E8", "Pass");
            } else {
                return array("F9", "Fail");
            }
            //return $gradeRemark;

        } catch (PDOException $e) {
            return $e->getMessage();
        }

    }

    public function getCAScores($classid, $subjectid, $sessionid, $termid): string
    {
        try {

            $staff_stmt = $this->connect->prepare("SELECT termly_assessment.studentID, students.name, termly_assessment.totalCA
FROM termly_assessment
INNER JOIN students ON termly_assessment.studentID = students.studentID AND termly_assessment.classID=$classid AND termly_assessment.sessionID=$sessionid AND termly_assessment.termID=$termid AND termly_assessment.subjectID=$subjectid;");
            $staff_stmt->execute();
            $result = $staff_stmt->fetchAll(PDO::FETCH_ASSOC);
            return json_encode($result, JSON_PRETTY_PRINT);

        } catch (PDOException $e) {
            return $e->getMessage();
        }

    }

    public function computeGrandTotal($termScore, $studentID, $classID, $subjectID, $sessionID, $termID)
    {
        try {

            $fetch_query = $this->connect->prepare("SELECT `firstTermScore`, `secondTermScore`, `thirdTermScore` FROM `sessionalassessment` WHERE `studentID`=$studentID AND `classID`=$classID AND `subjectID`=$subjectID AND `sessionID`=$sessionID");
            $fetch_query->execute();

            if ($fetch_query->rowCount() >= 1) {
                $result = $fetch_query->fetch(PDO::FETCH_ASSOC);
                if ($termID == 1) {
                    return $termScore + $result['secondTermScore'] === null ? 0 : ($result['secondTermScore'] + $result['thirdTermScore'] === null ? 0 : $result['thirdTermScore']);
                } elseif ($termID == 2) {
                    return $result['firstTermScore'] + $termScore + $result['thirdTermScore'];
                } else {
                    return $result['firstTermScore'] + $result['secondTermScore'] + $termScore;
                }

            } else {
                return $termScore;
            }


        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }


    public function computeIndividualAverage($termScore, $studentID, $classID, $subjectID, $sessionID, $termID)
    {
        try {
            $fetch_query = $this->connect->prepare("SELECT `termCount`,`termUpdatedLast`,`sessionUpdatedLast`,`firstTermScore`, `secondTermScore`, `thirdTermScore` FROM `sessionalassessment` WHERE `studentID`=$studentID AND `classID`=$classID AND `subjectID`=$subjectID AND `sessionID`=$sessionID");
            $fetch_query->execute();
            $rowCount = $fetch_query->rowCount();
            if ($rowCount >= 1) {
                $result = $fetch_query->fetch(PDO::FETCH_ASSOC);
                if ($result['termUpdatedLast'] == 0 && $result['sessionUpdatedLast'] == 0) {
                    $firstTermScore = $result['firstTermScore'];
                    $secondTermScore = $result['secondTermScore'];
                    $thirdTermScore = $result['thirdTermScore'];
                    $termCount = $result['termCount'];
                    switch ($termID) {
                        case 1:
                            $average = ($termScore + $secondTermScore + $thirdTermScore) / ($termCount + 1);
                            echo $average;
                            break;
                        case 2:
                            $average = ($firstTermScore + $termScore + $thirdTermScore) / ($termCount + 1);
                            echo $average;
                            break;
                        default:
                            $average = ($firstTermScore + $secondTermScore + $termScore) / ($termCount + 1);
                            echo $average;
                            break;
                    }

                } elseif ($result['termUpdatedLast'] != $termID && $result['sessionUpdatedLast'] == $sessionID && $result['termCount'] != 3) {
                    $firstTermScore = $result['firstTermScore'];
                    $secondTermScore = $result['secondTermScore'];
                    $thirdTermScore = $result['thirdTermScore'];
                    $termCount = $result['termCount'];
                    switch ($termID) {
                        case 1:
                            $average = ($termScore + $secondTermScore + $thirdTermScore) / ($termCount + 1);
                            echo $average;
                            break;
                        case 2:
                            $average = ($firstTermScore + $termScore + $thirdTermScore) / ($termCount + 1);
                            echo $average;
                            break;
                        default:
                            $average = ($firstTermScore + $secondTermScore + $termScore) / ($termCount + 1);
                            echo $average;
                            break;
                    }
                } elseif ($result['termUpdatedLast'] != $termID && $result['sessionUpdatedLast'] == $sessionID && $result['termCount'] == 3) {
                    $firstTermScore = $result['firstTermScore'];
                    $secondTermScore = $result['secondTermScore'];
                    $thirdTermScore = $result['thirdTermScore'];
                    $termCount = $result['termCount'];
                    switch ($termID) {
                        case 1:
                            $average = ($termScore + $secondTermScore + $thirdTermScore) / $termCount;
                            echo $average;
                            break;
                        case 2:
                            $average = ($firstTermScore + $termScore + $thirdTermScore) / $termCount;
                            echo $average;
                            break;
                        default:
                            $average = ($firstTermScore + $secondTermScore + $termScore) / $termCount;
                            echo $average;
                            break;
                    }
                } else {
                    return $termScore;
                }

            } else {
                return $termScore;
            }

        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function getRemark($arr): string
    {
        return $arr[1];
    }

    public function getGrade($arr): string
    {
        return $arr[0];
    }

    public function fetch_entire_class_assessment($classID, $subjectID, $sessionID)
    {
        try {
            $fetch_query = $this->connect->prepare("SELECT * FROM `sessionalassessment` WHERE `classID`=$classID AND `subjectID`=$subjectID AND `sessionID`=$sessionID");
            $fetch_query->execute();
            return $fetch_query->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function updatePosition($sessionAssID, $studentID, $classID, $subjectID, $sessionID, $pos)
    {
        try {
            $fetch_query = $this->connect->prepare("UPDATE `sessionalassessment` SET `position`='$pos' WHERE `sessionAssessmentID`=$sessionAssID AND `studentID`=$studentID AND `classID`=$classID AND `subjectID`=$subjectID AND `sessionID`=$sessionID");
            $fetch_query->execute();
            return 'Assessment data submitted successfully';
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    /*public function computeClassAverage()
    {
        try {

        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }*/

    public function fetchResultByTerm($studentID, $sessionID, $termID, $classID)
    {
        try {
            $fetch_query = $this->connect->prepare("SELECT * FROM `termly_assessment` WHERE `studentID`=$studentID AND `classID`=$classID AND `sessionID`=$sessionID AND `termID`=$termID");
            $fetch_query->execute();
            if ($fetch_query->rowCount() >= 1) {
                return $fetch_query->fetch(PDO::FETCH_ASSOC);
            } else {
                return 'empty';
            }


        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function fetchResultBySession($admissionNO, $sessionID, $classID)
    {
        try {
            $fetch_query = $this->connect->prepare("SELECT students.name,students.gender,students.admissionNO,students.studentID,class.classID, CONCAT(class.class,class.classArm)AS class, students.dateOfBirth, studentstatus.status,session.sessionID, session.session,calendar.termBegins,calendar.termEnd,calendar.nextTermBegins 
FROM (studentstatus
      JOIN students ON studentstatus.studentID = students.studentID AND students.admissionNO='$admissionNO' 
      JOIN sessionalassessment ON studentstatus.studentID = sessionalassessment.studentID AND sessionalassessment.sessionID=$sessionID AND studentstatus.currentClassID = sessionalassessment.classID
     JOIN class ON class.classID = studentstatus.currentClassID
     JOIN session ON session.sessionID = studentstatus.sessionID
     JOIN calendar ON calendar.sessionID = studentstatus.sessionID)
");
            $fetch_query->execute();
            $fetch_school_q = $this->connect->prepare("SELECT `schoolName`, `schoolAddress`, `schoolPostalBox`, `schoolMotto`, `school_logo`, `headTeachersign` FROM `school_data`");
            $fetch_school_q->execute();

            if ($fetch_query->rowCount() >= 1) {

            } else {
                return 'empty';
            }


        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }


}