-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 08 2019 г., 07:14
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
(59, 'C4096A'),
(60, 'C7115A'),
(61, 'C8061X'),
(62, 'CE255A');

-- --------------------------------------------------------

--
-- Структура таблицы `otdel`
--

CREATE TABLE `otdel` (
  `id` int(5) NOT NULL,
  `nazv` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=cp1251;

--
-- Дамп данных таблицы `otdel`
--

INSERT INTO `otdel` (`id`, `nazv`) VALUES
(5, 'Отдел 1'),
(6, 'Отдел 2'),
(7, 'Отдел 3');

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
(69, 860935, 'HP LaserJet 2100m', '15'),
(70, 34573278, 'HP LaserJet 1000w', '16'),
(71, 28485856, 'HP LaserJet 2200dtn', '17'),
(204, 55, 'asd', '15');

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
(67, 69, 59),
(68, 70, 60),
(70, 71, 61),
(71, 69, 62),
(72, 72, 62);

-- --------------------------------------------------------

--
-- Структура таблицы `remkartr`
--

CREATE TABLE `remkartr` (
  `id` int(11) NOT NULL,
  `idkart` int(11) NOT NULL,
  `idrabot` int(11) NOT NULL,
  `data` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=cp1257;

--
-- Дамп данных таблицы `remkartr`
--

INSERT INTO `remkartr` (`id`, `idkart`, `idrabot`, `data`) VALUES
(13, 59, 1, '2019-04-18 04:57:59'),
(14, 62, 1, '2019-04-18 04:58:02'),
(15, 62, 1, '2019-04-18 04:58:05'),
(16, 62, 1, '2019-04-18 04:59:02'),
(17, 59, 1, '2019-05-08 04:08:49');

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
(10, 69, 2, '2019-04-18 09:57:34'),
(11, 71, 2, '2019-04-18 09:57:49');

-- --------------------------------------------------------

--
-- Структура таблицы `sotrydnik`
--

CREATE TABLE `sotrydnik` (
  `id` int(5) NOT NULL,
  `fio` varchar(256) DEFAULT NULL,
  `id_otd` int(5) DEFAULT NULL,
  `doljn` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=cp1251;

--
-- Дамп данных таблицы `sotrydnik`
--

INSERT INTO `sotrydnik` (`id`, `fio`, `id_otd`, `doljn`) VALUES
(15, 'Иванов И.И', 5, 'Бухгалтер'),
(16, 'Петров П.П', 6, 'Бухгалтер'),
(17, 'Сидоров С.С', 7, 'Бухгалтер');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) CHARACTER SET cp1257 NOT NULL,
  `email` varchar(255) CHARACTER SET cp1257 NOT NULL,
  `password` varchar(254) CHARACTER SET cp1257 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=cp1251;

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
) ENGINE=InnoDB DEFAULT CHARSET=cp1251;

--
-- Дамп данных таблицы `vidrab`
--

INSERT INTO `vidrab` (`id`, `name`) VALUES
(1, 'Заправка'),
(2, 'Ремонт'),
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
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;
--
-- AUTO_INCREMENT для таблицы `otdel`
--
ALTER TABLE `otdel`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT для таблицы `printer`
--
ALTER TABLE `printer`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=205;
--
-- AUTO_INCREMENT для таблицы `print_link_kart`
--
ALTER TABLE `print_link_kart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;
--
-- AUTO_INCREMENT для таблицы `remkartr`
--
ALTER TABLE `remkartr`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT для таблицы `remprint`
--
ALTER TABLE `remprint`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT для таблицы `sotrydnik`
--
ALTER TABLE `sotrydnik`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT для таблицы `vidrab`
--
ALTER TABLE `vidrab`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
