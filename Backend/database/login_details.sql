CREATE TABLE loginDetails(
                             loginID INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
                             username VARCHAR(15) NOT NULL,
                             password VARCHAR(40) NOT NULL,
                             roleID INT(11) NOT NULL
);