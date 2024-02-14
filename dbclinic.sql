-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Feb 13, 2024 at 01:40 PM
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

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`` PROCEDURE `sproc_checkDel` (IN `inId` INT)   BEGIN
	SELECT pers_Id, pers_Name, a.admin_Id, admin_Name 
    FROM personnel pe LEFT JOIN admin a ON pe.admin_Id = a.admin_Id
    WHERE a.admin_Id = inId;
END$$

CREATE DEFINER=`` PROCEDURE `sproc_checkUpd` (IN `inId` INT)   BEGIN
	SELECT pa.patient_Id AS patientId, patient_Name, appoint_No, a.patient_Id AS fpatientId
    	FROM patient pa JOIN appointment a ON pa.patient_Id = a.patient_Id
    	WHERE pa.patient_Id = inId;
END$$

CREATE DEFINER=`` PROCEDURE `sproc_del` (IN `inId` INT)   DELETE FROM admin WHERE admin_Id = inId$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sproc_insertAppointment` (IN `inAppInfo` VARCHAR(500), IN `inAppDate` DATE, IN `inAppTime` TIME, IN `inAppStatus` VARCHAR(15), IN `inId` INT)   INSERT INTO appointment(appoint_Info, appoint_Date, appoint_Time, appoint_Status, patient_Id) VALUES (inAppInfo, inAppDate, inAppTime, inAppStatus, inId)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sproc_insertMed` (IN `inMedAtt` VARCHAR(3), IN `inMedIll` VARCHAR(350), IN `inAllF` VARCHAR(50), IN `inAllM` VARCHAR(20), IN `inSmoking` VARCHAR(3), IN `inAlcohol` VARCHAR(3))   INSERT INTO medhistory(md_Attention, md_Illness, md_AllergiesFoods, md_AllergiesMeds, ph_Smoking, ph_Alcohol) VALUES (inMedAtt, inMedIll, inAllF, inAllM, inSmoking, inAlcohol)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sproc_insertPatient` (IN `inName` VARCHAR(50), IN `inAddress` VARCHAR(250), IN `inCity` VARCHAR(20), IN `inAge` INT, IN `inBirthdate` DATE, IN `inSex` VARCHAR(6), IN `inContactNo` VARCHAR(15), IN `inBtype` VARCHAR(3), IN `inPtype` VARCHAR(20), IN `inDept` VARCHAR(50), IN `inEmail` VARCHAR(50), IN `inPass` VARCHAR(30), IN `inEmerName` VARCHAR(50), IN `inEmerNo` VARCHAR(15), IN `inDateCreated` DATE)   INSERT INTO patient(patient_Name, patient_Address, patient_City, patient_Age, patient_Birthdate, patient_Sex, patient_ContactNo, blood_Type, patient_Type, department, patient_Email, patient_Password, emer_ContactName, emer_ContactNo, pat_DateCreated) VALUES (inName, inAddress, inCity, inAge, inBirthdate, inSex, inContactNo, inBtype, inPtype, inDept, inEmail, inPass, inEmerName, inEmerNo, inDateCreated)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sproc_insertPersonnel` (IN `inName` VARCHAR(50), IN `inSex` VARCHAR(6), IN `inContactNo` VARCHAR(15), IN `inBirthdate` DATE, IN `inPtype` VARCHAR(10), IN `inEmail` VARCHAR(50), IN `inPass` VARCHAR(30), IN `inDateCreated` DATE, IN `inId` INT)   INSERT INTO personnel(pers_Name, pers_Sex, pers_ContactNo, pers_Birthdate, pers_Type, pers_Email, pers_Password, pers_DateCreated, admin_Id) VALUES(inName, inSex, inContactNo, inBirthdate, inPtype, inEmail, inPass, inDateCreated, inId)$$

CREATE DEFINER=`` PROCEDURE `sproc_insertTransac` (IN `inFtype` VARCHAR(30), IN `inDate` DATE, IN `inPlace` VARCHAR(30), IN `inDateValid` DATE, IN `inStatus` VARCHAR(15), IN `inClaimed` VARCHAR(50), IN `inPatientRel` VARCHAR(20), IN `inAppNo` INT)   INSERT INTO transaction(form_Type, date_Issued, place_Issued, date_Validity, transact_Status, claimed, patient_Rel, appoint_No) VALUES(inFtype, inDate, inPlace, inDateValid, inStatus, inClaimed, inPatientRel, inAppNo)$$

CREATE DEFINER=`` PROCEDURE `sproc_upd` (IN `inSet` INT, IN `inId` INT)   UPDATE patient SET patient_Id = inSet WHERE patient_Id = inId$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sproc_updAppointment` (IN `inStatus` VARCHAR(15), IN `inPersId` INT, IN `inAppNo` INT)   UPDATE appointment SET appoint_Status = inStatus, pers_Id = inPersId WHERE appoint_No = inAppNo$$

DELIMITER ;

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
(1, 'Requesting for Medical Clearance which is requirement in Internship', '2024-02-13', '13:00:00', 'Approved', 1, 1),
(2, 'Request for Medical Clearance as requirement in OJT', '2023-12-06', '08:00:00', 'Nonattendance', 2, 3),
(3, 'Request for Medical Clearance used for Internship', '2024-01-15', '08:00:00', 'Completed', 2, 5),
(4, 'Medical Certificate for Sportfest', '2024-02-14', '09:00:00', 'Rejected', 6, 2),
(5, 'Medical Certificate for Sportfest', '2024-02-15', '13:00:00', 'Approved', 6, 4),
(6, 'Internship - Medical Clearance', '2024-02-14', '10:30:00', 'Pending', 10, NULL),
(7, 'I want to request Medical Clearance as per requirement in Internship,', '2024-02-14', '09:30:00', 'Pending', 5, NULL),
(8, 'Medical Certificate for Sportfest', '2024-02-14', '13:00:00', 'Pending', 7, NULL),
(9, 'I want to request for Medical Clearance for my requirement in event in the department', '2024-02-14', '15:00:00', 'Pending', 9, NULL),
(10, 'Request Medical Certificate', '2024-02-15', '10:00:00', 'Completed', 3, 3);

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
(1, 'no', NULL, NULL, NULL, 'no', 'yes'),
(2, 'no', NULL, NULL, NULL, 'no', 'no'),
(3, 'yes', 'Asthma', 'Seafoods', NULL, 'no', 'no'),
(4, 'yes', 'Diabetes, Hypertension', NULL, NULL, 'no', 'yes'),
(5, 'no', NULL, 'Peanuts', 'Ibuprofen', 'yes', 'yes'),
(6, 'yes', 'Kidney Disease', 'Shrimp', 'Penicillin', 'no', 'no'),
(7, 'no', NULL, NULL, 'With Iodine', 'no', 'no'),
(8, 'no', NULL, NULL, NULL, 'yes', 'no'),
(9, 'yes', 'Hepathitis ', NULL, 'Aspirin', 'no', 'no'),
(10, 'no', '', 'Strawberry', '', 'yes', 'yes');

--
-- Triggers `medhistory`
--
DELIMITER $$
CREATE TRIGGER `after_medhist_insert` AFTER INSERT ON `medhistory` FOR EACH ROW UPDATE patient SET mdHist_Id = NEW.mdHist_Id WHERE patient_Id = NEW.mdHist_Id
$$
DELIMITER ;

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
  `mdHist_Id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`patient_Id`, `patient_Name`, `patient_Address`, `patient_City`, `patient_Age`, `patient_Birthdate`, `patient_Sex`, `patient_ContactNo`, `blood_Type`, `patient_Type`, `department`, `patient_Email`, `patient_Password`, `emer_ContactName`, `emer_ContactNo`, `pat_DateCreated`, `mdHist_Id`) VALUES
(1, 'Gerick Eol L. Hernandez', '19 Padre Burgos St., San Isidro Village 1', 'Marikina City', 21, '2002-07-26', 'male', '9565883736', 'O+', 'Student', 'CCIS', 'gerick026@gmail.com', 'gerickeol26', 'Concepcion Hernandez', '9123456789', '2024-02-12', 1),
(2, 'Hyunjin Hwang', '123 A Lake St., Salapan', 'San Juan', 24, '2000-03-20', 'male', '9657483321', 'O-', 'Student', 'CAL', 'hyunjinpogi@gmail.com', 'hyunjinxleigh1', 'Leigh Fernandez', '9150932811', '2023-12-04', 2),
(3, 'Christopher Bang', '528 N. S. Amoranto St., Sta. Mesa Heights', 'Quezon City', 27, '1997-10-03', 'male', '9112233445', 'O+', 'Faculty', 'CADBE', 'bangchan@gmail.com', 'wolfchan03', 'Hannah Bang', '9098712345', '2024-02-01', 3),
(4, 'Min Ho Lee', '2/F Westgate Center, L103-117 Commerce Avenue', 'Muntinlupa City', 26, '1998-10-25', 'male', '9448855776', 'O-', 'Faculty', 'COED', 'youknowleeknow@gmail.com', 'leeminho98', 'Rabbit Lee', '9758679321', '2024-02-13', 4),
(5, 'Jennie Kim', '285 Marine Road, Brgy. Holy Spirit', 'Quezon City', 21, '2002-10-10', 'female', '9150932811', 'B+', 'Student', 'COC', 'kimjennie@gmail.com', 'jenniekim1', 'Jisoo Kim', '9912837465', '2024-02-13', 5),
(6, 'Justin Cedric L. Ramos', '19 San Cristobal St., Santol', 'Quezon City', 20, '2003-08-14', 'male', '9657483929', 'N/A', 'Student', 'CCIS', 'justincedriclacandazoramos@gmail.com', 'cediexjudycharmin', 'Arlyn Ramos', '9876578943', '2024-02-13', 6),
(7, 'Josh Eavriel B. Sanchez', 'Metrogate Village', 'Meycauayan', 20, '2003-04-22', 'male', '9578911384', 'O-', 'Student', 'COC', 'josheavrielsanchez@gmail.com', 'joshsana123', 'Erica Sanchez', '9685670981', '2024-02-13', 7),
(8, 'Brix Jarick D. Sta. Cruz', 'PNP Village', 'Bocaue', 20, '2003-03-05', 'male', '9063416785', 'N/A', 'Student', 'CCIS', 'brixjarickstacruz@gmail.com', 'brixdahyun456', 'Giosky Sta.Cruz', '9546123401', '2024-02-13', 8),
(9, 'Minji Kim', '55 Maysan Road', 'Valenzuela', 29, '1995-05-07', 'female', '9887712345', 'A+', 'Faculty', 'CHK', 'kimminji04@gmail.com', '0407minji', 'Isabelle Kim', '9998877665', '2024-02-13', 9),
(10, 'Hanni Pham', ' Navotas Agora Complex ', 'Navotas', 20, '2004-10-06', 'female', '9112233445', 'O-', 'Student', 'COC', 'newjeanshanni@gmail.com', 'HanniPham06', 'Barbie Pham', '9878987654', '2024-02-13', 10);

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
(1, 'Changbin Seo', 'male', '9878965345', '1989-08-11', 'Doctor', 'seochangbin99@gmail.com', 'dwaekkichangbin', '2024-01-01', 1),
(2, 'Ji Sung Han', 'male', '9756743211', '1993-09-14', 'Nurse', 'hanjisung@gmail.com', 'QuokkaHannie', '2023-12-31', 2),
(3, 'Ji Won Kang', 'female', '9081529375', '1989-10-21', 'Nurse', 'kangjiwon@gmail.com', 'k4ngjiw0n', '2023-11-27', 3),
(4, 'Taylor Kelce', 'female', '9276824465', '1989-12-13', 'Doctor', 'kelcetaylor@gmail.com', 'm3r0liviab3n', '2024-01-11', 4),
(5, 'Lee Jihyeok', 'male', '9078192830', '1985-04-11', 'Doctor', 'leejihyeok@gmail.com', 'S0h@tdOugh', '2023-12-31', 2);

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
(1, 'Medical Clearance', '2024-01-15', 'PUP Clinic', '2024-07-14', 'Completed', 'Hyunjin Hwang', 'Self', 3),
(2, 'Medical Certificate', '2024-02-15', 'PUP Clinic', '2024-08-15', 'Completed', 'Christopher Bang', 'Self', 10);

--
-- Triggers `transaction`
--
DELIMITER $$
CREATE TRIGGER `after_transac_insert` AFTER INSERT ON `transaction` FOR EACH ROW UPDATE appointment SET appoint_Status = NEW.transact_Status WHERE appoint_No = NEW.appoint_No
$$
DELIMITER ;

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
  ADD PRIMARY KEY (`appoint_No`),
  ADD KEY `pId_fk` (`patient_Id`);

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
  ADD PRIMARY KEY (`pers_Id`),
  ADD KEY `aId_fk` (`admin_Id`);

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
  MODIFY `appoint_No` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `medhistory`
--
ALTER TABLE `medhistory`
  MODIFY `mdHist_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `patient_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `personnel`
--
ALTER TABLE `personnel`
  MODIFY `pers_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `transaction_No` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `pId_fk` FOREIGN KEY (`patient_Id`) REFERENCES `patient` (`patient_Id`) ON UPDATE CASCADE;

--
-- Constraints for table `personnel`
--
ALTER TABLE `personnel`
  ADD CONSTRAINT `aId_fk` FOREIGN KEY (`admin_Id`) REFERENCES `admin` (`admin_Id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
