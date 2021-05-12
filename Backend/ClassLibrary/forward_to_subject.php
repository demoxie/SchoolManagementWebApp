<?php
require_once("../../Backend/server/Database.php");
require_once("../../Backend/ClassLibrary/Subject.php");
$connect = new Db();
$conn = $connect->getConnection();
$subjectClassObject = new Subject($conn);
//$subjectCode, $subjectName, $subjectUnit, $subjectTeacher, $departmentID
//null,'$subjectCode','$subjectName',$classID,$subjectUnit,$staffID,$departmentID,CURRENT_TIMESTAMP())
print_r($subjectClassObject->addSubject($_POST['subject_code'],$_POST['subject_name'],$_POST['subject_unit']));

?>