-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 25, 2021 at 10:22 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `franktech`
--

-- --------------------------------------------------------

--
-- Table structure for table `assessmentdrafts`
--

CREATE TABLE `assessmentdrafts` (
  `draftid` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `Customer` varchar(500) NOT NULL,
  `User` varchar(500) NOT NULL,
  `AssessmentDate` varchar(500) NOT NULL,
  `Ref` varchar(500) NOT NULL,
  `Insurer` varchar(500) NOT NULL,
  `PolicyNo` varchar(500) NOT NULL,
  `Insured` varchar(500) NOT NULL,
  `ClaimNo` varchar(500) NOT NULL,
  `SumInsured` varchar(500) NOT NULL,
  `Excess` varchar(500) NOT NULL,
  `RegistrationNo` varchar(500) NOT NULL,
  `EngineType` varchar(500) NOT NULL,
  `PreAccidentValue` varchar(500) NOT NULL,
  `PropelledBy` varchar(500) NOT NULL,
  `SalvageValue` varchar(500) NOT NULL,
  `Transmission` varchar(500) NOT NULL,
  `ModeOfDelivery` varchar(500) NOT NULL,
  `VehicleType` varchar(500) NOT NULL,
  `Survey` varchar(500) NOT NULL,
  `Color` varchar(500) NOT NULL,
  `Brakes` varchar(500) NOT NULL,
  `PaintWork` varchar(500) NOT NULL,
  `Model` varchar(500) NOT NULL,
  `Make` varchar(500) NOT NULL,
  `ChasisNo` varchar(500) NOT NULL,
  `Steering` varchar(500) NOT NULL,
  `Repairer` varchar(500) NOT NULL,
  `Mileage` varchar(500) NOT NULL,
  `Year` varchar(500) NOT NULL,
  `FRHS` varchar(500) NOT NULL,
  `FLHS` varchar(500) NOT NULL,
  `RRHS` varchar(500) NOT NULL,
  `RLHS` varchar(500) NOT NULL,
  `Image3` varchar(500) NOT NULL,
  `Image4` varchar(500) NOT NULL,
  `SketchDetails` varchar(500) NOT NULL,
  `ReplaceParts` varchar(500) NOT NULL,
  `Repair` varchar(500) NOT NULL,
  `GarageCompetency` varchar(500) NOT NULL,
  `GarageInCompetency` varchar(500) NOT NULL,
  `Defects` varchar(500) NOT NULL,
  `Duration` varchar(500) NOT NULL,
  `Intro` varchar(500) NOT NULL,
  `IntroInfo` varchar(5000) NOT NULL,
  `Remarks` varchar(5000) NOT NULL,
  `Address` varchar(500) NOT NULL,
  `AccidentCondition` varchar(5000) NOT NULL,
  `CopyToRepairer` varchar(500) NOT NULL,
  `RepairsAuthorised` varchar(500) NOT NULL,
  `ContactPerson` varchar(500) NOT NULL,
  `AssessorsName` varchar(500) NOT NULL,
  `FeeNoteNo` int(11) NOT NULL,
  `Fee` int(11) NOT NULL,
  `FeeNoteMileage` int(11) NOT NULL,
  `MileageDesc` varchar(500) NOT NULL,
  `Photograph` int(11) NOT NULL,
  `FeeNoteVat` int(11) NOT NULL,
  `VatDesc` varchar(500) NOT NULL,
  `FeeNoteSubTotal` int(11) NOT NULL,
  `FeeNoteTotal` int(11) NOT NULL,
  `CostTotal` int(11) NOT NULL,
  `Discount` int(11) NOT NULL,
  `Discountt` varchar(500) NOT NULL,
  `DiscountDetails` varchar(500) NOT NULL,
  `Net` int(11) NOT NULL,
  `PartsVatDesc` varchar(500) NOT NULL,
  `SubTotal` int(11) NOT NULL,
  `Others` int(11) NOT NULL,
  `Vat` int(11) NOT NULL,
  `GrandTotal` int(11) NOT NULL,
  `RegDate` varchar(500) NOT NULL,
  `UpdationDate` varchar(500) NOT NULL,
  `Status` int(11) NOT NULL,
  `PStatus` int(11) NOT NULL,
  `ChequeNo` int(11) NOT NULL,
  `PaymentDate` varchar(500) NOT NULL,
  `Signature` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `assessmentimages`
--

CREATE TABLE `assessmentimages` (
  `id` int(11) NOT NULL,
  `Image1` varchar(500) NOT NULL,
  `Desc1` varchar(500) NOT NULL,
  `Image2` varchar(500) NOT NULL,
  `Desc2` varchar(500) NOT NULL,
  `Text` varchar(5000) NOT NULL,
  `ReportId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assessmentimages`
--

INSERT INTO `assessmentimages` (`id`, `Image1`, `Desc1`, `Image2`, `Desc2`, `Text`, `ReportId`) VALUES
(20, '1612969496-Chrysanthemum.jpg', 'test', '', '', '', 3),
(21, '1612969497-Desert.jpg', 'dfdfdfdfdfd', '', '', '', 3),
(25, '1613034490-Chrysanthemum.jpg', '', '', '', '', 3),
(27, '1613034491-Hydrangeas.jpg', '', '', '', '', 3),
(28, '1613034492-Jellyfish.jpg', '', '', '', '', 3),
(29, '1613034492-Koala.jpg', '', '', '', '', 3);

-- --------------------------------------------------------

--
-- Table structure for table `assessmentimagesdoc`
--

CREATE TABLE `assessmentimagesdoc` (
  `id` int(11) NOT NULL,
  `Image` varchar(500) NOT NULL,
  `Desc1` varchar(500) NOT NULL,
  `ReportId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assessmentimagesdoc`
--

INSERT INTO `assessmentimagesdoc` (`id`, `Image`, `Desc1`, `ReportId`) VALUES
(1, '884515.jpg', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `assessments`
--

CREATE TABLE `assessments` (
  `id` int(11) NOT NULL,
  `Customer` varchar(500) NOT NULL,
  `User` varchar(250) NOT NULL,
  `AssessmentDate` varchar(500) NOT NULL,
  `AssessmentDate1` varchar(500) NOT NULL,
  `Ref` varchar(150) NOT NULL,
  `Insurer` varchar(500) NOT NULL,
  `PolicyNo` varchar(500) NOT NULL,
  `Insured` varchar(500) NOT NULL,
  `ClaimNo` varchar(500) NOT NULL,
  `SumInsured` varchar(500) NOT NULL,
  `Excess` varchar(500) NOT NULL,
  `RegistrationNo` varchar(500) NOT NULL,
  `EngineType` varchar(500) NOT NULL,
  `PreAccidentValue` varchar(500) NOT NULL,
  `PropelledBy` varchar(500) NOT NULL,
  `SalvageValue` varchar(500) NOT NULL,
  `Transmission` varchar(500) NOT NULL,
  `ModeOfDelivery` varchar(500) NOT NULL,
  `VehicleType` varchar(500) NOT NULL,
  `Survey` varchar(500) NOT NULL,
  `Color` varchar(500) NOT NULL,
  `Brakes` varchar(500) NOT NULL,
  `PaintWork` varchar(500) NOT NULL,
  `Model` varchar(500) NOT NULL,
  `Make` varchar(500) NOT NULL,
  `ChasisNo` varchar(500) NOT NULL,
  `Steering` varchar(500) NOT NULL,
  `Repairer` varchar(500) NOT NULL,
  `Mileage` varchar(500) NOT NULL,
  `Year` varchar(500) NOT NULL,
  `FRHS` varchar(500) NOT NULL,
  `FLHS` varchar(500) NOT NULL,
  `RRHS` varchar(500) NOT NULL,
  `RLHS` varchar(500) NOT NULL,
  `Image3` varchar(255) DEFAULT NULL,
  `Image4` varchar(255) DEFAULT NULL,
  `SketchDetails` varchar(500) NOT NULL,
  `ReplaceParts` varchar(500) NOT NULL,
  `Repair` varchar(500) NOT NULL,
  `GarageCompetency` varchar(500) NOT NULL,
  `GarageInCompetency` varchar(500) NOT NULL,
  `Defects` varchar(500) NOT NULL,
  `Duration` varchar(500) NOT NULL,
  `Intro` varchar(500) NOT NULL,
  `IntroInfo` varchar(5000) NOT NULL,
  `Remarks` text NOT NULL,
  `Address` varchar(5000) NOT NULL,
  `AccidentCondition` varchar(5000) NOT NULL,
  `CopyToRepairer` varchar(500) NOT NULL,
  `InstructionsBy` varchar(500) NOT NULL,
  `InstructionsDate` varchar(500) NOT NULL,
  `RepairsAuthorised` varchar(500) NOT NULL,
  `ContactPerson` varchar(500) NOT NULL,
  `AssessorsName` varchar(500) NOT NULL,
  `FeeNoteNo` varchar(500) NOT NULL,
  `Fee` int(11) NOT NULL,
  `FeeNoteMileage` int(11) NOT NULL,
  `MileageDesc` varchar(500) NOT NULL,
  `Photograph` int(11) NOT NULL,
  `FeeNoteVat` int(11) NOT NULL,
  `VatDesc` varchar(500) NOT NULL,
  `FeeNoteTotal` int(11) NOT NULL,
  `FeeNoteSubTotal` int(11) NOT NULL,
  `CostTotal` int(11) NOT NULL,
  `Discount` int(11) NOT NULL,
  `Discountt` varchar(500) NOT NULL,
  `DiscountDetails` varchar(500) NOT NULL,
  `Net` int(11) NOT NULL,
  `PartsVatDesc` varchar(500) NOT NULL,
  `SubTotal` int(11) NOT NULL,
  `Others` int(11) NOT NULL,
  `Vat` int(11) NOT NULL,
  `Vatt` varchar(500) NOT NULL,
  `GrandTotal` int(11) NOT NULL,
  `RegDate` date NOT NULL,
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `Status` varchar(500) NOT NULL,
  `PStatus` varchar(500) NOT NULL,
  `ChequeNo` varchar(500) NOT NULL,
  `PaymentDate` varchar(500) NOT NULL,
  `MONTH` varchar(500) NOT NULL,
  `YEARR` year(4) NOT NULL,
  `Signature` varchar(500) NOT NULL,
  `Branch` int(11) NOT NULL,
  `BranchCode` varchar(500) NOT NULL,
  `Fstatus` int(11) NOT NULL,
  `Imported` int(11) NOT NULL,
  `Imported2` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assessments`
--

INSERT INTO `assessments` (`id`, `Customer`, `User`, `AssessmentDate`, `AssessmentDate1`, `Ref`, `Insurer`, `PolicyNo`, `Insured`, `ClaimNo`, `SumInsured`, `Excess`, `RegistrationNo`, `EngineType`, `PreAccidentValue`, `PropelledBy`, `SalvageValue`, `Transmission`, `ModeOfDelivery`, `VehicleType`, `Survey`, `Color`, `Brakes`, `PaintWork`, `Model`, `Make`, `ChasisNo`, `Steering`, `Repairer`, `Mileage`, `Year`, `FRHS`, `FLHS`, `RRHS`, `RLHS`, `Image3`, `Image4`, `SketchDetails`, `ReplaceParts`, `Repair`, `GarageCompetency`, `GarageInCompetency`, `Defects`, `Duration`, `Intro`, `IntroInfo`, `Remarks`, `Address`, `AccidentCondition`, `CopyToRepairer`, `InstructionsBy`, `InstructionsDate`, `RepairsAuthorised`, `ContactPerson`, `AssessorsName`, `FeeNoteNo`, `Fee`, `FeeNoteMileage`, `MileageDesc`, `Photograph`, `FeeNoteVat`, `VatDesc`, `FeeNoteTotal`, `FeeNoteSubTotal`, `CostTotal`, `Discount`, `Discountt`, `DiscountDetails`, `Net`, `PartsVatDesc`, `SubTotal`, `Others`, `Vat`, `Vatt`, `GrandTotal`, `RegDate`, `UpdationDate`, `Status`, `PStatus`, `ChequeNo`, `PaymentDate`, `MONTH`, `YEARR`, `Signature`, `Branch`, `BranchCode`, `Fstatus`, `Imported`, `Imported2`) VALUES
(1, 'Allianz Insurance Co', 'Admin', '01-10-2020', '', 'dsdsds', '', 'sdsd', 'sdsd', 'xxxx', 'sdsd', 'dsd', 'dsds', 'dsd', 'sdsd', '', 'dsd', '', '', 'sdsd', '', 'dssd', 'dsd', 'sdsd', 'sds', 'dsd', 'dsd', '', 'sds', 'sdsd', 'sdsd', 'sdsd', 'dsd', 'ds', 'dsds', 'Koala.jpg', 'Tulips.jpg', '', '<br>', 'The estimated total repair cost is Ksh....', '', '', '<br>', 'sds', '<br>', '<br>', '				<ol><li><span style=\"font-weight: bold;\">Replace:</span></li><li><span style=\"font-weight: bold;\">Repair:</span></li><li><span style=\"font-weight: bold;\">Paint:</span></li><li><span style=\"font-weight: bold;\">Pre-accident condition and defects noted:</span></li><li><span style=\"font-weight: bold;\">Parts Source:</span></li><li><span style=\"font-weight: bold;\">Mode of delivery:</span><br></li></ol>', '', '				  Vehicle smashed at the...', '', 'fddggg', '', 'NOT AUTHORIZED', 'sdsd', 'sdsd', '', 0, 0, '', 0, 0, '', 0, 0, 100005, 0, '0', '0% Discount', 100005, '14% VAT', 11000, 0, 1540, '', 12540, '2020-10-22', '2021-01-06 02:09:33', '1', '', '', '', 'Oct', 2020, 'sign.jpg', 1, 'NO.', 1, 1, 1),
(2, 'C.I.C. Insurance', 'Admin', '01-10-2020', '', 'dsdsd', '', 'DSDS', 'hghg', 'hgh', 'KSh. ghgh', 'hgh', 'ghgh', 'ghh', 'KSh. ghghg', '', 'ghgh', '', '', '', '', 'gh', 'ghgh', 'ghgh', 'hg', 'ghg', 'ghgh', '', 'ghgh', 'ghg', 'ghgh', 'ghg', 'ghg', 'ghgh', 'ghgh', NULL, NULL, '', '', 'The estimated total repair cost is <span style=\"font-weight: bold;\">KSh. XXXX/- </span>VAT Inclusive which is deemed fair and reasonable to restore\r\n				  the vehicle back to its pre-accident condition. this is 6.4% of the pre-accident value.', '', '', '', 'ghgh', '', '', '				<ol><li><span style=\"font-weight: bold;\">Replace:</span></li><li><span style=\"font-weight: bold;\">Repair:</span></li><li><span style=\"font-weight: bold;\">Paint:</span></li><li><span style=\"font-weight: bold;\">Pre-accident condition and defects noted:</span></li><li><span style=\"font-weight: bold;\">Parts Source: </span>Open market or Dealer</li><li><span style=\"font-weight: bold;\">Mode of delivery: </span>Towed/Driven<br></li></ol>', '', '				  The vehicle suffered a moderate front impact biased ', '', 'ghgh', 'ghg', 'AUTHORIZED', 'hgh', 'F. Mwaniki', '', 0, 0, 'Mileage', 0, 0, 'VAT', 0, 0, 500, 0, '0', '0', 500, '14% VAT', 1500, 0, 210, '', 1710, '2020-10-26', '2021-01-06 02:06:10', '1', '', '', '', 'Oct', 2020, 'sign.jpg', 1, 'NO.', 1, 1, 0),
(3, 'C.I.C. Insurance', 'Admin', '01-10-2020', '', 'ghgh', '', 'sds', 'ghgh', 'ghgh', 'ghgh', 'ghgh', 'ghgh', 'ghg', 'KSh. ghgh', '', 'gghg', '', '', '', '', 'ghgh', 'hgh', 'ghgh', 'hg', 'ghgh', 'hgh', '', 'hghg', 'hh', 'hg', 'ghgh', 'ghgh', 'ghg', 'hgh', NULL, NULL, '', '<br>', 'The estimated total repair cost is <span style=\"font-weight: bold;\">KSh. XXXX/- </span>VAT Inclusive which is deemed fair and reasonable to restore the vehicle back to its pre-accident condition. this is 6.4% of the pre-accident value.', '', '', '<br>', 'ghgh', '<br>', '<br>', '				<ol><li><span style=\"font-weight: bold;\">Replace:</span></li><li><span style=\"font-weight: bold;\">Repair:</span></li><li><span style=\"font-weight: bold;\">Paint:</span></li><li><span style=\"font-weight: bold;\">Pre-accident condition and defects noted:</span></li><li><span style=\"font-weight: bold;\">Parts Source: </span>Open market or Dealer</li><li><span style=\"font-weight: bold;\">Mode of delivery: </span>Towed/Drivenxxxxxxxxxxxxxx<br></li></ol>', '', '				  The vehicle suffered a moderate front impact biased ', '', 'hghg', 'ghgh', 'AUTHORIZED', 'ghgh', 'F. Mwaniki', '', 0, 0, '', 0, 0, '', 0, 0, 0, 0, '', '', 0, '', 0, 0, 0, '', 0, '2020-10-26', '2021-01-22 05:16:44', '', '', '', '', 'Oct', 2020, 'sign.jpg', 1, 'NO.', 1, 0, 1),
(4, 'Mayfair Insurance Co. Ltd', 'Admin', '01-10-2020', '', 'kim', '', 'mutaiiii', 'ZZ', 'fgf', 'KSh. fgfgf', 'fgfg', 'fgf', 'fgfg', 'KSh. fgfg', '', 'fgfg', '', '', '', '', 'fgfg', 'gffg', 'fgfg', 'gfg', 'fgf', 'gfg', '', 'fgfg', 'fgfg', 'fg', 'fgfg', 'gfg', 'fg', 'fgfg', NULL, NULL, '', '<br>', 'The estimated total repair cost is <span style=\"font-weight: bold;\">KSh. 1230/- </span>VAT Inclusive which is deemed fair and reasonable to restore the vehicle back to its pre-accident condition. this is 6.4% of the pre-accident value.', '', '', '<br>', 'gfg', '<br>', '<br>', '				<ol><li><span style=\"font-weight: bold;\">Replace:</span></li><li><span style=\"font-weight: bold;\">Repair:</span></li><li><span style=\"font-weight: bold;\">Paint:</span></li><li><span style=\"font-weight: bold;\">Pre-accident condition and defects noted:</span></li><li><span style=\"font-weight: bold;\">Parts Source: </span>Open market or Dealer</li></ol><div style=\"margin-left: 120px;\"><span style=\"text-decoration: underline;\"><span style=\"font-weight: bold;\">Mode of delivery: </span></span>Towed/Driven</div><div><ol><li>dffdfd</li><li>dfdfdf</li><li>fdfdfdfdf<br></li></ol></div>', '', '				  The vehicle suffered a moderate front impact biased ', '', 'fgfg', 'fgfg', 'AUTHORIZED', 'fgfg', 'F. Mwaniki', '', 0, 0, '', 0, 0, '', 0, 0, 1000, 500, '0.5', '', 500, '14% VAT', 500, 0, 70, '', 570, '2020-10-28', '2021-01-06 02:06:05', '1', '', '', '', 'Oct', 2020, 'sign.jpg', 1, 'NO.', 1, 0, 1),
(5, 'Resolution Insurance', 'Admin', 'testtt', 'dateeeeeeeeeeeeeee', '55555', '', 'sdsdsd', 'mutah', 'ffd', 'sdsds', 'dsd', 'dfd', 'dsds', 'sdsd', '', 'sdsd', '', '', '', '', 'dsd', 'sdsds', 'sdsd', 'sds', 'dfd', 'dsd', '', 'dfdfd', 'sds', 'dsd', 'sds', 'sds', 'dsdsdsds', 'sdsd', NULL, NULL, '', '<br>', 'dsd<br>', '', '', '<br>', 'sdsd', '<br>', '<br>', 'sdsdsd<br>', '', 'sdsds<br>', '', 'dsds', 'dfdf', 'sdsd', 'dsd', '', '', 0, 0, '', 0, 0, '', 0, 0, 25, 0, '0', '0% Discount', 25, '16% VAT', 2500, 0, 1200, '', 8700, '2020-11-09', '2021-01-05 03:23:04', '', '', '', '', 'Nov', 2020, 'sign.jpg', 1, 'NO.', 1, 1, 0),
(6, 'fdggfgfgfgfgffgfgfgfgfg', 'Admin', '', 'fdfd', 'dfdfd', '', 'fdfdf', 'dfdf', 'fdf', 'KSh. ', 'fdf', 'fddf', 'dfdf', 'KSh. ', '', 'dfdf', '', '', '', '', 'dff', 'dfdf', 'dfdf', 'dfdf', 'dff', 'dfdf', '', 'dfdf', 'fdf', 'dfdf', 'dfdf', 'dfdf', 'fdfdf', 'dfdf', NULL, NULL, '', '<br>', 'The estimated total repair cost is <span style=\"font-weight: bold;\">KSh. XXXX/- </span>VAT Inclusive which is deemed fair and reasonable to restore the vehicle back to its pre-accident condition. this is 6.4% of the pre-accident value.', '', '', '<br>', 'dfdf', '<br>', '<br>', '				<ol><li><span style=\"font-weight: bold;\">Replace:</span></li><li><span style=\"font-weight: bold;\">Repair:</span></li><li><span style=\"font-weight: bold;\">Paint:</span></li><li><span style=\"font-weight: bold;\">Pre-accident condition and defects noted:</span></li><li><span style=\"font-weight: bold;\">Parts Source: </span>Open market or Dealer</li><li><span style=\"font-weight: bold;\">Mode of delivery: </span>Towed/Driven<br></li></ol>', '', '				  The vehicle suffered a moderate front impact biased ', '', 'dfdf', 'dfdfd', 'AUTHORIZED', 'dfdf', 'F. Mwaniki', '', 0, 0, '', 0, 0, '', 0, 0, 0, 0, '', '', 0, '', 0, 0, 0, '', 0, '2121-01-27', '2021-01-27 12:54:40', '', '', '', '', 'Jan', 2021, 'sign.jpg', 1, 'NO.', 0, 0, 0),
(7, 'fdfdf', 'Admin', '08-01-2021', 'dfdf', 'fdfd', '', 'fdf', 'dfdf', 'fdfd', 'dfdfd', 'dfdfd', 'dfdf', 'dfdf', 'KSh. ', '', 'dfdf', '', '', '', '', 'dfdf', 'dfdf', 'ddf', 'dfdf', 'dfd', 'dfdf', '', 'dfdf', 'dfdf', 'dfdf', 'dfdf', 'dfdf', 'dfdf', 'dfdf', NULL, NULL, '', '', 'The estimated total repair cost is <span style=\"font-weight: bold;\">KSh. XXXX/- </span>VAT Inclusive which is deemed fair and reasonable to restore the vehicle back to its pre-accident condition. this is 6.4% of the pre-accident value.', '', '', '', 'dfdf', '', '', '				<ol><li><span style=\"font-weight: bold;\">Replace:</span></li><li><span style=\"font-weight: bold;\">Repair:</span></li><li><span style=\"font-weight: bold;\">Paint:</span></li><li><span style=\"font-weight: bold;\">Pre-accident condition and defects noted:</span></li><li><span style=\"font-weight: bold;\">Parts Source: </span>Open market or Dealer</li><li><span style=\"font-weight: bold;\">Mode of delivery: </span>Towed/Driven<br></li></ol>', '', '				  The vehicle suffered a moderate front impact biased ', '', 'fdf', 'fdf', 'AUTHORIZED', 'dfdf', 'F. Mwaniki', '', 0, 0, 'Mileage', 0, 0, 'VAT', 0, 0, 0, 0, '', '', 0, '', 0, 0, 0, '', 0, '2121-01-27', '2021-02-10 15:06:12', '1', '', '', '', 'Jan', 2021, 'sign.jpg', 1, 'NO.', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `costofrepairs`
--

CREATE TABLE `costofrepairs` (
  `id` int(11) NOT NULL,
  `Number` varchar(500) NOT NULL,
  `Quantity` varchar(500) NOT NULL,
  `Description` varchar(5000) NOT NULL,
  `Remarks` varchar(500) NOT NULL,
  `UnitCost` int(11) NOT NULL,
  `Total` int(11) NOT NULL,
  `ReportId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `costofrepairs`
--

INSERT INTO `costofrepairs` (`id`, `Number`, `Quantity`, `Description`, `Remarks`, `UnitCost`, `Total`, `ReportId`) VALUES
(1, '1', '10', 'Test', 'Replaced', 500, 50005, 1),
(3, '2', '10', 'Test', 'Replaced', 5000, 50000, 1),
(4, '1', '1', 'vcvcv', '', 100, 100, 3),
(5, '2', '1', 'ffgf', '', 700, 700, 3),
(6, '3', '10', 'ccc', '', 100, 1000, 3),
(9, '1', '1', 'test', '', 100, 1000, 4),
(12, '', '1', '', '', 25, 25, 5),
(13, '1', '1', 'ff', '', 500, 500, 2),
(14, '2', '2', 'dddd', 'vvv', 500, 1000, 2),
(15, '3', '4', 'tttt', '', 0, 1800, 2);

-- --------------------------------------------------------

--
-- Table structure for table `costofrepairsrevised`
--

CREATE TABLE `costofrepairsrevised` (
  `id` int(11) NOT NULL,
  `Number` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Description` varchar(500) NOT NULL,
  `UnitCost` int(11) NOT NULL,
  `Total` int(11) NOT NULL,
  `ReportId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `costofrepairsrevised`
--

INSERT INTO `costofrepairsrevised` (`id`, `Number`, `Quantity`, `Description`, `UnitCost`, `Total`, `ReportId`) VALUES
(1, 1, 10, 'xxx', 100, 1000, 1),
(2, 2, 10, 'vvb', 500, 5000, 1),
(3, 1, 10, 'Test', 100, 1000, 1),
(4, 1, 10, 'cxcx', 500, 5000, 1),
(5, 1, 10, 'Test', 500, 5000, 1),
(6, 2, 5, 'Test2', 500, 2500, 1),
(7, 2, 10, 'xxxx', 5000, 50000, 1),
(8, 1, 1, 'vcvcv', 100, 100, 3),
(9, 2, 1, 'ffgf', 700, 700, 3),
(10, 3, 10, 'ccc', 100, 1000, 3),
(11, 1, 5, 'testt', 100, 500, 2),
(12, 1, 5, 'fff', 500, 2500, 5),
(13, 1, 1, 'test', 100, 100, 4),
(14, 0, 1, '', 25, 48, 5),
(15, 1, 1, '', 25, 25, 5),
(16, 0, 1, '', 25, 25, 5),
(17, 1, 1, 'ff', 500, 500, 2),
(18, 2, 2, 'dddd', 500, 1000, 2),
(19, 3, 4, 'tttt', 0, 1800, 2);

-- --------------------------------------------------------

--
-- Table structure for table `costofrepairssummary`
--

CREATE TABLE `costofrepairssummary` (
  `id` int(11) NOT NULL,
  `DescriptionSummary` varchar(500) NOT NULL,
  `TotalSummary` int(11) NOT NULL,
  `ReportIdSummary` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `costofrepairssummary`
--

INSERT INTO `costofrepairssummary` (`id`, `DescriptionSummary`, `TotalSummary`, `ReportIdSummary`) VALUES
(1, 'test', 5000, 1),
(2, 'test2', 1000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `costofrepairssummaryrevised`
--

CREATE TABLE `costofrepairssummaryrevised` (
  `id` int(11) NOT NULL,
  `DescriptionSummary` varchar(500) NOT NULL,
  `TotalSummary` int(11) NOT NULL,
  `ReportIdSummary` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `costofrepairssummaryrevised`
--

INSERT INTO `costofrepairssummaryrevised` (`id`, `DescriptionSummary`, `TotalSummary`, `ReportIdSummary`) VALUES
(1, 'Add:Labour', 5000, 1),
(2, 'test', 5000, 1),
(3, 'test2', 1000, 1),
(4, 'labourr', 1000, 2),
(5, 'labb', 5000, 5);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `Id` int(11) NOT NULL,
  `Name` varchar(500) NOT NULL,
  `EmailId` varchar(500) NOT NULL,
  `PhoneNo` varchar(500) NOT NULL,
  `Address` varchar(500) NOT NULL,
  `CreationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`Id`, `Name`, `EmailId`, `PhoneNo`, `Address`, `CreationDate`) VALUES
(6, 'C.I.C. Insurance', '', '', 'The Claims Manager\r\nC.I.C. Insurance\r\nP.O. Box 59485-00200\r\nNairobi.', '2020-07-23 12:47:57'),
(7, 'Monarch Insurance', '', '', 'The Claims Manager,\r\nThe Monarch Insurance,\r\nP.O. Box 44003-00200\r\nNairobi.', '2020-07-23 12:51:45'),
(8, 'Mayfair Insurance Co. Ltd', '', '', 'The Claims manager\r\nMayfair Insurance Co. Ltd.\r\nP.O. Box 45161-00100\r\nNairobi.', '2020-07-23 12:55:11'),
(9, 'Resolution Insurance', '', '', 'The Claims manager,\r\nResolution Insurance.\r\nP.O. Box 4469-00100,\r\nNairobi.', '2020-07-23 12:56:32'),
(10, 'Mua Insurance', '', '', 'The Claims manager,\r\nMua Insurance.\r\nP.O. Box 30129,\r\nNairobi.', '2020-07-23 12:57:21'),
(11, 'Kenindia Insurance', '', '', 'The Claims Manager\r\nKenindia Insurance,\r\nP.O. Box 44372-00100\r\nNairobi.', '2020-07-23 12:59:28'),
(12, 'Corporate Insurance Co. Ltd', '', '', 'The Claims Manager\r\nCorporate Insurance Co. Ltd,\r\nP.O. Box 34172-00100\r\nNairobi.', '2020-07-23 13:00:34'),
(13, 'Allianz Insurance Co', '', '', 'The Claims Manager\r\nAllianz Insurance Co.\r\nP.O. Box 66257-00800\r\nNairobi.', '2020-07-23 13:01:38'),
(14, 'Geminia Insurance', '', '', 'The Claims Manager\r\nGeminia Insurance\r\nP.O. Box 33530-00200\r\nNairobi.', '2020-07-23 13:02:24'),
(15, 'Britam', '', '', 'The Claims Manager\r\nBritam,\r\nP.O. Box 30375-00100\r\nNairobi.', '2020-07-23 13:03:22'),
(16, 'APA Insurance', '', '', 'The Head of Claims and Legal,\r\nAPA Insurance\r\nP.O. Box 30065-00100\r\nNairobi.', '2020-07-23 13:04:33'),
(17, 'First Assurance Co. Ltd', '', '', 'The Claims Manager\r\nFirst Assurance Co. Ltd.\r\nP.O.Box 30064-00100\r\nNairobi.', '2020-07-23 13:06:00'),
(18, 'Cannon Insurance Ltd', '', '', 'The Claims Manager\r\nCannon Insurance Ltd,\r\nP.O. Box 30216-00100\r\nNairobi.', '2020-07-23 13:07:20'),
(19, 'Saham Assurance Company Kenya Ltd', '', '', 'The Claims Manager\r\nSaham Assurance Company Kenya Ltd\r\nP.O. Box 20680-00100\r\nNairobi.', '2020-07-23 13:09:50'),
(20, 'The Monarch Insurance', '', '', 'The Claims Manager\r\nThe Monarch Insurance\r\nP.O. Box 34530-00100\r\nNairobi.', '2020-07-23 13:12:20'),
(21, 'Kenya Orient Insurance Ltd', '', '', 'The Claims Manager\r\nKenya Orient Insurance Ltd,\r\nP.O. Box 34530-00100\r\nNairobi.', '2020-07-23 13:14:58'),
(22, 'Pioneer Assurance Co. Ltd', '', '', 'The Claims Manager\r\nPioneer Assurance Co. Ltd,\r\nP.O. Box 2033-00200\r\nNairobi.', '2020-07-23 13:15:57'),
(23, 'GA Insurance Limited', '', '', 'The Claims Manager\r\nGA Insurance Limited\r\nP.O. Box 42166-00100\r\nNairobi.', '2020-07-23 13:17:20'),
(24, 'PACIS Insurance', '', '', 'The Claims Manager\r\nPACIS Insurance,\r\nP.O. Box 1870-00200\r\nNairobi.', '2020-07-23 13:18:11'),
(25, 'Africa Merchant Assurance Co. Ltd', '', '', 'P.O. BOX 61599-00200\r\nNEXTGEN MALL, 4th flr.\r\nMombasa Road.\r\nNairobi', '2020-09-15 09:08:12'),
(26, 'Intra Africa Assurance Company Ltd', '', '', '-', '2020-09-15 10:34:27'),
(27, 'Jubilee Insurance Co LTD', '', '', 'Jubilee Insurance,\r\nP. O. Box 30376 - 00100 \r\nNairobi, Kenya', '2020-09-15 10:37:20'),
(28, 'Metropolitan Cannon Insurance Ltd', '', '', '\r\nGateway Business Park, Block D\r\nMombasa Road\r\nP.O. Box 30216 – 00100 \r\nNairobi', '2020-09-15 10:41:45'),
(29, 'Phoenix Insurance', '', '', '-', '2020-09-15 10:44:48'),
(30, 'MUA', '', '', '-', '2020-09-15 10:44:55'),
(31, ' Pacis Insurance Co LTD', '', '', '-', '2020-09-15 10:46:15'),
(32, 'Takaful Insurance of Africa', '', '', '-', '2020-09-15 10:55:29'),
(33, 'ICEA LION', '', '', 'ICEA LION\r\nRiverside Park on Chiromo Road,\r\nWestlands,\r\nKenya', '2020-09-15 11:11:37');

-- --------------------------------------------------------

--
-- Table structure for table `feenotes`
--

CREATE TABLE `feenotes` (
  `id` int(11) NOT NULL,
  `ReportId` int(11) NOT NULL,
  `Ref` varchar(500) NOT NULL,
  `ReportType` varchar(500) NOT NULL,
  `PaymentDesc` varchar(500) NOT NULL,
  `PaymentDate` date NOT NULL,
  `FeeNoteNo` varchar(500) NOT NULL,
  `Fee` int(11) NOT NULL,
  `Mileageqty` int(11) NOT NULL,
  `FeeNoteMileage` int(11) NOT NULL,
  `FeeNoteMileageunit` int(11) NOT NULL,
  `MileageDesc` varchar(500) NOT NULL,
  `Photographqty` int(11) NOT NULL,
  `Photographunit` int(11) NOT NULL,
  `Photograph` int(11) NOT NULL,
  `FeeNoteSubTotal` int(11) NOT NULL,
  `FeeNoteVat` int(11) NOT NULL,
  `VatDesc` varchar(500) NOT NULL,
  `FeeNoteTotal` int(11) NOT NULL,
  `ReportDate` varchar(500) NOT NULL,
  `Customer` varchar(500) NOT NULL,
  `RegistrationNo` varchar(500) NOT NULL,
  `Insured` varchar(500) NOT NULL,
  `ClaimNo` varchar(500) NOT NULL,
  `PolicyNo` varchar(500) NOT NULL,
  `Make` varchar(500) NOT NULL,
  `Repairer` varchar(500) NOT NULL,
  `Year` varchar(500) NOT NULL,
  `Mileage` varchar(500) NOT NULL,
  `Color` varchar(500) NOT NULL,
  `Location` varchar(500) NOT NULL,
  `Branch` int(11) NOT NULL,
  `BranchCode` varchar(500) NOT NULL,
  `YEARR` year(4) NOT NULL,
  `MONTH` varchar(500) NOT NULL,
  `Pstatus` varchar(500) NOT NULL,
  `RegDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feenotes`
--

INSERT INTO `feenotes` (`id`, `ReportId`, `Ref`, `ReportType`, `PaymentDesc`, `PaymentDate`, `FeeNoteNo`, `Fee`, `Mileageqty`, `FeeNoteMileage`, `FeeNoteMileageunit`, `MileageDesc`, `Photographqty`, `Photographunit`, `Photograph`, `FeeNoteSubTotal`, `FeeNoteVat`, `VatDesc`, `FeeNoteTotal`, `ReportDate`, `Customer`, `RegistrationNo`, `Insured`, `ClaimNo`, `PolicyNo`, `Make`, `Repairer`, `Year`, `Mileage`, `Color`, `Location`, `Branch`, `BranchCode`, `YEARR`, `MONTH`, `Pstatus`, `RegDate`) VALUES
(8, 6, 'dsdsds', 'reinspection', '', '0000-00-00', 'dsdsds', 5000, 1, 500, 30, 'Mileage', 1, 60, 500, 6000, 700, '14% VAT', 6700, '30-01-2024', 'C.I.C. Insurance', 'dsds', 'sdsd', 'sdsd', '', 'dsd', 'sds', '', '', '', '', 0, '', 0000, '', 'Not paid', '0000-00-00'),
(9, 3, 'ghgh', 'assessment', '', '0000-00-00', 'ghgh', 500, 1, 500, 30, 'Mileage', 1, 60, 500, 1500, 70, '14% VAT', 1570, '01-10-2020', 'C.I.C. Insurance', 'ghgh', 'ghgh', 'ghgh', '', 'ghgh', 'hghg', '', '', '', '', 1, 'NO.', 2020, 'Oct', 'Not paid', '2020-10-26'),
(10, 2, '', 'valuation', '', '0000-00-00', 'dsdsds', 50000, 100, 3000, 30, 'Mileage', 1000, 60, 60000, 113000, 7000, '14% VAT', 120000, '0000-00-00', '', '', 'sdsd', '', '', 'dsds', '', '', '', '', '', 1, 'NO.', 2020, 'Oct', '1', '2020-10-26'),
(11, 5, '55555', 'assessment', '', '0000-00-00', '55555', 500, 10, 300, 30, 'Mileage', 10, 30, 300, 1100, 70, '14% VAT', 1170, '0000-00-00', 'Resolution Insurance', 'dfd', 'mutah', 'ffd', '', 'dfd', 'dfdfd', '', '', '', '', 1, 'NO.', 2020, 'Nov', 'Not paid', '2020-11-09'),
(12, 2, 'dsdsd', 'assessment', '', '0000-00-00', 'dsdsd', 5000, 1, 30, 30, 'Mileage', 1, 60, 60, 5090, 700, '14% VAT', 5790, '30-03-2021', 'C.I.C. Insurance', 'ghgh', 'hghg', 'hgh', '', 'ghg', 'ghgh', '', '', '', '', 1, 'NO.', 2020, 'Oct', 'Not paid', '2020-10-26'),
(13, 9, '123', 'reinspection', '', '0000-00-00', '123', 5000, 100, 3000, 30, 'Mileage', 100, 60, 6000, 14000, 700, '14% VAT', 14700, '0000-00-00', 'Corporate Insurance Co. Ltd', 'dfd', 'dfdf', 'ffd', '', 'dfd', 'dfdfd', '', '', '', '', 0, '', 0000, '', 'Not paid', '0000-00-00'),
(14, 4, 'kim', 'assessment', '', '0000-00-00', 'kim', 5000, 10, 300, 30, 'Mileage', 10, 60, 600, 5900, 700, '14% VAT', 6600, '0000-00-00', 'Mayfair Insurance Co. Ltd', 'fgf', 'ZZ', 'fgf', '', 'fgf', 'fgfg', '', '', '', '', 1, 'NO.', 2020, 'Oct', 'Not paid', '2020-10-28'),
(15, 1, 'dsdsds', 'assessment', '', '0000-00-00', 'dsdsds', 5000, 10, 300, 30, 'Mileage', 10, 60, 600, 5900, 700, '14% VAT', 6600, '0000-00-00', 'First Assurance Co. Ltd', 'dsds', 'sdsd', 'xxxx', '', 'dsd', 'sds', '', '', '', '', 1, 'NO.', 2020, 'Oct', 'Not paid', '2020-10-22'),
(16, 8, 'dsdsd', 'reinspection', '', '0000-00-00', 'dsdsd', 5000, 10, 300, 30, 'Mileage', 10, 60, 600, 5900, 700, '14% VAT', 6600, '0000-00-00', 'C.I.C. Insurance', 'ghgh', 'hghg', 'hgh', '', 'ghg', 'ghgh', '', '', '', '', 0, '', 0000, '', 'Not paid', '0000-00-00'),
(17, 11, 'mutai', 'reinspection', '', '0000-00-00', 'mutai', 0, 0, 0, 30, 'Mileage', 0, 60, 0, 0, 0, '14% VAT', 0, '0000-00-00', 'C.I.C. Insurance', 'xcxc', 'cxc', 'xcxc', '', 'xcx', 'xcxcxc', '', '', '', '', 1, 'NO.', 2020, 'Dec', 'Not paid', '2020-12-09'),
(18, 12, '12345678', 'reinspection', '', '0000-00-00', '12345678', 5000, 5, 150, 30, 'Mileage', 0, 60, 0, 5150, 700, '14% VAT', 5850, '0000-00-00', 'Monarch Insurance', 'zxzx', 'xzx', 'zxx', '', 'zxzx', 'zxzx', '', '', '', '', 1, 'NO.', 2020, 'Dec', 'Not paid', '2020-12-09'),
(19, 14, 'cvcvcvc', 'reinspection', '', '0000-00-00', 'cvcvcvc', 5000, 1, 30, 30, 'Mileage', 1, 60, 60, 5090, 700, '14% VAT', 5790, '', 'Mua Insurance', 'cvc', 'cvcv', 'vv', '', 'cvcv', 'vccv', '', '', '', '', 1, 'NO.', 2020, 'Dec', 'Not paid', '2020-12-09');

-- --------------------------------------------------------

--
-- Table structure for table `recommendation`
--

CREATE TABLE `recommendation` (
  `id` int(11) NOT NULL,
  `Damages` varchar(500) NOT NULL,
  `Recommendation` varchar(500) NOT NULL,
  `ReportId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `reinspectiondrafts`
--

CREATE TABLE `reinspectiondrafts` (
  `draftid` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `Customer` varchar(500) NOT NULL,
  `Ref` varchar(500) NOT NULL,
  `Date` varchar(500) NOT NULL,
  `Address` varchar(500) NOT NULL,
  `ChasisNo` varchar(500) NOT NULL,
  `CurrentMileage` varchar(500) NOT NULL,
  `Insured` varchar(500) NOT NULL,
  `RegistrationNo` varchar(500) NOT NULL,
  `ClaimNo` varchar(500) NOT NULL,
  `RepairerAddress` varchar(500) NOT NULL,
  `Repairer` varchar(500) NOT NULL,
  `PolicyNo` varchar(500) NOT NULL,
  `Make` varchar(500) NOT NULL,
  `Year` varchar(500) NOT NULL,
  `Mileage` varchar(500) NOT NULL,
  `Color` varchar(500) NOT NULL,
  `Model` varchar(500) NOT NULL,
  `VehicleType` varchar(500) NOT NULL,
  `TotalCost` int(11) NOT NULL,
  `NetPayable` int(11) NOT NULL,
  `Image1` varchar(500) NOT NULL,
  `Image2` varchar(500) NOT NULL,
  `Image3` varchar(500) NOT NULL,
  `Image4` varchar(500) NOT NULL,
  `Image5` varchar(500) NOT NULL,
  `Image6` varchar(500) NOT NULL,
  `FeeNoteFee` int(11) NOT NULL,
  `FeeNoteRefNo` varchar(500) NOT NULL,
  `Vat` int(11) NOT NULL,
  `VatDesc` varchar(500) NOT NULL,
  `AddMileage` int(11) NOT NULL,
  `Photograph` int(11) NOT NULL,
  `FeeNoteSubTotal` int(11) NOT NULL,
  `FeeNoteTotal` int(11) NOT NULL,
  `TotalParts` int(11) NOT NULL,
  `SubTotal` int(11) NOT NULL,
  `PartsVat` int(11) NOT NULL,
  `PartsVatDesc` varchar(500) NOT NULL,
  `GrandTotal` int(11) NOT NULL,
  `User` varchar(500) NOT NULL,
  `PreparedBy` varchar(500) NOT NULL,
  `Remarks` varchar(500) NOT NULL,
  `RegDate` varchar(500) NOT NULL,
  `Status` int(11) NOT NULL,
  `Signature` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `reinspectionimages`
--

CREATE TABLE `reinspectionimages` (
  `id` int(11) NOT NULL,
  `Image1` varchar(500) NOT NULL,
  `Desc1` varchar(500) NOT NULL,
  `Image2` varchar(500) NOT NULL,
  `Desc2` varchar(500) NOT NULL,
  `Text` varchar(500) NOT NULL,
  `ReportId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reinspectionimages`
--

INSERT INTO `reinspectionimages` (`id`, `Image1`, `Desc1`, `Image2`, `Desc2`, `Text`, `ReportId`) VALUES
(1, '906344.jpg', '', '158831.jpg', '', '', 1),
(2, '332638.jpg', '', '343400.jpg', '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `reinspectionimagesdoc`
--

CREATE TABLE `reinspectionimagesdoc` (
  `id` int(11) NOT NULL,
  `Image` varchar(500) NOT NULL,
  `Desc1` varchar(500) NOT NULL,
  `ReportId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reinspectionimagesdoc`
--

INSERT INTO `reinspectionimagesdoc` (`id`, `Image`, `Desc1`, `ReportId`) VALUES
(1, 'Desert.jpg', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `reinspectionremarks`
--

CREATE TABLE `reinspectionremarks` (
  `id` int(11) NOT NULL,
  `No` varchar(500) NOT NULL,
  `Qty` varchar(500) NOT NULL,
  `Description` varchar(500) NOT NULL,
  `Remark` varchar(500) NOT NULL,
  `Amount` int(11) NOT NULL,
  `ReportId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reinspectionremarks`
--

INSERT INTO `reinspectionremarks` (`id`, `No`, `Qty`, `Description`, `Remark`, `Amount`, `ReportId`) VALUES
(1, '1', '10', 'fdf', 'xxxx', 500, 1),
(2, '2', '10', 'fdf', 'hghgfh', 600, 1),
(3, '1', '111', '111', '1', 11, 1),
(4, '1', '1', '1', '1', 1, 1),
(5, '1', '5', '100', '', 500, 7),
(6, '2', '5', 'fff', 'fff', 500, 7),
(7, '1', '1', 'gfgf', 'gfg', 700, 10),
(8, '2', 'ddf', 'fdfdf', 'fdf', 0, 10),
(9, '4', '1', 'Test', 'xxxx', 5000, 8),
(10, '5', '1', 'ggg', 'ggg', 100, 8),
(11, '1', '1', '111', '111', 111, 15),
(12, '1', '1', '1', '1', 1, 15),
(13, '2', '10', 'test', 'replaced', 500, 15),
(14, '4', '5', 'replaced', 'eee', 1000, 8);

-- --------------------------------------------------------

--
-- Table structure for table `reinspectionrepair`
--

CREATE TABLE `reinspectionrepair` (
  `id` int(11) NOT NULL,
  `Description` varchar(500) NOT NULL,
  `Total` int(11) NOT NULL,
  `ReportId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reinspectionrepair`
--

INSERT INTO `reinspectionrepair` (`id`, `Description`, `Total`, `ReportId`) VALUES
(1, 'test', 500, 1),
(2, 'fdfdf', 100, 7);

-- --------------------------------------------------------

--
-- Table structure for table `reinspections`
--

CREATE TABLE `reinspections` (
  `id` int(11) NOT NULL,
  `Customer` varchar(500) NOT NULL,
  `Ref` varchar(500) NOT NULL,
  `Date` varchar(500) NOT NULL,
  `Address` varchar(500) NOT NULL,
  `ChasisNo` varchar(500) NOT NULL,
  `CurrentMileage` varchar(500) NOT NULL,
  `Insured` varchar(500) NOT NULL,
  `RegistrationNo` varchar(500) NOT NULL,
  `ClaimNo` varchar(500) NOT NULL,
  `RepairerAddress` varchar(500) NOT NULL,
  `Repairer` varchar(500) NOT NULL,
  `InstructionsBy` varchar(500) NOT NULL,
  `SumInsured` varchar(500) NOT NULL,
  `Excess` varchar(500) NOT NULL,
  `EngineType` varchar(500) NOT NULL,
  `ScrapWeight` varchar(500) NOT NULL,
  `PolicyNo` varchar(500) NOT NULL,
  `Make` varchar(500) NOT NULL,
  `Year` varchar(500) NOT NULL,
  `Mileage` varchar(500) NOT NULL,
  `Color` varchar(500) NOT NULL,
  `Model` varchar(11) NOT NULL,
  `VehicleType` varchar(11) NOT NULL,
  `TotalCost` int(11) NOT NULL,
  `NetPayable` int(11) NOT NULL,
  `Image1` varchar(500) NOT NULL,
  `Image2` varchar(500) NOT NULL,
  `Image3` varchar(500) NOT NULL,
  `Image4` varchar(500) NOT NULL,
  `Image5` varchar(500) NOT NULL,
  `Image6` varchar(500) NOT NULL,
  `FeeNoteFee` int(11) NOT NULL,
  `FeeNoteRefNo` varchar(500) NOT NULL,
  `Vat` int(11) NOT NULL,
  `VatDesc` varchar(500) NOT NULL,
  `AddMileage` int(11) NOT NULL,
  `MileageDesc` varchar(500) NOT NULL,
  `Photograph` int(11) NOT NULL,
  `FeeNoteSubTotal` int(11) NOT NULL,
  `FeeNoteTotal` int(11) NOT NULL,
  `ChequeNo` varchar(500) NOT NULL,
  `PaymentDate` varchar(500) NOT NULL,
  `TotalParts` int(11) NOT NULL,
  `SubTotal` int(11) NOT NULL,
  `PartsVat` int(11) NOT NULL,
  `PartsVatDesc` varchar(500) NOT NULL,
  `GrandTotal` int(11) NOT NULL,
  `User` varchar(500) NOT NULL,
  `PreparedBy` varchar(500) NOT NULL,
  `RegDate` date NOT NULL,
  `Status` int(11) NOT NULL,
  `PStatus` int(11) NOT NULL,
  `MONTH` varchar(500) NOT NULL,
  `YEARR` year(4) NOT NULL,
  `Signature` varchar(500) NOT NULL,
  `Branch` int(11) NOT NULL,
  `BranchCode` varchar(500) NOT NULL,
  `Fstatus` int(11) NOT NULL,
  `Imported` int(11) NOT NULL,
  `AssessmentReportId` int(11) NOT NULL,
  `Remarks` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reinspections`
--

INSERT INTO `reinspections` (`id`, `Customer`, `Ref`, `Date`, `Address`, `ChasisNo`, `CurrentMileage`, `Insured`, `RegistrationNo`, `ClaimNo`, `RepairerAddress`, `Repairer`, `InstructionsBy`, `SumInsured`, `Excess`, `EngineType`, `ScrapWeight`, `PolicyNo`, `Make`, `Year`, `Mileage`, `Color`, `Model`, `VehicleType`, `TotalCost`, `NetPayable`, `Image1`, `Image2`, `Image3`, `Image4`, `Image5`, `Image6`, `FeeNoteFee`, `FeeNoteRefNo`, `Vat`, `VatDesc`, `AddMileage`, `MileageDesc`, `Photograph`, `FeeNoteSubTotal`, `FeeNoteTotal`, `ChequeNo`, `PaymentDate`, `TotalParts`, `SubTotal`, `PartsVat`, `PartsVatDesc`, `GrandTotal`, `User`, `PreparedBy`, `RegDate`, `Status`, `PStatus`, `MONTH`, `YEARR`, `Signature`, `Branch`, `BranchCode`, `Fstatus`, `Imported`, `AssessmentReportId`, `Remarks`) VALUES
(1, 'C.I.C. Insurance', 'sdsds', '01-10-2020', '', 'fgf', 'gfg', 'sdsd', 'fgfg', 'fgfg', '', 'gfg', 'fgfg', 'gfgf', 'fgfg', 'gf', 'gfg', 'dsds', 'fgfg', 'fgfg', '', 'fgfg', 'FGFGf', 'fgfg', 0, 0, '', '', '', '', '', 'Lighthouse.jpg', 0, '454', 0, 'VAT', 0, 'Mileage', 0, 0, 0, '', '', 1112, 56100, 7854, '14% VAT', 63954, 'Admin', 'F. Mwaniki', '2020-10-22', 0, 0, 'Oct', 2020, 'sign.jpg', 1, 'NO.', 1, 0, 0, '0'),
(6, 'C.I.C. Insurance', 'dsdsds', 'dsds', '', 'dsd', 'sdsd', 'sdsd', 'dsds', 'sdsd', '', 'sds', 'ffff', 'sdsd', 'dsd', 'dsd', '19Kg', 'sdsd', 'dsd', 'sdsd', 'sdsd', 'dssd', 'sds', '', 0, 0, '', '', '', '', '', '', 0, '', 0, '', 0, '', 0, 0, 0, '', '', 100005, 110000, 15400, '14% VAT', 125400, 'Admin', 'F. Mwaniki', '0000-00-00', 0, 0, '', 0000, 'sign.jpg', 0, '', 1, 1, 1, '0'),
(7, 'C.I.C. Insurance', 'wewewe', '01-10-2020', '', 'ewe', 'ewe', 'wew', 'ewe', 'wewe', '', 'ewe', 'ewe', 'KSwh. ewew', 'ewew', 'ew', 'wew', 'wewe', 'ewe', 'ewew', '', 'ewee', 'wewe', 'wewe', 0, 0, '', '', '', '', '', '', 0, '', 0, 'VAT', 0, 'Mileage', 0, 0, 0, '', '', 1000, 1100, 154, '14% VAT', 1254, 'Admin', 'F. Mwaniki', '2020-10-26', 0, 0, 'Oct', 2020, 'sign.jpg', 1, 'NO.', 0, 0, 0, '0'),
(8, 'C.I.C. Insurance', 'dsdsd', '5544', '', 'ghgh', 'sdsdsd', 'hghg', 'ghgh', 'hgh', '', 'ghgh', 'ghgh', 'KSh. ghgh', 'hgh', 'ghh', 'dsdsds', 'DSDS', 'ghg', 'ghgh', 'ghg', 'gh', 'hg', '', 0, 0, '', '', '', '', '', '', 0, '', 0, '', 0, '', 0, 0, 0, '', '', 8400, 1500, 210, '14% VAT', 1710, 'Admin', 'F. Mwaniki', '0000-00-00', 0, 0, '', 0000, 'sign.jpg', 0, '', 1, 1, 2, '0'),
(9, 'Britam', '1237777', 'hfgfgf', '', 'dfdf', 'xxxxxxxx', 'dfdf', 'dfd', 'ffd', '', 'dfdfd', 'dfd', 'KSh. fdf', 'fdf', 'dfd', 'xxxx', 'fdfd', 'dfd', 'dfdf', 'dfd', 'dfdf', 'df', '', 0, 0, '', '', '', '', '', '', 0, '', 0, '', 0, '', 0, 0, 0, '', '', 2500, 0, 0, '', 0, 'Admin', 'F. Mwaniki', '0000-00-00', 0, 0, '', 0000, 'sign.jpg', 0, '', 1, 1, 5, '0'),
(10, 'Monarch Insurance', 'eerer', '08-12-2020', '', 'r', 'erer', 'rere', 'erer', 'erer', '', 'erer', 'erer', 'KSh. erere', 'rer', 're', 'ere', 'erer', 'e', 'erer', '', 'rer', 'e', 'erer', 0, 0, '', '', '', '', '', '', 0, '', 0, 'VAT', 0, 'Mileage', 0, 0, 0, '', '', 0, 0, 0, '', 0, 'Admin', 'F. Mwaniki', '2020-12-04', 0, 0, 'Dec', 2020, 'sign.jpg', 1, 'NO.', 0, 0, 0, '0'),
(11, 'C.I.C. Insurance', '', '09-12-2020', '', 'cxc', 'cxc', 'cxc', 'xcxc', 'xcxc', '', 'xcxcxc', 'xcxc', 'xc', 'cxc', 'xcx', 'xcxc', 'xcscxmmmmmm', 'xcx', 'xcxc', '', 'cx', 'xc', 'cxcx', 0, 0, '', '', '', '', '', '', 0, '', 0, 'VAT', 0, 'Mileage', 0, 0, 0, '', '', 0, 0, 0, '', 0, 'Admin', 'F. Mwaniki', '2020-12-09', 0, 0, 'Dec', 2020, 'sign.jpg', 1, 'NO.', 1, 0, 0, '0'),
(12, 'Monarch Insurance', 'dfdfdf', '09-12-2020', '', 'zxzx', 'xzx', 'xzx', 'zxzx', 'zxx', '', 'zxzx', 'zxzx', 'KSh. xzx', 'zxzx', 'zxz', '100kg', 'zxzx', 'zxzx', 'zxzx', '', 'xhhhhh', 'z', 'zxzx', 0, 0, '', '', '', '', '', '', 0, '', 0, 'VAT', 0, 'Mileage', 0, 0, 0, '', '', 0, 0, 0, '', 0, 'Admin', 'F. Mwaniki', '2020-12-09', 0, 0, 'Dec', 2020, 'sign.jpg', 1, 'NO.', 1, 0, 0, ''),
(13, 'Monarch Insurance', 'dfdf', '10-12-2020', '', 'dfd', 'dfdf', 'dfdf', 'dfdfd', 'fddf', '', 'fddf', 'fdfdf', 'fdf', 'dff', 'dfdf', 'dfdf', 'dfdf', 'dfd', 'dfdf', '', 'dfdf', 'dfdf', 'dfd', 0, 0, '', '', '', '', '', '', 0, '', 0, 'VAT', 0, 'Mileage', 0, 0, 0, '', '', 0, 0, 0, '', 0, 'Admin', 'F. Mwaniki', '2020-12-09', 0, 0, 'Dec', 2020, 'sign.jpg', 1, 'NO.', 0, 0, 0, '0000'),
(14, 'Allianz Insurance Co', 'testyyyy', '09-12-2020', '', 'vcv', 'vcv', 'cvcv', 'cvc', 'vv', 'fdfdfd', 'vccv', 'fdfdfdf', 'cvcvKSh. ', 'cvcv', 'vcv', 'ff', 'cvv', 'cvcv', 'vcv', '', 'cvcvc', 'cvc', 'vccvc', 0, 0, '', '', '', '', '', '', 0, '', 0, '', 0, '', 0, 0, 0, '', '', 0, 0, 0, '', 0, 'Admin', 'F. Mwaniki', '2020-12-09', 0, 0, 'Dec', 2020, 'sign.jpg', 1, 'NO.', 1, 0, 0, 'ferererererererere<br>'),
(15, 'dddddddddddddddddd', 'dddddddddd', '06-01-2021', '', 'ddddddddddd', 'ddddddddd', 'ddddddddd', 'ddddddddd', 'ddddddddddddd', '', 'ddddddddd', 'ddddddddd', 'KSh. ', 'ddddddddd', 'ddddddddddddd', 'dddddddddd', 'ddddddddddd', 'dddddddddddd', 'dddddddddd', '', 'ddddddddd', 'dddddddddd', 'dddddd', 0, 0, '', '', '', '', '', '', 0, '', 0, 'VAT', 0, 'Mileage', 0, 0, 0, '', '', 112, 0, 0, '', 0, 'Admin', 'F. Mwaniki', '2121-01-29', 0, 0, 'Jan', 2021, 'sign.jpg', 1, 'NO.', 0, 0, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `reinspectionsummary`
--

CREATE TABLE `reinspectionsummary` (
  `id` int(11) NOT NULL,
  `Description` varchar(500) NOT NULL,
  `Total` varchar(500) NOT NULL,
  `ReportId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `supplementary`
--

CREATE TABLE `supplementary` (
  `id` int(11) NOT NULL,
  `Ref` varchar(500) NOT NULL,
  `Date` varchar(500) NOT NULL,
  `Address` varchar(500) NOT NULL,
  `Customer` varchar(500) NOT NULL,
  `Intro` varchar(500) NOT NULL,
  `Insured` varchar(500) NOT NULL,
  `ClaimNo` varchar(500) NOT NULL,
  `RegistrationNo` varchar(500) NOT NULL,
  `InstructionsBy` varchar(500) NOT NULL,
  `AssessmentDate` varchar(500) NOT NULL,
  `PolicyNo` varchar(500) NOT NULL,
  `SumInsured` varchar(500) NOT NULL,
  `Excess` varchar(500) NOT NULL,
  `Model` varchar(500) NOT NULL,
  `ChasisNo` varchar(500) NOT NULL,
  `Year` varchar(500) NOT NULL,
  `EngineType` varchar(500) NOT NULL,
  `Mileage` varchar(500) NOT NULL,
  `Color` varchar(500) NOT NULL,
  `Repairer` varchar(500) NOT NULL,
  `Make` varchar(500) NOT NULL,
  `Assessor` varchar(500) NOT NULL,
  `ReportDetails` varchar(50000) NOT NULL,
  `User` varchar(500) NOT NULL,
  `Signature` varchar(500) NOT NULL,
  `Status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplementary`
--

INSERT INTO `supplementary` (`id`, `Ref`, `Date`, `Address`, `Customer`, `Intro`, `Insured`, `ClaimNo`, `RegistrationNo`, `InstructionsBy`, `AssessmentDate`, `PolicyNo`, `SumInsured`, `Excess`, `Model`, `ChasisNo`, `Year`, `EngineType`, `Mileage`, `Color`, `Repairer`, `Make`, `Assessor`, `ReportDetails`, `User`, `Signature`, `Status`) VALUES
(1, 'xxxx', '1234567', '', 'Kenindia Insurance', '', 'ZZ', 'fgf', 'fgf', 'fgfg', '01-10-2020', 'z', 'KSh. fgfgf', 'fgfg', 'gfg', 'gfg', 'fg', 'fgfg', 'fgfg', 'fgfg', 'fgfg', 'fgf', 'F. Mwaniki', '<ul><li>TEST</li></ul>', 'Admin', 'sign.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `supplementaryimages`
--

CREATE TABLE `supplementaryimages` (
  `id` int(11) NOT NULL,
  `Image1` varchar(500) NOT NULL,
  `Desc1` varchar(500) NOT NULL,
  `Image2` varchar(500) NOT NULL,
  `Desc2` varchar(500) NOT NULL,
  `Text` varchar(500) NOT NULL,
  `ReportId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `supplementaryimagesdoc`
--

CREATE TABLE `supplementaryimagesdoc` (
  `id` int(11) NOT NULL,
  `Image` varchar(500) NOT NULL,
  `Desc1` varchar(500) NOT NULL,
  `ReportId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `supplementaryparts`
--

CREATE TABLE `supplementaryparts` (
  `id` int(11) NOT NULL,
  `Number` varchar(500) NOT NULL,
  `Quantity` varchar(500) NOT NULL,
  `Description` varchar(500) NOT NULL,
  `Remarks` varchar(500) NOT NULL,
  `UnitCost` varchar(500) NOT NULL,
  `Total` varchar(500) NOT NULL,
  `ReportId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplementaryparts`
--

INSERT INTO `supplementaryparts` (`id`, `Number`, `Quantity`, `Description`, `Remarks`, `UnitCost`, `Total`, `ReportId`) VALUES
(14, '', '10', 'rererer', '', 'ererer', 'rererr', 1),
(15, '', '', '', '', 'fgfgf', 'fgfg', 1),
(16, '', '', '', '', 'gfgfg', 'fgfgf', 1),
(17, '', '', '', '', 'fgfgfg', 'fgfgfg', 1),
(18, '', '', '', '', 'fgfgf', 'ffgf', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `Id` int(11) NOT NULL,
  `Creator` varchar(11) NOT NULL,
  `AssignedTo` varchar(11) NOT NULL,
  `Name` varchar(500) NOT NULL,
  `Task` varchar(5000) NOT NULL,
  `Status` int(11) NOT NULL,
  `CreationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`Id`, `Creator`, `AssignedTo`, `Name`, `Task`, `Status`, `CreationDate`) VALUES
(1, 'Admin', 'Admin', 'Test', 'Hi admin', 0, '2020-07-30 07:52:53');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `UserName` varchar(100) NOT NULL,
  `Email` varchar(500) NOT NULL,
  `LastName` varchar(500) NOT NULL,
  `PhoneNo` int(11) NOT NULL,
  `IDNO` int(11) NOT NULL,
  `KRA` varchar(500) NOT NULL,
  `NHIF` varchar(500) NOT NULL,
  `NSSF` varchar(500) NOT NULL,
  `Gender` varchar(500) NOT NULL,
  `YOB` int(11) NOT NULL,
  `KINNO` varchar(500) NOT NULL,
  `KINR` varchar(500) NOT NULL,
  `Status` int(11) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `Signature` varchar(500) NOT NULL,
  `Branch` int(11) NOT NULL,
  `updationDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `UserName`, `Email`, `LastName`, `PhoneNo`, `IDNO`, `KRA`, `NHIF`, `NSSF`, `Gender`, `YOB`, `KINNO`, `KINR`, `Status`, `Password`, `Signature`, `Branch`, `updationDate`) VALUES
(4, 'Admin', 'Admin', '', 0, 0, '', '', '', '', 0, '', '', 1, '4865fbecbd6dfe00111a85f92d342838', 'sign.jpg', 1, '2020-10-28 03:39:10');

-- --------------------------------------------------------

--
-- Table structure for table `valuationimages`
--

CREATE TABLE `valuationimages` (
  `id` int(11) NOT NULL,
  `Image1` varchar(500) NOT NULL,
  `Desc1` varchar(500) NOT NULL,
  `Image2` varchar(500) NOT NULL,
  `Desc2` varchar(500) NOT NULL,
  `Text` varchar(500) NOT NULL,
  `ReportId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `valuationimagesdoc`
--

CREATE TABLE `valuationimagesdoc` (
  `id` int(11) NOT NULL,
  `Image` varchar(500) NOT NULL,
  `Desc1` varchar(500) NOT NULL,
  `ReportId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `valuations`
--

CREATE TABLE `valuations` (
  `id` int(11) NOT NULL,
  `ValuationDate` varchar(500) NOT NULL,
  `Insured` varchar(500) NOT NULL,
  `PhoneNo` varchar(500) NOT NULL,
  `Insurer` varchar(500) NOT NULL,
  `User` varchar(500) NOT NULL,
  `YourRef` varchar(500) NOT NULL,
  `DateOfFirstRegistration` varchar(500) NOT NULL,
  `RegNo` varchar(500) NOT NULL,
  `Make` varchar(500) NOT NULL,
  `ChasisNo` varchar(500) NOT NULL,
  `EngineNo` varchar(500) NOT NULL,
  `EngineRating` varchar(500) NOT NULL,
  `BodyType` varchar(500) NOT NULL,
  `Year` varchar(500) NOT NULL,
  `Color` varchar(500) NOT NULL,
  `DateOfReg` varchar(500) NOT NULL,
  `Odometer` varchar(500) NOT NULL,
  `CountryOfOrigin` varchar(500) NOT NULL,
  `GearType` varchar(500) NOT NULL,
  `CoachWork` varchar(500) NOT NULL,
  `Mechanical` varchar(500) NOT NULL,
  `Brakes` varchar(500) NOT NULL,
  `Tyre` varchar(500) NOT NULL,
  `Extras` varchar(500) NOT NULL,
  `Steering` varchar(500) NOT NULL,
  `Type` varchar(500) NOT NULL,
  `Address` varchar(500) NOT NULL,
  `Remarks` varchar(500) NOT NULL,
  `PlaceOfInspection` varchar(500) NOT NULL,
  `OurRef` varchar(500) NOT NULL,
  `InsurableValues` varchar(500) NOT NULL,
  `InsurableValues1` varchar(5000) NOT NULL,
  `Destination` varchar(500) NOT NULL,
  `ValuationValue` varchar(500) NOT NULL,
  `Image1` varchar(500) NOT NULL,
  `Image2` varchar(500) NOT NULL,
  `Image3` varchar(500) NOT NULL,
  `Image4` varchar(500) NOT NULL,
  `Image5` varchar(500) NOT NULL,
  `RegDate` date NOT NULL,
  `Status` int(11) NOT NULL,
  `FeeNoteNo` varchar(500) NOT NULL,
  `FeeNoteMileage` int(11) NOT NULL,
  `MileageDesc` varchar(500) NOT NULL,
  `Photograph` int(11) NOT NULL,
  `Fee` int(11) NOT NULL,
  `FeeNoteSubTotal` int(11) NOT NULL,
  `FeeNoteVat` int(11) NOT NULL,
  `VatDesc` varchar(500) NOT NULL,
  `FeeNoteTotal` int(11) NOT NULL,
  `ChequeNo` varchar(500) NOT NULL,
  `PStatus` int(11) NOT NULL,
  `PaymentDate` varchar(500) NOT NULL,
  `MONTH` varchar(500) NOT NULL,
  `YEARR` year(4) NOT NULL,
  `Signature` varchar(500) NOT NULL,
  `Branch` int(11) NOT NULL,
  `BranchCode` varchar(500) NOT NULL,
  `Fstatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `valuations`
--

INSERT INTO `valuations` (`id`, `ValuationDate`, `Insured`, `PhoneNo`, `Insurer`, `User`, `YourRef`, `DateOfFirstRegistration`, `RegNo`, `Make`, `ChasisNo`, `EngineNo`, `EngineRating`, `BodyType`, `Year`, `Color`, `DateOfReg`, `Odometer`, `CountryOfOrigin`, `GearType`, `CoachWork`, `Mechanical`, `Brakes`, `Tyre`, `Extras`, `Steering`, `Type`, `Address`, `Remarks`, `PlaceOfInspection`, `OurRef`, `InsurableValues`, `InsurableValues1`, `Destination`, `ValuationValue`, `Image1`, `Image2`, `Image3`, `Image4`, `Image5`, `RegDate`, `Status`, `FeeNoteNo`, `FeeNoteMileage`, `MileageDesc`, `Photograph`, `Fee`, `FeeNoteSubTotal`, `FeeNoteVat`, `VatDesc`, `FeeNoteTotal`, `ChequeNo`, `PStatus`, `PaymentDate`, `MONTH`, `YEARR`, `Signature`, `Branch`, `BranchCode`, `Fstatus`) VALUES
(2, '', 'sdsd', 'dsd', 'Mua Insurance', '', 'dsdssdsdsdsd', 'dsdsdddddd', 'sd', 'dsds', 'dsd', 'dsd', '', '', 'dsds', 'ds', '', 'dsd', '', '', 'sdsd', 'sdsd', 'sdsd', 'sdsd', 'sdsd', 'sdsds', 'sds', '', 'Good and serviceable ', 'dsdsdsdsdsdsdsdsdsdsds', '', '', '', '', 'Ksh. (Amount in words XXXX) ', '', '', '', '', '', '2020-10-26', 0, '', 0, '', 0, 0, 0, 0, '', 0, '', 0, '', 'Oct', 2020, 'sign.jpg', 1, 'NO.', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assessmentdrafts`
--
ALTER TABLE `assessmentdrafts`
  ADD PRIMARY KEY (`draftid`);

--
-- Indexes for table `assessmentimages`
--
ALTER TABLE `assessmentimages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assessmentimagesdoc`
--
ALTER TABLE `assessmentimagesdoc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assessments`
--
ALTER TABLE `assessments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `costofrepairs`
--
ALTER TABLE `costofrepairs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `costofrepairsrevised`
--
ALTER TABLE `costofrepairsrevised`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `costofrepairssummary`
--
ALTER TABLE `costofrepairssummary`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `costofrepairssummaryrevised`
--
ALTER TABLE `costofrepairssummaryrevised`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `feenotes`
--
ALTER TABLE `feenotes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recommendation`
--
ALTER TABLE `recommendation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reinspectiondrafts`
--
ALTER TABLE `reinspectiondrafts`
  ADD PRIMARY KEY (`draftid`);

--
-- Indexes for table `reinspectionimages`
--
ALTER TABLE `reinspectionimages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reinspectionimagesdoc`
--
ALTER TABLE `reinspectionimagesdoc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reinspectionremarks`
--
ALTER TABLE `reinspectionremarks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reinspectionrepair`
--
ALTER TABLE `reinspectionrepair`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reinspections`
--
ALTER TABLE `reinspections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reinspectionsummary`
--
ALTER TABLE `reinspectionsummary`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplementary`
--
ALTER TABLE `supplementary`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplementaryimages`
--
ALTER TABLE `supplementaryimages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplementaryimagesdoc`
--
ALTER TABLE `supplementaryimagesdoc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplementaryparts`
--
ALTER TABLE `supplementaryparts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `valuationimages`
--
ALTER TABLE `valuationimages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `valuationimagesdoc`
--
ALTER TABLE `valuationimagesdoc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `valuations`
--
ALTER TABLE `valuations`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assessmentdrafts`
--
ALTER TABLE `assessmentdrafts`
  MODIFY `draftid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `assessmentimages`
--
ALTER TABLE `assessmentimages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `assessmentimagesdoc`
--
ALTER TABLE `assessmentimagesdoc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `assessments`
--
ALTER TABLE `assessments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `costofrepairs`
--
ALTER TABLE `costofrepairs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `costofrepairsrevised`
--
ALTER TABLE `costofrepairsrevised`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `costofrepairssummary`
--
ALTER TABLE `costofrepairssummary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `costofrepairssummaryrevised`
--
ALTER TABLE `costofrepairssummaryrevised`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `feenotes`
--
ALTER TABLE `feenotes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `recommendation`
--
ALTER TABLE `recommendation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reinspectiondrafts`
--
ALTER TABLE `reinspectiondrafts`
  MODIFY `draftid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reinspectionimages`
--
ALTER TABLE `reinspectionimages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `reinspectionimagesdoc`
--
ALTER TABLE `reinspectionimagesdoc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `reinspectionremarks`
--
ALTER TABLE `reinspectionremarks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `reinspectionrepair`
--
ALTER TABLE `reinspectionrepair`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `reinspections`
--
ALTER TABLE `reinspections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `reinspectionsummary`
--
ALTER TABLE `reinspectionsummary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `supplementary`
--
ALTER TABLE `supplementary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `supplementaryimages`
--
ALTER TABLE `supplementaryimages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `supplementaryimagesdoc`
--
ALTER TABLE `supplementaryimagesdoc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `supplementaryparts`
--
ALTER TABLE `supplementaryparts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `valuationimages`
--
ALTER TABLE `valuationimages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `valuationimagesdoc`
--
ALTER TABLE `valuationimagesdoc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `valuations`
--
ALTER TABLE `valuations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
