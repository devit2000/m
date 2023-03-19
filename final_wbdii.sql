-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 19, 2023 at 02:46 AM
-- Server version: 8.0.27
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `final_wbdii`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_slideshow`
--

DROP TABLE IF EXISTS `tbl_slideshow`;
CREATE TABLE IF NOT EXISTS `tbl_slideshow` (
  `ssid` int NOT NULL AUTO_INCREMENT,
  `title` varchar(150) COLLATE utf8mb4_general_ci NOT NULL,
  `text` varchar(300) COLLATE utf8mb4_general_ci NOT NULL,
  `link` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `img` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `active` char(1) COLLATE utf8mb4_general_ci NOT NULL,
  `ordernum` int NOT NULL,
  PRIMARY KEY (`ssid`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_slideshow`
--

INSERT INTO `tbl_slideshow` (`ssid`, `title`, `text`, `link`, `img`, `active`, `ordernum`) VALUES
(7, 'Water Festival', 'Lorem rebum magna amet lorem magna erat diam stet. Sadips duo stet amet amet ndiam elitr ipsum diam.', '#', 'carousel-3.jpg', '1', 3),
(5, 'Khmer New Year', 'Lorem rebum magna amet lorem magna erat diam stet. Sadips duo stet amet amet ndiam elitr ipsum diam.', '#', 'carousel-1.jpg', '1', 1),
(6, 'Pchum Ben Festival', 'Lorem rebum magna amet lorem magna erat diam stet. Sadips duo stet amet amet ndiam elitr ipsum diam.', '#', 'carousel-2.jpg', '0', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

DROP TABLE IF EXISTS `tbl_user`;
CREATE TABLE IF NOT EXISTS `tbl_user` (
  `userid` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `fullname` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `isadmin` char(1) COLLATE utf8mb4_general_ci NOT NULL,
  `active` char(1) COLLATE utf8mb4_general_ci NOT NULL,
  `lastlogin` timestamp NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`userid`, `username`, `password`, `fullname`, `isadmin`, `active`, `lastlogin`) VALUES
(1, 'admin', '202cb962ac59075b964b07152d234b70', 'Banana Killer', '1', '1', '2023-03-31 16:03:28');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
