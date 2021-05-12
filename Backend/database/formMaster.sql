CREATE TABLE formMasters(
    formMasterID INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    formMasterName VARCHAR(100) NOT NULL ,
    staffID INT(11) NOT NULL ,
    classID INT(11) NOT NULL,
    dateAdded DATETIME NOT NULL
);