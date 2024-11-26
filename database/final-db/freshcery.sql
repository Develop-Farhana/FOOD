-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 26, 2024 at 07:20 AM
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
-- Database: `freshcery`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', '$2y$10$m0mrrbBhr71vvDB8QzEFt.a8lJTECR6b3gAR5Rsy3oVEI.XfJ642C', '2024-11-14 12:38:13', '2024-11-14 12:38:13'),
(4, 'riya', 'riya@gmail.com', '$2y$10$OIri0wJYTphmwwEsFYvun.S4oR7NX6pZMdNyqxf6IIxz/EkkKjr8W', '2024-11-15 12:27:14', '2024-11-15 12:27:14'),
(5, 'demo', 'demo@example.com', '$2y$10$RLhvHnmMz61z5m8SArc4Aet6o8cEQ98Pn6T.f/BIvEMd5KeIu.r66', '2024-11-15 12:28:41', '2024-11-15 12:28:41'),
(6, 'raju', 'jauua@gmail.com', '$2y$10$CwKK5dgyMND7z1Zz/xHeNOjxXAGZbx3/YM0GSpnAJ87gKrfKL5nau', '2024-11-15 12:31:44', '2024-11-15 12:31:44'),
(7, 'farha', 'farhana@gmail.com', '$2y$10$EvebDe5atXK/11yPb.wl0ehn4pe6Oova6UvCJnywe77/hw6BeOava', '2024-11-16 03:58:52', '2024-11-16 03:58:52');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` int(10) NOT NULL,
  `name` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL,
  `price` varchar(20) NOT NULL,
  `qty` int(10) NOT NULL,
  `pro_id` int(10) NOT NULL,
  `user_id` int(10) DEFAULT NULL,
  `subtotal` decimal(10,2) DEFAULT 0.00,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `name`, `image`, `price`, `qty`, `pro_id`, `user_id`, `subtotal`, `created_at`, `updated`) VALUES
(14, 'Tomatoes', 'vegetables.jpg', '100', 3, 6, 5, 300.00, '2024-11-09 08:43:54', '2024-11-09 08:43:54'),
(15, 'palpate', 'fish.jpg', '30', 2, 7, 3, 60.00, '2024-11-09 08:56:53', '2024-11-09 08:56:53'),
(16, 'Tomatoes', 'vegetables.jpg', '100', 2, 6, 3, 200.00, '2024-11-09 09:11:47', '2024-11-09 09:11:47');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) NOT NULL,
  `name` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL,
  `icon` varchar(200) NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  `updated_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `image`, `icon`, `created_at`, `updated_at`) VALUES
(1, 'Meats', 'meats.jpg', 'roast-leg', '2024-09-26', '2024-09-26'),
(2, 'Fishes', 'fish.jpg', 'fish-1', '2024-09-26', '2024-09-26'),
(3, 'Vegetables', 'vegetables.jpg', 'carrot', '2024-09-26', '2024-09-26'),
(4, 'Fruits', 'fruits.jpg', 'apple', '2024-09-26', '2024-09-26'),
(6, 'Frozen', 'fries.jpg', 'french-fries', '2024-11-16', '2024-11-16');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2024_10_26_092502_update_cart_table_add_default_value_to_total', 2),
(7, '2024_11_02_152427_create_sessions_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) NOT NULL,
  `name` varchar(200) NOT NULL,
  `last_name` varchar(200) NOT NULL,
  `address` text NOT NULL,
  `town` varchar(200) NOT NULL,
  `state` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone_number` varchar(33) NOT NULL,
  `price` varchar(20) NOT NULL,
  `user_id` int(10) NOT NULL,
  `order_notes` text NOT NULL,
  `status` varchar(30) NOT NULL DEFAULT 'Proccessing',
  `zip_code` int(30) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `name`, `last_name`, `address`, `town`, `state`, `email`, `phone_number`, `price`, `user_id`, `order_notes`, `status`, `zip_code`, `created_at`, `updated_at`) VALUES
(1, 'simran', 'khan', 'chowk 11 ghky', 'Mumbai', 'Mahasrhtrea', 'sim@gmail.com', '765432167', '520', 3, 'no', 'Proccessing', 12346, '2024-10-28 10:22:29', '2024-11-17 09:02:24'),
(2, 'simran', 'khan', 'chowk 11 ghky', 'Mumbai', 'Mahasrhtrea', 'sim@gmail.com', '765432167', '520', 3, 'no', 'Proccessing', 12346, '2024-10-28 10:23:04', '2024-11-17 09:00:55'),
(3, 'simran', 'khan', 'chowk 11 ghky', 'Mumbai', 'Mahasrhtrea', 'sim@gmail.com', '765432167', '520', 3, 'no', 'Proccessing', 12346, '2024-10-28 10:31:09', '2024-10-28 10:31:09'),
(4, 'Eram', 'aaa', 'aagshrhRSr', 'mmmm', 'India', 'aaa@gmail.com', '7896543456', '520', 3, 'asaF', 'Proccessing', 908765, '2024-10-29 01:37:40', '2024-10-29 01:37:40'),
(5, 'ramu', 'aaaa', 'ftdhth', 'devtcz', 'aasdre', 'aaaa@gmail.com', '1234567789', '320', 3, 'ff', 'Proccessing', 1243, '2024-10-30 02:43:25', '2024-10-30 02:43:25'),
(6, 'rimyaha', 'aa', 'dqwe', 'nbauy', 'nagaland', 'qqq@gmail.com', '1234567890', '320', 3, 'aadd', 'Proccessing', 33333, '2024-10-30 03:53:20', '2024-10-30 03:53:20'),
(7, 'demo', 'aaaa', 'asddd', 'aaadf', 'enghj', 'aaf@gmail.com', '8998765434', '50', 3, 'asdd', 'Proccessing', 5675, '2024-10-30 03:58:10', '2024-10-30 03:58:10'),
(8, 'ziya', 'eda', 'haloown prty house 008788,', 'Mumbai', 'sdyni', 'ff@gmail.com', '89765434', '50', 3, 'ffd', 'Proccessing', 3233, '2024-11-02 03:37:48', '2024-11-02 03:37:48');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) NOT NULL,
  `name` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `price` int(11) NOT NULL,
  `category_id` int(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `exp_date` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `image`, `description`, `price`, `category_id`, `created_at`, `updated_at`, `exp_date`) VALUES
(2, 'Apple', 'fruits.jpg', 'aaadF', 300, 4, '2024-09-26 17:09:28', '2024-09-26 17:09:28', '2026'),
(4, 'Chicken', 'chicken.jpg', 'i love Chiken', 180, 1, '2024-09-28 10:59:31', '2024-09-28 10:59:31', '2025'),
(6, 'Tomatoes', 'vegetables.jpg', 'i am vegooe', 100, 3, '2024-09-30 15:08:07', '2024-09-30 15:08:07', '2020'),
(7, 'palpate', 'fish.jpg', ' this is good fish', 30, 2, '2024-10-01 07:04:40', '2024-10-01 07:04:40', '2021');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` text DEFAULT NULL,
  `town` varchar(200) DEFAULT NULL,
  `state` varchar(200) DEFAULT NULL,
  `zip_code` int(30) DEFAULT NULL,
  `image` varchar(200) NOT NULL DEFAULT 'images.png',
  `phone_number` int(40) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `address`, `town`, `state`, `zip_code`, `image`, `phone_number`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Raj', 'raj@example.com', NULL, NULL, NULL, NULL, 'images.png', NULL, NULL, '$2y$10$HI2yEczTmTIlMW75qFZQjexsfep3hgJ1EDjApuizAFW03OWDqX8X.', NULL, '2024-10-16 02:57:37', '2024-10-16 02:57:37'),
(2, 'riya', 'riya@example.com', NULL, NULL, NULL, NULL, 'images.png', NULL, NULL, '$2y$10$yxyAFVVn6ub/hoLjuw78G.a9Q/XPkYiXKW6mERZsJjn1L810l/yPC', NULL, '2024-10-16 03:10:13', '2024-10-16 03:10:13'),
(3, 'amit', 'amit@example.com', '4546 SE McLoughlin Blvd 12', NULL, 'Oregon', 97202, 'images.png', 123456789, NULL, '$2y$10$LcI2zSHxrzuVMxV/ZTd9pegW3TSXRxvt2mY087rbbHyRSx1qIoccS', NULL, '2024-10-18 01:45:26', '2024-11-04 03:43:32'),
(4, 'raajuu', 'raju@example.com', NULL, NULL, NULL, NULL, 'images.png', NULL, NULL, '$2y$10$QkrX8DM59VBUAIw2a/TjOuVnTzPjOZzOsLwKolsqokXBYT45mxVOu', NULL, '2024-11-09 03:09:20', '2024-11-09 03:09:20'),
(5, 'dolly', 'dolly@example.com', NULL, NULL, NULL, NULL, 'images.png', NULL, NULL, '$2y$10$.x49WhUCOfqqNbJEw0RCZek4D.sAIVPRa9.no1UJSSB3no4iaptWe', NULL, '2024-11-09 03:13:24', '2024-11-09 03:13:24'),
(6, 'sheri', 'ss@gmail.com', NULL, NULL, NULL, NULL, 'images.png', NULL, NULL, '$2y$10$m0mrrbBhr71vvDB8QzEFt.a8lJTECR6b3gAR5Rsy3oVEI.XfJ642C', NULL, '2024-11-14 07:58:47', '2024-11-14 07:58:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
