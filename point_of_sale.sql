-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 21, 2022 at 03:55 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `point_of_sale`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `gender` enum('L','P') NOT NULL,
  `phone` varchar(15) NOT NULL,
  `address` text NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `name`, `gender`, `phone`, `address`, `created`, `updated`) VALUES
(1, 'Customer 1', 'L', '3121232312', 'sasassasa', '2021-11-26 18:12:43', '2021-11-26 11:15:06'),
(2, 'Customer 2', 'L', '1212121', 'cdas', '2021-11-26 18:15:19', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `p_category`
--

CREATE TABLE `p_category` (
  `category_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `p_category`
--

INSERT INTO `p_category` (`category_id`, `name`, `created`, `updated`) VALUES
(1, 'Miniman', '2021-11-26 19:30:17', '2021-11-26 12:51:45'),
(4, 'Makanan', '2021-11-27 23:53:54', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `p_item`
--

CREATE TABLE `p_item` (
  `item_id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `price` int(11) DEFAULT NULL,
  `stock` int(10) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `p_item`
--

INSERT INTO `p_item` (`item_id`, `name`, `category_id`, `unit_id`, `price`, `stock`, `created`, `updated`, `image`) VALUES
(16, 'Kopi', 4, 5, 25000, 8, '2022-01-23 18:41:12', NULL, 'item-220123-35468824cd.jpeg'),
(17, 'Roti Tawar', 4, 5, 15000, 33, '2022-02-01 20:18:46', NULL, 'item-220201-35a8ecdcd8.jpeg'),
(18, 'Roti Coklat', 4, 5, 25000, 0, '2022-02-01 20:19:49', NULL, 'item-220201-695975dfb7.jpeg'),
(19, 'Roti Sobek Coklat', 4, 5, 25000, 0, '2022-02-01 20:20:40', NULL, 'item-220201-958cc70e68.jpeg'),
(20, 'Ultra Milk Full Cream', 1, 4, 20000, 32, '2022-02-01 20:23:01', NULL, 'item-220201-b9ec7a49db.jpeg'),
(21, 'Ultra Milk Coklat', 1, 4, 20000, 32, '2022-02-01 20:23:24', NULL, 'item-220201-3f9162be57.jpeg'),
(22, 'Kopi Kapal Api', 1, 4, 25000, 23, '2022-02-01 20:24:29', NULL, 'item-220201-3c7d178b5c.jpeg'),
(23, 'Kopi Susu', 1, 5, 5000, 7, '2022-02-01 20:25:08', '2022-02-01 13:26:55', 'item-220201-eaf660d2d2.jpeg'),
(24, 'Good Day', 1, 6, 7000, 14, '2022-02-06 18:00:35', NULL, 'item-220206-c3668e32ac.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `p_unit`
--

CREATE TABLE `p_unit` (
  `unit_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `p_unit`
--

INSERT INTO `p_unit` (`unit_id`, `name`, `created`, `updated`) VALUES
(4, 'Kg', '2021-11-27 17:31:37', '2022-02-01 13:16:36'),
(5, 'Satuan', '2021-11-27 23:54:01', '0000-00-00 00:00:00'),
(6, 'ml', '2022-02-01 20:21:59', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `supplier_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `address` varchar(200) NOT NULL,
  `description` text,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`supplier_id`, `name`, `phone`, `address`, `description`, `created`, `updated`) VALUES
(1, 'PT Santosa Jaya Abadi', '0411196356', 'Jl. Raya Gilang 159, Taman, Sidoarjo, Jawa Timur, Indonesia', 'PT Santos Jaya Abadi merupakan perusahaan multinasional yang memproduksi aneka minuman. Perusahaan ini merupakan produsen kopi dengan merek Kapal Api, Excelso, ABC dan lain-lain. Perusahaan ini juga memproduksi produk sereal, yaitu Ceremix. Perusahaan ini beralamat di Taman, Sidoarjo, Jawa Timur.', '2021-11-26 14:34:50', '2022-02-01 12:52:21'),
(3, 'PT Nippon Indosari Corpindo Tbk', '082345994802', 'Jl. Kima 10 No.B 2A, RW.01, Daya, Kec. Biringkanaya, Kota Makassar, Sulawesi Selatan 90241', 'PT Nippon Indosari Corpindo Tbk. adalah perusahaan roti terbesar di Indonesia dengan merek dagang Sari Roti. Saat ini, Nippon Indosari Corpindo mengoperasikan 14 pabrik dengan sebaran 13 pabrik berlokasi strategis di Indonesia dan 1 pabrik di Filipina', '2021-11-26 14:34:53', '2022-02-01 13:01:24'),
(5, 'PT Ultrajaya Milk Industry Tbk', '08001185872', 'Makassar', 'PT Ultrajaya Milk Industry Tbk, merupkan perusahaan yang mengelolah susu kemasan', '2021-11-26 15:24:29', '2022-02-01 13:05:01');

-- --------------------------------------------------------

--
-- Table structure for table `t_sale`
--

CREATE TABLE `t_sale` (
  `sale_id` int(11) NOT NULL,
  `invoice` varchar(50) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `total_price` int(11) NOT NULL,
  `discount` int(11) DEFAULT NULL,
  `final_price` int(11) NOT NULL,
  `cash` int(11) NOT NULL,
  `remaining` int(11) NOT NULL,
  `note` text,
  `date` date NOT NULL,
  `user_id` int(11) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `t_sale`
--

INSERT INTO `t_sale` (`sale_id`, `invoice`, `customer_id`, `total_price`, `discount`, `final_price`, `cash`, `remaining`, `note`, `date`, `user_id`, `created`) VALUES
(83, 'MP2202010001', NULL, 0, NULL, 30000, 30000, 0, 'bayar', '2022-02-01', 6, '2022-02-01 20:31:49'),
(84, 'MP2202040001', NULL, 0, NULL, 30000, 30000, 0, NULL, '2022-02-04', 6, '2022-02-04 09:30:29'),
(85, 'MP2202060001', NULL, 0, NULL, 47000, 47000, 0, 'Dibayar cash', '2022-02-06', 6, '2022-02-06 18:50:11');

-- --------------------------------------------------------

--
-- Table structure for table `t_sale_detail`
--

CREATE TABLE `t_sale_detail` (
  `sale_detail_id` int(11) NOT NULL,
  `sale_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `t_sale_detail`
--

INSERT INTO `t_sale_detail` (`sale_detail_id`, `sale_id`, `item_id`, `qty`, `total`) VALUES
(74, 83, 23, 1, 5000),
(75, 83, 16, 1, 25000),
(76, 84, 23, 1, 5000),
(77, 84, 16, 1, 25000),
(78, 85, 24, 1, 7000),
(79, 85, 23, 1, 5000),
(80, 85, 20, 1, 20000),
(81, 85, 17, 1, 15000);

-- --------------------------------------------------------

--
-- Table structure for table `t_stock`
--

CREATE TABLE `t_stock` (
  `stock_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `type` enum('in','out') NOT NULL,
  `detail` varchar(200) NOT NULL,
  `supplier_id` int(11) DEFAULT NULL,
  `qty` int(10) NOT NULL,
  `date` date NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `t_stock`
--

INSERT INTO `t_stock` (`stock_id`, `item_id`, `type`, `detail`, `supplier_id`, `qty`, `date`, `created`, `updated`, `user_id`) VALUES
(18, 16, 'in', 'ini adalah kopi', 1, 10, '2022-02-01', '2022-02-01 20:17:34', '0000-00-00 00:00:00', 6),
(19, 23, 'in', 'ini adalah kopi susu', 1, 10, '2022-02-01', '2022-02-01 20:25:48', '0000-00-00 00:00:00', 6),
(20, 24, 'in', 'ini adalah kopi susu', 1, 15, '2022-02-06', '2022-02-06 18:04:21', '0000-00-00 00:00:00', 6),
(21, 22, 'in', 'ini adalah kopi', 1, 23, '2022-02-06', '2022-02-06 18:05:06', '0000-00-00 00:00:00', 6),
(22, 21, 'in', 'ini adalah susu coklat', 1, 32, '2022-02-06', '2022-02-06 18:05:33', '0000-00-00 00:00:00', 6),
(23, 20, 'in', 'ini adalah susu full cream', 5, 33, '2022-02-06', '2022-02-06 18:06:00', '0000-00-00 00:00:00', 6),
(24, 17, 'in', 'ini adalah roti tawar', 1, 34, '2022-02-06', '2022-02-06 18:06:43', '0000-00-00 00:00:00', 6);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(200) NOT NULL,
  `level` int(1) NOT NULL COMMENT '1:admin, 2:manager, 3:kasir'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `name`, `address`, `level`) VALUES
(6, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'admin', 'Makassar', 1),
(7, 'manager2', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Joen Doe', 'Bandung', 2),
(8, 'kasir1', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Rrara', 'sasa', 3),
(9, 'kasir', '8691e4fc53b99da544ce86e22acba62d13352eff', 'kasir', 'makssar', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `p_category`
--
ALTER TABLE `p_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `p_item`
--
ALTER TABLE `p_item`
  ADD PRIMARY KEY (`item_id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `p_item_ibfk_2` (`unit_id`);

--
-- Indexes for table `p_unit`
--
ALTER TABLE `p_unit`
  ADD PRIMARY KEY (`unit_id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`supplier_id`);

--
-- Indexes for table `t_sale`
--
ALTER TABLE `t_sale`
  ADD PRIMARY KEY (`sale_id`);

--
-- Indexes for table `t_sale_detail`
--
ALTER TABLE `t_sale_detail`
  ADD PRIMARY KEY (`sale_detail_id`),
  ADD KEY `sale_id` (`sale_id`),
  ADD KEY `item_id` (`item_id`);

--
-- Indexes for table `t_stock`
--
ALTER TABLE `t_stock`
  ADD PRIMARY KEY (`stock_id`),
  ADD KEY `item_id` (`item_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `supplier_id` (`supplier_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `p_category`
--
ALTER TABLE `p_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `p_item`
--
ALTER TABLE `p_item`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `p_unit`
--
ALTER TABLE `p_unit`
  MODIFY `unit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `supplier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `t_sale`
--
ALTER TABLE `t_sale`
  MODIFY `sale_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `t_sale_detail`
--
ALTER TABLE `t_sale_detail`
  MODIFY `sale_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `t_stock`
--
ALTER TABLE `t_stock`
  MODIFY `stock_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `p_item`
--
ALTER TABLE `p_item`
  ADD CONSTRAINT `p_item_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `p_category` (`category_id`),
  ADD CONSTRAINT `p_item_ibfk_2` FOREIGN KEY (`unit_id`) REFERENCES `p_unit` (`unit_id`);

--
-- Constraints for table `t_sale_detail`
--
ALTER TABLE `t_sale_detail`
  ADD CONSTRAINT `t_sale_detail_ibfk_1` FOREIGN KEY (`sale_id`) REFERENCES `t_sale` (`sale_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `t_sale_detail_ibfk_2` FOREIGN KEY (`item_id`) REFERENCES `p_item` (`item_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `t_stock`
--
ALTER TABLE `t_stock`
  ADD CONSTRAINT `t_stock_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `p_item` (`item_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `t_stock_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `t_stock_ibfk_3` FOREIGN KEY (`supplier_id`) REFERENCES `supplier` (`supplier_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
