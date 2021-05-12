CREATE TABLE subject(
                        subjectID INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
                        subjectName VARCHAR(40) NOT NULL,
                        subjectUnit INT(3) NULL,
                        subjectTeacher VARCHAR(150) NULL,
                        departmentID INT(11) NOT NULL,
                        adminID INT(11) NOT NULL,
                        dateCreated DATE NOT NULL
);