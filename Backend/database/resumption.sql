CREATE TABLE classResumption(
                           resumptionID INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
                           classID INT(11) NOT NULL ,
                           termID INT(11) NOT NULL ,
                           sessionID INT(11) NOT NULL ,
                           noOfStudents INT(10) NOT NULL,
                           noOfStaffs INT(10) NOT NULL ,
                           dateOfResumption DATETIME NOT NULL ,
                           dateExecuted DATETIME NOT NULL
);