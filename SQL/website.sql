-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2021 at 04:12 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `website`
--

-- --------------------------------------------------------

--
-- Table structure for table `authentication`
--

CREATE TABLE `authentication` (
  `auth_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `code` int(11) NOT NULL,
  `auth_date` date NOT NULL,
  `auth_timecreated` time NOT NULL,
  `auth_timeexpiration` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `authentication`
--

INSERT INTO `authentication` (`auth_id`, `user_id`, `code`, `auth_date`, `auth_timecreated`, `auth_timeexpiration`) VALUES
(76, 1, 328964, '2021-04-25', '08:29:57', '08:34:57'),
(77, 1, 359149, '2021-04-25', '08:31:52', '08:36:52'),
(78, 1, 523690, '2021-04-25', '08:33:14', '08:38:14'),
(79, 1, 725002, '2021-04-25', '08:34:11', '08:39:11'),
(80, 1, 366637, '2021-04-25', '08:38:57', '08:43:57'),
(81, 1, 121712, '2021-04-25', '08:39:07', '08:44:07'),
(82, 1, 870883, '2021-04-25', '08:39:26', '08:44:26'),
(83, 1, 223516, '2021-04-25', '08:44:12', '08:49:12'),
(84, 1, 983199, '2021-04-25', '08:47:37', '08:52:37'),
(85, 1, 767695, '2021-04-25', '08:53:16', '08:58:16'),
(86, 1, 792361, '2021-04-25', '09:00:55', '09:05:55'),
(87, 1, 163216, '2021-04-25', '09:09:09', '09:14:09'),
(88, 1, 386849, '2021-04-25', '09:10:16', '09:15:16'),
(89, 1, 281210, '2021-04-25', '09:11:27', '09:16:27'),
(90, 1, 805800, '2021-04-25', '09:16:04', '09:21:04'),
(91, 1, 223180, '2021-04-25', '09:16:58', '09:21:58'),
(92, 1, 337173, '2021-04-25', '09:18:08', '09:23:08'),
(93, 1, 335631, '2021-04-25', '09:19:22', '09:24:22'),
(94, 1, 625195, '2021-04-25', '09:20:50', '09:25:50'),
(95, 1, 169197, '2021-04-25', '09:21:34', '09:26:34'),
(96, 1, 380115, '2021-04-25', '09:23:16', '09:28:16'),
(97, 1, 403336, '2021-04-25', '09:32:28', '09:37:28'),
(98, 1, 360265, '2021-04-25', '09:33:24', '09:38:24'),
(99, 1, 266749, '2021-04-25', '09:34:27', '09:39:27'),
(100, 1, 426832, '2021-04-25', '09:36:34', '09:41:34'),
(101, 1, 513245, '2021-04-25', '09:38:36', '09:43:36'),
(102, 2, 936714, '2021-04-25', '09:39:19', '09:44:19'),
(103, 1, 680717, '2021-04-25', '09:42:17', '09:47:17'),
(104, 1, 824103, '2021-04-25', '10:54:53', '10:59:53'),
(105, 1, 332859, '2021-04-25', '11:05:00', '11:10:00'),
(106, 1, 222859, '2021-04-25', '11:08:32', '11:13:32'),
(107, 1, 745432, '2021-04-25', '11:33:59', '11:38:59'),
(108, 1, 740261, '2021-04-25', '11:35:16', '11:40:16'),
(109, 1, 876352, '2021-04-25', '11:36:54', '11:41:54'),
(110, 1, 256257, '2021-04-25', '11:38:29', '11:43:29'),
(111, 1, 403000, '2021-04-25', '11:39:27', '11:44:27'),
(112, 1, 521493, '2021-04-25', '11:42:04', '11:47:04'),
(113, 1, 272873, '2021-04-25', '11:43:26', '11:48:26'),
(114, 1, 677814, '2021-04-25', '11:46:32', '11:51:32'),
(115, 2, 850643, '2021-04-26', '12:05:05', '12:10:05'),
(116, 3, 670610, '2021-04-26', '12:09:57', '12:14:57'),
(117, 3, 372574, '2021-04-26', '12:13:32', '12:18:32'),
(118, 1, 540444, '2021-04-26', '06:44:58', '06:49:58'),
(119, 2, 636793, '2021-04-26', '08:14:21', '08:19:21'),
(120, 2, 184524, '2021-04-26', '08:16:20', '08:21:20'),
(121, 1, 856156, '2021-04-26', '08:19:05', '08:24:05'),
(122, 2, 747692, '2021-04-26', '08:31:39', '08:36:39'),
(123, 1, 642201, '2021-04-26', '08:32:14', '08:37:14'),
(124, 1, 310620, '2021-04-26', '08:32:37', '08:37:37'),
(125, 1, 609039, '2021-04-26', '08:48:29', '08:53:29'),
(126, 1, 323718, '2021-04-26', '08:52:53', '08:57:53'),
(127, 1, 439207, '2021-04-26', '08:54:02', '08:59:02'),
(128, 2, 956065, '2021-04-26', '08:56:06', '09:01:06'),
(129, 2, 456678, '2021-04-26', '08:57:27', '09:02:27'),
(130, 2, 543571, '2021-04-26', '09:01:52', '09:06:52'),
(131, 1, 640767, '2021-04-26', '09:03:33', '09:08:33'),
(132, 1, 842251, '2021-05-03', '10:09:42', '10:14:42');

-- --------------------------------------------------------

--
-- Table structure for table `event_log`
--

CREATE TABLE `event_log` (
  `event_id` int(11) NOT NULL,
  `activity` varchar(200) NOT NULL,
  `user_id` int(11) NOT NULL,
  `event_date` date NOT NULL,
  `event_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `event_log`
--

INSERT INTO `event_log` (`event_id`, `activity`, `user_id`, `event_date`, `event_time`) VALUES
(5, 'Login Verification', 1, '2021-04-26', '08:52:53'),
(6, 'Invalid Code', 1, '2021-04-26', '08:53:26'),
(7, 'Login Verification', 1, '2021-04-26', '08:54:02'),
(8, 'Successfully Login', 1, '2021-04-26', '08:54:17'),
(9, 'Logout', 1, '2021-04-26', '08:54:52'),
(10, 'Account Verification Code', 2, '2021-04-26', '08:56:06'),
(11, 'Invalid Code', 2, '2021-04-26', '08:56:43'),
(12, 'Account Verification Code', 2, '2021-04-26', '08:57:27'),
(13, 'Account Verified', 2, '2021-04-26', '08:57:37'),
(14, 'Changed Password', 2, '2021-04-26', '08:59:42'),
(15, 'Login Verification', 2, '2021-04-26', '09:01:52'),
(16, 'Successfully Login', 2, '2021-04-26', '09:01:59'),
(17, 'Logout', 2, '2021-04-26', '09:03:23'),
(18, 'Login Verification', 1, '2021-04-26', '09:03:33'),
(19, 'Successfully Login', 1, '2021-04-26', '09:03:39'),
(20, 'Login Verification', 1, '2021-05-03', '10:09:42'),
(21, 'Successfully Login', 1, '2021-05-03', '10:09:52'),
(22, 'Logout', 1, '2021-05-03', '10:10:06');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `u_username` varchar(200) NOT NULL,
  `u_password` varchar(200) NOT NULL,
  `u_confirmpassword` varchar(200) NOT NULL,
  `u_email` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `u_username`, `u_password`, `u_confirmpassword`, `u_email`) VALUES
(1, 'Admin', 'Admin@123', 'Admin@123', 'admin@gmail.com'),
(2, 'chino', 'Chino@1111', 'Chino@1111', 'chino@gmail.com'),
(3, 'angel', 'Angel@123', 'Angel@123', 'angel@gmail.com'),
(4, 'marie', 'Marie@123', 'Marie@123', 'marie@gmail.com'),
(5, 'bricenio', 'Bricenio@123', 'Bricenio@123', 'bricenio@gmail.com'),
(6, 'Angel1', 'Angel@123', 'Angel@123', 'angel1@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authentication`
--
ALTER TABLE `authentication`
  ADD PRIMARY KEY (`auth_id`);

--
-- Indexes for table `event_log`
--
ALTER TABLE `event_log`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `authentication`
--
ALTER TABLE `authentication`
  MODIFY `auth_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;

--
-- AUTO_INCREMENT for table `event_log`
--
ALTER TABLE `event_log`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
