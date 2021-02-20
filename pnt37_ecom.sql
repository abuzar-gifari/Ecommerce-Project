-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 20, 2021 at 06:32 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pnt37_ecom`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(3, 'Shirt'),
(11, 'watch'),
(12, 'Electorinices'),
(13, 'Health'),
(14, 'Home Appliance'),
(15, 'Toys'),
(16, 'Mens fashion');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `total_price` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(2000) NOT NULL,
  `sku` varchar(100) NOT NULL,
  `description` varchar(5000) NOT NULL,
  `buying_price` int(11) NOT NULL,
  `selling_price` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `vat` int(11) NOT NULL,
  `size` varchar(20) NOT NULL,
  `color` varchar(200) NOT NULL,
  `stock_qty` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `sub_category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `sku`, `description`, `buying_price`, `selling_price`, `discount`, `vat`, `size`, `color`, `stock_qty`, `category_id`, `sub_category_id`) VALUES
(43, 'Neck warmer knitted hat scarf set fur Wool Lining Thick Warm Knit beanies balaclava Winter Hat For men women Cap Skullies bonnet', '6729477', 'Product details of Neck warmer knitted hat scarf set fur Wool Lining Thick Warm Knit beanies balaclava Winter Hat For men women Cap Skullies bonnet Product Type: Hat Color: blackSpecifications of UGLY FISH Cap Winter Hat And Neck Warmer For Men Knit Hat SkulliesBeanies Main Material:Fabric Stylish and fashionable Gender: Men And Women Season:Winter Only Specifications of UGLY FISH Cap Winter Hat And Neck Warmer For Men Knit Hat SkulliesBeanies', 70, 699, 79, 10, '[\"xl\"]', '[\"red\"]', 1000, 16, 3),
(44, 'Huawei Mediapad T3 8inch', '5090954', 'Huawei Mediapad T3 8inch Tablet 2 GB RAM/16GB ROMHuawei Mediapad T3 8inch Tablet 2 GB RAM/16GB ROMHuawei Mediapad T3 8inch Tablet 2 GB RAM/16GB ROMHuawei Mediapad T3 8inch Tablet 2 GB RAM/16GB ROM', 10000, 20000, 20, 10, '[\"xl\",\"xxl\",\"small\"]', '[\"red\",\"blue\"]', 200, 12, 3),
(45, 'Toys For Kids', '9198299', 'Playing with toys is an essential part of children’s lives when they are young. So Buy it now.', 200, 100, 23, 10, '[\"small\"]', '[\"red\"]', 100, 15, 3),
(46, 'Men’s Premium T-Shirt', '5239619', 'This premium T-shirt is as close to perfect as can be.', 1000, 2500, 20, 10, '[\"xl\"]', '[\"green\",\"blue\"]', 100, 3, 3),
(47, 'Unisex Tri-Blend T-Shirt', '104140', 'The unisex T-shirt in a super trendy heather look.', 1500, 2000, 20, 15, '[\"xxl\"]', '[\"red\",\"green\"]', 50, 3, 3),
(48, 'Maternity T-Shirt', '4408143', 'This t-shirt is very Soft and stretchy.', 2500, 3000, 10, 5, '[\"xl\",\"xxl\",\"small\"]', '[\"red\"]', 80, 3, 3),
(49, 'Unisex Jersey T-Shirt', '8938574', 'This T-shirt is perfect for that tailored look', 2500, 3500, 10, 2, '[\"xl\",\"xxl\"]', '[\"green\",\"blue\"]', 40, 3, 3),
(50, 'Womens T-Shirt', '500525', 'This T-shirt is perfect for that tailored look', 2500, 3000, 20, 10, '[\"xxl\"]', '[\"red\",\"green\"]', 20, 3, 3),
(51, 'Premium T-Shirt', '4418047', 'It has survived not only five centuries.', 2500, 3000, 10, 5, '[\"xl\",\"xxl\"]', '[\"red\"]', 50, 3, 3),
(52, 'AE-1000W-2A2VEF', '3493424', 'A light-emitting diode is used to illuminate the watch face.', 200, 300, 10, 5, '[\"xxl\"]', '[\"red\"]', 10, 11, 3),
(53, 'AE-10W-4BVEF', '8114671', '10 years, 1 battery. Newly developed electronics ensure significantly lower energy consumption.', 500, 700, 10, 5, '[\"xl\"]', '[\"red\"]', 100, 11, 3),
(54, 'PRT-B50T-7ER', '6643718', 'The watch is equipped with energy-saving Bluetooth.', 200, 300, 12, 4, '[\"xl\"]', '[\"red\"]', 100, 11, 3),
(55, 'PRW-70TN-8JR', '2371767', 'Even temperatures as low as -10 °C have no effect on this watch.', 250, 300, 15, 12, '[\"xl\"]', '[\"red\"]', 10, 11, 3),
(56, 'LCW-M170TD-7AER', '7104110', 'Displays the current time in major cities and specific areas around the world.', 250, 350, 10, 5, '[\"small\"]', '[\"blue\"]', 100, 11, 3),
(57, 'WV-59E-1AVEG', '5381087', 'The surface of the watch glass is domed.', 400, 590, 5, 2, '[\"small\"]', '[\"red\"]', 500, 11, 3),
(59, 'Conion Deep Freeze', '9711793', 'Conion Deep Freezer BEK-130JMM (Maroon) is a powerful and reliable deep freeze', 22, 24224, 25, 15, '[\"xl\",\"xxl\"]', '[\"green\"]', 300, 12, 3),
(60, 'Hitachi Vacuum Cleaner', '1183673', 'Hitachi Vacuum Cleaner CV-SE22V 240C (RE) can be the solution to your cleaning worries.', 18, 19200, 25, 4, '[\"xl\"]', '[\"red\"]', 200, 12, 3),
(61, 'Hitachi Gas Burner', '5430729', 'Hitachi Gas Burner MPH-210R1 is a gas burner that’ll remove all your cooking worries', 5000, 7300, 70, 20, '[\"xxl\"]', '[\"green\"]', 300, 12, 3),
(62, 'Philips Iron GC 1424', '4504432', 'Bring home your Philips Iron GC 1424 from your nearest Best Electronics Store and enjoy Easy Installment Payment Facility.', 1780, 2200, 20, 13, '[\"small\"]', '[\"red\"]', 300, 12, 3),
(63, 'Hitachi Washing Machine', '4671506', 'Best Air Conditioners In Bangladesh. High Quality. High Performing ACs are only here.', 2000, 3000, 20, 10, '[\"xxl\"]', '[\"blue\"]', 100, 12, 3);

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_image_name` varchar(200) DEFAULT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `product_image_name`, `status`) VALUES
(29, 43, '7115264pro.jpg', 1),
(30, 43, '4176121pro.jpg', 2),
(31, 43, '2755627pro.jpg', 3),
(32, 44, '3566447de52d148c7960ddd5dfe7e86f62f3e37.jpg_340x340q80.jpg', 1),
(33, 44, '38284594ac8ade24f3fcbb0147aced5b29f3c8f.jpg_340x340q80.jpg', 2),
(34, 44, '173033298742dbd4781c8f77b78c7876c17a867.jpg_340x340q80.jpg', 3),
(35, 45, '7877135toys.jpg', 1),
(36, 45, '6938481toys.jpg', 2),
(37, 45, '6700318toys.jpg', 3),
(41, 46, '8064409shirt_01.jpg', 1),
(42, 46, '2509988shirt_01.jpg', 2),
(43, 46, '8735489shirt_01.jpg', 3),
(44, 47, '9504432shirt_02.jpg', 1),
(45, 47, '8132050shirt_02.jpg', 2),
(46, 47, '6890652shirt_02.jpg', 3),
(47, 48, '6833348shirt_03.png', 1),
(48, 48, '9453390shirt_03.png', 2),
(49, 48, '7800320shirt_03.png', 3),
(50, 49, '6170857shirt_04.png', 1),
(51, 49, '5927756shirt_04.png', 2),
(52, 49, '483195shirt_04.png', 3),
(62, 50, '9709433shirt_05.jpg', 1),
(63, 50, '120374shirt_05.jpg', 2),
(64, 50, '6015977shirt_05.jpg', 3),
(71, 51, '470977shirt_06.jpg', 1),
(72, 51, '8225372shirt_06.jpg', 2),
(73, 51, '3841021shirt_06.jpg', 3),
(74, 52, '6996917watch1.jpg', 1),
(75, 52, '664767watch1.jpg', 2),
(76, 52, '4464522watch1.jpg', 3),
(77, 53, '4046546AE-1000W-4BVEF.jpg', 1),
(78, 53, '2785053AE-1000W-4BVEF.jpg', 2),
(79, 53, '207967AE-1000W-4BVEF.jpg', 3),
(80, 54, '8569973watch3.jpg', 1),
(81, 54, '3923110watch3.jpg', 2),
(82, 54, '1684410watch3.jpg', 3),
(83, 55, '1074936watch4.jpg', 1),
(84, 55, '4731120watch4.jpg', 2),
(85, 55, '4680215watch4.jpg', 3),
(86, 56, '4265708watch5.jpg', 1),
(87, 56, '3190217watch5.jpg', 2),
(88, 56, '4196143watch5.jpg', 3),
(89, 57, '9085392watch6.jpg', 1),
(90, 57, '3017watch6.jpg', 2),
(91, 57, '6822514watch6.jpg', 3),
(95, 59, '9156806freeze.jpg', 1),
(96, 59, '3317975freeze.jpg', 2),
(97, 59, '922883freeze.jpg', 3),
(98, 60, '4690474Hitachi-Vacuum-Cleaner.png', 1),
(99, 60, '6162778Hitachi-Vacuum-Cleaner.png', 2),
(100, 60, '9992713Hitachi-Vacuum-Cleaner.png', 3),
(101, 61, '5363283Hitachi-Gas-Burner.png', 1),
(102, 61, '8765701Hitachi-Gas-Burner.png', 2),
(103, 61, '1813395Hitachi-Gas-Burner.png', 3),
(104, 62, '3255574iron.jpg', 1),
(105, 62, '2008200iron.jpg', 2),
(106, 62, '4858386iron.jpg', 3),
(110, 63, '4638988hitachi234.jpg', 1),
(111, 63, '9515661hitachi234.jpg', 2),
(112, 63, '7056766hitachi234.jpg', 3);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `name`) VALUES
(1, 'admin'),
(2, 'user'),
(3, 'supplier');

-- --------------------------------------------------------

--
-- Table structure for table `sizes`
--

CREATE TABLE `sizes` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`id`, `name`, `category_id`) VALUES
(3, 'Accessories', 16);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fname` varchar(200) NOT NULL,
  `lname` varchar(200) NOT NULL,
  `passwords` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone` int(11) NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `passwords`, `email`, `phone`, `image`) VALUES
(5, 'Mr', 'korim', '123456', 'armanhakimsagar@gmail.com', 1627440390, 'ab.jpg'),
(6, 'admin', 'system', '123456789', 'admin@gmail.com', 1627388290, 'admin.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role_id`, `user_id`) VALUES
(3, 2, 5),
(4, 1, 6);

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `size` int(11) NOT NULL,
  `color` int(11) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id`, `product_id`, `qty`, `user_id`, `size`, `color`, `create_at`) VALUES
(1, 48, 1, 0, 1, 0, '0000-00-00 00:00:00'),
(2, 47, 1, 5, 0, 1, '0000-00-00 00:00:00'),
(9, 49, 1, 5, 1, 1, '0000-00-00 00:00:00'),
(13, 53, 2, 5, 0, 0, '0000-00-00 00:00:00'),
(14, 53, 2, 5, 0, 0, '0000-00-00 00:00:00'),
(15, 59, 1, 5, 0, 0, '0000-00-00 00:00:00'),
(16, 59, 1, 5, 0, 0, '0000-00-00 00:00:00'),
(17, 53, 1, 6, 0, 0, '0000-00-00 00:00:00'),
(18, 54, 1, 6, 0, 0, '0000-00-00 00:00:00'),
(19, 44, 1, 5, 1, 1, '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sizes`
--
ALTER TABLE `sizes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
