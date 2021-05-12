CREATE TABLE keyToInterpretationsOfGrades(
    ID INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    gradeRange VARCHAR(15) NOT NULL ,
    grade VARCHAR(3) NOT NULL ,
    remark VARCHAR(40) NOT NULL,
    dateCreated DATETIME NOT NULL
);