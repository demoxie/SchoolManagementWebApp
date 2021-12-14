<?php
//require( "../../Backend/server/Database.php" );
require_once("../../Backend/ClassLibrary/Assessment.php");
require_once("../../Backend/ClassLibrary/CodeGenerator.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $connect = new Db();
    $conn = $connect->getConnection();
    $assessmentObject = new Assessment($conn);
    //$subjectObject = new Subject( $connect );
    function sortBySubjectFinalAverage($a, $b): bool
    {
        return $a['average'] < $b['average'];
    }

    function sortByCSAverage($a, $b): bool
    {
        return $a[11] < $b[1];
    }

    if (isset($_POST)) {
        $studentID = 0;
        $classID = 0;
        $sessionID = 0;
        $subjectID = 0;
        //For Each Student
        for ($i = 0; $i < count($_POST['StudentID']);
             $i++) {
            $studentID = $_POST['StudentID'][$i]['name'];
            $classID = $_POST['MyClass'];
            $sessionID = $_POST['Session'];
            $subjectID = $_POST['Subject'];
            $termID = $_POST['Term'];
            $firstCA = $_POST['FirstCA'][$i]['value'];
            $secondCA = $_POST['SecondCA'][$i]['value'];
            $thirdCA = $_POST['ThirdCA'][$i]['value'];
            $exams = $_POST['Exams'][$i]['value'];
            $total = $_POST['Total'][$i]['value'];
            $position = $_POST['Position'][$i]['value'];
            $grade = $_POST['Grade'][$i]['value'];
            $remark = $_POST['Remark'][$i]['value'];

            //computing and assigning the value to grandTotal
            $grandTotal = $assessmentResult = $assessmentObject->computeGrandTotal($total, $studentID, $classID, $subjectID, $sessionID, $termID);
            ////computing and assigning the value to individualAverage
            $average = $assessmentResult = $assessmentObject->computeIndividualAverage($total, $studentID, $classID, $subjectID, $sessionID, $termID);
            $totalCA = $firstCA + $secondCA + $thirdCA;
            $term_assessment_exist = $assessmentObject->checkIfTermAssessmentExist($studentID, $subjectID, $classID, $sessionID, $termID);
            if ($term_assessment_exist >= 1) {
                $assessmentObject->updateTermlyAssessment($studentID, $sessionID, $classID, $termID, $subjectID, $firstCA, $secondCA, $thirdCA, $totalCA, $exams, $total, $grade, $position, $remark);
            } else {
                $assessmentObject->addTermlyAssessment($studentID, $sessionID, $classID, $termID, $subjectID, $firstCA, $secondCA, $thirdCA, $totalCA, $exams, $total, $grade, $position, $remark);
                ////////////////

            }
            $exists = $assessmentObject->checkIfSessionAssessmentExist($studentID, $subjectID, $classID, $sessionID);
            if ($exists >= 1) {
                $assessmentObject->updateScoreForSession($studentID, $subjectID, $classID, $sessionID, $termID, $total, $grandTotal, $position);
            } else {
                $assessmentResult = $assessmentObject->insertScoresForSession($studentID, $subjectID, $classID, $sessionID, $termID, $total, $grandTotal, $average, $position, $grade, $remark);
            }
            if ($i === count($_POST['StudentID']) - 1) {
                $entire_class_ass = $assessmentObject->fetch_entire_class_assessment($classID, $subjectID, $sessionID);
                usort($entire_class_ass, 'sortBySubjectFinalAverage');
                for ($n = 0; $n < count($entire_class_ass);
                     $n++) {
                    //Adds suffux text to position e.g 1st, 2nd etc.
                    $pos = CodeGenerator::addOrdinalSuffix($n + 1);
                    $assessmentObject->updatePosition($entire_class_ass[$n]['sessionAssessmentID'], $entire_class_ass[$n]['studentID'], $entire_class_ass[$n]['classID'], $entire_class_ass[$n]['subjectID'], $entire_class_ass[$n]['sessionID'], $pos);
                }

            }
        }

    } else {
        echo 'Enter scores and click calculate before saving';
    }
} else {
    print_r("not sent");
}
