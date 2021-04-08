<?php
//require("../../Backend/server/Database.php");
//require_once("../../Backend/ClassLibrary/Student.php");
require_once("../../Backend/ClassLibrary/Assessment.php");
require_once("../../Backend/ClassLibrary/CodeGenerator.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $connect = new Db();
    $conn = $connect->getConnection();
    $assessmentObject = new Assessment($conn);
    $classGrandTotalArr = array();
    $dataArr = array();
    $grandTotal = 0;
    $rounded_avg = 0;
    $average = 0;
    $final_total = 0;
    function getRemark($arr): string
    {

        return $arr[1];
    }

    function getGrade($arr): string
    {

        return $arr[0];
    }

    function sortByAverage($a, $b): bool
    {
        return $a[1][1] < $b[1][1];
    }

    function sortBySubjectFinalAverage($a, $b): bool
    {
        return $a['average'] < $b['average'];
    }

    if (isset($_POST['StudentID'])) {
        for ($i = 0; $i < count($_POST['StudentID']); $i++) {
            $studentID = $_POST['StudentID'][$i]['name'];
            //$total_ca = $_POST['TotalCA'][$i]['value'];
            $exams = $_POST['Exams'][$i]['value'];
            $final_total = $_POST['FinalTotal'][$i]['value'];
            $position = $_POST['Position'][$i]['value'];
            $gradeData = $assessmentObject->return_Grade_And_Remark($final_total);
            $grade = getGrade($assessmentObject->return_Grade_And_Remark($final_total));
            $remark = getRemark($assessmentObject->return_Grade_And_Remark($final_total));
            $assessmentResult = $assessmentObject->insertExamsScore($studentID, $exams, $final_total, $position, $grade, $remark, $_POST['Session'], $_POST['MyClass'], $_POST['Term'], $_POST['Subject']);
            $grandTotal = $assessmentObject->computeGrandTotal($final_total, $studentID, $_POST['MyClass'], $_POST['Subject'], $_POST['Session'], $_POST['Term']);
            $average = $assessmentObject->computeIndividualAverage($final_total, $studentID, $_POST['MyClass'], $_POST['Subject'], $_POST['Session'], $_POST['Term']);
            $rounded_avg = round($average, 2);
            $individualArr = array();
            array_push($individualArr, $rounded_avg);
            array_push($individualArr, array($studentID, $grandTotal, $_POST['Subject'], $_POST['MyClass'], $_POST['Session'], $_POST['Term'], $final_total));
            array_push($classGrandTotalArr, $individualArr);

        }

        usort($classGrandTotalArr, 'sortByAverage');
        // print_r($classGrandTotalArr[1][0]."WHY");
        for ($n = 0; $n < count($classGrandTotalArr); $n++) {
            $pos = CodeGenerator::addOrdinalNumberSuffix($n + 1);
            $score = $classGrandTotalArr[$n][0];
            $Grade = getGrade($assessmentObject->return_Grade_And_Remark($score));
            $Remark = getRemark($assessmentObject->return_Grade_And_Remark($score));
            array_push($classGrandTotalArr[$n][1], $pos, $Grade, $Remark);
            $exist = $assessmentObject->checkIfSessionAssessmentExist($classGrandTotalArr[$n][1][0], $classGrandTotalArr[$n][1][2], $classGrandTotalArr[$n][1][3], $classGrandTotalArr[$n][1][4]);
            $exist <= 0 ? $assessmentObject->insertScoresForSession($classGrandTotalArr[$n][1][0], $classGrandTotalArr[$n][1][2], $classGrandTotalArr[$n][1][3], $classGrandTotalArr[$n][1][4], $classGrandTotalArr[$n][1][5], $classGrandTotalArr[$n][1][6], $classGrandTotalArr[$n][1][1], $classGrandTotalArr[$n][0], $classGrandTotalArr[$n][1][7], $classGrandTotalArr[$n][1][8], $classGrandTotalArr[$n][1][9]) : $assessmentObject->updateScoreForSession($classGrandTotalArr[$n][1][0], $classGrandTotalArr[$n][1][2], $classGrandTotalArr[$n][1][3], $classGrandTotalArr[$n][1][4], $classGrandTotalArr[$n][1][5], $classGrandTotalArr[$n][1][6], $classGrandTotalArr[$n][1][1], $classGrandTotalArr[$n][1][7]);
            if ($n == (count($classGrandTotalArr) - 1)) {
                $processedClassArr = $assessmentObject->fetch_And_Update_Finally($_POST['MyClass'], $_POST['Subject'], $_POST['Session']);
                usort($processedClassArr, 'sortBySubjectFinalAverage');
                for ($x = 0; $x < count($processedClassArr); $x++) {
                    $final_position = CodeGenerator::addOrdinalNumberSuffix($x + 1);
                    $processedClassArr[$x][13] = $final_position;
                    $assessmentObject->updatePosition($processedClassArr[$x]['sessionAssessmentID'], $processedClassArr[$x]['studentID'], $processedClassArr[$x]['classID'], $processedClassArr[$x]['subjectID'], $processedClassArr[$x]['sessionID'], $final_position);
                }

            }
        }
    } else {
        echo 'Enter scores and click calculate before saving';
    }


} else {
    print_r("not sent");
}
?>