-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th7 31, 2019 lúc 02:23 PM
-- Phiên bản máy phục vụ: 5.7.27-0ubuntu0.18.04.1
-- Phiên bản PHP: 7.1.28-1+ubuntu18.04.1+deb.sury.org+3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `laravelshop`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bills`
--

CREATE TABLE `bills` (
  `id` int(10) UNSIGNED NOT NULL,
  `code_order` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_id` int(10) UNSIGNED DEFAULT NULL,
  `date_order` datetime DEFAULT NULL,
  `payment` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT '0',
  `note` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `bills`
--

INSERT INTO `bills` (`id`, `code_order`, `name`, `email`, `address`, `phone`, `customer_id`, `date_order`, `payment`, `status`, `note`, `created_at`, `updated_at`) VALUES
(42, 'order1944737825', 'ninhhoang', 'ninhhoang@gmail.com', 'dsdsdsd', '12345', 50, '2019-07-28 20:14:03', '40050000', 0, NULL, '2019-07-28 13:14:03', '2019-07-28 13:14:03'),
(47, 'order505734808', 'Nguyenvana', 'nguyenvana@gmail.com', 'Ha Noi', '123456', 55, '2019-07-28 22:12:30', '20050000', 0, NULL, '2019-07-28 15:12:30', '2019-07-28 15:12:30'),
(48, 'order104701259', 'nguyenvanb', 'nguyenvanb@gmail.com', 'Nam', '1234567', 56, '2019-07-28 22:13:11', '20050000', 1, NULL, '2019-07-28 15:13:11', '2019-07-28 15:19:40'),
(49, 'order858777396', 'nguyenthic', 'nguyenthic@gmail.com', 'Nam Dinh', '12232323', 57, '2019-07-28 22:14:08', '20050000', 1, NULL, '2019-07-28 15:14:08', '2019-07-28 15:19:48'),
(51, 'order1046791451', 'phancongb', 'phancongb@gmail.com', 'Lao cai', '54545', 59, '2019-07-28 22:15:42', '20050000', 0, NULL, '2019-07-28 15:15:42', '2019-07-28 15:15:42'),
(52, 'order1966708524', 'lethia', 'lethihai@gmail.com', 'Yên Bái', '765767', 60, '2019-07-28 22:16:36', '20050000', 1, NULL, '2019-07-28 15:16:37', '2019-07-28 15:19:35'),
(54, 'order71057791', 'lovanmanh', 'lovanmanh@gmail.com', 'Hà Tây', '6565656', 62, '2019-07-28 22:26:01', '20050000', 1, NULL, '2019-07-28 15:26:01', '2019-07-28 15:32:28'),
(55, 'order934566020', 'lothimuot', 'lothimuot@gmail.com', 'Phú Yên', '6565656', 63, '2019-07-28 22:26:54', '20050000', 0, NULL, '2019-07-28 15:26:54', '2019-07-28 15:26:54'),
(56, 'order1509332719', 'nangamxadanh', 'nangamxadan@gmail.com', 'Bình Định', '5434343', 64, '2019-07-29 14:28:22', '12040000', 1, NULL, '2019-07-29 07:28:23', '2019-07-29 07:34:18');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill_detail`
--

CREATE TABLE `bill_detail` (
  `id` int(10) UNSIGNED NOT NULL,
  `bill_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `unit_price` double(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `bill_detail`
--

INSERT INTO `bill_detail` (`id`, `bill_id`, `product_id`, `quantity`, `unit_price`, `created_at`, `updated_at`) VALUES
(13, 42, 21, 2, 20000000.00, '2019-07-28 13:14:04', '2019-07-28 13:14:04'),
(19, 47, 24, 1, 20000000.00, '2019-07-28 15:12:30', '2019-07-28 15:12:30'),
(20, 48, 24, 1, 20000000.00, '2019-07-28 15:13:11', '2019-07-28 15:13:11'),
(21, 49, 24, 1, 20000000.00, '2019-07-28 15:14:08', '2019-07-28 15:14:08'),
(23, 51, 21, 1, 20000000.00, '2019-07-28 15:15:42', '2019-07-28 15:15:42'),
(24, 52, 26, 1, 20000000.00, '2019-07-28 15:16:37', '2019-07-28 15:16:37'),
(25, 54, 24, 1, 20000000.00, '2019-07-28 15:26:01', '2019-07-28 15:26:01'),
(26, 55, 21, 1, 20000000.00, '2019-07-28 15:26:54', '2019-07-28 15:26:54'),
(27, 56, 25, 1, 11990000.00, '2019-07-29 07:28:23', '2019-07-29 07:28:23');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id`, `name`, `slug`, `status`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Điện thoại', 'dien-thoai', 1, NULL, '2019-07-03 12:38:51', '2019-07-03 12:38:51'),
(2, 'Máy tính bảng', 'may-tinh-bang', 1, NULL, '2019-07-03 12:38:57', '2019-07-03 12:39:10'),
(3, 'Lap top', 'lap-top', 1, NULL, '2019-07-03 12:39:16', '2019-07-03 12:39:16'),
(4, 'Phụ kiện', 'phu-kien', 1, NULL, '2019-07-03 12:39:25', '2019-07-03 12:39:25');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `color`
--

CREATE TABLE `color` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `color`
--

INSERT INTO `color` (`id`, `name`, `quantity`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Trắng', NULL, NULL, NULL, NULL),
(2, 'Đen', NULL, NULL, NULL, NULL),
(3, 'Xanh', NULL, NULL, NULL, NULL),
(4, 'Đỏ', NULL, NULL, NULL, NULL),
(5, 'Hồng', NULL, NULL, NULL, NULL),
(6, 'Nâu', NULL, NULL, NULL, NULL),
(7, 'Xanh Đen', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `contact`
--

CREATE TABLE `contact` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customer`
--

CREATE TABLE `customer` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` int(11) DEFAULT NULL,
  `note` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `customer`
--

INSERT INTO `customer` (`id`, `name`, `user_id`, `gender`, `email`, `address`, `phone_number`, `active`, `note`, `created_at`, `updated_at`) VALUES
(47, 'tranbahoa', 11, '1', 'tranbahoa123@gmail.com', 'tranbahoa123', '123456', NULL, NULL, '2019-07-28 12:10:48', '2019-07-28 12:10:48'),
(48, 'tranbahoang', 11, '0', 'hoang@gmail.com', 'nguyennam', '1233445', NULL, NULL, '2019-07-28 12:52:37', '2019-07-28 12:52:37'),
(49, 'Nguyenminhanh', 11, '1', 'nguyenminhanh@gmail.com', 'Nghe An', '12345678', NULL, NULL, '2019-07-28 12:57:52', '2019-07-28 12:57:52'),
(50, 'ninhhoang', 12, '0', 'ninhhoang@gmail.com', 'dsdsdsd', '12345', NULL, NULL, '2019-07-28 13:14:03', '2019-07-28 13:14:03'),
(51, 'Namanh', 12, '1', 'namanh@gmail.com', 'nguyennamanh', '123456789', NULL, NULL, '2019-07-28 13:38:44', '2019-07-28 13:38:44'),
(52, 'haihai', 12, '1', 'haihai@gmail.com', 'TienGiang', '345454545', NULL, NULL, '2019-07-28 13:43:36', '2019-07-28 13:43:36'),
(53, 'tranquocka', 12, '1', 'quocca@gmail.com', 'NinhBinh', '12232323', NULL, NULL, '2019-07-28 13:46:06', '2019-07-28 13:46:06'),
(54, 'Vietnam', 12, '0', 'nguyenvietnam@gmail.com', 'HaNoi', '1234567', NULL, NULL, '2019-07-28 14:56:41', '2019-07-28 14:56:41'),
(55, 'Nguyenvana', 12, '0', 'nguyenvana@gmail.com', 'Ha Noi', '123456', NULL, NULL, '2019-07-28 15:12:30', '2019-07-28 15:12:30'),
(56, 'nguyenvanb', 12, '0', 'nguyenvanb@gmail.com', 'Nam', '1234567', NULL, NULL, '2019-07-28 15:13:11', '2019-07-28 15:13:11'),
(57, 'nguyenthic', 12, '1', 'nguyenthic@gmail.com', 'Nam Dinh', '12232323', NULL, NULL, '2019-07-28 15:14:08', '2019-07-28 15:14:08'),
(58, 'nguyencongd', 12, '0', 'nguyencongd@gmail.com', 'Bắc Ninh', '1234434', NULL, NULL, '2019-07-28 15:15:03', '2019-07-28 15:15:03'),
(59, 'phancongb', 12, '0', 'phancongb@gmail.com', 'Lao cai', '54545', NULL, NULL, '2019-07-28 15:15:42', '2019-07-28 15:15:42'),
(60, 'lethia', 12, '1', 'lethihai@gmail.com', 'Yên Bái', '765767', NULL, NULL, '2019-07-28 15:16:36', '2019-07-28 15:16:36'),
(61, 'havangiang', 12, '0', 'havangiang@gmail.com', 'Phú Thọ', '454545', NULL, NULL, '2019-07-28 15:17:11', '2019-07-28 15:17:11'),
(62, 'lovanmanh', 12, '0', 'lovanmanh@gmail.com', 'Hà Tây', '6565656', NULL, NULL, '2019-07-28 15:26:01', '2019-07-28 15:26:01'),
(63, 'lothimuot', 12, '1', 'lothimuot@gmail.com', 'Phú Yên', '6565656', NULL, NULL, '2019-07-28 15:26:54', '2019-07-28 15:26:54'),
(64, 'nangamxadanh', 11, '1', 'nangamxadan@gmail.com', 'Bình Định', '5434343', NULL, NULL, '2019-07-29 07:28:22', '2019-07-29 07:28:22');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `forms`
--

CREATE TABLE `forms` (
  `id` int(10) UNSIGNED NOT NULL,
  `filename` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `forms`
--

INSERT INTO `forms` (`id`, `filename`, `created_at`, `updated_at`) VALUES
(1, '[\"Screenshot from 2018-11-13 11-18-31.png\"]', '2019-07-23 12:33:57', '2019-07-23 12:33:57'),
(2, '[\"Screenshot from 2018-10-22 23-27-56.png\"]', '2019-07-23 12:34:12', '2019-07-23 12:34:12'),
(3, '[\"photo-1500754088824-ce0582cfe45f.jpeg\",\"hinh-nen-canh-dong-lua-1.jpg\"]', '2019-07-23 12:34:29', '2019-07-23 12:34:29'),
(4, '[\"Screenshot from 2018-10-22 22-45-06.png\",\"otherside_by_aenami-davkr4n (1).png\"]', '2019-07-23 12:55:45', '2019-07-23 12:55:45');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `guarantee`
--

CREATE TABLE `guarantee` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `images`
--

CREATE TABLE `images` (
  `id` int(10) UNSIGNED NOT NULL,
  `filename` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `color_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `images`
--

INSERT INTO `images` (`id`, `filename`, `url_image`, `product_id`, `color_id`, `created_at`, `updated_at`) VALUES
(141, '1564212967292iphon1.png', 'images/product/productdetailt/1564212967292iphon1.png', 20, 1, '2019-07-27 07:36:09', '2019-07-27 07:36:09'),
(142, '1564212967297iphon4.png', 'images/product/productdetailt/1564212967297iphon4.png', 20, 1, '2019-07-27 07:36:10', '2019-07-27 07:36:10'),
(143, '1564212967299iphon45.png', 'images/product/productdetailt/1564212967299iphon45.png', 20, 1, '2019-07-27 07:36:10', '2019-07-27 07:36:10'),
(144, '1564213060949zanh2.png', 'images/product/productdetailt/1564213060949zanh2.png', 21, 3, '2019-07-27 07:37:42', '2019-07-27 07:37:42'),
(145, '1564213060955zanh3.png', 'images/product/productdetailt/1564213060955zanh3.png', 21, 3, '2019-07-27 07:37:43', '2019-07-27 07:37:43'),
(146, '1564213060958zanh4.png', 'images/product/productdetailt/1564213060958zanh4.png', 21, 3, '2019-07-27 07:37:43', '2019-07-27 07:37:43'),
(147, '1564213325599b9c809d44d4238066ded7f2d4eec5dbc.jpg', 'images/product/productdetailt/1564213325599b9c809d44d4238066ded7f2d4eec5dbc.jpg', 22, 6, '2019-07-27 07:42:18', '2019-07-27 07:42:18'),
(148, '15642133255933b34232c6e8e60bdde7ab71c8cffee4e.jpg', 'images/product/productdetailt/15642133255933b34232c6e8e60bdde7ab71c8cffee4e.jpg', 22, 6, '2019-07-27 07:42:18', '2019-07-27 07:42:18'),
(149, '1564213325603cfa7bae289d9f85fdaf07bf514b8e38e.jpg', 'images/product/productdetailt/1564213325603cfa7bae289d9f85fdaf07bf514b8e38e.jpg', 22, 6, '2019-07-27 07:42:18', '2019-07-27 07:42:18'),
(150, '1564213545158a1.jpg', 'images/product/productdetailt/1564213545158a1.jpg', 23, 6, '2019-07-27 07:45:47', '2019-07-27 07:45:47'),
(151, '1564213545165all.jpg', 'images/product/productdetailt/1564213545165all.jpg', 23, 6, '2019-07-27 07:45:48', '2019-07-27 07:45:48'),
(152, '1564213545168all1.jpg', 'images/product/productdetailt/1564213545168all1.jpg', 23, 6, '2019-07-27 07:45:48', '2019-07-27 07:45:48'),
(153, '1564213830739aa3.png', 'images/product/productdetailt/1564213830739aa3.png', 24, 2, '2019-07-27 07:50:33', '2019-07-27 07:50:33'),
(154, '1564213830744aaa.jpg', 'images/product/productdetailt/1564213830744aaa.jpg', 24, 2, '2019-07-27 07:50:33', '2019-07-27 07:50:33'),
(155, '1564213830746aaa1.jpg', 'images/product/productdetailt/1564213830746aaa1.jpg', 24, 2, '2019-07-27 07:50:33', '2019-07-27 07:50:33'),
(156, '1564214142977ssss.jpg', 'images/product/productdetailt/1564214142977ssss.jpg', 25, 5, '2019-07-27 07:55:47', '2019-07-27 07:55:47'),
(157, '1564214142982ssssssss.jpg', 'images/product/productdetailt/1564214142982ssssssss.jpg', 25, 5, '2019-07-27 07:55:47', '2019-07-27 07:55:47'),
(158, '1564214142986ssssssssssssssss.jpg', 'images/product/productdetailt/1564214142986ssssssssssssssss.jpg', 25, 5, '2019-07-27 07:55:47', '2019-07-27 07:55:47'),
(159, '1564214393214dien-thoai-samsung-galaxy-a30-xach-tay-gia-re-G434-1562054792920.jpg', 'images/product/productdetailt/1564214393214dien-thoai-samsung-galaxy-a30-xach-tay-gia-re-G434-1562054792920.jpg', 26, 2, '2019-07-27 07:59:59', '2019-07-27 07:59:59'),
(160, '1564214393222samsung-galaxy-30-thoi-luong-pin.jpg', 'images/product/productdetailt/1564214393222samsung-galaxy-30-thoi-luong-pin.jpg', 26, 2, '2019-07-27 07:59:59', '2019-07-27 07:59:59'),
(161, '1564214393226samsung-galaxy-a30-blue-5.jpg', 'images/product/productdetailt/1564214393226samsung-galaxy-a30-blue-5.jpg', 26, 2, '2019-07-27 07:59:59', '2019-07-27 07:59:59'),
(162, '1564214637881op2.jpg', 'images/product/productdetailt/1564214637881op2.jpg', 27, 4, '2019-07-27 08:04:00', '2019-07-27 08:04:00'),
(163, '1564214637886op2.png', 'images/product/productdetailt/1564214637886op2.png', 27, 4, '2019-07-27 08:04:00', '2019-07-27 08:04:00'),
(164, '1564214637889qp1.png', 'images/product/productdetailt/1564214637889qp1.png', 27, 4, '2019-07-27 08:04:00', '2019-07-27 08:04:00'),
(165, '1564214895690dien-thoai-oppo-a3s-xach-tay-gia-re-G428-1560580370471.jpg', 'images/product/productdetailt/1564214895690dien-thoai-oppo-a3s-xach-tay-gia-re-G428-1560580370471.jpg', 28, 2, '2019-07-27 08:08:18', '2019-07-27 08:08:18'),
(166, '1564214895695oppo-a3s-3-1.jpg', 'images/product/productdetailt/1564214895695oppo-a3s-3-1.jpg', 28, 2, '2019-07-27 08:08:18', '2019-07-27 08:08:18'),
(167, '1564214895698oppo-a3s-do-9-org-1.jpg', 'images/product/productdetailt/1564214895698oppo-a3s-do-9-org-1.jpg', 28, 2, '2019-07-27 08:08:18', '2019-07-27 08:08:18'),
(168, '1564215021328ad.jpg', 'images/product/productdetailt/1564215021328ad.jpg', 29, 2, '2019-07-27 08:10:24', '2019-07-27 08:10:24'),
(169, '1564215021335ad1.jpg', 'images/product/productdetailt/1564215021335ad1.jpg', 29, 2, '2019-07-27 08:10:24', '2019-07-27 08:10:24'),
(170, '1564215021338ad2.jpg', 'images/product/productdetailt/1564215021338ad2.jpg', 29, 2, '2019-07-27 08:10:24', '2019-07-27 08:10:24'),
(171, '1564215352910a5.jpg', 'images/product/productdetailt/1564215352910a5.jpg', 31, 7, '2019-07-27 08:15:56', '2019-07-27 08:15:56'),
(172, '1564215352917a111.jpg', 'images/product/productdetailt/1564215352917a111.jpg', 31, 7, '2019-07-27 08:15:56', '2019-07-27 08:15:56'),
(173, '1564215352920f11.jpg', 'images/product/productdetailt/1564215352920f11.jpg', 31, 7, '2019-07-27 08:15:56', '2019-07-27 08:15:56'),
(174, '1564215560214ip2.jpg', 'images/product/productdetailt/1564215560214ip2.jpg', 32, 1, '2019-07-27 08:19:25', '2019-07-27 08:19:25'),
(175, '1564215560219ipx.jpg', 'images/product/productdetailt/1564215560219ipx.jpg', 32, 1, '2019-07-27 08:19:25', '2019-07-27 08:19:25'),
(176, '1564216210853aaaa.jpg', 'images/product/productdetailt/1564216210853aaaa.jpg', 33, 1, '2019-07-27 08:30:13', '2019-07-27 08:30:13'),
(177, '1564216210859aaaaaaa.jpg', 'images/product/productdetailt/1564216210859aaaaaaa.jpg', 33, 1, '2019-07-27 08:30:13', '2019-07-27 08:30:13'),
(178, '1564216210864aaaaaaaaaaaa.jpg', 'images/product/productdetailt/1564216210864aaaaaaaaaaaa.jpg', 33, 1, '2019-07-27 08:30:13', '2019-07-27 08:30:13'),
(179, '1564216437981dđ.png', 'images/product/productdetailt/1564216437981dđ.png', 34, 1, '2019-07-27 08:34:00', '2019-07-27 08:34:00'),
(180, '1564216437989ddd.jpg', 'images/product/productdetailt/1564216437989ddd.jpg', 34, 1, '2019-07-27 08:34:00', '2019-07-27 08:34:00'),
(181, '1564216437991dddddddđ.jpg', 'images/product/productdetailt/1564216437991dddddddđ.jpg', 34, 1, '2019-07-27 08:34:00', '2019-07-27 08:34:00'),
(182, '1564216437981dđ.png', 'images/product/productdetailt/1564216437981dđ.png', 34, 1, '2019-07-27 08:34:00', '2019-07-27 08:34:00'),
(183, '1564216437989ddd.jpg', 'images/product/productdetailt/1564216437989ddd.jpg', 34, 1, '2019-07-27 08:34:00', '2019-07-27 08:34:00'),
(184, '1564216437991dddddddđ.jpg', 'images/product/productdetailt/1564216437991dddddddđ.jpg', 34, 1, '2019-07-27 08:34:00', '2019-07-27 08:34:00'),
(185, '1564216603667q.png', 'images/product/productdetailt/1564216603667q.png', 35, 2, '2019-07-27 08:36:46', '2019-07-27 08:36:46'),
(186, '1564216603672qq.jpg', 'images/product/productdetailt/1564216603672qq.jpg', 35, 2, '2019-07-27 08:36:46', '2019-07-27 08:36:46'),
(187, '1564216603674qqqq.jpg', 'images/product/productdetailt/1564216603674qqqq.jpg', 35, 2, '2019-07-27 08:36:46', '2019-07-27 08:36:46'),
(188, '1564216755740f.png', 'images/product/productdetailt/1564216755740f.png', 36, 5, '2019-07-27 08:39:18', '2019-07-27 08:39:18'),
(189, '1564216755745fff.jpg', 'images/product/productdetailt/1564216755745fff.jpg', 36, 5, '2019-07-27 08:39:18', '2019-07-27 08:39:18'),
(190, '1564216755748fffff.jpg', 'images/product/productdetailt/1564216755748fffff.jpg', 36, 5, '2019-07-27 08:39:18', '2019-07-27 08:39:18'),
(191, '1564216985883hhhhhh.png', 'images/product/productdetailt/1564216985883hhhhhh.png', 37, 5, '2019-07-27 08:43:08', '2019-07-27 08:43:08'),
(192, '1564216985889hhhhhhhhh.jpg', 'images/product/productdetailt/1564216985889hhhhhhhhh.jpg', 37, 5, '2019-07-27 08:43:08', '2019-07-27 08:43:08'),
(193, '1564216985891hhhhhhhhhhhh.jpg', 'images/product/productdetailt/1564216985891hhhhhhhhhhhh.jpg', 37, 5, '2019-07-27 08:43:08', '2019-07-27 08:43:08'),
(194, '1564217188995lll.jpg', 'images/product/productdetailt/1564217188995lll.jpg', 38, 2, '2019-07-27 08:46:30', '2019-07-27 08:46:30'),
(195, '1564217189000lllllllll.jpg', 'images/product/productdetailt/1564217189000lllllllll.jpg', 38, 2, '2019-07-27 08:46:31', '2019-07-27 08:46:31'),
(196, '1564217189005lllllllllll.jpg', 'images/product/productdetailt/1564217189005lllllllllll.jpg', 38, 2, '2019-07-27 08:46:31', '2019-07-27 08:46:31'),
(197, '1564217189007llllllllllllllll.gif', 'images/product/productdetailt/1564217189007llllllllllllllll.gif', 38, 2, '2019-07-27 08:46:31', '2019-07-27 08:46:31'),
(198, '1564217492401hhhhhhhhhhhhhhhhh.jpg', 'images/product/productdetailt/1564217492401hhhhhhhhhhhhhhhhh.jpg', 39, 1, '2019-07-27 08:51:35', '2019-07-27 08:51:35'),
(199, '1564217492395aaaaaaaaaaaaaaaaaaa.jpg', 'images/product/productdetailt/1564217492395aaaaaaaaaaaaaaaaaaa.jpg', 39, 1, '2019-07-27 08:51:35', '2019-07-27 08:51:35'),
(200, '1564217492406saa.jpg', 'images/product/productdetailt/1564217492406saa.jpg', 39, 1, '2019-07-27 08:51:35', '2019-07-27 08:51:35'),
(201, '1564217842265qa.jpg', 'images/product/productdetailt/1564217842265qa.jpg', 40, 1, '2019-07-27 08:57:24', '2019-07-27 08:57:24'),
(202, '1564217842278qa2.jpg', 'images/product/productdetailt/1564217842278qa2.jpg', 40, 1, '2019-07-27 08:57:25', '2019-07-27 08:57:25'),
(203, '1564217842281qaw.jpg', 'images/product/productdetailt/1564217842281qaw.jpg', 40, 1, '2019-07-27 08:57:25', '2019-07-27 08:57:25'),
(204, '1564218204897ac.jpg', 'images/product/productdetailt/1564218204897ac.jpg', 41, 1, '2019-07-27 09:03:26', '2019-07-27 09:03:26'),
(205, '1564218204901ac2.jpg', 'images/product/productdetailt/1564218204901ac2.jpg', 41, 1, '2019-07-27 09:03:27', '2019-07-27 09:03:27'),
(206, '1564218204903ac3.jpg', 'images/product/productdetailt/1564218204903ac3.jpg', 41, 1, '2019-07-27 09:03:27', '2019-07-27 09:03:27'),
(207, '1564218336367de2.jpg', 'images/product/productdetailt/1564218336367de2.jpg', 42, 2, '2019-07-27 09:05:38', '2019-07-27 09:05:38'),
(208, '1564218336374de3.jpg', 'images/product/productdetailt/1564218336374de3.jpg', 42, 2, '2019-07-27 09:05:38', '2019-07-27 09:05:38'),
(209, '1564218336377delll.jpg', 'images/product/productdetailt/1564218336377delll.jpg', 42, 2, '2019-07-27 09:05:38', '2019-07-27 09:05:38'),
(210, '1564218467469dell.jpg', 'images/product/productdetailt/1564218467469dell.jpg', 43, 2, '2019-07-27 09:07:49', '2019-07-27 09:07:49'),
(211, '1564218467474dell2.jpg', 'images/product/productdetailt/1564218467474dell2.jpg', 43, 2, '2019-07-27 09:07:49', '2019-07-27 09:07:49'),
(212, '1564218627656d5.jpg', 'images/product/productdetailt/1564218627656d5.jpg', 44, 1, '2019-07-27 09:10:29', '2019-07-27 09:10:29'),
(213, '1564218627661d7.jpg', 'images/product/productdetailt/1564218627661d7.jpg', 44, 1, '2019-07-27 09:10:29', '2019-07-27 09:10:29'),
(214, '1564218627663d9.jpg', 'images/product/productdetailt/1564218627663d9.jpg', 44, 1, '2019-07-27 09:10:30', '2019-07-27 09:10:30'),
(215, '1564218772589ss1.jpg', 'images/product/productdetailt/1564218772589ss1.jpg', 45, 2, '2019-07-27 09:12:54', '2019-07-27 09:12:54'),
(216, '1564218772594ss3.jpg', 'images/product/productdetailt/1564218772594ss3.jpg', 45, 2, '2019-07-27 09:12:54', '2019-07-27 09:12:54'),
(217, '1564218772596sss.jpg', 'images/product/productdetailt/1564218772596sss.jpg', 45, 2, '2019-07-27 09:12:54', '2019-07-27 09:12:54'),
(218, '1564219007200pin-sac-du-phong-7500mah-esaver-la-a33-den-1-1.jpg', 'images/product/productdetailt/1564219007200pin-sac-du-phong-7500mah-esaver-la-a33-den-1-1.jpg', 46, 2, '2019-07-27 09:16:50', '2019-07-27 09:16:50'),
(219, '1564219007209pin-sac-du-phong-7500mah-esaver-la-a33-den-2-1.jpg', 'images/product/productdetailt/1564219007209pin-sac-du-phong-7500mah-esaver-la-a33-den-2-1.jpg', 46, 2, '2019-07-27 09:16:50', '2019-07-27 09:16:50'),
(220, '1564219007212pin-sac-du-phong-7500mah-esaver-la-a33-den-3-1.jpg', 'images/product/productdetailt/1564219007212pin-sac-du-phong-7500mah-esaver-la-a33-den-3-1.jpg', 46, 2, '2019-07-27 09:16:50', '2019-07-27 09:16:50'),
(221, '1564219133636pin-sac-du-phong-7500mah-esaver-la-y323s-13.jpg', 'images/product/productdetailt/1564219133636pin-sac-du-phong-7500mah-esaver-la-y323s-13.jpg', 47, 1, '2019-07-27 09:18:55', '2019-07-27 09:18:55'),
(222, '1564219133627pin-sac-du-phong-7500mah-esaver-la-y323s-11.jpg', 'images/product/productdetailt/1564219133627pin-sac-du-phong-7500mah-esaver-la-y323s-11.jpg', 47, 1, '2019-07-27 09:18:55', '2019-07-27 09:18:55'),
(223, '1564219133639pin-sac-du-phong-7500mah-esaver-la-y323s-anh-dai-dien-600x600.jpg', 'images/product/productdetailt/1564219133639pin-sac-du-phong-7500mah-esaver-la-y323s-anh-dai-dien-600x600.jpg', 47, 1, '2019-07-27 09:18:55', '2019-07-27 09:18:55'),
(224, '1564219244924pin-sac-du-phong-10000mah-evalu-sword-x-1.jpg', 'images/product/productdetailt/1564219244924pin-sac-du-phong-10000mah-evalu-sword-x-1.jpg', 48, 2, '2019-07-27 09:20:46', '2019-07-27 09:20:46'),
(225, '1564219244918as.jpg', 'images/product/productdetailt/1564219244918as.jpg', 48, 2, '2019-07-27 09:20:46', '2019-07-27 09:20:46'),
(226, '1564219348267tai-nghe-chup-tai-kanen-ip-2090-1-1.jpg', 'images/product/productdetailt/1564219348267tai-nghe-chup-tai-kanen-ip-2090-1-1.jpg', 49, 2, '2019-07-27 09:22:31', '2019-07-27 09:22:31'),
(227, '1564219348275tai-nghe-chup-tai-kanen-ip-2090-4.jpg', 'images/product/productdetailt/1564219348275tai-nghe-chup-tai-kanen-ip-2090-4.jpg', 49, 2, '2019-07-27 09:22:31', '2019-07-27 09:22:31'),
(228, '1564219348277tai-nghe-chup-tai-kanen-ip-2090-6-2.jpg', 'images/product/productdetailt/1564219348277tai-nghe-chup-tai-kanen-ip-2090-6-2.jpg', 49, 2, '2019-07-27 09:22:31', '2019-07-27 09:22:31');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_07_25_073446_create_slide', 1),
(4, '2018_07_25_073808_create_customer_table', 1),
(5, '2018_07_25_074731_create_bills_table', 1),
(6, '2018_07_25_081754_create_size_table', 1),
(7, '2018_07_25_081846_create_size_products_table', 1),
(8, '2018_07_25_081931_create_color_table', 1),
(9, '2018_07_25_082003_create_color_products_table', 1),
(10, '2018_07_25_082039_create_images_table', 1),
(11, '2018_07_25_082444_create_guarantee_table', 1),
(12, '2018_07_25_092637_createbill_detail_table', 1),
(13, '2019_06_25_135923_create_category_table', 1),
(14, '2019_06_25_140052_create_product_types_table', 1),
(15, '2019_06_25_140144_create_product_table', 1),
(16, '2019_06_25_145828_create_contact_table', 1),
(17, '2019_07_23_192726_create_forms_table', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trademark` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `util_price` double(10,2) NOT NULL,
  `promotion_price` double(10,2) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `like` int(11) DEFAULT NULL,
  `is_hot` int(11) DEFAULT NULL,
  `all_views` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `views` int(11) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `producttype_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `name`, `slug`, `title`, `description`, `image`, `trademark`, `util_price`, `promotion_price`, `status`, `like`, `is_hot`, `all_views`, `created_by`, `updated_by`, `views`, `category_id`, `producttype_id`, `created_at`, `updated_at`) VALUES
(20, 'iPhone Xs Max 512GB', 'iphone-xs-max-512gb', 'iPhone Xs Max 512GB', '<ul>\r\n	<li>Trả g&oacute;p 0% Tặng th&ecirc;m g&oacute;i bảo h&agrave;nh mở rộng năm thứ 2</li>\r\n	<li>Giảm ngay 500,000đ</li>\r\n	<li>Tặng g&oacute;i bảo h&agrave;nh mở rộng năm thứ 2&nbsp;</li>\r\n</ul>\r\n\r\n<p>Kh&aacute;ch h&agrave;ng được khuyến mại th&ecirc;m :</p>\r\n\r\n<ul>\r\n	<li>Giảm th&ecirc;m đến 300,000đ khi thanh to&aacute;n 100% gi&aacute; trị đơn h&agrave;ng qua VNPay-QR</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>Phụ kiện ch&iacute;nh h&atilde;ng Apple giảm 10%</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>Tặng PMH 500,000đ mua tai nghe Bluetooth Anker Soundcore Liberty Air</li>\r\n</ul>', '27-07-2019_347307849_jpg', 'Mỹ', 39999000.00, 30000000.00, 1, 0, NULL, NULL, NULL, NULL, NULL, 1, 14, '2019-07-27 07:35:49', '2019-07-29 06:11:04'),
(21, 'Samsung Galaxy S10+ (512GB)', 'samsung-galaxy-s10-512gb', 'Samsung Galaxy S10+ (512GB)', '<p><strong>Gi&aacute; đặc biệt đến 28/07 : 25,990,000đ</strong></p>\r\n\r\n<ul>\r\n	<li>Trả g&oacute;p 0%</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>Giảm 50% Sim Viettel khi mua k&egrave;m m&aacute;y</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>Tặng 100 ng&agrave;y lỗi đổi mới&nbsp;<a href=\"https://fptshop.com.vn/tin-tuc/tin-khuyen-mai/nhan-ngay-dac-quyen-doi-tra-mien-phi-trong-100-ngay-khi-mua-dien-thoai-samsung-tai-fpt-shop-90602\" target=\"_blank\">Xem chi tiết</a></li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>Giảm th&ecirc;m đến 300,000đ khi thanh to&aacute;n 100% gi&aacute; trị đơn h&agrave;ng qua VNPay-QR</li>\r\n</ul>', '27-07-2019_863382942_jpg', 'Việt Nam', 22990000.00, 20000000.00, 1, 2, NULL, NULL, NULL, NULL, NULL, 1, 13, '2019-07-27 07:37:17', '2019-07-29 06:36:55'),
(24, 'Điện Thoại Samsung Galaxy M20', 'dien-thoai-samsung-galaxy-m20', 'Điện Thoại Samsung Galaxy M20 (32GB/3GB) - Hàng Chính Hãng', '<p>Điện thoại ch&iacute;nh h&atilde;ng, Nguy&ecirc;n seal, Mới 100%, Chưa Active</p>\r\n\r\n<p>Để đảm bảo quyền lợi kh&aacute;ch h&agrave;ng về thời gian bảo h&agrave;nh. Khi mở m&aacute;y sử dụng, Qu&yacute; kh&aacute;ch vui l&ograve;ng kiểm tra thời gian bảo h&agrave;nh của m&aacute;y bằng c&aacute;ch soạn tin nhắn m&atilde; số IMEI gửi 6060</p>\r\n\r\n<p>Miễn ph&iacute; giao h&agrave;ng ti&ecirc;u chuẩn to&agrave;n quốc</p>\r\n\r\n<p>Thiết kế: Nguy&ecirc;n khối, mặt k&iacute;nh cong 2.5D</p>\r\n\r\n<p>M&agrave;n h&igrave;nh: Super AMOLED 6.3&quot; FHD+ Infinity V Display</p>\r\n\r\n<p>Camera Sau: 13 MP v&agrave; 5 MP (2 camera)</p>\r\n\r\n<p>Camera Trước: 8 MP</p>\r\n\r\n<p>CPU: Exynos 7904, 1.8 GHz Octa Core Processor</p>\r\n\r\n<p>Bộ Nhớ: 32GB</p>\r\n\r\n<p>RAM: 3GB</p>\r\n\r\n<p>T&iacute;nh năng: Mở kh&oacute;a bằng v&acirc;n tay, Đ&egrave;n pin, Chặn cuộc gọi, Chặn tin nhắn</p>', '27-07-2019_462867166_jpg', 'Việt Nam', 21290000.00, 20000000.00, 1, 5, NULL, NULL, NULL, NULL, NULL, 1, 13, '2019-07-27 07:49:14', '2019-07-29 06:36:51'),
(25, 'Điện Thoại Samsung Galaxy S8 Plus', 'dien-thoai-samsung-galaxy-s8-plus', 'Điện Thoại Samsung Galaxy S8 Plus - Hàng Chính Hãng', '<p>Ch&iacute;nh h&atilde;ng, Nguy&ecirc;n seal, Mới 100%, Chưa Active</p>\r\n\r\n<p>Miễn ph&iacute; giao h&agrave;ng to&agrave;n quốc</p>\r\n\r\n<p>Thiết kế: Nguy&ecirc;n khối</p>\r\n\r\n<p>M&agrave;n h&igrave;nh: Super AMOLED, 2K (1440 x 2960 Pixels)</p>\r\n\r\n<p>Camera Trước/Sau: 8MP/ 12MP</p>\r\n\r\n<p>CPU: Exynos 8895 8 nh&acirc;n 64-bit</p>\r\n\r\n<p>Bộ nhớ: 64GB</p>\r\n\r\n<p>RAM: 4GB</p>\r\n\r\n<p>Nano SIM &amp; Micro SIM (SIM 2 chung khe thẻ nhớ)</p>\r\n\r\n<p>T&iacute;nh năng: Mở kh&oacute;a bằng v&acirc;n tay, Qu&eacute;t mống mắt</p>', '27-07-2019_161066277_jpg', 'Việt Nam', 11990000.00, 0.00, 1, 4, NULL, NULL, NULL, NULL, NULL, 1, 13, '2019-07-27 07:54:45', '2019-07-29 07:31:07'),
(26, 'Điện Thoại Samsung Galaxy A30 (32GB/3GB)', 'dien-thoai-samsung-galaxy-a30-32gb3gb', 'Điện Thoại Samsung Galaxy A30 (32GB/3GB) - Hàng Chính Hãng', '<p>H&agrave;ng ch&iacute;nh h&atilde;ng, Nguy&ecirc;n seal, Mới 100%, Chưa Active</p>\r\n\r\n<p>Để đảm bảo quyền lợi kh&aacute;ch h&agrave;ng về thời gian bảo h&agrave;nh. Khi mở m&aacute;y sử dụng, Qu&yacute; kh&aacute;ch vui l&ograve;ng kiểm tra thời gian bảo h&agrave;nh của m&aacute;y bằng c&aacute;ch soạn tin nhắn m&atilde; số IMEI gửi 6060</p>\r\n\r\n<p>Miễn ph&iacute; giao h&agrave;ng ti&ecirc;u chuẩn to&agrave;n quốc</p>\r\n\r\n<p>Thiết kế: Nguy&ecirc;n khối, m&agrave;n h&igrave;nh v&ocirc; cực</p>\r\n\r\n<p>M&agrave;n h&igrave;nh: 6.4&rdquo; FHD+ (1080x2220) super AMOLED</p>\r\n\r\n<p>Camera Sau: 16MP (F1.9) + 5MP (F2.2)</p>\r\n\r\n<p>Camera Trước: 16P FF (F1.9)</p>\r\n\r\n<p>CPU: Exynos 7904 8 nh&acirc;n 64-bit</p>\r\n\r\n<p>Bộ Nhớ: 32GB</p>\r\n\r\n<p>RAM: 3GB</p>\r\n\r\n<p>Thẻ nhớ tối đa tới: 512GB</p>\r\n\r\n<p>T&iacute;nh năng: Bảo mật v&acirc;n tay, Nh&acirc;n bản ứng dụng, M&agrave;n h&igrave;nh lu&ocirc;n hiển thị AOD, Mặt k&iacute;nh 2.5D, Chặn tin nhắn, Sạc pin nhanh, Đ&egrave;n pin, Dolby Audio, Chặn cuộc gọi</p>', '27-07-2019_311015754_jpg', 'Việt Nam', 22990000.00, 20000000.00, 1, 2, NULL, NULL, NULL, NULL, NULL, 1, 13, '2019-07-27 07:58:39', '2019-07-29 06:13:24'),
(27, 'Điện Thoại OPPO F7', 'dien-thoai-oppo-f7', 'Điện Thoại OPPO F7 (128GB/6GB) - Hàng Chính Hãng', '<p>Ch&iacute;nh h&atilde;ng, nguy&ecirc;n seal, mới 100%, chưa active</p>\r\n\r\n<p>Miễn ph&iacute; giao h&agrave;ng to&agrave;n quốc</p>\r\n\r\n<p>Thiết kế nguy&ecirc;n khối kim loại</p>\r\n\r\n<p>M&agrave;n h&igrave;nh: 6.23 inch</p>\r\n\r\n<p>Camera Trước/Sau: 16MP/25MP</p>\r\n\r\n<p>CPU: MediaTek P60</p>\r\n\r\n<p>Bộ Nhớ: 128GB</p>\r\n\r\n<p>RAM: 6GB</p>\r\n\r\n<p>SIM: 2 Nano SIM</p>\r\n\r\n<p>T&iacute;nh năng: Mở kh&oacute;a bằng khu&ocirc;n mặt, mở kh&oacute;a bằng v&acirc;n tay</p>', '27-07-2019_1044620843_png', 'Trung Quốc', 9989000.00, 0.00, 1, 3, NULL, NULL, NULL, NULL, NULL, 1, 15, '2019-07-27 08:03:43', '2019-07-29 06:13:29'),
(28, 'Điện Thoại OPPO A3s', 'dien-thoai-oppo-a3s', 'Điện Thoại OPPO A3s (16GB/2GB) - Hàng Chính Hãng', '<p>Sản phẩm Ch&iacute;nh h&atilde;ng, Mới 100%, Nguy&ecirc;n seal, Chưa Active</p>\r\n\r\n<p>Miễn ph&iacute; giao h&agrave;ng ti&ecirc;u chuẩn to&agrave;n quốc</p>\r\n\r\n<p>M&agrave;n h&igrave;nh: 6.2 inch (M&agrave;n h&igrave;nh si&ecirc;u tr&agrave;n), HD+</p>\r\n\r\n<p>Camera Trước: 8 MP (Hỗ trợ c&ocirc;ng nghệ A.I)</p>\r\n\r\n<p>Camera Sau: 13 MP + 2 MP (Camera k&eacute;p)</p>\r\n\r\n<p>CPU: Quacolmm SDM 450 8 nh&acirc;n, 1.8GHz</p>\r\n\r\n<p>Bộ Nhớ: 16GB</p>\r\n\r\n<p>RAM: 2GB</p>\r\n\r\n<p>SIM: 2 Nano SIM</p>\r\n\r\n<p>T&iacute;nh năng: Chụp ảnh l&agrave;m đẹp bằng tr&iacute; tuệ nh&acirc;n tạo, Chụp ảnh x&oacute;a ph&ocirc;ng, Mở kh&oacute;a nhận diện khu&ocirc;n mặt</p>', '27-07-2019_798715182_jpg', 'Trung Quốc', 2810000.00, 2010000.00, 1, 2, NULL, NULL, NULL, NULL, NULL, 1, 15, '2019-07-27 08:08:02', '2019-07-29 06:12:42'),
(29, 'Điện Thoại OPPO F5', 'dien-thoai-oppo-f5', 'Điện Thoại OPPO F5 - Hàng Chính Hãng', '<p>Ch&iacute;nh h&atilde;ng, Nguy&ecirc;n seal, Mới 100%, Chưa Active</p>\r\n\r\n<p>Miễn ph&iacute; giao h&agrave;ng to&agrave;n quốc</p>\r\n\r\n<p>Thiết kế nguy&ecirc;n khối kim loại</p>\r\n\r\n<p>M&agrave;n h&igrave;nh 6 inch</p>\r\n\r\n<p>Camera Trước/Sau: 16MP/20MP</p>\r\n\r\n<p>CPU: Mediatek MT6763T Helio P23</p>\r\n\r\n<p>ROM/RAM: 32GB/4GB</p>\r\n\r\n<p>Dung lượng Pin: 3200 mAh</p>', '27-07-2019_913926591_jpg', 'Trung Quốc', 3500000.00, 0.00, 1, NULL, NULL, NULL, NULL, NULL, NULL, 1, 15, '2019-07-27 08:10:09', '2019-07-27 08:10:24'),
(31, 'Điện Thoại OPPO F11 Pro', 'dien-thoai-oppo-f11-pro', 'Điện Thoại OPPO F11 Pro (6GB/64GB) - Hàng Chính Hãng', '<p>Ch&iacute;nh h&atilde;ng, Nguy&ecirc;n seal, Mới 100%, Chưa Active</p>\r\n\r\n<p>Miễn ph&iacute; giao h&agrave;ng to&agrave;n quốc</p>\r\n\r\n<p>M&agrave;n h&igrave;nh: LTPS LCD, 6.53&quot;, Full HD+ (1080 x 2340 Pixels)</p>\r\n\r\n<p>Camera Trước/Sau: 16MP/48MP + 5MP (2 camera)</p>\r\n\r\n<p>CPU: MediaTek Helio P70 8 nh&acirc;n</p>\r\n\r\n<p>Bộ Nhớ: 64GB</p>\r\n\r\n<p>RAM: 6GB</p>\r\n\r\n<p>SIM tương th&iacute;ch: 2 Nano SIM</p>\r\n\r\n<p>T&iacute;nh năng: Mở kh&oacute;a bằng v&acirc;n tay, Mở kh&oacute;a bằng khu&ocirc;n mặt</p>', '27-07-2019_1396787413_jpg', 'Trung Quốc', 6989000.00, 0.00, 1, NULL, NULL, NULL, NULL, NULL, NULL, 1, 15, '2019-07-27 08:15:02', '2019-07-27 08:15:56'),
(32, 'Điện Thoại iPhone X 64GB VN/A', 'dien-thoai-iphone-x-64gb-vna', 'Điện Thoại iPhone X 64GB VN/A - Hàng Chính Hãng', '<p>Ch&iacute;nh h&atilde;ng, Nguy&ecirc;n seal, Mới 100%, Chưa Active</p>\r\n\r\n<p>Miễn ph&iacute; giao h&agrave;ng to&agrave;n quốc</p>\r\n\r\n<p>Thiết kế: Nguy&ecirc;n khối</p>\r\n\r\n<p>M&agrave;n h&igrave;nh: Super AMOLED capacitive touchscreen, 5.8 inch HD</p>\r\n\r\n<p>Camera Trước/Sau: 7MP/ 2 camera 12MP</p>\r\n\r\n<p>CPU: Apple A11 Bionic 6 nh&acirc;n</p>\r\n\r\n<p>Bộ Nhớ: 64GB</p>\r\n\r\n<p>RAM: 3GB</p>\r\n\r\n<p>SIM: 1 Nano SIM</p>\r\n\r\n<p>T&iacute;nh năng: Chống nước, chống bụi, Face ID</p>', '27-07-2019_1139729044_jpg', 'Mỹ', 20490000.00, 0.00, 1, 3, NULL, NULL, NULL, NULL, NULL, 1, 14, '2019-07-27 08:18:17', '2019-07-29 06:13:11'),
(33, 'iPad WiFi 32GB New 2018', 'ipad-wifi-32gb-new-2018', 'iPad WiFi 32GB New 2018 - Hàng Chính Hãng', '<p>Ch&iacute;nh h&atilde;ng, nguy&ecirc;n seal, mới 100%</p>\r\n\r\n<p>Miễn ph&iacute; giao h&agrave;ng to&agrave;n quốc</p>\r\n\r\n<p>Thiết kế: Nh&ocirc;m nguy&ecirc;n khối</p>\r\n\r\n<p>M&agrave;n h&igrave;nh: Retina 9.7 inch</p>\r\n\r\n<p>Camera Trước/Sau: 1.2MP/8MP</p>\r\n\r\n<p>CPU: Apple A10 Fusion 4 nh&acirc;n 2.34GHz</p>\r\n\r\n<p>Bộ Nhớ: 32GB</p>\r\n\r\n<p>RAM: 2GB</p>\r\n\r\n<p>SIM: Kh&ocirc;ng</p>\r\n\r\n<p>T&iacute;nh năng: Mở kh&oacute;a bằng v&acirc;n tay</p>', '27-07-2019_506754569_png', 'Mỹ', 6989000.00, 6889000.00, 1, 1, NULL, NULL, NULL, NULL, NULL, 2, 17, '2019-07-27 08:29:29', '2019-07-29 06:13:09'),
(34, 'Máy tính bảng Samsung Galaxy Tab A8 8\" T295 (2019)', 'may-tinh-bang-samsung-galaxy-tab-a8-8-t295-2019', 'Máy Tính Bảng Samsung Galaxy Tab A8 8\" T295 (2019) - Hàng Chính Hãng', '<p>H&agrave;ng ch&iacute;nh h&atilde;ng, Nguy&ecirc;n seal, Mới 100%, Chưa Active</p>\r\n\r\n<p>M&agrave;n h&igrave;nh: 8&#39;&#39; WUXGA TFT Độ ph&acirc;n giải 1280 x 800 pixels</p>\r\n\r\n<p>Camera Sau: 8 MP</p>\r\n\r\n<p>Camera Trước: 2 MP</p>\r\n\r\n<p>CPU: Qualcomm Snapdragon 429 processor</p>\r\n\r\n<p>Bộ Nhớ: 32GB</p>\r\n\r\n<p>RAM: 2GB</p>\r\n\r\n<p>Hỗ trợ thẻ nhớ MicroSD, l&ecirc;n đến 512 GB</p>\r\n\r\n<p>Để đảm bảo quyền lợi kh&aacute;ch h&agrave;ng về thời gian bảo h&agrave;nh. Khi mở m&aacute;y sử dụng, Qu&yacute; kh&aacute;ch vui l&ograve;ng kiểm tra thời gian bảo h&agrave;nh của m&aacute;y bằng c&aacute;ch soạn tin nhắn m&atilde; số IMEI gửi 6060</p>\r\n\r\n<p>Miễn ph&iacute; giao h&agrave;ng ti&ecirc;u chuẩn to&agrave;n quốc</p>', '27-07-2019_1871171434_png', 'Việt Nam', 3490000.00, 3400000.00, 1, NULL, NULL, NULL, NULL, NULL, NULL, 2, 16, '2019-07-27 08:33:42', '2019-07-27 08:34:00'),
(35, 'Máy tính bảng iPad Pro 11 inch Wifi 64GB (2018)', 'may-tinh-bang-ipad-pro-11-inch-wifi-64gb-2018', 'iPad Pro 11 inch (2018) 64GB Wifi Cellular - Hàng Chính Hãng', '<p>Ch&iacute;nh h&atilde;ng, Nguy&ecirc;n seal, Mới 100%</p>\r\n\r\n<p>Miễn ph&iacute; giao h&agrave;ng to&agrave;n quốc</p>\r\n\r\n<p>Thiết kế: Si&ecirc;u mỏng, loại bỏ n&uacute;t home</p>\r\n\r\n<p>M&agrave;n h&igrave;nh: 11 inch (1668 x 2388 px), 264 ppi</p>\r\n\r\n<p>Camera Trước/Sau: 7MP Portrait Mode/Lighting - 12MP , f/1.8 Zoom quang 5x, Smart HDR</p>\r\n\r\n<p>CPU: A12X Bionic 64bit, Neural Engine, M12, 7 nh&acirc;n GPU</p>\r\n\r\n<p>Bộ Nhớ: 64GB</p>\r\n\r\n<p>RAM: 4GB</p>\r\n\r\n<p>SIM tương th&iacute;ch: Nano Sim &amp; eSIM</p>', '27-07-2019_1246508521_png', 'Mỹ', 21990000.00, 21990000.00, 1, 2, NULL, NULL, NULL, NULL, NULL, 2, 17, '2019-07-27 08:36:28', '2019-07-29 06:13:02'),
(36, 'Máy tính bảng Samsung Galaxy Tab A 10.1 T515 (2019)', 'may-tinh-bang-samsung-galaxy-tab-a-101-t515-2019', 'Máy tính bảng Samsung Galaxy Tab A 10.1 T515 (2019)', '<p>H&agrave;ng ch&iacute;nh h&atilde;ng nguy&ecirc;n seal mới 100%</p>\r\n\r\n<p>M&agrave;n h&igrave;nh hiển thị rộng 10.1 inches</p>\r\n\r\n<p>Thiết kế kim loại nguy&ecirc;n khối sang trọng</p>\r\n\r\n<p>Độ ph&acirc;n giải WUXGA sống động vượt trội</p>\r\n\r\n<p>Dung lượng pin 6,150mAh cực khủng</p>\r\n\r\n<p>C&ocirc;ng nghệ GSM / HSPA / LTE</p>\r\n\r\n<p>K&iacute;ch thước 245 x 149 x 7.5 mm</p>\r\n\r\n<p>Trọng lượng 460 g</p>\r\n\r\n<p>SIM Nano-SIM</p>\r\n\r\n<p>K&iacute;ch thước: 10.1 inches, 295.8 cm2 (~81.0%diện t&iacute;ch mặt trước)</p>\r\n\r\n<p>Độ ph&acirc;n giải: 1200 x 1920 pixels, 16:10 ratio (~224 ppi)</p>\r\n\r\n<p>Chipset: Exynos 7904 Octa (14 nm)</p>\r\n\r\n<p>Bộ xử l&yacute; (CPU): Octa-core (2x1.8 GHz Kryo 260 Gold &amp; 6x1.6 GHz Kryo 260 Silver)</p>\r\n\r\n<p>Bộ nhớ trong: 32 GB, 2 GB RAM</p>\r\n\r\n<p>Khe cắm thẻ nhớ: microSD, l&ecirc;n đến 512 GB</p>\r\n\r\n<p>Jack audio 3.5mm</p>\r\n\r\n<p>Ng&ocirc;n ngữ: Tiếng Việt, Tiếng Anh v&agrave; nhiều ng&ocirc;n ngữ kh&aacute;c</p>', '27-07-2019_573471769_png', 'Việt Nam', 7490000.00, 7490000.00, 1, NULL, NULL, NULL, NULL, NULL, NULL, 2, 16, '2019-07-27 08:38:50', '2019-07-27 08:39:18'),
(37, 'Máy tính bảng Huawei MediaPad T3 7.0 (2019)', 'may-tinh-bang-huawei-mediapad-t3-70-2019', 'Máy tính bảng Huawei MediaPad T3 7.0 (2019)', '<p>Ch&iacute;nh h&atilde;ng, Nguy&ecirc;n seal, Mới 100%</p>\r\n\r\n<p>Miễn ph&iacute; giao h&agrave;ng to&agrave;n quốc</p>\r\n\r\n<p>M&agrave;n h&igrave;nh 7 inch</p>\r\n\r\n<p>Camera Trước/Sau: 2MP/2MP</p>\r\n\r\n<p>CPU: Spreadtrum SC7731G 4 nh&acirc;n</p>\r\n\r\n<p>Bộ Nhớ: 8GB</p>\r\n\r\n<p>RAM: 1GB</p>', '27-07-2019_2087090612_png', 'Trung Quốc', 2590000.00, 2590000.00, 1, NULL, NULL, NULL, NULL, NULL, NULL, 2, 18, '2019-07-27 08:42:45', '2019-07-27 08:43:08'),
(38, 'Laptop Lenovo Ideapad 130 14IKB i3 7020U/4GB/1TB (81H60016VN)', 'laptop-lenovo-ideapad-130-14ikb-i3-7020u4gb1tb-81h60016vn', 'Laptop Lenovo Ideapad 130 14IKB i3 7020U/4GB/1TB (81H60016VN)', '<p>Chip: Intel Core i3-7020U Processor (2.30GHz, 3MB Cache)</p>\r\n\r\n<p>RAM: 4GB DDR4 2400MHz</p>\r\n\r\n<p>Ổ cứng: 500GB HDD 5400rpm</p>\r\n\r\n<p>Chipset đồ họa: Intel HD Graphics 620</p>\r\n\r\n<p>M&agrave;n h&igrave;nh: 14 inch HD (1366 x 768) Anti Glare</p>\r\n\r\n<p>Hệ điều h&agrave;nh: Free DOS</p>\r\n\r\n<p>Pin: 2 Cell 30Wh, Pin liền</p>', '27-07-2019_51948927_jpg', 'Trung Quốc', 8999000.00, 8999000.00, 1, 1, NULL, NULL, NULL, NULL, NULL, 3, 19, '2019-07-27 08:45:50', '2019-07-29 06:14:07'),
(39, 'Laptop Lenovo Ideapad 330S 14IKBR i5 8250U/4GB/1TB/Win10 (81F400NLVN)', 'laptop-lenovo-ideapad-330s-14ikbr-i5-8250u4gb1tbwin10-81f400nlvn', 'Laptop Lenovo Ideapad 330S 14IKBR i5 8250U/4GB/1TB/Win10 (81F400NLVN)', '<p>Bộ vi xử l&yacute; : Intel Core I5-8250U</p>\r\n\r\n<p>Tốc độ : 1.60GHz Upto 3.40GHz, 4Cores, 8Threads</p>\r\n\r\n<p>Bộ nhớ đệm 6MB Cache L3</p>', '27-07-2019_1948460797_jpg', 'Trung Quốc', 12990000.00, 12990000.00, 1, 1, NULL, NULL, NULL, NULL, NULL, 3, 19, '2019-07-27 08:50:40', '2019-07-29 06:14:09'),
(40, 'Laptop Lenovo Ideapad S340 14IWL i5 8265U/8GB/1TB/ MX230/Win10 (81N7006HVN)', 'laptop-lenovo-ideapad-s340-14iwl-i5-8265u8gb1tb-mx230win10-81n7006hvn', 'Laptop Lenovo Ideapad S340 14IWL i5 8265U/8GB/1TB/ MX230/Win10 (81N7006HVN)', '<p>CPU: Intel Core i5-8265U 1.6GHz up to 3.9GHz 6MB</p>\r\n\r\n<p>RAM: 4GB DDR4 2400MHz (1x SO-DIMM socket, up to 12GB SDRAM)</p>\r\n\r\n<p>&Ocirc;̉ cứng: HDD 1TB 5400rpm, x1 slot SSD M.2 SATA</p>\r\n\r\n<p>Card đồ họa: Intel UHD Graphics 620</p>\r\n\r\n<p>M&agrave;n h&igrave;nh: 15.6&quot; FHD (1920 x 1080)</p>\r\n\r\n<p>Hệ điều h&agrave;nh: Windows 10 Home</p>\r\n\r\n<p>Pin: 2 Cells 30WHrs</p>', '27-07-2019_872725508_jpg', 'Trung Quốc', 22990000.00, 22990000.00, 1, NULL, NULL, NULL, NULL, NULL, NULL, 3, 19, '2019-07-27 08:57:06', '2019-07-27 08:57:25'),
(41, 'Laptop Acer Aspire E5 476 i3 8130U/4GB/500GB/Win10 (NX.GWTSV.002)', 'laptop-acer-aspire-e5-476-i3-8130u4gb500gbwin10-nxgwtsv002', 'Laptop Acer Aspire E5 476 i3 8130U/4GB/500GB/Win10 (NX.GWTSV.002)', '<p>Chip: Intel Core I3-8130U 2.2 upto 3.4 GHz</p>\r\n\r\n<p>RAM: DDR4 4GB-2133Ghz</p>\r\n\r\n<p>Ổ cứng: HDD 500GB - 5400rpm. Hỗ trợ khe cắm SSD M.2 PCIe</p>\r\n\r\n<p>Chipset đồ họa: Intel UHD Graphics 620</p>\r\n\r\n<p>M&agrave;n h&igrave;nh: 14 Inches HD (1366 x 768)</p>\r\n\r\n<p>Hệ điều h&agrave;nh: Windows 10 Home SL</p>\r\n\r\n<p>Pin: Li-Ion 4 cell</p>', '27-07-2019_2073071769_jpg', 'Mỹ', 9490000.00, 9490000.00, 1, NULL, NULL, NULL, NULL, NULL, NULL, 3, 21, '2019-07-27 09:02:48', '2019-07-27 09:03:27'),
(42, 'Laptop Dell Inspiron 3576 i5 8250U/4GB/1TB/Win10/(P63F002N76F)', 'laptop-dell-inspiron-3576-i5-8250u4gb1tbwin10p63f002n76f', 'Laptop Dell Inspiron 3576 i5 8250U/4GB/1TB/Win10/(P63F002N76F)', '<p>CPU:Intel Core i5 Kabylake Refresh, 8250U, 1.60 GHz</p>\r\n\r\n<p>RAM:4 GB, DDR4 (2 khe), 2400 MHz</p>\r\n\r\n<p>Ổ cứng:HDD: 1 TB + SSD: 128GB, Hỗ trợ khe cắm SSD M.2 SATA3</p>\r\n\r\n<p>M&agrave;n h&igrave;nh:15.6 inch, Full HD (1920 x 1080)</p>\r\n\r\n<p>Card m&agrave;n h&igrave;nh:Card đồ họa rời, NVIDIA GeForce 940MX, 4 GB</p>\r\n\r\n<p>Cổng kết nối:3 x USB 3.0, HDMI, LAN (RJ45), USB Type-C</p>\r\n\r\n<p>Đặc biệt:C&oacute; đ&egrave;n b&agrave;n ph&iacute;m</p>\r\n\r\n<p>Hệ điều h&agrave;nh:Windows 10 + Office 365 1 năm</p>\r\n\r\n<p>Thiết kế:Vỏ kim loại, PIN liền</p>\r\n\r\n<p>K&iacute;ch thước:D&agrave;y 18.8 mm, 2 kg</p>', '27-07-2019_1734544583_jpg', 'Mỹ', 14390000.00, 14390000.00, 1, NULL, NULL, NULL, NULL, NULL, NULL, 3, 20, '2019-07-27 09:04:36', '2019-07-27 09:05:38'),
(43, 'Laptop Dell Vostro 3578 i5 8250U/4GB/1TB/2GB 520/Win10/(P63F002V78B)', 'laptop-dell-vostro-3578-i5-8250u4gb1tb2gb-520win10p63f002v78b', 'Laptop Dell Vostro 3578 i5 8250U/4GB/1TB/2GB 520/Win10/(P63F002V78B)', '<p>Bộ vi xử l&yacute;: Intel Core i5-8250U</p>\r\n\r\n<p>Tốc độ: 1.6GHz Upto 3.4Ghz, 4 Cores 8 Threads</p>\r\n\r\n<p>Bộ nhớ đệm: 6MB Cache L3</p>', '27-07-2019_1240755353_jpg', 'Mỹ', 16490000.00, 16490000.00, 1, NULL, NULL, NULL, NULL, NULL, NULL, 3, 20, '2019-07-27 09:07:33', '2019-07-27 09:07:49'),
(44, 'Laptop Dell Inspiron 5584 i5 8265U/4GB/1TB/ MX130/Win10 (N5I5384W)', 'laptop-dell-inspiron-5584-i5-8265u4gb1tb-mx130win10-n5i5384w', 'Laptop Dell Inspiron 5584 i5 8265U/4GB/1TB/ MX130/Win10 (N5I5384W)', '<p>Chip: Intel Core i5-8265U (1.6 GHz - 3.9 GHz / 6MB / 4 nh&acirc;n, 8 lu&ocirc;̀ng)</p>\r\n\r\n<p>RAM: 1 x 8GB DDR4 2666MHz (2 Khe cắm / Hỗ trợ tối đa 16GB)</p>\r\n\r\n<p>Ổ cứng: 2TB HDD 5400RPM</p>\r\n\r\n<p>Chipset đồ họa: Intel UHD Graphics 620 / NVIDIA GeForce MX130 2GB GDDR5</p>\r\n\r\n<p>M&agrave;n h&igrave;nh: 15.6&quot; (1920 x 1080) kh&ocirc;ng cảm ứng</p>\r\n\r\n<p>Hệ điều h&agrave;nh: Windows 10 Home SL 64-bit</p>\r\n\r\n<p>Pin: 3 cell 42 Wh, Pin liền</p>', '27-07-2019_1729358934_jpg', 'Mỹ', 18190000.00, 18190000.00, 1, NULL, NULL, NULL, NULL, NULL, NULL, 3, 20, '2019-07-27 09:09:21', '2019-07-27 09:10:30'),
(46, 'Pin sạc dự phòng 7500mAh eSaver LA A33 Đen', 'pin-sac-du-phong-7500mah-esaver-la-a33-den', 'Pin sạc dự phòng 7500mAh eSaver LA A33 Đen', '<ul>\r\n	<li>Thiết kế gọn g&agrave;ng, m&agrave;u sắc đẹp mắt.</li>\r\n	<li>Dễ d&agrave;ng kiểm tra lại được dung lượng pin c&ograve;n lại trong sạc.</li>\r\n	<li>Sử dụng l&otilde;i pin Li-Ion an to&agrave;n.</li>\r\n	<li>Sạc được cho mọi điện thoại v&agrave; m&aacute;y t&iacute;nh bảng.</li>\r\n	<li>Bộ sản phẩm gồm: pin sạc.</li>\r\n</ul>', '27-07-2019_668255756_jpg', 'Việt Nam', 480000.00, 280000.00, 1, NULL, NULL, NULL, NULL, NULL, NULL, 4, 22, '2019-07-27 09:16:13', '2019-07-27 09:16:50'),
(47, 'Pin sạc dự phòng 7.500 mAh eSaver LA Y323S', 'pin-sac-du-phong-7500-mah-esaver-la-y323s', 'Pin sạc dự phòng 7.500 mAh eSaver LA Y323S', '<ul>\r\n	<li>Thiết kế gọn g&agrave;ng, m&agrave;u sắc đẹp mắt.</li>\r\n	<li>Sạc 3.5 lần thiết bị pin dưới 1.500 mAh, 1.5 lần dưới 3.500 mAh.</li>\r\n	<li>Dễ d&agrave;ng kiểm tra lại được dung lượng pin c&ograve;n lại trong sạc.</li>\r\n	<li>Sử dụng l&otilde;i pin Li-Ion an to&agrave;n.</li>\r\n	<li>Sạc được cho mọi điện thoại v&agrave; m&aacute;y t&iacute;nh bảng.</li>\r\n	<li>Bộ sản phẩm gồm: pin sạc.</li>\r\n</ul>', '27-07-2019_1828487668_jpg', 'Mỹ', 260000.00, 260000.00, 1, NULL, NULL, NULL, NULL, NULL, NULL, 4, 22, '2019-07-27 09:18:38', '2019-07-27 09:18:55'),
(48, 'Pin sạc dự phòng 10.000 mAh eValu Sword X', 'pin-sac-du-phong-10000-mah-evalu-sword-x', 'Pin sạc dự phòng 10.000 mAh eValu Sword X', '<ul>\r\n	<li>Dễ d&agrave;ng kiểm tra lại được dung lượng pin c&ograve;n lại trong sạc.</li>\r\n	<li>Sử dụng l&otilde;i pin Li-Ion an to&agrave;n.</li>\r\n	<li>Sạc được cho mọi điện thoại v&agrave; m&aacute;y t&iacute;nh bảng.</li>\r\n	<li>Bộ sản phẩm gồm: pin sạc.</li>\r\n</ul>', '27-07-2019_769356167_jpg', 'Trung Quốc', 325000.00, 325000.00, 1, NULL, NULL, NULL, NULL, NULL, NULL, 4, 22, '2019-07-27 09:20:31', '2019-07-27 09:20:46'),
(49, 'Tai nghe chụp tai Kanen IP-2090', 'tai-nghe-chup-tai-kanen-ip-2090', 'Tai nghe chụp tai Kanen IP-2090', '<ul><li>C&oacute; thể gấp gọn khi muốn cho v&agrave;o trong balo.</li><li>Lớp đệm tai &ecirc;m v&agrave; d&agrave;y, gi&uacute;p đeo tai thoải m&aacute;i v&agrave; hạn chế bị r&aacute;ch.</li><li>C&oacute; thể k&eacute;o d&atilde;n tai nghe 3 cm để vừa vặn hơn khi sử dụng.</li>\n	<li>Tương th&iacute;ch với hầu hết điện thoại hiện nay.</li>\n	<li>C&oacute; n&uacute;t nhận cuộc gọi, ph&aacute;t/dừng chơi nhạc, tăng giảm &acirc;m lượng.</li>\n	<li>D&acirc;y d&agrave;i l&ecirc;n đến 150 cm thoải m&aacute;i để vừa d&ugrave;ng m&aacute;y vừa nghe nhạc.</li>\n</ul>', '27-07-2019_1737872276_jpg', 'Mỹ', 227000.00, 227000.00, 1, NULL, NULL, NULL, NULL, NULL, NULL, 4, 23, '2019-07-27 09:21:50', '2019-07-27 09:22:31');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `producttype`
--

CREATE TABLE `producttype` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `images` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `category_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `producttype`
--

INSERT INTO `producttype` (`id`, `name`, `slug`, `images`, `status`, `category_id`, `created_at`, `updated_at`) VALUES
(13, 'Sam Sung', 'sam-sung', '27-07-2019_1770913796_jpg', 1, 1, '2019-07-24 12:49:13', '2019-07-27 04:30:49'),
(14, 'iPhone', 'iphone', '27-07-2019_1263909756_jpg', 1, 1, '2019-07-27 07:12:50', '2019-07-27 07:12:50'),
(15, 'OPPO', 'oppo', '27-07-2019_937861682_jpg', 1, 1, '2019-07-27 08:01:26', '2019-07-27 08:01:26'),
(16, 'Samsung', 'samsung', '27-07-2019_1059172418_jpg', 1, 2, '2019-07-27 08:24:32', '2019-07-27 08:24:32'),
(17, 'iPad', 'ipad', '27-07-2019_244549057_jpg', 1, 2, '2019-07-27 08:25:22', '2019-07-27 08:27:56'),
(18, 'Huawei', 'huawei', '27-07-2019_391829818_jpg', 1, 2, '2019-07-27 08:26:33', '2019-07-27 08:26:33'),
(19, 'Lenovo', 'lenovo', '27-07-2019_1907768408_jpg', 1, 3, '2019-07-27 08:44:11', '2019-07-27 08:44:11'),
(20, 'Dell', 'dell', '27-07-2019_350051913_jpg', 1, 3, '2019-07-27 08:59:36', '2019-07-27 08:59:36'),
(21, 'Acer', 'acer', '27-07-2019_1525822211_jpg', 1, 3, '2019-07-27 09:01:09', '2019-07-27 09:01:09'),
(22, 'Pin sạc dự phòng', 'pin-sac-du-phong', '27-07-2019_991987102_jpg', 1, 4, '2019-07-27 09:14:42', '2019-07-27 09:14:42'),
(23, 'Tai nghe', 'tai-nghe', '27-07-2019_845740642_jpg', 1, 4, '2019-07-27 09:15:23', '2019-07-27 09:15:23');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `slide`
--

CREATE TABLE `slide` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `images` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` float(10,2) DEFAULT NULL,
  `link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `slide`
--

INSERT INTO `slide` (`id`, `name`, `images`, `title`, `description`, `price`, `link`, `created_at`, `updated_at`) VALUES
(6, 'Huawei Mate X ', '28-07-2019_1217196577_jpg', 'Huawei Mate X', 'Trong số các mẫu điện thoại gập hiện tại sắp ra mắt, Huawei Mate X có lẽ là sản phẩm hấp dẫn và thú vị nhất.', 500000.00, NULL, '2019-07-28 04:44:35', '2019-07-28 04:44:35'),
(7, 'MSI GF63 phiên bản 2019', '28-07-2019_1918805164_jpg', 'MSI GF63 phiên bản 2019', 'MSI GF63 2019: Chiến game “tẹt ga” với Intel Core thế hệ 9 và GTX 1650 Max-Q!', 50000000.00, NULL, '2019-07-28 04:48:51', '2019-07-28 04:48:51'),
(8, 'Vsmart Joy 1+', '28-07-2019_180582244_jpg', 'Vsmart Joy 1+', 'Phân khúc giá rẻ hiện nay không thiếu những smartphone cấu hình tốt. Nhưng tốt về mọi mặt giống như Vsmart Joy 1+ thì thật sự “hiếm có khó tìm”.', 2000000.00, NULL, '2019-07-28 04:52:15', '2019-07-28 04:52:15'),
(9, 'iPadOSA220', '28-07-2019_186293557_jpg', 'Mới đây, thêm 2 mẫu iPad bí ẩn vừa được Apple nộp đơn đăng ký lên Ủy ban Kinh tế Á-Âu (EEC). Trước đó, cơ quan này cũng đã chứng nhận 5 iPad khác và tất cả chúng đều chạy iPadOS 13.', 'Mới đây, thêm 2 mẫu iPad bí ẩn vừa được Apple nộp đơn đăng ký lên Ủy ban Kinh tế Á-Âu (EEC). Trước đó, cơ quan này cũng đã chứng nhận 5 iPad khác và tất cả chúng đều chạy iPadOS 13.', 1500000.00, NULL, '2019-07-28 04:56:18', '2019-07-28 04:56:18');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `social_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` int(11) DEFAULT '0',
  `status` int(11) DEFAULT '0',
  `link_facebook` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `avatar`, `user_name`, `social_id`, `email`, `password`, `phone`, `address`, `role`, `status`, `link_facebook`, `remember_token`, `created_at`, `updated_at`) VALUES
(11, 'test123', NULL, NULL, NULL, 'test@gmail.com', '$2y$10$/WpKj0QU3mAZ4IgfaZ8h4ephPhiBcxp3HGlprMiT3w0SK./ozb75a', NULL, NULL, 0, 0, NULL, NULL, '2019-07-28 12:09:22', '2019-07-28 12:09:22'),
(12, 'Quang Anh', NULL, NULL, '453468578830563', 'iameleven1308@gmail.com', '123456', NULL, NULL, 0, 0, NULL, NULL, '2019-07-28 13:13:32', '2019-07-28 13:13:32');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bills_customer_id_foreign` (`customer_id`);

--
-- Chỉ mục cho bảng `bill_detail`
--
ALTER TABLE `bill_detail`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `forms`
--
ALTER TABLE `forms`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `guarantee`
--
ALTER TABLE `guarantee`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `producttype`
--
ALTER TABLE `producttype`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `slide`
--
ALTER TABLE `slide`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bills`
--
ALTER TABLE `bills`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
--
-- AUTO_INCREMENT cho bảng `bill_detail`
--
ALTER TABLE `bill_detail`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT cho bảng `color`
--
ALTER TABLE `color`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT cho bảng `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;
--
-- AUTO_INCREMENT cho bảng `forms`
--
ALTER TABLE `forms`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT cho bảng `guarantee`
--
ALTER TABLE `guarantee`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `images`
--
ALTER TABLE `images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=229;
--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
--
-- AUTO_INCREMENT cho bảng `producttype`
--
ALTER TABLE `producttype`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT cho bảng `slide`
--
ALTER TABLE `slide`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `bills`
--
ALTER TABLE `bills`
  ADD CONSTRAINT `bills_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
