-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 13 2019 г., 06:51
-- Версия сервера: 10.3.13-MariaDB
-- Версия PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `notcli`
--

-- --------------------------------------------------------

--
-- Структура таблицы `files`
--

CREATE TABLE `files` (
  `id` int(11) NOT NULL,
  `filename` varchar(250) NOT NULL,
  `user_id` int(11) NOT NULL,
  `fileway` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `files`
--

INSERT INTO `files` (`id`, `filename`, `user_id`, `fileway`) VALUES
(1, '1dubinina_d_n_mir_vokrug_menya', 28, '9cf986aba742b9457995760837eed9cf'),
(2, '1dubinina_d_n_mir_vokrug_menya', 28, '377079651369bd51743af92f1ad911c4'),
(3, '1dubinina_d_n_mir_vokrug_menya', 28, '9e6359d8a45d78d35c6fcd622fe6ce75'),
(4, '1dubinina_d_n_mir_vokrug_menya', 28, 'aa172d0f2342180184bfb456b6dda8ca'),
(5, '1dubinina_d_n_mir_vokrug_menya', 28, '0c435f8418f282c8952832fb6d4ede38'),
(6, 'Minecraft. Программируй свой мир (ClearScan)', 28, 'b5b2bc0330f1f4442b0784ee66c1286b'),
(7, '1dubinina_d_n_mir_vokrug_menya', 28, 'c033be65cc13e4943f85d1e289a9b46d'),
(8, 'Minecraft. Программируй свой мир (ClearScan)', 28, '8453b673c855466e02d2cee6be648f3e'),
(9, 'Minecraft. Программируй свой мир (ClearScan)', 28, 'bcf31bd20418aca2d35ab0e44a08cb20'),
(10, 'Minecraft. Программируй свой мир (ClearScan)', 28, 'd4048a4bbf947bc14a5642e2b67c1a89'),
(11, 'Minecraft. Программируй свой мир (ClearScan)', 28, '8263cedf2059eb08ca754c28e8da216c'),
(12, '1dubinina_d_n_mir_vokrug_menya', 28, '214880449a485d3f7ff07273e10db6e4'),
(13, '1dubinina_d_n_mir_vokrug_menya', 28, '1906fd1efe26e21f1925387db274d73b'),
(14, 'e2ac5c6f633dbc8778b614a70082dfc2', 28, './uploads/b/4/b4440b12863f338a82236639ae93abe4.pdf'),
(15, '847b621b7923594b698ea40a9ea78d2d', 28, './uploads/3/5/358455358628cc8d2b875dc0e419bfe3.pdf'),
(16, '6f0ce3e42a5b30949261b875a8c7ed40', 28, './uploads/7/9/79c946f01628f4de348bf010599fb7fa.pdf'),
(17, 'c525cc3446125ff33971e393e3c294f3', 28, './uploads/9/f/9f484da4346de82eacad0dfa8b86d1db.pdf'),
(18, '313384db1556abdc52a419a6ad1128ab', 28, './uploads/3/7/374ba18b07948a95ca447af7ab1a1e15.pdf'),
(19, '3aec2408df74a78031eb7376bf76c583', 28, './uploads/2/c/2cddf27af49ab76920aae2f88f2eedb4.pdf'),
(20, 'ee6d6325a795e724d5849b5425513c48', 28, './uploads/5/6/569b6db431c3d58fdfe20ea3b25834a2.pdf'),
(21, '87d32a9ff339edfabc28964f3ccd7fe7', 28, './uploads/8/a/8a6150f9131a0fba1e6c88a31bb146a1.pdf'),
(22, '78e9918800af2f75cc7471783f0e3629', 28, './uploads/b/9/b9a566d10f8143d3bfde15f32fe8a99e.pdf'),
(23, 'd02f63dfe70b75f6cbec792a0ad2c4e3', 28, './uploads/7/5/75a5262f54c27f48fe3a78e2419af147.pdf'),
(24, '41a1e0643042be168ffa2f14e4f255e9', 28, './uploads/0/0/004a397c4d4532a1a4063cf467147947.pdf'),
(25, 'e0c8cd7532ea9048abe09f854e598311', 28, './uploads/6/3/63b60306504a294cd77a83393cf1e162.pdf'),
(26, 'd9101f70c5b1949efac924ae18b589c8', 28, './uploads/4/1/4185ab905ca0854d9daedbe1de707f76.pdf'),
(27, 'dceab7f1156aa4e14c214abb922dd52d', 28, './uploads/3/6/36316ea2ae6f3edf756a62972a6f3e8b.pdf'),
(28, 'f8678c4cc0d9bcb729c595ec128ce06f', 28, './uploads/8/b/8b41c34dfd706cea0e8d1be8a11f8e11.pdf'),
(29, 'b5e34384e1d44fd0d6720b9dcfb864a4', 28, './uploads/f/4/f42da449b3a45f255074a7b1c07dcaf0.pdf'),
(30, '2b690b706b114a0efaba912ef42c3a53', 28, './uploads/6/1/611ab373a4c4300fc33cb4ff9638c1bd.pdf'),
(31, '721eb5fb4ac901e57ec3f08838ea9e6d', 28, './uploads/c/6/c601d9e8b8fdbc416274749030d2020a.pdf'),
(32, '47350ea7c80505331e3a4b8b99148a38', 28, './uploads/1/7/17088c7a2fe3b77aaf9077615549e014.pdf'),
(33, 'e85da59c388d36c4c1bce9a397151ea2', 28, './uploads/b/8/b80e41ddb05fe5dfef8ab484a8e4df61.pdf'),
(34, '1c97eadfe3ab3570f73c104933ea4a7f', 28, './uploads/9/4/9457bc7b73e85d8e4f27c93e27bb803b.pdf'),
(35, '41b5b5edf1bb9050e6adfede40110fa4', 28, './uploads/1/f/1febc3b234a2bc04fa2070ae06777999.pdf'),
(36, '1849dac4aa083bc326ba7a54873ecf16', 28, './uploads/3/3/33d7a40199318a91f7f3a84c7b08d1a0.pdf'),
(37, 'c848f82cc2d7b0c4f2c857f84469cf00', 28, './uploads/1/6/169117e40a5311c6f93be8febf53ed31.pdf'),
(38, '18a2830f3bca7409f213b3f5d0baa12a', 28, './uploads/e/c/ec82d836a6b34d0343fb3ddc9481c13d.pdf'),
(39, '27e280e1ffd0c755060f90f9310463b1', 28, './uploads/a/4/a49e094e540ce26420e65a0b0f5d5c8b.pdf'),
(40, '70e1b333792eaa13a9066bf9025c630a', 28, './uploads/c/5/c52d3f86e2ba48a96ee6518aadf60dfe.pdf'),
(41, '0f482f0dc4e9a67d8a297cd9aade222a', 28, './uploads/6/a/6ae83301b41ff7efa187e7c87a3c1b95.pdf'),
(42, '14c2d7babb19d082bc1be1075c5ccbb4', 28, './uploads/2/7/27ce62bcede4fab37b90e25cbb2c05dd.pdf'),
(43, '95203922122d2330f71a00fe427b43df', 28, './uploads/4/a/4a8ee169b81124908b8c8e78b7acd962.pdf'),
(44, '8e97cfd1b054362956a0e10cb715b87a', 28, './uploads/7/a/7a511030a9a0f28762744b1975c749cc.pdf'),
(45, '3d54e2e91f02e71b97bf3718282ccb56', 28, './uploads/3/d/3df28411bb833803c12bd6cf548ddbfb.pdf'),
(46, '525dff2a55450ec57d5688fc6fa70075', 28, './uploads/7/e/7ee1158803153ca9162fe34696cc41ef.pdf'),
(47, '5ec55c0b5af1ab891953d0e5c61f3bd2', 28, './uploads/1/6/1677c91bb906cd3c60ce8afd78f22f8c.pdf'),
(48, '0b39505032bb37ef6e92a44f9b55ea09', 28, './uploads/e/a/ea014a74c66f67990984e6d2f47bae01.pdf'),
(49, 'fb15df6d0a2211239204aeb9d275032f', 28, './uploads/e/d/ed211d1823da551a8999164f2fcaa41a.pdf'),
(50, 'f5d10a3c369ee749d6c8ed6d33b514e7', 28, './uploads/c/5/c51f9fce8a6e37cf58cae3b68589b9a8.pdf'),
(51, '57c4a03e545d9a4e1c16d73dc45d26a6', 30, './uploads/1/a/1a06b04734335939a4b0912435171d80.pdf'),
(52, '74bddf013d574f3b8a1f41e1bccdd67b', 31, './uploads/2/5/25c005493c542ec158f83a5902f825bd.pdf'),
(53, '88ce415a0c06dab0adc6ab04e24cdbd9', 31, './uploads/c/7/c7fb94f2c4edf4641ea17aefe6bf51ee.pdf'),
(54, 'b8ac66103b63a193d2af949070f70054', 31, './uploads/5/e/5e2c9bb26958769ba3264c66aed1586d.pdf'),
(55, 'e5a1bf9c9411cbeabf7d72de4045285b', 31, './uploads/e/0/e0668e0ed2d9ba74d3a580f4bcba8e1f.pdf'),
(56, '3aee6ca90154bf60b9784a13796c2ad4', 31, './uploads/d/b/db5d35903927599c7973be088fc24b1c.pdf'),
(57, '38a939bdd1cf6b3e397ddf005c4910a1', 28, './uploads/7/2/727fdc87fa990f6e4a78c2c490fc91f5.pdf'),
(58, 'e4e0503ab8c2a33e590de51dd6dd6058', 28, './uploads/0/9/093f6a548d9437e0e44a000dc771a325.pdf'),
(59, 'b6e7c5d0a3a08fd0f431c477fbff2630', 28, './uploads/9/8/983f0886f2d3123f460f88ec68f778da.pdf'),
(60, '33b89a94cac8b5a9b5e844d2ef4ff7b1', 28, './uploads/8/5/85ab6ff348cf33faa4c38f63d0794ac2.pdf'),
(61, 'c20f706bff0a3daefd5a1cd16daf0931', 28, './uploads/4/e/4e5f020ca924e24f3bad39511e740376.pdf'),
(62, '09ee36dd3b021d01138fa2e140f60b25', 28, './uploads/1/c/1c892e0bf1d7110a9f20bebebf380731.pdf'),
(63, '0c6b9e46988286c2781bff0a33fb752f', 28, './uploads/2/0/207863448ce2132b6110dee3a5a3b5c9.pdf'),
(64, 'a4d9a2502e4b468190a34e7abdc546b6', 28, './uploads/4/c/4ce3e8ec051f1ea0375373b8c67e05bd.pdf'),
(65, '7e5cb6daf503cdeaff7925df56f4dd0b', 28, './uploads/3/9/39eb45c5626f9dd2b9562f04b08bf4c7.pdf'),
(66, 'b07043b517544be190922eb9888ce8ca', 30, './uploads/a/b/ab0a0fd823f1784a65fdce1e590dfa1d.pdf'),
(67, 'ce36c19e9f9960317386a10522693e09', 30, './uploads/0/b/0b8fe3b1e54de455095f4ad270f3c6f7.pdf'),
(68, 'f9a46dbc6cf64519e8dc1f3be8ff86b0', 30, './uploads/1/5/15f353ee6314d4a455bfbf03a7f6cd14.pdf'),
(69, '49f466830323ee4f3d7175e99b645d15', 30, './uploads/f/6/f69582f3536101949c89fe408df8cdba.pdf'),
(70, '41452cdc6c5db29f879061100e21cbf6', 30, './uploads/0/6/06d602f0914af81f3e45c56198e65556.pdf'),
(71, '395d661ade4886fb485ae18546583707', 30, './uploads/8/b/8b8313295359caf295c849502724dcc9.pdf'),
(72, '3971b9e25492ff4d4ee2bbc241b171d9', 28, './uploads/8/a/8adb8a73e6e58f2cdcbd248365fbf745.pdf'),
(73, 'e62681a7310b7e1624fc935d4b50f773', 30, './uploads/5/7/574d1e2c630865fc74dc3b637a7b46ed.pdf'),
(74, '6a26bda0314223a7888f4191a690e793', 30, './uploads/c/a/ca1e7010d3013ed00311d9df525703ee.pdf'),
(75, 'ab5fc283515db7ab5c44bffe4e3462e1', 32, './uploads/1/0/1013c20d6f8c6770b708b5ed6676f660.pdf'),
(76, '08efab6185be656cee6f0ff209e40264', 32, './uploads/a/8/a83ff94aa7ae2cca11cdcc47bcd399ad.pdf'),
(77, '6e01e4e54f0cd88d16e72f094d07fc5c', 32, './uploads/7/c/7cee093fdd6c044fd4f46edc2b64e727.pdf'),
(78, 'dc0269f09a2e6cb7e00fa26982831e46', 31, './uploads/3/9/39ae619694f5cc0d1641f9556a68fb0e.pdf'),
(79, '15f4aab80ab10e6ef113485547a4fcb0', 28, './uploads/f/9/f9c6659d352f1c4374046fd74e80fed7.pdf');

-- --------------------------------------------------------

--
-- Структура таблицы `tasks`
--

CREATE TABLE `tasks` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_check` int(11) NOT NULL,
  `tasks` varchar(100) NOT NULL,
  `file_key` int(11) NOT NULL,
  `task_check` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `tasks`
--

INSERT INTO `tasks` (`id`, `user_id`, `user_check`, `tasks`, `file_key`, `task_check`) VALUES
(2, 31, 31, 'fadfad', 53, 0),
(3, 31, 31, 'fadfad', 54, 0),
(4, 31, 31, 'fadfad', 55, 0),
(5, 31, 31, 'fadfad', 56, 0),
(6, 30, 30, 'fadfad', 66, 0),
(7, 30, 1, 'fadfad', 71, 0),
(8, 28, 0, 'adfad', 72, 0),
(9, 31, 0, 'fadf', 78, 0),
(10, 28, 0, 'add new tasks', 79, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `login` varchar(50) NOT NULL,
  `password` varchar(250) NOT NULL,
  `check_user` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `login`, `password`, `check_user`) VALUES
(28, 'Mihail', 'Mihab', '$2y$13$3jW0AU/3dcTkCKyDgYLMPOLXTcQnkr3jb/713kgcDIyx05VsFdoYy', 0),
(29, 'Sergey', 'Serg', '$2y$13$Qkj1f.UakvJeXHzOtpYvoeH/J8TVxEJ8QdYKmpWHS1OAxzKdZFiTm', 0),
(30, 'Qwerty', 'Qwerty', '$2y$13$Q3t8pzfo8ULT3h9yZf8Dzu9lm4wt1J7Xo3KETlkFyCEk251x.O.SC', 1),
(31, '789', '789', '$2y$13$FxBXuKqR8fh/ajeqxf0Sd.W//BMu89yyCqCz8JUAng.HNEzY7cHPO', 0),
(32, '147', '147', '$2y$13$TX.56ZXDSRoc..lPaAk4JOpGJ6TIP7v1h8ToR2yYOKDmlPtG2THSi', 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `files_users` (`user_id`);

--
-- Индексы таблицы `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tasks_file` (`file_key`),
  ADD KEY `tasks_user` (`user_id`),
  ADD KEY `tasks_user_check` (`user_check`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT для таблицы `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `files`
--
ALTER TABLE `files`
  ADD CONSTRAINT `files_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `tasks_file` FOREIGN KEY (`file_key`) REFERENCES `files` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tasks_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
