-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 01 2019 г., 06:49
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
  `id_printera` int(5) NOT NULL DEFAULT '5'
) ENGINE=InnoDB DEFAULT CHARSET=cp1257;

--
-- Дамп данных таблицы `kartridj`
--

INSERT INTO `kartridj` (`id`, `model`, `id_printera`) VALUES
(34, 'w-4der-w', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `otdel`
--

CREATE TABLE `otdel` (
  `id` int(5) NOT NULL,
  `nazv` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=cp1257;

-- --------------------------------------------------------

--
-- Структура таблицы `printer`
--

CREATE TABLE `printer` (
  `ID` int(5) NOT NULL,
  `inv` int(20) NOT NULL,
  `model` varchar(256) NOT NULL,
  `idkart` int(5) DEFAULT NULL,
  `idsotr` int(5) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=cp1257;

--
-- Дамп данных таблицы `printer`
--

INSERT INTO `printer` (`ID`, `inv`, `model`, `idkart`, `idsotr`) VALUES
(49, 123, 'hp', NULL, 1);

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
(23, 34, 49);

-- --------------------------------------------------------

--
-- Структура таблицы `remkartr`
--

CREATE TABLE `remkartr` (
  `idkartr` int(11) NOT NULL,
  `idrabot` int(11) NOT NULL,
  `data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=cp1257;

-- --------------------------------------------------------

--
-- Структура таблицы `remprint`
--

CREATE TABLE `remprint` (
  `idprint` int(5) NOT NULL,
  `idrabot` int(5) NOT NULL,
  `data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=cp1257;

-- --------------------------------------------------------

--
-- Структура таблицы `sotrydnik`
--

CREATE TABLE `sotrydnik` (
  `id` int(5) NOT NULL,
  `fio` varchar(256) NOT NULL,
  `id_otd` int(5) NOT NULL,
  `doljn` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=cp1257;

-- --------------------------------------------------------

--
-- Структура таблицы `vidrab`
--

CREATE TABLE `vidrab` (
  `id` int(5) NOT NULL,
  `name` varchar(256) NOT NULL,
  `stoimost` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=cp1257;

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
-- Индексы таблицы `sotrydnik`
--
ALTER TABLE `sotrydnik`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT для таблицы `otdel`
--
ALTER TABLE `otdel`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `printer`
--
ALTER TABLE `printer`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
--
-- AUTO_INCREMENT для таблицы `print_link_kart`
--
ALTER TABLE `print_link_kart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT для таблицы `sotrydnik`
--
ALTER TABLE `sotrydnik`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `vidrab`
--
ALTER TABLE `vidrab`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
