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
  
<header class="hui-header" style="background:#26A2FF ;">
      <div id="hui-header-menu" onclick="showMenu();"></div>
      <h1><span class="hui-icons-home hui-icons"></span>首页</h1>
  </header>
  <div class="hui-swipe" id="swipe1">
    <div class="hui-swipe-item"><img src="/static/img/1.png"/></div>
    <div class="hui-swipe-item"><img src="/static/img/2.png"/></div>
    <div class="hui-swipe-item"><img src="/static/img/3.png"/></div>
  </div>
  <div class="hui-wrap" style="padding-top:30px">
    <!--<div class="hui-center-title" style="margin-top:0px;"><h1 style="margin:0px 10px ;text-align: left;">院系查看</h1></div>-->   
    <div class="hui-img-list" id='list2'>
        <ul>
         <?php if(is_array($Dedata)): $i = 0; $__LIST__ = $Dedata;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
                <a href="<?php echo U('Depart/detail',array('id'=>$vo['id']));?>">
                    <img src="<?php echo ($vo["pic"]); ?>" />
                    <div class="hui-img-list-content">
                        <h1><?php echo ($vo["departname"]); ?></h1>
                        <p><?php echo ($vo["desc"]); ?></p>
                    </div>
                </a>
            </li><?php endforeach; endif; else: echo "" ;endif; ?>
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
    <a href="<?php echo U('Index/index');?>" id="nav-my">
        <div class="hui-footer-icons hui-icons-my"></div>
        <div class="hui-footer-text">我的</div>
    </a>
  </div>
<script type="text/javascript" src="/static/js/hui/hui.js"></script>  


<script src="/static/js/hui/hui-swipe.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript">
var swipe1 = new huiSwpie('#swipe1');
        swipe1.autoPlay = true;
        swipe1.delay=3000;
        swipe1.run();
</script>


</body>

</html>