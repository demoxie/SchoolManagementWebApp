CREATE TABLE studentStatus(
    statusID INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    studentID VARCHAR(15) NOT NULL ,
    previousClassID INT(11) NOT NULL ,
    currentClassID INT(11) NOT NULL ,
    termID INT(11) NOT NULL ,
    sessionID INT(11) NOT NULL ,
    status VARCHAR(40) NOT NULL,
    dateExecuted DATETIME NOT NULL
);