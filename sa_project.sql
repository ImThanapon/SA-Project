-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 23, 2021 at 05:33 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sa_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `invoice_id` int(3) NOT NULL,
  `room_id` int(3) NOT NULL,
  `water_unit` float NOT NULL,
  `electric_unit` float NOT NULL,
  `rent` float NOT NULL,
  `total` float NOT NULL,
  `invoice_time` date NOT NULL DEFAULT current_timestamp(),
  `status_pay` enum('paid','not-paid') NOT NULL DEFAULT 'not-paid'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`invoice_id`, `room_id`, `water_unit`, `electric_unit`, `rent`, `total`, `invoice_time`, `status_pay`) VALUES
(1, 101, 5, 21, 1500, 1753, '2021-03-03', 'paid'),
(2, 102, 10, 10, 1500, 1750, '2021-03-03', 'paid'),
(10, 110, 1, 1, 1500, 1525, '2021-03-10', 'paid'),
(11, 110, 10, 10, 1500, 1750, '2021-03-11', 'paid'),
(12, 101, 13, 35, 1500, 2001, '2021-03-25', 'not-paid'),
(13, 103, 5, 5, 1500, 1625, '2021-03-19', 'paid');

-- --------------------------------------------------------

--
-- Table structure for table `receipts`
--

CREATE TABLE `receipts` (
  `receipt_id` int(3) NOT NULL,
  `room_id` int(3) NOT NULL,
  `invoice_id` int(3) NOT NULL,
  `total_received` int(11) NOT NULL,
  `receipt_time` date DEFAULT current_timestamp(),
  `bill_image` text DEFAULT NULL,
  `method` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `receipts`
--

INSERT INTO `receipts` (`receipt_id`, `room_id`, `invoice_id`, `total_received`, `receipt_time`, `bill_image`, `method`) VALUES
(1, 101, 1, 1753, '2021-03-03', 'member/img_bill/3ab30c8201dc206fcc006570f635845e.jpg', 'พร้อมเพย์ 061-980-7818'),
(2, 102, 2, 1750, '2021-03-03', 'member/img_bill/3ab30c8201dc206fcc006570f635845e.jpg', 'กรุงไทย 741-047065-8'),
(10, 110, 10, 1525, '2021-03-10', 'member/img_bill/3ab30c8201dc206fcc006570f635845e.jpg', 'พร้อมเพย์ 061-980-7818'),
(11, 110, 11, 1750, '2021-03-12', 'member/img_bill/3ab30c8201dc206fcc006570f635845e.jpg', 'พร้อมเพย์ 061-980-7818'),
(12, 101, 0, 0, '0000-00-00', NULL, ''),
(13, 103, 13, 1625, '0000-00-00', 'member/img_bill/f58a73526a867def3e76f49d80c210da.jpg', 'กรุงไทย 741-047065-8');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `room_id` int(3) NOT NULL,
  `check_in` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`room_id`, `check_in`) VALUES
(101, '0000-00-00'),
(102, '2021-03-10'),
(103, '0000-00-00'),
(104, '0000-00-00'),
(105, '0000-00-00'),
(106, '0000-00-00'),
(107, '0000-00-00'),
(108, '0000-00-00'),
(109, '2021-03-09'),
(110, '2021-03-10');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `room_id` int(3) NOT NULL,
  `status` varchar(5) NOT NULL DEFAULT 'user',
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `name` text NOT NULL,
  `phone` text NOT NULL,
  `line` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `id_card` text NOT NULL,
  `image` text NOT NULL,
  `check_in` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `room_id`, `status`, `username`, `password`, `name`, `phone`, `line`, `email`, `address`, `id_card`, `image`, `check_in`) VALUES
(8, 0, 'admin', 'admin', '81dc9bdb52d04dc20036dbd8313ed055', 'นายธนพล วิเศษสังข์', '0619807818', '0619807818', 'thanapon7818@gmail.com', '', '1730601211865', '', '2021-03-11'),
(39, 109, 'user', 'nack180942', 'b7fa8c012181a8b51ff2bf11050c66d7', 'นายกุ๊กไก่ ขยันดี', '0619807818', '0619807818', 'thanapon7818@gmail.com', '6/139 หมู่ 8 ', '1730601211865', 'member/img_profile/a2cc017dc34bdb4be0c56188a084ca9f.jpg', '2021-03-11'),
(40, 110, 'user', 'user', '81dc9bdb52d04dc20036dbd8313ed055', 'ธนพล', '0619807818', '0619807818', 'thanapon7818@gmail.com', '6/196 หมู่ที่ 8 ตำบอลอ้อมใหญ่ อำเภอสามพราน จังหวัดนครปฐม 73160', '1730601211865', 'member/img_profile/6c5a9907f0f576dfdc9bead0d14c064e.jpg', '2021-03-18'),
(105, 102, 'user', 'pim', '81dc9bdb52d04dc20036dbd8313ed055', 'นางสาวรักเมืองไทย', '0619807818', '0619807818', 'thanapon7818@gmail.com', '6/196 หมู่ที่ 8 ตำบอลอ้อมใหญ่ อำเภอสามพราน จังหวัดนครปฐม 73160', '1730601211865', 'member/img_profile/bffad7077eaa658f7c8e29960e04a8f0.png', '2021-03-19'),
(106, 101, 'user', 'jun', '81dc9bdb52d04dc20036dbd8313ed055', 'นางสาววราภรณ์ กุลเพชรประสิทธิ์', '0806597401', '@JunLy0056', 'jun@gmail.com', 'บ้านเลขที่ 5/93 หมู่ที่ 8 ต.อ้อมใหญ่ อ.สามพราน จ.นครปฐม 73160', '1234567890123', 'member/img_profile/98088986c3238ce0f55a1afdc1c4e6c1.jpg', '2021-03-15'),
(107, 103, 'user', 'room103', '81dc9bdb52d04dc20036dbd8313ed055', 'นางสาวใจดี เรียนเก่ง', '0619807818', '0619807818', 'thanapon7818@gmail.com', 'บ้านเลขที่ 5/93 หมู่ที่ 8 ต.อ้อมใหญ่ อ.สามพราน จ.นครปฐม 73160', '1111111111111', 'member/img_profile/64e96fe91b6530437a2bf3028d0a3a01.jpg', '2021-03-19'),
(108, 104, 'user', '', '', '', '', '', '', '', '', '', '0000-00-00'),
(109, 105, 'user', '', '', '', '', '', '', '', '', '', '0000-00-00'),
(110, 106, 'user', '', '', '', '', '', '', '', '', '', '0000-00-00'),
(111, 107, 'user', '', '', '', '', '', '', '', '', '', '0000-00-00'),
(112, 108, 'user', '', '', '', '', '', '', '', '', '', '0000-00-00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`invoice_id`);

--
-- Indexes for table `receipts`
--
ALTER TABLE `receipts`
  ADD PRIMARY KEY (`receipt_id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`room_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `invoice_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `receipts`
--
ALTER TABLE `receipts`
  MODIFY `receipt_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `room_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=710;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
