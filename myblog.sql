-- phpMyAdmin SQL Dump
-- version 3.5.8.2
-- http://www.phpmyadmin.net
--
-- 主机: sql100.byethost18.com
-- 生成日期: 2016 年 03 月 12 日 07:16
-- 服务器版本: 5.6.27-76.0
-- PHP 版本: 5.3.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `b18_17630521_myblog`
--

-- --------------------------------------------------------

--
-- 表的结构 `myblog_articles`
--

CREATE TABLE IF NOT EXISTS `myblog_articles` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(128) NOT NULL,
  `time` int(11) unsigned NOT NULL,
  `content` text NOT NULL,
  `clicknumber` int(11) unsigned NOT NULL,
  `commentnumber` int(11) unsigned NOT NULL,
  `type` varchar(64) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `myblog_articles`
--

INSERT INTO `myblog_articles` (`id`, `title`, `time`, `content`, `clicknumber`, `commentnumber`, `type`) VALUES
(1, '测试', 13232, '测试1', 5, 0, 'unity'),
(2, '生活类测试', 1457783935, '积极', 1, 0, '生活'),
(3, 'HelloWorld', 1457784079, '<pre>\r\n#include "stdio.h"\r\nint main(){\r\n    printf("HelloWorld!");\r\n    return 0;\r\n}\r\n</pre>', 5, 0, 'C语言');

-- --------------------------------------------------------

--
-- 表的结构 `myblog_comments`
--

CREATE TABLE IF NOT EXISTS `myblog_comments` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `articleid` int(11) unsigned NOT NULL,
  `time` int(11) unsigned NOT NULL,
  `username` varchar(32) NOT NULL,
  `useremail` varchar(64) NOT NULL,
  `content` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `myblog_comments`
--

INSERT INTO `myblog_comments` (`id`, `articleid`, `time`, `username`, `useremail`, `content`) VALUES
(1, 1, 342, '11', '21', '的撒的');

-- --------------------------------------------------------

--
-- 表的结构 `myblog_link`
--

CREATE TABLE IF NOT EXISTS `myblog_link` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `url` varchar(64) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `myblog_link`
--

INSERT INTO `myblog_link` (`id`, `title`, `url`) VALUES
(1, '百度', 'http://www.baidu.com');

-- --------------------------------------------------------

--
-- 表的结构 `myblog_messages`
--

CREATE TABLE IF NOT EXISTS `myblog_messages` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `time` int(11) unsigned NOT NULL,
  `content` text NOT NULL,
  `username` varchar(32) NOT NULL,
  `useremail` varchar(64) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `myblog_messages`
--

INSERT INTO `myblog_messages` (`id`, `time`, `content`, `username`, `useremail`) VALUES
(1, 34, '阿打算收', '23', '23');

-- --------------------------------------------------------

--
-- 表的结构 `myblog_other`
--

CREATE TABLE IF NOT EXISTS `myblog_other` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `motto` text NOT NULL,
  `now_learn` varchar(128) NOT NULL,
  `total_visit` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `myblog_other`
--

INSERT INTO `myblog_other` (`id`, `motto`, `now_learn`, `total_visit`) VALUES
(0, '杨锦修的个人博客，欢迎参观', 'JAVA', 50);

-- --------------------------------------------------------

--
-- 表的结构 `myblog_tech`
--

CREATE TABLE IF NOT EXISTS `myblog_tech` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `techname` varchar(64) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `myblog_tech`
--

INSERT INTO `myblog_tech` (`id`, `techname`) VALUES
(1, 'unity'),
(2, 'C语言');

-- --------------------------------------------------------

--
-- 表的结构 `myblog_user`
--

CREATE TABLE IF NOT EXISTS `myblog_user` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `password` varchar(32) NOT NULL,
  `name` varchar(32) NOT NULL,
  `email` varchar(64) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `myblog_user`
--

INSERT INTO `myblog_user` (`id`, `password`, `name`, `email`) VALUES
(1, 'a77a827b95ae6fcbe58b565c6f65a2e8', 'snail', '976995992@qq.com');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
