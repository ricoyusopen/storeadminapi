-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 08, 2019 at 06:35 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `banner_id` int(11) NOT NULL,
  `image_name` varchar(120) DEFAULT NULL,
  `banner_type_id` int(11) DEFAULT NULL,
  `description` text NOT NULL,
  `link_click` varchar(200) DEFAULT NULL,
  `time_start` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`banner_id`, `image_name`, `banner_type_id`, `description`, `link_click`, `time_start`) VALUES
(1, 'banner1.png', 0, 'Gadget Phoria', 'gadgetphoria.php', '2019-11-04 16:57:37'),
(2, 'banner2.png', 0, 'Sale 80', '', '2019-11-04 16:59:18'),
(3, 'banner3.png', 0, 'Join Dogee', '', '2019-11-04 16:59:18'),
(4, 'banner8.png', NULL, 'Save Up', 'saveup.php', '2019-11-06 08:50:05'),
(5, '', NULL, 'Banner banner', 'banner.php', '2019-11-06 09:07:45'),
(6, '', NULL, 'df', 'gadget.php', '2019-11-06 09:15:04'),
(7, NULL, NULL, 'tes', 'tes', '2019-11-06 17:14:29');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `time_start` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `email_subscribe`
--

CREATE TABLE `email_subscribe` (
  `email` varchar(80) NOT NULL,
  `is_subscribe` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `favorites`
--

CREATE TABLE `favorites` (
  `favorite_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `member_id` int(11) NOT NULL,
  `full_name` varchar(80) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(25) NOT NULL,
  `password` varchar(200) NOT NULL,
  `join_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`member_id`, `full_name`, `email`, `phone`, `password`, `join_date`) VALUES
(1, 'Rico SIburian', 'ricoyusopen@gmail.com', '081317792224', '2affaef592569667bbc4c70dae8e877a3d0943bf', '2019-11-07');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(120) NOT NULL,
  `description` text,
  `time_start` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `condition` varchar(20) NOT NULL,
  `weight` int(11) NOT NULL,
  `product_category_id` int(11) NOT NULL,
  `brand` varchar(80) NOT NULL,
  `price` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `product_variant_id` int(11) DEFAULT NULL,
  `image1` varchar(100) DEFAULT NULL,
  `image2` varchar(100) DEFAULT NULL,
  `image3` varchar(100) DEFAULT NULL,
  `image4` varchar(100) DEFAULT NULL,
  `viewer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `description`, `time_start`, `condition`, `weight`, `product_category_id`, `brand`, `price`, `discount`, `product_variant_id`, `image1`, `image2`, `image3`, `image4`, `viewer`) VALUES
(1, 'IPhone 12', 'IPhone 12', '2019-11-04 17:50:11', 'New', 5, 3, 'Apple', 28000000, 0, 0, 'produk1.png', '', '', '', 0),
(2, 'Laptop Asus ROG', 'Laptop Asus ROG', '2019-11-04 17:50:11', 'New', 10, 9, 'Asus', 13000000, 0, 0, 'produk2.png', '', '', '', 0),
(3, 'DJI Handheld', 'DJI Handheld', '2019-11-04 17:52:19', 'New', 3, 7, 'DJI', 8000000, 0, 0, 'produk3.png', '', '', '', 0),
(4, 'DJI Osmo', 'DJI Osmo', '2019-11-04 17:52:19', 'New', 3, 7, 'DJI', 5000000, 0, 0, 'produk4.png', '', '', '', 0),
(5, 'Laptop Dell i7', 'Laptop Dell i7', '2019-11-04 17:54:36', 'New', 6, 9, 'Dell', 13000000, 0, 0, 'produk5.png', '', '', '', 0),
(6, 'Body Protector', 'Body Protector', '2019-11-04 17:54:36', 'New', 1, 8, 'Xiaomi', 150000, 0, 0, 'produk6.png', '', '', '', 0),
(7, 'Headset Superbass Pro', 'Headset Superbass Pro', '2019-11-04 18:03:01', 'New', 2, 7, '', 450000, 0, 0, 'produk8.png', '', '', '', 0),
(8, 'Bluetooth Speaker Karaoke', 'Bluetooth Speaker Karaoke', '2019-11-04 18:03:01', 'New', 5, 4, '', 3500000, 0, 0, 'produk10.png', '', '', '', 0),
(9, 'Sweater', NULL, '2019-11-07 04:39:02', 'Baru', 0, 1, 'Adidas', 275000, 0, NULL, '', '', '', '', 0),
(11, 'Vivo Y19', 'Ngetes', '2019-11-06 07:41:47', 'Baru', 2, 3, 'Vivo', 1000000, 0, NULL, NULL, NULL, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `product_category_id` int(11) NOT NULL,
  `product_category_name` varchar(50) NOT NULL,
  `product_sub_category_id` int(5) NOT NULL,
  `is_parent` int(5) NOT NULL DEFAULT '1',
  `icon` varchar(120) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`product_category_id`, `product_category_name`, `product_sub_category_id`, `is_parent`, `icon`) VALUES
(1, 'Pakaian', 0, 1, ''),
(2, 'Tas', 0, 1, 'woman-bag.svg'),
(3, 'Gadget', 0, 1, 'smartphone.svg'),
(4, 'Elektronik', 0, 1, ''),
(5, 'Rumah Tangga', 0, 1, ''),
(6, 'Komputer', 0, 1, ''),
(7, 'Aksesoris Gadget', 0, 1, ''),
(8, 'Aksesoris Komputer', 0, 1, ''),
(9, 'Laptop', 0, 1, ''),
(10, 'Sepatu', 0, 1, 'shoes.svg'),
(11, 'Otomotif', 0, 1, ''),
(12, 'Perkakas', 0, 1, ''),
(13, 'Mainan', 0, 1, NULL),
(14, 'Makanan', 0, 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `product_review`
--

CREATE TABLE `product_review` (
  `product_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `value` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `product_variant`
--

CREATE TABLE `product_variant` (
  `product_variant_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `variant_name` varchar(50) NOT NULL,
  `value` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `store_profile`
--

CREATE TABLE `store_profile` (
  `key_name` varchar(100) NOT NULL,
  `value_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `store_profile`
--

INSERT INTO `store_profile` (`key_name`, `value_name`) VALUES
('ADDRESS', 'Jl. Caman Raya No. 177, Jatibening, Pondok Gede, Bekasi Kota'),
('EMAIL', 'metromultistore@metroreload.biz'),
('ICON', 'icon.png'),
('LABEL_HEADER', 'Semua ada dan terpercaya'),
('PHONE', 'Phone : (021) 850-5555'),
('SM_FACEBOOK_LINK', '#'),
('SM_INSTAGRAM_LINK', '#'),
('SM_LINKED_IN_LINK', '#'),
('SM_TWITTER_LINK', '#'),
('SM_YOUTUBE_LINK', '#'),
('STORE_NAME', 'Metro Multi Store');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `wishlist_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `product-id` int(11) NOT NULL,
  `time_start` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`banner_id`) USING BTREE;

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`) USING BTREE;

--
-- Indexes for table `email_subscribe`
--
ALTER TABLE `email_subscribe`
  ADD PRIMARY KEY (`email`) USING BTREE;

--
-- Indexes for table `favorites`
--
ALTER TABLE `favorites`
  ADD PRIMARY KEY (`favorite_id`) USING BTREE;

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`member_id`) USING BTREE;

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`) USING BTREE;

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`product_category_id`) USING BTREE;

--
-- Indexes for table `product_review`
--
ALTER TABLE `product_review`
  ADD PRIMARY KEY (`product_id`,`member_id`) USING BTREE;

--
-- Indexes for table `product_variant`
--
ALTER TABLE `product_variant`
  ADD PRIMARY KEY (`product_variant_id`) USING BTREE;

--
-- Indexes for table `store_profile`
--
ALTER TABLE `store_profile`
  ADD PRIMARY KEY (`key_name`) USING BTREE;

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`wishlist_id`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `banner_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `favorites`
--
ALTER TABLE `favorites`
  MODIFY `favorite_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `product_category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `product_variant`
--
ALTER TABLE `product_variant`
  MODIFY `product_variant_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `wishlist_id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
