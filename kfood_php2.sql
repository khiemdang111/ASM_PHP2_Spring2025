-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 25, 2025 at 04:29 AM
-- Server version: 8.0.31
-- PHP Version: 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kfood_php2`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `image`, `status`) VALUES
(1, 'Pizza', 'Pizza là một loại bánh dẹt, tròn được chế biến từ bột mì, nấm men,... sau khi đã được ủ bột để nghỉ ít nhất 24 tiếng đồng hồ và nhào nặn thành loại bánh có hình dạng tròn và dẹt, và được cho vào lò nướng chín trước khi ăn.', NULL, 1),
(2, 'Burger', 'Burger là một loại thức ăn bao gồm bánh mì kẹp thịt xay (thường là thịt bò) ở giữa. Miếng thịt có thể được nướng, chiên, hun khói hay nướng trên lửa', NULL, 1),
(5, 'Sushi', 'Sushi là một món ăn Nhật Bản gồm cơm trộn giấm (shari) kết hợp với các nguyên liệu khác (neta). Neta và hình thức trình bày sushi rất đa dạng, nhưng nguyên liệu chính mà tất cả các loại sushi đều có là shari. Neta phổ biến nhất là hải sản.', NULL, 1),
(6, 'Sandwich', 'Bánh mì kẹp hoặc bánh mì lát (tiếng Anh: sandwich) là một món ăn thường bao gồm rau, pho mát hoặc thịt cắt lát được đặt bên trên hoặc giữa các lát bánh mì ', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int NOT NULL,
  `content` text COLLATE utf8mb4_general_ci NOT NULL,
  `date` timestamp NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `product_id` int NOT NULL,
  `user_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `phone` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `date` timestamp NOT NULL,
  `province` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `district` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `ward` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `note` text COLLATE utf8mb4_general_ci NOT NULL,
  `user_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int NOT NULL,
  `quantity` int NOT NULL,
  `price` int NOT NULL,
  `date` int NOT NULL,
  `product_id` int NOT NULL,
  `order_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `content` text COLLATE utf8mb4_general_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `summary` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `create_at` timestamp NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `user_id` int NOT NULL,
  `category_post_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `post_categories`
--

CREATE TABLE `post_categories` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `price` int DEFAULT NULL,
  `discount_price` int DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_featured` tinyint(1) NOT NULL DEFAULT '0',
  `view` int NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `category_id` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `image`, `description`, `price`, `discount_price`, `date`, `is_featured`, `view`, `status`, `category_id`) VALUES
(1, 'Pizza Siêu Topping Hải Sản 4 Mùa - Super Topping Seafood Four Seasons', 'viber_image_2024-12-20_09-38-36-347.jpg', 'Tăng 50% lượng topping protein: Tôm, Mực; Thêm Phô Mai Mozzarella, Phô Mai Cheddar, Thơm, Hành Tây, Xốt Mayonnaise, Xốt Tiêu Đen', 355000, NULL, '2025-01-17 06:50:10', 0, 0, 1, 1),
(2, 'Pizza Siêu Topping Hải Sản Xốt Pesto \"Chanh Sả\" - Super Topping Seafood Lime Pesto', 'viber_image_2024-12-20_11-11-35-787.jpg', 'Tăng 50% lượng topping protein: Tôm, Mực; Thêm Phô Mai Mozzarella, Phô Mai Cheddar, Thơm, Hành Tây, Xốt Mayonnaise, Xốt Tiêu Đen', 325000, NULL, '2025-01-17 06:50:48', 0, 0, 1, 1),
(3, 'Pizza Siêu Topping Bơ Gơ Bò Mỹ Xốt Phô Mai Ngập Vị - Super Topping American Cheeseburger', 'CHEESY+MADNESS+NO+NEW+PC.jpg', 'Tăng 50% lượng topping protein: Tôm, Mực; Thêm Phô Mai Mozzarella, Phô Mai Cheddar, Thơm, Hành Tây, Xốt Mayonnaise, Xốt Tiêu Đen', 175000, NULL, '2025-01-17 06:51:15', 0, 0, 1, 1),
(4, 'Pizza Siêu Topping Bơ Gơ Bò Mỹ Xốt Habanero - Super Topping Habanero Cheeseburger', 'Pizza+Extra+Topping+(4).jpg', 'Tăng 50% lượng topping protein: Tôm, Mực; Thêm Phô Mai Mozzarella, Phô Mai Cheddar, Thơm, Hành Tây, Xốt Mayonnaise, Xốt Tiêu Đen', 205000, NULL, '2025-01-17 06:51:29', 0, 0, 0, 1),
(5, ' 						Combo Bánh Mì Burger Gà Miếng + Nước 					', 'buger_ga_c21bf60dd2a04a2f84e16cecfbaa6d79_master.webp', 'Bánh mì Burger 1 Phút 30 Giây là loại bánh mì kẹp gồm 2 phần bánh với phần nhân là sa lát kẹp cùng gà miếng chiên giòn ăn cùng trứng chiên và sốt gia vị.', 32000, NULL, '2025-01-17 07:03:55', 0, 0, 1, 1),
(6, ' 						Combo Bánh Mì Burger Tôm Miếng + Nước 					', 'buger_tom_a1820b064d744ef68249b04275c94fbc_grande.webp', 'Bánh mì Burger 1 Phút 30 Giây là loại bánh mì kẹp gồm 2 phần bánh với phần nhân là sa lát kẹp cùng gà miếng chiên giòn ăn cùng trứng chiên và sốt gia vị.', 35000, NULL, '2025-01-17 07:03:55', 0, 0, 0, 1),
(7, ' 						Combo Bánh Mì HamBurger + Nước 					', 'combo_hamburger_pho_mai_thuong_hang_3bd88d57b32247f4bf6702fcc3eebf48_grande.webp', 'Bánh mì Burger 1 Phút 30 Giây là loại bánh mì kẹp gồm 2 phần bánh với phần nhân là sa lát kẹp cùng gà miếng chiên giòn ăn cùng trứng chiên và sốt gia vị.', 25000, NULL, '2025-01-17 07:03:55', 0, 0, 1, 1),
(8, ' 						Combo Bánh Mi Hamburger Phô Mai Thượng Hạng + Nước 					', 'hamburger_93b61340a6994c5196eda00c0c1dcaef_grande.webp', 'Bánh mì Burger 1 Phút 30 Giây là loại bánh mì kẹp gồm 2 phần bánh với phần nhân là sa lát kẹp cùng gà miếng chiên giòn ăn cùng trứng chiên và sốt gia vị.', 35000, NULL, '2025-01-17 07:03:55', 0, 0, 1, 1),
(9, 'Sashimi Garden mix', 'sp21.png', 'Sushi là món ăn truyền thống Nhật Bản với cơm giấm kết hợp cùng hải sản tươi sống, rau củ hoặc trứng, mang hương vị tinh tế và tươi mát.', 599000, NULL, '2025-01-17 07:16:00', 0, 0, 1, 1),
(10, 'Sashimi tổng hợp A', 'sp22.png', 'Sushi là món ăn truyền thống Nhật Bản với cơm giấm kết hợp cùng hải sản tươi sống, rau củ hoặc trứng, mang hương vị tinh tế và tươi mát.', 459000, NULL, '2025-01-17 07:16:00', 0, 0, 0, 1),
(11, 'Sashimi tổng hợp C', 'sp24.png', 'Sushi là món ăn truyền thống Nhật Bản với cơm giấm kết hợp cùng hải sản tươi sống, rau củ hoặc trứng, mang hương vị tinh tế và tươi mát.', 149000, NULL, '2025-01-17 07:17:14', 0, 0, 1, 1),
(12, 'Sashimi sò đỏ', 'sp27.png', 'Sushi là món ăn truyền thống Nhật Bản với cơm giấm kết hợp cùng hải sản tươi sống, rau củ hoặc trứng, mang hương vị tinh tế và tươi mát.', 12900, NULL, '2025-01-17 07:17:14', 0, 0, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `id` int NOT NULL,
  `content` text COLLATE utf8mb4_general_ci NOT NULL,
  `rating` int NOT NULL,
  `create_at` timestamp NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `user_id` int NOT NULL,
  `product_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `phone` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `google_id` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `role` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `name`, `email`, `phone`, `avatar`, `address`, `google_id`, `status`, `role`) VALUES
(1, 'admin', '$2y$10$oIs2TPg0doQKSBwRQWRpceP4u72Tn1mYBM8WpS3KaLlhyGf/fcop.', 'Quản trị viên', 'admin@gmail.com', '0704725597', NULL, 'Nguyễn Văn Cừ', NULL, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `vouchers`
--

CREATE TABLE `vouchers` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `discount` int NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_comment_product` (`product_id`),
  ADD KEY `fk_comment_user` (`user_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_order_user` (`user_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_order_detail` (`order_id`),
  ADD KEY `fk_order_product` (`product_id`);

--
-- Indexes for table `post_categories`
--
ALTER TABLE `post_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_category` (`category_id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_rating_product` (`product_id`),
  ADD KEY `fk_user_user` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vouchers`
--
ALTER TABLE `vouchers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `post_categories`
--
ALTER TABLE `post_categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `vouchers`
--
ALTER TABLE `vouchers`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `fk_comment_product` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_comment_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fk_order_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `fk_order_detail` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_order_product` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `fk_category` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `ratings`
--
ALTER TABLE `ratings`
  ADD CONSTRAINT `fk_rating_product` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_user_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
