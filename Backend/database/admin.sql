CREATE TABLE admin (
                       adminID int not null primary key auto_increment,
                       staffID varchar(15) not null ,
                       username varchar(255) null ,
                       password varchar(255) null ,
                       datecreated datetime not null
);