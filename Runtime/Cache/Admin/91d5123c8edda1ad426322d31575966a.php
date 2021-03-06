<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>


<!-- Mirrored from www.zi-han.net/theme/hplus/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 20 Jan 2016 14:16:41 GMT -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <title>毕业论文后台管理系统</title>

    <meta name="keywords" content="">

    <!--[if lt IE 9]>
    <meta http-equiv="refresh" content="0;ie.html" />
    <![endif]-->
    <link href="/static/css/bootstrap.min.css" rel="stylesheet">
    <link href="/static/css/font-awesome.min.css" rel="stylesheet">
    <link href="/static/css/animate.min.css" rel="stylesheet">
    <link href="/static/css/style.min.css" rel="stylesheet">
</head>

<body class="fixed-sidebar full-height-layout gray-bg" style="overflow:hidden">
    <div id="wrapper">
        <!--左侧导航开始-->
        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="nav-close"><i class="fa fa-times-circle"></i>
            </div>
            <div class="sidebar-collapse">
                <ul class="nav" id="side-menu">
                    <li class="nav-header">
                        <div class="dropdown profile-element">
                            <span><img alt="image" class="img-circle" src="/static/img/logo.png" /></span>
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <span class="clear">
                               <span class="block m-t-xs"><strong class="font-bold"><?php echo ($_SESSION['username']['username']); ?></strong></span>
                                <span class="text-muted text-xs block">超级管理员<b class="caret"></b></span>
                                </span>
                            </a>
                         <!--    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                <li><a class="J_menuItem" href="form_avatar.html">修改头像</a>
                                </li>
                                <li><a class="J_menuItem" href="profile.html">个人资料</a>
                                </li>
                                <li><a class="J_menuItem" href="contacts.html">联系我们</a>
                                </li>
                                <li><a class="J_menuItem" href="mailbox.html">信箱</a>
                                </li>
                                <li class="divider"></li>
                                <li><a href="<?php echo U('Login/doLogout');?>">安全退出</a>
                                </li>
                            </ul> -->
                        </div>
                        <div class="logo-element">H+
                        </div>
                    </li>
                  
                   <li>
                       <a href="/admins.php/Index/index"><i class="fa fa-home"></i> <span  id='depart' class="nav-label">
                           主页
                       </span>
                       
                   </li>
                    <li>
                        <a href="mailbox.html"><i class="fa fa-map"></i> <span  id='depart' class="nav-label">
                            院系管理
                        </span>
                        <ul class="nav nav-second-level">
                            <li><a class="J_menuItem" href="<?php echo U('Depart/create');?>">增加院系</a>
                            </li>
                            <li id="showdepart" ><a class="J_menuItem" href="<?php echo U('Depart/index');?>">查看院系</a>
                            </li>
                            </li>
                        </ul>
                    </li>
                  
                    <li>
                        <a href="mailbox.html"><i class="fa fa-tasks"></i> <span class="nav-label">
                            专业管理
                        </span>
                        <ul class="nav nav-second-level">
                            <li><a class="J_menuItem" href="<?php echo U('Class/create');?>">增加专业</a>
                            </li>
                            <li><a class="J_menuItem" href="<?php echo U('Class/index');?>">查看专业</a>
                            </li>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="mailbox.html"><i class="fa fa-child"></i> <span class="nav-label">
                            教师管理
                        </span>
                        <ul class="nav nav-second-level">
                            <li><a class="J_menuItem" href="<?php echo U('Teacher/index');?>">查看教师</a>
                            </li>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="mailbox.html"><i class="fa fa-graduation-cap"></i> <span class="nav-label">
                            学生管理
                        </span>
                        <ul class="nav nav-second-level">
                            <li><a class="J_menuItem" href="<?php echo U('Student/index');?>">查看学生</a>
                            </li>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="mailbox.html"><i class="fa fa-cogs  fa-spin"></i> <span class="nav-label">
                            安全管理
                        </span>
                        <ul class="nav nav-second-level">
                             <li><a class="J_menuItem" href="<?php echo U('settime');?>" >选课时间</a></li>
                             <li><a class="J_menuItem" href="<?php echo U('setlimitnum');?>" >选课人数</a></li>
                            <li><a class="J_menuItem" href="javascript:" onclick="alert('更新中')">修改密码</a>
                            </li>
                          <li><a class="J_menuItem" href="<?php echo U('Login/dologout');?>">退出登录</a>
                          </li>
                           
                        </ul>
                    </li>

                </ul>
            </div>
        </nav>
        <!--左侧导航结束-->
        <!--右侧部分开始-->
        <div id="page-wrapper" class="gray-bg dashbard-1">
            <div class="row border-bottom">
                <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
                    <div class="navbar-header"><a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
                    </div>
                   <h1><center>后台管理系统</center></h1>     
          </nav>
            </div>
            <div class="row content-tabs">
                <button class="roll-nav roll-left J_tabLeft"><i class="fa fa-backward"></i>
                </button>
                <nav class="page-tabs J_menuTabs">
                    <div class="page-tabs-content">
                        <a href="javascript:;" class="active J_menuTab" data-id="<?php echo U('step');?>">首页</a>
                    </div>
                </nav>
                <button class="roll-nav roll-right J_tabRight"><i class="fa fa-forward"></i>
                </button>
                <div class="btn-group roll-nav roll-right">
                    <button class="dropdown J_tabClose" data-toggle="dropdown">关闭操作<span class="caret"></span>

                    </button>
                    <ul role="menu" class="dropdown-menu dropdown-menu-right">
                        <li class="J_tabShowActive"><a>定位当前选项卡</a>
                        </li>
                        <li class="divider"></li>
                        <li class="J_tabCloseAll"><a>关闭全部选项卡</a>
                        </li>
                        <li class="J_tabCloseOther"><a>关闭其他选项卡</a>
                        </li>
                    </ul>
                </div>
                <a href="<?php echo U('Login/dologout');?>" class="roll-nav roll-right J_tabExit"><i class="fa fa fa-sign-out"></i> 退出</a>
            </div>
            <div class="row J_mainContent" id="content-main">
                <iframe class="J_iframe" name="iframe0" width="100%" height="100%" src="<?php echo U('step');?>" frameborder="0" data-id="index_v1.html" seamless></iframe>
            </div>
            <div class="footer">
                <div class="pull-right">&copy; 2014-2015 <a href="http://bs.equxue.cn target="_blank">zihan's blog</a>
                </div>
            </div>
        </div>
        <!--右侧部分结束-->
       
    </div>
  <!-- 全局js -->
  <script src="/static/js/jquery.min.js"></script>
  <script src="/static/js/bootstrap.min.js"></script>
  <script src="/static/js/plugins/metisMenu/jquery.metisMenu.js"></script>
  <script src="/static/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
  <script src="/static/js/plugins/layer/layer.min.js"></script>

  <!-- 自定义js -->
  <script src="/static/js/hplus.min.js"></script>
  <script type="text/javascript" src="/static/js//contabs.min.js"></script>

  <!-- 第三方插件 -->
  <script src="/static/js/plugins/pace/pace.min.js"></script>
</body>


<!-- Mirrored from www.zi-han.net/theme/hplus/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 20 Jan 2016 14:17:11 GMT -->
</html>