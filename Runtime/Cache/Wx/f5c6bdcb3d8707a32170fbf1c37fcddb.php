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
      width: 80%;
      padding-left: 0px;
      padding-right: 2px;
    }
    .active{
      background: #515151 !important;
    }
    .check{
      display: none;
    }

</style>
 
    <style>
    #list2 li{width:50%; float:left; margin:5px 0px;}
    #hui-footer a{width: 25%;}
   </style>

</head>

<body style="background:#F8F8F8;padding-bottom: 80px;">
  

 <header class="hui-header" style="background:#26A2FF ;">
      <div id="hui-header-menu"></div>
      <h1>通知消息</h1>
  </header>
  <div class="hui-wrap">
   <?php if(empty($codata)): ?><div style="padding:30px;"><center><span style="font-size: 50px;color: #f40" class="hui-icons hui-icons-warn">  
  <button  onclick="history.go(-1)" type="button" class="hui-button  hui-button-large " style="color:#ffff;background: green" >不好意思未查询到相关信息，点击返回</button>
   </span>
   </center> 
    </div><?php endif; ?>

    <div class="hui-media-list" style="padding:10px;">
    <button style="display: inline-block;" type="button" class="checks1 active hui-button  hui-primary oid='<?php echo ($vo["oid"]); ?>' hui-button-small ">未审核</button>
        <button style="display: inline-block;background: #0f0;" type="button" class="checks2 hui-button  hui-primary hui-button-small ">已审核</button>
    <?php if(is_array($codata)): $i = 0; $__LIST__ = $codata;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><ul class="<?php if(($vo["isreceive"]) == "0"): ?>uncheck<?php else: ?>check<?php endif; ?> ">
        <li>
        
            <!--<div class="hui-media-list-img"><img src="img/1.png" /></div>-->
            <div class="hui-media-content">
              <h1>姓名：<?php echo ($vo["stuname"]); ?></h1>
              <p>学号：<span class="hui-badge hui-default"><?php echo ($vo["stid"]); ?></span></p>
              <p>课程题目：<?php echo ($vo["coname"]); ?></p>

                    <?php if(($vo["iscomplete"]) == "0"): ?><p> <span class="hui-badge hui-default">待录取</span>  </p></div>
                  <?php if(($vo["isreceive"]) == "0"): ?><button style="position: absolute;right: 5px;height: 30px;top:10%;" type="button" class="hui-button pass hui-primary  hui-button-small " oid='<?php echo ($vo["oid"]); ?>' sid='<?php echo ($vo["stid"]); ?>' cid='<?php echo ($vo["cid"]); ?>'>通过</button>

                  <button style="position: absolute;right: 5px;height: 30px;bottom:10%;;" oid='<?php echo ($vo["oid"]); ?>' type="button" class="hui-button hui-danger  refuse hui-button-small ">拒绝</button>
                  <span>
                  
                  <?php else: ?> 
                  <button style="position: absolute;right: 5px;height: 30px;top:50%;margin-top: -15px;" type="button"  class="hui-button hui-primary  refuse hui-button-small ">已审核</button><?php endif; ?>
                  
                    <?php else: ?>
                     <p> <span class="hui-badge hui-primary">

                       <?php if(($vo["is_success"]) == "1"): ?>我已录取<span class="glyphicon glyphicon-ok"></span><?php else: ?>已完成选课<?php endif; ?>

                     </p></div>
                    <?php if(($vo["isreceive"]) == "0"): ?><button style="position: absolute;right: 5px;height: 30px;top:50%;margin-top: -15px;" type="button" oid='<?php echo ($vo["oid"]); ?>' class="hui-button hui-default sawed   hui-button-small ">加入已审核</button>
                    <?php else: ?>
                    <button style="position: absolute;right: 5px;height: 30px;top:50%;margin-top: -15px;" type="button" class="hui-button hui-primary  hui-button-small ">已审核</button><?php endif; endif; ?>
              

             
 
         
       
        </li>
      
      </ul><?php endforeach; endif; else: echo "" ;endif; ?>
    </div>

  </div>


<script type="text/javascript" src="/static/js/hui/hui.js"></script>  


<script src="/static/js/hui/base.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript">

hui('.checks1').click(function(){
hui(this).addClass('active');
hui('.checks2').removeClass('active');
hui('.uncheck').show();
hui('.check').hide();
})
hui('.checks2').click(function(){
hui(this).addClass('active');
hui('.checks1').removeClass('active');
hui('.check').show();
hui('.uncheck').hide();
})
  hui('.pass').click(function(){
    var oid=hui(this).attr('oid');
    var cid=hui(this).attr('cid');
    var sid=hui(this).attr('sid');
    _ajaxchange({url:'/wx.php/Teacher/accept','msg':'您确定要接受该申请？','data':{'oid':oid,'sid':sid,'cid':cid}});
  })
   hui('.sawed').click(function(){
    var oid=hui(this).attr('oid');
    _ajaxchange({url:'/wx.php/Teacher/joincheck','msg':'希望该生可以出色的和其他导师完成毕业设计','data':{'oid':oid}
    })
  })
   hui('.refuse').click(function(){
    var oid=hui(this).attr('oid');
    _ajaxmodify({url:'/wx.php/Teacher/refuse','msg':'您确定要拒绝该生的申请吗？','data':{'oid':oid}});
    })
</script>



</body>

</html>