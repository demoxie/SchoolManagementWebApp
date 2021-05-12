CREATE TABLE `dailyattendance`(
    `attendanceID` INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `studentID` INT(41) NOT NULL ,
    `classID` INT(11) NOT NULL ,
    `termID` INT(11) NOT NULL ,
    `sessionID` INT(11) NOT NULL ,
    `availableMorning` INT(2) NOT NULL ,
    `availableAfternoon` INT(2) NOT NULL ,
    `total` INT(11) NULL ,
    `formMasterID` VARCHAR(40) NULL ,
    `dateTaken` DATETIME
                              );