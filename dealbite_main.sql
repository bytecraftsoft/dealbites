-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 13, 2025 at 02:29 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dealbite_main`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `email`, `password`) VALUES
(1, 'admin', 'admin@dealbites.com', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `deals`
--

CREATE TABLE `deals` (
  `id` int(11) NOT NULL,
  `is_Promoted` tinyint(4) NOT NULL DEFAULT 0,
  `category_id` int(11) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `original_price` decimal(10,2) DEFAULT NULL,
  `restaurant` varchar(255) NOT NULL,
  `image` varchar(1000) DEFAULT NULL,
  `is_popular` tinyint(1) DEFAULT 0,
  `rating` decimal(3,2) DEFAULT NULL,
  `reviews` int(11) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `city` varchar(100) DEFAULT NULL,
  `tag` varchar(50) DEFAULT NULL,
  `views` int(11) DEFAULT 0,
  `is_premium` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `deals`
--

INSERT INTO `deals` (`id`, `is_Promoted`, `category_id`, `title`, `description`, `price`, `original_price`, `restaurant`, `image`, `is_popular`, `rating`, `reviews`, `start_date`, `end_date`, `created_at`, `city`, `tag`, `views`, `is_premium`) VALUES
(52, 0, 5, 'Sehri Deal for Two	', 'Special Sehri platter with drinks	', '999.00', '1299.00', 'Anarkali Restaurant	', '38.jpg', 1, '4.20', NULL, '3234-03-24', '3344-02-04', '2025-07-11 12:04:01', 'Lahore', 'Sehri	', 90, 0),
(53, 0, 4, '50% Off Pizza Mania	', 'Buy 1 Get 1 Free on all pizzas	', '799.00', '1499.00', 'Pizza House	', '43.jpg', 1, '4.50', NULL, '5544-03-04', '3333-02-23', '2025-07-11 12:06:02', 'Islamabad', 'Fast Food	', 101, 0),
(54, 0, 4, 'Unlimited BBQ Night	', 'All you can eat BBQ with live music	', '1999.00', '2499.00', 'BBQ Tonight	', '22.jpg', 0, '4.90', NULL, '2025-06-04', '2925-09-09', '2025-07-11 12:07:44', 'Lahore', 'Buffet', 200, 0),
(56, 0, 5, 'Chinese Bowl Deal	', '2 Bowls + Drink Combo	', '899.00', '1199.00', 'Dragon Express	', '23.jpg', 1, '4.90', NULL, '2222-02-02', '2342-03-04', '2025-07-13 11:04:01', 'Islamabad	', 'Hot Offer	', 222, 0);

-- --------------------------------------------------------

--
-- Table structure for table `deal_categories`
--

CREATE TABLE `deal_categories` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `slug` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `deal_categories`
--

INSERT INTO `deal_categories` (`id`, `name`, `description`, `slug`, `created_at`) VALUES
(3, 'Sehri Deals', 'Exclusive deals for Sehri meals', 'sehri-deals', '2025-03-08 08:06:48'),
(4, 'Unlimited Offers', 'All-you-can-eat offers', 'unlimited-offers', '2025-03-08 08:06:48'),
(5, 'Special Platter', 'Special food platters available for Ramadan', 'special-platter', '2025-03-08 08:06:48'),
(6, 'Discount Deals', 'Buy one get one and discount offers', 'discount-deals', '2025-03-08 08:06:48'),
(24, 'desi', 'this is desii', 'desi food', '2025-07-13 11:00:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deals`
--
ALTER TABLE `deals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `deal_categories`
--
ALTER TABLE `deal_categories`
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
-- AUTO_INCREMENT for table `deals`
--
ALTER TABLE `deals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `deal_categories`
--
ALTER TABLE `deal_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `deals`
--
ALTER TABLE `deals`
  ADD CONSTRAINT `deals_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `deal_categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
