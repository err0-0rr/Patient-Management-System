-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 11, 2022 at 04:14 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `patientmanagementsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `A_ID` varchar(5) NOT NULL,
  `A_name` varchar(15) NOT NULL,
  `A_pwd` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`A_ID`, `A_name`, `A_pwd`) VALUES
('A001', 'Steven_Olmos', 'Steven001');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `Token` decimal(10,0) NOT NULL,
  `P_ID` varchar(6) NOT NULL,
  `C_Date` date DEFAULT NULL,
  `A_ID` varchar(5) NOT NULL,
  `D_ID` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`Token`, `P_ID`, `C_Date`, `A_ID`, `D_ID`) VALUES
('101', 'P611', '0000-00-00', 'A001', 'D201'),
('102', 'P612', '0000-00-00', 'A001', 'D202'),
('103', 'P613', '0000-00-00', 'A001', 'D203'),
('104', 'P614', '0000-00-00', 'A001', 'D212'),
('105', 'P615', '0000-00-00', 'A001', 'D204'),
('106', 'P616', '0000-00-00', 'A001', 'D205'),
('107', 'P617', '0000-00-00', 'A001', 'D206'),
('108', 'P618', '0000-00-00', 'A001', 'D212'),
('109', 'P619', '0000-00-00', 'A001', 'D209'),
('110', 'P620', '0000-00-00', 'A001', 'D210'),
('111', 'P621', '0000-00-00', 'A001', 'D210'),
('112', 'P622', '0000-00-00', 'A001', 'D210'),
('113', 'P623', '0000-00-00', 'A001', 'D211'),
('114', 'P624', '0000-00-00', 'A001', 'D211'),
('115', 'P625', '0000-00-00', 'A001', 'D211'),
('116', 'P626', '0000-00-00', 'A001', 'D212');

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `Token` decimal(10,0) NOT NULL,
  `B_Date` date NOT NULL,
  `Room_charge` decimal(10,0) DEFAULT NULL,
  `Doctor_fee` decimal(10,0) NOT NULL,
  `Medical_fee` decimal(10,0) DEFAULT NULL,
  `Extra_Charges` decimal(10,0) DEFAULT NULL,
  `Total_bill` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`Token`, `B_Date`, `Room_charge`, `Doctor_fee`, `Medical_fee`, `Extra_Charges`, `Total_bill`) VALUES
('101', '0000-00-00', '1500', '300', '800', '100', '2700'),
('102', '0000-00-00', '1100', '500', '5000', '1250', '7850'),
('103', '0000-00-00', '1300', '200', '6600', '1560', '9660'),
('104', '0000-00-00', '1600', '500', '3000', '1450', '6550'),
('105', '0000-00-00', '1800', '300', '1200', '1500', '4800'),
('106', '0000-00-00', '1400', '200', '300', '1560', '3460'),
('107', '0000-00-00', '2300', '250', '1000', '1230', '4780'),
('108', '0000-00-00', '4500', '350', '1600', '1510', '7960'),
('109', '0000-00-00', '2600', '350', '2300', '1600', '6850'),
('110', '0000-00-00', '1200', '300', '8300', '1520', '11320'),
('111', '0000-00-00', '1600', '500', '7000', '1400', '10500'),
('112', '0000-00-00', '1200', '300', '2300', '1360', '5160'),
('113', '0000-00-00', '0', '350', '2300', '0', '2650'),
('114', '0000-00-00', '0', '300', '8300', '0', '8600'),
('115', '0000-00-00', '0', '500', '7000', '0', '7500'),
('116', '0000-00-00', '0', '300', '2300', '0', '2600');

-- --------------------------------------------------------

--
-- Table structure for table `bill_token`
--

CREATE TABLE `bill_token` (
  `Bill_no` varchar(5) NOT NULL,
  `Token` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bill_token`
--

INSERT INTO `bill_token` (`Bill_no`, `Token`) VALUES
('B251', '101'),
('B252', '102'),
('B253', '103'),
('B254', '104'),
('B255', '105'),
('B256', '106'),
('B257', '107'),
('B258', '108'),
('B259', '109'),
('B260', '110'),
('B261', '111'),
('B262', '112'),
('B263', '113'),
('B264', '114'),
('B265', '115'),
('B266', '116');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `Dept_ID` varchar(10) NOT NULL,
  `Dept_name` varchar(20) DEFAULT NULL,
  `Dept_phno` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`Dept_ID`, `Dept_name`, `Dept_phno`) VALUES
('Dep051', 'Ortho', '9988770001'),
('Dep052', 'Pediatrics', '9988770002'),
('Dep053', 'Gynic', '9988770003'),
('Dep054', 'Neuro', '9988770004'),
('Dep055', 'cardiovascular', '9988770005'),
('Dep056', 'Psychocology', '9988770006'),
('Dep057', 'Anesthetic', '9988770007'),
('Dep058', 'cardiac', '9988770008'),
('Dep059', 'Surgical', '9988770009'),
('Dep060', 'ENT', '9988770010'),
('Dep061', 'Optics', '9988770011'),
('Dep062', 'GeneralMedicine', '9988770012');

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `D_ID` varchar(5) NOT NULL,
  `D_phno` decimal(10,0) DEFAULT NULL,
  `D_name` varchar(15) NOT NULL,
  `D_gender` varchar(6) NOT NULL,
  `D_pwd` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`D_ID`, `D_phno`, `D_name`, `D_gender`, `D_pwd`) VALUES
('D201', '9988770001', 'Dr.Abdu', 'M', 'Abdu001'),
('D202', '9988770002', 'Dr.Myles', 'M', 'Myles002'),
('D203', '9988770003', 'Dr.Abbas', 'M', 'Abbas003'),
('D204', '9988770004', 'Dr.Khalid', 'M', 'Khalid004'),
('D205', '9988770005', 'Dr.Naresh', 'M', 'Naresh005'),
('D206', '9988770006', 'Dr.Reese', 'F', 'Reese006'),
('D207', '9988770007', 'Dr.Anderson', 'M', 'Anderson7'),
('D208', '9988770008', 'Dr.Aaron', 'M', 'Aaron008'),
('D209', '9988770009', 'Dr.Sudhansu', 'M', 'Sudhansu9'),
('D210', '9988770010', 'Dr.Abaza', 'F', 'Abaza010'),
('D211', '9988770011', 'Dr.Anandi', 'F', 'Anandi011'),
('D212', '9988770012', 'Dr.Gupta', 'M', 'Gupta012');

-- --------------------------------------------------------

--
-- Table structure for table `doctor_dept`
--

CREATE TABLE `doctor_dept` (
  `D_ID` varchar(5) NOT NULL,
  `Dept_ID` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctor_dept`
--

INSERT INTO `doctor_dept` (`D_ID`, `Dept_ID`) VALUES
('D201', 'Dep051'),
('D202', 'Dep052'),
('D203', 'Dep053'),
('D204', 'Dep054'),
('D205', 'Dep055'),
('D205', 'Dep058'),
('D206', 'Dep056'),
('D207', 'Dep057'),
('D208', 'Dep055'),
('D208', 'Dep058'),
('D209', 'Dep057'),
('D209', 'Dep059'),
('D210', 'Dep060'),
('D211', 'Dep061'),
('D212', 'Dep062');

-- --------------------------------------------------------

--
-- Table structure for table `doctor_desig`
--

CREATE TABLE `doctor_desig` (
  `D_ID` varchar(5) NOT NULL,
  `D_desig` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctor_desig`
--

INSERT INTO `doctor_desig` (`D_ID`, `D_desig`) VALUES
('D201', 'Orthopedic'),
('D202', 'Pediatrician'),
('D203', 'Gynecologist'),
('D204', 'Neurologist'),
('D205', 'cardiologist'),
('D205', 'cardiovascular'),
('D206', 'Psychiatrist'),
('D207', 'Anesthesiologist'),
('D208', 'cardiologist'),
('D208', 'cardiovascular'),
('D209', 'Anesthesiologist'),
('D209', 'General_Surgeon'),
('D210', 'ENT'),
('D211', 'Optomologist'),
('D212', 'GeneralMedicine');

-- --------------------------------------------------------

--
-- Table structure for table `medical_history`
--

CREATE TABLE `medical_history` (
  `P_ID` varchar(6) NOT NULL,
  `Surgery` varchar(5) DEFAULT NULL,
  `Disease` varchar(25) NOT NULL,
  `Status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `medical_history`
--

INSERT INTO `medical_history` (`P_ID`, `Surgery`, `Disease`, `Status`) VALUES
('P611', 'Yes', 'Osteoarthritis', 'patially_cured'),
('P612', 'Null', 'fever', 'cured'),
('P613', 'Null', 'Dysmenorrhea', 'cured'),
('P614', 'Null', 'stomachPain', 'patially_cured'),
('P615', 'Null', 'Parkinsons', 'cured'),
('P616', 'Yes', 'cardiacmyopathy', 'patially_cured'),
('P617', 'yes', 'bipolardisease', 'patially_cured'),
('P618', 'Null', 'fever', 'cured'),
('P619', 'Null', 'Myocardial_Infaretion', 'cured'),
('P620', 'Null', 'Thyroid', 'patially cured'),
('P621', 'Null', 'Nasalseptal', 'cured'),
('P622', 'Null', 'ThroughtPain', 'cured'),
('P623', 'yes', 'Cataract', 'cured'),
('P624', 'yes', 'Myopia', 'cured'),
('P625', 'yes', 'Hypermetropia', 'cured'),
('P626', 'Null', 'LiverCirrhosis', 'cured');

-- --------------------------------------------------------

--
-- Table structure for table `nurse`
--

CREATE TABLE `nurse` (
  `N_ID` varchar(5) NOT NULL,
  `N_name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nurse`
--

INSERT INTO `nurse` (`N_ID`, `N_name`) VALUES
('N031', 'Margaret_Sanger'),
('N032', 'Hilda_Bowen'),
('N033', 'Harriet_Acland'),
('N034', 'Saint_Alda'),
('N035', 'Moyra_Allen'),
('N036', 'Allen_Allensworth'),
('N037', 'Jonathan_Asbridge '),
('N038', 'Charles_Atangana '),
('N039', 'Martha_Ballard '),
('N040', 'Nita_Barrowl'),
('N041', 'Clara_Barton '),
('N042', 'Florence_Blake');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `P_ID` varchar(6) NOT NULL,
  `F_name` varchar(15) NOT NULL,
  `L_name` varchar(10) NOT NULL,
  `P_pwd` varchar(20) NOT NULL,
  `P_weight` decimal(3,0) DEFAULT NULL,
  `P_bg` varchar(4) NOT NULL,
  `P_address` varchar(20) DEFAULT NULL,
  `P_dob` date DEFAULT NULL,
  `P_gender` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`P_ID`, `F_name`, `L_name`, `P_pwd`, `P_weight`, `P_bg`, `P_address`, `P_dob`, `P_gender`) VALUES
('P611', 'Abishek', 'M', 'Abishek611', '51', 'O+', 'Chennai', '0000-00-00', 'M'),
('P612', 'Koushik', 'Garapati', 'Koushik612', '52', 'O-', 'Mumbai', '0000-00-00', 'M'),
('P613', 'Priya', 'Reddy', 'Priya613', '53', 'O+', 'Tirupathi', '0000-00-00', 'F'),
('P614', 'Shivesh', 'S', 'Shivesh614', '54', 'A+', 'Mysore', '0000-00-00', 'M'),
('P615', 'Sruthi', 'Sathi', 'Sruthi615', '55', 'B-', 'Banglore', '0000-00-00', 'F'),
('P616', 'Uday', 'Venkat', 'Uday616', '56', 'AB+', 'Cochi', '0000-00-00', 'M'),
('P617', 'Sahasra', 'Lakshmi', 'Sahasra617', '57', 'O+', 'Goa', '0000-00-00', 'S'),
('P618', 'Meghana', 'Pullela', 'Meghana618', '58', 'O-', 'Hyderabad', '0000-00-00', 'F'),
('P619', 'Parthu', 'Saradhi', 'Parthu619', '58', 'AB+', 'Mumbai', '0000-00-00', 'M'),
('P620', 'Kundan', 'Bangaru', 'Kundan620', '57', 'O+', 'Delhi', '0000-00-00', 'M'),
('P621', 'Pranathi', 'Buggana', 'Pranathi621', '56', 'O+', 'Bhopal', '0000-00-00', 'F'),
('P622', 'Harika', 'Reddy', 'Harika622', '55', 'B+', 'Amaravathi', '0000-00-00', 'F'),
('P623', 'Nirmala', 'Devi', 'Nirmala623', '54', 'AB+', 'Srinagar', '0000-00-00', 'F'),
('P624', 'Lohik', 'Veera', 'Lohik624', '53', 'O+', 'Chadhigarh', '0000-00-00', 'M'),
('P625', 'Chathurya', 'kasi', 'Chathurya625', '52', 'O-', 'Banglore', '0000-00-00', 'F'),
('P626', 'Himankar', 'Sai', 'Himankar626', '51', 'A+', 'Coimbatore', '0000-00-00', 'M');

-- --------------------------------------------------------

--
-- Table structure for table `patient_phno`
--

CREATE TABLE `patient_phno` (
  `P_ID` varchar(6) NOT NULL,
  `P_phno` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patient_phno`
--

INSERT INTO `patient_phno` (`P_ID`, `P_phno`) VALUES
('P611', '9876540061'),
('P611', '9876540761'),
('P612', '9876540062'),
('P612', '9876540862'),
('P613', '9876540063'),
('P614', '9876540064'),
('P615', '9876540065'),
('P616', '9876540066'),
('P617', '9876540067'),
('P617', '9876540567'),
('P618', '9876540068'),
('P619', '9876540069'),
('P620', '9876540070'),
('P621', '9876540071'),
('P622', '9876540072'),
('P623', '9876540073'),
('P624', '9876540074'),
('P625', '9876540075'),
('P626', '9876540076');

-- --------------------------------------------------------

--
-- Table structure for table `prescription`
--

CREATE TABLE `prescription` (
  `P_ID` varchar(6) NOT NULL,
  `Medicine` varchar(25) NOT NULL,
  `Dosage` varchar(7) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prescription`
--

INSERT INTO `prescription` (`P_ID`, `Medicine`, `Dosage`) VALUES
('P611', 'Hydrocartisone', 'OD'),
('P612', 'Paracetmol', 'BD'),
('P613', 'Buscopan_IronAndFolet', 'BD'),
('P614', 'PantopD', 'TID'),
('P615', 'Eldopa', 'BD'),
('P616', 'AspririnClopidogral', 'BD'),
('P617', 'Benzotiazetines', 'BD'),
('P618', 'Dolo650', 'QID'),
('P619', 'Clopidogral', 'BD'),
('P620', 'Levothyroxine', 'BD'),
('P621', 'Augmentin', 'BD'),
('P622', 'Aceclofenac', 'BD'),
('P623', 'Null', 'Null'),
('P624', 'Null', 'Null'),
('P625', 'Null', 'Null'),
('P626', 'Aldactazide', 'BD');

-- --------------------------------------------------------

--
-- Table structure for table `prescription_doctor`
--

CREATE TABLE `prescription_doctor` (
  `P_ID` varchar(6) NOT NULL,
  `D_Id` varchar(5) NOT NULL,
  `Medicine` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prescription_doctor`
--

INSERT INTO `prescription_doctor` (`P_ID`, `D_Id`, `Medicine`) VALUES
('P611', 'D201', 'Hydrocartisone'),
('P612', 'D202', 'Paracetmol'),
('P613', 'D203', 'Buscopan_IronAndFolet'),
('P614', 'D212', 'PantopD'),
('P615', 'D204', 'Eldopa'),
('P616', 'D205', 'AspririnClopidogral'),
('P617', 'D206', 'Benzotiazetines'),
('P618', 'D212', 'Dolo650'),
('P619', 'D209', 'Clopidogral'),
('P620', 'D210', 'Levothyroxine'),
('P621', 'D210', 'Augmentin'),
('P622', 'D210', 'Aceclofenac'),
('P623', 'D211', 'Null'),
('P624', 'D211', 'Null'),
('P625', 'D211', 'Null'),
('P626', 'D212', 'Aldactazide');

-- --------------------------------------------------------

--
-- Table structure for table `record`
--

CREATE TABLE `record` (
  `P_ID` varchar(6) NOT NULL,
  `R_Date` date NOT NULL,
  `Disease` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `record`
--

INSERT INTO `record` (`P_ID`, `R_Date`, `Disease`) VALUES
('P611', '0000-00-00', 'Osteoarthritis'),
('P612', '0000-00-00', 'fever'),
('P613', '0000-00-00', 'Dysmenorrhea'),
('P614', '0000-00-00', 'stomachPain'),
('P615', '0000-00-00', 'Parkinsons'),
('P616', '0000-00-00', 'cardiacmyopathy'),
('P617', '0000-00-00', 'bipolardisease'),
('P618', '0000-00-00', 'fever'),
('P619', '0000-00-00', 'Myocardial_Infaretion'),
('P620', '0000-00-00', 'Thyroid'),
('P621', '0000-00-00', 'Nasalseptal'),
('P622', '0000-00-00', 'ThroughtPain'),
('P623', '0000-00-00', 'Cataract'),
('P624', '0000-00-00', 'Myopia'),
('P625', '0000-00-00', 'Hypermetropia'),
('P626', '0000-00-00', 'LiverCirrhosis');

-- --------------------------------------------------------

--
-- Table structure for table `record_num`
--

CREATE TABLE `record_num` (
  `Rec_no` varchar(10) NOT NULL,
  `P_ID` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `record_num`
--

INSERT INTO `record_num` (`Rec_no`, `P_ID`) VALUES
('Rec001', 'P611'),
('Rec002', 'P612'),
('Rec003', 'P613'),
('Rec004', 'P614'),
('Rec005', 'P615'),
('Rec006', 'P616'),
('Rec007', 'P617'),
('Rec008', 'P618'),
('Rec009', 'P619'),
('Rec010', 'P620'),
('Rec011', 'P621'),
('Rec012', 'P622'),
('Rec013', 'P623'),
('Rec014', 'P624'),
('Rec015', 'P625'),
('Rec016', 'P626');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `R_reg` varchar(6) NOT NULL,
  `V_ID` varchar(5) DEFAULT NULL,
  `R_no` varchar(5) NOT NULL,
  `Token` decimal(10,0) NOT NULL,
  `DOA` date NOT NULL,
  `DOD` date NOT NULL,
  `N_ID` varchar(4) NOT NULL,
  `R_type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`R_reg`, `V_ID`, `R_no`, `Token`, `DOA`, `DOD`, `N_ID`, `R_type`) VALUES
('Reg011', 'V081', 'R070', '101', '0000-00-00', '0000-00-00', 'N031', 'ICU'),
('Reg012', 'V082', 'R072', '102', '0000-00-00', '0000-00-00', 'N032', 'paddedcell'),
('Reg013', 'V083', 'R074', '103', '0000-00-00', '0000-00-00', 'N033', 'casuality'),
('Reg014', 'V084', 'R076', '104', '0000-00-00', '0000-00-00', 'N034', 'emergency'),
('Reg015', 'V085', 'R078', '105', '0000-00-00', '0000-00-00', 'N035', 'casuality'),
('Reg016', 'V086', 'R080', '106', '0000-00-00', '0000-00-00', 'N036', 'emergency'),
('Reg017', 'V087', 'R082', '107', '0000-00-00', '0000-00-00', 'N037', 'ICU'),
('Reg018', 'V088', 'R084', '108', '0000-00-00', '0000-00-00', 'N038', 'casuality'),
('Reg019', 'V089', 'R086', '109', '0000-00-00', '0000-00-00', 'N039', 'general'),
('Reg020', 'V090', 'R088', '110', '0000-00-00', '0000-00-00', 'N040', 'ICU'),
('Reg021', 'V091', 'R090', '111', '0000-00-00', '0000-00-00', 'N041', 'emergency'),
('Reg022', 'V092', 'R092', '112', '0000-00-00', '0000-00-00', 'N042', 'general');

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `T_no` varchar(5) NOT NULL,
  `Token` decimal(10,0) NOT NULL,
  `T_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`T_no`, `Token`, `T_date`) VALUES
('T205', '101', '0000-00-00'),
('T206', '102', '0000-00-00'),
('T207', '102', '0000-00-00'),
('T208', '103', '0000-00-00'),
('T209', '103', '0000-00-00'),
('T210', '104', '0000-00-00'),
('T211', '105', '0000-00-00'),
('T212', '106', '0000-00-00'),
('T213', '106', '0000-00-00'),
('T214', '107', '0000-00-00'),
('T215', '108', '0000-00-00'),
('T216', '108', '0000-00-00'),
('T217', '109', '0000-00-00'),
('T218', '109', '0000-00-00'),
('T219', '110', '0000-00-00'),
('T220', '111', '0000-00-00'),
('T221', '112', '0000-00-00'),
('T222', '113', '0000-00-00'),
('T223', '113', '0000-00-00'),
('T224', '114', '0000-00-00'),
('T225', '115', '0000-00-00'),
('T226', '116', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `test_name`
--

CREATE TABLE `test_name` (
  `T_no` varchar(5) NOT NULL,
  `T_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `test_name`
--

INSERT INTO `test_name` (`T_no`, `T_name`) VALUES
('T205', 'X-RayKnee_AnteriorAndLateralView'),
('T206', 'CompleteBloodPicture'),
('T207', 'BloodCulture'),
('T208', 'HSGA'),
('T209', 'TransvaginalUltrasound'),
('T210', 'UltrasoundAbdomen'),
('T211', 'SerumDopamineLevel'),
('T212', 'ECGAnd2DEcho'),
('T213', 'Troponinlevels'),
('T214', 'CleanicalEvaluation'),
('T215', 'CompleteBloodPicture'),
('T216', 'BloodCulture'),
('T217', 'CGAnd2DEcho'),
('T218', 'Troponinlevels'),
('T219', 'CBP_ThroidProfile'),
('T220', 'Culture_Otoscopy'),
('T221', 'CleanicalEvaluation'),
('T222', 'PhacoEmusification_VisualAcuty'),
('T223', 'SlitLamp_Examination'),
('T224', 'Refraction assesssment'),
('T225', 'Refraction assesssment'),
('T226', 'X-Ray_WatersView_Nasal_Underscopy');

-- --------------------------------------------------------

--
-- Table structure for table `visitor`
--

CREATE TABLE `visitor` (
  `V_ID` varchar(5) NOT NULL,
  `V_name` varchar(15) DEFAULT NULL,
  `Relation` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `visitor`
--

INSERT INTO `visitor` (`V_ID`, `V_name`, `Relation`) VALUES
('V081', 'John', 'Father'),
('V082', 'Harry', 'Brother'),
('V083', 'Michael', 'Father'),
('V084', 'Johnny', 'Cousin'),
('V085', 'Angelina', 'Mother'),
('V086', 'Kevin', 'Uncle'),
('V087', 'Daniel', 'Cousin'),
('V088', 'Gary', 'Brother'),
('V089', 'Hermione', 'Aunt'),
('V090', 'Watson', 'Sister'),
('V091', 'Alan', 'Father'),
('V092', ' Helena', 'Mother');

-- --------------------------------------------------------

--
-- Table structure for table `visitor_cno`
--

CREATE TABLE `visitor_cno` (
  `V_ID` varchar(5) NOT NULL,
  `C_no` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `visitor_cno`
--

INSERT INTO `visitor_cno` (`V_ID`, `C_no`) VALUES
('V081', '7876540251'),
('V082', '7876540252'),
('V083', '7876540253'),
('V084', '7876540254'),
('V085', '7876540255'),
('V086', '7876540256'),
('V087', '7876540257'),
('V088', '7876540258'),
('V089', '7876540259'),
('V090', '7876540301'),
('V091', '7876540302'),
('V092', '7876540303');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`A_ID`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`Token`);

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`Token`);

--
-- Indexes for table `bill_token`
--
ALTER TABLE `bill_token`
  ADD PRIMARY KEY (`Bill_no`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`Dept_ID`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`D_ID`);

--
-- Indexes for table `doctor_dept`
--
ALTER TABLE `doctor_dept`
  ADD PRIMARY KEY (`D_ID`,`Dept_ID`);

--
-- Indexes for table `doctor_desig`
--
ALTER TABLE `doctor_desig`
  ADD PRIMARY KEY (`D_ID`,`D_desig`);

--
-- Indexes for table `medical_history`
--
ALTER TABLE `medical_history`
  ADD PRIMARY KEY (`P_ID`,`Disease`);

--
-- Indexes for table `nurse`
--
ALTER TABLE `nurse`
  ADD PRIMARY KEY (`N_ID`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`P_ID`);

--
-- Indexes for table `patient_phno`
--
ALTER TABLE `patient_phno`
  ADD PRIMARY KEY (`P_ID`,`P_phno`);

--
-- Indexes for table `prescription`
--
ALTER TABLE `prescription`
  ADD PRIMARY KEY (`P_ID`,`Medicine`);

--
-- Indexes for table `prescription_doctor`
--
ALTER TABLE `prescription_doctor`
  ADD PRIMARY KEY (`P_ID`,`Medicine`);

--
-- Indexes for table `record`
--
ALTER TABLE `record`
  ADD PRIMARY KEY (`P_ID`);

--
-- Indexes for table `record_num`
--
ALTER TABLE `record_num`
  ADD PRIMARY KEY (`Rec_no`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`R_reg`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`T_no`);

--
-- Indexes for table `test_name`
--
ALTER TABLE `test_name`
  ADD PRIMARY KEY (`T_no`,`T_name`);

--
-- Indexes for table `visitor`
--
ALTER TABLE `visitor`
  ADD PRIMARY KEY (`V_ID`);

--
-- Indexes for table `visitor_cno`
--
ALTER TABLE `visitor_cno`
  ADD PRIMARY KEY (`V_ID`,`C_no`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
