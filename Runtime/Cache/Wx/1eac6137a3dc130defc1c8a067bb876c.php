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
      <div id="hui-back"></div>
      <h1>毕业班学生</h1>
  </header>
 
  <div class="hui-wrap" style="padding-top:30px">
    <!--<div class="hui-center-title" style="margin-top:0px;"><h1 style="margin:0px 10px ;text-align: left;">院系查看</h1></div>-->   
    <div class="hui-img-list" id='list2'>
        <ul>
         <?php if(is_array($Tedata)): $i = 0; $__LIST__ = $Tedata;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
                <a href="<?php echo U('Teacher/studentdetail',array('id'=>$vo['id']));?>">
                 <?php if(($vo["iscomplete"]) == "1"): ?><button style="background: #0f0;font-size:12px;position: absolute;width:80px;top:50%;left:50%;margin-left:-60px;opacity: 0.8">该生已完成选课</button><?php endif; ?>
                    <img style="border-radius: 200px;" src="<?php echo ((isset($vo["photo"]) && ($vo["photo"] !== ""))?($vo["photo"]):'/static/img/a2.jpg'); ?>" />
                    <div class="hui-img-list-content">
                        <h1><?php echo ($vo["realname"]); ?></h1>
                        <p><?php echo ((isset($vo["desct"]) && ($vo["desct"] !== ""))?($vo["desct"]):'该生是优秀毕业生'); ?></p>
                    </div>
                </a>
            </li><?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
        
    </div>
    

</div>



<script type="text/javascript" src="/static/js/hui/hui.js"></script>  


<script type="text/javascript">
  
</script>



</body>

</html>