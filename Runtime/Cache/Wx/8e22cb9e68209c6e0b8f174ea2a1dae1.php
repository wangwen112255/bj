<?php if (!defined('THINK_PATH')) exit(); session_start(); $role=$_SESSION['role']?$_SESSION['role']:'Student'; $role.='/index'; ?>
<!DOCTYPE html>

<html>

<head>

    <meta charset="utf-8">

    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

    <link rel="stylesheet" href="/static/css/hui/hui.css" />

    <title></title>
    
<style type="text/css">
  
    #list2 li{width:50%; float:left; margin:5px 0px;}
    #hui-footer a{width: 25%;}
    .hui-media-content{
      float: left;
      width: 80%;
      padding-left: 0px;
      padding-right: 2px;
    }
</style>
 
    <style>
    #list2 li{width:50%; float:left; margin:5px 0px;}
    #hui-footer a{width: 25%;}
   </style>

</head>

<body style="background:#F8F8F8;padding-bottom: 80px;">
  

 <header class="hui-header" style="background:#26A2FF ;">
      <!-- <div id="hui-header-menu"></div> -->
      <h1>在线选课</h1>
  </header>
  <div class="hui-wrap">
    <div class="hui-media-list" style="padding:10px;">
    <?php if(is_array($codata)): $i = 0; $__LIST__ = $codata;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><ul>
        <li>
        
            <!--<div class="hui-media-list-img"><img src="img/1.png" /></div>-->
            <div class="hui-media-content">
              <h1>题目：<?php echo ($data["coursename"]); ?></h1>
              <p>要求：<?php echo ($data["desc"]); ?></p>
              <p>
                    已选：<span class="hui-badge hui-primary"><?php echo ($data["choosenum"]); ?></span>
                    限选：<span class="hui-badge hui-danger"><?php echo ($data["limitnum"]); ?></span>
                  
              </p>
            </div>
             <?php if(($data["choosenum"]) == $data['limitnum']): ?><button style="position: absolute;right: 5px;height: 30px;top:50%;margin-top: -15px;" type="button" class="hui-button hui-danger  hui-button-small ">已满</button>
              <?php else: ?>
              
            <button  onclick="location.href='<?php echo U('Course/index');?>'"  style="position: absolute;right: 5px;height: 30px;top:50%;margin-top: -15px;" type="button" class="hui-button hui-primary  hui-button-small ">选课</button><?php endif; ?>
       
        </li>
      
      </ul><?php endforeach; endif; else: echo "" ;endif; ?>
    </div>
   <center><?php echo ($show); ?></center>  

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
    <a href="<?php echo U($role);?>" id="nav-my">
        <div class="hui-footer-icons hui-icons-my"></div>
        <div class="hui-footer-text">个人中心</div>
    </a>
  </div>
<script type="text/javascript" src="/static/js/hui/hui.js"></script>  


<script type="text/javascript">

</script>



</body>

</html>