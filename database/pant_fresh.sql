-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 09, 2025 at 09:34 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pant_fresh`
--

-- --------------------------------------------------------

--
-- Table structure for table `item_info`
--

CREATE TABLE `item_info` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `buy_price` int(11) NOT NULL,
  `sell_price` int(11) NOT NULL,
  `provider` varchar(255) NOT NULL,
  `quantity` float NOT NULL,
  `measure_standard` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `item_info`
--

INSERT INTO `item_info` (`id`, `name`, `buy_price`, `sell_price`, `provider`, `quantity`, `measure_standard`) VALUES
(1, 'Honey', 350, 385, '-', 0.25, 'kg'),
(2, 'Kinnow Squash\r\n', 50, 55, '-', 0.5, 'unit'),
(3, 'Mango Squash', 100, 110, '-', 1, 'unit'),
(4, 'Guava Squash', 100, 110, '-', 1, 'unit'),
(5, 'Orange Squash', 100, 110, '-', 1, 'unit'),
(6, 'Mixed Squash', 100, 110, '-', 0, 'unit'),
(7, 'Haldi', 70, 77, '-', 0, 'unit'),
(8, 'Pickles', 10, 11, '-', 0, 'unit'),
(9, 'Litchi RTS', 8, 9, '-', 0, 'unit'),
(10, 'Guava RTS', 15, 17, '-', 0, 'unit'),
(11, 'Nimbu Pani', 15, 17, '-', 0, 'unit'),
(12, 'Mixed RTS', 15, 17, '-', 0, 'unit'),
(13, 'Orange RTS', 15, 17, '-', 0, 'unit'),
(14, 'Soya Milk', 20, 22, '-', 0, 'unit'),
(15, 'Kinnow RTS', 20, 22, '-', 0, 'unit'),
(16, 'Lime RTS', 20, 22, '-', 0, 'unit'),
(17, 'Gulab Jal', 40, 44, '-', 0, 'unit'),
(18, 'Paneer', 420, 465, '-', 0, 'kg'),
(19, 'Peda', 460, 506, '-', 0, 'kg'),
(20, 'Khoa per', 460, 506, '-', 0, 'kg'),
(21, 'Chicken pickle', 600, 660, '-', 0, 'kg'),
(22, 'Chicken samosa', 500, 550, '-', 0, 'kg'),
(23, 'Chicken patties', 700, 770, '-', 0, 'kg'),
(24, 'Chicken nuggets', 700, 770, '-', 0, 'kg'),
(25, 'Chicken sausage', 700, 770, '-', 0, 'kg'),
(26, 'Chicken tikka', 600, 660, '-', 0, 'kg'),
(27, 'Crispy Fried Chicken ', 100, 110, '-', 0, 'unit'),
(28, 'Ice cream-cup ', 120, 132, '-', 0, 'lt'),
(29, 'Ice cream(brick)', 15, 17, '-', 0, 'unit'),
(30, 'Open mix milk', 48, 53, '-', 0, 'lt'),
(31, 'Open milk buff.', 64, 71, '-', 0, 'lt'),
(32, 'Open cream ', 420, 462, '-', 0, 'lt'),
(33, 'Open Buff. Ghee', 695, 764, '-', 0, 'kg'),
(34, 'Cow Ghee (Shankar)', 773, 850, '-', 0, 'kg'),
(35, 'Sahiwal Cow Ghee', 840, 924, '-', 0, 'kg'),
(36, 'Fish Cutlet ', 20, 22, '-', 0, 'piece'),
(37, 'Fish Kure', 30, 33, '-', 0, 'piece'),
(38, 'Fish Burger ', 100, 110, '-', 0, 'unit'),
(39, 'Fish Momo', 100, 110, '-', 0, 'unit'),
(40, 'Milky Mushroom Pickle', 50, 55, '-', 0, 'kg'),
(41, 'Dry Mushroom ', 1000, 1100, '-', 0, 'kg'),
(42, 'Kalmegh powder ', 40, 44, '-', 0, 'kg'),
(43, 'Pot 5in', 80, 88, '-', 0, 'unit'),
(44, 'Pot 8in', 100, 110, '-', 0, 'unit'),
(45, 'Grow Bag', 150, 165, '-', 0, 'unit'),
(46, 'Lotus stem', 150, 165, '-', 0, 'unit'),
(47, 'Rose - cut flower', 10, 11, '-', 0, 'unit'),
(48, 'Packaged flower seed', 20, 22, '-', 0, 'unit'),
(49, 'xyz', 10, 11, '-', 0, 'Unit');

-- --------------------------------------------------------

--
-- Table structure for table `item_sell_table`
--

CREATE TABLE `item_sell_table` (
  `sno` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `sell_id` int(11) NOT NULL,
  `buyer_name` varchar(255) NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `phone_no` varchar(15) NOT NULL,
  `mode_of_payment` varchar(50) NOT NULL,
  `quantity` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sell_id_info`
--

CREATE TABLE `sell_id_info` (
  `sell_id` int(11) NOT NULL,
  `sell_date` date NOT NULL,
  `sell_time` time NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `item_info`
--
ALTER TABLE `item_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item_sell_table`
--
ALTER TABLE `item_sell_table`
  ADD PRIMARY KEY (`sno`),
  ADD KEY `id` (`id`),
  ADD KEY `sell_id` (`sell_id`);

--
-- Indexes for table `sell_id_info`
--
ALTER TABLE `sell_id_info`
  ADD PRIMARY KEY (`sell_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `item_info`
--
ALTER TABLE `item_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `item_sell_table`
--
ALTER TABLE `item_sell_table`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `sell_id_info`
--
ALTER TABLE `sell_id_info`
  MODIFY `sell_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `item_sell_table`
--
ALTER TABLE `item_sell_table`
  ADD CONSTRAINT `item_sell_table_ibfk_1` FOREIGN KEY (`id`) REFERENCES `item_info` (`id`),
  ADD CONSTRAINT `item_sell_table_ibfk_2` FOREIGN KEY (`sell_id`) REFERENCES `sell_id_info` (`sell_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
