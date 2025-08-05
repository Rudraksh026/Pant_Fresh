-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 05, 2025 at 04:55 PM
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
(1, 'Soy Milk', 20, 25, 'Food Tech', 0, 'Unit'),
(2, 'Haldi', 70, 80, 'Food Tech', 0, 'Kg'),
(3, 'Litchi RTS', 8, 10, 'Food Tech', 0, 'Unit'),
(4, 'Nimbu Pani', 15, 20, 'Food Tech', 0, 'Unit'),
(5, 'Mixed RTS', 15, 20, 'Food Tech', 0, 'Unit'),
(6, 'Guava RTS', 15, 20, 'Food Tech', 0, 'Unit'),
(7, 'Kinnow RTS', 20, 25, 'Food Tech', 0, 'Unit'),
(8, 'Mango Squash', 100, 120, 'Food Tech', 0, 'Unit'),
(9, 'Mixed Squash', 100, 120, 'Food Tech', 0, 'Unit'),
(10, 'Orange Squash', 100, 120, 'Food Tech', 0, 'Unit'),
(11, 'Guava Squash', 100, 120, 'Food Tech', 0, 'Unit'),
(12, 'Ice Cream Cup', 120, 140, 'Livestock and Poultry Department', 0, 'ltr'),
(13, 'Ice Cream Brick', 150, 200, 'Livestock and Poultry Department', 0, 'ltr'),
(14, 'Paneer', 420, 460, 'Livestock and Poultry Department', 0, 'Kg'),
(15, 'Open Buff Ghee', 695, 770, 'Livestock and Poultry Department', 0, 'Kg'),
(16, 'Sahiwal Ghee', 840, 930, 'Livestock and Poultry Department', 0, 'Kg'),
(17, 'Open Milk Mix', 48, 55, 'Livestock and Poultry Department', 0, 'ltr'),
(18, 'Peda', 460, 510, 'Livestock and Poultry Department', 0, 'Kg'),
(19, 'Chicken Nuggets', 700, 780, 'Livestock and Poultry Department', 0, 'Kg'),
(20, 'Chicken Samosa', 500, 560, 'Livestock and Poultry Department', 0, 'Kg'),
(21, 'Chicken Patties', 700, 780, 'Livestock and Poultry Department', 0, 'Kg'),
(22, 'Egg (Brown)', 7, 8, 'Poultry Products', 0, 'Unit'),
(23, 'Egg B Grade (White)', 4, 5, 'Poultry Products', 0, 'Unit'),
(24, 'Egg B Grade (Brown)', 6, 7, 'Poultry Products', 0, 'Unit'),
(25, 'Egg C Grade (White)', 3, 4, 'Poultry Products', 0, 'Unit'),
(26, 'Egg C Grade (Brown)', 4, 5, 'Poultry Products', 0, 'Unit'),
(27, 'Quail Egg', 1, 2, 'Poultry Products', 0, 'Unit'),
(28, 'Fowl Egg', 15, 20, 'Poultry Products', 0, 'Unit'),
(29, 'Fish Cutlets', 20, 25, 'Fisheries Product', 0, 'Unit'),
(30, 'Fish Burger', 100, 120, 'Fisheries Product', 0, 'Unit'),
(31, 'Fish Momo', 100, 120, 'Fisheries Product', 0, 'Unit'),
(32, 'Ashwagandha', 40, 50, 'Horiculture Products', 0, 'Unit'),
(33, 'Fenugreek', 400, 450, 'Horiculture Products', 0, 'Kg'),
(34, 'Tejpatta', 100, 120, 'Horiculture Products', 0, 'Unit'),
(35, 'Milky Mushroom', 125, 150, 'Mushroom Products', 0, 'Kg'),
(36, 'Oyester Mushroom', 1000, 1200, 'Mushroom Products', 0, 'Kg');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `item_sell_table`
--
ALTER TABLE `item_sell_table`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sell_id_info`
--
ALTER TABLE `sell_id_info`
  MODIFY `sell_id` int(11) NOT NULL AUTO_INCREMENT;

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
