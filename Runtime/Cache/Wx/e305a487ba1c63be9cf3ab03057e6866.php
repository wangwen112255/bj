<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>

<html>

<head>

    <meta charset="utf-8">

    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

    <link rel="stylesheet" href="/static/css/hui/hui.css" />

    <title></title>
    
<style type="text/css">
  .pagination {
    display: inline-block;
    padding-left: 0;
    margin: 20px 0;
    border-radius: 4px;
}
.pagination > li {
    display: inline;
}
.pagination > li:first-child > a, .pagination > li:first-child > span {
    margin-left: 0;
    border-top-left-radius: 4px;
    border-bottom-left-radius: 4px;
}
.pagination > li > a, .pagination > li > span {
    position: relative;
    float: left;
    padding: 6px 12px;
    margin-left: -1px;
    line-height: 1.42857143;
    color: #337ab7;
    text-decoration: none;
    background-color: #fff;
    border: 1px solid #ddd;
}
.hui-list li{
  line-height: 30px;
  height: 30px;
  background: #ccd;
  opacity: 0.6;
}
</style>

 
    <style>
    #list2 li{width:50%; float:left; margin:5px 0px;}
    #hui-footer a{width: 25%;}
   </style>

</head>

<body style="background:#F8F8F8;padding-bottom: 80px;">
  
  <header class="hui-header" style="background:#26A2FF ;">
      <div id="hui-header-menu" onclick="showMenu();"></div>
      <h1><span class="hui-icons-home hui-icons"></span><?php echo ($depart["departname"]); ?>学院</h1>
  </header>
  <div class="hui-swipe" id="swipe1">
    <div class="hui-swipe-pre"><img src="<?php echo ($depart["pic"]); ?>"/></div>
  </div>
  <div class="hui-wrap" style="padding-top: 30px">
    <?php if(is_array($codata)): $i = 0; $__LIST__ = $codata;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><div class="hui-accordion">
        <div class="hui-accordion-title">姓名：<?php echo ($data["stuname"]); ?>&nbsp;&nbsp;<?php echo ($data["stid"]); ?></div>
        <div class="hui-accordion-content">
            <div class="hui-list">
                <ul>
                    <li>课题：<?php echo ($data["coname"]); ?></li>
                    <li>指导教师：<?php echo ($data["tename"]); ?></li>
                </ul>
            </div>
        </div>
    </div><?php endforeach; endif; else: echo "" ;endif; ?>
    <center><?php echo ($showpage); ?></center>  
    <?php if(empty($codata)): ?><div class="jumbotron">
         <div class="container">
           <h1>已经尽力了</h1>
           <p>暂时还没有选课结果，敬请关注</p>
           <p>
             <a class="btn btn-primary btn-lg" onclick="javascript:history.go(-1)">返回</a>
           </p>
         </div>
       </div><?php endif; ?>
     
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


<script type="text/javascript" src="/static/js/hui/hui-accordion.js"></script>
<script src="js/hui-swipe.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript">
hui.accordion(true, true);
</script>


</body>

</html>