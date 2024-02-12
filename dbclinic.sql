-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Feb 11, 2024 at 11:57 PM
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
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_Id` int(11) NOT NULL,
  `admin_Name` varchar(50) NOT NULL,
  `admin_Email` varchar(50) NOT NULL,
  `admin_Password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_Id`, `admin_Name`, `admin_Email`, `admin_Password`) VALUES
(1, 'Jaimee Liz Encabo', 'encabojaimeeliz12@gmail.com', 'admin123'),
(2, 'Nicole Franzyne Jao', 'franzyne.nicole@gmail.com', 'admin123'),
(3, 'Paula Leigh Fernandez', 'lelelemonleigh@gmail.com', 'admin123'),
(4, 'Regienald Pueblos', 'regienaldpueblos13@gmail.com', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `appoint_No` int(11) NOT NULL,
  `appoint_Info` varchar(500) NOT NULL,
  `appoint_Date` date NOT NULL,
  `appoint_Time` time NOT NULL,
  `appoint_Status` varchar(15) NOT NULL,
  `patient_Id` int(11) NOT NULL,
  `pers_Id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`appoint_No`, `appoint_Info`, `appoint_Date`, `appoint_Time`, `appoint_Status`, `patient_Id`, `pers_Id`) VALUES
(1, 'sample appointment', '2024-02-03', '08:00:00', 'Rejected', 2, 1),
(2, 'for Internship', '2024-02-05', '09:00:00', 'Completed', 2, 1),
(3, 'For Internship', '2024-02-06', '08:00:00', 'Rejected', 1, NULL),
(4, 'request medical clearance for Internship', '2024-02-08', '13:00:00', 'Completed', 3, 2),
(5, 'Request for Medical Clearance for Internship', '2024-02-03', '09:00:00', 'Completed', 4, 1),
(6, 'Request Medical Certificate for Internship', '2024-02-04', '13:00:00', 'Rejected', 4, 1),
(7, 'Request Medical Certificate for Internship', '2024-02-05', '15:00:00', 'Nonattendance', 4, 1);

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

--
-- Dumping data for table `medhistory`
--

INSERT INTO `medhistory` (`mdHist_Id`, `md_Attention`, `md_Illness`, `md_AllergiesFoods`, `md_AllergiesMeds`, `ph_Smoking`, `ph_Alcohol`) VALUES
(1, 'no', NULL, NULL, NULL, 'no', 'no'),
(2, 'no', NULL, 'Seafoods', 'Ibuprofen', 'no', 'yes'),
(3, 'yes', 'Heart Disease', NULL, NULL, 'no', 'no'),
(4, 'no', NULL, NULL, NULL, 'no', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `patient_Id` int(11) NOT NULL,
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
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`patient_Id`, `patient_Name`, `patient_Address`, `patient_City`, `patient_Age`, `patient_Birthdate`, `patient_Sex`, `patient_ContactNo`, `blood_Type`, `patient_Type`, `department`, `patient_Email`, `patient_Password`, `emer_ContactName`, `emer_ContactNo`, `pat_DateCreated`, `mdHist_Id`, `admin_Id`) VALUES
(1, 'Jane Cortez', '#41st Groove St. Mexico Ave', 'Manila', 25, '1998-02-14', 'female', '90138287', 'B-', 'Faculty', 'CHK', 'jcortez14@gmail.com', 'jane1234', 'Philip Cortez', '90138287', '2024-01-09', 1, NULL),
(2, 'Richard Santos', 'Blk 20 Tanza Subdivision', 'Quezon', 20, '2003-11-19', 'male', '9972431331', 'O+', 'Student', 'CCIS', 'richsantos@gmail.com', 'rich1119', 'Jordan Santos', '9152301228', '2024-01-19', 2, NULL),
(3, 'Kathryn Padilla', 'L11 Blk 17 Brgy. 177', 'Caloocan', 19, '2004-08-20', 'female', '9301226119', 'O-', 'Student', 'CS', 'kpadilla30@gmail.com', 'kath2024', 'Mike Padilla', '9352201900', '2024-01-24', 3, NULL),
(4, 'Regienald Pueblos', 'Lot 20 Block 65 Brgy.176', 'Caloocan', 20, '2003-08-13', 'male', '9301443320', 'O-', 'Student', 'CCIS', 'pueblosregienaldnb15@gmail.com', 'bastapassword', 'Virgilia Pueblos', '9975179783', '2024-02-02', 4, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `personnel`
--

CREATE TABLE `personnel` (
  `pers_Id` int(11) NOT NULL,
  `pers_Name` varchar(50) NOT NULL,
  `pers_Sex` varchar(6) NOT NULL,
  `pers_ContactNo` varchar(15) NOT NULL,
  `pers_Birthdate` date NOT NULL,
  `pers_Type` varchar(10) NOT NULL,
  `pers_Email` varchar(50) NOT NULL,
  `pers_Password` varchar(30) NOT NULL,
  `pers_DateCreated` date NOT NULL,
  `admin_Id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `personnel`
--

INSERT INTO `personnel` (`pers_Id`, `pers_Name`, `pers_Sex`, `pers_ContactNo`, `pers_Birthdate`, `pers_Type`, `pers_Email`, `pers_Password`, `pers_DateCreated`, `admin_Id`) VALUES
(1, 'John Santos', 'male', '9283861191', '1982-04-05', 'Doctor', 'drjohnsantos05@gmail.com', 'drjs05', '2024-01-10', 1),
(2, 'Nikki Del Mundo', 'female', '09312289187', '1998-07-16', 'Nurse', 'nikkidm16@gmail.com', 'nikki@1998', '2024-01-31', 1),
(3, 'Jeremias Balgua Jr.', 'male', '9651926711', '1991-05-26', 'Doctor', 'drjeremiasb@gmail.com', 'doc123', '2024-02-09', 1);

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `transaction_No` int(11) NOT NULL,
  `form_Type` varchar(30) DEFAULT NULL,
  `date_Issued` date DEFAULT NULL,
  `place_Issued` varchar(30) DEFAULT NULL,
  `date_Validity` date DEFAULT NULL,
  `transact_Status` varchar(15) NOT NULL,
  `claimed` varchar(50) DEFAULT NULL,
  `patient_Rel` varchar(20) DEFAULT NULL,
  `appoint_No` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`transaction_No`, `form_Type`, `date_Issued`, `place_Issued`, `date_Validity`, `transact_Status`, `claimed`, `patient_Rel`, `appoint_No`) VALUES
(1, 'Medical Certificate', '2024-02-06', 'PUP', '2024-08-06', 'Completed', 'Richard Santos', 'Self', 2),
(2, 'Medical Clearance', '2024-02-08', 'PUP Clinic', '2024-08-08', 'Completed', 'Kathryn Padilla', 'Self', 4),
(3, 'Medical Clearance', '2024-02-03', 'PUP Clinic', '2024-08-03', 'Completed', 'Regienald Pueblos', 'Self', 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_Id`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`appoint_No`);

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
-- Indexes for table `personnel`
--
ALTER TABLE `personnel`
  ADD PRIMARY KEY (`pers_Id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`transaction_No`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `appoint_No` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `medhistory`
--
ALTER TABLE `medhistory`
  MODIFY `mdHist_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `patient_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `personnel`
--
ALTER TABLE `personnel`
  MODIFY `pers_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `transaction_No` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
