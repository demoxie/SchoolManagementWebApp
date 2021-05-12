CREATE TABLE departments(
    departmentID INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    departmentName TEXT(40) NOT NULL ,
    HOD_ID TEXT(40) NULL ,
    dateAdded DATETIME NOT NULL
);