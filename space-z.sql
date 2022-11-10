-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Ноя 10 2022 г., 20:09
-- Версия сервера: 8.0.30
-- Версия PHP: 8.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `space-z`
--

-- --------------------------------------------------------

--
-- Структура таблицы `proposal`
--

CREATE TABLE `proposal` (
  `id` int NOT NULL,
  `name` varchar(150) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `height` int NOT NULL,
  `weight` int NOT NULL,
  `createDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int DEFAULT '0' COMMENT '1-заявка на рассмотрение\r\n2-заявка одобрена'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `proposal`
--

INSERT INTO `proposal` (`id`, `name`, `phone`, `height`, `weight`, `createDate`, `status`) VALUES
(1, 'Иван Гаврилов', '6666666', 1, 10, '2022-11-10 17:04:16', 0),
(2, 'hggvjhjvh', '88888', 77, 10, '2022-11-10 17:07:56', 0),
(3, 'Баба яга', '44444', 22, 10, '2022-11-10 17:55:39', 0),
(4, 'Баба яга', '44444', 22, 10, '2022-11-10 17:56:30', 0),
(5, 'yygyiyi', '6666666', 1, 10, '2022-11-10 18:05:40', 0),
(6, 'yygyiyi', '6666666', 1, 10, '2022-11-10 18:06:11', 0),
(7, 'b952352o_kvestik', '6666666', 1, 10, '2022-11-10 18:08:14', 0),
(8, 'rrsg', '6666666', 77, 10, '2022-11-10 18:10:06', 0),
(9, 'yygyiyi', '6666666', 77, 10, '2022-11-10 18:10:23', 0),
(10, 'effse', '6666666', 1, 10, '2022-11-10 18:16:41', 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `proposal`
--
ALTER TABLE `proposal`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `proposal`
--
ALTER TABLE `proposal`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
