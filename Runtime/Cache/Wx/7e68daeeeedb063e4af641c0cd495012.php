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
#huiImgCuter{width:80%; height:80%; position:absolute; left:10%; top:10%; z-index:9; background:rgb(255,255,255,0); border:1px solid #FFFFFF;}
.huiCuterMask{width:100%; height:10px; position:absolute; left:0px; top:0px; z-index:8; background:rgba(0,0,0,0.8);}
#huiImgCutImgIn{width:100%;}
#huiImgCutImgIn img{width:100%;}
#huiCuterCanvas{position:fixed; display:none; z-index:20; top:100px; right:10px; width:100px; border:1px solid #FFFFFF; font-size:0px;}
#huiCuterCanvas canvas{width:100%;}
#huiCuterSelectImg{width:100; text-align:center; background:#F4F5F6;}
</style>

 
    <style>
    #list2 li{width:50%; float:left; margin:5px 0px;}
    #hui-footer a{width: 25%;}
   </style>

</head>

<body style="background:#F8F8F8;padding-bottom: 80px;">
  

  <header class="hui-header" style="background:#26A2FF ;">
    <div id="hui-back"></div>
  <h1>头像设置</h1>
  </header>
  
  <div class="hui-wrap">
    <!-- 图片裁切核心区域  -->
    <div id="huiImgCutShow" style="position:relative; font-size:0px;"></div>
    <!-- 文件域用于选择图片 -->
    <input type="file" id="hui-img-cut-file" accept="image/png,image/gif" style="display:none;" />
    <!-- 图片展示核心区  -->
    <div id="huiCuterSelectImg">
        <div style="line-height:100px; padding-top:50px; font-size:100px; color:#B8BBBF;">+</div>
        <div style="line-height:50px; padding-bottom:30px; font-size:16px; color:#B8BBBF;">选择图片</div>
    </div>
    <!-- huiImgCuterCanvas 用户保存剪裁后的图片信息 -->
    <div id="huiCuterCanvas"><canvas id="huiImgCuterCanvas" width="500" height="500"></canvas></div>
</div>
<div id="hui-footer">

    <button type="button" class="hui-button hui-fl" style="margin:2px 0px 0px 8px;" id="selectImgBtn">选择照片</button>
    <input type="hidden" name="url" id='url' value="<?php echo U('Public/uploadfilewx');?>" > 
    <button type="button" class="hui-button hui-primary hui-fr" style="margin:2px 8px 0px 0px;" id="uploadBtn">保存照片</button>
</div>


<script type="text/javascript" src="/static/js/hui/hui.js"></script>  


<script src="/static/js/hui/hui-form.js" type="text/javascript" charset="utf-8"></script>
<script src="/static/js/hui/hui-image-cuter.js" type="text/javascript" charset="utf-8"></script>
<script src="/static/js/hui/base.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript">
var imgCuter = null;
//绑定选择图片事件
hui('#huiCuterSelectImg').click(function(){
    var a = document.createEvent("MouseEvents");
　　a.initEvent("click", true, true);  
　　document.getElementById("hui-img-cut-file").dispatchEvent(a);
});
hui('#selectImgBtn').click(function(){
    var a = document.createEvent("MouseEvents");
　　a.initEvent("click", true, true);  
　　document.getElementById("hui-img-cut-file").dispatchEvent(a);
});
hui('#hui-img-cut-file').change(function(){
    hui.loading('加载图片');
    var reader = new FileReader();
    reader.onload = function(e){
        hui('#huiImgCutShow').css({'fontSize':'0px','height':'auto'});
        hui('#huiImgCutShow').html('<div id="huiImgCutImgIn"><img src="'+e.target.result+'" /></div>');
        hui('#huiImgCutShow').find('img').eq(0).dom[0].onload = function(){
            //创建剪裁对象
            imgCuter = new huiImgCuter('#huiImgCutShow', '80%');
            hui('#huiCuterSelectImg').hide();
        }
        hui.closeLoading();
    };
    if(this.files[0]){
        reader.readAsDataURL(this.files[0]);
    }else{
        hui.closeLoading();
    }
});
hui('#uploadBtn').click(function(){
    hui.loading();
    var res = huiImgCuterPlay();
    if(res){
        //读取照片数据准备上传
        var canvas      = document.getElementById('huiImgCuterCanvas');
        var data        = canvas.toDataURL();
        var url=hui('#url').val();
        _ajaxPost({'url':url,'data':{'pd':data}})
        
        setTimeout(function(){hui.toast('上传完毕'); hui.closeLoading();}, 1000);
    }else{
        hui.toast('请选择照片');
        hui.closeLoading();
    }
});
</script>


</body>

</html>