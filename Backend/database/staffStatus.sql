CREATE TABLE staffStatus(
                              staffStatusID INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
                              staffID VARCHAR(15) NOT NULL ,
                              classID INT(11) NOT NULL ,
                              termID INT(11) NOT NULL ,
                              sessionID INT(11) NOT NULL ,
                              status VARCHAR(40) NOT NULL,
                              dateCreated DATETIME NOT NULL
);