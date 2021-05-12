CREATE TABLE feePaymentStatus(
  paymentID INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  receptNO VARCHAR(100) NOT NULL ,
  bankName VARCHAR(11) NOT NULL ,
  accountNO INT(15) NOT NULL ,
  amount DECIMAL(65) NOT NULL ,
  payersName TEXT(40) NOT NULL ,
  phone VARCHAR(15) NOT NULL ,
  paymentStatus VARCHAR(15) NOT NULL ,
  paidFor TEXT(150) NOT NULL ,
  termID INT(11) NOT NULL ,
  sessionID INT(11) NOT NULL ,
  dateOfPayment DATETIME NOT NULL ,
  dateRecorded DATETIME NOT NULL ,
  adminID INT(11) NOT NULL
);