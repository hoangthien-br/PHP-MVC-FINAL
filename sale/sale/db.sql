-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for my_store
CREATE DATABASE IF NOT EXISTS `my_store` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `my_store`;

-- Dumping structure for table my_store.account
CREATE TABLE IF NOT EXISTS `account` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','user') DEFAULT 'user',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table my_store.account: ~1 rows (approximately)
INSERT INTO `account` (`id`, `username`, `fullname`, `password`, `role`) VALUES
	(1, 'USER1', 'nguyen van 1', '$2y$10$.bQe/URdthwGojIuF4RK0.79URrY/KJvutdo8B1u9kMGEfIqUcXxu', 'admin'),
	(2, 'USER2', 'nguyen van 2', '$2y$10$46Ruhs5JK3hM5Jxe9PApl.jDYUAxSjiVKTfLvONVZFjRabXlZgU7O', 'user'),
	(3, 'USER3', 'nguyen van 3', '$2y$10$F/14scOhJfDSH6Cut1hsgeetYQ5xLT5CkkOFaGKJVjQaJJYEdzc3u', 'user'),
	(4, 'USER4', 'nguyen van 4', '$2y$10$0.XPQgjsEkP1.XN0BQ6QReNuv2YGDc2Miz5H0Na1xB17VtyhEjh9i', 'user');

-- Dumping structure for table my_store.category
CREATE TABLE IF NOT EXISTS `category` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `description` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table my_store.category: ~3 rows (approximately)
INSERT INTO `category` (`id`, `name`, `description`) VALUES
	(1, 'Laptop', 'Thiết bị điện tử '),
	(2, 'Điện thoại ', 'Thiết bị di dộng'),
	(3, 'Phụ kiện ', 'Phụ kiện di dộng'),
	(4, 'Tablet', 'Máy tính bảng'),
	(5, 'Tai nghe', 'Thiết bị âm thanh');

-- Dumping structure for table my_store.orders
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` text NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table my_store.orders: ~4 rows (approximately)
INSERT INTO `orders` (`id`, `name`, `phone`, `address`, `created_at`) VALUES
	(1, 'NGUYEN VAN A', '0132465798', 'THU DUC', '2025-03-21 06:24:58'),
	(2, 'NGUYEN VAN 2', '0132465798', 'binh thanh', '2025-03-21 07:10:12'),
	(3, 'NGUYEN VAN 2', '0132465798', 'binh thanh', '2025-03-21 08:16:00'),
	(4, 'NGUYEN VAN 2', '0132465798', 'binh thanh', '2025-03-21 08:16:59'),
	(5, 'NGUYEN VAN A', '0145678978', 'quận 11', '2025-03-21 08:27:03'),
	(6, 'NGUYEN VAN 3', '0987456123', 'gò vấp', '2025-03-21 08:31:41'),
	(7, 'NGUYEN VAN B', '0132465798', 'tân phú', '2025-03-21 08:46:29');

-- Dumping structure for table my_store.order_details
CREATE TABLE IF NOT EXISTS `order_details` (
  `id` int NOT NULL AUTO_INCREMENT,
  `order_id` int NOT NULL,
  `product_id` int NOT NULL,
  `quantity` int NOT NULL,
  `price` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `order_id` (`order_id`),
  CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table my_store.order_details: ~4 rows (approximately)
INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `quantity`, `price`) VALUES
	(1, 1, 1, 5, 16900000.00),
	(2, 2, 1, 1, 16900000.00),
	(3, 3, 1, 7, 16900000.00),
	(4, 4, 2, 1, 29500000.00),
	(5, 5, 1, 4, 16900000.00),
	(6, 6, 3, 1, 25990000.00),
	(7, 6, 4, 1, 49990000.00),
	(8, 7, 16, 1, 6490000.00);

-- Dumping structure for table my_store.product
CREATE TABLE IF NOT EXISTS `product` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `description` text,
  `price` decimal(10,2) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `category_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `category_id` (`category_id`),
  CONSTRAINT `product_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table my_store.product: ~1 rows (approximately)
INSERT INTO `product` (`id`, `name`, `description`, `price`, `image`, `category_id`) VALUES
	(1, 'LENOVO LOQ 15.6 INCH - 2024', 'CORE I5 12450HX 12GB 512GB RTX 2050 4GB FHD 144hz', 16900000.00, 'uploads/legion_5_slim_2024_mac24h.jpg', 1),
	(2, 'iPhone 16 Pro Max', '256GB Storage', 29500000.00, 'uploads/iphone_16_pro_max_8t8p-0l.jpg', 2),
	(3, 'Laptop Dell XPS 13', 'Laptop cao cấp, i7-12700H, 16GB RAM, 512GB SSD', 25990000.00, 'uploads/dell_xps13.jpg', 1),
	(4, 'Laptop MacBook Pro 14', 'M2 Pro, 16GB RAM, 1TB SSD', 49990000.00, 'uploads/macbook_pro14.jpg', 1),
	(5, 'Laptop Asus ROG Zephyrus', 'Gaming laptop, RTX 3060, 16GB RAM', 32990000.00, 'uploads/asus_rog.jpg', 1),
	(7, 'iPhone 14 Pro Max', '256GB, A16 Bionic', 33990000.00, 'uploads/iphone_14pro.jpg', 2),
	(8, 'Samsung Galaxy S23 Ultra', '512GB, Snapdragon 8 Gen 2', 31990000.00, 'uploads/samsung_s23.jpg', 2),
	(9, 'Xiaomi 13 Pro', '256GB, Snapdragon 8 Gen 2', 22990000.00, 'uploads/Xiaomi 13 Pro.jpg', 2),
	(11, 'Sạc nhanh 65W', 'Bộ sạc nhanh USB-C', 590000.00, 'uploads/Sạc nhanh 65W.jpg', 3),
	(12, 'Cáp USB-C', 'Cáp sạc dài 2m, 100W', 250000.00, 'uploads/Cáp USB-C.jpg', 3),
	(13, 'Ốp lưng iPhone 14', 'Ốp silicone chính hãng', 390000.00, 'uploads/Ốp lưng iPhone 14.jpg', 3),
	(14, 'iPad Pro 12.9', 'M2, 256GB', 29990000.00, 'uploads/iPad Pro 12.9.jpg', 4),
	(15, 'Samsung Galaxy Tab S8', 'Snapdragon 8 Gen 1, 128GB', 18990000.00, 'uploads/Samsung Galaxy Tab S8.jpg', 4),
	(16, 'AirPods Pro 2', 'Tai nghe không dây Apple', 6490000.00, 'uploads/AirPods Pro 2.jpg', 5),
	(17, 'Sony WH-1000XM5', 'Tai nghe over-ear chống ồn', 8490000.00, 'uploads/Sony WH-1000XM5.jpg', 5),
	(18, 'JBL Tune 130NC', 'Tai nghe true wireless', 1990000.00, 'uploads/JBL Tune 130NC.jpg', 5);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
