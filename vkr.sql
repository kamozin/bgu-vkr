--
-- Скрипт сгенерирован Devart dbForge Studio for MySQL, Версия 7.1.13.0
-- Домашняя страница продукта: http://www.devart.com/ru/dbforge/mysql/studio
-- Дата скрипта: 28.06.2016 8:49:02
-- Версия сервера: 5.5.5-10.1.9-MariaDB
-- Версия клиента: 4.1
--


-- 
-- Отключение внешних ключей
-- 
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;

-- 
-- Установить режим SQL (SQL mode)
-- 
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- 
-- Установка кодировки, с использованием которой клиент будет посылать запросы на сервер
--
SET NAMES 'utf8';

-- 
-- Установка базы данных по умолчанию
--
USE vkr;

--
-- Описание для таблицы fakultet
--
DROP TABLE IF EXISTS fakultet;
CREATE TABLE fakultet (
  id INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  name_fakultet VARCHAR(255) NOT NULL,
  url_fakultet VARCHAR(255) NOT NULL,
  dt VARCHAR(255) NOT NULL,
  remember_token VARCHAR(100) DEFAULT NULL,
  created_at TIMESTAMP NOT NULL DEFAULT '0000-00-00 00:00:00',
  updated_at TIMESTAMP NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (id)
)
ENGINE = INNODB
AUTO_INCREMENT = 12
AVG_ROW_LENGTH = 1489
CHARACTER SET utf8
COLLATE utf8_unicode_ci;

--
-- Описание для таблицы migrations
--
DROP TABLE IF EXISTS migrations;
CREATE TABLE migrations (
  migration VARCHAR(255) NOT NULL,
  batch INT(11) NOT NULL
)
ENGINE = INNODB
AVG_ROW_LENGTH = 2730
CHARACTER SET utf8
COLLATE utf8_unicode_ci;

--
-- Описание для таблицы password_resets
--
DROP TABLE IF EXISTS password_resets;
CREATE TABLE password_resets (
  email VARCHAR(255) NOT NULL,
  token VARCHAR(255) NOT NULL,
  created_at TIMESTAMP NOT NULL DEFAULT '0000-00-00 00:00:00',
  INDEX password_resets_email_index (email),
  INDEX password_resets_token_index (token)
)
ENGINE = INNODB
CHARACTER SET utf8
COLLATE utf8_unicode_ci;

--
-- Описание для таблицы users
--
DROP TABLE IF EXISTS users;
CREATE TABLE users (
  id INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  name VARCHAR(255) NOT NULL,
  email VARCHAR(255) NOT NULL,
  password VARCHAR(60) NOT NULL,
  role VARCHAR(255) DEFAULT NULL,
  remember_token VARCHAR(100) DEFAULT NULL,
  created_at TIMESTAMP NOT NULL DEFAULT '0000-00-00 00:00:00',
  updated_at TIMESTAMP NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (id),
  UNIQUE INDEX users_email_unique (email)
)
ENGINE = INNODB
AUTO_INCREMENT = 11
AVG_ROW_LENGTH = 5461
CHARACTER SET utf8
COLLATE utf8_unicode_ci;

--
-- Описание для таблицы vkr
--
DROP TABLE IF EXISTS vkr;
CREATE TABLE vkr (
  id INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  name_file VARCHAR(255) NOT NULL,
  family VARCHAR(255) NOT NULL,
  name VARCHAR(255) NOT NULL,
  otchestvo VARCHAR(255) NOT NULL,
  id_fakultet VARCHAR(255) NOT NULL,
  napravlenie_podgotovki VARCHAR(255) NOT NULL,
  profile VARCHAR(255) NOT NULL,
  tema VARCHAR(255) NOT NULL,
  dt VARCHAR(255) NOT NULL,
  remember_token VARCHAR(100) DEFAULT NULL,
  created_at TIMESTAMP NOT NULL DEFAULT '0000-00-00 00:00:00',
  updated_at TIMESTAMP NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (id)
)
ENGINE = INNODB
AUTO_INCREMENT = 5
AVG_ROW_LENGTH = 8192
CHARACTER SET utf8
COLLATE utf8_unicode_ci;

--
-- Описание для таблицы year
--
DROP TABLE IF EXISTS year;
CREATE TABLE year (
  id INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  year INT(11) NOT NULL,
  deleted_at TIMESTAMP NULL DEFAULT NULL,
  remember_token VARCHAR(100) DEFAULT NULL,
  created_at TIMESTAMP NOT NULL DEFAULT '0000-00-00 00:00:00',
  updated_at TIMESTAMP NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (id)
)
ENGINE = INNODB
AUTO_INCREMENT = 4
AVG_ROW_LENGTH = 8192
CHARACTER SET utf8
COLLATE utf8_unicode_ci;

-- 
-- Вывод данных для таблицы fakultet
--
INSERT INTO fakultet VALUES
(1, 'Финансово-экономический факультет', 'finansovo-ekonomicheskiy-fakultet', '23.06.2016', NULL, '2016-06-23 14:05:28', '2016-06-23 15:23:32'),
(2, 'Филологический факультет', 'filologicheskiy-fakultet', '23.06.2016', NULL, '2016-06-23 14:11:53', '2016-06-23 14:11:53'),
(3, 'Факультет иностранных языков', 'fakultet-inostrannyih-yazyikov', '23.06.2016', NULL, '2016-06-23 14:20:09', '2016-06-23 14:20:09'),
(4, 'Факультет истории и международных отношений', 'fakultet-istorii-i-mejdunarodnyih-otnosheniy', '23.06.2016', NULL, '2016-06-23 14:22:56', '2016-06-23 14:22:56'),
(5, 'Факультет педагогики и психологии', 'fakultet-pedagogiki-i-psihologii', '23.06.2016', NULL, '2016-06-23 14:47:26', '2016-06-23 14:47:26'),
(6, 'Факультет технологии и дизайна', 'fakultet-tehnologii-i-dizayna', '23.06.2016', NULL, '2016-06-23 14:47:39', '2016-06-23 14:47:39'),
(7, 'Факультет физической культуры', 'fakultet-fizicheskoy-kulturyi', '23.06.2016', NULL, '2016-06-23 14:47:55', '2016-06-23 14:47:55'),
(8, 'Физико-математический факультет', 'fiziko-matematicheskiy-fakultet', '23.06.2016', NULL, '2016-06-23 14:55:39', '2016-06-23 14:55:39'),
(9, 'Естественно-географический факультет', 'estestvenno-geograficheskiy-fakultet', '23.06.2016', NULL, '2016-06-23 15:07:11', '2016-06-23 15:07:11'),
(10, 'Юридический факультет', 'yuridicheskiy-fakultet', '23.06.2016', NULL, '2016-06-23 15:07:23', '2016-06-23 15:07:23'),
(11, 'Филиал БГУ в г. Новозыбков', 'filial-bgu-v-g-novozyibkov', '23.06.2016', NULL, '2016-06-23 15:07:35', '2016-06-23 15:07:35');

-- 
-- Вывод данных для таблицы migrations
--
INSERT INTO migrations VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2016_06_23_082130_CreateFakultet', 1),
('2016_06_23_082318_CreateVkr', 1),
('2016_06_24_075201_create_vkrs_table', 2),
('2016_06_25_073126_CreateYear', 3);

-- 
-- Вывод данных для таблицы password_resets
--

-- Таблица vkr.password_resets не содержит данных

-- 
-- Вывод данных для таблицы users
--
INSERT INTO users VALUES
(2, 'admin', 'hrolenkov@yandex.ru', '$2y$10$MeZeXlaK0Tdx4Jcl3bbZgeNl0C8y5zW5cm4l1B7c.mbS3Fa8SNDEy', '1', 'rRFarjHHO8uI60JgSWLPjJOMhYhNr4xVW246plR13vyqPEohD8LcTXe6fjzP', '2016-06-23 10:17:32', '2016-06-27 11:00:34'),
(8, 'kamozin', 'hrolenkov111@yandex.ru', '$2y$10$ZSfBng8oGRnNkhBsYeG.aeUxlMA31YbFKUrX5uxhyruKf1o/9sS5.', '0', NULL, '2016-06-24 08:27:59', '2016-06-24 08:27:59'),
(9, 'Roman Khrolenkov', 'hrolenkov1111211@yandex.ru', '$2y$10$dJofgjGPjCcY/bQecQ0in.8.2VHs6N3YuWZQEIPlUXiysh0pNEMBe', '0', NULL, '2016-06-24 08:28:42', '2016-06-24 08:28:42'),
(10, 'kamozin16', 'hrolenkov22@yandex.ru', '$2y$10$UMCC2r7.WumcN36fiCiAEuAc6CT8BCey4M9LHosHg8g8WvMb4ejQi', '0', 'lyvxaOU9s8iWAM4NrWge4AfCXaWkan4mqW1afUUyWQourFNjav47EhhNlH9P', '2016-06-24 08:36:46', '2016-06-27 11:01:07');

-- 
-- Вывод данных для таблицы vkr
--
INSERT INTO vkr VALUES
(1, 'pr moya-1466780736.doc', 'Хроленков', 'Анабель', 'Александрович', '11', 'sadsdsad', 'dsasdsa', 'Тема', '1983', NULL, '2016-06-24 15:05:36', '2016-06-24 15:05:36'),
(2, '1-1466780836.pdf', 'Хроленков', 'Анабель', 'Александрович', '3', 'sadsdsad', 'dsasdsa', 'Тема', '2015', NULL, '2016-06-24 15:07:16', '2016-06-24 15:07:16'),
(3, '2-1467022281.docx', 'Хроленков     ', '     dr20086n     ', '     Александрович     ', '4', '     sadsdsad     ', '   dsasdsa     ', '   Тема 1    ', '   20166     ', NULL, '2016-06-24 15:08:29', '2016-06-27 10:11:21'),
(4, 'Anketa-investigasion-1466836408.docx', 'Хроленков', 'dr20086n', 'Александрович', '9', 'sadsdsad', 'dsasdsa', 'Тема', '2015', NULL, '2016-06-25 06:33:28', '2016-06-25 06:33:28');

-- 
-- Вывод данных для таблицы year
--
INSERT INTO year VALUES
(1, 2015, NULL, NULL, '2016-06-25 08:09:35', '2016-06-25 08:09:35'),
(2, 2016, NULL, NULL, '2016-06-25 08:09:55', '2016-06-25 08:09:55'),
(3, 2017, NULL, NULL, '2016-06-25 08:10:01', '2016-06-25 08:10:01');

-- 
-- Восстановить предыдущий режим SQL (SQL mode)
-- 
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;

-- 
-- Включение внешних ключей
-- 
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;