-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 02, 2023 lúc 02:57 PM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `pj2`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `level` int(11) DEFAULT NULL,
  `isDeleted` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`id`, `created_at`, `updated_at`, `name`, `email`, `phone`, `password`, `address`, `level`, `isDeleted`) VALUES
(1, NULL, NULL, 'lvu', 'admin@gmail.com', '43546', '$2a$12$z4rxdozwAgkTPufCHTt7mOdBIhPfim4FCBbxPYPUPJ3.tK9Pp4UHe', '4213wqtr', 1, 1),
(2, '2023-10-09 09:21:08', '2023-10-24 04:25:55', 'minhchou3', 'nv@gmail.com', '421354756', '$2a$12$VI9zYB7yaz16OSsJUulrWOprNneJ3ePXIqKzLnJiD7k85LTZfo4p2', '1111', 2, 0),
(3, '2023-10-09 09:51:31', '2023-10-10 00:55:59', 'mchou', 'nv2@gmail.com', 'wqteyu', '$2y$10$zB75jdw5DjcR.nmd9MXS3uch/CDYn9dsDpY8lFd/bXo9jTnI574LC', '153645', 2, 1),
(4, '2023-10-09 09:52:40', '2023-10-09 09:52:45', '2451351', 'nv3@gmail.com', '12411515', '$2y$10$nsWi0ljC4Rm2LzvlWpSTWe8G5VukEIQ2JTheTYVDUNmfsDe6NR3E.', '12313', 2, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cartdetail`
--

CREATE TABLE `cartdetail` (
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `quanlity` varchar(255) DEFAULT NULL,
  `productdetail_id` bigint(20) UNSIGNED NOT NULL,
  `cart_id` bigint(20) UNSIGNED NOT NULL,
  `isDeleted` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `cartdetail`
--

INSERT INTO `cartdetail` (`created_at`, `updated_at`, `quanlity`, `productdetail_id`, `cart_id`, `isDeleted`) VALUES
('2023-10-26 02:43:48', '2023-10-26 02:43:48', '1', 6, 1, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `isDeleted` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `carts`
--

INSERT INTO `carts` (`id`, `created_at`, `updated_at`, `client_id`, `isDeleted`) VALUES
(1, '2023-10-16 03:05:22', '2023-10-16 03:05:22', 1, 1),
(2, NULL, NULL, 2, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `nameCatr` varchar(255) DEFAULT NULL,
  `isDeleted` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id`, `created_at`, `updated_at`, `nameCatr`, `isDeleted`) VALUES
(1, '2023-10-07 08:35:33', '2023-10-24 03:00:34', 'bentley home', 1),
(2, '2023-10-07 08:35:38', '2023-10-24 03:00:59', 'Carpanese', 1),
(3, '2023-10-15 21:38:52', '2023-10-24 03:01:33', 'Giorgio', 1),
(4, '2023-10-15 21:38:58', '2023-10-24 03:01:53', 'BEB Italia', 1),
(5, '2023-10-15 21:39:03', '2023-10-24 03:02:12', 'Minotti', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `client`
--

CREATE TABLE `client` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `isDeleted` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `client`
--

INSERT INTO `client` (`id`, `created_at`, `updated_at`, `name`, `email`, `address`, `phone`, `password`, `isDeleted`) VALUES
(1, '2023-10-10 00:39:19', '2023-10-10 00:39:19', 'vu', 'vu@gmail.com', '232463578', '80897653424', '$2y$10$AToyz/r4BTAs3yn9mZT9quW4GjM2yGAGSuj8UtsNwG.gJJeRdlBz2', 1),
(2, '2023-10-10 00:49:43', '2023-10-10 01:10:51', 'minhchou1', 'chou@gmail.com', '355 bắc hồng1', '09145435353', '$2y$10$8bnqQkIvRMVniuhMFzqE9ODwGn7JOOU8RXomGhSYZa58Hg97ts5NW', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_09_19_090557_create_admin_table', 1),
(6, '2023_09_23_010921_create_phanquyen_table', 1),
(7, '2023_09_23_011351_create_category_table', 1),
(8, '2023_09_23_011555_create_product_table', 1),
(9, '2023_09_23_011610_create_productdetail_table', 1),
(10, '2023_09_23_012300_create_client_table', 1),
(11, '2023_09_23_012459_create_wishlist_table', 1),
(12, '2023_09_23_015120_create_wishlistdetail_table', 1),
(13, '2023_09_23_040804_create_checkout_table', 1),
(14, '2023_09_23_040841_create_shipping_table', 1),
(15, '2023_09_23_040930_create_orders_table', 1),
(16, '2023_09_25_015000_create_orderdetail_table', 1),
(17, '2023_09_25_015514_create_carts_table', 1),
(18, '2023_09_26_172157_create_cartdetail_table', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orderdetail`
--

CREATE TABLE `orderdetail` (
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `cost` varchar(255) DEFAULT NULL,
  `quanlity` varchar(255) DEFAULT NULL,
  `isDeleted` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orderdetail`
--

INSERT INTO `orderdetail` (`created_at`, `updated_at`, `product_id`, `order_id`, `cost`, `quanlity`, `isDeleted`) VALUES
('2023-10-24 07:31:53', '2023-10-24 07:31:53', 4, 12, '12124141', '1', 1),
('2023-10-24 07:45:58', '2023-10-24 07:45:58', 4, 13, '12124141', '1', 1),
('2023-10-25 06:22:43', '2023-10-25 06:22:43', 4, 14, '12124141', '1', 1),
('2023-10-25 06:29:34', '2023-10-25 06:29:34', 4, 15, '12124141', '1', 1),
('2023-10-25 06:29:43', '2023-10-25 06:29:43', 4, 16, '12124141', '1', 1),
('2023-10-24 04:31:58', '2023-10-24 04:31:58', 6, 11, '25000000', '2', 1),
('2023-10-24 07:31:53', '2023-10-24 07:31:53', 6, 12, '25000000', '1', 1),
('2023-10-24 07:45:58', '2023-10-24 07:45:58', 6, 13, '25000000', '2', 1),
('2023-10-25 06:22:43', '2023-10-25 06:22:43', 6, 14, '25000000', '1', 1),
('2023-10-25 06:29:34', '2023-10-25 06:29:34', 6, 15, '25000000', '2', 1),
('2023-10-25 06:39:11', '2023-10-25 06:39:11', 6, 20, '25000000', '1', 1),
('2023-10-25 06:40:03', '2023-10-25 06:40:03', 6, 21, '25000000', '1', 1),
('2023-10-26 02:44:18', '2023-10-26 02:44:18', 6, 24, '25000000', '1', 1),
('2023-10-24 04:31:58', '2023-10-24 04:31:58', 7, 11, '660000', '4', 1),
('2023-10-25 07:43:45', '2023-10-25 07:43:45', 8, 22, '7500000', '2', 1),
('2023-10-26 02:44:18', '2023-10-26 02:44:18', 8, 24, '7500000', '2', 1),
('2023-10-24 07:31:53', '2023-10-24 07:31:53', 9, 12, '7000000', '3', 1),
('2023-10-24 07:45:58', '2023-10-24 07:45:58', 9, 13, '7000000', '3', 1),
('2023-10-25 07:45:28', '2023-10-25 07:45:28', 11, 23, '12000000', '1', 1),
('2023-10-25 06:22:43', '2023-10-25 06:22:43', 13, 14, '75000000', '1', 1),
('2023-10-24 07:31:53', '2023-10-24 07:31:53', 16, 12, '20000000', '1', 1),
('2023-10-25 06:39:11', '2023-10-25 06:39:11', 16, 20, '20000000', '3', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `detail` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `sum` varchar(255) DEFAULT NULL,
  `dateorder` date DEFAULT NULL,
  `receiver_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `shipping_id` bigint(20) UNSIGNED NOT NULL,
  `isDeleted` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `created_at`, `updated_at`, `detail`, `status`, `sum`, `dateorder`, `receiver_id`, `client_id`, `shipping_id`, `isDeleted`) VALUES
(10, '2023-10-23 01:43:24', '2023-10-23 01:43:24', '1', '1', '49020836', '2023-10-23', 17, 1, 2, 0),
(11, '2023-10-24 04:31:58', '2023-10-24 07:27:01', '1', '2', '52670000', '2023-10-24', 18, 1, 2, 1),
(12, '2023-10-24 07:31:53', '2023-10-24 07:31:53', '1', '1', '66030000', '2023-10-24', 19, 1, 2, 1),
(13, '2023-10-24 07:45:58', '2023-10-24 07:45:58', '2', '1', '71030000', '2023-10-24', 20, 1, 1, 1),
(14, '2023-10-25 06:22:43', '2023-10-25 06:22:43', '2', '1', '100030000', '2023-10-25', 21, 1, 1, 1),
(15, '2023-10-25 06:29:34', '2023-10-25 06:29:34', '2', '1', '50030000', '2023-10-25', 22, 1, 1, 1),
(16, '2023-10-25 06:29:43', '2023-10-25 06:29:43', '2', '1', '50030000', '2023-10-25', 23, 1, 1, 1),
(17, '2023-10-25 06:29:53', '2023-10-25 06:29:53', '2', '1', '50030000', '2023-10-25', 24, 1, 1, 1),
(20, '2023-10-25 06:39:11', '2023-10-25 06:39:11', '2', '1', '85030000', '2023-10-25', 27, 1, 1, 1),
(21, '2023-10-25 06:40:03', '2023-10-26 02:20:55', '2', '0', '85030000', '2023-10-25', 28, 1, 1, 1),
(22, '2023-10-25 07:43:45', '2023-10-25 07:44:45', '1', '3', '30000', '2023-10-25', 29, 2, 2, 1),
(23, '2023-10-25 07:45:28', '2023-10-25 07:45:53', '1', '3', '30000', '2023-10-25', 30, 2, 2, 1),
(24, '2023-10-26 02:44:18', '2023-10-26 02:45:37', '2', '2', '40030000', '2023-10-26', 31, 1, 1, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phanquyen`
--

CREATE TABLE `phanquyen` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `ql_user` varchar(255) DEFAULT NULL,
  `ql_product` varchar(255) DEFAULT NULL,
  `ql_category` varchar(255) DEFAULT NULL,
  `ql_order` varchar(255) DEFAULT NULL,
  `admin_id` bigint(20) UNSIGNED NOT NULL,
  `isDeleted` int(11) NOT NULL DEFAULT 1,
  `ql_client` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `phanquyen`
--

INSERT INTO `phanquyen` (`id`, `created_at`, `updated_at`, `ql_user`, `ql_product`, `ql_category`, `ql_order`, `admin_id`, `isDeleted`, `ql_client`) VALUES
(1, NULL, NULL, '1', '1', '1', '1', 1, 1, 1),
(2, NULL, '2023-10-10 09:57:19', '0', '0', '0', '0', 2, 1, 0),
(3, '2023-10-10 10:00:18', '2023-10-25 06:52:38', '0', '1', '1', '0', 3, 1, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name_sp` varchar(255) DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `isDeleted` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `created_at`, `updated_at`, `name_sp`, `category_id`, `isDeleted`) VALUES
(1, '2023-10-07 08:46:42', '2023-10-24 03:07:24', 'Chest of Drawers', 2, 1),
(2, '2023-10-07 08:46:53', '2023-10-24 03:10:02', 'Squared Table', 2, 1),
(3, '2023-10-24 03:03:12', '2023-10-24 03:06:05', 'Nemus 11 Tealights', 1, 1),
(4, '2023-10-24 03:04:25', '2023-10-24 03:04:25', 'Leather Tray', 1, 1),
(5, '2023-10-24 03:05:31', '2023-10-24 03:05:31', 'Lambswool Throw', 1, 1),
(6, '2023-10-24 03:06:56', '2023-10-24 03:06:56', 'High Cabinet', 2, 1),
(7, '2023-10-24 03:07:53', '2023-10-24 03:07:53', 'Big Wall Unit', 2, 1),
(8, '2023-10-24 03:11:19', '2023-10-24 03:11:19', 'Moonlight rectangular table', 3, 1),
(9, '2023-10-24 03:11:38', '2023-10-24 03:11:38', 'Moonlight buffet', 3, 1),
(10, '2023-10-24 03:11:57', '2023-10-24 03:11:57', 'Moonlight sofa', 3, 1),
(11, '2023-10-24 03:12:32', '2023-10-24 03:12:32', 'Ray', 4, 1),
(12, '2023-10-24 03:13:11', '2023-10-24 03:13:11', 'Crinoline', 4, 1),
(13, '2023-10-24 03:13:48', '2023-10-24 03:13:48', 'Borea', 4, 1),
(14, '2023-10-24 03:15:43', '2023-10-24 03:15:43', 'Solid \"Saddle-Hide\"', 5, 1),
(15, '2023-10-24 03:16:36', '2023-10-24 03:16:36', 'Brasilia Bed', 5, 1),
(16, '2023-10-24 03:18:03', '2023-10-24 03:24:41', 'Sunray', 5, 1),
(17, '2023-10-25 06:53:13', '2023-10-25 06:53:13', 'ban an', 3, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `productdetail`
--

CREATE TABLE `productdetail` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `cost` varchar(255) DEFAULT NULL,
  `isDeleted` int(11) NOT NULL DEFAULT 1,
  `warranty` varchar(255) NOT NULL,
  `discount` varchar(255) NOT NULL,
  `new` varchar(255) NOT NULL,
  `ha_sp` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `featured` varchar(255) NOT NULL,
  `details` varchar(255) NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quanlity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `productdetail`
--

INSERT INTO `productdetail` (`id`, `created_at`, `updated_at`, `cost`, `isDeleted`, `warranty`, `discount`, `new`, `ha_sp`, `status`, `featured`, `details`, `product_id`, `quanlity`) VALUES
(1, '2023-10-07 10:02:59', '2023-10-24 03:25:18', '123568', 0, '12 tháng', '0', 'mới nguyên', '1698098538.png', '1', '1', 'retreryu', 1, 5),
(2, '2023-10-07 10:05:29', '2023-10-07 10:53:05', '1234', 0, '12 tháng', '0', 'mới nguyên', '1696698330.png', '1', '1', '1234214ewrtewqr', 1, 0),
(3, '2023-10-07 10:06:37', '2023-10-07 10:06:37', '15235346', 0, '12 tháng', '300', 'mới nguyên', '1696698397.png', '0', '1', '1241434', 1, 10),
(4, '2023-10-07 10:54:16', '2023-10-24 03:25:23', '12124141', 0, '1 tháng', '0', 'mới nguyên', '1698098657.png', '1', '1', 'cai nay rat tuyet', 1, 4),
(5, '2023-10-13 00:48:11', '2023-10-24 03:24:59', '20000', 0, '12 tháng', '17000', 'mới nguyên', '1698098676.png', '2', '1', 'efreytut', 1, 7),
(6, '2023-10-17 10:53:00', '2023-10-26 02:20:55', '25000000', 1, '12 tháng', '0', 'mới nguyên', '1697565180.png', '1', '1', 'Modern and luxury make your house for chilling and basical', 2, 14),
(7, '2023-10-24 03:20:55', '2023-10-24 04:32:43', '660000', 1, '12 tháng', '0', 'mới nguyên', '1698142855.png', '2', '1', 'The Nemus 11 home fragrance draws on deliciously warm, woody notes. The fragrance captivates with top notes of citrus and bergamot infused with eucalyptus, leading to a dry, distinctively woody heart which features cedarwood and vetiver.', 3, 24),
(8, '2023-10-24 03:22:13', '2023-10-24 03:22:13', '7500000', 1, '12 tháng', '0', 'mới nguyên', '1698142933.png', '1', '1', 'An elegant addition to any home, the leather tray is an example of fine Italian craftsmanship. Designed with Bentley’s iconic diamond quilt pattern and finished with a subtle embossed Bentley emblem.', 4, 10),
(9, '2023-10-24 03:23:26', '2023-10-24 03:23:26', '7000000', 1, '12 tháng', '0', 'mới nguyên', '1698143006.png', '1', '1', 'Made in England, this soft lambswool throw features a jacquard woven Bentley emblem bordered by a distinctive Bentley matrix grille pattern. Fringed on two sides, the throw is adorned with an antique silver coloured metal plaque on one corner.', 5, 5),
(10, '2023-10-24 03:28:20', '2023-10-24 03:28:20', '50000000', 1, '12 moths', '0', 'new', '1698143300.png', '1', '1', 'Basic with design, luxury and made by greatest wood and gold', 1, 1),
(11, '2023-10-24 03:32:12', '2023-10-24 03:32:17', '12000000', 1, '2 years', '0', 'new', '1698143532.png', '1', '1', 'Made by costest stone and red wood', 6, 1),
(12, '2023-10-24 03:34:01', '2023-10-24 03:34:01', '17000000', 1, '2 years', '0', 'new', '1698143641.png', '1', '1', 'Limeted editon luxyry big wall unit', 7, 1),
(13, '2023-10-24 03:35:17', '2023-10-24 03:35:17', '75000000', 1, '12 moths', '0', 'new', '1698143717.png', '1', '1', 'Top in inlaid Tasmanian curly Eucaliptus veneer with high gloss polyester finish. Fixed wooden inlay beveled top, base in combination of satin grey nickel stainless steel and Tasmanian curly Eucaliptus veneer with high gloss polyester finish', 8, 10),
(14, '2023-10-24 03:36:50', '2023-10-24 03:36:50', '60000000', 1, '2 moths', '0', 'new', '1698143810.png', '2', '1', 'Buffet with 4 doors in inlaid Tasmanian curly Eucaliptus veneer with high gloss polye-ster finish. Top, sides and legs with insert in satin grey nickel stainless steel.', 9, 12),
(15, '2023-10-24 03:37:56', '2023-10-24 03:37:56', '300000000', 1, '2 years', '0', 'new', '1698143876.png', '1', '1', 'Available in first grade leather, nubuk leather, lizard printed leather, velvet or suede fabric. Base and bands in satin grey nickel stainless', 10, 3),
(16, '2023-10-24 03:40:23', '2023-10-24 03:40:23', '20000000', 1, '12 moths', '0', 'new', '1698144023.png', '1', '1', 'Aesthetical and functional, Ray is a modular system that starts with linear elements, chaise longues and terminal elements', 11, 1),
(17, '2023-10-24 03:41:29', '2023-10-24 03:41:29', '20000000', 1, '2 moths', '0', 'new', '1698144089.png', '2', '1', 'With its enveloping, feminine lines, Crinoline is a series of outdoor seats whose very name echoes romantic nineteenth-century ladies’ skirts.', 12, 15),
(18, '2023-10-24 03:42:24', '2023-10-24 03:42:24', '95000000', 1, '12 moths', '0', 'new', '1698144144.png', '1', '1', 'Borea is an outdoor dining table characterised by the particular steel frame that supports the large lava stone top.', 13, 2),
(19, '2023-10-24 03:43:58', '2023-10-24 03:43:58', '89999999', 1, '2 years', '0', 'new', '1698144238.png', '1', '1', 'Solid Saddle-Hide presents itself as a minimalist, versatile, eclectic interior decoration accessory, made entirely from hide leather and refined with the same techniques used in leather luggage crafting.', 14, 1),
(20, '2023-10-24 03:45:07', '2023-10-24 03:45:07', '120000000', 1, '12 moths', '0', 'new', '1698144307.png', '1', '1', 'Its enveloping Dark Brown stained palisander Santos or in open-pore oak with a Honey stained veneer structure is characterised by its staved headboard and ends in two bedside tables/occasional tables, one at each side.', 15, 7),
(21, '2023-10-24 03:46:29', '2023-10-24 03:46:29', '30000000', 1, '12 moths', '0', 'new', '1698144389.png', '1', '1', 'Sunray is designed both to play a leading role in outdoor settings and to complement the other furnishing pieces in the collection.', 16, 7),
(22, '2023-10-25 06:54:48', '2023-10-25 10:10:09', '2145435', 0, '12 moths', '0', 'new', '1698242088.png', '1', '1', '2436', 17, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `receiver`
--

CREATE TABLE `receiver` (
  `id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `sex` varchar(255) NOT NULL,
  `isDeleted` int(11) NOT NULL DEFAULT 1,
  `client_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `receiver`
--

INSERT INTO `receiver` (`id`, `created_at`, `updated_at`, `name`, `phone`, `address`, `sex`, `isDeleted`, `client_id`) VALUES
(8, '2023-10-22 11:01:01', '2023-10-22 11:01:01', 'vu', '80897653424', '232463578', '1', 1, 1),
(9, '2023-10-22 11:51:20', '2023-10-22 11:51:20', 'vu', '80897653424', '232463578', '1', 1, 1),
(10, '2023-10-22 11:51:33', '2023-10-22 11:51:33', 'vu', '80897653424', '232463578', '1', 1, 1),
(11, '2023-10-22 11:57:05', '2023-10-22 11:57:05', 'vu', '80897653424', '232463578', '1', 1, 1),
(12, '2023-10-22 11:58:06', '2023-10-22 11:58:06', 'vu', '80897653424', '232463578', '1', 1, 1),
(13, '2023-10-22 11:58:12', '2023-10-22 11:58:12', 'vu', '80897653424', '232463578', '1', 1, 1),
(14, '2023-10-22 11:58:20', '2023-10-22 11:58:20', 'vu', '80897653424', '232463578', '1', 1, 1),
(15, '2023-10-22 11:59:56', '2023-10-22 11:59:56', 'vu6', '808976534246', '2324635786', '1', 1, 1),
(16, '2023-10-23 01:39:42', '2023-10-23 01:39:42', 'vuduong', '8089765342422', '23246357866', '1', 1, 1),
(17, '2023-10-23 01:43:24', '2023-10-23 01:43:24', 'vuduong', '8089765342422', '23246357866', '1', 1, 1),
(18, '2023-10-24 04:31:58', '2023-10-24 04:31:58', 'vu', '80897653424', '232463578', '1', 1, 1),
(19, '2023-10-24 07:31:53', '2023-10-24 07:31:53', 'vu', '80897653424', '232463578', '1', 1, 1),
(20, '2023-10-24 07:45:58', '2023-10-24 07:45:58', 'vu', '80897653424', '232463578', '1', 1, 1),
(21, '2023-10-25 06:22:43', '2023-10-25 06:22:43', 'vulong', '09876543', 'số 14 nam hồng', '1', 1, 1),
(22, '2023-10-25 06:29:34', '2023-10-25 06:29:34', 'vu2', '808976534242', '2324635784', '1', 1, 1),
(23, '2023-10-25 06:29:43', '2023-10-25 06:29:43', 'vu2', '808976534242', '2324635784', '1', 1, 1),
(24, '2023-10-25 06:29:53', '2023-10-25 06:29:53', 'vu2', '808976534242', '2324635784', '1', 1, 1),
(25, '2023-10-25 06:30:15', '2023-10-25 06:30:15', 'vu2', '808976534242', '2324635784', '1', 1, 1),
(26, '2023-10-25 06:30:18', '2023-10-25 06:30:18', 'vu2', '808976534242', '2324635784', '1', 1, 1),
(27, '2023-10-25 06:39:11', '2023-10-25 06:39:11', 'vuduong', '80897653424434', '23246357812', '1', 1, 1),
(28, '2023-10-25 06:40:03', '2023-10-25 06:40:03', 'vuduong', '80897653424434', '23246357812', '1', 1, 1),
(29, '2023-10-25 07:43:45', '2023-10-25 07:43:45', 'minhchou1', '09145435353', '355 bắc hồng1', '1', 1, 2),
(30, '2023-10-25 07:45:28', '2023-10-25 07:45:28', 'minhchou1', '09145435353', '355 bắc hồng1', '1', 1, 2),
(31, '2023-10-26 02:44:18', '2023-10-26 02:44:18', 'vu', '80897653424', '232463578', '1', 1, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `shipping`
--

CREATE TABLE `shipping` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `namePttt` varchar(255) DEFAULT NULL,
  `isDeleted` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `shipping`
--

INSERT INTO `shipping` (`id`, `created_at`, `updated_at`, `namePttt`, `isDeleted`) VALUES
(1, NULL, NULL, 'chuyen khoan', 1),
(2, NULL, NULL, 'thanh toan khi nhan hang', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wishlist`
--

CREATE TABLE `wishlist` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `isDeleted` int(11) NOT NULL DEFAULT 1,
  `productdetail_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `wishlist`
--

INSERT INTO `wishlist` (`id`, `created_at`, `updated_at`, `client_id`, `isDeleted`, `productdetail_id`) VALUES
(3, '2023-10-24 00:49:01', '2023-10-24 00:49:01', 1, 1, 1),
(9, '2023-10-25 07:34:38', '2023-10-25 07:34:38', 2, 1, 6);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admin_email_unique` (`email`),
  ADD UNIQUE KEY `admin_phone_unique` (`phone`);

--
-- Chỉ mục cho bảng `cartdetail`
--
ALTER TABLE `cartdetail`
  ADD PRIMARY KEY (`productdetail_id`,`cart_id`),
  ADD KEY `cartdetail_cart_id_foreign` (`cart_id`);

--
-- Chỉ mục cho bảng `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_client_id_foreign` (`client_id`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD PRIMARY KEY (`product_id`,`order_id`),
  ADD KEY `orderdetail_order_id_foreign` (`order_id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_checkout_id_foreign` (`receiver_id`),
  ADD KEY `orders_client_id_foreign` (`client_id`),
  ADD KEY `orders_shipping_id_foreign` (`shipping_id`);

--
-- Chỉ mục cho bảng `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `phanquyen`
--
ALTER TABLE `phanquyen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `phanquyen_admin_id_foreign` (`admin_id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_category_id_foreign` (`category_id`);

--
-- Chỉ mục cho bảng `productdetail`
--
ALTER TABLE `productdetail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `productdetail_product_id_foreign` (`product_id`);

--
-- Chỉ mục cho bảng `receiver`
--
ALTER TABLE `receiver`
  ADD PRIMARY KEY (`id`),
  ADD KEY `client_id` (`client_id`);

--
-- Chỉ mục cho bảng `shipping`
--
ALTER TABLE `shipping`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Chỉ mục cho bảng `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wishlist_client_id_foreign` (`client_id`),
  ADD KEY `wishlist_productdetail_id_foreign` (`productdetail_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `client`
--
ALTER TABLE `client`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `phanquyen`
--
ALTER TABLE `phanquyen`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `productdetail`
--
ALTER TABLE `productdetail`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT cho bảng `receiver`
--
ALTER TABLE `receiver`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT cho bảng `shipping`
--
ALTER TABLE `shipping`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `cartdetail`
--
ALTER TABLE `cartdetail`
  ADD CONSTRAINT `cartdetail_cart_id_foreign` FOREIGN KEY (`cart_id`) REFERENCES `carts` (`id`),
  ADD CONSTRAINT `cartdetail_product_id_foreign` FOREIGN KEY (`productdetail_id`) REFERENCES `productdetail` (`id`);

--
-- Các ràng buộc cho bảng `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `client` (`id`);

--
-- Các ràng buộc cho bảng `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD CONSTRAINT `orderdetail_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `orderdetail_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `productdetail` (`id`);

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `client` (`id`),
  ADD CONSTRAINT `orders_shipping_id_foreign` FOREIGN KEY (`shipping_id`) REFERENCES `shipping` (`id`);

--
-- Các ràng buộc cho bảng `phanquyen`
--
ALTER TABLE `phanquyen`
  ADD CONSTRAINT `phanquyen_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`id`);

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);

--
-- Các ràng buộc cho bảng `productdetail`
--
ALTER TABLE `productdetail`
  ADD CONSTRAINT `productdetail_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

--
-- Các ràng buộc cho bảng `receiver`
--
ALTER TABLE `receiver`
  ADD CONSTRAINT `client_id` FOREIGN KEY (`client_id`) REFERENCES `client` (`id`);

--
-- Các ràng buộc cho bảng `wishlist`
--
ALTER TABLE `wishlist`
  ADD CONSTRAINT `wishlist_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `client` (`id`),
  ADD CONSTRAINT `wishlist_productdetail_id_foreign` FOREIGN KEY (`productdetail_id`) REFERENCES `productdetail` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
