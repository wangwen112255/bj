-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2017 �?03 �?31 �?17:14
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `xk_class`
--

INSERT INTO `xk_class` (`id`, `classname`, `depart_id`, `visitnum`) VALUES
(1, '网络工程', 1, 2),
(2, '', 0, 0);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `xk_department`
--

CREATE TABLE IF NOT EXISTS `xk_department` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `departname` char(20) NOT NULL COMMENT '院系名称',
  `visitnum` int(11) NOT NULL COMMENT '访问量统计',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `xk_department`
--

INSERT INTO `xk_department` (`id`, `departname`, `visitnum`) VALUES
(1, '信息工程', 300),
(2, '', 0);

-- --------------------------------------------------------

--
-- 表的结构 `xk_order`
--

CREATE TABLE IF NOT EXISTS `xk_order` (
  `id` int(11) NOT NULL,
  `student_id` int(10) unsigned NOT NULL COMMENT '学生id',
  `isreceive` tinyint(4) NOT NULL COMMENT '是否教师回复',
  `creattime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '生成时间',
  `depart_id` int(10) unsigned NOT NULL,
  `is_success` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `student` (`student_id`),
  KEY `sdfsd` (`depart_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `xk_student`
--

CREATE TABLE IF NOT EXISTS `xk_student` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL COMMENT '用户名',
  `pwd` varchar(40) NOT NULL COMMENT '密码',
  `photo` varchar(40) NOT NULL,
  `class_id` int(10) unsigned NOT NULL COMMENT '专业id',
  `depart_id` int(10) unsigned NOT NULL COMMENT '院系id',
  `studentid` char(15) NOT NULL COMMENT '学号',
  `ceatetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '注册时间',
  `isonline` tinyint(4) DEFAULT NULL COMMENT '统计是否在线',
  `iscomplete` tinyint(4) DEFAULT '0' COMMENT '是否已经完成选课',
  `realname` char(5) DEFAULT NULL COMMENT '真实姓名',
  PRIMARY KEY (`id`),
  KEY `class` (`class_id`),
  KEY `depart` (`depart_id`),
  KEY `student` (`studentid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `xk_student`
--

INSERT INTO `xk_student` (`id`, `username`, `pwd`, `photo`, `class_id`, `depart_id`, `studentid`, `ceatetime`, `isonline`, `iscomplete`, `realname`) VALUES
(1, 'wangwen', '123456', '', 1, 1, '201316602', '2017-03-31 05:29:56', 0, 0, NULL),
(2, 'wangwen', '123456', '', 1, 1, '201316602', '2017-03-31 05:29:56', 0, 0, NULL);

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
  PRIMARY KEY (`id`),
  KEY `class` (`class_id`),
  KEY `depart` (`depart_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 限制导出的表
--

--
-- 限制表 `xk_course`
--
ALTER TABLE `xk_course`
  ADD CONSTRAINT `teach` FOREIGN KEY (`teacher_id`) REFERENCES `xk_teacher` (`id`);

--
-- 限制表 `xk_order`
--
ALTER TABLE `xk_order`
  ADD CONSTRAINT `xk_order_ibfk_11` FOREIGN KEY (`student_id`) REFERENCES `xk_student` (`id`),
  ADD CONSTRAINT `xk_order_ibfk_12` FOREIGN KEY (`depart_id`) REFERENCES `xk_department` (`id`);

--
-- 限制表 `xk_student`
--
ALTER TABLE `xk_student`
  ADD CONSTRAINT `class` FOREIGN KEY (`class_id`) REFERENCES `xk_class` (`id`),
  ADD CONSTRAINT `depart` FOREIGN KEY (`depart_id`) REFERENCES `xk_department` (`id`);

--
-- 限制表 `xk_teacher`
--
ALTER TABLE `xk_teacher`
  ADD CONSTRAINT `clas` FOREIGN KEY (`class_id`) REFERENCES `xk_class` (`id`),
  ADD CONSTRAINT `de` FOREIGN KEY (`depart_id`) REFERENCES `xk_department` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
