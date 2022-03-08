-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 25 Nov 2019 pada 05.32
-- Versi server: 10.4.8-MariaDB
-- Versi PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
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
-- Struktur dari tabel `banner`
--

CREATE TABLE `banner` (
  `banner_id` int(11) NOT NULL,
  `image_name` varchar(120) NOT NULL,
  `banner_type_id` int(11) DEFAULT 1,
  `description` text NOT NULL,
  `link_click` varchar(200) NOT NULL,
  `time_start` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `banner`
--

INSERT INTO `banner` (`banner_id`, `image_name`, `banner_type_id`, `description`, `link_click`, `time_start`) VALUES
(1, 'UVwOIXtSmd_banner.png', 2, 'testestestestestes', 'teslagi.php', '2019-11-04 16:57:37'),
(2, 'oD3ejovllD_banner.png', 3, 'Sale 80', 'tesmelulu.php', '2019-11-04 16:59:18'),
(3, '5ImDx27Nr9_banner.png', 4, 'Join Dogee', 'asal.php', '2019-11-04 16:59:18'),
(4, 'CmI0PA2NcA_banner.png', 5, 'Save Up', 'saveup.php', '2019-11-06 08:50:05'),
(5, '2Z55zqcu23_banner.png', 6, 'Banner banner', 'banner.php', '2019-11-06 09:07:45'),
(6, 'ry4Z3aaID7_banner.png', 7, 'mmmmmmmmmm', 'gadgetfffffff.php', '2019-11-06 09:15:04'),
(8, '', 1, 'bannertop.php', 'bannertop.php', '2019-11-12 07:35:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `banner_type`
--

CREATE TABLE `banner_type` (
  `banner_type_id` int(11) NOT NULL,
  `type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `banner_type`
--

INSERT INTO `banner_type` (`banner_type_id`, `type`) VALUES
(1, 'NEWS PRODUCT'),
(2, 'BANNER TOP'),
(3, 'BANNER TOP LEFT'),
(4, 'BANNER TOP RIGHT'),
(5, 'BANNER CENTER'),
(6, 'BANNER BOTOM LEFT'),
(7, 'BANNER BOTTOM RIGHT'),
(8, 'BANNER LEFT');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `time_start` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Struktur dari tabel `email_subscribe`
--

CREATE TABLE `email_subscribe` (
  `email` varchar(80) NOT NULL,
  `is_subscribe` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Struktur dari tabel `favorites`
--

CREATE TABLE `favorites` (
  `favorite_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Struktur dari tabel `member`
--

CREATE TABLE `member` (
  `member_id` int(11) NOT NULL,
  `full_name` varchar(80) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(25) NOT NULL,
  `password` varchar(200) NOT NULL,
  `join_date` date NOT NULL,
  `user_img_name` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `member`
--

INSERT INTO `member` (`member_id`, `full_name`, `email`, `phone`, `password`, `join_date`, `user_img_name`) VALUES
(1, 'Rico Siburian', 'ricoyusopen@gmail.com', '081317792224', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', '2019-11-07', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(120) NOT NULL,
  `description` text DEFAULT NULL,
  `time_start` timestamp NOT NULL DEFAULT current_timestamp(),
  `condision` varchar(20) NOT NULL,
  `weight` int(11) NOT NULL,
  `product_category_id` int(11) NOT NULL,
  `parent_category_id` int(11) NOT NULL,
  `brand` varchar(80) NOT NULL,
  `price` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `product_variant_id` int(11) DEFAULT NULL,
  `image1` varchar(100) DEFAULT NULL,
  `image2` varchar(100) DEFAULT NULL,
  `image3` varchar(100) DEFAULT NULL,
  `image4` varchar(100) DEFAULT NULL,
  `viewer` int(11) NOT NULL,
  `stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `description`, `time_start`, `condision`, `weight`, `product_category_id`, `parent_category_id`, `brand`, `price`, `discount`, `product_variant_id`, `image1`, `image2`, `image3`, `image4`, `viewer`, `stock`) VALUES
(1, 'Laptop Asus ROG', 'Laptop Asus ROG', '2019-11-22 20:39:47', 'Baru', 5, 6, 6, 'Asus', 15000000, 0, 1, '413G7p41tF_image1.png', 'no_image.png', 'no_image.png', 'no_image.png', 0, 0),
(2, 'IPhone 12', 'IPhone 12', '2019-11-22 20:45:28', 'Baru', 2, 41, 41, 'Apple', 28000000, 0, 1, 'meJt2O9l8d_image1.png', 'no_image.png', 'no_image.png', 'no_image.png', 0, 0),
(3, 'Kamus Bahasa Inggris', 'Kamus Bahasa Inggris', '2019-11-22 21:19:37', 'Baru', 3, 40, 40, '-', 300000, 0, 1, 'LM9bSsc4In_image1.png', 'no_image.png', 'no_image.png', 'no_image.png', 0, 0),
(4, 'DGI Handheld', 'DGI Handheld Free Packet Cleaner', '2019-11-22 21:21:30', 'Baru', 2, 6, 6, 'DGI', 8000000, 0, 1, 'nKJ9Ve1kKe_image1.png', 'no_image.png', 'no_image.png', 'no_image.png', 0, 0),
(5, 'Body Protector', 'Body Protector untuk Laptop Mibook', '2019-11-22 21:24:18', 'Baru', 1, 6, 6, '-', 150000, 0, 1, 'F8oxql9PTJ_image1.png', 'no_image.png', 'no_image.png', 'no_image.png', 0, 0),
(6, 'Headset Superbass', 'Headset Superbass BBH2106 VIDVIE', '2019-11-22 21:26:32', 'Baru', 1, 4, 4, 'Vidvie', 300000, 0, 1, 'O74Mp6sV53_image1.png', 'no_image.png', 'no_image.png', 'no_image.png', 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `product_categories`
--

CREATE TABLE `product_categories` (
  `product_category_id` int(11) NOT NULL,
  `product_category_name` varchar(50) NOT NULL,
  `parent_category_id` int(5) NOT NULL DEFAULT 0,
  `icon` varchar(120) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `product_categories`
--

INSERT INTO `product_categories` (`product_category_id`, `product_category_name`, `parent_category_id`, `icon`) VALUES
(4, 'Elektronik', 0, 'l2tC1hKixR_category.svg'),
(6, 'Komputer', 0, 'kuAbM1df3l_category.svg'),
(8, 'Aksesoris Komputer', 6, 'ZQ25WM5yzC_category.svg'),
(17, 'Printer', 6, NULL),
(34, 'Tablet', 41, NULL),
(35, 'Laptop', 6, NULL),
(36, 'PC', 6, NULL),
(38, 'Tools', 44, NULL),
(40, 'Buku', 0, '5vnKy9Y3D8_category.png'),
(41, 'Gadget', 0, 'Znu85W72Gl_category.svg'),
(42, 'Kosmetik', 0, 'ig8s7QXhgo_category.png'),
(43, 'Kesehatan', 0, '3XP9aoJ3Qf_category.svg'),
(44, 'Otomotif', 0, 'y4dRsZHbg1_category.svg'),
(45, 'Fashion', 0, 'lzt87ln9YL_category.svg'),
(46, 'Pakaian Wanita', 45, NULL),
(47, 'Kamar Mandi', 42, NULL),
(48, 'Kamar Tidur', 42, NULL),
(49, 'Olahraga', 0, 'ifY1Xwkh2l_category.png'),
(50, 'Bola ', 49, NULL),
(51, 'Handphone', 41, NULL),
(52, 'Alkes', 43, NULL),
(53, 'Kamus', 40, NULL),
(54, 'Pendidikan', 40, NULL),
(55, 'Entertainment', 4, NULL),
(56, 'Rumah Tangga', 4, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `product_review`
--

CREATE TABLE `product_review` (
  `product_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `value` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Struktur dari tabel `product_sub_categories`
--

CREATE TABLE `product_sub_categories` (
  `product_sub_category_id` int(11) NOT NULL,
  `product_category_id` int(11) NOT NULL,
  `sub_category_name` varchar(50) NOT NULL,
  `icon` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `product_sub_categories`
--

INSERT INTO `product_sub_categories` (`product_sub_category_id`, `product_category_id`, `sub_category_name`, `icon`) VALUES
(1, 0, 'ggg', 'PHN2ZyBoZWlnaHQ9IjQ0M3B0IiB2aWV3Qm94PSItNjEgMCA0NDMgNDQzLjI4OCIgd2lkdGg9IjQ0M3B0IiB4bWxucz0iaHR0cDov');

-- --------------------------------------------------------

--
-- Struktur dari tabel `product_variant`
--

CREATE TABLE `product_variant` (
  `product_variant_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `variant_name` varchar(50) NOT NULL,
  `value` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Struktur dari tabel `store_profile`
--

CREATE TABLE `store_profile` (
  `key_name` varchar(100) NOT NULL,
  `value_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `store_profile`
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
-- Struktur dari tabel `store_profilenew`
--

CREATE TABLE `store_profilenew` (
  `profile_id` int(11) NOT NULL,
  `key_name` varchar(100) NOT NULL,
  `value_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `store_profilenew`
--

INSERT INTO `store_profilenew` (`profile_id`, `key_name`, `value_name`) VALUES
(1, 'ADDRESS', 'Jl. Caman Raya No. 177, Jatibening, Pondok Gede, Bekasi Kota'),
(2, 'EMAIL', 'metromultistore@metroreload.biz'),
(3, 'ICON', 'icon.png'),
(4, 'LABEL_HEADER', 'Semua ada dan terpercaya'),
(5, 'PHONE', 'Phone : (021) 850-5555'),
(6, 'SM_FACEBOOK_LINK', '#'),
(7, 'SM_INSTAGRAM_LINK', '#'),
(8, 'SM_LINKED_IN_LINK', '#'),
(9, 'SM_TWITTER_LINK', '#'),
(10, 'SM_YOUTUBE_LINK', '#'),
(11, 'STORE_NAME', 'Metro Multi Store');

-- --------------------------------------------------------

--
-- Struktur dari tabel `wishlist`
--

CREATE TABLE `wishlist` (
  `wishlist_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `product-id` int(11) NOT NULL,
  `time_start` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`banner_id`) USING BTREE;

--
-- Indeks untuk tabel `banner_type`
--
ALTER TABLE `banner_type`
  ADD PRIMARY KEY (`banner_type_id`);

--
-- Indeks untuk tabel `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`) USING BTREE;

--
-- Indeks untuk tabel `email_subscribe`
--
ALTER TABLE `email_subscribe`
  ADD PRIMARY KEY (`email`) USING BTREE;

--
-- Indeks untuk tabel `favorites`
--
ALTER TABLE `favorites`
  ADD PRIMARY KEY (`favorite_id`) USING BTREE;

--
-- Indeks untuk tabel `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`member_id`) USING BTREE;

--
-- Indeks untuk tabel `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`) USING BTREE;

--
-- Indeks untuk tabel `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`product_category_id`) USING BTREE;

--
-- Indeks untuk tabel `product_review`
--
ALTER TABLE `product_review`
  ADD PRIMARY KEY (`product_id`,`member_id`) USING BTREE;

--
-- Indeks untuk tabel `product_sub_categories`
--
ALTER TABLE `product_sub_categories`
  ADD PRIMARY KEY (`product_sub_category_id`);

--
-- Indeks untuk tabel `product_variant`
--
ALTER TABLE `product_variant`
  ADD PRIMARY KEY (`product_variant_id`) USING BTREE;

--
-- Indeks untuk tabel `store_profile`
--
ALTER TABLE `store_profile`
  ADD PRIMARY KEY (`key_name`) USING BTREE;

--
-- Indeks untuk tabel `store_profilenew`
--
ALTER TABLE `store_profilenew`
  ADD PRIMARY KEY (`profile_id`);

--
-- Indeks untuk tabel `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`wishlist_id`) USING BTREE;

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `banner`
--
ALTER TABLE `banner`
  MODIFY `banner_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `banner_type`
--
ALTER TABLE `banner_type`
  MODIFY `banner_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `favorites`
--
ALTER TABLE `favorites`
  MODIFY `favorite_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `member`
--
ALTER TABLE `member`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `product_category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT untuk tabel `product_sub_categories`
--
ALTER TABLE `product_sub_categories`
  MODIFY `product_sub_category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `product_variant`
--
ALTER TABLE `product_variant`
  MODIFY `product_variant_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `store_profilenew`
--
ALTER TABLE `store_profilenew`
  MODIFY `profile_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `wishlist_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
