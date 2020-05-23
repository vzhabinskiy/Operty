-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 19 2020 г., 02:20
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
(2, 2),
(3, 3);

-- --------------------------------------------------------

--
-- Структура таблицы `gender`
--

CREATE TABLE `gender` (
  `id` int(11) NOT NULL,
  `type` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `gender`
--

INSERT INTO `gender` (`id`, `type`) VALUES
(1, 'Мужской'),
(2, 'Женский');

-- --------------------------------------------------------

--
-- Структура таблицы `participant`
--

CREATE TABLE `participant` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_project` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `participant`
--

INSERT INTO `participant` (`id`, `id_user`, `id_project`) VALUES
(1, 4, 1),
(2, 5, 2),
(3, 6, 3),
(4, 7, 4),
(5, 8, 1),
(6, 9, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `profession`
--

CREATE TABLE `profession` (
  `id` int(11) NOT NULL,
  `type` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `profession`
--

INSERT INTO `profession` (`id`, `type`) VALUES
(1, 'Продюссер'),
(2, 'Режиссер'),
(3, 'Сценарист'),
(4, 'Актер'),
(5, 'Композитор'),
(6, 'Художник');

-- --------------------------------------------------------

--
-- Структура таблицы `project`
--

CREATE TABLE `project` (
  `id` int(11) NOT NULL,
  `img` text,
  `name` varchar(255) NOT NULL,
  `id_type_of_project` int(11) NOT NULL,
  `id_author` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Дамп данных таблицы `project`
--

INSERT INTO `project` (`id`, `img`, `name`, `id_type_of_project`, `id_author`) VALUES
(1, '../../source/img/breakingbad', 'Во все тяжкие', 2, 1),
(2, '../../source/img/calltosaul', 'Лучше звоните Солу', 2, 2),
(3, '../../source/img/battlecreek', 'Батл Крик', 2, 3),
(4, '../../source/img/secretmaterials', 'Секретные материалы', 1, 1);

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
(7, 5, 'ЭКСТ. ПАСТБИЩЕ - ПРО...', 'Вынырнув наружу, человек снова начинает дышать.  РУБАШКА с коротким\r\nрукавом, свисающая с бокового зеркала.  Человек надевает ее.  Он\r\nотыскивает в кармане рубашки галстук на резинке и напяливает его.\r\nБрюк, к сожалению, нет.', 1),
(8, 6, 'ИНТ. ДОМ УАЙТА – НОЧЬ', 'Скромный особняк.  Трехспальное РАНЧО в небогатом районе.  Хоть\r\nхозяева и поддерживают дом в идеальном состоянии, но он никогда не\r\nукрасит обложку журнала «Архитектурное обозрение».', 1),
(9, 7, 'ИНТ. ДОМ УАЙТА – ХОЗЯ...', 'Виннебаго с ревом пролетает обочину и падает в глубокую канаву.\r\nСлишком глубокую.  БАМ!  Передний бампер зарывается в землю.  ВЖЖЖ!\r\nЗадние колеса крутятся в воздухе.', 1),
(10, 8, 'ИНТ. ДОМ УАЙТА – ГОСТ...', 'Мы слышим закадровый скрип, пока осматриваемся в комнате.  Мы видим\r\nпустую кроватку, памперсы и детские игрушки в упаковках.  Очевидно, в\r\nэтой семье ждут прибавления.\r\n\r\nМы добираемся до источника скрипа. Уолт', 1),
(11, 9, 'ИНТ. ДОМ УАЙТА – ВАНН...', 'Уолт сидит на краю ванны.  Мы видим его отражение в зеркале.  Он\r\nмастурбирует.  Его лицо такое же выразительное, как если бы он стоял\r\nв очереди в паспортном столе.\r\n\r\nВстретившись глазами со своим отражен...', 1);

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
(2, 'Cезон 2', 2),
(3, 'Cезон 3', 3),
(4, 'Cезон 4', 4),
(5, 'Cезон 5', 2);

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
  `id_project` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Дамп данных таблицы `timetable`
--

INSERT INTO `timetable` (`id`, `title`, `responsible`, `place`, `start`, `end`, `description`, `id_project`) VALUES
(5, '', '', '', '2020-05-19 07:30:00', '2020-05-19 08:00:00', '', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `type_of_project`
--

CREATE TABLE `type_of_project` (
  `id` int(11) NOT NULL,
  `type` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `type_of_project`
--

INSERT INTO `type_of_project` (`id`, `type`) VALUES
(1, 'Фильм'),
(2, 'Сериал');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(255) NOT NULL,
  `full_name` text NOT NULL,
  `age` int(3) NOT NULL,
  `place_of_birth` text NOT NULL,
  `about_me` text NOT NULL,
  `rating` double(2,1) DEFAULT NULL,
  `portfolio` text,
  `avatar` text,
  `id_profession` int(11) NOT NULL,
  `id_gender` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `full_name`, `age`, `place_of_birth`, `about_me`, `rating`, `portfolio`, `avatar`, `id_profession`, `id_gender`) VALUES
(1, 'mnatsakanyan.armen1@gmail.com', '$2y$10$TcbbUh5mrNtokCPrMYzxd.k/lbJjPO1F1gNaNZw7Kv9e/gOSxVX56', 'Armen Mnatsakanyan', 20, 'Rostov-on-Don', 'Явлюясь владельцем компании ООО &quot;Радуга&quot;', NULL, '../../source/img/portfolio', '../../source/img/armen', 1, 1),
(2, 'vzhabinskiy@yandex.ru', '$2y$10$TVTUVtePX/ByKy1raFDbzukfsivxrE4cZ.6RTjkDgYAappjXBfAPG', 'Ivan Zhabinskiy', 20, 'Rostov-on-Don', 'Люблю свою профессию', NULL, '../../source/img/portfolio', '../../source/img/ivan', 2, 1),
(3, 'vasyliev.konstantin@gmail.com', '$2y$10$roNLa/JlBymOk9Yv98oC1O93AZ5wcP4fbZtieE6VYGr0Cb1NN44ha', 'Konstantin Vasyliev', 20, 'Rostov-on-Don', 'Ди Каприо отдыхает', NULL, '../../source/img/portfolio', '../../source/img/kostya', 4, 1),
(4, 'maksim.kiyko@yandex.ru', '$2y$10$dhYxJ4ppG7I9fjw/tdAmJuVgb9YShudGpvAvEj.qYLj5hPx64yRw6', 'Maksim Kiyko', 20, 'Rostov-on-Don', 'Я рыжий и лучший', NULL, '../../source/img/portfolio', '../../source/img/maksim', 6, 1),
(5, 'Vadim.Gridinskiy@mail.ru', '$2y$10$3/47SQ8qbCQGIlgP74Xv4uj//ybitkvAAM2PZUXW1aQApdyx50fRS', 'Vadim Gridinskiy', 21, 'Stavropol Krai , Mineral Waters', 'Люблю жену и сына', NULL, '../../source/img/portfolio', '../../source/img/vadim', 5, 1),
(6, 'kupin-anton@yandex.ru', '$2y$10$BBWm9BZMzEu3wqXmtsce2u1nlCaeSJpHfee6dWs8QVvOkS0lPhlCu', 'Anton Kupin', 22, 'Rostov-on-Don', 'I work for the &quot;Umbrella IT&quot; company', NULL, '../../source/img/portfolio', '../../source/img/anton', 1, 1),
(7, 'aram.muszhina@gmail.com', '$2y$10$GbnuMvGTfYV.c2qdXuRvq.GoPBeMCvvdFRlVeCN42kLvm4DfEaLRe', 'Aram Grigoryan', 20, 'Rostov-on-Don', 'Самый лучший из Армян', NULL, '../../source/img/portfolio', '../../source/img/aram', 2, 1),
(8, 'MuradGadzhikurbanov2000@gmail.com', '$2y$10$0sOjt3QJAPmSh3RguH.yWerKVTjJL5pU5YKRPClvYDb3NUkTqEg96', 'Murad Gadzhikurbanov', 20, 'Dagestan , Makhachkala', 'not a typical Dagestani', NULL, '../../source/img/portfolio', '../../source/img/murad', 3, 1),
(9, 'edward@1999egorov.yandex.ru', '$2y$10$MAJZfj/QxCCdFMUIl3jwIe8WfSi7vtmIX.stdDcJJoQdHFnH2Vak6', 'Edward Egorov', 21, 'Rostov Oblast , Bataysk', 'American soldier ', NULL, '../../source/img/portfolio', '../../source/img/edward', 4, 1);

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
-- Индексы таблицы `gender`
--
ALTER TABLE `gender`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `participant`
--
ALTER TABLE `participant`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_project` (`id_project`);

--
-- Индексы таблицы `profession`
--
ALTER TABLE `profession`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_authors` (`id_author`),
  ADD KEY `id_type_of_project` (`id_type_of_project`);

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
-- Индексы таблицы `type_of_project`
--
ALTER TABLE `type_of_project`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_profession` (`id_profession`),
  ADD KEY `id_gender` (`id_gender`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `author`
--
ALTER TABLE `author`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `gender`
--
ALTER TABLE `gender`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `participant`
--
ALTER TABLE `participant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `profession`
--
ALTER TABLE `profession`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `project`
--
ALTER TABLE `project`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `series`
--
ALTER TABLE `series`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `the_script`
--
ALTER TABLE `the_script`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `timetable`
--
ALTER TABLE `timetable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `type_of_project`
--
ALTER TABLE `type_of_project`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
  ADD CONSTRAINT `project_ibfk_2` FOREIGN KEY (`id_author`) REFERENCES `author` (`id`),
  ADD CONSTRAINT `project_ibfk_3` FOREIGN KEY (`id_type_of_project`) REFERENCES `type_of_project` (`id`);

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

--
-- Ограничения внешнего ключа таблицы `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_profession`) REFERENCES `profession` (`id`),
  ADD CONSTRAINT `user_ibfk_2` FOREIGN KEY (`id_gender`) REFERENCES `gender` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
