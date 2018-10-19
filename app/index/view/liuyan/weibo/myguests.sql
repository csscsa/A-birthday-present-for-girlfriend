-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2018-07-27 05:07:15
-- 服务器版本： 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `myweibo`
--

-- --------------------------------------------------------

--
-- 表的结构 `myguests`
--

CREATE TABLE IF NOT EXISTS `myguests` (
  `id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `content` text CHARACTER SET utf8 NOT NULL,
  `acc` int(11) NOT NULL,
  `ref` int(11) NOT NULL,
  `reg_date` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- 转存表中的数据 `myguests`
--

INSERT INTO `myguests` (`id`, `content`, `acc`, `ref`, `reg_date`) VALUES
(3, '我就测试一下', 0, 0, 1532509251),
(5, '时间问题', 1, 2, 1532509968),
(6, '好的，没问题！', 1, 0, 1532510201),
(10, '添加一些内容', 0, 0, 1532600113),
(11, '写得非常棒有木有！', 0, 0, 1532600132),
(12, '真的是非常棒！哈哈哈，我就是我，不一样的烟火。', 0, 0, 1532600186),
(14, '111', 1, 0, 1532600655),
(15, '111', 0, 0, 1532600657),
(16, '嘘嘘嘘嘘', 0, 0, 1532600733),
(17, '苍茫的天涯是我的爱', 0, 0, 1532600766),
(18, ' 轻轻敲醒沉睡的心灵，慢慢张开你的眼睛 让我们荡起双桨，小船儿推开波浪', 0, 0, 1532600821),
(19, ' 当你低头地瞬间，才发觉脚下的路', 0, 0, 1532600835),
(20, ' 你是我的小呀小苹果儿，怎么爱你都不嫌多', 0, 0, 1532600844),
(21, '夜空中最亮的星，能否听清，那仰望的人，心底的孤独和叹息', 1, 0, 1532600857),
(22, '轻轻的我走了，正如我轻松的来', 1, 1, 1532600858),
(23, '好的', 1, 1, 1532658401),
(24, '15年一遇“火星大冲”！火星离地球最近的一次', 0, 0, 1532660165),
(25, '今天完成了分页', 0, 0, 1532660194),
(27, '解决了点赞与反对的问题！', 0, 0, 1532660602),
(28, '提交更新分页数据！', 0, 0, 1532660668);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
