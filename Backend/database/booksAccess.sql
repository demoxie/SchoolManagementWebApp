CREATE TABLE booksUploaderDownloader(
  ID INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  uploaderUsername VARCHAR(40) NOT NULL ,
  downloaderUsername VARCHAR(40) NOT NULL ,
  noOfBooksUploaded INT(15) NULL ,
  noOfTimesUploaded INT(15) NULL ,
  noOfBooksDownloaded INT(15) NULL ,
  noOfTimesDownloaded INT(15) NULL,
  dateUploaded DATETIME NOT NULL
);