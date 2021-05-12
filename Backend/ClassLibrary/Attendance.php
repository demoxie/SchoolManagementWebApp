<?php
require("../../Backend/server/Database.php");
$connect = new Db();
class Attendance extends Db
{

    public $connect;


    public function __construct($connect)
    {
        $this->connect = $connect;

    }
    public function checkIfInsertBefore($studentID, $classID, $sessionID, $termID,$week,$dayID): string
    {
        try {

                    $insert_query = $this->connect->prepare("SELECT * FROM `weeklyattendance` WHERE `studentID`=$studentID AND `classID`=$classID AND `sessionID`=$sessionID AND `termID`=$termID AND `week`=$week AND `dayID`=$dayID");
                    $insert_query->execute();
                    if($insert_query->rowCount()>=1){
                        return 'true';

                    }else{
                        return 'false';
                    }


        }catch (PDOException $e){
            return $e->getMessage();
        }


    }
    public function checkIfWeeklyAttendanceInsertBefore($studentID, $classID, $sessionID, $termID,$week): string
    {
        try {

            $insert_query = $this->connect->prepare("SELECT * FROM `weeklyattendance` WHERE `studentID`=$studentID AND `classID`=$classID AND `sessionID`=$sessionID AND `termID`=$termID AND `week`=$week");
            $insert_query->execute();
            if($insert_query->rowCount()>=1){
                return 'true';

            }else{
                return 'false';
            }


        }catch (PDOException $e){
            return $e->getMessage();
        }


    }


    public function markDailyAttendance($studentID, $classID, $sessionID, $termID,$week, $attendancePoint, $dayID)
    {
        try {
            $exist = $this->checkIfInsertBefore($studentID, $classID, $sessionID, $termID,$week,$dayID);
            //echo $exist;
            if ($exist==='false'){
                switch ($dayID){
                    case 1:
                        $insert_query = $this->connect->prepare("INSERT INTO `weeklyattendance`(`attendanceID`, `studentID`, `classID`, `sessionID`,`termID`,`week`,`dayID`, `mon`,`total`, `dateTaken`) VALUES (:attendanceID,:studentID,:classID,:sessionID,:termID,:week,:dayID,:day,:total,:dateTaken)");
                        $insert_query->execute(array(':attendanceID'=>null,':studentID'=>$studentID,':classID'=>$classID,':sessionID'=>$sessionID,':termID'=>$termID,':week'=>$week,':dayID'=>$dayID,':day'=>$attendancePoint,':total'=>$attendancePoint,':dateTaken'=>date('Y-m-d h:i:s')));
                        break;
                    case 2:
                        $insert_query = $this->connect->prepare("INSERT INTO `weeklyattendance`(`attendanceID`, `studentID`, `classID`, `sessionID`,`termID`,`week`,`dayID`, `tues`,`total`, `dateTaken`) VALUES (:attendanceID,:studentID,:classID,:sessionID,:termID,:week,:dayID,:day,:total,:dateTaken)");
                        $insert_query->execute(array(':attendanceID'=>null,':studentID'=>$studentID,':classID'=>$classID,':sessionID'=>$sessionID,':termID'=>$termID,':week'=>$week,':dayID'=>$dayID,':day'=>$attendancePoint,':total'=>$attendancePoint,':dateTaken'=>date('Y-m-d h:i:s')));
                        break;
                    case 3:
                        $insert_query = $this->connect->prepare("INSERT INTO `weeklyattendance`(`attendanceID`, `studentID`, `classID`, `sessionID`,`termID`,`week`,`dayID`, `wed`,`total`, `dateTaken`) VALUES (:attendanceID,:studentID,:classID,:sessionID,:termID,:week,:dayID,:day,:total,:dateTaken)");
                        $insert_query->execute(array(':attendanceID'=>null,':studentID'=>$studentID,':classID'=>$classID,':sessionID'=>$sessionID,':termID'=>$termID,':week'=>$week,':dayID'=>$dayID,':day'=>$attendancePoint,':total'=>$attendancePoint,':dateTaken'=>date('Y-m-d h:i:s')));
                        break;
                    case 4:
                        $insert_query = $this->connect->prepare("INSERT INTO `weeklyattendance`(`attendanceID`, `studentID`, `classID`, `sessionID`,`termID`,`week`,`dayID`, `thurs`,`total`, `dateTaken`) VALUES (:attendanceID,:studentID,:classID,:sessionID,:termID,:week,:dayID,:day,:total,:dateTaken)");
                        $insert_query->execute(array(':attendanceID'=>null,':studentID'=>$studentID,':classID'=>$classID,':sessionID'=>$sessionID,':termID'=>$termID,':week'=>$week,':dayID'=>$dayID,':day'=>$attendancePoint,':total'=>$attendancePoint,':dateTaken'=>date('Y-m-d h:i:s')));
                        break;
                    case 5:
                        $insert_query = $this->connect->prepare("INSERT INTO `weeklyattendance`(`attendanceID`, `studentID`, `classID`, `sessionID`,`termID`,`week`,`dayID`, `fri`,`total`, `dateTaken`) VALUES (:attendanceID,:studentID,:classID,:sessionID,:termID,:week,:dayID,:day,:total,:dateTaken)");
                        $insert_query->execute(array(':attendanceID'=>null,':studentID'=>$studentID,':classID'=>$classID,':sessionID'=>$sessionID,':termID'=>$termID,':week'=>$week,':dayID'=>$dayID,':day'=>$attendancePoint,':total'=>$attendancePoint,':dateTaken'=>date('Y-m-d h:i:s')));
                        break;
                    default:
                        $insert_query = $this->connect->prepare("INSERT INTO `weeklyattendance`(`attendanceID`, `studentID`, `classID`, `sessionID`,`termID`,`week`,`dayID`, `sat`,`total`, `dateTaken`) VALUES (:attendanceID,:studentID,:classID,:sessionID,:termID,:week,:dayID,:day,:total,:dateTaken)");
                        $insert_query->execute(array(':attendanceID'=>null,':studentID'=>$studentID,':classID'=>$classID,':sessionID'=>$sessionID,':termID'=>$termID,':week'=>$week,':dayID'=>$dayID,':day'=>$attendancePoint,':total'=>$attendancePoint,':dateTaken'=>date('Y-m-d h:i:s')));
                        break;
                }
            }else{
                $this->updateDailyAttendance($studentID, $classID, $sessionID, $termID,$week, $attendancePoint, $dayID);
            }


        }catch (PDOException $e){
            return $e->getMessage();
        }


    }
    public function markWeeklyAttendance($studentID, $classID, $sessionID, $termID, $week,$mon,$tues,$wed,$thurs,$fri, $total)
    {
        try {
            $exist = $this->checkIfWeeklyAttendanceInsertBefore($studentID, $classID, $sessionID, $termID,$week);
            if ($exist==='false'){

                $insert_query = $this->connect->prepare("INSERT INTO `weeklyattendance`(`attendanceID`,`studentID`, `classID`, `sessionID`, `termID`, `week`, `mon`, `tues`, `wed`, `thurs`, `fri`, `total`, `dateTaken`) VALUES (:attendanceID,:studentID,:classID,:sessionID,:termID,:week,:mon,:tues,:wed,:thurs,:fri,:total,:dateTaken)");
                echo $insert_query->execute(array(':attendanceID'=>null,':studentID'=>$studentID,':classID'=>$classID,':sessionID'=>$sessionID,':termID'=>$termID,':week'=>$week,':mon'=>$mon,':tues'=>$tues,':wed'=>$wed,':thurs'=>$thurs,':fri'=>$fri,':total'=>$total,':dateTaken'=>date('Y-m-d h:i:s')));
                //return $studentID." ".$classID." ".$sessionID." ".$termID." ".$week." ".$mon." ".$tues." ".$wed." ".$thurs." ".$fri." ".$total;
                //return date('Y-m-d h:i:s');


            }else{
                $this->updateWeeklyAttendance($studentID, $classID, $sessionID, $termID, $week,$mon,$tues,$wed,$thurs,$fri, $total);
            }


        }catch (PDOException $e){
            return $e->getMessage();
        }


    }
    public function updateDailyAttendance($studentID, $classID, $sessionID, $termID,$week, $attendancePoint, $dayID)
    {
        try {
            $fetch = $this->connect->prepare("SELECT `mon`,`tues`,`wed`,`thurs`,`fri` FROM `weeklyattendance` WHERE `studentID`=$studentID AND `classID`=$classID AND `sessionID`=$sessionID AND `termID`=$termID AND  `dayID`=$dayID");
            $fetch->execute();
            $row = $fetch->fetch(PDO::FETCH_ASSOC);
            $atted_total = $row['mon'] + $row['tues'] + $row['wed'] + $row['thurs'] + $row['fri']+$attendancePoint;


            switch ($dayID){
                case 1:
                    $insert_query = $this->connect->prepare("UPDATE `weeklyattendance` SET `mon`=$attendancePoint,`week`=$week,`total`=$atted_total `dateTaken`=CURRENT_TIMESTAMP WHERE `studentID`=$studentID AND `classID`=$classID AND `sessionID`=$sessionID AND `termID`=$termID AND `dayID`=$dayID");
                    echo $insert_query->execute();
                    break;
                case 2:
                    $insert_query = $this->connect->prepare("UPDATE `weeklyattendance` SET `tues`=$attendancePoint,`week`=$week,`total`=$atted_total, `dateTaken`=CURRENT_TIMESTAMP WHERE `studentID`=$studentID AND `classID`=$classID AND `sessionID`=$sessionID AND `termID`=$termID AND `dayID`=$dayID");
                    echo $insert_query->execute();
                    break;
                case 3:
                    $insert_query = $this->connect->prepare("UPDATE `weeklyattendance` SET `wed`=$attendancePoint,`week`=$week,`total`=$atted_total, `dateTaken`=CURRENT_TIMESTAMP WHERE `studentID`=$studentID AND `classID`=$classID AND `sessionID`=$sessionID AND `termID`=$termID AND `dayID`=$dayID");
                    echo $insert_query->execute();
                    break;
                case 4:
                    $insert_query = $this->connect->prepare("UPDATE `weeklyattendance` SET `thurs`=$attendancePoint,`week`=$week,`total`=$atted_total, `dateTaken`=CURRENT_TIMESTAMP WHERE `studentID`=$studentID AND `classID`=$classID AND `sessionID`=$sessionID AND `termID`=$termID AND `dayID`=$dayID");
                    echo $insert_query->execute();
                    break;
                case 5:
                    $insert_query = $this->connect->prepare("UPDATE `weeklyattendance` SET `fri`=$attendancePoint,`week`=$week,`total`=$atted_total, `dateTaken`=CURRENT_TIMESTAMP WHERE `studentID`=$studentID AND `classID`=$classID AND `sessionID`=$sessionID AND `termID`=$termID AND `dayID`=$dayID");
                    echo $insert_query->execute();
                    break;
                default:
                    $insert_query = $this->connect->prepare("UPDATE `weeklyattendance` SET `sat`=$attendancePoint,`week`=$week,`total`=$atted_total, `dateTaken`=CURRENT_TIMESTAMP WHERE `studentID`=$studentID AND `classID`=$classID AND `sessionID`=$sessionID AND `termID`=$termID AND `dayID`=$dayID");
                    echo $insert_query->execute();
                    break;
            }

        }catch (PDOException $e){
            return $e->getMessage();
        }


    }
    public function updateWeeklyAttendance($studentID, $classID, $termID, $sessionID, $week,$mon,$tues,$wed,$thurs,$fri, $total)
    {
        try {

                    $insert_query = $this->connect->prepare("UPDATE `weeklyattendance` SET `week`=$week,`mon`=$mon,`tues`=$tues,`wed`=$wed,`thurs`=$thurs,`fri`=$fri,`total`=$total,`dateTaken`=CURRENT_TIMESTAMP WHERE `studentID`=$studentID AND `classID`=$classID AND `sessionID`=$sessionID AND `termID`=$termID AND `week`=$week");
                    $insert_query->execute();
                    $fetch = $this->connect->prepare("SELECT `mon`,`tues`,`wed`,`thurs`,`fri` FROM `weeklyattendance` WHERE `studentID`=$studentID AND `classID`=$classID AND `sessionID`=$sessionID AND `termID`=$termID AND `week`=$week");
                    $fetch->execute();
                    $row = $fetch->fetch(PDO::FETCH_ASSOC);
                    $atted_total = $row['mon'] + $row['tues'] + $row['wed'] + $row['thurs'] + $row['fri'];
                    $insert_query = $this->connect->prepare("UPDATE `weeklyattendance` SET `total`=$atted_total,`dateTaken`=CURRENT_TIMESTAMP WHERE `studentID`=$studentID AND `classID`=$classID AND `sessionID`=$sessionID AND `termID`=$termID AND `week`=$week");
                    echo $insert_query->execute();

        }catch (PDOException $e){
            return $e->getMessage();
        }


    }



    public function viewDailyAttendance($dailyAttendance, $classID)
    {

    }

    public function viewWeeklyAttendance($weeklyAttendanceID, $classID)
    {

    }

    public function viewTermlyAttendance($classID)
    {

    }
    /*public function whichDayIsIt($dayID){
        switch ($dayID){
            case 1: return 'Mon';
        }
    }*/


}