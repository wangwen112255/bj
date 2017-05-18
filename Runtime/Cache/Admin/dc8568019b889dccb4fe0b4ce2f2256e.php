<?php if (!defined('THINK_PATH')) exit();?>
  <link href="/static/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="/static/css/plugins/fileinput/fileinput.min.css">
  <link rel="stylesheet" type="text/css" href="/static/css/base.css">
  <style type="text/css">
    .help-block {
     padding: 5px;
      }
  </style>
  
  <form id="signupForm" action="<?php echo U('saves');?>"  style="margin-top: 30px" method="post" class="form-horizontal">
    <div class="form-group ">
    <div class="col-md-2 control-label" >
      <label >院系名称</label>
    </div>
    <div class="col-md-8">
    <input type="text"  placeholder="请输进去毕业设计题目，必填项"   class="form-control" value="<?php echo ($codata["departname"]); ?>"  name="departname">
    </div>
    </div>
    <input type="hidden" name="cid" value="<?php echo ($codata["id"]); ?>">  
 
  
    <div class="col-md-3 col-md-offset-2">
    <button id="addsubmit" class="btn btn-primary">提交</button>
    <button type="reset" class="btn-primary btn">取消</button>
    </div>

  </form>

<script src="/static/js/jquery.js"></script>
<script type="text/javascript" src='/static/js/plugins/validate/jquery.validate.min.js'></script>
<script type="text/javascript" src="/static/js/plugins/layer/layer.min.js"></script>
<script type="text/javascript" src="/static/js/plugins/fileinput/fileinput.min.js"></script>
<script type="text/javascript" src="/static/js/plugins/fileinput/zh.js"></script>
<script type="text/javascript" src="/static/js/common.js"></script>
<script src="/static/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/static/js//kind/kindeditor-all-min.js"></script>
<script type="text/javascript">
$(function(){
$.extend($.validator.defaults,{ignore:""});
var icon = "<i class='glyphicon  glyphicon-remove'></i> ";
var rule={
  departname:{
   required:true,
   maxlength:30
  },
  desc:{
    required:true,
   
    //maxlength:200
  },
  pic:{
    required:true,
  }

 };

 var message={
  departname:{
   required:icon+"请输进去正确的院系名称",
   maxlength:icon+"最长的题目不能超过三十个字"
  },
  desc:{
    required:icon+'请输进去简单的院系简介'
    // maxlength:icon+"毕设要求不能超过300字"
  },
   pic:{
    required:icon+"请上传图标",
  }
 
  
 };
_validade({rules:rule,messages:message,class:'help-block'});
_SwitchStatus('.js-check');
KindEditor.ready(function(K){
          window.editor = K.create('textarea[name="desc"]',{
           allowFileManager : true,
           afterBlur : function(){
           this.sync();}
           });
});


}); 

</script>

</block>