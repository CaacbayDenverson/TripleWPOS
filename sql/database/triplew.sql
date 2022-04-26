-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 26, 2022 at 08:22 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `triplew`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `acc_id` int(11) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`acc_id`, `username`, `password`) VALUES
(6, 'lame', '$2y$10$Ofw0emjfuv3JyNWwlod9B.vwVnCatpEesdWBjIY54P4TqIDgUsZDK'),
(7, 'admin', '$2y$10$Pa8n6h063SVu52WMRHFt7u69VgXvn.I6CyWeMfusVdij8ymvwQPIW');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(64) NOT NULL,
  `code` varchar(30) NOT NULL,
  `product_price` int(10) NOT NULL,
  `product_qty` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `code`, `product_price`, `product_qty`) VALUES
(1, 'lollipop mirrors', 'aaa', 555, 555),
(2, 'product test', 'aab', 0, 20),
(7, 'Headlights', 'aac', 250, 100),
(8, 'Magic Rod', 'aad', 250, 20),
(13, 'peepee', 'ttt', 555, 555),
(14, 'test1', 'ttt', 55, 1),
(15, 'test2', 'ttt', 55, 1),
(16, 'test3', 'ttt', 55, 1),
(17, 'test4', 'ttt', 555, 555),
(18, 'Jhin', 'FFFF', 4444, 4444),
(19, 'Zed', 'zzz', 123, 123),
(20, 'aaaaaa', 'aaaaaaa', 111, 111),
(21, '1321', 'ttt', 55, 111),
(22, 'peepee', 'ttt', 55, 1),
(23, 'peepee', 'ttt', 55, 1),
(24, 'peepee', 'ttt', 55, 1),
(25, 'nya', 'nnn', 111, 111),
(26, 'shame', 'abc', 111, 111),
(27, 'siomai rice', 'ssr', 20, 1000),
(28, 'test5', 'ttt', 55, 111),
(29, 'test6', 'ttt', 555, 555),
(30, 'test7', 'ttt', 5555, 555),
(31, 'test8', '555', 555, 555),
(32, 'Kraken Slayer accessory', 'sss', 200, 50);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`acc_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `acc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
