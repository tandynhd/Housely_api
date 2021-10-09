-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 09, 2021 at 04:25 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hously_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `AdminID` int(11) NOT NULL,
  `AdminFN` varchar(100) NOT NULL,
  `AdminEmail` varchar(100) NOT NULL,
  `AdminUsername` varchar(100) NOT NULL,
  `AdminPass` varchar(100) NOT NULL,
  `AdminUpdationDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`AdminID`, `AdminFN`, `AdminEmail`, `AdminUsername`, `AdminPass`, `AdminUpdationDate`) VALUES
(1, 'Tandin Dorji', '6222790428@g.siit.tu.ac.th', 'Admin', 'admin', '2021-10-08 04:45:02'),
(2, 'Kanokkarn Pinkeaw', '6222790147@g.siit.tu.ac.th', 'Admin2', 'admin', '2021-10-08 04:45:02');

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `BillID` int(11) NOT NULL,
  `staffID` int(11) NOT NULL,
  `roomID` int(11) NOT NULL,
  `billIssueDate` datetime NOT NULL,
  `billDueDate` datetime NOT NULL,
  `roomNum` int(11) NOT NULL,
  `PaidStatus` tinyint(1) NOT NULL,
  `evidenceurl` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `bookedservice`
--

CREATE TABLE `bookedservice` (
  `servBookID` int(11) NOT NULL,
  `servID` int(11) NOT NULL,
  `custID` int(11) NOT NULL,
  `staffID` int(11) NOT NULL,
  `roomNum` int(11) NOT NULL,
  `servPrice` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `custID` int(11) NOT NULL,
  `custName` varchar(100) NOT NULL,
  `custTele` varchar(10) NOT NULL,
  `custEmail` varchar(100) NOT NULL,
  `custPass` varchar(250) NOT NULL,
  `custAddr` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`custID`, `custName`, `custTele`, `custEmail`, `custPass`, `custAddr`) VALUES
(1, 'Didi Han', '0974289669', 'DidiH@gmail.com', '', '2021 Spring Avenue, Northampton, 	Pennsylvania, USA 18067'),
(2, 'Plastic Kid', '0676458040', 'PlasticK@gmail.com', '', '2195 Twin House Lane, MONTPELIER, Virginia, USA, 23192');

-- --------------------------------------------------------

--
-- Table structure for table `roomcontract`
--

CREATE TABLE `roomcontract` (
  `rContID` int(11) NOT NULL,
  `staffID` int(11) NOT NULL,
  `custID` int(11) NOT NULL,
  `roomNum` int(11) NOT NULL,
  `contSDate` date NOT NULL,
  `contEDate` date NOT NULL,
  `roomPrice` decimal(10,2) NOT NULL,
  `parkingPrice` decimal(10,2) NOT NULL,
  `InternetPrice` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `roomrecord`
--

CREATE TABLE `roomrecord` (
  `roomrecID` int(11) NOT NULL,
  `roomNum` int(11) NOT NULL,
  `electricityUnit` int(11) NOT NULL,
  `waterUnit` int(11) NOT NULL,
  `dRecord` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roomrecord`
--

INSERT INTO `roomrecord` (`roomrecID`, `roomNum`, `electricityUnit`, `waterUnit`, `dRecord`) VALUES
(1101, 0, 0, 0, '0000-00-00'),
(1102, 0, 0, 0, '0000-00-00'),
(1103, 0, 0, 0, '0000-00-00'),
(1104, 0, 0, 0, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `servID` int(11) NOT NULL,
  `servCataID` int(11) NOT NULL,
  `servDesc` varchar(250) NOT NULL,
  `servthumbnail` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `servicecatagory`
--

CREATE TABLE `servicecatagory` (
  `servCataID` int(11) NOT NULL,
  `servCataName` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `servicecatagory`
--

INSERT INTO `servicecatagory` (`servCataID`, `servCataName`) VALUES
(1, 'Mechanical Service'),
(2, 'Cleaning Service'),
(3, 'Moving Service'),
(4, 'Delivery Service');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `StaffID` int(11) NOT NULL,
  `StaffName` varchar(100) NOT NULL,
  `StaffTele` varchar(10) NOT NULL,
  `StaffEmail` varchar(100) NOT NULL,
  `StaffAddr` varchar(250) NOT NULL,
  `StaffSalary` decimal(10,2) NOT NULL,
  `staffContractStart` date NOT NULL,
  `ShiftStart` time NOT NULL,
  `ShiftEnd` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`StaffID`, `StaffName`, `StaffTele`, `StaffEmail`, `StaffAddr`, `StaffSalary`, `staffContractStart`, `ShiftStart`, `ShiftEnd`) VALUES
(1, 'Jay Park', '0614968260', 'JayP@housely.com', '164 Nuzum Court, Arcade, New York, USA, 14009', '30000.00', '2019-10-16', '09:00:00', '16:00:00'),
(2, 'Groovy Room', '0914942447', 'GroovyEverywhere@housely.com', '575 Lightning Point Drive,Memphis,Tennessee, USA, 38110', '46000.00', '2017-09-29', '10:00:00', '17:00:00'),
(3, 'LeeHi', '0975239612', 'LeeHi@housely.com', '2637 Shobe Lane, RALEIGH, North Carolina, USA, 27609', '50000.00', '2019-07-04', '05:00:00', '14:00:00'),
(4, 'Hoody\r\n', '0647121390', 'Hoody@housely.com', '3205 Snyder Avenue, Charlotte, North Carolina, 28273', '18000.00', '2021-10-04', '09:00:00', '16:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`AdminID`);

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`BillID`),
  ADD KEY `fk_2` (`roomID`),
  ADD KEY `fk_3` (`staffID`);

--
-- Indexes for table `bookedservice`
--
ALTER TABLE `bookedservice`
  ADD PRIMARY KEY (`servBookID`),
  ADD KEY `fk_10` (`custID`),
  ADD KEY `fk_11` (`servID`),
  ADD KEY `fk_12` (`staffID`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`custID`);

--
-- Indexes for table `roomcontract`
--
ALTER TABLE `roomcontract`
  ADD PRIMARY KEY (`rContID`),
  ADD KEY `fk_1` (`custID`),
  ADD KEY `fk_9` (`staffID`);

--
-- Indexes for table `roomrecord`
--
ALTER TABLE `roomrecord`
  ADD PRIMARY KEY (`roomrecID`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`servID`),
  ADD KEY `fk` (`servCataID`);

--
-- Indexes for table `servicecatagory`
--
ALTER TABLE `servicecatagory`
  ADD PRIMARY KEY (`servCataID`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`StaffID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bill`
--
ALTER TABLE `bill`
  ADD CONSTRAINT `fk_2` FOREIGN KEY (`roomID`) REFERENCES `roomrecord` (`roomrecID`),
  ADD CONSTRAINT `fk_3` FOREIGN KEY (`staffID`) REFERENCES `staff` (`StaffID`);

--
-- Constraints for table `bookedservice`
--
ALTER TABLE `bookedservice`
  ADD CONSTRAINT `fk_10` FOREIGN KEY (`custID`) REFERENCES `customer` (`custID`),
  ADD CONSTRAINT `fk_11` FOREIGN KEY (`servID`) REFERENCES `service` (`servID`),
  ADD CONSTRAINT `fk_12` FOREIGN KEY (`staffID`) REFERENCES `staff` (`StaffID`);

--
-- Constraints for table `roomcontract`
--
ALTER TABLE `roomcontract`
  ADD CONSTRAINT `fk_1` FOREIGN KEY (`custID`) REFERENCES `customer` (`custID`),
  ADD CONSTRAINT `fk_9` FOREIGN KEY (`staffID`) REFERENCES `staff` (`StaffID`);

--
-- Constraints for table `service`
--
ALTER TABLE `service`
  ADD CONSTRAINT `fk` FOREIGN KEY (`servCataID`) REFERENCES `servicecatagory` (`servCataID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
