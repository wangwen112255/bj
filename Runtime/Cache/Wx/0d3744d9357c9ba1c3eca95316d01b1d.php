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
</style>

 
    <style>
    #list2 li{width:50%; float:left; margin:5px 0px;}
    #hui-footer a{width: 25%;}
   </style>

</head>

<body style="background:#F8F8F8;padding-bottom: 80px;">
  

  <header class="hui-header" style="background:#26A2FF ;">
    <div id="hui-back"></div>
  <h1>修改密码</h1>
  </header>
  
  <div class="hui-wrap">
<form action="/wx.php/Teacher/safe" id='signupForm' method="post">

    <div style="margin:28px; margin-bottom:15px;" class="hui-form" id="form1">
       <div class="hui-form-items">
            <input type="password" class="hui-input hui-pwd-eye" placeholder="新密码" checkType="string" id="pwd" checkData="6,20" checkMsg="密码应为6-20个字符" />
        </div>
        <div class="hui-form-items">
            <input type="password" class="hui-input hui-pwd-eye" placeholder="重复新密码" checkType="sameWithId" checkData="pwd" checkMsg="两次密码不一致"  />
        </div>
    
    </div>
 </form> 
  

  <div style="padding:28px; padding-top:0px;">
        <button type="button"  <?php if(($_SESSION['auth']) == "1"): ?>onclick="alert('不还意思您是授权登录的用户是不可以修改密码的');return false;"<?php endif; ?> class="hui-button hui-button-large hui-primary" id="submit">更新密码</button>
    </div>
  
       

  </div>


<script type="text/javascript" src="/static/js/hui/hui.js"></script>  


<script src="/static/js/hui/hui-form.js" type="text/javascript" charset="utf-8"></script>
<script src="/static/js/hui/base.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript">
hui.formInit();
// alert(0)

hui('#submit').click(function(){
    var res = huiFormCheck('#signupForm');
  
    if(res){
      var url=hui('#signupForm').attr('action');
      var data={'pwd':hui('#pwd').val()}
       _ajaxJson({'url':url,'data':data});
      }
  
    });

</script>


</body>

</html>