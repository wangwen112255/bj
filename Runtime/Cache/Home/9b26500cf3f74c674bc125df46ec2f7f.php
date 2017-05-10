<?php if (!defined('THINK_PATH')) exit();?>
  <link href="/static/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="/static/css/plugins/switchery/switchery.css">
  <link rel="stylesheet" type="text/css" href="/static/css/base.css">
  <style type="text/css">
    .help-block {
     padding: 5px;
      }
  </style>
  
  <form id="signupForm" action="<?php echo U('saves');?>"  style="margin-top: 30px" method="post" class="form-horizontal">
  	<div class="form-group ">
  	<div class="col-md-2 control-label" >
  		<label >题目名称</label>
  	</div>
  	<div class="col-md-8">
  	<input type="text"  placeholder="请输进去毕业设计题目，必填项"   class="form-control" value="<?php echo ($codata["coursename"]); ?>"  name="coursename">
  	</div>
  	</div>
    <input type="hidden" name="cid" value="<?php echo ($codata["id"]); ?>">  
  	<div class="form-group">
  	<div class="col-md-2 control-label">
  		<label >题目要求</label>
  	</div>
  	<div class="col-md-8">
  		<textarea id="courseeditor" placeholder="请输进去毕业设计的要求" name="desc" style="width:100%" class="form-control" rows="6">
      <?php  echo htmlspecialchars_decode($codata['desc']); ?>
    </textarea>
  	<!-- <input type="text" class="form-control" value="<?php echo ($datadetail["icon"]); ?>" name="icon"> -->
  	</div>
  	</div>
    <div class="form-group">
    <div class="col-md-2 control-label">
      <label >题目人数</label>
    </div>
    <div class="col-md-8">
      
    <input type="text" placeholder="请输进去限制人数，不能超过3" class="form-control" value="<?php echo ($codata["limitnum"]); ?>" name="limitnum">
    </div>
    </div>
  	<div class="form-group ">
  	<div class="col-md-2 control-label">
  		<label >题目状态</label>
  	</div>
  	<div class="col-md-2">
        <input type="checkbox" class="js-check"<?php if(empty($codata['status'])): ?>checked<?php endif; ?> <?php if(($codata['status']) == "0"): ?>checked<?php endif; ?> >
        <input type="hidden" value='<?php if(empty($codata['status'])): ?>0<?php else: echo ($codata['status']); endif; ?>' name="status" >

  	</div>

  	</div>
  	<div class="col-md-3 col-md-offset-2">
  	<button id="addsubmit" class="btn btn-primary">提交</button>
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
$.extend($.validator.defaults,{ignore:""});
// jQuery.validator.addMethod("textisnull",function(){
// values=$("textarea[name='desc']").html();
// if(values){
//   return true;
// }
// else{
//   return false;
// }
// },'请您输进去毕业的基本要去')
var icon = "<i class='glyphicon  glyphicon-remove'></i> ";
var rule={
  coursename:{
   required:true,
   maxlength:30
  },
  desc:{
    required:true,
   
    //maxlength:200
  },
  limitnum:{
    required:true,
    number:true,
    max:3
  },
  status:{
    required:true
  }
 };

 var message={
  coursename:{
   required:icon+"请输进去正确的题目名称",
   maxlength:icon+"最长的题目不能超过三十个字"
  },
  desc:{
    required:icon+'请输进去毕业设计的要求'
    // maxlength:icon+"毕设要求不能超过300字"
  },
  limitnum:{
    required:icon+"请输进去正确的选课人数",
    number:icon+"选课人数必须是数字",
    max:icon+"选课人数不能超过三个"
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