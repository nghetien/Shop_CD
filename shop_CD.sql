-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 24, 2021 at 12:22 PM
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
-- Database: `shop_CD`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id_category` int(11) NOT NULL,
  `name_category` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id_category`, `name_category`) VALUES
(1, 'Đĩa tròn'),
(2, 'Đĩa DVD');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id_order` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `date_time` int(11) DEFAULT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `total_price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id_order`, `id_user`, `date_time`, `status`, `total_price`) VALUES
(2, 2, 1637341200, 'success', 2000000),
(4, 2, 1637686800, 'success', 4700000),
(7, 2, 1637168400, 'success', 1000000),
(8, 2, 1637773200, 'success', 2000000),
(9, 2, 1637773200, 'success', 8000000),
(10, 2, 1637773200, 'success', 8000000),
(11, 2, 1637773200, 'delete', 2000000),
(12, 2, 1637082000, 'success', 10000000),
(13, 2, 1636304400, 'success', 10000000),
(14, 2, 1637773200, 'success', 4000000),
(15, 2, 1637946000, 'delete', 500000);

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `id_order_detail` int(11) NOT NULL,
  `id_order` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`id_order_detail`, `id_order`, `id_product`, `quantity`) VALUES
(1, 4, 2, 1),
(2, 4, 3, 1),
(3, 4, 4, 2),
(4, 4, 15, 1),
(5, 2, 2, 1),
(6, 2, 2, 1),
(7, 7, 4, 1),
(8, 8, 2, 1),
(9, 9, 2, 4),
(10, 9, 2, 4),
(11, 8, 2, 1),
(12, 12, 2, 5),
(13, 13, 2, 5),
(14, 14, 2, 2),
(15, 15, 15, 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id_product` int(11) NOT NULL,
  `name_product` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quantity_stock` int(11) DEFAULT NULL,
  `number_of_songs` int(11) DEFAULT NULL,
  `id_category` int(11) DEFAULT NULL,
  `manufacturer` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `price` double DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cover_image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_topic` int(11) DEFAULT NULL,
  `audio_demo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `discount` int(11) DEFAULT 0,
  `date_time` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id_product`, `name_product`, `quantity_stock`, `number_of_songs`, `id_category`, `manufacturer`, `price`, `description`, `image`, `cover_image`, `id_topic`, `audio_demo`, `discount`, `date_time`, `status`) VALUES
(2, 'Top 50 bài nhạc Jazz được yêu thích', 1000, 50, 1, 'Việt Nam', 2000000, 'Top 50 bài nhạc Jazz được yêu thích', '', '', 1, '', 20, '1636000727468', 1),
(3, 'Top 20 bài nhạc cải lương', 200, 20, 1, 'Việt Nam', 200000, 'Top 20 bài nhạc cải lương', '1112', '', 1, '', 10, '1636221097326', 1),
(4, 'Album Sơn Tùng MTP', 200, 10, 1, 'Việt Nam', 1000000, 'Bài hát của Sếp', '13', '', 1, '', 10, '1636221104962', 1),
(11, '234234', 234, 23423, 2, '2342', 34234, '4234', '34', '', 3, '', 2342, '1636277215430', 0),
(12, 'Top 50 bài thiếu nhi', 1, 1, 1, '1', 1, '1', '1', '1', 1, '', 1, '1636277392785', 0),
(13, 'TOp 50 bài thiếu nhi', 100, 50, 1, '1', 500000, 'TOp 50 bài thiếu nhi', '', '', 1, '', 1, '1636277627258', 1),
(14, 'TOp 50 bài thiếu nhi', 100, 50, 1, '', 20000, 'TOp 50 bài thiếu nhi', '', '', 1, '', 1, '1636277729942', 0),
(15, 'Cải Lương Vip 001', 10, 10, 1, 'Hà Nội', 500000, 'Cải Lương Vip 001', '', '', 4, '', 0, '1636286237015', 1);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id_role` int(11) NOT NULL,
  `role_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id_role`, `role_name`) VALUES
(1, 'ADMIN'),
(2, 'CUSTOMER');

-- --------------------------------------------------------

--
-- Table structure for table `topic`
--

CREATE TABLE `topic` (
  `id_topic` int(11) NOT NULL,
  `name_topic` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `topic`
--

INSERT INTO `topic` (`id_topic`, `name_topic`) VALUES
(1, 'Jazz'),
(2, 'Rock'),
(3, 'Nhạc trẻ'),
(4, 'Cải lương');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `full_name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `id_role` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `password`, `full_name`, `address`, `email`, `phone`, `id_role`, `status`) VALUES
(2, '123', 'Nghê Quyết Tiến', 'Hooangf mai', 'nghequyettien@gmail.com', '0966224633', 1, 1),
(4, '123', 'Phạm Văn A', '123', 'phamvana@gmail.com', '123', 2, 0),
(5, '123', 'Phạm Văn B', 'sua', 'phamvanb@gmail.com', '123', 2, 0),
(6, '123', 'Qua Thung Lũng', NULL, 'qtl@gmail.com', '123', 2, 0),
(73, '123', 'Phamj Quynh Anh', '123123', 'phamquynhanh@gmail.com', '0966224633', 2, 1),
(76, '1', 'Phạm Quỳnh Anh', '123', 'qap@gmail.com', '0988776655', 1, 0),
(77, '1', 'Nghê Quyết Tiến', '', 'pqa@gmail.com', '0966224633', 2, 0),
(79, '234234', '4234234', '', '52345345@dfgdfg', '123123', 2, 0),
(80, '123', '4234234', '', '234234@gmail.com', '234234', 1, 0),
(83, '123', 'Nghê Quyết Tiến', '', 'nghequyettien@gmail.com123', '0966224633', 1, 0),
(84, '123', 'Nghê Quyết Tiến', '', '12@gmail.com3123', '0966224633', 1, 0),
(85, '123', 'Nghê Quyết Tiến', '', '123123@gmail.com', '0966224633', 1, 0),
(86, '123', 'Nghê Quyết Tiến', '', 'nghequyettien@gmail.com23123', '0966224633', 1, 0),
(87, '123', 'Nghê Quyết Tiến', '', '123123123@gmail.com', '0966224633', 1, 0),
(89, '123', 'Nghê Quyết Tiến', '', '111@gmail.com', '0966224633', 1, 0),
(92, '234', 'Nghê Quyết Tiến', '', '123123ewr@gmail.com', '0966224633', 1, 0),
(93, '456', 'Nghê Quyết Tiến', '', '456456@gmail.com', '0966224633', 1, 0),
(94, '123', 'Nghê Quyết Tiến', '', '123@gmail.com', '0966224633', 2, 0),
(95, '345', 'Nghê Quyết Tiến', '', '345345@gmail.com', '0966224633', 1, 0),
(96, '123', 'Nghê Quyết Tiến', '', '5345345@gmail.com', '0966224633', 1, 0),
(97, '123', 'Nghê Quyết Tiến', '', '123@gmail.123', '0966224633', 1, 0),
(98, '123', 'Nghê Quyết Tiến', '', '54454545@gmail.com', '0966224633', 1, 0),
(100, '234', 'Nghê Quyết Tiến', '', '23@gmail.com4234', '0966224633', 1, 0),
(101, '123', 'Nghê Quyết Tiến', '', '4234234@gmail.com', '0966224633', 1, 0),
(102, '123', 'Nghê Quyết Tiến', '', '4234@gmail.com', '0966224633', 1, 0),
(105, '123', 'Nghê Quyết Tiến', '', 'ngjdfhkgjjhdfg@gmail.com', '0966224633', 1, 0),
(106, '123', 'Nghê Quyết Tiến', '', '345345345@gmail.com', '0966224633', 1, 0),
(107, '234', '123123', '', '123123123123452345@djkgfh', '123123', 1, 0),
(108, '123', 'Nghê Quyết Tiến', '', '7@gmail.com5647', '0966224633', 1, 0),
(109, '123', 'Nghê Quyết Tiến', '', '232323@gmail.com', '0966224633', 1, 0),
(111, '123', 'Nghê Quyết Tiến', '', '4234234234@gmail.com', '0966224633', 1, 0),
(112, '1', 'Nghê Quyết Tiến', '', '1@gmail.com', '0966224633', 1, 0),
(113, '1', 'Nghê Quyết Tiến', '', '2@gmail.com2', '0966224633', 1, 0),
(114, '123', 'Nghê Quyết Tiến', '', '12345@gmail.com', '0966224633', 1, 0),
(116, '123', 'Nghê Quyết Tiến', '', '234@gmail.com', '0966224633', 2, 0),
(117, '1', 'Nghê Quyết Tiến', '', 'nghetien@gmail.com', '0966224633', 1, 0),
(118, '1', 'Nghê Quyết Tiến', '12345', 'nghetien1@gmail.com', '0966224633', 2, 1),
(120, '123', 'Nghê Quyết Tiến', '', 'user1@gmail.com', '0966224633', 2, 0),
(121, '1', 'Nghê Quyết Tiến', '', 'user2@gmail.com', '0966224633', 2, 0),
(122, '1', 'Nghê Quyết Tiến', '', 'user3@gmail.com', '0966224633', 1, 0),
(123, '1', 'Nghê Quyết Tiến', '', 'user4@gmail.com', '0966224633', 2, 0),
(124, '1', 'Nghê Quyết Tiến', '', 'user5@gmail.com', '0966224633', 2, 0),
(125, '1', 'Nghê Quyết Tiến', '', 'user7@gmail.com', '0966224633', 2, 0),
(126, '1234', 'Toàn', 'Hà Giang', 'toan@gmail.com', '091123', 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id_category`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id_order`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id_order_detail`),
  ADD KEY `id_order` (`id_order`),
  ADD KEY `id_product` (`id_product`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id_product`),
  ADD KEY `id_topic` (`id_topic`),
  ADD KEY `id_category` (`id_category`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `topic`
--
ALTER TABLE `topic`
  ADD PRIMARY KEY (`id_topic`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_role` (`id_role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id_order_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `topic`
--
ALTER TABLE `topic`
  MODIFY `id_topic` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Constraints for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD CONSTRAINT `order_detail_ibfk_1` FOREIGN KEY (`id_order`) REFERENCES `orders` (`id_order`),
  ADD CONSTRAINT `order_detail_ibfk_2` FOREIGN KEY (`id_product`) REFERENCES `products` (`id_product`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`id_topic`) REFERENCES `topic` (`id_topic`),
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`id_category`) REFERENCES `category` (`id_category`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `roles` (`id_role`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
