-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 26 2021 г., 20:27
-- Версия сервера: 8.0.19
-- Версия PHP: 7.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `library`
--

-- --------------------------------------------------------

--
-- Структура таблицы `author`
--

CREATE TABLE `author` (
  `id` int NOT NULL,
  `material_id` int NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `author`
--

INSERT INTO `author` (`id`, `material_id`, `title`) VALUES
(1, 1, 'Разин'),
(2, 1, 'Киричек'),
(3, 2, 'Селезнёв'),
(4, 2, 'Азаров');

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id` int NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `title`) VALUES
(1, 'Деловые/Бизнес-процессы'),
(2, 'Деловые/Найм'),
(3, 'Деловые/Реклама'),
(4, 'Деловые/Управление бизнесом'),
(5, 'Деловые/Управление людьми'),
(6, 'Деловые/Управление проектами'),
(7, 'Детские/Воспитание'),
(8, 'Дизайн/Общее'),
(9, 'Дизайн/Logo'),
(10, 'Дизайн/Web'),
(11, 'Разработка/PHP'),
(12, 'Разработка/HTML и CSS'),
(13, 'Разработка/Проектирование');

-- --------------------------------------------------------

--
-- Структура таблицы `link`
--

CREATE TABLE `link` (
  `id` int NOT NULL,
  `material_id` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `link`
--

INSERT INTO `link` (`id`, `material_id`, `title`, `url`) VALUES
(19, 1, 'ya.ru', 'http://ya.ru'),
(20, 1, 'Почта 33', 'http://mail.ru'),
(22, 1, 'Яндекс ddd', 'http://yiiframework.ru'),
(23, 11, 'Стаья', 'https://habr.com/ru/post/333398/'),
(24, 12, 'Ссылка на блог', 'https://glebkalinin.ru'),
(25, 13, 'https://webformyself.com/category/frejmvorki-2/yii2/', 'https://webformyself.com/category/frejmvorki-2/yii2/');

-- --------------------------------------------------------

--
-- Структура таблицы `material`
--

CREATE TABLE `material` (
  `id` int NOT NULL,
  `type_id` int NOT NULL,
  `category_id` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `author` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `material`
--

INSERT INTO `material` (`id`, `type_id`, `category_id`, `title`, `description`, `author`) VALUES
(10, 1, 10, 'Не заставляйте меня думать. Веб-юзабилити и здравый смысл', 'Мобильные приложения и веб-сайты – визитные карточки компаний. От них в большой степени зависит, задержится пользователь или предпочтет провести время у конкурента. В своей книге Стив Круг с примерами и иллюстрациями расскажет, как избежать ошибок и создать надежный сервис с пользой для клиента.', ' Стив Круг'),
(11, 2, 11, 'Поговорим о Yii 2', 'Yii, вероятно, самый популярный PHP фреймворк на просторах СНГ.\r\nМногие годы он был замечательным инструментом и помогал нам зарабатывать на хлеб с маслом.', 'rsvasilyev'),
(12, 4, 13, 'Блог Глеба Калинина', 'Я предприниматель, разработчик цифровых продуктов, независимый исследователь. Я — сертифицированный преподаватель практик осознанности (светский подход). Обучаю практикам внимательности (медитация), учу справляться со стрессом, находить в жизни радость.', 'Глеб Калинин'),
(13, 5, 11, 'Статьи о Yii 2', 'Какой путь обычно проходит PHP разработчик? Сначала он пишет с нуля, пробует, делает всё на элементарных примерах. Создает свои функции, классы, файлы, структуру, изобретает свои велосипеды. Это очень хорошо на первых этапах.', '');

-- --------------------------------------------------------

--
-- Структура таблицы `material_tag`
--

CREATE TABLE `material_tag` (
  `id` int NOT NULL,
  `material_id` int NOT NULL,
  `tag_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `material_tag`
--

INSERT INTO `material_tag` (`id`, `material_id`, `tag_id`) VALUES
(33, 1, 2),
(34, 1, 1),
(35, 10, 3),
(36, 10, 4),
(37, 11, 1),
(38, 11, 4),
(39, 12, 3),
(40, 13, 4),
(41, 10, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `tag`
--

CREATE TABLE `tag` (
  `id` int NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `tag`
--

INSERT INTO `tag` (`id`, `title`) VALUES
(1, 'Саморазвитие'),
(2, 'Личностный рост'),
(3, 'Мотивация'),
(4, 'Карьера');

-- --------------------------------------------------------

--
-- Структура таблицы `type`
--

CREATE TABLE `type` (
  `id` int NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `type`
--

INSERT INTO `type` (`id`, `title`) VALUES
(1, 'Книга'),
(2, 'Статья'),
(3, 'Видео'),
(4, 'Сайт/Блог'),
(5, 'Подборка'),
(6, 'Ключевые идеи книги');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `link`
--
ALTER TABLE `link`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `material`
--
ALTER TABLE `material`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `material_tag`
--
ALTER TABLE `material_tag`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `author`
--
ALTER TABLE `author`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `link`
--
ALTER TABLE `link`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT для таблицы `material`
--
ALTER TABLE `material`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `material_tag`
--
ALTER TABLE `material_tag`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT для таблицы `tag`
--
ALTER TABLE `tag`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `type`
--
ALTER TABLE `type`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
