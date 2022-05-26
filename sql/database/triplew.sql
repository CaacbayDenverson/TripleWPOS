-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 26, 2022 at 09:56 AM
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
  `name` varchar(128) NOT NULL,
  `address` varchar(200) NOT NULL,
  `contact_number` varchar(11) NOT NULL,
  `password` varchar(60) NOT NULL,
  `recovery_code` varchar(6) NOT NULL,
  `secret_1` varchar(64) NOT NULL,
  `secret_2` varchar(64) NOT NULL,
  `secret_3` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`acc_id`, `username`, `name`, `address`, `contact_number`, `password`, `recovery_code`, `secret_1`, `secret_2`, `secret_3`) VALUES
(1, 'admin', 'Amir El Amari', '10 Matiyaga Street, Barangay Kabo, Maryville Village, Batangas City 4200', '09999999999', '$2y$10$eoan1AWXgI2LR3U2.13zqeiZq0Bzn2uU9HmSJpD.jE.5xbTKQXVG2', 'mn7thS', 'Rose', '2001', 'Dog');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `order_id` int(11) NOT NULL,
  `order_no` int(11) NOT NULL,
  `product` varchar(255) NOT NULL,
  `total` float NOT NULL,
  `cash` float NOT NULL,
  `cash_change` float NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`order_id`, `order_no`, `product`, `total`, `cash`, `cash_change`, `created_at`) VALUES
(15, 0, 'Test P120 2 pc(s), Product Name P100 1 pc(s)', 340, 350, 10, '2022-05-22 05:46:37'),
(16, 0, 'Product Name P100 1 pc(s), Test P120 2 pc(s)', 340, 350, 10, '2022-05-22 05:46:49'),
(17, 0, 'Product Name P100 1 pc(s), Special Side Mirror P125 1 pc(s), Magic Mirror P250 1 pc(s)', 475, 500, 25, '2022-05-22 06:18:16'),
(18, 0, 'Special Side Mirror P125 2 pc(s), Magic Mirror P250 2 pc(s)', 750, 1000, 250, '2022-05-22 06:20:13'),
(19, 0, 'Special Side Mirror P125 5 pc(s)', 625, 700, 75, '2022-05-24 14:29:02'),
(20, 0, 'Special Side Mirror P125 1 pc(s), Duck Honk P150 1 pc(s)', 275, 300, 25, '2022-05-25 06:07:27');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(64) NOT NULL,
  `code` varchar(30) NOT NULL,
  `product_price` float NOT NULL,
  `product_qty` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `code`, `product_price`, `product_qty`) VALUES
(33, 'Special Side Mirror', 'SM021', 125, 9),
(35, 'Magic Mirror', 'SM0021', 250, 5),
(37, 'Duck Honk', 'HRN005', 150, 9);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`acc_id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`order_id`);

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
  MODIFY `acc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
