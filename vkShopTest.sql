-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Мар 05 2023 г., 20:51
-- Версия сервера: 5.7.33-0ubuntu0.16.04.1
-- Версия PHP: 7.0.33-0ubuntu0.16.04.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `vkShopTest`
--

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `title`, `parent_id`, `description`, `link`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Женщинам', NULL, 'Товары для женщин', 'zhenschinam', '/images/category.svg', '2023-03-04 20:41:54', '2023-03-04 20:41:54'),
(2, 'Мужчинам', NULL, 'Товары для мужчин', 'muzchinam', '/images/category.svg', '2023-03-04 20:41:54', '2023-03-04 20:41:54'),
(3, 'Платья', 1, 'Платья на все случаи', 'platia', '/images/category.svg', '2023-03-04 20:42:49', '2023-03-04 20:42:49'),
(4, 'Женская обувь', 1, 'Обувь для женщин', 'obuv-dlya-zhenschin', '/images/category.svg', '2023-03-04 20:42:49', '2023-03-04 20:42:49'),
(5, 'Мужская обувь', 2, 'Обувь для мужчин', 'obuv-dlya-muzchin', '/images/category.svg', '2023-03-04 20:44:50', '2023-03-04 20:44:50'),
(6, 'Праздничные платья', 3, 'На любой праздник', 'prazdnichnie-platia', '/images/category.svg', '2023-03-04 20:45:39', '2023-03-04 20:45:39'),
(7, 'Спортивная обувь', 5, 'Быстрее, выше, сильнее!\r\n', 'm-sportivnaya-obuv', '/images/category.svg', '2023-03-04 20:45:39', '2023-03-04 20:45:39'),
(8, 'Спортивная обувь', 4, 'Женская спортивная обувь', 'zh-sportivnaya-obuv', '/images/category.svg', '2023-03-04 20:49:25', '2023-03-04 20:49:25');

-- --------------------------------------------------------

--
-- Структура таблицы `categories_fields`
--

CREATE TABLE `categories_fields` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `field_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `cities`
--

CREATE TABLE `cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `cities`
--

INSERT INTO `cities` (`id`, `title`) VALUES
(1, 'Москва'),
(2, 'Белгород');

-- --------------------------------------------------------

--
-- Структура таблицы `city_product`
--

CREATE TABLE `city_product` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `city_id` bigint(20) UNSIGNED NOT NULL,
  `price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `city_product`
--

INSERT INTO `city_product` (`id`, `product_id`, `city_id`, `price`) VALUES
(1, 2, 1, 3000),
(2, 2, 2, 2500),
(3, 1, 1, 2700);

-- --------------------------------------------------------

--
-- Структура таблицы `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `fields`
--

CREATE TABLE `fields` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `input_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `inputs`
--

CREATE TABLE `inputs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `value` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `manufacturers`
--

CREATE TABLE `manufacturers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `manufacturers`
--

INSERT INTO `manufacturers` (`id`, `title`, `description`, `image`, `created_at`, `updated_at`) VALUES
(1, 'VK', 'Место встречи', NULL, '2023-03-04 20:50:56', '2023-03-04 20:50:56'),
(2, 'Илья Катков', 'Автор одежды, принты которых сгенерированы искусственным интеллектом', NULL, '2023-03-04 20:50:56', '2023-03-04 20:50:56');

-- --------------------------------------------------------

--
-- Структура таблицы `market`
--

CREATE TABLE `market` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_03_03_132936_create_categories_table', 1),
(6, '2023_03_03_133625_create_manufacturers_table', 1),
(7, '2023_03_03_134046_create_products_table', 1),
(8, '2023_03_03_134223_create_market_table', 1),
(9, '2023_03_03_134330_create_inputs_table', 1),
(10, '2023_03_03_134419_create_fields_table', 1),
(11, '2023_03_03_134829_create_categories_fields_table', 1),
(12, '2023_03_03_135343_create_cities_table', 1),
(13, '2023_03_03_135421_create_warehouses_table', 1),
(14, '2023_03_03_135638_create_product_warehouse_table', 1),
(15, '2023_03_03_140104_create_statuses_table', 1),
(16, '2023_03_03_140201_create_orders_table', 1),
(17, '2023_03_03_140620_create_orders_goods_table', 1),
(18, '2023_03_03_140816_create_orders_users_table', 1),
(19, '2023_03_04_203512_create_product_city_table', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL DEFAULT '1',
  `status_id` bigint(20) UNSIGNED NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `status_id`, `created_at`, `updated_at`) VALUES
(9, 1, 2, '2023-03-05 08:41:47', '2023-03-05 08:41:47'),
(10, 1, 1, '2023-03-05 08:51:43', '2023-03-05 08:51:43'),
(11, 1, 1, '2023-03-05 11:13:18', '2023-03-05 11:13:18'),
(12, 1, 1, '2023-03-05 12:59:30', '2023-03-05 12:59:30'),
(13, 2, 1, '2023-03-05 13:02:29', '2023-03-05 13:02:29'),
(14, 3, 1, '2023-03-05 13:04:51', '2023-03-05 13:04:51');

-- --------------------------------------------------------

--
-- Структура таблицы `order_product`
--

CREATE TABLE `order_product` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `order_product`
--

INSERT INTO `order_product` (`id`, `product_id`, `order_id`) VALUES
(1, 2, 9),
(2, 2, 9),
(3, 1, 10),
(4, 1, 10),
(5, 1, 10),
(6, 1, 10),
(7, 2, 11),
(8, 2, 11),
(9, 2, 11),
(10, 2, 11),
(11, 2, 11),
(12, 2, 12),
(13, 2, 12),
(14, 2, 12),
(15, 2, 12),
(16, 1, 13),
(17, 1, 13),
(18, 1, 13),
(19, 1, 13),
(20, 1, 13),
(21, 1, 13),
(22, 1, 13),
(23, 1, 13),
(24, 1, 13),
(25, 1, 13),
(26, 1, 13),
(27, 1, 13),
(28, 1, 13),
(29, 1, 13),
(30, 1, 13),
(31, 1, 13),
(32, 1, 13),
(33, 1, 13),
(34, 1, 13),
(35, 1, 13),
(36, 1, 13),
(37, 1, 13),
(38, 1, 13),
(39, 1, 13),
(40, 1, 13),
(41, 1, 14);

-- --------------------------------------------------------

--
-- Структура таблицы `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `manufacturer_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fields` json DEFAULT NULL,
  `purchased` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `category_id`, `manufacturer_id`, `title`, `description`, `image`, `link`, `fields`, `purchased`, `created_at`, `updated_at`) VALUES
(1, 8, 2, 'Кроссовки "Забег Персика"', 'Персик бежит марафон', '/images/product.svg', 'zabeg-persika', NULL, 64, '2023-03-04 20:53:24', '2023-03-04 20:53:24'),
(2, 6, 1, 'Платье "Экосистемная вишня"', 'Вишневый цвет изумительного платья', '/images/product.svg', 'platie-ekosistemnaya-vishnya', NULL, 17, '2023-03-04 20:53:24', '2023-03-04 20:53:24');

-- --------------------------------------------------------

--
-- Структура таблицы `product_warehouse`
--

CREATE TABLE `product_warehouse` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `warehouse_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `product_warehouse`
--

INSERT INTO `product_warehouse` (`id`, `product_id`, `warehouse_id`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 2, 2, 100, '2023-03-04 21:05:40', '2023-03-04 21:05:40'),
(2, 2, 3, 50, '2023-03-04 21:05:40', '2023-03-04 21:05:40'),
(3, 1, 2, 25, '2023-03-04 22:03:54', '2023-03-04 22:03:54'),
(4, 2, 1, 23, '2023-03-04 22:06:28', '2023-03-04 22:06:28');

-- --------------------------------------------------------

--
-- Структура таблицы `statuses`
--

CREATE TABLE `statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(7) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `statuses`
--

INSERT INTO `statuses` (`id`, `title`, `color`) VALUES
(1, 'В обработке', 'blue'),
(2, 'Отправлен', 'orange'),
(3, 'Выполнен', 'green');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `login` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `surname` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `patronymic` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `email`, `phone`, `name`, `surname`, `patronymic`, `password`, `address`, `is_admin`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'ilkatkov@yandex.com', '79507178673', 'Илья', 'Катков', 'Евгеньевич', '$2y$10$tYVoZOF/Pv6gkKS4NhAuKOnyBcWWWAFyELcP06U3ng.tT9XaQ15YS', 'РФ, 308514, Белгородская область, Белгородский район, п. Комсомольский, ул. Майская, д. 19А', 0, NULL, '2023-03-04 18:34:06', '2023-03-04 18:52:22'),
(2, 'VKOneLove', 'e.eryomin@vk.com', '88005553535', 'Егор', 'Еремин', 'Анатольевич', '$2y$10$47tZl4MLuNrbaEQaYUUZWuz3rv/7kexH9nnC36rKD2X6e7QNhD2Ya', 'БЦ Skylight', 0, NULL, '2023-03-05 13:01:59', '2023-03-05 13:01:59'),
(3, 'Max_Johnson', 'makss_volk@mail.ru', '89957701471', 'Максим', 'Волков', 'Сергеевич', '$2y$10$.trAS5yS1UWPYzWYRO4Qh.cPjFtYxH9IpfyNfROwvuHw6ZliK9oz6', 'улица Профсоюзная д. 152к4 подъезд 2 квартира 46', 0, NULL, '2023-03-05 13:04:25', '2023-03-05 13:04:25');

-- --------------------------------------------------------

--
-- Структура таблицы `warehouses`
--

CREATE TABLE `warehouses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `city_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `warehouses`
--

INSERT INTO `warehouses` (`id`, `city_id`, `title`, `address`) VALUES
(1, 1, 'На Курской', 'ул. Курская, д. 34к6'),
(2, 1, 'Офис VK', 'Ленинградский просп., 39, стр. 79'),
(3, 2, 'На Щорса', 'ул. Щорса, д.3');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categories_parent_id_index` (`parent_id`);

--
-- Индексы таблицы `categories_fields`
--
ALTER TABLE `categories_fields`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categories_fields_category_id_foreign` (`category_id`),
  ADD KEY `categories_fields_field_id_foreign` (`field_id`);

--
-- Индексы таблицы `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `city_product`
--
ALTER TABLE `city_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_city_product_id_foreign` (`product_id`),
  ADD KEY `product_city_city_id_foreign` (`city_id`);

--
-- Индексы таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Индексы таблицы `fields`
--
ALTER TABLE `fields`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fields_input_id_index` (`input_id`);

--
-- Индексы таблицы `inputs`
--
ALTER TABLE `inputs`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `manufacturers`
--
ALTER TABLE `manufacturers`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `market`
--
ALTER TABLE `market`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_status_id_foreign` (`status_id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Индексы таблицы `order_product`
--
ALTER TABLE `order_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_product_product_id_foreign` (`product_id`) USING BTREE,
  ADD KEY `order_product_order_id_foreign` (`order_id`) USING BTREE;

--
-- Индексы таблицы `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Индексы таблицы `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_link_unique` (`link`),
  ADD KEY `products_category_id_index` (`category_id`),
  ADD KEY `products_manufacturer_id_index` (`manufacturer_id`);

--
-- Индексы таблицы `product_warehouse`
--
ALTER TABLE `product_warehouse`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_warehouse_product_id_foreign` (`product_id`),
  ADD KEY `product_warehouse_warehouse_id_foreign` (`warehouse_id`);

--
-- Индексы таблицы `statuses`
--
ALTER TABLE `statuses`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_login_unique` (`login`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`);

--
-- Индексы таблицы `warehouses`
--
ALTER TABLE `warehouses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `warehouses_city_id_foreign` (`city_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT для таблицы `categories_fields`
--
ALTER TABLE `categories_fields`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `city_product`
--
ALTER TABLE `city_product`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `fields`
--
ALTER TABLE `fields`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `inputs`
--
ALTER TABLE `inputs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `manufacturers`
--
ALTER TABLE `manufacturers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `market`
--
ALTER TABLE `market`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT для таблицы `order_product`
--
ALTER TABLE `order_product`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT для таблицы `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `product_warehouse`
--
ALTER TABLE `product_warehouse`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `statuses`
--
ALTER TABLE `statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `warehouses`
--
ALTER TABLE `warehouses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `categories_fields`
--
ALTER TABLE `categories_fields`
  ADD CONSTRAINT `categories_fields_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `categories_fields_field_id_foreign` FOREIGN KEY (`field_id`) REFERENCES `fields` (`id`);

--
-- Ограничения внешнего ключа таблицы `city_product`
--
ALTER TABLE `city_product`
  ADD CONSTRAINT `product_city_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`),
  ADD CONSTRAINT `product_city_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Ограничения внешнего ключа таблицы `fields`
--
ALTER TABLE `fields`
  ADD CONSTRAINT `fields_input_id_foreign` FOREIGN KEY (`input_id`) REFERENCES `inputs` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_status_id_foreign` FOREIGN KEY (`status_id`) REFERENCES `statuses` (`id`),
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ограничения внешнего ключа таблицы `order_product`
--
ALTER TABLE `order_product`
  ADD CONSTRAINT `orders_products_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `orders_products_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Ограничения внешнего ключа таблицы `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_manufacturer_id_foreign` FOREIGN KEY (`manufacturer_id`) REFERENCES `manufacturers` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `product_warehouse`
--
ALTER TABLE `product_warehouse`
  ADD CONSTRAINT `product_warehouse_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `product_warehouse_warehouse_id_foreign` FOREIGN KEY (`warehouse_id`) REFERENCES `warehouses` (`id`);

--
-- Ограничения внешнего ключа таблицы `warehouses`
--
ALTER TABLE `warehouses`
  ADD CONSTRAINT `warehouses_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
