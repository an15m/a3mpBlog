-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2016-06-02 15:54:19
-- 服务器版本： 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `myblog`
--

-- --------------------------------------------------------

--
-- 表的结构 `myblog_about_me`
--

CREATE TABLE IF NOT EXISTS `myblog_about_me` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `content` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `myblog_about_me`
--

INSERT INTO `myblog_about_me` (`id`, `content`) VALUES
(0, '- 姓名：杨锦修\r\n- 职业：在读大学生\r\n- 学校：电子科技大学通信与信息工程学院2013级\r\n- Email：<mailto:snailxiu@gmail.com>\r\n- QQ：568975235\r\n ');

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=86 ;

--
-- 转存表中的数据 `myblog_articles`
--

INSERT INTO `myblog_articles` (`id`, `title`, `time`, `content`, `clicknumber`, `commentnumber`, `type`) VALUES
(1, '测试大师大师大师大师大师的撒按时到达时sadasdsadfsdfergthyhyuuykuikilyiol', 13232, '测试1', 12, 0, 'unity'),
(2, '生活类测试', 1457783935, '积极', 2, 0, '生活'),
(3, 'HelloWorld', 1457784079, '<pre>\r\n#include "stdio.h"\r\nint main(){\r\n    printf("HelloWorld!");\r\n    return 0;\r\n}\r\n</pre>', 9, 0, 'C语言'),
(4, '代码测试', 1464355134, '    #include <stdio.h>\r\n    print\r\n- asdsa\r\n', 8, 0, 'unity'),
(5, 'markdown summary asdasdsadasda', 1464440582, '#### 兼容html\r\nmarkdown只包含html标签的一部分，对于没有被包含的html标签，可以直接在md中使用。但是html区块元素比如`<div>、<table>、<pre>、<p>`等标签，必须在前后加上空行与其他内容隔开，还要求他们的开始标签与结尾标签不能用制表符或空格来缩进。例如：\r\n<input type="hidden" value="Just for something ! You can ignore it.">\r\n\r\n```html\r\n这是一个普通段落。\r\n\r\n<table>\r\n    <tr>\r\n        <td>Foo</td>\r\n    </tr>\r\n</table>\r\n\r\n这是另一个普通段落。\r\n```\r\n请注意，在 HTML 区块标签间的 Markdown 格式语法将不会被处理。比如，你在 HTML 区块内使用 Markdown 样式的`*强调*`会没有效果。\r\n\r\nHTML 的区段（行内）标签如 `<span>、<cite>、<del>` 可以在 Markdown 的段落、列表或是标题里随意使用。依照个人习惯，甚至可以不用 Markdown 格式，而直接采用 HTML 标签来格式化。举例说明：如果比较喜欢 HTML 的 `<a>` 或 `<img>` 标签，可以直接使用这些标签，而不用 Markdown 提供的链接或是图像标签语法。\r\n\r\n和处在 HTML 区块标签间不同，Markdown 语法在 HTML 区段标签间是有效的。\r\n____\r\n#### 特殊字符自动转换\r\n`<和&`字符markdown会根据需要选择是否转换成`&lt;和&amp;`\r\n至于#，只要不在行首就行，当然在` ``` ``` `中出现在行首也是没问题的\r\n____\r\n#### 区块元素\r\n##### 段落\r\n一个 Markdown 段落是由一个或多个连续的文本行组成，它的前后要有一个以上的空行（空行的定义是显示上看起来像是空的，便会被视为空行。比方说，若某一行只包含空格和制表符，则该行也会被视为空行）。普通段落不该用空格或制表符来缩进。\r\n##### 换行\r\nmarkdown的段内换行是自动的（手动在特定位置按回车对markdown来说是没用的）  \r\n但是你可以先按两个空格再回车，即可实现在任意位置换行（即产生`<br />`标签）\r\n##### 标题\r\n`#标题1`等同于:\r\n\r\n```\r\n标题1\r\n===\r\n```\r\n`##标题2`等同于:\r\n\r\n```\r\n标题2\r\n---\r\n```\r\n##### 区块引用 Blockquotes\r\n用">"实现  \r\n可以嵌套,通过不同数量的">"  \r\n引用内可以使用其他markdown语法\r\n##### 列表\r\n无序列表以"-或+或*"+" "  \r\n有序列表以"数字"+"."+" "  \r\n有序列表跟数字的顺序并没有什么关系...  \r\n如果两个列表项目间用空行分开，则在输出html的时候markdown会将项目内容用`<p>`标签包起来  \r\n列表项目内包含多个段落时，段落间用一个由4个空格或1个制表符的空行隔开  \r\n如果列表项目里需要用到引用，则>必须缩进：\r\n\r\n```\r\n*   A list item with a blockquote:\r\n\r\n    > This is a blockquote\r\n    > inside a list item.\r\n```\r\n如果放代码块的话，代码块就需要缩进两次  \r\n##### 代码区块\r\n用缩进4个空格或是1个制表符来实现  \r\n注：对Markdown GFM 来说，当然还可以用以下格式（会有语法高亮哦）:  \r\n` ```java `  \r\n`java代码块`  \r\n` ``` `  \r\n注意` ``` `必须顶格  \r\n##### 分割线\r\n一行中用三个 * 或 - 或 _ \r\n____\r\n#### 区段元素\r\n##### 链接\r\n行内式：\r\n\r\n```\r\nThis is [an example](http://example.com/ "Title") inline link.\r\n\r\n[This link](http://example.net/) has no title attribute.\r\n```\r\nTitle可写可不写  \r\n如果是同主机资源，可以使用相对路径\r\n\r\n```\r\nSee my [About](/about/ "Title") page for details.\r\n\r\nSee my [About](/about/) page for details.\r\n```\r\n参考式：  \r\n\r\n```\r\nThis is [an example][id] reference-style link.\r\n```\r\n接着，在文件的任意处，你可以把这个标记的链接内容定义出来：  \r\n\r\n```\r\n[id]: http://example.com/  "Optional Title Here"\r\n或[id]: http://example.com/  (Optional Title Here)\r\n或[id]: http://example.com/ \r\n```\r\n你也可以把 title 属性放到下一行，也可以加一些缩进，若网址太长的话，这样会比较好看：\r\n\r\n```\r\n[id]: http://example.com/  \r\n      "Optional Title Here"\r\n```\r\n链接辨别标签可以有字母、数字、空白和标点符号，但是并不区分大小写  \r\n隐式链接标记功能让你可以省略指定链接标记，如：  \r\n\r\n```\r\n[Google][]\r\n```\r\n然后定义链接内容：\r\n\r\n```\r\n[Google]: http://google.com/\r\n```\r\n##### 强调\r\nMarkdown 使用星号（*）和底线（_）作为标记强调字词的符号，被 * 或 _ 包围的字词会被转成用 `<em> `标签包围，用两个 * 或 _ 包起来的话，则会被转成 `<strong>`，例如：  \r\n\r\n```\r\n*single asterisks*\r\n\r\n_single underscores_\r\n\r\n**double asterisks**\r\n\r\n__double underscores__\r\n```\r\n但是如果你的 * 和 _ 两边都有空白的话，它们就只会被当成普通的符号。  \r\n如果要在文字前后直接插入普通的星号或底线，你可以用反斜线：  \r\n\r\n```\r\n\\*this text is surrounded by literal asterisks\\*\r\n```\r\n##### 代码\r\n如果要标记一小段行内代码，你可以用反引号把它包起来（`），例如：\r\n\r\n```\r\nUse the `printf()` function.\r\n```\r\n如果要在代码区段内插入反引号，你可以用多个反引号来开启和结束代码区段：\r\n\r\n```\r\n``There is a literal backtick (`) here.``\r\n```\r\n##### 图片\r\n行内式：  \r\n\r\n```\r\n![Alt text](/path/to/img.jpg)\r\n\r\n![Alt text](/path/to/img.jpg "Optional title")\r\n```\r\n参考式：\r\n\r\n```\r\n![Alt text][id]\r\n```\r\n「id」是图片参考的名称，图片参考的定义方式则和连结参考一样：\r\n\r\n```\r\n[id]: url/to/image  "Optional title attribute"\r\n```\r\n到目前为止， Markdown 还没有办法指定图片的宽高，如果你需要的话，你可以使用普通的 `<img>` 标签。\r\n____\r\n#### 其它\r\n##### 自动链接\r\n网址自动链接：\r\n\r\n```\r\n<http://example.com/>\r\n```\r\nmarkdown会转换为：\r\n\r\n```\r\n<a href="http://example.com/">http://example.com/</a>\r\n```\r\n邮箱自动链接：\r\n\r\n```\r\n<address@example.com>\r\n```\r\nmakrdown会自动生成一个邮箱链接  \r\n##### 反斜杠\r\nMarkdown 可以利用反斜杠来插入一些在语法中有其它意义的符号，例如：如果你想要用星号加在文字旁边的方式来做出强调效果（但不用 `<em>` 标签），你可以在星号的前面加上反斜杠：  \r\n\r\n```\r\n\\*literal asterisks\\*\r\n```\r\nMarkdown 支持以下这些符号前面加上反斜杠来帮助插入普通的符号：\r\n\r\n```\r\n\\   反斜线\r\n`   反引号\r\n*   星号\r\n_   底线\r\n{}  花括号\r\n[]  方括号\r\n()  括弧\r\n#   井字号\r\n+   加号\r\n-   减号\r\n.   英文句点\r\n!   惊叹号\r\n```\r\n', 23, 0, 'Sublime'),
(6, '1', 1464785132, '1', 0, 0, '生活'),
(7, '2', 1464785136, '2', 0, 0, '生活'),
(8, '3', 1464785140, '3', 0, 0, '生活'),
(9, '4', 1464785144, '4', 0, 0, '生活'),
(10, '5', 1464785148, '5', 0, 0, '生活'),
(11, '6', 1464785152, '6', 0, 0, '生活'),
(12, '7', 1464785156, '7', 0, 0, '生活'),
(13, '8', 1464785160, '8', 0, 0, '生活'),
(14, '9', 1464785164, '9', 0, 0, '生活'),
(15, '10', 1464785170, '10', 0, 0, '生活'),
(16, '11', 1464785174, '11', 0, 0, '生活'),
(17, '12', 1464785178, '12', 0, 0, '生活'),
(18, '13', 1464785182, '13', 0, 0, '生活'),
(19, '14', 1464785186, '14', 0, 0, '生活'),
(20, '15', 1464785191, '15', 0, 0, '生活'),
(21, '16', 1464785195, '16', 0, 0, '生活'),
(22, '17 a', 1464785202, '17', 0, 0, '生活'),
(23, '18 a', 1464785208, '18', 0, 0, '生活'),
(24, '19 a', 1464785214, '19', 0, 0, '生活'),
(25, '20 a', 1464785221, '20', 0, 0, 'unity'),
(26, '21 a', 1464785230, '21', 0, 0, 'unity'),
(27, '22 a', 1464785236, '22', 0, 0, 'unity'),
(28, '23 a', 1464785242, '23', 0, 0, 'unity'),
(29, '24 a', 1464785249, 'a', 0, 0, 'unity'),
(30, '25 a', 1464785256, 'a', 0, 0, 'unity'),
(31, '26 a', 1464785266, '26', 0, 0, 'unity'),
(32, '27 a', 1464785272, '27', 0, 0, 'unity'),
(33, '28 a', 1464785280, '28', 0, 0, 'unity'),
(34, '29 a ', 1464785287, 'sd', 0, 0, 'unity'),
(35, '30 a', 1464785294, 'sd', 0, 0, 'unity'),
(36, '31 a', 1464785301, 'sd', 0, 0, 'unity'),
(37, '32 a', 1464785307, 'ads', 0, 0, 'unity'),
(38, '33 a', 1464785312, 'ad', 0, 0, 'unity'),
(39, '34 a', 1464785318, 'ads', 0, 0, 'unity'),
(40, '35 a', 1464785325, 'ads', 0, 0, 'unity'),
(41, '36 a', 1464785332, 'asd', 0, 0, 'unity'),
(42, '37 a', 1464785337, 'asd', 0, 0, '生活'),
(43, '38 a', 1464785342, 'das', 0, 0, '生活'),
(44, '39 a ', 1464785347, 'dsa', 0, 0, 'unity'),
(45, '40 a', 1464785354, 'dsa', 0, 0, 'unity'),
(46, '41 a', 1464785361, 'sda', 0, 0, 'unity'),
(47, '42 a', 1464785367, 'sdad', 0, 0, 'unity'),
(48, '43 a', 1464785373, 'dsad', 0, 0, 'unity'),
(49, '44 a', 1464785378, 'asdd', 0, 0, 'unity'),
(50, '45 a', 1464785384, 'das', 0, 0, 'unity'),
(51, '46 a', 1464785389, 'das', 0, 0, 'unity'),
(52, '47 a', 1464785396, 'das', 0, 0, 'unity'),
(53, '48 a', 1464785401, 'das', 0, 0, '生活'),
(54, '49 a', 1464785407, 'das', 0, 0, 'unity'),
(55, '50 a', 1464785413, 'das', 0, 0, 'unity'),
(56, '51 a', 1464785419, 'das', 0, 0, 'unity'),
(57, '52 a', 1464785424, 'das', 0, 0, 'unity'),
(58, '53 a', 1464785432, 'adas', 0, 0, 'unity'),
(59, '54 a', 1464785438, 'das', 0, 0, 'unity'),
(60, '55 a', 1464785445, 'das', 0, 0, 'unity'),
(61, '56 a', 1464785450, 'das', 0, 0, '生活'),
(62, '57 a', 1464785456, 'dsa', 0, 0, 'unity'),
(63, '58 a', 1464785465, 'fd', 0, 0, 'unity'),
(64, '59 a', 1464785470, 'das', 0, 0, 'unity'),
(65, '60 a', 1464785476, 'das', 0, 0, 'unity'),
(66, '61 a', 1464785481, 'das', 0, 0, 'unity'),
(67, '62 a', 1464785488, 'das', 0, 0, 'unity'),
(68, '63 a', 1464785493, 'das', 0, 0, 'unity'),
(69, '64 a', 1464785499, 'das', 0, 0, 'unity'),
(70, '65 a', 1464785505, 'das', 0, 0, 'unity'),
(71, '66 a', 1464785510, 'das', 0, 0, 'unity'),
(72, '67 a', 1464785515, 'das', 0, 0, 'unity'),
(73, '68 a', 1464785522, 'asd', 0, 0, 'unity'),
(74, '69 a', 1464785528, 'das', 0, 0, 'unity'),
(75, '70 a', 1464785533, 'das', 0, 0, 'unity'),
(76, '71 a', 1464785538, 'das', 0, 0, 'unity'),
(77, 'sss a', 1464872898, 'das', 0, 0, 'unity'),
(78, 'as a', 1464873486, 'das', 0, 0, '生活'),
(79, 'aasdsa', 1464875396, 'asdas', 0, 0, 'Sublime'),
(80, 'das', 1464875401, 'dasda', 0, 0, 'Sublime'),
(81, 'dasd', 1464875406, 'asdas', 0, 0, 'Sublime'),
(82, 'adsds', 1464875410, 'asdas', 0, 0, 'Sublime'),
(83, 'asdas', 1464875415, 'asdas', 0, 0, 'Sublime'),
(84, 'fsad', 1464875422, 'dsa', 0, 0, 'Sublime'),
(85, 'asd', 1464875541, 'asd', 0, 0, '生活');

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
(0, '杨锦修的个人博客，欢迎参观', 'JAVA', 464);

-- --------------------------------------------------------

--
-- 表的结构 `myblog_tech`
--

CREATE TABLE IF NOT EXISTS `myblog_tech` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `techname` varchar(64) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `myblog_tech`
--

INSERT INTO `myblog_tech` (`id`, `techname`) VALUES
(1, 'unity'),
(2, 'C语言'),
(3, 'Sublime');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
