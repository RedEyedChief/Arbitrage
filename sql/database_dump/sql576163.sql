-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Май 11 2015 г., 13:09
-- Версия сервера: 5.5.25
-- Версия PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `sql576163`
--

DELIMITER $$
--
-- Процедуры
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `proc_disable_profile`()
    NO SQL
UPDATE `profile` SET `isActive`=0 WHERE 1$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Структура таблицы `area`
--

CREATE TABLE IF NOT EXISTS `area` (
  `idArea` int(11) NOT NULL,
  `nameArea` varchar(45) DEFAULT NULL,
  `Report_idReport` int(11) NOT NULL,
  `Price_idPrice` int(11) NOT NULL,
  PRIMARY KEY (`idArea`),
  KEY `fk_Area_Report1_idx` (`Report_idReport`),
  KEY `fk_Area_Price1_idx` (`Price_idPrice`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `area`
--

INSERT INTO `area` (`idArea`, `nameArea`, `Report_idReport`, `Price_idPrice`) VALUES
(0, 'Ukraine', 0, 1),
(1, 'Ukraine', 0, 0),
(2, 'Belarus', 0, 0),
(3, 'Belarus', 0, 1),
(4, 'Belarus', 0, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `article`
--

CREATE TABLE IF NOT EXISTS `article` (
  `idArticle` int(11) NOT NULL,
  `typeArticle` varchar(50) DEFAULT NULL,
  `headerArticle` varchar(50) DEFAULT NULL,
  `descriptionArticle` varchar(100) NOT NULL,
  `textArticle` varchar(2000) DEFAULT NULL,
  `dateArticle` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Profile_idProfile` int(11) NOT NULL,
  `viewsArticle` int(11) DEFAULT NULL,
  `imageArticle` binary(1) DEFAULT '0',
  PRIMARY KEY (`idArticle`),
  KEY `fk_Article_Profile1_idx` (`Profile_idProfile`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `categoryview`
--

CREATE TABLE IF NOT EXISTS `categoryview` (
  `idCategoryView` int(11) NOT NULL AUTO_INCREMENT,
  `dateCategoryView` date NOT NULL,
  `nameCategoryView` varchar(45) DEFAULT NULL,
  `numberCategoryView` int(11) DEFAULT '1',
  PRIMARY KEY (`idCategoryView`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `city`
--

CREATE TABLE IF NOT EXISTS `city` (
  `idCity` int(11) NOT NULL,
  `nameCity` varchar(45) DEFAULT NULL,
  `Area_idArea` int(11) NOT NULL,
  `isActiveCity` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idCity`),
  KEY `fk_City_Area1_idx` (`Area_idArea`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `city`
--

INSERT INTO `city` (`idCity`, `nameCity`, `Area_idArea`, `isActiveCity`) VALUES
(0, 'Kyiv', 0, 1),
(1, 'Lviv', 0, 1),
(2, 'Odessa', 0, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `idComment` int(11) NOT NULL AUTO_INCREMENT,
  `textComment` varchar(200) DEFAULT NULL,
  `userComment` varchar(45) DEFAULT NULL,
  `dateComment` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `voteUpComment` int(11) DEFAULT '0',
  `voteDownComment` int(11) DEFAULT '0',
  `Article_idArticle` int(11) NOT NULL,
  `Profile_idProfile` int(11) NOT NULL,
  PRIMARY KEY (`idComment`),
  KEY `fk_CommunityItems_Comunity1_idx` (`Article_idArticle`),
  KEY `fk_CommunityItems_Profile1_idx` (`Profile_idProfile`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `log`
--

CREATE TABLE IF NOT EXISTS `log` (
  `idLog` int(11) NOT NULL,
  `tagLog` varchar(45) DEFAULT NULL,
  `messageLog` varchar(45) DEFAULT NULL,
  `Report_idReport` int(11) NOT NULL,
  PRIMARY KEY (`idLog`),
  KEY `fk_Log_Report1_idx` (`Report_idReport`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `market`
--

CREATE TABLE IF NOT EXISTS `market` (
  `idMarket` int(11) NOT NULL,
  `nameMarket` varchar(45) DEFAULT NULL,
  `City_idCity` int(11) NOT NULL,
  PRIMARY KEY (`idMarket`),
  KEY `fk_Market_City1_idx` (`City_idCity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `market`
--

INSERT INTO `market` (`idMarket`, `nameMarket`, `City_idCity`) VALUES
(0, 'Besarabka', 0),
(1, 'Ptichka', 0),
(2, 'Central', 1),
(3, 'Radiomarket', 1),
(4, 'Privoz', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `parser`
--

CREATE TABLE IF NOT EXISTS `parser` (
  `idParser` int(11) NOT NULL,
  `rurlesParser` varchar(45) DEFAULT NULL,
  `nameParser` varchar(45) DEFAULT NULL,
  `adressParser` varchar(45) DEFAULT NULL,
  `Market_idMarket` int(11) NOT NULL,
  `Report_idReport` int(11) NOT NULL,
  PRIMARY KEY (`idParser`),
  KEY `fk_Parser_Market1_idx` (`Market_idMarket`),
  KEY `fk_Parser_Report1_idx` (`Report_idReport`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `poll`
--

CREATE TABLE IF NOT EXISTS `poll` (
  `idPoll` int(11) NOT NULL AUTO_INCREMENT,
  `namePoll` varchar(45) DEFAULT NULL,
  `countPoll` varchar(45) DEFAULT '0',
  `userPoll` binary(1) DEFAULT '0',
  `statePoll` binary(1) DEFAULT '1',
  `Profile_idProfile` int(11) NOT NULL,
  PRIMARY KEY (`idPoll`),
  KEY `fk_poll_Profile1_idx` (`Profile_idProfile`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `pollvote`
--

CREATE TABLE IF NOT EXISTS `pollvote` (
  `idPollVote` int(11) NOT NULL AUTO_INCREMENT,
  `numberPollVote` int(11) DEFAULT NULL,
  `textPollVote` varchar(45) DEFAULT NULL,
  `countPollVote` int(11) DEFAULT '0',
  `poll_idPoll` int(11) NOT NULL,
  PRIMARY KEY (`idPollVote`,`poll_idPoll`),
  KEY `fk_pollVote_poll1_idx` (`poll_idPoll`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `price`
--

CREATE TABLE IF NOT EXISTS `price` (
  `idPrice` int(11) NOT NULL,
  `namePrice` varchar(45) DEFAULT NULL,
  `costPrice` varchar(45) DEFAULT NULL,
  `Pricecol` varchar(45) DEFAULT NULL,
  `Report_idReport` int(11) NOT NULL,
  `isActivePrice` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idPrice`),
  KEY `fk_Price_Report1_idx` (`Report_idReport`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `price`
--

INSERT INTO `price` (`idPrice`, `namePrice`, `costPrice`, `Pricecol`, `Report_idReport`, `isActivePrice`) VALUES
(0, 'Light', '100', NULL, 0, 0),
(1, 'Deluxe', '500', NULL, 0, 1),
(2, 'Trial', '0', NULL, 0, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `idProduct` int(11) NOT NULL,
  `nameProduct` varchar(45) DEFAULT NULL,
  `countProduct` varchar(45) DEFAULT NULL,
  `priceProduct` float DEFAULT NULL,
  `categoryProduct` varchar(45) DEFAULT NULL,
  `Market_idMarket` int(11) NOT NULL,
  `Report_idReport` int(11) NOT NULL,
  PRIMARY KEY (`idProduct`),
  KEY `fk_Product_Market1_idx` (`Market_idMarket`),
  KEY `fk_Product_Report1_idx` (`Report_idReport`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `product`
--

INSERT INTO `product` (`idProduct`, `nameProduct`, `countProduct`, `priceProduct`, `categoryProduct`, `Market_idMarket`, `Report_idReport`) VALUES
(0, 'Milk', '100', 10, '0', 0, 0),
(1, 'Milk', '15', 11, '1', 1, 0),
(2, 'Milk', '124', 9, '1', 1, 0),
(3, 'Meat', '100', 10, '0', 0, 0),
(4, 'Meat', '15', 11, '1', 1, 0),
(5, 'Meat', '124', 9, '1', 1, 0),
(6, 'Apples', '100', 10, '0', 0, 0),
(7, 'Apples', '15', 11, '1', 1, 0),
(8, 'Apples', '124', 9, '1', 1, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `profile.php`
--

CREATE TABLE IF NOT EXISTS `profile` (
  `idProfile` int(11) NOT NULL AUTO_INCREMENT,
  `firstName` varchar(45) DEFAULT NULL,
  `surName` varchar(45) DEFAULT NULL,
  `lastName` varchar(45) DEFAULT NULL,
  `role` int(11) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `mail` varchar(45) DEFAULT NULL,
  `Profile_settings_idProfile_settings` int(11) DEFAULT NULL,
  `telephone` varchar(45) DEFAULT NULL,
  `isActive` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`idProfile`),
  KEY `fk_Profile_Profile_settings1_idx` (`Profile_settings_idProfile_settings`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Дамп данных таблицы `profile`
--

INSERT INTO `profile` (`idProfile`, `firstName`, `surName`, `lastName`, `role`, `password`, `mail`, `Profile_settings_idProfile_settings`, `telephone`, `isActive`) VALUES
(1, 'Superadmin', 'The Great', NULL, 4, '6111f6f79eed9afebc1f48957e08f790', 'super@ad.min', NULL, NULL, 1),
(2, '\r\n                                  Super', 'Admin', NULL, 3, '21232f297a57a5a743894a0e4a801fc3', 'rv_oleg@ukr.net', NULL, NULL, 1),
(3, '\r\n                                  Админ', 'Олежка', NULL, 3, 'abf7adefae865ad203dbafa1d621e61e', 'rv_oleg@ukr.net', NULL, NULL, 1),
(6, '\r\n                                  Petrucci', 'John', NULL, 2, '6111f6f79eed9afebc1f48957e08f790', 'test@rr.rr', NULL, NULL, 1),
(7, '\r\n                                  Petrucci', 'John', NULL, 1, '6111f6f79eed9afebc1f48957e08f790', 'test@rr.rr', NULL, NULL, 1),
(8, '\r\n                                  Anonymus', 'None', NULL, 1, '6111f6f79eed9afebc1f48957e08f790', 'two@rr.rr', NULL, NULL, 0),
(9, '\r\n                                  Anonymus', 'None', NULL, 1, '6111f6f79eed9afebc1f48957e08f790', 'two@rr.rr', NULL, NULL, 1),
(10, '\r\n                                  Anonymus', 'None', NULL, 1, '6111f6f79eed9afebc1f48957e08f790', 'three@rr.rr', NULL, NULL, 1),
(11, '\r\n                                  Anonymus', 'None', NULL, 0, '6111f6f79eed9afebc1f48957e08f790', 'four@rr.rr', NULL, NULL, 0),
(13, '\r\n                                  test', 'testn', NULL, 0, '5bacd9f25613659b2fbd2f3a58822e5c', 'fff@rr.tt', NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `profile_captcha`
--

CREATE TABLE IF NOT EXISTS `profile_captcha` (
  `idProfile_captcha` int(11) NOT NULL,
  `hash_captcha` varchar(45) DEFAULT NULL,
  `date_captcha` date DEFAULT NULL,
  `Profile_idProfile` int(11) NOT NULL,
  PRIMARY KEY (`idProfile_captcha`),
  KEY `fk_Profile_captcha_Profile1_idx` (`Profile_idProfile`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `profile_details`
--

CREATE TABLE IF NOT EXISTS `profile_details` (
  `Profile_idProfile` int(11) NOT NULL,
  `cityProfile` varchar(45) DEFAULT NULL,
  `birdthProfile` varchar(45) DEFAULT NULL,
  `statusProfile` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`Profile_idProfile`),
  KEY `fk_Profile_details_Profile1_idx` (`Profile_idProfile`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `profile_payment`
--

CREATE TABLE IF NOT EXISTS `profile_payment` (
  `idProfile_payment` int(11) NOT NULL,
  `card_payment` varchar(45) DEFAULT NULL,
  `type_payment` varchar(45) DEFAULT NULL,
  `verification_payment` varchar(45) DEFAULT NULL,
  `Profile_idProfile` int(11) NOT NULL,
  PRIMARY KEY (`idProfile_payment`),
  KEY `fk_Profile_payment_Profile1_idx` (`Profile_idProfile`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `profile_restore`
--

CREATE TABLE IF NOT EXISTS `profile_restore` (
  `idProfile_restore` int(11) NOT NULL,
  `mail_restore` varchar(45) DEFAULT NULL,
  `password_restore` varchar(45) DEFAULT NULL,
  `temp_restore` varchar(45) DEFAULT NULL,
  `date_restore` date DEFAULT NULL,
  `end_restore` date DEFAULT NULL,
  `Profile_idProfile` int(11) NOT NULL,
  PRIMARY KEY (`idProfile_restore`),
  KEY `fk_Profile_restore_Profile1_idx` (`Profile_idProfile`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `profile_settings`
--

CREATE TABLE IF NOT EXISTS `profile_settings` (
  `idProfile_settings` int(11) NOT NULL,
  `theme_settings` varchar(45) DEFAULT NULL,
  `mail_settings` int(11) DEFAULT NULL,
  `menu_settings` varchar(45) DEFAULT NULL,
  `profile_settings` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idProfile_settings`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `report`
--

CREATE TABLE IF NOT EXISTS `report` (
  `idReport` int(11) NOT NULL,
  `tagReport` varchar(45) DEFAULT NULL,
  `textReport` varchar(45) DEFAULT NULL,
  `Profile_idProfile` int(11) NOT NULL,
  PRIMARY KEY (`idReport`),
  KEY `fk_Report_Profile1_idx` (`Profile_idProfile`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `report`
--

INSERT INTO `report` (`idReport`, `tagReport`, `textReport`, `Profile_idProfile`) VALUES
(0, 'TEST', 'Test text', 7);

-- --------------------------------------------------------

--
-- Структура таблицы `stat`
--

CREATE TABLE IF NOT EXISTS `stat` (
  `idStat` int(11) NOT NULL,
  `messageStat` varchar(45) DEFAULT NULL,
  `levelStat` varchar(45) DEFAULT NULL,
  `Profile_idProfile` int(11) NOT NULL,
  PRIMARY KEY (`idStat`),
  KEY `fk_Stat_Profile1_idx` (`Profile_idProfile`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `area`
--
ALTER TABLE `area`
  ADD CONSTRAINT `fk_Area_Price1` FOREIGN KEY (`Price_idPrice`) REFERENCES `price` (`idPrice`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Area_Report1` FOREIGN KEY (`Report_idReport`) REFERENCES `report` (`idReport`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `city`
--
ALTER TABLE `city`
  ADD CONSTRAINT `fk_City_Area1` FOREIGN KEY (`Area_idArea`) REFERENCES `area` (`idArea`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `fk_CommunityItems_Comunity1` FOREIGN KEY (`Article_idArticle`) REFERENCES `article` (`idArticle`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_CommunityItems_Profile1` FOREIGN KEY (`Profile_idProfile`) REFERENCES `profile` (`idProfile`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `log`
--
ALTER TABLE `log`
  ADD CONSTRAINT `fk_Log_Report1` FOREIGN KEY (`Report_idReport`) REFERENCES `report` (`idReport`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `market`
--
ALTER TABLE `market`
  ADD CONSTRAINT `fk_Market_City1` FOREIGN KEY (`City_idCity`) REFERENCES `city` (`idCity`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `parser`
--
ALTER TABLE `parser`
  ADD CONSTRAINT `fk_Parser_Market1` FOREIGN KEY (`Market_idMarket`) REFERENCES `market` (`idMarket`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Parser_Report1` FOREIGN KEY (`Report_idReport`) REFERENCES `report` (`idReport`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `poll`
--
ALTER TABLE `poll`
  ADD CONSTRAINT `fk_poll_Profile1` FOREIGN KEY (`Profile_idProfile`) REFERENCES `profile` (`idProfile`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `pollvote`
--
ALTER TABLE `pollvote`
  ADD CONSTRAINT `fk_pollVote_poll1` FOREIGN KEY (`poll_idPoll`) REFERENCES `poll` (`idPoll`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `price`
--
ALTER TABLE `price`
  ADD CONSTRAINT `fk_Price_Report1` FOREIGN KEY (`Report_idReport`) REFERENCES `report` (`idReport`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `fk_Product_Market1` FOREIGN KEY (`Market_idMarket`) REFERENCES `market` (`idMarket`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Product_Report1` FOREIGN KEY (`Report_idReport`) REFERENCES `report` (`idReport`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `profile_captcha`
--
ALTER TABLE `profile_captcha`
  ADD CONSTRAINT `fk_Profile_captcha_Profile1` FOREIGN KEY (`Profile_idProfile`) REFERENCES `profile` (`idProfile`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `profile_details`
--
ALTER TABLE `profile_details`
  ADD CONSTRAINT `fk_Profile_details_Profile1` FOREIGN KEY (`Profile_idProfile`) REFERENCES `profile` (`idProfile`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `profile_payment`
--
ALTER TABLE `profile_payment`
  ADD CONSTRAINT `fk_Profile_payment_Profile1` FOREIGN KEY (`Profile_idProfile`) REFERENCES `profile` (`idProfile`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `profile_restore`
--
ALTER TABLE `profile_restore`
  ADD CONSTRAINT `fk_Profile_restore_Profile1` FOREIGN KEY (`Profile_idProfile`) REFERENCES `profile` (`idProfile`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `report`
--
ALTER TABLE `report`
  ADD CONSTRAINT `fk_Report_Profile1` FOREIGN KEY (`Profile_idProfile`) REFERENCES `profile` (`idProfile`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `stat`
--
ALTER TABLE `stat`
  ADD CONSTRAINT `fk_Stat_Profile1` FOREIGN KEY (`Profile_idProfile`) REFERENCES `profile` (`idProfile`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
