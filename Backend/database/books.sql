CREATE TABLE Books(
                      bookID INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
                      bookTitle VARCHAR(150) NOT NULL,
                      bookAuthor VARCHAR(255) NOT NULL,
                      bookPublisher VARCHAR(150) NULL,
                      yearPublished DATE NULL,
                      bookEdition VARCHAR(40) NULL,
                      bookCategoryID INT(11) NOT NULL,
                      uploaderUsername VARCHAR(40) NOT NULL ,
                      dateUploaded DATETIME
);

