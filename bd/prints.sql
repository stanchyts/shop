-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Мар 23 2020 г., 18:43
-- Версия сервера: 10.4.10-MariaDB
-- Версия PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `prints`
--

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nameOfCategory` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imgOfCategory` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `nameOfCategory`, `imgOfCategory`) VALUES
(1, 'cat 1', '../img/log.png'),
(7, 'cat 2', '../img/log.png'),
(6, 'cat 3', '../img/log.png'),
(8, 'cat 4', '../img/log.png'),
(9, 'cat 5', '../img/log.png'),
(10, 'cat 6', '../img/log.png');

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `listOfProducts` varchar(160) COLLATE utf8mb4_unicode_ci NOT NULL,
  `idOfUser` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `listOfProducts`, `idOfUser`) VALUES
(3, '0&2', 5);

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nameOfProduct` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desOfProduct` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imgOfProduct` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `idOfCategory` int(11) NOT NULL,
  `priceOfProduct` int(11) NOT NULL,
  `idOfPartner` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `nameOfProduct`, `desOfProduct`, `imgOfProduct`, `idOfCategory`, `priceOfProduct`, `idOfPartner`) VALUES
(2, 'prod 1', 'prod 1', '../img/log.png', 1, 100, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nameOfUser` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pswOfUser` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `classOfUser` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `countItemsOfUser` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `nameOfUser`, `pswOfUser`, `classOfUser`, `countItemsOfUser`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
