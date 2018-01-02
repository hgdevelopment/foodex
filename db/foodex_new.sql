-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 02, 2018 at 09:33 AM
-- Server version: 5.7.20-0ubuntu0.16.04.1
-- PHP Version: 7.0.22-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `foodex_new`
--

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE `branches` (
  `id` int(10) NOT NULL,
  `branch_name` varchar(100) NOT NULL,
  `gst_no` varchar(250) NOT NULL,
  `address` text NOT NULL,
  `pin_number` int(200) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`id`, `branch_name`, `gst_no`, `address`, `pin_number`, `phone_number`, `created_at`, `updated_at`) VALUES
(1, 'hyderabad', 'cdd563576576hgfhgf', 'dfdgf', 56565, '4625', '2017-12-18 10:12:52', '2017-12-18 10:12:52'),
(2, 'bangalore', 'cdd563576576hgfhgf', '565465', 65465, '565', '2017-12-18 10:13:01', '2017-12-18 10:13:01'),
(3, 'mira road', 'cdd563576576hgfhgf', 'were', 76, '767', '2017-12-18 10:13:19', '2017-12-18 10:13:19'),
(4, 'CBd Belapur', 'cdd563576576hgfhgf', 'ewrqewr', 454, '566', '2017-12-18 10:13:48', '2017-12-18 10:13:48');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(11) NOT NULL,
  `brand_name` varchar(200) NOT NULL,
  `brand_description` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `brand_name`, `brand_description`, `created_at`, `updated_at`) VALUES
(4, 'Heera', 'heera', '2018-01-01 17:12:29', '2018-01-01 17:12:45');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `customer_name` varchar(100) DEFAULT NULL,
  `customer_phone` varchar(20) DEFAULT NULL,
  `customer_address` text,
  `shipping_address` text,
  `customer_gst` varchar(250) DEFAULT NULL,
  `addedById` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `branch_id`, `customer_name`, `customer_phone`, `customer_address`, `shipping_address`, `customer_gst`, `addedById`, `created_at`, `updated_at`) VALUES
(1, 1, 'Inthiyas B', '0000000234', 'HS Residency', 'Hyderabad', '12054628745211', 18, '2017-12-22 17:01:37', '2017-12-22 17:01:37');

-- --------------------------------------------------------

--
-- Table structure for table `damages`
--

CREATE TABLE `damages` (
  `id` int(11) NOT NULL,
  `batch_no` varchar(50) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `added_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `damages`
--

INSERT INTO `damages` (`id`, `batch_no`, `branch_id`, `created_at`, `updated_at`, `added_by`) VALUES
(1, '0000000001', 1, '2017-12-19 17:18:59', '2017-12-19 17:18:59', 18);

-- --------------------------------------------------------

--
-- Table structure for table `damage_products`
--

CREATE TABLE `damage_products` (
  `id` int(11) NOT NULL,
  `damage_id` int(11) NOT NULL,
  `batch_id` int(11) NOT NULL,
  `branch_id` int(225) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_qty` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `damage_products`
--

INSERT INTO `damage_products` (`id`, `damage_id`, `batch_id`, `branch_id`, `product_id`, `product_qty`, `created_at`, `updated_at`) VALUES
(1, 1, 5, 1, 5, 5, '2017-12-19 17:18:59', '2017-12-19 17:18:59');

-- --------------------------------------------------------

--
-- Table structure for table `logins`
--

CREATE TABLE `logins` (
  `id` int(10) UNSIGNED NOT NULL,
  `employee_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `userType` enum('OI','SE','RE','VN') COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `branch` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `logins`
--

INSERT INTO `logins` (`id`, `employee_name`, `username`, `password`, `userType`, `remember_token`, `created_at`, `updated_at`, `branch`) VALUES
(1, 'admin11', 'admin1', '$2y$10$Vgkj/X6kP5yVcAoJKec74OSnekd50mNqb5WpZajQHRcSnvf8lyt12', 'OI', 'O9IdOrtxCJy3glUN9olGr65jAb4W7lNXX88XOudmZQXzWK1QzsowO1M1C8mN', '2017-12-18 00:00:00', '2017-12-18 00:00:00', 1),
(14, 'priya', '689', '$2y$10$hWcSS4M77pxIu.jOMsgbIeasZCdH7orS5CgKGr9rFt09vuqqaSaru', 'SE', '1g6x2SrwiYYQ9QJxQrfFUXeWmTWH87aYn14E6HtWYlAP33S4Ye5gLnLckquL', '2017-12-18 10:31:46', '2017-12-18 10:31:46', 1),
(15, 'test', 're', '$2y$10$mGf4A/VcQHoJ.Aj3t1LiVeOwGMphLRqZRA7X0iWQ6s0jaQljb2uFe', 'RE', '5sTtXAobkWm2HAMCVAk6sbOJu9gc2rcJ67UXSbvyDooztvPlY1cV1eA7MVZk', '2017-12-18 10:32:38', '2017-12-18 10:32:38', 1),
(16, 'verification', 'vf', '$2y$10$uMzse8A/t4/PToUIEtBp5eUQtIxSOiWHC7NyKCve64MJ9dfs6Ks1m', 'VN', 'NbtPAIJpcdp1A4ZwJrvtBMRmzGWIXwZB4ntrK9EK34H03yP5ydunrvObVb6I', '2017-12-18 10:33:08', '2017-12-18 10:33:08', 1),
(17, 'verification', 'vfx', 'teDYnXB7aNxJ.', 'VN', NULL, '2017-12-18 10:33:08', '2017-12-18 10:33:08', 1),
(18, 'admin', 'admin', '$2y$10$V4Wa69Ijl9Mln0yfklhyM.XVgIwVYQMTwJP.XiNiGJk/mmr2xNmee', 'OI', 'tVENO97ifLjreCocXWfsN8CJMqkXrJzhruLvHbQiSyvteEf7XxYerHl4bZBj', '2017-12-19 11:19:04', '2017-12-19 11:19:04', 1);

-- --------------------------------------------------------

--
-- Table structure for table `log_reports`
--

CREATE TABLE `log_reports` (
  `id` int(11) NOT NULL,
  `ip_address` varchar(50) DEFAULT NULL,
  `user` varchar(50) DEFAULT NULL,
  `type` varchar(225) DEFAULT NULL,
  `actions` text,
  `branch_id` int(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `log_reports`
--

INSERT INTO `log_reports` (`id`, `ip_address`, `user`, `type`, `actions`, `branch_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '183.82.3.119', '1', 'Login ', 'admin is login', 1, '2017-12-19 10:09:05', '2017-12-19 10:09:05', NULL),
(2, '183.82.3.119', '1', 'Brand', 'Add New Brand: heera brand', 1, '2017-12-19 10:09:52', '2017-12-19 10:09:52', NULL),
(3, '183.82.3.119', '1', 'Brand', 'Edit & Updated  Brand: heera brandee', 1, '2017-12-19 10:09:59', '2017-12-19 10:09:59', NULL),
(4, '183.82.3.119', '1', 'Brand', 'Deleted Brand: heera brandee', 1, '2017-12-19 10:10:04', '2017-12-19 10:10:04', NULL),
(5, '183.82.3.119', '1', 'Product', 'Add New Product .Product Name: test product', 1, '2017-12-19 10:10:36', '2017-12-19 10:10:36', NULL),
(6, '183.82.3.119', '1', 'Product', 'Deleted  Product .Product Name: test product', 1, '2017-12-19 10:10:50', '2017-12-19 10:10:50', NULL),
(7, '183.82.3.119', '1', 'Product', 'Add New Product .Product Name: test product', 1, '2017-12-19 10:11:23', '2017-12-19 10:11:23', NULL),
(8, '183.82.3.119', '1', 'Product', 'Edit & Updated Product .Product Name: test product5', 1, '2017-12-19 10:11:44', '2017-12-19 10:11:44', NULL),
(9, '183.82.3.119', '1', 'Product', 'Deleted  Product .Product Name: test product5', 1, '2017-12-19 10:11:55', '2017-12-19 10:11:55', NULL),
(10, '183.82.3.119', '1', 'Stock', 'Add New Stock.Product Name: {"product_name":"Heera Ground Nut 20kg"}', 1, '2017-12-19 10:12:19', '2017-12-19 10:12:19', NULL),
(11, '183.82.3.119', '1', 'Order Request', 'New Order Reqquest .Bill Number: 00000001', 1, '2017-12-19 10:13:57', '2017-12-19 10:13:57', NULL),
(12, '183.82.3.119', '1', 'Order Request', 'Deleted Order Request Product. Deleted Id: 1', 1, '2017-12-19 10:14:10', '2017-12-19 10:14:10', NULL),
(13, '183.82.3.119', '1', 'Order Request', 'Update New Product In Order Request .Bill Number: 00000001Added Product: Heera Basmati Rice 1kg', 1, '2017-12-19 10:14:21', '2017-12-19 10:14:21', NULL),
(14, '183.82.3.119', '1', 'Order Request', 'Update New Product In Order Request .Bill Number: 00000001Added Product: Heera Basmati Rice 5kg', 1, '2017-12-19 10:14:44', '2017-12-19 10:14:44', NULL),
(15, '183.82.3.119', '1', 'Order Request', 'Update Amount & Customer Details .Bill Number: 00000001', 1, '2017-12-19 10:15:03', '2017-12-19 10:15:03', NULL),
(16, '183.82.3.119', '1', 'Order Request', 'New Order Reqquest .Bill Number: 00000002', 1, '2017-12-19 10:15:35', '2017-12-19 10:15:35', NULL),
(17, '183.82.3.119', '1', 'Order Request', 'Deleted Order Request Product. Deleted Id: 4', 1, '2017-12-19 10:15:43', '2017-12-19 10:15:43', NULL),
(18, '183.82.3.119', '1', 'Order Request', 'Update New Product In Order Request .Bill Number: 00000002Added Product: Heera Basmati Rice 5kg', 1, '2017-12-19 10:16:04', '2017-12-19 10:16:04', NULL),
(19, '183.82.3.119', '1', 'Order Request', 'Deleted Order Request Product. Deleted Id: 5', 1, '2017-12-19 10:32:59', '2017-12-19 10:32:59', NULL),
(20, '183.82.3.119', '1', 'Order Request', 'Update New Product In Order Request .Bill Number: 00000002Added Product: Heera Basmati Rice 5kg', 1, '2017-12-19 10:33:09', '2017-12-19 10:33:09', NULL),
(21, '183.82.3.119', '1', 'Order Request', 'Update Amount & Customer Details .Bill Number: 00000002', 1, '2017-12-19 10:33:19', '2017-12-19 10:33:19', NULL),
(22, '183.82.3.119', '1', 'Order Request', 'Confirm Order Request .Bill Number: 00000001', 1, '2017-12-19 10:36:36', '2017-12-19 10:36:36', NULL),
(23, '183.82.3.119', '1', 'Order Request', 'Confirm Order Request .Bill Number: 00000002', 1, '2017-12-19 10:36:39', '2017-12-19 10:36:39', NULL),
(24, '183.82.3.119', '1', 'Sales ', 'product Sales & Take Print In Bill . Billnumber: 00000001', 1, '2017-12-19 10:36:50', '2017-12-19 10:36:50', NULL),
(25, '183.82.3.119', '1', 'Sales  Request', 'New Sales Reqquest .Bill Number: 00000003', 1, '2017-12-19 10:37:18', '2017-12-19 10:37:18', NULL),
(26, '183.82.3.119', '1', 'Sales ', 'product Sales & Take Print In Bill . Billnumber: 00000003', 1, '2017-12-19 10:37:33', '2017-12-19 10:37:33', NULL),
(27, '183.82.3.119', '1', 'sales Request', 'Deleted Sales Request Product. Deleted Id: 6', 1, '2017-12-19 10:37:46', '2017-12-19 10:37:46', NULL),
(28, '183.82.3.119', '1', 'Sales Request', 'Update New Product In Sales Request .Bill Number: 00000002Added Product: Heera Moong Dal 500g', 1, '2017-12-19 10:37:58', '2017-12-19 10:37:58', NULL),
(29, '183.82.3.119', '1', 'sales Request', 'Deleted Sales Request Product. Deleted Id: 8', 1, '2017-12-19 10:40:46', '2017-12-19 10:40:46', NULL),
(30, '183.82.3.119', '1', 'Sales Request', 'Update New Product In Sales Request .Bill Number: 00000002Added Product: Heera Chana Dal 500g', 1, '2017-12-19 10:41:02', '2017-12-19 10:41:02', NULL),
(31, '183.82.3.119', '1', 'Sales Request', 'Update Amount & Customer Details .Bill Number: 00000002', 1, '2017-12-19 10:41:12', '2017-12-19 10:41:12', NULL),
(32, '183.82.3.119', '1', 'Sales ', 'product Sales & Take Print In Bill . Billnumber: 00000002', 1, '2017-12-19 10:41:15', '2017-12-19 10:41:15', NULL),
(33, '183.82.3.119', '1', 'Sales  Request', 'New Sales Reqquest .Bill Number: 00000004', 1, '2017-12-19 10:41:38', '2017-12-19 10:41:38', NULL),
(34, '183.82.3.119', '1', 'Credit', 'Update Credit Or Partial Paid  Amount .Bill Number: ', 1, '2017-12-19 11:10:33', '2017-12-19 11:10:33', NULL),
(35, '183.82.3.119', '1', 'Exchange', 'Return Sales Product . Sales Id: 3', 1, '2017-12-19 11:11:13', '2017-12-19 11:11:13', NULL),
(36, '183.82.3.119', '1', 'Exchange', 'Update Amount & Customer Details In Exchange Bill .Bill Number: 00000001', 1, '2017-12-19 11:11:23', '2017-12-19 11:11:23', NULL),
(37, '183.82.3.119', '1', 'Sales ', 'product Sales & Take Print In Bill . Billnumber: 00000001', 1, '2017-12-19 11:11:31', '2017-12-19 11:11:31', NULL),
(38, '183.82.3.119', '1', 'Login ', 'admin is login', 1, '2017-12-19 11:15:07', '2017-12-19 11:15:07', NULL),
(39, '183.82.3.119', '1', 'User ', 'Edit & Update User Details .username: admin', 1, '2017-12-19 11:15:38', '2017-12-19 11:15:38', NULL),
(40, '183.82.3.119', '1', 'Login ', 'admin11 is login', 1, '2017-12-19 11:18:41', '2017-12-19 11:18:41', NULL),
(41, '183.82.3.119', '1', 'User ', 'Add New User .username: admin', 1, '2017-12-19 11:19:04', '2017-12-19 11:19:04', NULL),
(42, '183.82.3.119', '1', 'User ', 'Edit & Update User Details .username: admin', 1, '2017-12-19 11:19:42', '2017-12-19 11:19:42', NULL),
(43, '183.82.3.119', '14', 'Login ', 'priya is login', 1, '2017-12-19 11:20:15', '2017-12-19 11:20:15', NULL),
(44, '183.82.3.119', '15', 'Login ', 'test is login', 1, '2017-12-19 11:21:58', '2017-12-19 11:21:58', NULL),
(45, '183.82.3.119', '14', 'Login ', 'priya is login', 1, '2017-12-19 11:23:11', '2017-12-19 11:23:11', NULL),
(46, '183.82.3.119', '16', 'Login ', 'verification is login', 1, '2017-12-19 11:25:25', '2017-12-19 11:25:25', NULL),
(47, '183.82.3.119', '1', 'Login ', 'admin11 is login', 1, '2017-12-19 11:26:26', '2017-12-19 11:26:26', NULL),
(48, '183.82.3.119', '16', 'Login ', 'verification is login', 1, '2017-12-19 11:33:24', '2017-12-19 11:33:24', NULL),
(49, '183.82.3.119', '18', 'Login ', 'admin is login', 1, '2017-12-19 11:43:19', '2017-12-19 11:43:19', NULL),
(50, '183.82.3.119', '18', 'Login ', 'admin is login', 1, '2017-12-19 12:23:11', '2017-12-19 12:23:11', NULL),
(51, '183.82.3.119', '16', 'Login ', 'verification is login', 1, '2017-12-19 12:23:33', '2017-12-19 12:23:33', NULL),
(52, '183.82.3.119', '14', 'Login ', 'priya is login', 1, '2017-12-19 12:23:45', '2017-12-19 12:23:45', NULL),
(53, '183.82.3.119', '14', 'Login ', 'priya is login', 1, '2017-12-19 12:27:03', '2017-12-19 12:27:03', NULL),
(54, '183.82.3.119', '14', 'Login ', 'priya is login', 1, '2017-12-19 12:34:52', '2017-12-19 12:34:52', NULL),
(55, '183.82.3.119', '14', 'Login ', 'priya is login', 1, '2017-12-19 12:36:33', '2017-12-19 12:36:33', NULL),
(56, '183.82.3.119', '14', 'Login ', 'priya is login', 1, '2017-12-19 12:42:44', '2017-12-19 12:42:44', NULL),
(57, '183.82.3.119', '18', 'Login ', 'admin is login', 1, '2017-12-19 12:44:20', '2017-12-19 12:44:20', NULL),
(58, '183.82.3.119', '14', 'Login ', 'priya is login', 1, '2017-12-19 12:56:05', '2017-12-19 12:56:05', NULL),
(59, '183.82.3.119', '18', 'Login ', 'admin is login', 1, '2017-12-19 12:56:11', '2017-12-19 12:56:11', NULL),
(60, '183.82.3.119', '18', 'Login ', 'admin is login', 1, '2017-12-19 12:56:28', '2017-12-19 12:56:28', NULL),
(61, '183.82.3.255', '18', 'Login ', 'admin is login', 1, '2017-12-19 14:30:37', '2017-12-19 14:30:37', NULL),
(62, '183.82.3.255', '18', 'Login ', 'admin is login', 1, '2017-12-19 16:57:42', '2017-12-19 16:57:42', NULL),
(63, '183.82.118.72', '18', 'Login ', 'admin is login', 1, '2017-12-19 16:58:26', '2017-12-19 16:58:26', NULL),
(64, '111.93.30.26', '18', 'Login ', 'admin is login', 1, '2017-12-19 17:02:45', '2017-12-19 17:02:45', NULL),
(65, '111.93.30.26', '18', 'Login ', 'admin is login', 1, '2017-12-19 17:13:10', '2017-12-19 17:13:10', NULL),
(66, '183.82.3.255', '18', 'Stock Request', 'Add New Stock Request.To: 2', 1, '2017-12-19 17:13:58', '2017-12-19 17:13:58', NULL),
(67, '183.82.3.255', '18', 'Stock Request', 'Add New Stock Request.To: 2', 1, '2017-12-19 17:13:58', '2017-12-19 17:13:58', NULL),
(68, '183.82.118.72', '18', 'Product', 'Edit & Updated Product .Product Name: Heera Basmati Rice 1kg', 1, '2017-12-19 17:15:40', '2017-12-19 17:15:40', NULL),
(69, '183.82.118.72', '18', 'Product', 'Edit & Updated Product .Product Name: Heera Basmati Rice 1kg', 1, '2017-12-19 17:15:55', '2017-12-19 17:15:55', NULL),
(70, '111.93.30.26', '18', 'Order Request', 'New Order Reqquest .Bill Number: 00000001', 1, '2017-12-19 17:16:32', '2017-12-19 17:16:32', NULL),
(71, '111.93.30.26', '18', 'Damaged Products', 'Damaged Products .Product Name: Heera Chana Dal 500g', 1, '2017-12-19 17:18:59', '2017-12-19 17:18:59', NULL),
(72, '183.82.118.72', '18', 'Order Request', 'New Order Reqquest .Bill Number: 00000002', 1, '2017-12-19 17:20:03', '2017-12-19 17:20:03', NULL),
(73, '111.93.30.26', '18', 'Sales  Request', 'New Sales Reqquest .Bill Number: 00000002', 1, '2017-12-19 17:20:05', '2017-12-19 17:20:05', NULL),
(74, '111.93.30.26', '18', 'Order Request', 'Update New Product In Order Request .Bill Number: 00000002Added Product: Heera Basmati Rice 1kg', 1, '2017-12-19 17:20:37', '2017-12-19 17:20:37', NULL),
(75, '111.93.30.26', '18', 'Order Request', 'Update Amount & Customer Details .Bill Number: 00000002', 1, '2017-12-19 17:21:00', '2017-12-19 17:21:00', NULL),
(76, '183.82.118.72', '18', 'Order Request', 'Confirm Order Request .Bill Number: 00000001', 1, '2017-12-19 17:21:12', '2017-12-19 17:21:12', NULL),
(77, '183.82.3.255', '18', 'Order Request', 'Confirm Order Request .Bill Number: 00000002', 1, '2017-12-19 17:21:18', '2017-12-19 17:21:18', NULL),
(78, '183.82.118.72', '18', 'Sales ', 'product Sales & Take Print In Bill . Billnumber: 00000002', 1, '2017-12-19 17:21:26', '2017-12-19 17:21:26', NULL),
(79, '111.93.30.26', '18', 'Sales ', 'product Sales & Take Print In Bill . Billnumber: 00000001', 1, '2017-12-19 17:21:44', '2017-12-19 17:21:44', NULL),
(80, '111.93.30.26', '18', 'Sales ', 'product Sales & Take Print In Bill . Billnumber: 00000001', 1, '2017-12-19 17:24:28', '2017-12-19 17:24:28', NULL),
(81, '183.82.118.72', '18', 'Sales ', 'product Sales & Take Print In Bill . Billnumber: 00000002', 1, '2017-12-19 17:24:34', '2017-12-19 17:24:34', NULL),
(82, '183.82.3.255', '18', 'Sales ', 'product Sales & Take Print In Bill . Billnumber: 00000002', 1, '2017-12-19 17:24:49', '2017-12-19 17:24:49', NULL),
(83, '183.82.3.255', '18', 'Sales ', 'product Sales & Take Print In Bill . Billnumber: 00000002', 1, '2017-12-19 17:24:55', '2017-12-19 17:24:55', NULL),
(84, '183.82.118.72', '18', 'Brand', 'Edit & Updated  Brand: Heera', 1, '2017-12-19 17:33:53', '2017-12-19 17:33:53', NULL),
(85, '111.93.30.26', '18', 'Sales  Request', 'New Sales Reqquest .Bill Number: 00000003', 1, '2017-12-19 17:38:57', '2017-12-19 17:38:57', NULL),
(86, '183.82.118.72', '18', 'Login ', 'admin is login', 1, '2017-12-19 18:03:42', '2017-12-19 18:03:42', NULL),
(87, '183.82.118.72', '18', 'Login ', 'admin is login', 1, '2017-12-19 18:51:17', '2017-12-19 18:51:17', NULL),
(88, '183.82.118.72', '18', 'Credit', 'Update Credit Or Partial Paid  Amount .Bill Number: ', 1, '2017-12-19 18:53:29', '2017-12-19 18:53:29', NULL),
(89, '183.82.3.119', '18', 'Login ', 'admin is login', 1, '2017-12-20 11:15:40', '2017-12-20 11:15:40', NULL),
(90, '183.82.3.119', '18', 'Sales ', 'product Sales & Take Print In Bill . Billnumber: 00000003', 1, '2017-12-20 11:16:21', '2017-12-20 11:16:21', NULL),
(91, '183.82.3.119', '18', 'Sales  Request', 'New Sales Reqquest .Bill Number: 00000004', 1, '2017-12-20 11:45:59', '2017-12-20 11:45:59', NULL),
(92, '183.82.3.119', '18', 'Sales ', 'product Sales & Take Print In Bill . Billnumber: 00000004', 1, '2017-12-20 11:46:21', '2017-12-20 11:46:21', NULL),
(93, '183.82.3.119', '18', 'Sales  Request', 'New Sales Reqquest .Bill Number: 00000005', 1, '2017-12-20 11:50:36', '2017-12-20 11:50:36', NULL),
(94, '183.82.3.119', '18', 'Sales  Request', 'New Sales Reqquest .Bill Number: 00000006', 1, '2017-12-20 11:51:49', '2017-12-20 11:51:49', NULL),
(95, '183.82.3.119', '18', 'Sales ', 'product Sales & Take Print In Bill . Billnumber: 00000006', 1, '2017-12-20 11:52:01', '2017-12-20 11:52:01', NULL),
(96, '183.82.3.119', '18', 'Sales  Request', 'New Sales Reqquest .Bill Number: 00000007', 1, '2017-12-20 12:08:41', '2017-12-20 12:08:41', NULL),
(97, '183.82.3.119', '18', 'Sales Request', 'Update Amount & Customer Details .Bill Number: 00000007', 1, '2017-12-20 12:08:58', '2017-12-20 12:08:58', NULL),
(98, '183.82.3.119', '18', 'Sales Request', 'Update Amount & Customer Details .Bill Number: 00000007', 1, '2017-12-20 12:41:06', '2017-12-20 12:41:06', NULL),
(99, '183.82.3.119', '18', 'Sales Request', 'Update Amount & Customer Details .Bill Number: 00000007', 1, '2017-12-20 12:42:19', '2017-12-20 12:42:19', NULL),
(100, '183.82.3.119', '18', 'Sales Request', 'Update Amount & Customer Details .Bill Number: 00000007', 1, '2017-12-20 12:45:37', '2017-12-20 12:45:37', NULL),
(101, '183.82.3.119', '18', 'Sales ', 'product Sales & Take Print In Bill . Billnumber: 00000007', 1, '2017-12-20 12:50:23', '2017-12-20 12:50:23', NULL),
(102, '183.82.3.119', '18', 'Sales  Request', 'New Sales Reqquest .Bill Number: 00000008', 1, '2017-12-20 12:57:33', '2017-12-20 12:57:33', NULL),
(103, '183.82.118.72', '18', 'Login ', 'admin is login', 1, '2017-12-20 15:04:39', '2017-12-20 15:04:39', NULL),
(104, '183.82.118.72', '18', 'Sales ', 'product Sales & Take Print In Bill . Billnumber: 00000008', 1, '2017-12-20 15:05:23', '2017-12-20 15:05:23', NULL),
(105, '111.93.30.26', '18', 'Credit', 'Update Credit Or Partial Paid  Amount .Bill Number: ', 1, '2017-12-20 15:05:52', '2017-12-20 15:05:52', NULL),
(106, '183.82.118.72', '18', 'Credit', 'Update Credit Or Partial Paid  Amount .Bill Number: ', 1, '2017-12-20 15:08:04', '2017-12-20 15:08:04', NULL),
(107, '111.93.30.26', '18', 'Credit', 'Update Credit Or Partial Paid  Amount .Bill Number: ', 1, '2017-12-20 15:08:51', '2017-12-20 15:08:51', NULL),
(108, '111.93.30.26', '18', 'Sales ', 'product Sales & Take Print In Bill . Billnumber: 00000001', 1, '2017-12-20 15:17:50', '2017-12-20 15:17:50', NULL),
(109, '183.82.3.255', '18', 'Sales ', 'product Sales & Take Print In Bill . Billnumber: 00000002', 1, '2017-12-20 15:17:59', '2017-12-20 15:17:59', NULL),
(110, '183.82.3.255', '18', 'Sales ', 'product Sales & Take Print In Bill . Billnumber: 00000002', 1, '2017-12-20 15:18:05', '2017-12-20 15:18:05', NULL),
(111, '183.82.3.255', '18', 'Sales ', 'product Sales & Take Print In Bill . Billnumber: 00000003', 1, '2017-12-20 15:18:12', '2017-12-20 15:18:12', NULL),
(112, '183.82.3.255', '18', 'Sales ', 'product Sales & Take Print In Bill . Billnumber: 00000004', 1, '2017-12-20 15:18:19', '2017-12-20 15:18:19', NULL),
(113, '183.82.3.255', '18', 'Sales ', 'product Sales & Take Print In Bill . Billnumber: 00000008', 1, '2017-12-20 15:18:45', '2017-12-20 15:18:45', NULL),
(114, '183.82.3.255', '18', 'Sales ', 'product Sales & Take Print In Bill . Billnumber: 00000002', 1, '2017-12-20 15:18:52', '2017-12-20 15:18:52', NULL),
(115, '183.82.118.72', '18', 'Sales Request', 'Update Amount & Customer Details .Bill Number: 00000008', 1, '2017-12-20 15:23:36', '2017-12-20 15:23:36', NULL),
(116, '183.82.118.72', '18', 'Sales ', 'product Sales & Take Print In Bill . Billnumber: 00000008', 1, '2017-12-20 15:23:42', '2017-12-20 15:23:42', NULL),
(117, '183.82.118.72', '18', 'Sales Request', 'Update Amount & Customer Details .Bill Number: 00000008', 1, '2017-12-20 15:25:47', '2017-12-20 15:25:47', NULL),
(118, '183.82.118.72', '18', 'Sales ', 'product Sales & Take Print In Bill . Billnumber: 00000008', 1, '2017-12-20 15:26:05', '2017-12-20 15:26:05', NULL),
(119, '183.82.118.72', '18', 'Sales Request', 'Update Amount & Customer Details .Bill Number: 00000008', 1, '2017-12-20 15:33:47', '2017-12-20 15:33:47', NULL),
(120, '183.82.118.72', '18', 'Sales ', 'product Sales & Take Print In Bill . Billnumber: 00000008', 1, '2017-12-20 15:35:19', '2017-12-20 15:35:19', NULL),
(121, '183.82.118.72', '18', 'Sales ', 'product Sales & Take Print In Bill . Billnumber: 00000008', 1, '2017-12-20 15:39:02', '2017-12-20 15:39:02', NULL),
(122, '183.82.118.72', '18', 'Sales Request', 'Update Amount & Customer Details .Bill Number: 00000008', 1, '2017-12-20 15:46:25', '2017-12-20 15:46:25', NULL),
(123, '183.82.118.72', '18', 'Sales ', 'product Sales & Take Print In Bill . Billnumber: 00000008', 1, '2017-12-20 15:46:28', '2017-12-20 15:46:28', NULL),
(124, '183.82.118.72', '18', 'Sales ', 'product Sales & Take Print In Bill . Billnumber: 00000001', 1, '2017-12-20 15:46:52', '2017-12-20 15:46:52', NULL),
(125, '183.82.118.72', '18', 'Sales ', 'product Sales & Take Print In Bill . Billnumber: 00000008', 1, '2017-12-20 15:47:14', '2017-12-20 15:47:14', NULL),
(126, '183.82.118.72', '18', 'Sales ', 'product Sales & Take Print In Bill . Billnumber: 00000008', 1, '2017-12-20 15:47:53', '2017-12-20 15:47:53', NULL),
(127, '183.82.118.72', '18', 'Sales Request', 'Update Amount & Customer Details .Bill Number: 00000008', 1, '2017-12-20 15:48:33', '2017-12-20 15:48:33', NULL),
(128, '183.82.118.72', '18', 'Sales ', 'product Sales & Take Print In Bill . Billnumber: 00000008', 1, '2017-12-20 15:49:16', '2017-12-20 15:49:16', NULL),
(129, '183.82.118.72', '18', 'Sales Request', 'Update Amount & Customer Details .Bill Number: 00000008', 1, '2017-12-20 15:49:29', '2017-12-20 15:49:29', NULL),
(130, '183.82.118.72', '18', 'Sales ', 'product Sales & Take Print In Bill . Billnumber: 00000008', 1, '2017-12-20 15:51:47', '2017-12-20 15:51:47', NULL),
(131, '183.82.118.72', '18', 'Sales  Request', 'New Sales Reqquest .Bill Number: 00000009', 1, '2017-12-20 15:54:36', '2017-12-20 15:54:36', NULL),
(132, '183.82.118.72', '18', 'Sales Request', 'Update Amount & Customer Details .Bill Number: 00000009', 1, '2017-12-20 15:54:46', '2017-12-20 15:54:46', NULL),
(133, '183.82.118.72', '18', 'Sales ', 'product Sales & Take Print In Bill . Billnumber: 00000009', 1, '2017-12-20 15:54:49', '2017-12-20 15:54:49', NULL),
(134, '183.82.118.72', '18', 'Sales ', 'product Sales & Take Print In Bill . Billnumber: 00000009', 1, '2017-12-20 15:55:01', '2017-12-20 15:55:01', NULL),
(135, '183.82.118.72', '18', 'Sales ', 'product Sales & Take Print In Bill . Billnumber: 00000009', 1, '2017-12-20 15:55:12', '2017-12-20 15:55:12', NULL),
(136, '183.82.118.72', '18', 'Sales  Request', 'New Sales Reqquest .Bill Number: 00000010', 1, '2017-12-20 15:57:59', '2017-12-20 15:57:59', NULL),
(137, '183.82.118.72', '18', 'Sales ', 'product Sales & Take Print In Bill . Billnumber: 00000010', 1, '2017-12-20 16:01:30', '2017-12-20 16:01:30', NULL),
(138, '183.82.118.72', '18', 'Sales ', 'product Sales & Take Print In Bill . Billnumber: 00000010', 1, '2017-12-20 16:02:20', '2017-12-20 16:02:20', NULL),
(139, '183.82.118.72', '18', 'Sales ', 'product Sales & Take Print In Bill . Billnumber: 00000010', 1, '2017-12-20 16:03:06', '2017-12-20 16:03:06', NULL),
(140, '183.82.118.72', '18', 'Sales ', 'product Sales & Take Print In Bill . Billnumber: 00000010', 1, '2017-12-20 16:05:04', '2017-12-20 16:05:04', NULL),
(141, '183.82.118.72', '18', 'Sales ', 'product Sales & Take Print In Bill . Billnumber: 00000010', 1, '2017-12-20 16:10:51', '2017-12-20 16:10:51', NULL),
(142, '183.82.118.72', '18', 'Sales ', 'product Sales & Take Print In Bill . Billnumber: 00000010', 1, '2017-12-20 16:12:15', '2017-12-20 16:12:15', NULL),
(143, '183.82.118.72', '18', 'Sales Request', 'Update Amount & Customer Details .Bill Number: 00000010', 1, '2017-12-20 16:13:53', '2017-12-20 16:13:53', NULL),
(144, '183.82.118.72', '18', 'Sales ', 'product Sales & Take Print In Bill . Billnumber: 00000010', 1, '2017-12-20 16:13:56', '2017-12-20 16:13:56', NULL),
(145, '183.82.118.72', '18', 'Sales ', 'product Sales & Take Print In Bill . Billnumber: 00000010', 1, '2017-12-20 16:16:12', '2017-12-20 16:16:12', NULL),
(146, '183.82.118.72', '18', 'Sales Request', 'Update Amount & Customer Details .Bill Number: 00000010', 1, '2017-12-20 16:38:29', '2017-12-20 16:38:29', NULL),
(147, '183.82.118.72', '18', 'Sales ', 'product Sales & Take Print In Bill . Billnumber: 00000010', 1, '2017-12-20 16:40:55', '2017-12-20 16:40:55', NULL),
(148, '183.82.118.72', '18', 'Sales ', 'product Sales & Take Print In Bill . Billnumber: 00000010', 1, '2017-12-20 16:42:38', '2017-12-20 16:42:38', NULL),
(149, '183.82.118.72', '18', 'Sales Request', 'Update Amount & Customer Details .Bill Number: 00000010', 1, '2017-12-20 16:43:50', '2017-12-20 16:43:50', NULL),
(150, '183.82.118.72', '18', 'Sales ', 'product Sales & Take Print In Bill . Billnumber: 00000010', 1, '2017-12-20 16:43:53', '2017-12-20 16:43:53', NULL),
(151, '183.82.118.72', '18', 'Login ', 'admin is login', 1, '2017-12-20 16:43:58', '2017-12-20 16:43:58', NULL),
(152, '183.82.118.72', '18', 'Sales ', 'product Sales & Take Print In Bill . Billnumber: 00000010', 1, '2017-12-20 16:44:06', '2017-12-20 16:44:06', NULL),
(153, '183.82.118.72', '18', 'Sales  Request', 'New Sales Reqquest .Bill Number: 00000011', 1, '2017-12-20 16:44:18', '2017-12-20 16:44:18', NULL),
(154, '183.82.118.72', '18', 'Sales ', 'product Sales & Take Print In Bill . Billnumber: 00000011', 1, '2017-12-20 16:44:34', '2017-12-20 16:44:34', NULL),
(155, '183.82.118.72', '18', 'Sales ', 'product Sales & Take Print In Bill . Billnumber: 00000010', 1, '2017-12-20 16:44:56', '2017-12-20 16:44:56', NULL),
(156, '183.82.118.72', '18', 'Sales Request', 'Update Amount & Customer Details .Bill Number: 00000010', 1, '2017-12-20 16:57:06', '2017-12-20 16:57:06', NULL),
(157, '183.82.118.72', '18', 'Sales ', 'product Sales & Take Print In Bill . Billnumber: 00000010', 1, '2017-12-20 18:00:26', '2017-12-20 18:00:26', NULL),
(158, '183.82.118.72', '18', 'Sales ', 'product Sales & Take Print In Bill . Billnumber: 00000010', 1, '2017-12-20 18:00:47', '2017-12-20 18:00:47', NULL),
(159, '183.82.118.72', '18', 'Sales ', 'product Sales & Take Print In Bill . Billnumber: 00000010', 1, '2017-12-20 18:01:25', '2017-12-20 18:01:25', NULL),
(160, '183.82.118.72', '18', 'Sales ', 'product Sales & Take Print In Bill . Billnumber: 00000010', 1, '2017-12-20 18:02:47', '2017-12-20 18:02:47', NULL),
(161, '183.82.118.72', '18', 'Sales ', 'product Sales & Take Print In Bill . Billnumber: 00000010', 1, '2017-12-20 18:04:03', '2017-12-20 18:04:03', NULL),
(162, '183.82.118.72', '18', 'Sales ', 'product Sales & Take Print In Bill . Billnumber: 00000010', 1, '2017-12-20 18:04:22', '2017-12-20 18:04:22', NULL),
(163, '183.82.118.72', '18', 'Sales ', 'product Sales & Take Print In Bill . Billnumber: 00000010', 1, '2017-12-20 18:04:23', '2017-12-20 18:04:23', NULL),
(164, '183.82.118.72', '18', 'Sales ', 'product Sales & Take Print In Bill . Billnumber: 00000010', 1, '2017-12-20 18:04:54', '2017-12-20 18:04:54', NULL),
(165, '183.82.118.72', '18', 'Sales ', 'product Sales & Take Print In Bill . Billnumber: 00000010', 1, '2017-12-20 18:05:46', '2017-12-20 18:05:46', NULL),
(166, '183.82.118.72', '18', 'Sales ', 'product Sales & Take Print In Bill . Billnumber: 00000010', 1, '2017-12-20 18:07:44', '2017-12-20 18:07:44', NULL),
(167, '183.82.118.72', '18', 'Sales ', 'product Sales & Take Print In Bill . Billnumber: 00000010', 1, '2017-12-20 18:08:07', '2017-12-20 18:08:07', NULL),
(168, '183.82.118.72', '18', 'Sales ', 'product Sales & Take Print In Bill . Billnumber: 00000010', 1, '2017-12-20 18:09:29', '2017-12-20 18:09:29', NULL),
(169, '183.82.3.119', '18', 'Login ', 'admin is login', 1, '2017-12-21 10:14:20', '2017-12-21 10:14:20', NULL),
(170, '183.82.3.255', '18', 'Login ', 'admin is login', 1, '2017-12-21 18:44:38', '2017-12-21 18:44:38', NULL),
(171, '183.82.118.72', '18', 'Stock Request', 'Add New Stock Request.To: 3', 1, '2017-12-21 18:45:38', '2017-12-21 18:45:38', NULL),
(172, '111.93.30.26', '18', 'Login ', 'admin is login', 1, '2017-12-22 11:25:08', '2017-12-22 11:25:08', NULL),
(173, '183.82.3.255', '18', 'Login ', 'admin is login', 1, '2017-12-22 11:27:20', '2017-12-22 11:27:20', NULL),
(174, '183.82.3.255', '18', 'Login ', 'admin is login', 1, '2017-12-22 14:52:06', '2017-12-22 14:52:06', NULL),
(175, '183.82.3.255', '18', 'Stock', 'Add New Stock.Product Name: {"product_name":"Heera Basmati Rice 1kg"}', 1, '2017-12-22 14:53:52', '2017-12-22 14:53:52', NULL),
(176, '183.82.118.72', '18', 'Sales  Request', 'New Sales Reqquest .Bill Number: 00000001', 1, '2017-12-22 17:01:37', '2017-12-22 17:01:37', NULL),
(177, '183.82.3.255', '18', 'Credit', 'Update Credit Or Partial Paid  Amount .Bill Number: ', 1, '2017-12-22 17:02:21', '2017-12-22 17:02:21', NULL),
(178, '183.82.118.72', '18', 'Login ', 'admin is login', 1, '2017-12-23 11:43:20', '2017-12-23 11:43:20', NULL),
(179, '183.82.3.255', '18', 'Sales Request', 'Update Amount & Customer Details .Bill Number: 00000001', 1, '2017-12-23 12:09:49', '2017-12-23 12:09:49', NULL),
(180, '183.82.118.72', '1', 'Login ', 'admin11 is login', 1, '2017-12-26 16:42:50', '2017-12-26 16:42:50', NULL),
(181, '183.82.3.255', '18', 'Login ', 'admin is login', 1, '2017-12-26 18:42:15', '2017-12-26 18:42:15', NULL),
(182, '183.82.3.255', '18', 'Login ', 'admin is login', 1, '2017-12-27 10:56:44', '2017-12-27 10:56:44', NULL),
(183, '183.82.118.72', '18', 'Login ', 'admin is login', 1, '2017-12-27 15:03:59', '2017-12-27 15:03:59', NULL),
(184, '183.82.118.72', '18', 'Login ', 'admin is login', 1, '2017-12-27 19:00:10', '2017-12-27 19:00:10', NULL),
(185, '183.82.3.119', '1', 'Login ', 'admin11 is login', 1, '2018-01-01 11:46:32', '2018-01-01 11:46:32', NULL),
(186, '183.82.3.119', '1', 'Login ', 'admin11 is login', 1, '2018-01-01 11:46:42', '2018-01-01 11:46:42', NULL),
(187, '183.82.3.119', '1', 'Branch ', 'Add New Branch: tolichowki', 1, '2018-01-01 12:28:55', '2018-01-01 12:28:55', NULL),
(188, '183.82.3.119', '1', 'Branch ', 'Deleted Branch . Delete Branch: tolichowki', 1, '2018-01-01 12:29:09', '2018-01-01 12:29:09', NULL),
(189, '183.82.3.119', '1', 'Stock', 'Add New Stock.Product Name: {"product_name":"Heera Basmati Rice 1kg"}', 1, '2018-01-01 13:29:18', '2018-01-01 13:29:18', NULL),
(190, '183.82.3.119', '1', 'Product', 'Deleted  Product .Product Name: Heera Basmati Rice 1kg', 1, '2018-01-01 13:30:42', '2018-01-01 13:30:42', NULL),
(191, '183.82.118.72', '1', 'Login ', 'admin11 is login', 1, '2018-01-01 17:05:27', '2018-01-01 17:05:27', NULL),
(192, '183.82.118.72', '1', 'Brand', 'Add New Brand: gmgfj', 1, '2018-01-01 17:11:47', '2018-01-01 17:11:47', NULL),
(193, '183.82.118.72', '1', 'Brand', 'Deleted Brand: gmgfj', 1, '2018-01-01 17:11:53', '2018-01-01 17:11:53', NULL),
(194, '183.82.118.72', '1', 'Brand', 'Deleted Brand: Heera', 1, '2018-01-01 17:12:06', '2018-01-01 17:12:06', NULL),
(195, '183.82.118.72', '1', 'Brand', 'Add New Brand: heera', 1, '2018-01-01 17:12:29', '2018-01-01 17:12:29', NULL),
(196, '183.82.118.72', '1', 'Brand', 'Edit & Updated  Brand: Heera', 1, '2018-01-01 17:12:45', '2018-01-01 17:12:45', NULL),
(197, '183.82.3.119', '1', 'Login ', 'admin11 is login', 1, '2018-01-02 10:00:25', '2018-01-02 10:00:25', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` int(10) UNSIGNED NOT NULL,
  `notifiable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_id`, `notifiable_type`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('6fbf6de4-ec54-4605-a2fc-709a19cc09f4', 'App\\Notifications\\Products', 16, 'App\\User', '{"message":"<b>New Product Added<\\/b><br>\\r\\n                    test product<br>\\r\\n                    hyderabad<br>\\r\\n                    [admin] admin<br>","auth_user":"admin","send_notification_user":[[16]],"url":"#"}', '2017-12-19 11:37:55', '2017-12-19 10:10:36', '2017-12-19 11:37:55'),
('742e770a-d959-46cc-98ef-bd2355d307ca', 'App\\Notifications\\Products', 16, 'App\\User', '{"message":"<b>New Product Added<\\/b><br>\\r\\n                    test product<br>\\r\\n                    hyderabad<br>\\r\\n                    [admin] admin<br>","auth_user":"admin","send_notification_user":[[16]],"url":"#"}', '2017-12-19 11:37:55', '2017-12-19 10:11:23', '2017-12-19 11:37:55'),
('6273f5a6-e133-4e55-8424-428c5b4357f7', 'App\\Notifications\\Products', 16, 'App\\User', '{"message":"<b>Product Updated<\\/b><br>\\r\\n                    test product5<br>\\r\\n                    hyderabad<br>\\r\\n                    [admin] admin<br>","auth_user":"admin","send_notification_user":[[16]],"url":"#"}', '2017-12-19 11:37:55', '2017-12-19 10:11:44', '2017-12-19 11:37:55'),
('8403a273-e736-498d-bcb7-22edbeb1e80d', 'App\\Notifications\\Products', 16, 'App\\User', '{"message":"<b>Product Updated<\\/b><br>\\r\\n                    Heera Basmati Rice 1kg<br>\\r\\n                    hyderabad<br>\\r\\n                    [admin] admin<br>","auth_user":"admin","send_notification_user":[[16,17]],"url":"#"}', NULL, '2017-12-19 17:15:39', '2017-12-19 17:15:39'),
('ca289689-01bb-43ba-a643-fa41ec80a3fa', 'App\\Notifications\\Products', 17, 'App\\User', '{"message":"<b>Product Updated<\\/b><br>\\r\\n                    Heera Basmati Rice 1kg<br>\\r\\n                    hyderabad<br>\\r\\n                    [admin] admin<br>","auth_user":"admin","send_notification_user":[[16,17]],"url":"#"}', NULL, '2017-12-19 17:15:40', '2017-12-19 17:15:40'),
('12eba11f-28ee-4601-8045-74710a463464', 'App\\Notifications\\Products', 16, 'App\\User', '{"message":"<b>Product Updated<\\/b><br>\\r\\n                    Heera Basmati Rice 1kg<br>\\r\\n                    hyderabad<br>\\r\\n                    [admin] admin<br>","auth_user":"admin","send_notification_user":[[16,17]],"url":"#"}', NULL, '2017-12-19 17:15:54', '2017-12-19 17:15:54'),
('4a7dbf4d-61dd-4d94-9c42-f9a97dc206d2', 'App\\Notifications\\Products', 17, 'App\\User', '{"message":"<b>Product Updated<\\/b><br>\\r\\n                    Heera Basmati Rice 1kg<br>\\r\\n                    hyderabad<br>\\r\\n                    [admin] admin<br>","auth_user":"admin","send_notification_user":[[16,17]],"url":"#"}', NULL, '2017-12-19 17:15:54', '2017-12-19 17:15:54');

-- --------------------------------------------------------

--
-- Table structure for table `payment_modes`
--

CREATE TABLE `payment_modes` (
  `id` int(11) NOT NULL,
  `sales_id` int(11) NOT NULL,
  `branch_id` varchar(250) NOT NULL,
  `payment_mode` enum('cash','card','both','credit','online','cheque','charity') NOT NULL,
  `paid_amount` decimal(10,0) NOT NULL,
  `total_amount` decimal(10,2) NOT NULL DEFAULT '0.00',
  `card_amount` decimal(10,0) NOT NULL DEFAULT '0',
  `transaction_number` varchar(50) NOT NULL DEFAULT '0',
  `reference_number` varchar(50) NOT NULL DEFAULT '0',
  `account_number` varchar(50) NOT NULL DEFAULT '0',
  `cheque_number` int(255) NOT NULL DEFAULT '0',
  `balance` decimal(10,0) NOT NULL DEFAULT '0',
  `balance_type` enum('credit','debit') NOT NULL DEFAULT 'credit',
  `status` enum('normal','partial') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `sales_date` date DEFAULT NULL,
  `paid_date` date DEFAULT NULL,
  `reason` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment_modes`
--

INSERT INTO `payment_modes` (`id`, `sales_id`, `branch_id`, `payment_mode`, `paid_amount`, `total_amount`, `card_amount`, `transaction_number`, `reference_number`, `account_number`, `cheque_number`, `balance`, `balance_type`, `status`, `created_at`, `updated_at`, `deleted_at`, `sales_date`, `paid_date`, `reason`) VALUES
(1, 1, '1', 'cash', '275', '275.00', '0', '0', '0', '0', 0, '0', 'credit', 'normal', '2017-12-23 06:39:49', '2017-12-23 12:09:49', NULL, NULL, NULL, NULL),
(2, 1, '1', 'cash', '275', '275.00', '0', '0', '0', '0', 0, '0', 'credit', 'normal', '2017-12-22 17:02:21', '2017-12-22 17:02:21', NULL, NULL, '2017-12-26', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `payment_modes_del`
--

CREATE TABLE `payment_modes_del` (
  `id` int(11) NOT NULL,
  `sales_id` int(11) NOT NULL,
  `branch_id` varchar(250) NOT NULL,
  `payment_mode` enum('cash','card','both','credit','online','cheque','charity') NOT NULL,
  `paid_amount` decimal(10,0) NOT NULL,
  `total_amount` decimal(10,2) NOT NULL DEFAULT '0.00',
  `card_amount` decimal(10,0) NOT NULL DEFAULT '0',
  `transaction_number` varchar(50) NOT NULL DEFAULT '0',
  `reference_number` varchar(50) NOT NULL DEFAULT '0',
  `account_number` varchar(50) NOT NULL DEFAULT '0',
  `cheque_number` int(255) NOT NULL DEFAULT '0',
  `balance` decimal(10,0) NOT NULL DEFAULT '0',
  `balance_type` enum('credit','debit') NOT NULL DEFAULT 'credit',
  `status` enum('normal','partial') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `sales_date` date DEFAULT NULL,
  `paid_date` date DEFAULT NULL,
  `reason` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `product_number` varchar(100) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `category` int(20) DEFAULT NULL,
  `product_brand` int(2) NOT NULL,
  `basic_cost` float(15,2) NOT NULL,
  `product_discount` float(5,2) NOT NULL,
  `product_gst` float(5,2) NOT NULL,
  `billing_price` float(5,2) NOT NULL,
  `added_branch` int(5) DEFAULT NULL,
  `added_by` varchar(50) NOT NULL,
  `primary` text,
  `description` text,
  `largedescription` text,
  `other` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_number`, `unit_id`, `product_name`, `category`, `product_brand`, `basic_cost`, `product_discount`, `product_gst`, `billing_price`, `added_branch`, `added_by`, `primary`, `description`, `largedescription`, `other`, `created_at`, `updated_at`) VALUES
(1, '8906070690726', 1, 'Heera Basmati Rice 1kg', NULL, 1, 80.95, 0.00, 5.00, 85.00, 1, '18', NULL, NULL, NULL, NULL, '2017-12-18 17:27:46', '2017-12-19 17:15:39'),
(2, '8906070690566', 1, 'Heera Basmati Rice 5kg', NULL, 1, 400.00, 0.00, 5.00, 420.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:46', '2017-12-18 17:27:46'),
(3, '8906070690474', 2, 'Heera Toor Dal 500g', NULL, 1, 41.90, 0.00, 5.00, 44.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:46', '2017-12-18 17:27:46'),
(4, '8906070690627', 1, 'Heera Toor Dal 1kg', NULL, 1, 79.05, 0.00, 5.00, 83.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:47', '2017-12-18 17:27:47'),
(5, '8906070690252', 2, 'Heera Chana Dal 500g', NULL, 1, 42.86, 0.00, 5.00, 45.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:47', '2017-12-18 17:27:47'),
(6, '8906070691709', 1, 'Heera Chana Dal 1kg', NULL, 1, 80.95, 0.00, 5.00, 85.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:47', '2017-12-18 17:27:47'),
(7, '8906070691716', 2, 'Heera Wheat Rava Med 500g', NULL, 1, 22.86, 0.00, 5.00, 24.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:47', '2017-12-18 17:27:47'),
(8, '8906070690740', 1, 'Heera Wheat Rava Med 1kg', NULL, 1, 40.00, 0.00, 5.00, 42.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:47', '2017-12-18 17:27:47'),
(9, '8906070690757', 1, 'Heera Boiled Rice 1kg', NULL, 1, 33.05, 0.00, 18.00, 39.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:47', '2017-12-18 17:27:47'),
(10, '8906070690764', 2, 'Heera Corn Flour 500g', NULL, 1, 19.05, 0.00, 5.00, 20.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:47', '2017-12-18 17:27:47'),
(11, '8906070690535', 2, 'Heera Corn Flour 250g', NULL, 1, 11.43, 0.00, 5.00, 12.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:47', '2017-12-18 17:27:47'),
(12, '8906070690146', 2, 'Heera Urad Round 500g', NULL, 1, 64.76, 0.00, 5.00, 68.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:47', '2017-12-18 17:27:47'),
(13, '8906070690634', 1, 'Heera Urad Round 1kg', NULL, 1, 122.86, 0.00, 5.00, 129.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:47', '2017-12-18 17:27:47'),
(14, '8906070690771', 2, 'Heera Urad Dal 100g', NULL, 1, 12.38, 0.00, 5.00, 13.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:47', '2017-12-18 17:27:47'),
(15, '8906070690320', 2, 'Heera Urad Dal 500g', NULL, 1, 55.24, 0.00, 5.00, 58.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:47', '2017-12-18 17:27:47'),
(16, '8906070691730', 1, 'Heera Urad Dal 1kg', NULL, 1, 104.76, 0.00, 5.00, 110.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:47', '2017-12-18 17:27:47'),
(17, '8906070690399', 2, 'Heera Moong Dal 500g', NULL, 1, 40.95, 0.00, 5.00, 43.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:47', '2017-12-18 17:27:47'),
(18, '8906070690610', 1, 'Heera Moong Dal 1kg', NULL, 1, 78.10, 0.00, 5.00, 82.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:47', '2017-12-18 17:27:47'),
(19, '8906070690641', 2, 'Heera Mirchi Powder 500g', NULL, 1, 50.48, 0.00, 5.00, 53.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:47', '2017-12-18 17:27:47'),
(20, '8906070691464', 2, 'Heera Mirchi Powder 200g', NULL, 1, 32.38, 0.00, 5.00, 34.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:47', '2017-12-18 17:27:47'),
(21, '8906070691778', 2, 'Heera Mirchi Powder 100g', NULL, 1, 17.14, 0.00, 5.00, 18.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:47', '2017-12-18 17:27:47'),
(22, '8906070691983', 2, 'Heera Ragi 500g', NULL, 1, 26.00, 0.00, 0.00, 26.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:47', '2017-12-18 17:27:47'),
(23, '8906070690139', 2, 'Heera Ragi Flour 500g', NULL, 1, 28.57, 0.00, 5.00, 30.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:47', '2017-12-18 17:27:47'),
(24, '8906070690788', 2, 'Heera Green Elachi 25g', NULL, 1, 44.76, 0.00, 5.00, 47.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:47', '2017-12-18 17:27:47'),
(25, '8906070690795', 1, 'Heera Idli Rava 1kg', NULL, 1, 37.14, 0.00, 5.00, 39.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:47', '2017-12-18 17:27:47'),
(26, '8906070690276', 2, 'Heera Idli Rava 500g', NULL, 1, 20.00, 0.00, 5.00, 21.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:47', '2017-12-18 17:27:47'),
(27, '8906070690801', 2, 'Heera Besan 500g', NULL, 1, 44.76, 0.00, 5.00, 47.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:47', '2017-12-18 17:27:47'),
(28, '8906070690818', 1, 'Heera Besan 1kg', NULL, 1, 85.71, 0.00, 5.00, 90.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:47', '2017-12-18 17:27:47'),
(29, '8906070690825', 1, 'Heera Rice Flour 1kg', NULL, 1, 45.71, 0.00, 5.00, 48.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:47', '2017-12-18 17:27:47'),
(30, '8906070691969', 2, 'Heera Moong Green 200g', NULL, 1, 16.19, 0.00, 5.00, 17.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:47', '2017-12-18 17:27:47'),
(31, '8906070690382', 2, 'Heera Moong Green 500g', NULL, 1, 47.62, 0.00, 5.00, 50.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:47', '2017-12-18 17:27:47'),
(32, '8906070691976', 2, 'Heera Green Peas 200g', NULL, 1, 10.48, 0.00, 5.00, 11.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:47', '2017-12-18 17:27:47'),
(33, '8906070690351', 2, 'Heera Green Peas 500g', NULL, 1, 24.76, 0.00, 5.00, 26.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:47', '2017-12-18 17:27:47'),
(34, '8906070691617', 3, 'Heera Sunflower Oil 1ltr', NULL, 1, 82.86, 0.00, 5.00, 87.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:48', '2017-12-18 17:27:48'),
(35, '8906070690658', 3, 'Heera Sunflower Oil 5ltr', NULL, 1, 418.10, 0.00, 5.00, 439.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:48', '2017-12-18 17:27:48'),
(36, '8906070690832', 4, 'Heera Til Oil 200ml', NULL, 1, 40.95, 0.00, 5.00, 43.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:48', '2017-12-18 17:27:48'),
(37, '8906070690696', 4, 'Heera Coconut Oil 500ml', NULL, 1, 89.52, 0.00, 5.00, 94.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:48', '2017-12-18 17:27:48'),
(38, '8906070690849', 4, 'Heera Mustard Oil 500ml', NULL, 1, 67.62, 0.00, 5.00, 71.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:48', '2017-12-18 17:27:48'),
(39, '8906070691792', 2, 'Heera Fried Gram Dal 200g', NULL, 1, 24.76, 0.00, 5.00, 26.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:48', '2017-12-18 17:27:48'),
(40, '8906070690856', 2, 'Heera Fried Gram Dal 500g', NULL, 1, 57.14, 0.00, 5.00, 60.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:48', '2017-12-18 17:27:48'),
(41, '8906070690863', 1, 'Heera Chakki Atta 1kg', NULL, 1, 45.71, 0.00, 5.00, 48.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:48', '2017-12-18 17:27:48'),
(42, '8906070690870', 1, 'Heera Chakki Atta 5kg', NULL, 1, 159.05, 0.00, 5.00, 167.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:48', '2017-12-18 17:27:48'),
(43, '8906070690887', 1, 'Heera Maida 1kg', NULL, 1, 39.05, 0.00, 5.00, 41.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:48', '2017-12-18 17:27:48'),
(44, '8906070691808', 2, 'Heera Dry Khajoor 100g', NULL, 1, 18.75, 0.00, 12.00, 21.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:48', '2017-12-18 17:27:48'),
(45, '8906070690894', 2, 'Heera Dry Khajoor 250g', NULL, 1, 44.64, 0.00, 12.00, 50.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:48', '2017-12-18 17:27:48'),
(46, '8906070691815', 2, 'Heera Diamond Misri 100g', NULL, 1, 8.57, 0.00, 5.00, 9.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:48', '2017-12-18 17:27:48'),
(47, '8906070690900', 2, 'Heera Diamond Misri 250g', NULL, 1, 17.14, 0.00, 5.00, 18.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:48', '2017-12-18 17:27:48'),
(48, '8906070690917', 2, 'Heera Akrote 250g', NULL, 1, 107.14, 0.00, 12.00, 120.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:48', '2017-12-18 17:27:48'),
(49, '8906070691822', 2, 'Heera Salted Pista 100g', NULL, 1, 100.00, 0.00, 12.00, 112.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:48', '2017-12-18 17:27:48'),
(50, '8906070690924', 2, 'Heera Salted Pista 250g', NULL, 1, 239.29, 0.00, 12.00, 268.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:48', '2017-12-18 17:27:48'),
(51, '8906070690931', 2, 'Heera Anjeer 100g', NULL, 1, 70.54, 0.00, 12.00, 79.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:48', '2017-12-18 17:27:48'),
(52, '8906070690948', 2, 'Heera Jeera 100g', NULL, 1, 29.52, 0.00, 5.00, 31.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:48', '2017-12-18 17:27:48'),
(53, '8906070691839', 2, 'Heera Jeera 200g', NULL, 1, 57.14, 0.00, 5.00, 60.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:48', '2017-12-18 17:27:48'),
(54, '8906070690955', 2, 'Heera Methi 100g', NULL, 1, 7.62, 0.00, 5.00, 8.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:48', '2017-12-18 17:27:48'),
(55, '8906070690962', 2, 'Heera Shahjeera 25g', NULL, 1, 16.19, 0.00, 5.00, 17.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:48', '2017-12-18 17:27:48'),
(56, '8906070690979', 2, 'Heera Tasting Salt 50g', NULL, 1, 5.93, 0.00, 18.00, 7.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:48', '2017-12-18 17:27:48'),
(57, '8906070690986', 2, 'Heera Lemon Salt 100g', NULL, 1, 11.86, 0.00, 18.00, 14.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:48', '2017-12-18 17:27:48'),
(58, '8906070690993', 2, 'Heera Barley Rice 250g', NULL, 1, 11.00, 0.00, 0.00, 11.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:48', '2017-12-18 17:27:48'),
(59, '8906070691006', 2, 'Heera Poha Mota 500g', NULL, 1, 26.00, 0.00, 0.00, 26.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:48', '2017-12-18 17:27:48'),
(60, '8906070691013', 2, 'Heera Badam 100g', NULL, 1, 79.46, 0.00, 12.00, 89.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:48', '2017-12-18 17:27:48'),
(61, '8906070691020', 2, 'Heera Badam 250g', NULL, 1, 188.39, 0.00, 12.00, 211.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:48', '2017-12-18 17:27:48'),
(62, '8906070690603', 1, 'Heera Sugar 1kg', NULL, 1, 49.52, 0.00, 5.00, 52.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:48', '2017-12-18 17:27:48'),
(63, '8906070691044', 2, 'Heera Cloves 25g', NULL, 1, 20.95, 0.00, 5.00, 22.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:48', '2017-12-18 17:27:48'),
(64, '8906070691051', 2, 'Heera Cashew W-240 100g', NULL, 1, 97.32, 0.00, 12.00, 109.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:48', '2017-12-18 17:27:48'),
(65, '8906070690016', 2, 'Heera Cashew W-240 250g', NULL, 1, 232.14, 0.00, 12.00, 260.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:49', '2017-12-18 17:27:49'),
(66, '8906070691068', 2, 'Heera Pista Plain 50g', NULL, 1, 73.21, 0.00, 12.00, 82.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:49', '2017-12-18 17:27:49'),
(67, '8906070691082', 2, 'Heera Eating Soda 200g', NULL, 1, 8.47, 0.00, 18.00, 10.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:49', '2017-12-18 17:27:49'),
(68, '8906070691099', 2, 'Heera Til Nylon 100g', NULL, 1, 13.33, 0.00, 5.00, 14.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:49', '2017-12-18 17:27:49'),
(69, '8906070690665', 2, 'H Turmeric Powder 100g', NULL, 1, 15.24, 0.00, 5.00, 16.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:49', '2017-12-18 17:27:49'),
(70, '8906070691846', 2, 'H Turmeric Powder 200g', NULL, 1, 29.52, 0.00, 5.00, 31.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:49', '2017-12-18 17:27:49'),
(71, '8906070691853', 2, 'H Coriander Powder 100g', NULL, 1, 11.43, 0.00, 5.00, 12.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:49', '2017-12-18 17:27:49'),
(72, '8906070691105', 2, 'H Coriander Powder 200g', NULL, 1, 21.90, 0.00, 5.00, 23.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:49', '2017-12-18 17:27:49'),
(73, '8906070691112', 2, 'Heera Pepper Powder 50g', NULL, 1, 41.90, 0.00, 5.00, 44.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:49', '2017-12-18 17:27:49'),
(74, '8906070691129', 2, 'Heera Garam Masala 100g', NULL, 1, 33.33, 0.00, 5.00, 35.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:49', '2017-12-18 17:27:49'),
(75, '8906070691136', 2, 'Heera Chicken Masala 100g', NULL, 1, 23.81, 0.00, 5.00, 25.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:49', '2017-12-18 17:27:49'),
(76, '8906070691143', 2, 'Heera Mutton Masala 100g', NULL, 1, 34.29, 0.00, 5.00, 36.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:49', '2017-12-18 17:27:49'),
(77, '8906070691150', 2, 'Heera Rasam Powder 100g', NULL, 1, 21.90, 0.00, 5.00, 23.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:49', '2017-12-18 17:27:49'),
(78, '8906070691167', 2, 'Heera Sambar Powder 100g', NULL, 1, 21.90, 0.00, 5.00, 23.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:49', '2017-12-18 17:27:49'),
(79, '8906070691174', 2, 'H GingerGarlic Powder 100g', NULL, 1, 20.00, 0.00, 5.00, 21.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:49', '2017-12-18 17:27:49'),
(80, '8906070691860', 2, 'Heera Ground Nut 500g', NULL, 1, 58.10, 0.00, 5.00, 61.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:49', '2017-12-18 17:27:49'),
(81, '8906070691181', 1, 'Heera Ground Nut 1kg', NULL, 1, 109.52, 0.00, 5.00, 115.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:49', '2017-12-18 17:27:49'),
(82, '8906070691204', 2, 'H Half Dry Khajoor 500g', NULL, 1, 151.79, 0.00, 12.00, 170.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:49', '2017-12-18 17:27:49'),
(83, '8906070690672', 2, 'Heera Semiya 900g', NULL, 1, 54.29, 0.00, 5.00, 57.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:49', '2017-12-18 17:27:49'),
(84, '8906070690344', 2, 'H Coconut Powder 100g', NULL, 1, 22.32, 0.00, 12.00, 25.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:49', '2017-12-18 17:27:49'),
(85, '8906070690719', 2, 'H Coconut Powder 250g', NULL, 1, 52.68, 0.00, 12.00, 59.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:49', '2017-12-18 17:27:49'),
(86, '8906070691884', 2, 'Heera Lobiya White 200g', NULL, 1, 19.05, 0.00, 5.00, 20.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:49', '2017-12-18 17:27:49'),
(87, '8906070690412', 2, 'Heera Lobiya White 500g', NULL, 1, 45.71, 0.00, 5.00, 48.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:49', '2017-12-18 17:27:49'),
(88, '8906070691228', 1, 'Heera Masoor Dal 1kg', NULL, 1, 70.48, 0.00, 5.00, 74.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:49', '2017-12-18 17:27:49'),
(89, '8906070691235', 2, 'Heera Masoor Dal 500g', NULL, 1, 37.14, 0.00, 5.00, 39.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:49', '2017-12-18 17:27:49'),
(90, '8906070691242', 2, 'Heera Black Pepper 100g', NULL, 1, 80.95, 0.00, 5.00, 85.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:49', '2017-12-18 17:27:49'),
(91, '8906070691259', 2, 'Heera Khas Khas 50g', NULL, 1, 27.62, 0.00, 5.00, 29.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:49', '2017-12-18 17:27:49'),
(92, '8906070691266', 3, 'Heera Ground Nut Oil 3ltr', NULL, 1, 374.29, 0.00, 5.00, 393.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:49', '2017-12-18 17:27:49'),
(93, '8906070691273', 3, 'Heera Rice Bran Oil 3ltr', NULL, 1, 242.86, 0.00, 5.00, 255.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:49', '2017-12-18 17:27:49'),
(94, '8906070690054', 2, 'Heera Sago Nylon 250g', NULL, 1, 26.67, 0.00, 5.00, 28.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:49', '2017-12-18 17:27:49'),
(95, '8906070691952', 2, 'Heera Kabuli Chana 200g', NULL, 1, 33.33, 0.00, 5.00, 35.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:49', '2017-12-18 17:27:49'),
(96, '8906070690085', 2, 'Heera Kabuli Chana 500g', NULL, 1, 79.05, 0.00, 5.00, 83.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:49', '2017-12-18 17:27:49'),
(97, '8906070691891', 2, 'Heera Mustard Small 100g', NULL, 1, 8.57, 0.00, 5.00, 9.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:50', '2017-12-18 17:27:50'),
(98, '8906070690283', 2, 'Heera Mustard Small 250g', NULL, 1, 19.05, 0.00, 5.00, 20.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:50', '2017-12-18 17:27:50'),
(99, '8906070690559', 4, 'Heera Ghee 500ml', NULL, 1, 200.89, 0.00, 12.00, 225.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:50', '2017-12-18 17:27:50'),
(100, '8906070690009', 2, 'Heera Tamarind 500g', NULL, 1, 69.00, 0.00, 0.00, 69.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:50', '2017-12-18 17:27:50'),
(101, '8906070690702', 2, 'Heera Tea Powder 250g', NULL, 1, 73.33, 0.00, 5.00, 77.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:50', '2017-12-18 17:27:50'),
(102, '8906070691280', 2, 'Heera Tea Powder 100g', NULL, 1, 30.48, 0.00, 5.00, 32.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:50', '2017-12-18 17:27:50'),
(103, '8906070690733', 2, 'Heera Cooking Saunf 50g', NULL, 1, 8.57, 0.00, 5.00, 9.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:50', '2017-12-18 17:27:50'),
(104, '8906070690528', 2, 'Heera Kismiss 250g', NULL, 1, 49.52, 0.00, 5.00, 52.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:50', '2017-12-18 17:27:50'),
(105, '8906070691303', 2, 'Heera Cinnamon 50g', NULL, 1, 12.38, 0.00, 5.00, 13.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:50', '2017-12-18 17:27:50'),
(106, '8906070691310', 2, 'Heera Cashew Split 250g', NULL, 1, 228.57, 0.00, 5.00, 240.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:50', '2017-12-18 17:27:50'),
(107, '8906070691327', 2, 'Heera Cashew Split 4Pc 250g', NULL, 1, 234.29, 0.00, 5.00, 246.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:50', '2017-12-18 17:27:50'),
(108, '8906070691334', 2, 'Heera Ajwain 100g', NULL, 1, 16.19, 0.00, 5.00, 17.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:50', '2017-12-18 17:27:50'),
(109, '8906070691358', 2, 'Heera Kismiss 100g', NULL, 1, 20.95, 0.00, 5.00, 22.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:50', '2017-12-18 17:27:50'),
(110, '8906070691341', 2, 'Heera Semiya 450g', NULL, 1, 28.57, 0.00, 5.00, 30.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:50', '2017-12-18 17:27:50'),
(111, '8906070691365', 3, 'H Floor Cleaner Sandal 1ltr', NULL, 1, 39.06, 0.00, 28.00, 50.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:50', '2017-12-18 17:27:50'),
(112, '8906070691389', 3, 'H Floor Cleaner Rose 1ltr', NULL, 1, 39.06, 0.00, 28.00, 50.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:50', '2017-12-18 17:27:50'),
(113, '8906070691426', 3, 'Heera Hand Wash 1ltr', NULL, 1, 61.72, 0.00, 28.00, 79.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:50', '2017-12-18 17:27:50'),
(114, '8906070691402', 3, 'H Dish Wash Lemon 1ltr', NULL, 1, 42.97, 0.00, 28.00, 55.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:50', '2017-12-18 17:27:50'),
(115, '8906070691419', 3, 'H Floor Wash Orange 1ltr', NULL, 1, 49.22, 0.00, 28.00, 63.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:50', '2017-12-18 17:27:50'),
(116, '8906070691471', 1, 'Heera Royal Raw Rice 25kg', NULL, 1, 1633.33, 0.00, 5.00, 999.99, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:50', '2017-12-18 17:27:50'),
(117, '8906070691907', 2, 'Heera Dry Copra 200g', NULL, 1, 34.82, 0.00, 12.00, 39.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:50', '2017-12-18 17:27:50'),
(118, '8906070691501', 2, 'Heera Dry Copra 500g', NULL, 1, 82.14, 0.00, 12.00, 92.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:50', '2017-12-18 17:27:50'),
(119, '8906070690443', 2, 'Heera Bombay Rava 500g', NULL, 1, 20.00, 0.00, 5.00, 21.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:50', '2017-12-18 17:27:50'),
(120, '8906070691518', 1, 'Heera Bombay Rava 1kg', NULL, 1, 39.05, 0.00, 5.00, 41.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:50', '2017-12-18 17:27:50'),
(121, '8906070691532', 1, 'Heera Chakki Atta 10kg', NULL, 1, 312.38, 0.00, 5.00, 328.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:50', '2017-12-18 17:27:50'),
(122, '8906070691549', 2, 'Heera Macaroni 500g', NULL, 1, 24.58, 0.00, 18.00, 29.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:50', '2017-12-18 17:27:50'),
(123, '8906070691556', 2, 'Heera Iodized Salt 500g', NULL, 1, 7.00, 0.00, 0.00, 7.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:50', '2017-12-18 17:27:50'),
(124, '8906070691563', 1, 'Heera Iodized Salt 1kg', NULL, 1, 12.00, 0.00, 0.00, 12.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:50', '2017-12-18 17:27:50'),
(125, '8906070691587', 2, 'Heera Cashew Split 100g', NULL, 1, 90.18, 0.00, 12.00, 101.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:50', '2017-12-18 17:27:50'),
(126, '8906070691594', 4, 'Heera Ghee 100ml', NULL, 1, 44.64, 0.00, 12.00, 50.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:50', '2017-12-18 17:27:50'),
(127, '8906070691600', 1, 'Heera Sugar 25kg', NULL, 1, 1071.43, 0.00, 5.00, 999.99, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:50', '2017-12-18 17:27:50'),
(128, '8906070691624', 1, 'Heera Royal Raw Rice 10kg', NULL, 1, 704.76, 0.00, 5.00, 740.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:50', '2017-12-18 17:27:50'),
(129, '8906070691631', 1, 'Heera Royal Raw Rice 5kg', NULL, 1, 355.24, 0.00, 5.00, 373.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:51', '2017-12-18 17:27:51'),
(130, '8906070691648', 2, 'Heera Masala Papad 200g', NULL, 1, 26.00, 0.00, 0.00, 26.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:51', '2017-12-18 17:27:51'),
(131, '8906070691914', 2, 'Heera Chironji 50g', NULL, 1, 39.05, 0.00, 5.00, 41.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:51', '2017-12-18 17:27:51'),
(132, '8906070691921', 2, 'Heera Star Anees 25g', NULL, 1, 10.48, 0.00, 5.00, 11.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:51', '2017-12-18 17:27:51'),
(133, '8906070691938', 2, 'Heera Marati Mogga 50g', NULL, 1, 6.67, 0.00, 5.00, 7.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:51', '2017-12-18 17:27:51'),
(134, '8906070691945', 2, 'Heera Fryums 200g', NULL, 1, 11.43, 0.00, 5.00, 12.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:51', '2017-12-18 17:27:51'),
(135, '8906070691686', 2, 'Heera Fryums 500g', NULL, 1, 39.05, 0.00, 5.00, 41.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:51', '2017-12-18 17:27:51'),
(136, '8906070691990', 2, 'Heera Bajra 500g', NULL, 1, 19.00, 0.00, 0.00, 19.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:51', '2017-12-18 17:27:51'),
(137, '8906070692003', 2, 'Heera Jowar 500g', NULL, 1, 23.00, 0.00, 0.00, 23.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:51', '2017-12-18 17:27:51'),
(138, '8906070692010', 2, 'Heera Brown Channa 200g', NULL, 1, 19.05, 0.00, 5.00, 20.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:51', '2017-12-18 17:27:51'),
(139, '8906070692027', 2, 'Heera Brown Channa 500g', NULL, 1, 44.76, 0.00, 5.00, 47.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:51', '2017-12-18 17:27:51'),
(140, '8906070692034', 2, 'Heera White Peas 200g', NULL, 1, 10.00, 0.00, 0.00, 10.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:51', '2017-12-18 17:27:51'),
(141, '8906070692041', 2, 'Heera White Peas 500g', NULL, 1, 21.00, 0.00, 0.00, 21.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:51', '2017-12-18 17:27:51'),
(142, '8906070692058', 2, 'Heera Urad Chilka 500g', NULL, 1, 43.81, 0.00, 5.00, 46.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:51', '2017-12-18 17:27:51'),
(143, '8906070692065', 2, 'Heera Moong Chilka 500g', NULL, 1, 43.81, 0.00, 5.00, 46.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:51', '2017-12-18 17:27:51'),
(144, '8906070692072', 2, 'Heera Rajma White 200g', NULL, 1, 20.00, 0.00, 5.00, 21.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:51', '2017-12-18 17:27:51'),
(145, '8906070692089', 2, 'Heera Rajma White 500g', NULL, 1, 46.67, 0.00, 5.00, 49.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:51', '2017-12-18 17:27:51'),
(146, '8906070692096', 2, 'Heera Rajma Red 200g', NULL, 1, 20.95, 0.00, 5.00, 22.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:51', '2017-12-18 17:27:51'),
(147, '8906070692102', 2, 'Heera Rajma Red 500g', NULL, 1, 48.57, 0.00, 5.00, 51.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:51', '2017-12-18 17:27:51'),
(148, '8906070692119', 2, 'Heera Moth 200g', NULL, 1, 17.14, 0.00, 5.00, 18.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:51', '2017-12-18 17:27:51'),
(149, '8906070692126', 2, 'Heera Soya Beans 200g', NULL, 1, 21.90, 0.00, 5.00, 23.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:51', '2017-12-18 17:27:51'),
(150, '8906070692133', 2, 'Heera Walnut Broken 100g', NULL, 1, 97.32, 0.00, 12.00, 109.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:51', '2017-12-18 17:27:51'),
(151, '8906070692140', 2, 'Heera Kurbani/Apricot 100g', NULL, 1, 50.00, 0.00, 0.00, 50.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:51', '2017-12-18 17:27:51'),
(152, '8906070692157', 2, 'Heera Elachi White 25g', NULL, 1, 56.19, 0.00, 5.00, 59.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:51', '2017-12-18 17:27:51'),
(153, '8906070692164', 2, 'Heera Dhaniya 100g', NULL, 1, 15.24, 0.00, 5.00, 16.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:51', '2017-12-18 17:27:51'),
(154, '8906070692171', 2, 'Heera Dhaniya 200g', NULL, 1, 29.52, 0.00, 5.00, 31.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:51', '2017-12-18 17:27:51'),
(155, '8906070692188', 2, 'Heera Table Saunf 50g', NULL, 1, 9.52, 0.00, 5.00, 10.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:51', '2017-12-18 17:27:51'),
(156, '8906070692195', 2, 'Heera Til Black 100g', NULL, 1, 20.00, 0.00, 5.00, 21.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:51', '2017-12-18 17:27:51'),
(157, '8906070692201', 2, 'Heera Til Regular 100g', NULL, 1, 13.33, 0.00, 5.00, 14.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:51', '2017-12-18 17:27:51'),
(158, '8906070692218', 2, 'Heera Til Regular 200g', NULL, 1, 25.71, 0.00, 5.00, 27.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:51', '2017-12-18 17:27:51'),
(159, '8906070692249', 2, 'Heera Red Chillies 200g', NULL, 1, 20.00, 0.00, 5.00, 21.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:51', '2017-12-18 17:27:51'),
(160, '8906070692256', 2, 'Heera Sago Medium 200g', NULL, 1, 16.19, 0.00, 5.00, 17.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:51', '2017-12-18 17:27:51'),
(161, '8906070692263', 2, 'Heera Sago Medium 500g', NULL, 1, 36.19, 0.00, 5.00, 38.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:52', '2017-12-18 17:27:52'),
(162, '8906070692270', 2, 'Heera Tarbuj Seeds 50g', NULL, 1, 12.38, 0.00, 5.00, 13.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:52', '2017-12-18 17:27:52'),
(163, '8906070692287', 2, 'Heera Double Beans 200g', NULL, 1, 27.62, 0.00, 5.00, 29.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:52', '2017-12-18 17:27:52'),
(164, '8906070690375', 2, 'Heera Wheat Rawa Small 500g', NULL, 1, 22.86, 0.00, 5.00, 24.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:52', '2017-12-18 17:27:52'),
(165, '8906070692294', 2, 'Heera Wheat Rawa Big 500g', NULL, 1, 22.86, 0.00, 5.00, 24.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:52', '2017-12-18 17:27:52'),
(166, '8906070692300', 2, 'Heera Jowar Flour 500g', NULL, 1, 27.62, 0.00, 5.00, 29.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:52', '2017-12-18 17:27:52'),
(167, '8906070692317', 1, 'Heera Idly Rice 1kg', NULL, 1, 53.33, 0.00, 5.00, 56.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:52', '2017-12-18 17:27:52'),
(168, '8906070692324', 1, 'Heera Red Boiled Rice 1kg', NULL, 1, 82.86, 0.00, 5.00, 87.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:52', '2017-12-18 17:27:52'),
(169, '8906070692348', 2, 'Heera Mace/Japatri 25g', NULL, 1, 27.62, 0.00, 5.00, 29.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:52', '2017-12-18 17:27:52'),
(170, '8906070692355', 2, 'Heera Nutmeg/Jaipal 25g', NULL, 1, 20.95, 0.00, 5.00, 22.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:52', '2017-12-18 17:27:52'),
(171, '8906070692362', 2, 'Heera Karbooj Seeds 25g', NULL, 1, 9.52, 0.00, 5.00, 10.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:52', '2017-12-18 17:27:52'),
(172, '8906070692379', 1, 'Heera Jeera Rice 1kg', NULL, 1, 92.38, 0.00, 5.00, 97.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:52', '2017-12-18 17:27:52'),
(173, '8906070692386', 2, 'Heera Kalonji 50g', NULL, 1, 9.52, 0.00, 5.00, 10.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:52', '2017-12-18 17:27:52'),
(174, '8906070692393', 2, 'Heera Elachi Black 25g', NULL, 1, 30.48, 0.00, 5.00, 32.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:52', '2017-12-18 17:27:52'),
(175, '8906070692409', 2, 'Heera Urad Whole/Black 500g', NULL, 1, 54.29, 0.00, 5.00, 57.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:52', '2017-12-18 17:27:52'),
(176, '8906070692416', 2, 'Heera Black Salt 100g', NULL, 1, 3.00, 0.00, 0.00, 3.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:52', '2017-12-18 17:27:52'),
(177, '8906070692430', 2, 'Heera Dry Ginger 50g', NULL, 1, 9.52, 0.00, 5.00, 10.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:52', '2017-12-18 17:27:52'),
(178, '8906070692447', 2, 'Heera Haldi Sticks 100g', NULL, 1, 15.00, 0.00, 0.00, 15.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:52', '2017-12-18 17:27:52'),
(179, '8906070692454', 2, 'Heera Horse Gram 200g', NULL, 1, 20.95, 0.00, 5.00, 22.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:52', '2017-12-18 17:27:52'),
(180, '8906070692461', 2, 'Heera Masoor Whole 200g', NULL, 1, 14.29, 0.00, 5.00, 15.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:52', '2017-12-18 17:27:52'),
(181, '8906070692478', 2, 'Heera Popcorn/Maize 200g', NULL, 1, 18.10, 0.00, 5.00, 19.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:52', '2017-12-18 17:27:52'),
(182, '8906070692492', 1, 'Heera Hand Pound Rice 1kg', NULL, 1, 60.00, 0.00, 5.00, 63.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:52', '2017-12-18 17:27:52'),
(183, '8906070692508', 2, 'Heera Rice Rava 500g', NULL, 1, 25.71, 0.00, 5.00, 27.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:52', '2017-12-18 17:27:52'),
(184, '8906070692515', 2, 'Heera Bajra Flour 500g', NULL, 1, 24.76, 0.00, 5.00, 26.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:52', '2017-12-18 17:27:52'),
(185, '8906070692522', 2, 'Heera Vakkalu 50g', NULL, 1, 40.00, 0.00, 5.00, 42.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:52', '2017-12-18 17:27:52'),
(186, '8906070692539', 2, 'Heera Sukmuk 50g', NULL, 1, 11.43, 0.00, 5.00, 12.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:52', '2017-12-18 17:27:52'),
(187, '8906070692546', 1, 'Heera Ponni Boiled Rice 1kg', NULL, 1, 56.19, 0.00, 5.00, 59.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:52', '2017-12-18 17:27:52'),
(188, '8906070692553', 1, 'Heera Sharbati Wheat 1kg', NULL, 1, 35.00, 0.00, 0.00, 35.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:52', '2017-12-18 17:27:52'),
(189, '8906070692560', 2, 'Heera Sindha Salt 50g', NULL, 1, 3.00, 0.00, 0.00, 3.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:52', '2017-12-18 17:27:52'),
(190, '8906070692577', 2, 'Heera Flax Seeds 50g', NULL, 1, 6.67, 0.00, 5.00, 7.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:52', '2017-12-18 17:27:52'),
(191, '8906070692584', 2, 'Heera PachaiKarpooram 25g', NULL, 1, 11.86, 0.00, 18.00, 14.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:52', '2017-12-18 17:27:52'),
(192, '8906070692591', 2, 'Heera Sabjja Seeds 50g', NULL, 1, 7.62, 0.00, 5.00, 8.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:52', '2017-12-18 17:27:52'),
(193, '8906070692607', 2, 'Heera Biryani Flower 25g', NULL, 1, 10.48, 0.00, 5.00, 11.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:53', '2017-12-18 17:27:53'),
(194, '8906070692652', 2, 'Heera Supari Whole 50g', NULL, 1, 22.86, 0.00, 5.00, 24.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:53', '2017-12-18 17:27:53'),
(195, '8906070692669', 2, 'Heera Bay Leaf 25g', NULL, 1, 4.76, 0.00, 5.00, 5.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:53', '2017-12-18 17:27:53'),
(196, '8906070692676', 2, 'Heera Phool Makhana 50g', NULL, 1, 28.00, 0.00, 0.00, 28.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:53', '2017-12-18 17:27:53'),
(197, '8906070692683', 2, 'Heera Soya Chunks 200g', NULL, 1, 18.10, 0.00, 5.00, 19.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:53', '2017-12-18 17:27:53'),
(198, '8906070692690', 2, 'Heera Soya Granules 200g', NULL, 1, 23.81, 0.00, 5.00, 25.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:53', '2017-12-18 17:27:53'),
(199, '8906070692331', 2, 'Heera Puffed Rice 100g', NULL, 1, 9.00, 0.00, 0.00, 9.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:53', '2017-12-18 17:27:53'),
(200, '8906070692232', 2, 'Heera Poha Thin 200g', NULL, 1, 12.00, 0.00, 0.00, 12.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:53', '2017-12-18 17:27:53'),
(201, '8906070692614', 2, 'Heera Kunkudukai 200g', NULL, 1, 16.19, 0.00, 5.00, 17.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:53', '2017-12-18 17:27:53'),
(202, '8906070692621', 2, 'Heera Kesar Supari 50g', NULL, 1, 27.62, 0.00, 5.00, 29.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:53', '2017-12-18 17:27:53'),
(203, '8906070692638', 2, 'Heera Alubukhara 50g', NULL, 1, 25.00, 0.00, 0.00, 25.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:53', '2017-12-18 17:27:53'),
(204, '8906070692645', 2, 'Heera Karakkai 50g', NULL, 1, 4.00, 0.00, 0.00, 4.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:53', '2017-12-18 17:27:53'),
(205, '8908003403205', 2, 'Heera Pumpkin Seeds 500g', NULL, 1, 256.19, 0.00, 5.00, 269.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:53', '2017-12-18 17:27:53'),
(206, '8906070691754', 1, 'Heera Sonamasuri Rice Raw 5kg', NULL, 1, 257.14, 0.00, 5.00, 270.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:53', '2017-12-18 17:27:53'),
(207, '21025', 1, 'Heera Royal Raw Rice 1kg', NULL, 1, 75.24, 0.00, 5.00, 79.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:53', '2017-12-18 17:27:53'),
(208, '21026', 1, 'Heera Sona Masoori Steam Rice 1kg', NULL, 1, 41.90, 0.00, 5.00, 44.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:53', '2017-12-18 17:27:53'),
(209, '8906070691747', 1, 'Heera Sona Masoori Raw Rice 1kg', NULL, 1, 55.24, 0.00, 5.00, 58.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:53', '2017-12-18 17:27:53'),
(210, '21031', 1, 'Heera Basmati Rice 25kg', NULL, 1, 1871.43, 0.00, 5.00, 999.99, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:53', '2017-12-18 17:27:53'),
(211, '21032', 1, 'Heera Tasting Salt 25kg', NULL, 1, 2127.12, 0.00, 18.00, 999.99, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:53', '2017-12-18 17:27:53'),
(212, '21073', 1, 'Heera Urad Round 25kg', NULL, 1, 2228.57, 0.00, 5.00, 999.99, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:53', '2017-12-18 17:27:53'),
(213, '21074', 1, 'Heera Masoor Dal 25kg', NULL, 1, 1500.00, 0.00, 5.00, 999.99, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:53', '2017-12-18 17:27:53'),
(214, '8906070692713', 1, 'Heera Toor Dal 25kg', NULL, 1, 1895.24, 0.00, 5.00, 999.99, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:53', '2017-12-18 17:27:53'),
(215, '8906070692706', 1, 'Heera Moong Dal 25kg', NULL, 1, 1866.67, 0.00, 5.00, 999.99, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:53', '2017-12-18 17:27:53'),
(216, '21077', 1, 'Heera Bombay Rawa 25kg', NULL, 1, 885.71, 0.00, 5.00, 930.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:53', '2017-12-18 17:27:53'),
(217, '21138', 1, 'Heera Dry Copra 10kg', NULL, 1, 1800.00, 0.00, 5.00, 999.99, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:53', '2017-12-18 17:27:53'),
(218, '8906070692737', 1, 'Heera Idli Rava 25kg', NULL, 1, 857.14, 0.00, 5.00, 900.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:53', '2017-12-18 17:27:53'),
(219, '21134', 1, 'Heera Urad Dal 25kg', NULL, 1, 2061.90, 0.00, 5.00, 999.99, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:53', '2017-12-18 17:27:53'),
(220, '21141', 1, 'Heera Til Regular 20kg', NULL, 1, 1985.71, 0.00, 5.00, 999.99, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:53', '2017-12-18 17:27:53'),
(221, '21139', 1, 'Heera Jeera 15kg', NULL, 1, 3576.19, 0.00, 5.00, 999.99, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:53', '2017-12-18 17:27:53'),
(222, '21033', 1, 'Heera Maida 20kg', NULL, 1, 714.29, 0.00, 5.00, 750.00, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:53', '2017-12-18 17:27:53'),
(223, '21137', 1, 'Heera Ground Nut 20kg', NULL, 1, 2133.33, 5.00, 5.00, 999.99, 1, '1', NULL, NULL, NULL, NULL, '2017-12-18 17:27:53', '2017-12-19 10:12:19');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_orders`
--

CREATE TABLE `purchase_orders` (
  `id` int(11) NOT NULL,
  `purchase_no` varchar(50) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `addedById` int(11) NOT NULL,
  `transfer_request_id` int(11) DEFAULT NULL,
  `stock_status` enum('direct','transfer') NOT NULL DEFAULT 'direct',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchase_orders`
--

INSERT INTO `purchase_orders` (`id`, `purchase_no`, `branch_id`, `addedById`, `transfer_request_id`, `stock_status`, `created_at`, `updated_at`) VALUES
(1, '1', 1, 1, NULL, 'direct', '2017-12-18 17:28:46', '2017-12-18 17:28:46'),
(2, '2', 1, 1, NULL, 'direct', '2017-12-18 17:28:46', '2017-12-18 17:28:46'),
(3, '3', 1, 1, NULL, 'direct', '2017-12-18 17:28:47', '2017-12-18 17:28:47'),
(4, '4', 1, 1, NULL, 'direct', '2017-12-18 17:28:47', '2017-12-18 17:28:47'),
(5, '5', 1, 1, NULL, 'direct', '2017-12-18 17:28:47', '2017-12-18 17:28:47'),
(6, '6', 1, 1, NULL, 'direct', '2017-12-18 17:28:47', '2017-12-18 17:28:47'),
(7, '7', 1, 1, NULL, 'direct', '2017-12-18 17:28:47', '2017-12-18 17:28:47'),
(8, '8', 1, 1, NULL, 'direct', '2017-12-18 17:28:47', '2017-12-18 17:28:47'),
(9, '9', 1, 1, NULL, 'direct', '2017-12-18 17:28:47', '2017-12-18 17:28:47'),
(10, '10', 1, 1, NULL, 'direct', '2017-12-18 17:28:47', '2017-12-18 17:28:47'),
(11, '11', 1, 1, NULL, 'direct', '2017-12-18 17:28:47', '2017-12-18 17:28:47'),
(12, '12', 1, 1, NULL, 'direct', '2017-12-18 17:28:47', '2017-12-18 17:28:47'),
(13, '13', 1, 1, NULL, 'direct', '2017-12-18 17:28:47', '2017-12-18 17:28:47'),
(14, '14', 1, 1, NULL, 'direct', '2017-12-18 17:28:47', '2017-12-18 17:28:47'),
(15, '15', 1, 1, NULL, 'direct', '2017-12-18 17:28:47', '2017-12-18 17:28:47'),
(16, '16', 1, 1, NULL, 'direct', '2017-12-18 17:28:47', '2017-12-18 17:28:47'),
(17, '17', 1, 1, NULL, 'direct', '2017-12-18 17:28:47', '2017-12-18 17:28:47'),
(18, '18', 1, 1, NULL, 'direct', '2017-12-18 17:28:47', '2017-12-18 17:28:47'),
(19, '19', 1, 1, NULL, 'direct', '2017-12-18 17:28:47', '2017-12-18 17:28:47'),
(20, '20', 1, 1, NULL, 'direct', '2017-12-18 17:28:48', '2017-12-18 17:28:48'),
(21, '21', 1, 1, NULL, 'direct', '2017-12-18 17:28:48', '2017-12-18 17:28:48'),
(22, '22', 1, 1, NULL, 'direct', '2017-12-18 17:28:48', '2017-12-18 17:28:48'),
(23, '23', 1, 1, NULL, 'direct', '2017-12-18 17:28:48', '2017-12-18 17:28:48'),
(24, '24', 1, 1, NULL, 'direct', '2017-12-18 17:28:48', '2017-12-18 17:28:48'),
(25, '25', 1, 1, NULL, 'direct', '2017-12-18 17:28:48', '2017-12-18 17:28:48'),
(26, '26', 1, 1, NULL, 'direct', '2017-12-18 17:28:48', '2017-12-18 17:28:48'),
(27, '27', 1, 1, NULL, 'direct', '2017-12-18 17:28:48', '2017-12-18 17:28:48'),
(28, '28', 1, 1, NULL, 'direct', '2017-12-18 17:28:48', '2017-12-18 17:28:48'),
(29, '29', 1, 1, NULL, 'direct', '2017-12-18 17:28:48', '2017-12-18 17:28:48'),
(30, '30', 1, 1, NULL, 'direct', '2017-12-18 17:28:48', '2017-12-18 17:28:48'),
(31, '31', 1, 1, NULL, 'direct', '2017-12-18 17:28:48', '2017-12-18 17:28:48'),
(32, '32', 1, 1, NULL, 'direct', '2017-12-18 17:28:48', '2017-12-18 17:28:48'),
(33, '33', 1, 1, NULL, 'direct', '2017-12-18 17:28:48', '2017-12-18 17:28:48'),
(34, '34', 1, 1, NULL, 'direct', '2017-12-18 17:28:48', '2017-12-18 17:28:48'),
(35, '35', 1, 1, NULL, 'direct', '2017-12-18 17:28:48', '2017-12-18 17:28:48'),
(36, '36', 1, 1, NULL, 'direct', '2017-12-18 17:28:48', '2017-12-18 17:28:48'),
(37, '37', 1, 1, NULL, 'direct', '2017-12-18 17:28:48', '2017-12-18 17:28:48'),
(38, '38', 1, 1, NULL, 'direct', '2017-12-18 17:28:48', '2017-12-18 17:28:48'),
(39, '39', 1, 1, NULL, 'direct', '2017-12-18 17:28:48', '2017-12-18 17:28:48'),
(40, '40', 1, 1, NULL, 'direct', '2017-12-18 17:28:49', '2017-12-18 17:28:49'),
(41, '41', 1, 1, NULL, 'direct', '2017-12-18 17:28:49', '2017-12-18 17:28:49'),
(42, '42', 1, 1, NULL, 'direct', '2017-12-18 17:28:49', '2017-12-18 17:28:49'),
(43, '43', 1, 1, NULL, 'direct', '2017-12-18 17:28:49', '2017-12-18 17:28:49'),
(44, '44', 1, 1, NULL, 'direct', '2017-12-18 17:28:49', '2017-12-18 17:28:49'),
(45, '45', 1, 1, NULL, 'direct', '2017-12-18 17:28:49', '2017-12-18 17:28:49'),
(46, '46', 1, 1, NULL, 'direct', '2017-12-18 17:28:49', '2017-12-18 17:28:49'),
(47, '47', 1, 1, NULL, 'direct', '2017-12-18 17:28:49', '2017-12-18 17:28:49'),
(48, '48', 1, 1, NULL, 'direct', '2017-12-18 17:28:49', '2017-12-18 17:28:49'),
(49, '49', 1, 1, NULL, 'direct', '2017-12-18 17:28:49', '2017-12-18 17:28:49'),
(50, '50', 1, 1, NULL, 'direct', '2017-12-18 17:28:49', '2017-12-18 17:28:49'),
(51, '51', 1, 1, NULL, 'direct', '2017-12-18 17:28:49', '2017-12-18 17:28:49'),
(52, '52', 1, 1, NULL, 'direct', '2017-12-18 17:28:49', '2017-12-18 17:28:49'),
(53, '53', 1, 1, NULL, 'direct', '2017-12-18 17:28:49', '2017-12-18 17:28:49'),
(54, '54', 1, 1, NULL, 'direct', '2017-12-18 17:28:49', '2017-12-18 17:28:49'),
(55, '55', 1, 1, NULL, 'direct', '2017-12-18 17:28:49', '2017-12-18 17:28:49'),
(56, '56', 1, 1, NULL, 'direct', '2017-12-18 17:28:49', '2017-12-18 17:28:49'),
(57, '57', 1, 1, NULL, 'direct', '2017-12-18 17:28:49', '2017-12-18 17:28:49'),
(58, '58', 1, 1, NULL, 'direct', '2017-12-18 17:28:49', '2017-12-18 17:28:49'),
(59, '59', 1, 1, NULL, 'direct', '2017-12-18 17:28:49', '2017-12-18 17:28:49'),
(60, '60', 1, 1, NULL, 'direct', '2017-12-18 17:28:50', '2017-12-18 17:28:50'),
(61, '61', 1, 1, NULL, 'direct', '2017-12-18 17:28:50', '2017-12-18 17:28:50'),
(62, '62', 1, 1, NULL, 'direct', '2017-12-18 17:28:50', '2017-12-18 17:28:50'),
(63, '63', 1, 1, NULL, 'direct', '2017-12-18 17:28:50', '2017-12-18 17:28:50'),
(64, '64', 1, 1, NULL, 'direct', '2017-12-18 17:28:50', '2017-12-18 17:28:50'),
(65, '65', 1, 1, NULL, 'direct', '2017-12-18 17:28:50', '2017-12-18 17:28:50'),
(66, '66', 1, 1, NULL, 'direct', '2017-12-18 17:28:50', '2017-12-18 17:28:50'),
(67, '67', 1, 1, NULL, 'direct', '2017-12-18 17:28:50', '2017-12-18 17:28:50'),
(68, '68', 1, 1, NULL, 'direct', '2017-12-18 17:28:50', '2017-12-18 17:28:50'),
(69, '69', 1, 1, NULL, 'direct', '2017-12-18 17:28:50', '2017-12-18 17:28:50'),
(70, '70', 1, 1, NULL, 'direct', '2017-12-18 17:28:50', '2017-12-18 17:28:50'),
(71, '71', 1, 1, NULL, 'direct', '2017-12-18 17:28:50', '2017-12-18 17:28:50'),
(72, '72', 1, 1, NULL, 'direct', '2017-12-18 17:28:50', '2017-12-18 17:28:50'),
(73, '73', 1, 1, NULL, 'direct', '2017-12-18 17:28:50', '2017-12-18 17:28:50'),
(74, '74', 1, 1, NULL, 'direct', '2017-12-18 17:28:50', '2017-12-18 17:28:50'),
(75, '75', 1, 1, NULL, 'direct', '2017-12-18 17:28:50', '2017-12-18 17:28:50'),
(76, '76', 1, 1, NULL, 'direct', '2017-12-18 17:28:50', '2017-12-18 17:28:50'),
(77, '77', 1, 1, NULL, 'direct', '2017-12-18 17:28:50', '2017-12-18 17:28:50'),
(78, '78', 1, 1, NULL, 'direct', '2017-12-18 17:28:50', '2017-12-18 17:28:50'),
(79, '79', 1, 1, NULL, 'direct', '2017-12-18 17:28:50', '2017-12-18 17:28:50'),
(80, '80', 1, 1, NULL, 'direct', '2017-12-18 17:28:50', '2017-12-18 17:28:50'),
(81, '81', 1, 1, NULL, 'direct', '2017-12-18 17:28:51', '2017-12-18 17:28:51'),
(82, '82', 1, 1, NULL, 'direct', '2017-12-18 17:28:51', '2017-12-18 17:28:51'),
(83, '83', 1, 1, NULL, 'direct', '2017-12-18 17:28:51', '2017-12-18 17:28:51'),
(84, '84', 1, 1, NULL, 'direct', '2017-12-18 17:28:51', '2017-12-18 17:28:51'),
(85, '85', 1, 1, NULL, 'direct', '2017-12-18 17:28:51', '2017-12-18 17:28:51'),
(86, '86', 1, 1, NULL, 'direct', '2017-12-18 17:28:51', '2017-12-18 17:28:51'),
(87, '87', 1, 1, NULL, 'direct', '2017-12-18 17:28:51', '2017-12-18 17:28:51'),
(88, '88', 1, 1, NULL, 'direct', '2017-12-18 17:28:51', '2017-12-18 17:28:51'),
(89, '89', 1, 1, NULL, 'direct', '2017-12-18 17:28:51', '2017-12-18 17:28:51'),
(90, '90', 1, 1, NULL, 'direct', '2017-12-18 17:28:51', '2017-12-18 17:28:51'),
(91, '91', 1, 1, NULL, 'direct', '2017-12-18 17:28:51', '2017-12-18 17:28:51'),
(92, '92', 1, 1, NULL, 'direct', '2017-12-18 17:28:51', '2017-12-18 17:28:51'),
(93, '93', 1, 1, NULL, 'direct', '2017-12-18 17:28:51', '2017-12-18 17:28:51'),
(94, '94', 1, 1, NULL, 'direct', '2017-12-18 17:28:51', '2017-12-18 17:28:51'),
(95, '95', 1, 1, NULL, 'direct', '2017-12-18 17:28:51', '2017-12-18 17:28:51'),
(96, '96', 1, 1, NULL, 'direct', '2017-12-18 17:28:51', '2017-12-18 17:28:51'),
(97, '97', 1, 1, NULL, 'direct', '2017-12-18 17:28:51', '2017-12-18 17:28:51'),
(98, '98', 1, 1, NULL, 'direct', '2017-12-18 17:28:51', '2017-12-18 17:28:51'),
(99, '99', 1, 1, NULL, 'direct', '2017-12-18 17:28:51', '2017-12-18 17:28:51'),
(100, '100', 1, 1, NULL, 'direct', '2017-12-18 17:28:51', '2017-12-18 17:28:51'),
(101, '101', 1, 1, NULL, 'direct', '2017-12-18 17:28:51', '2017-12-18 17:28:51'),
(102, '102', 1, 1, NULL, 'direct', '2017-12-18 17:28:51', '2017-12-18 17:28:51'),
(103, '103', 1, 1, NULL, 'direct', '2017-12-18 17:28:52', '2017-12-18 17:28:52'),
(104, '104', 1, 1, NULL, 'direct', '2017-12-18 17:28:52', '2017-12-18 17:28:52'),
(105, '105', 1, 1, NULL, 'direct', '2017-12-18 17:28:52', '2017-12-18 17:28:52'),
(106, '106', 1, 1, NULL, 'direct', '2017-12-18 17:28:52', '2017-12-18 17:28:52'),
(107, '107', 1, 1, NULL, 'direct', '2017-12-18 17:28:52', '2017-12-18 17:28:52'),
(108, '108', 1, 1, NULL, 'direct', '2017-12-18 17:28:52', '2017-12-18 17:28:52'),
(109, '109', 1, 1, NULL, 'direct', '2017-12-18 17:28:52', '2017-12-18 17:28:52'),
(110, '110', 1, 1, NULL, 'direct', '2017-12-18 17:28:52', '2017-12-18 17:28:52'),
(111, '111', 1, 1, NULL, 'direct', '2017-12-18 17:28:52', '2017-12-18 17:28:52'),
(112, '112', 1, 1, NULL, 'direct', '2017-12-18 17:28:52', '2017-12-18 17:28:52'),
(113, '113', 1, 1, NULL, 'direct', '2017-12-18 17:28:52', '2017-12-18 17:28:52'),
(114, '114', 1, 1, NULL, 'direct', '2017-12-18 17:28:52', '2017-12-18 17:28:52'),
(115, '115', 1, 1, NULL, 'direct', '2017-12-18 17:28:52', '2017-12-18 17:28:52'),
(116, '116', 1, 1, NULL, 'direct', '2017-12-18 17:28:52', '2017-12-18 17:28:52'),
(117, '117', 1, 1, NULL, 'direct', '2017-12-18 17:28:52', '2017-12-18 17:28:52'),
(118, '118', 1, 1, NULL, 'direct', '2017-12-18 17:28:52', '2017-12-18 17:28:52'),
(119, '119', 1, 1, NULL, 'direct', '2017-12-18 17:28:52', '2017-12-18 17:28:52'),
(120, '120', 1, 1, NULL, 'direct', '2017-12-18 17:28:52', '2017-12-18 17:28:52'),
(121, '121', 1, 1, NULL, 'direct', '2017-12-18 17:28:52', '2017-12-18 17:28:52'),
(122, '122', 1, 1, NULL, 'direct', '2017-12-18 17:28:52', '2017-12-18 17:28:52'),
(123, '123', 1, 1, NULL, 'direct', '2017-12-18 17:28:52', '2017-12-18 17:28:52'),
(124, '124', 1, 1, NULL, 'direct', '2017-12-18 17:28:52', '2017-12-18 17:28:52'),
(125, '125', 1, 1, NULL, 'direct', '2017-12-18 17:28:52', '2017-12-18 17:28:52'),
(126, '126', 1, 1, NULL, 'direct', '2017-12-18 17:28:52', '2017-12-18 17:28:52'),
(127, '127', 1, 1, NULL, 'direct', '2017-12-18 17:28:53', '2017-12-18 17:28:53'),
(128, '128', 1, 1, NULL, 'direct', '2017-12-18 17:28:53', '2017-12-18 17:28:53'),
(129, '129', 1, 1, NULL, 'direct', '2017-12-18 17:28:53', '2017-12-18 17:28:53'),
(130, '130', 1, 1, NULL, 'direct', '2017-12-18 17:28:53', '2017-12-18 17:28:53'),
(131, '131', 1, 1, NULL, 'direct', '2017-12-18 17:28:53', '2017-12-18 17:28:53'),
(132, '132', 1, 1, NULL, 'direct', '2017-12-18 17:28:53', '2017-12-18 17:28:53'),
(133, '133', 1, 1, NULL, 'direct', '2017-12-18 17:28:53', '2017-12-18 17:28:53'),
(134, '134', 1, 1, NULL, 'direct', '2017-12-18 17:28:53', '2017-12-18 17:28:53'),
(135, '135', 1, 1, NULL, 'direct', '2017-12-18 17:28:53', '2017-12-18 17:28:53'),
(136, '136', 1, 1, NULL, 'direct', '2017-12-18 17:28:53', '2017-12-18 17:28:53'),
(137, '137', 1, 1, NULL, 'direct', '2017-12-18 17:28:53', '2017-12-18 17:28:53'),
(138, '138', 1, 1, NULL, 'direct', '2017-12-18 17:28:53', '2017-12-18 17:28:53'),
(139, '139', 1, 1, NULL, 'direct', '2017-12-18 17:28:53', '2017-12-18 17:28:53'),
(140, '140', 1, 1, NULL, 'direct', '2017-12-18 17:28:53', '2017-12-18 17:28:53'),
(141, '141', 1, 1, NULL, 'direct', '2017-12-18 17:28:53', '2017-12-18 17:28:53'),
(142, '142', 1, 1, NULL, 'direct', '2017-12-18 17:28:53', '2017-12-18 17:28:53'),
(143, '143', 1, 1, NULL, 'direct', '2017-12-18 17:28:53', '2017-12-18 17:28:53'),
(144, '144', 1, 1, NULL, 'direct', '2017-12-18 17:28:53', '2017-12-18 17:28:53'),
(145, '145', 1, 1, NULL, 'direct', '2017-12-18 17:28:54', '2017-12-18 17:28:54'),
(146, '146', 1, 1, NULL, 'direct', '2017-12-18 17:28:54', '2017-12-18 17:28:54'),
(147, '147', 1, 1, NULL, 'direct', '2017-12-18 17:28:54', '2017-12-18 17:28:54'),
(148, '148', 1, 1, NULL, 'direct', '2017-12-18 17:28:54', '2017-12-18 17:28:54'),
(149, '149', 1, 1, NULL, 'direct', '2017-12-18 17:28:54', '2017-12-18 17:28:54'),
(150, '150', 1, 1, NULL, 'direct', '2017-12-18 17:28:54', '2017-12-18 17:28:54'),
(151, '151', 1, 1, NULL, 'direct', '2017-12-18 17:28:54', '2017-12-18 17:28:54'),
(152, '152', 1, 1, NULL, 'direct', '2017-12-18 17:28:54', '2017-12-18 17:28:54'),
(153, '153', 1, 1, NULL, 'direct', '2017-12-18 17:28:54', '2017-12-18 17:28:54'),
(154, '154', 1, 1, NULL, 'direct', '2017-12-18 17:28:54', '2017-12-18 17:28:54'),
(155, '155', 1, 1, NULL, 'direct', '2017-12-18 17:28:54', '2017-12-18 17:28:54'),
(156, '156', 1, 1, NULL, 'direct', '2017-12-18 17:28:54', '2017-12-18 17:28:54'),
(157, '157', 1, 1, NULL, 'direct', '2017-12-18 17:28:54', '2017-12-18 17:28:54'),
(158, '158', 1, 1, NULL, 'direct', '2017-12-18 17:28:54', '2017-12-18 17:28:54'),
(159, '159', 1, 1, NULL, 'direct', '2017-12-18 17:28:54', '2017-12-18 17:28:54'),
(160, '160', 1, 1, NULL, 'direct', '2017-12-18 17:28:54', '2017-12-18 17:28:54'),
(161, '161', 1, 1, NULL, 'direct', '2017-12-18 17:28:54', '2017-12-18 17:28:54'),
(162, '162', 1, 1, NULL, 'direct', '2017-12-18 17:28:54', '2017-12-18 17:28:54'),
(163, '163', 1, 1, NULL, 'direct', '2017-12-18 17:28:54', '2017-12-18 17:28:54'),
(164, '164', 1, 1, NULL, 'direct', '2017-12-18 17:28:54', '2017-12-18 17:28:54'),
(165, '165', 1, 1, NULL, 'direct', '2017-12-18 17:28:54', '2017-12-18 17:28:54'),
(166, '166', 1, 1, NULL, 'direct', '2017-12-18 17:28:55', '2017-12-18 17:28:55'),
(167, '167', 1, 1, NULL, 'direct', '2017-12-18 17:28:55', '2017-12-18 17:28:55'),
(168, '168', 1, 1, NULL, 'direct', '2017-12-18 17:28:55', '2017-12-18 17:28:55'),
(169, '169', 1, 1, NULL, 'direct', '2017-12-18 17:28:55', '2017-12-18 17:28:55'),
(170, '170', 1, 1, NULL, 'direct', '2017-12-18 17:28:55', '2017-12-18 17:28:55'),
(171, '171', 1, 1, NULL, 'direct', '2017-12-18 17:28:55', '2017-12-18 17:28:55'),
(172, '172', 1, 1, NULL, 'direct', '2017-12-18 17:28:55', '2017-12-18 17:28:55'),
(173, '173', 1, 1, NULL, 'direct', '2017-12-18 17:28:55', '2017-12-18 17:28:55'),
(174, '174', 1, 1, NULL, 'direct', '2017-12-18 17:28:55', '2017-12-18 17:28:55'),
(175, '175', 1, 1, NULL, 'direct', '2017-12-18 17:28:55', '2017-12-18 17:28:55'),
(176, '176', 1, 1, NULL, 'direct', '2017-12-18 17:28:55', '2017-12-18 17:28:55'),
(177, '177', 1, 1, NULL, 'direct', '2017-12-18 17:28:55', '2017-12-18 17:28:55'),
(178, '178', 1, 1, NULL, 'direct', '2017-12-18 17:28:55', '2017-12-18 17:28:55'),
(179, '179', 1, 1, NULL, 'direct', '2017-12-18 17:28:55', '2017-12-18 17:28:55'),
(180, '180', 1, 1, NULL, 'direct', '2017-12-18 17:28:55', '2017-12-18 17:28:55'),
(181, '181', 1, 1, NULL, 'direct', '2017-12-18 17:28:55', '2017-12-18 17:28:55'),
(182, '182', 1, 1, NULL, 'direct', '2017-12-18 17:28:55', '2017-12-18 17:28:55'),
(183, '183', 1, 1, NULL, 'direct', '2017-12-18 17:28:55', '2017-12-18 17:28:55'),
(184, '184', 1, 1, NULL, 'direct', '2017-12-18 17:28:55', '2017-12-18 17:28:55'),
(185, '185', 1, 1, NULL, 'direct', '2017-12-18 17:28:55', '2017-12-18 17:28:55'),
(186, '186', 1, 1, NULL, 'direct', '2017-12-18 17:28:55', '2017-12-18 17:28:55'),
(187, '187', 1, 1, NULL, 'direct', '2017-12-18 17:28:56', '2017-12-18 17:28:56'),
(188, '188', 1, 1, NULL, 'direct', '2017-12-18 17:28:56', '2017-12-18 17:28:56'),
(189, '189', 1, 1, NULL, 'direct', '2017-12-18 17:28:56', '2017-12-18 17:28:56'),
(190, '190', 1, 1, NULL, 'direct', '2017-12-18 17:28:56', '2017-12-18 17:28:56'),
(191, '191', 1, 1, NULL, 'direct', '2017-12-18 17:28:56', '2017-12-18 17:28:56'),
(192, '192', 1, 1, NULL, 'direct', '2017-12-18 17:28:56', '2017-12-18 17:28:56'),
(193, '193', 1, 1, NULL, 'direct', '2017-12-18 17:28:56', '2017-12-18 17:28:56'),
(194, '194', 1, 1, NULL, 'direct', '2017-12-18 17:28:56', '2017-12-18 17:28:56'),
(195, '195', 1, 1, NULL, 'direct', '2017-12-18 17:28:56', '2017-12-18 17:28:56'),
(196, '196', 1, 1, NULL, 'direct', '2017-12-18 17:28:56', '2017-12-18 17:28:56'),
(197, '197', 1, 1, NULL, 'direct', '2017-12-18 17:28:56', '2017-12-18 17:28:56'),
(198, '198', 1, 1, NULL, 'direct', '2017-12-18 17:28:56', '2017-12-18 17:28:56'),
(199, '199', 1, 1, NULL, 'direct', '2017-12-18 17:28:56', '2017-12-18 17:28:56'),
(200, '200', 1, 1, NULL, 'direct', '2017-12-18 17:28:56', '2017-12-18 17:28:56'),
(201, '201', 1, 1, NULL, 'direct', '2017-12-18 17:28:56', '2017-12-18 17:28:56'),
(202, '202', 1, 1, NULL, 'direct', '2017-12-18 17:28:56', '2017-12-18 17:28:56'),
(203, '203', 1, 1, NULL, 'direct', '2017-12-18 17:28:56', '2017-12-18 17:28:56'),
(204, '204', 1, 1, NULL, 'direct', '2017-12-18 17:28:56', '2017-12-18 17:28:56'),
(205, '205', 1, 1, NULL, 'direct', '2017-12-18 17:28:56', '2017-12-18 17:28:56'),
(206, '206', 1, 1, NULL, 'direct', '2017-12-18 17:28:57', '2017-12-18 17:28:57'),
(207, '207', 1, 1, NULL, 'direct', '2017-12-18 17:28:57', '2017-12-18 17:28:57'),
(208, '208', 1, 1, NULL, 'direct', '2017-12-18 17:28:57', '2017-12-18 17:28:57'),
(209, '209', 1, 1, NULL, 'direct', '2017-12-18 17:28:57', '2017-12-18 17:28:57'),
(210, '210', 1, 1, NULL, 'direct', '2017-12-18 17:28:57', '2017-12-18 17:28:57'),
(211, '211', 1, 1, NULL, 'direct', '2017-12-18 17:28:57', '2017-12-18 17:28:57'),
(212, '212', 1, 1, NULL, 'direct', '2017-12-18 17:28:57', '2017-12-18 17:28:57'),
(213, '213', 1, 1, NULL, 'direct', '2017-12-18 17:28:57', '2017-12-18 17:28:57'),
(214, '214', 1, 1, NULL, 'direct', '2017-12-18 17:28:57', '2017-12-18 17:28:57'),
(215, '215', 1, 1, NULL, 'direct', '2017-12-18 17:28:57', '2017-12-18 17:28:57'),
(216, '216', 1, 1, NULL, 'direct', '2017-12-18 17:28:57', '2017-12-18 17:28:57'),
(217, '217', 1, 1, NULL, 'direct', '2017-12-18 17:28:57', '2017-12-18 17:28:57'),
(218, '218', 1, 1, NULL, 'direct', '2017-12-18 17:28:57', '2017-12-18 17:28:57'),
(219, '219', 1, 1, NULL, 'direct', '2017-12-18 17:28:57', '2017-12-18 17:28:57'),
(220, '220', 1, 1, NULL, 'direct', '2017-12-18 17:28:57', '2017-12-18 17:28:57'),
(221, '221', 1, 1, NULL, 'direct', '2017-12-18 17:28:57', '2017-12-18 17:28:57'),
(222, '222', 1, 1, NULL, 'direct', '2017-12-18 17:28:57', '2017-12-18 17:28:57'),
(223, '223', 1, 1, NULL, 'direct', '2017-12-18 17:28:58', '2017-12-18 17:28:58'),
(224, '0000000224', 1, 1, NULL, 'direct', '2017-12-19 10:12:19', '2017-12-19 10:12:19'),
(225, '0000000225', 1, 18, NULL, 'direct', '2017-12-22 14:53:52', '2017-12-22 14:53:52'),
(226, '0000000226', 1, 1, NULL, 'direct', '2018-01-01 13:29:18', '2018-01-01 13:29:18');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_products`
--

CREATE TABLE `purchase_products` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `product_qty` int(11) NOT NULL,
  `basic_cost` decimal(10,0) NOT NULL,
  `discount` decimal(10,0) NOT NULL,
  `gst` decimal(10,0) NOT NULL,
  `billing_price` decimal(10,0) NOT NULL,
  `expiry_date` date NOT NULL,
  `expiry_days` varchar(50) DEFAULT NULL,
  `manufacture_date` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchase_products`
--

INSERT INTO `purchase_products` (`id`, `product_id`, `order_id`, `branch_id`, `product_qty`, `basic_cost`, `discount`, `gst`, `billing_price`, `expiry_date`, `expiry_days`, `manufacture_date`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 1000, '81', '0', '5', '85', '2017-12-02', '1', '2017-12-01', '2017-12-18 17:28:46', '2017-12-18 17:28:46'),
(2, 2, 2, 1, 1000, '400', '0', '5', '420', '2017-12-03', '2', '2017-12-01', '2017-12-18 17:28:47', '2017-12-18 17:28:47'),
(3, 3, 3, 1, 1000, '42', '0', '5', '44', '2017-12-11', '10', '2017-12-01', '2017-12-18 17:28:47', '2017-12-18 17:28:47'),
(4, 4, 4, 1, 1000, '79', '0', '5', '83', '2017-12-04', '3', '2017-12-01', '2017-12-18 17:28:47', '2017-12-18 17:28:47'),
(5, 5, 5, 1, 1000, '43', '0', '5', '45', '2017-12-05', '4', '2017-12-01', '2017-12-18 17:28:47', '2017-12-18 17:28:47'),
(6, 6, 6, 1, 1000, '81', '0', '5', '85', '2017-12-06', '5', '2017-12-01', '2017-12-18 17:28:47', '2017-12-18 17:28:47'),
(7, 7, 7, 1, 1000, '23', '0', '5', '24', '2017-12-07', '6', '2017-12-01', '2017-12-18 17:28:47', '2017-12-18 17:28:47'),
(8, 8, 8, 1, 1000, '40', '0', '5', '42', '2017-12-08', '7', '2017-12-01', '2017-12-18 17:28:47', '2017-12-18 17:28:47'),
(9, 9, 9, 1, 1000, '33', '0', '18', '39', '2017-12-09', '8', '2017-12-01', '2017-12-18 17:28:47', '2017-12-18 17:28:47'),
(10, 10, 10, 1, 1000, '19', '0', '5', '20', '2017-12-10', '9', '2017-12-01', '2017-12-18 17:28:47', '2017-12-18 17:28:47'),
(11, 11, 11, 1, 1000, '11', '0', '5', '12', '2019-04-16', '500', '2017-12-02', '2017-12-18 17:28:47', '2017-12-18 17:28:47'),
(12, 12, 12, 1, 1000, '65', '0', '5', '68', '2019-04-17', '500', '2017-12-03', '2017-12-18 17:28:47', '2017-12-18 17:28:47'),
(13, 13, 13, 1, 1000, '123', '0', '5', '129', '2019-04-18', '500', '2017-12-04', '2017-12-18 17:28:47', '2017-12-18 17:28:47'),
(14, 14, 14, 1, 1000, '12', '0', '5', '13', '2019-04-19', '500', '2017-12-05', '2017-12-18 17:28:47', '2017-12-18 17:28:47'),
(15, 15, 15, 1, 1000, '55', '0', '5', '58', '2019-04-20', '500', '2017-12-06', '2017-12-18 17:28:47', '2017-12-18 17:28:47'),
(16, 16, 16, 1, 1000, '105', '0', '5', '110', '2019-04-21', '500', '2017-12-07', '2017-12-18 17:28:47', '2017-12-18 17:28:47'),
(17, 17, 17, 1, 1000, '41', '0', '5', '43', '2019-04-22', '500', '2017-12-08', '2017-12-18 17:28:47', '2017-12-18 17:28:47'),
(18, 18, 18, 1, 1000, '78', '0', '5', '82', '2019-04-23', '500', '2017-12-09', '2017-12-18 17:28:47', '2017-12-18 17:28:47'),
(19, 19, 19, 1, 1000, '50', '0', '5', '53', '2019-04-24', '500', '2017-12-10', '2017-12-18 17:28:47', '2017-12-18 17:28:47'),
(20, 20, 20, 1, 1000, '32', '0', '5', '34', '2019-04-25', '500', '2017-12-11', '2017-12-18 17:28:48', '2017-12-18 17:28:48'),
(21, 21, 21, 1, 1000, '17', '0', '5', '18', '2019-04-26', '500', '2017-12-12', '2017-12-18 17:28:48', '2017-12-18 17:28:48'),
(22, 22, 22, 1, 1000, '26', '0', '0', '26', '2019-04-27', '500', '2017-12-13', '2017-12-18 17:28:48', '2017-12-18 17:28:48'),
(23, 23, 23, 1, 1000, '29', '0', '5', '30', '2019-04-28', '500', '2017-12-14', '2017-12-18 17:28:48', '2017-12-18 17:28:48'),
(24, 24, 24, 1, 1000, '45', '0', '5', '47', '2019-04-29', '500', '2017-12-15', '2017-12-18 17:28:48', '2017-12-18 17:28:48'),
(25, 25, 25, 1, 1000, '37', '0', '5', '39', '2019-04-30', '500', '2017-12-16', '2017-12-18 17:28:48', '2017-12-18 17:28:48'),
(26, 26, 26, 1, 1000, '20', '0', '5', '21', '2019-05-01', '500', '2017-12-17', '2017-12-18 17:28:48', '2017-12-18 17:28:48'),
(27, 27, 27, 1, 1000, '45', '0', '5', '47', '2019-05-02', '500', '2017-12-18', '2017-12-18 17:28:48', '2017-12-18 17:28:48'),
(28, 28, 28, 1, 1000, '86', '0', '5', '90', '2019-05-03', '500', '2017-12-19', '2017-12-18 17:28:48', '2017-12-18 17:28:48'),
(29, 29, 29, 1, 1000, '46', '0', '5', '48', '2019-05-04', '500', '2017-12-20', '2017-12-18 17:28:48', '2017-12-18 17:28:48'),
(30, 30, 30, 1, 1000, '16', '0', '5', '17', '2019-05-05', '500', '2017-12-21', '2017-12-18 17:28:48', '2017-12-18 17:28:48'),
(31, 31, 31, 1, 1000, '48', '0', '5', '50', '2019-05-06', '500', '2017-12-22', '2017-12-18 17:28:48', '2017-12-18 17:28:48'),
(32, 32, 32, 1, 1000, '10', '0', '5', '11', '2019-05-07', '500', '2017-12-23', '2017-12-18 17:28:48', '2017-12-18 17:28:48'),
(33, 33, 33, 1, 1000, '25', '0', '5', '26', '2019-05-08', '500', '2017-12-24', '2017-12-18 17:28:48', '2017-12-18 17:28:48'),
(34, 34, 34, 1, 1000, '83', '0', '5', '87', '2019-05-09', '500', '2017-12-25', '2017-12-18 17:28:48', '2017-12-18 17:28:48'),
(35, 35, 35, 1, 1000, '418', '0', '5', '439', '2019-05-10', '500', '2017-12-26', '2017-12-18 17:28:48', '2017-12-18 17:28:48'),
(36, 36, 36, 1, 1000, '41', '0', '5', '43', '2019-05-11', '500', '2017-12-27', '2017-12-18 17:28:48', '2017-12-18 17:28:48'),
(37, 37, 37, 1, 1000, '90', '0', '5', '94', '2019-05-12', '500', '2017-12-28', '2017-12-18 17:28:48', '2017-12-18 17:28:48'),
(38, 38, 38, 1, 1000, '68', '0', '5', '71', '2019-05-13', '500', '2017-12-29', '2017-12-18 17:28:48', '2017-12-18 17:28:48'),
(39, 39, 39, 1, 1000, '25', '0', '5', '26', '2019-05-14', '500', '2017-12-30', '2017-12-18 17:28:48', '2017-12-18 17:28:48'),
(40, 40, 40, 1, 1000, '57', '0', '5', '60', '2019-05-15', '500', '2017-12-31', '2017-12-18 17:28:49', '2017-12-18 17:28:49'),
(41, 41, 41, 1, 1000, '46', '0', '5', '48', '2019-05-16', '500', '2018-01-01', '2017-12-18 17:28:49', '2017-12-18 17:28:49'),
(42, 42, 42, 1, 1000, '159', '0', '5', '167', '2019-05-17', '500', '2018-01-02', '2017-12-18 17:28:49', '2017-12-18 17:28:49'),
(43, 43, 43, 1, 1000, '39', '0', '5', '41', '2019-05-18', '500', '2018-01-03', '2017-12-18 17:28:49', '2017-12-18 17:28:49'),
(44, 44, 44, 1, 1000, '19', '0', '12', '21', '2019-05-19', '500', '2018-01-04', '2017-12-18 17:28:49', '2017-12-18 17:28:49'),
(45, 45, 45, 1, 1000, '45', '0', '12', '50', '2019-05-20', '500', '2018-01-05', '2017-12-18 17:28:49', '2017-12-18 17:28:49'),
(46, 46, 46, 1, 1000, '9', '0', '5', '9', '2019-05-21', '500', '2018-01-06', '2017-12-18 17:28:49', '2017-12-18 17:28:49'),
(47, 47, 47, 1, 1000, '17', '0', '5', '18', '2019-05-22', '500', '2018-01-07', '2017-12-18 17:28:49', '2017-12-18 17:28:49'),
(48, 48, 48, 1, 1000, '107', '0', '12', '120', '2019-05-23', '500', '2018-01-08', '2017-12-18 17:28:49', '2017-12-18 17:28:49'),
(49, 49, 49, 1, 1000, '100', '0', '12', '112', '2019-05-24', '500', '2018-01-09', '2017-12-18 17:28:49', '2017-12-18 17:28:49'),
(50, 50, 50, 1, 1000, '239', '0', '12', '268', '2019-05-25', '500', '2018-01-10', '2017-12-18 17:28:49', '2017-12-18 17:28:49'),
(51, 51, 51, 1, 1000, '71', '0', '12', '79', '2019-05-26', '500', '2018-01-11', '2017-12-18 17:28:49', '2017-12-18 17:28:49'),
(52, 52, 52, 1, 1000, '30', '0', '5', '31', '2019-05-27', '500', '2018-01-12', '2017-12-18 17:28:49', '2017-12-18 17:28:49'),
(53, 53, 53, 1, 1000, '57', '0', '5', '60', '2019-05-28', '500', '2018-01-13', '2017-12-18 17:28:49', '2017-12-18 17:28:49'),
(54, 54, 54, 1, 1000, '8', '0', '5', '8', '2019-05-29', '500', '2018-01-14', '2017-12-18 17:28:49', '2017-12-18 17:28:49'),
(55, 55, 55, 1, 1000, '16', '0', '5', '17', '2019-05-30', '500', '2018-01-15', '2017-12-18 17:28:49', '2017-12-18 17:28:49'),
(56, 56, 56, 1, 1000, '6', '0', '18', '7', '2019-05-31', '500', '2018-01-16', '2017-12-18 17:28:49', '2017-12-18 17:28:49'),
(57, 57, 57, 1, 1000, '12', '0', '18', '14', '2019-06-01', '500', '2018-01-17', '2017-12-18 17:28:49', '2017-12-18 17:28:49'),
(58, 58, 58, 1, 1000, '11', '0', '0', '11', '2019-06-02', '500', '2018-01-18', '2017-12-18 17:28:49', '2017-12-18 17:28:49'),
(59, 59, 59, 1, 1000, '26', '0', '0', '26', '2019-06-03', '500', '2018-01-19', '2017-12-18 17:28:49', '2017-12-18 17:28:49'),
(60, 60, 60, 1, 1000, '79', '0', '12', '89', '2019-06-04', '500', '2018-01-20', '2017-12-18 17:28:50', '2017-12-18 17:28:50'),
(61, 61, 61, 1, 1000, '188', '0', '12', '211', '2019-06-05', '500', '2018-01-21', '2017-12-18 17:28:50', '2017-12-18 17:28:50'),
(62, 62, 62, 1, 1000, '50', '0', '5', '52', '2019-06-06', '500', '2018-01-22', '2017-12-18 17:28:50', '2017-12-18 17:28:50'),
(63, 63, 63, 1, 1000, '21', '0', '5', '22', '2019-06-07', '500', '2018-01-23', '2017-12-18 17:28:50', '2017-12-18 17:28:50'),
(64, 64, 64, 1, 1000, '97', '0', '12', '109', '2019-06-08', '500', '2018-01-24', '2017-12-18 17:28:50', '2017-12-18 17:28:50'),
(65, 65, 65, 1, 1000, '232', '0', '12', '260', '2019-06-09', '500', '2018-01-25', '2017-12-18 17:28:50', '2017-12-18 17:28:50'),
(66, 66, 66, 1, 1000, '73', '0', '12', '82', '2019-06-10', '500', '2018-01-26', '2017-12-18 17:28:50', '2017-12-18 17:28:50'),
(67, 67, 67, 1, 1000, '8', '0', '18', '10', '2019-06-11', '500', '2018-01-27', '2017-12-18 17:28:50', '2017-12-18 17:28:50'),
(68, 68, 68, 1, 1000, '13', '0', '5', '14', '2019-06-12', '500', '2018-01-28', '2017-12-18 17:28:50', '2017-12-18 17:28:50'),
(69, 69, 69, 1, 1000, '15', '0', '5', '16', '2019-06-13', '500', '2018-01-29', '2017-12-18 17:28:50', '2017-12-18 17:28:50'),
(70, 70, 70, 1, 1000, '30', '0', '5', '31', '2019-06-14', '500', '2018-01-30', '2017-12-18 17:28:50', '2017-12-18 17:28:50'),
(71, 71, 71, 1, 1000, '11', '0', '5', '12', '2019-06-15', '500', '2018-01-31', '2017-12-18 17:28:50', '2017-12-18 17:28:50'),
(72, 72, 72, 1, 1000, '22', '0', '5', '23', '2019-06-16', '500', '2018-02-01', '2017-12-18 17:28:50', '2017-12-18 17:28:50'),
(73, 73, 73, 1, 1000, '42', '0', '5', '44', '2019-06-17', '500', '2018-02-02', '2017-12-18 17:28:50', '2017-12-18 17:28:50'),
(74, 74, 74, 1, 1000, '33', '0', '5', '35', '2019-06-18', '500', '2018-02-03', '2017-12-18 17:28:50', '2017-12-18 17:28:50'),
(75, 75, 75, 1, 1000, '24', '0', '5', '25', '2019-06-19', '500', '2018-02-04', '2017-12-18 17:28:50', '2017-12-18 17:28:50'),
(76, 76, 76, 1, 1000, '34', '0', '5', '36', '2019-06-20', '500', '2018-02-05', '2017-12-18 17:28:50', '2017-12-18 17:28:50'),
(77, 77, 77, 1, 1000, '22', '0', '5', '23', '2019-06-21', '500', '2018-02-06', '2017-12-18 17:28:50', '2017-12-18 17:28:50'),
(78, 78, 78, 1, 1000, '22', '0', '5', '23', '2019-06-22', '500', '2018-02-07', '2017-12-18 17:28:50', '2017-12-18 17:28:50'),
(79, 79, 79, 1, 1000, '20', '0', '5', '21', '2019-06-23', '500', '2018-02-08', '2017-12-18 17:28:50', '2017-12-18 17:28:50'),
(80, 80, 80, 1, 1000, '58', '0', '5', '61', '2019-06-24', '500', '2018-02-09', '2017-12-18 17:28:50', '2017-12-18 17:28:50'),
(81, 81, 81, 1, 1000, '110', '0', '5', '115', '2019-06-25', '500', '2018-02-10', '2017-12-18 17:28:51', '2017-12-18 17:28:51'),
(82, 82, 82, 1, 1000, '152', '0', '12', '170', '2019-06-26', '500', '2018-02-11', '2017-12-18 17:28:51', '2017-12-18 17:28:51'),
(83, 83, 83, 1, 1000, '54', '0', '5', '57', '2019-06-27', '500', '2018-02-12', '2017-12-18 17:28:51', '2017-12-18 17:28:51'),
(84, 84, 84, 1, 1000, '22', '0', '12', '25', '2019-06-28', '500', '2018-02-13', '2017-12-18 17:28:51', '2017-12-18 17:28:51'),
(85, 85, 85, 1, 1000, '53', '0', '12', '59', '2019-06-29', '500', '2018-02-14', '2017-12-18 17:28:51', '2017-12-18 17:28:51'),
(86, 86, 86, 1, 1000, '19', '0', '5', '20', '2019-06-30', '500', '2018-02-15', '2017-12-18 17:28:51', '2017-12-18 17:28:51'),
(87, 87, 87, 1, 1000, '46', '0', '5', '48', '2019-07-01', '500', '2018-02-16', '2017-12-18 17:28:51', '2017-12-18 17:28:51'),
(88, 88, 88, 1, 1000, '70', '0', '5', '74', '2019-07-02', '500', '2018-02-17', '2017-12-18 17:28:51', '2017-12-18 17:28:51'),
(89, 89, 89, 1, 1000, '37', '0', '5', '39', '2019-07-03', '500', '2018-02-18', '2017-12-18 17:28:51', '2017-12-18 17:28:51'),
(90, 90, 90, 1, 1000, '81', '0', '5', '85', '2019-07-04', '500', '2018-02-19', '2017-12-18 17:28:51', '2017-12-18 17:28:51'),
(91, 91, 91, 1, 1000, '28', '0', '5', '29', '2019-07-05', '500', '2018-02-20', '2017-12-18 17:28:51', '2017-12-18 17:28:51'),
(92, 92, 92, 1, 1000, '374', '0', '5', '393', '2019-07-06', '500', '2018-02-21', '2017-12-18 17:28:51', '2017-12-18 17:28:51'),
(93, 93, 93, 1, 1000, '243', '0', '5', '255', '2019-07-07', '500', '2018-02-22', '2017-12-18 17:28:51', '2017-12-18 17:28:51'),
(94, 94, 94, 1, 1000, '27', '0', '5', '28', '2019-07-08', '500', '2018-02-23', '2017-12-18 17:28:51', '2017-12-18 17:28:51'),
(95, 95, 95, 1, 1000, '33', '0', '5', '35', '2019-07-09', '500', '2018-02-24', '2017-12-18 17:28:51', '2017-12-18 17:28:51'),
(96, 96, 96, 1, 1000, '79', '0', '5', '83', '2019-07-10', '500', '2018-02-25', '2017-12-18 17:28:51', '2017-12-18 17:28:51'),
(97, 97, 97, 1, 1000, '9', '0', '5', '9', '2019-07-11', '500', '2018-02-26', '2017-12-18 17:28:51', '2017-12-18 17:28:51'),
(98, 98, 98, 1, 1000, '19', '0', '5', '20', '2019-07-12', '500', '2018-02-27', '2017-12-18 17:28:51', '2017-12-18 17:28:51'),
(99, 99, 99, 1, 1000, '201', '0', '12', '225', '2019-07-13', '500', '2018-02-28', '2017-12-18 17:28:51', '2017-12-18 17:28:51'),
(100, 100, 100, 1, 1000, '69', '0', '0', '69', '2019-07-14', '500', '2018-03-01', '2017-12-18 17:28:51', '2017-12-18 17:28:51'),
(101, 101, 101, 1, 1000, '73', '0', '5', '77', '2019-07-15', '500', '2018-03-02', '2017-12-18 17:28:51', '2017-12-18 17:28:51'),
(102, 102, 102, 1, 1000, '30', '0', '5', '32', '2019-07-16', '500', '2018-03-03', '2017-12-18 17:28:52', '2017-12-18 17:28:52'),
(103, 103, 103, 1, 1000, '9', '0', '5', '9', '2019-07-17', '500', '2018-03-04', '2017-12-18 17:28:52', '2017-12-18 17:28:52'),
(104, 104, 104, 1, 1000, '50', '0', '5', '52', '2019-07-18', '500', '2018-03-05', '2017-12-18 17:28:52', '2017-12-18 17:28:52'),
(105, 105, 105, 1, 1000, '12', '0', '5', '13', '2019-07-19', '500', '2018-03-06', '2017-12-18 17:28:52', '2017-12-18 17:28:52'),
(106, 106, 106, 1, 1000, '229', '0', '5', '240', '2019-07-20', '500', '2018-03-07', '2017-12-18 17:28:52', '2017-12-18 17:28:52'),
(107, 107, 107, 1, 1000, '234', '0', '5', '246', '2019-07-21', '500', '2018-03-08', '2017-12-18 17:28:52', '2017-12-18 17:28:52'),
(108, 108, 108, 1, 1000, '16', '0', '5', '17', '2019-07-22', '500', '2018-03-09', '2017-12-18 17:28:52', '2017-12-18 17:28:52'),
(109, 109, 109, 1, 1000, '21', '0', '5', '22', '2019-07-23', '500', '2018-03-10', '2017-12-18 17:28:52', '2017-12-18 17:28:52'),
(110, 110, 110, 1, 1000, '29', '0', '5', '30', '2019-07-24', '500', '2018-03-11', '2017-12-18 17:28:52', '2017-12-18 17:28:52'),
(111, 111, 111, 1, 1000, '39', '0', '28', '50', '2019-07-25', '500', '2018-03-12', '2017-12-18 17:28:52', '2017-12-18 17:28:52'),
(112, 112, 112, 1, 1000, '39', '0', '28', '50', '2019-07-26', '500', '2018-03-13', '2017-12-18 17:28:52', '2017-12-18 17:28:52'),
(113, 113, 113, 1, 1000, '62', '0', '28', '79', '2019-07-27', '500', '2018-03-14', '2017-12-18 17:28:52', '2017-12-18 17:28:52'),
(114, 114, 114, 1, 1000, '43', '0', '28', '55', '2019-07-28', '500', '2018-03-15', '2017-12-18 17:28:52', '2017-12-18 17:28:52'),
(115, 115, 115, 1, 1000, '49', '0', '28', '63', '2019-07-29', '500', '2018-03-16', '2017-12-18 17:28:52', '2017-12-18 17:28:52'),
(116, 116, 116, 1, 1000, '1633', '0', '5', '1000', '2019-07-30', '500', '2018-03-17', '2017-12-18 17:28:52', '2017-12-18 17:28:52'),
(117, 117, 117, 1, 1000, '35', '0', '12', '39', '2019-07-31', '500', '2018-03-18', '2017-12-18 17:28:52', '2017-12-18 17:28:52'),
(118, 118, 118, 1, 1000, '82', '0', '12', '92', '2019-08-01', '500', '2018-03-19', '2017-12-18 17:28:52', '2017-12-18 17:28:52'),
(119, 119, 119, 1, 1000, '20', '0', '5', '21', '2019-08-02', '500', '2018-03-20', '2017-12-18 17:28:52', '2017-12-18 17:28:52'),
(120, 120, 120, 1, 1000, '39', '0', '5', '41', '2019-08-03', '500', '2018-03-21', '2017-12-18 17:28:52', '2017-12-18 17:28:52'),
(121, 121, 121, 1, 1000, '312', '0', '5', '328', '2019-08-04', '500', '2018-03-22', '2017-12-18 17:28:52', '2017-12-18 17:28:52'),
(122, 122, 122, 1, 1000, '25', '0', '18', '29', '2019-08-05', '500', '2018-03-23', '2017-12-18 17:28:52', '2017-12-18 17:28:52'),
(123, 123, 123, 1, 1000, '7', '0', '0', '7', '2019-08-06', '500', '2018-03-24', '2017-12-18 17:28:52', '2017-12-18 17:28:52'),
(124, 124, 124, 1, 1000, '12', '0', '0', '12', '2019-08-07', '500', '2018-03-25', '2017-12-18 17:28:52', '2017-12-18 17:28:52'),
(125, 125, 125, 1, 1000, '90', '0', '12', '101', '2019-08-08', '500', '2018-03-26', '2017-12-18 17:28:52', '2017-12-18 17:28:52'),
(126, 126, 126, 1, 1000, '45', '0', '12', '50', '2019-08-09', '500', '2018-03-27', '2017-12-18 17:28:53', '2017-12-18 17:28:53'),
(127, 127, 127, 1, 1000, '1071', '0', '5', '1000', '2019-08-10', '500', '2018-03-28', '2017-12-18 17:28:53', '2017-12-18 17:28:53'),
(128, 128, 128, 1, 1000, '705', '0', '5', '740', '2019-08-11', '500', '2018-03-29', '2017-12-18 17:28:53', '2017-12-18 17:28:53'),
(129, 129, 129, 1, 1000, '355', '0', '5', '373', '2019-08-12', '500', '2018-03-30', '2017-12-18 17:28:53', '2017-12-18 17:28:53'),
(130, 130, 130, 1, 1000, '26', '0', '0', '26', '2019-08-13', '500', '2018-03-31', '2017-12-18 17:28:53', '2017-12-18 17:28:53'),
(131, 131, 131, 1, 1000, '39', '0', '5', '41', '2019-08-14', '500', '2018-04-01', '2017-12-18 17:28:53', '2017-12-18 17:28:53'),
(132, 132, 132, 1, 1000, '10', '0', '5', '11', '2019-08-15', '500', '2018-04-02', '2017-12-18 17:28:53', '2017-12-18 17:28:53'),
(133, 133, 133, 1, 1000, '7', '0', '5', '7', '2019-08-16', '500', '2018-04-03', '2017-12-18 17:28:53', '2017-12-18 17:28:53'),
(134, 134, 134, 1, 1000, '11', '0', '5', '12', '2019-08-17', '500', '2018-04-04', '2017-12-18 17:28:53', '2017-12-18 17:28:53'),
(135, 135, 135, 1, 1000, '39', '0', '5', '41', '2019-08-18', '500', '2018-04-05', '2017-12-18 17:28:53', '2017-12-18 17:28:53'),
(136, 136, 136, 1, 1000, '19', '0', '0', '19', '2019-08-19', '500', '2018-04-06', '2017-12-18 17:28:53', '2017-12-18 17:28:53'),
(137, 137, 137, 1, 1000, '23', '0', '0', '23', '2019-08-20', '500', '2018-04-07', '2017-12-18 17:28:53', '2017-12-18 17:28:53'),
(138, 138, 138, 1, 1000, '19', '0', '5', '20', '2019-08-21', '500', '2018-04-08', '2017-12-18 17:28:53', '2017-12-18 17:28:53'),
(139, 139, 139, 1, 1000, '45', '0', '5', '47', '2019-08-22', '500', '2018-04-09', '2017-12-18 17:28:53', '2017-12-18 17:28:53'),
(140, 140, 140, 1, 1000, '10', '0', '0', '10', '2019-08-23', '500', '2018-04-10', '2017-12-18 17:28:53', '2017-12-18 17:28:53'),
(141, 141, 141, 1, 1000, '21', '0', '0', '21', '2019-08-24', '500', '2018-04-11', '2017-12-18 17:28:53', '2017-12-18 17:28:53'),
(142, 142, 142, 1, 1000, '44', '0', '5', '46', '2019-08-25', '500', '2018-04-12', '2017-12-18 17:28:53', '2017-12-18 17:28:53'),
(143, 143, 143, 1, 1000, '44', '0', '5', '46', '2019-08-26', '500', '2018-04-13', '2017-12-18 17:28:53', '2017-12-18 17:28:53'),
(144, 144, 144, 1, 1000, '20', '0', '5', '21', '2019-08-27', '500', '2018-04-14', '2017-12-18 17:28:53', '2017-12-18 17:28:53'),
(145, 145, 145, 1, 1000, '47', '0', '5', '49', '2019-08-28', '500', '2018-04-15', '2017-12-18 17:28:54', '2017-12-18 17:28:54'),
(146, 146, 146, 1, 1000, '21', '0', '5', '22', '2019-08-29', '500', '2018-04-16', '2017-12-18 17:28:54', '2017-12-18 17:28:54'),
(147, 147, 147, 1, 1000, '49', '0', '5', '51', '2019-08-30', '500', '2018-04-17', '2017-12-18 17:28:54', '2017-12-18 17:28:54'),
(148, 148, 148, 1, 1000, '17', '0', '5', '18', '2019-08-31', '500', '2018-04-18', '2017-12-18 17:28:54', '2017-12-18 17:28:54'),
(149, 149, 149, 1, 1000, '22', '0', '5', '23', '2019-09-01', '500', '2018-04-19', '2017-12-18 17:28:54', '2017-12-18 17:28:54'),
(150, 150, 150, 1, 1000, '97', '0', '12', '109', '2019-09-02', '500', '2018-04-20', '2017-12-18 17:28:54', '2017-12-18 17:28:54'),
(151, 151, 151, 1, 1000, '50', '0', '0', '50', '2019-09-03', '500', '2018-04-21', '2017-12-18 17:28:54', '2017-12-18 17:28:54'),
(152, 152, 152, 1, 1000, '56', '0', '5', '59', '2019-09-04', '500', '2018-04-22', '2017-12-18 17:28:54', '2017-12-18 17:28:54'),
(153, 153, 153, 1, 1000, '15', '0', '5', '16', '2019-09-05', '500', '2018-04-23', '2017-12-18 17:28:54', '2017-12-18 17:28:54'),
(154, 154, 154, 1, 1000, '30', '0', '5', '31', '2019-09-06', '500', '2018-04-24', '2017-12-18 17:28:54', '2017-12-18 17:28:54'),
(155, 155, 155, 1, 1000, '10', '0', '5', '10', '2019-09-07', '500', '2018-04-25', '2017-12-18 17:28:54', '2017-12-18 17:28:54'),
(156, 156, 156, 1, 1000, '20', '0', '5', '21', '2019-09-08', '500', '2018-04-26', '2017-12-18 17:28:54', '2017-12-18 17:28:54'),
(157, 157, 157, 1, 1000, '13', '0', '5', '14', '2019-09-09', '500', '2018-04-27', '2017-12-18 17:28:54', '2017-12-18 17:28:54'),
(158, 158, 158, 1, 1000, '26', '0', '5', '27', '2019-09-10', '500', '2018-04-28', '2017-12-18 17:28:54', '2017-12-18 17:28:54'),
(159, 159, 159, 1, 1000, '20', '0', '5', '21', '2019-09-11', '500', '2018-04-29', '2017-12-18 17:28:54', '2017-12-18 17:28:54'),
(160, 160, 160, 1, 1000, '16', '0', '5', '17', '2019-09-12', '500', '2018-04-30', '2017-12-18 17:28:54', '2017-12-18 17:28:54'),
(161, 161, 161, 1, 1000, '36', '0', '5', '38', '2019-09-13', '500', '2018-05-01', '2017-12-18 17:28:54', '2017-12-18 17:28:54'),
(162, 162, 162, 1, 1000, '12', '0', '5', '13', '2019-09-14', '500', '2018-05-02', '2017-12-18 17:28:54', '2017-12-18 17:28:54'),
(163, 163, 163, 1, 1000, '28', '0', '5', '29', '2019-09-15', '500', '2018-05-03', '2017-12-18 17:28:54', '2017-12-18 17:28:54'),
(164, 164, 164, 1, 1000, '23', '0', '5', '24', '2019-09-16', '500', '2018-05-04', '2017-12-18 17:28:54', '2017-12-18 17:28:54'),
(165, 165, 165, 1, 1000, '23', '0', '5', '24', '2019-09-17', '500', '2018-05-05', '2017-12-18 17:28:55', '2017-12-18 17:28:55'),
(166, 166, 166, 1, 1000, '28', '0', '5', '29', '2019-09-18', '500', '2018-05-06', '2017-12-18 17:28:55', '2017-12-18 17:28:55'),
(167, 167, 167, 1, 1000, '53', '0', '5', '56', '2019-09-19', '500', '2018-05-07', '2017-12-18 17:28:55', '2017-12-18 17:28:55'),
(168, 168, 168, 1, 1000, '83', '0', '5', '87', '2019-09-20', '500', '2018-05-08', '2017-12-18 17:28:55', '2017-12-18 17:28:55'),
(169, 169, 169, 1, 1000, '28', '0', '5', '29', '2019-09-21', '500', '2018-05-09', '2017-12-18 17:28:55', '2017-12-18 17:28:55'),
(170, 170, 170, 1, 1000, '21', '0', '5', '22', '2019-09-22', '500', '2018-05-10', '2017-12-18 17:28:55', '2017-12-18 17:28:55'),
(171, 171, 171, 1, 1000, '10', '0', '5', '10', '2019-09-23', '500', '2018-05-11', '2017-12-18 17:28:55', '2017-12-18 17:28:55'),
(172, 172, 172, 1, 1000, '92', '0', '5', '97', '2019-09-24', '500', '2018-05-12', '2017-12-18 17:28:55', '2017-12-18 17:28:55'),
(173, 173, 173, 1, 1000, '10', '0', '5', '10', '2019-09-25', '500', '2018-05-13', '2017-12-18 17:28:55', '2017-12-18 17:28:55'),
(174, 174, 174, 1, 1000, '30', '0', '5', '32', '2019-09-26', '500', '2018-05-14', '2017-12-18 17:28:55', '2017-12-18 17:28:55'),
(175, 175, 175, 1, 1000, '54', '0', '5', '57', '2019-09-27', '500', '2018-05-15', '2017-12-18 17:28:55', '2017-12-18 17:28:55'),
(176, 176, 176, 1, 1000, '3', '0', '0', '3', '2019-09-28', '500', '2018-05-16', '2017-12-18 17:28:55', '2017-12-18 17:28:55'),
(177, 177, 177, 1, 1000, '10', '0', '5', '10', '2019-09-29', '500', '2018-05-17', '2017-12-18 17:28:55', '2017-12-18 17:28:55'),
(178, 178, 178, 1, 1000, '15', '0', '0', '15', '2019-09-30', '500', '2018-05-18', '2017-12-18 17:28:55', '2017-12-18 17:28:55'),
(179, 179, 179, 1, 1000, '21', '0', '5', '22', '2019-10-01', '500', '2018-05-19', '2017-12-18 17:28:55', '2017-12-18 17:28:55'),
(180, 180, 180, 1, 1000, '14', '0', '5', '15', '2019-10-02', '500', '2018-05-20', '2017-12-18 17:28:55', '2017-12-18 17:28:55'),
(181, 181, 181, 1, 1000, '18', '0', '5', '19', '2019-10-03', '500', '2018-05-21', '2017-12-18 17:28:55', '2017-12-18 17:28:55'),
(182, 182, 182, 1, 1000, '60', '0', '5', '63', '2019-10-04', '500', '2018-05-22', '2017-12-18 17:28:55', '2017-12-18 17:28:55'),
(183, 183, 183, 1, 1000, '26', '0', '5', '27', '2019-10-05', '500', '2018-05-23', '2017-12-18 17:28:55', '2017-12-18 17:28:55'),
(184, 184, 184, 1, 1000, '25', '0', '5', '26', '2019-10-06', '500', '2018-05-24', '2017-12-18 17:28:55', '2017-12-18 17:28:55'),
(185, 185, 185, 1, 1000, '40', '0', '5', '42', '2019-10-07', '500', '2018-05-25', '2017-12-18 17:28:55', '2017-12-18 17:28:55'),
(186, 186, 186, 1, 1000, '11', '0', '5', '12', '2019-10-08', '500', '2018-05-26', '2017-12-18 17:28:56', '2017-12-18 17:28:56'),
(187, 187, 187, 1, 1000, '56', '0', '5', '59', '2019-10-09', '500', '2018-05-27', '2017-12-18 17:28:56', '2017-12-18 17:28:56'),
(188, 188, 188, 1, 1000, '35', '0', '0', '35', '2019-10-10', '500', '2018-05-28', '2017-12-18 17:28:56', '2017-12-18 17:28:56'),
(189, 189, 189, 1, 1000, '3', '0', '0', '3', '2019-10-11', '500', '2018-05-29', '2017-12-18 17:28:56', '2017-12-18 17:28:56'),
(190, 190, 190, 1, 1000, '7', '0', '5', '7', '2019-10-12', '500', '2018-05-30', '2017-12-18 17:28:56', '2017-12-18 17:28:56'),
(191, 191, 191, 1, 1000, '12', '0', '18', '14', '2019-10-13', '500', '2018-05-31', '2017-12-18 17:28:56', '2017-12-18 17:28:56'),
(192, 192, 192, 1, 1000, '8', '0', '5', '8', '2019-10-14', '500', '2018-06-01', '2017-12-18 17:28:56', '2017-12-18 17:28:56'),
(193, 193, 193, 1, 1000, '10', '0', '5', '11', '2019-10-15', '500', '2018-06-02', '2017-12-18 17:28:56', '2017-12-18 17:28:56'),
(194, 194, 194, 1, 1000, '23', '0', '5', '24', '2019-10-16', '500', '2018-06-03', '2017-12-18 17:28:56', '2017-12-18 17:28:56'),
(195, 195, 195, 1, 1000, '5', '0', '5', '5', '2019-10-17', '500', '2018-06-04', '2017-12-18 17:28:56', '2017-12-18 17:28:56'),
(196, 196, 196, 1, 1000, '28', '0', '0', '28', '2019-10-18', '500', '2018-06-05', '2017-12-18 17:28:56', '2017-12-18 17:28:56'),
(197, 197, 197, 1, 1000, '18', '0', '5', '19', '2019-10-19', '500', '2018-06-06', '2017-12-18 17:28:56', '2017-12-18 17:28:56'),
(198, 198, 198, 1, 1000, '24', '0', '5', '25', '2019-10-20', '500', '2018-06-07', '2017-12-18 17:28:56', '2017-12-18 17:28:56'),
(199, 199, 199, 1, 1000, '9', '0', '0', '9', '2019-10-21', '500', '2018-06-08', '2017-12-18 17:28:56', '2017-12-18 17:28:56'),
(200, 200, 200, 1, 1000, '12', '0', '0', '12', '2019-10-22', '500', '2018-06-09', '2017-12-18 17:28:56', '2017-12-18 17:28:56'),
(201, 201, 201, 1, 1000, '16', '0', '5', '17', '2019-10-23', '500', '2018-06-10', '2017-12-18 17:28:56', '2017-12-18 17:28:56'),
(202, 202, 202, 1, 1000, '28', '0', '5', '29', '2019-10-24', '500', '2018-06-11', '2017-12-18 17:28:56', '2017-12-18 17:28:56'),
(203, 203, 203, 1, 1000, '25', '0', '0', '25', '2019-10-25', '500', '2018-06-12', '2017-12-18 17:28:56', '2017-12-18 17:28:56'),
(204, 204, 204, 1, 1000, '4', '0', '0', '4', '2019-10-26', '500', '2018-06-13', '2017-12-18 17:28:56', '2017-12-18 17:28:56'),
(205, 205, 205, 1, 1000, '256', '0', '5', '269', '2019-10-27', '500', '2018-06-14', '2017-12-18 17:28:57', '2017-12-18 17:28:57'),
(206, 206, 206, 1, 1000, '257', '0', '5', '270', '2019-10-28', '500', '2018-06-15', '2017-12-18 17:28:57', '2017-12-18 17:28:57'),
(207, 207, 207, 1, 1000, '75', '0', '5', '79', '2019-10-29', '500', '2018-06-16', '2017-12-18 17:28:57', '2017-12-18 17:28:57'),
(208, 208, 208, 1, 1000, '42', '0', '5', '44', '2019-10-30', '500', '2018-06-17', '2017-12-18 17:28:57', '2017-12-18 17:28:57'),
(209, 209, 209, 1, 1000, '55', '0', '5', '58', '2019-10-31', '500', '2018-06-18', '2017-12-18 17:28:57', '2017-12-18 17:28:57'),
(210, 210, 210, 1, 1000, '1871', '0', '5', '1000', '2019-11-01', '500', '2018-06-19', '2017-12-18 17:28:57', '2017-12-18 17:28:57'),
(211, 211, 211, 1, 1000, '2127', '0', '18', '1000', '2019-11-02', '500', '2018-06-20', '2017-12-18 17:28:57', '2017-12-18 17:28:57'),
(212, 212, 212, 1, 1000, '2229', '0', '5', '1000', '2019-11-03', '500', '2018-06-21', '2017-12-18 17:28:57', '2017-12-18 17:28:57'),
(213, 213, 213, 1, 1000, '1500', '0', '5', '1000', '2019-11-04', '500', '2018-06-22', '2017-12-18 17:28:57', '2017-12-18 17:28:57'),
(214, 214, 214, 1, 1000, '1895', '0', '5', '1000', '2019-11-05', '500', '2018-06-23', '2017-12-18 17:28:57', '2017-12-18 17:28:57'),
(215, 215, 215, 1, 1000, '1867', '0', '5', '1000', '2019-11-06', '500', '2018-06-24', '2017-12-18 17:28:57', '2017-12-18 17:28:57'),
(216, 216, 216, 1, 1000, '886', '0', '5', '930', '2019-11-07', '500', '2018-06-25', '2017-12-18 17:28:57', '2017-12-18 17:28:57'),
(217, 217, 217, 1, 1000, '1800', '0', '5', '1000', '2019-11-08', '500', '2018-06-26', '2017-12-18 17:28:57', '2017-12-18 17:28:57'),
(218, 218, 218, 1, 1000, '857', '0', '5', '900', '2019-11-09', '500', '2018-06-27', '2017-12-18 17:28:57', '2017-12-18 17:28:57'),
(219, 219, 219, 1, 1000, '2062', '0', '5', '1000', '2019-11-10', '500', '2018-06-28', '2017-12-18 17:28:57', '2017-12-18 17:28:57'),
(220, 220, 220, 1, 1000, '1986', '0', '5', '1000', '2019-11-11', '500', '2018-06-29', '2017-12-18 17:28:57', '2017-12-18 17:28:57'),
(221, 221, 221, 1, 1000, '3576', '0', '5', '1000', '2019-11-12', '500', '2018-06-30', '2017-12-18 17:28:57', '2017-12-18 17:28:57'),
(222, 222, 222, 1, 1000, '714', '0', '5', '750', '2019-11-13', '500', '2018-07-01', '2017-12-18 17:28:57', '2017-12-18 17:28:57'),
(223, 223, 223, 1, 1000, '2133', '0', '5', '1000', '2019-11-14', '500', '2018-07-02', '2017-12-18 17:28:58', '2017-12-18 17:28:58'),
(224, 223, 224, 1, 5, '2133', '5', '5', '2240', '2017-12-23', '4', '2017-12-19', '2017-12-19 10:12:19', '2017-12-19 10:12:19'),
(225, 1, 225, 1, 10, '81', '0', '5', '85', '2018-03-11', '100', '2017-12-01', '2017-12-22 14:53:52', '2017-12-22 14:53:52'),
(226, 1, 226, 1, 2, '81', '0', '5', '85', '2017-05-31', '150', '2017-01-01', '2018-01-01 13:29:18', '2018-01-01 13:29:18');

-- --------------------------------------------------------

--
-- Table structure for table `sales_orders`
--

CREATE TABLE `sales_orders` (
  `id` int(11) NOT NULL,
  `bill_number` varchar(50) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `me_code` varchar(50) DEFAULT NULL,
  `total_amount` decimal(10,0) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales_orders`
--

INSERT INTO `sales_orders` (`id`, `bill_number`, `branch_id`, `customer_id`, `me_code`, `total_amount`, `created_at`, `updated_at`) VALUES
(1, '00000001', 1, 1, '0000001045', '275', '2017-12-22 17:01:37', '2017-12-22 17:01:37');

-- --------------------------------------------------------

--
-- Table structure for table `sales_products`
--

CREATE TABLE `sales_products` (
  `id` int(11) NOT NULL,
  `sales_id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `batch_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_qty` int(11) NOT NULL,
  `basic_cost` decimal(10,0) NOT NULL,
  `discount` decimal(10,0) NOT NULL,
  `gst` int(250) NOT NULL DEFAULT '0',
  `mrp` decimal(10,0) NOT NULL,
  `status` enum('0','1','2','3','4') NOT NULL,
  `unit_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales_products`
--

INSERT INTO `sales_products` (`id`, `sales_id`, `branch_id`, `batch_id`, `product_id`, `product_qty`, `basic_cost`, `discount`, `gst`, `mrp`, `status`, `unit_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 22, 22, 12, '27', '15', 5, '275', '1', 0, '2017-12-22 17:01:37', '2017-12-22 17:01:37');

-- --------------------------------------------------------

--
-- Table structure for table `transfer_confirm_products`
--

CREATE TABLE `transfer_confirm_products` (
  `id` int(11) NOT NULL,
  `transfer_request_id` int(11) NOT NULL,
  `batch_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_code` varchar(50) NOT NULL,
  `product_qty` int(11) NOT NULL,
  `from_branch` int(11) NOT NULL,
  `to_branch` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transfer_products`
--

CREATE TABLE `transfer_products` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `transfer_request_id` int(11) NOT NULL,
  `product_code` varchar(50) NOT NULL,
  `product_qty` int(11) NOT NULL,
  `status` enum('0','1','2') NOT NULL,
  `from_branch` int(11) NOT NULL,
  `to_branch` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transfer_products`
--

INSERT INTO `transfer_products` (`id`, `product_id`, `transfer_request_id`, `product_code`, `product_qty`, `status`, `from_branch`, `to_branch`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '8906070690726', 10, '0', 1, 2, '2017-12-19 17:13:58', '2017-12-19 17:13:58'),
(2, 2, 1, '8906070690566', 25, '0', 1, 2, '2017-12-19 17:13:58', '2017-12-19 17:13:58'),
(3, 2, 2, '8906070690566', 100, '0', 1, 3, '2017-12-21 18:45:38', '2017-12-21 18:45:38');

-- --------------------------------------------------------

--
-- Table structure for table `transfer_request`
--

CREATE TABLE `transfer_request` (
  `id` int(11) NOT NULL,
  `transfer_code` varchar(50) NOT NULL,
  `requested_from_branch` int(11) NOT NULL,
  `requested_to_branch` int(11) NOT NULL,
  `requested_by_id` int(11) NOT NULL,
  `requested_date` datetime NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` enum('pending','confirm','cancel','stock') NOT NULL DEFAULT 'pending',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transfer_request`
--

INSERT INTO `transfer_request` (`id`, `transfer_code`, `requested_from_branch`, `requested_to_branch`, `requested_by_id`, `requested_date`, `created_at`, `status`, `updated_at`) VALUES
(1, 'TNR/0000000001', 1, 2, 18, '2017-12-19 00:00:00', '2017-12-19 17:13:58', 'pending', '2017-12-19 17:13:58'),
(2, 'TNR/0000000002', 1, 3, 18, '2017-12-21 00:00:00', '2017-12-21 18:45:38', 'pending', '2017-12-21 18:45:38');

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `unit_name` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `branch_id`, `unit_name`, `created_at`, `updated_at`) VALUES
(1, 1, 'kg', '2017-12-18 17:27:46', '2017-12-18 17:27:46'),
(2, 1, 'g', '2017-12-18 17:27:46', '2017-12-18 17:27:46'),
(3, 1, 'ltr', '2017-12-18 17:27:47', '2017-12-18 17:27:47'),
(4, 1, 'ml', '2017-12-18 17:27:48', '2017-12-18 17:27:48');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `damages`
--
ALTER TABLE `damages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `damage_products`
--
ALTER TABLE `damage_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logins`
--
ALTER TABLE `logins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `logins_username_unique` (`username`);

--
-- Indexes for table `log_reports`
--
ALTER TABLE `log_reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_modes`
--
ALTER TABLE `payment_modes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_modes_del`
--
ALTER TABLE `payment_modes_del`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_orders`
--
ALTER TABLE `purchase_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_products`
--
ALTER TABLE `purchase_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales_orders`
--
ALTER TABLE `sales_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales_products`
--
ALTER TABLE `sales_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transfer_confirm_products`
--
ALTER TABLE `transfer_confirm_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transfer_products`
--
ALTER TABLE `transfer_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transfer_request`
--
ALTER TABLE `transfer_request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `damages`
--
ALTER TABLE `damages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `damage_products`
--
ALTER TABLE `damage_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `logins`
--
ALTER TABLE `logins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `log_reports`
--
ALTER TABLE `log_reports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=198;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `payment_modes`
--
ALTER TABLE `payment_modes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=226;
--
-- AUTO_INCREMENT for table `purchase_orders`
--
ALTER TABLE `purchase_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=227;
--
-- AUTO_INCREMENT for table `purchase_products`
--
ALTER TABLE `purchase_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=227;
--
-- AUTO_INCREMENT for table `sales_orders`
--
ALTER TABLE `sales_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `sales_products`
--
ALTER TABLE `sales_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `transfer_confirm_products`
--
ALTER TABLE `transfer_confirm_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `transfer_products`
--
ALTER TABLE `transfer_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `transfer_request`
--
ALTER TABLE `transfer_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
