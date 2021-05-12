CREATE TABLE staffs (
                       staffID int null primary key,
                       staffName varchar(255) not null,
                       staffNO varchar(255) not null ,
                       gender varchar(255) not null ,
                       maritalStatus varchar (15) not null,
                       address varchar(255) not null ,
                       phone varchar(100) null ,
                       email varchar (100) null ,
                       healthStatus varchar (100) not null ,
                       role varchar (40) not null,
                       courseOfStudy varchar(100) not null ,
                       subjectTaking varchar (255) null ,
                       dateAdded datetime not null
);
