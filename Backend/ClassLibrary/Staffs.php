<?php
require_once("../../Backend/ClassLibrary/Upload.php");
require_once("../../Backend/ClassLibrary/CodeGenerator.php");

//$connect= new Db();

class Staffs extends Db
{
    public $connect;

    public function __construct($connect)
    {
        $this->connect = $connect;

    }

    /*public function fetchStaffs($staffName)
    {
        try {
            $query = $this->connect->prepare("SELECT staffID, staffName FROM `staffs` WHERE staffName LIKE '$staffName%'");
            $query->execute();
            $staffs = $query->fetchAll(PDO::FETCH_ASSOC);
            return json_encode($staffs, JSON_PRETTY_PRINT);
        } catch (PDOException $e) {
            return Db::giveWarningAlert($e->getMessage());
        }

    }*/
    public function checkIfStaffExist($account_no, $phone, $email)
    {
        try {
            $check_staff = $this->connect->prepare("SELECT * FROM `staffs` WHERE `accountNO`=$account_no AND `phone`='$phone' AND  `email`='$email'");
            $check_staff->execute();
            return $check_staff->rowCount();
        } catch (PDOException $e) {
            return Db::giveWarningAlert($e->getMessage());
        }
    }
    public function checkIfFormMasterExist($staffID)
    {
        try {
            $check_staff = $this->connect->prepare("SELECT * FROM `formmasters` WHERE `staffID`=$staffID");
            if($check_staff->execute()) return $check_staff->rowCount();

        } catch (PDOException $e) {
            return Db::giveWarningAlert($e->getMessage());
        }
    }

    public function addStaff($staffName, $gender, $age, $date_of_birth, $religion, $maritalStatus, $healthStatus, $courseOfStudy, $accountNO, $bankName, $accountType, $state_of_origin, $lga, $address, $phone, $email, $passport)
    {
        try {
            $exist_status_no = $this->checkIfStaffExist($accountNO, $phone, $email);
            if ($exist_status_no >= 1) {
                return Parent::giveInfoAlert("Your account exist already!,refresh the page or enter details as new person!");
            } else {
                $staff_passport = Upload::uploadStaffPassort($passport);
                if (is_array($staff_passport)) {
                    print_r($staff_passport);
                } else {
                    $staffNO = CodeGenerator::createStaffNumber();
                    $add_staff_query = $this->connect->prepare("INSERT INTO `staffs`(`staffID`,`staffName`, `staffNO`, `gender`,`age`,`date_of_birth`,`religion`, `maritalStatus`, `healthStatus`, `courseOfStudy`,`bankName`, `accountNO`, `accountType`,`state_of_origin`,`lga`, `address`, `phone`, `email`,`passport`, `dateAdded`) 
VALUES (null,'$staffName', '$staffNO', '$gender',$age,'$date_of_birth','$religion','$maritalStatus','$healthStatus','$courseOfStudy','$bankName',$accountNO,'$accountType','$state_of_origin','$lga','$address','$phone','$email','$staff_passport',CURRENT_TIMESTAMP)");
                    if ($add_staff_query->execute()) {
                        return Parent::giveSuccessAlert("Application submitted successfully");
                    } else {
                        return Parent::giveSuccessAlert("Error in uploading your data");
                    }

                }

            }

        } catch (PDOException $e) {

            return Parent::giveWarningAlert($e->getMessage());
        }
    }
    public function addFormMaster($staffName,$staffID,$classID)
    {
        try {
            $exist_status_no = $this->checkIfFormMasterExist($staffID);
            if ($exist_status_no >= 1) {
                return "Form master exist already!,refresh the page or enter details as new person!";
            } else {

                    $add_formmaster_query = $this->connect->prepare("INSERT INTO `formmasters`(`formMasterID`, `formMasterName`, `staffID`, `classID`, `dateAdded`) VALUES (null,'$staffName',$staffID,$classID,CURRENT_TIMESTAMP)");
                    if ($add_formmaster_query->execute()) {
                        return $this->fetchFormMasters();
                        //return "Form Master added successfully";
                    } else {
                        return "Error occurred";
                    }
            }

        } catch (PDOException $e) {

            return Parent::giveWarningAlert($e->getMessage());
        }
    }

    public function fetchStaffs(): array
    {
        try {

            $fetch_staff_query = $this->connect->prepare("SELECT `staffID`, `staffName` FROM `staffs`");
            $fetch_staff_query->execute();
            return $fetch_staff_query->fetchAll(PDO::FETCH_ASSOC);


        } catch (PDOException $e) {

            return Parent::giveWarningAlert($e->getMessage());
        }
    }
    public function fetchFormMasters()
    {
        try {

            $fetch_staff_query = $this->connect->prepare("SELECT
    formmasters.formMasterID,
    staffs.staffName,
    CONCAT(class.class, class.classArm) AS class
FROM
    formmasters
JOIN class ON formmasters.classID = class.classID
JOIN staffs ON staffs.staffID = formmasters.staffID;");
            $fetch_staff_query->execute();
            return $fetch_staff_query->fetchAll(PDO::FETCH_ASSOC);


        } catch (PDOException $e) {

            return Parent::giveWarningAlert($e->getMessage());
        }
    }
    public function fetchAStaff($staffName)
    {
        try {

            $fetch_staff_query = $this->connect->prepare("SELECT `staffID`, `staffName` FROM `staffs` WHERE `staffName` LIKE '%$staffName%'");
            $fetch_staff_query->execute();
            return $fetch_staff_query->fetchAll(PDO::FETCH_ASSOC);


        } catch (PDOException $e) {

            return Parent::giveWarningAlert($e->getMessage());
        }
    }
    public function deleteAFormMaster($formMasterID)
    {
        try {

            $query = $this->connect->prepare("DELETE FROM `formmasters` WHERE `formMasterID`=$formMasterID");
            if($query->execute()){
                return 'Deleted successfully';
            }else{
                return 'Error unable to delete formaster';
            }

        } catch (PDOException $e) {

            return Parent::giveWarningAlert($e->getMessage());
        }
    }


}

?>