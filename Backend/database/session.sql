CREATE TABLE session(
                        sessionID INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
                        session VARCHAR(10) NOT NULL,
                        currentYear DATE NOT NULL,
                        commencementDate DATETIME,
                        endingDate DATETIME,
                        dateCreated DATETIME
);