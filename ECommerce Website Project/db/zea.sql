-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 20, 2022 at 04:54 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zea`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(10) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `usertype` varchar(255) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `usertype`) VALUES
(1, 'zea', 'admin', 'admin'),
(2, 'customer', 'customer', 'user'),
(3, 'test', 'test', 'admin'),
(4, '123', '123', 'user'),
(5, 'sean', 'sean', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `categoryid` int(11) NOT NULL,
  `catname` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`categoryid`, `catname`) VALUES
(4, 'BREAKFAST'),
(5, 'LUNCH'),
(6, 'DINNER'),
(7, 'BEVERAGES');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `productid` int(11) NOT NULL,
  `categoryid` int(1) NOT NULL,
  `productname` varchar(30) NOT NULL,
  `price` double NOT NULL,
  `photo` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`productid`, `categoryid`, `productname`, `price`, `photo`) VALUES
(14, 4, 'Pandesal and hot coffee', 50, 'upload/pandesal_1650528645.jpg'),
(16, 5, 'Spicy Ginataang Hipon', 300, 'upload/hipon_1650528658.jpg'),
(17, 5, 'Pork Bicol Express', 100, 'upload/bicol_1650528650.jpg'),
(18, 7, 'Buko Juice', 50, 'upload/buko_1650528669.jpg'),
(19, 7, 'Pineapple Juice', 50, 'upload/piapple_1650528675.jpg'),
(20, 6, 'Chicken Adobo', 250, 'upload/adobo_1650528665.jpg'),
(22, 4, 'Bangusilog', 150, 'upload/bangus_1650464473_1652872737.jpg'),
(24, 4, 'ADD THIS FIRST', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `purchaseid` int(11) NOT NULL,
  `customer` varchar(50) NOT NULL,
  `total` double NOT NULL,
  `date_purchase` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchase`
--

INSERT INTO `purchase` (`purchaseid`, `customer`, `total`, `date_purchase`) VALUES
(9, 'aw', 150, '2022-04-21 16:26:12'),
(10, 'awdasdw', 100, '2022-04-21 16:31:25'),
(11, 'dawd', 100, '2022-04-21 16:34:44'),
(12, 'dawdasd', 100, '2022-04-21 17:26:09'),
(13, 'awdasdw', 150, '2022-04-21 17:26:46'),
(14, 'dawdfawed', 6300, '2022-04-21 17:27:47'),
(15, 'awdasdw', 0, '2022-05-01 20:01:12'),
(16, 'awdasdw', 0, '2022-05-01 20:02:53'),
(17, 'awdasdaw dasda wd', 0, '2022-05-01 20:03:10'),
(18, 'awdasdw', 0, '2022-05-01 20:15:42'),
(19, 'awdasdw', 0, '2022-05-01 20:16:05'),
(20, 'awdasdw', 0, '2022-05-01 20:16:12'),
(21, 'dawdasdwadaw dasdawd', 0, '2022-05-01 20:24:09'),
(22, 'aawdasdawd awdasdaw dawd', 0, '2022-05-02 10:24:03'),
(23, 'taesedawdasdaw', 0, '2022-05-02 10:30:17'),
(24, 'tasdaw dasd awd awd a', 0, '2022-05-02 10:32:51'),
(25, 'aw asw as', 0, '2022-05-02 10:36:56'),
(26, 'dawasda wdasdaw dawd', 150, '2022-05-02 10:42:42'),
(27, 'dawasdaw awdasd awd', 50, '2022-05-02 10:43:38'),
(28, 'dawda sdawd', 50, '2022-05-02 10:43:53'),
(29, 'dawed awd', 50, '2022-05-02 10:45:19'),
(30, 'daw asda wd', 1950, '2022-05-02 10:46:15'),
(31, 'dawdasd awdaw dasda wdasdaw ', 750, '2022-05-02 10:53:05'),
(32, 'awd asdawdaw', 1280750, '2022-05-02 10:53:18'),
(33, 'aw aw aw aw', 250, '2022-05-02 10:53:58'),
(34, 'awa wdawd aw', 50, '2022-05-02 10:56:16'),
(35, 'awda sda wda wd', 50, '2022-05-02 10:56:26'),
(36, 'daw', 50, '2022-05-02 10:56:47'),
(37, 'awd asdawd awsdaw', 50, '2022-05-02 10:57:10'),
(38, 'd awdasda wd', 12312312300, '2022-05-02 10:57:17'),
(39, 'awd asdaw d', 150, '2022-05-02 11:00:34'),
(40, 'awda sdawdawd', 0, '2022-05-02 11:01:46'),
(41, 'awdasdaw', 50, '2022-05-02 11:01:59'),
(42, '  dawd a ', 600, '2022-05-02 11:03:23'),
(43, 'dwdawdaw', 100, '2022-05-02 11:03:37'),
(44, 'ddwda', 1800, '2022-05-02 11:03:52'),
(45, 'dawdawd', 350, '2022-05-02 11:04:15'),
(46, 'ddwdw', 2250, '2022-05-02 11:04:34'),
(47, 'dawdfawed', 300, '2022-05-02 11:09:43'),
(48, 'dasaw', 1200, '2022-05-02 11:18:29'),
(49, 'dasaw', 200, '2022-05-02 11:18:39'),
(50, 'dasawad ', 0, '2022-05-02 11:18:52'),
(51, 'awdasd', 0, '2022-05-02 11:20:50'),
(52, 'aw dawd', 750, '2022-05-02 11:22:11'),
(53, 'da wdawd', 50, '2022-05-02 11:22:56'),
(54, '12312', 800, '2022-05-02 11:27:25'),
(55, '12 1212', 50, '2022-05-02 11:27:58'),
(56, '12312 312', 50, '2022-05-02 11:28:30'),
(57, 'awd awd', 50, '2022-05-02 11:28:45'),
(58, ' awdaw awd', 0, '2022-05-02 11:29:27'),
(59, ' awdaw awd', 0, '2022-05-02 11:29:47'),
(60, '123123 12', 300, '2022-05-02 11:31:12'),
(61, 'awd awd', 1500, '2022-05-02 11:31:30'),
(62, '123 123123 123', 300, '2022-05-02 11:31:50'),
(63, 'awd awd', 0, '2022-05-02 11:32:29'),
(64, 'awd awd', 1500, '2022-05-02 11:33:24'),
(65, 'awdaw', 150, '2022-05-02 11:34:00'),
(66, 'awd awdaw', 0, '2022-05-02 11:34:21'),
(67, 'awdaw', 0, '2022-05-02 11:34:34'),
(68, 'awdawd aw', 300, '2022-05-02 11:34:47'),
(69, 'awd asdaw ', 300, '2022-05-02 11:36:01'),
(70, 'asdaw daw', 1500, '2022-05-02 11:36:20'),
(71, 'awd asdaw ', 7650, '2022-05-02 11:37:12'),
(72, 'awda sdaw', 2200, '2022-05-02 11:37:25'),
(73, 'awdtest', 1300, '2022-05-02 11:38:35'),
(74, 'awd asdaw', 150, '2022-05-02 11:41:16'),
(75, 'teste', 150, '2022-05-02 11:41:28'),
(76, 'testest', 1400, '2022-05-02 11:41:50'),
(77, 'testestest', 1900, '2022-05-02 11:42:36'),
(78, 'Sean', 300, '2022-05-02 16:50:49'),
(79, 'sean1', 350, '2022-05-02 16:52:07'),
(80, 'wewe', 100, '2022-05-18 18:59:35'),
(81, 'awdasdw', 50, '2022-05-18 19:00:18'),
(82, 'asdawd', 0, '2022-05-18 19:01:40'),
(83, 'awdasdw', 0, '2022-05-18 19:03:15'),
(84, 'dawdasdw', 0, '2022-05-18 19:03:39'),
(85, 'awdasdw', 0, '2022-05-18 19:04:02'),
(86, 'asdawdaw', 0, '2022-05-18 19:05:50'),
(87, 'awdasdaw', 150, '2022-05-18 19:07:08'),
(88, 'awdawdw', 0, '2022-05-18 19:07:18'),
(89, 'asdasdwasdw', 0, '2022-05-18 19:08:27'),
(90, 'awdasdw', 50, '2022-05-18 19:09:06'),
(91, 'awdasd', 0, '2022-05-18 19:10:29'),
(92, 'asdawd', 0, '2022-05-18 19:11:42'),
(93, 'asdawd', 0, '2022-05-18 19:11:52'),
(94, 'asdw', 0, '2022-05-18 19:14:09'),
(95, 'asdawd', 0, '2022-05-18 19:22:23'),
(96, 'adwawd', 150, '2022-05-18 19:25:56'),
(97, 'asdawdas', 50, '2022-05-18 19:29:35'),
(98, 'asdawdasdw', 0, '2022-05-18 19:42:51'),
(99, 'asdawd', 150, '2022-05-18 19:43:14'),
(100, 'asdawdasdw', 150, '2022-05-18 19:44:51');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_detail`
--

CREATE TABLE `purchase_detail` (
  `pdid` int(11) NOT NULL,
  `purchaseid` int(11) NOT NULL,
  `productid` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchase_detail`
--

INSERT INTO `purchase_detail` (`pdid`, `purchaseid`, `productid`, `quantity`) VALUES
(13, 8, 15, 2),
(14, 8, 17, 2),
(15, 8, 18, 2),
(16, 9, 15, 1),
(17, 10, 14, 2),
(18, 11, 14, 2),
(19, 12, 14, 2),
(20, 13, 15, 1),
(21, 14, 16, 21),
(22, 21, 0, 3),
(23, 22, 0, 1),
(24, 22, 0, 1),
(25, 22, 0, 1),
(26, 23, 0, 1),
(27, 23, 0, 1),
(28, 23, 0, 1),
(29, 24, 0, 1),
(30, 24, 0, 1),
(31, 24, 0, 1),
(32, 25, 0, 1),
(33, 25, 0, 1),
(34, 25, 0, 1),
(35, 25, 0, 1),
(36, 25, 0, 1),
(37, 25, 0, 1),
(38, 26, 14, 1),
(39, 26, 19, 1),
(40, 26, 18, 1),
(41, 27, 19, 1),
(42, 28, 19, 1),
(43, 29, 19, 1),
(44, 30, 14, 13),
(45, 30, 19, 13),
(46, 30, 18, 13),
(47, 31, 18, 3),
(48, 31, 19, 3),
(49, 31, 17, 3),
(50, 31, 14, 3),
(51, 32, 18, 5123),
(52, 32, 19, 5123),
(53, 32, 17, 5123),
(54, 32, 14, 5123),
(55, 33, 18, 1),
(56, 33, 19, 1),
(57, 33, 17, 1),
(58, 33, 14, 1),
(59, 34, 19, 1),
(60, 35, 19, 1),
(61, 36, 19, 1),
(62, 37, 19, 1),
(63, 38, 19, 123123123),
(64, 38, 14, 123123123),
(65, 39, 14, 1),
(66, 39, 18, 1),
(67, 39, 19, 1),
(68, 41, 14, 1),
(69, 42, 16, 2),
(70, 43, 14, 1),
(71, 43, 19, 1),
(72, 44, 14, 4),
(73, 44, 19, 4),
(74, 44, 18, 4),
(75, 44, 16, 4),
(76, 45, 19, 1),
(77, 45, 16, 1),
(78, 46, 14, 5),
(79, 46, 19, 5),
(80, 46, 18, 5),
(81, 46, 16, 5),
(82, 47, 15, 2),
(83, 48, 16, 4),
(84, 49, 18, 4),
(85, 50, 18, 0),
(86, 51, 14, 0),
(87, 52, 15, 5),
(88, 53, 19, 1),
(89, 54, 16, 1),
(90, 54, 15, 1),
(91, 54, 14, 1),
(92, 54, 18, 1),
(93, 54, 20, 1),
(94, 55, 18, 1),
(95, 56, 18, 1),
(96, 57, 18, 1),
(97, 60, 16, 1),
(98, 61, 16, 5),
(99, 62, 16, 1),
(100, 64, 16, 5),
(101, 65, 15, 1),
(102, 68, 16, 1),
(103, 69, 16, 1),
(104, 70, 16, 5),
(105, 71, 15, 51),
(106, 72, 16, 1),
(107, 72, 15, 2),
(108, 72, 14, 3),
(109, 72, 18, 4),
(110, 72, 20, 5),
(111, 73, 14, 1),
(112, 73, 18, 2),
(113, 73, 19, 3),
(114, 73, 20, 4),
(115, 74, 14, 1),
(116, 74, 18, 1),
(117, 74, 19, 1),
(118, 74, 0, 3),
(119, 75, 14, 1),
(120, 75, 18, 1),
(121, 75, 19, 1),
(122, 75, 0, 3),
(123, 76, 14, 1),
(124, 76, 18, 1),
(125, 76, 19, 1),
(126, 76, 20, 5),
(127, 77, 14, 1),
(128, 77, 18, 1),
(129, 77, 19, 1),
(130, 77, 20, 1),
(131, 77, 16, 5),
(132, 78, 0, 2),
(133, 78, 17, 3),
(134, 79, 20, 1),
(135, 79, 19, 1),
(136, 79, 18, 1),
(137, 79, 0, 1),
(138, 80, 0, 1),
(139, 80, 14, 1),
(140, 80, 19, 1),
(141, 81, 0, 1),
(142, 81, 14, 1),
(143, 82, 0, 1),
(144, 83, 0, 1),
(145, 84, 0, 2),
(146, 85, 0, 1),
(147, 86, 0, 1),
(148, 87, 22, 1),
(149, 88, 0, 1),
(150, 89, 0, 1),
(151, 90, 14, 1),
(152, 91, 0, 1),
(153, 94, 0, 1),
(154, 95, 0, 1),
(155, 96, 22, 1),
(156, 97, 0, 1),
(157, 97, 14, 1),
(158, 98, 0, 1),
(159, 99, 0, 1),
(160, 99, 22, 1),
(161, 100, 0, 1),
(162, 100, 22, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`categoryid`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`productid`);

--
-- Indexes for table `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`purchaseid`);

--
-- Indexes for table `purchase_detail`
--
ALTER TABLE `purchase_detail`
  ADD PRIMARY KEY (`pdid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `categoryid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `productid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `purchaseid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `purchase_detail`
--
ALTER TABLE `purchase_detail`
  MODIFY `pdid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=163;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
