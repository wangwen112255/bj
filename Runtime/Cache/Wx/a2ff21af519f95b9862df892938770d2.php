<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>

<html>

<head>

    <meta charset="utf-8">

    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

    <link rel="stylesheet" href="/static/css/hui/hui.css" />

    <title></title>
    
<style type="text/css">
#hui-up-toast{
  background: green;
}
body{
  height: 600px;
  width: 100%;
overflow:hidden;

}
</style>

 
    <style>
    #list2 li{width:50%; float:left; margin:5px 0px;}
    #hui-footer a{width: 25%;}
   </style>

</head>

<body style="background:#F8F8F8;padding-bottom: 80px;">
  

  <div class="hui-wrap" style="position: relative;overflow: hidden;width: 100%">
    <!-- <div style="position: relative;"> -->

<div style="height: 2000px;width:2000px;background: #26A2FF;border-radius:1000px;position: absolute;top:-1770px;left:50%;margin-left: -1000px;;"></div>
<!-- </div> -->
    <div class="hui-media-list" style="background:#26A2FF;height: 200px;position: relative;text-align: center;color:#FFFFFF">
            <div style="margin-top:-60px;left:50%;margin-left:-100px;position: absolute;top:50%;width: 200px;height: 120;">
                <a href="javascript:hui.toast('真实姓名：<?php echo ($Userdata["realname"]); ?>');window.location.href=<?php  echo '/wx.php/Student/index/timestatmp'.time(); s?>">
                    <img style="width:80px;height:80px;border-radius: 40px;border:solid 2px #fff" src="<?php echo ($Userdata["photo"]); ?>" />
                  <p style="color:#FFFFFF"><?php echo ($Userdata["username"]); if(($_SESSION['role']) == "Student"): ?>[学生]<?php else: ?>[教师]<?php endif; ?></p>
              </a>
    </div>
    </div>  
       
  
     <div class="hui-list" style="background:#FFFFFF; margin-top:58px;">
        <ul>
            <li><a href="<?php echo U('course');?>" class="hui-arrow hui-icons hui-icons-write">&nbsp;&nbsp;我的选题</a></li>
            <li><a href="<?php echo U('classes');?>" class="hui-arrow hui-icons hui-icons-forum">&nbsp;&nbsp;班级正选</a></li>
            <li><a href="<?php echo U('guide');?>" class="hui-arrow hui-icons hui-icons-my">&nbsp;&nbsp;班级导师</a></li>
            <li><a href="<?php echo U('intro');?>" class="hui-arrow hui-icons hui-icons-nav">&nbsp;&nbsp;基本资料</a></li>
             <li><a href="<?php echo U('photo');?>" class="hui-arrow hui-icons hui-icons-nav">&nbsp;&nbsp;头像设置</a></li>
            <li><a href="<?php echo U('safe');?>" class="hui-arrow hui-icons hui-icons-check">&nbsp;&nbsp;密码修改</a></li>
        </ul>
    </div>
    <div class="hui-list" style="background:#FFFFFF; margin-top:28px;">
        <ul>

            <li><a href="<?php echo U('Index/index');?>" class="hui-icons hui-icons-home">&nbsp;&nbsp;返回首页</a></li>
           
            <li><a href="<?php echo U('Login/logout');?>" class="hui-icons hui-icons-logoff">&nbsp;&nbsp;退出系统</a></li>
        </ul>
    </div>
</div>
  

<script type="text/javascript" src="/static/js/hui/hui.js"></script>  







</body>

</html>