-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2015-08-23 15:06:24
-- 服务器版本： 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bankroll`
--

-- --------------------------------------------------------

--
-- 表的结构 `postdata`
--

CREATE TABLE IF NOT EXISTS `postdata` (
`id` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `company` varchar(255) DEFAULT NULL,
  `reason` varchar(255) DEFAULT NULL,
  `money` float DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `userID` int(11) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

--
-- 转存表中的数据 `postdata`
--

INSERT INTO `postdata` (`id`, `date`, `type`, `company`, `reason`, `money`, `state`, `userID`) VALUES
(1, '2015-04-29', '散油采购', '营口鑫隆粮油工业有限公司', '付非转四级豆油85%货款', 512604, '完成', 12),
(2, '2015-05-19', '散油采购', '嘉里粮油（营口）有限公司', '付毛菜油款', 92390.5, '完成', 12),
(3, '2015-05-20', '散油采购', '营口鑫隆粮油工业有限公司', '付非转一级豆油85%货款', 272945, '完成', 12),
(4, '2015-05-20', '散油采购', '营口鑫隆粮油工业有限公司', '付非转四级豆油85%货款', 508285, '完成', 12),
(5, '2015-07-30', '散油采购', '益海（泰州）粮油工业有限公司', '付一级豆油20%定金', 1142000, '完成', 12),
(6, '2015-07-30', '散油采购', '上海益海商贸有限公司', '付毛玉米油款', 3738850, '完成', 12),
(7, '2015-07-30', '散油采购', '益海嘉里(郑州)食品工业有限公司', '付毛玉米油款', 7042840, '完成', 12),
(8, '2015-08-03', '散油采购', '营口鑫隆粮油工业有限公司', '付非转四级豆油85%货款', 1861990, '完成', 12),
(9, '2015-08-03', '散油采购', '益海（泰州）粮油工业有限公司', '付一级豆油20%定金', 1146000, '完成', 12),
(10, '2015-08-03', '散油采购', '安徽栋泰农业科技有限公司', '付非转一级豆油款', 235620, '完成', 12),
(11, '2015-08-12', '散油采购', '嘉里粮油(青岛)有限公司', '付芝麻油款', 703030, '完成', 12),
(12, '2015-08-13', '散油采购', '营口鑫隆粮油工业有限公司', '付非转四级豆油15%发票款', 328587, '完成', 12),
(13, '2015-08-13', '散油采购', '泰兴市振华油脂有限公司', '付一级豆油款', 2813860, '完成', 12),
(14, '2015-08-13', '散油采购', '泰兴市振华油脂有限公司', '付一级豆油款', 2880300, '完成', 12),
(15, '2015-08-13', '散油采购', '上海益海商贸有限公司', '付三级棉油款', 1696000, '完成', 12),
(16, '2015-08-17', '散油采购', '益海（盐城）粮油工业有限公司', '付浓香菜籽油款', 1083100, '完成', 12),
(17, '2015-08-19', '散油采购', '安徽辉隆阔海农产品有限公司', '付一级豆油', 30113.7, '完成', 12),
(18, '2015-08-19', '散油采购', '益江（张家港）粮油工业有限公司', '付棕榈油款', 897299, '完成', 12),
(19, '2015-08-19', '散油采购', '益江（张家港）粮油工业有限公司', '付棕榈油款', 470000, '完成', 12),
(20, '2015-08-19', '散油采购', '益海（兖州）粮油工业有限公司', '付花生油款', 457134, '完成', 1);

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`id` int(11) NOT NULL,
  `domainUsername` varchar(255) NOT NULL,
  `chineseName` varchar(255) NOT NULL,
  `department` varchar(20) NOT NULL,
  `userid` int(11) NOT NULL,
  `privilege` int(11) NOT NULL,
  `score` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`id`, `domainUsername`, `chineseName`, `department`, `userid`, `privilege`, `score`) VALUES
(1, 'honglei', '洪磊', '财务部', 1, 3, 100);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `postdata`
--
ALTER TABLE `postdata`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `postdata`
--
ALTER TABLE `postdata`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
