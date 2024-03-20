-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql113.infinityfree.com
-- Generation Time: Mar 20, 2024 at 01:07 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `if0_35572792_ecom30`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE `admin_users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`id`, `username`, `password`) VALUES
(1, 'qasim', 'Qasim$#@');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `categories` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `categories`, `image`, `status`) VALUES
(5, 'MOBILES', 'images.jpg', 1),
(8, 'SMART WATCHES', 'ZM03-Series-7-Smart-Watch-Price-in-Pakistan.jpg', 1),
(10, 'Airpods ðŸŽ§', 'akrales_191030_3763_0471.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(75) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `comment` text NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `name`, `email`, `mobile`, `comment`, `added_on`) VALUES
(1, 'Vishal', 'vishal@gmail.com', '1234567890', 'Test Query', '2020-01-14 00:00:00'),
(2, 'vishal@gmail.com', '', '1234567890', 'testing', '2020-01-19 07:59:38'),
(3, 'Vishal', 'vishal@gmail.com', '1234567890', 'testing', '2020-01-19 08:00:09'),
(4, 'test', 'test@gmail.com', '9990413778', 'test', '2020-05-01 09:21:37');

-- --------------------------------------------------------

--
-- Table structure for table `coupon_master`
--

CREATE TABLE `coupon_master` (
  `id` int(11) NOT NULL,
  `coupon_code` varchar(50) NOT NULL,
  `coupon_value` int(11) NOT NULL,
  `coupon_type` varchar(10) NOT NULL,
  `cart_min_value` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `address` varchar(250) NOT NULL,
  `city` varchar(50) NOT NULL,
  `pincode` int(11) NOT NULL,
  `payment_type` varchar(20) NOT NULL,
  `total_price` float NOT NULL,
  `payment_status` varchar(20) NOT NULL,
  `order_status` int(11) NOT NULL,
  `length` float NOT NULL,
  `breadth` float NOT NULL,
  `height` float NOT NULL,
  `weight` float NOT NULL,
  `txnid` varchar(200) NOT NULL,
  `mihpayid` varchar(200) NOT NULL,
  `ship_order_id` int(11) NOT NULL,
  `ship_shipment_id` int(11) NOT NULL,
  `payu_status` varchar(10) NOT NULL,
  `coupon_id` int(11) NOT NULL,
  `coupon_value` varchar(50) NOT NULL,
  `coupon_code` varchar(50) NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`id`, `order_id`, `product_id`, `qty`, `price`) VALUES
(1, 1, 12, 1, 100),
(2, 1, 10, 1, 10),
(3, 2, 13, 1, 150),
(4, 2, 12, 1, 100),
(5, 3, 6, 1, 1500),
(6, 4, 11, 2, 50),
(7, 6, 1, 1, 8499),
(8, 7, 1, 1, 8499),
(9, 8, 1, 1, 5),
(10, 10, 1, 1, 5),
(11, 11, 1, 1, 5),
(12, 12, 1, 1, 5),
(13, 14, 1, 1, 5),
(14, 15, 1, 1, 5),
(15, 16, 1, 1, 5),
(16, 17, 1, 1, 5),
(17, 18, 1, 1, 5),
(18, 19, 1, 1, 5),
(19, 20, 1, 1, 5),
(20, 21, 1, 1, 5),
(21, 22, 1, 1, 5),
(22, 23, 1, 1, 5),
(23, 24, 1, 1, 5),
(24, 25, 1, 1, 5),
(25, 26, 1, 1, 8999),
(26, 27, 26, 1, 7199),
(27, 28, 28, 1, 3999);

-- --------------------------------------------------------

--
-- Table structure for table `order_status`
--

CREATE TABLE `order_status` (
  `id` int(11) NOT NULL,
  `name` varchar(32) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order_status`
--

INSERT INTO `order_status` (`id`, `name`) VALUES
(1, 'Pending'),
(2, 'Processing'),
(3, 'Shipped'),
(4, 'Canceled'),
(5, 'Complete');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `categories_id` int(11) NOT NULL,
  `sub_categories_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `mrp` float NOT NULL,
  `price` float NOT NULL,
  `qty` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `short_desc` varchar(2000) NOT NULL,
  `description` text NOT NULL,
  `best_seller` int(11) NOT NULL,
  `meta_title` varchar(2000) NOT NULL,
  `meta_desc` varchar(2000) NOT NULL,
  `meta_keyword` varchar(2000) NOT NULL,
  `added_by` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `categories_id`, `sub_categories_id`, `name`, `mrp`, `price`, `qty`, `image`, `short_desc`, `description`, `best_seller`, `meta_title`, `meta_desc`, `meta_keyword`, `added_by`, `status`) VALUES
(21, 8, 0, 'T 905 ULTRA MAX SUIT', 4800, 4299, 5, '714051985_20240126084738c4ca4238a0b92382.jpg', 'T 905 ultra max suit\r\nSpace Aluminium Case\r\n49 MM\r\nSmart watch\r\nBand charging cable', 'Includes smart watch band Charging cable and user manual Smart watch is not a medical device\r\nBattery life Charge Cycles and display life very by use and setting', 1, 'Watch ultra 9\r\nSpace Aluminium Case\r\nModel T905 ultra max suit\r\nSmart watch may need to be serviced or be replaced by authorized service provider', 'Smart Watch ultra 9 watch ultra\r\nSpace Aluminium Case\r\n49 MM T905 ultra max suit\r\nIncludes \r\nSmart watch band Charging cable and user manual\r\nBattery life Charge Cycles and display', 'Smart Watch\r\nWetch \r\nwatches\r\nWetches\r\nUltra Watch\r\nTouch screen watch\r\nToch watch\r\nBest watch beautiful watch\r\nBest price watch\r\nVery beautiful watch\r\nNew watch New model\r\nSmart ultra watch\r\nUltra wetch\r\nBest watch beautiful and best display watch\r\nTouch\r\nÙ¹Ú† Ú¯Ú¾Ú‘ÛŒ\r\nÙ¹Ú† Ú¯Ú¾Ú‘ÛŒØ§Úº\r\nÚ¯Ú¾Ú‘ÛŒ Ú¯Ú¾Ú‘ÛŒØ§Úº', 1, 1),
(22, 8, 0, 'Smart watch+ 8 Straps BIG 2.01', 5500, 4499, 5, '318106698_20240225_115340.png', '8+1 Eight Straps BIG 2.01 Infinite Display\\r\\nSmart Watch Wireless charger', 'Includes smart watch band Charging cable and user manual Smart watch is not a medical device', 1, 'Smart watch BIG 2.01\\r\\nInfinite Display wireless charger\\r\\n8+1 Straps\\r\\nVery beautiful watch', '8+1 \\r\\nEight Straps\\r\\nBIG 2.01 infinite Display Smart watch+8 Straps\\r\\nWireless charger\\r\\nIncludes \\r\\nSmart watch band Charging cable and user manual\\r\\nBattery life Charge Cycles and display', 'BIG 2.01 infinite Display\\r\\nbig 2.01 infinite Display\\r\\n8+1 Eight Straps\\r\\nSmart Watch\\r\\nWetch \\r\\nwatches\\r\\nWetches\\r\\nUltra Watch\\r\\nTouch screen watch\\r\\nToch watch\\r\\nBest watch beautiful watch\\r\\nBest price watch\\r\\nVery beautiful watch\\r\\nNew watch New model\\r\\nSmart ultra watch\\r\\nUltra wetch\\r\\nBest watch beautiful and best display watch\\r\\nTouch\\r\\nÙ¹Ú† Ú¯Ú¾Ú‘ÛŒ\\r\\nÙ¹Ú† Ú¯Ú¾Ú‘ÛŒØ§Úº\\r\\nÚ¯Ú¾Ú‘ÛŒ Ú¯Ú¾Ú‘ÛŒØ§Úº', 1, 1),
(23, 8, 0, 'WS-X900 Ultra 10+1', 5300, 4499, 5, '219800400_20240225_120236.png', 'Ws x 900 ultra 10+1\r\nFere fit This product is not a medical device\r\nThe health data and recommendations provided are for reference', 'Ws x 900 ultra 10+1\r\nFere fit This product is not a medical device\r\nThe health data and recommendations provided are for reference only\r\nThis product contains rechargeable batteries battery safety warning', 1, 'Ws x 900 ultra 10+1\r\nFere fit This product is not a medical device\r\nThe health data and recommendations provided are for referenc\r\nDo not put in high temperature environment battery after immersion', 'The health data and recommendations provided are for reference only\r\nThis product contains rechargeable batteries battery safety warning\r\nIncludes \r\nSmart watch band Charging cable and user manual\r\nBattery life Charge Cycles and display', 'Smart Watch\r\nWetch \r\nwatches\r\nWetches\r\nUltra Watch\r\nTouch screen watch\r\nToch watch\r\nBest watch beautiful watch\r\nBest price watch\r\nVery beautiful watch\r\nNew watch New model\r\nSmart ultra watch\r\nUltra wetch\r\nBest watch beautiful and best display watch\r\nTouch\r\nÙ¹Ú† Ú¯Ú¾Ú‘ÛŒ\r\nÙ¹Ú† Ú¯Ú¾Ú‘ÛŒØ§Úº\r\nÚ¯Ú¾Ú‘ÛŒ Ú¯Ú¾Ú‘ÛŒØ§Úº', 1, 1),
(24, 8, 0, 'Smart Watch T30 Ultra', 3300, 2799, 5, '313374647_20240225_144313.png', 'T30 Ultra BIG 2.01 Infinite Display\r\nHIWatch Pro', 'T30 Ultra BIG 2.01 Infinite Display\r\nHIWatch Pro\r\nIncludes smart watch band Charging cable and user manual\r\nNot all capabilities are available in all areas\r\nBattery life Charge Cycles and display life very by use and settings.\r\nPlease use output below 2A adaptor\r\nPlease adjust Sound to proper volume', 1, 'T30 Ultra BIG 2.01 Infinite Display\r\nHIWatch Pro\r\nSmart watch Includes \r\nSmart watch band Charging cable and user manual\r\nBattery life Charge Cycles and display', 'T30 Ultra BIG 2.01 Infinite Display\r\nHIWatch Pro\r\nSmart watch Includes \r\nSmart watch band Charging cable and user manual\r\nBattery life Charge Cycles and display\r\nHigh emperatue\r\nAnd humid environments', 'T30 Ultra BIG 2.01 Infinite Display\r\nHIWatch Pro\r\nSmart watch Includes \r\nSmart watch band Charging cable and user manual\r\nBattery life Charge Cycles and display\r\nSmart Watch\r\nWetch \r\nwatches\r\nWetches\r\nUltra Watch\r\nTouch screen watch\r\nToch watch\r\nBest watch beautiful watch\r\nBest price watch\r\nVery beautiful watch\r\nNew watch New model\r\nSmart ultra watch\r\nUltra wetch\r\nBest watch beautiful and best display watch\r\nTouch\r\nÙ¹Ú† Ú¯Ú¾Ú‘ÛŒ\r\nÙ¹Ú† Ú¯Ú¾Ú‘ÛŒØ§Úº\r\nÚ¯Ú¾Ú‘ÛŒ Ú¯Ú¾Ú‘ÛŒØ§Úº', 1, 1),
(25, 8, 0, 'SMART WATCH WS X9 Ultra', 6500, 4899, 5, '606624257_20240225_170426.png', 'SMART Watch WS X9 Ultra\r\n7+1 Fere Fit\r\nThis product is not a medical device\r\nThis product Contains rechargeable batteries', 'SMART Watch WS X9 Ultra\r\n7+1 Fere Fit\r\nThis product is not a medical device\r\nThis product Contains rechargeable batteries \r\nExtrusion Or put into the fire\r\nIf there is a serious bluge', 1, 'SMART Watch WS X9 Ultra\r\n7+1 Fere Fit\r\nThis product is not a medical device\r\nThis product Contains rechargeable batteries \r\nExtrusion Or put into the fire\r\nIf there is a serious bluge\r\nBattery after immersion', 'SMART Watch WS X9 Ultra\r\n7+1 Fere Fit\r\nThis product is not a medical device\r\nThis product Contains rechargeable batteries \r\nExtrusion Or put into the fire\r\nIf there is a serious bluge\r\nSmart watch best watch', 'Smart Watch\r\nWetch \r\nwatches\r\nWetches\r\nUltra Watch\r\nTouch screen watch\r\nToch watch\r\nBest watch beautiful watch\r\nBest price watch\r\nVery beautiful watch\r\nNew watch New model\r\nSmart ultra watch\r\nUltra wetch\r\nBest watch beautiful and best display watch\r\nTouch\r\nÙ¹Ú† Ú¯Ú¾Ú‘ÛŒ\r\nÙ¹Ú† Ú¯Ú¾Ú‘ÛŒØ§Úº\r\nÚ¯Ú¾Ú‘ÛŒ Ú¯Ú¾Ú‘ÛŒØ§Úº', 1, 1),
(26, 8, 0, 'WS 39 ULTRA MAX', 8500, 7199, 5, '168519094_20240225_174837.png', 'Ws39 Ultra max\r\nHD BIG SCREEN  5+1\r\n (Five Plus One)\r\nAmoled Display \r\nSmart watch', 'Ws39 Ultra max\r\nHD BIG SCREEN  5+1\r\n (Five Plus One)\r\nAmoled Display \r\nSmart watch \r\nThis product is not a medical device the health data and recommendations provided are for reference only.\r\nNot as a basis', 1, 'Ws39 Ultra max\r\nHD BIG SCREEN  5+1\r\n (Five Plus One)\r\nAmoled Display \r\nSmart watch \r\nThis product is not a medical device the health data and recommendations provided are for reference only.\r\nNot as a basis', 'Ws39 Ultra max\r\nHD BIG SCREEN  5+1\r\n (Five Plus One)\r\nAmoled Display \r\nSmart watch \r\nThis product is not a medical device the health data and recommendations provided are for reference only.\r\nNot as a basis \r\nBattery after immersion\r\nThis product contains rechargeable batteries battery safety warning\r\nDo not disassemble', 'Ws39 Ultra max\r\nHD BIG SCREEN  5+1\r\n (Five Plus One)\r\nAmoled Display \r\nSmart watch \r\nThis product is not a medical device the health data and recommendations provided are for reference only.\r\nNot as a basis Smart Watch\r\nWetch \r\nwatches\r\nWetches\r\nUltra Watch\r\nTouch screen watch\r\nToch watch\r\nBest watch beautiful watch\r\nBest price watch\r\nVery beautiful watch\r\nNew watch New model\r\nSmart ultra watch\r\nUltra wetch\r\nBest watch beautiful and best display watch\r\nTouch\r\nÙ¹Ú† Ú¯Ú¾Ú‘ÛŒ\r\nÙ¹Ú† Ú¯Ú¾Ú‘ÛŒØ§Úº\r\nÚ¯Ú¾Ú‘ÛŒ Ú¯Ú¾Ú‘ÛŒØ§Úº', 1, 1),
(27, 8, 0, 'PRO 9 WATCH GS', 6000, 4699, 5, '542685441_20240226_101226.png', 'PRO 9 watch GS\r\nMacaroon Smart watch Series\r\nSmart watch band Charging cable and user manual', 'PRO 9 watch GS\r\nMacaroon Smart watch Series\r\nBlood glucose monitor\r\n49MM Watch Case \r\nWireless Charging\r\n8 Ul Styles\r\n2.1 inch display\r\nTrue Snap\r\nFun Game\r\nSport Modes\r\nMulti language\r\nBT Call\r\nMusic Player\r\nMessage \r\nSmart watch band Charging cable and user manual \r\nNot all capabilities are available in all areas\r\nSmart watch is not medical device', 1, 'PRO 9 watch GS\r\nMacaroon Smart watch Series\r\nSmart watch band Charging cable and user manual \r\nNot all capabilities are available in all areas\r\nSmart watch is not medical device\r\nBattery life Charge Cycles and display life very by use and setting', 'PRO 9 watch GS\r\nMacaroon Smart watch Series\r\nSmart watch band Charging cable and user manual \r\nNot all capabilities are available in all areas\r\nSmart watch is not medical device\r\nBattery life Charge Cycles and display life very by use and setting\r\nSmart watch may need to be serviced', 'PRO 9 watch GS\r\nMacaroon Smart watch Series\r\nSmart watch band Charging cable and user manual \r\nNot all capabilities are available in all areas\r\nSmart watch is not medical device\r\nBattery life Charge Cycles and display life very by use and setting\r\nSmart watch may need to be serviced \r\nSmart Watch\r\nWetch \r\nwatches\r\nWetches\r\nUltra Watch\r\nTouch screen watch\r\nToch watch\r\nBest watch beautiful watch\r\nBest price watch\r\nVery beautiful watch\r\nNew watch New model\r\nSmart ultra watch\r\nUltra wetch\r\nBest watch beautiful and best display watch\r\nTouch\r\nÙ¹Ú† Ú¯Ú¾Ú‘ÛŒ\r\nÙ¹Ú† Ú¯Ú¾Ú‘ÛŒØ§Úº\r\nÚ¯Ú¾Ú‘ÛŒ Ú¯Ú¾Ú‘ÛŒØ§Úº', 1, 1),
(28, 8, 0, 'T908 ULTRA MAX SUIT', 5000, 3999, 5, '487780595_20240226_112511.png', 'T908 ULTRA MAX SUIT\r\n9 in 1 Set\r\nHi watch Ultra9 \r\nSpace Aluminium Case \r\nT908 ultra max suit', 'T908 ULTRA MAX SUIT\r\n9 in 1 Set\r\nHi watch Ultra9 \r\nSpace Aluminium Case \r\nIncludes smart watch band Charging cable and user manual not all capabilities are available in all areas smart watch is not a medical device', 1, 'T908 ULTRA MAX SUIT\r\n9 in 1 Set\r\nHi watch Ultra9 \r\nSpace Aluminium Case \r\nIncludes smart watch band Charging cable and user manual not all capabilities are available in all areas smart watch is not a medical device \r\nBattery life Charge Cycles and display life very by use and setting\r\nSmart watch may need to be serviced or be replaced by authorized service provider', 'T908 ULTRA MAX SUIT\r\n9 in 1 Set\r\nHi watch Ultra9 \r\nSpace Aluminium Case \r\nIncludes smart watch band Charging cable and user manual not all capabilities are available in all areas smart watch is not a medical device \r\nBattery life Charge Cycles and display life very by use and setting\r\nSmart watch may need to be serviced or be replaced by authorized service provider \r\n9 in 1 set', 'T908 ULTRA MAX SUIT\r\n9 in 1 Set\r\n\r\nHi watch Ultra9 \r\nSpace Aluminium Case \r\nIncludes smart watch band Charging cable and user manual not all capabilities are available in all areas smart watch is not a medical device \r\nBattery life Charge Cycles and display life very by use and setting\r\nSmart watch may need to be serviced or be replaced by authorized service provider \r\n9 in 1 set\r\nSmart Watch\r\nWetch \r\nwatches\r\nWetches\r\nUltra Watch\r\nTouch screen watch\r\nToch watch\r\nBest watch beautiful watch\r\nBest price watch\r\nVery beautiful watch\r\nNew watch New model\r\nSmart ultra watch\r\nUltra wetch\r\nBest watch beautiful and best display watch\r\nTouch\r\nÙ¹Ú† Ú¯Ú¾Ú‘ÛŒ\r\nÙ¹Ú† Ú¯Ú¾Ú‘ÛŒØ§Úº\r\nÚ¯Ú¾Ú‘ÛŒ Ú¯Ú¾Ú‘ÛŒØ§Úº', 1, 1),
(29, 8, 0, 'KW 900 ULTRA 2', 3999, 2999, 5, '526922761_20240226_135652.png', '49mm HD display with 320Ã—320 resolution\r\nHeart rate monitoring\r\nFitness tracking (steps, distance, calories burned)\r\nBluetooth calling\r\nIP68 water resistance\r\nMultiple sports modes\r\nKW900 ULTRA 2\r\n KW900 ULTRA 2\r\nKw900ultra 2\r\nKEQIWEAR\r\nThis product is not a medical device the health data and recommendations provided', 'KW900 ULTRA 249mm HD display with 320Ã—320 resolution\r\nHeart rate monitoring\r\nFitness tracking (steps, distance, calories burned)\r\nBluetooth calling\r\nIP68 water resistance\r\nMultiple sports modes\r\nKW900 ULTRA 2\r\n KW900 ULTRA 2\r\nKw900ultra 2\r\nKEQIWEAR\r\nThis product is not a medical device the health data and recommendations provided \r\nThis product contains rechargeable batteries battery safety warning', 1, 'KW900 Ultra 2\r\n49mm HD display with 320Ã—320 resolution\r\nHeart rate monitoring\r\nFitness tracking (steps, distance, calories burned)\r\nBluetooth calling\r\nIP68 water resistance\r\nMultiple sports modes\r\nKW900 ULTRA 2\r\n KW900 ULTRA 2\r\nKw900ultra 2\r\nKEQIWEAR\r\nThis product is not a medical device the health data and recommendations provided', 'KW900 Ultra 2\r\n49mm HD display with 320Ã—320 resolution\r\nHeart rate monitoring\r\nFitness tracking (steps, distance, calories burned)\r\nBluetooth calling\r\nIP68 water resistance\r\nMultiple sports modes\r\nKW900 ULTRA 2\r\n KW900 ULTRA 2\r\nKw900ultra 2\r\nKEQIWEAR\r\nThis product is not a medical device the health data and recommendations provided \r\nBattery after immersion\r\nSmart watch best watch', 'KW900 Ultra 2\r\n49mm HD display with 320Ã—320 resolution\r\nHeart rate monitoring\r\nFitness tracking (steps, distance, calories burned)\r\nBluetooth calling\r\nIP68 water resistance\r\nMultiple sports modes\r\nKW900 ULTRA 2\r\n KW900 ULTRA 2\r\nKw900ultra 2\r\nKEQIWEAR\r\nThis product is not a medical device the health data and recommendations provided \r\nBattery after immersion\r\nSmart watch best watch\r\nSmart Watch\r\nWetch \r\nwatches\r\nWetches\r\nUltra Watch\r\nTouch screen watch\r\nToch watch\r\nBest watch beautiful watch\r\nBest price watch\r\nVery beautiful watch\r\nNew watch New model\r\nSmart ultra watch\r\nUltra wetch\r\nBest watch beautiful and best display watch\r\nTouch\r\nÙ¹Ú† Ú¯Ú¾Ú‘ÛŒ\r\nÙ¹Ú† Ú¯Ú¾Ú‘ÛŒØ§Úº\r\nÚ¯Ú¾Ú‘ÛŒ Ú¯Ú¾Ú‘ÛŒØ§Úº', 1, 1),
(30, 8, 0, 'i9 Pro Max Smart watch', 2500, 1999, 5, '791425024_20240226_142651.png', 'i9 Pro Max smart watch\r\nLaxasfit\r\nSmart watch band Charging cable and user manual', 'i9 Pro Max smart watch\r\nLaxasfit\r\nSmart watch band Charging cable and user manual\r\ni9 Pro Max is the new smartwatch from this series, It is equipped with a 1.75-inch screen, Multi Watch Faces, Health & Fitness Functions such as heart rate monitoring, and sports modes, In addition, to the possibility of making calls via Bluetooth.', 1, 'i9 Pro Max smart watch\r\nRunning sleep heart rate\r\nOff screen pointer\r\nBT Call\r\nSmart watch band Charging cable and user manual', 'i9 Pro Max smart watch\r\nRunning sleep heart rate\r\nOff screen pointer\r\nBT Call\r\nSmart watch band Charging cable and user manual \r\nIncludes \r\nSmart watch band Charging cable and user manual\r\nBattery life Charge Cycles and display', 'Smart Watch\r\nWetch \r\nwatches\r\nWetches\r\nUltra Watch\r\nTouch screen watch\r\nToch watch\r\nBest watch beautiful watch\r\nBest price watch\r\nVery beautiful watch\r\nNew watch New model\r\nSmart ultra watch\r\nUltra wetch\r\nBest watch beautiful and best display watch\r\nTouch\r\nÙ¹Ú† Ú¯Ú¾Ú‘ÛŒ\r\nÙ¹Ú† Ú¯Ú¾Ú‘ÛŒØ§Úº\r\nÚ¯Ú¾Ú‘ÛŒ Ú¯Ú¾Ú‘ÛŒØ§Úº\r\nSmart Watch\r\nWetch \r\nwatches\r\nWetches\r\nUltra Watch\r\nTouch screen watch\r\nToch watch\r\nBest watch beautiful watch\r\nBest price watch\r\nVery beautiful watch\r\nNew watch New model\r\nSmart ultra watch\r\nUltra wetch\r\nBest watch beautiful and best display watch\r\nTouch\r\nÙ¹Ú† Ú¯Ú¾Ú‘ÛŒ\r\nÙ¹Ú† Ú¯Ú¾Ú‘ÛŒØ§Úº\r\nÚ¯Ú¾Ú‘ÛŒ Ú¯Ú¾Ú‘ÛŒØ§Úºi9 Pro Max smart watch\r\nRunning sleep heart rate\r\nOff screen pointer\r\nBT Call\r\nSmart watch band Charging cable and user manual \r\nIncludes \r\nSmart watch band Charging cable and user manual\r\nBattery life Charge Cycles and displayIncludes \r\nSmart watch band Charging cable and user manual\r\nBattery life Charge Cycles and display', 1, 1),
(31, 10, 10, 'Airpods pro (2nd Generation)', 4998, 3999, 5, '152198010_sp880-airpods-Pro-2nd-gen.png', 'Earphone 2nd Generation with magnetic Charging Case', 'Earphone 2nd Generation with Magnetic Charging Case\r\n\r\nEarphone 2e gÃ©nÃ©ratlon avec boÃ®tier de charge Magnetic\r\n\r\nEarphone 2.Generation mit Magnetic Ladecase\r\n\r\nEarphone (2Âª generazione) con custodia di ricarica Magnetic\r\n\r\nEarphone (2Âª.generaciÃ³n) con estuche de carga Magnetic\r\n\r\nMagnetic å……é›»ã‚±ãƒ¼ã‚¹ä»˜ã\r\n\r\nEarphone(ç¬¬2ä¸–ä»£)', 1, 'Airpods pro', 'Earphone 2nd Generation with Magnetic Charging Case\r\n\r\nEarphone 2e gÃ©nÃ©ratlon avec boÃ®tier de charge Magnetic\r\n\r\nEarphone 2.Generation mit Magnetic Ladecase\r\n\r\nEarphone (2Âª generazione) con custodia di ricarica Magnetic\r\n\r\nEarphone (2Âª.generaciÃ³n) con estuche de carga Magnetic\r\n\r\nMagnetic å……é›»ã‚±ãƒ¼ã‚¹ä»˜ã\r\n\r\nEarphone(ç¬¬2ä¸–ä»£)', 'Airpods\r\nAirpods pro\r\nAl Nafe\r\nWireless headphones\r\nBluetooth headphones\r\nBluetooth handsfree\r\nWireless handsfree\r\nJhawarian\r\nNew movies', 1, 1),
(32, 10, 10, 'M10 earbuds', 1499, 1099, 5, '849150404_20240228_121406.png', 'M10 Earbuds original Bluetooth V5.3 TWS Wireless', 'â– Brand: No Brand\r\n\r\nâ– Model Number: M10 Tws Wireless Earbuds\r\n\r\nâ–  The battery capacity of the storage box: is 2000 mAh\r\n\r\nâ– Call time: 5-6 hours\r\n\r\nâ–  Charging time: 1-2 hours\r\n\r\nâ– Playtime: 4-5 hours\r\n\r\nâ–  Transmission distance: 10M\r\n\r\nâ–  Charging voltage: 5V / 1A\r\n\r\nâ–  The battery capacity of the headset: is 50 mAh\r\n\r\nâ–  wireless: Yes\r\n\r\nâ– Volume Control: Yes\r\n\r\nM10 Earbuds Original Earphones Wireless Earphone Touch Bluetooth Earplugs In The Ear Stereo Sport Headsets\r\n\r\nCVC8.0 Noise Reduction Earbuds\r\n\r\nM10 Earbuds original Bluetooth V5.3 TWS Wireless', 1, 'M10 Earbuds', 'â– Brand: No Brand\r\n\r\nâ– Model Number: M10 Tws Wireless Earbuds\r\n\r\nâ–  The battery capacity of the storage box: is 2000 mAh\r\n\r\nâ– Call time: 5-6 hours\r\n\r\nâ–  Charging time: 1-2 hours\r\n\r\nâ– Playtime: 4-5 hours\r\n\r\nâ–  Transmission distance: 10M\r\n\r\nâ–  Charging voltage: 5V / 1A\r\n\r\nâ–  The battery capacity of the headset: is 50 mAh\r\n\r\nâ–  wireless: Yes\r\n\r\nâ– Volume Control: Yes\r\n\r\nDescription\r\n\r\nM10 Earbuds Original Earphones Wireless Earphone Touch Bluetooth Earplugs In The Ear Stereo Sport Headsets\r\n\r\nCVC8.0 Noise Reduction Earbuds\r\n\r\nM10 Earbuds original Bluetooth V5.3 TWS Wireless', 'M10 Earbuds\r\nBluetooth headphones\r\nWireless headphone\r\nBluetooth handfree\r\nAlnafeh\r\nMobile shop\r\nJhawarian\r\nAirpods\r\nHandfree', 1, 1),
(33, 10, 10, 'Air 31 wireless Earbuds', 2499, 1798, 5, '894250945_20240228_133911.png', 'Air 31 Wireless Earbuds Crystal Transparent Bluetooth 5.3 - Air 31 Ear buds Wireless Headset With Type C Charging', 'These EARBUDS AIR 31 HEADSET are the perfect choice for those who want to enjoy their music without any interruptions. With Bluetooth 5.3 technology, these earbuds provide a seamless connection to your Android device. The heavy bass stereo and noise reduction features ensure that you get the best sound quality possible. These earbuds are also water-resistant and sweat-proof, making them perfect for sports enthusiasts. The built-in microphone allows you to take calls on the go, and the crystal transparent case with Type C charging ensures that your earbuds are always charged and ready to go. These wireless earbuds come with a sports headset that is perfect for any activity. With the AIR-31 AIRPODS, you can enjoy your music without any distractions.', 1, 'Air 31 wireless Earbuds', 'Air 31 wireless Earbuds', 'Air 31 wireless Earbuds\r\nEarbuds\r\nBluetooth headphones\r\nBluetooth handfree\r\nHand free\r\nAirpods\r\nEarphone\r\nAl nafeh\r\nAl Nafeh Mobile Shop\r\nJhawarian\r\nNew movies\r\nPunjabi', 1, 1),
(34, 10, 10, 'M90 Earbuds tws', 1999, 1599, 5, '447877223_20240310_143313.png', 'M90  Earbuds TWS Bluetooth 5.3 Headphones Touch Control Earphones LED Display Headset 9D HiFi Quality Imported Wireless Earbud With Power Bank And Mic', 'Search in Daraz\r\n\r\n\r\nPeople love it!\r\n14 people added to wishlist in past week\r\n\r\nIn demand!\r\n32 sold in past week\r\n\r\nOthers are eyeing this!\r\n55 people added to cart\r\n\r\n5 people rated 5 stars in past week\r\n\r\nPeople love it!\r\n14 people added to wishlist in past week\r\n\r\nIn demand!\r\n32 sold in past week\r\n1/9\r\n\r\n11\r\nRs. 1,199\r\nRs. 2,199\r\n-45%\r\nEnds in 9 days 06:36:47\r\nM90 Pro Earbuds TWS Bluetooth 5.3 Headphones Touch Control Earphones LED Display Headset 9D HiFi Quality Imported Wireless Earbud With Power Bank And Mic\r\n\r\nFree Returns.\r\n\r\n\r\n\r\n4.2/5\r\n(104)\r\n398 Sold\r\n84\r\nexpressDelivery\r\nFree Delivery\r\n14 Mar - 20 Mar\r\nOn minimum spend of Rs. 1,000 from same store\r\n\r\n53 product questions and answers.\r\n\r\nBrian Zone Gadgets\r\n86% Positive Review\r\nProduct Promotion\r\nLimited Usage\r\n\r\nGrand Ramadan Sale 150\r\nRs. 150 Off\r\nMin. Spend Rs. 3,000\r\nvalid till Mar 19 2024\r\nT&C\r\nCollect\r\nLimited Usage\r\n\r\nGrand Ramadan Sale 150\r\nRs. 300 Off\r\nMin. Spend Rs. 7,000\r\nvalid till Mar 19 2024\r\nT&C\r\nCollect\r\nLimited Usage\r\n\r\nGrand Ramadan Sale 150\r\nRs. 500 Off\r\nMin. Spend Rs. 10,000\r\nvalid till Mar 19 2024\r\nT&C\r\nCollect\r\nLimited Usage\r\n\r\nGrand Ramadan Sale 2K\r\nRs. 2,000 Off\r\nMin. Spend Rs. 25,000\r\n67% used\r\nvalid till Mar 19 2024\r\nT&C\r\nCollect\r\nBank Promotion\r\n\r\n\r\nBank Vouchers available. Click to collect\r\nVariations\r\nM90 Pro Earbuds TWS Bluetooth 5.3 Headphones\r\n\r\n\r\n\r\n\r\n\r\n+5\r\nSpecifications\r\nBrand,Compatible Devices,SKU\r\nSee All\r\nDelivery\r\nSindh, Karachi - Gulshan-e-Iqbal, Block 15\r\nStandard Delivery , 14 Mar - 20 Mar\r\nFREE\r\nEnjoy free shipping promotion with minimum spend of Rs. 1,000 from Brian Zone Gadgets.\r\nService\r\n\r\n14 days free & easy return\r\nChange of mind is not applicable,\"Does not Fit\" not applicable\r\n\r\nWarranty not available\r\nRatings & Reviews\r\n\r\n4.2\r\n\r\nVery Good\r\n\r\nPhotos(27)\r\nView All(104)\r\nWhat people like about it\r\n\r\nGood Pack\r\n(7)\r\nReasonable Price\r\n(5)\r\nEasy Use\r\n(4)\r\nHappy Experience\r\n(2)\r\nGreat Sound\r\n(2)\r\nGood Value\r\n(2)\r\nSatisfied Work\r\n(1)\r\nGreat Service\r\n(1)\r\nAmazing Bass\r\n(1)\r\nFast Delivery\r\n(1)\r\n\r\nShoaib T.\r\n1 year ago\r\nThis has been my favorite purchase in the recent little while. Been using a little over a month, have used to run and lift weights in. Theyâ€™re snug, donâ€™t fall ...See More\r\n\r\n\r\n\r\n+2\r\n1/6\r\n\r\n2\r\n\r\n\r\nShoaib T.\r\n1 year ago\r\nThis has been my favorite purchase in the recent little while. Been using a little over a month, have used to run and lift weights in. Theyâ€™re snug, donâ€™t fall out of ear, and pretty good quality. Theyâ€™re not super fancy and they donâ€™t have the best audio, but they do sound pretty good & they get the job done. They come with several different size ear pieces to change out to conform to your ear better. Theyâ€™re low profile and not very bulky. The battery life is pretty darn good too! Iâ€™m super satisfied with this purchase and would definitely buy again. I hope they last a good while\r\nColor Family:Grey\r\nColor Family:Grey\r\n\r\nM***.\r\n1 year ago\r\nI lost it one day and looked for it everywhere but did not find it..the next day I went to the laundromat and when I finished washing and then drying my clothe...See More\r\n\r\n\r\n\r\n+2\r\n1/6\r\n\r\n1\r\n\r\n\r\nM***.\r\n1 year ago\r\nI lost it one day and looked for it everywhere but did not find it..the next day I went to the laundromat and when I finished washing and then drying my clothes at a high temperature ..I found the earphones in between the clothes..how sad and heartbroken it was..I swear to God when I decided to press I have the power button on and I am completely certain that it will not work, so I found it working perfectly and with the same efficiency..about 7 months have passed since this situation and I am now using it and it is in very good condition\r\nColor Family:Grey\r\nColor Family:Grey\r\n\r\nShabbir\r\n1 year ago\r\nI am unable to exist in my world without noise, which is usually in the form of podcasts. I keep these earbuds in my purse so I\'m always prepared if I happen to...See More\r\n\r\n\r\n\r\n+2\r\n1/6\r\n\r\n2\r\n\r\n\r\nShabbir\r\n1 year ago\r\nI am unable to exist in my world without noise, which is usually in the form of podcasts. I keep these earbuds in my purse so I\'m always prepared if I happen to get a minute alone to shop. Because I want to be aware of my surroundings, I only keep one in at a time, which works perfectly. I\'ve only had to charge them once in the month that I\'ve had them. They stay in well, though I wouldn\'t recommend them while running (they don\'t fall out, but they also don\'t feel super secure). I highly recommend these little buds!\r\nColor Family:Grey\r\nColor Family:Grey\r\nView All(104)\r\nQuestions About This Product (53)\r\nView All\r\n\r\nKia inn main game mode hai\r\n\r\n3***0 - 1 week ago\r\n\r\n\r\nyes \r\n\r\nBrian Zone Gadgets - answered within 5 days\r\n\r\n\r\nKia inn main mode switch ho jatay hain???\r\n\r\n3***0 - 1 week ago\r\n\r\n\r\nyes \r\n\r\nBrian Zone Gadgets - answered within 5 days\r\n\r\nASK QUESTIONS\r\nBrian Zone Gadgets\r\nBrian Zone Gadgets\r\n3,327\r\n86%\r\nPositive Seller Ratings\r\n97%\r\n\r\nShip on Time\r\n\r\n72%\r\n\r\nChat Response Rate\r\n\r\nFollow\r\nVisit Store\r\nFrom The Same Store\r\n\r\n\r\nbadgei7S TWS Wireless Bluetooth 5.0 Earbuds Airpod_ Stereo Headsets Earbud With Charging Case\r\n\r\n4.3/5(159)\r\n868 Sold\r\nFree Delivery\r\n9 Vouchers\r\nRs.875Rs. 899\r\n\r\nbadgei7S TWS Wireless Bluetooth 5.0 Earbuds earphone_ Stereo Headsets Earphone Earbuds With Charging Case\r\n\r\n4.2/5(42)\r\n280 Sold\r\nFree Delivery\r\n9 Vouchers\r\nRs.679Rs. 899\r\n\r\nNew _Airpods_Pro 4 Mini with Advance Touch Sensor Control Wireless Bluetooth Earbuds 4th Gen Sports Bluetooth Headphones. TWS Airpods_Pro Mini Wireless Earbuds with Mic Sport Gaming Bluetooth Headphones Active Noise Canceling Headset i7,i12 Airpods_\r\nFree Delivery\r\n9 Vouchers\r\nRs.1,699\r\n\r\nBrain Zone Gadgets Generation earphone__ Pro Buds with Charging Case Bluetooth Earphone Wireless Headphones HiFi Music Earbuds__ Sports Gaming Headset For IOS__ Android Phone\r\nFree Delivery\r\n9 Vouchers\r\nRs.3,999\r\n\r\nbadgeVivo Original Handsfree Handsfree Headphones Handsfree Handfree / Earphones 3.5mm With Mic For PUBG Real Gamming, Deep Bass Sound, Online Steaming Watching Movies, Online Classes, cute handfree for girls Android Mobile\r\n\r\n4.2/5(4480)\r\n27k Sold\r\nFree Delivery\r\n9 Vouchers\r\nRs.165Rs. 170\r\n\r\nbadgeSamsung Infinix MI Vivo_ Oppo Original Handsfree Handsfree Headphones Handsfree Handfree / Earphones 3.5mm With Mic For PUBG Real Gamming, Online Steaming Watching Movies, Online Classes, cute handfree for girls Android Mobile\r\n\r\n4.1/5(108)\r\n560 Sold\r\nFree Delivery\r\n9 Vouchers\r\nRs.224Rs. 399\r\n\r\nbadgeXtrike Me Stereo Gaming Headset for Smartphone, PC, PS4, Xbox One, Cable 1.8m\r\n\r\n5/5(86)\r\n273 Sold\r\nFree Delivery\r\n9 Vouchers\r\nRs.1,699Rs. 2,799\r\nHighlights\r\nReal-Time Gaming Response: M90 Pro bluetooth earbuds can work in both gaming and audio mode. In gaming mode, our earbuds adopt advanced compression technology. With lower latency, you can identify the location accurately and win the game easily. Responsively Touch Control: Features with touch control sensors, our wireless earbuds can largely minimize the pressure to your ears when you touch the buttons for various functions. And true wireless earbuds with sensitive touch allow you to manage music (play, pause, next or previous), volume (increase or decrease) and calls (answer, reject or ending) easily, and can get rid of the shackles of wire when you are driving, running or cycling etc. Long Battery Life, Charging Anytime and Anywhere: Our bluetooth earbuds have a long battery life up to 20 hours, and they come with a high-quality charging case, which can charge both earbuds up to five times without connecting the charging cable. Charging 1.5 hours one time, the gaming earbuds can last 4 hours. Ergonomic Comfort Sports Design: The true wireless earbuds with soft earplugs are specially designed, which can perfectly fit your ears without falling out, and offer you a comfortable wearing experience. 1 Year Manufacturer Warranty (Only for manufacture defect)', 1, 'M90 Earbuds', 'M90  Earbuds TWS Bluetooth 5.3 Headphones Touch Control Earphones LED Display Headset 9D HiFi Quality Imported Wireless Earbud With Power Bank And Mic', 'M90 Earbuds\r\nM90 pro Earbuds\r\nM90\r\nAirbuds\r\nM90 Airpods\r\nM90 handfree\r\nBluetooth\r\nBluetooth handfree\r\nNew model\r\nAl Nafe\r\nJhawarian', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_images` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `product_images`) VALUES
(1, 8, '479197953_526258680_Floral-Print-Polo-T-shirt1.jpg'),
(2, 8, '301120849_309027777_Floral-Print-Polo-T-shirt.jpg'),
(3, 19, '522854647_new.png'),
(4, 20, '224776708_IMG-20240220-WA0073.jpg'),
(5, 20, '575865094_20240220_160734.png'),
(6, 20, '491291908_20240220_160734.png'),
(7, 21, '137492601_20240220_160924.png'),
(8, 21, '729002173_20240220_160734.png'),
(9, 21, '623666166_20240220_160218.png'),
(10, 22, '881867131_20240220_103250.png'),
(11, 22, '319136377_20240220_103315.png'),
(12, 22, '485506898_20240220_103333.png'),
(13, 23, '793883847_20240225_120354.png'),
(14, 23, '884026132_20240225_121153.png'),
(15, 23, '693822555_20240225_120509.png'),
(16, 24, '591888167_20240225_144032.png'),
(17, 24, '389292153_20240225_143743.png'),
(18, 24, '302538255_20240225_143528.png'),
(19, 25, '402962616_20240225_170119.png'),
(20, 25, '857999948_20240225_170018.png'),
(21, 25, '482965588_20240225_165846.png'),
(22, 26, '457637346_20240225_175045.png'),
(23, 26, '284721089_20240225_174938.png'),
(24, 27, '907102052_20240226_101406.png'),
(25, 27, '150210589_20240226_101406.png'),
(26, 28, '647999356_20240226_112426.png'),
(27, 28, '936077859_20240226_112226.png'),
(28, 28, '111426994_20240226_112426.png'),
(29, 29, '626092096_20240226_135741.png'),
(30, 29, '449999648_20240226_135826.png'),
(31, 29, '612090929_20240226_135918.png'),
(32, 30, '249214700_20240226_142553.png'),
(33, 30, '381774359_20240226_142421.png'),
(34, 30, '504428163_IMG-20240226-WA0024.jpg'),
(35, 31, '924567698_images (9).jpeg'),
(36, 31, '768340235_IMG_20240228_115059.jpg'),
(37, 32, '284842069_20240228_121543.png'),
(38, 32, '634319301_20240228_121617.png'),
(39, 33, '774344682_20240228_133956.png'),
(40, 33, '617641406_20240228_134040.png'),
(41, 34, '289782622_20240310_143220.png'),
(42, 34, '242022147_20240310_143654.png');

-- --------------------------------------------------------

--
-- Table structure for table `shiprocket_token`
--

CREATE TABLE `shiprocket_token` (
  `id` int(11) NOT NULL,
  `token` varchar(500) NOT NULL,
  `added_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shiprocket_token`
--

INSERT INTO `shiprocket_token` (`id`, `token`, `added_on`) VALUES
(1, '', '2019-04-09 00:28:23');

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` int(11) NOT NULL,
  `categories_id` int(11) NOT NULL,
  `sub_categories` varchar(100) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `categories_id`, `sub_categories`, `status`) VALUES
(1, 2, 'T-Shirt', 1),
(2, 2, 'Trouser', 1),
(3, 4, 'Shirt', 1),
(4, 5, 'infinix', 1),
(5, 5, 'Nokia', 1),
(6, 6, 'SONY', 1),
(7, 6, 'SAMSUNG', 1),
(8, 7, 'CHARGERS', 1),
(9, 8, 'SAMSUNG', 1),
(10, 10, 'Airpods', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `email`, `mobile`, `added_on`) VALUES
(4, 'Bilal', '0123405678', 'hafizbilal7886@gmail.com', '03181704483', '2023-12-09 12:22:33'),
(6, 'Muhammad Bilal', '0123405678', 'hafizbilal7883@gmail.com', '03196331359', '2024-02-20 01:26:44'),
(7, 'Muhammad usama', 'usama@557', 'usamafarooq557@gmail.com', '03062063004', '2024-02-20 04:04:00'),
(8, 'Hafiz Rafique', '7005492Hr', 'hafizrafique0@gmail.com', '03013071353', '2024-02-20 06:12:03'),
(9, 'Shahid Iqbal', 'LOdrmssi007', 'shahidjhawari@gmail.com', '03447014153', '2024-02-21 12:35:37'),
(0, 'Khawaja Farhan', 'fanikh123', 'khawajafarhan112233@gmail.com', '03064946066', '2024-02-28 05:34:38'),
(0, 'Daniyal', 'ayyaz786@', 'akbdaniyal@gmail.com', '03251980065', '2024-03-10 08:45:52'),
(0, 'Shahid', 'lodrmssi007', 'musicsuper97@gmail.com', '03090072447', '2024-03-18 01:09:14');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id`, `user_id`, `product_id`, `added_on`) VALUES
(1, 1, 12, '2021-04-08 01:53:31'),
(2, 6, 26, '2024-02-25 10:41:56'),
(3, 6, 24, '2024-02-25 11:48:08'),
(4, 0, 22, '2024-03-18 01:09:35');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupon_master`
--
ALTER TABLE `coupon_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_status`
--
ALTER TABLE `order_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shiprocket_token`
--
ALTER TABLE `shiprocket_token`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `coupon_master`
--
ALTER TABLE `coupon_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `order_status`
--
ALTER TABLE `order_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `shiprocket_token`
--
ALTER TABLE `shiprocket_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
