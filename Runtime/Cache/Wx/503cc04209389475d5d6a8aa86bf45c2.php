<?php if (!defined('THINK_PATH')) exit(); session_start(); $role=$_SESSION['role']?$_SESSION['role']:'Student'; $role.='/index'; ?>
<!DOCTYPE html>

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
  

<div class="hui-wrap">
    <form action="<?php echo U('Login/doregister');?>" id='signupForm'>
    <div class="hui-center-title" style="margin-top:35px;"><h1 style="border:0px;">注册新用户</h1></div>
    <div style="margin:28px; margin-bottom:15px;" class="hui-form" id="form1">
        <div class="hui-form-items">
            <input type="text" class="hui-input hui-input-clear" id='username' placeholder="用户名" checkType="string" name="username" checkData="5,20" checkMsg="用户名应为5-20个字符" />
        </div>
        <div class="hui-form-items">
            <input type="password"  name="pwd" class="hui-input hui-pwd-eye" placeholder="登录密码" checkType="string" id="pwd" checkData="6,20" checkMsg="密码应为6-20个字符" />
        </div>
        <div class="hui-form-items">
            <input type="password" class="hui-input hui-pwd-eye" placeholder="确认密码" checkType="sameWithId" checkData="pwd" checkMsg="两次密码不一致"  />
        </div>
        <div class="hui-form-items">
      <div class="hui-form-items-title">身份选取</div>
      <div class="hui-form-radios">
      <input type="radio" value="te" name="role" id="g1" checked="checked" onchange="showSelectRes(this);" /><label for="g1">教师</label>
      <input type="radio" value="st"  id="g2"  name="role" onchange="showSelectRes(this);" /><label for="g2">学生</label>
      <input type="hidden"  id='role' value='te'>
      </div>
    </div>
    </div>
    <div style="padding:28px; padding-top:0px;">
        <button type="button" class="hui-button hui-button-large hui-primary" id="submit">立即注册</button>
    </div>
    </form>
</div>
<p style="padding-left:28px"><a href="<?php echo U('Login/index');?>">已有账号，请去登陆</a></p>
 
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
    <a href="<?php echo U($role);?>" id="nav-my">
        <div class="hui-footer-icons hui-icons-my"></div>
        <div class="hui-footer-text">个人中心</div>
    </a>
  </div>
<script type="text/javascript" src="/static/js/hui/hui.js"></script>  


<script src="/static/js/hui/hui-form.js" type="text/javascript" charset="utf-8"></script>
<script src="/static/js/hui/base.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript">
hui.formInit();
function showSelectRes(_selfBtn){
    var val;
    hui(_selfBtn).parent().find('input').each(function(cObj){
        if(cObj.checked){val = cObj.value;}
    });
    hui('#role').val(val);
}
  // hui.formInit();
hui('#submit').click(function(){
    // hui("#submit").loadingButton('加载中...');
    var res = huiFormCheck('#signupForm');
    if(res){
      var url=hui('#signupForm').attr('action');
      var data={'username':hui('#username').val(),'role':hui("#role").val(),'pwd':hui('#pwd').val()}
       _ajaxsubmit({'url':url,'data':data,'action':"hui('#signupForm').dom[0].reset()"});
      }
    });
</script>


</body>

</html>