-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 20, 2020 at 12:31 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.3.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lottery`
--

-- --------------------------------------------------------

--
-- Table structure for table `ticket_master`
--

CREATE TABLE `ticket_master` (
  `ticket_master_id` int(11) NOT NULL,
  `ticket_master_total` double NOT NULL,
  `seller_id` int(11) NOT NULL,
  `order_master_time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ticket_master`
--

INSERT INTO `ticket_master` (`ticket_master_id`, `ticket_master_total`, `seller_id`, `order_master_time`) VALUES
(1, 300, 1, 0),
(2, 300, 1, 0),
(3, 300, 1, 0),
(4, 300, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `ticket_orders`
--

CREATE TABLE `ticket_orders` (
  `ticket_order_id` int(11) NOT NULL,
  `ticket_order_name` text NOT NULL,
  `ticket_order_number` text NOT NULL,
  `ticket_order_stack` double NOT NULL,
  `seller_id` int(11) NOT NULL,
  `ticket_order_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ticket_master_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ticket_orders`
--

INSERT INTO `ticket_orders` (`ticket_order_id`, `ticket_order_name`, `ticket_order_number`, `ticket_order_stack`, `seller_id`, `ticket_order_time`, `ticket_master_id`) VALUES
(14, 'borlette', '25', 140, 2, '2020-07-17 20:31:43', 0),
(15, 'borlette', '00', 20, 2, '2020-07-17 20:31:43', 0),
(16, 'wedding', '80x10', 5, 2, '2020-07-17 20:44:00', 0),
(17, 'wedding', '80x11', 5, 2, '2020-07-17 20:44:00', 0),
(18, 'wedding', '55x11', 5, 2, '2020-07-17 20:44:00', 0),
(19, 'borlette', '20', 10, 2, '2020-07-18 10:30:00', 0),
(20, 'wedding', '20x10', 20, 2, '2020-07-19 20:49:52', 0),
(21, 'wedding', '20x10', 20, 2, '2020-07-19 20:49:54', 0),
(22, 'wedding', '20x10', 20, 2, '2020-07-19 20:49:55', 0),
(23, 'wedding', '20x10', 20, 2, '2020-07-19 20:53:02', 0),
(24, 'borlette', '20x10', 20, 2, '2020-07-19 20:55:10', 0),
(25, 'wedding', '20x10', 20, 2, '2020-07-19 20:55:50', 0),
(26, 'wedding', '20x10', 20, 2, '2020-07-19 20:55:50', 0),
(27, 'borlette', '20', 10, 2, '2020-07-19 21:17:45', 0),
(28, 'borlette', '20', 10, 2, '2020-07-19 21:19:15', 0),
(29, 'borlette', '20', 10, 2, '2020-07-19 21:19:38', 0),
(30, 'borlette', '20', 10, 2, '2020-07-19 21:20:19', 0),
(31, 'borlette', '20', 10, 2, '2020-07-19 21:20:20', 0),
(32, 'borlette', '20', 10, 2, '2020-07-19 21:20:20', 0),
(33, '5', '00', 10, 2, '2020-07-19 21:22:31', 0),
(34, '5', '20x20', 10, 2, '2020-07-19 21:22:31', 0),
(35, '5', '20x20', 10, 2, '2020-07-19 21:22:31', 0),
(36, 'wedding', '20', 10, 2, '2020-07-19 21:24:30', 0),
(37, 'wedding', '20x10', 20, 2, '2020-07-19 21:24:31', 0),
(38, 'borlette', '14', 20, 2, '2020-07-19 21:25:11', 0),
(39, 'borlette', '25', 20, 2, '2020-07-19 21:25:11', 0),
(40, 'wedding', '20x10', 20, 2, '2020-07-19 21:27:05', 4),
(41, 'wedding', '20x10', 20, 2, '2020-07-19 21:27:05', 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ticket_master`
--
ALTER TABLE `ticket_master`
  ADD PRIMARY KEY (`ticket_master_id`);

--
-- Indexes for table `ticket_orders`
--
ALTER TABLE `ticket_orders`
  ADD PRIMARY KEY (`ticket_order_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ticket_master`
--
ALTER TABLE `ticket_master`
  MODIFY `ticket_master_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ticket_orders`
--
ALTER TABLE `ticket_orders`
  MODIFY `ticket_order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
