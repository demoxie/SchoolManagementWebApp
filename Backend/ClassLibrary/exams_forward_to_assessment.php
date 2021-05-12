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
    function sortByCSAverage($a, $b): bool
    {
        return $a[11] < $b[1];
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
        $result_query = $assessmentObject->connect->prepare("SELECT `studentID`,`subjectID`,`classID`,`sessionID`,`termCount`,`firstTermScore`, `secondTermScore`, `thirdTermScore`, `grandTotal`,`average`, `position`, `grade`, `remark` FROM `sessionalassessment`");
        $result_query->execute();
        $res_arr = $result_query->fetchAll(PDO::FETCH_ASSOC);
        $finalTotal = 0;
        for ($n = 0; $n < count($res_arr); $n++) {
            $finalTotal += $res_arr[$n]['grandTotal'];
        }
        $query_cs = $assessmentObject->connect->prepare("SELECT `cs_Code`, `cs_Name`, `subject1_ID`, `subject2_ID`, `subject3_ID`, `subject4_ID`, `subject5_ID`, `subject6_ID`, `subject7_ID`, `subject8_ID` FROM `combinedsubjects`");
        $query_cs->execute();
        $cs_array = $query_cs->fetchAll(PDO::FETCH_ASSOC);
        $cs_first_term_score = 0;
        $cs_second_term_score = 0;
        $cs_third_term_score = 0;
        $cs_name = '';
        $no_of_subjects_matched = 0;
        $total_no_of_matched_subjects = 0;
        $no_of_subjects = count($res_arr);
        $final_no_subjects = 0;
        $termCountForEachIndividual = array();
        $pos = array();
        $no_of_cs = count($cs_array);
        for ($n = 0; $n < count($classGrandTotalArr); $n++) {
            $pos = CodeGenerator::addOrdinalSuffix($n + 1);
            $score = $classGrandTotalArr[$n][0];
            $Grade = getGrade($assessmentObject->return_Grade_And_Remark($score));
            $Remark = getRemark($assessmentObject->return_Grade_And_Remark($score));
            array_push($classGrandTotalArr[$n][1], $pos, $Grade, $Remark);
            $exist = $assessmentObject->checkIfSessionAssessmentExist($classGrandTotalArr[$n][1][0], $classGrandTotalArr[$n][1][2], $classGrandTotalArr[$n][1][3], $classGrandTotalArr[$n][1][4]);
            $exist <= 0 ? $assessmentObject->insertScoresForSession($classGrandTotalArr[$n][1][0], $classGrandTotalArr[$n][1][2], $classGrandTotalArr[$n][1][3], $classGrandTotalArr[$n][1][4], $classGrandTotalArr[$n][1][5], $classGrandTotalArr[$n][1][6], $classGrandTotalArr[$n][1][1], $classGrandTotalArr[$n][0], $classGrandTotalArr[$n][1][7], $classGrandTotalArr[$n][1][8], $classGrandTotalArr[$n][1][9]) : $assessmentObject->updateScoreForSession($classGrandTotalArr[$n][1][0], $classGrandTotalArr[$n][1][2], $classGrandTotalArr[$n][1][3], $classGrandTotalArr[$n][1][4], $classGrandTotalArr[$n][1][5], $classGrandTotalArr[$n][1][6], $classGrandTotalArr[$n][1][1], $classGrandTotalArr[$n][1][7]);

            if ($n == (count($classGrandTotalArr) - 1)) {
                $processedClassArr = $assessmentObject->fetch_entire_class_assessment($_POST['MyClass'], $_POST['Subject'], $_POST['Session']);
                usort($processedClassArr, 'sortBySubjectFinalAverage');
                for ($x = 0; $x < count($processedClassArr); $x++) {
                    $final_position = CodeGenerator::addOrdinalSuffix($x + 1);
                    $processedClassArr[$x][13] = $final_position;
                    $assessmentObject->updatePosition($processedClassArr[$x]['sessionAssessmentID'], $processedClassArr[$x]['studentID'], $processedClassArr[$x]['classID'], $processedClassArr[$x]['subjectID'], $processedClassArr[$x]['sessionID'], $final_position);
                }

            }
        }
        //Checking if a subject is part of the CS subjects
        //this for loop fetches cs subject to be checked
        for ($i = 0; $i < $no_of_cs; $i++) {
            for ($n = 0; $n < $no_of_subjects; $n++) {
                //Checking if subjects are part of CS subjects
                if ($n !== $no_of_subjects && in_array($res_arr[$n]['subjectID'], $cs_array[$i])) {
                    $no_of_subjects_matched++;
                    $cs_name = $cs_array[$i]['cs_Name'];
                    $cs_first_term_score += $res_arr[$n]['firstTermScore'];
                    $cs_second_term_score += $res_arr[$n]['secondTermScore'];
                    $cs_third_term_score += $res_arr[$n]['thirdTermScore'];
                    array_push($termCountForEachIndividual,$res_arr[$n]['termCount']);
                    //$studentID, $subjectID, $classID, $sessionID, $termID, $termScore
                    $ex = $assessmentObject->checkIfCSAssementExistForAnIndividual($res_arr[$n]['studentID'],$res_arr[$n]['subjectID'],
                        $res_arr[$n]['classID'],$res_arr[$n]['sessionID']);
                    if($ex>=1){
                        //Updating uncomputed scores for CS
                        $assessmentObject->updateUncomputedCS($res_arr[$n]['studentID'],$res_arr[$n]['subjectID'],
                            $res_arr[$n]['classID'],$res_arr[$n]['sessionID'],$cs_first_term_score,$cs_second_term_score,$cs_third_term_score);
                    }else{
                        //inserting scores for uncomputed CS
                        $assessmentObject->insertAssessmenForCS($cs_array[$i]['cs_assessmentID'],$res_arr[$n]['studentID'],$res_arr[$n]['subjectID'],
                            $res_arr[$n]['classID'],$res_arr[$n]['sessionID'],$res_arr[$n]['termID'],$cs_first_term_score,
                            $cs_second_term_score,$cs_third_term_score);
                    }

                } else {
                    $final_no_subjects++;
                }

            }
            if ($n === ($no_of_subjects - 1)) {
                $cs_arr = $assessmentObject->fetchAssessmenForCS();
                $total_no_of_matched_subjects += $no_of_subjects_matched;
                $no_of_subjects_matched = 0;
                $cs_first_term_score = 0;
                $cs_second_term_score = 0;
                $cs_third_term_score = 0;
                for ($n = 0; $n < count($cs_arr); $n++) {
                    $grand_total = ($cs_arr[$n]['firstTermScore'] + $cs_arr[$n]['secondTermScore'] + $cs_arr[$n]['thirdTermScore']) / $cs_arr[$n]['subjectCount'];
                    $avr = $grand_total / $assessmentObject->fetchTermCount($cs_arr[$n]['studentID'], $cs_arr[$n]['subjectID'],
                            $cs_arr[$n]['classID'], $cs_arr[$n]['sessionID']);
                    $cs_grade = $assessmentObject->getGrade($assessmentObject->return_Grade_And_Remark($avr));
                    $cs_remark = $assessmentObject->getRemark($assessmentObject->return_Grade_And_Remark($avr));
                    array_push($cs_arr[$n], $grand_total, $avr, $cs_grade, $cs_remark);
                    if($n===count($cs_arr)-1){
                        usort($cs_arr, 'sortByCSAverage');
                        for($j=0;$j<count($cs_arr);$j++){
                            $position= CodeGenerator::addOrdinalSuffix($j+1);
                            $res = $assessmentObject->updateAssessmenForCS($cs_arr[$n]['cs_assessmentID'], $cs_arr[$n]['studentID'],
                                $cs_arr[$n]['subjectID'], $cs_arr[$n]['classID'], $cs_arr[$n]['sessionID'], $cs_arr[$n]['grandTotal'],
                                $cs_arr[$n]['average'], $position, $cs_arr[$n]['grade'], $cs_arr[$n]['remark']);
                            print_r($cs_arr);
                        }
                    }

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