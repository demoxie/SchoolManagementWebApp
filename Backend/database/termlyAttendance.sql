CREATE TABLE termlyAttendance(
                            attendanceID INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
                            admissionNO VARCHAR(40) NOT NULL ,
                            studentID INT(11) NOT NULL ,
                            classID INT(11) NOT NULL ,
                            termID INT(11) NOT NULL ,
                            sessionID INT(11) NOT NULL ,
                            noOfDaysAvailable INT(11),
                            dateTaken DATETIME
                             );