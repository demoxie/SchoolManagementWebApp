CREATE TABLE cs_termly_assessment
(
    `cs_termly_assessmentID` INT(11)        NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `cs_ID`                  INT(11)        NOT NULL,
    `studentID`              INT(11)        NOT NULL,
    `subjectID`              INT(11)        NOT NULL,
    `classID`                INT(11)        NOT NULL,
    `sessionID`              INT(11)        NOT NULL,
    `subjectCount`           INT(3)         NOT NULL,
    `termCount`              INT(3)         NOT NULL,
    `firstCA`                DECIMAL(11, 0) NOT NULL,
    `secondCA`               DECIMAL(11, 0) NOT NULL,
    `thirdCA`                DECIMAL(11, 0) NOT NULL,
    `grandTotal`             DECIMAL(11, 0) NOT NULL,
    `average`                DECIMAL(11, 0) NOT NULL,
    `position`               VARCHAR(40)    NOT NULL,
    `grade`                  VARCHAR(2)     NOT NULL,
    `remark`                 VARCHAR(50),
    `dateCreated`            DATE
);