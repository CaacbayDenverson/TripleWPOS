-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 26, 2022 at 03:15 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

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
  `email_address` varchar(50) NOT NULL,
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

INSERT INTO `account` (`acc_id`, `username`, `name`, `address`, `email_address`, `contact_number`, `password`, `recovery_code`, `secret_1`, `secret_2`, `secret_3`) VALUES
(4, 'admin', 'Rumyooo', 'Runeterra, Summoner\'s Rift', 'romeojohnorig5@gmail.com', '0661087731', '$2y$10$llqQVBWWAI0WZTX8/p5NEeTHcvCYLFgDgxYGeeiaHMnR3QsM4YGDW', '3Dd8yM', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `backup_invoice`
--

CREATE TABLE `backup_invoice` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `order_no` int(11) NOT NULL,
  `product` varchar(255) NOT NULL,
  `total` float NOT NULL,
  `cash` float NOT NULL,
  `cash_change` float NOT NULL,
  `backup_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` varchar(60) NOT NULL,
  `backup_code` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `backup_invoice`
--

INSERT INTO `backup_invoice` (`id`, `order_id`, `order_no`, `product`, `total`, `cash`, `cash_change`, `backup_at`, `created_at`, `backup_code`) VALUES
(15, 0, 0, 'Test P120 2 pc(s), Product Name P100 1 pc(s)', 340, 350, 10, '2022-07-26 12:51:59', '2022-05-22 13:46:37', 'ZkMhi'),
(16, 0, 0, 'Product Name P100 1 pc(s), Test P120 2 pc(s)', 340, 350, 10, '2022-07-26 12:51:59', '2022-05-22 13:46:49', 'ZkMhi'),
(17, 0, 0, 'Product Name P100 1 pc(s), Special Side Mirror P125 1 pc(s), Magic Mirror P250 1 pc(s)', 475, 500, 25, '2022-07-26 12:51:59', '2022-05-22 14:18:16', 'ZkMhi'),
(18, 0, 0, 'Special Side Mirror P125 2 pc(s), Magic Mirror P250 2 pc(s)', 750, 1000, 250, '2022-07-26 12:51:59', '2022-05-22 14:20:13', 'ZkMhi'),
(19, 0, 0, 'Special Side Mirror P125 5 pc(s)', 625, 700, 75, '2022-07-26 12:51:59', '2022-05-24 22:29:02', 'ZkMhi'),
(20, 0, 0, 'Special Side Mirror P125 1 pc(s), Duck Honk P150 1 pc(s)', 275, 300, 25, '2022-07-26 12:51:59', '2022-05-25 14:07:27', 'ZkMhi'),
(21, 0, 0, 'Popper P200 42 pc(s)', 8400, 10000, 1600, '2022-07-26 12:51:59', '2022-07-25 21:53:09', 'ZkMhi'),
(15, 0, 0, 'Test P120 2 pc(s), Product Name P100 1 pc(s)', 340, 350, 10, '2022-07-26 12:53:38', '2022-05-22 13:46:37', 'bwCRE'),
(16, 0, 0, 'Product Name P100 1 pc(s), Test P120 2 pc(s)', 340, 350, 10, '2022-07-26 12:53:38', '2022-05-22 13:46:49', 'bwCRE'),
(17, 0, 0, 'Product Name P100 1 pc(s), Special Side Mirror P125 1 pc(s), Magic Mirror P250 1 pc(s)', 475, 500, 25, '2022-07-26 12:53:38', '2022-05-22 14:18:16', 'bwCRE'),
(18, 0, 0, 'Special Side Mirror P125 2 pc(s), Magic Mirror P250 2 pc(s)', 750, 1000, 250, '2022-07-26 12:53:38', '2022-05-22 14:20:13', 'bwCRE'),
(19, 0, 0, 'Special Side Mirror P125 5 pc(s)', 625, 700, 75, '2022-07-26 12:53:38', '2022-05-24 22:29:02', 'bwCRE'),
(20, 0, 0, 'Special Side Mirror P125 1 pc(s), Duck Honk P150 1 pc(s)', 275, 300, 25, '2022-07-26 12:53:38', '2022-05-25 14:07:27', 'bwCRE'),
(21, 0, 0, 'Popper P200 42 pc(s)', 8400, 10000, 1600, '2022-07-26 12:53:38', '2022-07-25 21:53:09', 'bwCRE'),
(15, 0, 0, 'Test P120 2 pc(s), Product Name P100 1 pc(s)', 340, 350, 10, '2022-07-26 12:54:26', '2022-05-22 13:46:37', 'Tqc2t'),
(16, 0, 0, 'Product Name P100 1 pc(s), Test P120 2 pc(s)', 340, 350, 10, '2022-07-26 12:54:26', '2022-05-22 13:46:49', 'Tqc2t'),
(17, 0, 0, 'Product Name P100 1 pc(s), Special Side Mirror P125 1 pc(s), Magic Mirror P250 1 pc(s)', 475, 500, 25, '2022-07-26 12:54:26', '2022-05-22 14:18:16', 'Tqc2t'),
(18, 0, 0, 'Special Side Mirror P125 2 pc(s), Magic Mirror P250 2 pc(s)', 750, 1000, 250, '2022-07-26 12:54:26', '2022-05-22 14:20:13', 'Tqc2t'),
(19, 0, 0, 'Special Side Mirror P125 5 pc(s)', 625, 700, 75, '2022-07-26 12:54:26', '2022-05-24 22:29:02', 'Tqc2t'),
(20, 0, 0, 'Special Side Mirror P125 1 pc(s), Duck Honk P150 1 pc(s)', 275, 300, 25, '2022-07-26 12:54:26', '2022-05-25 14:07:27', 'Tqc2t'),
(21, 0, 0, 'Popper P200 42 pc(s)', 8400, 10000, 1600, '2022-07-26 12:54:26', '2022-07-25 21:53:09', 'Tqc2t'),
(15, 0, 0, 'Test P120 2 pc(s), Product Name P100 1 pc(s)', 340, 350, 10, '2022-07-26 12:54:36', '2022-05-22 13:46:37', 'uNo49'),
(16, 0, 0, 'Product Name P100 1 pc(s), Test P120 2 pc(s)', 340, 350, 10, '2022-07-26 12:54:36', '2022-05-22 13:46:49', 'uNo49'),
(17, 0, 0, 'Product Name P100 1 pc(s), Special Side Mirror P125 1 pc(s), Magic Mirror P250 1 pc(s)', 475, 500, 25, '2022-07-26 12:54:36', '2022-05-22 14:18:16', 'uNo49'),
(18, 0, 0, 'Special Side Mirror P125 2 pc(s), Magic Mirror P250 2 pc(s)', 750, 1000, 250, '2022-07-26 12:54:36', '2022-05-22 14:20:13', 'uNo49'),
(19, 0, 0, 'Special Side Mirror P125 5 pc(s)', 625, 700, 75, '2022-07-26 12:54:36', '2022-05-24 22:29:02', 'uNo49'),
(20, 0, 0, 'Special Side Mirror P125 1 pc(s), Duck Honk P150 1 pc(s)', 275, 300, 25, '2022-07-26 12:54:36', '2022-05-25 14:07:27', 'uNo49'),
(21, 0, 0, 'Popper P200 42 pc(s)', 8400, 10000, 1600, '2022-07-26 12:54:36', '2022-07-25 21:53:09', 'uNo49');

-- --------------------------------------------------------

--
-- Table structure for table `backup_product`
--

CREATE TABLE `backup_product` (
  `id` int(11) NOT NULL,
  `product_name` varchar(64) NOT NULL,
  `code` varchar(30) NOT NULL,
  `product_price` float NOT NULL,
  `product_qty` int(6) NOT NULL,
  `created_at` varchar(60) NOT NULL,
  `backup_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `backup_code` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `backup_product`
--

INSERT INTO `backup_product` (`id`, `product_name`, `code`, `product_price`, `product_qty`, `created_at`, `backup_at`, `backup_code`) VALUES
(40, 'Special Side Mirror', 'SM021', 125, 10, '', '2022-07-25 14:59:18', ''),
(41, 'Magic Mirror', 'SM0021', 250, 5, '', '2022-07-25 14:59:18', ''),
(42, 'Duck Honk', 'HRN005', 150, 9, '', '2022-07-25 14:59:18', ''),
(43, 'Popper', 'askdjaklsjd', 200, 22, '', '2022-07-25 14:59:18', ''),
(33, 'Special Side Mirror', 'SM021', 125, 10, '', '2022-07-26 11:55:03', 'Atu5N'),
(35, 'Magic Mirror', 'SM0021', 250, 5, '', '2022-07-26 11:55:03', 'dz6FV'),
(37, 'Duck Honk', 'HRN005', 150, 9, '', '2022-07-26 11:55:03', 'MSG0P'),
(39, 'Popper', 'askdjaklsjd', 200, 22, '', '2022-07-26 11:55:03', '4rmwL'),
(33, 'Special Side Mirror', 'SM021', 125, 10, '', '2022-07-26 11:55:48', 'vHdIB'),
(35, 'Magic Mirror', 'SM0021', 250, 5, '', '2022-07-26 11:55:48', '4TRX8'),
(37, 'Duck Honk', 'HRN005', 150, 9, '', '2022-07-26 11:55:48', 'C35o0'),
(39, 'Popper', 'askdjaklsjd', 200, 22, '', '2022-07-26 11:55:48', '6XKVS'),
(33, 'Special Side Mirror', 'SM021', 125, 10, '', '2022-07-26 12:01:43', 'sMHmD'),
(35, 'Magic Mirror', 'SM0021', 250, 5, '', '2022-07-26 12:01:43', 'y7sVY'),
(37, 'Duck Honk', 'HRN005', 150, 9, '', '2022-07-26 12:01:43', 'exEC5'),
(39, 'Popper', 'askdjaklsjd', 200, 22, '', '2022-07-26 12:01:43', 'Tj1EA'),
(33, 'Special Side Mirror', 'SM021', 125, 10, '', '2022-07-26 12:02:50', 'zEaCR'),
(35, 'Magic Mirror', 'SM0021', 250, 5, '', '2022-07-26 12:02:50', 'pE1wl'),
(37, 'Duck Honk', 'HRN005', 150, 9, '', '2022-07-26 12:02:50', 'MXnFP'),
(39, 'Popper', 'askdjaklsjd', 200, 22, '', '2022-07-26 12:02:50', 'j7y02'),
(33, 'Special Side Mirror', 'SM021', 125, 10, '', '2022-07-26 12:09:59', 'zyPx7'),
(35, 'Magic Mirror', 'SM0021', 250, 5, '', '2022-07-26 12:09:59', 'tT3e8'),
(37, 'Duck Honk', 'HRN005', 150, 9, '', '2022-07-26 12:09:59', 'qLbiK'),
(39, 'Popper', 'askdjaklsjd', 200, 22, '', '2022-07-26 12:09:59', 'p04bd'),
(33, 'Special Side Mirror', 'SM021', 125, 10, '', '2022-07-26 12:11:27', 'xuyBs'),
(35, 'Magic Mirror', 'SM0021', 250, 5, '', '2022-07-26 12:11:27', '9rvUS'),
(37, 'Duck Honk', 'HRN005', 150, 9, '', '2022-07-26 12:11:27', 'vz8ew'),
(39, 'Popper', 'askdjaklsjd', 200, 22, '', '2022-07-26 12:11:27', 'F3uXp'),
(33, 'Special Side Mirror', '1595', 125, 10, '', '2022-07-26 12:13:19', '1595'),
(35, 'Magic Mirror', '6422', 250, 5, '', '2022-07-26 12:13:19', '6422'),
(37, 'Duck Honk', '1349', 150, 9, '', '2022-07-26 12:13:19', '1349'),
(39, 'Popper', '5845', 200, 22, '', '2022-07-26 12:13:19', '5845'),
(33, 'Special Side Mirror', 'SM021', 125, 10, '', '2022-07-26 12:17:49', 'MbYK2'),
(35, 'Magic Mirror', 'SM0021', 250, 5, '', '2022-07-26 12:17:49', 'MbYK2'),
(37, 'Duck Honk', 'HRN005', 150, 9, '', '2022-07-26 12:17:49', 'MbYK2'),
(39, 'Popper', 'askdjaklsjd', 200, 22, '', '2022-07-26 12:17:49', 'MbYK2'),
(33, 'Special Side Mirror', 'SM021', 125, 10, '', '2022-07-26 12:18:00', 'RY1kL'),
(35, 'Magic Mirror', 'SM0021', 250, 5, '', '2022-07-26 12:18:00', 'RY1kL'),
(37, 'Duck Honk', 'HRN005', 150, 9, '', '2022-07-26 12:18:00', 'RY1kL'),
(39, 'Popper', 'askdjaklsjd', 200, 22, '', '2022-07-26 12:18:00', 'RY1kL'),
(33, 'Special Side Mirror', 'SM021', 125, 10, '', '2022-07-26 12:20:41', 'rB4Yu'),
(35, 'Magic Mirror', 'SM0021', 250, 5, '', '2022-07-26 12:20:41', 'rB4Yu'),
(37, 'Duck Honk', 'HRN005', 150, 9, '', '2022-07-26 12:20:41', 'rB4Yu'),
(39, 'Popper', 'askdjaklsjd', 200, 22, '', '2022-07-26 12:20:41', 'rB4Yu'),
(33, 'Special Side Mirror', 'SM021', 125, 10, '', '2022-07-26 12:26:40', ''),
(35, 'Magic Mirror', 'SM0021', 250, 5, '', '2022-07-26 12:26:40', ''),
(37, 'Duck Honk', 'HRN005', 150, 9, '', '2022-07-26 12:26:40', ''),
(39, 'Popper', 'askdjaklsjd', 200, 22, '', '2022-07-26 12:26:40', ''),
(33, 'Special Side Mirror', 'SM021', 125, 10, '', '2022-07-26 12:26:56', 'HVCmh'),
(35, 'Magic Mirror', 'SM0021', 250, 5, '', '2022-07-26 12:26:56', 'HVCmh'),
(37, 'Duck Honk', 'HRN005', 150, 9, '', '2022-07-26 12:26:56', 'HVCmh'),
(39, 'Popper', 'askdjaklsjd', 200, 22, '', '2022-07-26 12:26:56', 'HVCmh'),
(33, 'Special Side Mirror', 'SM021', 125, 10, '', '2022-07-26 12:27:35', 'amsFh'),
(35, 'Magic Mirror', 'SM0021', 250, 5, '', '2022-07-26 12:27:35', 'amsFh'),
(37, 'Duck Honk', 'HRN005', 150, 9, '', '2022-07-26 12:27:35', 'amsFh'),
(39, 'Popper', 'askdjaklsjd', 200, 22, '', '2022-07-26 12:27:35', 'amsFh'),
(33, 'Special Side Mirror', 'SM021', 125, 10, '', '2022-07-26 12:30:58', 'EGQdM'),
(35, 'Magic Mirror', 'SM0021', 250, 5, '', '2022-07-26 12:30:58', 'EGQdM'),
(37, 'Duck Honk', 'HRN005', 150, 9, '', '2022-07-26 12:30:58', 'EGQdM'),
(39, 'Popper', 'askdjaklsjd', 200, 22, '', '2022-07-26 12:30:58', 'EGQdM'),
(33, 'Special Side Mirror', 'SM021', 125, 10, '', '2022-07-26 12:32:23', 'pmOeC'),
(35, 'Magic Mirror', 'SM0021', 250, 5, '', '2022-07-26 12:32:23', 'pmOeC'),
(37, 'Duck Honk', 'HRN005', 150, 9, '', '2022-07-26 12:32:23', 'pmOeC'),
(39, 'Popper', 'askdjaklsjd', 200, 22, '', '2022-07-26 12:32:23', 'pmOeC'),
(33, 'Special Side Mirror', 'SM021', 125, 10, '', '2022-07-26 12:32:48', 'bexoy'),
(35, 'Magic Mirror', 'SM0021', 250, 5, '', '2022-07-26 12:32:48', 'bexoy'),
(37, 'Duck Honk', 'HRN005', 150, 9, '', '2022-07-26 12:32:48', 'bexoy'),
(39, 'Popper', 'askdjaklsjd', 200, 22, '', '2022-07-26 12:32:48', 'bexoy'),
(33, 'Special Side Mirror', 'SM021', 125, 10, '', '2022-07-26 12:34:32', 'XWo1v'),
(35, 'Magic Mirror', 'SM0021', 250, 5, '', '2022-07-26 12:34:32', 'XWo1v'),
(37, 'Duck Honk', 'HRN005', 150, 9, '', '2022-07-26 12:34:32', 'XWo1v'),
(39, 'Popper', 'askdjaklsjd', 200, 22, '', '2022-07-26 12:34:32', 'XWo1v'),
(33, 'Special Side Mirror', 'SM021', 125, 10, '', '2022-07-26 12:37:05', 'ytvAM'),
(35, 'Magic Mirror', 'SM0021', 250, 5, '', '2022-07-26 12:37:05', 'ytvAM'),
(37, 'Duck Honk', 'HRN005', 150, 9, '', '2022-07-26 12:37:05', 'ytvAM'),
(39, 'Popper', 'askdjaklsjd', 200, 22, '', '2022-07-26 12:37:05', 'ytvAM'),
(33, 'Special Side Mirror', 'SM021', 125, 10, '', '2022-07-26 12:45:30', '0KYEx'),
(35, 'Magic Mirror', 'SM0021', 250, 5, '', '2022-07-26 12:45:30', '0KYEx'),
(37, 'Duck Honk', 'HRN005', 150, 9, '', '2022-07-26 12:45:30', '0KYEx'),
(39, 'Popper', 'askdjaklsjd', 200, 22, '', '2022-07-26 12:45:30', '0KYEx'),
(33, 'Special Side Mirror', 'SM021', 125, 10, '', '2022-07-26 12:45:41', 'tAc7d'),
(35, 'Magic Mirror', 'SM0021', 250, 5, '', '2022-07-26 12:45:41', 'tAc7d'),
(37, 'Duck Honk', 'HRN005', 150, 9, '', '2022-07-26 12:45:41', 'tAc7d'),
(39, 'Popper', 'askdjaklsjd', 200, 22, '', '2022-07-26 12:45:41', 'tAc7d'),
(33, 'Special Side Mirror', 'SM021', 125, 10, '', '2022-07-26 12:45:50', 'zv7uE'),
(35, 'Magic Mirror', 'SM0021', 250, 5, '', '2022-07-26 12:45:50', 'zv7uE'),
(37, 'Duck Honk', 'HRN005', 150, 9, '', '2022-07-26 12:45:50', 'zv7uE'),
(39, 'Popper', 'askdjaklsjd', 200, 22, '', '2022-07-26 12:45:50', 'zv7uE'),
(33, 'Special Side Mirror', 'SM021', 125, 10, '', '2022-07-26 12:51:59', '7xp1U'),
(35, 'Magic Mirror', 'SM0021', 250, 5, '', '2022-07-26 12:51:59', '7xp1U'),
(37, 'Duck Honk', 'HRN005', 150, 9, '', '2022-07-26 12:51:59', '7xp1U'),
(39, 'Popper', 'askdjaklsjd', 200, 22, '', '2022-07-26 12:51:59', '7xp1U'),
(33, 'Special Side Mirror', 'SM021', 125, 10, '', '2022-07-26 12:53:38', 'TFlqJ'),
(35, 'Magic Mirror', 'SM0021', 250, 5, '', '2022-07-26 12:53:38', 'TFlqJ'),
(37, 'Duck Honk', 'HRN005', 150, 9, '', '2022-07-26 12:53:38', 'TFlqJ'),
(39, 'Popper', 'askdjaklsjd', 200, 22, '', '2022-07-26 12:53:38', 'TFlqJ'),
(33, 'Special Side Mirror', 'SM021', 125, 10, '', '2022-07-26 12:54:26', 'SDi7u'),
(35, 'Magic Mirror', 'SM0021', 250, 5, '', '2022-07-26 12:54:26', 'SDi7u'),
(37, 'Duck Honk', 'HRN005', 150, 9, '', '2022-07-26 12:54:26', 'SDi7u'),
(39, 'Popper', 'askdjaklsjd', 200, 22, '', '2022-07-26 12:54:26', 'SDi7u'),
(33, 'Special Side Mirror', 'SM021', 125, 10, '', '2022-07-26 12:54:36', 'Pa5Jo'),
(35, 'Magic Mirror', 'SM0021', 250, 5, '', '2022-07-26 12:54:36', 'Pa5Jo'),
(37, 'Duck Honk', 'HRN005', 150, 9, '', '2022-07-26 12:54:36', 'Pa5Jo'),
(39, 'Popper', 'askdjaklsjd', 200, 22, '', '2022-07-26 12:54:36', 'Pa5Jo');

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
(20, 0, 'Special Side Mirror P125 1 pc(s), Duck Honk P150 1 pc(s)', 275, 300, 25, '2022-05-25 06:07:27'),
(21, 0, 'Popper P200 42 pc(s)', 8400, 10000, 1600, '2022-07-25 13:53:09');

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
(33, 'Special Side Mirror', 'SM021', 125, 10),
(35, 'Magic Mirror', 'SM0021', 250, 5),
(37, 'Duck Honk', 'HRN005', 150, 9),
(39, 'Popper', 'askdjaklsjd', 200, 22);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`acc_id`);

--
-- Indexes for table `backup_invoice`
--
ALTER TABLE `backup_invoice`
  ADD KEY `id` (`id`) USING BTREE;

--
-- Indexes for table `backup_product`
--
ALTER TABLE `backup_product`
  ADD KEY `id` (`id`) USING BTREE;

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
  MODIFY `acc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `backup_invoice`
--
ALTER TABLE `backup_invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `backup_product`
--
ALTER TABLE `backup_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
