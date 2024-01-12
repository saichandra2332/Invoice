-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 12, 2024 at 06:06 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `invoice`
--

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `c_id` int(11) NOT NULL,
  `c_name` varchar(50) NOT NULL,
  `c_inno` varchar(50) NOT NULL,
  `c_status` int(2) NOT NULL DEFAULT 1,
  `c_d_t` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`c_id`, `c_name`, `c_inno`, `c_status`, `c_d_t`) VALUES
(1, 'Ford Motors PVT', 'IN-001', 1, '2024-01-04 10:32:08'),
(2, 'BENZ', 'IN-002', 1, '2024-01-04 11:14:33'),
(3, 'Arrow', 'IN-003', 1, '2024-01-04 10:33:38');

-- --------------------------------------------------------

--
-- Table structure for table `invoicetable`
--

CREATE TABLE `invoicetable` (
  `in_id` int(11) NOT NULL,
  `client_name` varchar(30) NOT NULL,
  `in_no` varchar(50) NOT NULL,
  `project_name` varchar(30) NOT NULL,
  `ac_date` varchar(50) NOT NULL,
  `due_date` varchar(50) NOT NULL,
  `in_type` varchar(40) NOT NULL,
  `qty` int(10) NOT NULL,
  `unitprice` int(10) NOT NULL,
  `in_gst` varchar(30) NOT NULL,
  `g_total` varchar(50) NOT NULL,
  `price_words` varchar(70) NOT NULL,
  `in_lb` varchar(50) NOT NULL,
  `note` varchar(70) NOT NULL,
  `in_status` int(2) NOT NULL DEFAULT 1,
  `c_d_t` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `invoicetable`
--

INSERT INTO `invoicetable` (`in_id`, `client_name`, `in_no`, `project_name`, `ac_date`, `due_date`, `in_type`, `qty`, `unitprice`, `in_gst`, `g_total`, `price_words`, `in_lb`, `note`, `in_status`, `c_d_t`) VALUES
(1, 'FORD', '1256', 'Full stack', '2024-01-04', '2024-01-25', 'GST', 1, 222, '39.96', '261.96', '', ' sc', 'cs', 1, '2024-01-04 11:11:02'),
(2, 'BENZ', 'IN-002', 'Full stack', '2024-01-04', '2024-01-25', 'GST', 2, 1000, '180', '1180', '', 'dc', 'jcc', 1, '2024-01-04 11:32:03'),
(3, 'Ford Motors PVT', 'IN-001', 'Full stack', '2024-01-11', '2024-01-31', 'CGST', 1, 1000, '180', '1180', '', 'gvbn', 'gfn', 1, '2024-01-11 16:31:56');

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `u_id` int(11) NOT NULL,
  `u_mail` varchar(40) NOT NULL,
  `u_pwd` varchar(40) NOT NULL,
  `STATUS` int(2) NOT NULL DEFAULT 1,
  `C_D_T` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`u_id`, `u_mail`, `u_pwd`, `STATUS`, `C_D_T`) VALUES
(1, 'sai123', '1111', 1, '2024-01-03 11:28:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `invoicetable`
--
ALTER TABLE `invoicetable`
  ADD PRIMARY KEY (`in_id`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `invoicetable`
--
ALTER TABLE `invoicetable`
  MODIFY `in_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
