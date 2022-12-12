-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Мар 14 2022 г., 13:51
-- Версия сервера: 10.4.21-MariaDB
-- Версия PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `diploma`
--

-- --------------------------------------------------------

--
-- Структура таблицы `class`
--

CREATE TABLE `class` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `num_of_students` int(11) NOT NULL,
  `class_code` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `enrollment`
--

CREATE TABLE `enrollment` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `motivation`
--

CREATE TABLE `motivation` (
  `id` int(11) NOT NULL,
  `citates` text NOT NULL,
  `author` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `plagiarism_project`
--

CREATE TABLE `plagiarism_project` (
  `id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `file` longblob NOT NULL,
  `result_percentage` float NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `plagiarism_task`
--

CREATE TABLE `plagiarism_task` (
  `id` int(11) NOT NULL,
  `task_id` int(11) NOT NULL,
  `file` longblob NOT NULL,
  `result_percentage` float NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `project`
--

CREATE TABLE `project` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `deadline` date NOT NULL,
  `points` int(11) NOT NULL,
  `mission` text NOT NULL,
  `bonus` text NOT NULL,
  `file` longblob NOT NULL,
  `plagiarism_statistics` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `surname` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `birth_date` date NOT NULL,
  `image` longblob NOT NULL,
  `class_id` int(11) DEFAULT NULL,
  `gender` varchar(30) NOT NULL,
  `token` text NOT NULL,
  `verified_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `subproject`
--

CREATE TABLE `subproject` (
  `id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `plagiarism_statistics` float NOT NULL,
  `file` longblob NOT NULL,
  `timeline` date NOT NULL,
  `point` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `subtask`
--

CREATE TABLE `subtask` (
  `id` int(11) NOT NULL,
  `priority` int(11) NOT NULL,
  `timeline` date NOT NULL,
  `task_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `point` float NOT NULL,
  `upload_file` longblob NOT NULL,
  `plagiarism_statistics` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `task`
--

CREATE TABLE `task` (
  `id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `aver_time` int(11) NOT NULL,
  `mission_of_task` text NOT NULL,
  `points` int(11) NOT NULL,
  `deadline` date NOT NULL,
  `plagiarism_statistics` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `teacher`
--

CREATE TABLE `teacher` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `surname` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `birth_date` date NOT NULL,
  `gender` varchar(30) NOT NULL,
  `image` longblob NOT NULL,
  `token` text NOT NULL,
  `verified_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `test`
--

CREATE TABLE `test` (
  `id` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `pass` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `test`
--

INSERT INTO `test` (`id`, `email`, `pass`) VALUES
(1, 'magzhan@gmail.com', '12345');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `surname` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `gender` varchar(10) NOT NULL,
  `token` text NOT NULL,
  `verified_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`id`),
  ADD KEY `class_teacher_id` (`teacher_id`);

--
-- Индексы таблицы `enrollment`
--
ALTER TABLE `enrollment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_enrollment_id` (`student_id`),
  ADD KEY `class_enrollment_id` (`class_id`);

--
-- Индексы таблицы `motivation`
--
ALTER TABLE `motivation`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `plagiarism_project`
--
ALTER TABLE `plagiarism_project`
  ADD PRIMARY KEY (`id`),
  ADD KEY `plagiarism_project_id` (`project_id`);

--
-- Индексы таблицы `plagiarism_task`
--
ALTER TABLE `plagiarism_task`
  ADD PRIMARY KEY (`id`),
  ADD KEY `plagiarism_task_id` (`task_id`);

--
-- Индексы таблицы `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_teacher_id` (`teacher_id`);

--
-- Индексы таблицы `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`),
  ADD KEY `class_student_id` (`class_id`);

--
-- Индексы таблицы `subproject`
--
ALTER TABLE `subproject`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subproject_project_id` (`project_id`),
  ADD KEY `subproject_student_id` (`student_id`);

--
-- Индексы таблицы `subtask`
--
ALTER TABLE `subtask`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subtask_task_id` (`task_id`),
  ADD KEY `subtask_student_id` (`student_id`);

--
-- Индексы таблицы `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`id`),
  ADD KEY `task_teacher_id` (`teacher_id`);

--
-- Индексы таблицы `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `class`
--
ALTER TABLE `class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `enrollment`
--
ALTER TABLE `enrollment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `motivation`
--
ALTER TABLE `motivation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `plagiarism_project`
--
ALTER TABLE `plagiarism_project`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `plagiarism_task`
--
ALTER TABLE `plagiarism_task`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `project`
--
ALTER TABLE `project`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `subproject`
--
ALTER TABLE `subproject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `subtask`
--
ALTER TABLE `subtask`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `task`
--
ALTER TABLE `task`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `teacher`
--
ALTER TABLE `teacher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `test`
--
ALTER TABLE `test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `enrollment`
--
ALTER TABLE `enrollment`
  ADD CONSTRAINT `class_enrollment_id` FOREIGN KEY (`class_id`) REFERENCES `class` (`id`),
  ADD CONSTRAINT `student_enrollment_id` FOREIGN KEY (`student_id`) REFERENCES `student` (`id`);

--
-- Ограничения внешнего ключа таблицы `plagiarism_project`
--
ALTER TABLE `plagiarism_project`
  ADD CONSTRAINT `plagiarism_project_id` FOREIGN KEY (`project_id`) REFERENCES `project` (`id`);

--
-- Ограничения внешнего ключа таблицы `plagiarism_task`
--
ALTER TABLE `plagiarism_task`
  ADD CONSTRAINT `plagiarism_task_id` FOREIGN KEY (`task_id`) REFERENCES `task` (`id`);

--
-- Ограничения внешнего ключа таблицы `project`
--
ALTER TABLE `project`
  ADD CONSTRAINT `project_teacher_id` FOREIGN KEY (`teacher_id`) REFERENCES `teacher` (`id`);

--
-- Ограничения внешнего ключа таблицы `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `class_student_id` FOREIGN KEY (`class_id`) REFERENCES `class` (`id`);

--
-- Ограничения внешнего ключа таблицы `subproject`
--
ALTER TABLE `subproject`
  ADD CONSTRAINT `subproject_project_id` FOREIGN KEY (`project_id`) REFERENCES `project` (`id`),
  ADD CONSTRAINT `subproject_student_id` FOREIGN KEY (`student_id`) REFERENCES `student` (`id`);

--
-- Ограничения внешнего ключа таблицы `subtask`
--
ALTER TABLE `subtask`
  ADD CONSTRAINT `subtask_student_id` FOREIGN KEY (`student_id`) REFERENCES `student` (`id`),
  ADD CONSTRAINT `subtask_task_id` FOREIGN KEY (`task_id`) REFERENCES `task` (`id`);

--
-- Ограничения внешнего ключа таблицы `task`
--
ALTER TABLE `task`
  ADD CONSTRAINT `task_teacher_id` FOREIGN KEY (`teacher_id`) REFERENCES `teacher` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
