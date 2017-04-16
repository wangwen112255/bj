-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2017 �?04 �?16 �?17:33
-- 服务器版本: 5.5.47
-- PHP 版本: 5.5.30

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `xk`
--

-- --------------------------------------------------------

--
-- 表的结构 `xk_class`
--

CREATE TABLE IF NOT EXISTS `xk_class` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '班级id',
  `classname` char(20) NOT NULL COMMENT '专业名称',
  `depart_id` int(10) unsigned NOT NULL COMMENT '院系id外键',
  `visitnum` int(11) NOT NULL COMMENT '查看量',
  PRIMARY KEY (`id`),
  KEY `depart_id` (`depart_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- 表的结构 `xk_course`
--

CREATE TABLE IF NOT EXISTS `xk_course` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `coursename` varchar(30) NOT NULL COMMENT '课程名称',
  `desc` varchar(50) NOT NULL COMMENT '课程描述',
  `teacher_id` int(10) unsigned NOT NULL COMMENT '教师id',
  `limitnum` tinyint(4) NOT NULL COMMENT '限制数量',
  `choosenum` tinyint(4) NOT NULL COMMENT '已经选择的人数',
  `status` tinyint(255) NOT NULL DEFAULT '1' COMMENT '课程状态1代表可选，0代表不可以选',
  `creattime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '课程的时间',
  PRIMARY KEY (`id`),
  KEY `teacher` (`teacher_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=14 ;

-- --------------------------------------------------------

--
-- 表的结构 `xk_depart`
--

CREATE TABLE IF NOT EXISTS `xk_depart` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `desc` varchar(255) NOT NULL,
  `departname` char(20) NOT NULL COMMENT '院系名称',
  `visitnum` int(11) NOT NULL COMMENT '访问量统计',
  `clicknum` int(11) NOT NULL,
  `pic` char(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- 表的结构 `xk_order`
--

CREATE TABLE IF NOT EXISTS `xk_order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(10) unsigned NOT NULL COMMENT '学生id',
  `isreceive` tinyint(4) NOT NULL COMMENT '是否教师回复',
  `creattime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '生成时间',
  `depart_id` int(10) unsigned NOT NULL,
  `is_success` tinyint(4) NOT NULL DEFAULT '0',
  `course_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `student` (`student_id`),
  KEY `sdfsd` (`depart_id`),
  KEY `xk` (`course_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=17 ;

-- --------------------------------------------------------

--
-- 表的结构 `xk_student`
--

CREATE TABLE IF NOT EXISTS `xk_student` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL COMMENT '用户名',
  `pwd` varchar(40) NOT NULL COMMENT '密码',
  `photo` varchar(40) NOT NULL,
  `class_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '专业id',
  `depart_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '院系id',
  `studentid` char(15) NOT NULL DEFAULT '0' COMMENT '学号',
  `ceatetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '注册时间',
  `isonline` tinyint(4) NOT NULL COMMENT '统计是否在线',
  `iscomplete` tinyint(4) NOT NULL DEFAULT '0' COMMENT '是否已经完成选课',
  `realname` char(5) NOT NULL COMMENT '真实姓名',
  PRIMARY KEY (`id`),
  KEY `class` (`class_id`),
  KEY `depart` (`depart_id`),
  KEY `student` (`studentid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=23 ;

--
-- 转存表中的数据 `xk_student`
--

INSERT INTO `xk_student` (`id`, `username`, `pwd`, `photo`, `class_id`, `depart_id`, `studentid`, `ceatetime`, `isonline`, `iscomplete`, `realname`) VALUES
(10, '12345612', '123456', '', 0, 0, '0', '2017-04-16 07:04:50', 0, 0, ''),
(11, '123456123', '123456', '', 0, 0, '0', '2017-04-16 07:06:19', 0, 0, ''),
(12, 'zhangyang', '123456', '', 0, 0, '0', '2017-04-16 07:13:33', 0, 0, ''),
(13, '123456', '123456', '', 0, 0, '0', '2017-04-16 07:50:24', 0, 0, ''),
(14, 'migntian', 'wangwen', '', 0, 0, '0', '2017-04-16 08:39:44', 0, 0, ''),
(15, 'migntians', 'wangwen', '', 0, 0, '0', '2017-04-16 08:43:03', 0, 0, ''),
(16, 'migntianss', 'wangwen', '', 0, 0, '0', '2017-04-16 08:43:47', 0, 0, ''),
(17, 'migntiansss', 'wangwen', '', 0, 0, '0', '2017-04-16 08:47:21', 0, 0, ''),
(18, '123456d', '123456', '', 0, 0, '0', '2017-04-16 08:53:58', 0, 0, ''),
(19, '123456ds', '123456', '', 0, 0, '0', '2017-04-16 08:54:29', 0, 0, ''),
(20, '123456dsd', 'e10adc3949ba59abbe56e057f20f883e', '', 0, 0, '0', '2017-04-16 09:00:27', 0, 0, ''),
(21, '123456dd', 'a6e612825ab0ec9b523f24182ea8f0d2', '', 0, 0, '0', '2017-04-16 09:23:00', 0, 0, ''),
(22, '123456dds', 'a6e612825ab0ec9b523f24182ea8f0d2', '', 0, 0, '0', '2017-04-16 09:23:23', 0, 0, '');

-- --------------------------------------------------------

--
-- 表的结构 `xk_teacher`
--

CREATE TABLE IF NOT EXISTS `xk_teacher` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL COMMENT '用户名',
  `pwd` varchar(40) NOT NULL COMMENT '密码',
  `photo` char(30) NOT NULL COMMENT '头像',
  `class_id` int(10) unsigned NOT NULL COMMENT '专业id',
  `depart_id` int(10) unsigned NOT NULL COMMENT '院系id',
  `realname` char(5) NOT NULL COMMENT '真实姓名',
  `createtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '注册时间',
  `desc` varchar(60) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `class` (`class_id`),
  KEY `depart` (`depart_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `xk_teacher`
--

INSERT INTO `xk_teacher` (`id`, `username`, `pwd`, `photo`, `class_id`, `depart_id`, `realname`, `createtime`, `desc`) VALUES
(3, 'fsdfsd', '123456', '', 0, 0, '', '2017-04-16 09:27:14', '');

-- --------------------------------------------------------

--
-- 表的结构 `xk_user`
--

CREATE TABLE IF NOT EXISTS `xk_user` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(40) DEFAULT NULL COMMENT '用户名',
  `pwd` varchar(40) DEFAULT NULL COMMENT '登录密码',
  `role_id` tinyint(4) DEFAULT NULL COMMENT '角色id',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
