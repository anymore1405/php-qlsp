/*
 Navicat Premium Data Transfer

 Source Server         : mariadb test revo
 Source Server Type    : MariaDB
 Source Server Version : 100508
 Source Host           : 118.70.169.19:3308
 Source Schema         : qlsp

 Target Server Type    : MariaDB
 Target Server Version : 100508
 File Encoding         : 65001

 Date: 01/08/2021 21:48:57
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for category_products
-- ----------------------------
DROP TABLE IF EXISTS `category_products`;
CREATE TABLE `category_products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of category_products
-- ----------------------------
BEGIN;
INSERT INTO `category_products` VALUES (1, 'Thực phẩm');
INSERT INTO `category_products` VALUES (2, 'Phụ kiện');
INSERT INTO `category_products` VALUES (3, 'Xe cộ');
INSERT INTO `category_products` VALUES (4, 'Thiết bị điện tử');
INSERT INTO `category_products` VALUES (5, 'Smartphone');
INSERT INTO `category_products` VALUES (6, 'Phần mềm');
INSERT INTO `category_products` VALUES (7, 'Đồ gia dụng');
INSERT INTO `category_products` VALUES (8, 'Điện lạnh');
INSERT INTO `category_products` VALUES (9, 'Thiết bị giám sát');
INSERT INTO `category_products` VALUES (10, 'Thiết bị âm thanh');
COMMIT;

-- ----------------------------
-- Table structure for customers
-- ----------------------------
DROP TABLE IF EXISTS `customers`;
CREATE TABLE `customers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL DEFAULT '123456',
  `name` varchar(255) NOT NULL,
  `phone_number` varchar(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of customers
-- ----------------------------
BEGIN;
INSERT INTO `customers` VALUES (1, 'co', '123456', 'Cò', '099991299');
INSERT INTO `customers` VALUES (2, 'trung', '123456', 'Trung', '092812812');
INSERT INTO `customers` VALUES (3, 'tung', '123456', 'Tùng', '033842552');
INSERT INTO `customers` VALUES (4, 'hoa', '123456', 'Hoa', '034832453');
INSERT INTO `customers` VALUES (5, 'thai', '123456', 'Thái', '091273274');
INSERT INTO `customers` VALUES (6, 'hieu', '123456', 'Hiếu', '092147342');
INSERT INTO `customers` VALUES (7, 'mai', '123456', 'Mai', '092347567');
INSERT INTO `customers` VALUES (8, 'thao', '123456', 'Thảo', '092472375');
INSERT INTO `customers` VALUES (9, 'hung', '123456', 'Hùng', '092147237');
INSERT INTO `customers` VALUES (10, 'khanh', '123456', 'Khánh', '091247237');
COMMIT;

-- ----------------------------
-- Table structure for deal_details
-- ----------------------------
DROP TABLE IF EXISTS `deal_details`;
CREATE TABLE `deal_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `deal_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `product` (`product_id`),
  KEY `deal` (`deal_id`),
  CONSTRAINT `deal` FOREIGN KEY (`deal_id`) REFERENCES `deals` (`id`),
  CONSTRAINT `product` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of deal_details
-- ----------------------------
BEGIN;
INSERT INTO `deal_details` VALUES (1, 2, 1, 1);
INSERT INTO `deal_details` VALUES (2, 3, 2, 1);
INSERT INTO `deal_details` VALUES (3, 5, 3, 2);
INSERT INTO `deal_details` VALUES (4, 4, 4, 1);
INSERT INTO `deal_details` VALUES (5, 1, 5, 1);
INSERT INTO `deal_details` VALUES (6, 6, 6, 1);
INSERT INTO `deal_details` VALUES (7, 7, 7, 1);
INSERT INTO `deal_details` VALUES (8, 8, 8, 2);
INSERT INTO `deal_details` VALUES (9, 9, 9, 1);
INSERT INTO `deal_details` VALUES (10, 10, 10, 2);
COMMIT;

-- ----------------------------
-- Table structure for deals
-- ----------------------------
DROP TABLE IF EXISTS `deals`;
CREATE TABLE `deals` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `customer_id` int(11) NOT NULL,
  `staff_id` int(11) DEFAULT NULL,
  `cart` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0: giỏ hàng, 1: hoá đơn',
  PRIMARY KEY (`id`),
  KEY `customer` (`customer_id`),
  KEY `staff` (`staff_id`),
  CONSTRAINT `customer` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`),
  CONSTRAINT `staff` FOREIGN KEY (`staff_id`) REFERENCES `staffs` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of deals
-- ----------------------------
BEGIN;
INSERT INTO `deals` VALUES (1, '2021-08-01 13:40:18', 1, 4, 0);
INSERT INTO `deals` VALUES (2, '2021-08-01 13:40:36', 2, 5, 0);
INSERT INTO `deals` VALUES (3, '2021-08-01 13:42:57', 3, 4, 0);
INSERT INTO `deals` VALUES (4, '2021-08-01 13:43:04', 4, 5, 0);
INSERT INTO `deals` VALUES (5, '2021-08-01 13:43:11', 5, 5, 0);
INSERT INTO `deals` VALUES (6, '2021-08-01 13:43:15', 6, 4, 0);
INSERT INTO `deals` VALUES (7, '2021-08-01 13:43:23', 7, 3, 0);
INSERT INTO `deals` VALUES (8, '2021-08-01 13:43:28', 8, 2, 0);
INSERT INTO `deals` VALUES (9, '2021-08-01 13:43:33', 9, 5, 0);
INSERT INTO `deals` VALUES (10, '2021-08-01 13:43:40', 10, 4, 0);
COMMIT;

-- ----------------------------
-- Table structure for products
-- ----------------------------
DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `category_product_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL DEFAULT 10,
  PRIMARY KEY (`id`),
  KEY `category` (`category_product_id`),
  CONSTRAINT `category` FOREIGN KEY (`category_product_id`) REFERENCES `category_products` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of products
-- ----------------------------
BEGIN;
INSERT INTO `products` VALUES (1, 'Ổ điện Xiaomi', 200000.00, 7, 10);
INSERT INTO `products` VALUES (2, 'Quạt thống nhất', 100000.00, 7, 10);
INSERT INTO `products` VALUES (3, 'Camera Xiaomi 360', 500000.00, 9, 10);
INSERT INTO `products` VALUES (4, 'Trà đào cam xả', 45000.00, 1, 10);
INSERT INTO `products` VALUES (5, 'Đèn trợ sáng', 300000.00, 3, 10);
INSERT INTO `products` VALUES (6, 'Phần mềm diệt virut BKAV', 200000.00, 6, 10);
INSERT INTO `products` VALUES (7, 'iPhone 12 Pro Max 512GB', 21000000.00, 5, 10);
INSERT INTO `products` VALUES (8, 'Tủ lạnh Tosiba', 5000000.00, 8, 10);
INSERT INTO `products` VALUES (9, 'Loa MicroLab M300BT', 999000.00, 10, 10);
INSERT INTO `products` VALUES (10, 'Móc khoá', 10000.00, 2, 10);
COMMIT;

-- ----------------------------
-- Table structure for staffs
-- ----------------------------
DROP TABLE IF EXISTS `staffs`;
CREATE TABLE `staffs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `role` enum('admin','staff') DEFAULT 'staff',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of staffs
-- ----------------------------
BEGIN;
INSERT INTO `staffs` VALUES (1, 'Tài', 'admin');
INSERT INTO `staffs` VALUES (2, 'Cò', 'admin');
INSERT INTO `staffs` VALUES (3, 'Giang', 'staff');
INSERT INTO `staffs` VALUES (4, 'Kiên', 'staff');
INSERT INTO `staffs` VALUES (5, 'Hiền', 'staff');
INSERT INTO `staffs` VALUES (6, 'Linh', 'staff');
INSERT INTO `staffs` VALUES (7, 'Đạt', 'staff');
INSERT INTO `staffs` VALUES (8, 'Anh', 'staff');
INSERT INTO `staffs` VALUES (9, 'Yến', 'staff');
INSERT INTO `staffs` VALUES (10, 'Vinh', 'staff');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
