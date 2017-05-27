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
<form action="<?php echo U('dologin');?>" id='signupForm' method="post">
    <div style="margin:10px; margin-bottom:15px;" class="hui-form" id="form1">
        <div class="hui-form-items">
            <input type="text" name="username"  id='username' class="hui-input hui-input-clear" placeholder="用户名" checkType="string" checkData="5,20" checkMsg="用户名应为5-20个字符" />
        </div>
        <div class="hui-form-items">
            <input type="password" name="password"  class="hui-input hui-pwd-eye" placeholder="登录密码" checkType="string" id="pwd" checkData="6,20" checkMsg="密码应为6-20个字符" />
        </div>
         <div class="hui-form-items">
      <div class="hui-form-radios">
       <input type="hidden"  id='role' value='te'>
      <input type="radio" value="te" name="role" id="g1" checked="checked" onchange="showSelectRes(this);" /><label for="g1">教师</label>
      <input type="radio" value="st" name="role" id="g2" onchange="showSelectRes(this);" /><label for="g2">学生</label>
      </div>
    </div>
    
    </div>

  </form>
     <div style="padding:10px; padding-top:0px;">
        <input type="hidden" id="url" value="<?php echo U('dologins');?>">
        <button  class="hui-button hui-button-large hui-primary" id="submit">立即登录</button>
    </div>
 
</div>
<p style="padding:10px"><a href="<?php echo U('Login/register');?>">没有帐号，请先注册</a></p>
<p style="padding:10px"><a href="<?php echo U('Ming/getOauth',array('type'=>'qq'));?>" onclick="return confirm('学生才可以第三方登录，老师请走正常线路登录，请确认一下您的身份');"> <center><button  class="hui-button hui-button-small hui-danger" >使用QQ授权登录</button></a></center></p>
 
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
hui('#submit').click(function(){
    var res = huiFormCheck('#signupForm');
    if(res){
      var url=hui('#signupForm').attr('action');
      var data={'username':hui('#username').val(),'role':hui("#role").val(),'password':hui('#pwd').val()}
       _ajaxsubmit({'url':url,'data':data});
      }
    });


</script>


</body>

</html>