CREATE TABLE matched_cs_termly_subjects
(
    `matched_cs_termly_subjectID` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `studentID`                   INT NOT NULL,
    `classID`                     INT NOT NULL,
    `sessionID`                   INT NOT NULL,
    `termID`                      INT NOT NULL,
    `subjectID`                   INT NOT NULL,
    `firstCA`                     DECIMAL(11, 2),
    `secondCA`                    DECIMAL(11, 2),
    `thirdCA`                     DECIMAL(11, 2),
    `exams`                       DECIMAL(11, 2),
    `total`                       DECIMAL(11, 2),
    `position`                    VARCHAR(5),
    `grade`                       VARCHAR(5),
    `remark`                      VARCHAR(15),
    `dateCreated`                 DATETIME,
    CONSTRAINT FOREIGN KEY (studentID) REFERENCES `students` (studentID),
    CONSTRAINT FOREIGN KEY (classID) REFERENCES `class` (classID),
    CONSTRAINT FOREIGN KEY (subjectID) REFERENCES `subject` (subjectID),
    CONSTRAINT FOREIGN KEY (sessionID) REFERENCES `session` (sessionID),
    CONSTRAINT FOREIGN KEY (termID) REFERENCES `terms` (termID)
) ENGINE = INNODB