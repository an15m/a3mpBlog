-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2017-04-21 08:29:26
-- 服务器版本： 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- 表的结构 `a3mpblog_about_me`
--

CREATE TABLE IF NOT EXISTS `a3mpblog_about_me` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `content` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `a3mpblog_about_me`
--

INSERT INTO `a3mpblog_about_me` (`id`, `content`) VALUES
(1, 'init');

-- --------------------------------------------------------

--
-- 表的结构 `a3mpblog_articles`
--

CREATE TABLE IF NOT EXISTS `a3mpblog_articles` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `clicknumber` int(11) unsigned NOT NULL,
  `content` text NOT NULL,
  `time` int(11) unsigned NOT NULL,
  `title` varchar(64) NOT NULL,
  `type` varchar(32) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `a3mpblog_articles`
--

INSERT INTO `a3mpblog_articles` (`id`, `clicknumber`, `content`, `time`, `title`, `type`) VALUES
(1, 0, 'init', 111, 'init', '生活');

-- --------------------------------------------------------

--
-- 表的结构 `a3mpblog_link`
--

CREATE TABLE IF NOT EXISTS `a3mpblog_link` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(32) NOT NULL,
  `url` varchar(64) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `a3mpblog_other`
--

CREATE TABLE IF NOT EXISTS `a3mpblog_other` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `motto` varchar(64) NOT NULL,
  `now_learn` varchar(32) NOT NULL,
  `total_visit` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `a3mpblog_other`
--

INSERT INTO `a3mpblog_other` (`id`, `motto`, `now_learn`, `total_visit`) VALUES
(1, 'init', 'init', 2);

-- --------------------------------------------------------

--
-- 表的结构 `a3mpblog_tech`
--

CREATE TABLE IF NOT EXISTS `a3mpblog_tech` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `techname` varchar(32) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
