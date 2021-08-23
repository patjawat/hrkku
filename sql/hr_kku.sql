-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: mariaDB
-- Generation Time: Aug 23, 2021 at 05:53 AM
-- Server version: 10.5.8-MariaDB-1:10.5.8+maria~focal
-- PHP Version: 7.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hr_kku`
--

-- --------------------------------------------------------

--
-- Table structure for table `auth`
--

CREATE TABLE `auth` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `source` varchar(255) NOT NULL,
  `source_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_assignment`
--

CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_general_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_general_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `auth_item`
--

CREATE TABLE `auth_item` (
  `name` varchar(64) COLLATE utf8_general_ci NOT NULL,
  `type` smallint(6) NOT NULL,
  `description` text COLLATE utf8_general_ci DEFAULT NULL,
  `rule_name` varchar(64) COLLATE utf8_general_ci DEFAULT NULL,
  `data` blob DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `auth_item_child`
--

CREATE TABLE `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_general_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `auth_rule`
--

CREATE TABLE `auth_rule` (
  `name` varchar(64) COLLATE utf8_general_ci NOT NULL,
  `data` blob DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categorise`
--

CREATE TABLE `categorise` (
  `id` int(11) NOT NULL,
  `type` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `parent` int(11) DEFAULT NULL,
  `route` varchar(255) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `data` blob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1629352456),
('m140209_132017_init', 1629352458),
('m140403_174025_create_account_table', 1629352458),
('m140504_113157_update_tables', 1629352459),
('m140504_130429_create_token_table', 1629352459),
('m140506_102106_rbac_init', 1629483768),
('m140602_111327_create_menu_table', 1629483718),
('m140830_171933_fix_ip_field', 1629352459),
('m140830_172703_change_account_table_name', 1629352459),
('m141222_110026_update_ip_field', 1629352459),
('m141222_135246_alter_username_length', 1629352459),
('m150614_103145_update_social_account_table', 1629352459),
('m150623_212711_fix_username_notnull', 1629352459),
('m151218_234654_add_timezone_to_profile', 1629352459),
('m160312_050000_create_user', 1629483718),
('m160929_103127_add_last_login_at_to_user_table', 1629352459),
('m170907_052038_rbac_add_index_on_auth_assignment_user_id', 1629483768),
('m180523_151638_rbac_updates_indexes_without_prefix', 1629483768),
('m200409_110543_rbac_update_mssql_trigger', 1629483768),
('m210616_081830_create_categorise_table', 1629353569),
('m210616_085242_create_uploads_table', 1629353569),
('m210819_055547_create_tracking_table', 1629480062),
('m210819_072001_create_tracking_position_table', 1629480062),
('m210819_073216_create_step_status_table', 1629480062),
('m210819_085525_create_reader_table', 1629480062),
('m210819_150429_create_auth_table', 1629480062),
('m210820_161751_drop_position_column_from_user_table', 1629480802);

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `user_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_general_ci DEFAULT NULL,
  `public_email` varchar(255) COLLATE utf8_general_ci DEFAULT NULL,
  `gravatar_email` varchar(255) COLLATE utf8_general_ci DEFAULT NULL,
  `gravatar_id` varchar(32) COLLATE utf8_general_ci DEFAULT NULL,
  `location` varchar(255) COLLATE utf8_general_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8_general_ci DEFAULT NULL,
  `bio` text COLLATE utf8_general_ci DEFAULT NULL,
  `timezone` varchar(40) COLLATE utf8_general_ci DEFAULT NULL,
  `pname` varchar(255) COLLATE utf8_general_ci DEFAULT NULL,
  `fname` varchar(255) COLLATE utf8_general_ci DEFAULT NULL,
  `lname` varchar(255) COLLATE utf8_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`user_id`, `name`, `public_email`, `gravatar_email`, `gravatar_id`, `location`, `website`, `bio`, `timezone`, `pname`, `fname`, `lname`) VALUES
(4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'นาง', 'qwe', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `reader`
--

CREATE TABLE `reader` (
  `id` int(11) NOT NULL,
  `sex` varchar(255) NOT NULL COMMENT 'เพศ',
  `fname` varchar(255) NOT NULL COMMENT 'ชื่อ',
  `lname` varchar(255) NOT NULL COMMENT 'นามสกุล',
  `position` varchar(255) NOT NULL COMMENT 'ตำแหน่ง',
  `major` varchar(255) NOT NULL COMMENT 'สาขาวิชา',
  `affiliation` varchar(255) NOT NULL COMMENT 'สังกัด',
  `contact` varchar(255) NOT NULL COMMENT 'ที่อยู่',
  `email` varchar(255) DEFAULT NULL COMMENT 'Email',
  `phone` varchar(255) DEFAULT NULL COMMENT 'เบอร์โทร'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `social_account`
--

CREATE TABLE `social_account` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8_general_ci NOT NULL,
  `client_id` varchar(255) COLLATE utf8_general_ci NOT NULL,
  `data` text COLLATE utf8_general_ci DEFAULT NULL,
  `code` varchar(32) COLLATE utf8_general_ci DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_general_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `social_account`
--

INSERT INTO `social_account` (`id`, `user_id`, `provider`, `client_id`, `data`, `code`, `created_at`, `email`, `username`) VALUES
(4, 4, 'google', '105194173405861865565', '{\"id\":\"105194173405861865565\",\"email\":\"patjawat@gmail.com\",\"verified_email\":true,\"name\":\"ปัจวัฒน์ ศรีบุญเรือง\",\"given_name\":\"ปัจวัฒน์\",\"family_name\":\"ศรีบุญเรือง\",\"picture\":\"https://lh3.googleusercontent.com/a-/AOh14GjAZ29n3B_hpxtYg8vRjFmo15c-BNBWc25I3-NQZA=s96-c\",\"locale\":\"th\"}', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `step_status`
--

CREATE TABLE `step_status` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `step_status`
--

INSERT INTO `step_status` (`id`, `name`) VALUES
(1, 'รอดำเนินการ'),
(2, 'กำลังดำเนินการ'),
(3, 'เสร็จสิ้นแล้ว');

-- --------------------------------------------------------

--
-- Table structure for table `token`
--

CREATE TABLE `token` (
  `user_id` int(11) NOT NULL,
  `code` varchar(32) COLLATE utf8_general_ci NOT NULL,
  `created_at` int(11) NOT NULL,
  `type` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tracking`
--

CREATE TABLE `tracking` (
  `id` int(11) NOT NULL,
  `ref` varchar(255) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(255) DEFAULT NULL,
  `pname` varchar(255) NOT NULL COMMENT 'คำนำหน้า',
  `fname` varchar(255) NOT NULL COMMENT 'ชื่อ',
  `lname` varchar(255) NOT NULL COMMENT 'นามสกุล',
  `affiliation` varchar(255) NOT NULL COMMENT 'สังกัด',
  `position` int(11) NOT NULL COMMENT 'ขอกำหนดตำแหน่ง',
  `position_type` varchar(255) NOT NULL COMMENT 'โดยวิธี',
  `position_way` varchar(255) NOT NULL COMMENT 'วิธีที่',
  `reader` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL COMMENT 'Reader' CHECK (json_valid(`reader`)),
  `branch` varchar(255) NOT NULL COMMENT 'ในสาขาวิชา',
  `branch_code` int(11) NOT NULL COMMENT 'รหัสสาขาวิชา',
  `local_meeting_date` date DEFAULT NULL COMMENT 'วันประชุมคณะกรรมการประจำส่วนงาน',
  `hr_getsubject_date` date DEFAULT NULL COMMENT 'วันที่กองทรัพยากรบุคคลรับเรื่อง',
  `step1` int(11) DEFAULT NULL COMMENT 'ขั้นที่ 1 กองทรัพยากรบุคคลรับเรื่องจากคณะ/หน่วยงาน',
  `step1_comment` varchar(255) DEFAULT NULL COMMENT 'หมายเหตุ',
  `step2` int(11) DEFAULT NULL COMMENT 'ขั้นที่ 2 นำเรื่องเสนอคณะกรรมการพิจารณาตำแหน่งทางวิชาการ เพื่อพิจารณารายละเอียดของผลงานทางวิชาการและรายชื่อผู้ทรงคุณวุฒิ',
  `step2_comment` varchar(255) DEFAULT NULL COMMENT 'หมายเหตุ',
  `step3` int(11) DEFAULT NULL COMMENT 'ขั้นที่ 3 ติดต่อทาบทามคณะกรรมการผู้ทรงคุณวุฒิ เพื่อทำหน้าที่ประเมินผลงานทางวิชาการ',
  `step3_comment` varchar(255) DEFAULT NULL COMMENT 'หมายเหตุ',
  `step4` int(11) DEFAULT NULL COMMENT 'ขั้นที่ 4 รอผลการทาบทามคณะกรรมการผู้ทรงคุณวุฒิทำหน้าที่ประเมินผลงานทางวิชาการ',
  `step4_comment` varchar(255) DEFAULT NULL COMMENT 'หมายเหตุ',
  `step5` int(11) DEFAULT NULL COMMENT 'ขั้นที่ 5 ส่งผลงานให้ผู้ทรงคุณวุฒิประเมิน',
  `step5_comment` varchar(255) DEFAULT NULL COMMENT 'หมายเหตุ',
  `step5_date` date DEFAULT NULL COMMENT 'ส่งผลงานให้ผู้ทรงคุณวุฒิประเมิน',
  `step6` int(11) DEFAULT NULL COMMENT 'ขั้นที่ 6 ประชุมคณะกรรมการพิจารณาตำแหน่งทางวิชาการทุกวันพฤหัสบดีที่ 3 ของทุกเดือน',
  `step6_comment` varchar(255) DEFAULT NULL COMMENT 'หมายเหตุ',
  `step6_date` date DEFAULT NULL COMMENT 'วันที่ประชุมคณะกรรมการพิจารณาตำแหน่งทางวิชาการ',
  `step7` int(11) DEFAULT NULL COMMENT 'ขั้นที่ 7 นำเรื่องเสนอที่ประชุมสภามหาวิทยาลัย',
  `step7_comment` varchar(255) DEFAULT NULL COMMENT 'หมายเหตุ',
  `step7_date` date DEFAULT NULL COMMENT 'วันที่ประชุมสภามหาวิทยาลัย',
  `step8` int(11) DEFAULT NULL COMMENT 'ขั้นที่ 8 คำสั่งแต่งตั้งให้ดำรงตำแหน่งทางวิชาการ',
  `step8_comment` varchar(255) DEFAULT NULL COMMENT 'หมายเหตุ',
  `success` tinyint(1) DEFAULT NULL COMMENT 'กระบวนขอตำแหน่งทางวิชาการเสร็จสิ้นแล้วหรือไม่'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tracking`
--

INSERT INTO `tracking` (`id`, `ref`, `created_by`, `updated_by`, `pname`, `fname`, `lname`, `affiliation`, `position`, `position_type`, `position_way`, `reader`, `branch`, `branch_code`, `local_meeting_date`, `hr_getsubject_date`, `step1`, `step1_comment`, `step2`, `step2_comment`, `step3`, `step3_comment`, `step4`, `step4_comment`, `step5`, `step5_comment`, `step5_date`, `step6`, `step6_comment`, `step6_date`, `step7`, `step7_comment`, `step7_date`, `step8`, `step8_comment`, `success`) VALUES
(8, 'pCVKb3EeXX3292t6jzcSpX', 4, NULL, 'นาง', 'swer', 'wer', '234234', 2, 'ปกติ', '1', 'null', '234234', 234234, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tracking_position`
--

CREATE TABLE `tracking_position` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tracking_position`
--

INSERT INTO `tracking_position` (`id`, `name`) VALUES
(1, 'ผู้ช่วยศาสตราจารย์'),
(2, 'รองศาสตราจารย์'),
(3, 'ศาสตราจารย์'),
(4, 'ศาสตราจารย์ได้รับเงินประจำตำแหน่งสูงขึ้น');

-- --------------------------------------------------------

--
-- Table structure for table `uploads`
--

CREATE TABLE `uploads` (
  `upload_id` int(11) NOT NULL,
  `ref` varchar(50) DEFAULT NULL,
  `file_name` varchar(255) DEFAULT NULL,
  `real_filename` varchar(255) DEFAULT NULL,
  `create_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `type` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `uploads`
--

INSERT INTO `uploads` (`upload_id`, `ref`, `file_name`, `real_filename`, `create_date`, `type`) VALUES
(3, 'EaJREldDGpI7nyfpQW_SIB', 'clipart2155861.png', '7d402b93a4064c1526a7c39b5226b6f2.png', '2021-08-19 14:47:26', NULL),
(4, 'EaJREldDGpI7nyfpQW_SIB', 'react_command.jpg', '2398f34a8e5302527a51fe2ca44c1357.jpg', '2021-08-19 14:50:07', NULL),
(5, 'EaJREldDGpI7nyfpQW_SIB', 'react-hexagon.png', 'cf7d5a88ca60f117b9a7a729cc281eeb.png', '2021-08-19 14:50:07', NULL),
(6, 'EaJREldDGpI7nyfpQW_SIB', 'react_logo.png', '95efe503806082a3b5c5d2205631fede.png', '2021-08-19 14:50:07', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_general_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_general_ci NOT NULL,
  `password_hash` varchar(60) COLLATE utf8_general_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_general_ci NOT NULL,
  `confirmed_at` int(11) DEFAULT NULL,
  `unconfirmed_email` varchar(255) COLLATE utf8_general_ci DEFAULT NULL,
  `blocked_at` int(11) DEFAULT NULL,
  `registration_ip` varchar(45) COLLATE utf8_general_ci DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `flags` int(11) NOT NULL DEFAULT 0,
  `last_login_at` int(11) DEFAULT NULL,
  `github` int(11) DEFAULT NULL,
  `line` int(11) DEFAULT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_general_ci DEFAULT NULL,
  `status` smallint(6) NOT NULL DEFAULT 10
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password_hash`, `auth_key`, `confirmed_at`, `unconfirmed_email`, `blocked_at`, `registration_ip`, `created_at`, `updated_at`, `flags`, `last_login_at`, `github`, `line`, `password_reset_token`, `status`) VALUES
(4, 'patjawat', 'patjawat@gmail.com', '$2y$12$b3GQtvwBE1tL8sy51vjbXuUDqlrOgbLpMUz5D8.13pUT5N.VZjrBW', 'aZhzNCPFprdmsJSK6x82ApR4xqhWJVxw', 1629481074, NULL, NULL, '192.168.32.1', 1629481074, 1629481074, 0, 1629482704, NULL, NULL, NULL, 10);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auth`
--
ALTER TABLE `auth`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk-auth-user_id-user-id` (`user_id`);

--
-- Indexes for table `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD PRIMARY KEY (`item_name`,`user_id`),
  ADD KEY `idx-auth_assignment-user_id` (`user_id`);

--
-- Indexes for table `auth_item`
--
ALTER TABLE `auth_item`
  ADD PRIMARY KEY (`name`),
  ADD KEY `rule_name` (`rule_name`),
  ADD KEY `idx-auth_item-type` (`type`);

--
-- Indexes for table `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD PRIMARY KEY (`parent`,`child`),
  ADD KEY `child` (`child`);

--
-- Indexes for table `auth_rule`
--
ALTER TABLE `auth_rule`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `categorise`
--
ALTER TABLE `categorise`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parent` (`parent`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `reader`
--
ALTER TABLE `reader`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social_account`
--
ALTER TABLE `social_account`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `account_unique` (`provider`,`client_id`),
  ADD UNIQUE KEY `account_unique_code` (`code`),
  ADD KEY `fk_user_account` (`user_id`);

--
-- Indexes for table `step_status`
--
ALTER TABLE `step_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `token`
--
ALTER TABLE `token`
  ADD UNIQUE KEY `token_unique` (`user_id`,`code`,`type`);

--
-- Indexes for table `tracking`
--
ALTER TABLE `tracking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tracking_position`
--
ALTER TABLE `tracking_position`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uploads`
--
ALTER TABLE `uploads`
  ADD PRIMARY KEY (`upload_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_unique_username` (`username`),
  ADD UNIQUE KEY `user_unique_email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auth`
--
ALTER TABLE `auth`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categorise`
--
ALTER TABLE `categorise`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reader`
--
ALTER TABLE `reader`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `social_account`
--
ALTER TABLE `social_account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `step_status`
--
ALTER TABLE `step_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tracking`
--
ALTER TABLE `tracking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tracking_position`
--
ALTER TABLE `tracking_position`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `uploads`
--
ALTER TABLE `uploads`
  MODIFY `upload_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `auth`
--
ALTER TABLE `auth`
  ADD CONSTRAINT `fk-auth-user_id-user-id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `auth_item`
--
ALTER TABLE `auth_item`
  ADD CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `menu` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `profile`
--
ALTER TABLE `profile`
  ADD CONSTRAINT `fk_user_profile` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `social_account`
--
ALTER TABLE `social_account`
  ADD CONSTRAINT `fk_user_account` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `token`
--
ALTER TABLE `token`
  ADD CONSTRAINT `fk_user_token` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
