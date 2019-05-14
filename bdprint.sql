-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 14 2019 г., 09:11
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
  `model` varchar(256) NOT NULL,
  `idsotr` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=cp1257;

--
-- Дамп данных таблицы `kartridj`
--

INSERT INTO `kartridj` (`id`, `model`, `idsotr`) VALUES
(75, 'Q5949A', 18),
(76, 'C7115A', 19),
(77, 'C7115A', 20),
(78, 'CE278A', 21),
(79, 'Q5949AS', 22),
(80, 'CE505A', 23),
(81, 'CE278A', 25),
(82, 'CE505A', 26),
(83, 'TR-280A', 27),
(84, 'Q5949A', 28),
(85, 'Q5949AS', 30),
(86, 'CE505A', 29),
(87, 'CF226X', 24);

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
(12, 'Бюджетный'),
(8, 'Информатизационный'),
(9, 'Операционно-кассовый'),
(11, 'Правовой сектор'),
(10, 'Учета и отчетности'),
(13, 'Экономический');

-- --------------------------------------------------------

--
-- Структура таблицы `printer`
--

CREATE TABLE `printer` (
  `ID` int(5) NOT NULL,
  `inv` varchar(20) NOT NULL,
  `model` varchar(256) DEFAULT NULL,
  `idsotr` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=cp1257;

--
-- Дамп данных таблицы `printer`
--

INSERT INTO `printer` (`ID`, `inv`, `model`, `idsotr`) VALUES
(209, '110104140000037', 'HPLaserJet 1160', '18'),
(210, '110104140000029', 'HPLaserJet1150', '19'),
(211, '110104140000030', 'HPLaserJet  1150', '20'),
(213, '110104140000127', 'HPLaserJet P1566', '21'),
(214, '110104140000036', 'HPLaserJet 1160', '22'),
(215, '110104140000169', 'HPLaserJet P2035', '23'),
(217, '110104140000206', 'HPLaserJet Pro MFP M426dw', '24'),
(218, '110104140000129', 'HPLaserJet P1566', '25'),
(219, '110104140000215', 'HPLaserJet P2035', '26'),
(220, '110104140000207', 'HPLaserJet P2035', '27'),
(221, '110104140000085', 'HPLaserJet 1160', '28'),
(222, '110104140000216', 'HPLaserJet P2035', '29'),
(223, '110104140000042', 'HPLaserJet 1160', '30');

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
(78, 209, 75),
(79, 210, 76),
(80, 211, 77),
(81, 213, 78),
(82, 214, 79),
(83, 215, 80),
(84, 218, 81),
(85, 219, 82),
(86, 220, 83),
(87, 221, 84),
(88, 222, 86),
(89, 223, 85),
(90, 217, 87);

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
(18, 'Трапезников М.С', 8, 'Начальник'),
(19, 'Лузина О.Э', 9, 'Ведущий специалист'),
(20, 'Тимшина Т.М', 9, 'Ведущий специалист'),
(21, 'Плотникова Ю.А', 9, 'Заместитель начальника'),
(22, 'Никитина Т.К', 10, 'Начальник'),
(23, 'Грошеева Л.Н', 11, 'Консультант по вопросам закупки'),
(24, 'Трясцина Е.Г', 11, 'Ведущий специалист'),
(25, 'Галкина Е.К', 12, 'Ведущий специалист'),
(26, 'Хучеева Д.Р', 12, 'Ведущий специалист'),
(27, 'Вашурина С.Ф', 12, 'Начальник'),
(28, 'Ощепкова Е.Н', 11, 'Начальник'),
(29, 'Муллазянова Т.А', 13, 'Начальник'),
(30, 'Мальцева Т.В', 13, 'Заместитель начальника');

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
(6, 'Замена фотобарабана'),
(5, 'Заправка');

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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nazv` (`nazv`);

--
-- Индексы таблицы `printer`
--
ALTER TABLE `printer`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `inv` (`inv`),
  ADD UNIQUE KEY `inv_2` (`inv`);

--
-- Индексы таблицы `print_link_kart`
--
ALTER TABLE `print_link_kart`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_kart` (`id_kart`);

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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `fio` (`fio`);

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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `kartridj`
--
ALTER TABLE `kartridj`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;
--
-- AUTO_INCREMENT для таблицы `otdel`
--
ALTER TABLE `otdel`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT для таблицы `printer`
--
ALTER TABLE `printer`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=224;
--
-- AUTO_INCREMENT для таблицы `print_link_kart`
--
ALTER TABLE `print_link_kart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;
--
-- AUTO_INCREMENT для таблицы `remkartr`
--
ALTER TABLE `remkartr`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT для таблицы `remprint`
--
ALTER TABLE `remprint`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT для таблицы `sotrydnik`
--
ALTER TABLE `sotrydnik`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT для таблицы `vidrab`
--
ALTER TABLE `vidrab`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
