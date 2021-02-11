-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 10, 2021 at 09:02 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `scandiwebdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` smallint(5) UNSIGNED NOT NULL,
  `product_sku` varchar(20) NOT NULL,
  `product_name` varchar(40) NOT NULL,
  `unit_price` decimal(10,2) UNSIGNED DEFAULT 0.00,
  `product_type` varchar(40) NOT NULL,
  `product_description` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_sku`, `product_name`, `unit_price`, `product_type`, `product_description`) VALUES
(23, '1324-DS-13', 'Book One', '15.45', 'book', 'Weight: 2 KG'),
(24, 'DD-1317-004', 'Book Two', '23.15', 'book', 'Weight: 2.5 KG'),
(25, '66-12-ABCD', 'Book Three', '9.99', 'book', 'Weight: 5.5 KG'),
(26, '00-1244-DEDG', 'Book Four', '18.98', 'book', 'Weight: 3.33 KG'),
(27, 'ABC-DEF-GHJ', 'Book Five', '17.88', 'book', 'Weight: 1.2 KG'),
(28, 'CD-1313-99', 'CD One', '5.99', 'dvd', 'Size: 900 MB'),
(29, 'CD-1123-113D', 'CD Two', '7.42', 'dvd', 'Size: 760 MB'),
(30, 'CD-DEEFG-12', 'CD Three', '49.99', 'dvd', 'Size: 15000 MB'),
(31, 'CD-ADDEFL-15', 'CD Four', '59.99', 'dvd', 'Size: 20000 MB'),
(32, 'CD-1313-1DBG', 'CD Five', '75.90', 'dvd', 'Size: 15000 MB'),
(33, 'FURN-113150', 'Furniture One', '255.55', 'furniture', 'Dimension: 1000x800x1200'),
(34, 'FURN-555944', 'Furniture Two', '599.00', 'furniture', 'Dimension: 800x900x1300'),
(35, 'FURN-989898', 'Furniture Three', '199.09', 'furniture', 'Dimension: 1200x1000x1800'),
(36, 'FURN-901009', 'Furniture Four', '1515.15', 'furniture', 'Dimension: 900x1200x2500'),
(37, 'FURN-555555', 'Furniture Five', '900.01', 'furniture', 'Dimension: 1500x1200x1900');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD UNIQUE KEY `ProductSKU` (`product_sku`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
