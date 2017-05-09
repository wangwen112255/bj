<?php if (!defined('THINK_PATH')) exit();?>
  <link href="/static/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="/static/css/base.css">
  <style type="text/css">
    .help-block {
     padding: 5px;
      }
  </style>
  
  <form id="signupForm" action="<?php echo U('save');?>"  style="margin-top: 30px" method="post" class="form-horizontal">
  	<div class="form-group ">
  	<div class="col-md-2 control-label" >
  		<label >题目名称</label>
  	</div>
  	<div class="col-md-8">
  		
  	<input type="text" class="form-control" value="<?php echo ($datadetail["name"]); ?>"  name="name">
  	</div>
  	</div>
  	
  	<div class="form-group">
  	<div class="col-md-2 control-label">
  		<label >题目要求</label>
  	</div>
  	<div class="col-md-8">
  		<textarea id="courseeditor" name="content" class="form-control" rows="6">
    &lt;strong&gt;HTML内容&lt;/strong&gt;
    </textarea>
  	<!-- <input type="text" class="form-control" value="<?php echo ($datadetail["icon"]); ?>" name="icon"> -->
  	</div>
  	</div>
    <div class="form-group">
    <div class="col-md-2 control-label">
      <label >题目人数</label>
    </div>
    <div class="col-md-8">
      
    <input type="text" class="form-control" value="<?php echo ($datadetail["icon"]); ?>" name="icon">
    </div>
    </div>
  	<div class="form-group ">
  	<div class="col-md-2 control-label">
  		<label >题目状态</label>
  	</div>
  	<div class="col-md-2">
  	<!-- <div class="switch switch-large"> -->
        <!-- <input type="checkbox" value="1" checked class="js-check" name="status" /> -->
        <input type="checkbox" class="js-check" <?php if(($datadetail['status']) == "1"): ?>checked<?php endif; ?> 
        <input type="hidden" value='1' name="status" >
    <!--   </div> -->
  	<!-- <input type="text" class="form-control" name="status"> -->
  	</div>

  	</div>
  	<div class="col-md-3 col-md-offset-2">
  	<button id="tijiao" class="btn btn-primary">提交</button>
  	<button type="reset" class="btn-primary btn">取消</button>
  		
  	</div>

  </form>

<script src="/static/js/jquery.js"></script>
<script type="text/javascript" src='/static/js/plugins/validate/jquery.validate.min.js'></script>
<script type="text/javascript" src="/static/js/plugins/layer/layer.min.js"></script>
<script type="text/javascript" src="/static/js/common.js"></script>
<script src="/static/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/static/js//kind/kindeditor-all-min.js"></script>
<script src="/static/js/plugins/switchery/switchery.min.js"></script>
<script type="text/javascript">
$(function(){
var icon = "<i class='fa fa-times-circle'></i> ";
var rule={
  name:{
   required:true,

  },
  title:{
    // required:true,
    maxlength:5
  },
  icon:{
    required:true
  },
  pid:{
    required:true
  }
 };

 var message={
  name:{
   required:icon+"请输进去正确的题目名称"

  },
  title:{
    // required:true,
    maxlength:icon+"请进去正确的菜单名称()长度"
  },
  icon:{
    required:icon+"请进去正确的菜单名称()长度"
  }
  
 };
_validade({rules:rule,messages:message,class:'help-block'});
_SwitchStatus('.js-check');
KindEditor.ready(function(K) {
             window.editor = K.create('#courseeditor');
     });
}); 



</script>

</block>