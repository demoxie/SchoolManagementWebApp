CREATE TABLE termly_assessment(
    assessmentID INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    termID INT(11) NOT NULL ,
    sessionID INT(11) NOT NULL ,
    classID INT(11) NOT NULL ,
    subjectID INT(11) NOT NULL ,
    studentID VARCHAR(11) NOT NULL ,
    firstCA DECIMAL(11) NOT NULL ,
    secondCA DECIMAL(11) NOT NULL ,
    thirdCA DECIMAL(11) NOT NULL ,
    fourthCA DECIMAL(11) NOT NULL ,
    totalCA DECIMAL(11) NOT NULL ,
    exams DECIMAL(11) NOT NULL ,
    total DECIMAL(11) NOT NULL ,
    subjectPosition VARCHAR(11) NOT NULL ,
    grade VARCHAR(2) NOT NULL ,
    remark TEXT(11) NOT NULL
);

