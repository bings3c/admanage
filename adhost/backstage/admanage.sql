-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- 主机: 127.0.0.1
-- 生成日期: 2015 年 08 月 14 日 03:50
-- 服务器版本: 5.5.27
-- PHP 版本: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `admanage`
--

-- --------------------------------------------------------

--
-- 表的结构 `adeffect`
--

CREATE TABLE IF NOT EXISTS `adeffect` (
  `AdID` int(10) NOT NULL AUTO_INCREMENT COMMENT '广告编号',
  `AdShow` varchar(10) NOT NULL COMMENT '广告展现量',
  `AdClick` varchar(10) NOT NULL COMMENT '广告点击量',
  `AdConver` varchar(10) NOT NULL COMMENT '广告转换量',
  `AdShowPeo` varchar(10) NOT NULL COMMENT '展现量对应人数',
  `AdClickPeo` varchar(10) NOT NULL COMMENT '点击量对应人数',
  `AdCoverPeo` varchar(10) NOT NULL COMMENT '转换量对应人数',
  PRIMARY KEY (`AdID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='广告效果统计总体表' AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `adeffect`
--

INSERT INTO `adeffect` (`AdID`, `AdShow`, `AdClick`, `AdConver`, `AdShowPeo`, `AdClickPeo`, `AdCoverPeo`) VALUES
(1, '16', '16', '', '12', '12', '');

-- --------------------------------------------------------

--
-- 表的结构 `adeffect_h`
--

CREATE TABLE IF NOT EXISTS `adeffect_h` (
  `AdID` int(10) NOT NULL AUTO_INCREMENT COMMENT '广告编号',
  `Hour` varchar(2) NOT NULL COMMENT '时',
  `Day` varchar(2) NOT NULL COMMENT '天',
  `Month` varchar(2) NOT NULL COMMENT '月',
  `Year` varchar(5) NOT NULL COMMENT '年',
  `AdShow` varchar(10) NOT NULL COMMENT '广告展现量',
  `AdClick` varchar(10) NOT NULL COMMENT '广告点击量',
  `AdConver` varchar(10) NOT NULL COMMENT '广告转换量',
  `AdShowPeo` varchar(10) NOT NULL COMMENT '展现量对应人数',
  `AdClickPeo` varchar(10) NOT NULL COMMENT '点击量对应人数',
  `AdCoverPeo` varchar(10) NOT NULL COMMENT '转换量对应人数',
  PRIMARY KEY (`AdID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='广告效果统计小时粒度表' AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `adeffect_h`
--

INSERT INTO `adeffect_h` (`AdID`, `Hour`, `Day`, `Month`, `Year`, `AdShow`, `AdClick`, `AdConver`, `AdShowPeo`, `AdClickPeo`, `AdCoverPeo`) VALUES
(1, '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- 表的结构 `adhost`
--

CREATE TABLE IF NOT EXISTS `adhost` (
  `AdHostID` int(10) NOT NULL AUTO_INCREMENT COMMENT '广告主编号',
  `AdHostName` varchar(20) NOT NULL COMMENT '广告主名称（单位、部门、个人）',
  `AdHostTel` varchar(15) NOT NULL COMMENT '广告主联系方式（号码、地址）',
  `AdHostAddress` varchar(30) NOT NULL,
  `AdHostAdMoney` varchar(10) NOT NULL COMMENT '广告币',
  `AdHostRealMoney` varchar(10) NOT NULL COMMENT '实际金额',
  PRIMARY KEY (`AdHostID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='广告主表' AUTO_INCREMENT=6 ;

--
-- 转存表中的数据 `adhost`
--

INSERT INTO `adhost` (`AdHostID`, `AdHostName`, `AdHostTel`, `AdHostAddress`, `AdHostAdMoney`, `AdHostRealMoney`) VALUES
(1, '曹海涛', '18910233822', '百子湾西里', '993', '100'),
(2, '邓超', '12345678910', '百子湾西里', '10000', '1000'),
(3, '贾育', '12345678901', '百子湾西里', '10000', '1000'),
(5, '中国传媒大学', '12345678913', '定福庄东街', '1000', '100');

-- --------------------------------------------------------

--
-- 表的结构 `adlog`
--

CREATE TABLE IF NOT EXISTS `adlog` (
  `AdID` int(10) NOT NULL DEFAULT '0',
  `OptTime` varchar(20) NOT NULL COMMENT '操作时间',
  `OptHour` varchar(5) NOT NULL COMMENT '操作时的小时',
  `OptDay` varchar(5) NOT NULL COMMENT '操作时是几号',
  `OptMonth` varchar(5) NOT NULL COMMENT '操作时的月份',
  `OptYear` varchar(5) NOT NULL COMMENT '操作时的年份',
  `OptType` varchar(10) NOT NULL COMMENT '操作类型show/click/conver'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='广告日志表';

--
-- 转存表中的数据 `adlog`
--

INSERT INTO `adlog` (`AdID`, `OptTime`, `OptHour`, `OptDay`, `OptMonth`, `OptYear`, `OptType`) VALUES
(1, '2015-08-10 08:58:09', '8', '10', '8', '2015', 'CPC'),
(1, '2015-08-10 08:58:16', '8', '10', '8', '2015', 'CPC'),
(1, '2015-08-10 09:05:44', '9', '10', '8', '2015', 'CPC'),
(1, '2015-08-10 09:07:57', '9', '10', '8', '2015', 'CPC'),
(1, '2015-08-10 13:33:40', '13', '10', '8', '2015', 'CPC'),
(1, '2015-08-10 14:06:30', '14', '10', '8', '2015', 'CPC'),
(1, '2015-08-10 17:02:02', '17', '10', '8', '2015', 'CPC'),
(1, '2015-08-11 10:50:20', '10', '11', '8', '2015', 'CPC'),
(1, '2015-08-11 10:50:55', '10', '11', '8', '2015', 'CPC'),
(1, '2015-08-11 10:51:14', '10', '11', '8', '2015', 'CPC'),
(1, '2015-08-11 13:32:38', '13', '11', '8', '2015', 'CPC'),
(1, '2015-08-11 13:35:35', '13', '11', '8', '2015', 'CPC'),
(1, '2015-08-11 16:24:23', '16', '11', '8', '2015', 'CPC'),
(1, '2015-08-12 09:53:09', '9', '12', '8', '2015', 'CPC'),
(1, '2015-08-12 13:44:23', '13', '12', '8', '2015', 'CPC');

-- --------------------------------------------------------

--
-- 表的结构 `admaininformation`
--

CREATE TABLE IF NOT EXISTS `admaininformation` (
  `AdID` int(10) NOT NULL AUTO_INCREMENT COMMENT '广告ID',
  `AdName` varchar(20) NOT NULL COMMENT '广告名称',
  `AdType` varchar(20) NOT NULL COMMENT '费率',
  `AdRate` varchar(15) NOT NULL COMMENT '广告费率',
  `AdExamineState` varchar(10) NOT NULL COMMENT '广告审核状态',
  `AdHostID` varchar(10) NOT NULL COMMENT '广告主ID',
  `AdBeginTime` date NOT NULL COMMENT '广告开始时间',
  `AdEndTime` date NOT NULL COMMENT '广告结束时间',
  `OrderNumber` varchar(15) NOT NULL COMMENT '关联订单号',
  PRIMARY KEY (`AdID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='广告信息主表' AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `admaininformation`
--

INSERT INTO `admaininformation` (`AdID`, `AdName`, `AdType`, `AdRate`, `AdExamineState`, `AdHostID`, `AdBeginTime`, `AdEndTime`, `OrderNumber`) VALUES
(1, '黄焖鸡米饭', 'CPC', '100￥/CPC', '待审核', '1', '2015-08-05', '2015-08-30', '12345'),
(2, '重庆火锅', 'CPC', '100￥/CPC', '待审核', '1', '2015-08-20', '2015-09-30', '12346');

-- --------------------------------------------------------

--
-- 表的结构 `admaterial`
--

CREATE TABLE IF NOT EXISTS `admaterial` (
  `AdMaterialID` int(10) NOT NULL AUTO_INCREMENT COMMENT '广告物料ID',
  `AdMaterialName` varchar(15) NOT NULL COMMENT '广告物料名称',
  `AdImage` varchar(10) NOT NULL COMMENT '广告物料图片',
  `AdvertisingUrl` varchar(20) NOT NULL COMMENT '生成的投放URL链接',
  PRIMARY KEY (`AdMaterialID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='广告物料表' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(15) NOT NULL,
  `password` varchar(35) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `admin`
--

INSERT INTO `admin` (`id`, `name`, `password`) VALUES
(1, 'caohaitao', 'e10adc3949ba59abbe56e057f20f883e'),
(2, 'hekai', 'e10adc3949ba59abbe56e057f20f883e'),
(3, 'chenyancun', 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- 表的结构 `aduser`
--

CREATE TABLE IF NOT EXISTS `aduser` (
  `AdUserID` int(10) NOT NULL AUTO_INCREMENT COMMENT '用户编号',
  `AdUserPhone` varchar(11) NOT NULL COMMENT '用户手机号',
  `RemainingPoints` varchar(15) NOT NULL COMMENT '积分数',
  `UserShow` varchar(15) NOT NULL COMMENT '被投放广告数量',
  `UserClick` varchar(15) NOT NULL COMMENT '点击数量',
  `UserConver` varchar(15) NOT NULL COMMENT '转化数量',
  PRIMARY KEY (`AdUserID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='用户表' AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `aduser`
--

INSERT INTO `aduser` (`AdUserID`, `AdUserPhone`, `RemainingPoints`, `UserShow`, `UserClick`, `UserConver`) VALUES
(1, '18811720067', '7', '7', '7', '0'),
(2, '13141293146', '0', '0', '0', '0');

-- --------------------------------------------------------

--
-- 表的结构 `advertising`
--

CREATE TABLE IF NOT EXISTS `advertising` (
  `AdID` int(10) NOT NULL AUTO_INCREMENT COMMENT '广告ID',
  `AdvertisingState` varchar(15) NOT NULL COMMENT '广告投放状态',
  `AdMaterialID` int(10) NOT NULL COMMENT '投放物料ID',
  `AdPosition` varchar(15) NOT NULL COMMENT '广告投放位置（顶，底，漂浮）',
  `AdvertisingPriority` varchar(5) NOT NULL COMMENT '广告投放优先级',
  `TargetUserID` int(10) NOT NULL COMMENT '目标用户群ID',
  `AdvertisingFreq` int(10) NOT NULL COMMENT '投放频次',
  `AdvertisingTunnel` varchar(15) NOT NULL COMMENT '投放渠道',
  `LimitNumPerDay` varchar(5) NOT NULL COMMENT '每日投放上限',
  `EffectiveBeginTime` varchar(20) NOT NULL COMMENT '投放有效时间段',
  `HitPeopleNum` int(10) NOT NULL COMMENT '投放命中人数',
  `HitNum` int(10) NOT NULL COMMENT '投放命中次数',
  PRIMARY KEY (`AdID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='广告投放表' AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `advertising`
--

INSERT INTO `advertising` (`AdID`, `AdvertisingState`, `AdMaterialID`, `AdPosition`, `AdvertisingPriority`, `TargetUserID`, `AdvertisingFreq`, `AdvertisingTunnel`, `LimitNumPerDay`, `EffectiveBeginTime`, `HitPeopleNum`, `HitNum`) VALUES
(1, '未投放', 1, '顶部', '2', 1, 1, 'toolbar', '10', '00:00:00', 0, 0);

-- --------------------------------------------------------

--
-- 表的结构 `floatcard`
--

CREATE TABLE IF NOT EXISTS `floatcard` (
  `TrafficCardID` int(10) NOT NULL AUTO_INCREMENT COMMENT '流量卡编号',
  `TrafficCardNum` varchar(15) NOT NULL COMMENT '流量卡卡号',
  `TrafficCardPwd` varchar(20) NOT NULL COMMENT '流量卡密码',
  `TrafficCardType` varchar(15) NOT NULL COMMENT '流量卡类型',
  `state` varchar(10) NOT NULL COMMENT '激活状态',
  `AdUserPhone` varchar(11) NOT NULL COMMENT '用户手机号',
  `UsedPoints` varchar(15) NOT NULL COMMENT '用户所花积分数',
  PRIMARY KEY (`TrafficCardID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='流量卡密表' AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `floatcard`
--

INSERT INTO `floatcard` (`TrafficCardID`, `TrafficCardNum`, `TrafficCardPwd`, `TrafficCardType`, `state`, `AdUserPhone`, `UsedPoints`) VALUES
(1, '123456', '123456', '充值卡', '未激活', '12345678910', '10');

-- --------------------------------------------------------

--
-- 表的结构 `targetuser`
--

CREATE TABLE IF NOT EXISTS `targetuser` (
  `TargetUser` varchar(10) NOT NULL COMMENT '目标用户群ID',
  `TargetUserName` varchar(15) NOT NULL COMMENT '目标用户群名称',
  `route` varchar(30) NOT NULL,
  PRIMARY KEY (`TargetUser`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='用户群表';

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
