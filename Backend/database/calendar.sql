CREATE TABLE `smwa`.`calendar`
(
    `calendarID` INT(15)  NOT NULL,
    `sessionID`  INT(10)  NOT NULL,
    `termID`     INT      NOT NULL,
    `termBegins` DATETIME NOT NULL,
    `termEnds`   DATETIME NOT NULL,
    PRIMARY KEY (`calendarID`)
) ENGINE = MyISAM;