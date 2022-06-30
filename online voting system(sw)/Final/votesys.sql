-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2022 at 04:56 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `votesys`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Id` int(11) NOT NULL,
  `Passsword` varchar(50) CHARACTER SET utf8 NOT NULL,
  `UserName` varchar(50) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Id`, `Passsword`, `UserName`) VALUES
(1, '123', 'ahmad');

-- --------------------------------------------------------

--
-- Table structure for table `candidate`
--

CREATE TABLE `candidate` (
  `AdminId` int(11) NOT NULL,
  `ElectionId` int(11) NOT NULL,
  `FirstName` varchar(50) CHARACTER SET utf8 NOT NULL,
  `Id` int(11) NOT NULL,
  `LastName` varchar(50) CHARACTER SET utf8 NOT NULL,
  `Photo` varchar(50) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `candidate`
--

INSERT INTO `candidate` (`AdminId`, `ElectionId`, `FirstName`, `Id`, `LastName`, `Photo`) VALUES
(1, 55, 'ssssssssss', 1, 'dddddd', 'm.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `election`
--

CREATE TABLE `election` (
  `Id` int(11) NOT NULL,
  `Name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `EndDate` date NOT NULL,
  `AdminId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `election`
--

INSERT INTO `election` (`Id`, `Name`, `EndDate`, `AdminId`) VALUES
(3, 'hi', '0000-00-00', 1),
(44, 'yara', '2022-05-12', 1),
(55, 'kholuod', '2022-05-19', 1),
(56, 'gamal', '2022-05-05', 1);

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `Id` int(11) NOT NULL,
  `CandidateId` int(11) NOT NULL,
  `ElectionId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`) VALUES
(1, 'Admin'),
(2, 'Voter');

-- --------------------------------------------------------

--
-- Table structure for table `voter`
--

CREATE TABLE `voter` (
  `Id` int(11) NOT NULL,
  `FirstName` varchar(50) CHARACTER SET utf8 NOT NULL,
  `LastName` varchar(50) CHARACTER SET utf8 NOT NULL,
  `Password` varchar(50) CHARACTER SET utf8 NOT NULL,
  `Photo` varchar(50) CHARACTER SET utf8 NOT NULL,
  `AdminId` int(11) NOT NULL,
  `CandidateId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `voter`
--

INSERT INTO `voter` (`Id`, `FirstName`, `LastName`, `Password`, `Photo`, `AdminId`, `CandidateId`) VALUES
(6, 'kholoud', 'mohamed', '234', 'm.jpg', 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `candidate`
--
ALTER TABLE `candidate`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `Id` (`Id`) USING BTREE,
  ADD KEY `AdminId` (`AdminId`),
  ADD KEY `ElectionId` (`ElectionId`),
  ADD KEY `Id_2` (`Id`),
  ADD KEY `Id_3` (`Id`);

--
-- Indexes for table `election`
--
ALTER TABLE `election`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `AdminId` (`AdminId`);

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `CandidateId` (`CandidateId`),
  ADD KEY `ElectionId` (`ElectionId`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `voter`
--
ALTER TABLE `voter`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `AdminId` (`AdminId`),
  ADD KEY `CandidateId` (`CandidateId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `candidate`
--
ALTER TABLE `candidate`
  ADD CONSTRAINT `candidate_ibfk_1` FOREIGN KEY (`AdminId`) REFERENCES `admin` (`Id`),
  ADD CONSTRAINT `candidate_ibfk_2` FOREIGN KEY (`ElectionId`) REFERENCES `election` (`Id`);

--
-- Constraints for table `election`
--
ALTER TABLE `election`
  ADD CONSTRAINT `election_ibfk_1` FOREIGN KEY (`AdminId`) REFERENCES `admin` (`Id`);

--
-- Constraints for table `result`
--
ALTER TABLE `result`
  ADD CONSTRAINT `result_ibfk_1` FOREIGN KEY (`CandidateId`) REFERENCES `candidate` (`Id`),
  ADD CONSTRAINT `result_ibfk_2` FOREIGN KEY (`ElectionId`) REFERENCES `election` (`Id`);

--
-- Constraints for table `voter`
--
ALTER TABLE `voter`
  ADD CONSTRAINT `voter_ibfk_1` FOREIGN KEY (`AdminId`) REFERENCES `admin` (`Id`),
  ADD CONSTRAINT `voter_ibfk_2` FOREIGN KEY (`CandidateId`) REFERENCES `candidate` (`Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
