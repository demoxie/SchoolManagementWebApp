CREATE TABLE sessionalAssessment(
    sessionAssessmentID INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    studentID INT(11) NOT NULL ,
    subjectID INT(11) NOT NULL ,
    classID INT(11) NOT NULL ,
    staffID INT(11) NOT NULL ,
    sessionID INT(11) NOT NULL ,
    firstTermScore DECIMAL(15) NULL,
    secondTermScore DECIMAL(15) NULL,
    thirdTermScore DECIMAL(15) NULL,
    total DECIMAL(15) NULL,
    position VARCHAR(11) NOT NULL ,
    grade VARCHAR(3) NOT NULL ,
    remark VARCHAR(40) NOT NULL,
    dateCreated DATETIME NOT NULL
);