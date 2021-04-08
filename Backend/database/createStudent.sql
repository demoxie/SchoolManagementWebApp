CREATE TABLE `users`
(
    `id`        int(11)      NOT NULL PRIMARY KEY,
    `firstname` varchar(100) NOT NULL,
    `lastname`  varchar(100) NOT NULL,
    `email`     varchar(50)  NOT NULL,
    `mobile`    varchar(20)  NOT NULL,
    `password`  varchar(255) NOT NULL,
    `date_time` datetime     NOT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;