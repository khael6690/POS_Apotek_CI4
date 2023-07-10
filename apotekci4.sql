-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 20, 2023 at 02:49 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `apotekci4`
--

-- --------------------------------------------------------

--
-- Table structure for table `auth_activation_attempts`
--

CREATE TABLE `auth_activation_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups`
--

CREATE TABLE `auth_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_groups`
--

INSERT INTO `auth_groups` (`id`, `name`, `description`) VALUES
(1, 'Kasir', 'Akses kasir'),
(2, 'Apoteker', 'Akses Obat'),
(3, 'Admin', 'Akses full admin');

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups_permissions`
--

CREATE TABLE `auth_groups_permissions` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_groups_permissions`
--

INSERT INTO `auth_groups_permissions` (`group_id`, `permission_id`) VALUES
(1, 5),
(1, 6),
(2, 1),
(2, 6),
(3, 1),
(3, 2),
(3, 5),
(3, 6);

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups_users`
--

CREATE TABLE `auth_groups_users` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_groups_users`
--

INSERT INTO `auth_groups_users` (`group_id`, `user_id`) VALUES
(1, 23),
(1, 24),
(2, 21),
(2, 25),
(3, 1),
(3, 26);

-- --------------------------------------------------------

--
-- Table structure for table `auth_logins`
--

CREATE TABLE `auth_logins` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `user_id` int(11) UNSIGNED DEFAULT NULL,
  `date` datetime NOT NULL,
  `success` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_logins`
--

INSERT INTO `auth_logins` (`id`, `ip_address`, `email`, `user_id`, `date`, `success`) VALUES
(1, '::1', 'umam', NULL, '2022-10-01 00:15:58', 0),
(2, '::1', 'umamjr007@gmail.com', 1, '2022-10-01 00:23:55', 1),
(3, '::1', 'umamjr007@gmail.com', 1, '2022-10-01 00:28:23', 1),
(4, '::1', 'umamjr007@gmail.com', 1, '2022-10-01 00:32:18', 1),
(5, '::1', 'umamjr007@gmail.com', 1, '2022-10-01 01:19:41', 1),
(6, '::1', 'umamjr007@gmail.com', 1, '2022-10-01 05:23:15', 1),
(7, '::1', 'umamjr007@gmail.com', 1, '2022-10-01 05:25:57', 1),
(8, '::1', 'umamjr007@gmail.com', 1, '2022-10-01 05:37:15', 1),
(9, '::1', 'umamjr007@gmail.com', 1, '2022-10-01 06:19:06', 1),
(10, '::1', 'umamjr007@gmail.com', 1, '2022-10-01 06:28:37', 1),
(11, '::1', 'khael', NULL, '2022-10-01 06:42:38', 0),
(12, '::1', 'khael', NULL, '2022-10-01 06:42:44', 0),
(13, '::1', 'khael', NULL, '2022-10-01 06:42:53', 0),
(14, '::1', 'khael', NULL, '2022-10-01 06:43:03', 0),
(15, '::1', 'umamjr007@gmail.com', 1, '2022-10-01 06:43:32', 1),
(16, '::1', 'umamjr007@gmail.com', 1, '2022-10-01 06:46:59', 1),
(17, '::1', 'umamjr007@gmail.com', 1, '2022-10-01 07:29:43', 1),
(18, '::1', 'umamjr007@gmail.com', 1, '2022-10-01 09:46:37', 1),
(19, '::1', 'umamjr007@gmail.com', 1, '2022-10-01 09:55:31', 1),
(20, '::1', 'umamjr007@gmail.com', 1, '2022-10-02 22:39:43', 1),
(21, '::1', 'umamjr007@gmail.com', 1, '2022-10-02 22:58:42', 1),
(22, '::1', 'umamjr007@gmail.com', 1, '2022-10-03 03:47:59', 1),
(23, '::1', 'umam', NULL, '2022-10-03 03:48:36', 0),
(24, '::1', 'asdsad', NULL, '2022-10-03 03:48:40', 0),
(25, '::1', 'umamjr007@gmail.com', 1, '2022-10-03 03:48:42', 1),
(26, '::1', 'umamjr007@gmail.com', 1, '2022-10-03 09:56:58', 1),
(27, '::1', 'umamjr007@gmail.com', 1, '2022-10-03 09:58:53', 1),
(28, '::1', 'umamjr007@gmail.com', 1, '2022-10-04 00:53:57', 1),
(29, '::1', 'umamjr007@gmail.com', 1, '2022-10-04 07:39:02', 1),
(30, '::1', 'umamjr007@gmail.com', 1, '2022-10-04 09:33:01', 1),
(31, '::1', 'umamjr007@gmail.com', 1, '2022-10-04 21:52:20', 1),
(32, '::1', 'umamjr007@gmail.com', 1, '2022-10-04 23:05:54', 1),
(33, '::1', 'khaeumam@mail.com', 2, '2022-10-04 23:39:12', 1),
(34, '::1', 'umamjr007@gmail.com', 1, '2022-10-05 00:29:54', 1),
(35, '::1', 'umamjr007@gmail.com', 1, '2022-10-05 00:30:04', 1),
(36, '::1', 'khael', NULL, '2022-10-05 00:30:10', 0),
(37, '::1', 'khael@a', NULL, '2022-10-05 00:30:15', 0),
(38, '::1', 'khaeumam@mail.com', 2, '2022-10-05 00:30:24', 1),
(39, '::1', 'khaeumam@mail.com', 2, '2022-10-05 00:54:05', 1),
(40, '::1', 'khaeumam@mail.com', 2, '2022-10-05 00:54:10', 1),
(41, '::1', 'khaeumam@mail.com', 2, '2022-10-05 00:57:20', 1),
(42, '::1', 'khaeumam@mail.com', 2, '2022-10-05 01:57:24', 1),
(43, '::1', 'khaeumam@mail.com', 2, '2022-10-05 23:09:06', 1),
(44, '::1', 'khaeumam@mail.com', 2, '2022-10-05 23:35:55', 1),
(45, '::1', 'khaeumam@mail.com', 2, '2022-10-06 00:56:23', 1),
(46, '::1', 'khaeumam@mail.com', 2, '2022-10-06 12:25:53', 1),
(47, '::1', 'khaeumam@mail.com', 2, '2022-10-06 14:28:58', 1),
(48, '::1', 'akuganteng@mail.com', 8, '2022-10-06 14:29:16', 1),
(49, '::1', 'umamjr007@gmail.com', 1, '2022-10-07 01:19:35', 1),
(50, '::1', 'umam', NULL, '2022-10-07 01:21:07', 0),
(51, '::1', 'umam', NULL, '2022-10-07 01:21:53', 0),
(52, '::1', 'khaeumam@mail.com', 2, '2022-10-07 01:22:19', 1),
(53, '::1', 'akuganteng@mail.com', 8, '2022-10-07 01:22:45', 1),
(54, '::1', 'umam', NULL, '2022-10-07 01:24:44', 0),
(55, '::1', 'umam', NULL, '2022-10-07 01:24:52', 0),
(56, '::1', 'akuganteng@mail.com', 8, '2022-10-07 01:24:55', 1),
(57, '::1', 'umamjr007@gmail.com', NULL, '2022-10-07 01:25:11', 0),
(58, '::1', 'akuganteng@mail.com', 8, '2022-10-07 01:25:16', 1),
(59, '::1', 'khaeumam@mail.com', 2, '2022-10-07 02:34:21', 1),
(60, '::1', 'khaeumam@mail.com', 2, '2022-10-07 02:38:09', 1),
(61, '::1', 'khaeumam@mail.com', 2, '2022-10-07 02:38:54', 1),
(62, '::1', 'akuganteng@mail.com', 8, '2022-10-07 02:39:37', 1),
(63, '::1', 'umam', NULL, '2022-10-07 02:40:07', 0),
(64, '::1', 'umamjr007@gmail.com', 1, '2022-10-07 02:40:43', 1),
(65, '::1', 'akuganteng@mail.com', 8, '2022-10-07 02:41:04', 1),
(66, '::1', 'akuganteng@mail.com', NULL, '2022-10-07 02:42:22', 0),
(67, '::1', 'khaeumam@mail.com', 2, '2022-10-07 02:42:29', 1),
(68, '::1', 'umamjr007@gmail.com', 1, '2022-10-07 02:42:58', 1),
(69, '::1', 'khaeumam@mail.com', 2, '2022-10-07 02:46:26', 1),
(70, '::1', 'akuganteng@mail.com', 8, '2022-10-07 02:46:37', 1),
(71, '::1', 'umamjr007@gmail.com', 1, '2022-10-07 02:46:45', 1),
(72, '::1', 'akuganteng@mail.com', 8, '2022-10-07 02:47:15', 1),
(73, '::1', 'umamjr007@gmail.com', 1, '2022-10-07 02:47:23', 1),
(74, '::1', 'akuganteng@mail.com', 8, '2022-10-07 03:05:19', 1),
(75, '::1', 'akuganteng@mail.com', 8, '2022-10-07 03:06:19', 1),
(76, '::1', 'umamjr007@gmail.com', 1, '2022-10-07 03:08:34', 1),
(77, '::1', 'akuganteng@mail.com', 8, '2022-10-07 03:30:12', 0),
(78, '::1', 'akuganteng@mail.com', 8, '2022-10-07 03:30:26', 0),
(79, '::1', 'umamjr007@gmail.com', 1, '2022-10-07 03:30:29', 1),
(80, '::1', 'akuganteng@mail.com', 8, '2022-10-07 03:30:56', 1),
(81, '::1', 'umamjr007@gmail.com', 1, '2022-10-07 03:31:06', 1),
(82, '::1', 'umamjr007@gmail.com', 1, '2022-10-07 08:42:19', 1),
(83, '::1', 'umamjr007@gmail.com', 1, '2022-10-08 03:41:12', 1),
(84, '::1', 'umam', NULL, '2022-10-08 05:57:37', 0),
(85, '::1', 'umam', NULL, '2022-10-08 05:57:47', 0),
(86, '::1', 'umamjr007@gmail.com', 1, '2022-10-08 05:58:04', 1),
(87, '::1', 'umamjr007@gmail.com', 1, '2022-10-08 06:00:31', 1),
(88, '::1', 'umamjr007@gmail.com', 1, '2022-10-08 06:09:18', 1),
(89, '::1', 'umam', NULL, '2022-10-08 06:09:30', 0),
(90, '::1', 'umamjr007@gmail.com', 1, '2022-10-08 06:09:32', 1),
(91, '::1', 'umamjr007@gmail.com', 1, '2022-10-08 06:11:09', 1),
(92, '::1', 'umamjr007@gmail.com', 1, '2022-10-09 08:44:40', 1),
(93, '::1', 'umamjr007@gmail.com', 1, '2022-10-10 02:01:52', 1),
(94, '::1', 'umamjr007@gmail.com', 1, '2022-10-10 22:23:57', 1),
(95, '::1', 'khael', NULL, '2022-10-11 03:07:16', 0),
(96, '::1', 'khaeumam@mail.com', 2, '2022-10-11 03:07:25', 1),
(97, '::1', 'umamjr007@gmail.com', 1, '2022-10-11 03:08:26', 1),
(98, '::1', 'khaeumam@mail.com', 2, '2022-10-11 03:08:44', 1),
(99, '::1', 'umamjr007@gmail.com', 1, '2022-10-11 03:09:04', 1),
(100, '::1', 'khaeumam@mail.com', 2, '2022-10-11 03:09:24', 1),
(101, '::1', 'khaeumam@mail.com', 2, '2022-10-11 03:09:35', 1),
(102, '::1', 'umamjr007@gmail.com', 1, '2022-10-11 03:09:40', 1),
(103, '::1', 'umamjr007@gmail.com', 1, '2022-10-11 23:41:20', 1),
(104, '::1', 'umamjr007@gmail.com', 1, '2022-10-12 07:25:38', 1),
(105, '::1', 'umamjr007@gmail.com', 1, '2022-10-12 23:09:24', 1),
(106, '::1', 'umamjr007@gmail.com', 1, '2022-10-13 09:35:18', 1),
(107, '::1', 'umamjr007@gmail.com', 1, '2022-10-14 01:28:57', 1),
(108, '::1', 'akuganteng@mail.com', 12, '2022-10-14 05:06:40', 1),
(109, '::1', 'khaeumam@mail.com', 2, '2022-10-14 05:07:53', 1),
(110, '::1', 'umamjr007@gmail.com', 1, '2022-10-14 05:23:14', 1),
(111, '::1', 'umamjr007@gmail.com', 1, '2022-10-15 11:09:27', 1),
(112, '::1', 'khaeumam@mail.com', 2, '2022-10-15 12:34:20', 1),
(113, '::1', 'umamjr007@gmail.com', 1, '2022-10-15 12:34:27', 1),
(114, '::1', 'khaeumam@mail.com', 2, '2022-10-15 12:34:47', 1),
(115, '::1', 'umamjr007@gmail.com', 1, '2022-10-15 12:35:12', 1),
(116, '::1', 'umamjr007@gmail.com', 1, '2022-10-16 00:22:17', 1),
(117, '::1', 'umamjr007@gmail.com', 1, '2022-10-16 08:34:58', 1),
(118, '::1', 'umamjr007@gmail.com', 1, '2022-10-18 05:00:29', 1),
(119, '::1', 'umamjr007@gmail.com', 1, '2022-10-18 10:17:18', 1),
(120, '::1', 'umamjr007@gmail.com', 1, '2022-10-18 10:17:54', 1),
(121, '::1', 'umamjr007@gmail.com', 1, '2022-10-18 10:33:46', 1),
(122, '::1', 'umam', NULL, '2022-10-19 01:47:13', 0),
(123, '::1', 'umam', NULL, '2022-10-19 01:47:36', 0),
(124, '::1', 'umamjr007@gmail.com', 1, '2022-10-19 01:48:13', 1),
(125, '::1', 'umamjr007@gmail.com', 1, '2022-10-20 02:08:14', 1),
(126, '::1', 'umamjr007@gmail.com', 1, '2022-10-26 03:36:44', 1),
(127, '::1', 'umamjr007@gmail.com', 1, '2022-11-01 01:31:07', 1),
(128, '::1', 'umam', NULL, '2022-11-01 02:47:44', 0),
(129, '::1', 'umamjr007@gmail.com', 1, '2022-11-01 02:47:52', 1),
(130, '::1', 'umamjr007@gmail.com', 1, '2022-11-01 03:06:24', 1),
(131, '::1', 'umam', NULL, '2022-11-01 03:20:13', 0),
(132, '::1', 'umamjr007@gmail.com', 1, '2022-11-01 03:20:22', 1),
(133, '::1', 'umam', NULL, '2022-11-01 03:28:00', 0),
(134, '::1', 'umamjr007@gmail.com', 1, '2022-11-01 03:28:08', 1),
(135, '::1', 'umam', NULL, '2022-11-01 03:32:18', 0),
(136, '::1', 'umamjr007@gmail.com', 1, '2022-11-01 03:32:22', 1),
(137, '::1', 'umamjr007@gmail.com', 1, '2022-11-01 03:45:34', 1),
(138, '::1', 'umamjr007@gmail.com', 1, '2022-11-01 03:46:45', 1),
(139, '::1', 'umamjr007@gmail.com', 1, '2022-11-04 01:27:08', 1),
(140, '::1', 'umamjr007@gmail.com', 1, '2023-05-08 08:41:55', 1),
(141, '::1', 'umamjr007@gmail.com', 1, '2023-05-09 04:03:16', 1),
(142, '::1', 'umamjr007@gmail.com', 1, '2023-05-09 08:38:25', 1),
(143, '::1', 'umamjr007@gmail.com', 1, '2023-05-10 09:43:41', 1),
(144, '::1', 'umamjr007@gmail.com', 1, '2023-05-11 06:50:05', 1),
(145, '::1', 'umamjr007@gmail.com', 1, '2023-05-19 08:15:05', 1),
(146, '::1', 'umamjr007@gmail.com', 1, '2023-05-21 09:48:47', 1),
(147, '::1', 'umamjr007@gmail.com', 1, '2023-05-22 22:33:38', 1),
(148, '::1', 'umamjr007@gmail.com', 1, '2023-05-25 09:20:42', 1),
(149, '::1', 'umamjr007@gmail.com', 1, '2023-05-27 06:34:06', 1),
(150, '::1', 'umamjr007@gmail.com', 1, '2023-05-28 06:44:06', 1),
(151, '::1', 'umamjr007@gmail.com', 1, '2023-05-29 01:33:26', 1),
(152, '::1', 'umamjr007@gmail.com', 1, '2023-05-31 10:36:57', 1),
(153, '::1', 'umamjr007@gmail.com', 1, '2023-06-01 10:08:38', 1),
(154, '::1', 'umamjr007@gmail.com', 1, '2023-06-01 21:47:23', 1),
(155, '::1', 'umamjr007@gmail.com', 1, '2023-06-02 09:55:12', 1),
(156, '::1', 'akuganteng@mail.com', 12, '2023-06-02 11:00:10', 1),
(157, '::1', 'umam', NULL, '2023-06-02 11:00:42', 0),
(158, '::1', 'umam', NULL, '2023-06-02 11:00:45', 0),
(159, '::1', 'umam', NULL, '2023-06-02 11:00:52', 0),
(160, '::1', 'umam', NULL, '2023-06-02 11:00:57', 0),
(161, '::1', 'umamjr007@gmail.com', 1, '2023-06-02 11:01:48', 1),
(162, '::1', 'admin@mail', 1, '2023-06-02 20:08:44', 1),
(163, '::1', 'admin@mail', 1, '2023-06-02 20:09:36', 1),
(164, '::1', 'admin@mail', 1, '2023-06-03 07:46:34', 1),
(165, '::1', 'admin@mail', 1, '2023-06-05 06:03:47', 1),
(166, '::1', 'admin@mail', 1, '2023-06-06 06:15:07', 1),
(167, '::1', 'admin@mail', 1, '2023-06-06 21:09:28', 1),
(168, '::1', 'admin@mail', 1, '2023-06-07 05:58:05', 1),
(169, '::1', 'admin@mail', 1, '2023-06-07 21:20:18', 1),
(170, '::1', 'admin@mail', 1, '2023-06-19 04:27:23', 1);

-- --------------------------------------------------------

--
-- Table structure for table `auth_permissions`
--

CREATE TABLE `auth_permissions` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_permissions`
--

INSERT INTO `auth_permissions` (`id`, `name`, `description`) VALUES
(1, 'management-obat', ''),
(2, 'management-user', ''),
(5, 'management-transaksi', ''),
(6, 'management-laporan', '');

-- --------------------------------------------------------

--
-- Table structure for table `auth_reset_attempts`
--

CREATE TABLE `auth_reset_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_tokens`
--

CREATE TABLE `auth_tokens` (
  `id` int(11) UNSIGNED NOT NULL,
  `selector` varchar(255) NOT NULL,
  `hashedValidator` varchar(255) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `expires` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_tokens`
--

INSERT INTO `auth_tokens` (`id`, `selector`, `hashedValidator`, `user_id`, `expires`) VALUES
(16, '302d68afdb2d18279ea4363a', 'dad9028f2739cb0c056f28d559e8d460cbfd4ed9dbfffda05c36240b6da8c86e', 1, '2023-06-12 21:20:19');

-- --------------------------------------------------------

--
-- Table structure for table `auth_users_permissions`
--

CREATE TABLE `auth_users_permissions` (
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `buy`
--

CREATE TABLE `buy` (
  `buyid` varchar(255) NOT NULL,
  `userid` int(11) DEFAULT NULL,
  `supplier` varchar(225) DEFAULT NULL,
  `discount` float NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buy`
--

INSERT INTO `buy` (`buyid`, `userid`, `supplier`, `discount`, `created_at`, `updated_at`) VALUES
('TRX-1686050433673', 1, ' umam', 0, '2023-06-06 06:21:05', '2023-06-06 06:21:05'),
('TRX-1686051064000', 1, 'alissa', 0, '2023-06-06 06:31:41', '2023-06-06 06:31:41'),
('TRX-1686051197010', 1, '', 0, '2023-06-06 06:33:52', '2023-06-06 06:33:52'),
('TRX-1686064497072', 1, '', 0, '2023-06-06 10:15:49', '2023-06-06 10:15:49'),
('TRX-1686065175052', 1, '', 0, '2023-06-06 10:26:45', '2023-06-06 10:26:45'),
('TRX-1686065527020', 1, '', 0, '2023-06-06 10:32:26', '2023-06-06 10:32:26'),
('TRX-1686065665808', 1, '', 0, '2023-06-06 10:34:37', '2023-06-06 10:34:37'),
('TRX-1686065715388', 1, ' umam', 0, '2023-06-06 10:35:38', '2023-06-06 10:35:38'),
('TRX-1686065772791', 1, ' umam', 0, '2022-06-06 10:38:37', '2023-06-06 10:38:37'),
('TRX-1686103842414', 1, 'alissa', 0, '2021-06-06 21:11:35', '2023-06-06 21:11:35'),
('TRX-1686104169001', 1, 'guest', 0, '2021-06-06 21:16:38', '2023-06-06 21:16:38'),
('TRX-1686104641419', 1, 'guest', 0, '2020-06-06 21:24:22', '2023-06-06 21:24:22'),
('TRX-1686108841152', 1, 'guest', 0, '2020-06-06 22:34:28', '2023-06-06 22:34:28');

-- --------------------------------------------------------

--
-- Table structure for table `buy_detail`
--

CREATE TABLE `buy_detail` (
  `buyid` varchar(50) NOT NULL,
  `id_obat` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `price` float NOT NULL,
  `discount` float NOT NULL,
  `total_price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buy_detail`
--

INSERT INTO `buy_detail` (`buyid`, `id_obat`, `amount`, `price`, `discount`, `total_price`) VALUES
('TRX-1686050433673', 15, 100, 3000, 0, 300000),
('TRX-1686051064000', 57, 100, 4000, 0, 400000),
('TRX-1686051197010', 17, 100, 2000, 0, 200000),
('TRX-1686064497072', 13, 17, 2000, 6800, 27200),
('TRX-1686064497072', 15, 10, 3000, 0, 30000),
('TRX-1686065175052', 13, 10, 2000, 4000, 16000),
('TRX-1686065527020', 13, 1, 2000, 400, 1600),
('TRX-1686065665808', 13, 1, 2000, 400, 1600),
('TRX-1686065715388', 13, 1, 2000, 400, 1600),
('TRX-1686065772791', 13, 1, 2000, 400, 1600),
('TRX-1686103842414', 13, 6, 2000, 2400, 9600),
('TRX-1686104169001', 13, 10, 2000, 4000, 16000),
('TRX-1686104641419', 13, 1, 2000, 400, 1600),
('TRX-1686108841152', 13, 10, 2000, 4000, 16000);

--
-- Triggers `buy_detail`
--
DELIMITER $$
CREATE TRIGGER `after buy` AFTER INSERT ON `buy_detail` FOR EACH ROW BEGIN
   UPDATE stok SET stok = stok + NEW.amount
   WHERE id_obat = NEW.id_obat;

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `telp` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `diskon` float NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `nama`, `alamat`, `telp`, `email`, `diskon`, `created_at`, `updated_at`) VALUES
(1, 'aldi', 'Jl. Kalijaga No. 116 Kec. Pegambiran. Kota Cirebon', '0871626212', 'aldi@gmail.com', 50, '2022-10-11 05:31:56', '2022-11-04 03:05:34'),
(2, 'bagong', 'Jl. Kalijaga No. 116 Kec. Pegambiran. Kota Cirebon', '02131293215', 'bagong@gmail.com', 10, '2022-10-11 05:31:56', '2022-11-04 03:05:50'),
(3, 'rayhan', 'Jl. Kalijaga No. 116 Kec. Pegambiran. Kota Cirebon', '22211', 'rayhan@gmail.com', 20, '2022-10-11 05:32:20', '2022-11-04 03:06:02'),
(10, 'amel', 'Jl. Kalijaga No. 116 Kec. Pegambiran. Kota Cirebon', '223123', 'amel@gmail.com', 10, '2022-11-04 03:07:09', '2022-11-04 03:07:09'),
(11, 'lala', 'Jl. Kalijaga No. 116 Kec. Pegambiran. Kota Cirebon', '223123', 'lala@gmail.com', 5, '2022-11-04 03:07:28', '2022-11-04 03:07:28'),
(12, 'testing', 'Jl. Testing', '+628986997966', 'testing@mail.com', 0, '2023-05-09 04:11:43', '2023-05-09 04:11:43'),
(14, 'khael', 'jl.kosong', '+6291288123', 'umamjr007@gmail.com', 0, '2023-06-06 23:48:27', '2023-06-06 23:48:27');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2017-11-20-223112', 'Myth\\Auth\\Database\\Migrations\\CreateAuthTables', 'default', 'Myth\\Auth', 1664600661, 1);

-- --------------------------------------------------------

--
-- Table structure for table `obat`
--

CREATE TABLE `obat` (
  `id_obat` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `img` varchar(255) NOT NULL DEFAULT 'default.png',
  `deskripsi` varchar(250) NOT NULL,
  `satuan` int(11) NOT NULL,
  `produsen` int(5) NOT NULL,
  `harga` double NOT NULL,
  `discount` float NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `obat`
--

INSERT INTO `obat` (`id_obat`, `nama`, `img`, `deskripsi`, `satuan`, `produsen`, `harga`, `discount`, `created_at`, `updated_at`) VALUES
(13, 'Bodrex', '1664891556_4c98679b4f749437b669.jpg', 'obat sakit kepala', 1, 5, 2000, 20, '2022-10-03 05:41:08', '2023-06-02 11:46:22'),
(15, 'Paracetamol', '1664900779_661a084bc6a787f5b734.jpeg', 'Obat pereda sakit', 2, 2, 3000, 0, '2022-10-03 09:14:10', '2022-10-20 02:52:23'),
(17, 'Ranitidin', '1664900846_0c125003cca2ce3498a6.jpg', 'asdasd', 2, 3, 2000, 0, '2022-10-03 09:16:44', '2022-10-13 11:46:52'),
(57, 'Betadine', 'default.png', '', 6, 6, 4000, 0, '2022-10-19 02:55:16', '2022-10-20 02:29:33');

--
-- Triggers `obat`
--
DELIMITER $$
CREATE TRIGGER `add stok` AFTER INSERT ON `obat` FOR EACH ROW BEGIN 
	INSERT INTO stok SET id_obat = NEW.id_obat;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `hapus stok` AFTER DELETE ON `obat` FOR EACH ROW BEGIN
DELETE FROM stok
WHERE stok.id_obat = old.id_obat;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `produsen`
--

CREATE TABLE `produsen` (
  `id_produsen` int(5) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `telp` varchar(20) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produsen`
--

INSERT INTO `produsen` (`id_produsen`, `nama`, `alamat`, `telp`, `created_at`, `updated_at`) VALUES
(2, 'Sanbe Farma', 'Jln . Leuwi Gajah no 50 cimahi selatan', '07771', NULL, '2022-10-04 22:53:23'),
(3, 'Novartis', 'Jl. Kalijaga No.111 Kota cirebon', '444444', NULL, '2022-10-04 22:53:36'),
(4, 'Dexa Medica', 'Jl. ABC', '222222', '2022-10-04 18:41:00', '2022-10-04 22:54:40'),
(5, 'Kalbe farma', 'jl. kalbe farma', '+629381293912', '2022-10-04 18:41:19', '2023-05-09 09:13:14'),
(6, 'Biofarma', 'jl. Biofarma', '+629123771723', '2022-10-04 18:41:19', '2023-05-09 09:13:35');

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `kota` varchar(255) NOT NULL,
  `telp` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `logo` varchar(200) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`id`, `nama`, `alamat`, `kota`, `telp`, `email`, `logo`, `created_at`, `updated_at`) VALUES
(191, 'SI Ponit Of Sale', 'JL. Merdeka No.50, Kec. Pegambiran', 'Kota Cirebon', '08716262122', 'SistemInformasiPOS@mail.com', 'AdminLTELogo.png', '2022-10-15 23:54:45', '2023-06-07 23:52:46');

-- --------------------------------------------------------

--
-- Table structure for table `sale`
--

CREATE TABLE `sale` (
  `sale_id` varchar(50) NOT NULL,
  `userid` int(11) NOT NULL,
  `customerid` int(11) DEFAULT NULL,
  `discount` float NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sale`
--

INSERT INTO `sale` (`sale_id`, `userid`, `customerid`, `discount`, `created_at`, `updated_at`) VALUES
('TRX-1683628713872', 1, 12, 0, '2022-05-09 05:38:53', '2023-05-09 05:38:53'),
('TRX-1683628742233', 1, 1, 50, '2021-05-09 05:39:23', '2023-05-09 05:39:23'),
('TRX-1683641163492', 1, 12, 0, '2020-05-09 09:06:18', '2023-05-09 09:06:18'),
('TRX-1683641243470', 1, 12, 0, '2020-05-09 09:07:45', '2023-05-09 09:07:45'),
('TRX-1683641306215', 1, 3, 20, '2023-05-09 09:08:41', '2023-05-09 09:08:41'),
('TRX-1684502748567', 1, 0, 0, '2023-05-19 08:26:10', '2023-05-19 08:26:10'),
('TRX-1684503220278', 1, 12, 0, '2023-05-19 08:34:12', '2023-05-19 08:34:12'),
('TRX-1684503450289', 1, 0, 0, '2023-05-19 08:37:42', '2023-05-19 08:37:42'),
('TRX-1685342703633', 1, 11, 5, '2023-05-29 01:45:30', '2023-05-29 01:45:30'),
('TRX-1685342925435', 1, 0, 0, '2023-05-29 01:49:05', '2023-05-29 01:49:05'),
('TRX-1685343232981', 1, 0, 0, '2023-05-29 01:54:28', '2023-05-29 01:54:28'),
('TRX-1685343377012', 1, 0, 0, '2023-05-29 01:56:36', '2023-05-29 01:56:36'),
('TRX-1685343442036', 1, 0, 0, '2023-05-29 01:57:39', '2023-05-29 01:57:39'),
('TRX-1686112734820', 1, 0, 0, '2023-06-06 23:39:07', '2023-06-06 23:39:07'),
('TRX-1686113121627', 1, 0, 0, '2023-06-06 23:45:53', '2023-06-06 23:45:53'),
('TRX-1686113319951', 1, 0, 0, '2023-06-06 23:49:00', '2023-06-06 23:49:00'),
('TRX-1686113683604', 1, 14, 0, '2023-06-06 23:55:13', '2023-06-06 23:55:13');

-- --------------------------------------------------------

--
-- Table structure for table `sale_detail`
--

CREATE TABLE `sale_detail` (
  `sale_id` varchar(50) NOT NULL,
  `id_obat` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `price` float NOT NULL,
  `discount` float NOT NULL,
  `total_price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sale_detail`
--

INSERT INTO `sale_detail` (`sale_id`, `id_obat`, `amount`, `price`, `discount`, `total_price`) VALUES
('TRX-1683628713872', 13, 1, 2000, 400, 1600),
('TRX-1683628713872', 17, 1, 2000, 0, 2000),
('TRX-1683628742233', 57, 1, 4000, 0, 4000),
('TRX-1683641163492', 57, 1, 4000, 0, 4000),
('TRX-1683641243470', 57, 4, 4000, 0, 16000),
('TRX-1683641306215', 57, 1, 4000, 0, 4000),
('TRX-1684502748567', 13, 1, 2000, 400, 1600),
('TRX-1684503220278', 74, 2, 2000, 0, 4000),
('TRX-1684503450289', 74, 1, 2000, 0, 2000),
('TRX-1685342703633', 13, 1, 2000, 400, 1600),
('TRX-1685342703633', 17, 1, 2000, 0, 2000),
('TRX-1685342925435', 57, 5, 4000, 0, 20000),
('TRX-1685343232981', 57, 5, 4000, 0, 20000),
('TRX-1685343377012', 17, 8, 2000, 0, 16000),
('TRX-1685343442036', 15, 9, 3000, 0, 27000),
('TRX-1686112734820', 13, 1, 2000, 400, 1600),
('TRX-1686113121627', 13, 10, 2000, 4000, 16000),
('TRX-1686113319951', 57, 75, 4000, 0, 300000),
('TRX-1686113683604', 17, 10, 2000, 0, 20000);

--
-- Triggers `sale_detail`
--
DELIMITER $$
CREATE TRIGGER `after add trans` AFTER INSERT ON `sale_detail` FOR EACH ROW BEGIN
   UPDATE stok SET stok = stok - NEW.amount
 
   WHERE id_obat = NEW.id_obat;

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `satuan`
--

CREATE TABLE `satuan` (
  `id` int(255) NOT NULL,
  `satuan` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `satuan`
--

INSERT INTO `satuan` (`id`, `satuan`, `created_at`, `updated_at`) VALUES
(1, 'box', '2022-10-04 15:59:11', '2022-10-04 15:59:11'),
(3, 'buah', '2022-10-04 15:59:26', '2022-10-04 15:59:26'),
(4, 'lusin', '2022-10-04 15:59:26', '2022-10-04 15:59:26'),
(5, 'sachet', '2022-10-04 16:03:41', '2022-10-04 16:03:41'),
(6, 'botol', '2022-10-04 12:04:32', '2022-10-06 13:23:52');

-- --------------------------------------------------------

--
-- Table structure for table `stok`
--

CREATE TABLE `stok` (
  `id_obat` int(11) NOT NULL,
  `stok` float NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stok`
--

INSERT INTO `stok` (`id_obat`, `stok`, `created_at`, `updated_at`) VALUES
(13, 100, '2022-10-16 16:56:49', '2022-10-16 16:56:49'),
(15, 150, '2022-10-16 16:56:49', '2022-10-16 16:56:49'),
(17, 150, '2022-10-16 16:56:49', '2022-10-16 16:56:49'),
(57, 100, '2022-10-19 14:55:16', '2022-10-19 14:55:16');

-- --------------------------------------------------------

--
-- Table structure for table `stok_opname`
--

CREATE TABLE `stok_opname` (
  `id_opname` int(11) NOT NULL,
  `id_obat` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stok_opname`
--

INSERT INTO `stok_opname` (`id_opname`, `id_obat`, `jumlah`, `keterangan`, `created_at`, `updated_at`) VALUES
(3, 57, 3, 'hilang', '2023-05-28 06:49:48', '2023-05-29 04:12:55'),
(5, 57, 5, 'kadaluarsa', '2023-05-29 04:18:47', '2023-06-08 00:56:54'),
(10, 17, 10, 'test', '2023-06-08 01:07:07', '2023-06-08 01:07:07'),
(11, 13, 45, 'test', '2023-06-08 01:10:01', '2023-06-08 01:10:01');

--
-- Triggers `stok_opname`
--
DELIMITER $$
CREATE TRIGGER `after add opname` AFTER INSERT ON `stok_opname` FOR EACH ROW BEGIN
   UPDATE stok SET stok = stok - NEW.jumlah
 
   WHERE id_obat = NEW.id_obat;

END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `after delete opname` AFTER DELETE ON `stok_opname` FOR EACH ROW BEGIN
   UPDATE stok SET stok = stok + OLD.jumlah
 
   WHERE id_obat = OLD.id_obat;

END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `after update` AFTER UPDATE ON `stok_opname` FOR EACH ROW BEGIN
   UPDATE stok SET stok = (stok + OLD.jumlah) - NEW.jumlah
 
   WHERE id_obat = OLD.id_obat;

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `username` varchar(30) DEFAULT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `user_image` varchar(255) NOT NULL DEFAULT 'default.png',
  `password_hash` varchar(255) NOT NULL,
  `reset_hash` varchar(255) DEFAULT NULL,
  `reset_at` datetime DEFAULT NULL,
  `reset_expires` datetime DEFAULT NULL,
  `activate_hash` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `status_message` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `force_pass_reset` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `fullname`, `user_image`, `password_hash`, `reset_hash`, `reset_at`, `reset_expires`, `activate_hash`, `status`, `status_message`, `active`, `force_pass_reset`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'admin@mail', 'umam', 'khaerul umam', '1685775502_b73b41c4d9e2d34f97e4.jpg', '$2y$10$o.yg11AVfyyAQXeFZyNg5OFglnYFX3xPcWrINAIDzprGKv6vPOC4q', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2022-10-01 00:16:16', '2023-06-07 22:48:12', NULL),
(21, 'apoteker@mail', 'apoteker', 'apoteker', 'default.png', '$2y$10$MYUQzz0PSy.SP0hu9foCi.EsI1N8RikPZ0e0IN1nCe/cI0qfcu0F.', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2023-06-02 11:09:35', '2023-06-02 11:09:35', NULL),
(23, 'kasir@mail', 'kasir', 'kasir1', 'default.png', '$2y$10$hLeImUbXXE12ykdyrv86gOKZtfw81hTHSJObzaZZEGDe/VlSLC7oK', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2023-06-02 11:25:23', '2023-06-02 11:25:23', NULL),
(24, 'kasir2@mail', 'kasir2', 'kasir2', 'default.png', '$2y$10$7DtT0oPcm8BlqeFauv0N/.VS4oWJPasAV6NtYxJjfYfRjcQRUrnTS', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2023-06-02 11:26:09', '2023-06-02 11:28:15', NULL),
(25, 'apoteker2@mail', 'apoteker2', 'apoteker2', 'default.png', '$2y$10$g/Nuvc1E2RIXvZCF0ZpAPewaR3Wz7GnAkRJICcLGlbrON/wuYWO4a', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2023-06-02 11:27:48', '2023-06-02 11:27:48', NULL),
(26, 'admin2@mail', 'admin2', 'admin2', 'default.png', '$2y$10$5B43HTvO8t9ujimtQaMSTefgT15hGF4vzZ4f2oQ6IbJ.d1rqMdnHu', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2023-06-02 11:39:17', '2023-06-03 03:30:35', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_groups`
--
ALTER TABLE `auth_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD KEY `auth_groups_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `group_id_permission_id` (`group_id`,`permission_id`);

--
-- Indexes for table `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD KEY `auth_groups_users_user_id_foreign` (`user_id`),
  ADD KEY `group_id_user_id` (`group_id`,`user_id`);

--
-- Indexes for table `auth_logins`
--
ALTER TABLE `auth_logins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `auth_permissions`
--
ALTER TABLE `auth_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auth_tokens_user_id_foreign` (`user_id`),
  ADD KEY `selector` (`selector`);

--
-- Indexes for table `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD KEY `auth_users_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `user_id_permission_id` (`user_id`,`permission_id`);

--
-- Indexes for table `buy`
--
ALTER TABLE `buy`
  ADD PRIMARY KEY (`buyid`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`id_obat`);

--
-- Indexes for table `produsen`
--
ALTER TABLE `produsen`
  ADD PRIMARY KEY (`id_produsen`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sale`
--
ALTER TABLE `sale`
  ADD PRIMARY KEY (`sale_id`);

--
-- Indexes for table `satuan`
--
ALTER TABLE `satuan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stok`
--
ALTER TABLE `stok`
  ADD KEY `id_obat` (`id_obat`);

--
-- Indexes for table `stok_opname`
--
ALTER TABLE `stok_opname`
  ADD PRIMARY KEY (`id_opname`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auth_groups`
--
ALTER TABLE `auth_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `auth_logins`
--
ALTER TABLE `auth_logins`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=171;

--
-- AUTO_INCREMENT for table `auth_permissions`
--
ALTER TABLE `auth_permissions`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `obat`
--
ALTER TABLE `obat`
  MODIFY `id_obat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `produsen`
--
ALTER TABLE `produsen`
  MODIFY `id_produsen` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=198;

--
-- AUTO_INCREMENT for table `satuan`
--
ALTER TABLE `satuan`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `stok_opname`
--
ALTER TABLE `stok_opname`
  MODIFY `id_opname` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD CONSTRAINT `auth_groups_permissions_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD CONSTRAINT `auth_groups_users_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD CONSTRAINT `auth_tokens_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD CONSTRAINT `auth_users_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_users_permissions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `stok`
--
ALTER TABLE `stok`
  ADD CONSTRAINT `stok_ibfk_1` FOREIGN KEY (`id_obat`) REFERENCES `obat` (`id_obat`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
