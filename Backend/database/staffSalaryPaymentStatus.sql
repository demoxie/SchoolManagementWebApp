CREATE TABLE staffSalaryPaymentStatus(
  paymentID INT(11) NOT NULL ,
  staffID INT(11) NOT NULL ,
  bankName VARCHAR(40) NOT NULL ,
  accountNO INT(20) NOT NULL ,
  termID INT(11) NOT NULL ,
  sessionID INT(11) NOT NULL ,
  forTheMonthOf DATE NOT NULL ,
  paymentStatus VARCHAR(15) NULL ,
  datePayed DATETIME NOT NULL ,
  dateReceived DATETIME NULL
);