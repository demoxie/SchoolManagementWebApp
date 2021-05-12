CREATE TABLE combinedSubjects(
  cs_ID INT(11) PRIMARY KEY AUTO_INCREMENT,
  cs_Code VARCHAR(5) NOT NULL ,
  cs_Name VARCHAR(50) NOT NULL ,
  subject1_ID INT(11) NULL,
  subject2_ID INT(11) NULL,
  subject3_ID INT(11) NULL,
  subject4_ID INT(11) NULL,
  subject5_ID INT(11) NULL,
  subject6_ID INT(11) NULL,
  subject7_ID INT(11) NULL,
  subject8_ID INT(11) NULL,
  dateCreated DATETIME
);