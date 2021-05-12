<?php
//namespace School;
require_once("../../Backend/server/Database.php");
$connect = new Db();

class School extends Db
{
    /**
     * @var
     */
    public $connect;
    public function __construct($connect){
        $this->connect=$connect;

    }


    public function checkIfRecordExists($schoolName): string
    {
        try {
            $query = $this->connect->prepare("SELECT * FROM `school_data` WHERE `schoolName`=$schoolName");
            $query->execute();
            return $query->rowCount();
        } catch (PDOException $e) {
            return $e->getMessage();
        }

    }
    public function checkIfCalendarExists($sessionID,$termID): string
    {
        try {
            $query = $this->connect->prepare("SELECT * FROM `calendar` WHERE `sessionID`=$sessionID AND `termID`=$termID");
            $query->execute();
            return $query->rowCount();
        } catch (PDOException $e) {
            return $e->getMessage();
        }

    }
    public function createSchoolData($schoolName, $schoolAddress, $schoolPhone, $schoolEmail, $schoolPostalBox, $schoolMotto, $school_logo, $headTeacherID, $headTeachersign)
    {
        $schoolID = 1;
        $row_count = $this->checkIfRecordExists($schoolID);
        if ($row_count <= 0) {

            try {
                $sql = $this->connect->prepare("INSERT INTO `school_data`(`schoolID`, `schoolName`, `schoolAddress`, `schoolPhone`, `schoolEmail`, `schoolPostalBox`, `schoolMotto`, `school_logo`, `headTeacherID`, `headTeachersign`, `dateCreated`) 
VALUES (null,'$schoolName','$schoolAddress','$schoolPhone','$schoolEmail','$schoolPostalBox','$schoolMotto','$school_logo',$headTeacherID,'$headTeachersign',CURRENT_TIMESTAMP)");
                //$sql->execute();
                if($sql->execute()){
                    return 'School data added successfully';
                }else{
                    return 'error adding data';
                }
            } catch (PDOException $e) {
                return $e->getMessage();
            }

        } else {
            return 'Record exists';
        }
    }


    public function updateSchoolData($schoolName, $schoolAddress, $schoolPhone, $schoolEmail, $schoolLogo, $schoolDateCreated, $dateCreated, $chief): string
    {
        $schoolID = 1;
        try {
            $query = $this->connect->prepare("UPDATE `school_data` SET `schoolID`=$schoolID,`schoolName`=$schoolName,`schoolAddress`=$schoolAddress,`schoolPhone`=$schoolPhone,`schoolEmail`=$schoolEmail,`school_logo`=$schoolLogo,`chief`=$chief,`dateCreated`=$dateCreated WHERE schoolID=$schoolID");
            $query->execute();
        } catch (PDOException $e) {
            return $e->getMessage();
        }


    }
    public function addHOD($department_hod): string
    {
        try{
            $query = $this->connect->prepare("INSERT INTO `HODs`(`HOD_ID`, `HOD_Name`, `DepartmentID`, `DateAdded`) VALUES (null,'$department_hod','$department_id',CURRENT_TIMESTAMP)");
            $query->execute();
            $this->fetchDepartments();

        }catch(PDOException $e){
            return $e->getMessage();
        }
    }
    public function addCalendar($sessionID,$termID,$commencement_date,$closing_date,$next_term_begins): string
    {
        try{
            if($this->checkIfCalendarExists($sessionID,$termID)>=1){
                return "Calendar Exist already";
            }else{
                $commencement = date('Y-m-d h:i:s',strtotime($commencement_date));
                $closing = date('Y-m-d h:i:s',strtotime($closing_date));
                $next_term = date('Y-m-d h:i:s',strtotime($next_term_begins));
                //print_r($closing);
                $query = $this->connect->prepare("INSERT INTO `calendar`(`calendarID`, `sessionID`, `termID`, `termBegins`, `termEnd`, `nextTermBegins`, `dateCreated`) VALUES (null,$sessionID,$termID,'$commencement','$closing','$next_term',CURRENT_TIMESTAMP)");
                if($query->execute()){
                    return 'Caledar added successfully';
                }else{
                    return 'error adding calendar';
                }
            }

        }catch(PDOException $e){
            return $e->getMessage();
        }
    }
    public function checkIfDepartmentExist($department_name, $department_hod)
    {
        try{
            $query = $this->connect->prepare("SELECT `departmentID` FROM `departments` WHERE departmentName='$department_name'");
            $query->execute();
            $result = $query->rowCount();
            if($result > 0){
                //return 'Department exist';
                return $this->fetchDepartments();
            }else{
                return $this->addDepartment($department_name, $department_hod);
            }
            //return $result['departmentID'];

        }catch(PDOException $e){
            return $e->getMessage();
        }

    }
    public function addDepartment($department_name, $department_hod)
    {
        try{
            $query = $this->connect->prepare("INSERT INTO `departments`(`departmentID`, `departmentName`, `HOD_ID`, `dateAdded`) VALUES (null,'$department_name','$department_hod',CURRENT_TIMESTAMP)");
            $query->execute();
            return $this->fetchDepartments();

        }catch(PDOException $e){
            return $e->getMessage();
        }

    }
    public function fetchDepartments()
    {
        try{
            $query = $this->connect->prepare("SELECT departmentID, departmentName,HOD_ID,dateAdded FROM `departments`");
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_ASSOC);
            return json_encode($result, JSON_PRETTY_PRINT);

        }catch(PDOException $e){
            return $e->getMessage();
        }

    }
    public function fetchCalendar()
    {
        try{
            $query = $this->connect->prepare("SELECT calendar.calendarID, session.session, terms.term, calendar.termBegins,calendar.termEnd,calendar.nextTermBegins,calendar.dateCreated
FROM ((calendar
INNER JOIN terms ON calendar.termID = terms.termID)
INNER JOIN session  ON calendar.sessionID = session.sessionID)");
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);

        }catch(PDOException $e){
            return $e->getMessage();
        }

    }
    public function updateDepartment($departmentID, $department_name, $department_hod){

    }
    public function deleteCalendar($calendarID){
        try{
            $query = $this->connect->prepare("DELETE FROM `calendar` WHERE `calendarID`=$calendarID");

            if($query->execute()){
                return 'Calendar Deleted successfully';
            }else{
                return 'Error deleting calendar!';
            }

        }catch(PDOException $e){
            return $e->getMessage();
        }
    }

}