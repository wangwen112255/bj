<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>教师管理课程</title>
<link rel="stylesheet" type="text/css" href="/Webphp/Public/css/index.css" />

<style type="text/css">


body{
	background-color:#999;
	width:1200px;
	}
#all{
	background-color:#090;
	width:1200px;
	height:650px;
	margin:0px 70px 0px;}
#header{
	background-color:#060;
	padding:1px 1px 1px;
	text-align:center;
	font-size:24px;
	color:#FFF;
	}

#topnav{
	text-color:#F63;
	margin-right:20px;
	margin-top:10px;}
#middle{
	position:absolute;
	left:500px;
	top:300px;
     
	}
#nav1{
	color:#FFF;
	font-size:24px;
	position:absolute;
	left:600px;
	top:250px;
	
}
#left{
	background-color:#060;
	margin-left:10px;
	margin-top:0px;
	width:350px;
	height:400px;}
.box{
	background-color:#9F0;
	text-align:left;
	width:300px;
	margin-top:20px;
	margin-left:5px;
	padding-top:10px;
	}

#mood{
	background-color:#093;
	border-width:1px;
	margin-right:0px;
	margin-top:50px;
	}
</style></head>

<body>
<div id="all">
	
    <div id="header">
    	<h1 align="center">选修课网上选课系统</h1>
    </div>
    <div id="topnav">
    	<div align="right"><a href="<?php echo U('/Index/index');?>">学校主页</a> 
    	   <a href="<?php echo U('/Course/index2');?>">教务处</a>
    	    <a href="#">学生处</a>
            <a href="#">关于系统</a>
  	      </div>
	</div>
   
    <div id="left">
    	<div class="box">
        	<h3>教师页面</h3>
               <ul>用户信息
			     <li>编号:<?php echo (session('TeatNo')); ?></li>
				 <li>姓名:<?php echo (session('TeaName')); ?></li>
				 <li>角色：教师</li>
			   </ul>
        </div>
        <div class="box">
        	<h3>友情链接</h3>
            <ul>
            	<li><a href="#">使用方法</a></li>
                <li><a href="#">常见问题</a></li>
                <li><a href="#">联系我们</a></li>
            </ul>
        </div>
		  <div class="box">
        	<h3>生活链接</h3>
            <ul>
            	<li><a href="http://dccsat.cduestc.cn/index/">成都学院云计算系</a></li>
            </ul>
        </div>
    </div>
    <div id="nav1">---------学生选课表---------</div>

    <div id="middle">
	<center>
	<table border="2" bordercolor="#006600">
  <tr>
    <td><div align="center">课程编号</div></td>
    <td><div align="center">课程名称</div></td>
    <td><div align="center">上课老师</div></td>
    <td><div align="center">学分</div></td>
    <td><div align="center">上课时间</div></td>
    <td><div align="center">操作</div></td>
  </tr>
  <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
    <td align="center"><?php echo ($vo["CouNo"]); ?></td>
    <td><?php echo ($vo["CouName"]); ?></td>
    <td><?php echo ($vo["Teacher"]); ?></td>
    <td><?php echo ($vo["Credit"]); ?></td>
    <td><?php echo ($vo["SchoolTime"]); ?></td>
    <td><a href="<?php echo U("/Course/edit/CouNo/$vo[CouNo]");?>">编辑</a> <a href="<?php echo U("/Course/delete/CouNo/$vo[CouNo]");?>" onclick="return confirm('确定删除?')">删除</a></td>
  </tr><?php endforeach; endif; else: echo "" ;endif; ?>
</table>
	</center>

		</div>
</div>
</body>
</html>