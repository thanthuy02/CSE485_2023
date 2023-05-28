-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.11.2-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for attendance-management
CREATE DATABASE IF NOT EXISTS `attendance-management` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `attendance-management`;

-- Dumping structure for table attendance-management.account
CREATE TABLE IF NOT EXISTS `account` (
  `accID` varchar(50) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `passwordAcc` varchar(50) DEFAULT NULL,
  `role` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`accID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table attendance-management.account: ~4 rows (approximately)
/*!40000 ALTER TABLE `account` DISABLE KEYS */;
INSERT INTO `account` (`accID`, `email`, `passwordAcc`, `role`) VALUES
	('inst01', 'thichthihoc@ktz.edu.vn', 'cse2023', 'instructor'),
	('std01', 'arankling0@sakura.ne.jp', 'cse2023', 'student'),
	('std02', 'aolenikov1@mtv.com', 'cse2023', 'student'),
	('std03', 'gvasyuchov2@wordpress.org', 'cse2023', 'student');
/*!40000 ALTER TABLE `account` ENABLE KEYS */;

-- Dumping structure for table attendance-management.assignment
CREATE TABLE IF NOT EXISTS `assignment` (
  `instID` int(11) NOT NULL,
  `subjID` int(11) NOT NULL,
  `startDate` date NOT NULL,
  `endDate` date NOT NULL,
  KEY `instID` (`instID`),
  KEY `subjID` (`subjID`),
  CONSTRAINT `instID` FOREIGN KEY (`instID`) REFERENCES `instructor` (`instID`),
  CONSTRAINT `subjID` FOREIGN KEY (`subjID`) REFERENCES `subject` (`subjID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table attendance-management.assignment: ~1 rows (approximately)
/*!40000 ALTER TABLE `assignment` DISABLE KEYS */;
INSERT INTO `assignment` (`instID`, `subjID`, `startDate`, `endDate`) VALUES
	(1, 1, '2023-04-01', '2023-06-01');
/*!40000 ALTER TABLE `assignment` ENABLE KEYS */;

-- Dumping structure for table attendance-management.attendance
CREATE TABLE IF NOT EXISTS `attendance` (
  `stdID` int(11) DEFAULT NULL,
  `subjID` int(11) DEFAULT NULL,
  `dateAttend` date DEFAULT NULL,
  `state` tinyint(1) DEFAULT NULL,
  KEY `stdID` (`stdID`),
  KEY `subjID` (`subjID`),
  CONSTRAINT `attendance_ibfk_1` FOREIGN KEY (`stdID`) REFERENCES `student` (`stdID`),
  CONSTRAINT `attendance_ibfk_2` FOREIGN KEY (`subjID`) REFERENCES `subject` (`subjID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table attendance-management.attendance: ~9 rows (approximately)
/*!40000 ALTER TABLE `attendance` DISABLE KEYS */;
INSERT INTO `attendance` (`stdID`, `subjID`, `dateAttend`, `state`) VALUES
	(1, 1, '2023-04-01', 0),
	(2, 1, '2023-04-01', 0),
	(3, 1, '2023-04-01', 0),
	(1, 1, '2023-04-08', 0),
	(2, 1, '2023-04-08', 0),
	(3, 1, '2023-04-08', 0),
	(1, 1, '2023-04-15', 0),
	(2, 1, '2023-04-15', 0),
	(3, 1, '2023-04-15', 0);
/*!40000 ALTER TABLE `attendance` ENABLE KEYS */;

-- Dumping structure for table attendance-management.instructor
CREATE TABLE IF NOT EXISTS `instructor` (
  `instID` int(11) NOT NULL AUTO_INCREMENT,
  `instName` varchar(50) DEFAULT NULL,
  `instEmail` varchar(50) DEFAULT NULL,
  `instPhone` char(15) DEFAULT NULL,
  `accID` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`instID`),
  KEY `accID` (`accID`),
  CONSTRAINT `accID` FOREIGN KEY (`accID`) REFERENCES `account` (`accID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table attendance-management.instructor: ~1 rows (approximately)
/*!40000 ALTER TABLE `instructor` DISABLE KEYS */;
INSERT INTO `instructor` (`instID`, `instName`, `instEmail`, `instPhone`, `accID`) VALUES
	(1, 'Dung Kieu Tuan', 'thichthihoc@ktz.edu.vn', '999989071', 'inst01');
/*!40000 ALTER TABLE `instructor` ENABLE KEYS */;

-- Dumping structure for table attendance-management.student
CREATE TABLE IF NOT EXISTS `student` (
  `stdID` int(11) NOT NULL AUTO_INCREMENT,
  `stdName` varchar(50) DEFAULT NULL,
  `stdClass` char(10) DEFAULT NULL,
  `stdEmail` varchar(50) DEFAULT NULL,
  `stdPhone` char(15) DEFAULT NULL,
  `accID` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`stdID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table attendance-management.student: ~3 rows (approximately)
/*!40000 ALTER TABLE `student` DISABLE KEYS */;
INSERT INTO `student` (`stdID`, `stdName`, `stdClass`, `stdEmail`, `stdPhone`, `accID`) VALUES
	(1, 'Alana Rankling', '62THNB', 'arankling0@sakura.ne.jp', '9778289071', 'std01'),
	(2, 'Antone Olenikov', '62TH', 'aolenikov1@mtv.com', '7861141002', 'std02'),
	(3, 'Ginevra Vasyuchov', '62THNB', 'gvasyuchov2@wordpress.org', '215441458', 'std03');
/*!40000 ALTER TABLE `student` ENABLE KEYS */;

-- Dumping structure for table attendance-management.subject
CREATE TABLE IF NOT EXISTS `subject` (
  `subjID` int(11) NOT NULL AUTO_INCREMENT,
  `subjName` varchar(50) DEFAULT NULL,
  `semester` int(11) DEFAULT NULL,
  `period` int(11) DEFAULT NULL,
  PRIMARY KEY (`subjID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table attendance-management.subject: ~0 rows (approximately)
/*!40000 ALTER TABLE `subject` DISABLE KEYS */;
INSERT INTO `subject` (`subjID`, `subjName`, `semester`, `period`) VALUES
	(1, 'Cong nghe web 6-22 (62THNB, 62TH1)', 6, 2);
/*!40000 ALTER TABLE `subject` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
