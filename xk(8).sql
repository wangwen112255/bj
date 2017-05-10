-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2017 �?05 �?10 �?17:58
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

--
-- 转存表中的数据 `xk_class`
--

INSERT INTO `xk_class` (`id`, `classname`, `depart_id`, `visitnum`) VALUES
(1, '网络工程', 1, 20),
(2, '电子工程', 1, 0);

-- --------------------------------------------------------

--
-- 表的结构 `xk_course`
--

CREATE TABLE IF NOT EXISTS `xk_course` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `coursename` varchar(30) NOT NULL COMMENT '课程名称',
  `desc` mediumtext NOT NULL COMMENT '课程描述',
  `teacher_id` int(10) unsigned NOT NULL COMMENT '教师id',
  `limitnum` tinyint(4) NOT NULL COMMENT '限制数量',
  `choosenum` tinyint(4) NOT NULL COMMENT '已经选择的人数',
  `status` tinyint(255) NOT NULL DEFAULT '1' COMMENT '课程状态1代表可选，0代表不可以选',
  `creattime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '课程的时间',
  PRIMARY KEY (`id`),
  KEY `teacher` (`teacher_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=36 ;

--
-- 转存表中的数据 `xk_course`
--

INSERT INTO `xk_course` (`id`, `coursename`, `desc`, `teacher_id`, `limitnum`, `choosenum`, `status`, `creattime`) VALUES
(15, '明天', '几天奶奶', 0, 2, 0, 0, '2017-05-10 06:15:05'),
(16, '明天', '几天奶奶', 0, 2, 0, 0, '2017-05-10 06:15:45'),
(18, '黑子', '&amp;nbsp;&amp;nbsp;&amp;nbsp; 是法撒旦法撒旦是sd', 8, 1, 0, 1, '2017-05-10 08:46:35'),
(19, '今天', '士大夫似的', 8, 2, 0, 0, '2017-05-10 09:52:51'),
(20, '基于php的毕业论文选课系统', '&amp;lt;strong&amp;gt;是多少三大是&amp;amp;nbsp;&amp;amp', 8, 2, 0, 0, '2017-05-10 09:56:37'),
(28, 'asd ', 'sd&amp;nbsp;', 8, 3, 0, 0, '2017-05-10 07:13:51'),
(21, '黑子', '&amp;amp;nbsp;&amp;amp;nbsp;&amp;amp;nbsp; 是法撒旦法撒旦', 8, 1, 0, 0, '2017-05-10 06:37:49'),
(26, '明天', '      明天掐死三大萨达是    ', 8, 2, 0, 0, '2017-05-10 08:06:22'),
(27, '天天', '即将盛大萨达&amp;lt;br /&amp;gt;', 8, 3, 0, 0, '2017-05-10 07:00:21'),
(29, '112', '&amp;lt;strong&amp;gt;&amp;lt;em&amp;gt;&amp;lt;u&', 8, 1, 0, 0, '2017-05-10 07:16:32'),
(30, '颠三倒', '&amp;lt;strong&amp;gt;三大撒地方地方三大三大萨达都是都是的&amp;lt;/strong&amp;gt;', 8, 1, 0, 0, '2017-05-10 07:17:53'),
(34, 'sdfsd', 'sdfs', 8, 2, 0, 0, '2017-05-10 08:45:25'),
(33, '明天', '      明天掐死三大萨达是    ', 8, 2, 0, 0, '2017-05-10 07:54:30');

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

--
-- 转存表中的数据 `xk_depart`
--

INSERT INTO `xk_depart` (`id`, `desc`, `departname`, `visitnum`, `clicknum`, `pic`) VALUES
(1, '信息工程很不错', '信息工程', 30, 30, '');

-- --------------------------------------------------------

--
-- 表的结构 `xk_info`
--

CREATE TABLE IF NOT EXISTS `xk_info` (
  `id` int(11) NOT NULL,
  `msg` varchar(255) NOT NULL,
  `student_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `createtime` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

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
  `class_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `student` (`student_id`),
  KEY `sdfsd` (`depart_id`),
  KEY `xk` (`course_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=31 ;

--
-- 转存表中的数据 `xk_order`
--

INSERT INTO `xk_order` (`id`, `student_id`, `isreceive`, `creattime`, `depart_id`, `is_success`, `course_id`, `class_id`) VALUES
(30, 45, 1, '2017-05-09 06:47:13', 1, 0, 14, 1),
(27, 46, 0, '2017-05-09 07:32:38', 0, 0, 14, 1);

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
  `studentid` char(15) NOT NULL COMMENT '学号',
  `ceatetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '注册时间',
  `isonline` tinyint(4) NOT NULL COMMENT '统计是否在线',
  `iscomplete` tinyint(4) NOT NULL DEFAULT '0' COMMENT '是否已经完成选课',
  `realname` char(5) NOT NULL COMMENT '真实姓名',
  PRIMARY KEY (`id`),
  KEY `class` (`class_id`),
  KEY `depart` (`depart_id`),
  KEY `student` (`studentid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=49 ;

--
-- 转存表中的数据 `xk_student`
--

INSERT INTO `xk_student` (`id`, `username`, `pwd`, `photo`, `class_id`, `depart_id`, `studentid`, `ceatetime`, `isonline`, `iscomplete`, `realname`) VALUES
(10, '12345612', '123456', '', 0, 0, '0', '2017-04-16 07:04:50', 0, 0, ''),
(11, '123456123', '123456', '', 0, 0, '0', '2017-04-16 07:06:19', 0, 0, ''),
(12, 'zhangyang', '123456', '', 0, 0, '0', '2017-04-16 07:13:33', 0, 0, ''),
(13, '123456', 'e10adc3949ba59abbe56e057f20f883e', '', 1, 1, '201316601', '2017-04-18 08:18:57', 0, 0, '讲名'),
(14, 'migntian', 'wangwen', '', 0, 0, '0', '2017-04-16 08:39:44', 0, 0, ''),
(15, 'migntians', 'wangwen', '', 0, 0, '0', '2017-04-16 08:43:03', 0, 0, ''),
(16, 'migntianss', 'wangwen', '', 0, 0, '0', '2017-04-16 08:43:47', 0, 0, ''),
(17, 'migntiansss', 'wangwen', '', 0, 0, '0', '2017-04-16 08:47:21', 0, 0, ''),
(18, '123456', '123456', '', 1, 1, '201316601', '2017-04-18 06:58:29', 0, 0, '王文虎'),
(19, '123456', '123456', '', 1, 1, '201316601', '2017-04-18 06:58:29', 0, 0, '王文虎'),
(20, '123456', 'e10adc3949ba59abbe56e057f20f883e', '', 1, 1, '201316601', '2017-04-18 06:58:29', 0, 0, '王文虎'),
(21, '123456', 'a6e612825ab0ec9b523f24182ea8f0d2', '', 1, 1, '201316601', '2017-04-18 06:58:29', 0, 0, '王文虎'),
(22, '123456', 'a6e612825ab0ec9b523f24182ea8f0d2', '', 1, 1, '201316601', '2017-05-08 09:27:40', 1, 1, '王文虎'),
(23, 'mingming', '55b311d5fac8fbd2667c6995c289f5ff', '', 0, 0, '0', '2017-04-17 01:33:59', 0, 0, ''),
(24, 'mingmings', 'e10adc3949ba59abbe56e057f20f883e', '', 0, 0, '0', '2017-04-17 01:35:17', 0, 0, ''),
(25, '12345612s', 'e10adc3949ba59abbe56e057f20f883e', '', 0, 0, '0', '2017-04-17 01:37:37', 0, 0, ''),
(26, 'jingtian', 'e10adc3949ba59abbe56e057f20f883e', '', 0, 0, '0', '2017-04-17 01:38:17', 0, 0, ''),
(27, 'mignasfsd', 'e10adc3949ba59abbe56e057f20f883e', '', 0, 0, '0', '2017-04-17 01:39:06', 0, 0, ''),
(28, 'sdfsdf', 'e10adc3949ba59abbe56e057f20f883e', '', 0, 0, '0', '2017-04-17 01:41:43', 0, 0, ''),
(29, 'migntiansssss', 'e10adc3949ba59abbe56e057f20f883e', '', 0, 0, '0', '2017-04-17 01:43:10', 0, 0, ''),
(30, 'migntianssssssdfsdf', 'e10adc3949ba59abbe56e057f20f883e', '', 0, 0, '0', '2017-04-17 01:47:37', 0, 0, ''),
(31, 'migntiansfd', 'e10adc3949ba59abbe56e057f20f883e', '', 0, 0, '0', '2017-04-17 01:48:46', 0, 0, ''),
(32, 'migntiansfdd', 'e10adc3949ba59abbe56e057f20f883e', '', 0, 0, '0', '2017-04-17 01:49:26', 0, 0, ''),
(33, 'migntiansfddsa', 'e10adc3949ba59abbe56e057f20f883e', '', 0, 0, '0', '2017-04-17 02:02:46', 0, 0, ''),
(34, 'migntiansfddsasd', 'e10adc3949ba59abbe56e057f20f883e', '', 0, 0, '0', '2017-04-17 02:04:43', 0, 0, ''),
(35, 'migntians1ddsasd', 'e10adc3949ba59abbe56e057f20f883e', '', 0, 0, '0', '2017-04-17 02:05:32', 0, 0, ''),
(36, '12345dd', 'e10adc3949ba59abbe56e057f20f883e', '', 0, 0, '0', '2017-04-17 02:07:25', 0, 0, ''),
(37, '12345dds', 'e10adc3949ba59abbe56e057f20f883e', '', 0, 0, '0', '2017-04-17 02:08:06', 0, 0, ''),
(38, 'sdfsdsf', 'e10adc3949ba59abbe56e057f20f883e', '', 0, 0, '0', '2017-04-17 02:09:01', 0, 0, ''),
(39, 'sdfsdsfs', 'e10adc3949ba59abbe56e057f20f883e', '', 0, 0, '0', '2017-04-17 02:11:58', 0, 0, ''),
(40, 'fsdfsd', 'e10adc3949ba59abbe56e057f20f883e', '', 0, 0, '0', '2017-04-17 03:55:19', 0, 0, ''),
(41, '123456', 'e10adc3949ba59abbe56e057f20f883e', '', 1, 1, '201316618', '2017-05-09 05:47:04', 0, 0, '王文虎'),
(42, '123456', 'adbf25f7a1bf2ac2a176bededad2d88f', '', 1, 1, '201316601', '2017-05-09 05:46:33', 0, 1, '王文虎'),
(43, 'migntainsd', 'e10adc3949ba59abbe56e057f20f883e', '', 0, 0, '0', '2017-04-17 05:19:28', 0, 0, ''),
(44, '20dsfdsfdsafad', 'e10adc3949ba59abbe56e057f20f883e', '', 0, 0, '0', '2017-04-17 08:25:43', 0, 0, ''),
(45, 'wangwen', 'fcea920f7412b5da7be0cf42b8c93759', '', 1, 1, '201316603', '2017-05-09 06:38:15', 0, 0, '王文帅'),
(46, '12345678', '25d55ad283aa400af464c76d713c07ad', '', 2, 1, '201316619', '2017-05-09 07:32:52', 0, 0, '王问名'),
(47, 'wangwenw', '4c364fc7ba9e458b681ebc46d18d6db5', '', 0, 0, '0', '2017-04-18 08:59:40', 0, 0, ''),
(48, 'wangwenshuai', 'e10adc3949ba59abbe56e057f20f883e', '', 1, 1, '201316602', '2017-05-08 09:27:09', 1, 0, '王文');

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
  `studentid` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `class` (`class_id`),
  KEY `depart` (`depart_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- 转存表中的数据 `xk_teacher`
--

INSERT INTO `xk_teacher` (`id`, `username`, `pwd`, `photo`, `class_id`, `depart_id`, `realname`, `createtime`, `desc`, `studentid`) VALUES
(3, 'wangwen', 'e10adc3949ba59abbe56e057f20f883e', '', 1, 0, '郑老师', '2017-05-07 07:15:05', '发生大幅度萨芬的萨芬水电费', 0),
(4, '12345612s', '123456', '', 1, 0, '安老师', '2017-04-26 02:47:22', '受到辐射大法师的', 0),
(5, '123456s', '123456', '', 0, 0, '', '2017-04-17 05:13:16', '', 0),
(6, '123456', '123456', '', 0, 0, '', '2017-04-17 05:48:46', '', 0),
(7, '111111', '295390d53d4c91a7a49f762a892ab23e', '', 2, 1, '林芳', '2017-05-08 02:34:20', '', 0),
(8, 'laoshi', 'e10adc3949ba59abbe56e057f20f883e', '', 1, 1, '马老师', '2017-05-08 09:11:27', '', 201316602);

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
