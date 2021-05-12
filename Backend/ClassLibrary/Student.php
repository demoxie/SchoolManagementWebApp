<?php

require_once("../../Backend/ClassLibrary/Upload.php");
require_once("../../Backend/ClassLibrary/CodeGenerator.php");

//$connect = new Db();

class Student extends Db
{


    public $connect;

    public function __construct($connect)
    {

        $this->connect = $connect;

    }


    public function checkStudentStatus($admissionNO)
    {
        try {
            $sql = $this->connect->prepare("SELECT students.name,students.admissionNO,students.studentID,students.passport,studentstatus.status,studentstatus.currentClassID
FROM students
INNER JOIN studentstatus ON students.studentID = studentstatus.studentID AND students.admissionNO='$admissionNO'");
            $sql->execute();
            if ($sql->rowCount() >= 1) {
                return $sql->fetch(PDO::FETCH_ASSOC);
            } else {
                return 'false';
            }


        } catch (PDOException $e) {

            return $e->getMessage();
        }
    }


    public
    function checkIfStudentExists($guardianEmail, $guardianPhone)
    {
        try {
            $sql = $this->connect->prepare("SELECT `guardianEmail`,`guardianPhone` FROM `students` WHERE `guardianEmail`='$guardianEmail' AND `guardianPhone` ='$guardianPhone';");
            $sql->execute();
            if ($sql->rowCount() > 0) {
                return true;
            } else {
                return false;
            }

        } catch (PDOException $e) {

            return $e->getMessage();
        }
    }

    public
    function verifyRegistrationCode($reg_code)
    {
        try {
            $sql = $this->connect->prepare("SELECT `registrationCode` FROM `students` WHERE `registrationCode`='$reg_code'");
            $sql->execute();
            if ($sql->rowCount() > 0) {
                $result = $sql->fetch(PDO::FETCH_ASSOC);
                if (empty($result['registrationCode']) | $result['registrationCode'] === 0) {
                    return $result['registrationCode'];
                } else {

                    $sql = $this->connect->prepare("SELECT `presentClass` FROM `students` WHERE `registrationCode`='$reg_code'");
                    $sql->execute();
                    $result = $sql->fetch(PDO::FETCH_ASSOC);
                    $adm_no = CodeGenerator::createAdmissionNO($result['presentClass']);
                    $currentYear = date('Y');
                    $sql_ins = $this->connect->prepare("UPDATE `students` SET `admissionNO`='$adm_no',`applicationStatus`='Approved',`yearApproved`='$currentYear' WHERE `registrationCode`='$reg_code'");
                    $sql_ins->execute();
                    return $adm_no;
                }
            }

        } catch (PDOException $e) {

            return $e->getMessage();
        }
    }

    public
    function registerStudent($stud_first, $stud_mid_name, $stud_last_name, $dateOfBirth, $gender, $healthStatus, $passport, $lastSchoolAttended, $lastClass, $presentClass, $position, $guardianOfficeAddress, $guardianEmail, $guardianPhone, $guardianPostal, $guardianResidentAddress, $stateOfOrigin, $l_g_a, $religion, $denomination, $emotionalBehavior, $socialBehavior, $spiritualBehavior, $dateApplied, $guardianFirstName, $guardianMidName, $guardianLastName)
    {
        try {

            $studentName = $stud_first . " " . $stud_mid_name . " " . $stud_last_name;
            $guardianName = $guardianFirstName . " " . $guardianMidName . " " . $guardianLastName;
            if ($this->checkIfStudentExists($guardianEmail, $guardianPhone) === false) {

                $stud_passport = Upload::uplaodStudentPassort($passport);
                if (is_array($stud_passport)) {
                    print_r($stud_passport);
                } else {
                    $studentID = null;
                    $age = CodeGenerator::getAge($dateOfBirth);
                    $registrationCode = CodeGenerator::applicationCode();
                    $sql = $this->connect->prepare('INSERT INTO `students`(`studentID`, `name`, `dateOfBirth`, `gender`, `healthStatus`,
                       `age_as_at_last_Birthday`,`passport`, `nameOfLastSchoolAttended`, `lastClass`, `presentClass`,
                       `positionObtained`, `guardianName`, `guardianOfficeAddress`, `guardianEmail`, `guardianPhone`,
                       `guardianPostalAddress`, `guardianResidentialAddress`, `stateOfOrigin`, `l_g_a`, `religion`, `Denomination`,
                       `emotionalBehavior`, `socialBehavior`, `spiritualBehavior`,`registrationCode`,`dateApplied`)
                        VALUES (:studentID, :studentName,:dateOfBirth, :gender,:healthStatus,:age,:passport,
                                :lastSchoolAttended,:lastClass,:presentClass,:position,:guardianName,:guardianOfficeAddress,
                                :guardianEmail,:guardianPhone, :guardianPostalAddress,:guardianResidentialAddress,
                                :stateOfOrigin, :l_g_a, :religion, :denomination, :emotionalBehavior,:socialBehavior,
                                :spiritualBehavior, :registrationCode,:dateApplied)');
                    $sql->bindParam(':studentID', $studentID);
                    $sql->bindParam(':studentName', $studentName);
                    $sql->bindParam(':dateOfBirth', $dateOfBirth);
                    $sql->bindParam(':gender', $gender);
                    $sql->bindParam(':healthStatus', $healthStatus);
                    $sql->bindParam(':age', $age);
                    $sql->bindParam(':passport', $stud_passport);
                    $sql->bindParam(':lastSchoolAttended', $lastSchoolAttended);
                    $sql->bindParam(':lastClass', $lastClass);
                    $sql->bindParam(':presentClass', $presentClass);
                    $sql->bindParam(':position', $position);
                    $sql->bindParam(':guardianName', $guardianName);
                    $sql->bindParam(':guardianOfficeAddress', $guardianOfficeAddress);
                    $sql->bindParam(':guardianEmail', $guardianEmail);
                    $sql->bindParam(':guardianPhone', $guardianPhone);
                    $sql->bindParam(':guardianPostalAddress', $guardianPostal);
                    $sql->bindParam(':guardianResidentialAddress', $guardianResidentAddress);
                    $sql->bindParam(':stateOfOrigin', $stateOfOrigin);
                    $sql->bindParam(':l_g_a', $l_g_a);
                    $sql->bindParam(':religion', $religion);
                    $sql->bindParam(':denomination', $denomination);
                    $sql->bindParam(':emotionalBehavior', $emotionalBehavior);
                    $sql->bindParam(':socialBehavior', $socialBehavior);
                    $sql->bindParam(':spiritualBehavior', $spiritualBehavior);
                    $sql->bindParam(':registrationCode', $registrationCode);
                    $sql->bindParam(':dateApplied', $dateApplied);
                    $sql->execute();
                    return Db::giveSuccessAlert('Application submitted successfully');

                }

            } else {
                return Db::giveWarningAlert("You've submitted an application before");
            }

        } catch (PDOException $e) {
            return Db::giveDangerAlert($e->getMessage());
        }
    }

    public
    function fetchStudentCurrentStatusList($class_id, $session_id)
    {
        try {
            if ($class_id !== null && $session_id !== null) {
                $query = $this->connect->prepare("SELECT `name`, `studentID`,`admissionNO` FROM `students` WHERE `studentID` IN (SELECT `studentID` FROM `studentstatus` WHERE `currentClassID`= $class_id AND `sessionID`=$session_id AND `status` LIKE 'Prom%' OR `status` LIKE 'Admi%' OR `status` LIKE 'Dem%')");
                $query->execute();
                $result = $query->fetchAll(PDO::FETCH_ASSOC);
                return json_encode($result, JSON_PRETTY_PRINT);
            } elseif ($session_id === null && $class_id !== null) {
                $query = $this->connect->prepare("SELECT `name`, `studentID`,`admissionNO` FROM `students` WHERE `studentID` IN (SELECT `studentID` FROM `studentstatus` WHERE `classID`=$class_id AND `status` LIKE 'Prom%' OR `status` LIKE 'Admi%' OR `status` LIKE 'Dem%')");
                $query->execute();
                $result = $query->fetchAll(PDO::FETCH_ASSOC);
                return json_encode($result, JSON_PRETTY_PRINT);
            } else {
                $query = $this->connect->prepare("SELECT `name`, `studentID`,`admissionNO` FROM `students` WHERE `studentID` IN (SELECT `studentID` FROM `studentstatus` WHERE `sessionID`= $session_id AND `status` LIKE 'Prom%' OR `status` LIKE 'Admi%' OR `status` LIKE 'Dem%')");
                $query->execute();
                $result = $query->fetchAll(PDO::FETCH_ASSOC);
                return json_encode($result, JSON_PRETTY_PRINT);
            }


        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public
    function fetchStudentByClass($class_id)
    {
        try {

            $query = $this->connect->prepare("SELECT students.studentID,students.name, students.admissionNO, students.gender, CONCAT(class.class,class.classArm) AS class,studentstatus.Status,students.passport,students.dateOfBirth,students.dateApplied,students.guardianPhone
FROM ((students
INNER JOIN studentstatus ON students.studentID = studentstatus.studentID)
INNER JOIN class ON studentstatus.currentClassID = class.classID AND studentstatus.currentClassID=$class_id)");
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_ASSOC);
            return json_encode($result, JSON_PRETTY_PRINT);
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    function searchForStudentByKeyword($keyword)
    {
        try {

            $query = $this->connect->prepare("SELECT students.studentID,students.name FROM students WHERE students.name LIKE '%$keyword%'");
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_ASSOC);
            return json_encode($result, JSON_PRETTY_PRINT);
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public
    function fetchStudentBySession($session_id)
    {
        try {

            $query = $this->connect->prepare("SELECT students.studentID,students.name, students.admissionNO, students.gender, CONCAT(class.class,class.classArm) AS class,studentstatus.Status,students.passport,students.dateOfBirth,students.dateApplied,students.guardianPhone
FROM ((students
INNER JOIN studentstatus ON students.studentID = studentstatus.studentID)
INNER JOIN class ON studentstatus.currentClassID = class.classID AND studentstatus.sessionID=$session_id)");
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_ASSOC);
            return json_encode($result, JSON_PRETTY_PRINT);
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public
    function fetchAllStudent()
    {
        try {
            $query = $this->connect->prepare("SELECT students.studentID,students.name, students.AdmissionNO, students.gender, CONCAT(class.class,class.classArm) AS class,studentstatus.Status,students.passport,students.dateOfBirth,students.dateApplied,students.guardianPhone
FROM ((students
INNER JOIN studentstatus ON students.studentID = studentstatus.studentID)
INNER JOIN class ON studentstatus.currentClassID = class.classID)");
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_ASSOC);
            return json_encode($result, JSON_PRETTY_PRINT);

        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
    function fetchStudentStatus()
    {
        try {
            $query = $this->connect->prepare("SELECT
    students.studentID,
    students.name,
    CONCAT(class.class, class.classArm) AS currentClass,
    studentstatus.Status,studentstatus.previousClassID
FROM
    (
        students
    JOIN studentstatus ON students.studentID = studentstatus.studentID
    JOIN class ON studentstatus.currentClassID = class.classID
    )");
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_ASSOC);
            for ($i = 0;$i<count($result); $i++){
                $previousClassID = $result[$i]['previousClassID'];
                $fetch_previous_class_query = $this->connect->prepare("SELECT CONCAT(class.class,class.classArm) AS previousClass  FROM class WHERE class.classID=$previousClassID");
                $fetch_previous_class_query->execute();
                $val = $fetch_previous_class_query->fetch(PDO::FETCH_ASSOC);
                //return $val;
                //return json_encode($val,JSON_PRETTY_PRINT);
                array_push($result[$i],$val);
            }
           return json_encode($result, JSON_PRETTY_PRINT);

        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
    function fetchStudentStatusByClass($classID)
    {
        try {
            $query = $this->connect->prepare("SELECT
    students.studentID,
    students.name,
    CONCAT(class.class, class.classArm) AS currentClass,
    studentstatus.Status,studentstatus.previousClassID
FROM
    (
        students
    JOIN studentstatus ON students.studentID = studentstatus.studentID AND studentstatus.currentClassID=$classID
    JOIN class ON studentstatus.currentClassID = class.classID
    )");
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_ASSOC);
            for ($i = 0;$i<count($result); $i++){
                $previousClassID = $result[$i]['previousClassID'];
                $fetch_previous_class_query = $this->connect->prepare("SELECT CONCAT(class.class,class.classArm) AS previousClass  FROM class WHERE class.classID=$previousClassID");
                $fetch_previous_class_query->execute();
                $val = $fetch_previous_class_query->fetch(PDO::FETCH_ASSOC);
                //return $val;
                //return json_encode($val,JSON_PRETTY_PRINT);
                array_push($result[$i],$val);
            }
            return json_encode($result, JSON_PRETTY_PRINT);

        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
    function fetchStudentStatusBySession($sessionID)
    {
        try {
            $query = $this->connect->prepare("SELECT
    students.studentID,
    students.name,
    CONCAT(class.class, class.classArm) AS currentClass,
    studentstatus.Status,studentstatus.previousClassID
FROM
    (
        students
    JOIN studentstatus ON students.studentID = studentstatus.studentID AND studentstatus.sessionID=$sessionID
    JOIN class ON studentstatus.currentClassID = class.classID
    )");
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_ASSOC);
            for ($i = 0;$i<count($result); $i++){
                $previousClassID = $result[$i]['previousClassID'];
                $fetch_previous_class_query = $this->connect->prepare("SELECT CONCAT(class.class,class.classArm) AS previousClass  FROM class WHERE class.classID=$previousClassID");
                $fetch_previous_class_query->execute();
                $val = $fetch_previous_class_query->fetch(PDO::FETCH_ASSOC);
                //return $val;
                //return json_encode($val,JSON_PRETTY_PRINT);
                array_push($result[$i],$val);
            }
            return json_encode($result, JSON_PRETTY_PRINT);

        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
    function fetchStudentStatusByClassAndSession($classID,$sessionID)
    {
        try {
            $query = $this->connect->prepare("SELECT
    students.studentID,
    students.name,
    CONCAT(class.class, class.classArm) AS currentClass,
    studentstatus.Status,studentstatus.previousClassID
FROM
    (
        students
    JOIN studentstatus ON students.studentID = studentstatus.studentID AND studentstatus.currentClassID=$classID AND studentstatus.sessionID=$sessionID
    JOIN class ON studentstatus.currentClassID = class.classID
    )");
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_ASSOC);
            for ($i = 0;$i<count($result); $i++){
                $previousClassID = $result[$i]['previousClassID'];
                $fetch_previous_class_query = $this->connect->prepare("SELECT CONCAT(class.class,class.classArm) AS previousClass  FROM class WHERE class.classID=$previousClassID");
                $fetch_previous_class_query->execute();
                $val = $fetch_previous_class_query->fetch(PDO::FETCH_ASSOC);
                //return $val;
                //return json_encode($val,JSON_PRETTY_PRINT);
                array_push($result[$i],$val);
            }
            return json_encode($result, JSON_PRETTY_PRINT);

        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public
    function fetchAStudent($studentID)
    {
        try {
            $query = $this->connect->prepare("SELECT students.studentID,students.name, students.admissionNO, students.gender, CONCAT(class.class,class.classArm) AS class,studentstatus.Status,students.passport,students.dateOfBirth,students.religion,students.stateOfOrigin,students.l_g_a,students.guardianName,students.guardianEmail,students.guardianResidentialAddress,students.guardianPhone,students.yearApproved,students.dateApplied FROM ((students
INNER JOIN studentstatus ON students.studentID = studentstatus.studentID AND students.studentID=$studentID)
INNER JOIN class ON studentstatus.currentClassID = class.classID)");
            $query->execute();
            $result = $query->fetch(PDO::FETCH_ASSOC);
            $result['passport'] = '<img src="../../../Backend/Src/uploads/students/' . $result['passport'] . '" 
            alt="pics" id="passport" height="170" width="170"   class="rounded-circle" style="border: 2px solid black;padding: 3px">';
            return json_encode($result, JSON_PRETTY_PRINT);

        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public
    function updateStudentRecord($studentID, $studentName, $gender, $dateOfBirth, $p_address, $yearAdmitted, $admissionNO, $class, $religion, $stateOfOrigin, $lga, $p_name, $p_phone, $p_email)
    {

        $date = date_create($dateOfBirth);
        $d = date_format($date, "Y-m-d");
        try {
            $query = $this->connect->prepare("UPDATE `students` SET `studentID`=$studentID,`name`='$studentName',`dateOfBirth`='$d',`gender`='$gender',`guardianName`='$p_name',`guardianEmail`='$p_email',`guardianPhone`='$p_phone',`guardianResidentialAddress`='$p_address',`stateOfOrigin`='$stateOfOrigin',`l_g_a`='$lga',`religion`='$religion',`admissionNO`='$admissionNO',`yearApproved`='$yearAdmitted' WHERE studentID=$studentID");
            $query->execute();
            return 'Profile Update successfully';
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public
    function deleteStudentRecord($studentID)
    {
        try {
            $query = $this->connect->prepare("DELETE FROM `students` WHERE studentID=$studentID");
            $query->execute();
            return "Student Data Deleted Successfully";
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

}