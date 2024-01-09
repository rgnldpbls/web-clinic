-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 09, 2024 at 03:46 PM
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
-- Database: `dbclinic`
--

-- --------------------------------------------------------

--
-- Table structure for table `medhistory`
--

CREATE TABLE `medhistory` (
  `mdHist_Id` int(11) NOT NULL,
  `md_Attention` varchar(3) NOT NULL,
  `md_Illness` varchar(350) DEFAULT NULL,
  `md_AllergiesFoods` varchar(50) DEFAULT NULL,
  `md_AllergiesMeds` varchar(50) DEFAULT NULL,
  `ph_Smoking` varchar(3) NOT NULL,
  `ph_Alcohol` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `patient_Id` int(11) NOT NULL,
  `patient_Pic` longblob DEFAULT NULL,
  `patient_Name` varchar(50) NOT NULL,
  `patient_Address` varchar(250) NOT NULL,
  `patient_City` varchar(20) NOT NULL,
  `patient_Age` int(11) NOT NULL,
  `patient_Birthdate` date NOT NULL,
  `patient_Sex` varchar(6) NOT NULL,
  `patient_ContactNo` varchar(15) NOT NULL,
  `blood_Type` varchar(3) NOT NULL,
  `patient_Type` varchar(20) NOT NULL,
  `department` varchar(50) NOT NULL,
  `patient_Email` varchar(50) NOT NULL,
  `patient_Password` varchar(30) NOT NULL,
  `emer_ContactName` varchar(50) NOT NULL,
  `emer_ContactNo` varchar(15) NOT NULL,
  `pat_DateCreated` date NOT NULL,
  `mdHist_Id` int(11) DEFAULT NULL,
  `admin_Id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `medhistory`
--
ALTER TABLE `medhistory`
  ADD PRIMARY KEY (`mdHist_Id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`patient_Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `medhistory`
--
ALTER TABLE `medhistory`
  MODIFY `mdHist_Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `patient_Id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
