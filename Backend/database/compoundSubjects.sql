CREATE TABLE compoundSubjects(
  compoundSubjectID INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  SubjectIDs VARCHAR(150) NOT NULL ,
  subjectNames TEXT(200) NOT NULL ,
  departmentID INT(11) NOT NULL ,
  cummulativeUnit INT(11) NULL ,
  adminID INT(11) NOT NULL ,
  dateCreated DATETIME NOT NULL
);