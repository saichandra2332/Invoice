-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 20, 2024 at 07:43 AM
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
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `status`) VALUES
(1, 'pavankumar', 'pavankumar', '1');

-- --------------------------------------------------------

--
-- Table structure for table `cilents`
--

CREATE TABLE `cilents` (
  `cilent_id` int(11) NOT NULL,
  `cilent_name` varchar(50) NOT NULL,
  `cilent_invoice_no` varchar(30) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cilents`
--

INSERT INTO `cilents` (`cilent_id`, `cilent_name`, `cilent_invoice_no`, `status`) VALUES
(1, 'Ford Motors', 'INV0001', '1'),
(2, 'Benz Motors', 'INV0002', '1'),
(3, 'Arrow Company', 'INV0003', '1');

-- --------------------------------------------------------

--
-- Table structure for table `invoice_bills`
--

CREATE TABLE `invoice_bills` (
  `bill_id` int(11) NOT NULL,
  `invoice_no` varchar(30) NOT NULL,
  `invoice_type` varchar(30) NOT NULL,
  `date` varchar(30) NOT NULL,
  `due_date` varchar(30) NOT NULL,
  `client_name` varchar(50) NOT NULL,
  `project_name` varchar(50) NOT NULL,
  `item` varchar(50) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `gst` varchar(30) NOT NULL,
  `grand_total` varchar(30) NOT NULL,
  `quantity` varchar(30) NOT NULL DEFAULT '1',
  `from_address` longtext NOT NULL,
  `to_address` longtext NOT NULL,
  `add_note` longtext NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `modify_date_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `invoice_bills`
--

INSERT INTO `invoice_bills` (`bill_id`, `invoice_no`, `invoice_type`, `date`, `due_date`, `client_name`, `project_name`, `item`, `amount`, `gst`, `grand_total`, `quantity`, `from_address`, `to_address`, `add_note`, `status`, `modify_date_time`) VALUES
(3, 'INV0001', 'Standard', '2024-01-04', '2024-01-27', 'Ford', 'Full Stack World', 'Admin Portal', '100000', '18000', '118000', '1', 'Vulcan Techs \r\n9-39-3/1,Pithapuram Colony,\r\nMaddilapalem, Visakhapatnam,\r\nAndhra Pradesh 530003', 'Ford Motors       \r\nW67C+7JJ, Elcot Sez, \r\nSholinganallur, Chennai, \r\nTamil Nadu 600119', '\"Thank you for choosing Vulcan Techs. We appreciate your business and look forward to serving you again.\"', '1', '2024-01-04 10:23:19'),
(4, 'INV0002', 'Standard', '2024-01-04', '2024-01-24', 'Pavan Kumar', 'Restaurant Website', 'BTechCoffee.com', '228700', '41166', '269866', '1', 'Vulcan Techs \r\n9-39-3/1,Pithapuram Colony,\r\nMaddilapalem, Visakhapatnam,\r\nAndhra Pradesh 530003', 'Pavan Kumar,\r\nIT Sez, Hill no 2,\r\nRushikonda, Visakhapatnam, \r\nAndhra Pradesh 530048', '\"Thank you for choosing Vulcan Techs. We appreciate your business and look forward to serving you again.\"', '1', '2024-01-04 06:02:00'),
(8, '5555555', 'Standard', '2024-01-04', '2024-01-10', '55555aaaaaaa', 'Full Stack World', 'Admin Portal', '100000', '18000', '118000', '1', 'Vulcan Techs \r\n9-39-3/1,Pithapuram Colony,\r\nMaddilapalem, Visakhapatnam,\r\nAndhra Pradesh 530003', 'zzzz', 'zzzzz', '0', '2024-01-04 07:15:08'),
(9, 'INV0001', 'Proforma', '2024-01-04', '2024-01-11', 'Phenom People1', 'Full Stack World', 'Admin Portal', '2222222222222222222', '4.0E+17', '2.6222222222222E+18', '1', 'Vulcan Techs \r\n9-39-3/1,Pithapuram Colony,\r\nMaddilapalem, Visakhapatnam,\r\nAndhra Pradesh 530003', 'sss', 'sssss', '0', '2024-01-04 07:38:26'),
(10, 'qqqq', 'Standard', '2024-01-04', '2024-01-26', 'Phenom People1', 'Full Stack World', 'qqqqqq', '77777777777', '13999999999.86', '91777777776.86', '1', 'Vulcan Techs \r\n9-39-3/1,Pithapuram Colony,\r\nMaddilapalem, Visakhapatnam,\r\nAndhra Pradesh 530003', 'qqq', 'qqqqqqq', '0', '2024-01-04 09:40:58'),
(11, 'INV0001', 'Standard', '2024-01-04', '2024-01-26', 'Phenom People', 'Full Stack World', 'Admin Portal', '199', '35.82', '234.82', '1', 'Vulcan Techs \r\n9-39-3/1,Pithapuram Colony,\r\nMaddilapalem, Visakhapatnam,\r\nAndhra Pradesh 530003', 'ss', 'ssss', '0', '2024-01-04 09:43:49'),
(12, 'INV0002', 'Standard', '2024-01-04', '2024-01-25', '2', 'VV', 'VVVVV', '1111111111', '199999999.98', '1311111110.98', '1', 'Vulcan Techs \r\n9-39-3/1,Pithapuram Colony,\r\nMaddilapalem, Visakhapatnam,\r\nAndhra Pradesh 530003', 'VVVVV', 'VVVV', '0', '2024-01-04 11:05:56'),
(13, 'INV0002', 'Standard', '2024-01-04', '2024-02-01', 'Benz Motors', 'Full Stack World', 'dd', '1000000', '180000', '1180000', '1', 'Vulcan Techs \r\n9-39-3/1,Pithapuram Colony,\r\nMaddilapalem, Visakhapatnam,\r\nAndhra Pradesh 530003', 'ssss', 'ssssss', '0', '2024-01-04 11:07:33'),
(14, 'INV0001', 'Standard', '2024-04-23', '2024-05-15', 'Ford Motors', 'Full Stack World', 'Admin Portal', '100000', '18000', '118000', '1', 'Vulcan Techs \r\n9-39-3/1,Pithapuram Colony,\r\nMaddilapalem, Visakhapatnam,\r\nAndhra Pradesh 530003', 'ggggggggggggggggggggggggggg', '', '0', '2024-04-23 14:53:58'),
(15, 'INV0002', 'Standard', '2024-04-23', '2024-05-10', 'Benz Motors', 'Restaurant Website', 'Admin Portal', '100000', '18000', '118000', '1', 'Vulcan Techs \r\n9-39-3/1,Pithapuram Colony,\r\nMaddilapalem, Visakhapatnam,\r\nAndhra Pradesh 530003', 'fff', '', '1', '2024-04-23 14:52:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cilents`
--
ALTER TABLE `cilents`
  ADD PRIMARY KEY (`cilent_id`);

--
-- Indexes for table `invoice_bills`
--
ALTER TABLE `invoice_bills`
  ADD PRIMARY KEY (`bill_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cilents`
--
ALTER TABLE `cilents`
  MODIFY `cilent_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `invoice_bills`
--
ALTER TABLE `invoice_bills`
  MODIFY `bill_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
