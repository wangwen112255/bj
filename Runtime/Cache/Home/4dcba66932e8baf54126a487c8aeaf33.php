<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>修改密码</title>
	<link rel="stylesheet" type="text/css" href="/static/css/bootstrap.min.css">
	
</head>
<body>
<p></p>
<p></p>
<p></p>
<div class="col-sm-12" style="margin-top:60px">
 <form action="/index.php/Teacher/safe" method="POST" class="form-horizontal" role="form" id='changeform'>
 	
 	<div class="form-group">
 	  <label for="" class='control-label col-sm-3'>密　　码</label>
 	  <div class="col-sm-6">
 	  <input type="password"  name='pwd' class="form-control " id="pwd" placeholder="请输入正确的密码">
 	</div>
 	</div>
 	<div class="form-group">
 	  <label for="" class='control-label col-sm-3'>重复密码</label>
 	  <div class="col-sm-6">
 	  <input type="password"  name='repwd' class="form-control " id="" placeholder="请重复输入密码">
 	</div>
 	</div>
	<div class='form-group'>
	<div class="col-sm-offset-3 col-sm-5">
 	<button type="" id='close' class="btn btn-default">关闭</button>
 	<button type="submit" class="btn btn-success">确认修改</button>
	</div>
	</div>	
 </form>
  </div>
   </div>
   	<script type="text/javascript" src='/static/js/jquery.js'></script>
	<script type="text/javascript" src='/static/js/plugins/validate/jquery.validate.min.js'></script>
	<script type="text/javascript" src="/static/js/plugins/layer/layer.min.js"></script>
	<script type="text/javascript" src="/static/js/common.js"></script>
	<script type="text/javascript">
	$(function(){


		var icon="<span class='glyphicon glyphicon-remove'></span>";   
		messageslogin={
		 pwd:{
		  required:icon+'请输入密码',
		  minlength:icon+'密码长度不正确，最少为6'
		 },
		 repwd:{
		  required:icon+'请输入正确的密码',
		  equalTo:icon+'两次密码不一样',
		  minlength:icon+'密码长度不正确'
		 }
		};
		 ruleslogin={
		  pwd:{
		    required:true,
		    minlength:5

		  },
		
		  repwd:{
		  	equalTo:'#pwd',
		    required:true,
		    minlength:5
		  }
		};

		_validade({id:'changeform',rules:ruleslogin,messages:messageslogin})

		$('#close').click(function(){
		var index = parent.layer.getFrameIndex(window.name); 
		parent.layer.close(index);
		})
		})

	// alert(0)
	</script>
</body>
</html>