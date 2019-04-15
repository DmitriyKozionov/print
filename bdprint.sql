-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 15 2019 г., 07:48
-- Версия сервера: 5.6.37
-- Версия PHP: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `bdprint`
--

-- --------------------------------------------------------

--
-- Структура таблицы `kartridj`
--

CREATE TABLE `kartridj` (
  `id` int(5) NOT NULL,
  `model` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=cp1257;

--
-- Дамп данных таблицы `kartridj`
--

INSERT INTO `kartridj` (`id`, `model`) VALUES
(54, 'Kart1'),
(55, 'kart2'),
(56, 'Kart3');

-- --------------------------------------------------------

--
-- Структура таблицы `otdel`
--

CREATE TABLE `otdel` (
  `id` int(5) NOT NULL,
  `nazv` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=cp1257;

--
-- Дамп данных таблицы `otdel`
--

INSERT INTO `otdel` (`id`, `nazv`) VALUES
(2, 'otdel1\r\n'),
(3, 'otdel2'),
(4, 'otdel3');

-- --------------------------------------------------------

--
-- Структура таблицы `printer`
--

CREATE TABLE `printer` (
  `ID` int(5) NOT NULL,
  `inv` int(20) NOT NULL,
  `model` varchar(256) DEFAULT NULL,
  `idsotr` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=cp1257;

--
-- Дамп данных таблицы `printer`
--

INSERT INTO `printer` (`ID`, `inv`, `model`, `idsotr`) VALUES
(58, 123, 'Printer1', '3'),
(59, 12, 'Printer2', '6'),
(66, 13, 'Printer3', '5'),
(67, 55, 'Printer4', '12'),
(68, 143, 'Printer 5', '5');

-- --------------------------------------------------------

--
-- Структура таблицы `print_link_kart`
--

CREATE TABLE `print_link_kart` (
  `id` int(11) NOT NULL,
  `id_print` int(11) NOT NULL,
  `id_kart` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=cp1257;

--
-- Дамп данных таблицы `print_link_kart`
--

INSERT INTO `print_link_kart` (`id`, `id_print`, `id_kart`) VALUES
(53, 58, 54),
(54, 58, 55),
(55, 60, 56),
(56, 59, 55),
(57, 66, 56),
(58, 68, 54),
(59, 66, 55),
(60, 67, 54);

-- --------------------------------------------------------

--
-- Структура таблицы `remkartr`
--

CREATE TABLE `remkartr` (
  `id` int(11) NOT NULL,
  `idkart` int(11) NOT NULL,
  `idrabot` int(11) NOT NULL,
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=cp1257;

--
-- Дамп данных таблицы `remkartr`
--

INSERT INTO `remkartr` (`id`, `idkart`, `idrabot`, `data`) VALUES
(1, 0, 1, '2019-04-04 05:48:08'),
(2, 0, 2, '2019-04-04 05:48:47'),
(3, 0, 1, '2019-04-04 05:48:49'),
(4, 54, 1, '2019-04-04 05:49:29'),
(5, 56, 3, '2019-04-10 05:32:14'),
(6, 54, 1, '2019-04-11 05:11:30'),
(7, 54, 1, '2019-04-12 04:26:45');

-- --------------------------------------------------------

--
-- Структура таблицы `remprint`
--

CREATE TABLE `remprint` (
  `id` int(11) NOT NULL,
  `idprint` int(11) NOT NULL,
  `idrabot` int(11) NOT NULL,
  `data` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=cp1257;

--
-- Дамп данных таблицы `remprint`
--

INSERT INTO `remprint` (`id`, `idprint`, `idrabot`, `data`) VALUES
(1, 58, 2, '2019-04-04 10:30:05'),
(2, 66, 3, '2019-04-12 09:26:33');

-- --------------------------------------------------------

--
-- Структура таблицы `sotrydnik`
--

CREATE TABLE `sotrydnik` (
  `id` int(5) NOT NULL,
  `fio` varchar(256) DEFAULT NULL,
  `id_otd` int(5) DEFAULT NULL,
  `doljn` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=cp1257;

--
-- Дамп данных таблицы `sotrydnik`
--

INSERT INTO `sotrydnik` (`id`, `fio`, `id_otd`, `doljn`) VALUES
(3, 'Ivanov I.I', 1, 'doljn1'),
(5, 'Popov P.P.', 2, 'doljn1'),
(6, 'Petrov P.P', 2, 'doljn2'),
(12, 'Sotrudnik1', 3, 'doljn2'),
(14, 'Sotrudnik2', 3, 'doljn2');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(254) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=cp1257;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(17, 'Shifter', 'sentemof@gmail.com', 'Shifter');

-- --------------------------------------------------------

--
-- Структура таблицы `vidrab`
--

CREATE TABLE `vidrab` (
  `id` int(5) NOT NULL,
  `name` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=cp1257;

--
-- Дамп данных таблицы `vidrab`
--

INSERT INTO `vidrab` (`id`, `name`) VALUES
(1, 'rabota 1'),
(2, 'rabota 2'),
(3, 'rabota 3'),
(4, 'rabota 4');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `kartridj`
--
ALTER TABLE `kartridj`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `otdel`
--
ALTER TABLE `otdel`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `printer`
--
ALTER TABLE `printer`
  ADD PRIMARY KEY (`ID`);

--
-- Индексы таблицы `print_link_kart`
--
ALTER TABLE `print_link_kart`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `remkartr`
--
ALTER TABLE `remkartr`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `remprint`
--
ALTER TABLE `remprint`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `sotrydnik`
--
ALTER TABLE `sotrydnik`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `unique_index` (`username`,`email`);

--
-- Индексы таблицы `vidrab`
--
ALTER TABLE `vidrab`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `kartridj`
--
ALTER TABLE `kartridj`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
--
-- AUTO_INCREMENT для таблицы `otdel`
--
ALTER TABLE `otdel`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `printer`
--
ALTER TABLE `printer`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;
--
-- AUTO_INCREMENT для таблицы `print_link_kart`
--
ALTER TABLE `print_link_kart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
--
-- AUTO_INCREMENT для таблицы `remkartr`
--
ALTER TABLE `remkartr`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT для таблицы `remprint`
--
ALTER TABLE `remprint`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `sotrydnik`
--
ALTER TABLE `sotrydnik`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT для таблицы `vidrab`
--
ALTER TABLE `vidrab`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
