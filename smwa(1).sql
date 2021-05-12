-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 01, 2021 at 01:11 PM
-- Server version: 8.0.21
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smwa`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `adminID` int NOT NULL AUTO_INCREMENT,
  `staffID` varchar(15) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `datecreated` datetime NOT NULL,
  PRIMARY KEY (`adminID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `affectiveareas`
--

DROP TABLE IF EXISTS `affectiveareas`;
CREATE TABLE IF NOT EXISTS `affectiveareas` (
  `areaID` int NOT NULL AUTO_INCREMENT,
  `area` tinytext NOT NULL,
  `dateAdded` datetime NOT NULL,
  PRIMARY KEY (`areaID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

DROP TABLE IF EXISTS `books`;
CREATE TABLE IF NOT EXISTS `books` (
  `bookID` int NOT NULL AUTO_INCREMENT,
  `bookTitle` varchar(150) NOT NULL,
  `bookAuthor` varchar(255) NOT NULL,
  `bookPublisher` varchar(150) DEFAULT NULL,
  `yearPublished` date DEFAULT NULL,
  `bookEdition` varchar(40) DEFAULT NULL,
  `bookCategoryID` int NOT NULL,
  `uploaderUsername` varchar(40) NOT NULL,
  `dateUploaded` datetime DEFAULT NULL,
  PRIMARY KEY (`bookID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bookscategory`
--

DROP TABLE IF EXISTS `bookscategory`;
CREATE TABLE IF NOT EXISTS `bookscategory` (
  `categoryID` int NOT NULL AUTO_INCREMENT,
  `categoryName` tinytext NOT NULL,
  `dateCreated` datetime NOT NULL,
  PRIMARY KEY (`categoryID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `booksuploaderdownloader`
--

DROP TABLE IF EXISTS `booksuploaderdownloader`;
CREATE TABLE IF NOT EXISTS `booksuploaderdownloader` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `uploaderUsername` varchar(40) NOT NULL,
  `downloaderUsername` varchar(40) NOT NULL,
  `noOfBooksUploaded` int DEFAULT NULL,
  `noOfTimesUploaded` int DEFAULT NULL,
  `noOfBooksDownloaded` int DEFAULT NULL,
  `noOfTimesDownloaded` int DEFAULT NULL,
  `dateUploaded` datetime NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `calendar`
--

DROP TABLE IF EXISTS `calendar`;
CREATE TABLE IF NOT EXISTS `calendar` (
  `calendarID` int NOT NULL AUTO_INCREMENT,
  `sessionID` int NOT NULL,
  `termID` int NOT NULL,
  `termBegins` datetime NOT NULL,
  `termEnd` datetime NOT NULL,
  `nextTermBegins` datetime NOT NULL,
  `dateCreated` datetime NOT NULL,
  PRIMARY KEY (`calendarID`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `calendar`
--

INSERT INTO `calendar` (`calendarID`, `sessionID`, `termID`, `termBegins`, `termEnd`, `nextTermBegins`, `dateCreated`) VALUES
(1, 1, 1, '2021-04-20 01:47:00', '2021-04-20 01:47:00', '2021-04-20 01:47:00', '2021-04-20 14:28:29');

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

DROP TABLE IF EXISTS `class`;
CREATE TABLE IF NOT EXISTS `class` (
  `classID` int NOT NULL AUTO_INCREMENT,
  `classArm` varchar(2) DEFAULT NULL,
  `class` varchar(40) NOT NULL,
  `classTitle` text,
  `population` int DEFAULT NULL,
  `departmentID` int NOT NULL,
  `classRepID` int DEFAULT NULL,
  `formMasterID` int DEFAULT NULL,
  `dateCreated` datetime DEFAULT NULL,
  PRIMARY KEY (`classID`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`classID`, `classArm`, `class`, `classTitle`, `population`, `departmentID`, `classRepID`, `formMasterID`, `dateCreated`) VALUES
(12, 'A', 'JSS 1', 'The Golds', 9, 1, 14, 40, '2021-04-28 02:22:35'),
(20, 'A', 'JSS 2', 'The Golds', 9, 1, 12, 1, '2021-04-28 02:23:21');

-- --------------------------------------------------------

--
-- Table structure for table `classreps`
--

DROP TABLE IF EXISTS `classreps`;
CREATE TABLE IF NOT EXISTS `classreps` (
  `classRepID` int NOT NULL AUTO_INCREMENT,
  `classRepName` varchar(40) NOT NULL,
  `admissionNO` varchar(40) NOT NULL,
  `classID` int DEFAULT NULL,
  `dateAdded` datetime NOT NULL,
  PRIMARY KEY (`classRepID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `classresumption`
--

DROP TABLE IF EXISTS `classresumption`;
CREATE TABLE IF NOT EXISTS `classresumption` (
  `resumptionID` int NOT NULL AUTO_INCREMENT,
  `classID` int NOT NULL,
  `termID` int NOT NULL,
  `sessionID` int NOT NULL,
  `noOfStudents` int NOT NULL,
  `noOfStaffs` int NOT NULL,
  `dateOfResumption` datetime NOT NULL,
  `dateExecuted` datetime NOT NULL,
  PRIMARY KEY (`resumptionID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `combinedsubjects`
--

DROP TABLE IF EXISTS `combinedsubjects`;
CREATE TABLE IF NOT EXISTS `combinedsubjects` (
  `cs_ID` int NOT NULL AUTO_INCREMENT,
  `cs_Code` varchar(5) NOT NULL,
  `cs_Name` varchar(50) NOT NULL,
  `subject1_ID` int DEFAULT NULL,
  `subject2_ID` int DEFAULT NULL,
  `subject3_ID` int DEFAULT NULL,
  `subject4_ID` int DEFAULT NULL,
  `subject5_ID` int DEFAULT NULL,
  `subject6_ID` int DEFAULT NULL,
  `subject7_ID` int DEFAULT NULL,
  `subject8_ID` int DEFAULT NULL,
  `dateCreated` datetime DEFAULT NULL,
  PRIMARY KEY (`cs_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `combinedsubjects`
--

INSERT INTO `combinedsubjects` (`cs_ID`, `cs_Code`, `cs_Name`, `subject1_ID`, `subject2_ID`, `subject3_ID`, `subject4_ID`, `subject5_ID`, `subject6_ID`, `subject7_ID`, `subject8_ID`, `dateCreated`) VALUES
(2, 'BST', 'Basic Science and Technologgy', 1, 2, 3, NULL, NULL, NULL, NULL, NULL, '2021-04-18 04:26:46'),
(3, 'RNV', 'Religion and National Values', 1, 3, NULL, NULL, NULL, NULL, NULL, NULL, '2021-04-18 04:35:58');

-- --------------------------------------------------------

--
-- Table structure for table `cs_assessment`
--

DROP TABLE IF EXISTS `cs_assessment`;
CREATE TABLE IF NOT EXISTS `cs_assessment` (
  `cs_assessmentID` int NOT NULL AUTO_INCREMENT,
  `cs_ID` int NOT NULL,
  `studentID` int NOT NULL,
  `subjectID` int NOT NULL,
  `classID` int NOT NULL,
  `sessionID` int NOT NULL,
  `subjectCount` int NOT NULL,
  `termCount` int NOT NULL,
  `firstTermScore` decimal(11,0) DEFAULT NULL,
  `secondTermScore` decimal(11,0) DEFAULT NULL,
  `thirdTermScore` decimal(11,0) DEFAULT NULL,
  `grandTotal` decimal(11,0) DEFAULT NULL,
  `average` decimal(11,0) DEFAULT NULL,
  `position` varchar(5) NOT NULL,
  `grade` varchar(5) NOT NULL,
  `remark` varchar(5) NOT NULL,
  `dateCreated` datetime DEFAULT NULL,
  PRIMARY KEY (`cs_assessmentID`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dailyattendance`
--

DROP TABLE IF EXISTS `dailyattendance`;
CREATE TABLE IF NOT EXISTS `dailyattendance` (
  `attendanceID` int NOT NULL AUTO_INCREMENT,
  `studentID` int NOT NULL,
  `classID` int NOT NULL,
  `termID` int NOT NULL,
  `sessionID` int NOT NULL,
  `week` int NOT NULL,
  `dayID` int NOT NULL,
  `availableMorning` int NOT NULL,
  `availableAfternoon` int NOT NULL,
  `total` int DEFAULT NULL,
  `dateTaken` datetime DEFAULT NULL,
  PRIMARY KEY (`attendanceID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

DROP TABLE IF EXISTS `departments`;
CREATE TABLE IF NOT EXISTS `departments` (
  `departmentID` int NOT NULL AUTO_INCREMENT,
  `departmentName` tinytext NOT NULL,
  `HOD_ID` tinytext,
  `dateAdded` datetime NOT NULL,
  PRIMARY KEY (`departmentID`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`departmentID`, `departmentName`, `HOD_ID`, `dateAdded`) VALUES
(1, 'General', '1', '2021-03-06 21:12:32'),
(3, 'Science', '1', '2021-03-06 21:13:08'),
(4, 'Art/Social Science', '1', '2021-03-06 21:13:42'),
(5, 'Commercial', '4', '2021-03-06 21:14:08');

-- --------------------------------------------------------

--
-- Table structure for table `feepaymentstatus`
--

DROP TABLE IF EXISTS `feepaymentstatus`;
CREATE TABLE IF NOT EXISTS `feepaymentstatus` (
  `paymentID` int NOT NULL AUTO_INCREMENT,
  `receptNO` varchar(100) NOT NULL,
  `bankName` varchar(11) NOT NULL,
  `accountNO` int NOT NULL,
  `amount` decimal(65,0) NOT NULL,
  `payersName` tinytext NOT NULL,
  `phone` varchar(15) NOT NULL,
  `paymentStatus` varchar(15) NOT NULL,
  `paidFor` text NOT NULL,
  `termID` int NOT NULL,
  `sessionID` int NOT NULL,
  `dateOfPayment` datetime NOT NULL,
  `dateRecorded` datetime NOT NULL,
  `adminID` int NOT NULL,
  PRIMARY KEY (`paymentID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `formmasters`
--

DROP TABLE IF EXISTS `formmasters`;
CREATE TABLE IF NOT EXISTS `formmasters` (
  `formMasterID` int NOT NULL AUTO_INCREMENT,
  `formMasterName` varchar(100) NOT NULL,
  `staffID` int NOT NULL,
  `classID` int NOT NULL,
  `dateAdded` datetime NOT NULL,
  PRIMARY KEY (`formMasterID`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `formmasters`
--

INSERT INTO `formmasters` (`formMasterID`, `formMasterName`, `staffID`, `classID`, `dateAdded`) VALUES
(1, 'Ifenyi Okoro', 1, 1, '2021-03-01 09:59:08'),
(2, 'Helen Ihemmadu', 2, 2, '2021-03-01 09:59:53'),
(3, 'Shadrach Adamu', 3, 3, '2021-03-01 10:00:24');

-- --------------------------------------------------------

--
-- Table structure for table `keytointerpretationsofgrades`
--

DROP TABLE IF EXISTS `keytointerpretationsofgrades`;
CREATE TABLE IF NOT EXISTS `keytointerpretationsofgrades` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `gradeRange` varchar(15) NOT NULL,
  `grade` varchar(3) NOT NULL,
  `remark` varchar(40) NOT NULL,
  `dateCreated` datetime NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `logindetails`
--

DROP TABLE IF EXISTS `logindetails`;
CREATE TABLE IF NOT EXISTS `logindetails` (
  `loginID` int NOT NULL AUTO_INCREMENT,
  `username` varchar(15) NOT NULL,
  `password` varchar(40) NOT NULL,
  `roleID` int NOT NULL,
  PRIMARY KEY (`loginID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `psychomotorskills`
--

DROP TABLE IF EXISTS `psychomotorskills`;
CREATE TABLE IF NOT EXISTS `psychomotorskills` (
  `areaID` int NOT NULL AUTO_INCREMENT,
  `area` tinytext NOT NULL,
  `dateAdded` datetime NOT NULL,
  PRIMARY KEY (`areaID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `resultsavailable`
--

DROP TABLE IF EXISTS `resultsavailable`;
CREATE TABLE IF NOT EXISTS `resultsavailable` (
  `resultID` int NOT NULL AUTO_INCREMENT,
  `sessionID` int DEFAULT NULL,
  `firstTermID` int DEFAULT NULL,
  `secondTermID` int DEFAULT NULL,
  `thirdTermID` int DEFAULT NULL,
  PRIMARY KEY (`resultID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

DROP TABLE IF EXISTS `role`;
CREATE TABLE IF NOT EXISTS `role` (
  `roleID` int NOT NULL AUTO_INCREMENT,
  `username` varchar(15) NOT NULL,
  `role` varchar(40) NOT NULL,
  PRIMARY KEY (`roleID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `school_data`
--

DROP TABLE IF EXISTS `school_data`;
CREATE TABLE IF NOT EXISTS `school_data` (
  `schoolID` int NOT NULL AUTO_INCREMENT,
  `schoolName` text NOT NULL,
  `schoolAddress` text NOT NULL,
  `schoolPhone` varchar(15) NOT NULL,
  `schoolEmail` varchar(150) DEFAULT NULL,
  `schoolPostalBox` varchar(200) NOT NULL,
  `schoolMotto` varchar(100) DEFAULT NULL,
  `school_logo` varchar(255) DEFAULT NULL,
  `headTeacherID` int NOT NULL,
  `headTeachersign` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `dateCreated` datetime NOT NULL,
  PRIMARY KEY (`schoolID`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `school_data`
--

INSERT INTO `school_data` (`schoolID`, `schoolName`, `schoolAddress`, `schoolPhone`, `schoolEmail`, `schoolPostalBox`, `schoolMotto`, `school_logo`, `headTeacherID`, `headTeachersign`, `dateCreated`) VALUES
(3, 'AG MODERN NUR/PRI/SEC SCHOOL ASHAKACEM', 'ASHAKACEM', '08135723003', 'agmodernschoolashaka@gmail.com', 'P.O.Box 130 Bajoga, Funakaye L.G.A, Gombe State', 'KNOWLEDGE IS LIGHT', 'rfc-logo.jpg', 30, '6IFp2uye1SRxDgE.png', '2021-04-20 09:46:31');

-- --------------------------------------------------------

--
-- Table structure for table `session`
--

DROP TABLE IF EXISTS `session`;
CREATE TABLE IF NOT EXISTS `session` (
  `sessionID` int NOT NULL AUTO_INCREMENT,
  `session` varchar(10) NOT NULL,
  `currentYear` year NOT NULL,
  `commencementDate` date DEFAULT NULL,
  `endingDate` date DEFAULT NULL,
  `dateCreated` datetime DEFAULT NULL,
  PRIMARY KEY (`sessionID`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `session`
--

INSERT INTO `session` (`sessionID`, `session`, `currentYear`, `commencementDate`, `endingDate`, `dateCreated`) VALUES
(1, '2020/2021', 2021, '2020-10-05', '2021-07-23', '2021-03-01 15:47:38'),
(2, '2019/2020', 2020, '2019-09-09', '2020-07-10', '2021-03-01 15:51:11'),
(3, '2018/2019', 2019, '2018-09-03', '2019-07-05', '2021-03-01 15:52:13');

-- --------------------------------------------------------

--
-- Table structure for table `sessionalassessment`
--

DROP TABLE IF EXISTS `sessionalassessment`;
CREATE TABLE IF NOT EXISTS `sessionalassessment` (
  `sessionAssessmentID` int NOT NULL AUTO_INCREMENT,
  `studentID` int NOT NULL,
  `subjectID` int NOT NULL,
  `classID` int NOT NULL,
  `termCount` int NOT NULL,
  `termUpdatedLast` int NOT NULL,
  `sessionUpdatedLast` int NOT NULL,
  `sessionID` int NOT NULL,
  `firstTermScore` decimal(15,2) NOT NULL DEFAULT '0.00',
  `secondTermScore` decimal(15,2) NOT NULL DEFAULT '0.00',
  `thirdTermScore` decimal(15,2) NOT NULL DEFAULT '0.00',
  `grandTotal` decimal(15,2) NOT NULL DEFAULT '0.00',
  `average` double(15,2) NOT NULL DEFAULT '0.00',
  `position` varchar(11) NOT NULL,
  `grade` varchar(3) NOT NULL,
  `remark` varchar(40) NOT NULL,
  `dateCreated` datetime NOT NULL,
  PRIMARY KEY (`sessionAssessmentID`)
) ENGINE=MyISAM AUTO_INCREMENT=222 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `sessionalassessment`
--

INSERT INTO `sessionalassessment` (`sessionAssessmentID`, `studentID`, `subjectID`, `classID`, `termCount`, `termUpdatedLast`, `sessionUpdatedLast`, `sessionID`, `firstTermScore`, `secondTermScore`, `thirdTermScore`, `grandTotal`, `average`, `position`, `grade`, `remark`, `dateCreated`) VALUES
(215, 11, 2, 2, 3, 1, 1, 1, '23.00', '21.00', '14.00', '14.00', 4.67, '2nd', 'F9', 'Fail', '2021-04-27 08:37:50'),
(214, 13, 2, 2, 3, 1, 1, 1, '14.00', '14.00', '8.00', '8.00', 2.67, '3rd', 'F9', 'Fail', '2021-04-27 08:37:50'),
(213, 12, 2, 2, 3, 1, 1, 1, '91.00', '22.00', '17.00', '17.00', 5.67, '1st', 'F9', 'Fail', '2021-04-27 08:37:50'),
(212, 17, 2, 1, 3, 3, 1, 1, '57.00', '66.00', '77.00', '200.00', 66.67, '3rd', 'B3', 'Good', '2021-04-21 14:12:41'),
(211, 16, 2, 1, 3, 3, 1, 1, '75.00', '72.00', '61.00', '208.00', 69.33, '1st', 'B3', 'Good', '2021-04-21 14:12:41'),
(210, 14, 2, 1, 3, 3, 1, 1, '61.00', '77.00', '61.00', '199.00', 66.33, '4th', 'B3', 'Good', '2021-04-21 14:12:41'),
(208, 11, 1, 2, 3, 1, 1, 1, '10.00', '74.00', '20.00', '20.00', 6.67, '1st', 'F9', 'Fail', '2021-04-27 08:36:59'),
(209, 15, 2, 1, 3, 3, 1, 1, '83.00', '58.00', '63.00', '204.00', 68.00, '2nd', 'B3', 'Good', '2021-04-21 14:12:41'),
(207, 13, 1, 2, 3, 1, 1, 1, '16.00', '51.00', '14.00', '14.00', 4.67, '3rd', 'F9', 'Fail', '2021-04-27 08:36:59'),
(206, 12, 1, 2, 3, 1, 1, 1, '16.00', '71.00', '18.00', '18.00', 6.00, '2nd', 'F9', 'Fail', '2021-04-27 08:36:59'),
(205, 17, 1, 1, 3, 1, 1, 1, '79.00', '71.00', '91.00', '91.00', 30.33, '1st', 'F9', 'Fail', '2021-04-26 22:55:56'),
(204, 16, 1, 1, 3, 1, 1, 1, '64.00', '84.00', '71.00', '71.00', 23.67, '3rd', 'F9', 'Fail', '2021-04-26 22:55:56'),
(203, 14, 1, 1, 3, 1, 1, 1, '60.00', '73.00', '62.00', '62.00', 20.67, '4th', 'F9', 'Fail', '2021-04-26 22:55:56'),
(202, 15, 1, 1, 3, 1, 1, 1, '67.00', '58.00', '75.00', '75.00', 25.00, '2nd', 'F9', 'Fail', '2021-04-26 22:55:56'),
(216, 12, 3, 2, 3, 3, 1, 1, '19.00', '18.00', '22.00', '59.00', 19.67, '2nd', 'F9', 'Fail', '2021-04-26 23:19:59'),
(217, 13, 3, 2, 3, 3, 1, 1, '24.00', '18.00', '20.00', '62.00', 20.67, '1st', 'F9', 'Fail', '2021-04-26 23:19:59'),
(218, 11, 3, 2, 3, 3, 1, 1, '24.00', '14.00', '14.00', '52.00', 17.33, '3rd', 'F9', 'Fail', '2021-04-26 23:19:59'),
(219, 12, 3, 2, 1, 0, 0, 3, '0.00', '21.00', '0.00', '21.00', 21.00, '1st', 'F9', 'Fail', '2021-04-26 23:27:46'),
(220, 13, 3, 2, 1, 0, 0, 3, '0.00', '16.00', '0.00', '16.00', 16.00, '3rd', 'F9', 'Fail', '2021-04-26 23:27:46'),
(221, 11, 3, 2, 1, 0, 0, 3, '0.00', '17.00', '0.00', '17.00', 17.00, '2nd', 'F9', 'Fail', '2021-04-26 23:27:46');

-- --------------------------------------------------------

--
-- Table structure for table `signitories`
--

DROP TABLE IF EXISTS `signitories`;
CREATE TABLE IF NOT EXISTS `signitories` (
  `signitoryID` int NOT NULL AUTO_INCREMENT,
  `staffID` int NOT NULL,
  `signature` varchar(255) NOT NULL,
  `roleID` int NOT NULL,
  PRIMARY KEY (`signitoryID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `staffs`
--

DROP TABLE IF EXISTS `staffs`;
CREATE TABLE IF NOT EXISTS `staffs` (
  `staffID` int NOT NULL AUTO_INCREMENT,
  `staffName` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `staffNO` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `gender` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `age` int NOT NULL,
  `date_of_birth` date NOT NULL,
  `religion` varchar(40) NOT NULL,
  `maritalStatus` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `healthStatus` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `courseOfStudy` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `bankName` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `accountNO` int NOT NULL,
  `accountType` varchar(15) NOT NULL,
  `state_of_origin` varchar(40) NOT NULL,
  `lga` varchar(50) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `passport` varchar(255) NOT NULL,
  `dateAdded` datetime NOT NULL,
  PRIMARY KEY (`staffID`)
) ENGINE=MyISAM AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `staffs`
--

INSERT INTO `staffs` (`staffID`, `staffName`, `staffNO`, `gender`, `age`, `date_of_birth`, `religion`, `maritalStatus`, `healthStatus`, `courseOfStudy`, `bankName`, `accountNO`, `accountType`, `state_of_origin`, `lga`, `address`, `phone`, `email`, `passport`, `dateAdded`) VALUES
(1, 'Shadrach Ubandoma Adamu', 'AGSTF/2021/1/707654QP', 'Male', 30, '1990-04-15', 'Christian', 'Single', 'Normal', 'Computer and Communication Engineering', 'First Bank', 2147483647, 'Savings', 'Taraba', 'Kurmi', 'Ungwan Alheri Ashaka, Beside C.A.C Church, Funakaye LGA, Gombe State,', '07067659632', 'shadrachadamuul@gmail.com', '', '2021-03-03 10:56:11'),
(3, 'Ifenyi Okoro Eluwa', 'AGSTF/2021/1/821069YU', 'Male', 32, '1989-03-02', 'Christian', 'Single', 'Normal', 'Food and Nutrition', 'Access Bank', 94839994, 'Currrent', 'Taraba', 'Kurmi', 'Ashaka', '0805697253', 'shadrachadamuul@gmail.com', '', '2021-03-03 11:18:02'),
(4, 'Helen Ihemmadu Levi', 'AGSTF/2021/1/545110MX', 'Female', 48, '1973-01-01', 'Christian', 'Married', 'Normal', 'Intergrated Science', 'Access Bank', 59738475, 'Universal', 'Taraba', 'Kurmi', 'AGC ', '081358868993', 'shadrachadamuul@gmail.com', '', '2021-03-03 11:20:11'),
(5, 'Chidimma Ruth Levi', 'AGSTF/2021/1/299020HJ', 'Female', 27, '1994-03-03', 'Christian', 'Single', 'Normal', 'Chemical Engineering', 'FCMB', 2147483647, 'Savings', 'Taraba', 'Kurmi', 'Ilora, Afijio LGA, Oyo State', '09080375856', 'shadrachadamuul@gmail.com', '', '2021-03-03 11:22:04'),
(40, 'Emmanuel Joshua Mbula', 'AGSTF/2021/1/829599MV', 'Male', 32, '1989-01-01', 'Chirstian', 'Single', 'Normal', 'Business Administration', 'Polaris Bank Limited.', 2147483647, 'Current', 'Bauchi', 'Bogoro', 'asss', '08038267483', 'emmyjosh@gmail.com', '', '2021-03-24 10:56:09'),
(8, 'Shadrach  Adamu', 'AGSTF/2021/1/520307YU', 'Male', 0, '2021-03-04', 'Islam', 'Married', 'Epileptic', 'Introductory Technology', 'Access Bank', 2147483647, 'Currrent', 'Access Bank', 'Currrent', 'Ungwan Alheri Ashaka, Beside C.A.C Church, Funakaye LGA, Gombe State,', '9585786857478', 'shadrachadamuul@gmail.com', '', '2021-03-03 11:35:27'),
(9, 'Adami Ladan Christopher', 'AGSTF/2021/1/816749ID', 'Female', 20, '2000-03-17', 'Christian', 'Single', 'Normal', 'English language', 'FCMB', 2147483647, 'Savings', 'Taraba', 'Kurmi', 'Ilora, Afijio LGA, Oyo State', '080456782938', 'adami@gmail.com', '', '2021-03-03 13:24:59'),
(30, 'Benjamin  Bawa', 'AGSTF/2021/1/043499OW', 'Male', 46, '1975-03-03', 'Chirstian', 'Single', 'Normal', 'Business Administration', '', 89732723, 'Savings', 'Taraba', 'Karin-Lamido', 'JRM AshakaCem Plc', '09046352837', 'benjamin@gmail.com', '', '2021-03-05 13:21:08'),
(31, 'Patricia  Fara', 'AGSTF/2021/1/559250UC', 'Female', 25, '1996-01-03', 'Chirstian', 'Single', 'Normal', 'Accounting', 'First Bank of Nigeria Limited', 2147483647, 'Domiciliary', 'Adamawa', 'Numan', 'Baptist Church Ashaka', '08080394839', 'pat@gmail.com', '', '2021-03-05 13:31:21'),
(33, 'Facicha  Barnabas', 'AGSTF/2021/1/636848PT', 'Male', 33, '1987-03-09', 'Chirstian', 'Single', 'Normal', 'Civil Engineering', 'Guaranty Trust Bank Plc', 28364857, 'Current', 'Benue', 'Gboko', 'Boko, Benue State', '09067536273', 'facichabarnabas@gmail.com', '', '2021-03-05 13:37:32'),
(35, 'Kanadi  Usman', 'AGSTF/2021/1/327747ZA', 'Female', 32, '1989-02-12', 'Chirstian', 'Single', 'Normal', '', 'Stanbic IBTC Bank Plc', 36586858, 'Savings', 'Gombe', 'Balanga', 'Ashaka', '0906524374', 'kanadi@gmail.com', '', '2021-03-05 13:43:51'),
(36, 'Shadrach  Adamu', 'AGSTF/2021/1/129372TL', 'Male', 0, '2021-03-10', 'Chirstian', 'Single', 'Normal', 'WordPress development', 'Access Bank Plc', 868885, 'Current', 'Abuja', 'AMAC', 'Ungwan Alheri Ashaka, Beside C.A.C Church, Funakaye LGA, Gombe State,', '4684868568', 'shadrachadamuul@gmail.com', '', '2021-03-05 15:07:06'),
(38, 'Favour John Levi', 'AGSTF/2021/1/128166YU', 'Male', 0, '2021-03-11', 'Chirstian', 'Single', 'Normal', 'Computer Science', 'Access Bank Plc', 38859992, 'Savings', 'Abia', 'Isuikwato', 'AGC Ashaka', '070977839', 'favour@gmail.com', '', '2021-03-18 19:36:40'),
(39, 'Isaac Prince  Levi', 'AGSTF/2021/1/425731NV', 'Male', 0, '2021-03-03', 'Chirstian', 'Single', 'Normal', 'Civil Engineering', 'Zenith Bank Plc', 773949214, 'Savings', 'Abia', 'Isuikwato', 'AGC Ashaka', '08038267483', 'isaac@gmail.com', '', '2021-03-18 19:38:56'),
(42, 'Gibert Isa Lonis', 'AGSTF/2021/1/054357PQ', 'Male', 33, '1988-03-05', 'Chirstian', 'Single', 'Normal', 'Geography', 'Access Bank Plc', 893888477, 'Current', 'Gombe', 'Kaltungo', 'Alheri AshakaCem', '07034857582', 'gilberto@gmail.com', '', '2021-03-24 11:57:48');

-- --------------------------------------------------------

--
-- Table structure for table `staffsalarypaymentstatus`
--

DROP TABLE IF EXISTS `staffsalarypaymentstatus`;
CREATE TABLE IF NOT EXISTS `staffsalarypaymentstatus` (
  `paymentID` int NOT NULL,
  `staffID` int NOT NULL,
  `bankName` varchar(40) NOT NULL,
  `accountNO` int NOT NULL,
  `termID` int NOT NULL,
  `sessionID` int NOT NULL,
  `forTheMonthOf` date NOT NULL,
  `paymentStatus` varchar(15) DEFAULT NULL,
  `datePayed` datetime NOT NULL,
  `dateReceived` datetime DEFAULT NULL,
  PRIMARY KEY (`paymentID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `staffstatus`
--

DROP TABLE IF EXISTS `staffstatus`;
CREATE TABLE IF NOT EXISTS `staffstatus` (
  `staffStatusID` int NOT NULL AUTO_INCREMENT,
  `staffID` varchar(15) NOT NULL,
  `classID` int NOT NULL,
  `termID` int NOT NULL,
  `sessionID` int NOT NULL,
  `status` varchar(40) NOT NULL,
  `dateCreated` datetime NOT NULL,
  PRIMARY KEY (`staffStatusID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

DROP TABLE IF EXISTS `students`;
CREATE TABLE IF NOT EXISTS `students` (
  `studentID` int NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `dateOfBirth` date NOT NULL,
  `gender` varchar(11) NOT NULL,
  `healthStatus` varchar(20) NOT NULL,
  `age_as_at_last_Birthday` int NOT NULL,
  `passport` varchar(255) NOT NULL,
  `nameOfLastSchoolAttended` text,
  `lastClass` varchar(15) DEFAULT NULL,
  `presentClass` varchar(15) DEFAULT NULL,
  `positionObtained` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `signature` varchar(100) DEFAULT NULL,
  `guardianName` text NOT NULL,
  `guardianOfficeAddress` text,
  `guardianEmail` varchar(200) DEFAULT NULL,
  `guardianPhone` varchar(15) DEFAULT NULL,
  `guardianPostalAddress` text,
  `guardianResidentialAddress` text NOT NULL,
  `stateOfOrigin` text NOT NULL,
  `l_g_a` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `religion` tinytext NOT NULL,
  `Denomination` tinytext,
  `emotionalBehavior` text,
  `socialBehavior` text,
  `spiritualBehavior` text,
  `admissionNO` varchar(40) DEFAULT NULL,
  `registrationCode` varchar(20) NOT NULL,
  `testScore` decimal(11,0) DEFAULT NULL,
  `applicationStatus` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `yearApproved` year NOT NULL,
  `dateApplied` datetime NOT NULL,
  PRIMARY KEY (`studentID`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`studentID`, `name`, `dateOfBirth`, `gender`, `healthStatus`, `age_as_at_last_Birthday`, `passport`, `nameOfLastSchoolAttended`, `lastClass`, `presentClass`, `positionObtained`, `signature`, `guardianName`, `guardianOfficeAddress`, `guardianEmail`, `guardianPhone`, `guardianPostalAddress`, `guardianResidentialAddress`, `stateOfOrigin`, `l_g_a`, `religion`, `Denomination`, `emotionalBehavior`, `socialBehavior`, `spiritualBehavior`, `admissionNO`, `registrationCode`, `testScore`, `applicationStatus`, `yearApproved`, `dateApplied`) VALUES
(15, 'Favour  Wilson', '2010-04-05', 'Female', 'Normal', 12, 'IMG-20200307-WA0018.jpg', 'AG Modern', 'Jss 1', 'Jss 2', 'A', NULL, 'Wilson  Bariki', 'AshakaCem', 'shant@gmail.com', '09078463524', '', 'Block C-40 Workers Village, Funakaye LGA, Gombe State', 'Borno', 'Gwoza', 'Christian', 'Orthodox', 'Stable', 'Sanguine', 'Good believer', 'AGM/SEC/2021/1/977322', '1709297514NI', NULL, 'Approved', 2021, '2021-04-05 02:04:28'),
(13, 'Victor Mairiga Harrison', '2010-01-02', 'Male', 'Sickle Cell Anemia', 11, '49293628_2008881092562312_4687459334701973504_o.jpg', 'AG Modern', 'Jss 2', 'Jss 3', 'A', NULL, 'Harrison  Mairigi', '', 'victorison', '08067453624', '', 'B-Type Workers Village AshakaCem, Funakaye LGA, Gombe State', 'Taraba', 'Kurmi', 'Christian', 'Orthodox', 'Stable', 'Sanguine', 'Good believer', 'AGM/SEC/2021/1/298199', '5100223139WT', NULL, 'Approved', 2021, '2021-04-05 01:04:21'),
(14, 'Jessica  Mathew', '2014-02-05', 'Female', 'Normal', 6, '118472563_895309367666507_1083939057520704480_n.jpg', 'FGGC Bajoga', 'Jss 1', 'Jss 2', 'D', NULL, 'Mathew  Dogo', '', 'mathewdogs', '08023451276', '', 'Block J-30 Workers Village', 'Kaduna', 'Kajuru', 'Christian', 'Catholic', 'Stable', 'Melancholic', 'Good Believer', 'AGM/SEC/2021/1/092627', '4509476814GN', NULL, 'Approved', 2021, '2021-04-05 02:04:27'),
(11, 'Elisha  Emmanuel', '2012-04-02', 'Male', 'Normal', 9, 'IMG-20200601-WA0007.jpg', 'AG Modern', 'Jss 2', 'Jss 3', 'A', NULL, 'Emanuel  Gayus', 'Bajoga', 'emmyday@gmail.com', '09046573524', '', 'Ungwan Alheri AshakaCEm PLC', 'Gombe', 'Funakaye', 'Christian', 'Orthodox', 'Stable', 'Choleric', 'Good Believe', 'AGM/SEC/2021/1/985878', '2064017506IQ', NULL, 'Approved', 2021, '2021-04-05 01:04:08'),
(12, 'Francisca Idoko Augustine', '2014-02-03', 'Female', 'Normal', 7, 'IMG-20200308-WA0021.jpg', 'AG Modern', 'Jss 2', 'Jss 3', 'B', NULL, 'Augustine  Idoko', 'Ashakacem plc', 'austine@yahoo.com', '09056453241', '', 'Block A-23 Workers Village Ashaka, Funakaye Lga, Gombe State', 'Kogi', 'Idah', 'Christian', 'Catholic', 'Stable', 'Phlegmatic', 'Good believer', 'AGM/SEC/2021/1/227853', '2889432692AO', NULL, 'Approved', 2021, '2021-04-05 01:04:22'),
(16, 'Briskila  Kayafas', '2017-06-05', 'Female', 'Sickle Cell Anemia', 3, 'IMG-20200103-WA0006.jpg', 'AG Modern', 'Jss 1', 'Jss 2', 'B', NULL, 'Kayafas  Meldi', 'Jalingo', 'kayafas@gmail.com', '08076352413', '', 'Jalingo Railway', 'Adamawa', 'Nyuwar', 'Christian', 'Baptist', 'Stable', 'Phlegmatic', 'Good Believer', 'AGM/SEC/2021/1/363888', '7731481543XZ', NULL, 'Approved', 2021, '2021-04-05 02:04:58'),
(17, 'Jessica  Clement', '2014-02-04', 'Female', 'Normal', 7, 'Passport Red Background.jpg', 'AG Modern', 'Jss 1', 'Jss 2', 'C5', NULL, 'Clement  Turaki', 'Costain', 'tudy@yahoo.com', '090768574837', '', 'Costain Quarters', 'Taraba', 'Karin-Lamido', 'Christian', 'Orthodox', 'Stable', 'Sanguine', 'Good Believer', 'AGM/SEC/2021/1/683923', '2166478218EJ', NULL, 'Approved', 2021, '2021-04-08 12:04:10');

-- --------------------------------------------------------

--
-- Table structure for table `studentstatus`
--

DROP TABLE IF EXISTS `studentstatus`;
CREATE TABLE IF NOT EXISTS `studentstatus` (
  `statusID` int NOT NULL AUTO_INCREMENT,
  `studentID` varchar(15) NOT NULL,
  `previousClassID` int NOT NULL,
  `currentClassID` int NOT NULL,
  `termID` int NOT NULL,
  `sessionID` int NOT NULL,
  `status` varchar(40) NOT NULL,
  `dateExecuted` datetime NOT NULL,
  PRIMARY KEY (`statusID`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `studentstatus`
--

INSERT INTO `studentstatus` (`statusID`, `studentID`, `previousClassID`, `currentClassID`, `termID`, `sessionID`, `status`, `dateExecuted`) VALUES
(14, '12', 6, 2, 1, 1, 'Promoted', '2021-04-06 13:15:17'),
(12, '13', 6, 2, 1, 1, 'Promoted', '2021-04-06 13:14:50'),
(11, '15', 6, 1, 1, 1, 'Promoted', '2021-04-06 13:14:35'),
(13, '11', 6, 2, 1, 1, 'Promoted', '2021-04-06 13:15:04'),
(10, '14', 6, 1, 1, 1, 'Promoted', '2021-04-06 13:14:03'),
(7, '16', 6, 1, 1, 1, 'Promoted', '2021-04-06 13:11:33'),
(15, '17', 6, 1, 2, 1, 'Withdrawn', '2021-04-08 01:56:01');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

DROP TABLE IF EXISTS `subject`;
CREATE TABLE IF NOT EXISTS `subject` (
  `subjectID` int NOT NULL AUTO_INCREMENT,
  `subjectCode` varchar(10) NOT NULL,
  `subjectName` varchar(40) NOT NULL,
  `subjectUnit` int DEFAULT NULL,
  `adminID` int NOT NULL,
  `dateCreated` datetime NOT NULL,
  PRIMARY KEY (`subjectID`)
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`subjectID`, `subjectCode`, `subjectName`, `subjectUnit`, `adminID`, `dateCreated`) VALUES
(11, 'AGS', 'Agricultural Science', 2, 0, '2021-04-27 14:45:35'),
(10, 'ENG', 'English Language', 3, 0, '2021-04-27 14:45:10'),
(9, 'MTH', 'Mathematics', 3, 0, '2021-04-27 14:44:45'),
(18, 'TD', 'Technical Drawing', 2, 0, '2021-04-27 14:53:33'),
(19, 'BS', 'Business Studies', 2, 0, '2021-04-27 14:54:10'),
(17, 'HAU', 'Hausa', 2, 0, '2021-04-27 14:53:00'),
(20, 'CHM', 'Chemistry', 2, 0, '2021-04-27 14:55:07'),
(21, 'BIO', 'Biology', 2, 0, '2021-04-27 14:55:22'),
(22, 'PHY', 'Physics', 2, 0, '2021-04-27 14:55:38'),
(23, 'CRS', 'Christian Religion Studies', 2, 0, '2021-04-27 14:56:03'),
(24, 'GEO', 'Geography', 2, 0, '2021-04-27 14:56:19'),
(25, 'Civic', 'Education', 2, 0, '2021-04-27 14:56:32'),
(26, 'FMTH', 'Further Mathematics', 2, 0, '2021-04-27 14:56:58'),
(27, 'ANH', 'Animal Husbandry', 2, 0, '2021-04-27 14:57:44'),
(28, 'ECO', 'Economics', 2, 0, '2021-04-27 14:58:34'),
(29, 'GOV', 'Government', 2, 0, '2021-04-27 14:58:58'),
(30, 'E-LIT', 'English Literature', 2, 0, '2021-04-27 14:59:32'),
(31, 'DRW', 'Drawing', 2, 0, '2021-04-27 15:02:24'),
(32, 'CCA', 'Cultural and Creative Art', 2, 0, '2021-04-27 15:02:57'),
(33, 'BTECH', 'Basic Technology', 2, 0, '2021-04-27 15:04:00'),
(34, 'BSC', 'Basic Science', 2, 0, '2021-04-27 15:04:26'),
(35, 'PHE', 'Physical Health Education', 2, 0, '2021-04-27 15:04:50'),
(36, 'CVC', 'Civic Education', 2, 0, '2021-04-27 15:05:10');

-- --------------------------------------------------------

--
-- Table structure for table `termlyattendance`
--

DROP TABLE IF EXISTS `termlyattendance`;
CREATE TABLE IF NOT EXISTS `termlyattendance` (
  `attendanceID` int NOT NULL AUTO_INCREMENT,
  `studentID` int NOT NULL,
  `classID` int NOT NULL,
  `termID` int NOT NULL,
  `sessionID` int NOT NULL,
  `availability_point` int DEFAULT NULL,
  `dateTaken` datetime NOT NULL,
  PRIMARY KEY (`attendanceID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `termly_assessment`
--

DROP TABLE IF EXISTS `termly_assessment`;
CREATE TABLE IF NOT EXISTS `termly_assessment` (
  `assessmentID` int NOT NULL AUTO_INCREMENT,
  `termID` int NOT NULL,
  `sessionID` int NOT NULL,
  `classID` int NOT NULL,
  `subjectID` int NOT NULL,
  `studentID` varchar(11) NOT NULL,
  `firstCA` decimal(11,0) DEFAULT NULL,
  `secondCA` decimal(11,0) DEFAULT NULL,
  `thirdCA` decimal(11,0) DEFAULT NULL,
  `totalCA` decimal(11,0) DEFAULT NULL,
  `exams` decimal(11,0) DEFAULT NULL,
  `total` decimal(11,0) DEFAULT NULL,
  `subjectPosition` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `grade` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `remark` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `dateAdded` datetime NOT NULL,
  PRIMARY KEY (`assessmentID`)
) ENGINE=MyISAM AUTO_INCREMENT=172 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `termly_assessment`
--

INSERT INTO `termly_assessment` (`assessmentID`, `termID`, `sessionID`, `classID`, `subjectID`, `studentID`, `firstCA`, `secondCA`, `thirdCA`, `totalCA`, `exams`, `total`, `subjectPosition`, `grade`, `remark`, `dateAdded`) VALUES
(130, 1, 1, 2, 1, '12', '4', '3', '4', '11', '5', '16', '2nd', 'F9', 'Fail', '2021-04-27 08:36:59'),
(131, 1, 1, 2, 1, '13', '3', '4', '3', '10', '6', '16', '2nd', 'F9', 'Fail', '2021-04-27 08:36:59'),
(129, 3, 1, 1, 1, '17', '8', '7', '9', '24', '67', '91', '1st', 'A', 'Excellent', '2021-04-21 06:40:41'),
(128, 3, 1, 1, 1, '16', '8', '9', '5', '22', '49', '71', '3rd', 'B2', 'V.Good', '2021-04-21 06:40:41'),
(127, 3, 1, 1, 1, '14', '4', '7', '6', '17', '45', '62', '4th', 'C4', 'Credit', '2021-04-21 06:40:41'),
(126, 3, 1, 1, 1, '15', '5', '8', '8', '21', '54', '75', '2nd', 'A', 'Excellent', '2021-04-21 06:40:41'),
(124, 2, 1, 1, 1, '16', '7', '9', '8', '24', '60', '84', '1st', 'A', 'Excellent', '2021-04-21 06:39:23'),
(125, 2, 1, 1, 1, '17', '3', '6', '7', '16', '55', '71', '3rd', 'B2', 'V.Good', '2021-04-21 06:39:23'),
(123, 2, 1, 1, 1, '14', '4', '5', '8', '17', '56', '73', '2nd', 'B2', 'V.Good', '2021-04-21 06:39:23'),
(122, 2, 1, 1, 1, '15', '8', '7', '9', '24', '34', '58', '4th', 'C5', 'Credit', '2021-04-21 06:39:23'),
(121, 1, 1, 1, 1, '17', '2', '4', '8', '14', '65', '79', '1st', 'A', 'Excellent', '2021-04-26 22:55:56'),
(120, 1, 1, 1, 1, '16', '6', '7', '8', '21', '43', '64', '3rd', 'C4', 'Credit', '2021-04-26 22:55:56'),
(119, 1, 1, 1, 1, '14', '4', '5', '6', '15', '45', '60', '4th', 'C4', 'Credit', '2021-04-26 22:55:56'),
(118, 1, 1, 1, 1, '15', '2', '4', '5', '11', '56', '67', '2nd', 'B3', 'Good', '2021-04-26 22:55:56'),
(132, 1, 1, 2, 1, '11', '2', '2', '2', '6', '4', '10', '3rd', 'F9', 'Fail', '2021-04-27 08:36:59'),
(133, 2, 1, 2, 1, '12', '7', '6', '9', '22', '49', '71', '2nd', 'B2', 'V.Good', '2021-04-21 06:42:53'),
(134, 2, 1, 2, 1, '13', '6', '7', '8', '21', '30', '51', '3rd', 'C6', 'Credit', '2021-04-21 06:42:53'),
(135, 2, 1, 2, 1, '11', '8', '5', '9', '22', '52', '74', '1st', 'B2', 'V.Good', '2021-04-21 06:42:53'),
(136, 3, 1, 2, 1, '12', '4', '5', '6', '15', '3', '18', '2nd', 'F9', 'Fail', '2021-04-26 23:13:19'),
(137, 3, 1, 2, 1, '13', '2', '3', '4', '9', '5', '14', '3rd', 'F9', 'Fail', '2021-04-26 23:13:19'),
(138, 3, 1, 2, 1, '11', '6', '5', '4', '15', '5', '20', '1st', 'F9', 'Fail', '2021-04-26 23:13:19'),
(139, 1, 1, 1, 2, '15', '6', '7', '8', '21', '62', '83', '1st', 'A', 'Excellent', '2021-04-21 14:10:27'),
(140, 1, 1, 1, 2, '14', '4', '5', '7', '16', '45', '61', '3rd', 'C4', 'Credit', '2021-04-21 14:10:27'),
(141, 1, 1, 1, 2, '16', '8', '4', '9', '21', '54', '75', '2nd', 'A', 'Excellent', '2021-04-21 14:10:28'),
(142, 1, 1, 1, 2, '17', '9', '4', '5', '18', '39', '57', '4th', 'C5', 'Credit', '2021-04-21 14:10:28'),
(143, 2, 1, 1, 2, '15', '1', '5', '8', '14', '44', '58', '4th', 'C5', 'Credit', '2021-04-21 14:11:41'),
(144, 2, 1, 1, 2, '14', '5', '5', '7', '17', '60', '77', '1st', 'A', 'Excellent', '2021-04-21 14:11:41'),
(145, 2, 1, 1, 2, '16', '5', '3', '8', '16', '56', '72', '2nd', 'B2', 'V.Good', '2021-04-21 14:11:41'),
(146, 2, 1, 1, 2, '17', '5', '6', '3', '14', '52', '66', '3rd', 'B3', 'Good', '2021-04-21 14:11:41'),
(147, 3, 1, 1, 2, '15', '7', '4', '3', '14', '49', '63', '2nd', 'C4', 'Credit', '2021-04-21 14:12:41'),
(148, 3, 1, 1, 2, '14', '2', '6', '0', '8', '53', '61', '4th', 'C4', 'Credit', '2021-04-21 14:12:41'),
(149, 3, 1, 1, 2, '16', '2', '7', '8', '17', '44', '61', '4th', 'C4', 'Credit', '2021-04-21 14:12:41'),
(150, 3, 1, 1, 2, '17', '5', '6', '9', '20', '57', '77', '1st', 'A', 'Excellent', '2021-04-21 14:12:41'),
(151, 1, 1, 2, 2, '12', '5', '79', '6', '90', '1', '91', '1st', 'A', 'Excellent', '2021-04-27 08:37:50'),
(152, 1, 1, 2, 2, '13', '2', '3', '4', '9', '5', '14', '3rd', 'F9', 'Fail', '2021-04-27 08:37:50'),
(153, 1, 1, 2, 2, '11', '7', '5', '7', '19', '4', '23', '2nd', 'F9', 'Fail', '2021-04-27 08:37:50'),
(154, 2, 1, 2, 2, '12', '4', '5', '6', '15', '7', '22', '1st', 'F9', 'Fail', '2021-04-27 07:58:23'),
(155, 2, 1, 2, 2, '13', '2', '3', '4', '9', '5', '14', '3rd', 'F9', 'Fail', '2021-04-27 07:58:23'),
(156, 2, 1, 2, 2, '11', '6', '7', '6', '19', '2', '21', '2nd', 'F9', 'Fail', '2021-04-27 07:58:23'),
(157, 3, 1, 2, 2, '12', '4', '5', '5', '14', '3', '17', '1st', 'F9', 'Fail', '2021-04-27 08:27:57'),
(158, 3, 1, 2, 2, '13', '2', '1', '2', '5', '3', '8', '3rd', 'F9', 'Fail', '2021-04-27 08:27:57'),
(159, 3, 1, 2, 2, '11', '2', '3', '4', '9', '5', '14', '2nd', 'F9', 'Fail', '2021-04-27 08:27:57'),
(160, 1, 1, 2, 3, '12', '4', '5', '6', '15', '4', '19', '3rd', 'F9', 'Fail', '2021-04-26 22:59:24'),
(161, 1, 1, 2, 3, '13', '5', '6', '6', '17', '7', '24', '2nd', 'F9', 'Fail', '2021-04-26 22:59:24'),
(162, 1, 1, 2, 3, '11', '4', '5', '7', '16', '8', '24', '2nd', 'F9', 'Fail', '2021-04-26 22:59:24'),
(163, 2, 1, 2, 3, '12', '3', '4', '5', '12', '6', '18', '2nd', 'F9', 'Fail', '2021-04-26 23:07:00'),
(164, 2, 1, 2, 3, '13', '3', '4', '5', '12', '6', '18', '2nd', 'F9', 'Fail', '2021-04-26 23:07:00'),
(165, 2, 1, 2, 3, '11', '2', '3', '4', '9', '5', '14', '3rd', 'F9', 'Fail', '2021-04-26 23:07:00'),
(166, 3, 1, 2, 3, '12', '4', '5', '6', '15', '7', '22', '1st', 'F9', 'Fail', '2021-04-26 23:19:59'),
(167, 3, 1, 2, 3, '13', '4', '5', '6', '15', '5', '20', '2nd', 'F9', 'Fail', '2021-04-26 23:19:59'),
(168, 3, 1, 2, 3, '11', '5', '4', '3', '12', '2', '14', '3rd', 'F9', 'Fail', '2021-04-26 23:19:59'),
(169, 2, 3, 2, 3, '12', '6', '4', '5', '15', '6', '21', '1st', 'F9', 'Fail', '2021-04-26 23:27:46'),
(170, 2, 3, 2, 3, '13', '4', '3', '4', '11', '5', '16', '3rd', 'F9', 'Fail', '2021-04-26 23:27:46'),
(171, 2, 3, 2, 3, '11', '6', '5', '4', '15', '2', '17', '2nd', 'F9', 'Fail', '2021-04-26 23:27:46');

-- --------------------------------------------------------

--
-- Table structure for table `terms`
--

DROP TABLE IF EXISTS `terms`;
CREATE TABLE IF NOT EXISTS `terms` (
  `termID` int NOT NULL AUTO_INCREMENT,
  `term` varchar(40) NOT NULL,
  `dateCreated` datetime NOT NULL,
  PRIMARY KEY (`termID`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `terms`
--

INSERT INTO `terms` (`termID`, `term`, `dateCreated`) VALUES
(1, 'First Term', '2021-04-20 09:12:23'),
(2, 'Second Term', '2021-04-20 09:12:23'),
(3, 'Third Term', '2021-04-20 09:12:23');

-- --------------------------------------------------------

--
-- Table structure for table `weeklyattendance`
--

DROP TABLE IF EXISTS `weeklyattendance`;
CREATE TABLE IF NOT EXISTS `weeklyattendance` (
  `attendanceID` int NOT NULL AUTO_INCREMENT,
  `studentID` int NOT NULL,
  `classID` int NOT NULL,
  `sessionID` int NOT NULL,
  `termID` int NOT NULL,
  `week` int NOT NULL,
  `mon` int NOT NULL,
  `tues` int NOT NULL,
  `wed` int NOT NULL,
  `thurs` int NOT NULL,
  `fri` int NOT NULL,
  `total` int NOT NULL,
  `dateTaken` datetime DEFAULT NULL,
  PRIMARY KEY (`attendanceID`)
) ENGINE=MyISAM AUTO_INCREMENT=110 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `weeklyattendance`
--

INSERT INTO `weeklyattendance` (`attendanceID`, `studentID`, `classID`, `sessionID`, `termID`, `week`, `mon`, `tues`, `wed`, `thurs`, `fri`, `total`, `dateTaken`) VALUES
(68, 15, 1, 1, 1, 2, 2, 2, 2, 0, 2, 8, '2021-04-21 09:49:41'),
(69, 14, 1, 1, 1, 2, 2, 2, 0, 2, 0, 6, '2021-04-21 09:49:41'),
(70, 16, 1, 1, 1, 2, 2, 2, 2, 2, 2, 10, '2021-04-21 09:49:41'),
(71, 17, 1, 1, 1, 2, 2, 2, 0, 2, 2, 8, '2021-04-21 09:49:41'),
(72, 15, 1, 1, 1, 1, 2, 2, 2, 2, 2, 10, '2021-04-21 08:40:19'),
(73, 14, 1, 1, 1, 1, 2, 0, 2, 2, 0, 6, '2021-04-21 08:40:19'),
(74, 16, 1, 1, 1, 1, 2, 2, 0, 2, 2, 8, '2021-04-21 08:40:19'),
(75, 17, 1, 1, 1, 1, 0, 2, 2, 2, 2, 8, '2021-04-21 08:40:19'),
(76, 15, 1, 1, 2, 1, 2, 2, 2, 2, 2, 10, '2021-04-21 08:51:24'),
(77, 14, 1, 1, 2, 1, 2, 2, 2, 2, 2, 10, '2021-04-21 08:51:24'),
(78, 16, 1, 1, 2, 1, 0, 2, 2, 2, 2, 8, '2021-04-21 08:51:24'),
(79, 17, 1, 1, 2, 1, 2, 2, 0, 2, 2, 8, '2021-04-21 08:51:24'),
(80, 15, 1, 1, 2, 2, 2, 2, 2, 2, 2, 10, '2021-04-21 08:51:39'),
(81, 14, 1, 1, 2, 2, 2, 2, 2, 2, 2, 10, '2021-04-21 08:51:39'),
(82, 16, 1, 1, 2, 2, 0, 2, 2, 2, 2, 8, '2021-04-21 08:51:39'),
(83, 17, 1, 1, 2, 2, 2, 2, 0, 2, 2, 8, '2021-04-21 08:51:39'),
(84, 15, 1, 1, 3, 1, 2, 2, 2, 0, 0, 6, '2021-04-21 08:52:17'),
(85, 14, 1, 1, 3, 1, 2, 2, 0, 0, 0, 4, '2021-04-21 08:52:17'),
(86, 16, 1, 1, 3, 1, 2, 2, 2, 0, 0, 6, '2021-04-21 08:52:17'),
(87, 17, 1, 1, 3, 1, 0, 2, 2, 0, 0, 4, '2021-04-21 08:52:18'),
(88, 15, 1, 1, 3, 2, 2, 2, 2, 2, 2, 10, '2021-04-21 08:52:49'),
(89, 14, 1, 1, 3, 2, 2, 2, 0, 2, 0, 6, '2021-04-21 08:52:49'),
(90, 16, 1, 1, 3, 2, 2, 2, 2, 2, 0, 8, '2021-04-21 08:52:49'),
(91, 17, 1, 1, 3, 2, 2, 2, 2, 2, 2, 10, '2021-04-21 08:52:49'),
(92, 12, 2, 1, 1, 1, 2, 2, 2, 2, 0, 8, '2021-04-21 09:15:58'),
(93, 13, 2, 1, 1, 1, 2, 2, 2, 0, 0, 6, '2021-04-21 09:15:58'),
(94, 11, 2, 1, 1, 1, 2, 2, 2, 0, 2, 8, '2021-04-21 09:15:58'),
(95, 12, 2, 1, 1, 2, 2, 2, 2, 2, 2, 10, '2021-04-21 09:16:10'),
(96, 13, 2, 1, 1, 2, 2, 2, 2, 2, 2, 10, '2021-04-21 09:16:10'),
(97, 11, 2, 1, 1, 2, 2, 2, 2, 2, 2, 10, '2021-04-21 09:16:10'),
(98, 12, 2, 1, 2, 1, 2, 2, 2, 0, 2, 8, '2021-04-21 09:16:32'),
(99, 13, 2, 1, 2, 1, 2, 2, 2, 0, 0, 6, '2021-04-21 09:16:32'),
(100, 11, 2, 1, 2, 1, 0, 2, 2, 0, 2, 6, '2021-04-21 09:16:32'),
(101, 12, 2, 1, 2, 2, 2, 2, 2, 2, 2, 10, '2021-04-21 09:16:47'),
(102, 13, 2, 1, 2, 2, 2, 2, 2, 2, 2, 10, '2021-04-21 09:16:47'),
(103, 11, 2, 1, 2, 2, 2, 2, 2, 2, 2, 10, '2021-04-21 09:16:47'),
(104, 12, 2, 1, 3, 1, 2, 2, 2, 0, 0, 6, '2021-04-21 09:17:08'),
(105, 13, 2, 1, 3, 1, 2, 0, 0, 2, 2, 6, '2021-04-21 09:17:08'),
(106, 11, 2, 1, 3, 1, 2, 2, 2, 0, 2, 8, '2021-04-21 09:17:08'),
(107, 12, 2, 1, 3, 2, 0, 2, 2, 2, 2, 8, '2021-04-21 09:17:21'),
(108, 13, 2, 1, 3, 2, 2, 2, 2, 2, 2, 10, '2021-04-21 09:17:21'),
(109, 11, 2, 1, 3, 2, 2, 2, 2, 0, 2, 8, '2021-04-21 09:17:21');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
