-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 25, 2024 at 11:43 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `php_user`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(191) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `password` varchar(191) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(255) NOT NULL,
  `cust_id` int(255) NOT NULL,
  `prod_id` int(255) NOT NULL,
  `prod_name` varchar(255) NOT NULL,
  `prod_img` varchar(255) NOT NULL,
  `qty` int(255) NOT NULL,
  `price` int(255) NOT NULL,
  `total_price` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `cust_id`, `prod_id`, `prod_name`, `prod_img`, `qty`, `price`, `total_price`) VALUES
(5, 3, 1, 'Peace Lily Plant', 'indoor1.jpeg', 2, 299, 598),
(8, 3, 2, 'Bamboo Palm Plant', 'indoor2.jpeg', 5, 399, 1995),
(9, 3, 4, 'Snake Plant', 'indoor4.jpeg', 4, 249, 996),
(10, 3, 18, 'Apple Ceramic Pot', 'pot1.jpeg', 2, 599, 1198),
(25, 5, 1, 'Peace Lily Plant', 'indoor1.jpeg', 5, 299, 1495),
(30, 6, 9, 'Lavendar', 'outdoor1.jpeg', 2, 349, 698),
(31, 6, 3, 'Money Plant', 'indoor3.jpeg', 4, 249, 996),
(39, 1, 1, 'Peace Lily Plant', 'indoor1.jpeg', 3, 299, 897),
(40, 1, 2, 'Bamboo Palm Plant', 'indoor2.jpeg', 3, 399, 1197);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `address` varchar(255) NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `email`, `phone`, `password`, `address`, `created_at`) VALUES
(1, 'Koushik Vishwakarma', 'koushikv333@gmail.com', '9867012700', 'Koushik@123', 'C-401,shree krishna heights,hendrepada,badlapur(W)', '2023-09-07'),
(3, 'Ved Vishwakarma', 'vedvishwakarma451@gmail.com', '8097302962', 'Pokemon@97', 'C-401,shree krishna heights,hendrepada,badlapur(W)', '2023-09-07'),
(5, 'Dummy User111', 'dummy_user@gmail.com', '9867012700', 'Dummyuser@111', 'C wing 401 Shree Krishna Heights Hendrepada Badlapur west', '2023-09-19'),
(6, 'Soham Ramchandani', 'soham@gmail.com', '9836916440', 'Shoam@1234', 'C wing 401 Shree Krishna Heights Hendrepada Badlapur west', '2023-10-04');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(255) NOT NULL,
  `cust_id` int(255) NOT NULL,
  `prod_name` varchar(255) NOT NULL,
  `ord_dte` date NOT NULL DEFAULT current_timestamp(),
  `tot_amt` int(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `cust_id`, `prod_name`, `ord_dte`, `tot_amt`, `status`) VALUES
(2, 1, 'Bamboo Palm Plant', '2023-10-29', 7380, 'pending'),
(3, 1, 'Lavendar', '2023-10-29', 7380, 'pending'),
(4, 1, 'Peace Lily Plant', '2023-10-29', 7380, 'pending'),
(35, 1, 'Peace Lily Plant', '2023-10-30', 2094, 'pending'),
(36, 1, 'Bamboo Palm Plant', '2023-10-30', 2094, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `discount` float NOT NULL,
  `product_code` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `image`, `type`, `price`, `discount`, `product_code`) VALUES
(1, 'Peace Lily Plant', 'indoor1.jpeg', 'indoor', 299, 10, 'p1000'),
(2, 'Bamboo Palm Plant', 'indoor2.jpeg', 'indoor', 399, 15, 'p1001'),
(3, 'Money Plant', 'indoor3.jpeg', 'indoor', 249, 10, 'p1002'),
(4, 'Snake Plant', 'indoor4.jpeg', 'indoor', 249, 5, 'p1003'),
(5, 'Bamboo Plant', 'indoor5.jpeg', 'indoor', 399, 12, 'p1004'),
(6, 'Christmas Cactus', 'indoor6.jpeg', 'indoor', 699, 20, 'p1005'),
(7, 'Green Fern Plant', 'indoor7.jpeg', 'indoor', 499, 12, 'p1006'),
(8, 'Aloe Vera Plant', 'indoor8.jpeg', 'indoor', 599, 10, 'p1007'),
(9, 'Lavendar', 'outdoor1.jpeg', 'outdoor', 349, 8, 'p1008'),
(10, 'Canna Lily', 'outdoor2.jpeg', 'outdoor', 699, 17, 'p1009'),
(11, 'Palm Plant', 'outdoor3.jpeg', 'outdoor', 769, 14, 'p1010'),
(12, 'Cordyline Plant', 'outdoor4.jpeg', 'outdoor', 399, 10, 'p1011'),
(13, 'Tomato Seed', 'seed1.jpg', 'seed', 99, 5, 'p1012'),
(14, 'Cheery Tomato Seed', 'seed2.jpeg', 'seed', 119, 5, 'p1013'),
(15, 'Green Chilli Seed', 'seed3.jpeg', 'seed', 99, 12, 'p1014'),
(16, 'Capsicum Seed', 'seed4.jpeg', 'seed', 99, 5, 'p1015'),
(17, 'Red Capsicum Seed', 'seed5.jpeg', 'seed', 119, 3, 'p1016'),
(18, 'Apple Ceramic Pot', 'pot1.jpeg', 'pot', 599, 15, 'p1017'),
(19, 'Roma Ceramic Pot', 'pot2.jpeg', 'pot', 439, 10, 'p1018'),
(20, 'Football Ceramic Pot', 'pot3.jpeg', 'pot', 499, 13, 'p1019'),
(40, 'Melon Ceramic Pot', 'pot4.jpeg', 'pot', 296, 10, ''),
(41, 'Beetroot seed', 'seed6.jpeg', 'seed', 99, 2, '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `password` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `phone`, `password`, `created_at`) VALUES
(3, 'Ved Vishwakarma', 'vedvishwakarma451@gmail.com', '8097302977', 'Pokemon@97', NULL),
(5, 'Vishal Prajapati', 'vp0500112@gmail.com', '7400309829', '123456', NULL),
(6, 'Aanchal Gupta', 'aanchal@gmail.com', '9876543210', 'aanchal@moti', NULL),
(7, 'Dhiraj Vishwakarma', 'dhirajkumarv.19@gmail.com', '9920697413', 'dhirajk19', NULL),
(16, 'koushik dummy', 'koushik@gmail.com', '9824312543', 'Koushikdummy@1', '2023-09-07 08:10:56'),
(17, 'Dummy User', 'dummy_user@gmail.com', '9867012711', 'Dummyuser@123', '2023-09-11 07:13:55');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
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
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
