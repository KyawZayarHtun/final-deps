-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 19, 2022 at 09:46 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `final-dets`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
                            `id` bigint(20) NOT NULL,
                            `category_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category_name`) VALUES
                                                   (1, 'Home'),
                                                   (2, 'Transportation'),
                                                   (3, 'Food'),
                                                   (4, 'Medical'),
                                                   (5, 'Utilities'),
                                                   (6, 'Clothes'),
                                                   (9, 'Testing'),
                                                   (13, 'Goods'),
                                                   (14, 'Furniture'),
                                                   (15, 'for name'),
                                                   (16, 'new categroy');

-- --------------------------------------------------------

--
-- Table structure for table `tblexpenses`
--

CREATE TABLE `tblexpenses` (
                               `id` int(11) NOT NULL,
                               `user_id` int(11) NOT NULL,
                               `expense_date` date NOT NULL,
                               `expense_item` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
                               `cost` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
                               `note_date` datetime NOT NULL DEFAULT current_timestamp(),
                               `category_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tblexpenses`
--

INSERT INTO `tblexpenses` (`id`, `user_id`, `expense_date`, `expense_item`, `cost`, `note_date`, `category_name`) VALUES
                                                                                                                      (15, 2, '2022-12-18', 'T-Shirt', '5000', '2022-12-18 21:11:36', 'Clothes'),
                                                                                                                      (16, 2, '2022-01-18', 'Taxi Fee', '3000', '2022-12-18 21:12:10', 'Transportation'),
                                                                                                                      (17, 2, '2022-11-18', 'Ice Cream', '7000', '2022-12-18 21:12:57', 'Food'),
                                                                                                                      (18, 2, '2022-02-18', 'Lipo', '4000', '2022-12-18 21:21:45', 'Food'),
                                                                                                                      (19, 2, '2022-03-18', 'T-Shirt', '30000', '2022-12-18 21:22:13', 'Clothes'),
                                                                                                                      (20, 2, '2022-04-18', 'Wifi Bill', '6000', '2022-12-18 21:23:05', 'Home'),
                                                                                                                      (21, 2, '2022-05-18', 'Taxi Fee', '4000', '2022-12-18 21:23:46', 'Transportation'),
                                                                                                                      (22, 2, '2022-06-18', 'Chair', '12000', '2022-12-18 21:24:36', 'Furniture'),
                                                                                                                      (23, 2, '2022-07-18', 'item one', '2000', '2022-12-18 21:25:08', 'Testing'),
                                                                                                                      (24, 2, '2022-08-18', 'Malar Shan Gaw', '7000', '2022-12-18 21:25:45', 'Food'),
                                                                                                                      (25, 2, '2022-09-18', 'pant', '15000', '2022-12-18 21:26:05', 'Clothes'),
                                                                                                                      (26, 2, '2022-10-18', 'biogesic', '2500', '2022-12-18 21:26:38', 'Medical'),
                                                                                                                      (27, 2, '2022-12-19', 'Shark', '1000', '2022-12-19 13:51:46', 'Food'),
                                                                                                                      (28, 3, '2022-12-27', 'demo', '12000', '2022-12-19 14:29:05', 'for name'),
                                                                                                                      (29, 3, '2022-12-19', '19 item', '120000', '2022-12-19 14:30:19', 'Utilities'),
                                                                                                                      (30, 3, '2022-12-18', '18 demo 1', '2500', '2022-12-19 14:44:25', 'Testing'),
                                                                                                                      (31, 3, '2022-12-20', ' demo item1220', '4500', '2022-12-19 15:07:02', 'new categroy'),
                                                                                                                      (32, 3, '2022-11-22', 'nineteen dec item', '12000', '2022-12-19 15:15:43', 'new categroy');

-- --------------------------------------------------------

--
-- Table structure for table `tblusers`
--

CREATE TABLE `tblusers` (
                            `id` int(11) NOT NULL,
                            `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
                            `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
                            `mobile_number` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
                            `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
                            `reg_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tblusers`
--

INSERT INTO `tblusers` (`id`, `name`, `email`, `mobile_number`, `password`, `reg_date`) VALUES
                                                                                            (1, 'kyawthihatun', 'kth@gmail.com', '09969703874', '197f69ebc78dd28918e7d4912f22e9d3', '2019-12-13 00:05:32'),
                                                                                            (2, 'bob', 'bob@gmail.com', '09254710279', '2acba7f51acfd4fd5102ad090fc612ee', '2019-12-13 00:06:20'),
                                                                                            (3, 'user', 'user@gmail.com', '09876543211', '81dc9bdb52d04dc20036dbd8313ed055', '2022-12-19 14:27:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
    ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblexpenses`
--
ALTER TABLE `tblexpenses`
    ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblusers`
--
ALTER TABLE `tblusers`
    ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
    MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tblexpenses`
--
ALTER TABLE `tblexpenses`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `tblusers`
--
ALTER TABLE `tblusers`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
