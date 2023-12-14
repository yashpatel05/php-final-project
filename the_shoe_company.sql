-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2023 at 03:26 AM
-- Server version: 8.0.11
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `the_shoe_company`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(5) NOT NULL,
  `name` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `logo` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `logo`) VALUES
(1, 'Nike', 'Nike.png'),
(2, 'Addidas', 'Addidas.png'),
(3, 'Reebok', 'Reebok.png'),
(4, 'Bata', 'Bata.png'),
(5, 'Skechers', 'Sketchers.png'),
(6, 'Fila', 'fila.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(5) NOT NULL,
  `name` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `description` varchar(150) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`) VALUES
(1, 'Men', 'Stylish and durable footwear designed for the modern man\'s diverse lifestyle needs.'),
(2, 'Women', 'Fashionable and comfortable footwear tailored to women\'s versatile and dynamic fashion preferences.'),
(3, 'Kids', 'Playful and supportive footwear crafted to keep up with the energy and growth of active children.');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  `problem_solved` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `phone`, `email`, `subject`, `message`, `created_at`, `updated_at`, `problem_solved`) VALUES
(1, 'Akshay', '1234567890', 'pyash7224@gmail.com', 'Quality Issue with Recent Sneaker Purchase', 'I hope this message finds you well. I recently purchased a pair of sneakers (Order #123456) and unfortunately encountered some issues. The shoes show signs of rapid wear, discomfort, and overall poor quality.\r\n\r\nCould you please assist in resolving this matter promptly? I appreciate your attention to this concern.', '2023-12-02 23:25:25', '2023-12-14 01:25:01', 0),
(2, 'Vijul', '2345678910', 'vijulpatel865@gmail.com', 'Quality Concerns with Recent Shoe Purchase (Order #789012)', 'I regret to inform you that the shoes I recently purchased (Order #789012) exhibit signs of poor quality, discomfort, and premature wear. I kindly request your prompt assistance in resolving this matter to ensure customer satisfaction.', '2023-12-14 01:31:46', '2023-12-14 01:31:46', 0);

-- --------------------------------------------------------

--
-- Table structure for table `feedbacks`
--

CREATE TABLE `feedbacks` (
  `id` int(5) NOT NULL,
  `feedback` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int(5) NOT NULL,
  `product_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedbacks`
--

INSERT INTO `feedbacks` (`id`, `feedback`, `created_at`, `updated_at`, `user_id`, `product_id`) VALUES
(1, 'Absolutely love the comfort and style of these sneakers! Perfect for my daily workouts.', '2023-10-26 00:00:00', '2023-12-10 13:10:45', 6, 1),
(2, 'The boots are so durable and stylish, making them my go-to choice for outdoor adventures.', '2023-10-26 00:00:00', '2023-12-10 13:10:45', 2, 5),
(3, 'These heels are not only elegant but also surprisingly comfortable, perfect for long evenings.', '2023-10-27 00:00:00', '2023-12-10 13:10:45', 2, 10),
(4, 'My son adores his new school shoes! Durable, comfortable, and perfect for his active school days.', '2023-10-27 00:00:00', '2023-12-10 13:10:45', 3, 13),
(5, 'The loafers are a perfect blend of sophistication and comfort, ideal for both work and casual outings.', '2023-10-28 00:00:00', '2023-12-10 13:10:45', 4, 21),
(6, 'These sandals are a summer essential! They are lightweight and stylish, perfect for beach days.', '2023-10-28 00:00:00', '2023-12-10 13:10:45', 3, 33),
(7, 'I\'m impressed with the quality and design of these formal shoes. They elevate my professional look effortlessly.', '2023-10-29 00:00:00', '2023-12-10 13:10:45', 5, 32),
(8, 'My daughter loves her new sneakers! They provide excellent support and look super cute.', '2023-10-29 00:00:00', '2023-12-10 13:10:45', 5, 34),
(9, 'The wedges are so versatile and comfortable, adding a stylish touch to both casual and dressy outfits.', '2023-10-29 00:00:00', '2023-12-10 13:10:45', 2, 27),
(10, 'These slippers are so cozy and warm, making my evenings at home incredibly relaxing.', '2023-10-30 00:00:00', '2023-12-10 13:10:45', 6, 38),
(12, 'nice and comfortable', '2023-12-10 19:17:00', '2023-12-10 19:17:00', 2, 4),
(13, 'Got best shoes in cheap price', '2023-12-10 20:03:08', '2023-12-10 20:03:08', 2, 2),
(14, 'These airy open-toe shoes are a breeze to wear in warm weather, offering both style and comfort, perfect for laid-back outings and sunny beach days.', '2023-12-10 23:17:46', '2023-12-10 23:17:46', 9, 4);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `order_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `payment_status` int(11) NOT NULL,
  `order_status` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_date`, `payment_status`, `order_status`, `user_id`) VALUES
(1, '2023-12-11 13:19:47', 1, 1, 2),
(2, '2023-12-12 00:00:00', 1, 1, 2),
(3, '2023-12-13 15:11:40', 1, 1, 2),
(4, '2023-12-13 23:11:37', 1, 1, 9),
(6, '2023-12-13 18:20:27', 1, 1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(5) NOT NULL,
  `quantity` int(5) NOT NULL,
  `order_id` int(5) NOT NULL,
  `product_id` int(5) NOT NULL,
  `total_amount` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `quantity`, `order_id`, `product_id`, `total_amount`) VALUES
(1, 1, 1, 1, '80.00'),
(2, 3, 1, 2, '360.00'),
(3, 2, 1, 3, '140.00'),
(4, 1, 2, 4, '65.00'),
(5, 2, 3, 7, '300.00'),
(6, 1, 4, 1, '80.00'),
(7, 2, 4, 9, '300.00'),
(8, 1, 4, 35, '90.00'),
(9, 2, 6, 33, '380.00'),
(10, 1, 6, 32, '160.00'),
(11, 3, 6, 16, '255.00');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `payment_type` varchar(50) NOT NULL,
  `card_number` varchar(16) NOT NULL,
  `expiration_date` date NOT NULL,
  `cvv` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(5) NOT NULL,
  `name` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `description` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `price` int(10) NOT NULL,
  `quantity` int(15) NOT NULL,
  `image` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `size` int(5) NOT NULL,
  `colour` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `sub_category_id` int(5) NOT NULL,
  `brand_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `quantity`, `image`, `size`, `colour`, `sub_category_id`, `brand_id`) VALUES
(1, 'Sport shoes', 'Performance-driven footwear designed for athletic activities, offering support, comfort, and durability during sports and exercise', 80, 0, 'product-1.jpg', 10, 'black', 11, 2),
(2, 'Sneaker Shoes', 'Casual and versatile athletic footwear known for their comfort and style, suitable for everyday wear and light sports activities', 120, 40, 'skechers4.png', 9, 'Black', 9, 5),
(3, 'Slippers', 'Comfortable indoor footwear designed for relaxation and ease at home, providing warmth and comfort for leisure time', 70, 40, 'nike11.png', 9, 'black', 10, 1),
(4, 'sandals', 'Open-toe footwear perfect for warm weather, offering breathability and comfort, ideal for casual outings and beach days', 65, 40, 'adidas21.png', 8, 'black', 9, 2),
(5, 'sneakers', 'Stylish and functional athletic shoes designed for comfort and performance during sports activities and daily wear', 145, 40, 'product-7.jpg', 10, 'white', 9, 5),
(7, 'Addidas shoes', 'Footwear from the renowned brand Adidas known for its innovative designs, quality materials, and performance-oriented features, catering to various sports and casual activities.', 150, 40, 'adidas1.png', 8, 'black', 11, 2),
(8, 'Addidas shoes', 'A fusion of cutting-edge technology and contemporary style, providing superior performance and comfort for professional athletes and sports enthusiasts', 160, 40, 'adidas2.png', 8, 'red', 11, 2),
(9, 'Addidas shoes', 'A perfect combination of sleek design and exceptional functionality, offering unparalleled support and cushioning for various sports activities and daily wear', 150, 40, 'adidas3.png', 10, 'blue', 11, 2),
(10, 'Addidas slippers', 'Lightweight and durable slip-on footwear designed for post-workout relaxation, providing comfort and ease for tired feet', 60, 40, 'adidas11.png', 7, 'white', 10, 2),
(11, 'Addidas slippers', 'Trendy and comfortable indoor footwear perfect for casual lounging, featuring a soft footbed and a stylish design for everyday comfort at home', 70, 40, 'adidas12.png', 9, 'black ', 10, 2),
(12, 'Addidas slippers', 'Versatile and quick-drying slide sandals ideal for poolside and beach outings, offering comfort and convenience with a sporty and modern look', 65, 40, 'adidas13.png', 10, 'black', 10, 2),
(13, 'Addidas Sandals', 'Stylish and comfortable open-toe footwear perfect for warm weather, featuring a contoured footbed and adjustable straps for a customized fit and superior comfort', 60, 40, 'adidas23.png', 9, 'Black & Grey', 8, 2),
(14, 'Addidas Sandals', 'Durable and water-resistant outdoor sandals designed for adventure seekers, providing stability and support for various outdoor activities and excursions', 65, 40, 'adidas24.png', 10, 'Yellow', 8, 2),
(15, 'Addidas Sandals', 'Fashionable and lightweight slip-on sandals suitable for everyday wear, offering breathability and style with a cushioned footbed for all-day comfort', 75, 20, 'adidas25.png', 7, 'Grey', 8, 2),
(16, 'Bata Shoes', 'Timeless and reliable footwear known for their durability and classic designs, providing comfort and style for everyday use and formal occasions', 85, 17, 'bata6.png', 9, 'Black & Grey', 11, 4),
(17, 'Bata Shoes', 'High-quality and affordable shoes designed with attention to detail, offering a perfect blend of comfort and elegance for diverse fashion preferences', 95, 20, 'bata8.png', 10, 'Black & Grey', 11, 4),
(18, 'Bata Shoes', 'Versatile and practical footwear suitable for various activities, combining modern trends with superior craftsmanship, ensuring long-lasting comfort and support', 100, 20, 'bata10.png', 7, 'Brown', 6, 4),
(19, 'Bata Slippers', 'Cozy and lightweight indoor footwear designed for relaxation, featuring soft and cushioned soles for ultimate comfort at home', 65, 20, 'bata11.png', 8, 'Black', 10, 4),
(20, 'Bata Slippers', 'Simple and comfortable slip-on footwear perfect for casual wear, providing ease and convenience for everyday indoor activities and leisure time', 70, 20, 'bata12.png', 9, 'Cream & Black', 10, 4),
(21, 'Bata Slippers', ' Affordable and durable house slippers known for their practicality and comfort, making them an essential part of daily routines for all ages', 75, 20, 'bata19.png', 8, 'Black & Cream', 10, 4),
(22, 'Bata Sandals', 'Stylish and affordable open-toe footwear suitable for warm weather, offering a comfortable and lightweight option for casual outings and daily activities', 50, 20, 'bata21.png', 9, 'Black', 10, 4),
(23, 'Bata Sandals', 'Sturdy and reliable outdoor sandals designed for durability and functionality, providing support and grip for various outdoor adventures and leisure activities', 85, 20, 'bata30.png', 8, 'Black', 8, 4),
(24, 'Bata Sandals', 'Fashionable and comfortable slip-on sandals known for their versatility and ease, featuring adjustable straps and cushioned soles for all-day comfort and style', 75, 20, 'bata23.png', 10, 'White & Blue', 8, 4),
(25, 'Bata Sandals', 'Comfortable and affordable open-toe footwear suitable for warm weather, offering a range of designs from casual to semi-formal, ensuring comfort and style for various occasions', 65, 20, 'bata26.png', 8, 'Grey & White', 8, 4),
(26, 'Nike Shoes', 'Innovative and performance-driven footwear designed for athletes and sports enthusiasts, incorporating cutting-edge technology and stylish designs to enhance athletic performance and comfort', 110, 20, 'nike1.png', 7, 'Black & White', 11, 1),
(27, 'NIke Shoes', 'It is comfortable Sports Shoes.', 150, 20, 'nike2.png', 8, 'Black & Red', 11, 1),
(28, 'NIke Shoes', 'It is comfortable Sports Shoes.', 250, 20, 'nike3.png', 9, 'Black', 11, 1),
(29, 'Nike Slippers', 'It is comfortable Slipers for Woman.', 300, 20, 'nike12.png', 7, 'Black', 10, 1),
(30, 'Nike Slippers', 'It is comfortable Slippers for Man.', 100, 20, 'nike15.png', 8, 'Black', 10, 1),
(31, 'Nike Flip-Flop', 'It is comfortable Flip-Flop for Man.', 120, 20, 'nike13.png', 9, 'Black & White', 10, 1),
(32, 'Skechers Shoes', 'It is comfortable Sports Shoes.', 160, 19, 'skechers2.png', 9, 'Grey & Red', 11, 5),
(33, 'Skechers Shoes', 'It is comfortable Sports Shoes.', 190, 18, 'skechers5.png', 10, 'Blue', 11, 5),
(34, 'Skechers Shoes', 'It is comfortable Sneakers Shoes.', 210, 20, 'skechers4.png', 8, 'Grey & White', 9, 5),
(35, 'Skechers Sandals', 'It is comfortable Sandals.', 90, 20, 'skechers22.png', 8, 'Black', 8, 5),
(36, 'Skechers Sandals', 'It is comfortable Sandals for Woman.', 120, 20, 'skechers24.png', 9, 'White & Brown', 8, 5),
(37, 'Skechers Sandals', 'It is comfortable Sandals for Woman.', 150, 20, 'skechers25.png', 9, 'Cream & Grey', 8, 5),
(38, 'Skechers Slippers', 'It is comfortable Flip-Flop.', 120, 20, 'skechers11.png', 9, 'Red & Black', 10, 5),
(39, 'Skecehers Slippers', 'It is comfortable Slippers.', 100, 20, 'skechers12.png', 8, 'Blue', 10, 5);

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` int(5) NOT NULL,
  `name` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `description` varchar(150) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `category_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `name`, `description`, `category_id`) VALUES
(1, 'Loafers', 'Comfortable slip-on shoes suitable for both casual and semi-formal occasions.', 1),
(2, 'Boots', 'Sturdy and durable footwear designed for various outdoor activities and harsh weather conditions', 1),
(3, 'Sneakers', 'Casual and versatile athletic shoes known for their comfort and performance during sports and everyday activities', 1),
(4, 'Sandals', 'Open-toe footwear perfect for warm weather, offering breathability and comfort for casual outings', 1),
(5, 'Formal Shoes', 'Elegant and sophisticated footwear designed for formal events and business settings, exuding professionalism and style', 1),
(6, 'Heels', 'Elegant and stylish footwear with raised heels, adding height and enhancing the overall look for formal and special occasions', 2),
(7, 'Sandals', 'Stylish and breathable open-toe footwear ideal for warm weather, offering comfort and style for casual and semi-formal occasions', 2),
(8, 'Sneakers', 'Stylish and functional athletic shoes designed for comfort and performance during sports activities and daily wear', 2),
(9, 'Pumps', 'Classic and elegant high-heeled shoes designed for formal events and special occasions, adding sophistication and glamour to any outfit', 2),
(10, 'Wedges', 'Trendy and comfortable shoes with a solid sole, providing height and support, perfect for both casual and dressy outfits', 2),
(11, 'Sneakers', 'Comfortable and durable athletic shoes designed for children\'s play and sports activities, ensuring support and protection for active feet', 3),
(12, 'School Shoes', 'Durable and comfortable footwear designed for everyday school wear, ensuring support and ease for children\'s daily activities', 3),
(13, 'Sports Shoes', 'Functional and performance-driven athletic shoes crafted to provide support and comfort during various sports and physical activities for children', 3),
(14, 'Sandals', 'Lightweight and breathable open-toe footwear perfect for warm weather, providing comfort and ease for children\'s outdoor adventures', 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(5) NOT NULL,
  `name` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `password` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `email` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `contact_no` varchar(13) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `street_address` varchar(100) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `postal_code` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_admin` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `email`, `contact_no`, `street_address`, `city`, `state`, `postal_code`, `country`, `created_date`, `is_admin`) VALUES
(1, 'Yash Patel', 'yash1234', 'yash@gmail.com', '7894561230', '22 Starling dr', 'Hamilton', 'Ontario', 'L9A0C5', 'Canada', '2023-10-25 04:00:00', 1),
(2, 'Akshay Patel', 'akshay1234', 'pyash7224@gmail.com', '1236547890', '85 King St W.', 'Stoney Creek', 'Ontario', 'L8E0V4', 'Canada', '2023-10-25 04:00:00', 0),
(3, 'Utsa Rabbani', 'utsa1234', 'ami.utsarabbani@gmail.com', '4567891230', '34 Main St W', 'Toronto', 'Ontario', 'y7V2JE', 'Canada', '2023-10-26 04:00:00', 0),
(4, 'Saeed', 'saeed1234', 'saeed.uddin5559@gmail.com', '1234567890', '12 Dundas Street', 'Burlington', 'Ontario', 'W3R2JR', 'Canada', '2023-10-26 04:00:00', 0),
(5, 'Vijul Patel', 'vijul1234', 'vijulpatel865@gmail.com', '4561237890', '12 Bobolink Rd', 'Hamilton', 'Ontario', 'U9I8H7', 'Canada', '2023-10-27 04:00:00', 0),
(6, 'Shrey Shah', 'shrey1234', 'shreyshah2300@gmail.com', '8567894562', '10 Trafalgar Rd', 'Mississauga', 'Ontario', 'W5R3F4', 'Canada', '2023-10-27 04:00:00', 0),
(9, 'Mack Patel', 'mack1234', 'mackpatel2451988@gmail.com', '1234567890', '13 humming bird', 'hamilton', 'Ontario', 'J7U4F6', 'Canada', '2023-11-25 02:53:24', 0);

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `User_id` (`user_id`),
  ADD KEY `fk_feedbacks_product_id` (`product_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_orders_user_id` (`user_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Order_id` (`order_id`),
  ADD KEY `Product_id` (`product_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Sub_C_id` (`sub_category_id`),
  ADD KEY `Brand_id` (`brand_id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `C_id` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `carts_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD CONSTRAINT `fk_feedbacks_product_id` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `fk_feedbacks_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fk_orders_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `fk_order_details_order_id` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `fk_order_details_product_id` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `fk_payments_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`sub_category_id`) REFERENCES `sub_categories` (`id`),
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`);

--
-- Constraints for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD CONSTRAINT `sub_categories_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD CONSTRAINT `wishlists_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `wishlists_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
