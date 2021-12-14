CREATE TABLE non_combined_subjects_session_assessment
(
    rowID           INT            NOT NULL PRIMARY KEY AUTO_INCREMENT,
    studentID       INT            NOT NULL,
    subjectID       INT            NOT NULL,
    classID         INT            NOT NULL,
    sessionID       INT            NOT NULL,
    termCount       INT            NOT NULL,
    firstTermScore  DECIMAL(15, 2) NOT NULL,
    secondTermScore DECIMAL(15, 2) NOT NULL,
    thirdTermScore  DECIMAL(15, 2) NOT NULL,
    grandTotal      DECIMAL(15, 2) NOT NULL,
    average         DECIMAL(15, 2) NOT NULL,
    POSITION        VARCHAR(5)     NULL,
    grade           VARCHAR(5)     NULL,
    remark          VARCHAR(15)    NULL
)