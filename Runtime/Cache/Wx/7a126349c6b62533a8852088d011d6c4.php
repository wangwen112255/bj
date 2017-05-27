<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>

<html>

<head>

    <meta charset="utf-8">

    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

    <link rel="stylesheet" href="/static/css/hui/hui.css" />

    <title></title>
    
<style type="text/css">
#hui-up-toast{
  background: green;
}
</style>

 
    <style>
    #list2 li{width:50%; float:left; margin:5px 0px;}
    #hui-footer a{width: 25%;}
   </style>

</head>

<body style="background:#F8F8F8;padding-bottom: 80px;">
  

<header class="hui-header" style="background:#26A2FF ;">
    <!-- <div id="hui-back"></div> -->
  <h1>基本资料</h1>
  </header>
  <div class="hui-wrap">
<form action="<?php echo U('intro');?>" id='signupForm' method="post">
    <div style="margin:28px; margin-bottom:15px;" class="hui-form" >
        <div class="hui-form-items">
            <input type="text" class="hui-input hui-input-clear" value="<?php echo ($Userdata['realname']); ?>" placeholder="真实姓名" checkType="string" checkData="3,5"  id='realname' checkMsg="真实姓名一般是三到五个汉字" />
        </div>
        <div class="hui-form-items">
            <input type="text" class="hui-input hui-input-clear" placeholder="学号" checkType="int" id="studentid" checkData="9" checkMsg="学号为9位数字" value="<?php echo ($Userdata['studentid']); ?>" />
        </div>
        
       <div class="hui-form-items">
      <div class="hui-form-items-title">院系专业选择</div>
       <div class="hui-form-select">
        <select name="depart_id" id='depart'>
        <option value=''>--请选择您的院系--</option>
        <?php if(is_array($Dedata)): foreach($Dedata as $key=>$vo): ?><option value='<?php echo ($vo["id"]); ?>' <?php if(($vo["id"]) == $Userdata['depart_id']): ?>selected<?php endif; ?>><?php echo ($vo["departname"]); ?></option><?php endforeach; endif; ?>
        </select>
        </div>
        </div>
        <div class="hui-form-items">
        <div class="hui-form-items-title">院系专业选择</div>
        <div class="hui-form-select">
         <select require name="class_id" id='classes'>
          <option value=''>--请选择您的专业--</option>
           <?php if(is_array($Cldata)): foreach($Cldata as $key=>$vo): ?><option value='<?php echo ($vo["id"]); ?>' <?php if(($vo["id"]) == $Userdata['class_id']): ?>selected<?php endif; ?>><?php echo ($vo["classname"]); ?></option><?php endforeach; endif; ?>
        </select>
       </div>
       </div>
    
    </div>
    
    
</form> 
    
    <div style="padding:28px; padding-top:0px;">

        <button type="button" class="hui-button hui-button-large hui-primary" id="submit">
           <?php if(($_GET['isIntro']) == "1"): ?>补充资料<?php else: ?>修改资料<?php endif; ?> 
        </button>
    </div>

  </div>

<script type="text/javascript" src="/static/js/hui/hui.js"></script>  


 <?php if(($_GET['isIntro']) == "1"): ?><script type="text/javascript">hui.alert('请先完善您的资料好吗？请认真填写否则会造成操作失败','我知道了')</script><?php endif; ?>
<script src="/static/js/hui/hui-form.js" type="text/javascript" charset="utf-8"></script>
<script src="/static/js/hui/base.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript">
hui.formInit();
hui('#depart').change(function(){
        txt=hui('#depart').val();
       hui('#classes').dom[0].options.length = 0;
        hui.postJSON('/wx.php/Class/changeClass',{de:txt},function(data){
            // alert(typeod)
              for(var i in data)
              hui('#classes').dom[0].options.add(new Option(data[i],i))
          

        })
    })

hui('#submit').click(function(){
    var res = huiFormCheck('#signupForm');
    // alert(0)
    if(res){
      var url=hui('#signupForm').attr('action');
      var data={'realname':hui('#realname').val(),'studentid':hui("#studentid").val(),'depart_id':hui('#depart').val(),'class_id':hui('#classes').val()}
       _ajaxJson({'url':url,'data':data});
      }
    });

</script>


</body>

</html>