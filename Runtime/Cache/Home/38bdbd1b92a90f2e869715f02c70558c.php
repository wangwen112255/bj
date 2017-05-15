<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>找回密码</title>
</head>
<style type="text/css">

	body{
		background: #ccc;
	}
	tr{
		height: 40px;
		padding-top:15px;
	}
	.forgetpwd{
		width: 300px;
		height: 300px;
		/* background: blue; */
		border-radius: 0px 50px 0px 50px;
		box-shadow: 5px 5px  5px #515151;
		border: 1px solid #515151;
		background: #0065B3;
		opacity: 0.8;
		position: absolute;
		left: 50%;
		top: 50%;
		margin-left: -150px;
		margin-top: -150px;

	}
	input{
		height: 30px;
		border-radius:6px;

	}
	input:focus{
		box-shadow: 2px 2px 2px red;
		
	}
</style>
<body>

	<div class="forgetpwd">
		<p ><H2 align="center">找回密码</H2></p>
		<form action="/index.php/Public/forgetpwd" method="post">
		<table>
			<tr>
				<td>用户名</td>
				<td><input type="text" name="username" id=""></td>
			</tr>
			<tr>
				<td>学　号</td>
				<td><input type="text" name="studentid"></td>
			</tr>
			<tr>
				<td>姓　名</td>
				<td><input type="text" name="realname"></td>
			</tr>
			<tr>
				<td>设置密码</td>
				<td><input type="password" name="pwd"></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" name="" value="提交">
					<input type="reset" name="" value="重新输入">
				</td>
			</tr>
			<input type="hidden" name="cid" value="1212">
		</table>
		
		</form>

	</div>

</body>
</html>