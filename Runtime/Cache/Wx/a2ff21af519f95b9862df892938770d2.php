<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>

<html>

<head>

    <meta charset="utf-8">

    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

    <link rel="stylesheet" href="/static/css/hui/hui.css" />

    <title></title>
    
<style type="text/css">
 


</style>

 
    <style>
    #list2 li{width:50%; float:left; margin:5px 0px;}
    #hui-footer a{width: 25%;}
   </style>

</head>

<body style="background:#F8F8F8;padding-bottom: 80px;">
  
<div style="height: 2000px;width:2000px;background: #26A2FF;border-radius:1000px;position: absolute;top:-1750px;left:50%;margin-left: -1000px;;"></div>
	<div class="hui-wrap">
	
    <div class="hui-media-list" style="background:#26A2FF;height: 200px;position: relative;text-align: center;color:#FFFFFF">
        		<div style="margin-top:-40px;left:50%;margin-left:-40px;position: absolute;top:50%">
                <a href="javascript:hui.toast('hi...');">
                    <img style="width:80px;height:80px;border-radius: 40px;border:solid #fff 1px" src="img/1.png" />
                	<p style="color:#FFFFFF">用户名</p>
            	</a>
    </div>
    </div>  
       
  
     <div class="hui-list" style="background:#FFFFFF; margin-top:58px;">
        <ul>
            <li><a href="javascript:void(0);" class="hui-arrow hui-icons hui-icons-write">&nbsp;&nbsp;我的选题</a></li>
            <li><a href="javascript:void(0);" class="hui-arrow hui-icons hui-icons-forum">&nbsp;&nbsp;班级正选</a></li>
            <li><a href="javascript:void(0);" class="hui-arrow hui-icons hui-icons-my">&nbsp;&nbsp;班级导师</a></li>
            <li><a href="javascript:void(0);" class="hui-arrow hui-icons hui-icons-nav">&nbsp;&nbsp;基本资料</a></li>
            <li><a href="javascript:void(0);" class="hui-arrow hui-icons hui-icons-check">&nbsp;&nbsp;密码修改</a></li>
        </ul>
    </div>
    <div class="hui-list" style="background:#FFFFFF; margin-top:28px;">
        <ul>
            <li><a href="javascript:void(0);" class="hui-icons hui-icons-logoff">&nbsp;&nbsp;退出系统</a></li>
        </ul>
    </div>
</div>



 
  <div id="hui-footer">
    <a href="<?php echo U('Index/index');?>" id="nav-home">
        <div class="hui-footer-icons hui-icons-home"></div>
        <div class="hui-footer-text">首页</div>
    </a>
    <a href="<?php echo U('Teachers/index');?>" id="nav-teacher">
        <div class="hui-footer-icons hui-icons-news"></div>
        <div class="hui-footer-text">教师查看</div>
    </a>
    <a href="<?php echo U('Course/index');?>" id="nav-course">
        <div class="hui-footer-icons hui-icons-forum"></div>
        <div class="hui-footer-text">学生选课</div>
    </a>
    <a href="<?php echo U('Student/index');?>" id="nav-my">
        <div class="hui-footer-icons hui-icons-my"></div>
        <div class="hui-footer-text">个人中心</div>
    </a>
  </div>
<script type="text/javascript" src="/static/js/hui/hui.js"></script>  


<script type="text/javascript">
  
</script>



</body>

</html>