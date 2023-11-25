-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Ноя 24 2023 г., 22:20
-- Версия сервера: 5.7.38
-- Версия PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `up1`
--

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`category_id`, `category`) VALUES
(1, 'Драма'),
(2, 'Ужастик'),
(3, 'Комедия'),
(4, 'Трельер');

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `number` int(11) DEFAULT NULL,
  `count` int(11) DEFAULT NULL,
  `status` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reason` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `name` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `country` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` int(11) NOT NULL,
  `model` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `count` int(11) NOT NULL,
  `path` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `video` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `opisanie` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `acters` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `rejiser` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `sezon` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`product_id`, `name`, `price`, `country`, `year`, `model`, `category`, `time`, `count`, `path`, `video`, `opisanie`, `acters`, `rejiser`, `sezon`, `created_at`) VALUES
(3, 'Вызов', 6, 'Россия', 2023, 'Драма', 'Драма', '1ч 31мин', 0, 'assets/img/вызов.png', 'assets/video/вызов.mp4', 'Торакальный хирург Женя за месяц должна подготовиться к космическому полету и отправиться на МКС, чтобы спасти космонавта. Удастся ли ей справиться с испытаниями? Сможет ли она преодолеть неуверенность и страхи? Получится ли у нее провести сложнейшую операцию в условиях невесомости, от которой зависят шансы космонавта вернуться на Землю живым?', 'Юлия Пересильд\nМилош Бикович\nВладимир Машков\nОлег Новицкий\nАнтон Шкаплеров\nПётр Дубров\nЕлена Валюшкина\nВарвара Володина\nАндрей Щепочкин\nАлександр Балуев', ' Клим Шипенко', '', '2022-02-16 00:58:58'),
(5, 'Dark Web', 18, 'Россия', 2021, 'Ужастик', 'Ужастик', '', 5, 'assets/img/dark.png', '', '', '', '', '', '2022-02-16 00:58:58'),
(6, 'Плакса', 16, 'Россия', 2021, 'Драма', 'Драма', '1 сезон 8 серий', 7, 'assets/img/плакса.png', 'assets/video/Плакса.mp4', 'Школьница Маша вместе с родителями вынуждена переехать из Москвы в Новоморск. После элитной гимназии на Рублевке девочке непросто мириться с порядками провинциальной школы. В новой школе она становится жертвой буллинга — изощренного психологического…', ' Ника Жукова Ваня Дмитриенко Агата Муцениеце Роман Маякин Ирина Розанова Диана Енакаева Даниил Муравьев-Изотов Алексей Онежен Алексей Демидов Софья Николаева', 'Андрей Силкин', '', '2022-02-16 00:58:58'),
(7, 'Пилигримм', 16, 'Россия', 2021, 'Ужастик', 'Ужастик', '', 6, 'assets/img/пилигрим.png', '', '', '', '', '', '2022-02-16 00:58:58'),
(8, 'Жиза', 16, 'Россия', 2021, 'Комедия', 'Комедия', '', 10, 'assets/img/жиза.png', '', '', '', '', '', '2022-02-16 00:58:58'),
(9, 'NEO', 18, 'Россия', 2021, 'Ужастик', 'Ужастик', '', 7, 'assets/img/neo.png', '', '', '', '', '', '2022-02-16 00:58:58'),
(10, 'Черная весна', 16, 'Россия', 2021, 'Драма', 'Драма', '', 10, 'assets/img/ff.png', '', '', '', '', '', '2022-02-16 00:58:58'),
(11, 'Черное облако', 18, 'Россия', 2021, 'Ужастик', 'Ужастик', '', 7, 'assets/img/чо.png', '', '', '', '', '', '2022-02-16 00:58:58'),
(12, 'Смычок', 16, 'Россия', 2021, 'Драма', 'Драма', '', 9, 'assets/img/смычок2.png', '', '', '', '', '', '2022-02-16 00:58:58');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `surname` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `patronymic` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `login` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`user_id`, `name`, `surname`, `patronymic`, `login`, `email`, `password`, `role`) VALUES
(1, 'Ад', 'мини', 'стратор', 'admin', '1@1', 'admin11', 'admin'),
(2, 'Полина', 'Павлова', 'Игоревна', 'poli', '1@1', '123456', 'client');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
