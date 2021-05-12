CREATE TABLE weeklyAttendance
(
    attendanceID INT(11)     NOT NULL PRIMARY KEY AUTO_INCREMENT,
    studentID INT(11) NOT NULL ,
    classID      INT(11)     NOT NULL,
    sessionID    INT(11)     NOT NULL,
    mon          INT(2)      NOT NULL,
    tues         INT(2)      NOT NULL,
    wed          INT(2)      NOT NULL,
    thurs        INT(2)      NOT NULL,
    fri          INT(2)      NOT NULL,
    sat          INT(2)      NOT NULL,
    total        INT(15)    NOT NULL,
    formMasterID INT(11) NOT NULL,
    dateTaken    DATETIME
);