<?php
require("../../Backend/server/Database.php");
require_once("../../Backend/ClassLibrary/Assessment.php");
require_once("../../Backend/ClassLibrary/CodeGenerator.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $connect = new Db();
    $conn = $connect->getConnection();
    $assessmentObject = new Assessment($conn);
    function sortBySubjectFinalAverage($a, $b): bool
    {
        return $a['average'] < $b['average'];
    }
    function sortByCSAverage($a, $b): bool
    {
        return $a[11] < $b[1];
    }
    if (isset($_POST)) {
        $studentID = 0 ;
        $classID = 0;
        $sessionID = 0;
        $subjectID = 0;
        for ($i = 0; $i < count($_POST['StudentID']); $i++) {
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

            $grandTotal = $assessmentResult = $assessmentObject->computeGrandTotal($total, $studentID, $classID, $subjectID, $sessionID, $termID);
            $average = $assessmentResult = $assessmentObject->computeIndividualAverage($total, $studentID, $classID, $subjectID, $sessionID, $termID);
            $totalCA = $firstCA + $secondCA + $thirdCA;
            $term_assessment_exist = $assessmentObject->checkIfTermAssessmentExist($studentID, $subjectID, $classID, $sessionID, $termID);
            if ($term_assessment_exist >= 1) {
                $assessmentObject->updateTermlyAssessment($studentID, $sessionID, $classID, $termID, $subjectID, $firstCA, $secondCA, $thirdCA, $totalCA, $exams, $total, $grade, $position, $remark);
            } else {
                $assessmentObject->addTermlyAssessment($studentID, $sessionID, $classID, $termID, $subjectID, $firstCA, $secondCA, $thirdCA, $totalCA, $exams, $total, $grade, $position, $remark);
            }
            $exists = $assessmentObject->checkIfSessionAssessmentExist($studentID, $subjectID, $classID, $sessionID);
            if ($exists >= 1) {
                $assessmentObject->updateScoreForSession($studentID, $subjectID, $classID, $sessionID, $termID, $total, $grandTotal, $position);
            } else {
                $assessmentResult = $assessmentObject->insertScoresForSession($studentID, $subjectID, $classID, $sessionID, $termID, $total, $grandTotal, $average, $position, $grade, $remark);
            }
            if($i===count($_POST['StudentID'])-1){
                $entire_class_ass = $assessmentObject->fetch_entire_class_assessment($classID,$subjectID,$sessionID);
                usort($entire_class_ass, 'sortBySubjectFinalAverage');
                for ($n = 0; $n < count($entire_class_ass); $n++) {
                    $pos = CodeGenerator::addOrdinalSuffix($n + 1);
                    $assessmentObject->updatePosition($entire_class_ass[$n]['sessionAssessmentID'],$entire_class_ass[$n]['studentID'],$entire_class_ass[$n]['classID'],$entire_class_ass[$n]['subjectID'],$entire_class_ass[$n]['sessionID'],$pos);
                }

            }
        }



        $res_arr =$assessmentObject->fetchSessionScoreForAClass($classID,$subjectID,$sessionID);
        //print_r($res_arr);
        $finalTotal = 0;
        for ($n = 0; $n < count($res_arr); $n++) {
            $finalTotal += $res_arr[$n]['grandTotal'];
        }
        $cs_array = $assessmentObject->fetchCS();
        //print_r($cs_array);
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
                        $res = $assessmentObject->updateUncomputedCS($res_arr[$n]['studentID'],$res_arr[$n]['subjectID'],
                            $res_arr[$n]['classID'],$res_arr[$n]['sessionID'],$cs_first_term_score,$cs_second_term_score,$cs_third_term_score);
                        print_r($res);
                    }else{
                        //inserting scores for uncomputed CS
                        //print_r($cs_array[$i]['cs_ID']);
                        //print_r($res_arr[$n]['studentID']);
                        //print_r($res_arr[$n]['subjectID']);
                        //print_r($res_arr[$n]['classID']);
                        print_r($res_arr[$n]['sessionID']);
                        //print_r($cs_first_term_score);
                        //print_r($cs_second_term_score);
                        //print_r($cs_third_term_score);
                        $rez = $assessmentObject->insertAssessmenForCS($cs_array[$i]['cs_ID'],$res_arr[$n]['studentID'],$res_arr[$n]['subjectID'],$res_arr[$n]['classID'],$res_arr[$n]['sessionID'],$cs_first_term_score,$cs_second_term_score,$cs_third_term_score);
                        print_r($rez);
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

                        }
                        print_r($cs_array);
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
