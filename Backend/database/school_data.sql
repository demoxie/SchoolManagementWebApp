CREATE TABLE school_data(
                            schoolID INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
                            schoolName TEXT(150) NOT NULL,
                            schoolAddress TEXT(200) NOT NULL,
                            schoolPhone VARCHAR(15) NOT NULL,
                            schoolEmail VARCHAR(150) NULL,
                            schoolMotto VARCHAR(100) NULL,
                            school_logo VARCHAR(255) NULL,
                            directorID INT(11) NOT NULL ,
                            signature VARCHAR(255) NULL,
                            chief VARCHAR(150) NOT NULL,
                            dateCreated DATE NOT NULL
);