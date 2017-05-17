<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <title> 登录</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <link href="/static/css/bootstrap.min.css" rel="stylesheet">
    <link href="/static/css/font-awesome.min.css" rel="stylesheet">
    <link href="/static/css/animate.min.css" rel="stylesheet">
    <link href="/static/css/style.min.css" rel="stylesheet">
    <link href="/static/css/login.min.css" rel="stylesheet">

    <!--[if lt IE 9]>
    <meta http-equiv="refresh" content="0;ie.html" />

    <![endif]-->
    <script>
        if(window.top!==window.self)
            {window.top.location=window.location};

    </script>
</head>
<body class="signin">
    <div class="signinpanel">

        <div class="row">

            <div class="col-sm-7">

                <div class="signin-info">

                    <div class="logopanel m-b">

                        <h1>后台管理登录</h1>

                    </div>

                    <div class="m-b"></div>

                    <h4>欢迎使用 <strong>毕业论文选课系统</strong></h4>

                    <ul class="m-b">

                        <li><i class="fa fa-arrow-circle-o-right m-r-xs"></i>学生选课</li>

                        <li><i class="fa fa-arrow-circle-o-right m-r-xs"></i>教师传课</li>

                        <li><i class="fa fa-arrow-circle-o-right m-r-xs"></i>学校统计</li>
                    </ul>
                    <strong>还没有账号？ <a href="javascript:" onclick="alert('暂时还不能进行注册')">立即注册&raquo;</a></strong>

                </div>

            </div>

            <div class="col-sm-5">

                <form method="post" action="<?php echo U('Login/doLogin');?>">

                    <h4 class="no-margins">登录：</h4>

                    <p class="m-t-md">登录到后台管理系统</p>

                    <input type="text" class="form-control uname" name="username" placeholder="用户名" />

                    <input type="password" class="form-control pword m-b" name="password"  placeholder="密码" />

                    <a href="#">忘记密码了？</a>

                    <button class="btn btn-success btn-block">登录</button>

                </form>
                

            </div>

        </div>

        <div class="signup-footer">

            <div class="pull-left">

                &copy; 2017 All Rights Reserved. 顶尖科技

            </div>

        </div>

    </div>

</body>





<!-- Mirrored from www.zi-han.net/theme/hplus/login_v2.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 20 Jan 2016 14:19:52 GMT -->

</html>