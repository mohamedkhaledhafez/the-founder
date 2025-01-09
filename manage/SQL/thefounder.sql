-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2023 at 08:09 PM
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
-- Database: `thefounder`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `UserID` int(11) NOT NULL,
  `UserName` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `FullName` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `Date` date NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `role_id` bigint(20) NOT NULL,
  `active` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`UserID`, `UserName`, `Password`, `FullName`, `phone`, `Date`, `avatar`, `role_id`, `active`) VALUES
(193, 'info@ultraapps.net', '123', 'Ultra Apps', '0122435213135', '2023-06-06', 'Digital-Marketing-Experts-12-1024x536.webp', 1, 1),
(197, 'mali@gmail.com', '123', 'Mohamed Ali', '012243233414', '2023-06-09', '', 1, 1),
(200, '@gmail.comadmin', 'admin@123', 'Sara Hany', '0106415341221', '2023-11-06', 'messages-1.jpg', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `homepage_info`
--

CREATE TABLE `homepage_info` (
  `ID` int(11) NOT NULL,
  `video` varchar(255) NOT NULL,
  `announcement` text NOT NULL,
  `facebook_link` varchar(255) NOT NULL,
  `insta_link` varchar(255) NOT NULL,
  `twitter_link` varchar(255) NOT NULL,
  `youtube_link` varchar(255) NOT NULL,
  `snap_link` varchar(225) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `post_code` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `homepage_info`
--

INSERT INTO `homepage_info` (`ID`, `video`, `announcement`, `facebook_link`, `insta_link`, `twitter_link`, `youtube_link`, `snap_link`, `address`, `phone`, `email`, `post_code`) VALUES
(1, 'Expo 2023 Doha Qatar _ Promotional Video - 1of4.mp4', 'FMSystem (Facilities management system) Helps your company to manage and control the whole process in your firm including human resources ,maintenance and the financial cycle with a summary report which describes the whole business flow in your firm .', '', '', '', '', '', 'Banks Street (Hamad Al-Kabeer Street), Bin Al-Sheikh Holding Building, Fourth Floor', '+97430009765', 'info@hfmsystem.com', '12556');

-- --------------------------------------------------------

--
-- Table structure for table `logo_img`
--

CREATE TABLE `logo_img` (
  `ID` int(11) NOT NULL,
  `system_name` varchar(255) NOT NULL,
  `header_logo` varchar(255) NOT NULL,
  `footer_logo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `logo_img`
--

INSERT INTO `logo_img` (`ID`, `system_name`, `header_logo`, `footer_logo`) VALUES
(2, 'Facilities Management System', 'logo_white.png', 'logo_white.png');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `ID` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `Date` timestamp NULL DEFAULT NULL,
  `message` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`ID`, `fname`, `lname`, `email`, `phone`, `Date`, `message`) VALUES
(38, 'Mohamed', 'Khaled', 'mohamedk@gmail.com', '012323293494', '2023-11-03 05:21:14', 'رسالة ');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `New_ID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Date` date NOT NULL,
  `Description` text NOT NULL,
  `UserID` int(11) NOT NULL,
  `avatar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `perm_id` bigint(20) NOT NULL,
  `perm_desc` varchar(255) NOT NULL,
  `ordering` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`perm_id`, `perm_desc`, `ordering`) VALUES
(52, 'Permissions', 1),
(53, 'Dashboard', 2),
(54, 'Users', 3),
(56, 'Clients', 4),
(64, 'Messages', 5),
(66, 'Appointment', 9),
(69, 'Services', 6),
(70, 'Assign Services', 7),
(71, 'Invoices', 8),
(72, 'Expenses Types', 10),
(73, 'Expenses', 11),
(74, 'Salaries', 12),
(75, 'Salary Deductions', 13),
(76, 'withdrawals', 14),
(77, 'Purchases', 15),
(78, 'Expenses Report', 16),
(79, 'Salaries Report', 17);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `role_id` bigint(20) NOT NULL,
  `role_name` varchar(255) NOT NULL,
  `active` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`role_id`, `role_name`, `active`) VALUES
(1, 'Superadmin', 1),
(22, 'Barber', 1),
(23, 'Cashier', 1);

-- --------------------------------------------------------

--
-- Table structure for table `roles_permissions`
--

CREATE TABLE `roles_permissions` (
  `role_id` bigint(20) NOT NULL,
  `perm_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `roles_permissions`
--

INSERT INTO `roles_permissions` (`role_id`, `perm_id`) VALUES
(1, 52),
(1, 53),
(1, 54),
(1, 56),
(1, 64),
(1, 66),
(1, 69),
(1, 70),
(1, 71),
(1, 72),
(1, 73),
(1, 74),
(1, 75),
(1, 76),
(1, 77),
(1, 78),
(1, 79),
(23, 66),
(23, 71);

-- --------------------------------------------------------

--
-- Table structure for table `salaries`
--

CREATE TABLE `salaries` (
  `ID` int(11) NOT NULL,
  `employee` int(11) NOT NULL,
  `net_salary` varchar(100) NOT NULL,
  `deduction` varchar(100) NOT NULL,
  `Date` varchar(100) NOT NULL,
  `total_salary` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `ID` int(20) NOT NULL,
  `Name` text NOT NULL,
  `Description` text NOT NULL,
  `Cost` float NOT NULL,
  `status` varchar(100) NOT NULL,
  `Image` varchar(250) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `cat_id` int(11) NOT NULL,
  `duration` varchar(100) NOT NULL,
  `deleted` int(11) NOT NULL DEFAULT 0,
  `requested` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`ID`, `Name`, `Description`, `Cost`, `status`, `Image`, `date_created`, `cat_id`, `duration`, `deleted`, `requested`) VALUES
(4, 'Classic Haircut', 'Cut hair with scissors only in a professional way.', 70, 'Active', 'portfolio-6.jpg', '2023-06-02 18:01:13', 1, '40', 1, 0),
(5, 'Skin care', 'Cleanses the face from (impurities, blackheads, fat, unify color, lighten the skin tone, stimulate the atrophic cycle.  ', 100, 'Active', 'price-9.jpg', '2023-06-03 06:01:27', 3, '45', 0, 0),
(9, 'Keratin Treatment', 'Hair straightening treatment', 425, 'Active', '', '2023-06-04 14:23:19', 3, '45 or 60', 0, 0),
(13, 'Traditional Hot Towel Shave', '  Shaving with hot steam and hot towel', 50, 'Active', '', '2023-06-04 14:25:24', 2, '20', 0, 0),
(15, 'Colour', 'Beard coloring with a natural appearance, natural colors', 50, 'Active', '', '2023-06-04 14:26:43', 2, '20', 0, 0),
(16, 'Nose Wax', 'Pulling the hair from the nose with a wax stick.', 10, 'Active', '', '2023-06-04 14:28:21', 3, '5 min', 0, 0),
(19, 'Ear Wax', 'Ear wax', 10, 'Active', '', '2023-06-04 14:30:36', 3, '7', 0, 0),
(20, 'Under Eye Treatment', 'Under Eye Treatment', 60, 'Active', '', '2023-06-04 14:31:05', 3, '', 0, 0),
(21, 'Scalp Treatment', 'Scalp Treatment', 95, 'Active', '', '2023-06-04 14:31:46', 3, '', 0, 0),
(24, 'Babyliss & Hair dryer', 'Hair styling with an iron or blow dry, which makes your hair straight and smooth.', 60, 'Active', '', '2023-06-04 14:33:15', 1, '7  or 15', 0, 0),
(26, 'Brushing', 'A hair dryer that softens and straightens the hair', 40, 'Active', '', '2023-06-15 06:10:46', 1, '7  or 15', 0, 0),
(27, 'Scalp treatment ', 'Treatment of hair from frizz and fall due to damage to heat, dyes and protein in an incorrect way.', 150, 'Active', '', '2023-06-15 06:20:30', 10, '45 or 60', 0, 0),
(28, 'beard dryer', 'The beard dryer straightens the hair and gives it a stunning look ', 20, 'Active', '', '2023-06-15 06:31:19', 2, '7  or 15', 0, 0),
(29, 'hair cut', '.', 40, 'Active', '', '2023-06-23 19:09:36', 1, '7  or 15', 0, 0),
(30, 'Tools for use once', '.', 10, 'Active', '', '2023-07-06 19:08:52', 3, '00', 0, 0),
(31, 'wax', '.', 30, 'Active', '', '2023-07-06 19:30:33', 3, '', 0, 0),
(32, 'Scalp hair', '.', 30, 'Active', '', '2023-07-08 17:38:08', 1, '7  or 15', 0, 0),
(33, 'Very light color ', 'It started from the light bleaching color ', 700, 'Active', '', '2023-07-13 18:36:55', 3, '45 or 60', 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`UserID`),
  ADD KEY `role_id` (`role_id`);

--
-- Indexes for table `homepage_info`
--
ALTER TABLE `homepage_info`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `logo_img`
--
ALTER TABLE `logo_img`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`New_ID`),
  ADD KEY `user_1` (`UserID`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`perm_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`role_id`),
  ADD UNIQUE KEY `role_name` (`role_name`);

--
-- Indexes for table `roles_permissions`
--
ALTER TABLE `roles_permissions`
  ADD PRIMARY KEY (`role_id`,`perm_id`),
  ADD KEY `perm_id` (`perm_id`);

--
-- Indexes for table `salaries`
--
ALTER TABLE `salaries`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `employee` (`employee`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `cat_id` (`cat_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=202;

--
-- AUTO_INCREMENT for table `homepage_info`
--
ALTER TABLE `homepage_info`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `logo_img`
--
ALTER TABLE `logo_img`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `New_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `perm_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `role_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `salaries`
--
ALTER TABLE `salaries`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`role_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `user_1` FOREIGN KEY (`UserID`) REFERENCES `admin` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `roles_permissions`
--
ALTER TABLE `roles_permissions`
  ADD CONSTRAINT `roles_permissions_ibfk_1` FOREIGN KEY (`perm_id`) REFERENCES `permissions` (`perm_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `roles_permissions_ibfk_2` FOREIGN KEY (`role_id`) REFERENCES `roles` (`role_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `salaries`
--
ALTER TABLE `salaries`
  ADD CONSTRAINT `salaries_ibfk_1` FOREIGN KEY (`employee`) REFERENCES `admin` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
