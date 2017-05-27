<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>

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
      width: 100%;
      padding-left: 0px;
      padding-right: 0px;
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
      <h1><?php echo ($Stdetaildata[0]['strealname']); ?>同学选课详情</h1>
  </header>
  <div class="hui-wrap">
   <?php if(empty($Stdetaildata)): ?><div style="padding:30px;"><center><span style="font-size: 50px;color: #f40" class="hui-icons hui-icons-warn">  
  <button  onclick="history.go(-1)" type="button" class="hui-button  hui-button-large " style="color:#ffff;background: green" >不好意思未查询到相关信息，点击返回</button>
   </span>
   </center> 
    </div><?php endif; ?>
    <div class="hui-media-list" style="padding:0px;">
    <?php if(is_array($Stdetaildata)): $i = 0; $__LIST__ = $Stdetaildata;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><ul>
        <li>
        
            <!--<div class="hui-media-list-img"><img src="img/1.png" /></div>-->
            <div class="hui-media-content">
              <h1>题目：<?php echo ($data["coursename"]); ?></h1>
              <p>指导教师：<?php echo ($data["terealname"]); ?></p>
              <p>
                    选课时间：<span class="hui-badge hui-primary"><?php echo ($data["createtime"]); ?></span>
                    课程状态：
                    
                     <?php if(($data["is_success"]) == "1"): ?><span class="hui-badge hui-primary">成功选课</span>
                      <?php else: ?>
                      <?php if(($data["isreceive"]) == "0"): ?><span class="hui-badge hui-default">审核中</span>
                      <?php else: ?>
                         <span class="hui-badge hui-danger">已拒绝</span><?php endif; endif; ?>
                  
              </p>
            </div>
             
       
        </li>
      
      </ul><?php endforeach; endif; else: echo "" ;endif; ?>
    </div>

  </div>


<script type="text/javascript" src="/static/js/hui/hui.js"></script>  


<script type="text/javascript">

</script>



</body>

</html>