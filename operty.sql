-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 04 2020 г., 00:38
-- Версия сервера: 5.7.20
-- Версия PHP: 7.2.0

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
-- Структура таблицы `participants`
--

CREATE TABLE `participants` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_project` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `participants`
--

INSERT INTO `participants` (`id`, `id_user`, `id_project`) VALUES
(5, 4, 1),
(6, 5, 2),
(7, 6, 3),
(8, 7, 4),
(9, 8, 2),
(10, 9, 3);

-- --------------------------------------------------------

--
-- Структура таблицы `professions`
--

CREATE TABLE `professions` (
  `id` int(11) NOT NULL,
  `type` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `professions`
--

INSERT INTO `professions` (`id`, `type`) VALUES
(1, 'Продюссер'),
(2, 'Режиссер'),
(3, 'Сценарист'),
(4, 'Актер'),
(5, 'Композитор'),
(6, 'Художник');

-- --------------------------------------------------------

--
-- Структура таблицы `projects`
--

CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `img` text,
  `name` varchar(255) NOT NULL,
  `id_type_of_project` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Дамп данных таблицы `projects`
--

INSERT INTO `projects` (`id`, `img`, `name`, `id_type_of_project`, `id_user`) VALUES
(1, '/source/img/breakingbad', 'Во все тяжкие', 2, 1),
(2, '/source/img/calltosaul', 'Лучше звоните Солу', 2, 2),
(3, '/source/img/battlecreek', 'Батл Крик', 2, 3),
(4, '/source/img/secretmaterials', 'Секретные материалы', 1, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `series`
--

CREATE TABLE `series` (
  `id` int(11) NOT NULL,
  `number` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `text` text NOT NULL,
  `id_the_script` int(11) DEFAULT NULL
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
(11, 9, 'ИНТ. ДОМ УАЙТА – ВАНН...', 'Уолт сидит на краю ванны.  Мы видим его отражение в зеркале.  Он\r\nмастурбирует.  Его лицо такое же выразительное, как если бы он стоял\r\nв очереди в паспортном столе.\r\n\r\nВстретившись глазами со своим отражен...', 1),
(12, 3, 'asd', '<p>sd</p>', 1),
(13, 3, 'asd', '<p>sd</p>', 1),
(14, 1, 'adsdasd', '<p>https://vk.com/monfrik</p>', NULL),
(15, 1, 'asd', '<p>&lt;b&gt;asdasd&lt;/b&gt;<br />&lt;mark&gt;asd&lt;/asd&gt;</p>', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `the_scripts`
--

CREATE TABLE `the_scripts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `id_project` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Дамп данных таблицы `the_scripts`
--

INSERT INTO `the_scripts` (`id`, `title`, `id_project`) VALUES
(1, 'Cезон 1', 1),
(2, 'Cезон 2', 3),
(3, 'Cезон 3', 1),
(4, 'Cезон 4', 2),
(5, 'Cезон 5', 4);

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
  `description` text NOT NULL,
  `id_project` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Дамп данных таблицы `timetable`
--

INSERT INTO `timetable` (`id`, `title`, `responsible`, `place`, `start`, `end`, `description`, `id_project`) VALUES
(2, 'Название 2', '', '', '2020-06-04 08:00:00', '2020-06-04 08:30:00', '', 2),
(8, 'Кастинг', '', '', '2020-06-05 07:00:00', '2020-06-05 07:30:00', '', 1),
(9, 'титл 3', '', '', '2020-06-04 07:00:00', '2020-06-04 07:30:00', '', 1),
(10, 'b', '', '', '2020-06-04 02:00:00', '2020-06-04 02:30:00', '', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `types_of_projects`
--

CREATE TABLE `types_of_projects` (
  `id` int(11) NOT NULL,
  `type` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `types_of_projects`
--

INSERT INTO `types_of_projects` (`id`, `type`) VALUES
(1, 'Фильм'),
(2, 'Сериал');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(255) NOT NULL,
  `full_name` text NOT NULL,
  `age` int(3) NOT NULL,
  `place_of_birth` text NOT NULL,
  `about_me` text NOT NULL,
  `portfolio` text,
  `avatar` text,
  `id_profession` int(11) NOT NULL,
  `id_gender` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `full_name`, `age`, `place_of_birth`, `about_me`, `portfolio`, `avatar`, `id_profession`, `id_gender`) VALUES
(1, 'mnatsakanyan.armen1@gmail.com', '$2y$10$G//RxiTKlkRjagI8XA2BGud3qCqbmPzidPi7.0Whr52VdR6LfejOO', 'Armen Mnatsakanyan', 20, 'Rostov-on-Don', 'Являюсь владельцем компании ООО &quot;Радуга&quot;', '/source/img/portfolio', '/source/img/armen', 2, 1),
(2, 'vzhabinskiy@yandex.ru', '$2y$10$IwhNjzUfJkPYcrRoAeUgq.DSwbpJGMwPMtiwNlNfEZ/W6khQnZ7Uq', 'Ivan Zhabinskiy', 20, 'Rostov-on-Don', 'Люблю свою профессию\r\n', '/source/img/portfolio', '/source/img/ivan', 2, 1),
(3, 'vasyliev.konstantin@gmail.com', '$2y$10$CKK6chrP8.ZdNqK4fPU4nOwMAp9isnYm0kJ.46f7yghSgr9iEiKK6', 'Konstantin Vasyliev', 20, 'Rostov-on-Don', 'Ди Каприо отдыхает', '/source/img/portfolio', '/source/img/kostya', 4, 1),
(4, 'maksim.kiyko@yandex.ru', '$2y$10$8hMCrwaNzkBSBsY7bcFtHeel9IX5YLEpGlSpRuopfE/8vjBwXIBFS', 'Maksim Kiyko', 20, 'Rostov-on-Don', 'Я рыжий и лучший', '/source/img/portfolio', '/source/img/maksim', 6, 1),
(5, 'Vadim.Gridinskiy@mail.ru', '$2y$10$5HiPCqlQz2Yz70uWheG0quILIFKH25faB2Xzcir7SW8oTAk1eQPFi', 'Vadim Gridinskiy', 21, 'Stavropol Krai , Mineral Waters', 'Люблю жену и сына', '/source/img/portfolio', '/source/img/vadim', 6, 1),
(6, 'kupin-anton@yandex.ru', '$2y$10$C/tDOQCwY4p1z0hOm.DrpOd6R/pUD2RjKb/KQu.JFb3xl4QNZyCiK', 'Anton Kupin', 21, 'Stavropol Krai , Mineral Waters', 'I work for the &quot;Umbrella&quot; company', '/source/img/portfolio', '/source/img/anton', 3, 1),
(7, 'aram.muszhina@gmail.com', '$2y$10$96Dr33QRXeAdzt3JQOIIDOUJx/e2aGrUzzsgS798pJSGkm2yMNZtC', 'Aram Grigoryan', 20, 'Rostov-on-Don', 'Самый лучший из Армян', '/source/img/portfolio', '/source/img/aram', 1, 1),
(8, 'MuradGadzhikurbanov2000@gmail.com', '$2y$10$/Odhk1LPxzVHNt8wbWzaXuTDHQHlC3lfD39R6wUd8ftqY.k17vABu', 'Murad Gadzhikurbanov', 20, 'Dagestan , Makhachkala', 'not a typical Dagestani', '/source/img/portfolio', '/source/img/murad', 5, 1),
(9, 'edward@1999egorov.yandex.ru', '$2y$10$WTo4PVFLcqq3IoaaUeW3SuumksFTEW8w2fkvI43mzWQvjJux/EW6S', 'Edward Egorov', 21, 'Rostov Oblast , Bataysk', 'American soldier', '/source/img/portfolio', '/source/img/edward', 4, 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `gender`
--
ALTER TABLE `gender`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `participants`
--
ALTER TABLE `participants`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_project` (`id_project`);

--
-- Индексы таблицы `professions`
--
ALTER TABLE `professions`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_type_of_project` (`id_type_of_project`),
  ADD KEY `id_user` (`id_user`);

--
-- Индексы таблицы `series`
--
ALTER TABLE `series`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_the_scripts` (`id_the_script`);

--
-- Индексы таблицы `the_scripts`
--
ALTER TABLE `the_scripts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_projects` (`id_project`);

--
-- Индексы таблицы `timetable`
--
ALTER TABLE `timetable`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_project` (`id_project`);

--
-- Индексы таблицы `types_of_projects`
--
ALTER TABLE `types_of_projects`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_profession` (`id_profession`),
  ADD KEY `id_gender` (`id_gender`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `gender`
--
ALTER TABLE `gender`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `participants`
--
ALTER TABLE `participants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `professions`
--
ALTER TABLE `professions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `series`
--
ALTER TABLE `series`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT для таблицы `the_scripts`
--
ALTER TABLE `the_scripts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `timetable`
--
ALTER TABLE `timetable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `types_of_projects`
--
ALTER TABLE `types_of_projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `participants`
--
ALTER TABLE `participants`
  ADD CONSTRAINT `participants_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `participants_ibfk_2` FOREIGN KEY (`id_project`) REFERENCES `projects` (`id`);

--
-- Ограничения внешнего ключа таблицы `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `projects_ibfk_3` FOREIGN KEY (`id_type_of_project`) REFERENCES `types_of_projects` (`id`),
  ADD CONSTRAINT `projects_ibfk_4` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Ограничения внешнего ключа таблицы `series`
--
ALTER TABLE `series`
  ADD CONSTRAINT `series_ibfk_1` FOREIGN KEY (`id_the_script`) REFERENCES `the_scripts` (`id`);

--
-- Ограничения внешнего ключа таблицы `the_scripts`
--
ALTER TABLE `the_scripts`
  ADD CONSTRAINT `the_scripts_ibfk_1` FOREIGN KEY (`id_project`) REFERENCES `projects` (`id`);

--
-- Ограничения внешнего ключа таблицы `timetable`
--
ALTER TABLE `timetable`
  ADD CONSTRAINT `timetable_ibfk_1` FOREIGN KEY (`id_project`) REFERENCES `projects` (`id`);

--
-- Ограничения внешнего ключа таблицы `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_profession`) REFERENCES `professions` (`id`),
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`id_gender`) REFERENCES `gender` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
