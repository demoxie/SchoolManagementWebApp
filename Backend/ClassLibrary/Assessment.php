<?php
//require("../../Backend/server/Database.php");
//require_once("../../Backend/ClassLibrary/Student.php");
//$connect = new Db();

require_once("../../Backend/ClassLibrary/Student.php");
require_once("../../Backend/ClassLibrary/Subject.php");
require_once("../../Backend/ClassLibrary/Attendance.php");

class Assessment extends Db
{

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
            if ($chk_query->execute()) {
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
            }
            if ($insert_query->execute()) {
                return 'inserted';
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
            } else {
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

    public function getGrade($arr): string
    {
        return $arr[0];
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

    public function getRemark($arr): string
    {
        return $arr[1];
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


    ///////////////////////////////////////////////////////////////////////////////////
    ////////FETCHING RESULT BY SESSION GOES DOWN HERE////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////

    public function fetchResultBySession($admissionNO, $sessionID)
    {

        try {

            if (is_int($admissionNO)) {
                $fetch_query = $this->connect->prepare("SELECT students.name,students.passport, students.gender, students.admissionNO, students.studentID, class.classID, CONCAT(class.class, class.classArm) AS class, students.dateOfBirth, studentstatus.status,studentstatus.currentClassID,SESSION.sessionID,`calendar`.termID,
    SESSION.session,calendar.termBegins,calendar.termEnd,calendar.nextTermBegins FROM ( studentstatus JOIN students ON studentstatus.studentID = students.studentID AND students.admissionNO = '$admissionNO' JOIN class ON class.classID = studentstatus.currentClassID JOIN SESSION ON SESSION
    .sessionID = studentstatus.sessionID JOIN calendar ON calendar.sessionID = studentstatus.sessionID ) WHERE studentstatus.sessionID = $sessionID AND studentstatus.status LIKE 'Prom%' OR studentstatus.status LIKE 'Admit%' OR studentstatus.status LIKE 'Repeat%' OR studentstatus.status LIKE 'Withdrawn%'");
                $executed = $fetch_query->execute();
            } else {
                $fetch_query = $this->connect->prepare("SELECT students.name,students.passport, students.gender, students.admissionNO, students.studentID, class.classID, CONCAT(class.class, class.classArm) AS class, students.dateOfBirth, studentstatus.status,studentstatus.currentClassID,SESSION.sessionID,`calendar`.termID,
    SESSION.session,calendar.termBegins,calendar.termEnd,calendar.nextTermBegins FROM ( studentstatus JOIN students ON studentstatus.studentID = students.studentID AND students.admissionNO = '$admissionNO' JOIN class ON class.classID = studentstatus.currentClassID JOIN SESSION ON SESSION
    .sessionID = studentstatus.sessionID JOIN calendar ON calendar.sessionID = studentstatus.sessionID ) WHERE studentstatus.sessionID = $sessionID AND studentstatus.status LIKE 'Prom%' OR studentstatus.status LIKE 'Admit%' OR studentstatus.status LIKE 'Repeat%' OR studentstatus.status LIKE 'Withdrawn%'");
                $executed = $fetch_query->execute();
            }

            if ($executed === true) {

                if ($fetch_query->rowCount() >= 1) {

                    $result_row_arr = $fetch_query->fetch(PDO::FETCH_ASSOC);
                    //return $result_row_arr;
                    $fetch_school_data_query = $this->connect->prepare("SELECT `schoolName`, `schoolAddress`, `schoolPostalBox`, `schoolMotto`, `school_logo`, `headTeachersign` FROM `school_data`");
                    if ($fetch_school_data_query->execute()) {
                        if ($fetch_school_data_query->rowCount() > 0) {
                            $school_data_arr = $fetch_school_data_query->fetch(PDO::FETCH_ASSOC);
                            //down here trying to shorten names that are upto 3 word count e.g James Ikogu Keneth
                            $stud_name = $result_row_arr['name'];
                            if (str_word_count($stud_name) === 3) {
                                $name_arr = explode(" ", $stud_name);
                                $name_arr[1] = substr($name_arr[1], 0, 1) . '.';
                                $result_row_arr['name'] = join(' ', $name_arr);
                            }
                            //ends here
                            $studentID = $result_row_arr['studentID'];
                            $classID = $result_row_arr['currentClassID'];
                            $termBeginsValue = $result_row_arr['termBegins'];
                            $termEndedsValue = $result_row_arr['termEnd'];
                            $nextTermBeginsValue = $result_row_arr['nextTermBegins'];
                            $termBegins = date_create("$termBeginsValue");
                            $termEnd = date_create("$termEndedsValue");
                            $nextTermBegins = date_create("$nextTermBeginsValue");
                            $result_row_arr['termBegins'] = date_format($termBegins, 'Y-m-d');
                            $result_row_arr['termEnd'] = date_format($termEnd, 'Y-m-d');
                            $result_row_arr['nextTermBegins'] = date_format($nextTermBegins, 'Y-m-d');
                            $result_row_arr['dateOfBirth'] = CodeGenerator::getAge($result_row_arr['dateOfBirth']);
                            $result_row_arr['termID'] = CodeGenerator::term($result_row_arr['termID']);
                            $result_row_arr['school_info'] = $school_data_arr;
                            $result_row_arr['result-type'] = 'session-result';
                            //fetching `cs_ID`,`cs_Code`, `cs_Name`, `subject1_ID`, `subject2_ID`, `subject3_ID`, `subject4_ID`, `subject5_ID`, `subject6_ID`, `subject7_ID`, `subject8_ID`
                            $cs_subjects_list_arr = $this->fetchCS();
                            //print_r($cs_subjects_list_arr);
                            $no_of_cs = count($cs_subjects_list_arr);
                            $studentObj = new Student($this->connect);
                            $students_in_a_class_arr = $studentObj->fetch_all_Student_in_a_Class_who_can_see_Result($classID);
                            //print_r($cs_subjects_list_arr);
                            $class_not_offering_cs = $this->classes_not_offering_cs_subjects();
                            $IDs_of_class_not_offering_cs = array();
                            foreach ($class_not_offering_cs as $row) {
                                array_push($IDs_of_class_not_offering_cs, $row['classID']);
                            }
                            //print_r($class_not_offering_cs);

                            if (!in_array($classID, $IDs_of_class_not_offering_cs)) {
                                for ($s = 0; $s < count($students_in_a_class_arr); $s++) {
                                    $non_combined_subjects = array();
                                    $cs_combined_subjects_matched = array();
                                    //fetching `studentID`,`subjectID`,`classID`,`sessionID`,`termCount`,`firstTermScore`, `secondTermScore`, `thirdTermScore`, `grandTotal`,`average`, `position`, `grade`, `remark`
                                    $assessments_of_subjects_offered_by_a_student_in_a_session = $this->fetchSessionScoreForAStudent($students_in_a_class_arr[$s]['studentID'], $classID, $sessionID);

                                    //print_r($assessments_of_subjects_offered_by_a_student_in_a_session);
                                    $no_of_student_subjects_in_a_session = count($assessments_of_subjects_offered_by_a_student_in_a_session);
                                    //print_r($assessments_of_subjects_offered_by_a_student_in_a_session);
                                    for ($i = 0; $i < $no_of_cs; $i++) {
                                        $cs_ID = 0;
                                        $no_of_subjects_not_matched = 0;
                                        $cs_first_term_score = 0;
                                        $cs_second_term_score = 0;
                                        $cs_third_term_score = 0;
                                        $no_of_subjects_matched = 0;

                                        for ($s_index = 0; $s_index < $no_of_student_subjects_in_a_session; $s_index++) {

                                            //AGM/SEC/2021/1/736724

                                            //print_r($assessments_of_subjects_offered_by_a_student_in_a_session[$s_index]);
                                            $arr_of_subjectIDs_that_makes_cs = array();
                                            array_push($arr_of_subjectIDs_that_makes_cs,
                                                $cs_subjects_list_arr[$i]['subject1_ID'],
                                                $cs_subjects_list_arr[$i]['subject2_ID'],
                                                $cs_subjects_list_arr[$i]['subject3_ID'],
                                                $cs_subjects_list_arr[$i]['subject4_ID'],
                                                $cs_subjects_list_arr[$i]['subject5_ID'],
                                                $cs_subjects_list_arr[$i]['subject6_ID'],
                                                $cs_subjects_list_arr[$i]['subject7_ID']);
                                            //print_r($arr_of_subjectIDs_that_makes_cs);

                                            if (in_array($assessments_of_subjects_offered_by_a_student_in_a_session[$s_index]['subjectID'], $arr_of_subjectIDs_that_makes_cs)) {
                                                $cs_first_term_score += $assessments_of_subjects_offered_by_a_student_in_a_session[$s_index]['firstTermScore'];
                                                $cs_second_term_score += $assessments_of_subjects_offered_by_a_student_in_a_session[$s_index]['secondTermScore'];
                                                $cs_third_term_score += $assessments_of_subjects_offered_by_a_student_in_a_session[$s_index]['thirdTermScore'];
                                                $no_of_subjects_matched += 1;
                                                $cs_ID = $cs_subjects_list_arr[$i]['cs_ID'];
                                                //echo 'matched';
                                                array_push($cs_combined_subjects_matched, $assessments_of_subjects_offered_by_a_student_in_a_session[$s_index]);


                                            } else {

                                                array_push($non_combined_subjects, $assessments_of_subjects_offered_by_a_student_in_a_session[$s_index]);
                                                $no_of_subjects_not_matched += 1;

                                                //print_r($non_combined_subjects);

                                            }
                                            if ($s_index === $no_of_student_subjects_in_a_session - 1) {
                                                //print_r($cs_combined_subjects_matched);

                                                $cs_term_count = $assessments_of_subjects_offered_by_a_student_in_a_session[$s_index]['termCount'];
                                                $cs_grand_total = ($cs_first_term_score + $cs_second_term_score + $cs_third_term_score) / $no_of_subjects_matched;
                                                $cs_average = $cs_grand_total / $cs_term_count;
                                                $cs_grade = $this->getGrade($this->return_Grade_And_Remark($cs_average));
                                                $cs_remark = $this->getRemark($this->return_Grade_And_Remark($cs_average));
                                                //print($cs_remark);

                                                if ($this->check_If_Session_Assessment_For_CS_Exist_For_A_Student($assessments_of_subjects_offered_by_a_student_in_a_session[$s_index]['studentID'], $cs_ID, $classID, $sessionID) > 0) {
                                                    //$cs_assessmentID, $studentID, $subjectID, $classID, $sessionID, $grandTotal, $average, $position, $grade, $remark

                                                    $this->updateUncomputedCS($cs_ID, $assessments_of_subjects_offered_by_a_student_in_a_session[$s_index]['studentID'], $assessments_of_subjects_offered_by_a_student_in_a_session[$s_index]['classID'], $assessments_of_subjects_offered_by_a_student_in_a_session[$s_index]['sessionID'], $no_of_subjects_matched, $cs_term_count, $cs_first_term_score / $no_of_subjects_matched, $cs_second_term_score / $no_of_subjects_matched, $cs_third_term_score / $no_of_subjects_matched, $cs_grand_total, $cs_average, $cs_grade, $cs_remark);
                                                    /* if ($status === 'uncomputed cs updated') {
                                                         //echo $status;

                                                     }*/
                                                } else {
                                                    ///////////////////`cs_assessmentID`, `cs_ID`, `studentID`, `classID`, `sessionID`, `subjectCount`,`termCount`, `firstTermScore`, `secondTermScore`, `thirdTermScore`,`grandTotal`, `grade`, `remark`,`dateCreated`
                                                    $this->insertAssessmentForCS($cs_ID, $assessments_of_subjects_offered_by_a_student_in_a_session[$s_index]['studentID'], $assessments_of_subjects_offered_by_a_student_in_a_session[$s_index]['classID'], $assessments_of_subjects_offered_by_a_student_in_a_session[$s_index]['sessionID'], $no_of_subjects_matched, $cs_term_count, $cs_first_term_score, $cs_second_term_score, $cs_third_term_score, $cs_grand_total, $cs_average, $cs_grade, $cs_remark);
                                                    /*if ($status === 'inserted') {
                                                         //echo $status;
                                                         //print_r($status);


                                                     } else {
                                                         //print_r($status);
                                                     }*/
                                                }
                                                for ($d = 0; $d < count($cs_combined_subjects_matched); $d++) {
                                                    //$studentID, $classID, $sessionID,$termID, $subjectID
                                                    if ($this->check_If_Matched_CS_Subjects_Session_Assessment_Exists($cs_combined_subjects_matched[$d]['studentID'], $cs_combined_subjects_matched[$d]['classID'], $cs_combined_subjects_matched[$d]['sessionID'], $cs_combined_subjects_matched[$d]['subjectID']) > 0) {
                                                        //update_Matched_CS_Subjects_Session_Assessment($studentID, $classID, $sessionID,$termCount, $subjectID, $firstTermScore, $secondTermScore, $thirdTermScore, $grandTotal, $average, $grade, $remark)
                                                        $this->update_Matched_CS_Subjects_Session_Assessment($cs_combined_subjects_matched[$d]['studentID'], $cs_combined_subjects_matched[$d]['classID'], $cs_combined_subjects_matched[$d]['sessionID'], $cs_combined_subjects_matched[$d]['termCount'], $cs_combined_subjects_matched[$d]['subjectID'], $cs_combined_subjects_matched[$d]['firstTermScore'], $cs_combined_subjects_matched[$d]['secondTermScore'], $cs_combined_subjects_matched[$d]['thirdTermScore'], $cs_combined_subjects_matched[$d]['grandTotal'], $cs_combined_subjects_matched[$d]['average'], $cs_combined_subjects_matched[$d]['grade'], $cs_combined_subjects_matched[$d]['remark']);

                                                    } else {

                                                        $this->insert_Matched_CS_Subjects_Sessional_Assessment($cs_combined_subjects_matched[$d]['studentID'], $cs_combined_subjects_matched[$d]['classID'], $cs_combined_subjects_matched[$d]['sessionID'], $cs_combined_subjects_matched[$d]['subjectID'], $cs_combined_subjects_matched[$d]['termCount'], $cs_combined_subjects_matched[$d]['firstTermScore'], $cs_combined_subjects_matched[$d]['secondTermScore'], $cs_combined_subjects_matched[$d]['thirdTermScore'], $cs_combined_subjects_matched[$d]['grandTotal'], $cs_combined_subjects_matched[$d]['average'], $cs_combined_subjects_matched[$d]['grade'], $cs_combined_subjects_matched[$d]['remark']);
                                                    }
                                                }


                                            }

                                        }
                                        if ($i === $no_of_cs - 1) {
                                            //$diff = array_diff($non_combined_subjects,$cs_combined_subjects_matched);

                                            $non_combined_subjects_session_assessment = $this->multi_array_diff(array_unique($non_combined_subjects, SORT_REGULAR), $cs_combined_subjects_matched);
                                            foreach ($non_combined_subjects_session_assessment as $rec) {
                                                $this->insertAssessmentForNonCombinedSubjectsForAStudent($rec['studentID'], $rec['subjectID'], $rec['classID'], $rec['sessionID'], $rec['termCount'], $rec['firstTermScore'], $rec['secondTermScore'], $rec['thirdTermScore'], $rec['grandTotal'], $rec['average'], $rec['position'], $rec['grade'], $rec['remark']);
                                            }
                                            ///print_r($non_combined_subjects_session_assessment);


                                        }

                                    }
                                    if ($s === count($students_in_a_class_arr) - 1) {
                                        //`cs_assessmentID`,`studentID`,`average`, `position`, `dateCreated`
                                        for ($cs = 0; $cs < $no_of_cs; $cs++) {
                                            //`cs_assessmentID`,`studentID`,`classID`,`sessionID`,`average`, `position`, `dateCreated`
                                            $cs_assessment_by_cs_id = $this->fetchCSAssessment($cs_subjects_list_arr[$cs]['cs_ID'], $classID, $sessionID);
                                            array_multisort(array_map(function ($element) {
                                                return $element['average'];
                                            }, $cs_assessment_by_cs_id), SORT_DESC, $cs_assessment_by_cs_id);

                                            for ($p = 0; $p < count($cs_assessment_by_cs_id); $p++) {
                                                $cs_position = CodeGenerator::addOrdinalSuffix($p + 1);
                                                //$studentID,$classID,$sessionID,$position
                                                //`cs_assessment`.`cs_assessmentID`
                                                $cs_assessment_by_cs_id[$p]['position'] = $cs_position;
                                                $this->updateAssessmentForCS($cs_assessment_by_cs_id[$p]['cs_assessmentID'], $cs_assessment_by_cs_id[$p]['studentID'], $cs_assessment_by_cs_id[$p]['classID'], $cs_assessment_by_cs_id[$p]['sessionID'], $cs_assessment_by_cs_id[$p]['position']);
                                            }

                                        }

                                    }
                                }
                                ///FINALLY PRESENTING RESULT GOES HERE

                                $classRow = array();
                                $subjectObject = new Subject($this->connect);
                                $this_student_total_average_grade_remark = array();
                                $non_combined_subjects_of_this_students = array();
                                $cs_subject_offered_by_this_student = array();

                                for ($s = 0; $s < count($students_in_a_class_arr); $s++) {
                                    //$arr_of_subjectIDs_for_this_session_ass = array();
                                    $studentID_Total_Average_Arr = array();
                                    $finalTotal = 0;
                                    $cs_subject_offered_by_a_student = $this->fetchCSAssessmentForAStudent($students_in_a_class_arr[$s]['studentID'], $classID, $sessionID);

                                    $non_combined_subjects_of_a_students = $this->fetch_Non_Combined_Subjects_SessionAssessment_For_A_Student($students_in_a_class_arr[$s]['studentID'], $classID, $sessionID);

                                    $whole_subjects = array_merge($non_combined_subjects_of_a_students, $cs_subject_offered_by_a_student);

                                    for ($x = 0; $x < count($whole_subjects); $x++) {
                                        $finalTotal += $whole_subjects[$x]['grandTotal'];
                                        if ($x === count($whole_subjects) - 1) {
                                            $finalAverage = $finalTotal / ($whole_subjects[$x]['termCount'] * count($whole_subjects));
                                            $finalGrade = $this->getGrade($this->return_Grade_And_Remark($finalAverage));
                                            $finalRemark = $this->getRemark($this->return_Grade_And_Remark($finalAverage));
                                            $studentID_Total_Average_Arr['studentID'] = $students_in_a_class_arr[$s]['studentID'];
                                            $studentID_Total_Average_Arr['grandTotal'] = $finalTotal;
                                            $studentID_Total_Average_Arr['average'] = $finalAverage;
                                            $studentID_Total_Average_Arr['grade'] = $finalGrade;
                                            $studentID_Total_Average_Arr['remark'] = $finalRemark;
                                            array_push($classRow, $studentID_Total_Average_Arr);
                                            if ($students_in_a_class_arr[$s]['studentID'] === $studentID) {
                                                $cs_subject_offered_by_this_student = $cs_subject_offered_by_a_student;
                                                $non_combined_subjects_of_this_students = $non_combined_subjects_of_a_students;
                                                $this_student_total_average_grade_remark['grandTotal'] = round($finalTotal, 2);
                                                $this_student_total_average_grade_remark['average'] = round($finalAverage, 2);
                                                $this_student_total_average_grade_remark['grade'] = $finalGrade;
                                                $this_student_total_average_grade_remark['remark'] = $finalRemark;
                                            }

                                        }
                                    }
                                    if ($s === count($students_in_a_class_arr) - 1) {
                                        //starting from here: sorting to get the highest class average
                                        array_multisort(array_map(function ($element) {
                                            return $element['average'];
                                        }, $classRow), SORT_DESC, $classRow);
                                        $arrayOfHigestClassAverage = current($classRow);
                                        $arrayOfLowestClassAverage = end($classRow);
                                        $highestClassAverage = round($arrayOfHigestClassAverage['average'], 2);
                                        $lowestClassAverage = round($arrayOfLowestClassAverage['average'], 2);
                                        $this_student_total_average_grade_remark['highestClassAverage'] = $highestClassAverage;
                                        $this_student_total_average_grade_remark['lowestClassAverage'] = $lowestClassAverage;
                                        //ends here
                                        //looping to get student's position
                                        for ($t = 0; $t < count($classRow); $t++) {
                                            if ($classRow[$t]['studentID'] === $studentID) {
                                                $position = CodeGenerator::addOrdinalSuffix($t + 1);
                                                $this_student_total_average_grade_remark['position'] = $position;
                                                $this_student_total_average_grade_remark['no_of_subjects'] = count($non_combined_subjects_of_this_students) + count($cs_subject_offered_by_this_student);
                                                $this_student_total_average_grade_remark['no_of_students_in_the_class'] = count($students_in_a_class_arr);
                                                $attendanceObject = new Attendance($this->connect);
                                                $v1 = $attendanceObject->compute_sessional_attendance_for_a_student($studentID, $classID, $sessionID);
                                                $this_student_total_average_grade_remark['total_attendance'] = $v1['total_attendance'];
                                                $this_student_total_average_grade_remark['no_of_times_school_opened'] = $v1['no_of_times_school_opened'];
                                                $this_student_total_average_grade_remark['no_of_times_absent'] = $v1['no_of_times_absent'];

                                            }
                                        }
                                        //this ends here

                                        for ($k = 0; $k < count($cs_subject_offered_by_this_student); $k++) {
                                            $cs_subject_offered_by_this_student[$k]['cs_ID'] = $subjectObject->getCSSubjectName($cs_subject_offered_by_this_student[$k]['cs_ID']);
                                            $cs_subject_offered_by_this_student[$k]['grandTotal'] = round($cs_subject_offered_by_this_student[$k]['grandTotal'], 2);///$cs_subject_offered_by_this_student[$k]['termCount']
                                        }
                                        for ($o = 0; $o < count($non_combined_subjects_of_this_students); $o++) {
                                            $non_combined_subjects_of_this_students[$o]['grandTotal'] = round($non_combined_subjects_of_this_students[$o]['grandTotal'], 2);////$non_combined_subjects_of_this_students[$o]['termCount']
                                            $non_combined_subjects_of_this_students[$o]['subjectID'] = $subjectObject->getSubjectName($non_combined_subjects_of_this_students[$o]['subjectID']);
                                        }
                                        $result_row_arr['mainSubjects'] = $non_combined_subjects_of_this_students;
                                        $result_row_arr['cs_Subjects'] = $cs_subject_offered_by_this_student;
                                        $result_row_arr['middle_row'] = $this_student_total_average_grade_remark;
                                        //unset($result_row_arr['classID']);
                                        return $result_row_arr;
                                    }
                                }


                            } else {
                                /////NON CS CLASSES RESULT PRESENTATION GOES HERE;
                                $session_assessment_for_this_student = $this->fetchSessionScoreForAStudent($studentID, $classID, $sessionID);
                                $subjectObject = new Subject($this->connect);
                                for ($o = 0; $o < count($session_assessment_for_this_student); $o++) {

                                    $session_assessment_for_this_student[$o]['subjectID'] = $subjectObject->getSubjectName($session_assessment_for_this_student[$o]['subjectID']);
                                }
                                $result_row_arr['mainSubjects'] = $session_assessment_for_this_student;


                                $classRow = array();
                                $student_total_average_grade_remark = array();
                                $no_of_subjects = 0;
                                for ($s = 0; $s < count($students_in_a_class_arr); $s++) {
                                    //$arr_of_subjectIDs_for_this_session_ass = array();
                                    $studentID_Total_Average_Arr = array();
                                    $finalTotal = 0;
                                    $session_assessment_for_each_student = $this->fetchSessionScoreForAStudent($students_in_a_class_arr[$s]['studentID'], $classID, $sessionID);
                                    for ($x = 0; $x < count($session_assessment_for_each_student); $x++) {
                                        $finalTotal += $session_assessment_for_each_student[$x]['grandTotal'];
                                        if ($x === count($session_assessment_for_each_student) - 1) {
                                            //$finalTotal = $finalTotal;
                                            $finalAverage = $finalTotal / ($session_assessment_for_each_student[$x]['termCount'] * count($session_assessment_for_each_student));
                                            $finalGrade = $this->getGrade($this->return_Grade_And_Remark($finalAverage));
                                            $finalRemark = $this->getRemark($this->return_Grade_And_Remark($finalAverage));
                                            $studentID_Total_Average_Arr['studentID'] = $students_in_a_class_arr[$s]['studentID'];
                                            $studentID_Total_Average_Arr['grandTotal'] = $finalTotal;
                                            $studentID_Total_Average_Arr['average'] = $finalAverage;
                                            $studentID_Total_Average_Arr['grade'] = $finalGrade;
                                            $studentID_Total_Average_Arr['remark'] = $finalRemark;
                                            array_push($classRow, $studentID_Total_Average_Arr);
                                            if ($students_in_a_class_arr[$s]['studentID'] === $studentID) {
                                                $no_of_subjects = count($session_assessment_for_this_student);
                                                $student_total_average_grade_remark['grandTotal'] = round($finalTotal, 2);
                                                $student_total_average_grade_remark['average'] = round($finalAverage, 2);
                                                $student_total_average_grade_remark['grade'] = $finalGrade;
                                                $student_total_average_grade_remark['remark'] = $finalRemark;
                                            }

                                        }
                                    }
                                    if ($s === count($students_in_a_class_arr) - 1) {
                                        //starting from here: sorting to get the highest class average
                                        array_multisort(array_map(function ($element) {
                                            return $element['average'];
                                        }, $classRow), SORT_DESC, $classRow);
                                        $arrayOfHigestClassAverage = current($classRow);
                                        $arrayOfLowestClassAverage = end($classRow);
                                        $highestClassAverage = round($arrayOfHigestClassAverage['average'], 2);
                                        $lowestClassAverage = round($arrayOfLowestClassAverage['average'], 2);
                                        $student_total_average_grade_remark['highestClassAverage'] = $highestClassAverage;
                                        $student_total_average_grade_remark['lowestClassAverage'] = $lowestClassAverage;
                                        //ends here
                                        //looping to get student's position
                                        for ($t = 0; $t < count($classRow); $t++) {
                                            if ($classRow[$t]['studentID'] === $studentID) {
                                                $position = CodeGenerator::addOrdinalSuffix($t + 1);
                                                $student_total_average_grade_remark['position'] = $position;
                                                $student_total_average_grade_remark['no_of_subjects'] = $no_of_subjects;
                                                $student_total_average_grade_remark['no_of_students_in_the_class'] = count($students_in_a_class_arr);
                                                $attendanceObject = new Attendance($this->connect);
                                                $v1 = $attendanceObject->compute_sessional_attendance_for_a_student($studentID, $classID, $sessionID);
                                                $student_total_average_grade_remark['total_attendance'] = $v1['total_attendance'];
                                                $student_total_average_grade_remark['no_of_times_school_opened'] = $v1['no_of_times_school_opened'];
                                                $student_total_average_grade_remark['no_of_times_absent'] = $v1['no_of_times_absent'];
                                                $result_row_arr['middle_row'] = $student_total_average_grade_remark;
                                                //unset($result_row_arr['classID']);
                                                return $result_row_arr;

                                            }
                                        }
                                    }

                                }
                            }
                        } else {
                            return 'empty 1';
                        }


                    }
                    //Finally Fetching Student's Session Result

                } else {
                    return 'empty 2';
                }
            }
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
    ///////////////////////////////////////////////////////////////////////////////////
    ////////FETCHING RESULT BY TERM GOES DOWN HERE////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////
    public function fetchResultByTerm($admissionNO, $sessionID, $termID)
    {

        try {

            if (is_int($admissionNO)) {
                $fetch_query = $this->connect->prepare("SELECT students.name,students.passport, students.gender, students.admissionNO, students.studentID, class.classID, CONCAT(class.class, class.classArm) AS class, students.dateOfBirth, studentstatus.status,studentstatus.currentClassID,SESSION.sessionID,`calendar`.termID,
    SESSION.session,calendar.termBegins,calendar.termEnd,calendar.nextTermBegins FROM ( studentstatus JOIN students ON studentstatus.studentID = students.studentID AND students.studentID = '$admissionNO' JOIN class ON class.classID = studentstatus.currentClassID JOIN SESSION ON SESSION
    .sessionID = studentstatus.sessionID JOIN calendar ON calendar.sessionID = studentstatus.sessionID ) WHERE studentstatus.sessionID = $sessionID AND studentstatus.status LIKE 'Prom%' OR studentstatus.status LIKE 'Admit%' OR studentstatus.status LIKE 'Repeat%' OR studentstatus.status LIKE 'Withdrawn%'");
                $executed = $fetch_query->execute();
            } else {
                //echo 'here';
                $fetch_query = $this->connect->prepare("SELECT students.name,students.passport, students.gender, students.admissionNO, students.studentID, class.classID, CONCAT(class.class, class.classArm) AS class, students.dateOfBirth, studentstatus.status,studentstatus.currentClassID,SESSION.sessionID,`calendar`.termID,
    SESSION.session,calendar.termBegins,calendar.termEnd,calendar.nextTermBegins FROM ( studentstatus JOIN students ON studentstatus.studentID = students.studentID AND students.admissionNO = '$admissionNO' JOIN class ON class.classID = studentstatus.currentClassID JOIN SESSION ON SESSION
    .sessionID = studentstatus.sessionID JOIN calendar ON calendar.sessionID = studentstatus.sessionID ) WHERE studentstatus.sessionID = $sessionID AND studentstatus.status LIKE 'Prom%' OR studentstatus.status LIKE 'Admit%' OR studentstatus.status LIKE 'Repeat%' OR studentstatus.status LIKE 'Withdrawn%'");
                $executed = $fetch_query->execute();
            }
            if ($executed === true) {

                if ($fetch_query->rowCount() > 0) {

                    $result_row_arr = $fetch_query->fetch(PDO::FETCH_ASSOC);
                    //return $result_row_arr;
                    $fetch_school_data_query = $this->connect->prepare("SELECT `schoolName`, `schoolAddress`, `schoolPostalBox`, `schoolMotto`, `school_logo`, `headTeachersign` FROM `school_data`");
                    if ($fetch_school_data_query->execute()) {
                        if ($fetch_school_data_query->rowCount() > 0) {
                            $school_data_arr = $fetch_school_data_query->fetch(PDO::FETCH_ASSOC);
                            //down here trying to shorten names that are upto 3 word count e.g James Ikogu Keneth
                            $stud_name = $result_row_arr['name'];
                            if (str_word_count($stud_name) === 3) {
                                $name_arr = explode(" ", $stud_name);
                                $name_arr[1] = substr($name_arr[1], 0, 1) . '.';
                                $result_row_arr['name'] = join(' ', $name_arr);
                            }
                            //ends here
                            $studentID = $result_row_arr['studentID'];
                            $classID = $result_row_arr['currentClassID'];
                            $termBeginsValue = $result_row_arr['termBegins'];
                            $termEndedsValue = $result_row_arr['termEnd'];
                            $nextTermBeginsValue = $result_row_arr['nextTermBegins'];
                            $termBegins = date_create("$termBeginsValue");
                            $termEnd = date_create("$termEndedsValue");
                            $nextTermBegins = date_create("$nextTermBeginsValue");
                            $result_row_arr['termBegins'] = date_format($termBegins, 'Y-m-d');
                            $result_row_arr['termEnd'] = date_format($termEnd, 'Y-m-d');
                            $result_row_arr['nextTermBegins'] = date_format($nextTermBegins, 'Y-m-d');
                            $result_row_arr['dateOfBirth'] = CodeGenerator::getAge($result_row_arr['dateOfBirth']);
                            //echo CodeGenerator::term($termID);
                            $result_row_arr['termID'] = CodeGenerator::term($termID);
                            $result_row_arr['school_info'] = $school_data_arr;
                            $result_row_arr['result-type'] = 'term-result';
                            //fetching `cs_ID`,`cs_Code`, `cs_Name`, `subject1_ID`, `subject2_ID`, `subject3_ID`, `subject4_ID`, `subject5_ID`, `subject6_ID`, `subject7_ID`, `subject8_ID`
                            $cs_subjects_list_arr = $this->fetchCS();
                            //print_r($cs_subjects_list_arr);
                            $no_of_cs = count($cs_subjects_list_arr);
                            $studentObj = new Student($this->connect);
                            $students_in_a_class_arr = $studentObj->fetch_all_Student_in_a_Class_who_can_see_Result($classID);
                            //print_r($cs_subjects_list_arr);
                            $class_not_offering_cs = $this->classes_not_offering_cs_subjects();
                            $IDs_of_class_not_offering_cs = array();
                            foreach ($class_not_offering_cs as $row) {
                                array_push($IDs_of_class_not_offering_cs, $row['classID']);
                            }
                            //print_r($class_not_offering_cs);

                            if (!in_array($classID, $IDs_of_class_not_offering_cs)) {
                                for ($s = 0; $s < count($students_in_a_class_arr); $s++) {
                                    $non_combined_subjects = array();
                                    $cs_combined_subjects_matched = array();
                                    //fetching `studentID`,`subjectID`,`classID`,`sessionID`,`termCount`,`firstTermScore`, `secondTermScore`, `thirdTermScore`, `grandTotal`,`average`, `position`, `grade`, `remark`
                                    $assessments_of_subjects_offered_by_a_student_in_a_term = $this->fetchTermScoreForAStudent($students_in_a_class_arr[$s]['studentID'], $classID, $sessionID, $termID);

                                    //print_r($assessments_of_subjects_offered_by_a_student_in_a_session);
                                    $no_of_student_subjects_in_a_term = count($assessments_of_subjects_offered_by_a_student_in_a_term);
                                    //print_r($assessments_of_subjects_offered_by_a_student_in_a_session);
                                    for ($i = 0; $i < $no_of_cs; $i++) {
                                        $cs_ID = 0;
                                        $no_of_subjects_not_matched = 0;
                                        $cs_firstCA = 0;
                                        $cs_secondCA = 0;
                                        $cs_thirdCA = 0;
                                        $cs_exams = 0;
                                        $cs_total = 0;
                                        $no_of_subjects_matched = 0;

                                        for ($s_index = 0; $s_index < $no_of_student_subjects_in_a_term; $s_index++) {

                                            //AGM/SEC/2021/1/736724

                                            //print_r($assessments_of_subjects_offered_by_a_student_in_a_session[$s_index]);
                                            $arr_of_subjectIDs_that_makes_cs = array();
                                            array_push($arr_of_subjectIDs_that_makes_cs,
                                                $cs_subjects_list_arr[$i]['subject1_ID'],
                                                $cs_subjects_list_arr[$i]['subject2_ID'],
                                                $cs_subjects_list_arr[$i]['subject3_ID'],
                                                $cs_subjects_list_arr[$i]['subject4_ID'],
                                                $cs_subjects_list_arr[$i]['subject5_ID'],
                                                $cs_subjects_list_arr[$i]['subject6_ID'],
                                                $cs_subjects_list_arr[$i]['subject7_ID']);
                                            //print_r($arr_of_subjectIDs_that_makes_cs);

                                            if (in_array($assessments_of_subjects_offered_by_a_student_in_a_term[$s_index]['subjectID'], $arr_of_subjectIDs_that_makes_cs)) {
                                                $cs_firstCA += $assessments_of_subjects_offered_by_a_student_in_a_term[$s_index]['firstCA'];
                                                $cs_secondCA += $assessments_of_subjects_offered_by_a_student_in_a_term[$s_index]['secondCA'];
                                                $cs_thirdCA += $assessments_of_subjects_offered_by_a_student_in_a_term[$s_index]['thirdCA'];
                                                $cs_exams += $assessments_of_subjects_offered_by_a_student_in_a_term[$s_index]['exams'];
                                                $cs_total += $assessments_of_subjects_offered_by_a_student_in_a_term[$s_index]['total'];
                                                $no_of_subjects_matched += 1;
                                                $cs_ID = $cs_subjects_list_arr[$i]['cs_ID'];
                                                //echo $no_of_subjects_matched;
                                                array_push($cs_combined_subjects_matched, $assessments_of_subjects_offered_by_a_student_in_a_term[$s_index]);


                                            } else {

                                                array_push($non_combined_subjects, $assessments_of_subjects_offered_by_a_student_in_a_term[$s_index]);
                                                $no_of_subjects_not_matched += 1;

                                                //print_r($non_combined_subjects);

                                            }
                                            if ($s_index === $no_of_student_subjects_in_a_term - 1) {
                                                $cs_exams = $cs_exams / $no_of_subjects_matched;
                                                $cs_final_total = $cs_total / $no_of_subjects_matched;
                                                $cs_grade = $this->getGrade($this->return_Grade_And_Remark($cs_final_total));
                                                $cs_remark = $this->getRemark($this->return_Grade_And_Remark($cs_final_total));
                                                //$studentID, $cs_ID, $classID, $sessionID,$termID

                                                if ($this->check_If_Term_Assessment_For_CS_Exist_For_A_Student($assessments_of_subjects_offered_by_a_student_in_a_term[$s_index]['studentID'], $cs_ID, $classID, $sessionID, $termID) > 0) {
                                                    //$cs_ID, $studentID, $classID, $sessionID,$termID, $subjectCount, $firstCA, $secondCA, $thirdCA,$exams, $total, $grade, $remark

                                                    $this->updateUncomputedCSTermlyAssessment($cs_ID, $assessments_of_subjects_offered_by_a_student_in_a_term[$s_index]['studentID'], $assessments_of_subjects_offered_by_a_student_in_a_term[$s_index]['classID'], $assessments_of_subjects_offered_by_a_student_in_a_term[$s_index]['sessionID'], $termID, $no_of_subjects_matched, $cs_firstCA / $no_of_subjects_matched, $cs_secondCA / $no_of_subjects_matched, $cs_thirdCA / $no_of_subjects_matched, $cs_exams, $cs_final_total, $cs_grade, $cs_remark);
                                                    /* if ($status === 'uncomputed cs updated') {
                                                         //echo $status;

                                                     }*/
                                                } else {
                                                    ///////////////////$cs_ID, $studentID, $classID, $sessionID,$termID, $subjectCount, $firstCA, $secondCA, $thirdCA, $exams, $total, $grade, $remark
                                                    $this->insertTermlyAssessmentForCS($cs_ID, $assessments_of_subjects_offered_by_a_student_in_a_term[$s_index]['studentID'], $assessments_of_subjects_offered_by_a_student_in_a_term[$s_index]['classID'], $assessments_of_subjects_offered_by_a_student_in_a_term[$s_index]['sessionID'], $termID, $no_of_subjects_matched, $cs_firstCA / $no_of_subjects_matched, $cs_secondCA / $no_of_subjects_matched, $cs_thirdCA / $no_of_subjects_matched, $cs_exams, $cs_final_total, $cs_grade, $cs_remark);
                                                    /*if ($status === 'inserted') {
                                                         //echo $status;
                                                         //print_r($status);


                                                     } else {
                                                         //print_r($status);
                                                     }*/
                                                }
                                                for ($d = 0; $d < count($cs_combined_subjects_matched); $d++) {
                                                    //$studentID, $classID, $sessionID,$termID, $subjectID
                                                    if ($this->check_If_Matched_CS_Subjects_Termly_Assessment_Exists($cs_combined_subjects_matched[$d]['studentID'], $cs_combined_subjects_matched[$d]['classID'], $cs_combined_subjects_matched[$d]['sessionID'], $cs_combined_subjects_matched[$d]['termID'], $cs_combined_subjects_matched[$d]['subjectID']) > 0) {
                                                        $this->update_Matched_CS_Subjects_Termly_Assessment($cs_combined_subjects_matched[$d]['studentID'], $cs_combined_subjects_matched[$d]['classID'], $cs_combined_subjects_matched[$d]['sessionID'], $cs_combined_subjects_matched[$d]['termID'], $cs_combined_subjects_matched[$d]['subjectID'], $cs_combined_subjects_matched[$d]['firstCA'], $cs_combined_subjects_matched[$d]['secondCA'], $cs_combined_subjects_matched[$d]['thirdCA'], $cs_combined_subjects_matched[$d]['exams'], $cs_combined_subjects_matched[$d]['total'], $cs_combined_subjects_matched[$d]['subjectPosition'], $cs_combined_subjects_matched[$d]['grade'], $cs_combined_subjects_matched[$d]['remark']);

                                                    } else {
                                                        //$studentID, $classID, $sessionID, $termID, $subjectID, $firstCA, $secondCA, $thirdCA, $exams, $total, $grade, $remark

                                                        $this->insert_Matched_CS_Subjects_Termly_Assessment($cs_combined_subjects_matched[$d]['studentID'], $cs_combined_subjects_matched[$d]['classID'], $cs_combined_subjects_matched[$d]['sessionID'], $cs_combined_subjects_matched[$d]['termID'], $cs_combined_subjects_matched[$d]['subjectID'], $cs_combined_subjects_matched[$d]['firstCA'], $cs_combined_subjects_matched[$d]['secondCA'], $cs_combined_subjects_matched[$d]['thirdCA'], $cs_combined_subjects_matched[$d]['exams'], $cs_combined_subjects_matched[$d]['total'], $cs_combined_subjects_matched[$d]['subjectPosition'], $cs_combined_subjects_matched[$d]['grade'], $cs_combined_subjects_matched[$d]['remark']);
                                                    }
                                                }


                                            }

                                        }
                                        if ($i === $no_of_cs - 1) {
                                            //$diff = array_diff($non_combined_subjects,$cs_combined_subjects_matched);

                                            $non_combined_subjects_termly_assessment = $this->multi_array_diff(array_unique($non_combined_subjects, SORT_REGULAR), $cs_combined_subjects_matched);
                                            foreach ($non_combined_subjects_termly_assessment as $rec) {
                                                $this->insertTermlyAssessmentForNonCombinedSubjectsForAStudent($rec['studentID'], $rec['subjectID'], $rec['classID'], $rec['sessionID'], $rec['termID'], $rec['firstCA'], $rec['secondCA'], $rec['thirdCA'], $rec['exams'], $rec['total'], $rec['subjectPosition'], $rec['grade'], $rec['remark']);
                                            }
                                            ///print_r($non_combined_subjects_session_assessment);


                                        }

                                    }
                                    if ($s === count($students_in_a_class_arr) - 1) {
                                        //`cs_assessmentID`,`studentID`,`average`, `position`, `dateCreated`
                                        for ($cs = 0; $cs < $no_of_cs; $cs++) {
                                            //`cs_assessmentID`,`studentID`,`classID`,`sessionID`,`average`, `position`, `dateCreated`
                                            $cs_termly_assessment_by_cs_id = $this->fetchCSTermlyAssessment($cs_subjects_list_arr[$cs]['cs_ID'], $classID, $sessionID, $termID);
                                            array_multisort(array_map(function ($element) {
                                                return $element['total'];
                                            }, $cs_termly_assessment_by_cs_id), SORT_DESC, $cs_termly_assessment_by_cs_id);

                                            for ($p = 0; $p < count($cs_termly_assessment_by_cs_id); $p++) {
                                                $cs_position = CodeGenerator::addOrdinalSuffix($p + 1);
                                                //$studentID,$classID,$sessionID,$position
                                                //`cs_assessment`.`cs_assessmentID`
                                                $cs_termly_assessment_by_cs_id[$p]['position'] = $cs_position;
                                                //$cs_ID, $studentID, $classID, $sessionID,$termID, $position
                                                $this->updateTermlyAssessmentForCS($cs_termly_assessment_by_cs_id[$p]['cs_ID'], $cs_termly_assessment_by_cs_id[$p]['studentID'], $cs_termly_assessment_by_cs_id[$p]['classID'], $cs_termly_assessment_by_cs_id[$p]['sessionID'], $cs_termly_assessment_by_cs_id[$p]['termID'], $cs_termly_assessment_by_cs_id[$p]['position']);
                                            }

                                        }

                                    }
                                }
                                ///FINALLY PRESENTING RESULT GOES HERE

                                $classRow = array();
                                $subjectObject = new Subject($this->connect);
                                $this_student_total_average_grade_remark = array();
                                $non_combined_subjects_of_this_students = array();
                                $cs_subject_offered_by_this_student = array();

                                for ($s = 0; $s < count($students_in_a_class_arr); $s++) {
                                    //$arr_of_subjectIDs_for_this_session_ass = array();
                                    $studentID_Total_Average_Arr = array();
                                    $final_total = 0;
                                    //$studentID, $classID, $sessionID,$termID
                                    $cs_termly_assessment_of_a_student = $this->fetchCSTermlyAssessmentForAStudent($students_in_a_class_arr[$s]['studentID'], $classID, $sessionID, $termID);
                                    //$studentID, $classID, $sessionID,$termID
                                    $non_combined_subjects_of_a_students = $this->fetch_Non_Combined_Subjects_Term_Assessment_For_A_Student($students_in_a_class_arr[$s]['studentID'], $classID, $sessionID, $termID);
                                    //print_r($cs_termly_assessment_of_a_student);
                                    $whole_subjects = array_merge($cs_termly_assessment_of_a_student, $non_combined_subjects_of_a_students);

                                    for ($x = 0; $x < count($whole_subjects); $x++) {
                                        $final_total += $whole_subjects[$x]['total'];
                                        if ($x === count($whole_subjects) - 1) {
                                            $final_average = $final_total / count($whole_subjects);
                                            $final_grade = $this->getGrade($this->return_Grade_And_Remark($final_average));
                                            $final_remark = $this->getRemark($this->return_Grade_And_Remark($final_average));
                                            $studentID_Total_Average_Arr['studentID'] = $students_in_a_class_arr[$s]['studentID'];
                                            $studentID_Total_Average_Arr['total'] = $final_total;
                                            $studentID_Total_Average_Arr['average'] = $final_average;
                                            $studentID_Total_Average_Arr['grade'] = $final_grade;
                                            $studentID_Total_Average_Arr['remark'] = $final_remark;
                                            array_push($classRow, $studentID_Total_Average_Arr);
                                            if ($students_in_a_class_arr[$s]['studentID'] === $studentID) {
                                                $cs_subject_offered_by_this_student = $cs_termly_assessment_of_a_student;
                                                $non_combined_subjects_of_this_students = $non_combined_subjects_of_a_students;
                                                $this_student_total_average_grade_remark['total'] = round($final_total, 2);
                                                $this_student_total_average_grade_remark['average'] = round($final_average, 2);
                                                $this_student_total_average_grade_remark['grade'] = $final_grade;
                                                $this_student_total_average_grade_remark['remark'] = $final_remark;
                                            }

                                        }
                                    }
                                    if ($s === count($students_in_a_class_arr) - 1) {
                                        //starting from here: sorting to get the highest class average
                                        array_multisort(array_map(function ($element) {
                                            return $element['average'];
                                        }, $classRow), SORT_DESC, $classRow);
                                        $arrayOfHigestClassAverage = current($classRow);
                                        $arrayOfLowestClassAverage = end($classRow);
                                        $highestClassAverage = round($arrayOfHigestClassAverage['average'], 2);
                                        $lowestClassAverage = round($arrayOfLowestClassAverage['average'], 2);
                                        $this_student_total_average_grade_remark['highestClassAverage'] = $highestClassAverage;
                                        $this_student_total_average_grade_remark['lowestClassAverage'] = $lowestClassAverage;
                                        //ends here
                                        //looping to get student's position
                                        for ($t = 0; $t < count($classRow); $t++) {
                                            if ($classRow[$t]['studentID'] === $studentID) {
                                                $position = CodeGenerator::addOrdinalSuffix($t + 1);
                                                $this_student_total_average_grade_remark['position'] = $position;
                                                $this_student_total_average_grade_remark['no_of_subjects'] = count($non_combined_subjects_of_this_students) + count($cs_subject_offered_by_this_student);
                                                $this_student_total_average_grade_remark['no_of_students_in_the_class'] = count($students_in_a_class_arr);
                                                $attendanceObject = new Attendance($this->connect);
                                                $v1 = $attendanceObject->compute_termly_attendance_for_a_student($studentID, $classID, $sessionID, $termID);
                                                $this_student_total_average_grade_remark['total_attendance'] = $v1['total_attendance'];
                                                $this_student_total_average_grade_remark['no_of_times_school_opened'] = $v1['no_of_times_school_opened'];
                                                $this_student_total_average_grade_remark['no_of_times_absent'] = $v1['no_of_times_absent'];

                                            }
                                        }
                                        //this ends here

                                        for ($k = 0; $k < count($cs_subject_offered_by_this_student); $k++) {
                                            $cs_subject_offered_by_this_student[$k]['cs_ID'] = $subjectObject->getCSSubjectName($cs_subject_offered_by_this_student[$k]['cs_ID']);
                                            $cs_subject_offered_by_this_student[$k]['total'] = round($cs_subject_offered_by_this_student[$k]['total'], 2);
                                        }
                                        for ($o = 0; $o < count($non_combined_subjects_of_this_students); $o++) {
                                            $non_combined_subjects_of_this_students[$o]['total'] = round($non_combined_subjects_of_this_students[$o]['total'], 2);
                                            $non_combined_subjects_of_this_students[$o]['subjectID'] = $subjectObject->getSubjectName($non_combined_subjects_of_this_students[$o]['subjectID']);
                                        }
                                        $result_row_arr['mainSubjects'] = $non_combined_subjects_of_this_students;
                                        $result_row_arr['cs_Subjects'] = $cs_subject_offered_by_this_student;
                                        $result_row_arr['middle_row'] = $this_student_total_average_grade_remark;
                                        //unset($result_row_arr['classID']);
                                        return $result_row_arr;
                                    }
                                }


                            } else {
                                /////NON CS CLASSES RESULT PRESENTATION GOES HERE;
                                $termly_assessment_for_this_student = $this->fetchTermScoreForAStudent($studentID, $classID, $sessionID, $termID);
                                $subjectObject = new Subject($this->connect);
                                for ($o = 0; $o < count($termly_assessment_for_this_student); $o++) {

                                    $termly_assessment_for_this_student[$o]['subjectID'] = $subjectObject->getSubjectName($termly_assessment_for_this_student[$o]['subjectID']);
                                }
                                $result_row_arr['mainSubjects'] = $termly_assessment_for_this_student;


                                $classRow = array();
                                $student_total_average_grade_remark = array();
                                $no_of_subjects = 0;
                                for ($s = 0; $s < count($students_in_a_class_arr); $s++) {
                                    //$arr_of_subjectIDs_for_this_session_ass = array();
                                    $studentID_Total_Average_Arr = array();
                                    $final_total = 0;
                                    $term_assessment_for_each_student = $this->fetchTermScoreForAStudent($students_in_a_class_arr[$s]['studentID'], $classID, $sessionID, $termID);
                                    for ($x = 0; $x < count($term_assessment_for_each_student); $x++) {
                                        $final_total += $term_assessment_for_each_student[$x]['total'];
                                        if ($x === count($term_assessment_for_each_student) - 1) {
                                            //$finalTotal = $finalTotal;
                                            $final_average = $final_total / count($term_assessment_for_each_student);
                                            $final_grade = $this->getGrade($this->return_Grade_And_Remark($final_average));
                                            $final_remark = $this->getRemark($this->return_Grade_And_Remark($final_average));
                                            $studentID_Total_Average_Arr['studentID'] = $students_in_a_class_arr[$s]['studentID'];
                                            $studentID_Total_Average_Arr['total'] = $final_total;
                                            $studentID_Total_Average_Arr['average'] = $final_average;
                                            $studentID_Total_Average_Arr['grade'] = $final_grade;
                                            $studentID_Total_Average_Arr['remark'] = $final_remark;
                                            array_push($classRow, $studentID_Total_Average_Arr);
                                            if ($students_in_a_class_arr[$s]['studentID'] === $studentID) {
                                                $no_of_subjects = count($termly_assessment_for_this_student);
                                                $student_total_average_grade_remark['total'] = round($final_total, 2);
                                                $student_total_average_grade_remark['average'] = round($final_average, 2);
                                                $student_total_average_grade_remark['grade'] = $final_grade;
                                                $student_total_average_grade_remark['remark'] = $final_remark;
                                            }

                                        }
                                    }
                                    if ($s === count($students_in_a_class_arr) - 1) {
                                        //starting from here: sorting to get the highest class average
                                        array_multisort(array_map(function ($element) {
                                            return $element['average'];
                                        }, $classRow), SORT_DESC, $classRow);
                                        $arrayOfHigestClassAverage = current($classRow);
                                        $arrayOfLowestClassAverage = end($classRow);
                                        $highestClassAverage = round($arrayOfHigestClassAverage['average'], 2);
                                        $lowestClassAverage = round($arrayOfLowestClassAverage['average'], 2);
                                        $student_total_average_grade_remark['highestClassAverage'] = $highestClassAverage;
                                        $student_total_average_grade_remark['lowestClassAverage'] = $lowestClassAverage;
                                        //ends here
                                        //looping to get student's position
                                        for ($t = 0; $t < count($classRow); $t++) {
                                            if ($classRow[$t]['studentID'] === $studentID) {
                                                $position = CodeGenerator::addOrdinalSuffix($t + 1);
                                                $student_total_average_grade_remark['position'] = $position;
                                                $student_total_average_grade_remark['no_of_subjects'] = $no_of_subjects;
                                                $student_total_average_grade_remark['no_of_students_in_the_class'] = count($students_in_a_class_arr);
                                                $attendanceObject = new Attendance($this->connect);
                                                $v1 = $attendanceObject->compute_termly_attendance_for_a_student($studentID, $classID, $sessionID, $termID);
                                                $student_total_average_grade_remark['total_attendance'] = $v1['total_attendance'];
                                                $student_total_average_grade_remark['no_of_times_school_opened'] = $v1['no_of_times_school_opened'];
                                                $student_total_average_grade_remark['no_of_times_absent'] = $v1['no_of_times_absent'];
                                                $result_row_arr['middle_row'] = $student_total_average_grade_remark;
                                                //unset($result_row_arr['classID']);
                                                return $result_row_arr;

                                            }
                                        }
                                    }

                                }
                            }
                        } else {
                            return 'empty 1';
                        }


                    }
                    //Finally Fetching Student's Session Result

                } else {
                    return 'empty 2';
                }
            }
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function fetchCS()
    {
        try {
            $query_cs = $this->connect->prepare("SELECT `cs_ID`,`cs_Code`, `cs_Name`, `subject1_ID`, `subject2_ID`, `subject3_ID`, `subject4_ID`, `subject5_ID`, `subject6_ID`, `subject7_ID`, `subject8_ID` FROM `combinedsubjects`");
            if ($query_cs->execute()) {
                return $query_cs->fetchAll(PDO::FETCH_ASSOC);
            } else {
                return "not executed";
            }


        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function classes_not_offering_cs_subjects()
    {
        try {
            $cs_query = $this->connect->prepare("SELECT `classID` FROM `class_not_offering_cs_subject`");
            if ($cs_query->execute()) {
                return $cs_query->fetchAll(PDO::FETCH_ASSOC);
            }

        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function fetchSessionScoreForAStudent($studentID, $classID, $sessionID)
    {
        try {
            $result_query = $this->connect->prepare("SELECT `studentID`,`subjectID`,`classID`,`sessionID`,`termCount`,`firstTermScore`, `secondTermScore`, `thirdTermScore`, `grandTotal`,`average`, `position`, `grade`, `remark` FROM `sessionalassessment` WHERE `studentID`=$studentID AND `classID`=$classID AND `sessionID`=$sessionID");
            $result_query->execute();
            return $result_query->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function fetchTermScoreForAStudent($studentID, $classID, $sessionID, $termID)
    {
        try {
            $result_query = $this->connect->prepare("SELECT * FROM `termly_assessment` WHERE `studentID`=$studentID AND `classID`=$classID AND `sessionID`=$sessionID AND `termID`=$termID");
            $result_query->execute();
            return $result_query->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }


    public function check_If_Session_Assessment_For_CS_Exist_For_A_Student($studentID, $cs_ID, $classID, $sessionID)
    {
        try {
            $query = $this->connect->prepare("SELECT * FROM `cs_assessment` WHERE `cs_assessment`.`studentID`=$studentID AND `cs_assessment`.cs_ID=$cs_ID AND `cs_assessment`.`classID`=$classID AND `cs_assessment`.`sessionID`=$sessionID");

            if ($query->execute()) {
                return $query->rowCount();
            }

        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function check_If_Term_Assessment_For_CS_Exist_For_A_Student($studentID, $cs_ID, $classID, $sessionID, $termID)
    {
        try {
            $query = $this->connect->prepare("SELECT * FROM `cs_termly_assessment` WHERE `cs_ID`=$cs_ID AND `termID`=$termID AND `sessionID`=$sessionID AND `classID`=$classID AND `studentID`=$studentID");

            if ($query->execute()) {
                return $query->rowCount();
            }

        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function updateUncomputedCS($cs_ID, $studentID, $classID, $sessionID, $subjectCount, $termCount, $firstTermScore, $secondTermScore, $thirdTermScore, $grandTotal, $average, $grade, $remark): string
    {
        try {

            $insert_query = $this->connect->prepare("UPDATE `cs_assessment` SET `subjectCount`=$subjectCount,`termCount`=$termCount,`firstTermScore`=$firstTermScore,`secondTermScore`=$secondTermScore,`thirdTermScore`=$thirdTermScore,`grandTotal`=$grandTotal,`average`=$average,`grade`='$grade',`remark`='$remark',`dateCreated`=CURRENT_TIMESTAMP WHERE `studentID`=$studentID AND `classID`=$classID AND `sessionID`=$sessionID AND `cs_ID`=$cs_ID");
            $insert_query->execute();

            if ($insert_query->execute()) {
                return 'uncomputed cs updated';
            } else {
                return 'u_false';
            }


        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function updateUncomputedCSTermlyAssessment($cs_ID, $studentID, $classID, $sessionID, $termID, $subjectCount, $firstCA, $secondCA, $thirdCA, $exams, $total, $grade, $remark): string
    {
        try {

            $insert_query = $this->connect->prepare("UPDATE `cs_termly_assessment` SET `termID`=$termID,`subjectCount`=$subjectCount,`firstCA`=$firstCA,`secondCA`=$secondCA,`thirdCA`=$thirdCA,`exams`=$exams,`total`=$total,`grade`='$grade',`remark`='$remark',`dateCreated`=CURRENT_TIMESTAMP WHERE `cs_ID`=$cs_ID AND `studentID`=$studentID AND `classID`=$classID AND `sessionID`=$sessionID AND `termID`=$termID");
            $insert_query->execute();

            if ($insert_query->execute()) {
                return 'uncomputed cs updated';
            } else {
                return 'u_false';
            }


        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }


    public function insertAssessmentForCS($cs_ID, $studentID, $classID, $sessionID, $subjectCount, $termCount, $firstTermScore, $secondTermScore, $thirdTermScore, $grandTotal, $average, $grade, $remark)
    {
        try {
            $insert_query = $this->connect->prepare("INSERT INTO `cs_assessment`(`cs_assessmentID`, `cs_ID`, `studentID`, `classID`, `sessionID`, `subjectCount`,`termCount`, `firstTermScore`, `secondTermScore`, `thirdTermScore`,`grandTotal`,`average`, `grade`, `remark`,`dateCreated`) VALUES(null,$cs_ID,$studentID,$classID,$sessionID,$subjectCount,$termCount,$firstTermScore,$secondTermScore,$thirdTermScore,$grandTotal,$average,'$grade','$remark',CURRENT_TIMESTAMP)");
            if ($insert_query->execute()) {
                return 'inserted';
            } else {
                return 'not inserted';
            }

        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function insertTermlyAssessmentForCS($cs_ID, $studentID, $classID, $sessionID, $termID, $subjectCount, $firstCA, $secondCA, $thirdCA, $exams, $total, $grade, $remark)
    {
        try {
            $insert_query = $this->connect->prepare("INSERT INTO `cs_termly_assessment`(`cs_termly_assessmentID`, `cs_ID`, `studentID`, `classID`, `sessionID`, `termID`, `subjectCount`, `firstCA`, `secondCA`, `thirdCA`, `exams`, `total`, `grade`, `remark`, `dateCreated`) VALUES (null,$cs_ID,$studentID,$classID,$sessionID,$termID,$subjectCount,$firstCA,$secondCA,$thirdCA,$exams,$total,'$grade','$remark',CURRENT_TIMESTAMP)");
            if ($insert_query->execute()) {
                return 'inserted';
            } else {
                return 'not inserted';
            }

        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function checkIfAssessmentForNonCombinedSubjectsForAStudentExists($studentID, $subjectID, $classID, $sessionID)
    {
        try {
            $check_query = $this->connect->prepare("SELECT * FROM `non_combined_subjects_session_assessment` WHERE `studentID`=$studentID AND `subjectID`=$subjectID AND `classID`=$classID AND `sessionID`=$sessionID");
            if ($check_query->execute()) {
                return $check_query->rowCount();
            }
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function checkIfTermlyAssessmentForNonCombinedSubjectsForAStudentExists($studentID, $subjectID, $classID, $sessionID, $termID)
    {
        try {
            $check_query = $this->connect->prepare("SELECT * FROM `non_combined_subjects_termly_assessment` WHERE `studentID`=$studentID AND `subjectID`=$subjectID AND `classID`=$classID AND `sessionID`=$sessionID AND `termID`=$termID");
            if ($check_query->execute()) {
                return $check_query->rowCount();
            }
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function insertAssessmentForNonCombinedSubjectsForAStudent($studentID, $subjectID, $classID, $sessionID, $termCount, $firstTermScore, $secondTermScore, $thirdTermScore, $grandTotal, $average, $position, $grade, $remark)
    {
        try {
            if ($this->checkIfAssessmentForNonCombinedSubjectsForAStudentExists($studentID, $subjectID, $classID, $sessionID) > 0) {

                $this->update_AssessmentForNonCombinedSubjectsForAStudent($studentID, $classID, $sessionID, $subjectID, $termCount, $firstTermScore, $secondTermScore, $thirdTermScore, $grandTotal, $average, $position, $grade, $remark);

            } else {
                $insert_query = $this->connect->prepare("INSERT INTO `non_combined_subjects_session_assessment`(`rowID`, `studentID`, `subjectID`, `classID`, `sessionID`, `termCount`, `firstTermScore`, `secondTermScore`, `thirdTermScore`, `grandTotal`, `average`, `position`, `grade`, `remark`) VALUES (null,$studentID,$subjectID,$classID,$sessionID,$termCount,$firstTermScore,$secondTermScore,$thirdTermScore,$grandTotal,$average,'$position','$grade','$remark')");
                if ($insert_query->execute()) {
                    return 'ok';
                } else {
                    return 'error';
                }
            }


        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function insertTermlyAssessmentForNonCombinedSubjectsForAStudent($studentID, $subjectID, $classID, $sessionID, $termID, $firstCA, $secondCA, $thirdCA, $exams, $total, $position, $grade, $remark)
    {
        try {
            //$studentID,$subjectID, $classID, $sessionID,$termID
            if ($this->checkIfTermlyAssessmentForNonCombinedSubjectsForAStudentExists($studentID, $subjectID, $classID, $sessionID, $termID) > 0) {
//$studentID, $classID, $sessionID, $subjectID, $termID, $firstCA, $secondCA, $thirdCA, $exams, $total,$position, $grade, $remark
                $this->update_Termly_AssessmentForNonCombinedSubjectsForAStudent($studentID, $classID, $sessionID, $subjectID, $termID, $firstCA, $secondCA, $thirdCA, $exams, $total, $position, $grade, $remark);

            } else {
                $insert_query = $this->connect->prepare("INSERT INTO `non_combined_subjects_termly_assessment`(`termly_non_combined_subjectsID`, `studentID`, `subjectID`, `classID`, `sessionID`,`termID`, `firstCA`, `secondCA`, `thirdCA`, `exams`, `total`,`subjectPosition`, `grade`, `remark`,`dateCreated`) VALUES (null,$studentID,$subjectID,$classID,$sessionID,$termID,$firstCA,$secondCA,$thirdCA,$exams,$total,'$position','$grade','$remark',CURRENT_TIMESTAMP)");
                if ($insert_query->execute()) {
                    return 'ok';
                } else {
                    return 'error';
                }
            }


        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function update_AssessmentForNonCombinedSubjectsForAStudent($studentID, $classID, $sessionID, $subjectID, $termCount, $firstTermScore, $secondTermScore, $thirdTermScore, $grandTotal, $average, $position, $grade, $remark)
    {
        try {
            $update_query = $this->connect->prepare("UPDATE `non_combined_subjects_session_assessment` SET `termCount`=$termCount,`firstTermScore`=$firstTermScore,`secondTermScore`=$secondTermScore,`thirdTermScore`=$thirdTermScore,`grandTotal`=$grandTotal,`average`=$average,`position`='$position',`grade`='$grade',`remark`='$remark' WHERE `studentID`=$studentID AND `subjectID`=$subjectID AND `classID`=$classID AND `sessionID`=$sessionID");
            if ($update_query->execute()) {
                return 'updated';
            } else {
                return 'not updated';
            }

        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function update_Termly_AssessmentForNonCombinedSubjectsForAStudent($studentID, $classID, $sessionID, $subjectID, $termID, $firstCA, $secondCA, $thirdCA, $exams, $total, $position, $grade, $remark): string
    {
        try {
            $update_query = $this->connect->prepare("UPDATE `non_combined_subjects_termly_assessment` SET `firstCA`=$firstCA,`secondCA`=$secondCA,`thirdCA`=$thirdCA,`exams`=$exams,`total`=$total,`subjectPosition`='$position',`grade`='$grade',`remark`='$remark',`dateCreated`=CURRENT_TIMESTAMP WHERE `studentID`=$studentID AND `subjectID`=$subjectID AND `classID`=$classID AND `sessionID`=$sessionID AND `termID`=$termID");
            if ($update_query->execute()) {
                return 'updated';
            } else {
                return 'not updated';
            }

        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function check_If_Matched_CS_Subjects_Session_Assessment_Exists($studentID, $classID, $sessionID, $subjectID)
    {
        try {
            $query = $this->connect->prepare("SELECT * FROM `matched_cs_subjects` WHERE `studentID`=$studentID AND `classID`=$classID AND `sessionID`=$sessionID AND `subjectID`=$subjectID");
            if ($query->execute()) {
                return $query->rowCount();
            } else {
                return 'error';
            }

        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function check_If_Matched_CS_Subjects_Termly_Assessment_Exists($studentID, $classID, $sessionID, $termID, $subjectID)
    {
        try {
            $query = $this->connect->prepare("SELECT * FROM `matched_cs_termly_subjects` WHERE `studentID`=$studentID AND `classID`=$classID AND `sessionID`=$sessionID AND `termID`=$termID AND `subjectID`=$subjectID");
            if ($query->execute()) {
                return $query->rowCount();
            } else {
                return 'error';
            }

        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function update_Matched_CS_Subjects_Session_Assessment($studentID, $classID, $sessionID, $termCount, $subjectID, $firstTermScore, $secondTermScore, $thirdTermScore, $grandTotal, $average, $grade, $remark)
    {
        try {
            $insert_query = $this->connect->prepare("UPDATE `matched_cs_subjects` SET `termCount`=$termCount,`firstTermScore`=$firstTermScore,`secondTermScore`=$secondTermScore,`thirdTermScore`=$thirdTermScore,`grandTotal`=$grandTotal,`average`=$average,`grade`='$grade',`remark`='$remark',`dateCreated`=CURRENT_TIMESTAMP WHERE `studentID`=$studentID AND `classID`=$classID AND `sessionID`=$sessionID AND `subjectID`=$subjectID");
            if ($insert_query->execute()) {
                return 'updated';
            } else {
                return 'not updated';
            }

        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function update_Matched_CS_Subjects_Termly_Assessment($studentID, $classID, $sessionID, $termID, $subjectID, $firstCA, $secondCA, $thirdCA, $exams, $total, $position, $grade, $remark)
    {
        try {
            $insert_query = $this->connect->prepare("UPDATE `matched_cs_termly_subjects` SET `firstCA`=$firstCA,`secondCA`=$secondCA,`thirdCA`=$thirdCA,`exams`=$exams,`total`=$total,`subjectPosition`='$position',`grade`='$grade',`remark`='$remark',`dateCreated`=CURRENT_TIMESTAMP WHERE `studentID`=$studentID AND `classID`=$classID AND `sessionID`=$sessionID AND `termID`=$termID AND `subjectID`=$subjectID");
            if ($insert_query->execute()) {
                return 'updated';
            } else {
                return 'not updated';
            }

        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function insert_Matched_CS_Subjects_Sessional_Assessment($studentID, $classID, $sessionID, $subjectID, $termCount, $firstTermScore, $secondTermScore, $thirdTermScore, $grandTotal, $average, $grade, $remark)
    {
        try {
            $insert_query = $this->connect->prepare("INSERT INTO `matched_cs_subjects`(`matched_cs_subjectID`, `studentID`, `classID`, `sessionID`, `subjectID`, `termCount`, `firstTermScore`, `secondTermScore`, `thirdTermScore`, `grandTotal`, `average`, `grade`, `remark`, `dateCreated`) VALUES (null,$studentID,$classID,$sessionID,$subjectID,$termCount,$firstTermScore,$secondTermScore,$thirdTermScore,$grandTotal,$average,'$grade','$remark',CURRENT_TIMESTAMP)");
            if ($insert_query->execute()) {
                return 'inserted';
            } else {
                return 'not inserted';
            }

        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function insert_Matched_CS_Subjects_Termly_Assessment($studentID, $classID, $sessionID, $termID, $subjectID, $firstCA, $secondCA, $thirdCA, $exams, $total, $position, $grade, $remark)
    {
        try {
            $insert_query = $this->connect->prepare("INSERT INTO `matched_cs_termly_subjects`(`matched_cs_termly_subjectID`, `studentID`, `classID`, `sessionID`, `termID`, `subjectID`, `firstCA`, `secondCA`, `thirdCA`, `exams`, `total`,`subjectPosition`, `grade`, `remark`, `dateCreated`) VALUES (null,$studentID,$classID,$sessionID,$termID,$subjectID,$firstCA,$secondCA,$thirdCA,$exams,$total,'$position','$grade','$remark',CURRENT_TIMESTAMP)");
            if ($insert_query->execute()) {
                return 'inserted';
            } else {

                return 'not inserted';
            }

        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function fetchCSAssessment($cs_ID, $classID, $sessionID)
    {
        try {
            $query_cs = $this->connect->prepare("SELECT `cs_assessmentID`,`studentID`,`classID`,`sessionID`,`average`, `position`, `dateCreated` FROM `cs_assessment` WHERE `cs_assessment`.`cs_ID`=$cs_ID AND `cs_assessment`.`classID`=$classID AND `cs_assessment`.`sessionID`=$sessionID");
            if ($query_cs->execute()) {
                return $query_cs->fetchAll(PDO::FETCH_ASSOC);
            } else {
                return "not executed";
            }


        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function fetchCSTermlyAssessment($cs_ID, $classID, $sessionID, $termID)
    {
        try {
            $query_cs = $this->connect->prepare("SELECT * FROM `cs_termly_assessment` WHERE `cs_ID`=$cs_ID AND `classID`=$classID AND `sessionID`=$sessionID AND `termID`=$termID");
            if ($query_cs->execute()) {
                return $query_cs->fetchAll(PDO::FETCH_ASSOC);
            } else {
                return "not executed";
            }


        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }


    public function updateAssessmentForCS($cs_assessmentID, $studentID, $classID, $sessionID, $position): string
    {
        try {

            $insert_query = $this->connect->prepare("UPDATE `cs_assessment` SET `position`='$position',`dateCreated`=CURRENT_TIMESTAMP WHERE `cs_assessment`.`cs_assessmentID`=$cs_assessmentID AND  `cs_assessment`.`studentID`=$studentID AND `cs_assessment`.`classID`=$classID AND `cs_assessment`.`sessionID`=$sessionID");
            $insert_query->execute();

            if ($insert_query->execute()) {
                return 'updated';
            } else {
                return 'u_false';
            }


        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function updateTermlyAssessmentForCS($cs_ID, $studentID, $classID, $sessionID, $termID, $position): string
    {
        try {

            $insert_query = $this->connect->prepare("UPDATE `cs_termly_assessment` SET `position`='$position' WHERE `cs_ID`=$cs_ID AND `studentID`=$studentID AND `classID`=$classID AND `sessionID`=$sessionID AND `termID`=$termID");
            $insert_query->execute();

            if ($insert_query->execute()) {
                return 'updated';
            } else {
                return 'u_false';
            }


        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function fetch_Non_Combined_Subjects_SessionAssessment_For_A_Student($studentID, $classID, $sessionID)
    {
        try {
            $query = $this->connect->prepare("SELECT * FROM `non_combined_subjects_session_assessment` WHERE `studentID`=$studentID AND `classID`=$classID AND `sessionID`=$sessionID");
            if ($query->execute()) {
                if ($query->rowCount() > 0) {
                    return $query->fetchAll(PDO::FETCH_ASSOC);
                }
            }/* else {
                return "not executed";
            }*/


        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function fetch_Non_Combined_Subjects_Term_Assessment_For_A_Student($studentID, $classID, $sessionID, $termID)
    {
        try {
            $query = $this->connect->prepare("SELECT * FROM `non_combined_subjects_termly_assessment` WHERE `studentID`=$studentID AND `classID`=$classID AND `sessionID`=$sessionID AND `termID`=$termID");
            if ($query->execute()) {
                if ($query->rowCount() > 0) {
                    return $query->fetchAll(PDO::FETCH_ASSOC);
                }
            }


        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }


    public function multi_array_diff($arraya, $arrayb): array
    {
        foreach ($arraya as $keya => $valuea) {
            if (in_array($valuea, $arrayb)) {
                unset($arraya[$keya]);
            }
        }
        return $arraya;
    }


    public function fetchCSAssessmentForAStudent($studentID, $classID, $sessionID)
    {
        try {
            $query_cs = $this->connect->prepare("SELECT `cs_ID`, `studentID`, `classID`, `sessionID`, `subjectCount`, `termCount`, `firstTermScore`, `secondTermScore`, `thirdTermScore`, `grandTotal`, `average`, `position`, `grade`, `remark`, `dateCreated` FROM `cs_assessment` WHERE `studentID`=$studentID AND `classID`=$classID AND `sessionID`=$sessionID");
            if ($query_cs->execute()) {
                if ($query_cs->rowCount() > 0) {
                    return $query_cs->fetchAll(PDO::FETCH_ASSOC);
                } else {
                    return 0;
                }

            } else {
                return "not executed";
            }


        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function fetchCSTermlyAssessmentForAStudent($studentID, $classID, $sessionID, $termID)
    {
        try {
            $query_cs = $this->connect->prepare("SELECT * FROM `cs_termly_assessment` WHERE `studentID`=$studentID AND `classID`=$classID AND `sessionID`=$sessionID AND `termID`=$termID");
            if ($query_cs->execute()) {
                if ($query_cs->rowCount() > 0) {
                    return $query_cs->fetchAll(PDO::FETCH_ASSOC);
                }
            } else {
                return "not executed";
            }


        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

}