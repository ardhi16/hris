-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 28, 2019 at 02:43 PM
-- Server version: 5.7.23
-- PHP Version: 7.1.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hris`
--

-- --------------------------------------------------------

--
-- Table structure for table `division`
--

CREATE TABLE `division` (
  `division_id` int(11) UNSIGNED NOT NULL,
  `division_name` varchar(100) DEFAULT NULL,
  `division_created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `division_updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `employee_id` int(11) UNSIGNED NOT NULL,
  `employee_nik` varchar(20) DEFAULT NULL,
  `employee_name` varchar(255) DEFAULT NULL,
  `store_code` varchar(10) DEFAULT NULL,
  `employee_join_date` date DEFAULT NULL,
  `employee_exit_date` date DEFAULT NULL,
  `employee_pob` varchar(100) DEFAULT NULL,
  `employee_bdate` date DEFAULT NULL,
  `employee_gender` enum('L','P') DEFAULT NULL,
  `employee_current_address` text,
  `employee_current_postcode` varchar(10) DEFAULT NULL,
  `employee_current_village` varchar(100) DEFAULT NULL,
  `employee_current_district` varchar(100) DEFAULT NULL,
  `employee_id_address` text,
  `employee_id_postcode` varchar(10) DEFAULT NULL,
  `employee_id_village` varchar(100) DEFAULT NULL,
  `employee_id_district` varchar(100) DEFAULT NULL,
  `employee_phone` varchar(15) DEFAULT NULL,
  `employee_email` varchar(100) DEFAULT NULL,
  `employee_mother` varchar(255) DEFAULT NULL,
  `employee_married` enum('TIDAK MENIKAH','MENIKAH','DUDA','JANDA') DEFAULT NULL,
  `employee_status` enum('KONTRAK','TETAP') DEFAULT NULL,
  `position_id` int(11) DEFAULT NULL,
  `grade_id` int(11) DEFAULT NULL,
  `division_id` int(11) DEFAULT NULL,
  `employee_acc_bank` varchar(100) DEFAULT NULL,
  `employee_no_bpjskes` varchar(100) DEFAULT NULL,
  `employee_no_bpjstk` varchar(100) DEFAULT NULL,
  `employee_tax_status` enum('MENIKAH','TIDAK MENIKAH') DEFAULT NULL,
  `employee_children` int(11) DEFAULT '0',
  `employee_npwp` varchar(100) DEFAULT NULL,
  `employee_ordner` varchar(20) DEFAULT NULL,
  `employee_active` enum('1','0') DEFAULT '1',
  `user_id` int(11) DEFAULT NULL,
  `employee_created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `employee_updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `family`
--

CREATE TABLE `family` (
  `employee_id` int(11) UNSIGNED NOT NULL,
  `family_card` varchar(20) DEFAULT NULL,
  `family_name` varchar(255) DEFAULT NULL,
  `family_relation` enum('AYAH','IBU','ANAK','SUAMI','ISTRI') DEFAULT NULL,
  `family_bdate` date DEFAULT NULL,
  `family_gender` enum('L','P') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `grade`
--

CREATE TABLE `grade` (
  `grade_id` int(11) UNSIGNED NOT NULL,
  `grade_name` varchar(10) DEFAULT NULL,
  `grade_created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `grade_updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `position`
--

CREATE TABLE `position` (
  `position_id` int(11) UNSIGNED NOT NULL,
  `position_name` varchar(100) DEFAULT NULL,
  `division_id` int(11) DEFAULT NULL,
  `position_created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `position_updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `role_id` int(11) UNSIGNED NOT NULL,
  `role_name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`role_id`, `role_name`) VALUES
(1, 'SUPERADMIN'),
(2, 'ADMIN'),
(3, 'USER');

-- --------------------------------------------------------

--
-- Table structure for table `school`
--

CREATE TABLE `school` (
  `school_id` int(10) UNSIGNED NOT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `school_level` enum('SMA','S1','S2','S3') DEFAULT NULL,
  `school_major` varchar(100) DEFAULT NULL,
  `school_name` varchar(11) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `store`
--

CREATE TABLE `store` (
  `store_id` int(11) UNSIGNED NOT NULL,
  `store_code` varchar(10) DEFAULT NULL,
  `store_name` varchar(100) DEFAULT NULL,
  `store_created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `store_updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `store`
--

INSERT INTO `store` (`store_id`, `store_code`, `store_name`, `store_created_at`, `store_updated_at`) VALUES
(1, NULL, 'Bojonggede Barat', '2019-05-28 12:40:00', '2019-05-28 12:41:26');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) UNSIGNED NOT NULL,
  `user_name` varchar(100) DEFAULT NULL,
  `user_password` varchar(255) DEFAULT NULL,
  `user_email` varchar(100) DEFAULT NULL,
  `user_fullname` varchar(255) DEFAULT NULL,
  `user_image` varchar(255) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `user_created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `user_updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_password`, `user_email`, `user_fullname`, `user_image`, `role_id`, `user_created_at`, `user_updated_at`) VALUES
(1, 'admin', '$2y$10$HX3CGLS/LqhwlSM5zmnbcOReN2PEXmIWt1UpU8bsNbGw8KO4I1FfC', 'admin@admin.com', 'Administrator', NULL, 1, '2019-05-28 12:09:24', '2019-05-28 12:09:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `division`
--
ALTER TABLE `division`
  ADD PRIMARY KEY (`division_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`employee_id`),
  ADD KEY `nik` (`employee_nik`);

--
-- Indexes for table `grade`
--
ALTER TABLE `grade`
  ADD PRIMARY KEY (`grade_id`);

--
-- Indexes for table `position`
--
ALTER TABLE `position`
  ADD PRIMARY KEY (`position_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `school`
--
ALTER TABLE `school`
  ADD PRIMARY KEY (`school_id`);

--
-- Indexes for table `store`
--
ALTER TABLE `store`
  ADD PRIMARY KEY (`store_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `division`
--
ALTER TABLE `division`
  MODIFY `division_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `employee_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `grade`
--
ALTER TABLE `grade`
  MODIFY `grade_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `position`
--
ALTER TABLE `position`
  MODIFY `position_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `role_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `school`
--
ALTER TABLE `school`
  MODIFY `school_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `store`
--
ALTER TABLE `store`
  MODIFY `store_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
