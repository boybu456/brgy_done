-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 15, 2023 at 04:10 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `brgy`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `ID` int(255) NOT NULL,
  `account_ID` int(255) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Account` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`ID`, `account_ID`, `Username`, `Password`, `Account`) VALUES
(1, 0, 'Kaye', 'Opinaldo', 'Resident'),
(18, 20, 'Wendell', 'Coronel', 'Resident'),
(19, 21, 'CJ', 'Bagtas', 'Resident'),
(20, 22, 'Ghianne', 'Sayana', 'Resident'),
(22, 24, 'Kaye', 'Opinaldo', 'Resident');

-- --------------------------------------------------------

--
-- Table structure for table `announcement`
--

CREATE TABLE `announcement` (
  `ID` int(255) NOT NULL,
  `header` varchar(255) NOT NULL,
  `paragraph` varchar(255) NOT NULL,
  `date` datetime(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `announcement`
--

INSERT INTO `announcement` (`ID`, `header`, `paragraph`, `date`) VALUES
(1, 'Announcement 2', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum aliquam accumsan felis dignissim semper. Curabitur malesuada, elit sit amet varius suscipit, sem mi suscipit nisl, quis pulvinar ante dolor blandit leo. Vivamus sollicitudin pharetra port', '2023-06-15 19:02:00.053297'),
(2, 'Announcement 1', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum aliquam accumsan felis dignissim semper. Curabitur malesuada, elit sit amet varius suscipit, sem mi suscipit nisl, quis pulvinar ante dolor blandit leo. Vivamus sollicitudin pharetra port', '2023-06-15 19:24:09.000000');

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `ID` int(255) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `requested` varchar(255) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `resident_ID` int(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`ID`, `Name`, `requested`, `date`, `resident_ID`, `status`) VALUES
(1, 'Ghianne Sayana', 'Burial Assistance', '2023-06-14', 22, 'Completed'),
(7, 'Ghianne Sayana', 'Certification for Employment', '2023-06-14', 22, 'Active'),
(8, 'Wendell Coronel', 'Barangay Clearance for Business Permit', '2023-06-14', 20, 'Active'),
(9, 'CJ Bagtas', 'Certification for Employment', '2023-06-14', 21, 'Active'),
(10, 'Ghianne Sayana', 'Certification for Employment', '2023-06-14', 22, 'Active'),
(11, 'CJ Bagtas', 'Barangay Clearance for Excavation', '2023-06-15', 21, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `residence`
--

CREATE TABLE `residence` (
  `ID` int(255) NOT NULL,
  `FirstName` varchar(255) NOT NULL,
  `LastName` varchar(255) NOT NULL,
  `ContactNumber` int(255) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `Birthday` date NOT NULL,
  `Age` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `residence`
--

INSERT INTO `residence` (`ID`, `FirstName`, `LastName`, `ContactNumber`, `Address`, `Gender`, `Birthday`, `Age`) VALUES
(20, 'Wendell', 'Coronel', 1594825, '9876245', 'Male', '2020-08-01', 2),
(21, 'CJ', 'Bagtas', 2147483647, 'cjcjlbj@gmail.com', 'Male', '2003-07-15', 19),
(22, 'Ghianne', 'Sayana', 2147483647, '1139 Int.1 Vargas St. Tondo, Manila', 'Female', '2002-07-24', 20),
(24, 'Kaye', 'Opinaldo', 555, 'Sa Tabing Dagat', 'Female', '2002-01-10', 21);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `announcement`
--
ALTER TABLE `announcement`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `residence`
--
ALTER TABLE `residence`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `announcement`
--
ALTER TABLE `announcement`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `residence`
--
ALTER TABLE `residence`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
