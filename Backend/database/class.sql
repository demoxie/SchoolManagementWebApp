CREATE TABLE class(
  classID INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  classArm VARCHAR(2) NULL ,
  class VARCHAR(40) NOT NULL ,
  classTitle TEXT(200) NULL ,
  population INT(5) NULL,
  departmentID INT(11) NOT NULL ,
  classRepID  INT(11) NULL ,
  formMasterID INT(11) NULL ,
  dateCreated DATETIME
);