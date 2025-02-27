-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 27, 2025 at 01:57 AM
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
(1, 'Sashimi', 'Không phải sushi, nhưng thường đi kèm – chỉ gồm cá sống thái lát mỏng', NULL, 1),
(2, 'Maki', 'Sushi cuộn với rong biển (nori) bên ngoài, nhân bên trong có thể là cá, rau, trứng hoặc các loại hải sản khác.', NULL, 1),
(5, 'Uramaki', 'Giống maki sushi nhưng cơm ở bên ngoài, rong biển ở giữa nhân. Thường được rắc thêm vừng hoặc trứng cá bên ngoài.', NULL, 1),
(6, 'Temaki', 'Sushi cuộn bằng tay thành hình nón, bên trong là cơm sushi và các loại nhân như cá sống, rau củ.', NULL, 1),
(7, 'Nigiri', 'Miếng cơm sushi được nắm chặt bằng tay, đặt lên trên là một lát cá sống hoặc hải sản, đôi khi có thêm wasabi ở giữa', '20250210100240.jpg', 0);

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
-- Table structure for table `ingredients`
--

CREATE TABLE `ingredients` (
  `id` int NOT NULL,
  `raw_material_id` int NOT NULL,
  `product_recipes_id` int NOT NULL,
  `quantity` decimal(10,2) NOT NULL,
  `unit` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ingredients`
--

INSERT INTO `ingredients` (`id`, `raw_material_id`, `product_recipes_id`, `quantity`, `unit`) VALUES
(11, 8, 8, 0.10, 'Kg'),
(12, 1, 8, 0.10, 'Kg'),
(20, 8, 15, 0.10, 'Kg'),
(21, 1, 15, 0.10, 'Kg'),
(22, 12, 16, 0.10, 'Kg'),
(23, 8, 16, 0.10, 'Kg'),
(24, 1, 16, 0.20, 'Kg'),
(25, 5, 16, 0.01, 'Lít'),
(26, 12, 17, 0.05, 'Kg'),
(27, 1, 17, 2.00, 'Kg'),
(28, 5, 17, 0.01, 'Lít'),
(29, 9, 18, 0.10, 'Kg'),
(30, 5, 18, 0.05, 'Lít'),
(31, 12, 18, 0.10, 'Kg');

-- --------------------------------------------------------

--
-- Table structure for table `inventories`
--

CREATE TABLE `inventories` (
  `id` int NOT NULL,
  `quantity` decimal(10,2) NOT NULL,
  `update_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `raw_material_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inventories`
--

INSERT INTO `inventories` (`id`, `quantity`, `update_at`, `status`, `raw_material_id`) VALUES
(1, 92.60, '2025-02-21 11:07:56', 1, 1),
(16, 9.10, '2025-02-22 11:40:55', 1, 8),
(17, 9.97, '2025-02-22 11:48:07', 1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `phone` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `province` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `district` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `ward` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `total` int NOT NULL,
  `payment` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `QR` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '2',
  `note` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `user_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `name`, `email`, `phone`, `date`, `province`, `district`, `ward`, `address`, `total`, `payment`, `QR`, `status`, `note`, `user_id`) VALUES
(1, 'Nguyen Văn  A', 'dangquocphuc2903@gmail.com', '0704725597', '2025-02-25 16:46:51', '04', '052', '01777', 'Số 70', 40000, 'LIVE', 'https://api.vietqr.io/image/970423-00003718641-pPEios2.jpg?accountName=DANG%20QUOC%20KHIEM&amount=35000', 2, NULL, 1),
(13, 'Nguyen Văn  A', 'khiemquoc059@gmail.com', '0704725597', '2025-02-15 17:07:06', '60', '601', '23236', 'Số 70', 35000, 'BANK', 'https://api.vietqr.io/image/970423-00003718641-pPEios2.jpg?accountName=DANG%20QUOC%20KHIEM&amount=35000', 0, NULL, 1),
(14, 'Nguyen Văn  A', 'dangquocphuc2903@gmail.com', '0704725597', '2025-02-16 17:27:47', '92', '917', '31153', 'Số 70', 484000, 'BANK', 'https://api.vietqr.io/image/970423-00003718641-pPEios2.jpg?accountName=DANG%20QUOC%20KHIEM&amount=484000', 4, NULL, 1),
(15, 'Nguyen Văn  A', 'khiemquoc059@gmail.com', '0656565654', '2025-02-16 17:31:53', '96', '967', '32077', 'Suố 90', 181000, 'BANK', 'https://api.vietqr.io/image/970423-00003718641-pPEios2.jpg?accountName=DANG%20QUOC%20KHIEM&amount=181000', 1, NULL, 1),
(16, 'Nguyen Văn  A', 'khiemquoc059@gmail.com', '0704725597', '2025-02-17 14:57:01', '48', '494', '20287', 'số 70', 149000, 'BANK', 'https://api.vietqr.io/image/970423-00003718641-pPEios2.jpg?accountName=DANG%20QUOC%20KHIEM&amount=149000', 0, NULL, 1),
(17, 'Nguyen Văn  A', 'dangquocphuc2903@gmail.com', '0704725597', '2025-02-19 13:23:32', '48', '497', '20320', 'sadsadas', 728000, 'BANK', 'https://api.vietqr.io/image/970423-00003718641-pPEios2.jpg?accountName=DANG%20QUOC%20KHIEM&amount=728000', 0, NULL, 1),
(18, 'Phan Văn Tính', 'khiemquoc059@gmail.com', '0704725597', '2025-02-25 16:47:18', '04', '052', '01774', 'Số 70', 156000, 'LIVE', NULL, 2, NULL, 1),
(19, 'Phan Văn Tính', 'admin01@gmail.com', '0704725597', '2025-02-20 09:51:37', '48', '494', '20290', 'Số 79', 129000, 'LIVE', NULL, 0, NULL, 1),
(85, 'Phan Văn Tính', 'khiemquoc059@gmail.com', '0704725597', '2025-02-23 14:54:39', '96', '967', '32077', 'sô 90', 172000, 'LIVE', '', 4, NULL, 1),
(86, 'Phan Văn Tính', 'dangquocphuc2903@gmail.com', '0704725597', '2025-02-23 15:13:09', '66', '649', '24313', 'so 80', 121000, 'BANK', 'https://api.vietqr.io/image/970423-00003718641-pPEios2.jpg?accountName=DANG%20QUOC%20KHIEM&amount=121000', 2, NULL, 1),
(87, 'Tiếng Việt', 'admin01@gmail.com', '0704725597', '2025-02-23 15:14:58', '70', '695', '25363', 'so 90', 170000, 'BANK', 'https://api.vietqr.io/image/970423-00003718641-pPEios2.jpg?accountName=DANG%20QUOC%20KHIEM&amount=170000', 1, NULL, 1),
(88, 'Tiếng Việt', 'admin01@gmail.com', '0704725597', '2025-02-23 15:15:24', '70', '695', '25363', 'so 90', 170000, 'BANK', 'https://api.vietqr.io/image/970423-00003718641-pPEios2.jpg?accountName=DANG%20QUOC%20KHIEM&amount=170000', 4, NULL, 1),
(89, 'Tiếng Việt', 'admin01@gmail.com', '0704725597', '2025-02-23 15:15:55', '70', '695', '25363', 'so 90', 170000, 'BANK', 'https://api.vietqr.io/image/970423-00003718641-pPEios2.jpg?accountName=DANG%20QUOC%20KHIEM&amount=170000', 2, NULL, 1),
(90, 'Tiếng Việt', 'admin01@gmail.com', '0704725597', '2025-02-23 15:16:11', '70', '695', '25363', 'so 90', 170000, 'BANK', 'https://api.vietqr.io/image/970423-00003718641-pPEios2.jpg?accountName=DANG%20QUOC%20KHIEM&amount=170000', 4, NULL, 1),
(91, 'Tiếng Việt', 'admin@gmail.com', '0704725597', '2025-02-24 06:45:31', '67', '663', '24676', '676', 240000, 'BANK', 'https://api.vietqr.io/image/970423-00003718641-pPEios2.jpg?accountName=DANG%20QUOC%20KHIEM&amount=240000', 0, NULL, 1),
(92, 'Tiếng Việt', 'khiemquoc059@gmail.com', '0656565654', '2025-02-24 14:00:17', '04', '045', '01432', 'sô 79', 196000, 'BANK', 'https://api.vietqr.io/image/970423-00003718641-pPEios2.jpg?accountName=DANG%20QUOC%20KHIEM&amount=196000', 4, NULL, 1),
(93, 'Rong biển', 'khiemquoc059@gmail.com', '0656565654', '2025-02-24 14:02:51', '87', '867', '29923', 'o=00342', 84999, 'BANK', 'https://api.vietqr.io/image/970423-00003718641-pPEios2.jpg?accountName=DANG%20QUOC%20KHIEM&amount=84999', 2, NULL, 1),
(94, 'Cá ngừ sashimi', 'admin01@gmail.com', '0704725597', '2025-02-24 14:03:51', '66', '650', '24364', 'so 80', 358999, 'BANK', 'https://api.vietqr.io/image/970423-00003718641-pPEios2.jpg?accountName=DANG%20QUOC%20KHIEM&amount=358999', 0, NULL, 1),
(95, 'Phan Văn Tính', 'khiemquoc059@gmail.com', '0704725597', '2025-02-25 16:21:55', '96', '972', '32227', 'so 89', 380000, 'BANK', 'https://api.vietqr.io/image/970423-00003718641-pPEios2.jpg?accountName=DANG%20QUOC%20KHIEM&amount=380000&addInfo= Thanh toán đơn hàngAYU SHIO YAKI', 2, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int NOT NULL,
  `quantity` int DEFAULT NULL,
  `price` int DEFAULT NULL,
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `product_id` int DEFAULT NULL,
  `order_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `quantity`, `price`, `date`, `product_id`, `order_id`) VALUES
(1, 1, 15000, '2025-02-16 04:51:45', 13, 13),
(9, 1, 12900, '2025-02-16 17:27:47', 12, 13),
(10, 1, 15600, '2025-02-16 17:31:53', 13, 1),
(11, 1, 2500, '2025-02-16 17:31:53', 7, 1),
(12, 1, 14900, '2025-02-17 14:57:01', 11, 16),
(13, 1, 59900, '2025-02-19 13:23:32', 9, 17),
(14, 1, 12900, '2025-02-19 13:23:32', 12, 17),
(15, 1, 15600, '2025-02-20 09:49:57', 13, 18),
(16, 1, 12900, '2025-02-20 09:51:37', 12, 19),
(113, 1, 3200, '2025-02-23 14:54:39', 5, 85),
(114, 1, 17500, '2025-02-23 14:54:39', 3, 85),
(115, 1, 15600, '2025-02-23 15:13:09', 13, 86),
(116, 1, 20500, '2025-02-23 15:14:58', 4, 87),
(117, 1, 20500, '2025-02-23 15:15:24', 4, 88),
(118, 1, 20500, '2025-02-23 15:15:55', 4, 89),
(119, 1, 20500, '2025-02-23 15:16:11', 4, 90),
(120, 1, 20500, '2025-02-24 06:45:31', 4, 91),
(121, 1, 3500, '2025-02-24 06:45:31', 8, 91),
(122, 1, 32500, '2025-02-24 14:00:17', 2, 92),
(123, 1, 59900, '2025-02-24 14:00:17', 9, 92),
(124, 1, 32500, '2025-02-24 14:02:51', 2, 93),
(125, 1, 59900, '2025-02-24 14:03:51', 9, 94),
(126, 1, 20500, '2025-02-25 13:36:45', 4, 95),
(127, 1, 17500, '2025-02-25 13:36:45', 3, 95);

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
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `price` int DEFAULT NULL,
  `discount_price` int DEFAULT '0',
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
(1, '\nAKAGAI SASHIMI', 'akagai-1-300x300.jpg', 'Sushi là một món ăn truyền thống của Nhật Bản, bao gồm cơm trộn giấm (shari) kết hợp với các nguyên liệu khác như hải sản tươi sống, rau củ, rong biển hoặc trứng. Sushi không chỉ nổi tiếng với hương vị tinh tế mà còn được coi là nghệ thuật ẩm thực thể hiện sự tỉ mỉ và khéo léo của người đầu bếp.', 355000, 0, '2025-01-17 06:50:10', 0, 0, 1, 1),
(2, 'AKAGAI SUSHI', 'Artboard-19-copy-81@4x-100-600x600.jpg', 'Sushi là một món ăn truyền thống của Nhật Bản, bao gồm cơm trộn giấm (shari) kết hợp với các nguyên liệu khác như hải sản tươi sống, rau củ, rong biển hoặc trứng. Sushi không chỉ nổi tiếng với hương vị tinh tế mà còn được coi là nghệ thuật ẩm thực thể hiện sự tỉ mỉ và khéo léo của người đầu bếp.', 325000, 0, '2025-01-17 06:50:48', 0, 0, 1, 2),
(3, 'AYU SHIO YAKI', 'Capture-28-300x300.png', 'Sushi là một món ăn truyền thống của Nhật Bản, bao gồm cơm trộn giấm (shari) kết hợp với các nguyên liệu khác như hải sản tươi sống, rau củ, rong biển hoặc trứng. Sushi không chỉ nổi tiếng với hương vị tinh tế mà còn được coi là nghệ thuật ẩm thực thể hiện sự tỉ mỉ và khéo léo của người đầu bếp.', 175000, 0, '2025-01-17 06:51:15', 0, 0, 1, 1),
(4, 'CALIFORNIA MAKI', 'Capture-6-300x300.png', 'Sushi là một món ăn truyền thống của Nhật Bản, bao gồm cơm trộn giấm (shari) kết hợp với các nguyên liệu khác như hải sản tươi sống, rau củ, rong biển hoặc trứng. Sushi không chỉ nổi tiếng với hương vị tinh tế mà còn được coi là nghệ thuật ẩm thực thể hiện sự tỉ mỉ và khéo léo của người đầu bếp.', 205000, 0, '2025-01-17 06:51:29', 0, 0, 1, 2),
(5, 'CHIRASHI DON SET', 'Capture-40-300x300.png', 'Sushi là một món ăn truyền thống của Nhật Bản, bao gồm cơm trộn giấm (shari) kết hợp với các nguyên liệu khác như hải sản tươi sống, rau củ, rong biển hoặc trứng. Sushi không chỉ nổi tiếng với hương vị tinh tế mà còn được coi là nghệ thuật ẩm thực thể hiện sự tỉ mỉ và khéo léo của người đầu bếp.', 32000, 0, '2025-01-17 07:03:55', 0, 1, 1, 5),
(6, 'CHUBUNE SASHIMI', 'Artboard-19-copy-50@4x-100-600x600.jpg', 'Sushi là một món ăn truyền thống của Nhật Bản, bao gồm cơm trộn giấm (shari) kết hợp với các nguyên liệu khác như hải sản tươi sống, rau củ, rong biển hoặc trứng. Sushi không chỉ nổi tiếng với hương vị tinh tế mà còn được coi là nghệ thuật ẩm thực thể hiện sự tỉ mỉ và khéo léo của người đầu bếp.', 35000, 0, '2025-01-17 07:03:55', 0, 0, 5, 7),
(7, 'CHUSUSHI MORIAWASE', 'kosushi-300x300.png', 'Sushi là một món ăn truyền thống của Nhật Bản, bao gồm cơm trộn giấm (shari) kết hợp với các nguyên liệu khác như hải sản tươi sống, rau củ, rong biển hoặc trứng. Sushi không chỉ nổi tiếng với hương vị tinh tế mà còn được coi là nghệ thuật ẩm thực thể hiện sự tỉ mỉ và khéo léo của người đầu bếp.', 25000, 0, '2025-01-17 07:03:55', 0, 0, 1, 1),
(8, 'COMBO SASHIMI & SUSHI', 'a-300x300.png', 'Sushi là một món ăn truyền thống của Nhật Bản, bao gồm cơm trộn giấm (shari) kết hợp với các nguyên liệu khác như hải sản tươi sống, rau củ, rong biển hoặc trứng. Sushi không chỉ nổi tiếng với hương vị tinh tế mà còn được coi là nghệ thuật ẩm thực thể hiện sự tỉ mỉ và khéo léo của người đầu bếp.', 35000, 0, '2025-01-17 07:03:55', 0, 3, 1, 2),
(9, 'Sashimi Garden mix', 'sp21.png', 'Sushi là món ăn truyền thống Nhật Bản với cơm giấm kết hợp cùng hải sản tươi sống, rau củ hoặc trứng, mang hương vị tinh tế và tươi mát.', 599000, 0, '2025-01-17 07:16:00', 0, 2, 1, 6),
(10, 'Sashimi tổng hợp A', 'sp22.png', 'Sushi là món ăn truyền thống Nhật Bản với cơm giấm kết hợp cùng hải sản tươi sống, rau củ hoặc trứng, mang hương vị tinh tế và tươi mát.', 459000, 0, '2025-01-17 07:16:00', 0, 0, 2, 5),
(11, 'Sashimi tổng hợp C', 'sp24.png', 'Sushi là món ăn truyền thống Nhật Bản với cơm giấm kết hợp cùng hải sản tươi sống, rau củ hoặc trứng, mang hương vị tinh tế và tươi mát.', 149000, 0, '2025-01-17 07:17:14', 0, 2, 1, 5),
(12, 'Sashimi sò đỏ', 'sp27.png', '<p>Sushi l&agrave; m&oacute;n ăn truyền thống Nhật Bản với cơm giấm kết hợp c&ugrave;ng hải sản tươi sống, rau củ hoặc trứng, mang hương vị tinh tế v&agrave; tươi m&aacute;t.</p>\r\n', 129000, 0, '2025-01-17 07:17:14', 0, 4, 0, 6),
(13, 'Sashimi sò điệp (5 miếng)', '20250209170218.jpg', '<p>Trong l&ograve;ng th&agrave;nh phố s&ocirc;i động, nếu bạn l&agrave; người y&ecirc;u th&iacute;ch ẩm thực Nhật Bản, nh&agrave; h&agrave;ng LetSushi ch&iacute;nh l&agrave; điểm đến kh&ocirc;ng thể bỏ qua. Với cam kết mang đến cho thực kh&aacute;ch những trải nghiệm ẩm thực đ&iacute;ch thực v&agrave; tinh tế nhất, LetSushi đ&atilde; trở th&agrave;nh một biểu tượng của sự h&ograve;a quyện giữa hương vị truyền thống v&agrave; nghệ thuật ẩm thực đương đại.</p>\r\n', 156000, 0, '2025-02-09 10:18:23', 0, 13, 2, 5);

-- --------------------------------------------------------

--
-- Table structure for table `product_recipes`
--

CREATE TABLE `product_recipes` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `product_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_recipes`
--

INSERT INTO `product_recipes` (`id`, `name`, `product_id`) VALUES
(8, 'Công thức 1', 4),
(15, 'Cá ngừ sashimi', 12),
(16, 'Cá ngừ sashimi', 9),
(17, 'Công thức số 2', 8),
(18, 'Cá ngừ sashimi', 11);

-- --------------------------------------------------------

--
-- Table structure for table `purchase_orders`
--

CREATE TABLE `purchase_orders` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `purchase_orders`
--

INSERT INTO `purchase_orders` (`id`, `name`, `date`, `status`) VALUES
(19, 'Nước nắm', '2025-02-05 00:00:00', 1),
(28, 'Cá ngừ sashimi', '2025-02-14 00:00:00', 1),
(60, 'Rong biển', '2025-02-19 11:40:00', 1),
(61, 'Sì dầu', '2025-02-23 00:47:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `purchase_order_items`
--

CREATE TABLE `purchase_order_items` (
  `id` int NOT NULL,
  `quantity` decimal(10,2) NOT NULL,
  `unit_price` int NOT NULL,
  `purchase_order_id` int NOT NULL,
  `raw_material_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `purchase_order_items`
--

INSERT INTO `purchase_order_items` (`id`, `quantity`, `unit_price`, `purchase_order_id`, `raw_material_id`) VALUES
(4, 100.00, 1000000, 28, 1),
(23, 5.00, 50000, 61, 5);

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
-- Table structure for table `raw_materials`
--

CREATE TABLE `raw_materials` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `unit` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `status` tinyint NOT NULL DEFAULT '1',
  `create_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `raw_materials`
--

INSERT INTO `raw_materials` (`id`, `name`, `unit`, `status`, `create_at`) VALUES
(1, 'Cá ngừ sashimi', 'Kg', 1, '2025-02-19 12:40:36'),
(5, 'Sì dầu', 'Lít', 1, '2025-02-19 23:01:31'),
(7, 'Rong biển', 'Kg', 1, '2025-02-20 00:46:42'),
(8, 'Củ cải', 'Kg', 1, '2025-02-20 20:33:37'),
(9, 'Cà rót', 'Kg', 1, '2025-02-20 23:31:59'),
(12, 'Rong biển Nhật', 'Kg', 1, '2025-02-22 11:40:54');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `phone` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `avatar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT 'avatarmacdinh.jpg',
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `wallet` int DEFAULT '0',
  `google_id` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `access_token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `role` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `name`, `email`, `phone`, `avatar`, `address`, `wallet`, `google_id`, `access_token`, `status`, `role`) VALUES
(1, 'admin', '$2y$10$6IHS6J/XpKYPretYrXUxweXvrHnfonCeB79n.k.xgcev67tJnoppm', 'Quản trị viên', 'admin@gmail.com', '0704725597', 'avatarmacdinh.jpg', 'Nguyễn Văn Cừ', 358999, NULL, '22d8bc0f13f23e01100109be05e9256b', 1, 1),
(2, 'quockhiem', '$2y$10$NtXmPE02TD4UfLmRX8SBc.KdGlJK03Uhba4u0toblMk5z1VOZVFqK', 'Nguyen Văn  A', 'dangquocphuc2903@gmail.com', '0704725597', 'avatarmacdinh.jpg', 'Nguyeenc van cu', 0, NULL, 'aaf0631beaaabd22731221f9d04db83a', 1, 0),
(3, 'Khiem Dang', '$2y$10$KucRNIrb/J5kKnZQW7khAOcdiJpsbKI.X6m9T525vNBLtKV31pqRe', 'Khiem', 'dangkhiemct111@gmail.com', '', 'https://lh3.googleusercontent.com/a/ACg8ocKrUBMC4tESDYjLhaMq8SOepiPeCRpLlT6W-Lih7Gvrop9MRZ37=s96-c', '', 0, '114024263294679881690', '4f2ce3414aa207ecdae14da8cdddfcce', 2, 0),
(5, 'Lionel', '$2y$10$.Xmvps9Jd7pXjI0kFm/75.LgzKA14lEohO62TtXefQLWyGHXT4KJ6', 'Nguyen Văn  A', 'admin01@gmail.com', '0656565654', 'avatarmacdinh.jpg', 'Nguyeenc van cu', 0, NULL, '', 0, 0),
(6, 'admin2', '$2y$10$pQREXK7N4jyO3x.QWdahBOv.8devMiK7BU4CJ0tiv6ntdxmUd8F/q', 'Nguyen Văn  A', 'admin02@gmail.com', '0704725597', 'avatarmacdinh.jpg', 'Nguyễn Văn Cừu', 0, NULL, '', 1, 1);

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
-- Indexes for table `ingredients`
--
ALTER TABLE `ingredients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fK_ingredient` (`raw_material_id`),
  ADD KEY `fk_product_recipes` (`product_recipes_id`);

--
-- Indexes for table `inventories`
--
ALTER TABLE `inventories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_inventory` (`raw_material_id`);

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
-- Indexes for table `product_recipes`
--
ALTER TABLE `product_recipes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_recipes_product` (`product_id`);

--
-- Indexes for table `purchase_orders`
--
ALTER TABLE `purchase_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_order_items`
--
ALTER TABLE `purchase_order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_raw_material` (`raw_material_id`),
  ADD KEY `fk_purchase_order_id` (`purchase_order_id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_rating_product` (`product_id`),
  ADD KEY `fk_user_user` (`user_id`);

--
-- Indexes for table `raw_materials`
--
ALTER TABLE `raw_materials`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ingredients`
--
ALTER TABLE `ingredients`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `inventories`
--
ALTER TABLE `inventories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- AUTO_INCREMENT for table `post_categories`
--
ALTER TABLE `post_categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `product_recipes`
--
ALTER TABLE `product_recipes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `purchase_orders`
--
ALTER TABLE `purchase_orders`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `purchase_order_items`
--
ALTER TABLE `purchase_order_items`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `raw_materials`
--
ALTER TABLE `raw_materials`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
-- Constraints for table `ingredients`
--
ALTER TABLE `ingredients`
  ADD CONSTRAINT `fK_ingredient` FOREIGN KEY (`raw_material_id`) REFERENCES `raw_materials` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_product_recipes` FOREIGN KEY (`product_recipes_id`) REFERENCES `product_recipes` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `inventories`
--
ALTER TABLE `inventories`
  ADD CONSTRAINT `fk_inventory` FOREIGN KEY (`raw_material_id`) REFERENCES `raw_materials` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

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
-- Constraints for table `product_recipes`
--
ALTER TABLE `product_recipes`
  ADD CONSTRAINT `fk_recipes_product` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `purchase_order_items`
--
ALTER TABLE `purchase_order_items`
  ADD CONSTRAINT `fk_purchase_order_id` FOREIGN KEY (`purchase_order_id`) REFERENCES `purchase_orders` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_raw_material` FOREIGN KEY (`raw_material_id`) REFERENCES `raw_materials` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

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
