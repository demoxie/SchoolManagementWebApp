CREATE TABLE terms(
    termID INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    term VARCHAR(40) NOT NULL,
    sessionID INT(11) NOT NULL,
    dateCreated DATETIME NOT NULL
                  );