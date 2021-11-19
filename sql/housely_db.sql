-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 19, 2021 at 06:38 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `housely_db`
--
CREATE DATABASE IF NOT EXISTS `housely_db` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `housely_db`;

DELIMITER $$
--
-- Procedures
--
DROP PROCEDURE IF EXISTS `details`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `details` (IN `cus_id` INT(11) UNSIGNED)  SELECT rc.roomPrice, rc.parkingPrice, rc.internetPrice, rr.electricityUnit, rr.waterUnit, c.custName, b.paidStatus
            FROM roomrecord rr, roomcontract rc, customer c, bill b
            WHERE rr.roomNum = rc.roomNum AND
                rc.custID = c.custID AND
                c.custID = cus_id AND
                b.rcontID = rc.rcontID$$

DROP PROCEDURE IF EXISTS `paybill`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `paybill` (IN `rcpt` VARCHAR(250), IN `cus_id` INT(11) UNSIGNED)  UPDATE bill SET evidenceurl = rcpt 
where rContID = (SELECT DISTINCT r.rContID 
                 FROM customer c, roomcontract r, bill b
                 WHERE c.custID = r.custID AND
                       r.rContID = b.rContID AND
                       c.custID = cus_id)$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `AdminID` int(11) NOT NULL,
  `AdminFN` varchar(100) NOT NULL,
  `AdminEmail` varchar(100) NOT NULL,
  `AdminUsername` varchar(100) NOT NULL,
  `AdminPass` varchar(100) NOT NULL,
  `AdminUpdationDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`AdminID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`AdminID`, `AdminFN`, `AdminEmail`, `AdminUsername`, `AdminPass`, `AdminUpdationDate`) VALUES
(1, 'Tandin Dorji', '6222790428@g.siit.tu.ac.th', 'Admin', '21232f297a57a5a743894a0e4a801fc3', '2021-10-11 06:32:07'),
(2, 'Kanokkarn Pinkeaw', '6222790147@g.siit.tu.ac.th', 'Admin2', '21232f297a57a5a743894a0e4a801fc3', '2021-10-10 09:35:17');


-- --------------------------------------------------------

--
-- Table structure for table `availrooms`
--

DROP TABLE IF EXISTS `availrooms`;
CREATE TABLE IF NOT EXISTS `availrooms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `totalrooms` int(11) NOT NULL,
  `availrooms` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `availrooms`
--

INSERT INTO `availrooms` (`id`, `totalrooms`, `availrooms`) VALUES
(1, 30, 20);

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

DROP TABLE IF EXISTS `bill`;
CREATE TABLE IF NOT EXISTS `bill` (
  `BillID` int(11) NOT NULL AUTO_INCREMENT,
  `staffID` int(11) NOT NULL,
  `rContID` int(11) NOT NULL,
  `billIssueDate` datetime NOT NULL,
  `Total` decimal(10,2) NOT NULL,
  `roomNum` int(11) NOT NULL,
  `PaidStatus` tinyint(1) NOT NULL,
  `evidenceurl` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`BillID`)
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`BillID`, `staffID`, `rContID`, `billIssueDate`, `Total`, `roomNum`, `PaidStatus`, `evidenceurl`) VALUES
(56, 1, 1, '2021-10-11 20:14:32', '6850.00', 1101, 1, '779186cc3612065f89ceb473c35c3c2a1637339200.jpg'),
(57, 1, 2, '2021-10-11 20:14:32', '13925.00', 1102, 0, NULL),
(58, 1, 3, '2021-10-11 20:14:32', '10375.00', 1103, 1, '5c66b067b039d58c7a530b9b126af9b81634068434.jpg'),
(59, 1, 4, '2021-10-11 20:14:32', '9380.00', 1104, 1, '009b4cb744577d43c59c5dd35df8b9b61637342807.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `bookedservice`
--

DROP TABLE IF EXISTS `bookedservice`;
CREATE TABLE IF NOT EXISTS `bookedservice` (
  `servBookID` int(11) NOT NULL,
  `servID` int(11) NOT NULL,
  `custID` int(11) NOT NULL,
  `staffID` int(11) NOT NULL,
  `roomNum` int(11) NOT NULL,
  `servPrice` decimal(10,2) NOT NULL,
  `servStatus` tinyint(1) NOT NULL,
  `servDate` date DEFAULT NULL,
  `servTime` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bookedservice`
--

INSERT INTO `bookedservice` (`servBookID`, `servID`, `custID`, `staffID`, `roomNum`, `servPrice`, `servStatus`, `servDate`, `servTime`) VALUES
(1, 1, 1, 2, 1101, '0.00', 1, '2021-10-04', '13:00:00'),
(2, 2, 2, 3, 1102, '500.00', 0, '2021-10-05', '12:00:00'),
(4, 1, 4, 0, 1104, '0.00', 0, '2021-11-19', '13:30:00'),
(0, 1, 15, 0, 1120, '0.00', 1, '2021-11-21', '09:31:00');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE IF NOT EXISTS `customer` (
  `custID` int(11) NOT NULL AUTO_INCREMENT,
  `custName` varchar(100) NOT NULL,
  `custTele` varchar(10) NOT NULL,
  `custEmail` varchar(100) NOT NULL,
  `custPass` varchar(250) NOT NULL,
  `custAddr` varchar(250) NOT NULL,
  PRIMARY KEY (`custID`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`custID`, `custName`, `custTele`, `custEmail`, `custPass`, `custAddr`) VALUES
(1, 'Hong Pink', '1243256578', 'hong@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'Patumthani,Thailand'),
(2, 'Emotional Oranges', '0976369898', 'k@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'Korat,Thailand'),
(3, 'Taylor Swift', '0826218523', 't@g.siit.tu.ac.th', '81dc9bdb52d04dc20036dbd8313ed055', 'Chaingmai,thailand'),
(4, 'Conan Gray', '0973369919', 'hh@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'Trang,Thailand'),
(5, 'halahong', '0973366359', 'i@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'Khonkean,thailand'),
(6, 'Zac Effron', '112345678', 'ze@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'Somewhere West'),
(7, 'kanokkarn pinkeaw', '0973369919', 'hh2555555@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'korat,thailand'),
(12, 'kanokkarn pinkeaw', '0973369919', 'honghong@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'korat,thailand'),
(13, 'honghonghong', '0973369919', 'h2@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'korat,thailand'),
(15, 'kanokkarn pinkeaw', '0973369919', 'honghong@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'korat,thailand');

--
-- Triggers `customer`
--
DROP TRIGGER IF EXISTS `updaterooms`;
DELIMITER $$
CREATE TRIGGER `updaterooms` BEFORE INSERT ON `customer` FOR EACH ROW BEGIN
	UPDATE availrooms SET availrooms=availrooms-1 WHERE id=1;
END
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `updaterooms2`;
DELIMITER $$
CREATE TRIGGER `updaterooms2` BEFORE DELETE ON `customer` FOR EACH ROW BEGIN
	UPDATE availrooms SET availrooms=availrooms+1 WHERE id=1;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `roomcontract`
--

DROP TABLE IF EXISTS `roomcontract`;
CREATE TABLE IF NOT EXISTS `roomcontract` (
  `rContID` int(11) NOT NULL,
  `staffID` int(11) NOT NULL,
  `custID` int(11) NOT NULL,
  `roomNum` int(11) NOT NULL,
  `contSDate` date NOT NULL,
  `contEDate` date NOT NULL,
  `roomPrice` decimal(10,2) NOT NULL,
  `parkingPrice` decimal(10,2) NOT NULL,
  `InternetPrice` decimal(10,2) NOT NULL,
  `elecunitprice` int(11) NOT NULL DEFAULT 8,
  `waterunitprice` int(11) NOT NULL DEFAULT 35,
  PRIMARY KEY (`rContID`),
  KEY `fk_1` (`custID`),
  KEY `fk_9` (`staffID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roomcontract`
--

INSERT INTO `roomcontract` (`rContID`, `staffID`, `custID`, `roomNum`, `contSDate`, `contEDate`, `roomPrice`, `parkingPrice`, `InternetPrice`, `elecunitprice`, `waterunitprice`) VALUES
(1, 1, 1, 1101, '2020-11-06', '2021-11-06', '4500.00', '500.00', '0.00', 8, 35),
(2, 1, 2, 1102, '2020-11-25', '2021-11-25', '5500.00', '0.00', '600.00', 8, 35),
(3, 1, 3, 1103, '2020-12-25', '2021-12-25', '5500.00', '500.00', '600.00', 8, 35),
(4, 1, 4, 1104, '2020-12-25', '2021-12-25', '6000.00', '0.00', '0.00', 8, 35);

-- --------------------------------------------------------

--
-- Table structure for table `roomrecord`
--

DROP TABLE IF EXISTS `roomrecord`;
CREATE TABLE IF NOT EXISTS `roomrecord` (
  `roomrecID` int(11) NOT NULL,
  `roomNum` int(11) NOT NULL,
  `electricityUnit` int(11) NOT NULL,
  `waterUnit` int(11) NOT NULL,
  `dRecord` date NOT NULL,
  PRIMARY KEY (`roomrecID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roomrecord`
--

INSERT INTO `roomrecord` (`roomrecID`, `roomNum`, `electricityUnit`, `waterUnit`, `dRecord`) VALUES
(1, 1101, 32, 3, '2021-09-04'),
(2, 1102, 139, 6, '2021-09-04'),
(3, 1103, 49, 36, '2021-09-04'),
(4, 1104, 56, 10, '2021-09-04');

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

DROP TABLE IF EXISTS `service`;
CREATE TABLE IF NOT EXISTS `service` (
  `servID` int(11) NOT NULL AUTO_INCREMENT,
  `servCataID` varchar(11) NOT NULL,
  `servName` varchar(100) NOT NULL,
  `servDesc` varchar(250) NOT NULL,
  `servthumbnail` varchar(250) NOT NULL,
  PRIMARY KEY (`servID`),
  KEY `fk` (`servCataID`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`servID`, `servCataID`, `servName`, `servDesc`, `servthumbnail`) VALUES
(1, '1', 'Drywall Repair', 'Cracks from settling, Damage from moisture and Regular wear and tear', 'f2887e554dfd0655877c79e52c7d9efb1633766894jpeg'),
(2, '2', 'Bahtroom Cleaning', 'Includes: Sanitizing Counters and Sinks, Scrubbing Toilets, Cleaning Showers, Mopping Floors, Wiping Down Mirrors', '15e9226f3e918d0de51d9912cea8e9d21633766734jpeg'),
(3, '2', 'Room Cleaning', 'getting your room as clean as it can be', 'fd3a19aa3f3de485a7f628b8aaa4c71e1633766984jpeg'),
(4, '4', 'Market Delivery ', 'Freshly handpicked groceries at your fingertips', '565f28272fc98e0ebb4119182124a54a1633767277jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `servicecatagory`
--

DROP TABLE IF EXISTS `servicecatagory`;
CREATE TABLE IF NOT EXISTS `servicecatagory` (
  `servCataID` varchar(11) NOT NULL,
  `servCataName` varchar(100) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`servCataID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `servicecatagory`
--

INSERT INTO `servicecatagory` (`servCataID`, `servCataName`, `status`) VALUES
('1', 'Mechanical Service', 1),
('2', 'Cleaning Service', 1),
('3', 'Moving Service', 1),
('4', 'Delivery Service', 1);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

DROP TABLE IF EXISTS `staff`;
CREATE TABLE IF NOT EXISTS `staff` (
  `StaffID` int(11) NOT NULL AUTO_INCREMENT,
  `StaffName` varchar(100) NOT NULL,
  `StaffTele` varchar(10) NOT NULL,
  `StaffEmail` varchar(100) NOT NULL,
  `StaffAddr` varchar(250) NOT NULL,
  `StaffSalary` decimal(10,2) NOT NULL,
  `staffContractStart` date NOT NULL,
  PRIMARY KEY (`StaffID`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`StaffID`, `StaffName`, `StaffTele`, `StaffEmail`, `StaffAddr`, `StaffSalary`, `staffContractStart`) VALUES
(1, 'Jay Park eiei', '0614968260', 'JayP@housely.com', '164 Nuzum Court, Arcade, New York, USA, 14009', '30000.00', '2019-10-16'),
(2, 'Groovy Room', '0914942447', 'GroovyEverywhere@housely.com', '575 Lightning Point Drive,Memphis,Tennessee, USA, 38110', '46000.00', '2017-09-29'),
(3, 'LeeHi', '0975239612', 'LeeHi@housely.com', '2637 Shobe Lane, RALEIGH, North Carolina, USA, 27609', '50000.00', '2019-07-04'),
(4, 'Hoody\r\n', '0647121390', 'Hoody@housely.com', '3205 Snyder Avenue, Charlotte, North Carolina, 28273', '18000.00', '2021-10-04'),
(10, 'sljfiehflke', '1ererer', 't@gmail.com', 'Khlong Luang', '9932359.00', '2021-09-28'),
(12, 'tandyn', '0564872531', 'tandyn@gmail.com', 'bkk', '99999999.99', '2021-11-20');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
