-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-12-2022 a las 02:40:34
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `koffe23123`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cart`
--

CREATE TABLE `cart` (
  `id_cart` bigint(20) UNSIGNED NOT NULL,
  `id_product` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cart_quantity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cart_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `cart`
--

INSERT INTO `cart` (`id_cart`, `id_product`, `cart_quantity`, `cart_price`, `id_user`, `created_at`, `updated_at`) VALUES
(18, '7', '2', '5000', '1', '2022-12-28 01:20:49', '2022-12-28 01:23:31'),
(19, '8', '1', '1000', '1', '2022-12-28 01:24:00', '2022-12-28 01:24:00'),
(20, '14', '1', '4123', '8', '2022-12-28 01:35:37', '2022-12-28 01:35:37');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categories`
--

CREATE TABLE `categories` (
  `id_category` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `categories`
--

INSERT INTO `categories` (`id_category`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Pasteles', '2022-08-29 20:39:12', NULL),
(2, 'Bebidas', '2022-08-29 20:39:15', NULL),
(3, 'Snacks', '2022-08-29 20:39:17', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(3, '2022_08_29_165317_products', 1),
(4, '2022_08_29_165710_products_sales', 1),
(5, '2022_08_29_170100_sales_detail', 1),
(6, '2022_08_29_203632_categories', 2),
(9, '2022_08_29_181049_cart', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE `products` (
  `id_product` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `plu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `weight` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stock` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`id_product`, `image`, `name`, `plu`, `price`, `weight`, `stock`, `description`, `category`, `created_at`, `updated_at`) VALUES
(2, '1234.png', 'Cafe expreso', '1234', '4500', '500ml', '32', 'Café expreso con azúcar', '2', '2022-08-29 21:50:12', '2022-08-29 21:50:12'),
(3, '1412.png', 'Chocolate', '1412', '5000', '350ml', '40', 'Chocolate en leche caliente', '2', '2022-08-29 21:50:40', '2022-08-30 04:07:18'),
(4, '4123.png', 'Crossaint', '4123', '2000', '120gm', '10', 'Crossaint caliente', '3', '2022-08-29 21:51:38', '2022-08-30 13:16:40'),
(5, '8638.png', 'Torta de naranja', '8638', '25000', '230gm', '9', 'Torta de naranja con baño en miel', '1', '2022-08-29 21:52:23', '2022-08-30 04:07:18'),
(6, '51231.png', 'Galleta', '51231', '1500', '80gm', '120', 'Galleta con chips de chocolate', '3', '2022-08-29 21:53:07', '2022-08-30 13:52:12'),
(7, '4128.png', 'Crossaint', '4128', '2500', '40gm', '120', 'Pan con chips y crema de chocolate', '3', '2022-08-29 21:55:06', '2022-08-30 04:04:11'),
(8, '8481.png', 'Churros', '8481', '1000', '20gm', '118', 'Paquete de churros x3', '3', '2022-08-29 21:57:03', '2022-08-30 15:25:15'),
(9, '4821.png', 'Cafe con leche', '4821', '3000', '350ml', '200', 'Cafe caliente con leche', '2', '2022-08-29 21:58:51', '2022-08-29 21:58:51'),
(10, '47123.png', 'Pastel de cereza', '47123', '6000', '400gm', '30', 'Pastel con cerezas', '1', '2022-08-29 21:59:39', '2022-08-29 21:59:39'),
(11, '94723.png', 'Café en leche', '94723', '3000', '600ml', '12', 'Café sencillo', '2', '2022-08-29 22:01:27', '2022-08-29 22:01:27'),
(12, '4812.png', 'Pastel 3 leches', '4812', '7000', '300gm', '12', 'Pastel de 3 leches con chips de chocolate', '1', '2022-08-29 22:25:59', '2022-08-29 22:25:59');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products_sales`
--

CREATE TABLE `products_sales` (
  `id_sale` bigint(20) UNSIGNED NOT NULL,
  `no_ticket` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `products_sales`
--

INSERT INTO `products_sales` (`id_sale`, `no_ticket`, `status`, `total_price`, `id_user`, `created_at`, `updated_at`) VALUES
(40, '1307753466', 'approved', '1190', '1', '2022-08-30 03:50:53', '2022-08-30 03:50:53'),
(41, '5652383045', 'approved', '2975', '1', '2022-08-30 04:00:21', '2022-08-30 04:00:21'),
(42, '5652389414', 'approved', '2975', '1', '2022-08-30 04:03:03', '2022-08-30 04:03:03'),
(43, '5652390844', 'approved', '17850', '1', '2022-08-30 04:04:11', '2022-08-30 04:04:11'),
(44, '5652396476', 'approved', '35700', '1', '2022-08-30 04:07:18', '2022-08-30 04:07:18'),
(45, '5654299511', 'approved', '16065', '1', '2022-08-30 13:52:12', '2022-08-30 13:52:12'),
(46, '5655331669', 'approved', '2380', '1', '2022-08-30 15:25:15', '2022-08-30 15:25:15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sales_detail`
--

CREATE TABLE `sales_detail` (
  `id_detail` bigint(20) UNSIGNED NOT NULL,
  `id_sale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `products` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unitary_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `sales_detail`
--

INSERT INTO `sales_detail` (`id_detail`, `id_sale`, `products`, `quantity`, `unitary_price`, `created_at`, `updated_at`) VALUES
(7, '40', '8', '1', '1000', '2022-08-30 03:50:53', '2022-08-30 03:50:53'),
(8, '41', '7', '1', '2500', '2022-08-30 04:00:21', '2022-08-30 04:00:21'),
(9, '42', '7', '1', '2500', '2022-08-30 04:03:03', '2022-08-30 04:03:03'),
(10, '43', '7', '6', '15000', '2022-08-30 04:04:11', '2022-08-30 04:04:11'),
(11, '44', '5', '1', '25000', '2022-08-30 04:07:18', '2022-08-30 04:07:18'),
(12, '44', '3', '1', '5000', '2022-08-30 04:07:18', '2022-08-30 04:07:18'),
(13, '45', '6', '9', '13500', '2022-08-30 13:52:12', '2022-08-30 13:52:12'),
(14, '46', '8', '2', '2000', '2022-08-30 15:25:15', '2022-08-30 15:25:15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(8, 'Sebastian Rosero Lopez', 'sebas.rosero.lopez@gmail.com', NULL, '$2y$10$8/643do3easTnbtrwVO7l.UdWWhtkQbVJfaLuavVsvpw4Go0IVNOu', NULL, '2022-12-28 01:30:45', '2022-12-28 01:30:45');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id_cart`);

--
-- Indices de la tabla `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id_category`),
  ADD UNIQUE KEY `categories_name_unique` (`name`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id_product`),
  ADD UNIQUE KEY `products_plu_unique` (`plu`);

--
-- Indices de la tabla `products_sales`
--
ALTER TABLE `products_sales`
  ADD PRIMARY KEY (`id_sale`);

--
-- Indices de la tabla `sales_detail`
--
ALTER TABLE `sales_detail`
  ADD PRIMARY KEY (`id_detail`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cart`
--
ALTER TABLE `cart`
  MODIFY `id_cart` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `categories`
--
ALTER TABLE `categories`
  MODIFY `id_category` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
  MODIFY `id_product` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `products_sales`
--
ALTER TABLE `products_sales`
  MODIFY `id_sale` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT de la tabla `sales_detail`
--
ALTER TABLE `sales_detail`
  MODIFY `id_detail` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
