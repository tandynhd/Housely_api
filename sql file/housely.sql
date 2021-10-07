-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 06, 2021 at 03:05 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `housely`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_FullName` varchar(100) DEFAULT NULL,
  `admin_Email` varchar(120) DEFAULT NULL,
  `admin_UserName` varchar(100) NOT NULL,
  `admin_Password` varchar(100) NOT NULL,
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` VALUES
(1, 'Hong', 'hong@gmail.com', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `bills`
--

-- CREATE TABLE `bills` (
--   `id` int(11) NOT NULL,
--   `PublisherName` varchar(159) DEFAULT NULL,
--   `creationDate` timestamp NULL DEFAULT current_timestamp(),
--   `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
-- ) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --
-- -- Dumping data for table `bills`
-- --

-- INSERT INTO `bills` (`id`, `PublisherName`, `creationDate`, `UpdationDate`) VALUES
-- (1, 'SPVI', '2017-07-08 05:49:09', '2020-11-23 08:02:58'),
-- (2, 'ARSD', '2017-07-08 07:30:23', '2020-11-23 08:03:06'),
-- (14, 'COVID19', '2020-11-07 06:52:44', '2020-11-23 08:03:15'),
-- (15, 'Pentagon', '2020-11-07 07:08:19', '2020-11-23 08:03:40');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_Name` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` VALUES
(1, 'Home Delivery'),
(2, 'Cleaning'),
(3, 'Maintenance');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `cust_id` int(11) NOT NULL,
  `cust_FullName` varchar(120) DEFAULT NULL,
  `cust_EmailId` varchar(120) DEFAULT NULL,
  `cust_MobileNumber` char(11) DEFAULT NULL,
  `cust_Password` varchar(120) DEFAULT NULL,
  `cust_Status` int(1) DEFAULT NULL,
  `cust_RegDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` VALUES
(1, 'SID001', 'John Cena', 'csfsd@dfsfks.com', '8569710025', '92228410fc8b872914e023160cf4ae8f', 1, '2017-07-11 15:41:27'),
;

-- --------------------------------------------------------

--
-- Table structure for table `issuedservices`
--

CREATE TABLE `issuedServices` (
  `iServ_id` int(11) NOT NULL,
  `iServ_customerID` varchar(150) DEFAULT NULL,
  `iServ_IssuedDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `issuedservices`
--

INSERT INTO `issuedservices`  VALUES
(1, 'SID001', '2017-07-15 10:59:26'),
--
-- Triggers `issuedservices`
--
DELIMITER $$
CREATE TRIGGER `insertissuenoofbooks` BEFORE INSERT ON `issuedservices` FOR EACH ROW BEGIN
	UPDATE books SET no_of_books=no_of_books-1 WHERE id=NEW.BookId;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `updateissuenoofbooks` BEFORE UPDATE ON `issuedservices` FOR EACH ROW BEGIN
	UPDATE books SET no_of_books=no_of_books+1 WHERE id=NEW.BookId;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `reserveddetails`
--

CREATE TABLE `reserveddetails` (
  `id` int(11) NOT NULL,
  `BookId` int(11) DEFAULT NULL,
  `StudentID` varchar(150) DEFAULT NULL,
  `ReservedDate` timestamp NULL DEFAULT current_timestamp(),
  `ReservationCanceledDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `ReservationStatus` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reserveddetails`
--

INSERT INTO `reserveddetails` (`id`, `BookId`, `StudentID`, `ReservedDate`, `ReservationCanceledDate`, `ReservationStatus`) VALUES
(7, 5, 'SID012', '2020-11-03 17:19:25', '2020-11-04 03:58:45', 1),
(18, 10, 'SID012', '2020-11-03 18:32:11', '2020-11-07 06:00:43', 1),
(19, 6, 'SID012', '2020-11-03 18:33:30', '2020-11-04 03:58:23', 1),
(20, 6, 'SID012', '2020-11-03 18:35:00', '2020-11-04 04:00:48', 1),
(29, 6, 'SID012', '2020-11-07 11:59:05', '2020-11-07 11:59:23', 1),
(34, 6, 'SID012', '2020-11-07 13:25:39', '2020-11-07 13:28:56', 1),
(35, 5, 'SID012', '2020-11-07 13:29:32', '2020-11-07 13:31:54', 1),
(36, 6, 'SID012', '2020-11-07 13:33:46', '2020-11-07 13:34:19', 1),
(38, 11, 'SID012', '2020-11-07 13:57:11', NULL, NULL),
(44, 5, 'SID012', '2020-11-07 14:39:19', NULL, NULL),
(47, 21, 'SID012', '2020-11-13 21:20:39', '2020-11-13 21:20:51', 1),
(48, 20, 'SID012', '2020-11-13 21:23:08', '2020-11-13 21:23:58', 1),
(51, 19, 'SID012', '2020-11-16 04:13:12', '2020-11-16 04:13:34', 1),
(54, 20, 'SID012', '2020-11-18 12:53:47', '2020-11-18 17:09:56', 1),
(57, 20, 'SID014', '2020-11-19 16:01:20', NULL, NULL),
(58, 26, 'SID014', '2020-11-19 16:02:19', NULL, NULL),
(62, 21, 'SID012', '2020-11-19 19:12:20', '2020-11-19 19:13:44', 1),
(63, 26, 'SID012', '2020-11-19 19:12:28', '2020-11-23 08:02:37', 1),
(64, 18, 'SID012', '2020-11-19 22:12:05', '2020-11-23 09:13:40', 1),
(65, 26, 'SID012', '2020-11-22 12:34:06', NULL, NULL),
(66, 26, 'SID012', '2020-11-22 12:34:16', NULL, NULL),
(67, 21, 'SID012', '2020-11-23 05:36:46', NULL, NULL),
(69, 18, 'SID012', '2020-11-23 07:11:19', '2020-11-23 07:11:56', 1),
(71, 25, 'SID012', '2020-11-23 07:27:52', '2020-11-23 07:28:38', 1),
(72, 24, 'SID012', '2020-11-23 08:53:22', '2020-11-23 09:12:35', 1),
(73, 24, 'SID012', '2020-11-23 10:09:29', NULL, NULL);

--
-- Triggers `reserveddetails`
--
DELIMITER $$
CREATE TRIGGER `deletereserve` BEFORE DELETE ON `reserveddetails` FOR EACH ROW BEGIN
	UPDATE students SET no_of_books_reserved=no_of_books_reserved-1 WHERE StudentId=OLD.StudentID;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `deletereservenoofbooks` BEFORE DELETE ON `reserveddetails` FOR EACH ROW BEGIN
	UPDATE books SET no_of_books=no_of_books+1 WHERE id=OLD.BookId;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `insertreserve` BEFORE INSERT ON `reserveddetails` FOR EACH ROW BEGIN
	UPDATE students SET no_of_books_reserved=no_of_books_reserved+1 WHERE StudentId=NEW.StudentID;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `insertreservenoofbooks` BEFORE INSERT ON `reserveddetails` FOR EACH ROW BEGIN
	UPDATE books SET no_of_books=no_of_books-1 WHERE id=NEW.BookId;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `updatereserve` BEFORE UPDATE ON `reserveddetails` FOR EACH ROW BEGIN
	UPDATE students SET no_of_books_reserved=no_of_books_reserved-1 WHERE StudentId=NEW.StudentID;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `updatereservenoofbooks` BEFORE UPDATE ON `reserveddetails` FOR EACH ROW BEGIN
	UPDATE books SET no_of_books=no_of_books+1 WHERE id=NEW.BookId;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `BookName` varchar(255) DEFAULT NULL,
  `CatId` int(11) DEFAULT NULL,
  `AuthorId` int(11) DEFAULT NULL,
  `PublisherId` int(11) DEFAULT NULL,
  `ISBNNumber` int(11) DEFAULT NULL,
  `No_of_books` int(11) DEFAULT NULL,
  `BookPrice` int(11) DEFAULT NULL,
  `RegDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `image` varchar(200) CHARACTER SET utf8mb4 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `BookName`, `CatId`, `AuthorId`, `PublisherId`, `ISBNNumber`, `No_of_books`, `BookPrice`, `RegDate`, `UpdationDate`, `image`) VALUES
(18, 'Home Science', 6, 2, 2, 61221, 13, 5, '2020-11-13 19:24:28', '2020-11-23 09:16:18', 'e4183c136de8ef759fdbedf26f63e8fa1606113283.jpg'),
(19, 'BRUTE', 6, 9, 1, 61222, 6, 10, '2020-11-13 19:25:04', '2020-11-23 07:24:38', '50def894867e8c37219a8b6726aa90321606116278.jpg'),
(20, 'Fatal Exchange', 5, 9, 1, 61223, 4, 9, '2020-11-13 19:26:26', '2020-11-23 07:25:20', 'aa726394a2efe682994902d64e4da9cb1606116320.jpg'),
(21, 'Five Feet Apart', 4, 2, 15, 61224, 2, 8, '2020-11-13 19:29:04', '2020-11-23 07:22:04', '97e155581053393205c5d68770a83f401606116124.jpg'),
(24, 'Julia\'s Story', 5, 2, 14, 412, 7, 5, '2020-11-13 21:09:26', '2020-11-23 10:09:29', 'a07cc880914047e5cfe030126834160c1606116166.jpg'),
(25, 'Norse Mythlogy', 6, 9, 14, 99999, 1, 63, '2020-11-13 21:19:51', '2020-11-23 07:36:12', '185c9a149aaf3e5ea9768d3bb7cf58a51606116972jpeg'),
(26, 'Sin Eater', 6, 2, 15, 1236, 4, 4, '2020-11-14 14:08:04', '2020-11-23 08:02:37', '90bddc74cf0350328c5ce6ae197bae7c1606116207.jpg'),
(27, 'DARK', 6, 2, 15, 1256, 12, 23, '2020-11-18 17:10:53', '2020-11-23 07:24:14', '55f6536dc96e9b8c0470e6ff6c0d78d01606116254.jpg'),
(28, 'A Boy In Winter', 4, 9, 14, 125, 13, 4, '2020-11-18 17:12:10', '2020-11-23 08:01:51', '1b51735c9fc676dc6fc18c561986cd0a1606116406.jpg'),
(29, 'The Little Mermaid', 4, 9, 1, 1212, 5, 10, '2020-11-23 06:24:14', '2020-11-23 07:29:31', 'defa8097ea7fc2523dca5313520dbda51606116571.jpg'),
(30, 'The King Of Drugs', 5, 14, 1, 1456, 5, 10, '2020-11-23 07:44:39', NULL, '2bf9fe16b1270547e6be8c130c89d0d41606117479.jpg'),
(31, 'RISE', 11, 13, 2, 45963, 20, 10, '2020-11-23 07:46:10', NULL, '44da2c55638d4e03b0d50c005082d0251606117570.jpg'),
(32, 'Mechanic', 13, 12, 2, 12345, 1235, 1, '2021-10-05 14:51:23', NULL, 'a00ac546244dd0097c3b6fe92f95756a1633445483.jpg'),
(33, 'Maid', 13, 9, 2, 123455, 213, 123, '2021-10-05 14:56:53', NULL, 'de9c2dab66d91decbc526c3c818e29481633445813.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` int(11) NOT NULL,
  `AuthorName` varchar(159) DEFAULT NULL,
  `creationDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `AuthorName`, `creationDate`, `UpdationDate`) VALUES
(2, 'Harry Potter', '2017-07-08 14:30:23', '2020-11-23 07:42:35'),
(9, 'Eminem', '2017-07-08 15:22:03', '2020-11-23 07:42:49'),
(11, 'Kevin Rollings', '2020-11-01 17:47:04', '2020-11-23 07:43:26'),
(12, 'David Blane', '2020-11-23 07:40:48', NULL),
(13, 'Donald Trump', '2020-11-23 07:40:59', NULL),
(14, 'Justin Bieber', '2020-11-23 07:41:20', NULL),
(15, 'Chris Gayle', '2020-11-23 07:42:17', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `StudentId` (`StudentId`);

--
-- Indexes for table `issuedservices`
--
ALTER TABLE `issuedservices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reserveddetails`
--
ALTER TABLE `reserveddetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bills`
--
ALTER TABLE `bills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `issuedservices`
--
ALTER TABLE `issuedservices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `reserveddetails`
--
ALTER TABLE `reserveddetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
