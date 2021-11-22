-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 19, 2021 at 05:14 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecom`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `password`) VALUES
(1, 'waiz', 783111);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category_name`, `status`) VALUES
(43, 'Hardware', 1),
(48, 'Furniture', 1),
(49, 'Electronic', 1);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `comment` text NOT NULL,
  `added_on` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `mobile`, `comment`, `added_on`) VALUES
(NULL, 'wai', 'waiz@gmail.com', '123456789', 'are you alright', '2021-10-28 03:05:20'),
(NULL, 'wai', 'mushtaqueahed178@gmail.com', '87346464', 'say hi', '2021-10-28 05:37:06');

-- --------------------------------------------------------

--
-- Table structure for table `orderd_product`
--

CREATE TABLE `orderd_product` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(50) NOT NULL,
  `pin_code` int(11) NOT NULL,
  `payment_type` varchar(15) NOT NULL,
  `total_price` float NOT NULL,
  `payment_status` varchar(20) NOT NULL,
  `order_status` int(11) NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orderd_product`
--

INSERT INTO `orderd_product` (`id`, `user_id`, `address`, `city`, `pin_code`, `payment_type`, `total_price`, `payment_status`, `order_status`, `added_on`) VALUES
(6, 1, 'sixmile', 'ghy', 781022, 'cod', 4, 'success', 1, '2021-11-01 03:26:23'),
(7, 1, 'dhupdhara', 'glp', 783123, 'cod', 4, 'success', 1, '2021-11-01 03:29:58'),
(8, 1, 'dhupdhara', 'glp', 783123, 'cod', 4, 'success', 1, '2021-11-01 04:13:00'),
(9, 1, 'ambary', 'delhi', 12345, 'cod', 4, 'success', 1, '2021-11-02 04:54:04'),
(10, 1, 'me', 'me', 123456, 'cod', 72, 'success', 1, '2021-11-02 05:04:31');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `qty`, `price`) VALUES
(3, 6, 10, 1, 4),
(4, 7, 10, 1, 4),
(5, 8, 10, 1, 4),
(6, 9, 11, 1, 4),
(7, 10, 14, 2, 30),
(8, 10, 10, 3, 4);

-- --------------------------------------------------------

--
-- Table structure for table `order_status`
--

CREATE TABLE `order_status` (
  `status_id` int(11) NOT NULL,
  `status_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_status`
--

INSERT INTO `order_status` (`status_id`, `status_name`) VALUES
(1, 'Pending'),
(2, 'Processing'),
(3, 'Pending'),
(4, 'Processing');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_mrp` float NOT NULL,
  `product_sprice` float NOT NULL,
  `product_qnt` int(11) NOT NULL,
  `product_img` varchar(255) NOT NULL,
  `short_desc` varchar(2000) NOT NULL,
  `pdescription` text NOT NULL,
  `meta_title` varchar(2000) NOT NULL,
  `meta_desc` text NOT NULL,
  `meta_keyword` varchar(2000) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `category_id`, `product_name`, `product_mrp`, `product_sprice`, `product_qnt`, `product_img`, `short_desc`, `pdescription`, `meta_title`, `meta_desc`, `meta_keyword`, `status`) VALUES
(10, 49, 'lip', 8, 4, 8, '700821350 FB_IMG_1495306624835.jpg', 'q', 'a', 'a', 'a', 'a', 1),
(11, 43, 'waiz', 3, 4, 5, '804477005 me.jpg', 'q', 's', 'a', 'a', '', 1),
(12, 48, 'wix', 8, 9, 9, '113356570 FB_IMG_1495306624835.jpg', 'w', 'w', 'w', 'w', 'w', 1),
(13, 43, 'jarir', 8, 9, 9, '407168522 me.jpg', 'a', 'a', 'a', 'a', 'a', 1),
(14, 49, 'chair', 40, 30, 9, '794387235 9.jpg', 'wqq', 'w', 'w', 'w', 'w', 0);

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` int(11) NOT NULL,
  `password` int(10) NOT NULL,
  `added_on` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `name`, `email`, `mobile`, `password`, `added_on`) VALUES
(5, 'waiz', 'mewaiz@gmail.com', 343434, 783123, '2021-10-28'),
(10, 'waiz', 'waiz@gmail.com', 12345678, 12345678, '2021-10-29'),
(11, 'wao', 'qaum678@gmail.com', 82837272, 0, '2021-11-12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`mobile`);

--
-- Indexes for table `orderd_product`
--
ALTER TABLE `orderd_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_status`
--
ALTER TABLE `order_status`
  ADD PRIMARY KEY (`status_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `orderd_product`
--
ALTER TABLE `orderd_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `order_status`
--
ALTER TABLE `order_status`
  MODIFY `status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
