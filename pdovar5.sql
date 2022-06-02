-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Май 22 2022 г., 11:27
-- Версия сервера: 10.4.21-MariaDB
-- Версия PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `pdovar5`
--

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `ID_Category` int(10) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`ID_Category`, `name`) VALUES
(1, 'Motherboards'),
(2, 'Processors'),
(3, 'Headphones'),
(4, 'Monitors');

-- --------------------------------------------------------

--
-- Структура таблицы `items`
--

CREATE TABLE `items` (
  `ID_ITEMS` int(10) NOT NULL,
  `name` text NOT NULL,
  `price` float NOT NULL,
  `quality` text NOT NULL,
  `quantity` int(10) NOT NULL,
  `FID_VENDOR` int(10) NOT NULL,
  `FID_CATEGORY` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `items`
--

INSERT INTO `items` (`ID_ITEMS`, `name`, `price`, `quality`, `quantity`, `FID_VENDOR`, `FID_CATEGORY`) VALUES
(1, 'Asus VG248QG', 10000, 'high', 1, 1, 4),
(2, 'Asus AMD X570 ATX Gaming Motherboard', 5000, 'low', 5, 1, 1),
(3, 'Apple M1', 24000, 'high', 6, 2, 2),
(4, 'Apple AirPods Max Sky Blue', 20000, 'low', 1, 2, 3),
(5, 'Intel Core i5-11400F 2.6GHz/12MB', 4000, 'middle', 2, 3, 2),
(6, 'Intel Core i5-10400F 2.9GHz/12MB', 3200, 'high', 3, 3, 2),
(7, 'MSI MPG Z490 GAMING PLUS', 5000, 'low', 4, 4, 1),
(8, 'MSI DS502 GAMING Headset', 2000, 'middle', 5, 4, 3),
(9, 'XIAOMI MI DISPLAY 34', 13000, 'high', 4, 5, 4),
(10, 'Xiaomi Mi Piston Fresh Bloom Matte Black ', 200, 'low', 3, 5, 3);

-- --------------------------------------------------------

--
-- Структура таблицы `vendors`
--

CREATE TABLE `vendors` (
  `ID_VENDORS` int(10) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `vendors`
--

INSERT INTO `vendors` (`ID_VENDORS`, `name`) VALUES
(1, 'Asus'),
(2, 'Apple'),
(3, 'Intel'),
(4, 'MSI'),
(5, 'Xiaomi');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`ID_Category`);

--
-- Индексы таблицы `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`ID_ITEMS`);

--
-- Индексы таблицы `vendors`
--
ALTER TABLE `vendors`
  ADD PRIMARY KEY (`ID_VENDORS`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
