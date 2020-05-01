-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 29 2020 г., 23:04
-- Версия сервера: 5.7.20
-- Версия PHP: 7.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `operty`
--

-- --------------------------------------------------------

--
-- Структура таблицы `author`
--

CREATE TABLE `author` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Дамп данных таблицы `author`
--

INSERT INTO `author` (`id`, `id_user`) VALUES
(1, 1),
(2, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `participant`
--

CREATE TABLE `participant` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_project` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `project`
--

CREATE TABLE `project` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `type_of_project` text NOT NULL,
  `id_author` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Дамп данных таблицы `project`
--

INSERT INTO `project` (`id`, `title`, `type_of_project`, `id_author`) VALUES
(1, 'Во все тяжкие', 'Сериал', 1),
(2, 'Лучше звоните Солу', 'Сериал', 2),
(3, 'Батл Крик', 'Сериал', 1),
(4, 'Секретные материалы', 'Сериал', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `series`
--

CREATE TABLE `series` (
  `id` int(11) NOT NULL,
  `number` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `text` text NOT NULL,
  `id_the_script` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Дамп данных таблицы `series`
--

INSERT INTO `series` (`id`, `number`, `title`, `text`, `id_the_script`) VALUES
(1, 1, 'ТИЗЕР', 'ЭКСТ. ПАСТБИЩЕ - ДЕНЬ\r\n\r\nГлубокое, синее небо.  Жирные кучевые облака.  Под ними - черно-белые\r\nкоровы, пасущиеся на холмистой равнине.  Все это напоминает один из\r\nтех пасторальных рекламных роликов ', 1),
(2, 2, 'ИНТ. ВИННЕБАГО - ДЕНЬ', 'Внутри – ВОДИТЕЛЬ, изо всех сил сжимающий руль.  Вдавливающий \r\nпедаль газа в пол.  Он испуган, часто дышит.  Его глаза за стеклом\r\nпротивогаза широко раскрыты.\r\n\r\nДа, кстати, на водителе противогаз.', 1),
(3, 3, 'ЭКСТ. ПАСТБИЩЕ - ПРО...', 'Виннебаго с ревом пролетает обочину и падает в глубокую канаву.\r\nСлишком глубокую.  БАМ!  Передний бампер зарывается в землю.  ВЖЖЖ!\r\nЗадние колеса крутятся в воздухе.', 1),
(4, 4, 'ИНТ. ВИННЕБАГО - ПРОД...', 'В руке одного из мертвых мексиканцев зажат хромированный пистолет.\r\nЧеловек в трусах хватает его, засовывает за пояс.\r\n\r\nПассажир без сознания, все еще пристегнутый к креслу, издает стон', 1),
(5, 5, 'ЭКСТ. ПАСТБИЩЕ - ПРО...', 'Вынырнув наружу, человек снова начинает дышать.  РУБАШКА с коротким\r\nрукавом, свисающая с бокового зеркала.  Человек надевает ее.  Он\r\nотыскивает в кармане рубашки галстук на резинке и напяливает его.\r\nБрюк, к сожалению, нет.', 1),
(6, 6, 'ИНТ. ДОМ УАЙТА – НОЧЬ', 'Скромный особняк.  Трехспальное РАНЧО в небогатом районе.  Хоть\r\nхозяева и поддерживают дом в идеальном состоянии, но он никогда не\r\nукрасит обложку журнала «Архитектурное обозрение».', 1),
(7, 7, 'ИНТ. ДОМ УАЙТА – ХОЗЯ...', 'Виннебаго с ревом пролетает обочину и падает в глубокую канаву.\r\nСлишком глубокую.  БАМ!  Передний бампер зарывается в землю.  ВЖЖЖ!\r\nЗадние колеса крутятся в воздухе.', 1),
(8, 8, 'ИНТ. ДОМ УАЙТА – ГОСТ...', 'Мы слышим закадровый скрип, пока осматриваемся в комнате.  Мы видим\r\nпустую кроватку, памперсы и детские игрушки в упаковках.  Очевидно, в\r\nэтой семье ждут прибавления.\r\n\r\nМы добираемся до источника скрипа. Уолт', 1),
(9, 9, 'ИНТ. ДОМ УАЙТА – ВАНН...', 'Уолт сидит на краю ванны.  Мы видим его отражение в зеркале.  Он\r\nмастурбирует.  Его лицо такое же выразительное, как если бы он стоял\r\nв очереди в паспортном столе.\r\n\r\nВстретившись глазами со своим отражен...', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `the_script`
--

CREATE TABLE `the_script` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `id_project` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Дамп данных таблицы `the_script`
--

INSERT INTO `the_script` (`id`, `title`, `id_project`) VALUES
(1, 'Cезон 1', 1),
(2, 'Cезон 2', 1),
(3, 'Cезон 3', 1),
(4, 'Cезон 4', 1),
(5, 'Cезон 5', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `timetable`
--

CREATE TABLE `timetable` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `responsible` text NOT NULL,
  `place` varchar(255) NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  `description` varchar(255) NOT NULL,
  `id_project` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` text NOT NULL,
  `profession` text NOT NULL,
  `age` varchar(10) NOT NULL,
  `place_of_birth` text NOT NULL,
  `about_me` text NOT NULL,
  `rating` double(2,1) NOT NULL,
  `portfolio` text NOT NULL,
  `avatar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `name`, `profession`, `age`, `place_of_birth`, `about_me`, `rating`, `portfolio`, `avatar`) VALUES
(1, 'mnatsakanyan.armen1@gmail.com', '25032000Armen', '', '', '', '', '', 0.0, '', ''),
(2, 'Vanya.Zhabinsky@mail.ru', 'okko2019', '', '', '', '', '', 0.0, '', '');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_users` (`id_user`);

--
-- Индексы таблицы `participant`
--
ALTER TABLE `participant`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_project` (`id_project`);

--
-- Индексы таблицы `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_authors` (`id_author`);

--
-- Индексы таблицы `series`
--
ALTER TABLE `series`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_the_scripts` (`id_the_script`);

--
-- Индексы таблицы `the_script`
--
ALTER TABLE `the_script`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_projects` (`id_project`);

--
-- Индексы таблицы `timetable`
--
ALTER TABLE `timetable`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_project` (`id_project`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `author`
--
ALTER TABLE `author`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `participant`
--
ALTER TABLE `participant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `project`
--
ALTER TABLE `project`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `series`
--
ALTER TABLE `series`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `the_script`
--
ALTER TABLE `the_script`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `timetable`
--
ALTER TABLE `timetable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `author`
--
ALTER TABLE `author`
  ADD CONSTRAINT `author_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`);

--
-- Ограничения внешнего ключа таблицы `participant`
--
ALTER TABLE `participant`
  ADD CONSTRAINT `participant_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `participant_ibfk_2` FOREIGN KEY (`id_project`) REFERENCES `project` (`id`);

--
-- Ограничения внешнего ключа таблицы `project`
--
ALTER TABLE `project`
  ADD CONSTRAINT `project_ibfk_2` FOREIGN KEY (`id_author`) REFERENCES `author` (`id`);

--
-- Ограничения внешнего ключа таблицы `series`
--
ALTER TABLE `series`
  ADD CONSTRAINT `series_ibfk_1` FOREIGN KEY (`id_the_script`) REFERENCES `the_script` (`id`);

--
-- Ограничения внешнего ключа таблицы `the_script`
--
ALTER TABLE `the_script`
  ADD CONSTRAINT `the_script_ibfk_1` FOREIGN KEY (`id_project`) REFERENCES `project` (`id`);

--
-- Ограничения внешнего ключа таблицы `timetable`
--
ALTER TABLE `timetable`
  ADD CONSTRAINT `timetable_ibfk_1` FOREIGN KEY (`id_project`) REFERENCES `project` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
