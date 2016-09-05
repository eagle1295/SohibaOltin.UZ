-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Авг 27 2016 г., 00:12
-- Версия сервера: 5.1.41
-- Версия PHP: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `oltinsohiba`
--

-- --------------------------------------------------------

--
-- Структура таблицы `clients`
--

CREATE TABLE IF NOT EXISTS `clients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ismi` text CHARACTER SET utf8 NOT NULL,
  `familiyasi` text CHARACTER SET utf8 NOT NULL,
  `otasining_ismi` text CHARACTER SET utf8 NOT NULL,
  `tugilgan_sana` text CHARACTER SET utf8 NOT NULL,
  `tugilgan_joyi` text CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Дамп данных таблицы `clients`
--

INSERT INTO `clients` (`id`, `ismi`, `familiyasi`, `otasining_ismi`, `tugilgan_sana`, `tugilgan_joyi`) VALUES
(1, 'Ollobergan', 'Karimov', 'Rayimboy o''g''li', '12.06.1995', 'Yangibozor tumani'),
(4, 'ollobergan', 'Karimav', 'Rayimboy o''g''li', '12.06.1995', 'yangibozor tumani'),
(5, 'Hayitgul', 'Rahmatova', 'Yuldashevna', '1.09.1954', 'Urganch shahar'),
(6, 'Johongir', 'Hajboyev', 'Mohmudjonovich', '03.05.1998', 'Gurlan tumani'),
(7, 'Faxriddin', 'Eshchanov', 'Qodirberganovich', '30.10.1982', 'yangibozor tumani'),
(8, 'Jasur', 'Karimov', 'xxxx', '12.06.1985', 'yangibozor tumani');

-- --------------------------------------------------------

--
-- Структура таблицы `contract`
--

CREATE TABLE IF NOT EXISTS `contract` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `client_ID` int(11) NOT NULL,
  `pasport_seriya` varchar(20) CHARACTER SET utf8 NOT NULL,
  `tavar_nomi` text CHARACTER SET utf8 NOT NULL,
  `bahosi` int(11) NOT NULL,
  `oldindan_tolovi` int(11) NOT NULL,
  `muddati` int(11) NOT NULL,
  `sana` date NOT NULL,
  `tel1` varchar(20) NOT NULL,
  `tel2` varchar(20) NOT NULL,
  `holati` int(11) NOT NULL COMMENT '1-bajarilyapti,2-tugagan',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Дамп данных таблицы `contract`
--

INSERT INTO `contract` (`id`, `client_ID`, `pasport_seriya`, `tavar_nomi`, `bahosi`, `oldindan_tolovi`, `muddati`, `sana`, `tel1`, `tel2`, `holati`) VALUES
(1, 4, 'AA5169163', 'Telefon', 1500000, 500000, 5, '2016-08-20', '+998975129881', '+998956069881', 1),
(2, 4, 'AA5169163', 'Televizor', 2400000, 1000000, 12, '2016-08-22', '+998975129881', '+998956069881', 1),
(4, 5, 'AA5169163', 'Artel televizor', 2400000, 500000, 30, '2016-08-22', '+998975129881', '+998956069881', 1),
(5, 6, 'AA5151685', 'Televizor', 1800000, 800000, 12, '2016-08-22', '+998975129881', '+998956069881', 1),
(6, 7, 'AA5151685', 'Telefon', 1400000, 250000, 6, '2016-08-23', '+998975129881', '+998956069881', 1),
(7, 8, 'AA5169163', 'Artel televizor 341', 2550000, 1548000, 6, '2016-08-26', '+998975129881', '+998956069881', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `payment`
--

CREATE TABLE IF NOT EXISTS `payment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `contract_ID` int(11) NOT NULL,
  `summa` int(11) NOT NULL,
  `sana` date NOT NULL,
  `turi` int(11) NOT NULL COMMENT '1-naqt,2-plastik,3-pulo''tkazish',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `payment`
--

INSERT INTO `payment` (`id`, `contract_ID`, `summa`, `sana`, `turi`) VALUES
(1, 6, 1000, '2016-08-24', 1),
(2, 6, 191000, '2016-08-24', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `test`
--

CREATE TABLE IF NOT EXISTS `test` (
  `test` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `test`
--

INSERT INTO `test` (`test`) VALUES
('asda'),
('dfgdfg'),
('dtgkhyu'),
('hjkhjk'),
('nm,n,mnm,'),
('yutuyt'),
('213123'),
('hgjhgk');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` text CHARACTER SET utf8 NOT NULL,
  `parol` text CHARACTER SET utf8 NOT NULL,
  `ism` text CHARACTER SET utf8 NOT NULL,
  `familiya` text CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `parol`, `ism`, `familiya`) VALUES
(1, 'admin', 'eeff6e277a20b17a8d2904afd044f171', 'Ollobergan', 'Karimov');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
