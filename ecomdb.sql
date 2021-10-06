-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 16, 2021 at 09:36 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecomdb`
--
CREATE DATABASE IF NOT EXISTS `ecomdb` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `ecomdb`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `AdminID` int(10) NOT NULL AUTO_INCREMENT,
  `AdminN` varchar(50) NOT NULL,
  `passN` varchar(50) NOT NULL,
  PRIMARY KEY (`AdminID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`AdminID`, `AdminN`, `passN`) VALUES
(1, 'Admin', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `pricedb`
--

DROP TABLE IF EXISTS `pricedb`;
CREATE TABLE IF NOT EXISTS `pricedb` (
  `PriceID` int(10) NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) NOT NULL,
  `Description` varchar(50) NOT NULL,
  `Price` int(10) NOT NULL,
  `image` varchar(100) NOT NULL,
  `category` varchar(50) NOT NULL,
  PRIMARY KEY (`PriceID`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pricedb`
--

INSERT INTO `pricedb` (`PriceID`, `Name`, `Description`, `Price`, `image`, `category`) VALUES
(1, 'Beef Bone In (Net Weight ± 50 gm)', '1 kg', 559, 'beef-bone-in-net.jpg', 'Beef'),
(2, 'Beef Bone In (Net Weight ± 50 gm)', '5 kg', 2700, 'organic_beef_marrow_bones.jpg', 'Beef'),
(3, 'Broiler Chicken Skin Off (Net Weight ± 50 gm)', '1 kg', 219, 'broiler-chicken.jpg', 'Chicken'),
(4, 'Broiler Chicken Skin Off (Net Weight ± 50 gm)', '5 kg', 1000, 'stock-photo-whole-raw-chicken.jpg', 'Chicken'),
(5, 'Cow Liver', '500g', 299, 'Beef-liver-nutritional-information-calories.jpg', 'Beef'),
(6, 'Tokma', '50g', 100, 'Tokma.jpg', 'Cereal'),
(7, 'Tisi', '50g', 75, 'Tisi.jpg', 'Cereal'),
(8, 'talapia', '500 g', 50, 'talapia.jpg', 'Fish'),
(9, 'Combin Bed', 'Bed with other Metarils', 5000, 'Combain_Bed.jpg', 'Home'),
(12, 'Amand', '1 Kg', 500, 'Amand.jpg', 'Fruit');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `UserID` int(10) NOT NULL AUTO_INCREMENT,
  `UserN` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `mobile` varchar(12) NOT NULL,
  PRIMARY KEY (`UserID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserID`, `UserN`, `pass`, `email`, `address`, `mobile`) VALUES
(1, 'admin', 'admin@gmail.com', 'santo.botany@gmail.com', 'Chayaneer, House no-19, Sataish Eidgha Road, Tongi, Gazipur City Corporation,  Gazipur-1712.', 'mobile'),
(3, 'hasib', '123456789', 'hasib@gmail.com', 'Satish, Tongi,  Gazipur', 'mobile'),
(4, 'shasib', '012345678', 'shasib@gmail.com', 'tongi gazipur', 'mobile'),
(5, 'admin', 'admin', 'santo.botany@gmail.com', 'Chayaneer, House no-19, Sataish Eidgha Road, Tongi, Gazipur City Corporation,  Gazipur-1712.', 'mobile');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
